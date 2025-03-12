@extends('layouts.app')



@section('title', 'Trial-Balance-Print')

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
                <h4>Trial Balance</h4>
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
     <div class="rounded shadow table-responsive">

            <table class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead>
                    <tr>
                        <th >Act&nbsp;Code</th>
                        <th colspan="10">Act&nbsp;Name</th>
                        <th class="text-right">Debit</th>
                        <th class="text-right">Credit</th>
                    </tr>
        </thead>

    <tbody>
        @php
        $sumAmountde = 0; // Initialize the sum variable
        $sumAmountcr = 0; // Initialize the sum variable
    @endphp
        @foreach ($table->groupBy(['AcName1']) as $AcName1 => $AcName1Items)
            <tr>
                <td class=""></td>
                    <th class=" text-blue "colspan="10" >{{ $AcName1 }}</th>
                    <td class=""></td>
                    <td class=""></td>
            </tr>
            @php
                $AcName1totalde = 0; // Initialize the subtotal variable for the godown group
                $AcName1totalcr = 0; // Initialize the subtotal variable for the godown group
            @endphp
            @foreach ($AcName1Items->groupBy(['AcName2']) as $AcName2 => $AcName2Items)
                <tr>
                    <td class=""></td>
                    <th class=" text-info "colspan="10" >{{ $AcName2 }}</th>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                @php
                    $AcName2Subtotalde = 0; // Initialize the subtotal variable for the department group
                    $AcName2Subtotalcr = 0; // Initialize the subtotal variable for the department group
                @endphp
                @foreach ($AcName2Items->groupBy(['TitleLevel3']) as $TitleLevel3 => $TitleLevel3items)
                <tr>
                    <td class=""></td>
                    <th class=" text-danger "colspan="10" >{{ $TitleLevel3 }}</th>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                @php
                    $TitleLevel3Subtotalde = 0; // Initialize the subtotal variable for the category group
                    $TitleLevel3Subtotalcr = 0; // Initialize the subtotal variable for the category group
                @endphp
                @foreach ($TitleLevel3items->groupBy(['TitleLevel4']) as $TitleLevel4 => $items)
                <tr>
                    <td class=""></td>
                    <th class=" text-success "colspan="10" >{{ $TitleLevel4 }}</th>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                @php
                    $TitleLevel4Subtotalde = 0; // Initialize the subtotal variable for the category group
                    $TitleLevel4Subtotalcr = 0; // Initialize the subtotal variable for the category group
                @endphp
                    @foreach ($items as $item)
                        @php

                            $amountde = round($item->Debit, 2);
                            $amountcr = round($item->Credit, 2);
                            $TitleLevel4Subtotalde += $amountde; // Increment the subtotal variable for the category group
                            $TitleLevel4Subtotalcr += $amountcr; // Increment the subtotal variable for the category group
                            $sumAmountde += $amountde; // Increment the sum variable
                            $sumAmountcr += $amountcr; // Increment the sum variable
                        @endphp
                        <tr>
                            <td>{{ $item->ActCode }}</td>
                            <td colspan="10">{{ $item->AcName3 }}</td>
                            <td class="text-right">{{ round($item->Debit,2) }}</td>
                            <td class="text-right">{{ round($item->Credit,2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class=""></td>
                            <th class="text-right text-success" colspan="10">{{ $TitleLevel4 ? 'SubTotal :' : '' }}</th>
                            <td class="text-right text-success font-weight-bold">{{ $TitleLevel4 ? $TitleLevel4Subtotalde : '' }}</td>
                            <td class="text-right text-success font-weight-bold">{{ $TitleLevel4 ? $TitleLevel4Subtotalcr : '' }}</td>
                        </tr>
                        @php
                            $TitleLevel3Subtotalde += $TitleLevel4Subtotalde; // Accumulate the subtotal for the department group
                            $TitleLevel3Subtotalcr += $TitleLevel4Subtotalcr; // Accumulate the subtotal for the department group
                        @endphp
                        @endforeach
                        <tr>
                            <td class=""></td>
                            <th class="text-right text-danger" colspan="10">{{ $TitleLevel3 ? 'SubTotal :' : '' }}</th>
                            <td class="text-right text-danger font-weight-bold">{{ $TitleLevel3 ? $TitleLevel3Subtotalde : '' }}</td>
                            <td class="text-right text-danger font-weight-bold">{{ $TitleLevel3 ? $TitleLevel3Subtotalcr : '' }}</td>
                        </tr>
                        @php
                            $AcName2Subtotalde += $TitleLevel3Subtotalde; // Accumulate the subtotal for the department group
                            $AcName2Subtotalcr += $TitleLevel3Subtotalcr; // Accumulate the subtotal for the department group
                        @endphp
                @endforeach
                <tr>
                    <td class=""></td>
                    <th class="text-right text-info" colspan="10">{{ $AcName2 ? 'SubTotal :' : '' }}</th>
                    <td class="text-right text-info font-weight-bold">{{ $AcName2 ? $AcName2Subtotalde : '' }}</td>
                    <td class="text-right text-info font-weight-bold">{{ $AcName2 ? $AcName2Subtotalcr : '' }}</td>
                </tr>
                @php
                    $AcName1totalde += $AcName2Subtotalde; // Accumulate the subtotal for the godown group
                    $AcName1totalcr += $AcName2Subtotalcr; // Accumulate the subtotal for the godown group
                @endphp
            @endforeach
            <tr>
                <td class=""></td>
                    <th class="text-right text-blue" colspan="10">{{ $AcName1 ? 'SubTotal :' : '' }}</th>
                <td class="text-right text-blue font-weight-bold">{{ $AcName1 ? $AcName1totalde : ''}}</td>
                <td class="text-right text-blue font-weight-bold">{{ $AcName1 ? $AcName1totalcr : ''}}</td>
            </tr>
        @endforeach
        <tr>
            <td class=""></td>
            <th class="text-right" colspan="10">Grand Total :</th>
            <th class="text-right font-weight-bold">{{ $sumAmountde }}</th>
            <th class="text-right font-weight-bold">{{ $sumAmountcr }}</th>
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
