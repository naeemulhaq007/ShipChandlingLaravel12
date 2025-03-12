@extends('layouts.app')



@section('title', 'User-Performance-print')

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
                    <div class="col-sm-6 card text-center text-blue">
                <h4>User-Performance-Summary</h4>
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

                               </div>
        <div class="col-sm-9 float-right">
                     <div class="row custom-hight">
            <div class="card shadow border border-dark line mr-1 col-sm-5">
               <p class="mt-2">DateFrom :</p>
            </div>
                <div class="card shadow border border-dark line mr-1 col-sm-5">
                   <p class="mt-2">{{$dateFrom}}</p>
               </div>
               </div>

                               </div>
        <div class="col-sm-9 float-right">
                     <div class="row custom-hight">
            <div class="card shadow border border-dark line mr-1 col-sm-5">
               <p class="mt-2">DateTo :</p>
            </div>
                <div class="card shadow border border-dark line mr-1 col-sm-5">
                   <p class="mt-2">{{$DateTo}}</p>
               </div>
               </div>

                               </div>
        <div class="col-sm-9 float-right">
                     <div class="row ">
            <div class="card shadow text-center text-blue mt-4 col-sm-5">
               <h5 class="mt-2">{{$ReportType}}</h5>
            </div>

               </div>

                               </div>


                                    </div>
                                </div>


<div class="col-sm-12">
     <div class="rounded shadow ">

            <table id="OrderReporttable" class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead>
                    <tr>
                        <th>Work&nbsp;UserName</th>
                        <th>Quote&nbsp;Lines</th>
                        <th>Quote&nbsp;Amount</th>
                        <th>Order&nbsp;Lines</th>
                        <th>Order&nbsp;Amount</th>
                        <th>Success&nbsp;%</th>


                    </tr>
        </thead>

        <tbody id="OrderReporttablebody">
            @php
            $sumQuoteAmount = 0;
            $sumOrderAmount = 0;
            $sumLineQuote = 0;
            $sumLineOrder = 0;
            $countQuoteAmount = 0;
            $countOrderAmount = 0;
            $workSellPriciedTotal = 0;
            $CustomerQuoteAmount = 0;
            $CustomerOrderAmount = 0;
            @endphp
    @foreach ($Table->groupBy('WorkSellPriced') as $CustomerName => $CustomeItems)
    @foreach ($CustomeItems as $item)
    @php
    $sumLineQuote += $item->LineQuote;
    $sumLineOrder += $item->LineOrder;
    $sumQuoteAmount += $item->QuoteAmount ? (float) $item->QuoteAmount : 0;
    $sumOrderAmount += $item->OrderAmount ? (float) $item->OrderAmount : 0;
    @endphp
    @endforeach
            <tr>
                <th  class=" ">
                    {{$CustomerName}}
                </th>
                <th  class=" ">
                    {{$sumLineQuote}}
                </th>
                <th  class="text-danger ">
                    {{$sumQuoteAmount}}
                </th>
                <th  class=" ">
                    {{$sumLineOrder}}
                </th>
                <th  class=" text-danger">
                    {{$sumOrderAmount}}
                </th>
                <th  class=" ">
                    {{ round(($sumOrderAmount / ($sumQuoteAmount == 0 ? 1 : $sumQuoteAmount)) * 100,2) }}%
                </th>
            </tr>
            {{-- @foreach ($CustomeItems as $item)
                @php

                $countQuoteAmount += $item->QuoteAmount != 0 ? 1 : 0;
                $countOrderAmount += $item->OrderAmount != 0 ? 1 : 0;
                $CustomerQuoteAmount += $item->QuoteAmount ? (float) $item->QuoteAmount : 0;
                $CustomerOrderAmount += $item->OrderAmount ? (float) $item->OrderAmount : 0;
                @endphp
                <tr>
                    <td>{{ $item->QDate ? date('d-M-Y', strtotime($item->QDate)) : '' }}</td>
                    <td>{{ $item->QuoteNo }}</td>
                    <td>{{ $item->FlipOrderNo }}</td>
                    <td>{{ $item->VSNNo }}</td>
                    <td>{{ $item->Department }}</td>
                    <td>{{ $item->CustomerName }}</td>
                    <td>{{ $item->Vessel }}</td>
                    <td>{{ $item->LineQuote }}</td>
                    <td>{{ round($item->QuoteAmount,2) }}</td>
                    <td>{{ $item->LineOrder }}</td>
                    <td>{{ round($item->OrderAmount,2) }}</td>
                    <td>{{ round($item->Success,2) }}%</td>
                    <td>{{ $item->GPPer }}%</td>
                </tr>
            @endforeach --}}
            {{-- <tr>
                <th colspan="8" class="text-right text-danger">
                    {{$CustomerName}} Total
                </th>
                <th>
                    {{ $CustomerQuoteAmount }}
                </th>
                <th></th>
                <th>
                    {{ $CustomerOrderAmount }}
                </th>
                <th>
                    {{ round(($CustomerOrderAmount / ($CustomerQuoteAmount == 0 ? 1 : $CustomerQuoteAmount)) * 100,2) }}%
                </th>
            </tr> --}}
            @endforeach

            <tr>
                <th colspan="2" class="text-right">
                    Grand Total:
                </th>
                <th>
                    {{ $sumQuoteAmount }}
                </th>
                <th></th>
                <th>
                    {{ $sumOrderAmount }}
                </th>
                <th>
                    {{ round(($sumOrderAmount / ($sumQuoteAmount == 0 ? 1 : $sumQuoteAmount)) * 100,2) }}%
                </th>
            </tr>
            <tr>
                <th colspan="2" class="text-right">
                    No of Quote And Order
                </th>
                <th>
                    {{ $countQuoteAmount }}
                </th>
                <th></th>

                <th>
                    {{ $countOrderAmount }}
                </th>
                <th>
                    {{ round(($countOrderAmount / ($countQuoteAmount == 0 ? 1 : $countQuoteAmount)) * 100, 2) }}%
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
