@extends('layouts.app')



@section('title', 'DMMissing-Report')

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
                <h4>DM Missing Report</h4>
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
                <p class="mt-2">Date From :</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$Datefrom}}</p>
                </div>
                </div>
             <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">Date To :</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$DateTo}}</p>
                </div>
                </div>
             <div class="row custom-hight">
             <div class="card shadow border border-dark line mr-1 col-sm-5">
                <p class="mt-2">Branch :</p>
             </div>
                 <div class="card shadow border border-dark line mr-1 col-sm-5">
                    <p class="mt-2">{{$BranchCode}}</p>
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

            <table id="OrderReporttable" class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead>
                    <tr>
                        <th>RTN&nbsp;Date</th>
                        <th>Event&nbsp;#</th>
                        <th>Qoute&nbsp;#</th>
                        <th>Qoute&nbsp;#</th>
                        <th>Charge&nbsp;#</th>
                        <th>Departnment</th>
                        <th>PO&nbsp;#</th>
                        <th>Customer&nbsp;Name</th>
                        <th>Vendor&nbsp;Name</th>
                        <th>Work&nbsp;User</th>
                        <th>Missing&nbsp;QTY</th>
                        <th>Missing&nbsp;Amt</th>

                    </tr>
        </thead>

    <tbody id="OrderReporttablebody">

                    @php
                        $smDMMissingQty = 0;
                        $smDMMissingAmt = 0;
                    @endphp
                    @foreach ($orders as $item)
                        <tr>
                            <td style="width: 150px">{{ $item->RTNDate ? date('d-M-Y',strtotime($item->RTNDate)) : '' }}</td>
                            <td style="width: 50px">{{ $item->EventNo }}</td>
                            <td >{{ $item->QuoteNo ? $item->QuoteNo : '' }}</td>
                            <td >{{ $item->VSNNO ? $item->VSNNO : '' }}</td>
                            <td >{{ $item->ChargeNo ? $item->ChargeNo : '' }}</td>
                            <td >{{ $item->DepartmentName ? $item->DepartmentName : '' }}</td>
                            <td >{{ $item->POMadeNo ? $item->POMadeNo : 0 }}</td>
                            <td style="width: 300px">{{ $item->CustomerName ? $item->CustomerName : 0 }}</td>
                            <td style="width: 200px">{{ $item->VendorName ? $item->VendorName : 0 }}</td>
                            <td >{{ $item->WorkUser ? $item->WorkUser : 0 }}</td>
                            <td >{{ $item->DMMissingQty ? round($item->DMMissingQty,2) : 0 }}</td>
                            <td class="text-right" >{{ $item->DMMissingAmt ? round($item->DMMissingAmt,2) : 0 }}</td>
                        </tr>
                        @php
                        $smDMMissingQty += (float) $item->DMMissingQty ? round($item->DMMissingQty,2) : 0;
                        $smDMMissingAmt += (float) $item->DMMissingAmt ? round($item->DMMissingAmt,2) : 0;
                        @endphp
                    @endforeach

                    <tr class="double-border">
                        <th class="text-right text-blue" colspan="10">
                            Total Amount :
                        </th>

                        <th >
                            {{$smDMMissingQty}}
                        </th>
                        <th class="text-right ">
                            {{$smDMMissingAmt}}
                        </th>
                    </tr>
    </tbody>



    </table>
    {{-- <div class="row">
        <div class="col-xl-11 text-right">
          <p class="ms-3 font-weight-bold">Grand Total .... <span id="gtotoal" class="ml-5 font-weight-bold text-blue"></span></p>
        </div>


      </div> --}}
    </div>
    </div>






                   </div>
 @stop

  @section('css')
  <style>
    .double-border th {
    border-top: 3px double #000; /* Adjust thickness and color as needed */
    border-bottom: 3px double #000; /* Adjust thickness and color as needed */
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
