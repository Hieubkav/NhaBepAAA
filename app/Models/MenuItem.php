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

    protected $with = ['children', 'target'];

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
        if ($this->type === 'link') {
            return $this->link ?? '#';
        }

        if ($this->target_type && $this->target_id) {
            return match($this->type) {
                'category' => route('cat.filter', ['id' => $this->target_id]),
                'page' => route('page.show', ['id' => $this->target_id]),
                default => '#'
            };
        }

        return '#';
    }

    public function getName(): string
    {
        return $this->label;
    }

    // Kiểm tra xem item có active không dựa trên current route
    public function isActive(): bool
    {
        $route = request()->route();
        if (!$route) return false;

        if ($this->type === 'link') {
            return request()->url() === $this->link;
        }

        if ($this->target_type && $this->target_id) {
            $routeName = $route->getName();
            $routeId = $route->parameter('id');

            return match($this->type) {
                'category' => $routeName === 'cat.filter' && $routeId == $this->target_id,
                'page' => $routeName === 'page.show' && $routeId == $this->target_id,
                default => false
            };
        }

        return false;
    }

    // Kiểm tra xem có child items đang active không
    public function hasActiveChild(): bool
    {
        if ($this->children->isEmpty()) {
            return false;
        }

        return $this->children->contains(function ($child) {
            return $child->isActive() || $child->hasActiveChild();
        });
    }
}
