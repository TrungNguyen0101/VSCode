<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    protected function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:10|max:255',
            'price' => 'required|integer|min:100',
            'category_id' => 'required|exists:categories,id'
        ]);
    }

    public function index()
    {
        // request("page");
        // dd(request());
        // return request();
        $products = Product::orderBy('name')->get();
        // return view("products.index");
        return ProductResource::collection($products);
    }
    public function show(Product $id)
    {
        return new ProductResource($id);
    }

    public function store()
    {
        /* 
        exists:categories,i  : kiểm tra id có tồn tại ko
         */
        $data = $this->validateRequest();
        $product = Product::create($data);

        return new ProductResource($product);
    }

    public function update(Product $product)
    {
        $data = $this->validateRequest();

        $product->update($data);

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        // return response()->noContent();
        return response()->json(['message' => 'Xóa sản phẩm thành công']);;
    }
}
