@extends('client.layout')
@section('title', 'Shop')
@section('content')
    <!-- Breadcrumbs -->
    <x-layout.breadcrumb :title="$title">
    </x-layout.breadcrumb>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Product Style -->
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Danh mục</h3>
                            <ul class="categor-list">
                                @foreach ($categories as $cg)
                                    <li><a href="{{route('client.shop.related',$cg->id)}}">{{$cg->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Shop By Price -->
                        <div class="single-widget range">
                            <h3 class="title">Shop by Price</h3>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range:</span><input type="text" id="amount" name="price"
                                                placeholder="Add Your Price" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="check-box-list">
                                <li>
                                    <label class="checkbox-inline" for="1"><input name="news" id="1"
                                            type="checkbox">$20
                                        - $50<span class="count">(3)</span></label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="2"><input name="news" id="2"
                                            type="checkbox">$50
                                        - $100<span class="count">(5)</span></label>
                                </li>
                                <li>
                                    <label class="checkbox-inline" for="3"><input name="news" id="3"
                                            type="checkbox">$100 - $250<span class="count">(8)</span></label>
                                </li>
                            </ul>
                        </div>
                        <!--/ End Shop By Price -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Show :</label>
                                        <select>
                                            <option selected="selected">09</option>
                                            <option>15</option>
                                            <option>25</option>
                                            <option>30</option>
                                        </select>
                                    </div>
                                    <div class="single-shorter">
                                        <label>Sort By :</label>
                                        <select>
                                            <option selected="selected">Name</option>
                                            <option>Price</option>
                                            <option>Size</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    <li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
                                    <li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $key => $pd)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('client.product', $pd->id) }}">
                                            <img class="default-img" src="{{ asset('images/' . $pd->image) }}"
                                                alt="#">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                    data-productName="products" data-productId="{{ $key }}"><i
                                                        class=" ti-eye"></i><span>Quick
                                                        Shop</span></a>
                                                <a title="Wishlist"><i class=" ti-heart "></i><span>Add to
                                                        Wishlist</span></a>
                                                <a title="Compare"><i class="ti-bar-chart-alt"></i><span>Add
                                                        to
                                                        Compare</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="{{route('client.cart.add',$pd->id)}}">Thêm vào giỏ
                                                    hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">{{ $pd->name }}</a></h3>
                                        <div class="product-price">
                                            <span>{{ number_format($pd->price, 2, ',', ',') }}đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="my-5 d-flex justify-content-center">
                        {{ $products->appends(request()->all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--/ End Product Style 1  -->
    @php
        $products = [
            'products' => $products,
        ];
    @endphp

    <!-- Modal -->
    <x-layout.formModal varing="data-productId" name="data-productName" :array="$products">

    </x-layout.formModal>
    <!-- Modal end -->
@endsection
