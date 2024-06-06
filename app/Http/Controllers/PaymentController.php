<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function handleMoMoNotification(Request $request)
    {
        // Ghi lại yêu cầu thông báo
        // Log::info('Thông báo từ MoMo:', $request->all());

        // Trích xuất dữ liệu từ yêu cầu
        $data = $request->all();
        $partnerCode = $data['partnerCode'];
        $orderId = $data['orderId'];
        $requestId = $data['requestId'];
        $amount = $data['amount'];
        $orderInfo = $data['orderInfo'];
        $orderType = $data['orderType'];
        $transId = $data['transId'];
        $resultCode = $data['resultCode'];
        $message = $data['message'];
        $payType = $data['payType'];
        $responseTime = $data['responseTime'];
        $extraData = $data['extraData'];
        $signature = $data['signature'];

        // Xác minh chữ ký
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $rawHash = "partnerCode=" . $partnerCode . "&orderId=" . $orderId . "&requestId=" . $requestId . "&amount=" . $amount . "&orderInfo=" . $orderInfo . "&orderType=" . $orderType . "&transId=" . $transId . "&resultCode=" . $resultCode . "&message=" . $message . "&payType=" . $payType . "&responseTime=" . $responseTime . "&extraData=" . $extraData;
        $computedSignature = hash_hmac("sha256", $rawHash, $secretKey);

        if ($computedSignature === $signature && $resultCode == '0') {
            // Thanh toán thành công, tạo đơn hàng
            // Tạo đơn hàng trong cơ sở dữ liệu
            // Ví dụ:
            // Order::create([
            //     'order_id' => $orderId,
            //     'amount' => $amount,
            //     'status' => 'paid',
            //     'transaction_id' => $transId,
            // ]);

            dd('tạo order thanh công');
            // Log::info('Đơn hàng được tạo thành công cho orderId: ' . $orderId);
        } else {
            dd('Chữ ký MoMo không hợp lệ hoặc thanh toán thất bại cho orderId');
            // Log::error('Chữ ký MoMo không hợp lệ hoặc thanh toán thất bại cho orderId: ' . $orderId);
        }

        // Trả lời với HTTP 200 để xác nhận đã nhận được thông báo
        return response()->json(['status' => 'success'], 200);
    }
    public function handleMoMoReturn()
    {
        $resultCode = $_GET["resultCode"];
        $amount = $_GET["amount"];
        $extraData = $_GET["extraData"];
        $dataArray = explode(",", $extraData);
        $dataObject = [
            "name" => $dataArray[0],
            "email" => $dataArray[1],
            "phone" => $dataArray[2],
            "address" => $dataArray[3],
            "customer_notes" => $dataArray[4],
            "quantity" => $dataArray[5],
        ];

        if ($resultCode == '0') {
            $order = Order::where('user_id', Auth::id())->first();
            if ($order) {
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'status_id' => 1,
                    'payment_id' => 2,
                    'quantity' => $dataObject['quantity'],
                    'total_price' => $amount,
                    'name' => $dataObject['name'],
                    'phone' => $dataObject['phone'],
                    'email' => $dataObject['email'],
                    'address' => $dataObject['address'],
                    'customer_notes' => $dataObject['customer_notes'],
                ]);
            } else {
                // Tạo order nếu chưa có
                $order = Order::firstOrCreate([
                    'user_id' => Auth::id(),
                    'status_id' => 1,
                    'payment_id' => 2,
                    'quantity' => $dataObject['quantity'],
                    'total_price' =>  $amount,
                    'name' => $dataObject['name'],
                    'phone' => $dataObject['phone'],
                    'email' => $dataObject['email'],
                    'address' => $dataObject['address'],
                    'customer_notes' => $dataObject['customer_notes'],

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
            alert('Đặt hàng thành công', 'Cảm ơn quý khách đã tin tưởng dịch vụ của E-shop', 'success');
            return redirect()->route('client.home');
        } else {
            // $result = '<div class="alert alert-danger"><strong>Payment status: </strong>' . $message . '/' . $localMessage . '</div>';
        }
    }
}
