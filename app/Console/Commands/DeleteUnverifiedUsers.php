<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteUnverifiedUsers extends Command
{
    protected $signature = 'users:delete-unverified';
    protected $description = 'Delete users with role "utilisateur" and email not verified';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::where('role', 'utilisateur')
            ->where('email_verified', false)
            ->get();

        foreach ($users as $user) {
            $user->delete();
            $this->info('Deleted user: ' . $user->email);
        }

        $this->info('Unverified users with role "utilisateur" deleted successfully.');
    }
}
