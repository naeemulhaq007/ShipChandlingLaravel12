@extends('layouts.app')



@section('title', 'QuotationsEntry')

@section('content_header')
@stop

@section('content')
    <?php echo View::make('partials.impalist'); ?>
    <?php echo View::make('partials.fullitemsearch'); ?>
    <?php echo View::make('partials.ImportExcelModal'); ?>


    @php
    use App\Helpers\Ship;
        $status = request()->get('status');
        $error = request()->get('error');
        $ShipId = request()->get('ShipId');

    @endphp

    @if (request()->get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! request()->get('status') !!}</strong>
        </div>
    @endif
    @if (request()->get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! request()->get('error') !!}</strong>
        </div>
    @endif
    @if (\Session::has('status'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! \Session::get('status') !!}</strong>
        </div>
    @endif
    </div>
    <!--  form action=""  method="GET" -->
    @csrf






    <!-- div class="col-md-12"  -->
    <div class="card collapsed-card ">
        <div style="background-color:#EEE" class="card-header">
            <div class="card-tools ">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <div class="row">

                       
                <div class="col-form-label row ml-2 ">
                    <strong>Quotation # :&nbsp;</strong> <label class="quote_no text-blue" for="quote_no"><input
                            type="number" name="quote_no" class="col-sm-6 form-control form-control-sm" id="quote_no"
                            value="{{ $quote_no }}"></label>

                </div>

                <div class="col-form-label   ">
                    /&nbsp; <strong>Event # :&nbsp;</strong> <label class="event_no text-blue" for="event_no"></label>

                </div>
                <div class="col-form-label  ml-5 ">
                    /&nbsp; <strong>Customer :&nbsp;</strong> <label class="customer text-blue" for="customer"></label>

                </div>
                <div class="col-form-label  ml-5 ">
                    /&nbsp; <strong>Vessel :&nbsp;</strong> <label class="vessel text-blue" for="vessel"></label>

                </div>
                <div class="col-form-label  ml-5 ">
                    /&nbsp; <strong>Customer Ref # :&nbsp;</strong> <label class="customer_ref_no text-blue"
                        for="customer_ref_no"></label>

                </div>
                <div class="col-form-label  ml-5 ">
                    /&nbsp; <strong>Department Name :&nbsp;</strong> <label class="departmentname text-blue"
                        id="departmentname" for="departmentname"></label>

                </div>
                {{-- <form id="import-form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" hidden class="ml-3" id="file-input" name="file" accept=".xlsx">
                                    <button type="submit" hidden id="import-button" class="btn btn-primary">Import</button>
                                </form> --}}


            </div>



        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="container-fluid ">
                <div class="col-lg-12">
                    <div class="row">

                        <input type="hidden" id="event_no" class="event_no  ">

                        <div class="inputbox col-lg-1  col-sm-2 my-2">
                            <input id='qdate' type="date" value="" class="datetimepicker-input"
                                data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask=""
                                inputmode="numeric">
                            <span class="">QDate</span>
                        </div>

                        <div class="inputbox col-lg-1 col-sm-2 my-2">

                            <input id='eta' type="date" value="" class="datetimepicker-input"
                                data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask=""
                                inputmode="numeric">
                            <span class="">ETA</span>

                        </div>


                        <div class="inputbox col-lg-1 col-sm-2 my-2">


                            <input id='biddue' type="date" value="" class="datetimepicker-input"
                                data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask=""
                                inputmode="numeric">
                            <span class="">Bid Due</span>

                        </div>

                        {{-- <button type="button" class="btn btn-danger mx-1">Exclude</button> --}}

                        <div class="inputbox col-lg-1 col-sm-2 my-2">

                            <input type="text" id="vsn" value="" class="" disabled>
                            <span class="Txtspan">VSN #</span>
                        </div>

                        <div class="inputbox col-lg-1 col-sm-2 my-2">

                            <input type="text" id="charg" value="" class="" disabled>
                            <span class="Txtspan">Charg #</span>
                        </div>

                        <div class="inputbox col-lg-1 col-sm-2 my-2">

                            <span class="Txtspan">Time</span>
                            <input type="time" id="qtime" class="">

                        </div>


                        <div class="inputbox col-lg-1 col-sm-2 my-2">

                            <input type="text" id="code" class="">
                            <span class="Txtspan">Code</span>
                        </div>


                        <div class="inputbox col-lg-2 col-sm-3 my-2">

                            <span class="Txtspan">Terms</span>
                            {!! Ship::termsDropdown() !!}
                        </div>

                        <div class="inputbox col-lg-1 col-sm-2 my-2">

                            <input type="text" id="assign" class="">
                            <span class="Txtspan">Assign</span>
                        </div>

                        <div class=" col-lg-1 col-sm-2 my-2">
                        <button type="button" class="btn btn-secondary ">Follow Up</button>
                        </div>



                        <div class="inputbox col-lg-1 col-sm-2 my-2">

                            <input type="text" id="contact" class="">
                            <span class="Txtspan">Contact</span>
                        </div>

                        <div class="inputbox col-lg-2 col-sm-3 my-2">

                            <span class="Txtspan">Status</span>
                            {!! Ship::statusDropdown() !!}
                        </div>

                        <div class="inputbox col-lg-1 col-sm-2 my-2">
                            <input type="text" id="sent" class="">
                            <span class="Txtspan">Sent</span>
                        </div>




                        <div class="inputbox col-lg-1 col-sm-2 my-2">
                            <input type="text" id="imo_no" class="">
                            <span class="Txtspan">IMO #</span>
                        </div>

                        <div class="inputbox col-lg-1 col-sm-2 my-2">
                            <input type="text" id="header" class="">
                            <span class="Txtspan">Header</span>
                        </div>

                        <div class="inputbox col-lg-1 col-sm-2 my-2">
                            <input type="text" id="est_lines" class="">
                            <span class="Txtspan">Est Lines</span>
                        </div>



                        <div class="inputbox col-lg-1 col-sm-2 my-2">
                            <input type="text" id="port" class="">
                            <span class="Txtspan">Port</span>
                        </div>

                        <div class="inputbox col-lg-2 col-sm-3 my-2">

                            <input type="text" id="remarks" class="">
                            <span class="Txtspan">Remarks</span>
                        </div>

                        <div class="inputbox col-lg-2 col-sm-3 my-2">
                            <input type="text" id="created_datetime" class="">
                            <span class="Txtspan">Created Date/Time</span>
                        </div>


                        <div class="inputbox col-lg-2 col-sm-3 my-2">

                            <span class="Txtspan">Warehouse</span>
                            <select id="Warehouse" name="Warehouse" class="">

                            </select>
                        </div>

                        <div class="inputbox col-lg-1 col-sm-2 my-2">
                            <input type="text" id="created" class="" required>
                            <span class="Txtspan">Created</span>
                        </div>

                        <div class="inputbox col-lg-2 col-sm-3 my-2">
                            <input type="text" id="bid_due_datetime" class="" required>
                            <span class="Txtspan">Bid Due Date/Time</span>
                        </div>
                    </div>

                    {{-- <div class="row py-2">
                    </div> --}}






                    <div class="row pt-2">

                        <div class="CheckBox1 ml-2">

                            <label class="input-group text-info">
                                <input type="checkbox" name="ChkQuoteEntry" id="ChkQuoteEntry" value="">
                                Quote Entry
                            </label>
                            <label for="" class="ml-2" id="LblWorkUserQuoteEntry">a</label>

                        </div>

                        <div class="CheckBox1 ml-4">

                            <label class="input-group text-info">
                                <input type="checkbox" name="ChkSendToVendor" id="ChkSendToVendor" value="">
                                Sent To Vendor
                            </label>
                            <label for="" class="ml-4" id="LblWorkUserSentToVendor">b</label>

                        </div>

                        <div class="CheckBox1 ml-4">

                            <label class="input-group text-info">
                                <input type="checkbox" name="ChkCosting" id="ChkCosting" value="">
                                Costed
                            </label>
                            <label for="" class="ml-4" id="LblWorkUserCosted">c</label>

                        </div>

                        <div class="CheckBox1 ml-4">

                            <label class="input-group text-info">
                                <input type="checkbox" name="ChkPricing" id="ChkPricing" value="">
                                Cell Priced
                            </label>
                            <label for="" class="ml-4" id="LblWorkSellPricied">d</label>

                        </div>

                        <div class="CheckBox1 ml-4">

                            <label class="input-group text-info">
                                <input type="checkbox" name="ChkRekey" id="ChkRekey" value="">
                                Re-Key
                            </label>
                            <label for="" class="ml-4" id="LblWorkUserREKey">e</label>

                        </div>

                        <div class="CheckBox1 ml-4">

                            <label class="input-group text-info">
                                <input type="checkbox" name="ChkSentToCust"  id="ChkSentToCust" value="">
                                Sent To Cust
                            </label>
                            <label for="" class="ml-4" id="LblWorkUserSentToCust1">f</label>

                        </div>
                        <div class="CheckBox1 ml-4">

                            <label class="input-group text-info">
                                <input type="checkbox" name="ChkOnlyStock"  id="ChkOnlyStock" value="">
                                Only Stock item
                            </label>
                            {{-- <label for="" class="ml-4" id="LblWorkUserSentToCust1">f</label> --}}

                        </div>

                    </div>
                    <div class="row pb-2">

                   


                    </div>






                </div><!-- col-lg-12-->
            </div>














        </div>

    </div>
    <div class="card">

        <div class="card-body item-data">

            <div class="row">

                <div class="col-md-12">

                    <div class="row">

                        <input type="hidden" value='' name="item_id" class="form-control  input-sm"
                            id="item_id">

                        <div class="inputbox col-sm-1">
                            <input type="text" value='' readonly class=""  id="sno">
                            <span class="Txtspan">SNo.</span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text"id="item_code" required>
                            <span class="Txtspan">Set</span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" value=''id="impa" required>
                            <a name="" id="btnimpa"  style=" position: absolute;
                            left: 0;
                            margin-left: 5px;"  class="Txtspan"  role="button"><i class="fa fa-search" aria-hidden="true"></i>IMPA</a>
                            {{-- <span class="Txtspan " id="" >IMPA </span> --}}

                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" value='' id="uom" required>
                            <span class="Txtspan">UOM</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <input type="text" value=''id="vpart_no" required>
                            <span class="Txtspan">V-Part#</span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="number" value='' onkeyup="reSum();" onblur="reSum();" id="qty"
                                required>
                            <span class="Txtspan">Qty.</span>
                        </div>

                        <div class="inputbox col-sm-2">
                            <span class="Txtspan">Vendor</span>
                            <select name="VenderName" id="Vendrorname">
                            </select>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="number" value='' id="vendor_price">
                            <span class="Txtspan">V.Price</span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="number" value=''  tabindex="18" onkeyup="reSum();" onblur="reSum();"
                                id="sell_price">
                            <span class="Txtspan">S.Price</span>
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="number" readonly value='' id="total" required>
                            <span class="Txtspan">Total</span>
                        </div>
                        
      

                         
                         </div>
    <div class="row">
    <div class="inputbox col-sm-2 d-flex gap-2 align-items-center pt-2">
        <button class="btn btn-primary" id="clearform" type="button">C</button>
        <button class="btn btn-success" id="saveitem" type="button">Add</button>
    </div>
</div>

                   
                    </div>
              
              

                </div>

            </div>

            <?php echo View::make('partials.itemsearch'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="row py-2">

                        <div class="inputbox col-md-4">
                            <textarea tabindex="1" id="item_desc" {{-- data-toggle="modal" data-target="#searchrmod" --}} required></textarea>
                            <span>Item Descs</span>
                        </div>
                        <div id="suggestions"></div>

                        <div class="inputbox col-md-4">
                            <textarea id="customer_notes" required></textarea>
                            <span>Customer Notes</span>
                        </div>

                        <div class="inputbox col-md-4">
                            <textarea id="notes" required></textarea>
                            <span>Vendor Notes</span>
                        </div>

                    </div>

                    <div class="row ">

                        <div class="inputbox col-md-4">
                            <textarea id="internal_notes" required></textarea>
                            <span>Internal Notes</span>
                        </div>

                        <div class="inputbox col-md-4">
                            <textarea id="vessel_notes" required></textarea>
                            <span>Vessel Notes</span>
                        </div>

                    </div>
                    {{-- <div class="row">
                        <div class="CheckBox1">
                            <div class="input-group mt-2 ml-2 text-info">
                                <input type="checkbox" id="" value="">User
                            </div>
                        </div>
                    </div> --}}


                </div>
            </div>






<div class="table-responsive">
    <table class="table table-bordered table-hover text-sm" id="itemsgrid" style="min-width: 1200px;">
        <thead class="bg-info text-white text-center">
            <tr>
                <th style="min-width: 30px;">SN</th>
                <th style="min-width: 90px;">IMPA</th>
                <th style="min-width: 100px;">Item Code</th>
                <th style="min-width: 230px;">Item Name</th>
                <th style="min-width: 60px;">Qty</th>
                <th style="min-width: 70px;">UOM</th>
                <th style="min-width: 80px;">Vpart</th>
                <th style="min-width: 100px;">Vendor Price</th>
                <th style="min-width: 100px;">Sell Price</th>
                <th style="min-width: 100px;">Total Price</th>
                <th style="min-width: 180px;">Vendor Name</th>
                <th style="min-width: 150px;">Customer Note</th>
                <th style="min-width: 150px;">Vendor Note</th>
                <th style="min-width: 200px;">Internal Buyer Note</th>
                <th style="display: none;">vessel_notes</th>
                <th style="display: none;">VendorCode</th>
            </tr>
        </thead>
        <tbody id="myTable">
            
        </tbody>
    </table>
</div>


    

            <div class="position-fixed bg-success text-white rounded p-3" id="myElement"
                style="right: -300px; top: 50px; transition: right 0.5s;">
                <p>Items Saved Succsess. <i class="fa fa-check "></i></p>
            </div>
            <div class="overlayq" id="table-overlay"></div>

        </div>
    </div>
    <div class="card ">

        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row py-1">
                        <a href="/quotation" class="btn btn-primary col-sm-2 mx-1">Close</a>
                        <button class="btn btn-primary col-sm-2 mx-1">Send</button>
                        <button id="btnImport" class="btn btn-primary col-sm-2 mx-1">Import</button>
                        <a id="btnExport" class="btn btn-primary col-sm-2 mx-1">Export</a>
                        <button id="btnrfq" class="btn btn-primary col-sm-2 mx-1">RFQ</button>
                    </div>
                    <div class="row py-1">
                        <button class="btn btn-primary col-sm-2 mx-1">Colors</button>
                        <button class="btn btn-primary col-sm-2 mx-1">GP</button>
                        <button id="Recalc" class="btn btn-primary col-sm-2 mx-1">Recalc</button>
                        <button id="fliptovsn" class="btn btn-primary col-sm-2 mx-1">Flip to VSN</button>
                        <button class="btn btn-primary col-sm-2 mx-1">MCTC</button>
                    </div>
                    <div class="row py-1">
                        <button id="btnpricing" class="btn btn-primary col-sm-2 mx-1">Pricing</button>
                        <button class="btn btn-primary col-sm-2 mx-1">Export with Cost</button>
                        <button type="button" id="BTNSHIPs" class="btn btn-primary col-sm-2 mx-1">ShipServ</button>
                        <button type="button" id="BTNOutlook" class="btn btn-primary col-sm-2 mx-1">Outlook</button>

                        {{-- <input type="text" class="form-control col-sm-2 mx-1" /> --}}
                        {{-- <input type="text" class="form-control col-sm-2 mx-1" /> --}}



                    </div>
                </div>

                <div class="col-md-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Sales Amt</th>
                                <th scope="col">Cost + Frght</th>
                                <th scope="col">Profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <td id="salesum"></td>
                                <td id="costfright"></td>
                                <td id="profitt"></td>
                            </tr>

                            <tr>
                                <th scope="row"><input style="width:50px" type="number" id="footer_inv_percent"
                                        value="" /></th>
                                <th scope="row">% Inv/Cash Disc:</th>
                                {{-- DiscIncomeAmt --}}
                                <td id="invdsic">0</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"><input style="width:50px" type="number" id="footer_cr_note_percent"
                                        value="" /></th>
                                <th scope="row">% Cr Note:</th>
                                <td id="crnote"> </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th id="aviper" scope="row"></th>
                                <th scope="row">% AVI Rebate:</th>
                                <td id="avireb"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th id="volper" scope="row"></th>
                                <th scope="row">% Volume Disc:</th>
                                <td id="volumedis"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th id="slsper" scope="row"></th>
                                <th scope="row">% Sls Comm:</th>
                                <td id="slscomm"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <th scope="row">NET SALE:</th>
                                <td id="netsales"></td>
                                <td id="netcost"></td>
                                <td id="netprofit"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xl-12" id="impmod" style="display: none">
        <div class="row">
            <div class="card col-xl-12">
                <div class="card-header">
                    <h5 class="card-title">Item Imports</h5>

                    <a name="" id="btninsertthis" class="btn btn-primary ml-5" role="button">Insert this
                        to
                        Quote</a>
                    <div class="card-tools">
                        <a name="SaveImportItem" id="SaveImportItem" class="btn btn-primary"
                            role="button">SaveImportItem</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">


                        <div class="col-md-12 table-responsive">

                            <table class="table  table-inverse table-bordered" id="importitemtable">
                                <thead class="bg-info">
                                    <tr>
                                        <th >Our&nbsp;ItemCode</th>
                                        <th style="width:500px">Our&nbsp;ItemName</th>
                                        <th>Our&nbsp;UOM</th>
                                        <th class="text-right">QTY</th>
                                        <th class="text-right">Our&nbsp;Price</th>
                                        <th>Matching</th>
                                        <th style="width:250px">Vendor</th>
                                        <th >ItemCode</th>
                                        <th style="width:500px">ItemName</th>
                                        <th>UOM</th>
                                        <th class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody id="importitembody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="mx-auto">
        <input type="hidden" name="DepartmentCode" id="DepartmentCode" value="">
        <input type="hidden" name="GodownCode" id="GodownCode" value="">
        <input type="hidden" name="ChkDeckEngin" id="ChkDeckEngin" value="">
        <input type="hidden" name="TxtQuoteID" id="TxtQuoteID" value="">
        <input type="hidden" name="TxtTokenNo" id="TxtTokenNo" value="">
        <input type="hidden" name="ShipId" id="ShipId" value="{{$ShipId ? $ShipId : ''}}">

    </div>




    <div class="modal fade" id="impalist" role="dialog">
       <div class="modal-dialog modal-xl modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>Ãƒâ€”</span></button>
                </div>
                <div class="modal-body" style="max-height: 80vh; overflow-y: auto;">

                <!--<div class="modal-body">-->
                    <div class="col-sm-12">
                        <div class="row pb-2">
                            <input type="text" class="form-control col-sm-1" name="TxtIMPAItemCode"
                                id="TxtIMPAItemCode">
                            <input type="text" class="form-control col-sm-5 mx-1" name="TxtItemNameS"
                                id="TxtItemNameS">
                            <input type="text" class="form-control col-sm-1" name="TxtPacking" id="TxtPacking">
                            <input type="text" class="form-control col-sm-3 ml-5 mr-1" name="TxtVendorName"
                                id="TxtVendorName">
                            <input type="hidden" class="form-control col-sm-1" name="TxtDepartmentCode"
                                id="TxtDepartmentCode">
                        </div>
                        <div class="table-responsive">
                            <table class="table  table-inverse" id="Dg1">
                                <thead class="bg-info">
                                    <tr>
                                        <th>IMPA&nbsp;Code</th>
                                        <th>Product&nbsp;Name</th>
                                        <th>UOM</th>
                                        <th>Cost </th>
                                        <th>Vendor</th>
                                        <th>Sale&nbsp;Price</th>
                                        <th>Dept</th>
                                        <th>Last&nbsp;Update</th>
                                        <th>User</th>
                                        <th>Item&nbsp;Code</th>
                                        <th>VendorPN</th>
                                        <th>VendorCode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $SPIMPAItem = DB::table('itemsetup')
                                            ->select('ItemCode', 'ItemName', 'UOM', 'Cost', 'VendorName', 'SalePrice', 'TypeName', 'LastUpdate', 'WorkUser', 'StockCode', 'VendorPN', 'VendorCode')
                                            ->where('ItemName', '<>', '')
                                            ->orderBy('ItemCode')
                                            ->limit(800)
                                            ->get();
                                    @endphp
                                    @foreach ($SPIMPAItem as $item)
                                    <tr>
    <td>{{ $item->ItemCode ?? 'NULL' }}</td>
    <td>{{ $item->ItemName ?? 'NULL' }}</td>
    <td>{{ $item->UOM ?? 'NULL' }}</td>
    <td>{{ isset($item->Cost) ? round($item->Cost, 2) : 'NULL' }}</td>
    <td>{{ $item->VendorName ?? 'NULL' }}</td>
    <td>{{ isset($item->SalePrice) ? round($item->SalePrice, 2) : 'NULL' }}</td>
    <td>{{ $item->TypeName ?? 'NULL' }}</td>
    <td>{{ !empty($item->LastUpdate) ? date('d-M-Y', strtotime($item->LastUpdate)) : 'NULL' }}</td>
    <td>{{ $item->WorkUser ?? 'NULL' }}</td>
    <td>{{ $item->StockCode ?? 'NULL' }}</td>
    <td>{{ $item->VendorPN ?? 'NULL' }}</td>
    <td>{{ $item->VendorCode ?? 'NULL' }}</td>
</tr>

                                        <!--<tr>-->
                                        <!--<td>{{ $item->ItemCode ?? 'N/A' }}</td>-->

                                        <!--    <td>{{ $item->ItemName }}</td>-->
                                        <!--    <td>{{ $item->UOM }}</td>-->
                                        <!--    <td>{{ round($item->Cost, 2) }}</td>-->
                                        <!--    <td>{{ $item->VendorName }}</td>-->
                                        <!--    <td>{{ round($item->SalePrice, 2) }}</td>-->
                                        <!--    <td>{{ $item->TypeName }}</td>-->
                                        <!--    <td>{{ date('d-M-Y', strtotime($item->LastUpdate)) }}</td>-->
                                        <!--    <td>{{ $item->WorkUser }}</td>-->
                                        <!--    <td>{{ $item->StockCode }}</td>-->
                                        <!--    <td>{{ $item->VendorPN }}</td>-->
                                        <!--    <td>{{ $item->VendorCode }}</td>-->
                                        <!--</tr>-->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Email Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="previewModalBody">
                     Email preview content will be inserted here 
                </div>
            </div>
        </div>
    </div>



@stop

@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css"> --}}

    <style>
.selected{
    font-weight:bold;
}
.item-data {
        position: relative;
        /* display: inline-block; */
    }
    .overlayq {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.7); /* Slightly transparent to see the table underneath */
        z-index: 99;
        display: none; /* Hide overlay by default */
    }
    </style>

@stop

@section('js')


    @section('plugins.excelplug', true)
    @section('plugins.quotaplug', true)
    <script>

        window.onload = function() {
            var QuoteNo = $('#quote_no').val();
            var user = '{{ $MWorkUser }}';
            var message = 'set';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/changecurrent',
                type: 'POST',
                data: {
                    user,
                    message,
                    QuoteNo,
                },
                success: function(data) {
                    console.log(data);
                    if (data.message == 'Already' && user !== data.User) {
                        alert('There Is Another User Is Currently Ative On This Quote User:' + data.User);
                        // history.back();
                        $('.overlay').css('display', 'block');
                        $('.spinner').hide();

                    }
                    // handle success response
                },
                error: function(error) {
                    // handle error response
                }
            });
        };
        window.onunload = function() {
            var message = 'unset';
            var QuoteNo = $('#quote_no').val();
            var user = '{{ $MWorkUser }}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/changecurrent',
                type: 'POST',
                data: {
                    message,
                    QuoteNo,
                },
                success: function(data) {
                    // handle success response
                },
                error: function(error) {
                    // handle error response
                }
            });
        };




        var itemtablle

        function updateSNo() {
            var i = 0;
            if ($('#itemsgrid tbody tr').length > 0) {
                i = 1;
            }
            $('#itemsgrid tbody tr').each(function() {
                //   var button = $(this).find('td:first-child button');
                //   button.attr('data-counter', i);
                $(this).find('td:first-child').text(i);
                i++;
            });
        }

        function ComposeTable() {

            var invval = $('#footer_inv_percent').val();
            var crnoteval = $('#footer_cr_note_percent').val();
            var slsper = $('#slsper').val();
            var volper = $('#volper').val();
            var aviper = $('#aviper').val();
            $('#salesum').text(0);
            $('#invdsic').text(0);
            $('#slscomm').text(0);
            $('#crnote').text(0);
            $('#volumedis').text(0);
            $('#avireb').text(0);

            let table = document.getElementById('myTable');
            let rows = table.rows;
            let saletotal = 0;
            let Costtotal = 0;
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].cells;
                if (cells[8].innerHTML !== '0' && cells[8].innerHTML !== '' && cells[8].innerHTML !== '0.00') {
                    rows[i].style.backgroundColor = '#abddc129';
                } else {
                    rows[i].style.backgroundColor = '';

                }

                cells[9].innerHTML = parseFloat(cells[4].innerHTML * cells[8].innerHTML).toFixed(2);
                saletotal += Number(cells[9].innerHTML);
                Costtotal += Number(cells[4].innerHTML * cells[7].innerHTML);
            }

            $('#salesum').text(parseFloat(saletotal).toFixed(2));
            $('#invdsic').text(parseFloat((saletotal * invval / 100)).toFixed(2));
            $('#crnote').text(parseFloat(saletotal * crnoteval / 100).toFixed(2));
            $('#slscomm').text(parseFloat(saletotal * slsper / 100).toFixed(2));
            $('#volumedis').text(parseFloat(saletotal * volper / 100).toFixed(2));
            $('#avireb').text(parseFloat(saletotal * aviper / 100).toFixed(2));
            $('#costfright').text(parseFloat(Costtotal).toFixed(2));
            $('#footer_items').text(rows.length);
            $('#footer_value').text(parseFloat(saletotal).toFixed(2));
            $('#footer_cost').text(parseFloat(Costtotal).toFixed(2));
            $('#footer_gp').text(parseFloat(saletotal - Costtotal).toFixed(2));


            var salse = ($('#salesum').text());
            var slscomm = ($('#slscomm').text());
            var volumedis = ($('#volumedis').text());
            var avireb = ($('#avireb').text());
            var crnote = ($('#crnote').text());
            var invdsic = ($('#invdsic').text());
            var costfright = ($('#costfright').text);
            $('#profitt').text(parseFloat(saletotal - Costtotal).toFixed(2));
            var pravit = $('#profitt').text();

            var allcom = parseFloat(parseFloat(slscomm) + parseFloat(volumedis) + parseFloat(avireb) + parseFloat(crnote) +
                parseFloat(invdsic));
            $('#netsales').text((salse - allcom).toFixed(2));
            $('#netcost').text(parseFloat(Costtotal + allcom).toFixed(2));
            var netsales = $('#netsales').text();
            var netcost = $('#netcost').text();
            $('#netprofit').text((netsales - netcost).toFixed(2));

        }
 
            
      function ImpaSearch($value) {
      $('#impa').prop('disabled', true);
  
 

    var DepartmentCode = $('#DepartmentCode').val();
    var GodownCode = $('#GodownCode').val();
    var ChkDeckEngin = $('#ChkDeckEngin').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: '{{ URL::to("itemnameserimpa") }}',
        data: {
            impa: $value
        },
        beforeSend: function() {
            $('.overlay').show();

            // $('#item_code').val('');
            $('#item_desc').val('');
            $('#uom').val('');
            $('#vpart_no').val('');
            $('#vendor_price').val('');
            $('#sell_price').val('');
            $('select[name="VenderName"]').val('');
            $('#sell_price').attr('title', '');
        },
        success: function(item) {
            console.log(item);

            if (item.length > 1) {
           
            } else if (item.length === 1 && item[0].ItemCode) {
                $('#item_code').val(item[0].ItemCode);
                $('#item_desc').val(item[0].ItemName);
                $('#uom').val(item[0].UOM);
                $('#vpart_no').val(item[0].VPartCode);
                $('#vendor_price').val(parseFloat(item[0].VendorPrice).toFixed(2));
                $('#sell_price').val(parseFloat(item[0].OurPrice).toFixed(2));
                $('select[name="VenderName"]').val(item[0].VenderCode);
                
                 // âœ… Append vendor option dynamically if it doesn't exist
    const vendorCode = item[0].VenderCode;
    const vendorName = item[0].VenderName ?? 'Unnamed Vendor';
    const vendorDropdown = $('select[name="VenderName"]');

                if (item[0].LastDate) {
                    var lastdate = new Date(item[0].LastDate);
                    var LDate = lastdate.toISOString().substring(0, 10);
                    $('#sell_price').attr('title', LDate);
                }

                $('#qty').focus();
                
     

            } else {
              
                alert("There Is No Item in IMPA Code .");
            }
        },
        error: function(xhr, status, error) {
            console.error('IMPA search error:', error);
        },
        complete: function() {
            $('.overlay').hide();
        }
    });
}


     
        $(document).ready(function() {



          let impaSearchDone = false;
$('#btnimpa').click(function (e) {
    e.preventDefault();

    if (impaSearchDone) return; 

    $('#impalist').modal('show');

         if (impaSearchDone) {
        e.preventDefault(); // ❌ Don't allow manual close if search is already done
    }
    $('#impa').prop('disabled', true);
    $('#btnimpa').addClass('disabled').css('pointer-events', 'none');

    impaSearchDone = true;
});


    
         
            

            $(".dt-button").removeClass("dt-button")

            $('#btnImport').click(function(e) {
                e.preventDefault();
                $('#importModal').modal('show');
            });


            $("#itemsgrid tbody").on("contextmenu", function(event) {
                event.preventDefault();
            });

            $('#itemsgrid tbody').sortable({

                update: function(event, ui) {
                    updateSNo();
                },
          
            });
            $('#itemsgrid tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
                });

                // Handle delete button click
                function deleterow(){
                    // Remove selected rows
                    $('#itemsgrid tbody').find('.selected').remove();
                    updateSNo();
                };

            var currentTabIndex = 0;
            var maxTabIndex = $('#producers-table tbody tr').length;
            $('#producers-table').on('keydown', 'tr', function(event) {
                var keyCode = event.keyCode || event.which;
                var currentTabIndex = parseInt($(this).attr('tabindex'));

                if (keyCode === 38) { // up arrow
                    event.preventDefault();
                    if (currentTabIndex > 3) {
                        $('tr[tabindex="' + (currentTabIndex - 1) + '"]').focus();
                    }
                } else if (keyCode === 40) { // down arrow
                    event.preventDefault();
                    if (currentTabIndex < ($('#producers-table tbody tr').length + 2)) {
                        $('tr[tabindex="' + (currentTabIndex + 1) + '"]').focus();
                    }
                }
            });


            $('#opnitemfull').click(function() {
                //    alert();
                $('#searchrmodfull').modal('show');

            });




            $('#cusmod').hide();
            $('#btninsertthis').click(function(e) {
                e.preventDefault();
                // alert('hahaha');
                let table = document.getElementById('importitembody');

                // let table = document.getElementById('myTable');
                let rows = table.rows;

                let dataarray = [];
                for (let i = 0; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    var selectElement = cells[1].querySelector("select");
                    var ItemName = selectElement.value;
                    console.log(cells[3].innerHTML);
                    dataarray.push({


                        ItemCode: cells[0] ? cells[0].innerHTML : '',
                        ItemName: cells[1] ? ItemName : '',
                        UOM: cells[2] ? cells[2].innerHTML : '',
                        QTY: cells[3] ? cells[3].innerHTML : '',
                        Price: cells[4] ? cells[4].innerHTML : '',
                        Vendor: cells[6] ? cells[6].innerHTML : '',
                        Vendorcode: cells[7] ? cells[7].innerHTML : '',


                    });

                }
         

                let table2 = document.getElementById('myTable');
                table2.innerHTML = ""; // Clear the table
                let Id = 0;
                dataarray.forEach(function(item) {
                    Id = Id + 1
                    let row = table2.insertRow();

                    function createCell(content) {
                        let cell = row.insertCell();
                        cell.innerHTML = content;
                        return cell;
                    }
                    createCell(Id);
                       createCell(impa);  
                    // createCell('');
                    createCell(item.ItemCode);
                    createCell(item.ItemName);
                    let QtyCell = createCell(item.QTY);
                    QtyCell.contentEditable = true;
                    QtyCell.title = "Right Click For Edit";
                    QtyCell.classList.add("blurCell");

                    createCell(item.UOM);
                    createCell('');

                    let VPrice = createCell(item.Price);
                    VPrice.contentEditable = true;
                    VPrice.title = "Right Click For Edit";
                    VPrice.classList.add("blurCell");

                    let SPrice = createCell('');
                    SPrice.contentEditable = true;
                    SPrice.title = "Right Click For Edit";
                    SPrice.classList.add("blurCell");


                    createCell('');
                    createCell(item.Vendor);
                    let cusnote = createCell('');
                    cusnote.contentEditable = true;
                    cusnote.title = "Right Click For Edit";
                    let Vennote = createCell('');
                    Vennote.contentEditable = true;
                    Vennote.title = "Right Click For Edit";
                    let Intnote = createCell('');
                    Intnote.contentEditable = true;
                    Intnote.title = "Right Click For Edit";
                    let vesselNote = createCell('');
                    vesselNote.contentEditable = true;
                    vesselNote.title = "Right Click For Edit";
                    let vendorcode = createCell(item.Vendorcode);
                    vendorcode.title = "Right Click For Edit";
                    vendorcode.hidden = true;


                });
                $('.blurCell').blur();
                updateDataOrder();

            });

        
            // $('#impa').on('blur', function(event) {
            //         $value = $(this).val();
            //         ImpaSearch($value);
            // });
              
              $('#impa').on('blur', function(event) {
    if (!impaSearchDone) {
        let value = $(this).val().trim();
        if (value !== '') {
            ImpaSearch(value);
            impaSearchDone = true;
        }
    }
});




        
            $('#file-input').on('change', function() {
                if ($(this).val() != '') {
                    $('#import-button').click();
                    $('#import-button').prop('disabled', false);
                } else {
                    $('#import-button').prop('disabled', true);

                }
            });



            function RegisterItem() {
                var DepartmentName = $('#departmentname').val();
                var DepartmentCode = $('#DepartmentCode').val();
                window.open("/Item-Register-Setup?DepartmentName=" + DepartmentName + "&DepartmentCode=" +
                    DepartmentCode);



                // <a href="">Go to Item-Register-Setup</a>

            };
            //     $("#qty").on("keydown", function(event) {
            //         if (event.key === "Enter") {
            //             $('#saveitem').click();
            //   }
            // });

            $('#Vendrorname').on('change', function() {
                var itemname = $('#item_desc').val();
                if (itemname == "") {
                    return;
                }

                var vendorName = $("#Vendrorname option:selected").text();
                var VenderCode = $("#Vendrorname option:selected").val();

                // alert(VenderCode);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('searchvendor') }}',
                    data: {
                        VenderCode,
                        itemname,
                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function($response) {
                        // var itemcode = $response.itemcode;
                        if ($response.status == 'Success') {
                            $('#vendor_price').val($response.VenderProductList.VendorPrice);
                        }

                        console.log($response);
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });

            });


            var isCtrlPressed = false;

            $("#item_desc").on("keydown", function(event) {
                if (event.which === 17) { // Ctrl key
                    isCtrlPressed = true;
                } else if (event.which === 32 && isCtrlPressed) { // Space key while Ctrl is pressed
                    // alert("Ctrl + Space pressed");
                    // $('#myModal').modal('show');
                    $('#cusmod').show();
                }
            });

            $("#item_desc").on("keyup", function(event) {
                if (event.which === 17) { // Ctrl key
                    isCtrlPressed = false;
                }
            });
            $("#item_desc").on("keyup", function() {
                keywords = $('#item_desc').val();
               if (keywords.length === 1) {
 
                    $('#searchrmod').modal('show');
                $('#cusmod').show();

              $('#itemnameser').val(keywords);

                    // alert('yes');
                }
            });












function clearFormFunction(isSubmitedFromSave = false)
{
    impaSearchDone = false;  // ✅ Reset search flag

    document.getElementById("sno").value = '';
        document.getElementById("impa").value = '';
    document.getElementById("uom").value = '';
    document.getElementById("vpart_no").value = '';
    document.getElementById("qty").value = '';
    document.getElementById("Vendrorname").value = '';
    document.getElementById("vendor_price").value = '';
    document.getElementById("sell_price").value = '';
    document.getElementById("total").value = '';
    document.getElementById("item_desc").value = '';
    document.getElementById("customer_notes").value = '';
    document.getElementById("notes").value = '';
    document.getElementById("internal_notes").value = '';
    document.getElementById("vessel_notes").value = '';

    $("#Vendrorname").prop("disabled", false);
    $('#Vendrorname option:eq(0)').prop('selected', true);
    $('#Vendrorname').click();
    $('#vendoredit').click();

    if (!isSubmitedFromSave) {
        // $('#impa').val('').prop('disabled', false);
        $('#item_code').val('').prop('disabled', false);
        $('#btnimpa').removeClass('disabled').css('pointer-events', 'auto');
    }
}

$(document).on("click", '#clearform', function() {
    clearFormFunction();
});

            // function clearFormFunction(isSubmitedFromSave = false)
            // {
            //       impaSearchDone = false;
            //     document.getElementById("sno").value = '';
            //   $('#item_code').val('').prop('disabled', false);
            //   $('#impa').val('').prop('disabled', false);  
            //   $('#btnimpa').removeClass('disabled').css('pointer-events', 'auto');
            //     document.getElementById("uom").value = '';
            //     document.getElementById("vpart_no").value = '';
            //     document.getElementById("qty").value = '';
            //     document.getElementById("Vendrorname").value = '';
            //     document.getElementById("Vendrorname").value = '';
            //     //  document.getElementById("vendoredit").innerHTML= '';
            //     document.getElementById("vendor_price").value = '';
            //     document.getElementById("sell_price").value = '';
            //     document.getElementById("total").value = '';
            //     document.getElementById("item_desc").value = '';
            //     document.getElementById("customer_notes").value = '';
            //     document.getElementById("notes").value = '';
            //     document.getElementById("internal_notes").value = '';
            //     document.getElementById("vessel_notes").value = '';
            //     $("#Vendrorname").prop("disabled", false);
            //     $('#Vendrorname option:eq(0)').prop('selected', true);
            //     $('#Vendrorname').click();
            //     $('#vendoredit').click();
                
            //     if(!isSubmitedFromSave)
            //     {
            //         // add which do you not want to fill 
            //       $('#impa').val('').prop('disabled', false);  
            //       $('#btnimpa').val('').prop('disabled', false); 
            //       $('#item_code').val('').prop('disabled', false);  
                        
          
            //     }
            // }

            // $(document).on("click", '#clearform', function() {
            //      impaSearchDone = false; 

            //     clearFormFunction();
                


            // });




            document.addEventListener("keydown", function(event) {

                if (event.altKey && event.keyCode == 67) {

                    $('#customer_notes').focus();
                } else if (event.altKey && event.keyCode == 86) {
                    // alert(event.keyCode);

                    $('#notes').focus();
                } else if (event.altKey && event.keyCode == 73) {
                    // alert(event.keyCode);

                    $('#internal_notes').focus();
                }
            });






            $(document).on("click", '#saveitem', function() {
                //    alert('click'); // // Get the values of the input fields and select element


                var itemCode = document.getElementById("item_code").value;
                var qty = document.getElementById("qty").value;

                var sno = document.getElementById("sno").value;
                var impa = document.getElementById("impa").value;
                var uom = document.getElementById("uom").value;
                var vpart_no = document.getElementById("vpart_no").value;
                var vendorName = $("#Vendrorname option:selected").text();
                var VenderCode = $("#Vendrorname option:selected").val();
                var vendor_price = document.getElementById("vendor_price").value;
                var sell_price = document.getElementById("sell_price").value;
                var total = document.getElementById("total").value;
                var item_desc = document.getElementById("item_desc").value;
                var customer_notes = document.getElementById("customer_notes").value;
                var notes = document.getElementById("notes").value;
                var internal_notes = document.getElementById("internal_notes").value;
                var vessel_notes = document.getElementById("vessel_notes").value;

                var DepartmentName = $('#departmentname').val();
                var DepartmentCode = $('#DepartmentCode').val();
                var dataob = {
                    'sno': sno,
                    'impa': impa,
                    'uom': uom,
                    'vpart_no': vpart_no,
                    'vendorName': vendorName,
                    'VenderCode': VenderCode,
                    'vendor_price': vendor_price,
                    'sell_price': sell_price,
                    'total': total,
                    'item_desc': item_desc,
                    'customer_notes': customer_notes,
                    'notes': notes,
                    'internal_notes': internal_notes,
                    'vessel_notes': vessel_notes,
                    'item_code': item_code,
                    'qty': qty,
                    'DepartmentName': DepartmentName,
                    'DepartmentCode': DepartmentCode
                };

                var qty = $('#qty').val().trim();
                var item_code = $('#item_code').val().trim();
                // console.log(item_code);
                // console.log(qty);
                if (item_code == "") {
                    if (qty == '' || qty == 0) {

                        alert('Please enter quantity');
                        $('#qty').focus();
                        return;

                    }
                    if ($('#vendor').val() == "") {
                        alert('Please enter vendor');
                        $('#vendor').focus();
                        return;
                    }
                    if (item_desc == '') {
                        alert('No Item Selected')
                        return;
                    }
                    if (confirm("You have to Add New Item From Registration Setup")) {
                        // console.log('ajaxgoing');
                        console.log(dataob);
                        if ($('#vendor_price').val() == "") {
                            alert('Please add Vendor Price');
                            return;
                        }
                        if ($('#uom').val() == "") {
                            alert('Please add UOM');
                            return;
                        }
                        RegisterItem();
                        //
                    } else {
                        return;
                    }
                    // alert('need update');

                }
                if (qty == '' || qty == 0) {
                    alert('Please enter quantity');
                    $('#qty').focus();
                    return;
                }

                if ($('#vendor').val() == "") {
                    alert('Please enter vendor');
                    $('#vendor').focus();
                    return;
                }




                itemcode = $('#item_code').val().trim();

                contsaveitem(itemcode);
                //   setTimeout(function() {
                //     console.log("...30sec!");
                //   }, 30000);



            });

            function contsaveitem(itemcode) {
                var itemCode = document.getElementById("item_code").value;
                var qty = document.getElementById("qty").value;
                // alert(itemcode);
                var sno = document.getElementById("sno").value;
                var impa = document.getElementById("impa").value;
                var uom = document.getElementById("uom").value;
                var vpart_no = document.getElementById("vpart_no").value;
                var vendorName = $("#Vendrorname option:selected").text();
                var VenderCode = $("#Vendrorname option:selected").val();
                var vendor_price = document.getElementById("vendor_price").value;
                var sell_price = document.getElementById("sell_price").value;
                var total = document.getElementById("total").value;
                var item_desc = document.getElementById("item_desc").value;
                var customer_notes = document.getElementById("customer_notes").value;
                var notes = document.getElementById("notes").value;
                var internal_notes = document.getElementById("internal_notes").value;
                var vessel_notes = document.getElementById("vessel_notes").value;

                var item_code = itemcode;
                var qty = $('#qty').val().trim();


                var table = document.getElementById("myTable");
                let rows = table.rows;
                if (sno) {
                    for (let i = 0; i < rows.length; i++) {
                        let cells = rows[i].cells;
                        if (cells[0].innerHTML == sno) {
                            for (let j = 0; j < cells.length; j++) {
                                console.log(cells[j].innerHTML);
                            }
                            cells[1].innerHTML = impa;
                            cells[2].innerHTML = item_code;
                            cells[3].innerHTML = item_desc;
                            cells[4].innerHTML = qty;
                            cells[5].innerHTML = uom;
                            cells[6].innerHTML = vpart_no;
                            cells[7].innerHTML = vendor_price;
                            cells[8].innerHTML = sell_price;
                            cells[9].innerHTML = total;
                            cells[10].innerHTML = vendorName;
                            cells[11].innerHTML = customer_notes;
                            cells[12].innerHTML = notes;
                            cells[13].innerHTML = internal_notes;
                            cells[14].innerHTML = vessel_notes;
                            cells[15].innerHTML = VenderCode;
                        }
                    }

                }else{
                    var newRow = table.insertRow(-1);
                    // Insert cells in the new row
                    var snoCell = newRow.insertCell(0);
                    var impaCell = newRow.insertCell(1);
                    var itemCodeCell = newRow.insertCell(2);
                    var item_descCell = newRow.insertCell(3);
                    var qtyCell = newRow.insertCell(4);
                    var uomCell = newRow.insertCell(5);
                    var vpart_noCell = newRow.insertCell(6);
                    var vendor_priceCell = newRow.insertCell(7);
                    var sell_priceCell = newRow.insertCell(8);
                    var totalCell = newRow.insertCell(9);
                    var vendorNameCell = newRow.insertCell(10);
                    var customer_notesCell = newRow.insertCell(11);
                    var notesCell = newRow.insertCell(12);
                    var internal_notesCell = newRow.insertCell(13);
                    // Add the values to the cells
                    snoCell.innerHTML = sno;
                    
                    impaCell.innerHTML = impa;
                    itemCodeCell.innerHTML = item_code;
                    uomCell.innerHTML = uom;
                    vpart_noCell.innerHTML = vpart_no;
                    qtyCell.innerHTML = qty;
                    qtyCell.contentEditable = true;
                    qtyCell.setAttribute('class', 'blurCell');
                    vendorNameCell.innerHTML = vendorName;
                    vendor_priceCell.innerHTML = vendor_price;
                    vendor_priceCell.setAttribute('class', 'blurCell');
                    vendor_priceCell.contentEditable = true;
                    sell_priceCell.innerHTML = sell_price;
                    sell_priceCell.setAttribute('class', 'blurCell');
                    sell_priceCell.contentEditable = true;
                    totalCell.innerHTML = total;
                    item_descCell.innerHTML = item_desc;
                    customer_notesCell.innerHTML = customer_notes;
                    customer_notesCell.contentEditable = true;
                    notesCell.innerHTML = notes;
                    notesCell.contentEditable = true;
                    internal_notesCell.innerHTML = internal_notes;
                    internal_notesCell.contentEditable = true;
                    var vessel_notesCell = newRow.insertCell(14);
                    vessel_notesCell.innerHTML = vessel_notes;
                    vessel_notesCell.hidden = true;
                    var vender_codeCell = newRow.insertCell(15);
                    vender_codeCell.innerHTML = VenderCode;
                    vender_codeCell.hidden = true;

                }

                clearFormFunction(true)

                ComposeTable();
                updateSNo();
                // Swaal.fire({
                //     title: 'Save item?',
                //     text: 'Do You Want to Save to Database',
                //     icon: 'question',
                //     showCancelButton: true,
                //     confirmButtonText: 'Save',
                //     cancelButtonText: 'Cancel',
                //     showLoaderOnConfirm: true, // You can display a loader animation while confirming
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         updateDataOrder();
                //     }
                // });
            }





            function updateDataOrder() {
                let table = document.getElementById('myTable');
                let rows = table.rows;
                let quote_no = $('#quote_no').val();
                let event_no = $('#event_no').val();

                let dataarray = [];
                for (let i = 0; i < rows.length; i++) {


                    let cells = rows[i].cells;
                    dataarray.push({


                        // actionCell: cells[0] ? cells[0].innerHTML : '',
                        snoCell: cells[0] ? cells[0].innerHTML : '',
                        impaCell: cells[1] ? cells[1].innerHTML : '',
                        itemCodeCell: cells[2] ? cells[2].innerHTML : '',
                        item_descCell: cells[3] ? cells[3].innerHTML : '',
                        qtyCell: cells[4] ? cells[4].innerHTML : '',
                        uomCell: cells[5] ? cells[5].innerHTML : '',
                        vpart_noCell: cells[6] ? cells[6].innerHTML : '',
                        vendor_priceCell: cells[7] ? cells[7].innerHTML : '',
                        sell_priceCell: cells[8] ? cells[8].innerHTML : '',
                        totalCell: cells[9] ? cells[9].innerHTML : '',
                        vendorNameCell: cells[10] ? cells[10].innerHTML : '',
                        customer_notesCell: cells[11] ? cells[11].innerHTML : '',
                        notesCell: cells[12] ? cells[12].innerHTML : '',
                        internal_notesCell: cells[13] ? cells[13].innerHTML : '',
                        vessel_notesCell: cells[14] ? cells[14].innerHTML : '',
                        vendor_codeCell: cells[15] ? cells[15].innerHTML : '',







                    });
                    // }
                }
                var slscomm = ($('#slscomm').text());
                var volumedis = ($('#volumedis').text());
                var avireb = ($('#avireb').text());
                var crnote = ($('#crnote').text());
                var invdsic = ($('#invdsic').text());
                var port = ($('#Warehouse').val());
                var portcode = ($("#Warehouse option:selected").text());
                var DepartmentCode = $('#DepartmentCode').val();
                var departmentname = $('#departmentname').text();
                var CustomerRefNo = $('#customer_ref_no').val();
                var allcom = parseFloat(parseFloat(slscomm) + parseFloat(volumedis) + parseFloat(avireb) +
                    parseFloat(crnote) + parseFloat(invdsic));
                //  console.log(allcom);
                // var allcom = (slscomm+volumedis+avireb+crnote+invdsic);

                var sum = $('#salesum').text();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
     
                $.ajax({
    type: 'post',
    url: '{{ route('QuotationItemsave') }}',
    data: {
        dataarray,
        quote_no,
        event_no,
        allcom,
        port,
        portcode,
        DepartmentCode,
        departmentname,
        CustomerRefNo,
        sum,
    },
    success: function(response) {
        // Popup removed as per your request
    console.log(response)
        // Optional: Console log or silent confirmation
        console.log('Quotation saved successfully.');
    },
    error: function(xhr) {
        console.error('Error saving quotation:', xhr.responseText);
    }
});

            }
            $(document).ready(function() {
                $("#footer_inv_percent").on("keydown", function(event) {
                    if (event.which === 13) {
                        ComposeTable()
                    }
                });
                $("#footer_cr_note_percent").on("keydown", function(event) {
                    if (event.which === 13) {
                        ComposeTable()
                    }
                });
            });


            $(document).on("blur", '#footer_cr_note_percent', function() {
                ComposeTable()
            });
            $(document).on("blur", '#footer_inv_percent', function() {

                ComposeTable()
            });


            //  }
            $(document).ready(function() {
                // ComposeTable();
                // Get the elements we need
                const cusmodEl = document.querySelector('#cusmod');
                const qtyEl = document.querySelector('#qty');

                // Check if the "cusmod" element has "display: none" applied
                if (window.getComputedStyle(cusmodEl).display === 'none') {
                    // Set the tab index of the "qty" element to 3
                    qtyEl.setAttribute('tabindex', 17);
                }

                $('#fliptovsn').click(function(e) {
                    var eventno = $('#event_no').val();
                    var quote_no = $('#quote_no').val();
                    // console.log(eventno);


                    let table = document.getElementById('myTable');
                    let rows = table.rows;
                    let checkitem = 0;
                    for (let i = 0; i < rows.length; i++) {
                        let cells = rows[i].cells;
                        if (cells[2].innerHTML !== '0' && cells[2].innerHTML !== '') {
                            checkitem += Number(1);
                        }

                    }
                    console.log(rows.length);
                    console.log(checkitem);
                    if (checkitem = rows.length) {
                        window.location.href = "quotation/fliptovsn?EventNo=" + eventno +
                            '&quoteno=' + quote_no;
                        // alert('sent');
                    } else {

                        alert('Please Check Item Code');
                    }
                });

            });

            $(document).on("click", '#Recalc', function() {
                let quote_no = $('#quote_no').val();
                let event_no = $('#event_no').val();
                var kg_to_lb = $("#footer_kg_to_lb").is(":checked");
                var Warehousecode = $('#Warehouse').val();
                var Warehousename = $("#Warehouse option:selected").text();

                // console.log(kg_to_lb);



                let table = document.getElementById('myTable');
                let rows = table.rows;

                let dataarray = [];
                for (let i = 1; i < rows.length; i++) {
                    let cells = rows[i].cells;
                    dataarray.push({


                        // actionCell: cells[0] ? cells[0].innerHTML : '',
                        snoCell: cells[0] ? cells[0].innerHTML : '',
                        impaCell: cells[1] ? cells[1].innerHTML : '',
                        itemCodeCell: cells[2] ? cells[2].innerHTML : '',
                        item_descCell: cells[3] ? cells[3].innerHTML : '',
                        qtyCell: cells[4] ? cells[4].innerHTML : '',
                        uomCell: cells[5] ? cells[5].innerHTML : '',
                        vpart_noCell: cells[6] ? cells[6].innerHTML : '',
                        vendor_priceCell: cells[7] ? cells[7].innerHTML : '',
                        sell_priceCell: cells[8] ? cells[8].innerHTML : '',
                        totalCell: cells[9] ? cells[9].innerHTML : '',
                        vendorNameCell: cells[10] ? cells[10].innerHTML : '',
                        customer_notesCell: cells[11] ? cells[11].innerHTML : '',
                        notesCell: cells[12] ? cells[12].innerHTML : '',
                        internal_notesCell: cells[13] ? cells[13].innerHTML : '',
                        vessel_notesCell: cells[14] ? cells[14].innerHTML : '',
                        vendor_codeCell: cells[15] ? cells[15].innerHTML : '',







                    });

                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('Recal') }}',
                    data: {
                        quote_no,
                        event_no,
                        dataarray,
                        kg_to_lb,
                        Warehousecode,
                        Warehousename,


                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function($response) {

                        if ($response.Message == 'Converted to LB') {

                            alert(
                                'Success : ' + $response.Message
                            );
                        } else {
                            console.log($response.Message);
                        }
                        console.log($response.Success);
                        console.log($response.datarowes);
                        //   console.log($response.insert_update);
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });

            });

            $(document).on("blur", '.blurCell', function() {
                ComposeTable();

            });
            $(document).on("keydown", '.blurCell', function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    ComposeTable();

                }
            });

        });
    
    </script>







    <script>
        var th = ['', 'thousand', 'million', 'billion', 'trillion'];
        var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen',
            'nineteen'
        ];
        var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

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
                        str += tw[Number(n[i]) - 2] + ' ';

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

    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/ajax-live-search/css/fontello.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/ajax-live-search/css/animation.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/ajax-live-search/css/ajaxlivesearch.css') }}"> --}}
    <!--  -->
    {{-- <script src="{{ URL::asset('assets/ajax-live-search/js/ajaxlivesearch.js') }}"></script> --}}

    <script></script>
    <script type="text/javascript" src="assets/js/printThis.js"></script>

    <script>
        $(document).ready(function() {
            $("#qty").on("keydown", function(event) {
                if (event.which === 13) {
                    $("#saveitem").click();


                }
            });
            $("#sell_price").on("keydown", function(event) {
                if (event.which === 13) {
                    $("#saveitem").click();


                }
            });
            $("#vendor_price").on("keydown", function(event) {
                if (event.which === 13) {
                    $("#saveitem").click();


                }
            });
        });

        var table3 = $('#importitemtable').DataTable({

            scrollY: 450,
            deferRender: true,
            scroller: true,
            paging: false,
            info: false,
            ordering: false,
            searching: false,
            responsive: true,


            });
        $(document).ready(function() {

            var table = document.getElementById("itemsgrid");

            // Add event listener for double-click on table rows
            table.addEventListener("dblclick", function(event) {

                // Get the row index of the double-clicked row
                var rowIndex = event.target.parentElement.rowIndex;

                // Get the first cell value of the selected row (Serial Number)
                var serialNumber = table.rows[rowIndex].cells[0].innerHTML;

                // Get the values for the other cells in the selected row
                var impa = table.rows[rowIndex].cells[1].innerHTML;
                var itemCode = table.rows[rowIndex].cells[2].innerHTML;
                var itemName = table.rows[rowIndex].cells[3].innerHTML;
                var qty = table.rows[rowIndex].cells[4].innerHTML;
                var uom = table.rows[rowIndex].cells[5].innerHTML;
                var vpart = table.rows[rowIndex].cells[6].innerHTML;
                var vendorPrice = table.rows[rowIndex].cells[7].innerHTML;
                var sellPrice = table.rows[rowIndex].cells[8].innerHTML;
                var total = table.rows[rowIndex].cells[9].innerHTML;
                var vendorname = table.rows[rowIndex].cells[10].innerHTML;
                var customerNote = table.rows[rowIndex].cells[11].innerHTML;
                var vendorNote = table.rows[rowIndex].cells[12].innerHTML;
                var internalBuyerNote = table.rows[rowIndex].cells[13].innerHTML;
                var vesselNote = table.rows[rowIndex].cells[14].innerHTML;
                var vendorcode = table.rows[rowIndex].cells[15].innerHTML;
                console.log("Reached here in d click ",impa)
                // Set the values for the fields in the form
                document.querySelector('#sno').value = serialNumber;
                document.querySelector('#impa').value = impa;
                document.querySelector('#item_code').value = itemCode;
                document.querySelector('#item_desc').value = itemName;
                document.querySelector('#qty').value = qty;
                document.querySelector('#uom').value = uom;
                document.querySelector('#vpart_no').value = vpart;
                document.querySelector('#vendor_price').value = vendorPrice;
                document.querySelector('#sell_price').value = sellPrice;
                document.querySelector('#total').value = total;
                document.querySelector('#customer_notes').value = customerNote;
                document.querySelector('#notes').value = vendorNote;
                document.querySelector('#internal_notes').value = internalBuyerNote;
                document.querySelector('#vessel_notes').value = vesselNote;

                $('#Vendrorname').val(vendorcode);
                // table.rows[rowIndex].remove();
                updateSNo();


            });
        });


        function reSum() {

            var qty = parseInt($('#qty').val());
            var sell_price = parseFloat($('#sell_price').val())
            if (!isNaN(qty) && !isNaN(sell_price)) {
                var amonut = qty * sell_price
                $('#total').val(amonut.toFixed(2));
            }

        }

        function displayImportedData(data) {
                let table = document.getElementById('importitembody');
                table.innerHTML = ""; // Clear the table
                var id = 0; // Clear the table
                data.forEach(function(item) {
                    let row = table.insertRow();

                    let ItemCodegetCell = row.insertCell(0);
                    ItemCodegetCell.innerHTML = item.ItemCodeget;
                    ItemCodegetCell.contentEditable = 'true';
                    ItemCodegetCell.classList.add('itemcodetd');

                    let ItemNamegetCell = row.insertCell(1);
                    if (item && item.ItemNameget) {
                        let html = `<select class="form-control itemgselect" id="">`;
                        var Itemname = item.ItemNameget;

                        Itemname.forEach(function (itemit) {
                            html += '<option data-percentage="'+itemit.Percentage+'" data-itemcode="'+itemit.ItemCode+'" data-salerate="'+itemit.SaleRate+'" data-vendername="'+itemit.VenderName+'" data-vendercode="'+itemit.VenderCode+'" data-uom="'+itemit.UOM+'" value="' + itemit.ItemName + '"> ' + itemit.ItemName + ' </option>';
                        });

                        html += `</select>`;
                        ItemNamegetCell.innerHTML = html;
                    } else {
                        // Handle the case where 'item' or 'item.ItemNameget' is undefined
                        console.error("Error: 'item' or 'item.ItemNameget' is undefined.");
                    }

                    let UOMgetCell = row.insertCell(2);
                    UOMgetCell.innerHTML = item.UOMget;
                    UOMgetCell.classList.add('UOMtd');

                    UOMgetCell.contentEditable = 'true';
                    UOMgetCell.addEventListener('blur', function() {
                        this.textContent = this.textContent.toUpperCase();
                    });
                    let QTYCell = row.insertCell(3);
                    QTYCell.innerHTML = parseFloat(item.Qty).toFixed(2);
                    QTYCell.style.Align = "right";

                    let PricegetCell = row.insertCell(4);
                    PricegetCell.innerHTML = parseFloat(item.Priceget).toFixed(2);
                    PricegetCell.style.Align = "right";
                    PricegetCell.classList.add('saleratetd');
                    PricegetCell.contentEditable = 'true';

                    let percentage = row.insertCell(5);
                    percentage.classList.add('Percentagetd');
                    percentage.innerHTML = parseFloat(item.percentage).toFixed(2) + '%';

                    let VendorCell = row.insertCell(6);
                    VendorCell.innerHTML = item.Vendor;
                    VendorCell.classList.add('Vendortd');
                    // VendorCell.hidden = 'true';


                    let VendorcodeCell = row.insertCell(7);
                    VendorcodeCell.innerHTML = item.Vendorcode;
                    VendorcodeCell.classList.add('Vendorcodetd');
                    VendorcodeCell.hidden = 'true';


                    let ItemCodeCell = row.insertCell(8);
                    ItemCodeCell.innerHTML = item.ItemCode;


                    let ItemNameCell = row.insertCell(9);
                    ItemNameCell.innerHTML = item.ItemName;

                    let UOMCell = row.insertCell(10);
                    UOMCell.innerHTML = item.UOM;

                    let PriceCell = row.insertCell(11);
                    PriceCell.innerHTML = parseFloat(item.Price).toFixed(2);
                    PriceCell.style.Align = "right";


                });

                $('#impmod').show();
                table3.columns.adjust();
                $('.itemgselect').change(function (e) {
                    e.preventDefault();
                    var selectedOption = $(this).find('option:selected');

                    var Percentage = selectedOption.data('percentage');
                    var itemcode = selectedOption.data('itemcode');
                    var salerate = selectedOption.data('salerate');
                    var vendercode = selectedOption.data('vendercode');
                    var vendername = selectedOption.data('vendername');
                    var uom = selectedOption.data('uom');
                    var row = $(this).closest('tr');
                    var Percentagetd = $(row).find('.Percentagetd').text(parseFloat(Percentage).toFixed(2)+'%');
                    var itemcodetd = $(row).find('.itemcodetd').text(itemcode);
                    var Vendortd = $(row).find('.Vendortd').text(vendername);
                    var Vendorcodetd = $(row).find('.Vendorcodetd').text(vendercode);
                    var UOMtd = $(row).find('.UOMtd').text(uom);
                    var saleratetd = $(row).find('.saleratetd').text(parseFloat(salerate).toFixed(2));


                });

            }

        $(document).ready(function() {

            $('#quote_no').blur(function(e) {
                e.preventDefault();
                dataserchandget();

            });


            function dataserchandget() {
                
                var quoteno = $('#quote_no').val();
                // var eventno = $('.event_no').text();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('Quotationget') }}',
                    data: {
                        quoteno,
                        // eventno,



                    },
                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.DataQuotesMaster) {
                             const Master = response.DataQuotesMaster;

                            console.log(Master);

                            $('#TxtQuoteID').val(Master.QuoteID);
                            $('.event_no').text(Master.EventNo);
                            $('#event_no').val(Master.EventNo);
                            $('.customer').text(Master.CustomerName);
                            $('.vessel').text(Master.VesselName);
                            $('.customer_ref_no').text(Master.CustomerRefNo);
                            $('#departmentname').text(Master.DepartmentName);
                            var qchekdate = new Date(Master.QDate);
                            const QDate = qchekdate.toISOString().substring(0, 10);
                            var mchekdate = new Date(Master.BidDueDate);
                            const biddue = mchekdate.toISOString().substring(0, 10);
                            if(response.EventData){

                                var EventData = response.EventData;
                                $('#imo_no').text(EventData.IMONo);
                                $('#port').text(EventData.ShippingPort);
                                var Echekdate = new Date(EventData.ETA);
                                const eta = Echekdate.toISOString().substring(0, 10);
                                $('#eta').val(eta);
                                $('#contact').val(EventData.Name);
                                $('#imo_no').val(EventData.IMONo);
                                $('#port').val(EventData.ShippingPort);
                                $('#remarks').val(EventData.Note);
                                $('#bid_due_datetime').val(EventData.BidDUeDate);
                                $('#created_datetime').val(EventData.EventCreatedTime);
                            }


                            $('#qdate').val(QDate);
                            $('#biddue').val(biddue);
                            $('#assign').val(Master.AssignQuote);
                            $('#code').val(Master.CustCode);
                            $('#est_lines').val(Master.EstLineQuote);
                            $('#created').val(Master.CreatedDate);
                            $('#vsn').val(Master.VSNNo);
                            $('#charg').val(Master.FlipOrderNo);
                            $('#qtime').val(Master.QTime);
                            $('#DepartmentCode').val(Master.DepartmentCode);
                            $('#GodownCode').val(Master.GodownCode);
        
                            if(response.TypeSetup){
                                var type = response.TypeSetup;
                                $('#ChkDeckEngin').val(type.ChkDeckEngin);

                            }
                     
                            if (Master.ChkSentToCust) {
                                $('#ChkSentToCust').prop('checked', true).val(Master.ChkSentToCust);
                                $("#LblWorkUserSentToCust1").text(Master.WorkUserSentToCust1);
                                $('#table-overlay').show();

                            }
                            if (Master.ChkRekey) {
                                $('#ChkRekey').prop('checked', true).val(Master.ChkRekey);
                                $("#LblWorkUserREKey").text(Master.WorkUserREKey);
                            }
                            if (Master.ChkSendToVendor) {
                                $('#ChkSendToVendor').prop('checked', true).val(Master.ChkSendToVendor);
                                $("#LblWorkUserSentToVendor").text(Master.WorkUserSentToVendor);
                            }
                            if (Master.ChkQuoteEntry) {
                                $('#ChkQuoteEntry').prop('checked', Master.ChkQuoteEntry == 1);

                                // $('#ChkQuoteEntry').prop('checked', true).val(Master.ChkQuoteEntry);
                                $("#LblWorkUserQuoteEntry").text(Master.WorkUserQuoteEntry);
                            }
                            if (Master.ChkPricing) {
                                $('#ChkPricing').prop('checked', true).val(Master.ChkPricing);
                                $("#LblWorkSellPricied").text(Master.WorkSellPricied);
                            }
                            if (Master.ChkCosting) {
                                $('#ChkCosting').prop('checked', true).val(Master.ChkCosting);
                                $("#LblWorkUserCosted").text(Master.WorkUserCosted);
                            }

                        }
                        if (response.Customerdicount) {
                            var cusdis = response.Customerdicount;
                            $('#aviper').text(cusdis.AVIRebatePer);
                            $('#footer_inv_percent').val(cusdis.InvDiscPer);
                            $('#footer_cr_note_percent').val(cusdis.CrNotePer);
                            $('#volper').text(cusdis.AgentCommPer);
                            $('#slsper').text(cusdis.SlsCommPer);

                        }


                        if (response.quotesdetails) {
                            var data = response.quotesdetails;
                            let table = document.getElementById('myTable');
                            table.innerHTML = ""; // Clear the table
                            data.forEach(function(item) {
                                let row = table.insertRow();
                                row.classList.add("Edititems");


                                let SNoCell = row.insertCell(0);
                                SNoCell.innerHTML = Math.round(item.SNo, 2);


                                let IMPAItemCodeCell = row.insertCell(1);
                                IMPAItemCodeCell.innerHTML = item.IMPAItemCode;

                                let ItemCodeCell = row.insertCell(2);
                                ItemCodeCell.innerHTML = item.ItemCode;

                                let ItemNameCell = row.insertCell(3);
                                ItemNameCell.innerHTML = item.ItemName;

                                let QtyCell = row.insertCell(4);
                                QtyCell.innerHTML = item.Qty;
                                QtyCell.contentEditable = true;
                                QtyCell.title = "Right Click For Edit";
                                QtyCell.classList.add("blurCell");

                                let PUOMCell = row.insertCell(5);
                                PUOMCell.innerHTML = item.PUOM;

                                let VPartCell = row.insertCell(6);
                                VPartCell.innerHTML = item.VPart;

                                let VendorPriceCell = row.insertCell(7);
                                VendorPriceCell.innerHTML = parseFloat(item.VendorPrice)
                                    .toFixed(2);
                                VendorPriceCell.contentEditable = true;
                                VendorPriceCell.title = "Right Click For Edit";
                                VendorPriceCell.classList.add("blurCell");

                                let SuggestPriceCell = row.insertCell(8);
                                SuggestPriceCell.innerHTML = parseFloat(item.SuggestPrice)
                                    .toFixed(2);
                                SuggestPriceCell.contentEditable = true;
                                SuggestPriceCell.title = "Right Click For Edit";
                                SuggestPriceCell.classList.add("blurCell");

                                let TotalCell = row.insertCell(9);
                                TotalCell.innerHTML = parseFloat(item.Total).toFixed(2);

                                let VendorNameCell = row.insertCell(10);
                                VendorNameCell.innerHTML = item.VendorName;

                                let CustomerNotesCell = row.insertCell(11);
                                CustomerNotesCell.innerHTML = item.CustomerNotes;
                                CustomerNotesCell.contentEditable = true;
                                CustomerNotesCell.title = "Right Click For Edit";

                                let VendorNotesCell = row.insertCell(12);
                                VendorNotesCell.innerHTML = item.VendorNotes;
                                VendorNotesCell.contentEditable = true;
                                VendorNotesCell.title = "Right Click For Edit";

                                let InternalBuyerNotesCell = row.insertCell(13);
                                InternalBuyerNotesCell.innerHTML = item.InternalBuyerNotes;
                                InternalBuyerNotesCell.contentEditable = true;
                                InternalBuyerNotesCell.title = "Right Click For Edit";

                                let VesselNoteCell = row.insertCell(14);
                                VesselNoteCell.innerHTML = item.VesselNote;
                                VesselNoteCell.hidden = true;

                                let VendorCodeCell = row.insertCell(15);
                                VendorCodeCell.innerHTML = item.VendorCode;
                                VendorCodeCell.hidden = true;
                            });
                        }

                        if (response.vendors) {
                            var vendor = response.vendors;
                            let select = document.getElementById('Vendrorname');
                            select.innerHTML = ""; // Clear the select element
                            vendor.forEach(function(item) {
                                select.innerHTML += "<option value=" + item.VenderCode + ">" +
                                    item.VenderName + "</option>";
                            });
                            select.innerHTML += "<option value='756'>STOCK</option>";
                        }
                        if (response.warehouse) {
                            var Warehouse = response.warehouse;
                            let select = document.getElementById('Warehouse');
                            select.innerHTML = ""; // Clear the select element
                            Warehouse.forEach(function(item) {
                                select.innerHTML += "<option value=" + item.GodownCode + ">" +
                                    item.GodownName + "</option>";
                            });
                        }
                        if (response.DataQuotesMaster) {
                            $('#Warehouse').val(response.DataQuotesMaster.GodownCode);

                        }




                        ComposeTable();


                        //   console.log($response.insert_update);
                    },
                    error: function(error) {
                      console.log(error);
                    },




                    // error : function(error){

                    //     console.log(error);
                    //     if (error.responseJSON) {
                    //         if(error.responseJSON.message == 'Attempt to read property "DepartmentCode" on null'){
                    //             alert('Quote Does Not Exist');

                    //         }
                    //     }

                    // },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });


            }
            $('#quote_no').keydown(function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    dataserchandget();
                }

            });

            $('#btnrfq').click(function(e) {
                e.preventDefault();
                var quotno = $('#quote_no').val();
                window.location.href = '/quotation/rfq?quote_no=' + quotno;
            });

            $('#btnpricing').click(function(e) {
                e.preventDefault();
                var quotno = $('#quote_no').val();
                window.location.href = '/quotation/pricing?quote_no=' + quotno;
            });

            $(document).ready(function() {
                const length = "<?php echo strlen($quote_no); ?>";

                if (length > 0) {
                    // Simulate pressing Enter on an input field with ID "myInput"
                    $('#quote_no').trigger($.Event('keydown', {
                        keyCode: 13
                    }));

                }
            });


            $('#importForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $('#importModal').modal('hide');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('importQuataion') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,


                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        
                        displayImportedData(response);
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
                });
            });
            
            $(document).ready(function () {
    $('#SaveImportItem').click(function (e) {
        e.preventDefault();

        let table = document.getElementById('importitembody');
        let rows = table.rows;
        let dataarray = [];

        for (let i = 0; i < rows.length; i++) {
            let cells = rows[i].cells;

            dataarray.push({
                ItemCode: cells[0]?.innerText.trim() || '',
                ItemName: cells[1]?.innerText.trim() || '',
                UOM: cells[2]?.innerText.trim() || '',
                Qty: cells[3]?.innerText.trim() || '',
                Price: cells[4]?.innerText.trim() || '',
                Matching: cells[5]?.innerText.trim() || '',
                VendorName: cells[6]?.innerText.trim() || '',
                IMPA: cells[7]?.innerText.trim() || '',
                VItemName: cells[8]?.innerText.trim() || '',
                VUOM: cells[9]?.innerText.trim() || '',
                VendorPrice: cells[10]?.innerText.trim() || '',
                VPart: cells[11]?.innerText.trim() || '',
                CustomerNotes: '',
                VendorNotes: '',
                InternalNotes: '',
                VesselNotes: '',
                VendorCode: ''
            });
        }

        ajaxSetup();

        $.ajax({
            type: 'POST',
            url: '{{ URL::to("bulkitemsave") }}',
            data: { dataarray: dataarray },
            beforeSend: function () {
                $('.overlay').show();
            },
            success: function (response) {
    
                if (response.status === 'saved') {
                    let data = response.Allitemcode;

                    $('#myTable').html(''); // Clear existing rows

                    data.forEach(function (item, index) {
                        $('#myTable').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.impa || ''}</td>
                                <td>${item.itemcode}</td>
                                <td>${item.itemname}</td>
                                <td>${item.qty || 0}</td>
                                <td>${item.uom || ''}</td>
                                <td>${item.vpart || ''}</td>
                                <td>${item.vendor_price || 0}</td>
                                <td>${item.sell_price || 0}</td>
                                <td>${item.total || 0}</td>
                                <td>${item.vendorname || ''}</td>
                                <td>${item.customer_notes || ''}</td>
                                <td>${item.vendor_notes || ''}</td>
                                <td>${item.internal_notes || ''}</td>
                                <td hidden>${item.vessel_notes || ''}</td>
                                <td hidden>${item.vendorcode || ''}</td>
                            </tr>
                        `);
                    });
                }
            },
            complete: function () {
                $('.overlay').hide();
            }
        });
    });
});



//       $(document).ready(function() {
//     $('#SaveImportItem').click(function(e) {
//         e.preventDefault();

//         let table = document.getElementById('importitembody');
//         let rows = table.rows;
//         let dataarray = [];

//         for (let i = 0; i < rows.length; i++) {
//             let cells = rows[i].cells;

//             dataarray.push({
//                 ItemCode: cells[0]?.innerText.trim() || '',
//                 ItemName: cells[1]?.innerText.trim() || '',
//                 UOM: cells[2]?.innerText.trim() || '',
//                 Qty: cells[3]?.innerText.trim() || '',
//                 Price: cells[4]?.innerText.trim() || '',
//                 Matching: cells[5]?.innerText.trim() || '',
//                 VendorName: cells[6]?.innerText.trim() || '',
//                 IMPA: cells[7]?.innerText.trim() || '',
//                 VItemName: cells[8]?.innerText.trim() || '',
//                 VUOM: cells[9]?.innerText.trim() || '',
//                 VendorPrice: cells[10]?.innerText.trim() || '',
//                 VPart: cells[11]?.innerText.trim() || '',
//                 CustomerNotes: '',
//                 VendorNotes: '',
//                 InternalNotes: '',
//                 VesselNotes: '',
//                 VendorCode: ''
//             });
//         }

//         ajaxSetup();

//         $.ajax({
//             type: 'post',
//             url: '{{ URL::to('bulkitemsave') }}',
//             data: {
//                 dataarray
//             },
//             beforeSend: function() {
//                 $('.overlay').show();
//             },
//             success: function(response) {
//                 console.log(response);

//                 if (response.status == 'saved') {
//                     let data = response.Allitemcode;

//                     // Add each saved item to the quotation table
//                     data.forEach(function(item, index) {
//                         $('#myTable').append(`
//                             <tr>
//                                 <td>${index + 1}</td>
//                                 <td>${item.impa || ''}</td>
//                                 <td>${item.itemcode}</td>
//                                 <td>${item.itemname}</td>
//                                 <td>${item.qty || 0}</td>
//                                 <td>${item.uom || ''}</td>
//                                 <td>${item.vpart || ''}</td>
//                                 <td>${item.vendor_price || 0}</td>
//                                 <td>${item.sell_price || 0}</td>
//                                 <td>${item.total || 0}</td>
//                                 <td>${item.vendorname || ''}</td>
//                                 <td>${item.customer_notes || ''}</td>
//                                 <td>${item.vendor_notes || ''}</td>
//                                 <td>${item.internal_notes || ''}</td>
//                                 <td hidden>${item.vessel_notes || ''}</td>
//                                 <td hidden>${item.vendorcode || ''}</td>
//                             </tr>
//                         `);
//                     });
//                 }
//             },
//             complete: function() {
//                 $('.overlay').hide();
//             }
//         });
//     });
// });

  

//         $(document).ready(function() {
//             $('#SaveImportItem').click(function(e) {
//                 e.preventDefault();


//                 let table = document.getElementById('importitembody');
//                 let rows = table.rows;
//                 let dataarray = [];

//                 for (let i = 0; i < rows.length; i++) {
//                     let cells = rows[i].cells;

//                     dataarray.push({
//                         ItemCode: cells[0] ? cells[0].innerHTML : '',
//                         ItemName: cells[1] ? cells[1].innerHTML : '',
//                         UOM: cells[2] ? cells[2].innerHTML : '',
//                         Price: cells[3] ? cells[3].innerHTML : '',
//                     });
//                 }
//                 ajaxSetup();

//                 $.ajax({
//                     type: 'post',
//                     url: '{{ URL::to('bulkitemsave') }}',
//                     data: {
//                         dataarray
//                     },
//                     beforeSend: function() {
//                         $('.overlay').show();
//                     },
//                     success: function(response) {
//                         console.log(response);
//                         if (response.status == 'saved') {
//     let table = document.getElementById('importitembody');
//     var data = response.Allitemcode;
//     dataarray.push({
//     ItemCode: cells[0]?.innerText.trim() || '',
//     ItemName: cells[1]?.innerText.trim() || '',
//     UOM: cells[2]?.innerText.trim() || '',
//     Qty: cells[3]?.innerText.trim() || '',
//     Price: cells[4]?.innerText.trim() || '',
//     Matching: cells[5]?.innerText.trim() || '',
//     VendorName: cells[6]?.innerText.trim() || '',
//     IMPACode: cells[7]?.innerText.trim() || '',
//     VItemName: cells[8]?.innerText.trim() || '',
//     VUOM: cells[9]?.innerText.trim() || '',
//     VendorPrice: cells[10]?.innerText.trim() || '',
//     VPart: cells[11]?.innerText.trim() || '', // Optional if available
//     CustomerNotes: '', // You can map these if needed
//     VendorNotes: '',
//     InternalNotes: '',
//     VesselNotes: '',
//     VendorCode: '' // Optional
// });

//     // data.forEach(function(item, index) {
//     //     let row = table.rows[index];
//     //     let ItemCodegetCell = row.cells[0];
//     //     ItemCodegetCell.innerHTML = item.itemcode;
//     //     ItemCodegetCell.contentEditable = 'true';
//     //     let matchinCell = row.cells[4];
//     //     matchinCell.innerHTML = 'Changed';

//     //     // Ã°Å¸â€˜â€¡ Add to Quotation table (main grid)
//     //     $('#myTable').append(`
//     //         <tr>
//     //             <td>${index + 1}</td>
//     //             <td>${item.impa || ''}</td>
//     //             <td>${item.itemcode}</td>
//     //             <td>${item.itemname}</td>
//     //             <td>${item.qty || 0}</td>
//     //             <td>${item.uom || ''}</td>
//     //             <td>${item.vpart || ''}</td>
//     //             <td>${item.vendor_price || 0}</td>
//     //             <td>${item.sell_price || 0}</td>
//     //             <td>${item.total || 0}</td>
//     //             <td>${item.vendorname || ''}</td>
//     //             <td>${item.customer_notes || ''}</td>
//     //             <td>${item.vendor_notes || ''}</td>
//     //             <td>${item.internal_notes || ''}</td>
//     //             <td hidden>${item.vessel_notes || ''}</td>
//     //             <td hidden>${item.vendorcode || ''}</td>
//     //         </tr>
//     //     `);
//     // });
// }

//                         // if (response.status == 'saved') {
//                         //     let table = document.getElementById('importitembody');
//                         //     var data = response.Allitemcode;
//                         //     data.forEach(function(item, index) {
//                         //         let row = table.rows[index];
//                         //         let ItemCodegetCell = row.cells[0];
//                         //         ItemCodegetCell.innerHTML = item.itemcode;
//                         //         ItemCodegetCell.contentEditable = 'true';
//                         //         let matchinCell = row.cells[4];
//                         //         matchinCell.innerHTML = 'Changed';
//                         //     });
//                         //     // alert('ItemsSaved');

//                         // }
//                     },
//                     complete: function() {
//                         $('.overlay').hide();
//                     }
                    
//                 });


//             });

//             $('#btnExport').click(function(e) {
//                 e.preventDefault();
//                 var quotenow = $('#quote_no').val();
//                 var inv = $('#footer_inv_percent').val();
//                 // window.location = '/ExportQuataion?quoteno=' + quotenow + "&inv=" + inv;
//                 ajaxSetup();
//                 $.ajax({
//         type: 'GET',
//         url: '/ExportQuataion', // Change the URL to match your route
//         data: {
//             quoteno: quotenow,
//             inv: inv
//         },
//         xhrFields: {
//             responseType: 'blob' // Set the response type to blob
//         },
//         success: function(response, status, xhr) {
//             // var filename = ''; // Extract the filename from the response headers
//             // var disposition = xhr.getResponseHeader('Content-Disposition');
//             // if (disposition && disposition.indexOf('attachment') !== -1) {
//             //     var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
//             //     var matches = filenameRegex.exec(disposition);
//             //     if (matches !== null && matches[1]) {
//             //         filename = matches[1].replace(/['"]/g, '');
//             //     }
//             // }

//             // // Create a blob URL and trigger a download link
//             // var blob = new Blob([response]);
//             // var blobUrl = window.URL.createObjectURL(blob);
//             // var a = document.createElement('a');
//             // a.href = blobUrl;
//             // a.download = filename || 'exported_file.xlsx';
//             // document.body.appendChild(a);
//             // a.click();
//             // window.URL.revokeObjectURL(blobUrl);
//             console.log(response);
//             console.log(xhr);

//             var filename = xhr.getResponseHeader('Content-Disposition');
//                 if (filename) {
//                     var filefolder = filename.split('_')[2];
//                     var filePath = filename.split('_')[3];
//                     // console.log(filePath);
//                     // filePath = encodeURIComponent(filePath);
//                     console.log('filePath'+filePath);

//                     // Compose the mailto link with attachment
//                     filePath = filefolder+'/'+filePath;
//                 var emailSubject = encodeURIComponent('Excel Export');
//                 var ff =  appURL + filePath;
//                 var emailBody = encodeURIComponent('Please find the attached Excel file.');
//                 var appURL = 'http://127.0.0.1:8000/';
//                 var mailtoLink = 'mailto:?subject=' + emailSubject + '&body=' + emailBody + '&attachment=file:'+ff;

//             // Open the user's default email client (Outlook)
//             window.location.href = mailtoLink;

//                     filename = filename.split('filename=')[1];
//                 } else {
//                     filename = 'exported_file.xlsx'; // Default filename if not provided
//                 }

//                 // Create a blob URL and trigger a download link
//                 var blob = new Blob([response]);
//                 var blobUrl = window.URL.createObjectURL(blob);
//                 var a = document.createElement('a');
//                 a.href = blobUrl;
//                 a.download = filename;
//                 document.body.appendChild(a);
//                 a.click();
//                 window.URL.revokeObjectURL(blobUrl);
//                 document.body.removeChild(a);

//         },
//         error: function(xhr, status, error) {
//             console.error('Error:', error);
//         }
//     });


//             });
//         });

        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function GetToken(){
            fetch('/get-token')
                .then(response => response.json())
                .then(data => {
                    // console.log('Bearer Token:', data.token);
                    $('#TxtTokenNo').val(data.token);
                    // You can use the token in your application
                    $('#BTNSHIPs').click();
                })
                .catch(error => console.error('Error:', error));
        }
        async function GetItemFrmShip(Items) {
            ajaxSetup();
                $.ajax({
                    url: "{{route('itemgetfromship')}}",
                    type: "POST",
                    data: {
                        Items,
                    },

                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        displayImportedData(response);

                    },
                    failed: function(output) {
                        var errors = output.responseJSON;
                        alert(errors.message);
                        //Swal.close();
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }



                });

        }
        async function fetchData(ShipID, Token) {
            // console.log(ShipID);
            // console.log(Token);
                ajaxSetup();
                $.ajax({
                    url: "{{route('getshiptoevent')}}",
                    type: "POST",
                    data: {
                        ShipID,
                        Token,
                    },

                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if(response.data){
                            var list = response.data;
                            if (list.lineItems.length > 0) {
                                var Items = list.lineItems;
                                GetItemFrmShip(Items);
                            }
                        }
                    },
                    failed: function(output) {
                        var errors = output.responseJSON;
                        alert(errors.message);
                        //Swal.close();
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        // $('.overlay').hide();
                    }



                });

            }
      

        function confirmPassword(correctPassword) {
            Swal.fire({
                title: 'To ReOpen Quotation Entry',
                text: 'Please Input Admin Password!',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off',
                    autocorrect: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: (password) => {
                    if (password !== correctPassword) {
                        Swal.showValidationMessage('Incorrect password');
                    } else {
                        $('#table-overlay').hide();

                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        }

        $(document).ready(function () {
            GetToken();


            $('#BTNSHIPs').click(function (e) {
            e.preventDefault();
            var ShipId = $('#ShipId').val();
            var accessToken = $('#TxtTokenNo').val();
                console.log(ShipId);
                console.log(accessToken);
            if (ShipId !== '') {
                fetchData(ShipId, accessToken);

            }


        });

        $('#BTNOutlook').click(function (e) {
            e.preventDefault();
            ajaxSetup();
            $.ajax({
                url: "{{ route('frmoutlook') }}",
                method: 'POST',
                data: {
                    to: 'recipient@example.com', // Adjust as needed
                    quote_no: '123' // Adjust as needed
                },
                success: function(response) {
                    // Show response in modal or update specific area of the page
                    $('#previewModalBody').html(response);
                    $('#previewModal').modal('show');
                    $('#BtnSendEmail').click(function (e) {
                        e.preventDefault();
                        Swaal.fire({
                            icon: 'success',
                            title: 'Email Sent',
                            text: 'Your Email Has Sent!',
                            showCancelButton: true,
                            confirmButtonText: 'Ok',
                            cancelButtonText: 'Cancel',
                            showLoaderOnConfirm: true, // You can display a loader animation while confirming
                        }).then((result) => {
                            $('#previewModal').modal('hide');

                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    // Handle error
                }
            });

        });

        $('#ChkSentToCust').change(function (e) {
            e.preventDefault();
            if($(this).prop('checked')){
                $('#table-overlay').show();

            }else{
                const correctPassword = 'admin';
                confirmPassword(correctPassword)

            }
        });



        });
        });
        
        
      

    let itemtable;

    $(document).ready(function () {
        itemtable = $('#itemsgrid').DataTable({
            scrollY: 350,
            deferRender: true,
            scroller: true,
            paging: false,
            info: false,
            ordering: false,
            searching: false,
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Print',
                    className: 'btn btn-primary',
                    action: function () {
                        var quotno = $('#quote_no').val();
                        window.open("/print/quotation/" + quotno, "_blank");
                    }
                },
                {
                    text: 'Register Item',
                    className: 'btn btn-primary',
                    action: function () {
                        RegisterItem();
                    }
                },
                {
                    text: 'Save All',
                    className: 'btn btn-primary',
                    action: function () {
                        updateDataOrder();
                    }
                },
                {
                    text: 'Delete Row',
                    className: 'btn btn-danger',
                    action: function () {
                        deleterow();
                    }
                }
            ]
        });

            
        // Load the data into the table
        populateTable();
    });

    function populateTable() {
    $.ajax({
        url: "{{ route('getData') }}", // Ensure this route returns JSON
        method: "GET",
        success: function(response) {
            console.log(response)
            itemtable.clear();

            let sno = 1;

            response.forEach(item => {
                itemtable.row.add([
                    sno++,
                    item.IMPAItemCode || '',
                    item.ItemCode || '',
                    item.ItemName || '',
                    item.StockQty || '',
                    item.UOM || '',
                    item.VPartCode || '',
                    item.VendorPrice || '',
                    item.OurPrice || '',
                    (item.OurPrice * item.StockQty).toFixed(2) || '',
                    item.VenderName || '',
                    item.CustomerNote || '',
                    item.VendorNote || '',
                    item.InternalBuyerNote || '',
                    item.vessel_notes || '',
                    item.VenderCode || ''
                ]);
            });

            itemtable.draw();
            
        },
        error: function(xhr, status, error) {
            console.error("Error loading data: ", error);
        }
    });
}

    

    </script>


@stop


@section('content')
