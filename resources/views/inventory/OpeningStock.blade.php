@extends('layouts.app')



@section('title', 'Opening-Stock')

@section('content_header')

@stop

@section('content')
</div>

<div class="container-fluid ">

    <div class="col-lg-12">
        <div class="row">

        </div>

        <div class="card mt-3">
            <div  style="background-color:#EEE; " class="card-header">
                <div class="card-tools ">
                    <div class=" row">

                        <a name="firstvoucher" data-voucherno="{{$firstVoucherNo}}" id="firstvoucher" class="btn btn-secondary mx-1"  role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        <button id="prev-voucher" class="btn btn-info"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>

        <div class="col-sm-3">
            <div class="input-group">

                <input class="form-control" type="number"  id="current-voucher" name="current-voucher" value="" >

            </div>
            </div>
        <button id="next-voucher" class="btn btn-info"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            <a name="" id="lastvoucher" data-voucherno="{{$lastVoucherNo}}" class="btn btn-secondary mx-1"  role="button"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>

            <input type="hidden" id="vouchers" name="vouchers" value="{{ implode(',', $Voucher->pluck('InvoiceNo')->toArray()) }}">
            <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
                </div>
                <div class="row">
                    <h5 class="text-blue">Opening Stock</h5>
                    </div>

            </div>
            <div class="card-body">
                <div class="row py-1">

        <div class="inputbox col-sm-2">
                <span class="Txtspan" id="">Date</span>


            <input id='TxtVoucherDate' type="date" class="" value="">

        </div>
        <div class="inputbox col-sm-2">
                <span class="Txtspan" id="">Ref #</span>


            <input id='TxtRefNo' type="text" class="" value="">

        </div>




              </div>
              <div class="row py-1 pt-2">
                <div class="inputbox col-sm-6">

                    <span class="Txtspan" >Opening A/c</span>

                    <input class=""  type="text" id="TxtActName" name="TxtActName" >
                    <input class=""  type="hidden" id="TxtActCodeNew" name="TxtActCodeNew" >
                </div>
                <div class="inputbox col-sm-1">
                <input class="" readonly type="text" id="TxtActCode" name="TxtActCode" >\
                <span class="Txtspan"></span>
                </div>


        </div>
        <div class="row  py-1 align-items-center">
            <div class="inputbox col-sm-3">
                    <span class="Txtspan" id="">Location</span>
                <select  class="" id="CmbGodownName" name="CmbGodownName">
                    <option value="1">HOUSTON</option>
                    <option value="2">NEW ORLEAN</option>
                    <option value="3">LOS ANGELES</option>
                    <option value="4">NEW JEARSY</option>
                    <option value="5">NEW YORK</option>
                </select>
            </div>
            <div class="inputbox col-sm-1">
                <span class="Txtspan">Sale Rate</span>
                <input class="" type="text" name="TxtSaleRate" id="TxtSaleRate">
            </div>
            <div class="inputbox col-sm-1">
                <span class="Txtspan">Last Rate</span>
                <input class="" type="text" name="TxtLastPurRate" id="TxtLastPurRate">
            </div>
            <div class="inputbox col-sm-1">
                <span class="Txtspan">Avg Rate</span>
                <input class="" type="text" name="TxtAvgRate" id="TxtAvgRate">
            </div>
            <div class="inputbox col-sm-1">
                <span class="Txtspan">Stock Rate</span>
                <input class="" type="text" name="TxtStockQty" id="TxtStockQty">
            </div>
        </div>



            </div>
        </div>
        <div class="rounded shadow mx-auto small">
            <table class="table table-hover   "  id="OpeningStocktable">
        <thead class="">
          <tr>
            <th style="width: 100px">ItemCode</th>
            <th style="width: 1200px">Item&nbsp;Name</th>
            <th class="text-right">PUOM</th>
            {{-- <th class="px-5" >BatchNo</th> --}}
            {{-- <th class="px-5" >Currency</th> --}}
            {{-- <th class="px-5" >ExpiryDate</th> --}}
            {{-- <th class="px-5" >ExpireBarCode</th> --}}
            <th class="text-right" >Quantity</th>
            {{-- <th class="px-5" >BonusQty</th> --}}
            <th class="text-right">Price</th>
            {{-- <th class="text-right">GrossAmt</th>
            <th class="px-5">DiscPer</th>
            <th class="text-right">DiscAmt</th> --}}
            <th class="text-right">Amount</th>
            {{-- <th class="px-5">TotQty</th>
            <th class="px-5">AvgRate</th>
            <th class="px-5">InvRate</th>
            <th class="px-5">ExpPer</th>
            <th class="text-right">InvAmt</th>
            <th class="px-5">BarCode</th>
            <th class="px-5">DepartmentName</th>
            <th class="px-5">DepartmentCode</th>
            <th class="text-right">SaleRate</th>
            <th class="px-5">IMPAItemCode</th> --}}
          </tr>
        </thead>
            <tbody id="OpeningStocktablebody">

              </tbody>
            </table>
        </div>

