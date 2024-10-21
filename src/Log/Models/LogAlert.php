<?php

namespace Nahad\Foundation\Log\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Nahad\Foundation\Dashboard\Foundation\Model\Filterable;
use Nahad\Foundation\Dashboard\Foundation\Model\TimestampJalali;

class LogAlert extends Model
{
    use Filterable, TimestampJalali;

    protected $fillable = [
        'hash',
        'done'
    ];

    protected $cast = [
        'done' => 'boolean'
    ];

    public function logs() {
        return $this->belongsToMany(Log::class);
    }

    public function latestLog(): Attribute {
        return Attribute::make(fn() => $this->logs()->first());
    }

    public static function filters() {
        return [
            'done' => [
                'type' => 'select',
                'label' => 'پیگیری شده',
                'items' => [
                    0 => 'خیر',
                    1 => 'بله',
                ]
            ],
        ];
    }
}
