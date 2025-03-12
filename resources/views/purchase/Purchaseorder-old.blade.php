@extends('layouts.app')



@section('title', 'Purchase-Order')

@section('content_header')

@stop

@section('content')
</div>
<div class="col-lg-12 small">
    <div class="row">
        <div class="custom-col-2 rounded shadow mx-auto">
            <h5 class="text-blue">Purchase Order Form</h5>
        </div>
    </div>
    <div class="card
    {{-- collapsed-card --}}
     mt-3">
       <div  style="background-color:#EEE; " class="card-header">
           <!-- h5 class="card-title"></h5 -->
           <div class="form-inline">

                           <div   class="input-group  ml-2 mb-2">
                               <strong >VSN # :&nbsp;</strong> <label class="VSN text-blue" for="VSN">{{$VSN}}</label>
                               {{-- <input type="number" readonly step="1" id="VSN" value="{{$VSN}}" class="form-control ml-2"> --}}
                           </div>

                           <div class="input-group  ml-5 mb-2">
                               /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" for="event_no">{{$Ordermasterdata->EventNo}}</label>

                           </div>
                           <div class="input-group  ml-5 mb-2">
                               /&nbsp;  <strong>Customer :&nbsp;</strong> <label class="customer text-blue" for="customer">{{$Ordermasterdata->CustomerName}}</label>

                           </div>
                           <div class="input-group  ml-5 mb-2">
                               /&nbsp;  <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" for="vessel">{{$Ordermasterdata->VesselName}}</label>

                           </div>
                           <div class="input-group  ml-5 mb-2">
                               /&nbsp;  <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue" for="customer_ref_no">{{$Ordermasterdata->CustomerRefNo}}</label>

                           </div>
                           <div class="input-group  ml-5 mb-2">
                               /&nbsp;  <strong>Charge # :&nbsp;</strong> <label class="Charge text-blue" for="Charge">{{$Ordermasterdata->PONo}}</label>&nbsp;&nbsp; <button class="text-success border" id="filler">Fill</button>

                           </div>
                           <div class="input-group  ml-5 mb-2">
                               /&nbsp;  <strong>Quote # :&nbsp;</strong> <label class="QuoteNo text-blue" for="QuoteNo">{{$Ordermasterdata->QuoteNo}}</label>

                           </div>
                           <div class="input-group  ml-5 mb-2">
                               /&nbsp;  <strong>CustomerCode # :&nbsp;</strong> <label class="CustomerCode text-blue" for="CustomerCode">{{$Ordermasterdata->CustomerCode}}</label>

                           </div>
                           <div class="input-group  ml-5 mb-2">
                               /&nbsp;  <strong>IMO # :&nbsp;</strong> <label class="IMO text-blue" for="IMO"></label>

                           </div>

                           <div class="input-group  ml-5 mb-2">
                               <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                   <i class="fas fa-plus"></i>
                               </button>
                           </div>
           </div>



       </div>
                       <div class="card-body">
                        <div class="col-lg-12 py-2">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"  id="pod">Purchase Order Date :</span>
                                        </div>
                                        {{-- <input class="form-control" value="{{date('Y-m-d', strtotime($value->DeliveryDate))}}" type="date" id="deliverydate" name="deliverydate" > --}}
                                        <input class="form-control" value="" type="date" id="PurchaseOrderDate" name="PurchaseOrderDate" >
                                        <input class="" value="0" type="hidden" id="scode" name="scode" >
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"  id="pod">Split PO # :</span>
                                        </div>
                                        {{-- <input class="form-control" value="{{date('Y-m-d', strtotime($value->DeliveryDate))}}" type="date" id="deliverydate" name="deliverydate" > --}}
                                        <input class="form-control" value="" type="number" id="splitpo" name="splitpo" >
                                    </div>
                                </div>
                            </div>
                       </div>
                       </div>
    </div>
