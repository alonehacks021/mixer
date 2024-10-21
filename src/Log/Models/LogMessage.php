<?php

namespace Nahad\Foundation\Log\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogMessage extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'log_id',
        'content',
        'trace',
    ];

    public function trace(): Attribute {
        return Attribute::make(fn($value) => json_decode($value), fn($value) => json_encode($value));
    }
}
