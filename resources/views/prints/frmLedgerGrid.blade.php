@extends('layouts.app')



@section('title', 'Ledger-Grid')

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
                <h4>Account Ledger</h4>
                    </div>
                    <div class="col-sm-1 ml-auto print-only">
                        <i class="fas fa-print fa-3x text-primary" style="cursor: pointer" onclick="window.print()" aria-hidden="true"></i>
                    </div>
                    <div {{$ChkLedgerReconcile ? '' : 'hidden'}} class="col-sm-1 print-only">
                        <i class="fas fa-check-circle fa-3x text-success " style="cursor: pointer"></i>
                    </div>
                    <div {{$ChkLedgerReconcile ? '' : 'hidden'}}  class="col-sm-1 print-only">
                        <i class="fas fa-window-close fa-3x text-danger  " style="cursor: pointer"></i>
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
                <p class="mt-2">Print Date / Time :</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{date('d-M-Y H:i:s')}}</p>
                </div>
                </div>
             <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">User :</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$MWorkUser}}</p>
                </div>
                </div>
             <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">ActCode</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$TxtActCode}}</p>
                </div>
                </div>
             <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">ActName</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$TxtActName}}</p>
                </div>
                </div>
             <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">Date From :</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$DateFrom}}</p>
                </div>
                </div>
             <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">Date To :</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$Date}}</p>
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
                        <th>Vnon</th>
                        <th>Vnoc</th>
                        <th style="width:900px">Description</th>
                        <th>Pay&nbsp;Type</th>
                        <th>Chk/Tr&nbsp;#</th>
                        <th class="text-right">Debit</th>
                        <th class="text-right">Credit</th>
                        <th class="text-right">Balance</th>
                        <th>Mark</th>

                    </tr>
        </thead>

    <tbody id="ledgergridbody">

                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->Date ? date('d-M-Y', strtotime($item->Date)) : '' }}</td>
                            <td>{{ $item->Vnon ? $item->Vnon : '' }}</td>
                            <td>{{ $item->Vnoc ? $item->Vnoc : '' }}</td>
                            <td>{{ $item->Des ? $item->Des : '' }}</td>
                            <td>{{ $item->TransType ? $item->TransType : '' }}</td>
                            <td>{{ $item->ChqNo ? $item->ChqNo : '' }}</td>
                            <td class="text-right">{{ $item->Debit ? round($item->Debit, 2) : 0 }}</td>
                            <td class="text-right">{{ $item->Credit ? round($item->Credit, 2) : 0 }}</td>
                            <td class="text-right">{{ $item->Balance ? round($item->Balance, 2) : 0 }}</td>
                            <td >{{ $item->Mark ? $item->Mark : '' }}</td>
                        </tr>
                    @endforeach

    </tbody>



    </table>
    <div class="row">
        <div class="col-xl-9 text-right">
          <p class="ms-3">Grand Total ....</p>

        </div>
        <div class="col-xl-3 ml-auto">
            <ul class="list-unstyled inline-list">
              <li class="text-muted ms-3 col-sm-3 ml-auto mr-3 text-right"><span class="text-black me-4" id="LblTotalDebit"></span> </li>
              <li class="text-muted ms-3 col-sm-2 text-right mr-5"><span class="text-black me-4" id="LblTotalCredit"></span> </li>
              <li class="text-muted ms-3 col-sm-2 text-right mr-3"><span class=" me-4" id="LblDiff" ></span> </li>
              <li class="text-muted ms-3 col-sm-2"><span class="text-black me-4" id="Label7"></span> </li>
            </ul>

          </div>
      </div>
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
        tablecomposer();
        function tablecomposer(){
    let table = document.getElementById('ledgergridbody');
    let rows = table.rows;
    let LblTotalDebit = 0;
    let LblTotalCredit = 0;

        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
    Date= cells[0] ? cells[0].innerHTML : '';
    Vnon= cells[1] ? cells[1].innerHTML : '';
    Vnoc= cells[2] ? cells[2].innerHTML : '';
    Description= cells[3] ? cells[3].innerHTML : '';
    Paytype= cells[4] ? cells[4].innerHTML : '';
    ChkTr= cells[5] ? cells[5].innerHTML : '';
    Debit= cells[6] ? cells[6].innerHTML : '';
    Credit= cells[7] ? cells[7].innerHTML : '';
    Balance= cells[8] ? cells[8].innerHTML : '';
    Mark= cells[9] ? cells[9].innerHTML : '';

    LblTotalDebit += Number(Debit);
    LblTotalCredit += Number(Credit);

    }
// console.log('deb'+LblTotalDebit);
// console.log('cred'+LblTotalCredit);
// console.log('bal'+Balance);
// console.log('mark'+Mark);

$('#LblTotalDebit').text(LblTotalDebit.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5}));
$('#LblTotalCredit').text(Math.abs(LblTotalCredit).toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5}));
$('#LblDiff').text(Balance.toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 0, useGrouping: true, maximumSignificantDigits: 5}));
if (Mark == 'Cr') {
    $("#LblDiff").css("color", "red");
}else{
    $("#LblDiff").css("color", "green");
}

$('#Label7').text(Mark);

}
               });
        $(document).ready(function () {
            // window.print();

        })
</script>
@stop


@section('content')
