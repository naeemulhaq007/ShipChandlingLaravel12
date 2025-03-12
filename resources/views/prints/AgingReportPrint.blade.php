@extends('layouts.app')



@section('title', 'Aging-Report-print')

@section('content_header')
    {{-- {{$data["pagetitle"]}} --}}
@stop

@section('content')
    </div>
    <div class="">
        <div class="row col-sm-12 ml-1">
            <div class="col-sm-5">
                <img class="img-fluid" src="<?php echo url('assets/images/logo.png/'.config('app.BranchPicture')); ?>" style="max-width:100px" border="0">
                <div class="row pb-2">
                    <div class="col-sm-12">
                        <h2><strong> {{ $company->CompanyName }} </strong>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h6>{{ $company->CompanyAddress }}</h6>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-12">
                        <h6>{{ $company->PhoneNo }}</h6>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-12">
                        <h6>{{ $company->FaxNo }}</h6>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-12">
                        <h6>Email : <a href="mailto:{{ $company->EmailAddress }}">{{ $company->EmailAddress }}</a></h6>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-12">
                        <h6>WebSeite : <a href="{{ $company->WebsiteAddress }}">{{ $company->WebsiteAddress }}</a></h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-6 card text-center text-blue">
                        <h4>Aging Report Print</h4>
                    </div>
                    <div class="col-sm-1 ml-auto print-only">
                        <i class="fas fa-print fa-3x text-primary" style="cursor: pointer" onclick="window.print()"
                            aria-hidden="true"></i>
                    </div>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="row py-2 float-right col-sm-8">
                    <img class="img-fluid" src="<?php echo url('assets/images/Ship.png'); ?>" style="max-width:100px" border="0">
                    <img class="img-fluid" src="<?php echo url('assets/images/impa.png'); ?>" style="max-width:100px" border="0">
                    <img class="img-fluid" src="<?php echo url('assets/images/Supply.png'); ?>" style="max-width:100px" border="0">
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-9 float-right">
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Till Date :</p>
                        </div>
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">{{ $MWorkUser }}</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <div class="col-sm-12">
            <div class="rounded shadow ">

                <table id="OrderReporttable"
                    class="bg-white table  table-inverse
            {{-- table-responsive --}}
            ">
                    <thead>
                        <tr>
                            <th>Act&nbsp;Code</th>
                            <th>Act&nbsp;Name</th>
                            <th class="text-right">Curr&nbsp;Bal.</th>
                            <th class="text-right">Under&nbsp;15Days</th>
                            <th class="text-right">16 TO 30&nbsp;Days</th>
                            <th class="text-right">31 TO 45&nbsp;Days</th>
                            <th class="text-right">46 TO 60&nbsp;Days</th>
                            <th class="text-right">61 TO 90&nbsp;Days</th>
                            <th class="text-right">Above 90&nbsp;Days</th>
                            <th class="text-center" style="width: 200px">Remarks</th>
                        </tr>
                    </thead>

                    <tbody id="OrderReporttablebody">
                        @php
                            $SumofCredit = 0;
                            $SumofCrop = 0;
                            $SumofCrtr = 0;
                            $SumofAbove90 = 0;
                            $SumofDrop1 = 0;
                            $SumofDrtr = 0;
                            $SumofN60To90 = 0;

                        @endphp
                        @foreach ($Table as $item)
                        @php
                            $SumofCredit += $item->Credit ? $item->Credit : 0;
                            $SumofCrop += $item->Crop ? $item->Crop : 0;
                            $SumofCrtr += $item->Crtr ? $item->Crtr : 0;
                            $SumofAbove90 += $item->Above90 ? $item->Above90 : 0;
                            $SumofDrop1 += $item->Drop1 ?  $item->Drop1 : 0;
                            $SumofDrtr += $item->Drtr ? $item->Drtr : 0;
                            $SumofN60To90 += $item->N60To90 ? $item->N60To90 : 0;
                        @endphp
                            <tr>
                                <td>{{$item->ActCode}}</td>
                                <td>{{$item->ActName}}</td>
                                <td class="text-right">{{$item->Credit}}</td>
                                <td class="text-right">{{$item->Drop1}}</td>
                                <td class="text-right">{{$item->Crop}}</td>
                                <td class="text-right">{{$item->Drtr}}</td>
                                <td class="text-right">{{$item->Crtr}}</td>
                                <td class="text-right">{{$item->N60To90}}</td>
                                <td class="text-right">{{$item->Above90}}</td>
                                <td></td>

                            </tr>

                        @endforeach
                        <tr>
                            <th colspan="3" class="text-right">
                                {{round($SumofCredit,2)}}
                            </th>
                            <th  class="text-right">
                                {{round($SumofCrop,2)}}
                            </th>
                            <th class="text-right">
                                {{round($SumofCrtr,2)}}
                            </th>
                            <th class="text-right">
                                {{-- {{round((($totsumEXTAmount == 0) ? 1 : $totsumEXTAmount) / (($totsumValueAmount == 0) ? 1 : $totsumValueAmount) * 100,2) . "% Success"}} --}}
                                {{round($SumofAbove90,2)}}
                            </th>
                            <th class="text-right">
                                {{round($SumofDrop1,2)}}

                            </th>
                            <th class="text-right">
                                {{round($SumofDrtr,2)}}

                            </th>
                            <th class="text-right">
                                {{round($SumofN60To90,2)}}

                            </th>
                            <th></th>
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

        .custom-th {
            width: 10px;

        }

        .custom-th2 {
            width: 30px;

        }

        .custom-th2 {
            width: 50px;

        }

        .custom-col {
            max-width: 20%;
        }

        .line {
            line-height: 0.1;
        }

        .custom-col-5 {
            flex: 0 0 47%;
            max-width: 49%;
        }

        .custom-hight {
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
        $(document).ready(function() {
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
        $(document).ready(function() {




            // window.print();

        })
    </script>
@stop


@section('content')
