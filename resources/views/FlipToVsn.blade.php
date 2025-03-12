@extends('layouts.app')



@section('title', 'FlipToVSN')

@section('content_header')
@stop

@section('content')
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
</div>

{{-- <form action="/quotation/fliptovsn/save" method="post"> --}}
<div class="container-fluid p-2 small">
    <div class="col-lg-12">
<div class="row pb-2">

    {{-- <div class="col-sm-3 mx-auto table-dark text-center py-2">
    <h3>Flip To VSN</h3>
</div> --}}
{{-- <div class="header">
    <div class="fixed">This is a</div>
    <ul class="typed">
      <li><span>Caption</span></li>
      <li><span>Title</span></li>
      <li><span>Header</span></li>
    </ul>
  </div> --}}
  <header class="col-sm-3 mx-auto">
    <h3>Flip To VSN</h3>
</header>

</div>
<div class="row">
<div class="col-sm-3">
<div class="row py-2">
    <div class="col-sm-9">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text span-w" id="">VSN #:</span>
            </div>
            <input class="form-control" readonly type="text" id="showVSn" name="VSNNoo" placeholder="" value="" aria-label="" aria-describedby="">
        </div>
    </div>

</div>
<div class="row py-2">
    <div class="col-sm-9">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text span-w" id="">Customer #:</span>
        </div>
        <input class="form-control" type="text" readonly name="CustomerName" placeholder="" value="{{$customer}}" aria-label="" aria-describedby="">
    </div>
    </div>
</div>
<div class="row py-2">
    <div class="col-sm-9">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text span-w" id="">Vessel :</span>
        </div>
        <input class="form-control" type="text" readonly name="VesselName" placeholder="" value="{{$VesselName}}" aria-label="" aria-describedby="">
    </div>
    </div>
</div>
<div class="row py-2">
    <div class="col-sm-9">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text span-w" id="">Event #:</span>
        </div>
        <input class="form-control" id="event" readonly type="text" name="EventNo" placeholder="" value="{{$gEventNo}}" aria-label="" aria-describedby="">
    </div>
    </div>
</div>

</div>
<div class="col-sm-9">

<div class="row py-2">
    <div class="col-sm-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text span-w2" id="">Order Date</span>
            </div>
            <input class="form-control" type="date" id="oderdate" name="oderdate"value="{{$sqlvsndata ? date('Y-m-d', strtotime($sqlvsndata->OrderDate)) : date('Y-m-d') }}" >
         </div>
        </div>
    <div class="col-sm-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text span-w" id="">Port :</span>
            </div>

                <select class="custom-select" name="port" id="port">
                    <option selected value="{{$sqlvsndata ? $sqlvsndata->Port : ''}}">{{$sqlvsndata ? $sqlvsndata->Port : ''}}

                </option>
                    @foreach ($shiping as $item)
                    <option value="{{$item->PortName}}">{{$item->PortName}}</option>
                   @endforeach
                </select>

        </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text span-w2" id="">Delevery Date</span>
                </div>
                <input class="form-control" type="date" id="Deleverydate" name="Deleverydate"value="{{$sqlvsndata ? date('Y-m-d', strtotime($sqlvsndata->DeliveryDate)) : date('Y-m-d')}}" >
            </div>
            </div>
</div>
<div class="row py-2">

    <div class="col-sm-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text span-w" id="">Agency :</span>
            </div>

                <select class="custom-select" name="Agency" id="Agency">
                    <option selected value="{{$sqlvsndata ? $sqlvsndata->Port : ''}}">{{$sqlvsndata ? $sqlvsndata->Port : ''}}</option>
                    @foreach ($agency as $item)
                    <option value="{{$item->CusCode}}">{{$item->CusCode}}</option>
                   @endforeach
                </select>

        </div>
        </div>
        <div class="col-sm-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text span-w2" id="">Delevery Time</span>
                </div>
                <input class="form-control" type="time" id="DeleveryTime" name="DeleveryTime"value="" >
            </div>
            </div>
        <div class="col-sm-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text span-w" id="">Agent C.P :</span>
                </div>

                    <select class="custom-select" name="agentcp" id="agentcp">
                        <option selected>Select one</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>

            </div>
            </div>
</div>


    <div class="row py-2">
        <div class="col-sm-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text span-w2" id="">Location</span>
            </div>
            <input class="form-control" type="text" name="location" placeholder="" value="{{$sqlvsndata ? $sqlvsndata->Location : $sqsndata[0]['Location']}}" id="location">
        </div>
    </div>
    </div>
    <div class="row py-2">
        <div class="col-sm-8">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Gernal Vessel Note</span>
            </div>
            <textarea class="form-control" name="gernalveselnoter" id="GVN" cols="30" rows="2">{{$gernalnote}}</textarea>
        </div>
    </div>
        <a name="" id="vsnsave" class="btn btn-success col-sm-1"  role="button">Save VSN</a>
    </div>



