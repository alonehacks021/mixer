<?php

namespace Nahad\Foundation\Log\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Nahad\Foundation\Log\Services\LogService;

class LogOperation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $title;
    public $model;
    public $preventSaveNewLog;

    public function __construct($name, $model = null, $title = null, $preventSaveNewLog = false)
    {
        $this->model = $model;
        $this->name = $name;
        $this->title = $title;
        $this->preventSaveNewLog = $preventSaveNewLog;

        LogService::preventLogRequest();
    }
}
