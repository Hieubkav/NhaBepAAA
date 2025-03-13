<?php

namespace App\View\Components;

use App\Models\MenuItem;
use Illuminate\View\Component;

class MainMenu extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        $menuItems = MenuItem::whereNull('parent_id')
            ->orderBy('order')
            ->get();

        return view('components.main-menu', [
            'items' => $menuItems
        ]);
    }
}