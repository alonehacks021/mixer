<?php

namespace Nahad\Foundation\Log\Services;

use Nahad\Foundation\Log\Entities\Activity;
use Nahad\Foundation\Log\Models\Log;
use Nahad\Foundation\Log\Models\LogType;

class LogService {
    public static function activity($logTypeName, $newLogTypeTitle = null) {
        $type = LogType::firstOrCreate([
            'name' => $logTypeName
        ], [
            'title' => $newLogTypeTitle ?? $logTypeName
        ]);
        
        return new Activity($type->id);
    }

    public static function userLogs($userId = null, $name = null) {
        $userId = $userId ? $userId : auth()->user()->id;

        $logs = Log::where('user_id', $userId);

        if($name) {
            $logs = $logs->whereHas('type', function($query) use ($name) {
                $query->where('name', $name);
            });
        }

        $logs = $logs->paginate(20);

        return $logs;
    }

    public static function isActiveLogRequests() {
        return (bool)get_option('is_active_log', false);
    }

    public static function isActiveLogExceptionAlert() {
        return (bool)get_option('is_active_exception_alert_log', false);
    }
}