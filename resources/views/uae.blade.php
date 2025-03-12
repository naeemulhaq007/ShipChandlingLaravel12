@extends('layouts.app')

@php
$BranchCode = request()->get('BranchCode');
$EventNo = request()->get('eventno');
$QuoteNo = request()->get('quoteno');
$VendorCode = request()->get('VendorCode');
        // $data = DB::connection('secsqlsrv')->table("RFQVendorGSUAE")
        // ->where([
        //     ['BranchCode', $BranchCode],
        //     ['EventNo', $EventNo],
        //     ['QuoteNo', $QuoteNo],
        //     ['VendorCode', $VendorCode],
        // ])
        // ->get();

// echo $data;
@endphp

@section('title', 'Vplat-Quote|' . $QuoteNo)



@section('content_header')
@stop

@section('content')
</div>
<div class="container-fluid">


    <div class="header_section">

        <div class="banner_section layout_padding">
            <div class="container">
              <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-md-6">
                        <h1 class="your_text">{{ $data->CompanyName ? $data->CompanyName : 'Global Ship Services'}} </h1>
                        <h1 class="Shows_text">{{ $data->CompanyAddress ? $data->CompanyAddress : '9139, Wallisville Road, Houston, TX 77029, USA'}}</h1>
                        <p class="there_text">{{ $data->CompanyEmailAddress ? $data->CompanyEmailAddress : 'usa@globalshipservices.us'}} <br>
                            {{ $data->CompanyWebSite ? $data->CompanyWebSite : 'www.globalshipservices.us'}}</p>

                      </div>
                      <div class="col-md-6">
                        <div class="images_1"><img src="<?php echo url("assets/images/logo.png");?>"></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
                <div class="banner_section_2">
                  <div class="row">
                    <div class="col-lg-4 col-sm-12">
                      <div class="box_main">
                        <p class="many_text">{{ $data->VendorName ? $data->VendorName : 'Vendor Name'}} <br> {{ $data->Address ? $data->Address : 'Vendor Address'}}<br> {{ $data->PhoneNo ? $data->PhoneNo : 'Vendor PhoneNo'}}</p>
                      </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                      <div class="box_main active">
                        <p class="many_text active"><b> Please advise/confirmed price and availability</b> <br><b>Event#:</b> {{$EventNo}} <br> <b>Quote#:</b> <span id="Quoteno">{{$QuoteNo}}</span></p>
                      </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                      <div class="box_main">
                        <p class="many_text"><b>Cust. Ref #:</b>{{$data->CustomerRefNo ? $data->CustomerRefNo : 'CustomerRefNo'}} <br> <b>Department:</b>{{$data->DepartmentName ? $data->DepartmentName : 'DepartmentName'}} <br> <b>Dated:</b> {{$data->SendDate ? date('M-d-Y', strtotime($data->SendDate)) : 'SendDate'}},{{$data->SendTime ? date('h:i:a', strtotime($data->SendTime)) : 'SendTime'}} <br><b>Required Date:</b> {{$data->SendDate ? date('M-d-Y', strtotime($data->SendDate)) : 'SendDate'}},{{$data->RequiredDate ? date('h:i:a', strtotime($data->RequiredTime)) : 'SendTime'}}</p>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>
          <!-- banner section end -->
          </div>
          <!-- about section start -->
          <div class="about_section layout_padding">
            <div class="">
              <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                  <div class="online_bt_main">
                    <div class="read_bt1">
                        <a name="" id="savedataup"  class="btn "  role="button">Submit</a>

                    </div>
                  </div>
                </div>
              </div>

            <div class="col-sm-12 mx-auto">

            </div>
            </div>
          </div>
          <!-- about section end -->
          <!-- product section start -->
          <div class="product_section layout_padding">
            <div class="container">

              <div class="row">


                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <div class="row py-1">
                        <div class="col-sm-3">
                            <p><strong>Total:</strong></p>
                        </div>
                        <div class="col-sm-9 row">
                            <p><strong id="totalvalueonw" style="display:inline;"></strong>$</p>

                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-3">
                            <p>Freight&nbsp;Total:</p>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="" id="FreightTotal" class="form-control" id="">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-3">
                            <p>Freight&nbsp;Desc:</p>
                        </div>
                        <div class="col-sm-9">
                            <textarea name="FreightDesc" id="FreightDesc" class="form-control" id="" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-3">
                            <p>Total</p>
                        </div>
                        <div class="col-sm-9">
                            <p><strong id="totalvalue" style="display:inline;"></strong>$</p>

                        </div>

                    </div>
                    <div class="row read_bt1">
                        <a name="" id="savedata" class="btn btn-primary"  role="button">Submit</a>
                    </div>
                </div>

            </div>
            </div>
          </div>

</div>


    <form id="import-form" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" hidden class="ml-3" id="file-input" name="file" accept=".xlsx">
        <button type="submit" hidden id="import-button" class="btn btn-primary">Import</button>
    </form>







