@extends('layouts.app')



@section('title', 'Pull-Stock')

@section('content_header')

@stop

@section('content')
    </div>
    <?php echo View::make('partials.sendmail'); ?>

    <div class="container-fluid ">

        <div class="col-lg-12">
            <div class="row">

            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <div class="card-tools ">
                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>


                    </div>
                    <div class="row">
                        {{-- <form class="ml-auto" id="pdform" action="{{ route('storePDF') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="file-input" name="pdf_file" accept="application/pdf">
                        <button id="savepdf" class="btn btn-default " type="submit"><i style="font-size: 21px" class="fas fa-file-pdf text-info"></i></button>
                    </form> --}}
                        <div class="col-form-label   ">
                            /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" id="TxtEventNo"
                                for="event_no"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Quote # :&nbsp;</strong> <label class="TxtQuoteNO text-blue" id="TxtQuoteNO"
                                for="TxtQuoteNO"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>VSN # :&nbsp;</strong> <label class="TxtVSNNo text-blue" for="TxtVSNNo"
                                id="TxtVSNNo"></label>

                        </div>
                        <div class="col-form-label  ml-5 ">
                            /&nbsp; <strong>Charge # :&nbsp;</strong> <label class="Charge text-blue" for="Charge"
                                id="TxtChargeNO"></label>

                        </div>
                        {{-- <div class="inputbox col-sm-1 ml-2">
                        <span class="Txtspan" id="">Event No</span>
                        <input class="" type="text" name="TxtEventNo" id="TxtEventNo" >

                    </div>
                    <div class="inputbox col-sm-1 ml-2">
                        <span class="Txtspan" id="">Quote No</span>


                        <input class="" type="text" name="TxtQuoteNO" id="TxtQuoteNO" >
                    </div>
                    <div class="inputbox col-sm-1 ml-2">
                        <span class="Txtspan" id="">VSN No</span>

                        <input class="" type="text" name="TxtVSNNo" id="TxtVSNNo" >
                    </div>
                    <div class="inputbox col-sm-1 ml-2">
                        <span class="Txtspan" id="">Charge No</span>


                        <input class="" type="text" name="TxtChargeNO" id="TxtChargeNO" >
                    </div> --}}
                        <h2 class="mx-auto">Pull Stock</h2>

                        <form class="ml-auto" id="pdform" action="{{ route('storePDF') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="file" id="file-input" name="pdf_file" accept="application/pdf"> --}}
                            <label for="file-input" class="custom-file-upload mx-2">
                                <i class="fas fa-cloud-upload-alt"></i> Choose PDF File
                            </label>
                            <input id="file-input" type="file" name="pdf_file" accept="application/pdf"
                                style="display:none;">
                            <button id="savepdf" class="btn btn-default " type="submit"><i style="font-size: 21px"
                                    class="fas fa-file-pdf text-info"></i></button>
                        </form>


                        <a name="" id="pdf" class="btn btn-default mr-1" role="button"><i
                                style="font-size: 21px" class="fas fa-file-pdf text-danger   "></i></a>

                        <a name="firstvoucher" data-voucherno="{{ $firstVoucherNo }}" id="firstvoucher"
                            class="btn btn-secondary mx-1 " role="button"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i></a>
                        <button id="prev-voucher" class="btn btn-info"><i class="fa fa-arrow-circle-left"
                                aria-hidden="true"></i></button>

                        <div class="input-group col-sm-1">

                            <input class="form-control" type="number" id="current-voucher" name="current-voucher"
                                value="" placeholder="Charge # :">

                        </div>
                        <button id="next-voucher" class="btn btn-info"><i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></button>
                        <a name="" id="lastvoucher" data-voucherno="{{ $lastVoucherNo }}"
                            class="btn btn-secondary mx-1" role="button"><i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>

                        <input type="hidden" id="vouchers" name="vouchers"
                            value="{{ implode(',', $Voucher->pluck('PONo')->toArray()) }}">

                    </div>

                </div>
                <div class="card-body">
                    <div class="row py-1">

                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Pull Date</span>


                            <input id='TxtPullDate' type="date" class="" value="">

                        </div>
                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Pull Time</span>


                            <input id='TxtPullTime' type="time" class="" value="">

                        </div>
                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Order Date</span>
                            <input class="" type="date" name="TxtOrderDate" id="TxtOrderDate">
                        </div>
                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Delivery Date</span>
                            <input class="" type="date" name="TxtDeliveryDate" id="TxtDeliveryDate">

                        </div>
                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Delivery Time</span>


                            <input id='TxtTime' type="time" value="">

                        </div>
                        <div class="inputbox col-sm-2">
                            <span class="Txtspan" id="">Port</span>


                            <select class="" id="CmbPort" name="CmbPort">
                                @foreach ($GodownSetup as $Godown)
                                    <option value="{{ $Godown->GodownCode }}">{{ $Godown->GodownName }}</option>
                                @endforeach
                                {{-- <option value="2">NEW ORLEAN</option>
                <option value="3">LOS ANGELES</option>
                <option value="4">NEW JEARSY</option>
                <option value="5">NEW YORK</option> --}}
                            </select>

                        </div>




                    </div>
                    <div class="row py-2">
                        <div class="inputbox col-sm-5">
                            <span class="Txtspan">Customer</span>

                            <input class="" type="text" id="TxtActName" name="TxtActName">

                        </div>
                        <div class="inputbox col-sm-1">
                            <input readonly type="text" id="TxtActCode" name="TxtActCode">
                        </div>
                        <div class="CheckBox1 col-sm-2">
                            <label class="input-group text-info ml-2 mt-2">
                                <input type="checkbox" name="ChkPullTicketPrinted" id="ChkPullTicketPrinted"
                                    onclick="" value=""> Pull Ticket
                                Printed
                            </label>
                        </div>
                        {{-- <div class="form-check form-check-inline " style="width: 155px;">

                            <label class="form-check-label  mx-1">
                                <input class="form-check-input " type="checkbox" onclick=""
                                    name="ChkPullTicketPrinted" id="ChkPullTicketPrinted" value=""> Pull Ticket
                                Printed
                            </label>


                        </div> --}}
                        <div class="inputbox col-sm-1">
                            <input class="" type="text" name="TxtPullTicketPrinted" id="TxtPullTicketPrinted">

                        </div>

                        <button name="" id="" class="btn btn-info mx-1 ml-1" role="button"><i
                                class="fab fa-plus text-white"></i> Stock Item</button>
                        <button name="" id="" class="btn btn-info mx-1 text-white ml-3" role="button">
                            Fill
                            Land Cost</button>
                        <label for="" id="TxtStatus" class="text-dark mt-2"></label>
                    </div>
                    <div class="row py-2">
                        <div class="inputbox col-sm-5">
                            <span class="Txtspan" id="">Location</span>

                            <select id="CmbGodownName" name="CmbGodownName">
                                @foreach ($GodownSetup as $Godown)
                                    <option value="{{ $Godown->GodownCode }}">{{ $Godown->GodownName }}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="inputbox col-sm-1">
                            <input readonly type="text" id="TxtGodownCode" name="TxtGodownCode">
                        </div>
                        <div class="CheckBox1 col-sm-2">
                            <label class="input-group text-info ml-2 mt-2">
                                <input type="checkbox" name="ChkStockPulled" id="ChkStockPulled" onclick=""
                                    value=""> Stock Pulled
                            </label>
                        </div>
                        <div class="inputbox col-sm-1">

                            <input type="text" name="TxtStockPulled" id="TxtStockPulled">
                        </div>

                        <button name="" id="" class="btn btn-info mx-1" role="button">Stock Purchase</button>
                        <button name="" id="" class="btn btn-info mx-1" role="button">Stock
                            Adjustment</button>
                        <button name="" id="" class="btn btn-info mx-1" role="button">Fill Avg Cost</button>
                    </div>





                    <div class="row py-2">
                        <div class="inputbox col-sm-5">
                                <span class="Txtspan" id="">Stock A/c</span>

                            <input class="" type="text" id="TxtStockName" name="TxtStockName">


                        </div>
                        <div class="inputbox col-sm-1">
                            <input class="" readonly type="text" id="TxtStockCode"
                            name="TxtStockCode">
                        </div>
                        <div class="inputbox col-sm-2">
                                <span class="Txtspan " id="">Vessel</span>
                            <input class="" readonly type="text" id="LblVesselName" name="LblVesselName">


                        </div>
                        <div class="inputbox col-sm-2">
                                <span class="Txtspan" id="">Cust Ref #</span>
                            <input class="" type="text" name="TxtRefNo" id="TxtRefNo">
                        </div>
                        <div class="inputbox col-sm-2">
                                <span class="Txtspan" id="">Terms</span>
                            <input class="" type="text" name="TxtTerms" id="TxtTerms">
                        </div>

                    </div>




                    <div class="row  py-1 align-items-center">
                        {{-- <div class="input-group col-sm-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">Location :</span>
                </div>
                <select  class="custom-select" id="CmbGodownName" name="CmbGodownName">
                    <option value="1">HOUSTON</option>
                    <option value="2">NEW ORLEAN</option>
                    <option value="3">LOS ANGELES</option>
                    <option value="4">NEW JEARSY</option>
                    <option value="5">NEW YORK</option>
                </select>
            </div> --}}
                        <div class="inputbox col-sm-2">
                                <span class="Txtspan" id="">Agent Code</span>
                            <input class="" type="text" name="CmbAgency" id="CmbAgency">
                        </div>
                        <div class="inputbox col-sm-2">
                                <span class="Txtspan" id="">Agent</span>
                            <input class="" type="text" name="CmbAgent" id="CmbAgent">
                        </div>
                        <div class="inputbox col-sm-2">
                                <span class="Txtspan" id="">Back Log</span>
                            <input class="" type="date" name="TxtBackLogDate" id="TxtBackLogDate">
                        </div>
                        <div class="inputbox col-sm-2">
                                <span class="Txtspan" id="">Department</span>
                            <input class="" type="text" name="TxtDepartment" id="TxtDepartment">
                        </div>
                        <div class="inputbox col-sm-4">
                                <span class="Txtspan" id=""> General Vessel Note </span>
                            <textarea name="TxtGeneralNotes" class="" id="TxtGeneralNotes" cols="30" rows="2"></textarea>
                        </div>


                    </div>



                </div>
            </div>
            <div class="rounded shadow mx-auto small">
                <table class="table table-hover   " id="PullStocktable">
                    <thead class="">
                        <tr>
                            <th style="width: 100px">Item&nbsp;Code</th>
                            <th style="width: 1200px">Item&nbsp;Name</th>
                            <th class="text-right">PUOM</th>
                            <th class="text-right">Order&nbsp;Qty</th>
                            <th class="text-right">Short&nbsp;Qty</th>
                            <th class="text-right">Pull&nbsp;Qty</th>
                            <th class="text-right">Sell&nbsp;Price</th>
                            <th class="text-right">Stock&nbsp;Qty</th>
                            <th class="text-right">Cost&nbsp;Price</th>
                            <th class="text-right">Amount</th>
                            <th hidden class="text-right">Order&nbsp;ID</th>
                            <th hidden class="text-right">Quote&nbsp;ID</th>
                            <th hidden class="text-right">VendorCode</th>
                            <th hidden class="text-right">VendorActCode</th>
                            <th class="text-right">GP&nbsp;%</th>
                            <th class="text-right">GP&nbsp;Amt</th>
                            <th hidden class="text-right">SNo</th>
                            <th class="text-right">IMPAItemCode</th>
                            <th class="text-right">Location</th>
                            <th class="text-right">Stromme</th>

                        </tr>
                    </thead>
                    <tbody id="PullStocktablebody">

                    </tbody>
                </table>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row py-1">


                            <div class="CheckBox1 col-sm-2">
                                <label class="input-group text-info ml-2 mt-2">
                                    <input type="checkbox" name="ChkCompanyHeading" id="ChkCompanyHeading"
                                        onclick="" value=""> Company Heading
                                    </label>
                                </label>
                            </div>




                        <button class="btn btn-info ml-auto mx-1" type="button" data-toggle="modal"
                            data-target="#Billingmodal">Billing Information</button>
                        {{-- <a name="CmdBillingInformation" id="CmdBillingInformation" class="btn btn-info ml-auto"  role="button">Billing Information</a> --}}
                        <a name="BtnDeliveredALL" id="BtnDeliveredALL" class="btn btn-info " role="button">Pull All</a>

                        <div class="inputbox col-sm-1 ">
                            <span class="Txtspan" id="">Total</span>
                            <input class="" type="text" name="TxtTotOrderQty" id="TxtTotOrderQty">

                        </div>
                        <div class="inputbox col-sm-1 ">
                            <input class="" type="text" name="TxtTotRecQty" id="TxtTotRecQty">
                        </div>
                        <div class="inputbox col-sm-1 ">
                            <input type="text" name="TxtTotBalQty" id="TxtTotBalQty">

                        </div>
                        <div class="inputbox col-sm-1 ">
                            <input type="text" id="TxtTotalDiscAmt" name="TxtTotalDiscAmt"
                                class="">
                        </div>
                        {{-- <div class="input-group col-sm-1">

            </div> --}}

                        <div class="inputbox col-sm-2 ">

                                <span class="Txtspan" id="">Gross</span>

                            <input type="text" id="TxtTotalAmount" name="TxtTotalAmount" class="">
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="inputbox col-md-6">
                                <span class="Txtspan" id="">Description</span>
                            <input class="" type="text" name="TxtDescription" id="TxtDescription">
                        </div>


                    </div>


                    {{-- </div> --}}
                    {{-- <div class="row py-1">
                <div class="input-group col-sm-3 ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">LINK :</span>
                    </div>
                    <input class="form-control " type="text" name="TxtLink" id="TxtLink" >
                </div>
                <div class="input-group col-sm-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">PV# :</span>
                    </div>
                    <input class="form-control" type="text" name="TxtPVNo" id="TxtPVNo">
                </div>
                <div class="input-group col-sm-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text " id="vendorpaymentbtn">PV</span>
                    </div>
                    <input class="form-control" type="date" name="TxtPVDate" id="TxtPVDate">
                </div>
                <div class="input-group col-md-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Paid Amt :</span>
                    </div>
                    <input class="form-control" type="text" name="TxtPaidAmt" id="TxtPaidAmt">
                </div>
            </div> --}}
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success bg-success" style="width:0%">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="mx-auto">
                            <a name="" id="" class="btn btn-success" data-toggle="modal"
                                data-target="#sendmail" role="button"><i class="fas fa-envelope text-white"></i>
                                Send</a>
                            <a name="" id="Newinv" class="btn btn-primary" role="button"><i
                                    class="fa fa-plus-square text-white" aria-hidden="true"></i> New</a>
                            <a name="CmdSave" id="CmdSave" class="btn btn-success" role="button"><i
                                    class="fa fa-cloud text-white" aria-hidden="true"></i> Save</a>
                            <a name="" id="CmdDelete" class="btn btn-warning" role="button"> <i
                                    class="fas fa-trash text-black"></i> Delete</a>
                            <a name="CmdForPullStock" id="CmdForPullStock" class="btn btn-primary" role="button"><i
                                    class="fa fa-ticket" aria-hidden="true"></i> For Pull Stock Ticket</a>
                            <a name="" href="/home" class="btn btn-danger" role="button"><i
                                    class="fas fa-door-open  text-white fa-fw"></i> Exit</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
    <div id="Billingmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Chart of Account</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="row py-1">
                            <div class="input-group col-sm-11">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Contact Person :</span>
                                </div>
                                <input class="form-control" type="text" name="TxtBContactPerson"
                                    id="TxtBContactPerson">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="input-group col-sm-11">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Billing Address :</span>
                                </div>
                                <input class="form-control" type="text" name="TxtBillingAddress"
                                    id="TxtBillingAddress">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="input-group col-sm-11">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Telephone :</span>
                                </div>
                                <input class="form-control" type="text" name="TxtBTelephone" id="TxtBTelephone">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="input-group col-sm-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Country :</span>
                                </div>
                                <select id="CmbCountry" class="form-control" name="CmbCountry">
                                    <option>Text</option>
                                </select>
                            </div>
                            <div class="col-sm-1"></div>

                            <div class="input-group col-sm-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">City :</span>
                                </div>
                                <select id="CmbCity" class="form-control" name="CmbCity">
                                    <option>Text</option>
                                </select>
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="input-group col-sm-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Fax # :</span>
                                </div>
                                <input class="form-control" type="text" name="TxtBFaxNo" id="TxtBFaxNo">
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="input-group col-sm-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Email :</span>
                                </div>
                                <input class="form-control" type="text" name="TxtBEmailAddress"
                                    id="TxtBEmailAddress">
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="input-group col-sm-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id=""> Web :</span>
                                </div>
                                <input class="form-control" type="text" name="TxtBWeb" id="TxtBWeb">
                            </div>
                            <div class="col-sm-1"></div>

                            <div class="input-group col-sm-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Status :</span>
                                </div>
                                {{-- <input class="form-control" type="text" name="TxtBContactPerson" id="TxtBContactPerson"> --}}
                                <select id="CmbCity" class="form-control" name="CmbCity">
                                    <option>Text</option>
                                </select>
                            </div>
                        </div>
                        <div class="row py-1">
                            <div class="input-group col-sm-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Internal Comments :</span>
                                </div>
                                {{-- <input class="form-control" type="text" name="TxtBContactPerson" id="TxtBContactPerson"> --}}
                                <textarea name="TxtEventQuateCharges" class="form-control" id="TxtEventQuateCharges" cols="30" rows="2"></textarea>
                            </div>
                            <div class="col-sm-1"></div>

                            <div class="input-group col-sm-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Terms :</span>
                                </div>
                                {{-- <input class="form-control" type="text" name="TxtBContactPerson" id="TxtBContactPerson"> --}}
                                <select id="CmbCity" class="form-control" name="CmbCity">
                                    <option>Text</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a name="" id="" data-dismiss="modal" aria-label="Close"
                        class="btn btn-default text-success" role="button">Hide</a>
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
        .pointer-cursor {
            cursor: pointer;
        }

        .form-group {
            position: relative;
        }

        .title {
            position: absolute;
            top: -1.5em;
            left: 0.25em;
            background-color: #fff;
            padding: 0 0.5em;
        }

        .custom-col-2 {
            flex: 0 0 12.6%;
            max-width: 12.6%;
        }

        .span2 {
            width: 110px;
            /* font-size: 11px; */

        }

        .card-body span {}

        .form-control {
            /* font-size: 11px; */

        }
    </style>
