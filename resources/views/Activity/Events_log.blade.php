@extends('layouts.app')



@section('title', 'Quotation Log')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop


@section('content')
</div>
<div class="container-fluid ">

<div class="col-lg-12" >
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="text-center text-info mr-5">Quotation Log</h4>


                <div class="inputbox col-sm-2 ">
                        <span class="Txtspan">Bid Due</span>
                    {{-- <div class="input-group-prepend ">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div> --}}

                    <input name="biddudate" id="biddudate" value="" format="dd-MMMM-yyyy" type="date" class="datetimepicker-input" >

                </div>
                <button type="button" id="biddudatese" class="btn btn-success"> GO <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
              <div class="inputbox col-sm-2">
                    <span class="Txtspan" id="">Customer name</span>
                <input type="text" class="" onkeyup="cusFunction()"  id="eventserch" name="eventserch" >
              </div>
              <div class="inputbox col-sm-2">
                    <span class="Txtspan" id="">Vessel name</span>
                <input type="text" class="" onkeyup="vesFunction()"  id="vessercher" name="vessercher" >
            </div>
            <div class="inputbox col-sm-1 mr-5">
                    <span class="Txtspan" id="">User</span>
                <select id="username" onchange="onChangeSelectOption()" class="" name="">
                    <option selected value=""></option>
                    @foreach ($user as $item)
                    <option value="{{$item->EventCreatedUser}}">{{$item->EventCreatedUser}}</option>
                    @endforeach
                </select>
            </div>
            <a name="" id="" class="btn btn-primary mx-5" onclick=" window.open('/events-setup');" role="button">New Event</a>
            <div class="card-tools ml-auto pt-2">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus mr-2"></i>
                </button>


            </div>
                        </div>


        </div>
        <!-- /.card-header -->
        {{-- <form action="event/store" method="post"> --}}
            {{-- @csrf --}}
        <div class="card-body">
          <div class="col-md-12">

            <table class="table  table-inverse table-hover" id="eventtable"
            {{-- style="font-size: 10px; " --}}
            >
               <thead class="">
            <tr>
                {{-- <th>Actions</th> --}}
                <th>EventNo</th>
                <th>BidDUeDate</th>
                <th>Due&nbsp;Time</th>
                <th class="text-left" style="padding-left: 5rem;padding-right: 5rem">Customer&nbsp;Name</th>
                <th  class="px-5">Vessel&nbsp;Name</th>
                <th>Port</th>
                <th class="px-5">Status</th>
                <th class="px-5">ETA</th>
                <th>Priority</th>
                <th>EventCreatedDate</th>
                <th class="px-5">Time</th>
                <th>User</th>
                <th>No&nbsp;of&nbsp;Quote</th>
                <th>Warehouse</th>



            </tr>
            </thead>
           {{-- @foreach( $noofquote as  $noofquot)
           <h1>{{$noofquot->MQouteNo}}</h1>
           @endforeach --}}
            <tbody class="eventserchbody text-center">
                @foreach ($Event as $item)

                <tr class="js-row" style="cursor: pointer" class="" id="{{$item->EventNo}}" data-id="{{$item->EventNo}}"  ondblclick='dblclicker(this.id)' onClick='clicker(this.id)'>
        {{-- <td ><a  style="color:rgb(0, 213, 53)" href="events-setups/update/{{$item->EventNo}}">Edit</a></td> --}}

                    <td>{{$item->EventNo}}</td>

                    <td>{{$item->BidDUeDate = date('d-M-Y', strtotime($item->BidDUeDate))}}</td>
                    <td>{{date('H:i:a', strtotime($item->DueTime))}}</td>
                    <td>{{$item->CustomerName}}</td>

                    <td>{{$item->VesselName}}</td>
                    <td>{{$item->ShippingPort}}</td>
                    <td>{{$item->STATUS}}</td>
                    <td>{{$item->ETA = date('d-M-Y', strtotime($item->ETA))}}</td>
                    <td>{{$item->Priority}}</td>
                    <td>{{date('d-M-Y', strtotime($item->EventCreatedDate))}}</td>
                    <td>{{date('H:i:a', strtotime($item->EventCreatedTime))}}</td>
                    <td>{{$item->EventCreatedUser}}</td>
                    <td>{{$item->MQouteNo}}</td>

                    <td>{{$item->GodownName}}</td>



                </tr>

                @endforeach
                {{-- {{-- <td>{{$item->Name}}</td> --}}
                {{-- {{($noofquotes as $noofquote)}} --}}
                    {{-- @foreach($Eventrt as $Eventr)
                    <td>{{$Eventr->QuoteCount}}</td>
                    {{-- @endforeach  --}}
            </tbody>
    </table>



              </div>
          </div>
        </div>

    </div>
</div>
<div class="col-lg-12">
{{-- {{$Event}} --}}
    {{-- @foreach($Event as $Eventr)
    <p>{{$Eventr->EventNo}}</p>
    <p>{{$Eventr->QuoteCount}}</p>
 @endforeach --}}
    <div class="card">
        <div class="card-header">


            <div class="row">
                <h2 class="text-center mx-auto text-info">Quotes Log</h2>
            <div class="card-tools ml-auto">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>


            </div>

        </div>
        <!-- /.card-header -->
        {{-- <form action="event/store" method="post"> --}}
        <div class="card-body">
          <div class="col-md-12">


    <table class="table  table-inverse table-hover" id="quotetabel"
     {{-- style="font-size: 10px; " --}}
     >
        <thead class="">
            <tr>

                {{-- <th class="px-3">Actions</th> --}}
                <th class="px-3">Quote&nbsp;#</th>
                <th class="px-5">Created&nbsp;Date</th>
                <th class="px-4">Time</th>
                <th class="px-3">ReturnVia</th>
                <th class="px-4">BidDueDate</th>
                <th class="px-3">DueTime</th>
                <th class="px-3">Act</th>
                <th class="px-3">Cst</th>
                <th class="px-3">Pricing</th>
                <th class="px-3">Department</th>
                <th class="px-3">Value</th>
                <th class="px-3">Cost&nbsp;Amount</th>
                <th class="px-3">GP%</th>
                <th class="px-5">Status</th>
                <th class="px-3">Cust&nbsp;Ref</th>
                <th class="px-3">VSNNo</th>
                <th class="px-3">Charges</th>
                <th class="px-3">User</th>


            </tr>
            </thead>
            <tbody class="quoter text-center">

            </tbody>
    </table>
    <div class="mx-auto" >

    <br>

</div>

          </div>
        </div>
    </div>
</div>
</div>
<input type="hidden" class="eventno" id="eventno">
@csrf

<script>


   document.getElementById('biddudate').valueAsDate = new Date();

    function dblclicker(clicked_id){
        window.location.href ='/events-setups/update?EventNo='+clicked_id;
    }
    function clicker(clicked_id)
              {

                var inputF = document.getElementById("eventno");
                //   var inputr = document.getElementById("discompanyname");

                //   alert(clicked_id);
                inputF.value = clicked_id;
                    //   inputr.value = clicked_id;
                    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
             type:"POST",
             url:"calcList/"+clicked_id,
             success : function(results) {
                //  console.log(results);
                 $('.quoter').html(results);

             }
        });

              }


        $(document).ready(function() {


            $('#biddudate').on('keypress', function(event){
if(event.keyCode === 13){
    $('#biddudatese').click();
}
})



    $('#biddudatese').click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var date =$('#biddudate').val();


        console.log('searching From Date = '+date);
        $.ajax({
             type:"POST",
             url:"{{route('biddate')}}",
             data:{
                date
             },
             success : function(results) {

                //  console.log(results);
                 $('.eventserchbody').html(results.output);
                //  console.log(results);
                if (results.user.length > 0) {
                    $('#username').html('');
                    $('#username').append('<option value=""> Select User </option>');
                    $.each(results.user, function (key, value) {
                        $('#username').append('<option value="' + value.EventCreatedUser + '">' + value.EventCreatedUser + '</option>');
                    });

                }

             },
             error: function(XMLHttpRequest, textStatus, errorThrown,results) {
                    // alert("Status: " + XMLHttpRequest); alert("Error: " + errorThrown);
                    console.log(errorThrown);
                }
        });
    });
});
// $('#biddudate').keyup( function() {