<div class="col-sm-12 mx-auto">
    <table class="table  table-inverse " id="PO">
        <thead class="bg-info">
            <tr>
                <th>Buy</th>
                <th>Buy&nbsp;By</th>
                <th>PO</th>
                <th>Charge#</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>IMPA</th>
                <th >Internal</th>
                <th style="padding-left: 6rem;padding-right: 6rem">Vendor</th>
                <th>V&nbsp;Srch</th>
                <th class="text-right">Cost&nbsp;Price</th>
                <th class="text-right">Sell&nbsp;Price</th>
                <th>Vendor&nbsp;Code</th>
                <th>SNo</th>
                <th>Rec&nbsp;Qty&nbsp;Order</th>
            </tr>
            </thead>
            <tbody id="podata" class="podata">
                {{-- <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr> --}}
            </tbody>
        </table>
    </div>
    <div class="progress progress-striped active">
        <div class="progress-bar progress-bar-success bg-success"
            style="width:0%">
        </div>
    </div>
    <div class="row py-2 ml-1">
        <a name="" id="selectAll" class="btn btn-info col-sm-1 form-control mx-1"  role="button">Select All</a>
        <a name="" id="unselectall" class="btn btn-info col-sm-1 form-control mx-1"  role="button">UnSelect All</a>
        <a name="" id="refreshPage" class="btn btn-info col-sm-1 form-control mx-1"  role="button">Refresh</a>

        {{-- <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
          </div> --}}
    </div>
        {{-- <div class="row pt-1 pb-2 ml-1">

    </div> --}}
    <div class="col-sm-12 mx-auto">
        <table class="table  table-inverse" id="vPO">
            <thead class="bg-info">
                <tr>
                    <th style="padding-left: 6rem;padding-right: 6rem">Vendor</th>
                    <th>Select</th>
                    <th>Total&nbsp;Purch&nbsp;Value</th>
                    <th hidden>MFreight</th>
                    <th>Rec&nbsp;Qty</th>
                    <th>Vendor&nbsp;Code</th>
                    <th>PO#</th>
                    <th class="px-4">PO&nbsp;Date</th>
                    <th>Atten:</th>
                    <th>Your&nbsp;Code</th>
                    <th class="px-5">Terms</th>
                    <th>Ship&nbsp;Via</th>
                    <th>ReqDate</th>
                    <th>Time</th>
                    <th>Vendor&nbsp;Comments</th>
                    <th>PORecDate</th>
                    <th>PORecTime</th>
                </tr>
                </thead>
                <tbody class="vpodata">
                    <?php
                        $vendqry = DB::table('OrderDetail')
                        ->select(DB::raw("VendorName, VendorCode, PoMadeNo, PoMadeDate, SUM(OrderQty*VendorPrice) as MEstPrice, COUNT(OrderQty) as MEstPriceCount, SUM(Freight) as MFreight, SUM(RecQty) as MRecQty"))
                        ->where('VendorCode','<>','756')->where('VendorCode','<>',0)->where('PONO',$PONO)->where('BranchCode',$BranchCode)
                        ->groupBy('VendorName','VendorCode','PoMadeNo','PoMadeDate')->orderBy('VendorCode')->get();

                        ?>
                        @for ($i=0; $i <count($vendqry) ; $i++)
                            <?php
                            $qryd = $vendqry[$i];
                            $contact = DB::table('VenderSetup')->select('ContactPerson','Terms')->where([
                            ['VenderCode', $qryd->VendorCode],
                            ['BranchCode', $BranchCode],
                            ])->get();
                            $PurchaseOrderMaster = DB::table('PurchaseOrderMaster')
            ->select('ShipVia', 'ReqDate', 'Time', 'VendorComment', 'PurchaseOrderNo', 'PODate', 'ChkCancelledPO', 'PORecDate', 'PORecTime')
            ->where('ChargeNo', $PONO)
            ->where('VSNNo', $VSN)
            ->where('VendorCode', $qryd->VendorCode)
            ->where('BranchCode', $BranchCode)
            ->get();
// dd($PurchaseOrderMaster);
            $yourcode = DB::table('VenderSetup')
            ->select('YourCode', 'Terms')
            ->where('VenderCode', $qryd->VendorCode)
            ->where('BranchCode', $BranchCode)
            ->get();
            $purchaseorderdetails = DB::table('PurchaseOrderDetail')
            ->select(DB::raw('Sum(RecQty) as MREcQty'))
            ->where('PurchaseOrderNo', $qryd->PoMadeNo)
            ->where('BranchCode', $BranchCode)
            ->first();
            // dump($PurchaseOrderMaster[0]->ShipVia);

