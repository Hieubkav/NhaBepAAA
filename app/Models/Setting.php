<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