//     var value = $(this).val();

//     // check for first 2 chars
//     if(value.length === 2) {
//         value += "-";
//         $(this).val(value);
//     }


//     // check for first 4 + "-"
//     if(value.length === 7) {
//         value += "-";
//         $(this).val(value);
//     }

// });

function cusFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("eventserch");
  filter = input.value.toUpperCase();
  table = document.getElementById("eventtable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
};
function vesFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("vessercher");
  filter = input.value.toUpperCase();
  table = document.getElementById("eventtable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
};
function onChangeSelectOption() {
  var selectElement = document.getElementById("username"); // replace "mySelect" with the ID of your select element
  var selectedValue = selectElement.value;
  var table = document.getElementById("eventtable"); // replace "eventtable" with the ID of your table
  var rows = table.getElementsByTagName("tr");

  for (var i = 0; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var showRow = false;
    for (var j = 0; j < cells.length; j++) {
      if (cells[j].textContent.toLowerCase().indexOf(selectedValue.toLowerCase()) > -1) {
        showRow = true;
        break;
      }
    }
    rows[i].style.display = showRow ? "" : "none";
  }
}



        </script>

         <script type="text/javascript">

        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });


            </script>
@stop

@section('css')
@stop

@section('js')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
$(document).ready( function () {
$('#eventtable').DataTable({
    scrollY:        300,
    scrollX:        true,
deferRender:    true,
scroller:       true,
ordering:false,
searching:false,
paging:false,
info:false,
responsive: true,
// scrollX: true,
// dom: 'Bfrtip',
//         buttons: [
//             {
//                 text: 'New Event',
//                 className: 'btn btn-primary',
//                 action: function ( e, dt, node, config ) {
//                     window.open('/events-setup');
//                 }
//             },
//         ]

});
$(".dt-button").removeClass("dt-button")

$('#quotetabel').DataTable({
    scrollY:        300,
    scrollX:        true,

deferRender:    true,
scroller:       true,
responsive: true,
// scrollX: true,
ordering:false,
searching:false,
paging:false,
info:false,
// dom: 'Bfrtip',
//         buttons: [
//             'excel',  {
//             extend: 'print',
//             text: 'Print Or PDF',
//             customize: function ( doc ) {
//                                             $(doc.document.body).find('h1').css('font-size', '15pt');
//                                             $(doc.document.body).find('h1').css('text-align', 'center');
//                                         },

//             // customize: function ( doc ) {
//             //     doc.content.splice( 1, 0, {
//             //         margin: [ 0, 0, 0, 12 ],
//             //         alignment: 'left',
//             //         image: 'data:assets/images/company.png'
//             //     } );
//             // }
//         }
//         ]

});




} );

</script>
@stop


@section('content')