</div>
</div>


</div>
<div class="col-sm-12 ">
    <div class="rounded shadow ">
        <div class="table-responsive tableFixHead">
            <table class="table table-bordered table-inverse ">
                <thead class="thead-dark">
                    <tr>
                        <th>SNo</th>
                        <th>Quote #</th>
                        <th>Cust Req #</th>
                        <th>Quote Amt</th>
                        <th>Est Lines</th>
                        <th>VSN</th>
                        <th>Charge</th>
                        <th>Flip Date</th>
                        <th>Flip</th>
                        <th>Terms</th>
                    </tr>
                    </thead>
                    <tbody id="flib">
                        <?php
                            $counter=0;
                            ?>
                        @foreach ($masterdata as $item)
                        <?php
                   $counter=$counter+1;

                   ?>
                        <tr>
                            <td scope="row"><?php echo $counter;?></td>
                            <input type="hidden"  name="ID[]" value="{{$item->ID}}" id="">
                            <td><input type="text" readonly class="boderless" name="QuoteNo[]" value="{{$item->QuoteNo}}" id=""></td>
                            <td><input type="text" readonly class="boderless-w-width" name="CustomerRefNo[]" value="{{$item->CustomerRefNo}}" id=""></td>
                            <td class="text-right"><input type="text" readonly class="boderless" name="ValueAmount[]" value="{{round($item->ValueAmount,2)}}" id=""></td>
                            <td><input type="text" readonly class="boderless" name="EstLineQuote[]" value="{{$item->EstLineQuote}}" id=""></td>
                            <td><input type="text" readonly class="boderless" name="VSNNo[]" value="{{$item->VSNNo}}" id=""></td>
                            <td><input type="text" readonly class="boderless" name="FlipOrderNo[]" value="{{$item->FlipOrderNo}}" id=""></td>
                            <td><input type="text" readonly class="boderless" name="FlipDAte[]" value="{{ $item->FlipDAte ? date('d-M-Y', strtotime($item->FlipDAte)) : ''}}" id=""></td>
                            <td><input type="checkbox" name="flip[{{$item->QuoteNo}}]" id="flipcheck<?php echo$counter;?>" <?php if ($item->QuoteNo == $quoteno ) {echo 'checked';}?> value="<?php if ($item->QuoteNo == $quoteno ) {echo 1;} else{ echo $item->ChkFlip;}?>"></td>

                            <td><input type="text" readonly class="boderless" name="Terms[]" value="{{$item->Terms}}" id=""></td>
                        </tr>
                        @endforeach

                    </tbody>
            </table>

        </div>

    </div>

<div class="row py-2 ">
            <a name="" id="refrsh" class="btn btn-info form-control ml-auto col-sm-1 mx-1" role="button"> Refresh</a>
            <a  name="" id="vsnsave" class="btn btn-success form-control col-sm-1 mx-1"   role="button"> Proceed</a>
            <a name="" id="" class="btn btn-danger form-control mr-auto col-sm-1 mx-1" href="{{ url()->previous() }}"  role="button">Close</a>
</div>
<div class="row py-2">
    <div class="mx-auto">
        <div class="row">
<div class="col-sm-4">
   <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text" id="">Confirmation Form By</span>
    </div>
    <input class="form-control" type="text" readonly name="workuser" value="{{$user}}" placeholder="" id="workuser">

   </div>
</div>
    <div class="col-sm-4">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">Avail Credit :</span>
        </div>
        <input class="form-control availcredit" type="text" readonly name="AvailCredit"  id="availcredit" placeholder="" aria-label="" aria-describedby="">
    </div>
</div>
    <div class="col-sm-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Flip Amount :</span>
            </div>
            <input class="form-control" type="text" value="{{round($sum,2)}}" readonly name="FlipAmount" id="FlipAmount" placeholder="">
        </div>
    </div>
</div>
</div>
</div>
{{-- </form> --}}




</div>
</div>
@stop

@section('css')



    <style>
