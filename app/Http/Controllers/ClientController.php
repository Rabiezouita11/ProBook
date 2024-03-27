<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view("frontoffice.home.index");
    }

    public function enter_verification_code()
    {
        return view("validationEmail.index");
    }
    public function verify(Request $request)
    {
        // Validate the verification code
        $request->validate([
            'verification_code' => 'required|string|min:6|max:6', // Assuming the verification code is 6 characters long
        ]);
    
        // Get the verification code from the request
        $verificationCode = $request->input('verification_code');
    
        // Get the logged-in user
        $user = auth()->user();
    
        // Check if the verification code matches
        if ($user->verification_code === $verificationCode) {
            // Mark the email as verified
            $user->verification_code = null;

            $user->email_verified = true;
            $user->save();
    
            // Redirect the user to the home page or wherever appropriate
            return response()->json([
                'status' => 'success',
                'message' => 'Email verification successful!',
            ]);
        } else {
            // Verification code does not match
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid verification code. Please try again.',
            ]);
        }
    }
    
}
