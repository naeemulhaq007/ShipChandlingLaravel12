@extends('layouts.app')



@section('title', 'User-Performance-print')

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
                <h4>Vendor Product List</h4>
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
               <p class="mt-2">PrintDate :</p>
            </div>
                <div class="card shadow border border-dark line mr-1 col-sm-5">
                   <p class="mt-2">{{date('Y-m-d')}}</p>
               </div>
               </div>

                               </div>




                                    </div>
                                </div>


<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-blue">Vender Name : {{$VenderName}}</h5>

        </div>
    </div>
     <div class="rounded shadow ">

            <table id="OrderReporttable" class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                <thead>
                    <tr>
                        <th>SNo&nbsp;#</th>
                        <th>Code&nbsp;#</th>
                        <th>Product&nbsp;Name</th>
                        <th>UOM&nbsp;</th>
                        <th>Country&nbsp;/&nbsp;Origin</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Cost&nbsp;Price</th>
                        <th>Comm&nbsp;%</th>
                        <th class="text-right">GP</th>
                        <th class="text-right">Lst&nbsp;Price</th>
                        <th >Diff</th>

                    </tr>
        </thead>

        <tbody id="OrderReporttablebody">


            @foreach ($Table as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->ItemCode}}</td>
                <td>{{$item->ItemName}}</td>
                <td>{{$item->UOM}}</td>
                <td>{{$item->OriginName}}</td>
                <td>{{round($item->Rate,2)}}</td>
                <td>{{round($item->OurPrice,2)}}</td>
                <td>{{$item->CommPer}}</td>
                <td>{{$item->GP}}</td>
                <td>{{round($item->LastRate,2)}}</td>
                <td>{{round($item->Diff,2)}}</td>
            </tr>
            @endforeach
            <tr>
                <td class="text-center" colspan="6">End Of Report .......................</td>
            </tr>


        </tbody>







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
    $(document).ready(function() {
        $('.customer-row').on('dblclick', function() {
            var target = $(this).data('target');
            $('.' + target).toggle();
        });
    });
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
