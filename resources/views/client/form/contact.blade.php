@extends('client.layout')

@section('title', 'Liên hệ')

@section('content')
    <!-- Breadcrumbs -->
    <x-layout.breadcrumb :title="$title">
    </x-layout.breadcrumb>
    <!-- End Breadcrumbs -->

    <!-- Start Contact -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4>Liên lạc</h4>
                                <h3>Để lại lời nhắn</h3>
                            </div>
                            <form class="form" method="post" action="{{ route('client.contact.email') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Tên<span>*</span></label>
                                            <input name="name" type="text" placeholder="" value="{{old('name')}}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Chủ đề<span>*</span></label>
                                            <input name="subject" type="text" placeholder="" value="{{old('subject')}}">
                                            @error('subject')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
                                            <input name="email" type="email" placeholder="" value="{{old('email')}}">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Số điện thoại<span>*</span></label>
                                            <input name="phone" type="text" placeholder="" value="{{old('phone')}}">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group message">
                                            <label>Ghi chú<span>*</span></label>
                                            <textarea name="message" placeholder="">{{old('message')}}</textarea>
                                            @error('message')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
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
                    <div class="col-lg-4 col-12">
                        <div class="single-head">
                            <div class="single-info">
                                <i class="fa fa-phone"></i>
                                <h4 class="title">Gọi cho chúng tôi:</h4>
                                <ul>
                                    <li>+123 456-789-1120</li>
                                    <li>+522 672-452-1120</li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-envelope-open"></i>
                                <h4 class="title">Email:</h4>
                                <ul>
                                    <li><a href="mailto:info@yourwebsite.com">SunDev@website.com</a></li>
                                    <li><a href="mailto:info@yourwebsite.com">thitrungtinh@gmail.com/a></li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-location-arrow"></i>
                                <h4 class="title">Địa chỉ:</h4>
                                <ul>
                                    <li>A68e Bình Phước,Bình Nhâm,Thuân An - Bình Dương.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

@endsection
