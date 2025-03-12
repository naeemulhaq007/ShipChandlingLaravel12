@extends('layouts.app')



@section('title', 'Daily Quotation Rreport')

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
                <h4>Daily Quotation Rreport</h4>
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
        {{-- <div class="col-sm-9 float-right">
                     <div class="row custom-hight">
            <div class="card shadow border border-dark line mr-1 col-sm-5">
               <p class="mt-2">WorkUser :</p>
            </div>
                <div class="card shadow border border-dark line mr-1 col-sm-5">
                   <p class="mt-2">{{$MWorkUser}}</p>
               </div>
               </div>

                               </div> --}}
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
        {{-- <div class="col-sm-9 float-right">
                     <div class="row ">
            <div class="card shadow text-center text-blue mt-4 col-sm-5">
               <h5 class="mt-2">{{$ReportType}}</h5>
            </div>

               </div>

                               </div> --}}


                                    </div>
                                </div>


<div class="col-sm-12">
     <div class="rounded shadow ">

            <table id="OrderReporttable" class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead>
                    <tr>
                        <th style="width: 120px">QuoteDate</th>
                        <th>Quote#</th>
                        <th>Event#</th>
                        <th>Customer</th>
                        <th>Vessel</th>
                        <th>Cust&nbsp;Ref&nbsp;#</th>
                        <th>Dept.</th>
                        <th>Port</th>
                        <th>TotalItems</th>
                        <th class="text-right">QuoteAmt</th>
                        <th >Ordered</th>
                        <th class="text-right">Flipped&nbsp;Amt</th>
                        <th>WorkUser</th>

                    </tr>
        </thead>

        <tbody id="OrderReporttablebody">
            @php
            $gCountCustomerName = 0;
            $gSumValueAmount = 0;
            $gSumExtAmount = 0;
            @endphp
    @foreach ($Table->groupBy('GodownName') as $GodownName => $GodownNameItems)
    @php

        $CountCustomerName = 0;
        $SumValueAmount = 0;
        $SumExtAmount = 0;
    @endphp
            <tr>
                <th colspan="4" class="text-right text-danger">
                    {{$GodownName}}
                </th>
            </tr>
            @foreach ($GodownNameItems as $item)
                @php
                $CountCustomerName += $item->CustomerName != 0 ? 1 : 0;
                $SumValueAmount += $item->ValueAmount ? (float) $item->ValueAmount : 0;
                $SumExtAmount += $item->ExtAmount ? (float) $item->ExtAmount : 0;
                $gCountCustomerName += $item->CustomerName != 0 ? 1 : 0;
                $gSumValueAmount += $item->ValueAmount ? (float) $item->ValueAmount : 0;
                $gSumExtAmount += $item->ExtAmount ? (float) $item->ExtAmount : 0;
                @endphp
                <tr class="{{ $item->VSNNo === null || $item->VSNNo == 0 ? '' : 'ordered' }}">
                    <td>{{ $item->QDate ? date('d-M-Y', strtotime($item->QDate)) : '' }}</td>
                    <td>{{ $item->QuoteNo }}</td>
                    <td>{{ $item->EventNo }}</td>
                    <td>{{ $item->CustomerName }}</td>
                    <td>{{ $item->VesselName }}</td>
                    <td>{{ $item->CustomerRefNo }}</td>
                    <td>{{ $item->DepartmentName }}</td>
                    <td>{{ $item->ShippingPort }}</td>
                    <td>{{ $item->EstLineQuote }}</td>
                    <td class="text-right">{{ round($item->ValueAmount,2) }}</td>
                    <td>{{ $item->VSNNo === null || $item->VSNNo == 0 ? '' : 'Ordered' }}</td>
                    <td class="text-right">{{ round($item->ExtAmount,2) }}</td>
                    <td>{{ $item->WorkUser }}</td>
                </tr>
            @endforeach
            <tr>
                <th  colspan="3" class="text-right">
                    Total No Of Quote : {{$GodownName}}
                </th>
                <th >
                    {{ $CountCustomerName }}
                </th>

                <th colspan="6" class="text-right">
                    {{ round($SumValueAmount,2) }}
                </th>
                <th></th>

                <th class="text-right">
                    {{ round($SumExtAmount,2) }}
                </th>
            </tr>
            @endforeach

            <tr>
                <th  colspan="3" class="text-right">
                    Grand Total :
                </th>
                <th >
                    {{ $gCountCustomerName }}
                </th>

                <th colspan="6" class="text-right">
                    {{ round($gSumValueAmount,2) }}
                </th>
                <th></th>
                <th class="text-right">
                    {{ round($gSumExtAmount,2) }}
                </th>
            </tr>

        </tbody>







    </div>
    </div>






                   </div>
 @stop

  @section('css')
  <style>
     .ordered {
        background-color: yellow; /* Change the background color as per your requirement */

    }
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
