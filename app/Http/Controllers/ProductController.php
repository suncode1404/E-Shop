<?php

namespace App\Http\Controllers;

use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

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
        $title = $products[$id]->name;
        return view('client.form.product', compact("title"));
    }
}
