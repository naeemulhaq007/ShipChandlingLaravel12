<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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




<div class="card">
    <div class="card-body">
      <div class="container-fluid">
        <div class="row d-flex align-items-baseline header_section">
          <div class="col-xl-4">
            <img class="img-fluid" src="<?php echo url("assets/images/WciLOGO.png");?>" style="width: 150px;">

            <p style="margin-top: -17px"><strong style="color: #01004e;font-size: 14px;">{{ $dataf ? $dataf->CompanyName : 'WCI'}}</strong><br>
                <strong style="color: #01004e;font-size: 12px;">{{ $dataf ? $dataf->CompanyAddress : 'Address'}}</strong><br>
                <strong style="color: #01004e;font-size: 10px;">{{ $dataf ? $dataf->CompanyEmailAddress : 'usa@wci.us'}} </strong>
                <br><span style="color: #01004e;font-size: 10px;">{{ $dataf ? $dataf->CompanyWebSite : 'www.WCI.us'}}</span></p>
          </div>
          <div class="col-xl-2 ">

            <ul class="list-unstyled ">
              <li class="text-muted">Name: <span style="color:#01004e;">{{ $dataf ? $dataf->VendorName : 'Vendor Name'}} </span></li>
              <li class="text-muted"><i class="fas fa-envelope"></i><span style="color : #01004e;">{{ $dataf ? $dataf->Address : 'Vendor Address'}}</span></li>
              <li class="text-muted"><i class="fas fa-phone"></i> <span style="color : #01004e;">{{ $dataf ? $dataf->PhoneNo : 'Vendor PhoneNo'}}</span></li>
              {{-- <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li> --}}
            </ul>
          </div>
          <div class="col-xl-3">
              <p class="pt-0">Please advise/confirmed price and availability <br> <b>Event#:</b> {{$dataf ? $dataf->EventNo : ''}} <br> <b>Quote#:</b> <span id="Quoteno">{{$QuoteNo}}</p>
                <div class="input-group col-sm-6">
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
          <div class="col-xl-3 ">
            {{-- <p class="text-muted">Details</p> --}}
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#5d9fc5 ;"></i> <span
                  class="fw-bold">Cust. Ref # :&nbsp;</span> <span style="color : #01004e;">{{$dataf ? $dataf->CustomerRefNo : 'NoRefrence'}}</span></li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#5d9fc5 ;"></i> <span
                  class="fw-bold">Department :&nbsp;</span><span style="color : #01004e;">{{$dataf ? $dataf->DepartmentName : 'DepartmentName'}}</span> </li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#5d9fc5 ;"></i> <span
                  class="me-1 fw-bold">Dated :&nbsp;</span><span style="color : #01004e;">{{$dataf ? date('M-d-Y', strtotime($dataf->SendDate)) : 'SendDate'}},{{$dataf ? date('h:i:a', strtotime($dataf->SendTime)) : 'SendTime'}}</span>
                  {{-- <span class="badge bg-warning text-black fw-bold">
                  Unpaid</span> --}}
              </li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#5d9fc5 ;"></i> <span
                  class="me-1 fw-bold">Required Date :&nbsp;</span><span style="color : #01004e;">{{$dataf ? date('M-d-Y', strtotime($dataf->SendDate)) : 'SendDate'}},{{$dataf ? date('h:i:a', strtotime($dataf->RequiredTime)) : 'SendTime'}}</span>

              </li>
            </ul>
          </div>
          {{-- <div class="col-xl-3 float-end">
            {{-- <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                class="fas fa-print text-primary"></i> Print</a>
            <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                class="far fa-file-pdf text-danger"></i> Export</a>
          </div> --}}
          <hr>
        </div>

        <div class="container-fluid">



          <div class="row">




          </div>

          <div class="row my-2 mx-1 justify-content-center">
            <div class="table-responsive">
                <table class="table table-striped table-borderless" id="Vplattable">
                    <thead style="background-color:#84B0CA;" class="text-white">
                        <tr>
                            <th scope="col">SNO</th>
                            <th scope="col">QTY</th>
                            <th scope="col">UOM</th>
                            <th scope="col">Product&nbsp;Code</th>
                            <th scope="col" style="width: 500px;">Product&nbsp;Name</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col" style="width: 100px">UOM</th>
                            <th scope="col">V.Part&nbsp;#</th>
                            <th scope="col">Vendor&nbsp;Remarks</th>
                            <th scope="col" hidden>ID</th>
                            <th scope="col">Imageprev</th>
                            <th scope="col">Image</th>
                            </tr>
                    </thead>
                    <tbody id="podata">
                        @foreach ($data as $item)
                        <tr >
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td class="text-center">{{number_format($item->Qty, 2, '.', '')}}</td>
                          <td class="text-center">{{$item->UOM}}</td>
                          <td>{{$item->ProductCode}}</td>
                          <td>{{$item->ProductName}}</td>
                          <td style="width:100px"><input type="number" name="" class="cellblur text-right form-control form-controlc" value="{{$item->VendorQty ? number_format($item->VendorQty, 2, '.', '') : number_format($item->Qty, 2, '.', '')}}" id=""></td>
                          <td style="width:100px; "><input type="text" name="" style="" class="cellblur text-right form-control form-controlc" value=" {{$item->VendorRcvdPrice ? round($item->VendorRcvdPrice,2) : 0}}" id=""></td>
                          <td class="text-right"></td>
                          <td><input type="text" name="" class="celldo text-center form-control form-controlc" value="{{$item->VendorUOM ? $item->VendorUOM : $item->UOM}}" id=""></td>
                          <td><input type="text" name="" class="celldo form-control form-controlc" value="{{$item->VendorPartNo}}" id=""></td>
                          <td><input type="text" name="" class="celldo form-control form-controlc" value="{{$item->VendorRecRemarks}}" id=""></td>
                          <td hidden>{{$item->ID}}</td>
                          <td>
                            {!! $item->PicPath ? '<a href="' . url('images/Quote/' .$item->PicPath.'') . '" target="_blank"><img style="max-width:60px; height:30px" class="image-preview" src="' . url('images/Quote/' .$item->PicPath.'') . '" alt=""></a>' : '<a href="' . url('images/Quote/Noimage.png') . '" target="_blank"><img class="image-preview" class="image-preview" src="' . url('images/Quote/Noimage.png') . '" style="max-width:60px; height:30px"></a>' !!}
                          </td>
                          <td>
                            <input type="file" id="image-{{$item->ID}}" data-quoteno="{{$item->QuoteNo}}" class="image-upload" accept="image/*">
                            <input type="hidden" id="image-name-{{$item->ID}}" class="image-name" value="{{$item->PicPath}}">
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>
        </div>




          <div class="row">
            <div class="col-xl-9">
              {{-- <p class="ms-3">Add additional notes and payment information</p> --}}

            </div>
            <div class="col-xl-2">
              <ul class="list-unstyled ml-auto">
                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span><input type="text" readonly name="" id="totalvalueonw" class="form-control text-right form-controlc col-sm-6" ></li>


                <li class="text-muted ms-3 mt-1"><span class="text-black me-4">Other Charges</span><input type="text" name="" value="{{$dataf ? $dataf->FreightTotal : 0}}" id="FreightTotal" class="form-control form-controlc FreightTotal col-sm-6 text-right"></li>
                <li class="text-black ms-3 "><span class="text-black me-4"> Total Amount</span><input type="text" readonly name="" id="totalvalue" class="form-control col-sm-6  form-controlc text-right"></li>
              </ul>
            </div>
            <div class="col-xl-1 mt-auto">
                <button type="button" id="savedata" class="btn btn-primary text-capitalize btncolor"
                  >Submit</button>
              </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xl-10">
              {{-- <p>Thank you for your purchase</p> --}}
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



    <div class="overlay">
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span></div>
        </div>
    </div>
    <div class="position-fixed bg-success text-white rounded p-2" id="myElement" style="right: -300px; top: 30px; transition: right 0.5s;">
        <button class="ml-auto bg-success" type="button" id="closeim"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>Import Success. <i class="fa fa-check " ></i></p>
      </div>
    <div class="position-fixed bg-success text-white rounded p-2" id="myElement2" style="right: -300px; top: 30px; transition: right 0.5s;">
        <button class="ml-auto bg-success" type="button" id="closeim"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>Saved Success. <i class="fa fa-check " ></i></p>
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
    .btncolor{
        background-color:#60bdf3 ;
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
    /* #totalvalueonw{
        color: #4b9dd1;
    }
    #totalvalue{
        color: #4b9dd1;
    }
    */
    .header_section {
    width: 100%;
    background-image: url('assets/images/OIP2.jpg');
    background-size: 100%;
    background-repeat: no-repeat;
    border-radius: 2rem;
}

</style>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    imagePreview.setAttribute('style', 'max-width:60px;height:30px');
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
    scrollY: 900,
    scrollX: true,
    deferRender: true,
    scroller: true,
    paging: false,
    info: false,
    ordering: false,
    responsive: true,
    fixedHeader: true,

    dom: 'Bfrtip',
    buttons: [

{
                extend: 'excelHtml5',
      className: 'btn btn-primary btncolor',

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
            className: 'btn btn-primary btncolor',
            action: function ( e, dt, node, config ) {
                $('#file-input').click();
                }
        },

{
                    text: 'Submit',
            className: 'btn btn-primary btncolor ',
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
  if(!isNaN(VendorQTY) && !isNaN(Price)){
    VendorQTY = (parseFloat(VendorQTY));
    Price = (parseFloat(Price));
    totaln = parseFloat(VendorQTY*Price).toFixed(2);

      cells[7].innerHTML = totaln.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2, useGrouping: true, maximumSignificantDigits: 5});
    }
  Total=cells[7].innerHTML;
  Total = Total.replace(/,/g, ''); // remove commas
    Totalt += parseFloat(Total);
    }
    $('#totalvalueonw').val(Totalt.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2, useGrouping: true, maximumSignificantDigits: 5}));
