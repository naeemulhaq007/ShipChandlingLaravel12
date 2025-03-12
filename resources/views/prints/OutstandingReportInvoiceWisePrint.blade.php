@extends('layouts.app')



@section('title', 'Outstanding Report-Invoice Wise-Print')

@section('content_header')
{{-- {{$data["pagetitle"]}} --}}
@stop

@section('content')
</div>
<div class="">
     <div class="row col-sm-12 ml-1">
    <div class="col-sm-5">
         <img class="img-fluid "  src="<?php echo url('images/Branches/'.config('app.BranchPicture')); ?>" style="max-width:100px">
         <div class="row pb-2">
            <div class="col-sm-12">
            <h2><strong> {{$company->CompanyName}} </strong>
            </h2>
        </div>
    </div>
    <div class="row">
         <div class="col-sm-12">
            <h6>{{$company->CompanyAddress}}</h6>
         </div>
        </div>
            <div class="row ">
                 <div class="col-sm-12">
                <h6>{{$company->PhoneNo}}</h6>
             </div>
            </div>
            <div class="row ">
                 <div class="col-sm-12">
                 <h6>{{$company->FaxNo}}</h6>
            </div>
         </div>
          <div class="row ">
             <div class="col-sm-12">
                <h6>Email : <a href="mailto:{{$company->EmailAddress}}">{{$company->EmailAddress}}</a></h6>
             </div>
            </div>
             <div class="row "> <div class="col-sm-12">
                <h6>WebSeite : <a href="{{$company->WebsiteAddress}}">{{$company->WebsiteAddress}}</a></h6>
             </div>
             </div>
             <div class="row mt-2">
                    <div class="col-sm-8 card text-center text-blue">
                <h4>Outstanding Report Invoice Wise</h4>
                    </div>
                    <div class="col-sm-1 ml-auto print-only">
                        <i class="fas fa-print fa-3x text-primary" style="cursor: pointer" onclick="window.print()" aria-hidden="true"></i>
                    </div>

             </div>
     </div>
    <div class="col-sm-6">
         <div class="row py-2 float-right col-sm-8">
         <img class="img-fluid" src="<?php echo url('assets/images/Ship.png');?>" style="max-width:100px" border="0">
         <img class="img-fluid" src="<?php echo url('assets/images/impa.png');?>" style="max-width:100px" border="0">
          <img class="img-fluid" src="<?php echo url('assets/images/Supply.png');?>" style="max-width:100px" border="0">
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-9 float-right">
                     <div class="row custom-hight">
            <div class="card shadow border border-dark line mr-1 col-sm-5">
               <p class="mt-2">WorkUser :</p>
            </div>
                <div class="card shadow border border-dark line mr-1 col-sm-5">
                   <p class="mt-2">{{$MWorkUser}}</p>
               </div>

               </div>
                     <div class="row custom-hight">
            <div class="card shadow border border-dark line mr-1 col-sm-5">
               <p class="mt-2">DateFrom :</p>
            </div>
                <div class="card shadow border border-dark line mr-1 col-sm-5">
                   <p class="mt-2">{{$DateFrom}}</p>
               </div>

               </div>
                     <div class="row custom-hight">
            <div class="card shadow border border-dark line mr-1 col-sm-5">
               <p class="mt-2">DateTo :</p>
            </div>
                <div class="card shadow border border-dark line mr-1 col-sm-5">
                   <p class="mt-2">{{$DateTo}}</p>
               </div>

               </div>

                               </div>
                                    </div>
                                </div>


