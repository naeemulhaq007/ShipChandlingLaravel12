<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://kit.fontawesome.com/0c1b77a3c1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.1.0/styles/overlayscrollbars.min.css" integrity="sha512-SWInhnSfP5LyduITbBbAzzj0LCCw6CBqQIfLMACCnuihNPoTLoOGvT+YVmHsV6ub1VWKrQ2wPhZFmR+c5GZUMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Configured Stylesheets --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@php
$BranchCode = request()->get('BranchCode');
$QuoteNo = request()->get('quoteNo');
$VendorCode = request()->get('VendorCode');

@endphp
{{-- Base Scripts --}}
    <title>
        WCI-Quote|{{$QuoteNo}}
    </title>

</head>

<body>






<?php echo View::make('partials.ajax_success') ?>
<div class="container-fluid">
    <div class="header_section">
      <div class="banner_section layout_padding">
        <div class="container-fluid">
          <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <h1 class="your_text">{{ $dataf ? $dataf->CompanyName : 'WCI'}}</h1>
                    <h1 class="Shows_text">{{ $dataf ? $dataf->CompanyAddress : 'Address'}}</h1>
                    <p class="there_text">{{ $dataf ? $dataf->CompanyEmailAddress : 'usa@wci.us'}} <br>
                      {{ $dataf ? $dataf->CompanyWebSite : 'www.WCI.us'}}</p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="images_1"><img class="img-fluid" src="<?php echo url("assets/images/WciLOGO.png");?>" style="width: 67%;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="banner_section_2">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="box_main rounded">
                  <p class="many_text">{{ $dataf ? $dataf->VendorName : 'Vendor Name'}} <br> {{ $dataf ? $dataf->Address : 'Vendor Address'}}<br> {{ $dataf ? $dataf->PhoneNo : 'Vendor PhoneNo'}}</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="box_main active">
                  <p class="many_text active"><b>Please advise/confirmed price and availability</b> <br><b>Event#:</b> {{$dataf ? $dataf->EventNo : ''}} <br> <b>Quote#:</b> <span id="Quoteno">{{$QuoteNo}}</span></p>
                  <div class="input-group col-sm-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Currency</span>
                    </div>
                    <select id="Currency" class="form-control" name="Currency">
                      <option value="USD">USD</option>
                      <option value="AED">AED</option>
                      <option value="EUR">EUR</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="box_main rounded">
                  <p class="many_text"><b>Cust. Ref #:</b>{{$dataf ? $dataf->CustomerRefNo : 'NoRefrence'}} <br> <b>Department:</b>{{$dataf ? $dataf->DepartmentName : 'DepartmentName'}} <br> <b>Dated:</b> {{$dataf ? date('M-d-Y', strtotime($dataf->SendDate)) : 'SendDate'}},{{$dataf ? date('h:i:a', strtotime($dataf->SendTime)) : 'SendTime'}} <br><b>Required Date:</b> {{$dataf ? date('M-d-Y', strtotime($dataf->SendDate)) : 'SendDate'}},{{$dataf ? date('h:i:a', strtotime($dataf->RequiredTime)) : 'SendTime'}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- about section start -->
    <div class="about_section layout_padding">
      <div class="table-wrap">
        <div class="table-responsive">
          <table class="table table-sm table-hover" id="Vplattable">
            <thead class="tablehead">
              <tr>
                <th>SNO</th>
                <th>QTY</th>
                <th>UOM</th>
                <th>Product&nbsp;Code</th>
                <th style="width:800px">Product&nbsp;Name</th>
                <th style="width:100px">QTY</th>
                <th style="width:100px">Price</th>
                <th>Total</th>
                <th>UOM</th>
                <th>V.Part&nbsp;#</th>
                <th style="width:200px">Vendor&nbsp;Remarks</th>
                <th hidden>ID</th>
                <th>Imageprev</th>
                <th>Image</th>
              </tr>
            </thead>
            <tbody id="podata">
              @foreach ($data as $item)
              <tr style="line-height:15px;">
                <td class="text-center">{{$item->ID}}</td>
                <td class="text-center">{{number_format($item->Qty, 2, '.', '')}}</td>
                <td class="text-center">{{$item->UOM}}</td>
                <td>{{$item->ProductCode}}</td>
                <td>{{$item->ProductName}}</td>
                <td style="width:100px"><input type="number" name="" class="cellblur text-right form-control form-controlc" value="{{$item->VendorQty ? number_format($item->VendorQty, 2, '.', '') : number_format($item->Qty, 2, '.', '')}}" id=""></td>
                <td style="width:100px; "><input type="text" name="" style="" class="cellblur text-right form-control form-controlc" value=" {{round($item->VendorRcvdPrice,2)}}" id=""></td>
                <td class="text-right"></td>
                <td><input type="text" name="" class="celldo text-center form-control form-controlc" value="{{$item->VendorUOM ? $item->VendorUOM : $item->UOM}}" id=""></td>
                <td><input type="text" name="" class="celldo form-control form-controlc" value="{{$item->VendorPartNo}}" id=""></td>
                <td><input type="text" name="" class="celldo form-control form-controlc" value="{{$item->VendorRecRemarks}}" id=""></td>
                <td hidden>{{$item->ID}}</td>
                <td>
                  {!! $item->PicPath ? '<img style="max-width:60px" class="image-preview" src="' . url('images/Quote/' .$item->PicPath.'') . '" alt="">' : '<img class="image-preview" class="image-preview" src="' . url('images/Quote/Noimage.png') . '" style="max-width:60px">' !!}
                </td>
                <td>
                  <input type="file" id="image-{{$item->ID}}" data-quoteno="{{$item->QuoteNo}}" class="image-upload">
                  <input type="hidden" id="image-name-{{$item->ID}}" class="image-name" value="{{$item->PicPath}}">
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-12 ">
        <div class="col-sm-2 mx-auto">
          <div class="row pt-1">
            <div class="input-group col-sm-8">
              <div class="input-group-prepend">
                <span class="input-group-text" style="font-size: 12px" id="">Total:</span>
              </div>
              <input type="text" readonly name="" id="totalvalueonw" class="form-control text-right" >
            </div>
          </div>
          <div class="row">
            <div class="input-group col-sm-8">
              <div class="input-group-prepend">
                <span class="input-group-text" style="font-size: 12px" id="">Other Charges:</span>
              </div>
              <input type="text" name="" value="{{$dataf ? $dataf->FreightTotal : 0}}" id="FreightTotal" class="form-control FreightTotal text-right">
            </div>
          </div>
          <div class="row ">
            <div class="input-group col-sm-8">
              <div class="input-group-prepend">
                <span class="input-group-text" style="font-size: 12px" id="">Total:</span>
              </div>
              <input type="text" readonly name="" id="totalvalue" class="form-control text-right">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- about section end -->
  </div>
  <!-- about section start -->
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- banner section end -->
  </div>

