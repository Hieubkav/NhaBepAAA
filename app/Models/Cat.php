<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_visible',
        'thumbnail',
        'section_id',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
