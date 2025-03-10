<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
