<?php
namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserBlockedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $action;

    public function __construct(User $user, $action)
    {
        $this->user = $user;
        $this->action = $action;
    }

    public function build()
    {
        $subject = $this->action == 'blocked' ? 'Your account has been blocked' : 'Your account has been unblocked';
        return $this->subject($subject)->view('emails.user_blocked_notification');
    }
}
