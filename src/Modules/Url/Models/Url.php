<?php

namespace Module\Url\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = [
        'original_url',
        'short_url',
        'clicks',
        'expires_at',
    ];

}
