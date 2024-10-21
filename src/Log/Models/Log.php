<?php

namespace Nahad\Foundation\Log\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Nahad\Foundation\Dashboard\Foundation\Model\Filterable;

class Log extends Model
{
    use Filterable;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'type_id',
        'path',
        'method',
        'data',
        'ip',
        'user_agent',
        'logged_at'
    ];

    protected $dates = [
        'logged_at'
    ];

    protected $cast = [
        'logged_at' => 'datetime'
    ];

    public function user() {
        return $this->belongsTo(\Nahad\Auth\Models\User::class, 'user_id');
    }

    public function type() {
        return $this->belongsTo(LogType::class);
    }

    public function message() {
        return $this->hasOne(LogMessage::class, 'log_id');
    }

    public function alerts() {
        return $this->belongsToMany(LogAlert::class);
    }

    public function data(): Attribute {
        return Attribute::make(fn($value) => json_decode($value), fn($value) => json_encode($value));
    }

    public static function filters() {
        return [
            'type_id' => [
                'type' => 'select',
                'label' => 'نوع لاگ',
                'items' => LogType::pluck('title', 'id')->toArray()
            ],
            'path' => [
                'type' => 'text',
                'label' => 'آدرس'
            ],
            'ip' => [
                'type' => 'text',
                'label' => 'IP'
            ],
            'method' => [
                'type' => 'select',
                'label' => 'نوع درخواست',
                'items' => [
                    'POST' => 'POST',
                    'GET' => 'GET',
                    'PUT' => 'PUT',
                    'DELETE' => 'DELETE',
                    'OPTIONS' => 'OPTIONS',
                ]
            ],
            'user__first_name' => [
                'type' => 'text',
                'label' => 'نام'
            ],
            'user__last_name' => [
                'type' => 'text',
                'label' => 'نام خانوادگی'
            ],
            'logged_at' => [
                'type' => 'date-range',
                'label' => 'تاریخ'
            ],
        ];
    }
}
