<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminLogInController extends Controller
{

    public function AdminLogin(Request $request) {

        // Validate username and password
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // Login Logic
        if($request->usertype == 'Admin') {

            $admin = Admin::where('username', $request->username)->first();
            
            if (!$admin || !Auth::guard('admins')->attempt(['username' => $request->username, 'password' => $request->password])) {
                return response()->json([
                    'message' => 'Invalid Credentials, Try again'
                ], 401);
            }
            else {
                // Generate token
                $token = $admin->createToken('admin')->plainTextToken;
    
                return response()->json([
                    'message' => 'Log In Successful',
                    'token' => $token,
                    'admin' => $admin,
                ], 200);
            }
        }


    }
}