<div class="row  read_bt1">
    <a name="" id="savedata" class="btn btn-primary"  role="button">Submit</a>
</div>
            </div>
            {{-- </div> --}}
          </div>


</div>


    <form id="import-form" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" hidden class="ml-3" id="file-input" name="file" accept=".xlsx">
        <button type="submit" hidden id="import-button" class="btn btn-primary">Import</button>
    </form>





    <div class="overlay">
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span></div>
        </div>
    </div>
    <div class="position-fixed bg-success text-white rounded p-2" id="myElement" style="right: -300px; top: 30px; transition: right 0.5s;">
        <button class="ml-auto bg-success" type="button" id="closeim"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>Import Succsess. <i class="fa fa-check " ></i></p>
      </div>

{{-- @stop --}}

{{-- @section('css') --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"/>

<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/ajaxsuccess.css">

<style>
    .form-controlc{
        height: calc(1.25rem + 8px);
    }
     .overlay {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: fixed;
    background: #222;
    opacity: 50%;
    display: none;
    z-index: 100;
}

.overlay__inner {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: absolute;
}

.overlay__content {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
}

.spinner {
    width: 75px;
    height: 75px;
    display: inline-block;
    border-width: 2px;
    border-color: rgba(255, 255, 255, 0.05);
    border-top-color: #fff;
    animation: spin 1s infinite linear;
    border-radius: 100%;
    border-style: solid;
}

@keyframes spin {
  100% {
    transform: rotate(360deg);
  }
}
    #totalvalueonw{
        color: #4b9dd1;
    }
    #totalvalue{
        color: #4b9dd1;
    }
