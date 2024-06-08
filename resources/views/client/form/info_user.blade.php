@extends('client.layout')
@section('title', 'Thông tin người dùng')
@push('css')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-sidebar {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 50%;
            border-radius: 50%;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-usermenu {
            margin-top: 30px;
        }

        .profile-usermenu ul li {
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
            border-bottom: none;
        }

        .profile-usermenu ul li a {
            color: #93a3b5;
            font-size: 14px;
            font-weight: 400;
        }

        .profile-usermenu ul li a i {
            margin-right: 8px;
            font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
            background-color: #fafcfd;
            color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
            border-bottom: none;
        }

        .profile-usermenu ul li.active a {
            color: #5b9bd1;
            background-color: #f6f9fb;
            border-left: 2px solid #5b9bd1;
            margin-left: -2px;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
@endpush
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3 profile-sidebar">
                <div class="profile-userpic justify-content center d-flex">
                    <img src="https://via.placeholder.com/150" class="img-fluid" alt="Hình ảnh cá nhân">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
                    <div class="profile-usertitle-job">WEB DEVELOPER</div>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{route('client.user.info')}}" class="nav-link active">
                                <i class="fa fa-info-circle"></i>
                                Cập nhật thông tin cá nhân
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('client.user.resetPassword')}}" class="nav-link">
                                <i class="bi bi-key-fill"></i>
                               Đổi mật khẩu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-heart"></i>
                                Sản phẩm yêu thích
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('client.order')}}" class="nav-link">
                                <i class="fa fa-shopping-cart"></i>
                                Quản lý đơn hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-envelope"></i>
                                Tin nhắn
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 content">
                @yield('info_content')
                
            </div>
        </div>
    </div>
@endsection
