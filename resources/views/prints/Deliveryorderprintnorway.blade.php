@extends('layouts.app')



@section('title', 'Seven-Seas-Norway-Delivery-Order-Print')

@section('content_header')
{{-- {{$data["pagetitle"]}} --}}
@stop

@section('content')
</div>
<div class="">
     <div class="row col-sm-12 ml-1">
    <div class="col-sm-5">
         {{-- <img class="img-fluid" src="<?php //echo url('assets/images/sevenseas.png/'.config('app.BranchPicture'));?>" style="max-width:335px" border="0"> --}}
         <div class="row pb-2">
            <div class="col-sm-12">
            <h2><strong> Seven Seas Norway AS </strong>
            </h2>
        </div>
    </div>
    <div class="row">
         <div class="col-sm-12">
            <h6>Lilleakerveien 31 A,<br>0283 Oslo<br>Norway</h6>
         </div>
        </div>


             <div class="row mt-5 pt-4">
                    <div class="col-sm-12 mt-4 card text-center text-blue">
                <h4>Delivery Order</h4>
                    </div>
             </div>
     </div>
             <div class="col-sm-1">
                <button name="" id="" onclick="window.print()" style="margin-top: 16rem;" class="btn btn-primary" role="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    <div class="col-sm-6">
         <div class="row py-1 float-right col-sm-8">
            <h6>Org no :		875889222-Foretaksregisteret <br>Email id	 :		stromme@stromme.com <br>Web site: 		www.sevenseasgroup.com <br>Phone :			+4767526060 <br>VAT Number :	NO875889222MVA</h6></div><div class="clearfix"></div>
         <div class="col-sm-9 float-right"> <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">D.O. No.</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$OrderMaster->PONo}}</p>
                </div>
                </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">D.O. Date.</p>
                        </div>
                        <div class="card shadow border border-dark line col-sm-5">
                            <p class="mt-2">{{date('d-M-Y', strtotime($OrderMaster->DispatchDate))}}</p></div>
                        </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Quotation No.</p></div><div class="card shadow border border-dark line mr-1 col-sm-5">
                                <p class="mt-2">{{$OrderMaster->QuoteNo}}</p></div>
                            </div><div class="row custom-hight"><div class="card shadow border border-dark line mr-1 col-sm-5">
                                <p class="mt-2">Event No.</p></div>
                                <div class="card shadow border border-dark line col-sm-5">
                                    <p class="mt-2">{{$OrderMaster->EventNo}}</p></div>
                                 </div>
                                 <div class="row custom-hight">
                                    <div class="card shadow border border-dark line mr-1 col-sm-5">
                                    <p class="mt-2">Order Date.</p>
                                 </div>
                                 <div class="card shadow border border-dark  line col-sm-5">
                                    <p class="mt-2">{{date('d-M-Y', strtotime($OrderMaster->OrderDate))}}</p>
                                </div>
                            </div>
                                 <div class="row custom-hight">
                                    <div class="card shadow border border-dark line mr-1 col-sm-5">
                                    <p class="mt-2">Delivery Date/Time.</p>
                                </div>
                                    <div class="card shadow border border-dark line  col-sm-5">
                                        <p class="mt-2">{{date('d-M-Y', strtotime($OrderMaster->DispatchDate))}}, {{date('h:i:sa', strtotime($OrderMaster->DispatchTime))}}</p>
                                    </div>
                                </div>

                                        <div class="row custom-hight">
                                            <div class="card shadow border border-dark line mr-1 col-sm-5">
                                            <p class="mt-2">Location.</p>
                                         </div>
                                         <div class="card shadow border border-dark  line col-sm-5">
                                            <p class="mt-2">{{$OrderMaster->Location}}</p>
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
                    <div class="row mx-1 "><b>{{$CustomerSetup->CustomerName}}</b></div>
                    <div class="row mx-1 "><b>{{$OrderMaster->BillingAddress}}</b></div>
                    <div class="row mx-1 "><b>Vessel : {{$Fliptovsn->VesselName}}</b></div>

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
            <h5 class="card-title">Department</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$OrderMaster->Department}}</p>
        </div>
    </div>
    <div class="card" style="width: 20%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Cust. Ref #</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$OrderMaster->CustomerRefNo}}</p>
        </div>
    </div>
    <div class="card" style="width: 20%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Cust. PO. #</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{($OrderMaster->PurchaseOrderNo)}}</p>
        </div>
    </div>
    <div class="card" style="width: 18%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Port</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$Fliptovsn->Port}}</p>
        </div>
    </div>
    <div class="card" style="width: 18%;">
        <div class="card-header border border-dark">
            <h5 class="card-title">Agent</h5>

        </div>
        <div class="card-body border border-dark">
            <p class="">{{$Fliptovsn->Agent}}</p>
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
                        <th>ITEM #</th>
                        <th>QUANTITY</th>
                        {{-- <th>Orderd</th> --}}
                        <th>UOM</th>
                        {{-- <th>V&nbsp;part#</th> --}}
                        <th style="padding-left: 7rem;padding-right: 7rem;">Item&nbsp;Description</th>
                        <th>COMMENTS</th>
                        {{-- <th>Cost</th> --}}
                        {{-- <th>Sell</th> --}}
                        {{-- <th>GP&nbsp;%</th> --}}

                    </tr>
        </thead>
        <tbody>
            <?php
             $counter=0;
            ?>
@foreach ($OrderDetails as $item)
<?php
$counter=$counter+1;
?>
    <tr>
        <td>{{$counter}}</td>
        {{-- <td>{{$item->IMPA}}</td> --}}
        <td>{{round($item->DeliveredQty,2)}}</td>
        <td>{{$item->PUOM}}</td>
        {{-- <td>{{$item->VendorPartNo}}</td> --}}
        <td>{{$item->ItemName}}</td>
        {{-- <td>{{$item->POMadeNo}}</td> --}}
        {{-- <td>{{round($item->VendorPrice,2)}}</td> --}}
        <td>{{$item->CustomerNotes}}</td>
        {{-- <td><?php //$value = is_null($item->GPAmount) ? 1 : $item->GPAmount; echo round($value/$item->Price*100,2); ?></td> --}}
    </tr>
@endforeach

                        </tbody>
    </table>
    </div>
    </div>
    </div>

    <div class="col-sm-12">
        <div class="col-sm-4 border border-dark mx-auto">
            <div class="row py-1 border">
                <p><b>Name :</b> </p>
            </div>
            <div class="row py-1 border">
                <p><b>Sign :</b> </p>
            </div>
            <div class="row py-1 border">
                <p><b>Title :</b> </p>
            </div>
            <div class="row py-1 border">
                <p><b>Date :</b> </p>
            </div>
            <div class="row py-1 border">
                <p><b>Stamp :</b> </p>
            </div>
        </div>
        <div class="row py-2">
            <p><b>Description :</b>{{$OrderMaster->DeliveryDes}}</p>
        </div>
        <div class="">
            <p class="lh-1">All Deliveries Made As Per The List.
                <br>Please Report Any Missing Or Wrong Item With In 3 Days Of Delivery.
                <br>After 3 Days Of Delivery All Deliveries Will Be Final And Billed As Per Delivery Ticket.
                <br>No Complaint Will Be Entertain After 3 Days Of Delivery No Exceptional. Thanks
            </p>

        </div>
        {{-- <div class="row ">

        </div>
        <div class="row ">

        </div>
        <div class="row">

        </div> --}}
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
        sumofammount=0;
        @foreach ($OrderDetails as $item)
        sumofammount+= {{$item->Price*$item->OrderQty}};
        @endforeach
        console.log(sumofammount);
        // console.log
        (document.getElementById('numnum').innerHTML) = (sumofammount.toFixed(2));
        //1511.0658
        document.getElementById('numtr').innerHTML = toWords(sumofammount);
        // document.getElementById('disrep').innerHTML = {{$inv}};
        let invdis = sumofammount/100*{{$inv}};
        // console.log(document.getElementById('disval').innerHTML);
        document.getElementById('disval').innerHTML = (invdis.toFixed(2)) +'$';
        // document.getElementById('disval').innerHTML = Math.round(sumofammount/100*{{$inv}},2)+'$';
        console.log(invdis);
        document.getElementById('displus').innerHTML = (sumofammount-invdis.toFixed(2))+'$';

        }
        );
        $(document).ready(function () {
            window.print();

        })
</script>
@stop


@section('content')
