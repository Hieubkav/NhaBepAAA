<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'thumbnail',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function cats(): HasMany
    {
        return $this->hasMany(Cat::class);
    }
}
