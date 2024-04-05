<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index()
    {
        return view('frontoffice.home.index');
    }

    public function enter_verification_code()
    {
        return view('validationEmail.index');
    }

    public function verify(Request $request)
    {
        // Validate the verification code
        $request->validate([
            'verification_code' => 'required|string|min:6|max:6',  // Assuming the verification code is 6 characters long
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
                'errors' => ['verification_code' => ['Invalid verification code. Please try again.']],
            ], 422);
        }
    }

    public function resend(Request $request)
    {
        $waitTime = 60;  // Wait time in seconds
        $currentTime = Carbon::now();
        // Check if the user has already requested to resend the code recently
        if (session()->has('code_resend_time')) {
            $lastResendTime = session('code_resend_time');
            $secondsSinceLastResend = $currentTime->diffInSeconds($lastResendTime);

            // Check if the time elapsed since the last resend is less than the desired interval
            if ($secondsSinceLastResend < $waitTime) {
                $remainingTime = $waitTime - $secondsSinceLastResend;
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please wait for ' . $remainingTime . ' seconds before resending the code again.'
                ], 429);  // Return 429 status code for too many requests
            }
        }
        // If the time elapsed is more than 60 seconds or it's the first request, proceed with resending the code
        $verificationCode = Str::random(6);  // Generate a new verification code
        $user = auth()->user();

        // Update the user's verification code in the database
        $user->verification_code = $verificationCode;
        $user->save();

        // Store the current time in session to track the last resend request time
        $request->session()->put('code_resend_time', now());

        // Send the verification code via email (queue it for asynchronous processing if needed)
        Queue::push(function ($job) use ($user, $verificationCode) {
            Mail::to($user->email)->send(new VerificationCodeMail($user, $verificationCode));
            $job->delete();
        });
        return response()->json([
            'status' => 'success',
            'message' => 'Verification code resent successfully!',
        ]);
    }

    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|max:2048',  // Maximum file size of 2MB
        ]);

        $imageName = null;
        if ($request->file('image')) {
            // Check if the 'public/users' folder exists, if not, create it
            $uploadPath = public_path('users');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            $imageName = time() . '.' . $request->file('image')->extension();  // Generate unique filename
            $request->file('image')->move($uploadPath, $imageName);  // Move uploaded file to 'public/users' folder
            Auth::user()->update(['image' => $imageName]);
            return response()->json(['success' => true, 'message' => 'Image uploaded successfully.']);
        }

        // Return error response if file is not uploaded
        return response()->json(['success' => false, 'message' => 'Image upload failed.'], Response::HTTP_BAD_REQUEST);
    }
}
