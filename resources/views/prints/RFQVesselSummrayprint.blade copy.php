@extends('layouts.app')



@section('title', 'RFQ-VesselSummray-print')

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
                <h4>RFQ-VesselSummray</h4>
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
                                    </div>
                                </div>


<div class="col-sm-12">
     <div class="rounded shadow ">

            <table id="OrderReporttable" class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead>
                    <tr>
                        <th>EventNo#</th>
                        <th style="width: 300px">Vessel&nbsp;Name</th>
                        <th style="width: 500px">Customer&nbsp;Name</th>
                        <th>ETADate</th>
                        <th>NoOfQuote</th>
                        <th>NoOfOrder</th>
                        <th>QuoteAmount</th>
                        <th>OrderAmount</th>
                        <th>Success</th>
                        <th style="width: 200px">Remarks</th>
                        <th>EmailSend</th>

                    </tr>
        </thead>

    <tbody id="OrderReporttablebody">

                    @foreach ($table as $item)
                        <tr>
                            <td >{{ $item->EventNo }}</td>
                            <td >{{ $item->VesselName ? $item->VesselName : '' }}</td>
                            <td >{{ $item->CustomerName ? $item->CustomerName : '' }}</td>
                            <td >{{ $item->ETADate ? date('d-M-Y',strtotime($item->ETADate)) : '' }}</td>
                            <td>{{ $item->NoOfQuote ? $item->NoOfQuote : '' }}</td>
                            <td>{{ $item->NoOfOrder ? $item->NoOfOrder : '' }}</td>
                            <td class="text-right">{{ $item->QuoteAmount ? round($item->QuoteAmount,2) : 0 }}</td>
                            <td class="text-right">{{ $item->OrderAmount ? round($item->OrderAmount,2) : 0 }}</td>
                            <td >{{ $item->Success ? round($item->Success,2) : 0 }}</td>
                            <td >{{ $item->Remarks ? $item->Remarks : "" }}</td>
                            <td >{{ ($item->EmailSend == 'Y') ? 'Yes' : 'No' }}</td>
                        </tr>
                    @endforeach

    </tbody>



    </table>
    <div class="row">
        <div class="col-xl-11 text-right">
          <p class="ms-3 font-weight-bold">Grand Total .... <span id="gtotoal" class="ml-5 font-weight-bold text-blue"></span></p>
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
    let table = document.getElementById('OrderReporttablebody');
    let rows = table.rows;
    let totext = 0;

        for (let i = 0; i < rows.length; i++) {
  let cells = rows[i].cells;
    extamnt= cells[16] ? cells[16].innerHTML : '';

    totext += Number(extamnt);

    }

$('#gtotoal').text(parseFloat(totext).toFixed(2));

}
               });
        $(document).ready(function () {




            // window.print();

        })
</script>
@stop


@section('content')