@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<style>
.header_section{
    width: 100%;
    float: left;
    background-image: url('assets/images/carnival.png');
    /* height: auto; */
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
    height: 380px;
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
@stop

@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
  <script>


$(document).on('change', '.image-upload', function () {
  let image = $(this)[0].files[0];
  let id = $(this).attr('id').split('-')[1];
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
    url: '{{ URL::to('upload-image') }}',
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
  VendorQTY=cells[5].innerHTML;
  Price=cells[6].innerHTML;
  Total=cells[7].innerHTML;
  VendorUOM=cells[8].innerHTML;
  VendorPart=cells[9].innerHTML;
  VendorRemarks=cells[10].innerHTML;


  if(!isNaN(VendorQTY) && !isNaN(Price)){
      cells[7].innerHTML = Math.round(Number(VendorQTY)*Number(Price),2);
    }
    Totalt += Number(cells[7].innerHTML);

    }
    $('#totalvalueonw').text(Totalt);
$('#totalvalue').text(Totalt);

}

calcl();

var tables = $('#Vplattable').DataTable({
    scroller:       true,
    scrollY:        400,
    scrollX: true,
    deferRender:    true,
    // responsive: true,
    ordering:false,
    // searching: false,
    paging: false,
    info: false,
    dom: 'Bfrtip',
    buttons: [


{
     extend: 'excel',
      text: 'Excel Export',
      className: 'btn btn-primary ',


}
, {
                    text: 'Excel Import',
            className: 'btn btn-primary ',
            action: function ( e, dt, node, config ) {
                $('#file-input').click();
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
    $('#totalvalueonw').text(Totalt);

$('#totalvalue').text(Totalt);




$('#FreightTotal').keyup(function () {
    let totalvalue = parseFloat($('#totalvalueonw').text());
    let FreightTotal = parseFloat($('#FreightTotal').val());
    if(!isNaN(totalvalue) && !isNaN(FreightTotal)){
$('#totalvalue').text(totalvalue+FreightTotal);
    }

});

    });

    $(document).ready(function() {
updateSNo();

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
            url : '{{URL::to('importvplat')}}',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.message == 'File imported successfully') {
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
    let row = table.rows[i];
    if (!row) {
      console.error("The row is undefined for index: " + i);
      continue;
    }

    for (let j = 0; j < 11; j++) {
        let cell = row.cells[j];
        if (j === 5 || j === 6) {
            cell.setAttribute('class', 'cellblur');
        }
        if (j === 5 || j === 6 || j === 8 || j === 9 || j === 10) {
            cell.contentEditable = "true";
        }
        cell.innerHTML = array[i][j];
    }
}






updateSNo();
calcl();

                }
                else{
                    alert(data.message);
                }



            },
            error: function(data) {
                console.log(data);
                // handle errors
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
// $('.cellblur').keyup(function(){
    calcl();
}
);
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
  VendorQTY=cells[5].innerHTML;
  Price=cells[6].innerHTML;
  Total=cells[7].innerHTML;
  VendorUOM=cells[8].innerHTML;
  VendorPart=cells[9].innerHTML;
  VendorRemarks=cells[10].innerHTML;


  if(!isNaN(VendorQTY) && !isNaN(Price)){
      cells[7].innerHTML = Math.round(Number(VendorQTY)*Number(Price),2);
    }
    Totalt += Number(cells[7].innerHTML);

    }
    $('#totalvalueonw').text(Totalt);
$('#totalvalue').text(Totalt);

}
function savedata(){
  let BranchCode = '{{$BranchCode}}';
  let EventNo = '{{$EventNo}}';
  let QuoteNo = '{{$QuoteNo}}';
  let VendorCode = '{{$VendorCode}}';
  let FreightTotal = $('#FreightTotal').val();
  let FreightDesc = $('#FreightDesc').val();

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
      VendorQTY: cells[5] ? cells[5].innerHTML : '',
      Price: cells[6] ? cells[6].innerHTML : '',
      Total: cells[7] ? cells[7].innerHTML : '',
      VendorUOM: cells[8] ? cells[8].innerHTML : cells[2].innerHTML,
      VendorPart: cells[9] ? cells[9].innerHTML : '',
      VendorRemarks: cells[10] ? cells[10].innerHTML : '',
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
      url : '{{URL::to('saveqouteVplat')}}',
      data: {
        tablearray,
        QuoteNo,
        EventNo,
        BranchCode,
        VendorCode,
        FreightTotal,
        FreightDesc,
      },
      success: function(response) {
        alert(response.message + response.Code);
        console.log(response.tabledata);
      },
      error: function(response) {
        console.log(response);
        // handle errors
      }
    });
  } else {
    alert("Cancelled.");
  }
}



});



</script>
@stop


@section('content')
