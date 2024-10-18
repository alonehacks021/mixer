<?php

namespace Nahad\Foundation\Dashboard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'owner_id',
        'title',
        'url'
    ];
}
