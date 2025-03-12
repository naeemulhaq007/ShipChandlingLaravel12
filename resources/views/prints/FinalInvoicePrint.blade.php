@extends('layouts.app')



@section('title', 'Final-Invoice-Print')

@section('content_header')
@stop

@section('content')
    </div>
    <div class="">
        <div class="row col-sm-12 ml-1">
            <div class="col-sm-5">
                <img class="img-fluid " src="<?php echo url('images/Branches/' . config('app.BranchPicture')); ?>" style="max-width:100px">
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
                    <div class="col-sm-12 card text-center text-blue">
                        <h4>Invoice</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-1">
                <button name="" id="" onclick="window.print()" style="margin-top: 16rem;"
                    class="btn btn-primary" role="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
            <div class="col-sm-6">
                <div class="row py-2 float-right col-sm-8">
                    <img class="img-fluid" src="<?php echo url('assets/images/Ship.png'); ?>" style="max-width:100px" border="0"> <img
                        class="img-fluid" src="<?php echo url('assets/images/impa.png'); ?>" style="max-width:100px" border="0"> <img
                        class="img-fluid" src="<?php echo url('assets/images/Supply.png'); ?>" style="max-width:100px" border="0">
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-7 float-right">
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Invoice No.</p>
                        </div>
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">{{ $OrderMaster->PONo }}</p>
                        </div>
                    </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Invoice Date.</p>
                        </div>
                        <div class="card shadow border border-dark line col-sm-5">
                            <p class="mt-2">{{ date('d-M-Y', strtotime($OrderMaster->InvDate)) }}</p>
                        </div>
                    </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Quotation No.</p>
                        </div>
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">{{ $OrderMaster->QuoteNo }}</p>
                        </div>
                    </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Event No.</p>
                        </div>
                        <div class="card shadow border border-dark line col-sm-5">
                            <p class="mt-2">{{ $OrderMaster->EventNo }}</p>
                        </div>
                    </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Delivery Date/Time.</p>
                        </div>
                        <div class="card shadow border border-dark line  col-sm-5">
                            <p class="mt-2">{{ date('d-M-Y', strtotime($OrderMaster->DispatchDate)) }},
                                {{ date('h:i:sa', strtotime($OrderMaster->DispatchTime)) }}</p>
                        </div>
                    </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Location.</p>
                        </div>
                        <div class="card shadow border border-dark  line col-sm-5">
                            <p class="mt-2">{{ $OrderMaster->Location }}</p>
                        </div>
                    </div>
                    <div class="row custom-hight">
                        <div class="card shadow border border-dark line mr-1 col-sm-5">
                            <p class="mt-2">Terms.</p>
                        </div>
                        <div class="card shadow border border-dark  line col-sm-5">
                            <p class="mt-2">{{ $OrderMaster->Terms }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-2  ml-1">

            <div class="card  custom-col-5 mr-5">
                <div class="card-header border border-dark">
                    <h5 class="card-title">{{ $OrderMaster->BContactPerson }}</h5>

                </div>
                <div class="card-body border border-dark">
                    <div class="row mx-1 "><b>{{ $OrderMaster->BillingAddress }}</b></div>
                    <div class="row mx-1 "><b>Tel : </b>
                        <p>{{ $Eventinvoice ? $Eventinvoice->Phone : '' }}</p>, <b>Fax : </b>
                        <p>{{ $Eventinvoice ? $Eventinvoice->Fax : '' }}</p>
                    </div>
                    <div class="row mx-1 "><b>C.Person :</b>
                        <p>{{ $Eventinvoice ? $Eventinvoice->Name : '' }}</p>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-sm-12">
            <div class="row ml-3">
                <div class="card " style="width: 20%;">
                    <div class="card-header border border-dark">
                        <h5 class="card-title">Vessel</h5>

                    </div>
                    <div class="card-body border border-dark">
                        <p class="">{{ $OrderMaster->VesselName }}</p>
                    </div>
                </div>
                <div class="card" style="width: 20%;">
                    <div class="card-header border border-dark">
                        <h5 class="card-title">Department</h5>

                    </div>
                    <div class="card-body border border-dark">
                        <p class="">{{ $OrderMaster->Department }}</p>
                    </div>
                </div>
                <div class="card" style="width: 20%;">
                    <div class="card-header border border-dark">
                        <h5 class="card-title">Cust. Ref#</h5>

                    </div>
                    <div class="card-body border border-dark">
                        <p class="">{{ $OrderMaster->CustomerRefNo }}</p>
                    </div>
                </div>
                <div class="card" style="width: 18%;">
                    <div class="card-header border border-dark">
                        <h5 class="card-title">Cust. PO.#</h5>

                    </div>
                    <div class="card-body border border-dark">
                        <p class="">{{ $OrderMaster->PurchaseOrderNo }}</p>
                    </div>
                </div>
                <div class="card" style="width: 18%;">
                    <div class="card-header border border-dark">
                        <h5 class="card-title">Port</h5>

                    </div>
                    <div class="card-body border border-dark">
                        <p class="">{{ $Fliptovsn->Port }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="rounded shadow ">
                <div class=" tableFixHead">
                    <table class="bg-white table  table-inverse ">
                        <thead class=" ">
                            <tr>
                                <th>SR#</th>
                                <th>IMPA</th>
                                <th>Orderd</th>
                                <th>UOM</th>
                                <th style="padding-left: 7rem;padding-right: 7rem;">Item&nbsp;Description</th>
                                <th>PO&nbsp;Rec#</th>
                                <th>Cost</th>
                                <th>Sell</th>
                                <th>GP&nbsp;%</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 0;

                            @endphp
                            @foreach ($OrderDetails as $item)
                                @php
                                    $counter = $counter + 1;
                                    $value = $item->Price * $item->OrderQty - $item->VendorPrice;
                                @endphp
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $item->IMPA }}</td>
                                    <td>{{ round($item->OrderQty, 2) }}</td>
                                    <td>{{ $item->PUOM }}</td>
                                    <td>{{ $item->ItemName }}</td>
                                    <td>{{ $item->POMadeNo }}</td>
                                    <td>{{ round($item->VendorPrice, 2) }}</td>
                                    <td>{{ round($item->Price*$item->OrderQty, 2) }}</td>
                                    <td>{{ round(($value / ($item->Price * $item->OrderQty ?: 1)) * 100, 2) }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>





        <div class=" border border-dark rounded">
            <div class="row pb-2">
                <div class="col-sm-6">
                    <div class="row py-1 ml-2">
                        <b class="">Description :</b>
                        <div class="ml-2" id="numcon">{{ $OrderMaster->DeliveryDes }}</div>
                    </div>
                    <div class="row py-1 ml-2">
                        <b class="">In Words :</b>
                        <div class="ml-2" id="numtr"></div>
                    </div>
                </div>
                <div class="col-sm-3">

                </div>
                <div class="col-sm-2 ">
                    <div class="row">
                        <div class="col-sm-6  line">
                            <div class="row py-1 mt-2">
                                <b>Gross Amount :</b>
                            </div>
                            <div class="row mt-3">
                                <p>Inv Disc :</p>
                            </div>
                            <div class="row py-1">
                                <b>Net Amount :</b>
                            </div>

                        </div>
                        <div class="col-sm-1 mr-1 line">
                            <div class="row py-1 mt-2">
                            </div>
                            <div class="row mt-3">
                                <p class="disrep">{{ $inv }}%</p>
                            </div>
                        </div>
                        <div class="col-sm-2 ml-4  line">
                            <div class="row  mt-2">
                                <u><b><p class="" id="numnum"></p></b></u>
                            </div>
                            <div class="row mt-1">
                                <p id="disval"></p>
                            </div>
                            <div class="row py-1">
                                <u><b><p class="" id="displus"></p></b></u>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-sm-3 ml-2">
                <div class="row py-1 ml-2"><b>Bank Name: Chase BankBank </b></div>
                <div class="row py-1 ml-2"><b>address: 1200 Clear Lake City Blvd. Houston TX 77062</b></div>
                <div class="row py-1 ml-2"><b>AC # 527692799</b></div>
                <div class="row py-1 ml-2"><b>ABA Routing # 021000021</b></div>
                <div class="row py-1 ml-2"><b>Swift Code # CHASUS33</b></div>
                <div class="row py-1 ml-2"><b>Beneficiary Name: Global Ship Services</b></div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
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
        var th = ['', 'Thousand', 'Million', 'Billion', 'Trillion'];
        var dg = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
        var tn = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen',
            'Nineteen'
        ];
        var tw = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

        function toWords(s) {
            s = s.toString();
            s = s.replace(/[\, ]/g, '');
            if (s != parseFloat(s)) return 'not a number';
            var x = s.indexOf('.');
            if (x == -1)
                x = s.length;
            if (x > 15)
                return 'too big';
            var n = s.split('');
            var str = '';
            var sk = 0;
            for (var i = 0; i < x; i++) {
                if ((x - i) % 3 == 2) {
                    if (n[i] == '1') {
                        str += tn[Number(n[i + 1])] + ' ';
                        i++;
                        sk = 1;
                    } else if (n[i] != 0) {
                        str += tw[n[i] - 2] + ' ';
                        sk = 1;
                    }
                } else if (n[i] != 0) { // 0235
                    str += dg[n[i]] + ' ';
                    if ((x - i) % 3 == 0) str += 'hundred ';
                    sk = 1;
                }
                if ((x - i) % 3 == 1) {
                    if (sk)
                        str += th[(x - i - 1) / 3] + ' ';
                    sk = 0;
                }
            }

            if (x != s.length) {
                var y = s.length;
                str += 'point ';
                for (var i = x + 1; i < y; i++)
                    str += dg[n[i]] + ' ';
            }
            return str.replace(/\s+/g, ' ');
        }
    </script>
    <script>
        $(document).ready(function() {
            sumofammount = 0;
            @foreach ($OrderDetails as $item)
                sumofammount += {{ $item->Price * $item->OrderQty }};
            @endforeach
            console.log(sumofammount);
            // console.log
            (document.getElementById('numnum').innerHTML) = (parseFloat(sumofammount).toFixed(2));
            //1511.0658
            document.getElementById('numtr').innerHTML = toWords(sumofammount);
            // document.getElementById('disrep').innerHTML = {{ $inv }};
            let invdis = sumofammount / 100 * {{ $inv }};
            // console.log(document.getElementById('disval').innerHTML);
            document.getElementById('disval').innerHTML = (invdis.toFixed(2));
            // document.getElementById('disval').innerHTML = Math.round(sumofammount/100*{{ $inv }},2)+'$';
            console.log(invdis);
            document.getElementById('displus').innerHTML = (parseFloat(sumofammount - invdis).toFixed(2));
            window.print();
        });
    </script>
@stop


@section('content')
