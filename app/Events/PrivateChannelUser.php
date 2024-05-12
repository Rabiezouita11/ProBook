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
    public $username;
    public $userId;
    public $imageUrl;
    public $idNotifications;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $username, $userId, $imageUrl,$idNotifications)
    {
        $this->message = $message;
        $this->username = $username;
        $this->userId = $userId;
        $this->imageUrl = $imageUrl;
        $this->idNotifications = $idNotifications;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("private-channel.user.$this->userId");
    }
}

