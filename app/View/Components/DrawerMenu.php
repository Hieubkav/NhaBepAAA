<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\MenuItem;

class DrawerMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public $items;

    public function __construct($items = null)
    {
        // Nếu không có items được truyền vào, lấy từ database
        $this->items = $items ?: MenuItem::whereNull('parent_id')->orderBy('order')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.drawer-menu',[
            'items' => $this->items
        ]);
    }
}
