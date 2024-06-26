<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $title = 'Giỏ hàng';
        $cartItemAll = [];
        $cart = Cart::where('user_id', Auth::id())->first();
        if ($cart) {
            $cartItemAll = CartItem::where('cart_id', $cart->id)->get();
        }
        return view('client.form.cart', compact("title", "cartItemAll"));
    }
    public function checkout()
    {
        $title = 'Thanh toán';
        $cart = Cart::where('user_id', Auth::id())->first();
        $cartItems = CartItem::where('cart_id', $cart->id)->get();
        $payments = OrderPayment::all();
        if (count($cartItems) == 0) {
            // Session chứa các phần tử và không rỗng
            toast('Phải có sản phẩm mới được đặt hàng', 'error');
            return redirect()->back();
        }
        // //Lấy user
        $user = Auth::user();
        return view('client.form.checkout', compact("title", "user", "cartItems", "payments"));
    }

    public function add(string $id)
    {
        // Lấy thông tin sản phẩm từ yêu cầu
        $product = Product::findOrFail($id);
        // Lấy giỏ hàng hiện tại của người dùng
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart && $cart->total_price != 0) {
            // Giỏ hàng hiện tại có total khác 0, không cần tạo mới giỏ hàng
            // Thực hiện các thao tác khác tại đây nếu cần
            $cart = Cart::create([
                'user_id' => Auth::id(),
                // Các trường khác có thể cần thiết cho việc tạo giỏ hàng mới
            ]);
        } else {
            // Nếu không có giỏ hàng hoặc total = 0, tạo mới giỏ hàng
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id()
            ]);
        }
        // Lấy thông tin sản phẩm trong giỏ hàng
        $cartItem = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $product->id
        ]);

        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        if ($cartItem->exists) {
            $cartItem->quantity++;
            $cartItem->total_price = $cartItem->price * $cartItem->quantity;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
            $cartItem->quantity = 1;
            $cartItem->price = $product->price;
            $cartItem->total_price = $product->price * 1;
        }

        // Lưu thông tin sản phẩm trong giỏ hàng
        $cartItem->save();

        // Lấy tất cả các mục trong giỏ hàng sau khi cập nhật
        $cartItemAll = CartItem::where('cart_id', $cart->id)->get();
        // Thêm biến cartItem vào session
        session()->put('cart' . Auth::id(), $cartItemAll);
        // Chuyển hướng người dùng về trang trước đó
        return redirect()->back();
    }
    public function addProduct(string $id, Request $request)
    {
        // Lấy thông tin sản phẩm từ yêu cầu
        $product = Product::findOrFail($id);
        // Lấy giỏ hàng hiện tại của người dùng
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart && $cart->total_price != 0) {
            // Giỏ hàng hiện tại có total khác 0, không cần tạo mới giỏ hàng
            // Thực hiện các thao tác khác tại đây nếu cần
            $cart = Cart::create([
                'user_id' => Auth::id(),
                // Các trường khác có thể cần thiết cho việc tạo giỏ hàng mới
            ]);
        } else {
            // Nếu không có giỏ hàng hoặc total = 0, tạo mới giỏ hàng
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id()
            ]);
        }
        // Lấy thông tin sản phẩm trong giỏ hàng
        $cartItem = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $product->id
        ]);

        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
        if ($cartItem->exists) {
            $cartItem->quantity += $request->quantity_available;
            $cartItem->total_price =  $product->price * $request->quantity_available;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
            $cartItem->quantity = $request->quantity_available;
            $cartItem->price = $product->price;
            $cartItem->total_price =  $product->price * $request->quantity_available;
        }

        // Lưu thông tin sản phẩm trong giỏ hàng
        $cartItem->save();

        // Lấy tất cả các mục trong giỏ hàng sau khi cập nhật
        $cartItemAll = CartItem::where('cart_id', $cart->id)->get();
        // Thêm biến cartItem vào session
        session()->put('cart' . Auth::id(), $cartItemAll);
        // Chuyển hướng người dùng về trang trước đó
        return redirect()->back();
    }
    public function logout(string $id)
    {
        // Lấy giỏ hàng từ session
        $cart = session('cart' . Auth::id());
        CartItem::where('id', $cart[$id]->id)->delete();
        unset($cart[$id]);
        // Cập nhật lại chỉ số index
        // array_values($cart->toArray());
        session()->put('cart' . Auth::id(), $cart);
        // Chuyển hướng về trang hiển thị giỏ hàng
        return redirect()->back();
    }

    public function payment(OrderRequest $request)
    {
        // dd($request);
        if ($request->payment == 1) {
            $this->cash_pay($request); // Sửa lại từ cast_pay thành cash_pay
            alert('Đặt hàng thành công', 'Cảm ơn quý khách đã tin tưởng dịch vụ của E-shop', 'success');
            return redirect()->route('client.home');
        }
        if ($request->payment == 2) {
            return $this->momo($request);
            // alert('Đặt hàng thành công', 'Cảm ơn quý khách đã tin tưởng dịch vụ của E-shop', 'success');
            // return redirect()->route('client.home');
        }
        if ($request->payment === 'credit') {
            $this->credit_pay($request);
        }
        // toast('Bạn chưa chọn phương thức thanh toán','error');
        toast('Bạn chưa chọn phương thức thanh toán', 'error');

        return redirect()->back()->withInput();
    }

    protected function cash_pay($inf)
    {
        $order = Order::where('user_id', Auth::id())->first();
        if ($order) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'status_id' => 1,
                'payment_id' => $inf->payment,
                'quantity' => $inf->quantity,
                'total_price' => $inf->total_price,
                'name' => $inf->name,
                'phone' => $inf->phone,
                'email' => $inf->email,
                'address' => $inf->address,
                'customer_notes' => $inf->customer_notes,
            ]);
        } else {
            // Tạo order nếu chưa có
            $order = Order::firstOrCreate([
                'user_id' => Auth::id(),
                'status_id' => 1,
                'payment_id' => $inf->payment,
                'quantity' => $inf->quantity,
                'total_price' => $inf->total_price,
                'name' => $inf->name,
                'phone' => $inf->phone,
                'email' => $inf->email,
                'address' => $inf->address,
                'customer_notes' => $inf->customer_notes,

            ]);
        }
        //Gắn những sp từ cart item sản order detail
        $cart = Cart::where('user_id', Auth::id())->first();
        $cartItemAll = CartItem::where('cart_id', $cart->id)->get();
        foreach ($cartItemAll as $item) {
            $orderDetail = OrderDetail::firstOrCreate([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->total_price
            ]);
            $product = Product::where('id', $item->product_id)->get()->first();
            Product::where('id', $item->product_id)->update([
                'quantity_available' => $product->quantity_available - $item->quantity,
            ]);
        }
        session()->forget('cart' . Auth::id());
        $cart->delete();
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    protected function momo($inf)
    {
        // dd($inf->request->all());
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $inf->total_price;
        $orderId = time() . "";
        $redirectUrl = "http://localhost:8000/momo-return";
        $ipnUrl = "http://localhost:8000/";
        $extraData = "$inf->name,$inf->email,$inf->phone,$inf->address,$inf->customer_notes,$inf->quantity";



        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        //Just a example, please check more in there
        return redirect()->to($jsonResult['payUrl']);
    }
    protected function credit_pay($inf)
    {
        dd('credit');
        alert('Đặt hàng thành công', 'Cảm ơn quý khách đã tin tưởng dịch vụ của E-shop', 'success');
        return redirect()->route('client.home');
    }
}
