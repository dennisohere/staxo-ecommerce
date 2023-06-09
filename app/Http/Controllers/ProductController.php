<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductService $productService)
    {
        $products = $productService->getAllProducts();

        return view('pages.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.products.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ProductService $productService)
    {
        $product = $productService->saveProduct($request->all());
        return redirect()->route('admin.products.edit', ['product' => $product->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.product-details', compact('product'));
    }

    public function buy(Product $product, Request $request, OrderService $orderService)
    {
        $payload = $request->validate([
            'email' => 'required|email'
        ]);

        $checkout_session = $orderService->placeOrder($product, $payload['email']);

        return redirect()->to($checkout_session->url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product, ProductService $productService)
    {
        $product = $productService->saveProduct($request->all(), $product);
        $product->refresh();

        return redirect()->route('admin.products.edit', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductService $productService)
    {
        $productService->deleteProduct($product);
        return back();
    }
}
