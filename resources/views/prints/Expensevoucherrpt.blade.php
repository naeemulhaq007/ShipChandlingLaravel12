@extends('layouts.app')



@section('title', 'Expense-Voucher')

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
                <h4>Expense Payment Voucher</h4>
                    </div>
             </div>
     </div>
             <div class="col-sm-1">
                <button name="" id="" onclick="window.print()" style="margin-top: 16rem;" class="btn btn-primary" role="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    <div class="col-sm-6">
         <div class="row py-2 float-right col-sm-8">
         <img class="img-fluid" src="<?php echo url('assets/images/Ship.png');?>" style="max-width:100px" border="0"> <img class="img-fluid" src="<?php echo url('assets/images/impa.png');?>" style="max-width:100px" border="0"> <img class="img-fluid" src="<?php echo url('assets/images/Supply.png');?>" style="max-width:100px" border="0"> </div> <div class="clearfix"></div>
         <div class="col-sm-9 float-right"> <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">Voucher No.</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$Voucherno}}</p>
                </div>
                </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Voucher Date.</p>
                        </div>
                        <div class="card shadow border border-dark line col-sm-5">
                            <p class="mt-2">{{date('d-M-Y', strtotime($ExpensePaymentVoucher->VoucherDate))}}</p>
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
                    <h5 class="card-title">Cash / Bank</h5>

                </div>
                <div class="card-body border border-dark">
                    <div class="row mx-1 "><b>{{$ExpensePaymentVoucher->CashName}}</b></div>

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
     <div class="rounded shadow ">
        <div class="
        {{-- table-responsive --}}
         tableFixHead">
            <table class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead class=" ">
                    <tr>
                        <th style="padding-left: 7rem;padding-right: 7rem;">A/c Title</th>
                        <th>Cheque No</th>
                        <th>Chq Date</th>
                        <th class="text-right">Amount</th>
                        <th style="padding-left: 7rem;padding-right: 7rem;">Description</th>

                    </tr>
        </thead>
        <tbody>

@foreach ($ExpensePaymentVoucherfull as $item)

    <tr>
        <td>{{$item->AcName3}}</td>
        <td>{{$item->ChequeNo}}</td>
        <td>{{$item->ChequeDate}}</td>
        <td class="text-right">{{round($item->Amount,2)}} USD</td>
        <td>{{$item->Des}}</td>
    </tr>
@endforeach

                        </tbody>
    </table>
    </div>
    <div class="row  col-sm-12">
        <div class="col-sm-2"></div>
        <p class="ml-auto col-sm-2 text-right">Grand Total</p>
        <p class="mr-auto col-sm-2 ">{{$ExpensePaymentVoucher->TotAmount}} USD</p>
    </div>
    </div>
    <div class="row mt-2">
        <div class="card col-sm-12">
            <div class="row ml-3">
                <p class="text-blue">Inwords :</p>
                <p id="numtr"></p>
            </div>
            <div class="row ml-3">
                <p class="text-blue">User :</p>
                <p >{{$ExpensePaymentVoucher->WorkUser}}</p>
            </div>
        </div>
 </div>
    </div>

    <div class="card col-sm-12">
        <div class="row" style="margin-left: 10rem!important;">
          <div class="col-sm-3 text-center">
            <div class="signature-line">
              <hr class="border-dark w-75">
              <p>Receiver Signature</p>
            </div>
          </div>
          <div class="col-sm-3 text-center">
            <div class="signature-line">
              <hr class="border-dark w-75">
              <p>Accountant</p>
            </div>
          </div>
          <div class="col-sm-3 text-center">
            <div class="signature-line">
              <hr class="border-dark w-75">
              <p>Authorised Signature</p>
            </div>
          </div>
        </div>
      </div>




                   </div>
 @stop

  @section('css')
  <style>
    .signature-line {
  display: flex;
  flex-direction: column;
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
          line-height:1;
      }
      .custom-col-5{
          flex: 0 0 47%;
          max-width:49%;
      }
      /* .custom-hight{
          height: 30px;
      } */
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
$('#numtr').text(toWords('{{$ExpensePaymentVoucher->TotAmount}}'));
});
</script>
@stop


@section('content')
