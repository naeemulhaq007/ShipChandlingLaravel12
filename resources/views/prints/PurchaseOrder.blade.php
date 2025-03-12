@extends('layouts.app')



@section('title', 'Purchaseorder-Print')

@section('content_header')
{{-- {{$data["pagetitle"]}} --}}
@stop

@section('content')
</div>
<div class="">
     <div class="row col-sm-12 ml-1">
    <div class="col-sm-5">
         <img class="img-fluid" src="<?php echo url('images/Branches/'.config('app.BranchPicture')); ?>" style="max-width:100px" border="0">  {{--same karna hai --}}
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
                <div class="col-sm-12 card text-center text-blue">
            <h4>Purchase Order</h4>
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
                <p class="mt-2">PO No.</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$purchaseordermaster->PurchaseOrderNo}}</p>
                </div>
                </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">PO Date.</p>
                        </div>
                        <div class="card shadow border border-dark line col-sm-5">
                            <p class="mt-2">{{date('d-M-Y', strtotime($purchaseordermaster->Date))}}</p></div>
                        </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Required Date.</p></div><div class="card shadow border border-dark line mr-1 col-sm-5">
                                <p class="mt-2">{{date('d-M-Y', strtotime($purchaseordermaster->ReqDate))}}</p></div>
                            </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5">
                                <p class="mt-2">Terms.</p></div>
                                <div class="card shadow border border-dark line col-sm-5">
                                    <p class="mt-2">{{$purchaseordermaster->Terms}}</p></div>
                                 </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5">
                                    <p class="mt-2">Charge No.</p></div>
                                    <div class="card shadow border border-dark line  col-sm-5">
                                        <p class="mt-2">{{$purchaseordermaster->ChargeNo}}</p></div></div>
                                        <div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5">
                                            <p class="mt-2">QuoteNo.</p>
                                         </div><div class="card shadow border border-dark  line col-sm-5"><p class="mt-2">{{$purchaseordermaster->QuoteNo}}</p>
                                        </div></div></div>
                                    </div></div>
         <div class="row py-2  ml-1">
            {{-- <div class="custom-col-5  border border-dark  mr-5 rounded ">
            <div class="row mx-1 "><b>Customer :</b></div>

            </div> --}}
            <div class="card  custom-col-5 mr-5">
                <div class="card-header border border-dark">
                    <h5 class="card-title">Sent To</h5>

                </div>
                <div class="card-body border border-dark">
                    <div class="row mx-1 "><b>{{$VenderSetup->VendorName}}</b></div>
            <div class="row mx-1 "> <p>{{$VenderSetup->Address}}</p></div>
            <div class="row mx-1 "> <p>{{$VenderSetup->PhoneNo}}</p></div>
            <div class="row mx-1 "> <p>{{$VenderSetup->FaxNo}}</p></div>
            <div class="row mx-1 "> <p>{{$VenderSetup->EmailAddress}}</p></div>
                </div>
            </div>
            <div class="card  custom-col-5 mr-auto">
                <div class="card-header border border-dark">
                    <h5 class="card-title">Ship To</h5>

                </div>
                <div class="card-body border border-dark">

                    <div class="row mx-1 "></b>9139, Wallisville road, Houston TX 77029.</b></div>
                    <div class="row mx-1 ">9139, Wallisville road, Houston TX 77029.</div>

                </div>
            </div>
        {{-- <div class="custom-col-5  border border-dark rounded mr-auto ">
            <div class="row mx-1 ">
            <b>Vessel :</b></div><div class="row mx-1 ">{{$items->VesselName}}</div>
        </div> --}}
    </div>
    <div class="col-sm-12">
