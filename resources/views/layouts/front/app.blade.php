<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Fashion | Teamplate</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="manifest" href="site.webmanifest">
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
      <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>{{ config('app.name') }}</title>
         <title>Online Store</title>
         <meta name="description" content="Modern open-source e-commerce framework for free">
         <meta name="tags" content="modern, opensource, open-source, e-commerce, framework, free, laravel, php, php7, symfony, shop, shopping, responsive, fast, software, blade, cart, test driven, adminlte, storefront">
         <meta name="author" content="Jeff Simons Decena">
         <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css') }}" type="text/css">
         <link rel="stylesheet" href="{{asset('public/assets/css/style.css') }}" type="text/css">
         <link rel="stylesheet" href="{{asset('public/assets/css/fontawesome-all.min.css') }}" type="text/css">
         <meta name="theme-color">
         @yield('css')
         <meta property="og:url" content="{{ request()->url() }}"/>
         @yield('og')
         
   </head>
   <body>
      <body class="full-wrapper">
         <header>
            <!-- Header Start -->
            <div class="header-area ">
               <div class="main-header header-sticky">
                  <div class="container-fluid">
                     <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="header-left d-flex align-items-center">
                           <!-- Logo -->
                           <div class="logo">
                              <a href="{{URL::to('/')}}"><img src="{{asset('public/assets/img/logo/logo.png')}}" alt=""></a>
                           </div>
                           <!-- Main-menu -->
                           <div class="main-menu  d-none d-lg-block">
                              <nav>
                                 <ul id="navigation">
                                    <li><a href="{{URL::to('/')}}">HOME</a></li>
                                 </ul>
                              </nav>
                           </div>
                        </div>
                        <div class="header-right1 d-flex align-items-center">
                           <!-- Social -->
                           <!-- Search Box -->
                           <div class="search d-none d-md-block">
                              <ul class="d-flex align-items-center">
                                 @if(auth()->check())
                                 <li><a href="{{ route('logout') }}" class="text-info"><i class="fa fa-sign-out"></i> Logout</a></li>
                                 @else
                                 <li><a href="{{ route('login') }}" class="text-warning">  Login</a></li>
                                 | 
                                 <li><a href="{{ route('register') }}"  class="text-warning"> Register</a></li>
                                 @endif
                                 <div class="card-stor">
                                    <a href="{{URL::to('cart')}}"> <img src="public/assets/img/gallery/card.svg" alt="">
                                    <span>{{(session()->get('cart') !== null )? count(session()->get('cart') ):0 }}</span></a>
                                 </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                           <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Header End -->
         </header>
         <!-- header end -->
         <main>
         <noscript>
            <p class="alert alert-danger">
               You need to turn on your javascript. Some functionality will not work if this is disabled.
               <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
            </p>
         </noscript>
         @yield('content')
         <!-- JS here -->
         <!-- Jquery, Popper, Bootstrap -->
         <script src="{{asset('public/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
         <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
         @yield('js')
   </body>
</html>