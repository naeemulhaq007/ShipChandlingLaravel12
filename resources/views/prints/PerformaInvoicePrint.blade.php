@extends('layouts.app')



@section('title', 'Final-Invoice-Print')

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
                    <div class="col-sm-12 card text-center text-blue">
                <h4>Invoice</h4>
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
                <p class="mt-2">Proforma No.</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$OrderDetailf->PONO}}</p>
                </div>
                </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Delivery Date.</p>
                        </div>
                        <div class="card shadow border border-dark line col-sm-5">
                            <p class="mt-2">{{$FlipToVSN->DeliveryDate}}</p></div>
                        </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Quotation No.</p></div><div class="card shadow border border-dark line mr-1 col-sm-5">
                                <p class="mt-2">{{$OrderDetailf->QuoteNo}}</p></div>
                            </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5">
                                <p class="mt-2">Event No.</p></div>
                                <div class="card shadow border border-dark line col-sm-5">
                                    <p class="mt-2">{{$OrderDetailf->EventNo}}</p></div>
                                 </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5">
                                    <p class="mt-2">Delivery Date/Time.</p></div>
                                    <div class="card shadow border border-dark line  col-sm-5">
                                        <p class="mt-2">{{date('d-M-Y', strtotime($FlipToVSN->DeliveryDate))}}, {{date('h:i:sa', strtotime($FlipToVSN->Time))}}</p></div></div>
                                        <div class="row custom-hight">
                                            <div class="card shadow border border-dark line mr-1 col-sm-5">
                                            <p class="mt-2">Location.</p>
                                         </div>
                                         <div class="card shadow border border-dark  line col-sm-5">
                                            <p class="mt-2">{{$FlipToVSN->Location}}</p>
                                        </div>
                                    </div>
                                        <div class="row custom-hight">
                                            <div class="card shadow border border-dark line mr-1 col-sm-5">
                                            <p class="mt-2">Terms.</p>
                                         </div>
                                         <div class="card shadow border border-dark  line col-sm-5">
                                            <p class="mt-2">{{$OrderMaster->Terms}}</p>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>
         <div class="row py-2  ml-1">
            {{-- <div class="custom-col-5  border border-dark  mr-5 rounded ">
            <div class="row mx-1 "><b>Customer :</b></div>

            </div> --}}
            <div class="card  custom-col-5 mr-5">
                <div class="card-header border border-dark">
                    <h5 class="card-title">{{$OrderMaster->BContactPerson}}</h5>

                </div>
                <div class="card-body border border-dark">
                    <div class="row mx-1 "><b>{{$OrderMaster->BillingAddress}}</b></div>
                    {{-- <div class="row mx-1 "><b>Tel : </b><p>{{$Eventinvoice->Phone}}</p>, <b>Fax : </b><p>{{$Eventinvoice->Fax}}</p></div> --}}
                    {{-- <div class="row mx-1 "><b>C.Person :</b><p>{{$Eventinvoice->Name}}</p></div> --}}

                </div>
            </div>
            {{-- <div class="card  custom-col-5 mr-auto">
                <div class="card-header border border-dark">
                    <h5 class="card-title">Ship To</h5>

                </div>
                <div class="card-body border border-dark">

                    <div class="row mx-1 "></b>9139, Wallisville road, Houston TX 77029.</b></div>
                    <div class="row mx-1 ">9139, Wallisville road, Houston TX 77029.</div>

                </div>
            </div> --}}
        {{-- <div class="custom-col-5  border border-dark rounded mr-auto ">
            <div class="row mx-1 ">
            <b>Vessel :</b></div><div class="row mx-1 ">{{$items->VesselName}}</div>
        </div> --}}
    </div>
    <div class="col-sm-12">
