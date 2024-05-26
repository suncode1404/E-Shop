@extends('client.layout')
@section('title', 'Sản phẩm')
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
                                    <img id="mainImage" src="{{ asset('images/' . $product->image) }}"
                                        class="img-main_product">
                                </a>
                            </div>

                            <div class="thumbnail-container">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-3 col-sm-4">
                                        <img src="{{ asset('images/product_1.webp') }}" class="img-fluid thumbnail">
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <img src="{{ asset('images/' . $product->image) }}" class="img-fluid thumbnail">
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <img src="{{ asset('images/' . $product->image) }}" class="img-fluid thumbnail">
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <img src="{{ asset('images/' . $product->image) }}" class="img-fluid thumbnail">
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
                                <p id="description">{{ $product->description }}</p>
                            </div>
                            <form action="{{route('client.cart.addProduct',$product->id)}}" method="POST">
                                @csrf
                                {{-- Quantity --}}
                                <x-function.incr-des_button nameInput="quantity_available"
                                    defaultValue="{{ $product->quantity_available }}">
    
                                </x-function.incr-des_button>
                                <div class="add-to-cart">
                                    <button type="submit" class="btn">Add to cart</button>
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
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
                            <p id="description">{{ $product->description }}</p>
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
                                <td>Intel, Core i5, 12450HX</td>
                            </tr>
                            <tr>
                                <td>RAM</td>
                                <td>16 GB (2 thanh 8 GB), DDR5, 4800 MHz</td>
                            </tr>
                            <tr>
                                <td>Ổ cứng</td>
                                <td>SSD 512 GB</td>
                            </tr>
                            <tr>
                                <td>Đồ họa</td>
                                <td>NVIDIA GeForce RTX 2050 4GB GDDR6</td>
                            </tr>
                            <tr>
                                <td>Hệ điều hành</td>
                                <td>Windows 11 Home Single Language (ColorOS 13.1)Windows 11 Home Single Language</td>
                            </tr>
                            <tr>
                                <td>Trọng lượng</td>
                                <td>2.38 kg</td>
                            </tr>
                            <tr>
                                <td>Kích thước</td>
                                <td>359.86 x 258.7 x 21.9-23.9 mm</td>
                            </tr>
                            <tr>
                                <td>Xuất xứ</td>
                                <td>Trung Quốc</td>
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

    <script>
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

        // function initializeQuantityControls(containerSelector) {
        //     const container = document.querySelector(containerSelector);
        //     if (!container) {
        //         console.error(`Container not found: ${containerSelector}`);
        //         return;
        //     }

        //     const minusButton = container.querySelector('.button.minus button');
        //     const plusButton = container.querySelector('.button.plus button');
        //     const input = container.querySelector('.input-number');
        //     const min = parseInt(input.getAttribute('data-min'));
        //     const max = parseInt(input.getAttribute('data-max'));

        //     function updateButtons() {
        //         const value = parseInt(input.value);
        //         minusButton.disabled = (value <= min);
        //         plusButton.disabled = (value >= max);
        //     }

        //     minusButton.addEventListener('click', function() {
        //         let value = parseInt(input.value);
        //         if (value > min) {
        //             value--;
        //             input.value = value;
        //             updateButtons();
        //         }
        //     });

        //     plusButton.addEventListener('click', function() {
        //         let value = parseInt(input.value);
        //         if (value < max) {
        //             value++;
        //             input.value = value;
        //             updateButtons();
        //         }
        //     });

        //     input.addEventListener('input', function() {
        //         let value = parseInt(input.value);
        //         if (isNaN(value) || value < min) {
        //             input.value = min;
        //         } else if (value > max) {
        //             input.value = max;
        //         }
        //         updateButtons();
        //     });

        //     input.addEventListener('blur', function() {
        //         let value = parseInt(input.value);
        //         if (isNaN(value) || value < min) {
        //             input.value = min;
        //         } else if (value > max) {
        //             input.value = max;
        //         }
        //         updateButtons();
        //     });

        //     // Initialize the button states
        //     updateButtons();
        // }
        // document.addEventListener('DOMContentLoaded', function() {
        //     initThumbnailClickEvent();
        //     initializeQuantityControls('.quantity');
        // });
    </script>
@endsection