?>
                        <tr>
                            <td>{{ $qryd->VendorName }}</td>
                            <td><input id="" class="checkboxven" type="checkbox"></td>
                            <td>{{ round($qryd->MEstPrice, 2) }}</td>
                            <td>{{ round($qryd->MRecQty, 2) }}</td>
                            <td>{{ $qryd->VendorCode }}</td>
                            <td>{{ $qryd->PoMadeNo }}</td>
                            <td>{{ $qryd->PoMadeDate ? date('d-M-Y', strtotime($qryd->PoMadeDate)) : '' }}</td>
                            <td>{{ $qryd->MEstPriceCount }}</td>
                            <td hidden>{{ $qryd->MFreight }}</td>
                            @if (count($yourcode) > 0)
                            <td>{{ $yourcode[0]->YourCode }}</td>
                            <td>{{ $yourcode[0]->Terms }}</td>

                            @else
                            <td >No </td>
                            <td >yourcode </td>
                            @endif
                            @if (count($PurchaseOrderMaster) > 0)
                            <td>{{ $PurchaseOrderMaster[0]->ShipVia }}</td>
                            <td>{{ $PurchaseOrderMaster[0]->ReqDate ? date('d-M-Y', strtotime($PurchaseOrderMaster[0]->ReqDate)) : '' }}</td>
                            <td>{{ $PurchaseOrderMaster[0]->Time }}</td>
                            <td>{{ $PurchaseOrderMaster[0]->VendorComment }}</td>
                            <td>{{ $PurchaseOrderMaster[0]->PORecDate ? date('d-M-Y', strtotime($PurchaseOrderMaster[0]->PORecDate)) : '' }}</td>
                            <td>{{ $PurchaseOrderMaster[0]->PORecTime }}</td>
                        @else
                            <td >No </td>
                            <td > Purchase </td>
                            <td > Order </td>
                            <td > Master </td>
                            <td > data </td>
                            <td > found.</td>
                        @endif

                        </tr>
                        @endfor
<?php //die();?>
                </tbody>
            </table>
    </div>
    <div class="col-lg-12">
        <div class="row py-1 ml-1">
            <input type="text" class="col-sm-1 form-control mx-1">
            <input type="text" class="col-sm-1 form-control mx-1">
            <input type="text" class="col-sm-2 form-control mx-1">
        </div>
        <div class="row py-1 ">
            <div class="input-group col-sm-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Total:</span>
                </div>
                <input class="form-control" type="text" name="" placeholder="">
            </div>
            <div class="input-group col-sm-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Disc Per:</span>
                </div>
                <input class="form-control" type="text" name="" placeholder="">
            </div>
            <div class="input-group col-sm-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Freight:</span>
                </div>
                <input class="form-control" type="text" name="" placeholder="">
            </div>
            <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Department Filter:</span>
                </div>
                    <select class="custom-select" name="" id="">
                        <option selected>Select one</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
            </div>
        </div>
        <div class="row py-1 ml-1">
            <a name="" id="selectallven" class="btn btn-info col-sm-1 form-control mx-1"  role="button">Select All</a>
            <a name="" id="unselectallven" class="btn btn-info col-sm-1 form-control mx-1"  role="button">UnSelect All</a>

        </div>
        <div class="row py-1 ml-1">
            <a name=""  class="btn btn-info col-sm-1 form-control mx-1"  role="button">Close</a>
            <a name=""  class="btn btn-info col-sm-1 form-control mx-1"  role="button">Print PO Selection</a>
            <a name="" id="CreatePO" class="btn btn-success col-sm-2 form-control mx-1"  role="button">Create PO (Process)</a>
            <a name=""  class="btn btn-info col-sm-1 form-control mx-1"  role="button">Clear Buyer</a>
            <a name=""  class="btn btn-info col-sm-1 form-control mx-1"  role="button">V Plat Event</a>

        </div>
    </div>