<div class="card">
    <div class="card-body">
        <div class="row py-1">

            <div class="CheckBox1">
                <label class="input-group text-info ml-2">
                    <input class="" type="checkbox" name="ChkCompanyHeading" id="ChkCompanyHeading" checked
                        value=""> Company Heading
                </label>
            </div>
            {{-- <div class="form-check form-check-inline">

                <label class="form-check-label text-info mx-1">
                    <input class="form-check-input " type="checkbox" onclick="" name="ChkCompanyHeading" id="ChkCompanyHeading" value=""> Company Heading
                </label>

            </div> --}}
            <div class="inputbox col-sm-1 ml-auto">
               <span class="Txtspan p-1" for="TxtTotDrAmount">Total </span>
                <input class="" type="text" name="TxtTotDrAmount" id="TxtTotDrAmount" >
            </div>
            <div class="inputbox col-sm-1">

                <input class="" type="text" name="TxtTotCrAmount" id="TxtTotCrAmount" >
            </div>
            <div class="inputbox col-sm-4 clearfix">
                <input type="text" id="TxtTotInvAmt" name="TxtTotInvAmt" class="form-control col-sm-3 ml-2 float-right">
                <input type="text" id="TxtTotBankCharges" name="TxtTotBankCharges" class="form-control col-sm-3 ml-2 float-right">
                <input type="text" id="TxtTotAmount" name="TxtTotAmount" class="form-control col-sm-3 ml-2 float-right">

            </div>
        </div>
        <div class="row py-1">
            <div class="inputbox col-md-7">
                    <span class="Txtspan" id="">Bank Description</span>
                <input class="" type="text" name="TxtBankDescription" id="TxtBankDescription" >
            </div>
            <div class="inputbox col-md-2">
                    <span class="Txtspan" id="">Total Expense</span>
                <input class="" type="text" name="TxtTotalExp" id="TxtTotalExp">
            </div>
            <div class="inputbox col-md-2">
                    <span class="Txtspan" id="">Net Amount :</span>
                <input class="" type="text" name="TxtNetAmount" id="TxtNetAmount">
            </div>
        </div>
        {{-- <div class="row py-1"> --}}
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success bg-success"
                    style="width:0%">
                </div>
            </div>
        {{-- </div> --}}
        <div class="row py-2">
            <div class="mx-auto">
                <a name="" id="Newinv" class="btn btn-primary"  role="button"><i class="fa fa-plus-square text-white" aria-hidden="true"></i> New</a>
                <a name="CmdSave" id="CmdSave" class="btn btn-success"  role="button"><i class="fa fa-cloud text-white" aria-hidden="true"></i> Save</a>
                <a name="" id="" class="btn btn-warning" role="button"> <i class="fas fa-trash text-dark"></i> Delete</a>
                <a name="" id="" class="btn btn-danger" role="button"><i class="fas fa-door-open  text-white fa-fw"></i> Exit</a>
            </div>
        </div>
    </div>
</div>

    </div>



</div>
<div id="chartofaccount" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Chart of Account</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Content</p>
<?php echo View::make('partials.Searchchartofaccount') ?>

            </div>
            <div class="modal-footer">
                Footer
            </div>
        </div>
    </div>
</div>

@stop

  @section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<style>
    .form-group {
  position: relative;
}

.title {
  position: absolute;
  top: -1.5em;
  left: 0.25em;
  background-color: #fff;
  padding: 0 0.5em;
}
.custom-col-2{
        flex:0 0 12.6%;
        max-width: 12.6%;
    }
.span2{
width: 110px;
/* font-size: 11px; */

}
.card-body span{

}
.form-control{
    /* font-size: 11px; */

}

