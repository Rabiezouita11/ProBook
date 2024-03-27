<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

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
    public function resend(Request $request)
    {
        // Check if the user has already requested to resend the code recently
        if ($request->session()->has('code_resend_time')) {
            // Calculate the time elapsed since the last resend request
            $currentTime = now();
            $lastResendTime = $request->session()->get('code_resend_time');
            $timeElapsed = $currentTime->diffInSeconds($lastResendTime);
    
            // If less than 60 seconds have elapsed, return an error response
            if ($timeElapsed < 60) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please wait for 60 seconds before resending the code again.'
                ], 429); // 429 indicates "Too Many Requests" status code
            }
        }
    
        // If the time elapsed is more than 60 seconds or it's the first request, proceed with resending the code
        $verificationCode = Str::random(6); // Generate a new verification code
        $user = auth()->user();
    
        // Update the user's verification code in the database
        $user->verification_code = $verificationCode;
        $user->save();
    
        // Store the current time in session to track the last resend request time
        $request->session()->put('code_resend_time', now());
    
        // Send the verification code via email (queue it for asynchronous processing if needed)
    
        return response()->json([
            'status' => 'success',
            'message' => 'Verification code resent successfully!',
        ]);
    }
    
    
}
