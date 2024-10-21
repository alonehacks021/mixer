<?php

namespace Nahad\Foundation\Log\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Nahad\Foundation\Log\Services\LogService;
use Nahad\Foundation\Log\Events\LogOperation;
use Nahad\Foundation\Dashboard\Models\Option;

class SaveLogListener
{
    public function handle(LogOperation $event)
    {
        if(!$event->preventSaveNewLog && Option::get('is_active_operations_log')) {
            $activity = LogService::activity($event->name, $event->title)
            ->withData(\Request::except('_token', '_method'));
    
            if($event->model) {
                $activity->performedOn($event->model);
            }

            $activity->log();
        }
    }
}