.header_section{
    width: 100%;
    float: left;
    background-image: url('assets/images/carnival.png');
    background-size: 100%;
}

.internet_icon {
    width: 21%;
    margin: 0 auto;
    text-align: center;
    background-image: url('assets/images/internet-icon.png');
    height: 75px;
    background-repeat: no-repeat;
}
.box_main:hover .internet_icon{
    background-image: url('assets/images/internet-icon1.png');
}

.internet_icon1 {
    width: 25%;
    margin: 0 auto;
    text-align: center;
    background-image: url('assets/images/television-icon1.png');
    height: 75px;
    background-repeat: no-repeat;
}
.box_main:hover .internet_icon1{
    background-image: url('assets/images/television-icon1.png');
}
.internet_icon2 {
    width: 21%;
    margin: 0 auto;
    text-align: center;
    background-image: url('assets/images/mobile-icon.png');
    height: 75px;
    background-repeat: no-repeat;
}
.box_main:hover .internet_icon2{
    background-image: url('assets/images/mobile-icon1.png');
}
.product_section {
    width: 100%;
    float: left;
    background-image: url('assets/images/product-bg.png');
    height: 100px;
    background-repeat: no-repeat;
    background-size: cover;
    /* padding-bottom: 140px; */
}
.about_section{
    width: 100%;
    float: left;
    background-image: url('assets/images/about-bg.png');
    height: auto;
    background-repeat: no-repeat;
    background-size: cover;
    padding-bottom: 60px;
    padding-top: 170px;

}

</style>
{{-- @stop --}}

