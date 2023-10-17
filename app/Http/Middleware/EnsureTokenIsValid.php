<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User; // Đảm bảo sử dụng model User của bạn
use Firebase\JWT\JWT;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization', null);

        if ($token === null) {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        try {
            $decoded = JWT::decode(str_replace('Bearer ', '', $token), env('APP_KEY'), ['HS256']);
            $user = User::find($decoded->user_id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 401);
            }

            Auth::login($user);
        } catch (BeforeValidException | ExpiredException | SignatureInvalidException $e) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}
