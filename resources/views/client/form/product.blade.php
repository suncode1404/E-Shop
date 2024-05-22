@extends('client.layout')
@section('title', 'Sản phẩm')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/detail/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail/plugins.css') }}">
@endpush
@section('content')
    <!-- Breadcrumbs -->
    <x-layout.breadcrumb :title="$product->name">
    </x-layout.breadcrumb>
    </div>
    <!-- End Breadcrumbs -->


    <!-- Product Details Section End -->
    <div class="py-5">
        <!--product details start-->
        <div class="product_details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#" class="d-flex justify-content-center">
                                    <img id="zoom1" src="{{ asset('images/' . $product->image) }}"
                                        class="img-main_product">
                                </a>
                            </div>

                            {{-- @if (!empty($thumbnail))
                                <div class="thumbnail-container">
                                    <ul class="px-0">
                                        <li class="thumbnail-items">
                                            <a href="#" class="thumbnail-link"
                                                data-image="">
                                                <img src="" alt=""
                                                    class="thumbnail-img">
                                            </a>
                                        </li>
                                    </ul>
                                    @foreach ($thumbnail as $n)
                                        <ul class="px-0">
                                            <li class="thumbnail-items">
                                                <a href="#" class="thumbnail-link"
                                                    data-image="">
                                                    <img src=""
                                                        alt="" class="thumbnail-img">
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            @endif --}}
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="product_d_right">
                            <form action="" method="POST">
                                @csrf
                                <h1 class="text-uppercase"
                                    style="color: #000;opacity:1;font-weight:600;letter-spacing:3px;font-size:26px;">
                                    {{$product->name}}</h1>
                                <div class=" product_ratting">
                                    <ul class="px-0">
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li><a href="#"><i class="bi bi-star-fill"></i></a></li>
                                        <li class="review"><a href="#"> 1 đánh giá</a></li>
                                    </ul>
                                </div>
                                <div class="product_price">
                                    <span class="current_price" style="font-size: 30px;">{{ $product->price }}</span>

                                </div>
                                <div class="product_desc">
                                    <p>{{$product->description}}</p>
                                </div>

                                <div class="product_variant color">
                                    <h3>Bảo hành 1 năm kể từ ngày mua</h3>
                                </div>
                                <div class="product_variant quantity">
                                    <button class="button" type="submit">Mua ngay</button>
                                    <button class="button" type="submit">Thêm vào giỏ hàng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product details end-->

        <!--product info start-->
        <div class="product_d_info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab"
                                            aria-controls="info" aria-selected="false">Mô tả</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                            aria-selected="false">Thông số kỹ thuật</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                            aria-selected="false">Đánh giá</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>mo ta</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    <div class="product_d_table">
                                        <form action="#">
                                            <table>
                                                <tbody>
                                                    @if (isset($specifications))
                                                        <tr>
                                                            <td class="first_child">Hãng</td>
                                                            <td>{{ $specifications->company }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Dòng máy</td>
                                                            <td>{{ $specifications->type }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Ram</td>
                                                            <td>{{ $specifications->ram }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Dung lượng</td>
                                                            <td>{{ $specifications->Capacity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Kích thước màn hình</td>
                                                            <td>{{ $specifications->screen_size }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">card màn hình</td>
                                                            <td>{{ $specifications->card_screen }}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="product_review_form">
                                        <form action="#">
                                            <h2>Gửi đánh giá của bạn</h2>
                                            <p>Địa chỉ email của bạn sẽ được bảo mật</p>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Đánh giá của bạn</label>
                                                    <textarea name="comment" id="review_comment"></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Tên</label>
                                                    <input id="author" type="text">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="text">
                                                </div>
                                            </div>
                                            <button type="submit">Gửi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product info end-->

    </div>


    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm Hot</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach ($productHot as $key => $pdH)
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('client.product', $pdH->id) }}">
                                        <img class="default-img" src="{{ asset('images/' . $pdH->image) }}"
                                            alt="#">
                                        <span class="out-of-stock">Hot</span>
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                data-productName="productHot" data-productId="{{ $key }}"><i
                                                    class=" ti-eye"></i><span>Xem
                                                    nhanh sản
                                                    phẩm</span></a>
                                            <a title="Wishlist"><i class=" ti-heart "></i><span>Add to
                                                    Wishlist</span></a>
                                            <a title="Compare"><i class="ti-bar-chart-alt"></i><span>Add to
                                                    Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="#">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('client.product', $pdH->id) }}">{{ $pdH->name }}</a></h3>
                                    <div class="product-price">
                                        {{-- <span class="old">{{$pdH->price}}</span> --}}
                                        <span>{{ number_format($pdH->price, 2, ',', ',') }}đ</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->


    @php
        $products = [
            'productHot' => $productHot,
        ];
    @endphp

    <!-- Modal -->
    <x-layout.formModal varing="data-productId" name="data-productName" :array="$products">

    </x-layout.formModal>
@endsection