{{-- @section('js') --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  {{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   --}}

   <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script>


$(document).on('change', '.image-upload', function () {
//   let image = $(this)[0].files[0];
let id = $(this).attr('id').split('-')[1];
    let input = $(this);
    let file = input.siblings('.image-preview');
    let image = input[0].files[0];
    let imagePreview = document.createElement('img'); // create new image element
    imagePreview.setAttribute('style', 'max-width:60px');
    let td = input.closest('tr').find('td:nth-last-child(2)'); // find the td element that contains the image preview
    td.empty(); // clear the td element
    td.append(imagePreview); // add the new image element to the td element
    if (image) {
        let reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.setAttribute('src', e.target.result); // set the src attribute of the new image element
        }
        reader.readAsDataURL(image);
    } else {
        imagePreview.setAttribute('src', ''); // set the src attribute of the new image element to empty
    }

  let quoteno = $(this).attr('data-quoteno');
//   alert(quoteno);
  let formData = new FormData();
  formData.append('image', image);
  formData.append('id', id);
  formData.append('quoteno', quoteno);
  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
  $.ajax({
    url: '{{ URL::to('upload-imageWCI') }}',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      $(`#image-name-${id}`).val(response.image_name);
    }
  });
});

    $(document).ready(function () {



function encodeCol(n) {
  // console.log('Encoding column ' + n);
    var s = '';
    for (; n >= 0; n = Math.floor(n / 26) - 1) {
        s = String.fromCharCode(n % 26 + 65) + s;
    }
    return s;
}
var tables = $('#Vplattable').DataTable({
    scrollY: 400,
    deferRender: true,
    scroller: true,
    paging: false,
    info:false,
    ordering:false,
    // responsive:true,

    dom: 'Bfrtip',
    buttons: [

{
                extend: 'excelHtml5',
      className: 'btn btn-primary ',

                text: 'Export to Excel',
                exportOptions: {
                    columns: ':visible',
                    format: {
                        body: function(data, row, column, node) {
                          if (column === 5 || column === 6) {
                                // format currency columns
                                data = $(node).find('input').val();
                            } else if (column > 6 && $(node).find('input').length > 0) {
                                // include input elements
                                data = $(node).find('input').val();
                            }
                            if(column === 11 || column === 12){
                              data = 'IMAGE';
                            }
                            return data;
                        }
                    }
                }
            }

,
{
                    text: 'Excel Import',
            className: 'btn btn-primary ',
            action: function ( e, dt, node, config ) {
                $('#file-input').click();
                }
        },

{
                    text: 'Submit',
            className: 'btn btn-primary  ',
            action: function ( e, dt, node, config ) {
                $('#savedata').click();
                }
        },
    ],

});
$(".dt-button").removeClass("dt-button")
// Get the input element with the id 'searcher'
var searcher = $('#searcher');

// Listen for changes to the value of the input field
searcher.on('input', function() {
  // Get the search input value
  var searchValue = $(this).val();

  // Apply the search value to the table
  tables.search(searchValue).draw();
});

let table = document.getElementById('podata');
let rows = table.rows;
let Totalt = 0;
        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
  SNO=cells[0].innerHTML;
  QTY=cells[1].innerHTML;
  UOM=cells[2].innerHTML;
  IMPACode=cells[3].innerHTML;
  ProductName=cells[4].innerHTML;
  VendorQTY=cells[5].innerHTML;
  Price=cells[6].innerHTML;
  Total=cells[7].innerHTML;
  VendorUOM=cells[8].innerHTML;
  VendorPart=cells[9].innerHTML;
  VendorRemarks=cells[10].innerHTML;

  Totalt += Number(Total);
    }
    $('#totalvalueonw').val(Totalt);

$('#totalvalue').val(Totalt);



$(document).ready(function () {
    totalcalc();
});
function totalcalc(){
     // let FreightTotal = parseFloat($('#FreightTotal').val());
     let totalvalue = ($('#totalvalueonw').val());
    // console.log(totalvalue);
totalvalue = totalvalue.toString().replace(/,/g, '');

    let FreightTotal = $('#FreightTotal').val();
    // alert(FreightTotal);
    if(FreightTotal !== null && FreightTotal !== ''){

        if(!isNaN(totalvalue) && !isNaN(FreightTotal) ){
            let grandtotal = parseFloat(totalvalue)+parseFloat(FreightTotal);
        $('#totalvalue').val(grandtotal.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5}));
        }
    }else{
        $('#totalvalue').val(totalvalue.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5}));

    }
   }
