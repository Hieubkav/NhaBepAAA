<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Product;

class MainController extends Controller
{
    public function storeFront()
    {
        $cats = Cat::where('is_visible', true)->get();
        return view('shop.storeFront', [
            'cats' => $cats
        ]);
    }

    public function catFilter(Request $request)
    {
        $cat_id = $request->query('cat_id');
        $cats = Cat::where('is_visible', true)->get();

        $products = Product::query()
            ->when($cat_id, function($query) use ($cat_id) {
                return $query->where('cat_id', $cat_id);
            })
            ->where('is_visible', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('shop.catFilter', [
            'cats' => $cats,
            'products' => $products,
            'current_cat_id' => $cat_id
        ]);
    }

    public function productOverview($product_id)
    {
        return view('shop.productOverview', ['product_id' => $product_id]);
    }

}
