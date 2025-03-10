<?php

namespace App\Livewire;

use Livewire\Component;

class CatFilter extends Component
{
    public $cats;
    public $products;
    public $current_cat_id;

    public function render()
    {
        return view('livewire.cat-filter', [
            'cats' => $this->cats,
            'products' => $this->products,
            'current_cat_id' => $this->current_cat_id,
        ]);
    }
}
