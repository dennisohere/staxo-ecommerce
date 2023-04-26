<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(ProductService $productService)
    {
        $products = $productService->getAllProducts(12);
        return view('pages.home', compact('products'));
    }
}
