<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /* public function __construct(Product $product)
    {
        $this->product = $product;
    } */

    public function index()
    {   
        $products = Product::all();
        return response(['data' => $products]);
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return [true, $request];
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return [true, $product];
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return [true, $product];
    }
}
