@extends('layouts.app')



@section('title', 'PO-Received-Report')

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
                <h4>PO Received Report</h4>
                    </div>
             </div>
     </div>
             <div class="col-sm-1">
                <button name="" id="" onclick="window.print()" style="margin-top: 16rem;" class="btn btn-primary" role="button"><i class="fa fa-print" aria-hidden="true"></i></button>
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
                <p class="mt-2">Date UpTo :</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$Date}}</p>
                </div>
                </div>
             <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">WorkUser :</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$MWorkUser}}</p>
                </div>
                </div>

                                </div>
                                    </div>
                                </div>


<div class="col-sm-12">
     <div class="rounded shadow ">

            <table class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>PO&nbsp;#</th>
                        <th>VSN&nbsp;#</th>
                        <th>Charg#</th>
                        <th>Dept.</th>
                        <th>IMPA</th>
                        <th style="width:600px">Product Name</th>
                        <th>Order&nbsp;Qty</th>
                        <th>Rcvd&nbsp;Qty</th>
                        <th>Rate</th>
                        <th>Amount</th>

                    </tr>
        </thead>

    <tbody>
        @php
        $sumAmount = 0; // Initialize the sum variable
    @endphp
        @foreach ($table->groupBy(['PurchaseOrderNo']) as $PurchaseOrderNo => $items)

            <tr>
                <th class="text-blue">{{ date('d-M-Y',strtotime($items[0]->PORecDate)) }}</th>
                <th class="text-blue">{{ $PurchaseOrderNo }}</th>
                <th class="text-blue">{{ $items[0]->VSNNo }}</th>
                <th class="text-blue">{{ $items[0]->ChargeNo }}</th>
                <th class="text-blue">{{ $items[0]->DepartmentName }}</th>
                <th class="text-blue"></th>
                <th class="text-left"><span class="text-blue ">{{$items[0]->VendorName}}</span></th>
                <th class="text-right"><span class="text-danger text-right">{{$items[0]->VesselName}}</span></th>
            </tr>
            @php
                $Subtotal = 0; // Initialize the subtotal variable for the godown group
                $PurchaseOrderSubtotal = 0; // Initialize the subtotal variable for the godown group
            @endphp
                @php
                    $details = DB::table('PurchaseOrderDetail')
                    ->where('PurchaseOrderNo', $PurchaseOrderNo)
                    ->where('BranchCode', $BranchCode)
            ->whereRaw('RecQty>0')
            ->orderBy('PurchaseOrderNo')
            // ->limit(10)
            ->get();
                @endphp
               @foreach ($details as $item)
               @php
                   $amount = round($item->EstPrice,2);
                   $PurchaseOrderSubtotal += $amount; // Increment the subtotal variable for the category group
                   $sumAmount += $amount; // Increment the sum variable
               @endphp
               <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td>{{ $item->SNO }}</td>
                   <td>{{ $item->IMPAItemCode }}</td>
                   <td>{{ $item->ItemName }}</td>
                   <td>{{ round($item->OrderQty,2) }}</td>
                   <td>{{ round($item->RecQty,2) }}</td>
                   <td class="text-right">{{ round($item->VendorPrice,2) }}</td>
                   <td class="text-right">{{ round($item->EstPrice, 2) }}</td>
               </tr>
           @endforeach
           @php

           $Subtotal += $PurchaseOrderSubtotal; // Accumulate the subtotal for the godown group
       @endphp
        <tr>
            <th class="text-right" colspan="10">Rcvd Total :</th>
            <th class="text-right font-weight-bold">{{ round($Subtotal,2) }}</th>
        </tr>
        @endforeach
        <tr>
            <th class="text-right" colspan="10">Grand Total :</th>
            <th class="text-right font-weight-bold">{{ $sumAmount }}</th>
        </tr>
    </tbody>



    </table>
    </div>
    </div>






                   </div>
 @stop

  @section('css')
  <style>
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
    var th = ['','Thousand','Million', 'Billion','Trillion'];
    var dg = ['Zero','One','Two','Three','Four', 'Five','Six','Seven','Eight','Nine'];
    var tn = ['Ten','Eleven','Twelve','Thirteen', 'Fourteen','Fifteen','Sixteen', 'Seventeen','Eighteen','Nineteen'];
    var tw = ['Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];

    function toWords(s) {
    s = s.toString();
    s = s.replace(/[\, ]/g,'');
    if (s != parseFloat(s)) return 'not a number';
    var x = s.indexOf('.');
    if (x == -1)
      x = s.length;
    if (x > 15)
      return 'too big';
    var n = s.split('');
    var str = '';
    var sk = 0;
    for (var i=0;   i < x;  i++) {
      if ((x-i)%3==2) {
          if (n[i] == '1') {
              str += tn[Number(n[i+1])] + ' ';
              i++;
              sk=1;
          } else if (n[i]!=0) {
              str += tw[n[i]-2] + ' ';
              sk=1;
          }
      } else if (n[i]!=0) { // 0235
          str += dg[n[i]] +' ';
          if ((x-i)%3==0) str += 'hundred ';
          sk=1;
      }
      if ((x-i)%3==1) {
          if (sk)
              str += th[(x-i-1)/3] + ' ';
          sk=0;
      }
    }

    if (x != s.length) {
      var y = s.length;
      str += 'point ';
      for (var i=x+1; i<y; i++)
          str += dg[n[i]] +' ';
    }
    return str.replace(/\s+/g,' ');
    }


      </script>
 <script>
     $(document).ready(function () {
               });
        $(document).ready(function () {
            // window.print();

        })
</script>
@stop


@section('content')
