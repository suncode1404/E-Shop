@extends('client.layout')
@section('title', 'Giỏ hàng')
@section('content')
    <!-- Breadcrumbs -->
    <x-layout.breadcrumb :title="$title"></x-layout.breadcrumb>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>ẢNH</th>
                                <th>TÊN</th>
                                <th class="text-center">GIÁ</th>
                                <th class="text-center">SÓ LƯỢNG</th>
                                <th class="text-center">GIÁ TỔNG</th>
                                <th class="text-center">HÀNH ĐỘNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{dd($cartItemAll)}} --}}
                            <?php $totalPay = 0; ?>
                            @foreach ($cartItemAll as $key => $item)
                                <tr>
                                    <td class="image" data-title="No"><img class="image-fluid"
                                            src="{{ asset('images/' . $item->product->image) }}" alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a
                                                href="{{ route('client.product', $item->product->id) }}">{{ $item->product->name }}</a>
                                        </p>
                                        <p class="product-des">{{ $item->product->short_description }}</p>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <span>{{ number_format($item->product->price, 2, '.', '.') }}đ</span>
                                    </td>
                                    <td class="qty" data-title="Qty">
                                        {{-- Quantity --}}
                                        <x-form.field_input type="number" name="quantity_available" error="false"
                                            min="1" max="{{ $item->product->quantity_available }}"
                                            value="{{ $item->quantity }}">
                                        </x-form.field_input>
                                    </td>
                                    <td class="total-amount" id="total-amount" data-title="Total">
                                        <span>{{ number_format($item->product->price * $item->quantity, 2, '.', '.') }}đ</span>
                                    </td>
                                    <td class="action" data-title="Remove"><a
                                            href="{{ route('client.cart.logout', $key) }}"><i
                                                class="ti-trash remove-icon"></i></a></td>
                                    <?php $totalPay += $item->product->price * $item->quantity; ?>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn">Apply</button>
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2"
                                                type="checkbox"> Shipping (+10$)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li id="cartsubtotal">Cart
                                            Subtotal<span>{{ number_format($totalPay, 2, '.', '.') }}đ</span>
                                        </li>
                                        <li>Shipping<span></span></li>
                                        <li>You Save<span></span></li>
                                        <li class="last">You Pay<span>{{ number_format($totalPay, 2, '.', '.') }}đ</span>
                                        </li>
                                    </ul>
                                    <div class="button5">
                                        <a href="{{ route('client.checkout') }}" class="btn">Thanh toán</a>
                                        <a href="{{ route('client.shop') }}" class="btn">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
@endsection

<script>
    document.addEventListener('input', function(event) {
        // Kiểm tra nếu phần tử được thay đổi là một phần tử <input> trong cột "Quantity"
        if (event.target.closest('input[name="quantity_available"]')) {
            // Lấy phần tử cha của phần tử <input>
            let parentTd = event.target.closest('td.qty');
            console.log('Parent TD:', parentTd);

            // Lấy giá trị của phần tử <input>
            let inputValue = parseInt(event.target.value);
            console.log('Input value:', inputValue);

            // Lấy phần tử anh em đầu tiên của phần tử cha (chứa giá cả) 
            let priceElement = parentTd.previousElementSibling.querySelector('span');
            let priceValue = parseFloat(priceElement.textContent.replace('đ', '').replace(',', '.'));
            console.log('Price value:', priceValue);

            // Tính toán tổng mới và cập nhật vào cột "Total"
            let totalAmountElement = parentTd.nextElementSibling.querySelector('span');
            let newTotal = inputValue * priceValue;
            totalAmountElement.textContent = newTotal.toFixed(5) + 'đ';
            console.log(totalAmountElement);
        }
        var a = document.getElementById('total-amount');
        console.log(a);
    });
</script>
