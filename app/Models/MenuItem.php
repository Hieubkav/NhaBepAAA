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

        if ($this->type && $this->target_id) {
            if ($this->type === 'category') {
                return route('catFilter', $this->target_id);
            } 
            elseif ($this->type === 'page') {
                return route('pages.show', $this->target_id);
            }
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

    public function getLevel(): int
    {
        $level = 0;
        $parent = $this->parent;
        while ($parent) {
            $level++; 
            $parent = $parent->parent;
        }
        return $level;
    }
}
