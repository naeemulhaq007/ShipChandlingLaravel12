@extends('layouts.app')



@section('title', 'QuotationsEntry-Print')

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
            </div>
             <div class="col-sm-1">
                <button name="" id="" onclick="window.print()" style="margin-top: 16rem;" class="btn btn-primary" role="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    <div class="col-sm-6">
         <div class="row py-2 float-right col-sm-8">
         <img class="img-fluid" src="<?php echo url('assets/images/Ship.png');?>" style="max-width:100px" border="0"> <img class="img-fluid" src="<?php echo url('assets/images/impa.png');?>" style="max-width:100px" border="0"> <img class="img-fluid" src="<?php echo url('assets/images/Supply.png');?>" style="max-width:100px" border="0"> </div> <div class="clearfix"></div>
         <div class="col-sm-7 float-right"> <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">Quotation No.</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$quote_no}}</p>
                </div>
                </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Event No.</p>
                        </div>
                        <div class="card shadow border border-dark line col-sm-5">
                            <p class="mt-2">{{$items->EventNo}}</p></div> </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5"><p class="mt-2">Cust. Ref# :</p></div><div class="card shadow border border-dark line mr-1 col-sm-5"><p class="mt-2">{{$items->CustomerRefNo}}</p></div></div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5"><p class="mt-2">Quotation Date.</p></div><div class="card shadow border border-dark line col-sm-5"><p class="mt-2">{{rtrim($items->QDate,':0.0')}}</p></div> </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5"><p class="mt-2">Department.</p></div><div class="card shadow border border-dark line  col-sm-5"><p class="mt-2">{{$items->DepartmentName}}</p></div></div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5"><p class="mt-2">Port.</p> </div><div class="card shadow border border-dark  line col-sm-5"><p class="mt-2">{{$items->POrtName}}</p></div></div></div></div></div>
         <div class="row py-2  ml-1"><div class="custom-col-5  border border-dark  mr-5 rounded ">
            <div class="row mx-1 "><b>Customer :</b></div>
            <div class="row mx-1 ">{{$items->CustomerName}}</div>
            <div class="row mx-1 "> <p>{{$Customercodedata[0]->Address}}</p></div>
        </div><div class="custom-col-5  border border-dark rounded mr-auto "><div class="row mx-1 ">
            <b>Vessel :</b></div><div class="row mx-1 ">{{$eventdata->VesselName}}</div>
        </div></div>



<div class="col-sm-12 mx-auto">
     <div class="rounded shadow mx-auto">
        <div class="
        {{-- table-responsive --}}
         tableFixHead">
            <table class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead class=" ">
            <tr >

                <th class="text-center custom-th">S.#</th>
                {{-- <th class="px5">QuoteNo</th> --}}
                <th  class="text-center custom-th">Qty</th>
                <th class="text-center custom-th">UOM</th>
                {{-- <th class="px5">ItemCode</th> --}}
                <th class="text-center custom-th">IMPA</th>
                <th>ItemName</th>
                <th class="custom-th3">CustomerNote</th>
                {{-- <th class="px5">Vpart</th> --}}
                {{-- <th class="px5">VendorPrice</th> --}}
                <th class="custom-th2">UnitPrice (USD)</th>
                <th class="custom-th2">TotalPrice (USD)</th>
                {{-- <th class="px5">VendorCode</th> --}}
                {{-- <th style="padding-left: 3rem;padding-right: 2.5rem">VendorName</th> --}}
                {{-- <th class="px3">VendorNote</th> --}}
                {{-- <th class="px3">InternalBuyerNote</th> --}}
                {{-- <th class="px5">OriginName</th> --}}
                {{-- <th class="th">Total</th> --}}

            </tr>
        </thead>
        <tbody class=" ">


            <?php
             $counter=0;
            ?>
        @foreach ($quotesdetails as $item)
            <?php
            $counter=$counter+1;
            ?>
            <tr>


                    <td class="text-center" scope="row">{{round($item->SNo,2)}}</td>
                    {{-- <td>{{$item->QuoteNo}}</td> --}}
                    {{-- <td>{{$item->ItemCode}}</td> --}}
                    <td class="text-center">{{round($item->Qty,2)}}</td>
                    <td class="text-center">{{$item->PUOM}}</td>
                    <td>{{$item->IMPAItemCode}}</td>
                    <td>{{$item->ItemName}}</td>
                    <td>{{$item->CustomerNotes}}</td>
                    {{-- <td>{{$item->VPart}}</td> --}}
                    {{-- <td>{{$item->VendorPrice = number_format((float)$item->VendorPrice, 2, '.', '')}}</td> --}}
                    <td class="sellprice text-right" id="sellprice<?php echo $counter;?>" value="{{round($item->SuggestPrice,2)}}">{{round($item->SuggestPrice,2)}}</td>
                    <td class="text-right">{{round($item->Total,2)}}</td>
                    {{-- <td>{{$item->VendorCode}}</td> --}}

                    {{-- <td>{{$item->VendorName}}</td> --}}
                    {{-- <td>{{$item->VendorNotes}}</td> --}}
                    {{-- <td>{{$item->InternalBuyerNotes}}</td> --}}
                    {{-- <td>{{$item->OriginName}}</td> --}}
                    {{-- <td></td> --}}
             </tr>
            @endforeach

        </tbody>
    </table>
    </div>
    </div>
    </div>






