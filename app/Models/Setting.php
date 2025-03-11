<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'solgan',
        'logo',
        'sdt',
        'email',
        'address',
        'facebook',
        'zalo',
        'video',
        'map'
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('site-settings');
        });

        static::deleted(function () {
            Cache::forget('site-settings');
        });
    }
}
