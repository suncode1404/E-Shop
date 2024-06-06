<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(4);
        return view('admin.form.product.list', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = route('admin.product.store');
        $method = 'POST';
        $title = 'Thêm';
        $categories = Categories::all();
        return view('admin.form.product.store', compact('route', 'method', 'title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $file_name = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->extension();
            $file_name = time() . '-' . 'product.' . $ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $data = $request->all();
        $data['image'] = $file_name;
        Product::create($data);
        toast('Bạn đã thêm sản phẩm thành công', 'success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->get()->first();
        $route = route('admin.product.update', $id);
        $method = 'PUT';
        $title = 'Sửa';
        return view('admin.form.product.store', compact('product', 'route', 'method', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);


        $file_name = null;
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ (nếu có)
            $oldImagePath = public_path('images/product/' . $product->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            // Lưu ảnh mới
            $image = $request->file('image');
            $imageName = time() . '-' . 'product.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/product'), $imageName);
        }
        $product->fill($request->only(['name', 'category_id ', 'description', 'short_description', 'quantity_available', 'price', 'hot', 'heart', 'view', 'hidden']));
        $product->updated_at = now();
        $product->image = $imageName ?? $request->image;
        $product->save();
        toast('Bạn đã sửa sản phẩm thành công', 'success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $imagePath = public_path('images/product/' . $product->image);
        File::delete($imagePath);
        $product->delete();
        toast('Bạn đã xóa sản phẩm thành công', 'success');
        return redirect()->route('admin.product.index');
    }
}
