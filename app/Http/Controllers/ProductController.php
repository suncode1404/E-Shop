<?php

namespace App\Http\Controllers;

use App\Models\CustomerReview;
use App\Models\Product;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Sản phẩm';
        $id = 0;
        $products = Product::orderBy('created_at', 'desc')->search()->paginate(6)->withQueryString();
        return view('client.form.shop', compact("title", "products", "id"));
    }
    public function show(string $id)
    {
        $product = Product::where('id', $id)->get()->first();
        $product_specification = ProductSpecification::where('product_id',$product->id)->get()->first();
        $productRelated = Product::where('category_id', $product->category_id)->limit(6)->get();

        $binhluan = CustomerReview::where('product_id', $id)->orderBy('created_at', 'asc')->get();
        return view('client.form.product', compact("product", "productRelated", "binhluan","product_specification"));
    }
    public function related(string $id)
    {
        $title = 'Sản phẩm';
        $products = Product::where('category_id', $id)->search()->paginate(6)->withQueryString();
        return view('client.form.shop', compact("title", "products", "id"));
    }
    public function luubinhluan()
    {
        $id_user = Auth::id();
        $arr = request()->post();
        $id_sp = (Arr::exists($arr, 'id_sp')) ? $arr['id_sp'] : "-1";
        $content = (Arr::exists($arr, 'content')) ? $arr['content'] : "";
        // if ($id_sp<=-1) toast('Không biết sp','error'); return redirect()->back();
        if ($content == "") {
            alert('Bình luận của bạn không được chấp nhận', 'Nội dung không có', 'error');
            return redirect()->back();
        }
        CustomerReview::insert([
            'user_id' => $id_user,
            'product_id' => $id_sp,
            'content' => $content,
            'created_at' => now(),
        ]);
        alert('Bạn đã gửi bình luận thành công', 'Cảm ơn bạn đã quan tâm tới sản phẩm của E-shop', 'success');
        return redirect()->back();
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
