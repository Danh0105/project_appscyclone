<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminUserRoleCreate extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /* dd($request->all()); */

        $user = User::create([
            "name" => $request->input('username'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "location_model_id" => $request->input('location_model_id'),

        ]);
        $user->toArray();
        $role = Role::find($request->input('role'));
        $user->assignRole($role);
        return redirect()->back();
    }
}
