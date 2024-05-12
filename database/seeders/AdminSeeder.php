<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admin = [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'blocked' => false,
            'email_verified' => true, // Assuming email is already verified
            'institut' => 'Admin Institute',
            'diploma' => 'Admin Diploma',
            'cover_photo' => null, // No cover photo initially
            'date_of_birth' => '1990-01-01',
            'location' => 'Admin Location'
        ];

        User::create($admin);
    }
}
