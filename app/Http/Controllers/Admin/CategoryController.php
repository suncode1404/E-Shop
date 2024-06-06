<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::orderBy('id','desc')->paginate(10);
        return view('admin.form.category.list', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = route('admin.category.store');
        $method = 'POST';
        $title = 'Thêm';
        return view('admin.form.category.store', compact('route', 'method', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // Nhận dữ liệu từ request
        $data = $request->only(['name', 'priority', 'hidden']);

        // Tạo một đối tượng mới từ model Category và lưu dữ liệu
        $category = new Categories();
        $category->fill($data);
        $category->save();
        toast('Bạn đã thêm danh mục thành công', 'success');
        return redirect()->route('admin.category.index');
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
        $category = Categories::where('id', $id)->get()->first();
        $route = route('admin.category.update', $id);
        $method = 'PUT';
        $title = 'Sửa';
        return view('admin.form.category.store', compact('category', 'route', 'method', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Categories::findOrFail($id);
        $category->fill($request->only(['name', 'priority ', 'hidden']));
        $category->save();
        toast('Bạn đã sửa danh mục thành công', 'success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();
        toast('Bạn đã xóa danh mục thành công', 'success');
        return redirect()->route('admin.category.index');
    }
}