<div  class=" border border-dark rounded">
     <div class="row pb-2">
        <div class="col-sm-6">
            <div class="row py-1 ml-2">
                 <b class="convertr" >InWords :</b> <div class="ml-2" id="numcon"></div>
                 </div>
  </div> <div class="col-sm-3"></div>
   <div class="col-sm-3 ">
    <div class="row">
        <div class="col-sm-6 mr-4 line">
      <div class="row py-1 mt-2">
          <b>Total Amount (USD):</b>
        </div>
        <div class="row mt-3">
            <p>GST % (USD):</p>
        </div>
        <div class="row ">
            <p>Discount % (USD):</p>
        </div>
        <div class="row py-1">
            <b>Grand Total (USD):</b>
        </div>

    </div>
    <div class="col-sm-1 mr-1 line">
        <div class="row py-1 mt-2">
          </div>
          <div class="row mt-3">
            <p class="" >0.00</p>
          </div>
          <div class="row ">
            <p class="" id="disrep"></p>
          </div>
          <div class="row py-1">
              {{-- <b>Grand Total (USD):</b> --}}
          </div>

    </div>
    <div class="col-sm-2 ml-4  line">
        <div class="row  mt-2">
                        <u><b><p class="" id="numnum"></p></b></u>

          </div>
          <div class="row mt-1">
            <p class="" >0.00$</p>
          </div>
          <div class="row ">
            <u><p class="" id="disval" ></p></u>
          </div>
          <div class="row py-1">
            <u><b><p class="m" id="displus"></p></b></u>
          </div>

      </div>
      {{-- <div class="row py-1 mt-2"> --}}
          {{-- <b>Total Amount (USD):</b> <u><b><p class="ml-5" id="numnum"></p></b></u>
     </div>
      <div class="row pt-1">
          <p>GST % (USD):</p> <p class="ml-5" >0.00</p><p class="ml-4" >0.00</p>
         </div>
         <div class="row ">
          <p>Discount % (USD):</p> <p class="ml-4" id="disrep"></p><u><p class="ml-4" id="disval" ></p></u>
          </div>
           <div class="row py-1">
             <b>Grand Total (USD):</b> <u><b><p class="ml-5" id="displus">&nbsp;&nbsp;&nbsp; </p></b></u>
         </div> --}}
          </div>
                        </div>
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
        // function prinvar(){
            <?php
            $sum = 0;
             $counter=0;
            ?>
        @foreach ($quotesdetails as $item)
            <?php
            $counter=$counter+1;
           $seeleprice = round($item->Total,2);
           $sum+= $seeleprice;
           ?>
        @endforeach
        // console.log(<?php echo $sum;?>)
        // document.getElementById('salesum').innerHTML = $sum;
        document.getElementById('numnum').innerHTML = <?php echo $sum;?>+'$';
        document.getElementById('numcon').innerHTML = toWords(<?php echo $sum;?>);
        document.getElementById('disrep').innerHTML = {{$inv}};
        document.getElementById('disval').innerHTML = Math.round(<?php echo $sum;?>/100*{{$inv}},2)+'$';
        document.getElementById('displus').innerHTML = <?php echo $sum;?>-Math.round(<?php echo $sum;?>/100*{{$inv}},2)+'$';


        window.print();
        }
        );
</script>
@stop


@section('content')
