<div class="col-md-2 d-none d-md-none d-lg-block shadow p-3 bg-body rounded">
    <div class="m-3 aside">
        <div class="aside-header m-4">
            <img src="{{asset('images/logo.png')}}" alt="" class="img-fluid">
            {{-- <h5 class="aside-title" id="asideExampleLabel">Ảnh logo</h5> --}}
        </div>
        <div class="aside-body">
            <div>
                <!-- Dashbroad -->
                <div class="list-group list-group-flush Dashbroad">
                    <button type="button"
                        class="list-group-item list-group-item d-flex justify-content-between border border-0 py-3"
                        aria-current="true" data-bs-toggle="collapse" href="#Dashbroad" role="button"
                        aria-expanded="false" aria-controls="Dashbroad">
                        <div class="fw-medium">
                            <i class="bi bi-house-door pe-2"></i>Dashbroad
                        </div>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="collapse" id="Dashbroad">
                        <div class="list-group list-group-flush ">
                            <div class="list-group-item border border-0 py-3 px-4 ">Thống kê doanh thu tháng
                            </div>
                            <div class="list-group-item border border-0 py-3 px-4">Thống kê doanh thu ngày</div>
                            <div class="list-group-item border border-0 py-3 px-4">Thống kê doanh thu năm</div>
                        </div>
                    </div>

                </div>

                <!-- Vender -->
                <div class="list-group list-group-flush Vender">
                    <button type="button"
                        class="list-group-item list-group-item d-flex justify-content-between border border-0 py-3"
                        aria-current="true" data-bs-toggle="collapse" href="#Vender" role="button"
                        aria-expanded="false" aria-controls="Vender">
                        <div class="fw-medium">
                            <i class="bi bi-shop-window pe-2"></i>Thống kê vender
                        </div>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="collapse" id="Vender">
                        <div class="list-group list-group-flush ">
                            <div class="list-group-item border border-0 py-3 px-4 ">Thống kê doanh thu tháng
                            </div>
                            <div class="list-group-item border border-0 py-3 px-4">Thống kê doanh thu ngày</div>
                            <div class="list-group-item border border-0 py-3 px-4">Thống kê doanh thu năm</div>
                        </div>
                    </div>

                </div>

                <!-- Quản lý xe bán hàng -->
                <div class="list-group list-group-flush BuyCar">
                    <button type="button"
                        class="list-group-item list-group-item d-flex justify-content-between border border-0 py-3"
                        aria-current="true" data-bs-toggle="collapse" href="#BuyCar" role="button"
                        aria-expanded="false" aria-controls="BuyCar">
                        <div class="fw-medium">
                            <i class="bi bi-basket2 pe-2"></i>Quản lý xe bán hàng
                        </div>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="collapse" id="BuyCar">
                        <div class="list-group list-group-flush ">
                            <div class="list-group-item border border-0 py-3 px-4 ">Thống kê doanh thu tháng
                            </div>
                            <div class="list-group-item border border-0 py-3 px-4">Thống kê doanh thu ngày</div>
                            <div class="list-group-item border border-0 py-3 px-4">Thống kê doanh thu năm</div>
                        </div>
                    </div>

                </div>

                <!-- Quản lý nhân viên -->
                <div class="list-group list-group-flush Employee">
                    <button type="button"
                        class="list-group-item list-group-item d-flex justify-content-between border border-0 py-3"
                        aria-current="true" data-bs-toggle="collapse" href="#Employee" role="button"
                        aria-expanded="false" aria-controls="Employee">
                        <div class="fw-medium">
                            <i class="bi bi-person-gear pe-2"></i>Quản lý nhân viên
                        </div>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="collapse" id="Employee">
                        <div class="list-group list-group-flush ">
                            <div class="list-group-item border border-0 py-3 px-4 ">Danh sách nhân viên </div>

                        </div>
                    </div>

                </div>

                <!-- Quản lý menu -->
                <div class="list-group list-group-flush Menu">
                    <button type="button"
                        class="list-group-item list-group-item d-flex justify-content-between border border-0 py-3"
                        aria-current="true" data-bs-toggle="collapse" href="#Menu" role="button"
                        aria-expanded="false" aria-controls="Menu">
                        <div class="fw-medium">
                            <i class="bi bi-table pe-2"></i>Quản lý menu
                        </div>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="collapse" id="Menu">
                        <div class="list-group list-group-flush ">
                            <div class="list-group-item border border-0 py-3 px-4 ">Danh sách thực đơn</div>
                            <div class="list-group-item border border-0 py-3 px-4 ">Trạng thái các thực đơn
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-10 d-none d-md-none d-lg-block">
    <div class="container mt-3">
        <form class="position-relative" role="search">
            <input class="form-control px-5 shadow-sm p-3 mb-5 bg-body rounded" type="text" placeholder="Tìm kiếm..."
                aria-label="Search">
            <div class="position-absolute top-50 start-0 translate-middle-y px-3 d-none d-md-none d-lg-block">
                <i class="bi bi-search "></i>
            </div>
            <div class="position-absolute top-50 end-0 translate-middle-y px-3">
                <div class="user img-fluid">
                    <div class="dropdown">
                        <img src="{{asset('images/user.png')}}" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                            class="img-fluid rounded-circle">
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                            <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                            <li><a class="dropdown-item" href="{{route('account.logout')}}">Đăng xuất</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </form>
    </div>