<div class="row ml-3">
    <div class="card " style="width: 20%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Vessel</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$OrderMaster->VesselName}}</p>
        </div>
    </div>
    <div class="card" style="width: 20%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Department</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$OrderMaster->Department}}</p>
        </div>
    </div>
    <div class="card" style="width: 20%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Cust. Ref#</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{($OrderMaster->CustomerRefNo)}}</p>
        </div>
    </div>
    <div class="card" style="width: 18%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Cust. PO.#</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$OrderMaster->PurchaseOrderNo}}</p>
        </div>
    </div>
    <div class="card" style="width: 18%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Port</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$FlipToVSN->Port}}</p>
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
                        <th>SNO.</th>
                        <th>IMPA</th>
                        <th>QUANTITY</th>
                        <th>UOM</th>
                        <th style="width:500px">Item&nbsp;Description</th>
                        <th>COMMENTS</th>
                        <th>UNIT&nbsp;PRICE</th>
                        <th>AMOUNT&nbsp;(USD)</th>

                    </tr>
        </thead>
        <tbody id="perforamatablebody">
            @foreach ($OrderDetails as $item)
            <tr>
                <td>{{$item->SNo}}</td>
                <td>{{$item->IMPAItemCode}}</td>
                <td>
                    @if (($item->PUOM == 'LB' || $item->PUOM == 'LBS') && $ChkKG == 'Y')
                        @if ($item->OrderQty != 0)
                            {{ $item->OrderQty / 2.2 }}
                        @else
                            {{ $item->OrderQty }}
                        @endif
                    @else
                        {{ $item->OrderQty }}
                    @endif


                </td>

                <td>
                    @if (($item->PUOM == 'LB' || $item->PUOM == 'LBS') && $ChkKG == 'Y')
                    KGS
                    @else
                    {{ $item->PUOM }}
                    @endif
                </td>
                <td class="text-uppercase">{{$item->ItemName}}</td>
                <td>{{$item->CustomerNotes}}</td>
                <td>
                    @if (($item->PUOM == 'LB' || $item->PUOM == 'LBS') && $ChkKG == 'Y')
                    {{ round(($item->Price * 2.2), 2) }}
                    @else
                    {{ round($item->Price, 2) }}
                    @endif
                </td>
                <td>{{ round($item->Price, 2) * round($item->OrderQty, 2) }}</td>
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
                    <b class="" >Description :</b> <div class="ml-2" id="numcon">{{$OrderMaster->DeliveryDes}}</div>
                    </div>
               <div class="row py-1 ml-2">
                    <b class="" >In Words :</b> <div class="ml-2" id="numtr"></div>
                    </div>
                    <div class="card  ml-2">
                        <div class="row py-1 ml-2"><b>Bank Name: Chase BankBank </b></div>
                        <div class="row py-1 ml-2"><b>address: 1200 Clear Lake City Blvd. Houston TX 77062</b></div>
                        <div class="row py-1 ml-2"><b>AC #  527692799</b></div>
                        <div class="row py-1 ml-2"><b>ABA Routing # 021000021</b></div>
                        <div class="row py-1 ml-2"><b>Swift Code # CHASUS33</b></div>
                        <div class="row py-1 ml-2"><b>Beneficiary Name: Global Ship Services</b></div>
                       </div>
     </div>
     <div class="col-sm-6 ">
        <div class="mt-4">
            <div class="row mb-2">
                <div class="col-sm-9 text-right">
                    <strong>Gross Amount:</strong>
                </div>
                <div class="col-sm-3 ">
                    <p id="numnum" class="text-right m-0"></p>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-9 text-right">
                    <p class="m-0">Inv Disc:</p>
                </div>
                <div class="col-sm-1 text-right">
                    <p id="disrep" class=" m-0"></p>
                </div>
                <div class="col-sm-2 ">
                    <p id="disval" class="text-right m-0"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 text-right">
                    <strong>Net Amount:</strong>
                </div>
                <div class="col-sm-3 ">
                    <p id="displus" class="text-right m-0"></p>
                </div>
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

        var table = document.getElementById('perforamatablebody');
    let rows = table.rows;
    var SumAmnt = 0;
for (let i = 0; i < rows.length; i++) {
    let cells = rows[i].cells;

   var SNO =  cells[0] ? cells[0].innerHTML : '';
   var IMPA= cells[1] ? cells[1].innerHTML : '';
   var QUANTITY= cells[2] ? cells[2].innerHTML : '';
   var UOM= cells[3] ? cells[3].innerHTML : '';
   var ITEMDESCRIPTION= cells[4] ? cells[4].innerHTML : '';
   var COMMENTS= cells[5] ? cells[5].innerHTML : '';
   var UNITPRICE= cells[6] ? cells[6].innerHTML : '';
   var AMOUNT= cells[7] ? cells[7].innerHTML : '';

   SumAmnt += parseFloat(AMOUNT);

}
$('#numnum').text(SumAmnt.toFixed(2));
$('#numtr').text(toWords(SumAmnt));
var inv = {{$OrderMaster->InvDiscPer}}
$('#disrep').text(inv+'%');
let invdis = SumAmnt*inv/100;

$('#disval').text(invdis);
$('#displus').text(parseFloat(SumAmnt-invdis).toFixed(2));



        // window.print();
        });
</script>
@stop


@section('content')