$('.FreightTotal').keyup(function () {
    totalcalc();

});
$('#FreightTotal').keyup(function () {

});

    });

    $(document).ready(function() {
        let currency ='{{$dataf ? $dataf->Currency : "USD"}}';
        // console.log(currency);
        $('#Currency').val(currency);
        // totalcalc();
updateSNo();
calcl();
        $("#Vplattable tbody").on("contextmenu", function(event) {
    event.preventDefault();
});

    $('#file-input').on('change', function(){
    if ($(this).val() != '') {
        $('#import-button').click();
        $('#import-button').prop('disabled', false);
    } else {
        $('#import-button').prop('disabled', true);

    }
});



    $('#import-form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        let Quoteno = $('#Quoteno').text();
        formData.append('Quoteno', Quoteno);
        // alert(Quoteno);
        $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
        $.ajax({
            type : 'post',
            url : '{{URL::to('importvplatWCI')}}',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
            success: function(data) {
                if (data.message == 'File imported successfully') {

                    document.getElementById("myElement").style.right = "0";
$('#closeim').click(function (e) {
    e.preventDefault();
    document.getElementById("myElement").style.right = "-300px";

});
// Set a timeout to hide the element after 10 seconds
setTimeout(function() {
  // Set the right property of the element back to -300px to hide it
  document.getElementById("myElement").style.right = "-300px";
}, 10000);
                    console.log(data);
let array = data.datarowes;
  array.splice(0, 2);

let table = document.getElementById("podata");
let dataTable = $('#Vplattable').DataTable();

if (!array) {
  console.error("The array variable is not set correctly.");
  return;
}

if (!table) {
  console.error("The table element is not present in the DOM.");
  return;
}

for (let i = 0; i < array.length; i++) {
  if (!array[i].some(value => value !== null && value !== "")) {
        continue; // Skip the row if it has only null or empty values
    }

    let row = table.rows[i];
    if (!row) {
      console.error("The row is undefined for index: " + i);
      continue;
    }
// console.log('sa');
    for (let j = 0; j < 11; j++) {
        let cell = row.cells[j];
        if (j === 5) {
          cell.style.width = '100px';
          cell.innerHTML= '<input type="number" name="" class="cellblur text-right form-control form-controlc" value="'+array[i][j]+'" id="">';
        }
        if (j === 6) {
          cell.style.width = '100px';
          cell.innerHTML= '<input type="text" name="" style="" class="cellblur text-right form-control form-controlc" value="'+array[i][j]+'" id="">';
        }
        if (j === 8) {
          cell.innerHTML='<input type="text" name="" class="celldo text-center form-control form-controlc" value="'+array[i][j] +'" id="">';
        }
        if (j === 9 || j === 10) {
          cell.innerHTML='<input type="text" name="" class="celldo  form-control form-controlc" value="'+array[i][j]+'" id="">';

        }
        // cell.innerHTML = array[i][j];
    }
}

$('.cellblur').blur(function() {
    calcl();
})

updateSNo();
calcl();

                }
                else{
                    alert(data.message);
                }
                // console.log(data.datarowes);

// console.log(table.data());




            },
            error: function(data) {
                console.log(data);
                // handle errors
            },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
        });
    });


$('#savedataup').click(function(e){
    savedata();
    // alert('working')
});
$('#savedata').click(function(e){
    savedata();
    // alert('working')
});
$('.cellblur').blur(function() {
    calcl();
})

$('.cellblur').keypress(function (event) {
    if(event.keyCode === 13){
        event.preventDefault();
        $(this).trigger($.Event('keydown', {keyCode: 9}));
    }
});
$('.celldo').keypress(function (event) {
    if(event.keyCode === 13){
        event.preventDefault();
        $(this).trigger($.Event('keydown', {keyCode: 9}));
    }
});


function updateSNo() {
  var i = 0;
  if ($('#Vplattable tbody tr').length > 0) {
    i = 1;
  }
  $('#Vplattable tbody tr').each(function() {
    //   var button = $(this).find('td:first-child button');
    //   button.attr('data-counter', i);
      $(this).find('td:first-child').text(i);
    i++;
  });
}



function calcl(){
    let table = document.getElementById('podata');
let rows = table.rows;
let Totalt = 0;
        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
  SNO=cells[0].innerHTML;
  QTY=cells[1].innerHTML;
  UOM=cells[2].innerHTML;
  IMPACode=cells[3].innerHTML;
  ProductName=cells[4].innerHTML;
  VendorQTY=cells[5].querySelector('input[type="number"]').value;
  Price=cells[6].querySelector('input[type="text"]').value;
  Total=cells[7].innerHTML;
  VendorUOM=cells[8].querySelector('input[type="text"]').value;
  VendorPart=cells[9].querySelector('input[type="text"]').value;
  VendorRemarks=cells[10].querySelector('input[type="text"]').value;
  //   VendorPart=cells[9].innerHTML;
  //   VendorUOM=cells[8].innerHTML;
  //   Price=Price.toString().replace(/,/g, '');
  //   Price=cells[6].innerHTML.replace(/,/g, '');
// console.log(VendorQTY);

  if(!isNaN(VendorQTY) && !isNaN(Price)){
    totaln = Math.round(Number(VendorQTY)*Number(Price),2);

    // Price = Price.replace(/,/g, ''); // remove commas
    Price = Math.round(Number(Price),2);
    // cells[6].innerHTML = Price.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5});
    // cells[6].querySelector('input[type="number"]').value = Price.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5});
      cells[7].innerHTML = totaln.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5});
    }
  Total=cells[7].innerHTML;
  Total = Total.replace(/,/g, ''); // remove commas
    Totalt += Number(Total);
    // console.log(Totalt);
    }
    $('#totalvalueonw').val(Totalt.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5}));
