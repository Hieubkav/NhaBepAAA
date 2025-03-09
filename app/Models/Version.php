<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'thumbnail', 'product_id'
    ];

    /**
     * Lấy sản phẩm mà phiên bản này thuộc về
     */
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
