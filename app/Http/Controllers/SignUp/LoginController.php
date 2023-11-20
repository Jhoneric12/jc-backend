<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {

        // Validations
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // Login logic
        $patient = Patients::where('username', $request->username)->first();

        if (!$patient || !Auth::guard('patients')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return response()->json([
                'message' => 'Invalid Credentials, Try again'
            ], 401);
        }
        else {
            // Generate token
            $token = $patient->createToken('patient')->plainTextToken;

            return response()->json([
                'message' => 'Log In Successful',
                'token' => $token,
                'patient' => $patient,
            ], 200);
        }
    }

    public function logout(Request $request) {

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 201);
    }
}
