<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class SearchProducts extends Component
{
    public $search = '';
    public $results = [];

    public function updatedSearch()
    {
        if (strlen($this->search) >= 2) {
            $this->results = Product::where('name', 'like', '%' . $this->search . '%')
                ->where('is_visible', true)
                ->with('images') // Eager load images
                ->with('cat') // Eager load category
                ->limit(5)
                ->get();
        } else {
            $this->results = [];
        }
    }

    public function render()
    {
        return view('livewire.search-products');
    }
}