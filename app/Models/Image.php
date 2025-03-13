<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'product_id'];

    /**
     * Lấy sản phẩm mà hình ảnh này thuộc về
     */
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the full URL for the image
     *
     * @return string
     */
    public function getFullUrlAttribute(): string {
        return $this->url ? Storage::url($this->url) : asset('images/no-image.png');
    }
}
