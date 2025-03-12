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
                <h4>Purchase Return Report</h4>
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
                        <th>S&nbsp;#</th>
                        <th>PO&nbsp;#</th>
                        <th>Date</th>
                        <th>VSN&nbsp;#</th>
                        <th>Order&nbsp;#</th>
                        <th>Vessel&nbsp;Name</th>
                        <th>Dept.</th>
                        <th>Terms</th>
                        <th>Order&nbsp;Qty</th>
                        <th>Return&nbsp;Qty</th>
                        <th class="text-right">Gross&nbsp;Amt</th>
                        <th class="text-right">Net&nbsp;Amt</th>

                    </tr>
        </thead>

        <tbody id="OrderReporttablebody">
            @php
            $SumRecQty = 0;
            $SumPORecAmt = 0;
            $SumNetAmount = 0;
            $SumOrderQty = 0;
            @endphp
    @foreach ($Table->groupBy('VendorName') as $VendorName => $VendorNameItems)
            <tr>
                <th colspan="4" class="text-right text-danger">
                    {{$VendorName}}
                </th>
            </tr>
            @foreach ($VendorNameItems as $item)
                @php
                $SumRecQty += $item->RecQty ? (float) $item->RecQty : 0;
                $SumPORecAmt += $item->PORecAmt ? (float) $item->PORecAmt : 0;
                $SumNetAmount += $item->NetAmount ? (float) $item->NetAmount : 0;
                $SumOrderQty += $item->OrderQty ? (float) $item->OrderQty : 0;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->PurchaseOrderNo }}</td>
                    <td>{{ $item->PORecDate ? date('d-M-Y', strtotime($item->PORecDate)) : '' }}</td>
                    <td>{{ $item->VSNNo }}</td>
                    <td>{{ $item->ChargeNo }}</td>
                    <td>{{ $item->VesselName }}</td>
                    <td>{{ $item->DepartmentName }}</td>
                    <td>{{ $item->Terms }}</td>
                    <td>{{ round($item->OrderQty,2) }}</td>
                    <td>{{ round($item->TotalReturnQty,2) }}</td>
                    <td class="text-right">{{ round($item->PORecAmt,2) }}</td>
                    <td class="text-right">{{ round($item->NetAmount,2) }}</td>
                </tr>
            @endforeach

            @endforeach

            <tr>
                <th colspan="9" >
                </th>
                <th >
                    {{ $SumRecQty }}
                </th>

                <th class="text-right">
                    {{ round($SumPORecAmt,2) }}
                </th>
                <th class="text-right">
                    {{ round($SumNetAmount,2) }}
                </th>
            </tr>
            <tr>
                <th colspan="9" class="text-right">
                    {{ $SumOrderQty }}
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