</div>
 @stop

  @section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

<style>
.tablesize{
    flex :89%;
    max-width: 89%;
}
    .custom-col-2{
        flex:0 0 12.6%;
        max-width: 12.6%;
    }
    .card-body span{
width: 110px;
font-size: 11px;

}
.form-control{
    font-size: 11px;

}
</style>
  @stop

  @section('js')
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>


    function purchasefill(){

$PONO = '{{$Ordermasterdata->PONo}}';
$VSN = '{{$VSN}}';
$scode = $('#scode').val();;
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type : 'post',
url : '{{URL::to('purchaseorderfiller')}}',
data:{'PONO':$PONO,'VSN':$VSN,'scode':$scode,
}, beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
success:function(respose){
// $('.podata').html($respose.output);
// $('.vpodata').html($respose.venoutput);
let data = respose.output;
console.log(data);

let table = document.getElementById('podata');
    table.innerHTML = ""; // Clear the table
    data.forEach(function(item) {
        let cheked='';
        if(item.ChkBuy > 0){
                    cheked='checked';
                }else{
                     cheked='';
                }
        let row = table.insertRow();

      let chekedCell = row.insertCell(0);
      chekedCell.innerHTML = '<input id="buychk'+item.ID+'" class="checkbox" type="checkbox" '+cheked+' >';


      let WorkUserCell = row.insertCell(1);
      WorkUserCell.innerHTML = item.WorkUser;

      let POMadeNoCell = row.insertCell(2);
      POMadeNoCell.innerHTML = item.POMadeNo;

      let PONOCell = row.insertCell(3);
      PONOCell.innerHTML = item.PONO;

      let QtyCell = row.insertCell(4);
      QtyCell.innerHTML = item.Qty;

      let PUOMCell = row.insertCell(5);
      PUOMCell.innerHTML = item.PUOM;

      let IMPACell = row.insertCell(6);
      IMPACell.innerHTML = item.IMPA;

      let ItemNamecell = row.insertCell(7);
      ItemNamecell.innerHTML = item.ItemName;
      ItemNamecell.hidden = true;

      let InternalBuyerNotesell = row.insertCell(8);
      InternalBuyerNotesell.innerHTML = item.InternalBuyerNotes;

      let VendorNamecell = row.insertCell(9);
      VendorNamecell.innerHTML = item.VendorName;

      let buttoncell = row.insertCell(10);
      buttoncell.innerHTML = '<button class="btn btn-default">?</button>';

      let VendorPricecell = row.insertCell(11);
      VendorPricecell.innerHTML = parseFloat(item.VendorPrice).toFixed(2);
        VendorPricecell.style.textAlign = 'right';

      let SuggestPricecell = row.insertCell(12);
      SuggestPricecell.innerHTML = parseFloat(item.SuggestPrice).toFixed(2);
      SuggestPricecell.style.textAlign = 'right';

      let VendorCodecell = row.insertCell(13);
      VendorCodecell.innerHTML = item.VendorCode;


      let IDl = row.insertCell(14);
      IDl.innerHTML = item.ID;
      IDl.hidden = true;

      let SNocell = row.insertCell(15);
      SNocell.innerHTML = item.SNo;

      let RecQtycell = row.insertCell(16);
      RecQtycell.innerHTML = parseFloat(item.RecQty).toFixed(2);
      RecQtycell.style.textAlign = 'right';

    });











const selectAllButton = document.getElementById("selectAll");
const unselectallButton = document.getElementById("unselectall");
const selectallven = document.getElementById("selectallven");
const unselectallven = document.getElementById("unselectallven");
selectAllButton.addEventListener("click", function() {
  const checkboxes = document.querySelectorAll(".checkbox");
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = true;
  });
});
unselectallButton.addEventListener("click", function() {
  const checkboxes = document.querySelectorAll(".checkbox");
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = false;
  });
});
selectallven.addEventListener("click", function() {
  const checkboxven = document.querySelectorAll(".checkboxven");
  checkboxven.forEach(function(checkboxven) {
    checkboxven.checked = true;
  });
});
unselectallven.addEventListener("click", function() {
  const checkboxven = document.querySelectorAll(".checkboxven");
  checkboxven.forEach(function(checkboxven) {
    checkboxven.checked = false;
  });
});
// console.log(data);
},
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
});

}
$(document).ready( function () {
    $(".progress-bar").animate({
    width: "100%"

}, 2500);
setTimeout(function() {
    //   alert('Progress bar complete!');
    $(".progress-bar").hide();
    }, 3000);

$('#PO').DataTable({
  scrollY:        350,
  deferRender: true,
    scroller: true,
    paging: false,
    info:false,
    ordering:false,
    searching:false,
    responsive:true,
dom: 'Bfrtip',
      buttons: [
          'excel',{
                text: 'Print',
                action: function ( e, dt, node, config ) {
                    window.open("/Purchaseorderprint","_blank");
                }
            }
      ]

});
$('#vPO').DataTable({
  scrollY:        350,
  deferRender: true,
    scroller: true,
    paging: false,
    info:false,
    ordering:false,
    responsive:true,
    searching:false,

// paging: false,
dom: 'Bfrtip',
      buttons: [
          'excel',
      ]

});
} );
purchasefill();
</script>
<script>

    $(document).ready(function() {
        $('#filler').click(function(e){
            $('#scode').val(1);
            purchasefill();
        });
    document.getElementById("PurchaseOrderDate").valueAsDate = new Date();

const refreshButton = document.getElementById("refreshPage");
refreshButton.addEventListener("click", function() {
  location.reload();
});
    })
    $(document).on("click", "#CreatePO", function() {
        EventNo ='{{$Ordermasterdata->EventNo}}';
        PONo ='{{$Ordermasterdata->PONo}}';
        QuoteNo ='{{$Ordermasterdata->QuoteNo}}';
        GodownCode ='{{$Ordermasterdata->GodownCode}}';
        DepartmentName= '{{$Ordermasterdata->DepartmentName}}';
        PurchaseOrderDate = document.getElementById("PurchaseOrderDate").value;
        let table = document.getElementById('podata');
        let rows = table.rows;
      vsno ='{{$VSN}}';

        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
      tdbuyby=cells[1].innerHTML;
      tdpo=cells[2].innerHTML;
      tdcharge=cells[3].innerHTML;
      tdqty=cells[4].innerHTML;
      tdunit=cells[5].innerHTML;
      tdimpa=cells[6].innerHTML;
      tdItemname=cells[7].innerHTML;
      tdinternal=cells[8].innerHTML;
      tdVendorname=cells[9].innerHTML;
      tdCostprice=cells[11].innerHTML;
      tdsellprice=cells[12].innerHTML;
      tdvendorcode=cells[13].innerHTML;
      tdid=cells[14].innerHTML;
      tdSNO=cells[15].innerHTML;
      tdREC=cells[16].innerHTML;
        //   console.log($tdsellprice);
        //   console.log(vsno);
        //   console.log($tdSNO);
        //   console.log($tdREC);
//   for (let j = 0; j < cells.length; j++) {
//     console.log(cells[j].innerHTML);
//   }
if($('#buychk'+tdid).prop("checked") == true) {
    // console.log("checked");


        $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
        $.ajax({
type : 'post',
url : '{{URL::to('posave')}}',
data:{
    tdbuyby,
    tdpo,
    tdcharge,
    tdqty,
    tdunit,
    tdimpa,
    tdinternal,
    tdVendorname,
    tdCostprice,
    tdsellprice,
    tdvendorcode,
    tdid,
    tdSNO,
    tdREC,
    tdItemname,
    vsno,
    GodownCode,
    PONo,
    QuoteNo,
    EventNo,
    DepartmentName,
    PurchaseOrderDate,
}, beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
success:function($response){
    purchasefill();
// $('.vpodata').html(data);
// console.log(data);
        // alert($response.Message);
        // alert($response.vendor);
        // window.open("/purchaseorder/"+{{$PONO}},"_blank");
        window.open("/purchaseorder/" + $response.PONO, "newWindowName", "height=800,width=800,top=200,left=200");
},
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }

});
}else{
    console.log("Notchecked");

}
} });


</script>
@stop


@section('content')
