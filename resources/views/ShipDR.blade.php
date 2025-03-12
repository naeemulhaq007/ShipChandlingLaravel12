@extends('layouts.app')



@section('title', 'Shipped DR')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@stop


@section('content')
</div>
<div class="container-fluid small">
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>{!! \Session::get('success') !!}</strong>
      </div>

    @endif
    @if (\Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>{!! \Session::get('error') !!}</strong>
      </div>

    @endif

<div class="card mt-3">
      <div class="card-header" style="background-color:#EEE; ">
            <div class="card-tools ">
                <button  class="border">Billing Information</button>
                <button  class="border">Bank Information</button>

                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- h5 class="card-title"></h5 -->
            <div class="row">
            <h5>Shipped DR </h5>
                            <div  class="  ml-5 ">
                                <div class="row"><strong >VSN # :</strong><input type="text" value="{{$VSN ? $VSN : ''}}" name="VSNNO" style="margin-top: -5px" id="VSNNO" class="form-control col-sm-6"></div>
                            </div>

                            <div class="   ">
                                /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" id="Eventno" for="event_no"></label>

                            </div>
                            <div class="  ml-5 ">
                                /&nbsp;  <strong>Customer :&nbsp;</strong> <label class="customer text-blue" id="CustomerName" for="customer"></label>

                            </div>
                            <div class="  ml-5 ">
                                /&nbsp;  <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" id="VesselName" for="vessel"></label>

                            </div>
                            <div class="  ml-5 ">
                                /&nbsp;  <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue" id="CustomerRef" for="customer_ref_no"></label>

                            </div>


            </div>


        </div>
                        <div class="card-body">
                            <div class="col-lg-12 pb-2">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="dd">Delivery Date :</span>
                                            </div>
                                            <input class="form-control" value="" type="date" id="deliverydate" name="deliverydate" >
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="dtime">Time :</span>
                                            </div>
                                            <input class="form-control" type="time" value="" id="Time" name="Time" >
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="loc">location :</span>
                                            </div>
                                            <input class="form-control" type="text" value="" id="location" name="location" >
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="loc">port :</span>
                                            </div>
                                            <select class="custom-select" name="ShipingPort" id="ShipingPort">
                                                @foreach ($ShipingPortSetup as $port)

                                                <option value="{{$port->PortName}}">{{$port->PortName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        {{-- <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="">WareHouse:</span>
                                            </div>
                                            <select  class="custom-select" name="WareHouse" id="WareHouse">
                                                @foreach ( as )
                                                    <option value=""></option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                    </div>

                                </div>
                                <div class="row py-2">
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="">Event Note:</span>
                                            </div>

                                              <textarea class="form-control" name="TxtEventNotes" id="TxtEventNotes" rows="1"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="">Customer Comments:</span>
                                            </div>
                                            <textarea class="form-control" name="TxtVSNComments" id="TxtVSNComments" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="">WareHouse:</span>
                                            </div>
                                            <textarea class="form-control" name="TxtWareHouseComments" id="TxtWareHouseComments" rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="">Status:</span>
                                            </div>
                                            <select  class="custom-select" name="CmbStatus" id="CmbStatus">
                                                @foreach ($Statut as $item)
                                                <option value="{{$item->StatusCode}}">{{$item->StatusName}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group col-sm-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"  id="dd">Shipped Date :</span>
                                        </div>
                                        <input class="form-control" value="" type="date" id="TxtShipDate" name="TxtShipDate" >
                                    </div>
                                    <div class="input-group col-sm-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Time :</span>
                                        </div>
                                        <input class="form-control" type="time" value="" id="TxtShipTime" name="TxtShipTime" >
                                    </div>
                                </div>


                            </div>
                        </div>
        </div>


        {{-- <ul class="nav pb-2 ">


            <li class="nav-link btn btn-info mr-1"><a data-toggle="pill" href="#Charges">Charges</a></li>



          </ul> --}}



          <div class="tab-content">
            <div id="Charges" class="tab-pane  in active">

        <div class="col-lg-12">
        <div class="rounded shadow mx-auto table-responsive">
           <table class="table table-hover table-inverse  "  id="chargestable">
            <thead class="bg-info">

                <tr scope="row">
                    <th style="width: 100px">Shipd</th>
                    <th style="width: 100px">Charge#</th>
                    <th style="width: 100px">Department</th>
                    <th style="width: 100px">H</th>
                    <th style="width: 100px">Terms</th>
                    <th style="width: 100px">Cust&nbsp;Ref</th>
                    <th style="width: 100px">Buyer</th>
                    <th style="width: 100px" >Status</th>
                    <th style="width: 100px">Order&nbsp;Amount</th>
                    <th style="width: 100px">Order&nbsp;Qty</th>
                    <th style="width: 100px">Rcvd&nbsp;Qty</th>
                    <th style="width: 100px">Pull&nbsp;Qty</th>
                    <th style="width: 100px">Ready&nbsp;Qty</th>
                    <th style="width: 100px">Short&nbsp;Qty</th>
                    <th style="width: 100px">Dlvrd&nbsp;Qty</th>
                    <th style="width: 100px">Rtn&nbsp;Qty</th>
                    <th style="width: 100px">Missing&nbsp;Qty</th>
                    <th style="width: 100px">Sold&nbsp;Qty</th>
                    <th style="width: 100px">Sal&nbsp;Rtn&nbsp;Qty</th>
                    <th style="width: 100px">Quote&nbsp;No</th>
                    <th style="width: 100px">Invoice&nbsp;No</th>
                    <th style="width: 100px">Customer&nbsp;Code</th>

                </tr>
                </thead>
                <tbody id="drtable_body">


                </tbody>
           </table>

                </div>
                </div>
            </div>


<div id="contextMenu" class="context-menu" >
    <!-- Add your custom menu options here -->
    <ul>
        <li><span class='Gainsboro'></span>&nbsp;<span>Gainsboro </span></li>
        <li><span class='Orange'></span>&nbsp;<span>Orange</span></li>
        <li><span class='Plum'></span>&nbsp;<span>Plum</span></li>
    </ul>
  </div>

        </div>

<div class="col-lg-12">
    <div class="row py-2">
        <div class="custombtn">
            <a name="" id="CmdShippedNew" class="btn form-control btn-warning"  role="button">Shipped DR</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Ship Name</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Not Recv RPT</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Pull Stock Rep</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Edit Vsn</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Order Status</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Direct Invoice</a>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label text-danger mx-1">
                <input class="form-check-input " type="checkbox" onclick="" name="ChkSevenSeasNorwayAS" id="ChkSevenSeasNorwayAS" value=""> Seven Seas Norway AS
            </label>
            <label class="form-check-label text-danger mx-1">
                <input class="form-check-input " type="checkbox" onclick="" name="ChkSevenSeasDelivery" id="ChkSevenSeasDelivery" value=""> Seven Seas Delivery
            </label>
            <label class="form-check-label text-success mx-1">
                <input class="form-check-input " type="checkbox" checked name="All" id="All" value=""> All
            </label>
            <label class="form-check-label text-success mx-1">
                <input class="form-check-input " type="checkbox" checked name="DirectPrint" id="DirectPrint" value=""> Direct Print
            </label>
            <label class="form-check-label text-success mx-1">
                <input class="form-check-input " type="checkbox" checked name="KG" id="KG" value=""> KG
            </label>
        </div>

    </div>
    <div class="row">
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Hazmate</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Shipped DR</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Order Transfer</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Order VSN GP</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-success" href="#" role="button"><i class="fa fa-arrow-right" aria-hidden="true"></i> Send</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-danger" href="#" role="button">Close</a>
        </div>
        <div class="custombtn">
            <a name="" id="" class="btn form-control btn-default" href="#" role="button">Cost Print</a>
        </div>
    </div>
</div>
</div>
<div class='context-menu'>
    <ul>
        <li id="createpo" data-link="purchase-order"><span>Create PO </span></li>
        <li id="deliverorder" data-link="Delivery-Order"><span>Delivry Order</span></li>
        <li id="finalinvoice" data-link="Final-Invoice"> <span>Final Invoice</span></li>
    </ul>
 </div>

 <input type='hidden' value='' id='txt_id'>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<style>

    .context-menu{
     display: none;
     position: absolute;
     border: 1px solid black;
     border-radius: 3px;
     width: 200px;
     background: white;
     box-shadow: 10px 10px 5px #888888;
}

.context-menu ul{
     list-style: none;
     padding: 2px;
}

.context-menu ul li{
     padding: 5px 2px;
     margin-bottom: 3px;
     color: white;
     font-weight: bold;
     background-color: rgb(0, 209, 80);
}

.context-menu ul li:hover{
     cursor: pointer;
     background-color: #7fffc3;
}
/* Colors */
.Gainsboro ,.Orange ,.Plum {
     width:15px;
     height:15px;
     border: 0px solid black;
     display: inline-block;
     margin-right: 5px;
}

.Gainsboro {
     background-color: Gainsboro ;
}
.Orange {
     background-color: Orange ;
}
.Plum {
     background-color: Plum ;
}
.custombtn{

        max-width:7%;
        position: relative;
        width:100%;
        margin-right:5px;
    }
    .btn{
        font-size: 11px;
    }
    .input-group-text{
        font-size: 11px;
    }
    header {
      width: 100%;

      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    header h5 {
      position: absolute;
      width: 40%;
      font-size: 35px;
      font-weight: 600;
      color: transparent;
      background-image: linear-gradient(to right ,#553c9a, #ee4b2b, #00c2cb, #ff7f50, #553c9a);
      -webkit-background-clip: text;
      background-clip: text;
      background-size: 200%;
      background-position: -200%;
      transition: all ease-in-out 2s;
      cursor: pointer;
    }
    header h5:hover{
      background-position: 200%;
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>

$(document).ready(function() {
    $('#chargestable tr').dblclick(function() {
        var PONo = $(this).attr('data-PONo');
        // alert(PONo);
        // window.location.replace("/OrderEntry/"+PONo);
        window.open("/OrderEntry/"+PONo,"_blank");
    });

    document.getElementById('TxtShipDate').valueAsDate = new Date();
    const now = new Date();
const hours = now.getHours().toString().padStart(2, '0');
const minutes = now.getMinutes().toString().padStart(2, '0');
const timeString = `${hours}:${minutes}`;
document.getElementById('TxtShipTime').value = timeString;


$('#CmdShippedNew').click(function(e){

    alert('click');
    let table = document.getElementById('drtable_body');
    let rows = table.rows;
        for (let i = 0; i < rows.length; i++) {
            let cells = rows[i].cells;

    let shippedCheckbox = cells[0].querySelector('input[type="checkbox"]');
  let isChecked = shippedCheckbox.checked;
if (isChecked == true) {
    let MChargeNo = cells[1].innerHTML;
    let MStatus = cells[7].innerHTML;
    if (MStatus == 'INVOICED') {
        alert('INVOICED Already !, Already INVOICED, You Can Print Only ')
        return;
    }
    if (MStatus !== 'INVOICED') {


        if($('#ChkSevenSeasDelivery').prop("checked") == true){
            ChkSevenSeasDelivery = 1
        }
        else{
            ChkSevenSeasDelivery = 0
        }
var TxtShipTime = $('#TxtShipTime').val();
var TxtShipDate = $('#TxtShipDate').val();
var TxtVSNNo = $('#VSNNO').val();
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  $.ajax({
type : 'post',
url : '{{URL::to('shipdr_OrderMaster')}}',
data:{
    isChecked,
    TxtShipDate,
    TxtShipTime,
    TxtVSNNo,
    MChargeNo,

  },
  success: function(resposne) {
alert(resposne.status);
console.log(resposne.OrderMaster);
if(resposne.status == 'success'){
    window.location.href='/Delivery-Order/'+resposne.MChargeNo;
}

  }
});

    }
}
//   console.log(isChecked);
        }

});



});

$(document).ready(function(){



    $('#chargestable').DataTable({
  scrollY:        350,
// deferRender:    true,
scroller:       true,
responsive: true,
scrollX: true,
ordering:false,
searching:false,
paging:false,
info:false,

// paging: false,
// dom: 'Bfrtip',
//       buttons: [
//           'excel',
//       ]

});
 // disable right click and show custom context menu
 $("tr").bind('contextmenu', function (e) {
      var id = this.id;
      $PONo = $(this).attr("data-PONo")
    //   alert($PONo);
      $("#txt_id").val(id);

      var top = e.pageY-50;
      var left = e.pageX;

      // Show contextmenu
      $(".context-menu").toggle(100).css({
          top: top + "px",
          left: left + "px"
      });

      // disable default context menu
      return false;
 });

 // Hide context menu
 $(document).bind('contextmenu click',function(){
     $(".context-menu").hide();
    //   alert($PONo);

     $("#txt_id").val("");
 });

// disable context-menu from custom menu
$('.context-menu').bind('contextmenu',function(){
    return false;
});

// Clicked context-menu item
$('.context-menu li').click(function(){
    var className = $(this).attr("data-link");
    var titleid = $('#txt_id').val();
    // $( "#"+ titleid ).css( "background-color", className );
    $(".context-menu").hide();
    window.open("/"+className+"/"+$PONo,"_blank");
});

});

$(document).ready(function () {

    if($('#VSNNO').val() !== '' || $('#VSNNO').val() !== '0'){
        Dataget();

    }

$('#VSNNO').blur(function (e) {
    e.preventDefault();
    Dataget();
});

$('#VSNNO').keydown(function (e) {
    if (e.keyCode === 13) {
    e.preventDefault();

    $('#VSNNO').blur();
    }

});


   function ajaxSetup(){
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    }

    function Dataget(){
        ajaxSetup();
        var VSNNO = $('#VSNNO').val();
        $.ajax({
  url: '/ShipDRload',
  type: 'POST',
  data: {
    VSNNO,
  },
  beforeSend: function() {
                // Show the overlay and spinner before sending the request
                $('.overlay').show();
            },
  success: function(resposne) {
    console.log(resposne);
    if(resposne.FlipToVSN){
        var FlipToVSN = resposne.FlipToVSN;
        $('#CustomerName').text(FlipToVSN.CustomerName);
        $('#Eventno').text(FlipToVSN.EventNo);
        $('#VesselName').text(FlipToVSN.VesselName);
        $('#CustomerRef').text(FlipToVSN.CustomerRef);

        var chekdate = new Date(FlipToVSN.DeliveryDate);
        const DeliveryDate = chekdate.toISOString().substring(0, 10);
        $('#deliverydate').val(DeliveryDate);
        var timeValue = FlipToVSN.EventCreatedTime;
        var formattedTime = moment(timeValue, 'hh:mm:ss A').format('HH:mm');
        $('#Time').val(formattedTime);
        $('#location').val(FlipToVSN.Location);
        $('#ShipingPort').val(FlipToVSN.Port);
        $('#TxtVSNComments').val(FlipToVSN.WareHouseComments);

    }else{
        $('#CustomerName').text('');
        $('#Eventno').text('');
        $('#VesselName').text('');
        $('#CustomerRef').text('');
        $('#deliverydate').val('');
        $('#Time').val('');
        $('#location').val('');
        $('#ShipingPort').val('');
        $('#TxtVSNComments').val('');
    }
    var CustomerCode = resposne.OrderMaster.CustomerCode;
    if(CustomerCode =='9401222'){
        $('#ChkSevenSeasDelivery').prop("checked",true);
    }else{
        $('#ChkSevenSeasDelivery').prop("checked",false);

    }
    if(CustomerCode =='9401676'){
        $('#ChkSevenSeasNorwayAS').prop("checked",true);
    }else{
        $('#ChkSevenSeasNorwayAS').prop("checked",false);

    }

    var data = resposne.results;
    let table = document.getElementById('drtable_body');
    table.innerHTML = ""; // Clear the table
    var checked = 'checked';
    // var data = JSON.parse(datas);
    // console.log(data);


    if(data){
        console.log(data);
            data.forEach(function(items) {
let item = items.OrderMaster;
      let row = table.insertRow();
      function createCell(content) {
        let cell = row.insertCell();
        cell.innerHTML = content;
        return cell;
        }
            var MChkShipped = (item.ChkShipped === null || item.ChkShipped === undefined) ? false : item.ChkShipped;
            // console.log(MChkShipped);
            let ChkShipped = createCell('');
        if (MChkShipped === true) {
            ChkShipped.innerHTML = '<input class="ChkShipped mx-auto" type="checkbox" name="" id="" ' + checked + ' value="' + item.ChkSendEmail + '">';
        } else {
            ChkShipped.innerHTML = '<input class="ChkShipped mx-auto" type="checkbox" name="" id="" value="' + item.ChkSendEmail + '">';
        }
        createCell(item.PONo);
        createCell(item.DepartmentName);
        let HasMate = createCell('');
        if (item.HasMate) {
            HasMate.style.backgroundColor = 'Red';
            HasMate.style.Color = 'Yellow';
            HasMate.innerHTML = item.HasMate;
        }else{
            HasMate.innerHTML = '';
        }

        createCell(item.Terms);
        createCell(item.CustomerRefNo);
        createCell(item.Buyer);

        let MStatusColorCode  = item.StatusColorCode;
        let Status = createCell(item.Status);
        if(MStatusColorCode !== ''){
            if (MStatusColorCode == '-10900225') {
                Status.style.backgroundColor = "rgba(99,183,255,1.00)";
            }
            else if (MStatusColorCode == '-8323073') {
                Status.style.backgroundColor = "rgba(127,0,255,1.00)";
            }
            else if (MStatusColorCode == '-15154944') {
                Status.style.backgroundColor = "rgba(34,34,170,1.00)";
            }
            else if (MStatusColorCode == '-8323200') {
                Status.style.backgroundColor = "rgba(127,0,128,1.00)";
            }
            else if (MStatusColorCode == '-32640') {
                Status.style.backgroundColor = "rgba(255,128,255,1.00)";
            }
            else if (MStatusColorCode == '-128') {
                Status.style.backgroundColor = "rgba(128,128,128,1.00)";
            }

        }else{
            Status.style.backgroundColor = "white";
        }
        createCell(parseFloat(item.ExtAmount).toFixed(2));
        createCell(items.MOrderQty);
        createCell(items.MRecQty);
        createCell(item.PullQty);
        let MReadyQty = item.PullQty ? parseFloat(item.PullQty) : 0 + items.MRecQty ? parseFloat(items.MRecQty) : 0;
        createCell(MReadyQty);
        let MshortQty = items.MOrderQty ? parseFloat(items.MOrderQty) : 0 + MReadyQty ? MReadyQty : 0;
        createCell(MshortQty);
        createCell(items.MDeliveredQty);
        createCell(items.MReturnQty);
        createCell(items.MMissingQty);
        createCell(items.MSoldQty);
        createCell(item.SaleReturnQty);
        createCell(item.QuoteNo);
        createCell(item.VSNInvoiceNo);
        createCell(item.CustomerCode);







    });
    }




  },
  error: function(data) {
                console.log(data);
                $('.overlay').hide();
            },
            complete: function() {
                $('.overlay').hide();
                // Hide the overlay and spinner after the request is complete
            }


});
    }







});


</script>
@stop


@section('content')