$('#totalvalue').val(Totalt.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2, useGrouping: true, maximumSignificantDigits: 5}));

}



function savedata() {
  const BranchCode = '{{$BranchCode}}';
  const QuoteNo = '{{$QuoteNo}}';
  const VendorCode = '{{$VendorCode}}';
  const FreightTotal = $('#FreightTotal').val();
  const Currency = $('#Currency').val();
  const WorkUserEmail = '{{$dataf ? $dataf->WorkUserEmail : "naeemulhaq06@gmail.com"}}';
  const WorkUser = '{{$dataf ? $dataf->WorkUser : ''}}';
//   const CustomerName = '{{$dataf ? $dataf->WorkUser : ''}}';
//   const VesselName = '{{$dataf ? $dataf->WorkUser : ''}}';
  const VendorName = '{{$dataf ? $dataf->VendorName : ''}}';
//   const WorkUserEmail = 'naeemulhaq06@gmail.com';

  const table = document.getElementById('podata');
  const rows = table.querySelectorAll('tr');
  const tablearray = [];

  for (const row of rows) {
    const cells = row.cells;
const [SNO, QTY, UOM, ProductCode, ProductName, , , Total, , , , ID] = cells;

    var VendorQty = cells[5].querySelector('input[type="number"]').value;
    const Price = cells[6].querySelector('input[type="text"]').value;
    const VendorUOM = cells[8].querySelector('input[type="text"]').value || UOM.innerHTML;
    const VendorPartNo = cells[9].querySelector('input[type="text"]').value;
    const VendorRecRemarks = cells[10].querySelector('input[type="text"]').value;
    const PicPath = $(`#image-name-${ID.innerHTML}`).val();
    VendorQty = Math.round(VendorQty);

    tablearray.push({
      SNO: SNO ? SNO.innerHTML : '',
      QTY: QTY ? QTY.innerHTML : '',
      UOM: UOM ? UOM.innerHTML : '',
      ProductCode: ProductCode ? ProductCode.innerHTML : '',
      ProductName: ProductName ? ProductName.innerHTML : '',
      VendorQty,
      Price,
      Total: Total ? Total.innerHTML.replace(',', '') : '',
      VendorUOM,
      VendorPartNo,
      VendorRecRemarks,
      ID: ID ? ID.innerHTML : '',
      PicPath,
    });
  }

  console.log(tablearray);


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'post',
      url: '{{URL::to('saveqouteVplatWCI')}}',
      data: {
        QuoteNo,
        Currency,
        BranchCode,
        VendorCode,
        FreightTotal,
        WorkUserEmail,
        WorkUser,
        VendorName,
        tablearray,
      },
      beforeSend: function () {
        $('.overlay').show();
        console.log(VendorCode);
      },
      success: function (response) {
        // console.log(response.quoteNumber);
        // $('#ajax-success-modals').modal('show');
        // $('#quoteids').text(response.quoteNumber);

        document.getElementById("myElement2").style.right = "0";
$('#closeim').click(function (e) {
    e.preventDefault();
    document.getElementById("myElement2").style.right = "-300px";

});
// Set a timeout to hide the element after 10 seconds
setTimeout(function() {
  // Set the right property of the element back to -300px to hide it
  document.getElementById("myElement2").style.right = "-300px";
}, 10000);
        console.log(response);
      },
      error: function (response) {
        console.log(response);
        // handle errors
      },
      complete: function () {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
      }
    });

}


});

$(document).ready(function() {

    // history.replaceState('data to be passed', 'Vplat-Quote', '/RequestForQuote');
});

</script>
</body>

</html>