<div class="col-sm-12">
     <div class="rounded shadow ">

        <table id="OrderReporttable" class="bg-white table table-inverse table-responsive">
                <thead>
                    <tr>
                        <th>Invoice&nbsp;No.</th>
                        <th>VSN&nbsp;No.</th>
                        <th>Inv&nbsp;Date.</th>
                        <th>Terms</th>
                        <th>Due&nbsp;Date</th>
                        <th>Due&nbsp;Days</th>
                        <th>Inv&nbsp;Days</th>
                        <th>Vessel&nbsp;Name</th>
                        <th>Department</th>
                        <th>Cust.PO&nbsp;#</th>
                        <th>Status</th>
                        <th>Chq&nbsp;#</th>
                        <th>RV&nbsp;#</th>
                        <th>Cr.&nbsp;Note</th>
                        <th>Invoice&nbsp;Amount</th>
                        <th>Received&nbsp;Amount</th>
                        <th>Balance&nbsp;Amount</th>
                        <th>Running&nbsp;Total</th>


                    </tr>
        </thead>

        <tbody id="OrderReporttablebody">
            @php
             $gSumCrNotAmt = 0;
            $gSumNetAmount = 0;
            $gSumReceivedAmt = 0;
            $gSumBalAmt = 0;
            @endphp
            @foreach ($table->groupBy('CustomerName') as $CustomerName => $CustomeItems)
                @php
                $targetId = 'customer_' . Str::random(8);
                $SumCrNotAmt = 0;
            $SumNetAmount = 0;
            $SumReceivedAmt = 0;
            $SumBalAmt = 0;
                @endphp
                <tr  class="customer-row toggle-details" data-target="{{ $targetId }}">
                    <th colspan="8" class="text-center">
                      CustomerName :   {{ $CustomerName }}
                    </th>

                </tr>
                @foreach ($CustomeItems as $item)
                    @php
                    $detailsId = 'customer_' . Str::random(8);
                    $SumCrNotAmt += $item->CrNotAmt ? round($item->CrNotAmt, 2) : 0 ;
                    $SumNetAmount += $item->NetAmount ? round($item->NetAmount, 2) : 0 ;
                    $SumReceivedAmt += $item->ReceivedAmt ? round($item->ReceivedAmt, 2) : 0 ;
                    $SumBalAmt += $item->BalAmt ? round($item->BalAmt, 2) : 0 ;
                    $gSumCrNotAmt += $item->CrNotAmt ? round($item->CrNotAmt, 2) : 0 ;
                    $gSumNetAmount += $item->NetAmount ? round($item->NetAmount, 2) : 0 ;
                    $gSumReceivedAmt += $item->ReceivedAmt ? round($item->ReceivedAmt, 2) : 0 ;
                    $gSumBalAmt += $item->BalAmt ? round($item->BalAmt, 2) : 0 ;
                    @endphp
                    <tr class="customer-details {{ $targetId }}" style="display: none;">
                            <td>{{ $item->PoNo }}</td>
                            <td>{{ $item->VSNNo ? $item->VSNNo : '' }}</td>
                            <td>{{ $item->InvDate ? date('d-M-Y', strtotime($item->InvDate)) : '' }}</td>
                            <td>{{ $item->Terms ? $item->Terms : '' }}</td>
                            <td>{{ $item->DueDate ? date('d-M-Y', strtotime($item->DueDate)) : '' }}</td>
                            <td>{{ $item->DueDate ? \Carbon\Carbon::parse(today())->diffInDays(\Carbon\Carbon::parse($item->DueDate)).' Days' : '' }}</td>
                            <td>{{ $item->InvDate ? \Carbon\Carbon::parse(today())->diffInDays(\Carbon\Carbon::parse($item->InvDate)).' Days' : '' }}</td>

                            <td>{{ $item->VesselName ? $item->VesselName : '' }}</td>
                            <td>{{ $item->Department ? $item->Department : '' }}</td>
                            <td>{{ $item->CustomerRefNo ? $item->CustomerRefNo : '' }}</td>
                            <td>{{ $item->Status ? $item->Status : '' }}</td>
                            <td>{{ $item->ChqNo ? $item->ChqNo : '' }}</td>
                            <td>{{ $item->RVNo ? $item->RVNo : '' }}</td>

                            <td class="text-right">{{ $item->CrNotAmt ? round($item->CrNotAmt, 2) : 0 }}</td>
                            <td class="text-right">{{ $item->NetAmount ? round($item->NetAmount, 2) : 0 }}</td>
                            <td class="text-right">{{ $item->ReceivedAmt ? round($item->ReceivedAmt, 2) : 0 }}</td>
                            <td class="text-right">{{ $item->BalAmt ? round($item->BalAmt, 2) : 0 }}</td>
                    </tr>

                @endforeach
                <tr>
                    <th colspan="13" class="text-right">
                        Sub Total :
                    </th>
                    <th class="text-right">
                        {{round($SumCrNotAmt,2)}}
                    </th>
                    <th class="text-right">
                        {{round($SumNetAmount,2)}}
                    </th>
                    <th class="text-right">
                        {{round($SumReceivedAmt,2)}}
                    </th>
                    <th class="text-right">
                        {{round($SumBalAmt,2)}}
                    </th>
                </tr>
            @endforeach

            <tr>
                <th colspan="13" class="text-right">
                    Grand Total :
                </th>
                <th class="text-right">
                    {{round($gSumCrNotAmt,2)}}
                </th>
                <th class="text-right">
                    {{round($gSumNetAmount,2)}}
                </th>
                <th class="text-right">
                    {{round($gSumReceivedAmt,2)}}
                </th>
                <th class="text-right">
                    {{round($gSumBalAmt,2)}}
                </th>
            </tr>
        </tbody>






    </div>
    </div>






                   </div>
 @stop

  @section('css')
  <style>
 @media print {
        .print-only {
            display: none !important;
        }
        .table-responsive {
    display: block !important;
    overflow: visible !important;
    width: auto !important;
  }
    }
    .inline-list {
    display: flex;
    align-items: center;
  }
.custom-th{
        width: 10px;

    }
    .custom-th2{
        width: 30px;

    }
    .custom-th2{
        width: 50px;

    }
      .custom-col{
          max-width: 20%;
      }
      .line{
          line-height:0.1;
      }
      .custom-col-5{
          flex: 0 0 47%;
          max-width:49%;
      }
      .custom-hight{
          height: 30px;
      }
 </style>
  @stop

  @section('js')
   <script>
    $(document).ready(function() {
        $('.customer-row').on('dblclick', function() {
            var target = $(this).data('target');
            $('.' + target).toggle();
        });
    });
     $(document).ready(function () {

//         tablecomposer();
//         function tablecomposer(){
//     let table = document.getElementById('OrderReporttablebody');
//     let rows = table.rows;
//     let totext = 0;

//         for (let i = 0; i < rows.length; i++) {
//   let cells = rows[i].cells;
//     extamnt= cells[16] ? cells[16].innerHTML : '';

//     totext += Number(extamnt);

//     }

// $('#gtotoal').text(parseFloat(totext).toFixed(2));

// }
               });
        $(document).ready(function () {




            // window.print();

        })
</script>
@stop


@section('content')