$('#totalvalue').val(Totalt.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5}));

}
function savedata(){
  let BranchCode = '{{$BranchCode}}';
  let QuoteNo = '{{$QuoteNo}}';
  let VendorCode = '{{$VendorCode}}';
  console.log(VendorCode);
  let FreightTotal = $('#FreightTotal').val();
  // alert(FreightTotal);
  let Currency = $('#Currency').val();
console.log('{{$dataf ? $dataf->VendorEmail : ''}}');
  let VendorEmail = 'naeemulhaq06@gmail.com';
//   let FreightDesc = $('#FreightDesc').val();

  let table = document.getElementById('podata');
  let rows = table.rows;
  let tablearray = [];

  for (let i = 0; i < rows.length; i++) {
    let cells = rows[i].cells;
    // let productImage = '';
    // let productImageElement = cells[12].getElementsByTagName('img')[0];

    // if (productImageElement) {
    //   productImage = productImageElement.src;
    // }

    tablearray.push({
      SNO: cells[0] ? cells[0].innerHTML : '',
      QTY: cells[1] ? cells[1].innerHTML : '',
      UOM: cells[2] ? cells[2].innerHTML : '',
      ProductCode: cells[3] ? cells[3].innerHTML : '',
      ProductName: cells[4] ? cells[4].innerHTML : '',
      VendorQTY: cells[5] ? cells[5].querySelector('input[type="number"]').value : '',
      Price: cells[6] ? cells[6].querySelector('input[type="text"]').value : '',
      Total: cells[7] ? cells[7].innerHTML.replace(',', '') : '',
      VendorUOM: cells[8] ? cells[8].querySelector('input[type="text"]').value : cells[2].innerHTML,
      VendorPart: cells[9] ? cells[9].querySelector('input[type="text"]').value : '',
      VendorRemarks: cells[10] ? cells[10].querySelector('input[type="text"]').value : '',
      ID: cells[11] ? cells[11].innerHTML : '',
      Image: $(`#image-name-${cells[11].innerHTML}`).val()
    });
  }

  console.log(tablearray);

  if (confirm("Are you sure you want to proceed?")) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type : 'post',
      url : '{{URL::to('saveqouteVplatWCI')}}',
      data: {
          QuoteNo,
          Currency,
          BranchCode,
          VendorCode,
          FreightTotal,
          VendorEmail,
          tablearray,
        // FreightDesc,
      }, beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
        console.log(VendorCode);
    },
      success: function(response) {
        console.log(response.quoteNumber);
        $('#ajax-success-modals').modal('show');

        $('#quoteids').text(response.quoteNumber);

        console.log(response.tabledata);
      },
      error: function(response) {
        console.log(response);
        // handle errors
      },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
    });
  } else {
    alert("Cancelled.");
  }
}


});

$(document).ready(function() {

    // history.replaceState('data to be passed', 'Vplat-Quote', '/RequestForQuote');
});

</script>
</body>

</html>

