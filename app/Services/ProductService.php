<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public function deleteProduct(Product $product): void
    {
        if(Storage::exists($product->imagePath)) Storage::delete($product->imagePath);
        $product->delete();
    }

    public function saveProduct(array $payload, Product $product = null): Product
    {
        /** @var Product $product */
        if(!$product){
            $product = new Product();
        }

        $product->name = $payload['name'];
        $product->slug = Str::slug($product->name);
        $product->price = $payload['price'];

        if(isset($payload['image'])){
            /** @var UploadedFile $uploaded_image */
            $uploaded_image = $payload['image'];
            $product->imagePath = $uploaded_image->storePublicly('public/products');
        }

        $product->save();

        return $product;
    }

    public function getAllProducts($limit = 10): LengthAwarePaginator
    {
        return Product::query()->latest()->paginate($limit);
    }

}
