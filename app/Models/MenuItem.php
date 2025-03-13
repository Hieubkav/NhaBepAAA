<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class MenuItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'order' => 'integer',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function target(): MorphTo
    {
        return $this->morphTo();
    }

    public function getUrl(): string
    {
        return match($this->type) {
            'category' => route('cat.filter', ['cat' => $this->target]),
            'page' => route('page.show', $this->target),
            default => $this->link ?? '#'
        };
    }

    // Kiểm tra xem item có active không dựa trên current route
    public function isActive(): bool
    {
        if ($this->type === 'link') {
            return request()->url() === $this->link;
        }

        return match($this->type) {
            'category' => request()->route('cat')?->id === $this->target_id,
            'page' => request()->route('page')?->id === $this->target_id,
            default => false
        };
    }

    // Kiểm tra xem có child items đang active không
    public function hasActiveChild(): bool
    {
        return $this->children->contains(function ($child) {
            return $child->isActive() || $child->hasActiveChild();
        });
    }
}
