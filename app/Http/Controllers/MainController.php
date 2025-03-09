<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function storeFront()
    {
        return view('shop.storeFront');
    }

    public function catFilter()
    {
        return view('shop.catFilter');
    }

    public function productOverview($product_id)
    {
        return view('shop.productOverview', ['product_id' => $product_id]);
    }

}
