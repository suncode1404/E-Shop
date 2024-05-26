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
                            @foreach ($cartItemAll as $key => $item)
                                <tr>
                                    <td class="image" data-title="No"><img class="image-fluid"
                                            src="{{ asset('images/' . $item->product->image) }}" alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="{{route('client.product',$item->product->id)}}">{{ $item->product->name }}</a></p>
                                        <p class="product-des">{{ $item->product->short_description }}</p>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <span>{{ number_format($item->product->price, 2, '.', '.') }}đ</span>
                                    </td>
                                    <td class="qty" data-title="Qty"><!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                    disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                data-max="100" value="{{ $item->quantity }}">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                    data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total">
                                        <span>{{ number_format($item->product->price * $item->quantity, 2, '.', '.') }}đ</span></td>
                                    <td class="action" data-title="Remove"><a href="{{ route('client.cart.logout', $key) }}"><i
                                                class="ti-trash remove-icon"></i></a></td>
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
                                        <li>Cart Subtotal<span>$330.00</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>You Save<span>$20.00</span></li>
                                        <li class="last">You Pay<span>$310.00</span></li>
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
