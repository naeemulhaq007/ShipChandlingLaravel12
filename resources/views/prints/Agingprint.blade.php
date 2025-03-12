@extends('layouts.app')



@section('title', 'Aging-print')

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
                        <h4>Aging Print</h4>
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
                        <tr><th>Act&nbsp;Name</th>\
                            <th>Current</th>
                            <th>30&nbsp;Days</th>
                            <th>60&nbsp;Days</th>
                            <th>90&nbsp;Days</th>
                            <th>Total&nbsp;Balance</th>

                            <th>Remarks</th>
                        </tr>
                    </thead>

                    <tbody id="OrderReporttablebody">
                        @php
                            $totalorder = 0;
                            $totsumValueAmount = 0;
                            $totsumEXTAmount = 0;
                        @endphp
                        {{-- @foreach ($table->groupBy('CustomerCode') as $CustomerCode => $CustomeItems)
                @php
                $targetId = 'customer_' . Str::random(8);
                $customerdata = DB::table('CustomerSetup')->select('CustomerName', 'Country')->where('CustomerCode', $CustomerCode)->orderBy('CustomerName')->first();
                $orderdata = DB::table('OrderMaster')->select('PONo')->whereIn('QuoteNo', $CustomeItems->pluck('QuoteNo'))->get();
                $sumEXTAmount = DB::table('OrderMaster')->where('QuoteNo', $CustomeItems->pluck('QuoteNo'))->sum('ExtAmount');
                $totalorder += count($orderdata);
                $totalquote = count($CustomeItems);
                $sumValueAmount = $CustomeItems->sum('ValueAmount');
                $totsumValueAmount += $sumValueAmount;
                $totsumEXTAmount += $sumEXTAmount;
                $Success = (($sumEXTAmount == 0) ? 1 : $sumEXTAmount) / (($sumValueAmount == 0) ? 1 : $sumValueAmount) * 100 ;
                @endphp
                <tr class="customer-row toggle-details" data-target="{{ $targetId }}">
                    <th>
                        {{ $customerdata->CustomerName }}
                    </th>
                    <th>
                        {{ $customerdata->Country }}
                    </th>
                    <th>
                        {{ $totalquote }}
                    </th>
                    <th>
                        {{ count($orderdata) }}
                    </th>
                    <th>
                        {{ round($sumValueAmount,2) }}
                    </th>
                    <th>
                        {{ round($sumEXTAmount,2) }}
                    </th>
                    <th>
                        {{ round($Success,2) . "% Success" }}
                    </th>
                </tr>
                @foreach ($CustomeItems as $item)
                    @php
                    $detailsId = 'customer_' . Str::random(8);
                    @endphp
                    <tr class="customer-details {{ $targetId }}" style="display: none;">
                        <td>
                            <span class="ml-5 mx-4">{{ $loop->iteration }}</span>
                            <span class="mx-4">{{ $item->QuoteNo ? $item->QuoteNo : '' }}</span>
                            <span class="mx-4">{{ $item->DepartmentName ? $item->DepartmentName : '' }}</span>
                            <span class="mx-4">{{ $item->CustomerRefNo ? $item->CustomerRefNo : 'NO REF.NO' }}</span>
                            <span class="mx-4">{{ $item->WorkUserSentToCust ? $item->WorkUserSentToCust : '' }}</span>
                        </td>
                        <td>
                            <span class="mx-4">{{ $item->QDate ? date('d-M-Y', strtotime($item->QDate)) : '' }}</span>
                        </td>
                        <td>
                            <span class="mx-4">{{ $item->QSentDate ? date('d-M-Y , H:i', strtotime($item->QSentDate)) : '' }}</span>
                            <span class="mx-4">{{ $item->QDate && $item->QSentDate ? \Carbon\Carbon::parse($item->QDate)->diffInDays(\Carbon\Carbon::parse($item->QSentDate)).'Days' : '' }}</span>
                            <span class="mx-4">{{ $item->BidDueDate ? date('d-M-Y', strtotime($item->BidDueDate)) : '' }}</span>
                        </td>

                        <td>
                            @php
                            $diff = $item->BidDueDate && $item->QSentDate ? \Carbon\Carbon::parse($item->BidDueDate)->diffInDays(\Carbon\Carbon::parse($item->QSentDate)) : null;
                            @endphp
                            @if ($diff < 0)
                                Late
                            @elseif ($diff > 0)
                                On Time
                            @else
                                NO ORDER
                            @endif
                        </td>
                        <td>
                            <span class="text-right">{{ $item->ValueAmount ? round($item->ValueAmount, 2) : 0 }}</span>
                        </td>
                        <td>
                            <span class="text-right">{{ $item->ExtAmount ? round($item->ExtAmount, 2) : 0 }}</span>
                            <span class="mx-3">{{ $item->Comments ? $item->Comments : 'NO Comment' }}</span>
                        </td>

                    </tr>

                @endforeach
            @endforeach --}}

                        <tr>
                            <th colspan="4" class="text-right">
                                Grand Total :
                            </th>
                            <th>
                                {{-- {{$totsumValueAmount}} --}}
                            </th>
                            <th>
                                {{-- {{$totsumEXTAmount}} --}}
                            </th>
                            <th>
                                {{-- {{round((($totsumEXTAmount == 0) ? 1 : $totsumEXTAmount) / (($totsumValueAmount == 0) ? 1 : $totsumValueAmount) * 100,2) . "% Success"}} --}}
                            </th>
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