<div class="row ml-3">
    <div class="card " style="width: 20%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Buyer Name</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$purchaseordermaster->BuyerName}}</p>
        </div>
    </div>
    <div class="card" style="width: 20%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Buyer Email</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$purchaseordermaster->BuyerEmail}}</p>
        </div>
    </div>
    <div class="card" style="width: 20%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Required Date</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{date('d-M-Y', strtotime($purchaseordermaster->ReqDate))}}</p>
        </div>
    </div>
    <div class="card" style="width: 18%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Ship Via</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$purchaseordermaster->ShipVia}}</p>
        </div>
    </div>
    <div class="card" style="width: 18%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Department</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$purchaseordermaster->DepartmentName}}</p>
        </div>
    </div>
</div>
</div>

<div class="col-sm-12">
     <div class="rounded shadow ">
        <div class="
        {{-- table-responsive --}}
         tableFixHead">
            <table class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead class=" ">
                    <tr>
                        <th>SR#</th>
                        <th>IMPA</th>
                        <th>QTy</th>
                        <th>Unit</th>
                        <th>V&nbsp;part#</th>
                        <th style="padding-left: 7rem;padding-right: 7rem;">Description</th>
                        <th>Unit&nbsp;Price</th>
                        <th>Ext&nbsp;Cost</th>
                        <th>Cust&nbsp;Note</th>
                        <th>Vend&nbsp;Note</th>

                    </tr>
        </thead>
        <tbody>
            <?php
             $counter=0;
            ?>
@foreach ($purchaseorderdetails as $item)
<?php
$counter=$counter+1;
?>
    <tr>
        <td>{{$counter}}</td>
        <td>{{$item->IMPA}}</td>
        <td>{{round($item->OrderQty,2)}}</td>
        <td>{{$item->PUOM}}</td>
        <td>{{$item->VendorPartNo}}</td>
        <td>{{$item->ItemName}}</td>
        <td>{{round($item->VendorPrice,2)}}</td>
        <td>{{round($item->OrderQty*$item->VendorPrice,2)}}</td>
        <td>{{$item->CustomerNotes}}</td>
        <td>{{$item->VendorNotes}}</td>
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
                 <b class="" >Vessel :</b> <div class="ml-2" id="numcon">{{$purchaseordermaster->VesselName}}</div>
                 </div>
  </div> <div class="col-sm-3"></div>
   <div class="col-sm-3 ">
    <div class="row">
        <div class="col-sm-6 mr-4 line">
      <div class="row py-1 mt-2">
          <b>Total Amount (USD):</b>
        </div>
        {{-- <div class="row mt-3">
            <p>GST % (USD):</p>
        </div>
        <div class="row ">
            <p>Discount % (USD):</p>
        </div>
        <div class="row py-1">
            <b>Grand Total (USD):</b>
        </div> --}}

    </div>
    <div class="col-sm-1 mr-1 line">
        {{-- <div class="row py-1 mt-2">
          </div> --}}
          {{-- <div class="row mt-3">
            <p class="" >0.00</p>
          </div> --}}
          {{-- <div class="row ">
            <p class="" id="disrep"></p>
          </div>
          <div class="row py-1">
              <b>Grand Total (USD):</b>
          </div> --}}

    </div>
    <div class="col-sm-2 ml-4  line">
        <div class="row  mt-2">
          <u><b><p class="" id="numnum"></p></b></u>

          </div>
          {{-- <div class="row mt-1">
            <p class="" >0.00$</p>
          </div>
          <div class="row ">
            <u><p class="" id="disval" ></p></u>
          </div>
          <div class="row py-1">
            <u><b><p class="m" id="displus"></p></b></u>
          </div> --}}

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
  {{-- <script>
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


  </script> --}}
<script>
     $(document).ready(function () {
        sumofammount=0;
        @foreach ($purchaseorderdetails as $item)
        sumofammount+= {{$item->OrderQty*$item->VendorPrice}};
        @endforeach
        console.log(sumofammount);
        // console.log
        (document.getElementById('numnum').innerHTML) = (sumofammount.toFixed(2));
        //1511.0658
        window.print();
        }
        );
</script>
@stop


@section('content')
