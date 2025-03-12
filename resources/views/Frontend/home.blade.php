<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- site metas -->
      <title>Zofatech</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('dist/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('dist/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('dist/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('dist/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('dist/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      {{-- <link rel="stylesheet" href="{{asset('dist/css/owl.carousel.min.css')}}"> --}}
      {{-- <link rel="stylesoeet" href="{{asset('dist/css/owl.theme.default.min.css')}}"> --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css">
<style>
    .dropdown-scroll {
    max-height: 200px; /* Adjust the max-height as needed */
    overflow-y: auto;
  }
  .owl-carousel {
            width: 100%;
        }

        .owl-carousel .item {
            background-size: cover;
            background-position: center;
            text-align: center;
            color: #fff;
            height: 400px; /* Adjust the height as needed */
        }

        .owl-carousel .item h1 {
            margin-top: 150px; /* Adjust the vertical position of text as needed */
            font-size: 36px;
        }
        .body-overlay {
  position: fixed;
  width: 100%;
  height: 100%;
  display: block;
  background-color: rgba(2, 48, 71, 0.9);
  z-index: 9999;
  content: '';
  left: 0;
  top: 0;
  visibility: hidden;
  opacity: 0;
  -webkit-transition: all 0.3s ease-in;
  -moz-transition: all 0.3s ease-in;
  -o-transition: all 0.3s ease-in;
  transition: all 0.3s ease-in;
  cursor: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVBAMAAABbObilAAAAMFBMVEVMaXH////////////////////////////////////////////////////////////6w4mEAAAAD3RSTlMAlAX+BKLcA5+b6hJ7foD4ZP1OAAAAkUlEQVR4XkWPoQ3CUBQAL4SktoKAbCUjgAKLJZ2ABYosngTJCHSD6joUI6BZgqSoB/+Shqde7sS9x3OGk81fdO+texMtRVTia+TsQtHEUJLdohJfgNNPJHyEJPZTsWLoxShqsWITazEwqePAn69Sw2TUxk1+euPis3EwaXy8RMHSZBIlRcKKnC5hRctjMf57/wJbBlAIs9k1BAAAAABJRU5ErkJggg==), progress; }

.body-overlay.active {
  visibility: visible;
  opacity: .90; }


.login-register-popup.active {
  visibility: visible;
  opacity: 1; }

.login-register-popup {
  background: #ffffff;
  position: absolute;
  top: 45%;
  left: 50%;
  width: 50%;
  -webkit-transition: 0.5s ease;
  -o-transition: 0.5s ease;
  transition: 0.5s ease;
  -ms-transform: translate(-50%, -50%);
  /* IE 9 */
  -webkit-transform: translate(-50%, -50%);
  /* Chrome, Safari, Opera */
  transform: translate(-50%, -50%);
  max-height: calc(100% - 15%);
  transition: 0.5s ease;
  visibility: hidden;
  opacity: 0;
  z-index: 9999;
  -webkit-box-shadow: 0px 2px 69px #97A1B238;
  box-shadow: 0px 2px 69px #97A1B238;
  border-radius: 10px; }


.login-register-popup-wrap {
  background-color: #f26522; }
  .login-register-popup-wrap .shape-thumb {
    position: absolute;
    top: -44px;
    left: -9px;
    z-index: 8; }
.dataTables_filter{
    display: none;
}
.single-widget-search-input input#fullname:focus {
    border: 1px solid #f26522;
    outline: none;  /* Optional: Remove the default focus outline */
}


</style>
   </head>
   <body>
    <div class="body-overlay" id="body-overlay"></div>

      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        {{-- <ul>
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="#">Gift Ideas</a></li>
                           <li><a href="#">New Releases</a></li>
                           <li><a href="#">Today's Deals</a></li>
                           <li><a href="#">Customer Service</a></li>
                        </ul> --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="/"><img src="{{asset('assets/images/logo.png')}}" width="200px"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
          <div class="header_section">
            <h1 class="banner_taital" style="color: #f26522">Waiting For Your <b>ORDER</b></h1>

          </div>
         {{-- <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="/">Home</a>
                     <a href="fashion.html">Fashion</a>
                     <a href="electronic.html">Electronic</a>
                     <a href="jewellery.html">Jewellery</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{asset('dist/images/toggle-icon.png')}}"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                     </button>
                     <div class="dropdown-menu" aria-labelledby="">
                        <a class="dropdown-item category-option" href="#">A </a>
                        <a class="dropdown-item category-option" href="#">b </a>
                     </div>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Items">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="{{asset('dist/images/flag-uk.png')}}" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="{{asset('dist/images/flag-france.png')}}" class="mr-2" alt="flag">
                           French
                           </a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="{{route('home')}}">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Login</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section  " style="margin-top:200px">
            <div class="container-fluid">

                <div class="owl-carousel owl-theme">
                    <div class="item " style="background-image: url('{{ asset('dist/images/ban4.jpeg') }}'); width: 80%; ">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Product<br>Of Bonded</h1>
                                <div class="buynow_bt"><a onclick="scrollDown()">Get Qoute</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="item" style="background-image: url('{{ asset('dist/images/ban2.jpg') }}'); width: 80%">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Product<br>Of Provision</h1>
                                <div class="buynow_bt"><a onclick="scrollDown()">Get Qoute</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="item" style="background-image: url('{{ asset('dist/images/ban5.jpeg') }}');width: 80%">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Product<br>Of Provision</h1>
                                <div class="buynow_bt"><a onclick="scrollDown()">Get Qoute</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="item" style="background-image: url('{{ asset('dist/images/ban6.webp') }}');width: 80%">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Product<br>Of Provision</h1>
                                <div class="buynow_bt"><a onclick="scrollDown()">Get Qoute</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         {{-- <div class="banner_section p-5 layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item p-5 active slide1" >
                        <div class="blur-overlay"></div>
                        <div class="content-container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="banner_taital">Get Product<br>Of Bonded</h1>
                                    <div class="buynow_bt"><a href="#">Get Qoute</a></div>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="carousel-item p-5 slide2">
                        <div class="blur-overlay2"></div>
                        <div class="content-container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="banner_taital">Get Product<br>Of Provision</h1>
                                    <div class="buynow_bt"><a href="#">Get Qoute</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="carousel-item p-5 slide3">
                        <div class="blur-overlay3"></div>
                        <div class="content-container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="banner_taital">Get Product<br>Of Bonded</h1>
                                    <div class="buynow_bt"><a href="#">Get Qoute</a></div>
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div> --}}
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->

<!-- Assuming you are using Blade templates -->
<!-- Start Product Area -->
<div class="product-area section">
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Items</h2>
                </div>
            </div>
        </div> --}}


        <!-- Product Content -->
        <!-- Category Dropdown -->
                    {{-- <label for="category">Select Category:</label>
                    <select id="category" class=""  name="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->CategoryCode }}">{{ $category->CategoryName }}</option>
                        @endforeach
                    </select> --}}
                    {{-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Select Category
                        </button>
                        <div class="dropdown-menu dropdown-scroll" aria-labelledby="categoryDropdownButton">
                          @foreach($categories as $category)
                            <a class="dropdown-item" href="#" data-value="{{ $category->CategoryCode }}">{{ $category->CategoryName }}</a>
                          @endforeach
                        </div>
                      </div> --}}
<!-- Category Dropdown -->
<div class="dropdown my-2">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdownButton" style="width: 200px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Category
    </button>
    <div class="dropdown-menu dropdown-scroll" aria-labelledby="categoryDropdownButton">
        <a class="dropdown-item category-item"  data-value="">All Category</a>
        @foreach($categories as $category)
            <a class="dropdown-item category-item"  data-value="{{ $category->CategoryCode }}">{{ $category->CategoryName }}</a>
        @endforeach
    </div>
</div>
<div class="dropdown my-2">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="DepartmentDropdownButton" style="width: 200px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Department
    </button>
    <div class="dropdown-menu dropdown-scroll" aria-labelledby="DepartmentDropdownButton">
        <a class="dropdown-item Department-item"  data-value="">All Department</a>
            <a class="dropdown-item Department-item"  data-value="PROVISIONS">PROVISIONS</a>
            <a class="dropdown-item Department-item"  data-value="BONDED">BONDED</a>
    </div>
</div>
<div class="main" style="width: 70%;">
    <!-- Another variation with a button -->
    <div class="input-group">
       <input type="text" class="form-control" id="search" placeholder="Search Items">
       <div class="input-group-append">
          <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
          <i class="fa fa-search"></i>
          </button>
       </div>
    </div>
 </div>
<div class="row pr-5">

    <button class="btn btn-primary getguote-btn ml-auto" id="save-button">Submit Quote</button>
</div>
                    <div class="p-4">

                    <!-- Product Table -->
                    <table id="products-table" class="display table ">
                        <thead class="text-white" style="background-color: #f26522; border-color:#f26522 " >
                            <tr>
                                <th>Item&nbsp;Code</th>
                                <th>Item&nbsp;Name</th>
                                <th>UOM</th>
                                <th>Department</th>
                                <th>Packing</th>
                                <th class="text-right">Required&nbsp;Quantity</th>
                                <th>Customer&nbsp;Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product data will be loaded dynamically using DataTables -->
                        </tbody>
                    </table>
                    <div class="row pr-3">

                        <button class="btn btn-primary getguote-btn ml-auto" id="save-button">Submit Quote</button>
                    </div>
                </div>

                    <!-- Save Button -->


    </div>
</div>

<div class="signUp-popup login-register-popup" id="signUp-popup" style="border-radius: 20px;">
    <div class="login-register-popup-wrap" style="border-radius: 20px;">
        <div class="container-fluid">
            <div class="container ">
                <div class="row">

                    <div class="col-lg-12">

                        <form id="quotesend" style="background: #ffffff; margin: 40px 20px 40px 20px; padding: 20px 30px; border-radius: 20px; position: relative; -webkit-box-shadow: -1px 12px 21px #071C5526; box-shadow: -1px 12px 21px #071C5526; " >
                            @csrf
                            <h4 class="text-center"><span class="abcGet" style="color: #0089d1;">Get</span> Quote
                            </h4>
                            <div class="row">
                                <input type="hidden" name="BranchCode" value="{{$BranchCode}}">
                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i class="fa fa-user"></i> Full
                                        Name*</div>
                                    <div class="single-widget-search-input">
                                        <input name="fullname" class="form-control" id="fullname" type="text" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i class="fa fa-envelope"></i>
                                        Email*</div>
                                    <div class="single-widget-search-input">
                                        <input name="email" id="email" class="form-control" type="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i class="fa fa-building"></i>
                                        Company*</div>
                                    <div class="single-widget-search-input">
                                        <input name="customername" id="customername" class="form-control" type="text" placeholder="Company Or Customer Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i class="fa fa-ship"></i>
                                        Contact No*</div>
                                    <div class="single-widget-search-input">
                                        <input name="ContactNo" class="form-control" id="ContactNo" type="text"
                                            placeholder="Contact No" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i class="fa fa-ship"></i>
                                        Vessel Name*</div>
                                    <div class="single-widget-search-input">
                                        <input name="vesselname" class="form-control" id="vesselname" type="text"
                                            placeholder="Vessel Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i class="fa fa-ship"></i>
                                        Vessel IMO Number*</div>
                                    <div class="single-widget-search-input">
                                        <input name="vesselimo" class="form-control" id="vesselimo" type="text"
                                            placeholder="Vessel IMO Number" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i
                                            class="fa fa-calendar-minus-o"></i> Date of ETA*</div>
                                    <div class="single-widget-search-input">
                                        <input name="reqdate" id="reqdate" type="date" class="departing-date form-control"
                                            placeholder="" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i class="fa fa-ship"></i>
                                        Shiping Port*</div>
                                    <div class="single-widget-search-input">
                                        <input name="ShipingPort" class="form-control" id="ShipingPort" type="text"
                                            placeholder="Shiping Port" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i class="fa fa-lock"></i>
                                        Security Question 2 X 2 = ?*</div>
                                    <div class="single-widget-search-input">
                                        <input name="security" class="form-control" id="security" type="text"
                                            placeholder="Security Question 2 X 2 = ?" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-widget-search-input-title"><i class="fa fa-user"></i>
                                        CustomerRefNo*</div>
                                    <div class="single-widget-search-input">
                                        <input name="CustomerRefNo" class="form-control" id="CustomerRefNo" type="text"
                                            placeholder="CustomerRefNo" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single-widget-search-input-title"><i class="fa fa-keyboard-o"></i>
                                        Message</div>
                                    <div class="single-widget-search-input">
                                        <textarea name="message" class="form-control" id="message" placeholder="Your Message"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <div class="text-lg-center text-left py-2">
                                        <button type="submit" style="background-color: #f26522" class="btn text-white">Get A Quote
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="/"><img src="{{asset('assets/images/logo.png')}}" width="200px"></a></div>
            <form id="Subscriptionform">

                <div class="input_bt">
                    <input type="email" class="mail_bt" placeholder="Your Email" id="SubEmail" name="SubEmail">
                    <button type="submit" class="subscribe_bt" id="BTNSubscribe">Subscribe</button>
                </div>
            </form>
            <div class="footer_menu">
               {{-- <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="#">Gift Ideas</a></li>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul> --}}
            </div>
            {{-- <div class="location_main">Contact Number : <a href="#">+1 713 7799901</a></div> --}}
            <div class="location_main">Global Ship Services USA · 9139 Wallisville Road, Houston TX 77029, USA · US Gulf of Mexico (from Brownsville to Panama City, FL) · Tel:+1 713 589 2282, +1 713 7799901</div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2023 All Rights Reserved. Design by <a href="https://zofatech.com">Zofatech</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{asset('dist/js/jquery.min.js')}}"></script>
      <script src="{{asset('dist/js/popper.min.js')}}"></script>
      <script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('dist/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('dist/js/plugin.js')}}"></script>
	<script src="{{asset('dist/js/isotope/isotope.pkgd.min.js')}}"></script>
<!-- Add these links to your Blade view's head section -->

      <!-- sidebar -->
      <script src="{{asset('dist/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('dist/js/custom.js')}}"></script>
      {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
      <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
      <script>
         function scrollDown() {
      window.scrollTo({
        top: window.innerHeight, // Scroll down by the height of the viewport
        behavior: 'smooth' // Add smooth scrolling effect
      });
    }
    function scrollUp() {
      window.scrollTo({
        top: 0, // Scroll to the top of the page
        behavior: 'smooth'
      });
    }

 const Swaal = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-gray'
        },
        buttonsStyling: false
    });
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
         $(document).ready(function () {
                    $("#signUp-popup").removeClass("active");
            // $("#signUp-popup").hide()
         });
        //  d = $("#body-overlay");
        //     var p = $("#signUp-popup");
            $(document).on("click", "#body-overlay", function (e) {
                e.preventDefault();
                    $("#body-overlay").removeClass("active");
                    $("#signUp-popup").removeClass("active");
                    // $("#signUp-popup").hide()

            }),


        //         $(window).scroll(function() {
        //             var scrollTop = e(window).scrollTop();
        //             p.css("top", scrollTop + 450 + "px"); // Adjust the value as needed
                // });

        // document.querySelectorAll('.category-option').forEach(option => {
        //     option.addEventListener('click', (event) => {
        //         event.preventDefault();
        //         const selectedCategory = option.dataset.category;
        //         const catname = option.value;
        //         $('#categoryDropdownButton').text(catname);
        //         document.querySelectorAll('.category-tab').forEach(tab => {
        //             tab.style.display = (tab.id === `category_${selectedCategory}`) ? 'block' : 'none';
        //         });
        //     });
        // });

    //     $(document).ready(function() {
    //     var dataTable = $('#products-table').DataTable({
    //         ajax: {
    //             url: '/get-products', // replace with your route to fetch products
    //             data: function (d) {
    //                 d.categoryCode = $('#category').val();
    //             }
    //         },
    //         columns: [
    //             { data: 'ItemCode', name: 'ItemCode' },
    //             { data: 'ItemName', name: 'ItemName' },
    //             // Add more columns if needed
    //         ]
    //     });

    //     // Update table when category is changed
    //     $('#category').on('change', function() {
    //         dataTable.ajax.reload();
    //     });
    // });
        $(document).ready(function() {

            $('#Subscriptionform').submit(function (e) {
                e.preventDefault();
                    var Email = $('#SubEmail').val();

                var BranchCode = '{{$BranchCode}}';
                ajaxSetup();

                $.ajax({
                    url: "{{route('ProvisionSubscription')}}", // Replace with your server endpoint
                    type: "POST",
                    data: {
                        Email: Email,
                        BranchCode: BranchCode,
                    },
                    success: function(response) {
                        if(response.Message == 'Saved')
                        {
                             Swaal.fire({
                        icon: 'success',
                        title: 'Process Success',
                        text: 'Your Email Is Subscribed With Us Thank You Wil Notify Updates!',
                        showConfirmButton: true,
                        timer: 1500
                    })
                            // alert('Quotation Send Please Wait For Contact')
                        }
                        // Handle the success response
                    },
                    error: function(error) {
                        // Handle the error response
                        Swaal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: error.responseJSON.message,
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                        console.error("Error:", error);
                    }
                });

            });
            // $('#BTNSubscribe').click(function (e) {
            //     e.preventDefault();
            //     var Email = $('#SubEmail').val();
            //     alert(Email);
            // });

            $('.owl-carousel').owlCarousel({
            items: 4,
            nav: true,
            margin: 100,
            dots: false,
            loop: true,
            autoPlay:true
        });

        var selectedCategory;
        var selectedDepartment;
        var BranchCode = '{{$BranchCode}}';
        if (!BranchCode) {
            Swaal.fire({
                        icon: 'error',
                        title: 'BranchCode Not Found!',
                        text: 'Please enter valid Link With BranchCode!',
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
        }
        // Category Dropdown Click Event
        $('.category-item').on('click', function() {
            selectedCategory = $(this).data('value');
            $('#categoryDropdownButton').text($(this).text());
            // Reload table with the selected category
            dataTable.ajax.reload();
        });
        $('.Department-item').on('click', function() {
            selectedDepartment = $(this).data('value');
            $('#DepartmentDropdownButton').text($(this).text());
            dataTable.ajax.reload();

        });
        var dataTable = $('#products-table').DataTable({
            scrollY: 550,
            paging: false,
            processing: true, // Enable processing indicator
            // serverSide: true, // Assuming server-side processing
            ajax: {
                url: '/get-products', // replace with your route to fetch products
                data: function (d) {
                    d.categoryCode = selectedCategory;
                    d.Department = selectedDepartment;
                    d.BranchCode = BranchCode;
                },

            },
            columns: [
                { data: 'ItemCode', name: 'ItemCode' },
                { data: 'ItemName', name: 'ItemName' },
                { data: 'UOM',      name: 'UOM' },
                { data: 'TypeName', name: 'TypeName' },
                {
                    data: null,
                    render: function(data, type, row) {
                        var html = '<select name="packing" class="form-control item-select" >'
                        data.getcomments.forEach(itm => {
                            html +='<option value="'+itm.Comments+'">'+itm.Comments+'</option>'
                        });
                        html +='</select>'
                        return html;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<input type="number" class="form-control ml-auto col-sm-6 quantity-input" data-item-code="'+row.ItemCode+'" />';
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<input type="text" class="form-control item-comment" />';
                    }
                },
            ]
        });
        $('#search').on('keyup', function () {
            dataTable.search(this.value).draw();
        });
        $('.getguote-btn').click(function (e) {
                e.preventDefault();
                $('#search').val('');
                    dataTable.search(this.value).draw();

                    // $("#signUp-popup").show()
                    $("#signUp-popup").addClass("active");

                    $("#body-overlay").addClass("active");
                    scrollUp();

                    $(window).scroll(function() {
                    var scrollTop = $(window).scrollTop();
                    $("#signUp-popup").css("top", scrollTop + 450 + "px"); // Adjust the value as needed
                    });
            });
        // Save Button Click Event
        // $('#save-button').on('click', function() {
        //     saveAllRows();
        // });

        $('#quotesend').submit(function (e) {
            e.preventDefault();
            var Department = $('#DepartmentDropdownButton').text();
            if ($('#security').val() == '4') {

                var rowsData = saveAllRows();
                if (rowsData == 'norow') {
                    $('#body-overlay').click();

                    Swaal.fire({
                        icon: 'error',
                        title: 'NO Item With Quantities!',
                        text: 'Please enter valid quantities for at least one item!',
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                    return;
                }
            var form =  $(this).serialize();
            $('#body-overlay').click();
            ajaxSetup();

                // Ajax request to send the data
                $.ajax({
                    url: "{{route('ProvisionGetQuoteSave')}}", // Replace with your server endpoint
                    type: "POST",
                    data: {
                        form: form,
                        rowsData: rowsData,
                        Department: Department
                    },
                    success: function(response) {
                        console.log("Success:", response);
                        if(response.Message == 'Found')
                        {
                            Swaal.fire({
                                icon: 'error',
                                title: 'Error Customer Ref Is Already Saved!',
                                text: 'Customer Ref Is Already Saved in Another Quote Please Type Diffrent',
                                showConfirmButton: true,
                            }).then(() => {
                            $('.getguote-btn').click();
                        });
                        }
                        if(response.Message == 'Saved')
                        {
                             Swaal.fire({
                                icon: 'success',
                                title: 'Process Success',
                                text: 'Quotation Send Please Wait For Contact',
                                showConfirmButton: true,
                                timer: 2500
                            })
                            // alert('Quotation Send Please Wait For Contact')
                        }
                        // Handle the success response
                    },
                    error: function(error) {
                        // Handle the error response
                        Swaal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: error.responseJSON.message,
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                        console.error("Error:", error);
                    }
                });
            }else{
            $('#body-overlay').click();

                Swaal.fire({
                        icon: 'error',
                        title: 'Are You A Robot!',
                        text: 'Please enter valid Answer For Security!',
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                    return;
            }


        });
    });

    // function saveAllRows() {
    //     var rowsData = [];

    //     $('.quantity-input').each(function() {
    //         var itemCode = $(this).data('item-code');
    //         var quantity = $(this).val();

    //         if (quantity !== '' && !isNaN(quantity) && parseInt(quantity) > 0) {
    //             rowsData.push({
    //                 itemCode: itemCode,
    //                 quantity: quantity
    //             });
    //         }
    //     });

    //     if (rowsData.length > 0) {

    //         return rowsData;
    //     } else {
    //         return 'norow';
    //     }
    // }

    function saveAllRows() {
    var rowsData = [];

    $('tr').each(function() {
        var itemSelect = $(this).find('.item-select');
        var itemcomment = $(this).find('.item-comment').val();
        var quantityInput = $(this).find('.quantity-input');
        // var
        var itemCode = quantityInput.data('item-code');
        var quantity = quantityInput.val();
        var selectedValue = itemSelect.val();
        if (quantity !== '' && !isNaN(quantity) && parseInt(quantity) > 0) {
            rowsData.push({
                itemCode: itemCode,
                quantity: quantity,
                itemcomment: itemcomment,
                selectedValue: selectedValue
            });
        }
    });

    if (rowsData.length > 0) {

        return rowsData;
    } else {
        return 'norow';
    }
}


    function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    </script>
   </body>
</html>
