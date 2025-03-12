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
      <link rel="stylesheet" href="{{asset('dist/css/owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{asset('dist/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<style>
    .dropdown-scroll {
    max-height: 200px; /* Adjust the max-height as needed */
    overflow-y: auto;
  }
</style>
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="#">Gift Ideas</a></li>
                           <li><a href="#">New Releases</a></li>
                           <li><a href="#">Today's Deals</a></li>
                           <li><a href="#">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="/"><img src="{{asset('assets/images/logo.png')}}" width="100px"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
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
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start 1<br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start 2<br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start 3<br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
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
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->

<!-- Assuming you are using Blade templates -->
<!-- Start Product Area -->
<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Items</h2>
                </div>
            </div>
        </div>


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
    <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Category
    </button>
    <div class="dropdown-menu dropdown-scroll" aria-labelledby="categoryDropdownButton">
        @foreach($categories as $category)
            <a class="dropdown-item category-item" href="#" data-value="{{ $category->CategoryCode }}">{{ $category->CategoryName }}</a>
        @endforeach
    </div>
</div>
                    <!-- Product Table -->
                    <table id="products-table" class="display table">
                        <thead class="text-white" style="background-color: #f26522; border-color:#f26522 " >
                            <tr>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product data will be loaded dynamically using DataTables -->
                        </tbody>
                    </table>
                    <!-- Save Button -->
<button class="btn btn-primary" id="save-button">Save All</button>


    </div>
</div>


      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="/"><img src="{{asset('assets/images/logo.png')}}" width="200px"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
               <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="#">Gift Ideas</a></li>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+1 1230 1230 1230</a></div>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

      <!-- sidebar -->
      <script src="{{asset('dist/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('dist/js/custom.js')}}"></script>

      <script>

         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }


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
        var selectedCategory;

        // Category Dropdown Click Event
        $('.category-item').on('click', function() {
            selectedCategory = $(this).data('value');
            $('#categoryDropdownButton').text($(this).text());

            // Reload table with the selected category
            dataTable.ajax.reload();
        });

        var dataTable = $('#products-table').DataTable({
            ajax: {
                url: '/get-products', // replace with your route to fetch products
                data: function (d) {
                    d.categoryCode = selectedCategory;
                }
            },
            columns: [
                { data: 'ItemCode', name: 'ItemCode' },
                { data: 'ItemName', name: 'ItemName' },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<input type="number" class="form-control quantity-input" data-item-code="'+row.ItemCode+'" />';
                    }
                }
            ]
        });

        // Save Button Click Event
        $('#save-button').on('click', function() {
            saveAllRows();
        });
    });

    function saveAllRows() {
        var rowsData = [];

        $('.quantity-input').each(function() {
            var itemCode = $(this).data('item-code');
            var quantity = $(this).val();

            if (quantity !== '' && !isNaN(quantity) && parseInt(quantity) > 0) {
                rowsData.push({
                    itemCode: itemCode,
                    quantity: quantity
                });
            }
        });

        // Make an AJAX request to save all rows
        if (rowsData.length > 0) {
            ajaxSetup();
            $.ajax({
                type: 'POST',
                url: '/save-all-products',
                data: {
                    rowsData: rowsData
                },
                success: function(response) {
                    console.log('Data saved successfully:', response);
                },
                error: function(error) {
                    console.error('Error saving data:', error);
                }
            });
        } else {
            alert('Please enter valid quantities for at least one item.');
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
