<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name',  'description'];

    /**
     * Lấy tất cả các phiên bản của sản phẩm
     */
    public function versions(): HasMany {
        return $this->hasMany(Version::class);
    }

    /**
     * Lấy tất cả hình ảnh của sản phẩm
     */
    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }
}
