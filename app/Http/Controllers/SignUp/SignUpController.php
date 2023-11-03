<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Patients;
use Mail;
use App\Mail\SignUp\SendOTP;

class SignUpController extends Controller
{
    public function SendEmailOTP(Request $request) {

        // Generate OTP
        $usersOTP = rand(100000, 999999);
        Storage::put('usersOTP', $usersOTP);

        $content = [
            'subject' => "Account Verificaton",
            'body' => 'This is your One-Time Pin (OTP) ' . $usersOTP 
        ];

        // Send OTP
        Mail::to($request->email_address)->send(new SendOTP($content));

        return response()->json([
            'message' => 'Your OTP has been sent to your email'
        ], 200);
    }

    public function VerifyOTP(Request $request) {

        $generatedOTP = Storage::get('usersOTP');
    
        if (!$generatedOTP) {
            return response()->json([
                'message' => 'No OTP found. Please request an OTP first.'
            ]);
        }
    
        if ($request->otp == $generatedOTP) {
             try {
                // Rules
                $validatedData = $request->validate([
                    'otp' => 'required|numeric',
                    'email_address' => 'required|email',
                    'username' => 'required|unique:patients',
                    'password' => 'required|min:10',
                    'first_name' => 'required',
                    'middle_name' => 'nullable',
                    'last_name' => 'required',
                    'birth_date' => 'required|date',
                    'age' => 'required|numeric',
                    'civil_status' => 'required',
                    'gender' => 'required',
                    'home_address' => 'required',
                    'contact' => 'required|max:11',
                    'religion' => 'required'
                ]);
                
                // Store patient data
                $patient = new Patients;
                $patient->otp = $validatedData['otp'];
                $patient->email_address = $validatedData['email_address'];
                $patient->username = $validatedData['username'];
                $patient->password = bcrypt($validatedData['password']);
                $patient->first_name = strtoupper($validatedData['first_name']);
                $patient->middle_name = strtoupper($validatedData['middle_name']);
                $patient->last_name = strtoupper($validatedData['last_name']);
                $patient->birth_date = strtoupper($validatedData['birth_date']);
                $patient->age = $validatedData['age'];
                $patient->civil_status = strtoupper($validatedData['civil_status']);
                $patient->gender = strtoupper($validatedData['gender']);
                $patient->home_address = strtoupper($validatedData['home_address']);
                $patient->contact_number = $validatedData['contact'];
                $patient->religion = strtoupper($validatedData['religion']);
                $patient->save();
    
                Storage::delete('usersOTP');
    
                return response()->json([
                    'message' => 'Account Created'
                ]);
            } 
            
            catch (ValidationException $e) {
                return response()->json([
                    'message' => 'Account creation failed',
                    'errors' => $e->errors(),
                ], 422);

                Storage::delete('usersOTP');
            } catch (QueryException $e) {
                return response()->json([
                    'message' => 'An error occurred while creating the patient record.',
                ], 422);
            }
        } else {
            return response()->json([
                'message' => 'Invalid OTP, try again'
            ]);
        }
    }   
}