@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> --}}
    {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {

            //     document.getElementById('pdform').addEventListener('submit', function(e) {
            //     var fileInput = document.getElementById('file-input');
            //     if (!fileInput.value) {
            //         e.preventDefault(); // prevent form submission
            //         alert('Please select a file.');
            //     }
            // });


            var fileInput = document.getElementById('file-input');
            var customFileUpload = document.querySelector('.custom-file-upload');

            // customFileUpload.addEventListener('click', function() {
            //     fileInput.click();
            // });

            fileInput.addEventListener('change', function() {
                var fileName = fileInput.value;
                if (fileName) {
                    customFileUpload.innerHTML = fileName;
                } else {
                    customFileUpload.innerHTML = '<i class="fas fa-cloud-upload-alt"></i> Choose PDF File';
                }
            });



            $('.parrent').dblclick(function(e) {
                let AcCode = $(this).data('accode');
                // $('#TxtAccode').val(AcCode).trigger("change");
                let AcName = $(this).data('acname');
                $('#TxtActCode').val(AcCode);
                $('#TxtActName').val(AcName);
                // alert(AcName);
            });
            $(".progress-bar").animate({
                width: "100%"

            }, 2500);
            setTimeout(function() {
                //   alert('Progress bar complete!');
                $(".progress-bar").hide();
                $(".progress").hide();
            }, 3000);
            const vouchersInput = document.getElementById('vouchers');
            const currentVoucherInput = document.getElementById('current-voucher');
            const prevButton = document.getElementById('prev-voucher');
            const nextButton = document.getElementById('next-voucher');

            let vouchers = vouchersInput.value.split(',');
            let currentIndex = vouchers.findIndex(voucher => voucher === currentVoucherInput.value);
            currentVoucherInput.value = vouchers[currentIndex];

            prevButton.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    currentVoucherInput.value = vouchers[currentIndex];
                }
            });

            nextButton.addEventListener('click', () => {
                if (currentIndex < vouchers.length - 1) {
                    currentIndex++;
                    currentVoucherInput.value = vouchers[currentIndex];
                }
            });

        });
        $(document).ready(function() {
            // dataget();
            // $('#containers').hide();
            var table = $('#PullStocktable').DataTable({

                scrollY: 350,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                // responsive:true,
                searching: false,
                dom: 'Bfrtip',
                buttons: [


                    {
                        text: 'ADD',
                        className: 'btn btn-info ',
                        action: function(e, dt, node, config) {
                            Rowaddfunc();
                        }
                    },

                    // {
                    //     text: 'Edit',
                    // className: 'btn btn-primary ',
                    // action: function ( e, dt, node, config ) {
                    //     Roweditfunc();

                    // }
                    // },
                    {
                        text: 'Delete',
                        className: 'btn btn-info Delete-row',
                        action: function(e, dt, node, config) {
                            //     var id = $('#deleteButton').attr('data-row-id');
                            //     Rowdeletefunc(table, id);
                            // table.row('.selected').remove().draw(false);
                        },
                        //   init: function(api, node, config) {
                        //     $(node).attr('id', 'deleteButton');
                        //     $(node).attr('data-row-id', '');
                        //   }
                    }, {
                        text: 'Print',
                        className: 'btn btn-info ',
                        action: function(e, dt, node, config) {
                            // Rowaddfunc();
                            $('#ExpenseVoucherReport').modal('show');

                        }
                    },
                ],

            });
            $('#PullStocktable tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });

            // $('.Delete-row').click(function () {
            //     table.row('.selected').remove().draw(false);
            // });

            $(".dt-button").removeClass("dt-button")

            $('#current-voucher').blur(function() {
                dataget();
                tablecomposer();

            });

            $("#current-voucher").on("keydown", function(event) {
                if (event.which === 13) {
                    dataget();
                    tablecomposer();

                }
            });

            $('#next-voucher').click(function(e) {
                dataget();
                tablecomposer();

            });
            $('#prev-voucher').click(function(e) {
                dataget();
                tablecomposer();

            });
            $('#lastvoucher').click(function(e) {
                var voucherno = document.getElementById("lastvoucher").dataset.voucherno;
                document.getElementById("current-voucher").value = voucherno;
                dataget();
                tablecomposer();

            });
            $('#firstvoucher').click(function(e) {
                var voucherno = document.getElementById("firstvoucher").dataset.voucherno;
                document.getElementById("current-voucher").value = voucherno;
                dataget();
                tablecomposer();

            });
            $(document).on('keyup', '.setdes', function(e) {
                let tddes = this.innerHTML;
                var table = document.getElementById('PullStocktablebody');
                var lastRow = table.rows[table.rows.length - 1];
                var firstCell = lastRow.cells[0].innerHTML;
                console.log(tddes);
                console.log(firstCell);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: '/jvdes',
                    data: {
                        type: 'POST',
                        des: tddes,
                        ActCode: firstCell,
                    },
                    beforeSend: function() {
                        $('.overlay').show();
                        // Show the overlay and spinner before sending the request
                    },
                    success: function(response) {
                        console.log(response.results.Des);
                        var table = document.getElementById('PullStocktablebody');
                        var lastRow = table.rows[table.rows.length - 1];
                        let ExpActCodeCell = lastRow.cells[5];
                        ExpActCodeCell.innerHTML = response.results.Des;
                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });

            });


            $(document).on('keydown', '.setact', function(e) {
                if (e.keyCode === 13) {
                    e.preventDefault();
                    let td = this.innerHTML;
                    if (td == null || td == '') {
                        $('#chartofaccount').modal('show');

                    } else {

                        // alert(td);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '/serchVenProList',
                            type: 'POST',
                            data: {
                                MItemCode: td,
                                TxtGodownCode: $('#TxtGodownCode').val(),
                            },
                            beforeSend: function() {
                                // Show the overlay and spinner before sending the request
                                $('.overlay').show();
                            },
                            success: function(response) {

                                if (response.results !== null) {
                                    if (response.inv) {
                                        let inv = response.inv;
                                        console.log(inv);
                                        $('#TxtLastPurRate').val(parseFloat(inv).toFixed(2));
                                    }
                                    let item = response.results;
                                    console.log(item);
                                    let ItemCode = item.ItemCode;
                                    let ItemName = item.ItemName;
                                    $('#TxtAvgRate').val(parseFloat(item.AvgRate).toFixed(2));
                                    var table = document.getElementById('PullStocktablebody');
                                    var lastRow = table.rows[table.rows.length - 1];
                                    let itemnamecell = lastRow.cells[1];
                                    itemnamecell.innerHTML = ItemName;
                                    let PUOMcell = lastRow.cells[2];
                                    PUOMcell.innerHTML = item.UOM;
                                    PUOMcell.style.textAlign = 'center';
                                    let TradePricecell = lastRow.cells[4];
                                    TradePricecell.innerHTML = item.OurPrice;
                                    let ItemCodecell = lastRow.cells[6];
                                    ItemCodecell.innerHTML = ItemCode;
                                    ItemCodecell.style.textAlign = 'right';
                                } else {
                                    alert('Not Found');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);

                            },
                            complete: function() {
                                // Hide the overlay and spinner after the request is complete
                                $('.overlay').hide();
                            }
                        });
                    }
                }
            });

            //         $('#PullStocktable tbody').on('click', 'tr', function() {
            //     if ($(this).hasClass('selected')) {
            //       $(this).removeClass('selected');
            //       $('#deleteButton').attr('data-row-id', '');
            //     } else {
            //       table.$('tr.selected').removeClass('selected');
            //       $(this).addClass('selected');
            //       var id = $(this).attr('data-row-id');
            //       $('#deleteButton').attr('data-row-id', id);
            //     }
            //   });

            //   function Rowdeletefunc(table, id) {
            //     if (id) {
            //       table.row('[data-row-id="' + id + '"]').remove().draw();
            //       $('#deleteButton').attr('data-row-id', '');
            //     }
            //   }
            function Rowdeletefunc(table, rows) {
                if (rows) {
                    for (var i = 0; i < rows.length; i++) {
                        table.row(rows[i]).remove().draw();
                    }
                    $('#deleteButton').attr('data-row-id', '');
                }
            }


            function Rowaddfunc() {

                // alert('add');
                // var pkrrate = document.getElementById("pkrrate").value;
                //    var ExpActName = $('#TxtExpActName').val();
                //    var Description = $('#TxtDescription').val();
                //    var Quantity = $('#TxtQuantity').val();
                //    var Rate = $('#TxtRate').val();
                //    var Amount = $('#TxtAmt').val();
                //    var ExpActCode = $('#TxtExpActCode').val();
                //    var ID = $('#TxtID').val();



                var table = document.getElementById("PullStocktable");
                // table.innerHTML = ""; // Clear the table

                var row = table.insertRow(-1);
                let ItemCodeCell = row.insertCell(0);
                ItemCodeCell.innerHTML = '';
                ItemCodeCell.contentEditable = true;
                // ItemCodeCell.style.width = '100px';
                ItemCodeCell.setAttribute('class', 'setact');


                let ItemNameCell = row.insertCell(1);
                ItemNameCell.innerHTML = '';
                ItemNameCell.contentEditable = true;
                // ItemNameCell.style.width = '180px';

                let PUOMCell = row.insertCell(2);
                PUOMCell.innerHTML = '';
                PUOMCell.contentEditable = true;
                PUOMCell.style.textAlign = 'center';
                // PUOMCell.style.width = '100px';
                PUOMCell.style.textAlign = 'right';

                // let BatchNoCell = row.insertCell(3);
                // BatchNoCell.innerHTML = '';
                // // BatchNoCell.style.textAlign = 'center';
                // BatchNoCell.contentEditable = true;
                // BatchNoCell.style.width = '100px';

                // let CurrencyCell = row.insertCell(4);
                // // CurrencyCell.style.textAlign = 'center';
                // CurrencyCell.innerHTML ='USD';
                // CurrencyCell.contentEditable = true;
                // CurrencyCell.style.width = '100px';

                // let expiryDateCell = row.insertCell(5);
                // expiryDateCell.innerHTML = '';
                // expiryDateCell.contentEditable = true;
                // expiryDateCell.style.width = '100px';

                // let ExpireBarCodeCell = row.insertCell(6);
                // ExpireBarCodeCell.innerHTML ='';
                // // ExpireBarCodeCell.style.textAlign = 'center';
                // ExpireBarCodeCell.contentEditable = true;
                // ExpireBarCodeCell.style.width = '100px';

                let QuantityCell = row.insertCell(3);
                QuantityCell.innerHTML = '';
                // QuantityCell.style.textAlign = 'center';
                QuantityCell.contentEditable = true;
                // QuantityCell.style.width = '100px';
                QuantityCell.style.textAlign = 'right';

                // let BonusQtyCell = row.insertCell(8);
                // BonusQtyCell.innerHTML = '';
                // // BonusQtyCell.style.textAlign = 'center';
                // BonusQtyCell.contentEditable = true;
                // BonusQtyCell.style.width = '100px';

                let TradePriceCell = row.insertCell(4);
                TradePriceCell.innerHTML = '';
                TradePriceCell.style.textAlign = 'right';
                TradePriceCell.contentEditable = true;
                // TradePriceCell.style.width = '100px';

                // let GrossAmtCell = row.insertCell(10);
                // GrossAmtCell.innerHTML ='';
                // GrossAmtCell.style.textAlign = 'right';
                // GrossAmtCell.contentEditable = true;
                // GrossAmtCell.style.width = '100px';

                // let DiscPerCell = row.insertCell(11);
                // DiscPerCell.innerHTML ='';
                // // DiscPerCell.style.textAlign = 'center';
                // DiscPerCell.style.width = '100px';
                // DiscPerCell.contentEditable = true;
                // //
                // let DiscAmtCell = row.insertCell(12);
                // DiscAmtCell.innerHTML = '';
                // DiscAmtCell.style.textAlign = 'right';
                // DiscAmtCell.style.width = '100px';
                // DiscAmtCell.contentEditable = true;

                let AmountCell = row.insertCell(5);
                AmountCell.innerHTML = '';
                AmountCell.style.textAlign = 'right';
                AmountCell.contentEditable = true;
                // AmountCell.style.width = '100px';

                let itmcodecell = row.insertCell(6);
                itmcodecell.innerHTML = '';
                itmcodecell.style.textAlign = 'right';
                // itmcodecell.style.width = '100px';
                itmcodecell.contentEditable = true;

                // let AvgRateCell = row.insertCell(15);
                // AvgRateCell.innerHTML ='';
                // AvgRateCell.style.textAlign = 'right';
                // AvgRateCell.style.width = '100px';
                // AvgRateCell.contentEditable = true;

                // let InvRateCell = row.insertCell(16);
                // InvRateCell.innerHTML ='';
                // InvRateCell.style.textAlign = 'right';
                // InvRateCell.style.width = '100px';
                // InvRateCell.contentEditable = true;

                // let ExpPerCell = row.insertCell(17);
                // ExpPerCell.innerHTML ='';
                // // ExpPerCell.style.textAlign = 'center';
                // ExpPerCell.style.width = '100px';
                // ExpPerCell.contentEditable = true;

                // let InvAmtCell = row.insertCell(18);
                // InvAmtCell.innerHTML ='';
                // InvAmtCell.style.textAlign = 'right';
                // InvAmtCell.style.width = '100px';
                // InvAmtCell.contentEditable = true;

                // let BarCodeCell = row.insertCell(19);
                // BarCodeCell.innerHTML ='';
                // // BarCodeCell.style.textAlign = 'center';
                // BarCodeCell.style.width = '100px';
                // BarCodeCell.contentEditable = true;

                // let DepartmentNameCell = row.insertCell(20);
                // DepartmentNameCell.innerHTML ='';
                // DepartmentNameCell.contentEditable = true;
                // DepartmentNameCell.style.width = '100px';

                // let DepartmentCodeCell = row.insertCell(21);
                // DepartmentCodeCell.innerHTML ='';
                // DepartmentCodeCell.contentEditable = true;
                // DepartmentCodeCell.style.width = '100px';

                // let SaleRateCell = row.insertCell(22);
                // SaleRateCell.innerHTML ='';
                // SaleRateCell.style.textAlign = 'right';
                // SaleRateCell.contentEditable = true;
                // SaleRateCell.style.width = '100px';

                // let IMPAItemCodeCell = row.insertCell(23);
                // IMPAItemCodeCell.innerHTML ='';
                // IMPAItemCodeCell.contentEditable = true;
                // IMPAItemCodeCell.style.width = '100px';


            };

            function Roweditfunc() {
                alert('edit');

            };

            function tablecomposer() {
                let table = document.getElementById('PullStocktablebody');
                let rows = table.rows;
                var MTotalBonusQty = 0;
                var MTotalDiscAmt = 0;
                var MtotalAmt = 0;
                var MTotalQty = 0;
                //  datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    //   let ActCode = cells[0].innerHTML;
                    //   if (ActCode == '') {
                    //       alert('Please Enter ACT-CODE');
                    // return;
                    //   }
                    //   datatablearray.push({
                    let barcode = cells[0] ? cells[0].innerHTML : '';
                    let itemname = cells[1] ? cells[1].innerHTML : '';
                    let PUOM = cells[2] ? cells[2].innerHTML : '';
                    let Quantity = cells[3] ? cells[3].innerHTML : '';
                    let Price = cells[4] ? cells[4].innerHTML : '';
                    let Amount = cells[5] ? cells[5].innerHTML : '';
                    let itemcode = cells[6] ? cells[6].innerHTML : '';
                    MtotalAmt += Number(Amount);
                    MTotalQty += Number(Quantity);
                    //   });

                }
                $('#TxtTotalAmount').val(MtotalAmt);
                $('#TxtTotalQty').val(MTotalQty);
                let TxtTotalExp = $('#TxtTotalExp').val();
                $('#TxtNetAmount').val(MtotalAmt + TxtTotalExp);
            }


            // // $(document).ready(function () {
            // function CheckRecon(MReconAmtChange, callback) {
            //     var MVnon =  $('#TxtVoucherNo').val();
            //     var MVnoc = "JV";
            //     tablecomposer();
            //     let table = document.getElementById('PullStocktablebody');
            //     let rows = table.rows;
            //     var DebitAmounttot = 0;
            //     var CreditAmounttot = 0;
            //      datatablearray = [];
            //         for (let i = 0; i < rows.length; i++) {
            //   let cells = rows[i].cells;
            // //   let ActCode = cells[0].innerHTML;
            // //   if (ActCode == '') {
            // //       alert('Please Enter ACT-CODE');
            // // return;
            // //   }
            //   datatablearray.push({
            //             ActCode : cells[0] ? cells[0].innerHTML : '',
            //             AccountName : cells[1] ? cells[1].innerHTML : '',
            //             DebitAmount : cells[2] ? cells[2].innerHTML : '',
            //             CreditAmount : cells[3] ? cells[3].innerHTML : '',
            //             Currency : cells[4] ? cells[4].innerHTML : '',
            //             Description : cells[5] ? cells[5].innerHTML : '',
            //   });

            //     }
            //     $.ajaxSetup({
            //   headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //   }
            // });

            // $.ajax({
            //   url: '/CheckRecon',
            //   type: 'POST',
            //   data: {
            //     MVnon,MVnoc,datatablearray,
            //   },
            //   success: function(resposne) {
            //     console.log(resposne);
            //     if(resposne.Message == 'ALREADY CONCILED Confirmation'){
            //         var password = prompt("RECONCILED VOUCHER FOUND!!!, Amount has been changed!!!");
            // if (password === "332211") {
            //   if (confirm("Do you want to proceed?")) {
            //     // proceed with action
            //     // alert("Changed Terms.");
            //     MReconAmt = "Y"
            //     // document.getElementById("CmbTerms").value = terms;
            //     callback(MReconAmt);
            //   } else {
            //     alert("Access denied.");
            //     return;
            // }
            // } else {
            //     alert("Incorrect password.");
            //     return;
            // }

            //     }
            //   }
            // });

            // }

            // });
            $('#TxtTotCrAmount').blur(function(e) {
                e.preventDefault();
                tablecomposer()

            });
            $('#TxtTotDrAmount').blur(function(e) {
                e.preventDefault();
                tablecomposer()

            });

            function cmdsaveclick() {
                tablecomposer();

                var TxtStatus = $('#TxtStatus').text();
                if (TxtStatus == 'INVOICED') {
                    alert("Permission Denied !!" + " Already INVOICED Can Not Change");
                    return;
                }




                // var MSalesCode = 0;
                var MSalesCode = '{{ $FixAccountSetup ? $FixAccountSetup->ActSalesCode : '' }}';
                // var MCashCode = 0;
                var MCashCode = '{{ $FixAccountSetup ? $FixAccountSetup->ActCashCode : '' }}';
                var MCOGSCode = '{{ $FixAccountSetup ? $FixAccountSetup->COGSCode : '' }}';
                var MPurCode = '{{ $FixAccountSetup ? $FixAccountSetup->PurStockCode : '' }}';
                var MPullStockForSaleActName =
                    '{{ $FixAccountSetup ? $FixAccountSetup->PullStockForSaleActName : '' }}';
                var BkDate = '{{ $FixAccountSetup ? $FixAccountSetup->BackLogDate : '' }}';
                if (BkDate) {

                    var BackDate = new Date(BkDate);
                    const BackLogDate = BackDate.toISOString().substring(0, 10);
                    $('#TxtBackLogDate').val(BackLogDate);
                }

                if (MSalesCode.length == 0) {
                    return alert('"Plz Use Fix Account Setup"!! "Sales Account Not Found"');
                }
                var TxtDescription = $('#TxtDescription').val();
                if (TxtDescription.length == 0) {
                    $('#TxtDescription').val('Pull Stock From ' + $('#TxtGodownName').val() + ' For ' + $(
                        '#LblVesselName').val());
                }
                let table = document.getElementById('PullStocktablebody');
                let rows = table.rows;
                datatablearray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    let barcode = cells[0].innerHTML;
                    if (barcode == '') {
                        alert('Please Enter Itemcode');
                        return;
                    }
                    datatablearray.push({
                        ItemCode: cells[0] ? cells[0].innerHTML : '',
                        ItemName: cells[1] ? cells[1].innerHTML : '',
                        PUOM: cells[2] ? cells[2].innerHTML : '',
                        OrderQty: cells[3] ? cells[3].innerHTML : '',
                        PullShortQty: cells[4] ? cells[4].innerHTML : '',
                        PullQty: cells[5] ? cells[5].innerHTML : '',
                        SellPrice: cells[6] ? cells[6].innerHTML : '',
                        StockQty: cells[7] ? cells[8].innerHTML : '',
                        Rate: cells[8] ? cells[8].innerHTML : '',
                        Amount: cells[9] ? cells[9].innerHTML : '',
                        OrderID: cells[10] ? cells[10].innerHTML : '',
                        QuoteID: cells[11] ? cells[11].innerHTML : '',
                        VendorCode: cells[12] ? cells[12].innerHTML : '',
                        VendorActCode: cells[13] ? cells[13].innerHTML : '',
                        GPper: cells[14] ? cells[14].innerHTML : '',
                        GPAmt: cells[15] ? cells[15].innerHTML : '',
                        SNo: cells[16] ? cells[16].innerHTML : '',
                        IMPAItemCode: cells[17] ? cells[17].innerHTML : '',
                        Location: cells[18] ? cells[18].innerHTML : '',
                        Stromme: cells[19] ? cells[19].innerHTML : '',

                    });

                }

                // if($("#ChkNoCost").is(":checked")){
                //     alert('This is NO COST Vendor You Can Not Enter Any Amount In This PO')
                //     return;
                // }




                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/PullStocksave',
                    type: 'POST',
                    data: {
                        TxtInvoiceNo: $('#current-voucher').val(),
                        TxtPullDate: $('#TxtPullDate').val(),
                        TxtPullTime: $('#TxtPullTime').val(),
                        TxtPullQty: $('#TxtPullQty').val(),
                        TxtDescription: $('#TxtDescription').val(),
                        TxtFileName: $('#TxtFileName').val(),
                        TxtStockCode: $('#TxtStockCode').val(),
                        TxtActCode: $('#TxtActCode').val(),
                        TxtActName: $('#TxtActName').val(),
                        TxtGodownCode: $('#TxtGodownCode').val(),
                        TxtGodownName: $('#TxtGodownName').val(),
                        TxtTerms: $('#TxtTerms').val(),
                        LblVesselName: $('#LblVesselName').val(),
                        table: datatablearray,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(data) {
                        // if (data.success == true) {
                        alert('saved');
                        console.log(data);
                        // }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });



                // });

            }
            $('#CmdSave').click(function(e) {

                cmdsaveclick();
            });


            function AddNew() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/AddNew-receipt-vouchers',
                    type: 'POST',
                    data: {

                    },
                    success: function(resposne) {
                        alert(resposne.message);
                        $('#TxtVoucherNo').val(resposne.MVoucherNo);
                    }
                });

            }

            function PlusCaps() {
                var vouncherno = $('#TxtVoucherNo').val();
                var totalvouchers = '{{ $lastVoucherNo }}';
                if (vouncherno == '') {
                    $('#TxtVoucherNo').val(1);
                } else {

                    var nextValue = parseInt(document.getElementById("TxtVoucherNo").value) + 1;
                    if (nextValue > totalvouchers) {
                        return;
                    } else {
                        document.getElementById("TxtVoucherNo").value = nextValue;
                        dataget();
                    }
                }
            };

            function MinusCaps() {
                var vouncherno = $('#TxtVoucherNo').val();
                var totalvouchers = '{{ $firstVoucherNo }}';
                if (vouncherno == '') {
                    return;
                } else {
                    var nextValue = parseInt(document.getElementById("TxtVoucherNo").value) - 1;
                    if (nextValue < 1) {
                        return;
                    } else {
                        document.getElementById("TxtVoucherNo").value = nextValue;
                        dataget();
                    }
                }
            };


        });
        $(document).ready(function() {


            $('#TxtBank').blur(function() {
                // $('#TxtBank').blur(function () {
                let TxtBank = parseFloat($('#TxtBank').val());
                let TxtInvAmount = parseFloat($('#TxtInvAmount').val());
                let TxtAmount = $('#TxtAmount').val();
                let TxtInvoiceAmt = $('#TxtInvoiceAmt').val();
                if (!isNaN(TxtInvAmount) && !isNaN(TxtBank)) {

                    $('#TxtInvAmount').val(TxtInvAmount - TxtBank);
                    let TxtBankaf = parseFloat($('#TxtBank').val());
                    let TxtInvAmountaf = parseFloat($('#TxtInvAmount').val());
                    $('#TxtAmount').val(TxtInvAmountaf + TxtBankaf);

                    if (TxtInvoiceAmt == TxtAmount) {
                        $("#TxtAmount").css({
                            "background-color": "green",
                            "color": "white"
                        });

                    } else {

                        $("#TxtAmount").css({
                            "background-color": "red",
                            "color": "white"
                        });
                    }
                }




            });

            $('#TxtInvoiceAmt').dblclick(function() {
                let TxtInvoiceAmt = $('#TxtInvoiceAmt').val();
                $('#TxtInvAmount').val(TxtInvoiceAmt);

            });


            $('#Newinv').click(function(e) {
                let table = document.getElementById('PullStocktablebody');
                table.innerHTML = "";
                $('#TxtVoucherDate').val('');
                $('#TxtActCode').val('');
                $('#TxtActName').val('');
                $('#TxtGodownCode').val('');
                $('#TxtGodownName').val('');
                $('#TxtTerms').val('');
                $('#TxtActCode').val('');
                $('#TxtActName').val('');
                $('#TxtInvoiceAmt').val('');
                $('#TxtCrNote').val('');
                $('#TxtBank').val('');
                $('#TxtInvAmount').val('');
                $('#TxtAmount').val('');
                $('#TxtDesc').val('');
                $('#TxtCurrency').val('');
                $('#TxtRefno').val('');
                $('#TxtChqNo').val('');
                $('#TxtBankDescription').val('');
                $('#TxtChqDate').val('');
                $('#TxtTotAmount').val('');
                $('#TxtStatus').val('');
                $('#TxtInvoiceAmount').text('');
                $('#TxtCreditNoteAmt').text('');
                $('#MRecAmount').text('');
            });

            $('#CmdDelete').click(function(e) {
                e.preventDefault();
                var password = prompt("Delete Confirmation !! Do you want to Delete the Record!!!");
                if (password === "332211") {
                    if (confirm("Do you want to proceed?")) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '/PullStockdelete',
                            type: 'POST',
                            data: {
                                TxtVoucherNo: $('#current-voucher').val(),
                            },
                            beforeSend: function() {
                                // Show the overlay and spinner before sending the request
                                $('.overlay').show();
                            },
                            success: function(data) {
                                console.log(data);
                                if (data.status == 'deleted') {
                                    alert(data.status);
                                    // Reload the page
                                    location.reload();

                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);

                            },
                            complete: function() {
                                // Hide the overlay and spinner after the request is complete
                                $('.overlay').hide();
                            }
                        });

                    } else {
                        alert("Access denied.");
                        return;
                    }
                } else {
                    alert("Incorrect password.");
                    return;
                }



            });



            $('#vendorpaymentbtn').click(function(e) {
                // alert('haha');
                let PVNo = $('#TxtPVNo').val();
                window.open('/VendorVoucher?pv=' + PVNo, '_blank');
            });


        });

        function fixTimeFormat(timeString) {
            const timeFormat = /^(?:([01]?\d|2[0-3]):([0-5]?\d)(?::([0-5]?\d)(?:\.(\d{1,3}))?)?)?$/;
            const match = timeString.match(timeFormat);
            if (!match) {
                return null; // Return null if timeString doesn't match any of the valid formats.
            }
            const [, hours, minutes, seconds = '00', milliseconds = '000'] = match;
            const fixedTime =
                `${hours.padStart(2, '0')}:${minutes.padStart(2, '0')}:${seconds.padStart(2, '0')}.${milliseconds.padEnd(3, '0')}`;
            return fixedTime;
        }

        function dataget() {
            let BillNo = $('#current-voucher').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/searchPullStock',
                type: 'POST',
                data: {
                    BillNo,
                    // pono: $('#TxtClientOrder').val(),
                },
                success: function(resposne) {
                    document.getElementById("firstvoucher").dataset.voucherno = resposne.firstVoucherNo;
                    document.getElementById("lastvoucher").dataset.voucherno = resposne.lastVoucherNo;
                    console.log(resposne);
                    let data = resposne.results;
                    let Master = resposne.Master;
                    let PaymentVoucher = resposne.FlipToVSN;
                    if (Master !== null) {
                        var PullDate = new Date(Master.PullDate);
                        const pulldate = PullDate.toISOString().substring(0, 10);

                        $('#TxtPullDate').val(pulldate);
                        const timeString = Master.PullTime; // Input time string that needs to be fixed.
                        if (timeString !== null) {

                            const fixedTime = fixTimeFormat(timeString);
                            $('#TxtPullTime').val(fixedTime);
                        }

                        $('#TxtDescription').val(Master.PullDes);
                        $('#CmbGodownName').val(Master.GodownCode);
                        $('#TxtGodownCode').val(Master.GodownCode);
                        $('#TxtStatus').text(Master.Status);
                        $('#TxtEventNo').text(Master.EventNo);
                        $('#TxtQuoteNO').text(Master.QuoteNo);
                        $('#TxtVSNNo').text(Master.VSNNO);
                        $('#TxtChargeNO').text(Master.Pono);
                        $('#LblVesselName').text(Master.VesselName);
                        $('#TxtActCode').text(Master.CustomerCode);
                        $('#TxtBContactPerson').text(Master.BContactPerson);
                        $('#TxtBillingAddress').text(Master.BillingAddress);
                        $('#TxtBTelephone').text(Master.BTelephoneNo);
                        $('#TxtBFaxNo').text(Master.BFaxNo);
                        $('#TxtBEmailAddress').text(Master.BEmailAddress);
                        $('#TxtBWeb').text(Master.BWeb);
                        $('#CmbCountry').text(Master.Country);
                        $('#CmbCity').text(Master.City);
                        $('#CmbStatus').text(Master.Status);
                        $('#CmbTerms').text(Master.Terms);
                        $('#TxtEventQuateCharges').text(Master.InternalComments);
                        $('#TxtDepartment').text(Master.Department);
                        $('#TxtPullTicketPrinted').text(Master.PullTicketPrintedDate);
                        $('#TxtStockPulled').text(Master.StockPulledDateTime);

                        var customFileUpload = document.querySelector('.custom-file-upload');
                        if (Master.PDFPath) {
                            customFileUpload.innerHTML = Master.PullStockPDFPath;

                        } else {
                            customFileUpload.innerHTML =
                                '<i class="fas fa-cloud-upload-alt"></i> Choose PDF File';

                        }


                        if (Master.ChkPullTicketPrinted == 'Y') {
                            $('#ChkPullTicketPrinted').prop('checked', true);

                        } else {
                            $('#ChkPullTicketPrinted').prop('checked', false);

                        }
                        if (Master.ChkStockPulled == 'Y') {
                            $('#ChkStockPulled').prop('checked', true);

                        } else {
                            $('#ChkStockPulled').prop('checked', false);

                        }


                    }



                    if (PaymentVoucher !== null) {
                        var pvnodate = new Date(PaymentVoucher.VoucherDate);
                        const pdate = pvnodate.toISOString().substring(0, 10);
                        $('#TxtActCode').val(PaymentVoucher.CustomerCode);
                        $('#TxtActName').val(PaymentVoucher.CustomerName);
                        $('#LblVesselName').val(PaymentVoucher.VesselName);
                        $('#TxtGodownCode').val(PaymentVoucher.GodownCode);



                    } else {
                        $('#TxtActCode').val('');
                        $('#TxtActName').val('');
                        $('#LblVesselName').val('');
                        $('#TxtGodownCode').val('');

                    }

                    let table = document.getElementById('PullStocktablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    data.forEach(function(item) {
                        ids = ids + 1;


                        let row = table.insertRow();
                        row.setAttribute("data-row-id", ids);
                        row.setAttribute('id', 'scoperow');

                        let ItemCodeCell = row.insertCell(0);
                        ItemCodeCell.innerHTML = item.ItemCode;
                        // ItemCodeCell.style.width = '100px';

                        let ItemNameCell = row.insertCell(1);
                        ItemNameCell.innerHTML = item.ItemName;

                        let PUOMCell = row.insertCell(2);
                        PUOMCell.innerHTML = item.PUOM;
                        PUOMCell.style.textAlign = 'center';

                        let OrderQtyCell = row.insertCell(3);
                        OrderQtyCell.innerHTML = item.OrderQty ? item.OrderQty : '';
                        OrderQtyCell.style.textAlign = 'right';

                        let PullShortQty = row.insertCell(4);
                        PullShortQty.innerHTML = item.PullShortQty ? item.PullShortQty : '';
                        PullShortQty.style.textAlign = 'right';

                        let PullQtyCell = row.insertCell(5);
                        PullQtyCell.innerHTML = item.PullQty ? item.PullQty : '';
                        PullQtyCell.style.textAlign = 'right';

                        let PriceCell = row.insertCell(6);
                        PriceCell.innerHTML = item.Price ? parseFloat(item.Price).toFixed(2) : '';
                        PriceCell.style.textAlign = 'right';

                        let StockQtyCell = row.insertCell(7);
                        StockQtyCell.innerHTML = item.PullQty ? item.StockQty : '';
                        StockQtyCell.style.textAlign = 'right';

                        let OurPriceCell = row.insertCell(8);
                        OurPriceCell.innerHTML = item.OurPrice ? parseFloat(item.OurPrice).toFixed(2) :
                            '';
                        OurPriceCell.style.textAlign = 'right';

                        let AmountCell = row.insertCell(9);
                        AmountCell.innerHTML = item.Amount ? parseFloat(item.Amount).toFixed(2) :
                            parseFloat(item.Price) * item.OrderQty;
                        AmountCell.style.textAlign = 'right';

                        let OrderIDCell = row.insertCell(10);
                        OrderIDCell.innerHTML = item.ID;
                        OrderIDCell.style.textAlign = 'right';
                        OrderIDCell.hidden = true;


                        let QuoteIDCell = row.insertCell(11);
                        QuoteIDCell.innerHTML = item.QID;
                        QuoteIDCell.style.textAlign = 'right';
                        QuoteIDCell.hidden = true;



                        let VendorCodeCell = row.insertCell(12);
                        VendorCodeCell.innerHTML = item.VendorCode;
                        // VendorCodeCell.style.textAlign = 'right';
                        VendorCodeCell.hidden = true;

                        let VendoractCodeCell = row.insertCell(13);
                        VendoractCodeCell.innerHTML = item.VendorCode;
                        // VendorCodeCell.style.textAlign = 'right';
                        VendoractCodeCell.hidden = true;

                        let gpperCell = row.insertCell(14);
                        gpperCell.innerHTML = item.VendorCode;
                        // VendorCodeCell.style.textAlign = 'right';
                        // VendoractCodeCell.hidden = true;

                        let gpamountCell = row.insertCell(15);
                        gpamountCell.innerHTML = item.VendorCode;
                        // VendorCodeCell.style.textAlign = 'right';
                        // VendoractCodeCell.hidden = true;

                        let SNoCell = row.insertCell(16);
                        SNoCell.innerHTML = item.SNo;
                        SNoCell.style.textAlign = 'right';
                        SNoCell.hidden = true;

                        // VendorCodeCell.hidden = true;

                        let ImpaCell = row.insertCell(17);
                        ImpaCell.innerHTML = item.IMPAItemCode;
                        ImpaCell.style.textAlign = 'right';
                        // VendorCodeCell.hidden = true;

                        let xhr = new XMLHttpRequest();
                        xhr.open('GET', 'getmoredata?item_code=' + item.ItemCode);
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // Parse the JSON response
                                let responses = JSON.parse(xhr.responseText);
                                let StockLocation = responses.StockLocation;
                                let ChkStromme = responses.ChkStromme;
                                console.log(responses);

                                // Add the data to the row
                                let StockLocationCell = row.insertCell(18);
                                StockLocationCell.innerHTML = StockLocation;
                                StockLocationCell.style.textAlign = 'right';


                                let ChkStrommeCell = row.insertCell(19);
                                ChkStrommeCell.innerHTML = ChkStromme;
                                ChkStrommeCell.style.textAlign = 'right';

                            }
                        };
                        xhr.send();





                    });



                }

            });

        }
    </script>
@stop


@section('content')
