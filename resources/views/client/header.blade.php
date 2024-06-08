 <!-- Header -->
 <header class="header shop">
     <div class="middle-inner">
         <div class="container">
             <div class="row">
                 <div class="col-lg-2 col-md-2 col-12">
                     <!-- Logo -->
                     <div class="logo">
                         <a href="{{ route('client.home') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                     </div>
                     <!--/ End Logo -->
                     <!-- Search Form -->
                     <div class="search-top">
                         <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                         <!-- Search Form -->
                         <div class="search-top">
                             <form class="search-form" action="">
                                 @csrf
                                 <input type="text" placeholder="Search here..." name="search">
                                 <button value="search" type="submit"><i class="ti-search"></i></button>
                             </form>
                         </div>
                         <!--/ End Search Form -->
                     </div>
                     <!--/ End Search Form -->
                     <div class="mobile-nav"></div>
                 </div>
                 <div class="col-lg-8 col-md-7 col-12">
                     <div class="search-bar-top">
                         <div class="search-bar">
                             <form>
                                 <input name="search" placeholder="Search Products Here....." type="search">
                                 <button class="btnn"><i class="ti-search"></i></button>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-2 col-md-3 col-12">
                     <div class="right-bar d-flex" style="width: 200px;">
                         <!-- Search Form -->
                         <div class="sinlge-bar">
                             <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                         </div>
                         <div class="sinlge-bar shopping">
                             <a href="{{ route('client.cart') }}" class="single-icon"><i class="ti-bag"></i>
                                 @if (auth()->check())
                                     <span class="total-count">
                                         {{ session('cart' . Auth::id()) ? sizeof(session('cart' . Auth::id())) : 0 }}
                                     </span>
                                 @endif
                             </a>
                             <!-- Shopping Item -->
                             <div class="shopping-item">
                                 <div class="dropdown-cart-header">
                                     <span>
                                         {{ session('cart' . Auth::id()) ? sizeof(session('cart' . Auth::id())) : 0 }}
                                         Items</span>
                                     <a href="#">View Cart</a>
                                 </div>
                                 <ul class="shopping-list">
                                     <?php $totalAmount = 0; ?>
                                     @if (is_array(session('cart' . Auth::id())) || is_object(session('cart' . Auth::id())))
                                         @foreach (session('cart' . Auth::id()) as $key => $sp)
                                             <li>
                                                 <a href="{{ route('client.cart.logout', $key) }}" class="remove"
                                                     title="Remove this item"><i class="fa fa-remove"></i></a>
                                                 <a class="cart-img"
                                                     href="{{ route('client.product', $sp->product->id) }}"><img
                                                         src="{{ asset('images/product/' . $sp->product->image) }}"
                                                         alt="#" class="img-fluid"></a>
                                                 <h4><a href="#">{{ $sp->product->name }}</a></h4>
                                                 <p class="quantity">{{ $sp['quantity'] }} - <span
                                                         class="amount">{{ number_format($sp['price'], 0, '.', '.') }}vnđ</span>
                                                 </p>
                                                 <?php $totalAmount += $sp['total_price']; ?>
                                             </li>
                                         @endforeach
                                     @endif
                                 </ul>
                                 @if (!empty(session('cart' . Auth::id())))
                                     @if (sizeof(session('cart' . Auth::id())) > 0)
                                         <div class="bottom">
                                             <div class="total">
                                                 <span>Total</span>
                                                 <span
                                                     class="total-amount">{{ number_format($totalAmount, 0, '.', '.') }}vnđ</span>
                                             </div>
                                             <a href="{{ route('client.checkout') }}" class="btn animate">Thanh
                                                 toán</a>
                                         </div>
                                     @else
                                         <div class="bottom">
                                             <a href="{{ route('client.shop') }}" class="btn animate">Mua hàng</a>
                                         </div>
                                     @endif
                                 @else
                                     <div class="bottom">
                                         <a href="{{ route('client.shop') }}" class="btn animate">Mua hàng</a>
                                     </div>
                                 @endif
                             </div>
                             <!--/ End Shopping Item -->
                         </div>
                         {{-- Check user --}}
                         @if (auth()->check())
                             <div class="sinlge-bar shopping">
                                 <div class="sinlge-bar d-flex" style="width: 200px;">
                                     <a href="#" class="single-icon"><i class="fa fa-user-circle-o"
                                             aria-hidden="true"></i></a>
                                     <div class="px-2 single-icon">{{ auth()->user()->name }}</div>
                                 </div>
                                 <!-- Shopping Item -->
                                 <div class="shopping-item">
                                     <ul class="shopping-list">
                                         <li>
                                            <a href="{{ route('client.user.info') }}">Thông tin tài khoản</a>
                                        </li>
                                         <li>
                                             <a href="{{ route('client.order') }}">Thông tin đơn hàng</a>
                                         </li>
                                         <li>
                                            <a href="{{ route('client.user.resetPassword') }}">Đổi mặt khẩu</a>
                                        </li>
                                     </ul>
                                     <div class="bottom">
                                         <a href="{{ route('account.logout') }}" class="btn animate">Đăng xuát</a>
                                     </div>
                                 </div>
                                 <!--/ End Shopping Item -->
                             </div>
                         @else
                             <div class="sinlge-bar">
                                 <a href="{{ route('account.login') }}" class="single-icon"><i
                                         class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                             </div>
                         @endif
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Header Inner -->
     <div class="header-inner">
         <div class="container">
             <div class="cat-nav-head">
                 <div class="row">
                     <div class="col-lg-3">
                         <div class="all-category {{ !Route::is('client.home') ? 'd-none' : '' }}">
                             <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>Danh mục</h3>
                             <ul class="main-category">
                                 {{-- Categrory --}}
                                 @foreach ($categories as $cg)
                                     <li><a
                                             href="{{ route('client.shop.related', $cg->id) }}">{{ $cg->name }}</a>
                                     </li>
                                 @endforeach
                             </ul>
                         </div>
                     </div>
                     <div class="col-lg-9 col-12">
                         <div class="menu-area">
                             <!-- Main Menu -->
                             <nav class="navbar navbar-expand-lg">
                                 <div class="navbar-collapse">
                                     <div class="nav-inner">
                                         <ul class="nav main-menu menu navbar-nav">
                                             <li class="{{ Route::is('client.home') ? 'active' : '' }}"><a
                                                     href="{{ route('client.home') }}">Trang chủ</a></li>
                                             <li class="{{ Route::is('client.shop') ? 'active' : '' }}"><a
                                                     href="{{ route('client.shop') }}">Sản phẩm</a></li>
                                             <li class="{{ Route::is('client.contact') ? 'active' : '' }}"><a
                                                     href="{{ route('client.contact') }}">Liên hệ</a></li>
                                         </ul>
                                     </div>
                                 </div>
                             </nav>
                             <!--/ End Main Menu -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--/ End Header Inner -->
 </header>
 <!--/ End Header -->
