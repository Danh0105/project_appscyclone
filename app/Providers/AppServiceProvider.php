<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Auth::viaRequest('jwt', static function (Request $request) {
            $token = $request->header('Authorization', null);
            if ($token === null) {
                return null;
            }
            $token = (array) JWT::decode(str_replace('Bearer', '', $token), new Key(env('APP_KEY'), 'HS256'));
            $user = new User();
            $user->setRawAttributes($token);
            return $user;
        });
    }
}
