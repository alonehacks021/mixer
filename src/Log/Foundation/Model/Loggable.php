<?php

namespace Nahad\Foundation\Log\Foundation\Model;

use Nahad\Foundation\Log\Events\LogOperation;

trait Loggable {
    public static function bootLoggable() {
        static::created(function($model) {
            LogOperation::dispatch(static::LOG['created']['name'] ?? 'created', $model, static::LOG['created']['title'] ?? 'ایجاد');
        });

        static::updated(function($model) {
            LogOperation::dispatch(static::LOG['updated']['name'] ?? 'updated', $model, static::LOG['updated']['title'] ?? 'بروزرسانی');
        });

        static::deleted(function($model) {
            LogOperation::dispatch(static::LOG['deleted']['name'] ?? 'deleted', $model, static::LOG['deleted']['title'] ?? 'حذف');
        });
    }
}