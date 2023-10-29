<?php

use App\Helpers\AdminHelper;
use App\Http\Controllers\AuthController;
use App\Mail\MailVerification;
use App\Models\Admin\LocationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/* Route::get('/send-email', function () {
    $mail = new MailVerification('danh010500@mail.com', 'dawd.123');
    Mail::send($mail);
    return response()->json(['message' => 'Email đang được gửi.']);
}); */
Route::get('/get-location', function () {
    $locations = LocationModel::with('department')->get();
    return response()->json($locations);
});

use Spatie\Permission\Models\Permission;

Route::get('/permission', function () {
    /* $permission = Permission::create(['name' => 'VIEW']);
    $permission = Permission::create(['name' => 'CREATE']);
    $permission = Permission::create(['name' => 'EDIT']);
    $permission = Permission::create(['name' => 'DELETE']); */
    $user = User::with(['role', 'location.department'])->get();
    return response()->json($user);
});
