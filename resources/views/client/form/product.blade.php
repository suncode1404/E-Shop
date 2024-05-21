@extends('client.layout')
@section('title', 'Sản phẩm')
@section('content')
    <!-- Breadcrumbs -->
    <x-layout.breadcrumb :title="$title">
    </x-layout.breadcrumb>
    </div>
    <!-- End Breadcrumbs -->
    <section class="product-details ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/product_1.webp') }}" class="img-fluid d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/product_1.webp') }}" class="img-fluid d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/product_1.webp') }}" class="img-fluid d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/product_1.webp') }}" class="img-fluid d-block w-100"
                                    alt="...">
                            </div>
                        </div>
                        <div class="row my-4 px-2 ">
                            <img class="col-6 my-2 col-md-3" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="0" aria-label="Slide 1" src="{{ asset('images/product_1.webp') }}">

                            <img class=" col-6 my-2 col-md-3" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="1" aria-label="Slide 2" src="{{ asset('images/product_1.webp') }}"
                                alt="">

                            <img class=" col-6 my-2 col-md-3" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="2" aria-label="Slide 2" src="{{ asset('images/product_1.webp') }}"
                                alt="">

                            <img class=" col-6 my-2 col-md-3" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="3" aria-label="Slide 2" src="{{ asset('images/product_1.webp') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
