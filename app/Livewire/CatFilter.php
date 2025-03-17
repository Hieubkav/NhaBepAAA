<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Request;

class CatFilter extends Component
{
    public $cats;
    public $products;
    public $current_cat_id;
    public $search = '';
    public $sortBy = 'newest';
    public $selectedCategories = [];

    public function mount()
    {
        $this->current_cat_id = request()->segment(2); // Lấy cat_id từ URL segment
        // Lấy giá trị search từ query string
        if (request()->has('search')) {
            $this->search = request()->input('search');
        }
        if ($this->current_cat_id) {
            $this->selectedCategories = [$this->current_cat_id];
        }
        $this->filterProducts();
    }

    public function updatedSearch()
    {
        $this->filterProducts();
    }

    public function updatedSortBy()
    {
        $this->filterProducts();
    }

    public function toggleCategory($catId)
    {
        $index = array_search($catId, $this->selectedCategories);
        if ($index !== false) {
            unset($this->selectedCategories[$index]);
            $this->selectedCategories = array_values($this->selectedCategories);
        } else {
            $this->selectedCategories[] = $catId;
        }
        $this->filterProducts();
    }

    public function clearFilters()
    {
        $this->selectedCategories = [];
        $this->search = '';
        $this->sortBy = 'newest';
        $this->filterProducts();
    }

    private function filterProducts()
    {
        $query = Product::query();

        // Lọc theo danh mục
        if (!empty($this->selectedCategories)) {
            $query->whereIn('cat_id', $this->selectedCategories);
        }

        // Lọc theo tên
        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        // Áp dụng sắp xếp
        $this->products = $this->applySort($query)->get();
    }

    private function applySort($query)
    {
        switch ($this->sortBy) {
            case 'newest':
                return $query->orderBy('created_at', 'desc');
            case 'oldest':
                return $query->orderBy('created_at', 'asc');
            case 'asc':
                return $query->orderBy('name', 'asc');
            case 'desc':
                return $query->orderBy('name', 'desc');
            default:
                return $query->orderBy('created_at', 'desc');
        }
    }

    public function render()
    {
        return view('livewire.cat-filter', [
            'cats' => $this->cats,
            'products' => $this->products,
            'current_cat_id' => $this->current_cat_id,
            'search' => $this->search
        ]);
    }
}
