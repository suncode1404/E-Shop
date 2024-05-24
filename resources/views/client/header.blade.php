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
                                     @if (is_array(session('cart' . Auth::id())) || is_object(session('cart' . Auth::id())))
                                         @foreach (session('cart' . Auth::id()) as $key => $sp)
                                             <li>
                                                 <a href="{{ route('client.cart.logout', $key) }}" class="remove"
                                                     title="Remove this item"><i class="fa fa-remove"></i></a>
                                                 <a class="cart-img" href="{{ route('client.product', $key) }}"><img
                                                         src="{{ asset('images/' . $sp->product->image) }}"
                                                         alt="#"></a>
                                                 <h4><a href="#">{{ $sp['name'] }}</a></h4>
                                                 <p class="quantity">{{ $sp['quantity'] }} - <span
                                                         class="amount">{{ number_format($sp['price'], 2, '.', '.') }}vnđ</span>
                                                 </p>
                                             </li>
                                         @endforeach
                                     @endif
                                 </ul>
                                 <div class="bottom">
                                     <div class="total">
                                         <span>Total</span>
                                         <span class="total-amount">00</span>
                                     </div>
                                     <a href="{{ route('client.checkout') }}" class="btn animate">Thanh toán</a>
                                 </div>
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
                                         <li>Thông tin tài khoản</li>
                                         <li>Đổi mặt khẩu</li>
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
                                 {{-- <li><a href="#">New Arrivals <i class="fa fa-angle-right"
                                             aria-hidden="true"></i></a>
                                     <ul class="sub-category">
                                         <li><a href="#">accessories</a></li>
                                         <li><a href="#">best selling</a></li>
                                         <li><a href="#">top 100 offer</a></li>
                                         <li><a href="#">sunglass</a></li>
                                         <li><a href="#">watch</a></li>
                                         <li><a href="#">man’s product</a></li>
                                         <li><a href="#">ladies</a></li>
                                         <li><a href="#">westrn dress</a></li>
                                         <li><a href="#">denim </a></li>
                                     </ul>
                                 </li>
                                 <li class="main-mega"><a href="#">best selling <i class="fa fa-angle-right"
                                             aria-hidden="true"></i></a>
                                     <ul class="mega-menu">
                                         <li class="single-menu">
                                             <a href="#" class="title-link">Shop Kid's</a>
                                             <div class="image">
                                                 <img src="https://via.placeholder.com/225x155" alt="#">
                                             </div>
                                             <div class="inner-link">
                                                 <a href="#">Kids Toys</a>
                                                 <a href="#">Kids Travel Car</a>
                                                 <a href="#">Kids Color Shape</a>
                                                 <a href="#">Kids Tent</a>
                                             </div>
                                         </li>
                                         <li class="single-menu">
                                             <a href="#" class="title-link">Shop Men's</a>
                                             <div class="image">
                                                 <img src="https://via.placeholder.com/225x155" alt="#">
                                             </div>
                                             <div class="inner-link">
                                                 <a href="#">Watch</a>
                                                 <a href="#">T-shirt</a>
                                                 <a href="#">Hoodies</a>
                                                 <a href="#">Formal Pant</a>
                                             </div>
                                         </li>
                                         <li class="single-menu">
                                             <a href="#" class="title-link">Shop Women's</a>
                                             <div class="image">
                                                 <img src="https://via.placeholder.com/225x155" alt="#">
                                             </div>
                                             <div class="inner-link">
                                                 <a href="#">Ladies Shirt</a>
                                                 <a href="#">Ladies Frog</a>
                                                 <a href="#">Ladies Sun Glass</a>
                                                 <a href="#">Ladies Watch</a>
                                             </div>
                                         </li>
                                     </ul>
                                 </li> --}}
                                 @foreach ($categories as $cg)
                                     <li><a href="#">{{ $cg->name }}</a></li>
                                 @endforeach
                                 {{-- <li><a href="#">top 100 offer</a></li>
                                 <li><a href="#">sunglass</a></li>
                                 <li><a href="#">watch</a></li>
                                 <li><a href="#">man’s product</a></li>
                                 <li><a href="#">ladies</a></li>
                                 <li><a href="#">westrn dress</a></li>
                                 <li><a href="#">denim </a></li> --}}
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