</style>
  @stop

  @section('js')
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> --}}
  {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
  {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
  <script>
    $(document).ready( function () {
        $(".progress-bar").animate({
    width: "100%"

}, 2500);
setTimeout(function() {
    //   alert('Progress bar complete!');
    $(".progress-bar").hide();
    }, 3000);
        const vouchersInput = document.getElementById('vouchers');
const currentVoucherInput = document.getElementById('current-voucher');
const prevButton = document.getElementById('prev-voucher');
const nextButton = document.getElementById('next-voucher');

let vouchers = vouchersInput.value.split(',');
let currentIndex = vouchers.findIndex(voucher => voucher === currentVoucherInput.value);
currentVoucherInput.value = vouchers[currentIndex];

prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        currentVoucherInput.value = vouchers[currentIndex];
    }
});

nextButton.addEventListener('click', () => {
    if (currentIndex < vouchers.length - 1) {
        currentIndex++;
        currentVoucherInput.value = vouchers[currentIndex];
    }
});

    });
    $(document).ready( function () {
        // dataget();
        // $('#containers').hide();
        var table = $('#OpeningStocktable').DataTable({

            scrollY:350,
            deferRender:true,
            scroller:true,
            paging: false,
            info:false,
            ordering:false,
            // responsive:true,
            searching:false,
            dom: 'Bfrtip',
            buttons: [


{
    text: 'ADD',
className: 'btn btn-primary ',
action: function ( e, dt, node, config ) {
    Rowaddfunc();
}
},

// {
//     text: 'Edit',
// className: 'btn btn-primary ',
// action: function ( e, dt, node, config ) {
//     Roweditfunc();

// }
// },
{
      text: 'Delete',
      className: 'btn btn-primary Delete-row',
      action: function(e, dt, node, config) {
    //     var id = $('#deleteButton').attr('data-row-id');
    //     Rowdeletefunc(table, id);
    // table.row('.selected').remove().draw(false);
      },
    //   init: function(api, node, config) {
    //     $(node).attr('id', 'deleteButton');
    //     $(node).attr('data-row-id', '');
    //   }
    },{
    text: 'Print',
className: 'btn btn-primary ',
action: function ( e, dt, node, config ) {
    // Rowaddfunc();
    $('#ExpenseVoucherReport').modal('show');

}
},
],

        });
        $('#OpeningStocktable tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    // $('.Delete-row').click(function () {
    //     table.row('.selected').remove().draw(false);
    // });

    $(".dt-button").removeClass("dt-button")

        $('#current-voucher').blur(function () {
            dataget();
        });

        $("#current-voucher").on("keydown", function(event) {
            if (event.which === 13) {
                dataget();
            }
        });
        $('#lastvoucher').click(function(e){
           var voucherno = document.getElementById("lastvoucher").dataset.voucherno;
            document.getElementById("current-voucher").value = voucherno;
            dataget();
        });
        $('#firstvoucher').click(function(e){
           var voucherno = document.getElementById("firstvoucher").dataset.voucherno;
            document.getElementById("current-voucher").value = voucherno;
            dataget();
        });
        $(document).on('keyup', '.setdes', function (e) {
        let tddes = this.innerHTML;
        var table = document.getElementById('OpeningStocktablebody');
var lastRow = table.rows[table.rows.length - 1];
var firstCell = lastRow.cells[0].innerHTML;
            console.log(tddes);
            console.log(firstCell);
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

        $.ajax({
            url: '/jvdes',
            type: 'POST',
            data: {
                des:tddes,
                ActCode:firstCell,
            }, beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
    success: function (response) {
        console.log(response.results.Des);
        var table = document.getElementById('OpeningStocktablebody');
var lastRow = table.rows[table.rows.length - 1];
        let ExpActCodeCell = lastRow.cells[5];
        ExpActCodeCell.innerHTML=response.results.Des;
    },
    error: function (xhr, status, error) {
        console.log(error);

    },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
});

        });
        $(document).on('keydown', '.setact', function (e) {
    if (e.keyCode === 13) {
        e.preventDefault();
        let td = this.innerHTML;
        if(td == null || td == ''){
            $('#chartofaccount').modal('show');

        }else{

            // alert(td);
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

        $.ajax({
            url: '/jvact',
            type: 'POST',
            data: {
                ActCode:td,
            }, beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
    success: function (response) {

        if(response.results !== null){
            console.log(response.results);
            let acname = response.results.AcName3;

            var table = document.getElementById('OpeningStocktablebody');
    var lastRow = table.rows[table.rows.length - 1];
            let ActCodeCell = lastRow.cells[1];
            ActCodeCell.innerHTML=acname;
        }else{
            alert('Not Found');
        }
    },
    error: function (xhr, status, error) {
        console.log(error);

    },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
});
        }
    }
});

//         $('#OpeningStocktable tbody').on('click', 'tr', function() {
//     if ($(this).hasClass('selected')) {
//       $(this).removeClass('selected');
//       $('#deleteButton').attr('data-row-id', '');
//     } else {
//       table.$('tr.selected').removeClass('selected');
//       $(this).addClass('selected');
//       var id = $(this).attr('data-row-id');
//       $('#deleteButton').attr('data-row-id', id);
//     }
//   });

//   function Rowdeletefunc(table, id) {
//     if (id) {
//       table.row('[data-row-id="' + id + '"]').remove().draw();
//       $('#deleteButton').attr('data-row-id', '');
//     }
//   }
function Rowdeletefunc(table, rows) {
    if (rows) {
      for (var i = 0; i < rows.length; i++) {
        table.row(rows[i]).remove().draw();
      }
      $('#deleteButton').attr('data-row-id', '');
    }
  }


    function Rowaddfunc(){

// alert('add');
    // var pkrrate = document.getElementById("pkrrate").value;
//    var ExpActName = $('#TxtExpActName').val();
//    var Description = $('#TxtDescription').val();
//    var Quantity = $('#TxtQuantity').val();
//    var Rate = $('#TxtRate').val();
//    var Amount = $('#TxtAmt').val();
//    var ExpActCode = $('#TxtExpActCode').val();
//    var ID = $('#TxtID').val();



    var table = document.getElementById("OpeningStocktable");
    table.innerHTML = ""; // Clear the table

    var row = table.insertRow(-1);

let ItemCodeCell = row.insertCell(0);
ItemCodeCell.innerHTML = '';
ItemCodeCell.contentEditable = true;
ItemCodeCell.style.width = '100px';


let ItemNameCell = row.insertCell(1);
ItemNameCell.innerHTML = '';
ItemNameCell.contentEditable = true;
ItemNameCell.style.width = '180px';

let PUOMCell = row.insertCell(2);
PUOMCell.innerHTML = '';
PUOMCell.contentEditable = true;
// PUOMCell.style.textAlign = 'center';
PUOMCell.style.width = '100px';
PUOMCell.style.textAlign = 'right';

// let BatchNoCell = row.insertCell(3);
// BatchNoCell.innerHTML = '';
// // BatchNoCell.style.textAlign = 'center';
// BatchNoCell.contentEditable = true;
// BatchNoCell.style.width = '100px';

// let CurrencyCell = row.insertCell(4);
// // CurrencyCell.style.textAlign = 'center';
// CurrencyCell.innerHTML ='USD';
// CurrencyCell.contentEditable = true;
// CurrencyCell.style.width = '100px';

// let expiryDateCell = row.insertCell(5);
// expiryDateCell.innerHTML = '';
// expiryDateCell.contentEditable = true;
// expiryDateCell.style.width = '100px';

// let ExpireBarCodeCell = row.insertCell(6);
// ExpireBarCodeCell.innerHTML ='';
// // ExpireBarCodeCell.style.textAlign = 'center';
// ExpireBarCodeCell.contentEditable = true;
// ExpireBarCodeCell.style.width = '100px';

let QuantityCell = row.insertCell(3);
QuantityCell.innerHTML = '' ;
// QuantityCell.style.textAlign = 'center';
QuantityCell.contentEditable = true;
QuantityCell.style.width = '100px';
QuantityCell.style.textAlign = 'right';

// let BonusQtyCell = row.insertCell(8);
// BonusQtyCell.innerHTML = '';
// // BonusQtyCell.style.textAlign = 'center';
// BonusQtyCell.contentEditable = true;
// BonusQtyCell.style.width = '100px';

let TradePriceCell = row.insertCell(4);
TradePriceCell.innerHTML= '';
TradePriceCell.style.textAlign = 'right';
TradePriceCell.contentEditable = true;
TradePriceCell.style.width = '100px';

// let GrossAmtCell = row.insertCell(10);
// GrossAmtCell.innerHTML ='';
// GrossAmtCell.style.textAlign = 'right';
// GrossAmtCell.contentEditable = true;
// GrossAmtCell.style.width = '100px';

// let DiscPerCell = row.insertCell(11);
// DiscPerCell.innerHTML ='';
// // DiscPerCell.style.textAlign = 'center';
// DiscPerCell.style.width = '100px';
// DiscPerCell.contentEditable = true;
// //
// let DiscAmtCell = row.insertCell(12);
// DiscAmtCell.innerHTML = '';
// DiscAmtCell.style.textAlign = 'right';
// DiscAmtCell.style.width = '100px';
// DiscAmtCell.contentEditable = true;

let AmountCell = row.insertCell(5);
AmountCell.innerHTML ='';
AmountCell.style.textAlign = 'right';
AmountCell.contentEditable = true;
AmountCell.style.width = '100px';

// let TotQtyCell = row.insertCell(14);
// TotQtyCell.innerHTML ='';
// // TotQtyCell.style.textAlign = 'center';
// TotQtyCell.style.width = '100px';
// TotQtyCell.contentEditable = true;

// let AvgRateCell = row.insertCell(15);
// AvgRateCell.innerHTML ='';
// AvgRateCell.style.textAlign = 'right';
// AvgRateCell.style.width = '100px';
// AvgRateCell.contentEditable = true;

// let InvRateCell = row.insertCell(16);
// InvRateCell.innerHTML ='';
// InvRateCell.style.textAlign = 'right';
// InvRateCell.style.width = '100px';
// InvRateCell.contentEditable = true;

// let ExpPerCell = row.insertCell(17);
// ExpPerCell.innerHTML ='';
// // ExpPerCell.style.textAlign = 'center';
// ExpPerCell.style.width = '100px';
// ExpPerCell.contentEditable = true;

// let InvAmtCell = row.insertCell(18);
// InvAmtCell.innerHTML ='';
// InvAmtCell.style.textAlign = 'right';
// InvAmtCell.style.width = '100px';
// InvAmtCell.contentEditable = true;

// let BarCodeCell = row.insertCell(19);
// BarCodeCell.innerHTML ='';
// // BarCodeCell.style.textAlign = 'center';
// BarCodeCell.style.width = '100px';
// BarCodeCell.contentEditable = true;

// let DepartmentNameCell = row.insertCell(20);
// DepartmentNameCell.innerHTML ='';
// DepartmentNameCell.contentEditable = true;
// DepartmentNameCell.style.width = '100px';

// let DepartmentCodeCell = row.insertCell(21);
// DepartmentCodeCell.innerHTML ='';
// DepartmentCodeCell.contentEditable = true;
// DepartmentCodeCell.style.width = '100px';

// let SaleRateCell = row.insertCell(22);
// SaleRateCell.innerHTML ='';
// SaleRateCell.style.textAlign = 'right';
// SaleRateCell.contentEditable = true;
// SaleRateCell.style.width = '100px';

// let IMPAItemCodeCell = row.insertCell(23);
// IMPAItemCodeCell.innerHTML ='';
// IMPAItemCodeCell.contentEditable = true;
// IMPAItemCodeCell.style.width = '100px';


        };
    function Roweditfunc(){
        alert('edit');

        };

        function tablecomposer(){
    let table = document.getElementById('OpeningStocktablebody');
    let rows = table.rows;
    var DebitAmounttot = 0;
    var CreditAmounttot = 0;
    //  datatablearray = [];
        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
//   let ActCode = cells[0].innerHTML;
//   if (ActCode == '') {
//       alert('Please Enter ACT-CODE');
// return;
//   }
//   datatablearray.push({
           let ActCode = cells[0] ? cells[0].innerHTML : '';
           let AccountName = cells[1] ? cells[1].innerHTML : '';
           let DebitAmount = cells[2] ? cells[2].innerHTML : '';
           let CreditAmount = cells[3] ? cells[3].innerHTML : '';
           let Currency = cells[4] ? cells[4].innerHTML : '';
           let Description = cells[5] ? cells[5].innerHTML : '';
           DebitAmounttot += Number(DebitAmount);
           CreditAmounttot += Number(CreditAmount);
//   });

    }
    $('#TxtTotDrAmount').val(DebitAmounttot);
$('#TxtTotCrAmount').val(CreditAmounttot);
}


// $(document).ready(function () {
function CheckRecon(MReconAmtChange, callback) {
    var MVnon =  $('#TxtVoucherNo').val();
    var MVnoc = "JV";
    tablecomposer();
    let table = document.getElementById('OpeningStocktablebody');
    let rows = table.rows;
    var DebitAmounttot = 0;
    var CreditAmounttot = 0;
     datatablearray = [];
        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
//   let ActCode = cells[0].innerHTML;
//   if (ActCode == '') {
//       alert('Please Enter ACT-CODE');
// return;
//   }
  datatablearray.push({
            ActCode : cells[0] ? cells[0].innerHTML : '',
            AccountName : cells[1] ? cells[1].innerHTML : '',
            DebitAmount : cells[2] ? cells[2].innerHTML : '',
            CreditAmount : cells[3] ? cells[3].innerHTML : '',
            Currency : cells[4] ? cells[4].innerHTML : '',
            Description : cells[5] ? cells[5].innerHTML : '',
  });

    }
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$.ajax({
  url: '/CheckRecon',
  type: 'POST',
  data: {
    MVnon,MVnoc,datatablearray,
  },
  success: function(resposne) {
    console.log(resposne);
    if(resposne.Message == 'ALREADY CONCILED Confirmation'){
        var password = prompt("RECONCILED VOUCHER FOUND!!!, Amount has been changed!!!");
if (password === "332211") {
  if (confirm("Do you want to proceed?")) {
    // proceed with action
    // alert("Changed Terms.");
    MReconAmt = "Y"
    // document.getElementById("CmbTerms").value = terms;
    callback(MReconAmt);
  } else {
    alert("Access denied.");
    return;
}
} else {
    alert("Incorrect password.");
    return;
}

    }
  }
});

}

// });
$('#TxtTotCrAmount').blur(function (e) {
    e.preventDefault();
    tablecomposer()

});
$('#TxtTotDrAmount').blur(function (e) {
    e.preventDefault();
    tablecomposer()

});
$('#CmdSave').click(function(e){
    tablecomposer()
   let MReconAmtChange = "";
    // console.log(datatablearray);

// if (datatablearray.length = 0) {
//     alert();
//     return;
// }
let table = document.getElementById('OpeningStocktablebody');
    let rows = table.rows;
     datatablearray = [];
        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
  let ActCode = cells[0].innerHTML;
  if (ActCode == '') {
      alert('Please Enter ACT-CODE');
return;
  }
  datatablearray.push({
            ActCode: cells[0] ? cells[0].innerHTML : '',
            AccountName: cells[1] ? cells[1].innerHTML : '',
            DebitAmount: cells[2] ? cells[2].innerHTML : '',
            CreditAmount: cells[3] ? cells[3].innerHTML : '',
            Currency: cells[4] ? cells[4].innerHTML : '',
            Description: cells[5] ? cells[5].innerHTML : '',

  });

    }

    let TxtTotDrAmount = $('#TxtTotDrAmount').val();
    let TxtTotCrAmount = $('#TxtTotCrAmount').val();
    let GrpRecon = $('#GrpRecon').text();
if(TxtTotDrAmount !== TxtTotCrAmount){
    alert('Amount Not Match /n The Debit Amount not equal to Credit Amount');
    return;
}

if(GrpRecon == 'Reconciled'){
    CheckRecon(MReconAmtChange, function(MReconAmt) {
        // console.log(MReconAmtChange);
        // continue your code here;
    console.log(MReconAmt);
    if(MReconAmt !== 'Y'){
        alert('end');
        return;
    }


    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

        $.ajax({
            url: '/jvsave',
            type: 'POST',
            data: {
                TxtGodownCode:$('#TxtGodownCode').val(),
                TxtVoucherNo:$('#TxtVoucherNo').val(),
                TxtVoucherDate:$('#TxtVoucherDate').val(),
                TxtTotDrAmount:$('#TxtTotDrAmount').val(),
                TxtTotCrAmount:$('#TxtTotCrAmount').val(),
                table:datatablearray,
            }, beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
    success: function (data) {
// if (data.success == true) {
    alert('saved');
    console.log(data);
// }
    },
    error: function (xhr, status, error) {
        console.log(error);

    },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
});
});
}



});


});



