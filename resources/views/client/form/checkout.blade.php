@extends('client.layout')
@section('title', 'Thanh toán')
@section('content')
    <!-- Breadcrumbs -->

    <x-layout.breadcrumb :title="$title">
    </x-layout.breadcrumb>
    <!-- End Breadcrumbs -->

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <form class="form" action="{{ route('client.cart.payment') }}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2 class="my-2">Hãy thanh toán ở đây</h2>
                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Tên<span>*</span></label>
                                        <input type="text" name="name"
                                            value="{{ old('name', $user->name) }}">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email<span>*</span></label>
                                        <input type="text" name="email" value="{{ old('email', $user->email) }}"
                                            readonly>
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Địa chỉ<span>*</span></label>
                                        <input type="text" name="address" value="{{ old('address', $user->address) }}">
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Số điện thoại<span>*</span></label>
                                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Ghi chú </label>
                                        <input type="text" name="customer_notes" value="{{ old('customer_notes') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <?php $totalPay = 0;
                                    $quantity = 0; ?>
                                    @foreach ($cartItems as $key => $item)
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('images/product/' . $item->product->image) }}"
                                                        class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $item->product->name }}</h5>
                                                        <p class="card-text">{{ $item->product->short_description }}</p>
                                                        <p class="quantity">Số lượng: {{ $item->quantity }} - <span
                                                                class="amount">{{ number_format($item['price'], 2, '.', '.') }}vnđ</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $totalPay += $item->product->price * $item->quantity;
                                        $quantity += $item->quantity;
                                        ?>
                                    @endforeach
                                </div>
                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Tổng giỏ hàng</h2>
                                <div class="content">
                                    <ul>
                                        <li>Sub Total<span>{{ number_format($totalPay, 2, '.', '.') }}đ</span></li>
                                        <li>(+) Shipping<span>00đ</span></li>
                                        <li class="last">Total<span>{{ number_format($totalPay, 2, '.', '.') }}đ</span>
                                        </li>
                                        <input type="hidden" name="total_price" value="{{ $totalPay }}">
                                        <input type="hidden" name="quantity" value="{{ $quantity }}">
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Thanh toán</h2>
                                <div class="content d-flex flex-column p-4">
                                    @foreach ($payments as $pay)
                                        <label><input type="radio" name="payment"
                                                value="{{ $pay->id }}">{{ $pay->name }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="{{ asset('images/payment-method.png') }}" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit" class="btn">Xác nhận thanh toán</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
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
    <!-- End Shop Services -->
@endsection
