<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function redirectTo() {
        $role = Auth::user()->role; 
        switch ($role) {
          case 'admin':
            return '/admin';
            break;
          case 'utilisateur':
            return '/home';
            break; 
      
          default:
            return '/home'; 
          break;
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'role' => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'], // Add validation rules for the image


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
      $imageName = null;
      if (isset($data['image'])) {
        // Check if the 'public/users' folder exists, if not, create it
        $uploadPath = public_path('users');
        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        $imageName = time() . '.' . $data['image']->extension(); // Generate unique filename
        $data['image']->move($uploadPath, $imageName); // Move uploaded file to 'public/users' folder
    }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'utilisateur', 
            'password' => Hash::make($data['password']),
            'image' => $imageName, // Save the filename in the 'image' column

        ]);
    }
}
