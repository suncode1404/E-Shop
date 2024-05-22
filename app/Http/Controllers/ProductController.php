<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Sản phẩm';
        $products = Product::orderBy('created_at', 'desc')->search()->paginate(6)->withQueryString();
        return view('client.form.shop', compact("title", "products"));
    }


    public function show(string $id)
    {
        $products = Product::all();
        $product = $products[$id];
        $productHot = Product::hot()->get();
        return view('client.form.product', compact("product", "productHot"));
    }
    public function related(string $id) {
        $title = 'Sản phẩm';
        $products = Product::where('category_id',$id)->search()->paginate(6)->withQueryString();
        return view('client.form.shop', compact("title", "products"));
    }
}