function AddNew() {
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$.ajax({
  url: '/AddNew-receipt-vouchers',
  type: 'POST',
  data: {

  },
  success: function(resposne) {
    alert(resposne.message);
    $('#TxtVoucherNo').val(resposne.MVoucherNo);
  }
});

}
function PlusCaps() {
    var vouncherno = $('#TxtVoucherNo').val();
    var totalvouchers = '{{$lastVoucherNo}}';
    if (vouncherno == '') {
        $('#TxtVoucherNo').val(1);
    }else{

        var nextValue = parseInt(document.getElementById("TxtVoucherNo").value) + 1;
        if (nextValue > totalvouchers) {
            return;
        }else{
            document.getElementById("TxtVoucherNo").value = nextValue;
            dataget();
        }
    }
};

function MinusCaps() {
    var vouncherno = $('#TxtVoucherNo').val();
    var totalvouchers = '{{$firstVoucherNo}}';
    if (vouncherno == '') {
     return;
    }else{
        var nextValue = parseInt(document.getElementById("TxtVoucherNo").value) - 1;
        if (nextValue < 1) {
            return;
        }else{
            document.getElementById("TxtVoucherNo").value = nextValue;
            dataget();
        }
    }
};


function dataget(){
let BillNo = $('#current-voucher').val();
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$.ajax({
  url: '/searchOpeningStock',
  type: 'POST',
  data: {
    BillNo,
    // pono: $('#TxtClientOrder').val(),
  },
  success: function(resposne) {

    document.getElementById("firstvoucher").dataset.voucherno = resposne.firstVoucherNo;
    document.getElementById("lastvoucher").dataset.voucherno = resposne.lastVoucherNo;
console.log(resposne);
      let data = resposne.results;
    let table = document.getElementById('OpeningStocktablebody');
    table.innerHTML = ""; // Clear the table
    var ids=0;
    // if (resposne.Message == 'data') {
    //     $('#TxtSupplierName').val(resposne.Supply.SupplierName);
    //     $('#TxtAddress').val(resposne.Supply.address);
    //     $('#TxtPhone').val(resposne.Supply.PhoneNo);
    //     $('#TxtMobile').val(resposne.Supply.MobileNo);
    //     $('#TxtEmail').val(resposne.Supply.emailAddress);
    //     $('#TxtCrCode').val(resposne.Supply.ActCodeLiability);
    //     $('#TxtCrCode').val(resposne.Acfile3.ActCode);
    //     $('#TxtFileName').val(resposne.Acfile3.AcName3);

    // }else{
    //     $('#TxtSupplierName').val();
    //     $('#TxtAddress').val();
    //     $('#TxtPhone').val();
    //     $('#TxtMobile').val();
    //     $('#TxtEmail').val();
    //     $('#TxtCrCode').val();
    //     $('#TxtCrName').val();
    // }
    // if ((resposne.Trans) !== null) {
    //     if(resposne.Trans.ChkRecon == true){
    //        $('#GrpRecon').text('Reconciled');
    //        $('#GrpRecon').css("color",'Green');
    //        $('#TxtAmt').val(parseFloat(resposne.Trans.TransAmt).toFixed(2));

    //     }else{
    //         $('#GrpRecon').text('Not Reconciled');
    //         $('#GrpRecon').css("color",'Red');
    //         $('#TxtAmt').val('');

    //     }
    //     $('#TxtReconWorkUser').val(resposne.Trans.ReconWorkUser);
    //     // $('#TxtReconDate').val(resposne.Trans.ReconDate);
    //     if(resposne.Trans.ReconDate !== null){

    //         var chte = new Date(resposne.Trans.ReconDate);
    //         const fDate = chte.toISOString().substring(0, 10);
    //         $('#TxtReconDate').val(fDate);
    //     }

    // }else{
    //     $('#GrpRecon').text('Not Reconciled');
    //         $('#GrpRecon').css("color",'Red');
    //         $('#TxtAmt').val('');
    //         $('#TxtReconWorkUser').val('');
    //     $('#TxtReconDate').val('');
    // }
    data.forEach(function(item) {
        ids=ids+1;
        var chekdate = new Date(item.Date);
        var ExpiryDate = new Date(item.ExpiryDate);
        // const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        // const dayOfWeek = chekdate.toLocaleString('en-US', options).split(',')[0];
        // // console.log(dayOfWeek);
        // const DateActYear = chekdate.toLocaleDateString("en-US", {year: 'numeric', month: '2-digit', day: '2-digit'});
        const forDate = chekdate.toISOString().substring(0, 10);
        const expiryDate = ExpiryDate.toISOString().substring(0, 10);
        // $('#TxtRefNo').val(item.RefNo);
        // $('#TxtSupplierCode').val(item.SupplierCode);
        // $('#TxtTotAmount').val(Math.round(item.TotAmount,2));
        $('#TxtVoucherDate').val(forDate);
        // $('#TxtDateActYear').val(forDate);
        // $('#TxtCrCode').val(item.CrActCode);
        // $('#TxtCrName').val(item.CrActName);
        // $('#TxtDes').val(item.Des);
        // $('#TxtDays').val(dayOfWeek);
        // $('#TxtExpActName').val(item.ExpActName);
        $('#CmbGodownName').val(item.GodownCode);
        // $('#CmbGodownName :selected').val(item.GodownCode);
        // $('#CmbGodownName :selected').text(item.GodownCode);
        // $('#TxtTotDrAmount').val(parseFloat(item.TotDrAmount).toFixed(2));
        // $('#TxtTotCrAmount').val(parseFloat(item.TotCrAmount).toFixed(2));
        // $('#workuser').text(item.WorkUSer);


//         if (item.OKToPay == true) {
//     document.getElementById("ChkOkToPay").checked = true;
// } else {
//     document.getElementById("ChkOkToPay").checked = false;
// }


    let row = table.insertRow();
     row.setAttribute("data-row-id", ids);
      row.setAttribute('id', 'scoperow');

    let ItemCodeCell = row.insertCell(0);
    ItemCodeCell.innerHTML = item.ItemCode;
    ItemCodeCell.style.width = '100px';


    let ItemNameCell = row.insertCell(1);
    ItemNameCell.innerHTML = item.ItemName;

    let PUOMCell = row.insertCell(2);
    PUOMCell.innerHTML = item.UOM;
    PUOMCell.style.textAlign = 'right';

    // PUOMCell.style.textAlign = 'center';

    // let BatchNoCell = row.insertCell(3);
    // BatchNoCell.innerHTML = item.BatchNo;
    // BatchNoCell.style.textAlign = 'center';

    // let CurrencyCell = row.insertCell(4);
    // CurrencyCell.style.textAlign = 'center';
    // CurrencyCell.innerHTML ='USD';

    // let expiryDateCell = row.insertCell(5);
    // expiryDateCell.innerHTML = expiryDate;

    // let ExpireBarCodeCell = row.insertCell(6);
    // ExpireBarCodeCell.innerHTML =item.ExpireBarCode;
    // ExpireBarCodeCell.style.textAlign = 'center';

    let QuantityCell = row.insertCell(3);
    QuantityCell.innerHTML = item.Quantity ? item.Quantity : '';
    QuantityCell.style.textAlign = 'right';

    // QuantityCell.style.textAlign = 'center';

    // let BonusQtyCell = row.insertCell(8);
    // BonusQtyCell.innerHTML = item.BonusQty ? item.BonusQty : '';
    // BonusQtyCell.style.textAlign = 'center';

    let TradePriceCell = row.insertCell(4);
    TradePriceCell.innerHTML =item.TradePrice  ? parseFloat(item.TradePrice).toFixed(2) : '';
    TradePriceCell.style.textAlign = 'right';

    // let GrossAmtCell = row.insertCell(10);
    // GrossAmtCell.innerHTML =item.GrossAmt ? parseFloat(item.GrossAmt).toFixed(2) : '';
    // GrossAmtCell.style.textAlign = 'right';

    // let DiscPerCell = row.insertCell(11);
    // DiscPerCell.innerHTML =item.DiscPer;
    // DiscPerCell.style.textAlign = 'center';

    // let DiscAmtCell = row.insertCell(12);
    // DiscAmtCell.innerHTML = item.DiscAmt ? parseFloat(item.DiscAmt).toFixed(2) : '';
    // DiscAmtCell.style.textAlign = 'right';

    let AmountCell = row.insertCell(5);
    AmountCell.innerHTML =item.TotalAmt ? parseFloat(item.TotalAmt).toFixed(2) : '';
    AmountCell.style.textAlign = 'right';

    // let TotQtyCell = row.insertCell(14);
    // TotQtyCell.innerHTML =item.TotQty;
    // TotQtyCell.style.textAlign = 'center';

    // let AvgRateCell = row.insertCell(15);
    // AvgRateCell.innerHTML =item.AvgRate ? parseFloat(item.AvgRate).toFixed(2) : '';
    // AvgRateCell.style.textAlign = 'right';

    // let InvRateCell = row.insertCell(16);
    // InvRateCell.innerHTML =item.InvRate ? parseFloat(item.InvRate).toFixed(2) : '';
    // InvRateCell.style.textAlign = 'right';

    // let ExpPerCell = row.insertCell(17);
    // ExpPerCell.innerHTML =item.ExpPer;
    // ExpPerCell.style.textAlign = 'center';

    // let InvAmtCell = row.insertCell(18);
    // InvAmtCell.innerHTML =item.InvAmt ? parseFloat(item.InvAmt).toFixed(2) : '';
    // InvAmtCell.style.textAlign = 'right';

    // let BarCodeCell = row.insertCell(19);
    // BarCodeCell.innerHTML =item.BarCode;
    // BarCodeCell.style.textAlign = 'center';

    // let DepartmentNameCell = row.insertCell(20);
    // DepartmentNameCell.innerHTML =item.DepartmentName;

    // let DepartmentCodeCell = row.insertCell(21);
    // DepartmentCodeCell.innerHTML =item.DepartmentCode;

    // let SaleRateCell = row.insertCell(22);
    // SaleRateCell.innerHTML =item.SaleRate ? parseFloat(item.SaleRate).toFixed(2) : '';
    // SaleRateCell.style.textAlign = 'right';

    // let IMPAItemCodeCell = row.insertCell(23);
    // IMPAItemCodeCell.innerHTML =item.IMPAItemCode;


    });


    // $('#scoperow').dblclick(function () {
    //     alert(this.td[0].innerHTML);
    // });
    // const table = document.getElementById("OpeningStocktable");
const tableBody = document.getElementById("OpeningStocktablebody");
const inputField = document.getElementById("TxtBank");

// tableBody.addEventListener("dblclick", function(e) {
//   if (e.target.tagName === "TD") {
//     const td = e.target;
//     const tr = td.parentNode;
//     const tdElements = tr.getElementsByTagName("td");

//     // Set the value of the input field to the third td element's inner HTML
//     $('#TxtExpActName').val(tdElements[0].innerHTML);
//     $('#TxtDescription').val(tdElements[1].innerHTML);
//     $('#TxtQuantity').val(tdElements[2].innerHTML);
//     $('#TxtRate').val(tdElements[3].innerHTML);
//     $('#TxtAmt').val(tdElements[4].innerHTML);
//     $('#TxtExpActCode').val(tdElements[5].innerHTML);
//     $('#TxtID').val(tdElements[6].innerHTML);

//     // Remove the row from the table
//     // tableBody.removeChild(tr);
//   }
// });


  }
});

}
$(document).ready(function () {


    $('#TxtBank').blur(function () {
    // $('#TxtBank').blur(function () {
      let TxtBank = parseFloat($('#TxtBank').val());
      let TxtInvAmount =parseFloat($('#TxtInvAmount').val());
      let TxtAmount = $('#TxtAmount').val();
      let TxtInvoiceAmt = $('#TxtInvoiceAmt').val();
      if(!isNaN(TxtInvAmount) && !isNaN(TxtBank)){

          $('#TxtInvAmount').val(TxtInvAmount-TxtBank);
          let TxtBankaf = parseFloat($('#TxtBank').val());
    let TxtInvAmountaf = parseFloat($('#TxtInvAmount').val());
    $('#TxtAmount').val(TxtInvAmountaf + TxtBankaf);

    if(TxtInvoiceAmt == TxtAmount){
    $("#TxtAmount").css({"background-color": "green","color": "white"});

}else{

    $("#TxtAmount").css({"background-color": "red","color": "white"});
}
}




    });

    $('#TxtInvoiceAmt').dblclick(function () {
      let TxtInvoiceAmt = $('#TxtInvoiceAmt').val();
      $('#TxtInvAmount').val(TxtInvoiceAmt);

    });


$('#Newinv').click(function(e){
    let table = document.getElementById('OpeningStocktablebody');
    table.innerHTML = "";
    $('#TxtVoucherDate').val('');
    $('#TxtActCashName').val('');
    $('#TxtActCashCode').val('');
    $('#TxtVesselName').val('');
    $('#TxtRefNo').val('');
    $('#TxtClientOrder').val('');
    $('#TxtActCode').val('');
    $('#TxtActName').val('');
    $('#TxtInvoiceAmt').val('');
    $('#TxtCrNote').val('');
    $('#TxtBank').val('');
    $('#TxtInvAmount').val('');
    $('#TxtAmount').val('');
    $('#TxtDesc').val('');
    $('#TxtCurrency').val('');
    $('#TxtRefno').val('');
    $('#TxtChqNo').val('');
    $('#TxtBankDescription').val('');
    $('#TxtChqDate').val('');
    $('#TxtTotAmount').val('');
    $('#TxtStatus').val('');
    $('#TxtInvoiceAmount').text('');
    $('#TxtCreditNoteAmt').text('');
    $('#MRecAmount').text('');
});



});
  </script>
  @stop


@section('content')
