@extends('client.layout')
@section('title', 'Sản phẩm')
@push('css')
    <style>
        .review-summary {
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .review-summary h2 {
            margin: 0;
        }

        .review-summary .rating-breakdown {
            margin-top: 10px;
        }

        .review-summary .rating-breakdown div {
            display: flex;
            align-items: center;
        }

        .review-summary .rating-breakdown div span {
            margin-left: 5px;
        }

        .review-list .review-item {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .review-list .review-item:last-child {
            border-bottom: none;
        }

        .review-list .review-item .reviewer-info {
            font-weight: bold;
        }

        .review-list .review-item .reviewer-info .verified {
            color: green;
            font-size: 0.9rem;
            margin-left: 10px;
        }

        .review-list .review-item .review-date {
            font-size: 0.9rem;
            color: #888;
        }

        .review-list .review-item .review-actions {
            font-size: 0.9rem;
        }

        .review-list .review-item .review-actions a {
            margin-right: 10px;
        }

        .review-list .reply {
            margin-top: 10px;
            margin-left: 30px;
            border-left: 2px solid #ddd;
            padding-left: 10px;
        }

        .review-list .review-item img,
        .review-list .reply img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
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
                                    <img id="mainImage" src="{{ asset('images/product/' . $product->image) }}"
                                        class="img-main_product">
                                </a>
                            </div>

                            <div class="thumbnail-container">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-3 col-sm-4">
                                        <img src="{{ asset('images/product/product_1.webp') }}" class="img-fluid thumbnail">
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <img src="{{ asset('images/product/' . $product->image) }}" class="img-fluid thumbnail">
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <img src="{{ asset('images/product/' . $product->image) }}" class="img-fluid thumbnail">
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <img src="{{ asset('images/product/' . $product->image) }}" class="img-fluid thumbnail">
                                    </div>
                                </div>
                            </div>

                            {{-- @if (!empty($thumbnail))
                            @endif --}}
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="quickview-content">
                            <h2 id="name"> {{ $product->name }}</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                    <div class="quickview-ratting">
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="#"> (1 customer review)</a>
                                </div>
                                <div class="quickview-stock">
                                    <span><i class="fa fa-check-circle-o"></i>{{ $product->quantity_available }} in
                                        stock</span>
                                </div>
                            </div>
                            <h3 id="price">{{ number_format($product->price, 2, '.', '.') }}đ</h3>
                            <div class="quickview-peragraph">
                                <p id="description">{{ $product->short_description }}</p>
                            </div>
                            <form action="{{ route('client.cart.addProduct', $product->id) }}" method="POST">
                                @csrf
                                {{-- Quantity --}}
                                <div class="d-flex align-items-baseline gap-2">
                                    <x-form.field_input type="number" name="quantity_available" error="false"
                                        min="1" max="{{ $product->quantity_available }}" value="1">
                                    </x-form.field_input>
                                    <div class="add-to-cart mx-2">
                                        <button type="submit" class="btn">Add to cart</button>
                                        <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                        <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                                    </div>
                                </div>
                            </form>
                            <div class="default-social">
                                <h4 class="share-now">Share:</h4>
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </li>
                                    <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product details end-->
    </div>

    <!--product info end-->
    <div class="container">
        <div class="product-info">
            <div class="nav-main">
                <!-- Tab Nav -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab"
                            aria-selected="true">Mô tả</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#thongso" role="tab"
                            aria-selected="false">Thông số kỹ thuật</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact" role="tab">Đánh
                            giá</a></li>
                </ul>
                <!--/ End Tab Nav -->
            </div>
            <div class="tab-content" id="myTabContent">
                <!-- Start Single Tab -->
                <div class="tab-pane fade active show" id="description" role="tabpanel">
                    <div class="tab-single">
                        <div class="quickview-peragraph">
                            <p id="description">{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
                <!--/ End Single Tab -->
                <!-- Start Single Tab -->
                <div class="tab-pane fade" id="thongso" role="tabpanel">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Màn hình</td>
                                <td>15.6 inch, 1920 x 1080 Pixels, IPS, 144 , 300 nits, Anti-Glare</td>
                            </tr>
                            <tr>
                                <td>CPU</td>
                                <td>{{$product_specification->cpu}}</td>
                            </tr>
                            <tr>
                                <td>RAM</td>
                                <td>{{$product_specification->ram}}</td>
                            </tr>
                            <tr>
                                <td>Ổ cứng</td>
                                <td>SSD 512 GB</td>
                            </tr>
                            <tr>
                                <td>Màu sắc</td>
                                <td>{{$product_specification->mau_sac}}</td>
                            </tr>
                            <tr>
                                <td>Trọng lượng</td>
                                <td>{{$product_specification->can_nang}}kg</td>
                            </tr>
                            <tr>
                                <td>Năm ra mắt</td>
                                <td>2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--/ End Single Tab -->
                <!-- Start Single Tab -->
                <div class="tab-pane fade" id="contact" role="tabpanel">
                    <section id="contact-us" class="contact-us section">
                        <div class="container">
                            <div class="contact-head">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-main">
                                            <div class="title">
                                                <h3>Liên lạc</h3>
                                                <h4>Để lại lời nhắn</h4>
                                            </div>
                                            <form class="form" method="post" action="mail/mail.php">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label>Tên<span>*</span></label>
                                                            <input name="name" type="text" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label>Chủ đề<span>*</span></label>
                                                            <input name="subject" type="text" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label>Email<span>*</span></label>
                                                            <input name="email" type="email" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group">
                                                            <label>Số điện thoại<span>*</span></label>
                                                            <input name="company_name" type="text" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group message">
                                                            <label>Ghi chú<span>*</span></label>
                                                            <textarea name="message" placeholder=""></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="btn ">Gửi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ End Single Tab -->
            </div>
        </div>
    </div>
    {{-- Bình luận --}}
    <div class="container my-5">
        <div class="review-summary">
            <h2>Đánh giá sản phẩm</h2>
            <form class="py-3" method="post" action="{{ route('client.binhluan') }}">
                <p>
                    <textarea class="form-control shadow-none fs-5" name="content" id="editor" rows="4"
                        placeholder="Mời nhập bình luận"></textarea>
                </p>
                <p class="text-end"> @csrf
                    <input type="hidden" name="id_sp" value="{{ $product->id }}">
                    <button type="submit" class="btn mt-3">Gửi đánh giá</button>
                <p>
            </form>
        </div>
        <div class="review-list">
            <div class="review-item">
                @foreach ($binhluan as $bl)
                    <div class="d-flex align-items-start">
                        <img src="https://via.placeholder.com/50" alt="User image">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="reviewer-info">
                                    <span>{{ $bl->user->name }}</span> <span class="verified">Đã mua tại E-Shop</span>
                                </div>
                            </div>
                            <div class="review-date">Ngày
                                {{ gmdate('d/m/Y H:m:s', strtotime($bl->created_at) + 3600 * 7) }}
                            </div>
                            <div class="review-content">{!! $bl->content !!}</div>
                            <div class="review-actions">
                                <a href="#">Thích (8)</a>
                                <a href="#">Trả lời</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <!-- Repeat the above structure for other reviews -->
        </div>
    </div>
    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach ($productRelated as $key => $pdH)
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('client.product', $pdH->id) }}">
                                        <img class="default-img" src="{{ asset('images/product/' . $pdH->image) }}"
                                            alt="#">
                                        {{-- <span class="out-of-stock">Hot</span>   --}}
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                data-productName="productRelated" data-productId="{{ $key }}"><i
                                                    class=" ti-eye"></i><span>Xem
                                                    nhanh sản
                                                    phẩm</span></a>
                                            <a title="Wishlist"><i class=" ti-heart "></i><span>Add to
                                                    Wishlist</span></a>
                                            <a title="Compare"><i class="ti-bar-chart-alt"></i><span>Add to
                                                    Compare</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="{{ route('client.cart.add', $pdH->id) }}">Thêm
                                                vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('client.product', $pdH->id) }}">{{ $pdH->name }}</a></h3>
                                    <div class="product-price">
                                        {{-- <span class="old">{{$pdH->price}}</span> --}}
                                        <span>{{ number_format($pdH->price, 0, ',', ',') }}đ</span>
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
            'productRelated' => $productRelated,
        ];
    @endphp

    <!-- Modal -->
    <x-layout.formModal varing="data-productId" name="data-productName" :array="$products">

    </x-layout.formModal>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                }
            })
            .catch((error) => {
                console.error(error);
            })

        function initThumbnailClickEvent() {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.thumbnail');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    console.log(1);
                    const newSrc = this.src;
                    mainImage.src = newSrc;
                });
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            initThumbnailClickEvent();
        });
    </script>
@endsection