header {
  width: 100%;
  height: 4vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
}
header h3 {
  position: absolute;
  width: 55%;
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
header h3:hover{
  background-position: 200%;
}
/* .header{
  display: inline-flex;
}
.header .fixed {
  font-size: 70px;
  font-weight: 500;
  color: #b393d3;
}
.header .typed{
  margin-left: 20px;
  line-height: 90px;
  height: 90px;
  overflow: hidden;

}
.header .typed li{
  color: #553c9a;
  font-size: 70px;
  font-weight: 600;
  list-style: none;
  animation: slide 4.5s steps(3) infinite;
  position: relative;
  top: 0;
}
@keyframes slide{
  100%{
    top: -360px;
  }
}
.header .typed li span{
  position: relative;
}
.header .typed li span::before{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  left: 0;
  border-left: 2px solid #553c9a;
  background: #fdfdfe;
  animation: cursor 1s infinite step-end, typing 1.5s steps(8) infinite;
}
@keyframes cursor{
  0%, 100%{border-color: transparent;}
  50%{border-color: #553c9a;}
}
@keyframes typing{
  100%{ left: 8ch;}
}
@keyframes slide{
  100%{top:-270px}
  } */
.boderless{
            border: none;
border-width: 0;
box-shadow: none;
background: none;
width:75px;
        }
        .boderless:focus {outline:none!important;}
        .boderless-w-width{
            border: none;
border-width: 0;
box-shadow: none;
background: none;
        }
        .boderless-w-width:focus {outline:none!important;}
.tableFixHead { overflow-y: auto; height: 400px; }

/* Just common table stuff. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; }
        .smfont{
            font-size: 0.7rem;
        }
        .span-w{
           width: 90px;
        }
        .span-w2{
           width: 100px;
        }
    </style>
@stop

@section('js')
<script>
    $(document).ready(function () {
let quotechevker = '{{$quoteno}}'

        let tableBody = document.getElementById('flib');
let rows = tableBody.rows;
let vsnshow =0;
let totalflips =0;
let valueAmount = 0;
let TvalueAmount = 0;
for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
//   let quoteNo = cells[1].querySelector('input').value;
//   let customerRefNo = cells[2].querySelector('input').value;
//   let valueAmount = cells[3].querySelector('input').value;
//   let EstLineQuote = cells[4].querySelector('input').value;
let VSNNo = cells[5].querySelector('input').value;
let flipcheck = cells[8].querySelector('input').value;
// let quote = cells[1].innerHTML;
// if (quotechevker == quote) {
//     flipcheck = 1;
//     console.log(cells[8].querySelector('input'));
// }

if (flipcheck > 0) {
    totalflips = totalflips + 1;
   valueAmount = cells[3].querySelector('input').value;

}


if (VSNNo > 0 || VSNNo !== '') {
    vsnshow = cells[5].querySelector('input').value;
    $('#showVSn').val(vsnshow);
}else{
    console.log('Empty');
}
TvalueAmount +=Number(valueAmount);
// console.log(valueAmount);
//   let FlipOrderNo = cells[6].querySelector('input').value;
//   let FlipDAte = cells[7].querySelector('input').value;
//   let flipcheck = cells[8].querySelector('input').value;
//   let Terms = cells[9].querySelector('input').value;
}
console.log(TvalueAmount);
$('#FlipAmount').val(TvalueAmount);

    });

// function tablefunc(){
//     let tableBody = document.getElementById('flib');
// let rows = tableBody.rows;
//  inputValues = [];
// for (let i = 0; i < rows.length; i++) {
//   let cells = rows[i].cells;
//   let quoteNo = cells[1].querySelector('input').value;
//   let customerRefNo = cells[2].querySelector('input').value;
//   let valueAmount = cells[3].querySelector('input').value;
//   let EstLineQuote = cells[4].querySelector('input').value;
//   let VSNNo = cells[5].querySelector('input').value;
//   let FlipOrderNo = cells[6].querySelector('input').value;
//   let FlipDAte = cells[7].querySelector('input').value;
//   let flipcheck = cells[8].querySelector('input').value;
//   let Terms = cells[9].querySelector('input').value;
//   inputValues.push({
//     quoteNo,customerRefNo,valueAmount,EstLineQuote,VSNNo,FlipOrderNo,FlipDAte,flipcheck,Terms
//   })

// //   if (flipcheck > 0) {
// //       console.log('checked')
// //     } else {

// //         console.log('Notchecked')
// //     }
// }
// // console.log(inputValues);

// }

    $(document).ready(function() {
        // tablefunc();


        var inputtime = document.getElementById("DeleveryTime");
    var now = new Date();
    inputtime.value = now.toLocaleTimeString("en-US",{hour12:false,minute:"2-digit", hour:"2-digit"});




    });
    $(document).on("click", "#vsnsave", function() {
   let EventNo='{{$gEventNo}}';
   let OrderDate=document.getElementById('oderdate').value;
   let DeliveryDate=document.getElementById('Deleverydate').value;
   let Time=document.getElementById("DeleveryTime").value;
   let Port=document.getElementById("port").value;
   let Location =document.getElementById("location").value;
   let Agency=document.getElementById("Agency").value;
   let GeneralNotes=document.getElementById("GVN").value;
   let Confirmation='{{$user}}';
   let AvailCredit=document.getElementById("availcredit").value;
   let TotalQuote=document.getElementById("FlipAmount").value;
   let TotalFlip=0;
   let NoOfQuote=0;
   let CustomerName='{{$customer}}';
   let VesselName='{{$VesselName}}';
   let tableBody = document.getElementById('flib');
let rows = tableBody.rows;
let inputValues = [];
for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
  let quoteNo = cells[1].querySelector('input').value;
  let customerRefNo = cells[2].querySelector('input').value;
  let valueAmount = cells[3].querySelector('input').value;
  let EstLineQuote = cells[4].querySelector('input').value;
  let VSNNo = cells[5].querySelector('input').value;
  let FlipOrderNo = cells[6].querySelector('input').value;
  let FlipDAte = cells[7].querySelector('input').value;
  let flipcheck = cells[8].querySelector('input').value;
  let Terms = cells[9].querySelector('input').value;

  if (flipcheck > 0) {
    TotalFlip = TotalFlip + 1;

    inputValues.push({
      quoteNo,
      customerRefNo,
      valueAmount,
      EstLineQuote,
      VSNNo,
      FlipOrderNo,
      FlipDAte,
      flipcheck,
      Terms
    });

    // console.log('checked')
  }
  NoOfQuote += Number(1);
}

if (TotalFlip > 0) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    type: 'post',
    url: '{{URL::to('flipsavetwo')}}',
    data: {
    //   VSNNo,
      EventNo,
      OrderDate,
      DeliveryDate,
      Time,
      Port,
      Location,
      Agency,
      GeneralNotes,
      Confirmation,
      AvailCredit,
      TotalQuote,
      TotalFlip,
      CustomerName,
      VesselName,
      NoOfQuote,
      inputValues
    },
    beforeSend: function() {
        // Show the overlay and spinner before sending the request
        $('.overlay').show();
    },
    success: function($response) {
    //   alert($response.Message + ' : ' + $response.QuotionFliped);
      console.log($response.QuotionFliped);
      window.location.href = '/Order/' + $response.Quotion;
    },
    complete: function() {
        // Hide the overlay and spinner after the request is complete
        $('.overlay').hide();
    }
  });
} else {
  console.log('No rows with flipcheck > 0');
}

//    tablefunc();
//    let tabledata = inputValues;
   console.log(inputValues);

    });
</script>
    <script>
// var $th = $('.tableFixHead').find('thead th')
// $('.tableFixHead').on('scroll', function() {
//   $th.css('transform', 'translateY('+ this.scrollTop +'px)');
// });



var $creadit = Math.round({{$credit_limit}}-{{$transamount}},2);
$(document).ready(function() {

    document.getElementById("availcredit").value = $creadit;
    // console.log($creadit);

$('#refrsh').click(function (e) {
    e.preventDefault();
    // alert();
    gpset();
    let tableBody = document.getElementById('flib');
    let rows = tableBody.rows;
    let totalqouteam = 0;
    for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
  let quoteNo = cells[1].querySelector('input').value;
  let customerRefNo = cells[2].querySelector('input').value;
  let valueAmount = cells[3].querySelector('input').value;
  let EstLineQuote = cells[4].querySelector('input').value;
  let VSNNo = cells[5].querySelector('input').value;
  let FlipOrderNo = cells[6].querySelector('input').value;
  let FlipDAte = cells[7].querySelector('input').value;
  let flipcheck = cells[8].querySelector('input').value;
  let Terms = cells[9].querySelector('input').value;
console.log(valueAmount);
if (flipcheck > 0) {
    totalqouteam += Number(valueAmount);
}
}
console.log(totalqouteam);
$('#FlipAmount').val(totalqouteam);

});
});

function gpset() {
    document.getElementById("availcredit").value = $creadit;

}
$( document ).ready(function() {
<?php
                            $counter=0;
                            ?>
                        @foreach ($masterdata as $item)
                        <?php
                   $counter=$counter+1;

                   ?>
$flipcheckbox<?php echo$counter;?> = document.getElementById("flipcheck<?php echo$counter;?>").value;
// console.log($flipcheckbox<?php echo$counter;?>);
    // console.log( "ready!" );
    $('#flipcheck<?php echo$counter;?>').click(function() {
              if($(this).prop("checked") == true) {
                // alert("Checkbox is checked.");
                var inputf = document.getElementById("flipcheck<?php echo$counter;?>");


                inputf.value = 1;
              }
              else if($(this).prop("checked") == false) {
                // alert("Checkbox is unchecked.");
                var inputf = document.getElementById("flipcheck<?php echo$counter;?>");


                inputf.value = 0;
              }
            });
    if ($flipcheckbox<?php echo$counter;?> == 1) {
    // $("#ChkInactive").removeAttr("checked");
    $("#flipcheck<?php echo$counter;?>").prop("checked", true);

}else{
    // $("#ChkInactive").removeAttr("checked");
    $("#flipcheck<?php echo$counter;?>").prop("checked", false);

}
    @endforeach
});

    </script>
@stop


@section('content')

