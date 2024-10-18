<?php

namespace Nahad\Foundation\Auth\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Nahad\Foundation\Auth\Models\User;

class DashboardLoginFail
{
    use Dispatchable;

    public function __construct(public string $username, public User|null $user)
    {
        //
    }
}
