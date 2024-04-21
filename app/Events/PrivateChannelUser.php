<?php
// Event class
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;

class PrivateChannelUser implements ShouldBroadcastNow
{
    use SerializesModels;

    public $message;
    public $userIdReceiver;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $userIdReceiver)
    {
        $this->message = $message;
        $this->userIdReceiver = $userIdReceiver;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("private-channel.user.$this->userIdReceiver");
    }
}

