@extends('layouts.app')



@section('title', 'PO-Received-Report')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.impalistitemmodal'); ?>
    <?php echo View::make('partials.itemsearchmodal'); ?>
    </div>

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
                    <h3 class="text-center">PO Received Report</h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row py-2">

                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Date From</span>
                                    <input id='TxtDateFrom' type="date" value="">
                                </div>

                                <div class="inputbox col-sm-4">
                                    <span class="Txtspan" id="">Date to</span>
                                    <input id='TxtDateTo' type="date" value="">
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" name="ChkPODateAll" id="ChkPODateAll"
                                            value=""> All
                                    </label>
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="TxtVendorCode" id="TxtVendorCode">
                                </div>
                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Department</span>
                                    <select id="CmbDepartment" disabled name="CmbDepartment">
                                        @foreach ($Typesetup as $item)
                                            <option value="{{ $item->TypeCode }}">{{ $item->TypeName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" name="ChkAllDepartment" id="ChkAllDepartment"
                                            checked value=""> All
                                    </label>
                                </div>
                                <div class="inputbox col-sm-2">

                                    <input type="text" readonly name="TxtDepartmentCode" id="TxtDepartmentCode">
                                </div>
                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Customer</span>
                                    <select id="CmbCustomer" disabled class="" name="CmbCustomer">
                                        @foreach ($Customer as $Citem)
                                            <option value="{{ $Citem->CustomerName }}">{{ $Citem->CustomerName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" name="ChkAllCustomer" id="ChkAllCustomer"
                                            checked value=""> All
                                    </label>
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="TxtCustomerCode" id="TxtCustomerCode">
                                </div>

                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Vessel</span>
                                    <select id="CmbVessel" disabled name="CmbVessel">
                                        @foreach ($Vessel as $Vitem)
                                            <option value="{{ $Vitem->VesselName }}">{{ $Vitem->VesselName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" name="ChkAllVessel" id="ChkAllVessel" checked
                                            value=""> All
                                    </label>
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="TxtVesselCode" id="TxtVesselCode">
                                </div>

                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Location</span>
                                    <select id="CmbGodownName" disabled name="CmbGodownName">
                                        @foreach ($GodownSetup as $Gitem)
                                            <option value="{{ $Gitem->GodownCode }}">{{ $Gitem->GodownName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkGodownAll" id="ChkGodownAll" checked
                                            value=""> All
                                    </label>
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" readonly name="TxtGodownCode" id="TxtGodownCode">
                                </div>



                            </div>


                            <div class="row py-2">

                                <div class="input-group col-sm-12">

                                    <div class="rdform row mt-3 ml-1">
                                        <input id="OptDetail" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel mx-2" for="OptDetail"><span></span>Detail
                                        </label>

                                        <input id="OptProductWise" type="radio" class="rainput" name="hopping"
                                            value="">
                                        <label class="ralabel  mx-2" for="OptProductWise"><span></span>Product
                                            Wise</label>

                                        <input id="OptSummary" type="radio" class="rainput" name="hopping"
                                            value="" checked>
                                        <label class="ralabel  mx-2" for="OptSummary"><span></span>Summary</label>

                                        <div class="worm">

                                            @for ($i = 0; $i < 30; $i++)
                                                <div class="worm__segment"></div>
                                            @endfor
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="row py-2 ml-2">
                                <button name="BtnFill" id="BtnFill" class="btn btn-success col-sm-2 "
                                    role="button"><i class="fa fa-file-text text-white" aria-hidden="true"></i>
                                    Show</button>
                                <button name="BtnPrint" id="BtnPrint" class="btn btn-primary col-sm-2 ml-2"
                                    role="button"><i class="fa fa-print text-white" aria-hidden="true"></i>
                                    Print</button>
                                <button name="BtnExit" id="BtnExit" class="btn btn-danger col-sm-2 ml-2"
                                    href="/" role="button"><i class="fas fa-door-open   text-white"></i>
                                    Exit</button>
                            </div>

                        </div>


                        <div class="col-lg-6">

                            <div class="row py-2">
                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan" id="">Terms</span>
                                    <select id="CmbTerms" disabled name="CmbTerms">
                                        @foreach ($Terms as $titem)
                                            <option value="{{ $titem->Terms }}">{{ $titem->Terms }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" name="ChkTermsAll" id="ChkTermsAll"
                                            checked value=""> All
                                    </label>
                                </div>


                            </div>

                            <div class="row py-2">

                                <div class="inputbox col-sm-10">
                                    <span class="Txtspan">
                                        Vendor
                                    </span>
                                    <select id="CmbVendor" name="CmbVendor">
                                        @foreach ($Typesetup as $item)
                                            <option value="{{ $item->TypeCode }}">{{ $item->TypeName }}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllVendor" id="ChkAllVendor" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">PO# From</span>
                                    <input type="text" name="TxtPOFrom" id="TxtPOFrom">
                                </div>

                                <div class="inputbox col-sm-5">
                                    <span class="Txtspan" id="">To</span>
                                    <input type="text" name="TxtPOTo" id="TxtPOTo">
                                </div>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input class="" type="checkbox" name="ChkPOAll" id="ChkPOAll" checked
                                            value=""> All
                                    </label>
                                </div>
                            </div>




                            <div class="row py-2">

                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">IMPA Code</span>
                                    <input type="text" disabled name="TxtItemName" id="TxtItemName">
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" disabled name="TxtItemCode" id="TxtItemCode">
                                </div>


                                <button class="btn btn-info" style="cursor: pointer;" id="impbtn"><i
                                        class="fas fa-search    "></i></button>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="inout-group text-info mx-1">
                                        <input type="checkbox" name="ChkItemALL" id="ChkItemALL" checked value="">
                                        All
                                    </label>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="inputbox col-sm-8">
                                    <span class="Txtspan" id="">Item Name</span>
                                    <input type="text" name="TxtItemName1" id="TxtItemName1">
                                </div>

                                <div class="inputbox col-sm-2">
                                    <input type="text" name="TxtItemCode1" id="TxtItemCode1">
                                </div>

                                <button class="btn btn-info" style="cursor: pointer;" id="opnitemfull"><i
                                        class="fas fa-search    "></i></button>

                                <div class="CheckBox1 mt-2 ml-2">
                                    <label class="input-group text-info mx-1">
                                        <input type="checkbox" name="ChkAllItem" id="ChkAllItem" checked value="">
                                        All
                                    </label>
                                </div>


                            </div>

                            <div class="input-group col-sm-4 ml-2">
                                <div class="rdform row mt-3 ml-3">
                                    <input id="OptIn" type="radio" class="rainput" autocomplete="off"
                                        name="hopping2" value="" checked>
                                    <label class="ralabel mx-2" for="OptIn"><span></span> In</label>
                                    <input id="OptLike" type="radio" class="rainput" autocomplete="off"
                                        name="hopping2" value="">
                                    <label class="ralabel  mx-2" for="OptLike"><span></span>Like</label>
                                    <div class="worm2">
                                        @for ($j = 0; $j < 30; $j++)
                                            <div class="worm__segment2"></div>
                                        @endfor
                                    </div>
                                </div>
                            </div>


                        </div>








                    </div>




                </div>
            </div>

            <div class="rounded shadow">
                <table class="table small" id="PoreceivedRepotable">
                    <thead class="">
                        <tr>
                            <th>PO&nbsp;Rec&nbsp;Date</th>
                            <th>PO&nbsp;#</th>
                            <th>VSN&nbsp;#</th>
                            <th>Charge&nbsp;#</th>
                            <th>Department</th>
                            <th style="width: 400px">Vendor&nbsp;Name</th>
                            <th style="width: 400px">Vessel&nbsp;Name</th>
                            <th>Order&nbsp;Qty</th>
                            <th>Rec&nbsp;Qty</th>
                            <th class="text-right">Net&nbsp;Amount</th>
                            <th>Posted</th>


                        </tr>
                    </thead>
                    <tbody id="PoreceivedRepotablebody">

                    </tbody>
                </table>
                <div class="row py-1">
                    <div class="input-group ">
                        <div class="input-group-prepend ml-auto">
                            <span class="input-group-text" id="">Grand Total :</span>
                        </div>
                        <input type="text" class="form-control  col-sm-1 " name="TxtTotalOrderQty"
                            id="TxtTotalOrderQty">
                        <input type="text" class="form-control  col-sm-1 mx-1" name="TxtTotalRecQty"
                            id="TxtTotalRecQty">
                        <input type="text" class="form-control  col-sm-1 mr-4 text-right" name="TxtTotalNetAmount"
                            id="TxtTotalNetAmount">
                    </div>
                </div>
            </div>



        </div>



    </div>

    {{-- <form action="/orderreportprint" method="post">
    @csrf
    <input type="text" id="qruey">
<button type="submit" id="btnqruey"></button>
</form> --}}

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <style>
        .rainput:nth-of-type(1):checked~.worm .worm__segment {
            transform: translateX(0.5em);
        }

        .rainput:nth-of-type(1):checked~.worm .worm__segment:before {
            animation-name: hop1;
        }

        @keyframes hop1 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(2):checked~.worm .worm__segment {
            transform: translateX(6.15em);
        }

        .rainput:nth-of-type(2):checked~.worm .worm__segment:before {
            animation-name: hop2;
        }

        @keyframes hop2 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(3):checked~.worm .worm__segment {
            transform: translateX(14.85em);
        }

        .rainput:nth-of-type(3):checked~.worm .worm__segment:before {
            animation-name: hop3;
        }

        @keyframes hop3 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(1):checked~.worm2 .worm__segment2 {
            transform: translateX(0.5em);
        }

        .rainput:nth-of-type(1):checked~.worm2 .worm__segment2:before {
            animation-name: ho1;
        }

        @keyframes ho1 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }

        .rainput:nth-of-type(2):checked~.worm2 .worm__segment2 {
            transform: translateX(4.55em);
        }

        .rainput:nth-of-type(2):checked~.worm2 .worm__segment2:before {
            animation-name: ho2;
        }

        @keyframes ho2 {

            from,
            to {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-1.5em);
            }
        }
    </style>
@stop

@section('js')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#impbtn').click(function() {
                $('#impalist').modal('show');

            });
            $('#opnitemfull').click(function() {
                //    alert();
                $('#searchrmodfull').modal('show');

            });
            // Add change event listener to the checkbox
            //   $("#CmbCustomer").change(function() {
            //     var customer = $('#CmbCustomer').val();
            //     ajaxSetup();

            // $.ajax({
            //   url: '/orderrptcuscode',
            //   type: 'POST',
            //   data: {
            //     customer,
            //   },
            //   beforeSend: function() {
            //                 // Show the overlay and spinner before sending the request
            //                 // $('.overlay').show();
            //             },
            //   success: function(resposne) {
            //     console.log(resposne);
            //     $('#CustomerCode').val(resposne.CustomerCode);


            //   },
            //   error: function(data) {
            //                 console.log(data);
            //                 // $('.overlay').hide();
            //             },
            //             complete: function() {
            //                 // $('.overlay').hide();
            //                 // Hide the overlay and spinner after the request is complete
            //             }


            // });
            //   });


            $("#ChkItemALL").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtItemCode").prop("disabled", true);
                    $("#TxtItemName").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#TxtItemCode").prop("disabled", false);
                    $("#TxtItemName").prop("disabled", false);
                }
            });
            $("#ChkAllCustomer").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbCustomer").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbCustomer").prop("disabled", false);
                }
            });
            $("#ChkAllDepartment").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbDepartment").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbDepartment").prop("disabled", false);
                }
            });
            $("#ChkAllVessel").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbVessel").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbVessel").prop("disabled", false);
                }
            });
            $("#ChkTermsAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbTerms").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbTerms").prop("disabled", false);
                }
            });
            $("#ChkStatusAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbStatus").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbStatus").prop("disabled", false);
                }
            });
        });

        $(document).ready(function() {
            var chekdate = new Date();
            const Today = chekdate.toISOString().substring(0, 10);

            $('#TxtDateFrom').val(Today);
            $('#TxtDateTo').val(Today);



        });
        $(document).ready(function() {
            // dataget();
            var table = $('#PoreceivedRepotable').DataTable({

                scrollY: 410,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,


            });
            var table2 = $('#Warehousetable').DataTable({

                scrollY: 150,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });
            $(".dt-button").removeClass("dt-button")




            $('#PoreceivedRepotable tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                    $('#deleteButton').attr('data-row-id', '');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    var id = $(this).attr('data-row-id');
                    $('#deleteButton').attr('data-row-id', id);
                }
            });




            $('#BtnFill').click(function(e) {
                e.preventDefault();
                dataget();
            });

        });



        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        }

        function QryMaker() {

            var CmbCustomer = $('#CmbCustomer').val();
            var CmbVessel = $('#CmbVessel').val();
            var CmbStatus = $('#CmbStatus').val();
            var CmbTerms = $('#CmbTerms').val();
            var CmbDepartment = $('#CmbDepartment').val();
            var TxtDateFrom = $('#TxtDateFrom').val();
            var TxtVendorCode = $('#TxtVendorCode').val();
            var TxtDateTo = $('#TxtDateTo').val();
            var TxtPOFrom = $('#TxtPOFrom').val();
            var TxtGodownCode = $('#TxtGodownCode').val();
            var TxtPOTo = $('#TxtPOTo').val();
            var MBranchCode = '{{ $BranchCode }}';
            var Qry = '';

            // Qry = "BranchCode="+ MBranchCode +""

            if (!$("#ChkPODateAll").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "PORecDate>='" + TxtDateFrom + "' and PORecDate<='" + TxtDateTo + "'";
            }

            if (!$("#ChkAllDepartment").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "DepartmentName='" + CmbDepartment + "'";
            }

            if (!$("#ChkAllCustomer").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "CustomerName='" + CmbCustomer + "'";
            }

            if (!$("#ChkAllVessel").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "VesselName='" + CmbVessel + "'";
            }

            if (!$("#ChkAllVendor").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "VendorCode='" + TxtVendorCode + "'";
            }

            if (!$("#ChkTermsAll").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "Terms='" + CmbTerms + "'";
            }

            if (!$("#ChkPOAll").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "PurchaseOrderNo>='" + TxtPOFrom + "' and PurchaseOrderNo<='" + TxtPOTo + "'";
            }

            if (!$("#ChkGodownAll").is(":checked")) {
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "GodownCode='" + TxtGodownCode + "'";
            }
            var MInvNo = Qry;
            var MRep = '';

            if ($("#OptDetail").is(":checked")) {

                MRep = 'PurchaseOrderReportDetail';
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "RecQty>0";

            } else if ($("#OptProductWise").is(":checked")) {

                MRep = 'PurchaseOrderProductWise';
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "RecQty>0";

            } else {

                MRep = 'PurchaseOrderReportMASTER';
                if (Qry !== "") Qry = Qry + " and ";
                Qry = Qry + "RecQty>0";

            }


            return Qry;
        }

        function dataget() {

            var Qry = QryMaker();
            // console.log(Qry);



            ajaxSetup();

            $.ajax({
                url: '/PoReceivedReportsearch',
                type: 'POST',
                data: {
                    Qry,
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log(resposne);

                    let data = resposne.Data;
                    let table = document.getElementById('PoreceivedRepotablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    var TxtTotalNetAmount = 0;
                    var TxtTotalRecQty = 0;
                    var TxtTotalOrderQty = 0;
                    data.forEach(function(item) {
                        ids = ids + 1;


                        let row = table.insertRow();

                        function createCell(content) {
                            let cell = row.insertCell();
                            cell.innerHTML = content;
                            return cell;
                        }

                        var odate = new Date(item.PORecDate);
                        const PoDate = odate.toISOString().substring(0, 10);
                        createCell(PoDate);
                        createCell(item.PurchaseOrderNo)

                        createCell(item.VSNNo);

                        createCell(item.ChargeNo);
                        createCell(item.DepartmentName);
                        createCell(item.VendorName);
                        createCell(item.VesselName);
                        createCell(item.OrderQty);
                        createCell(item.RecQty);
                        createCell(parseFloat(item.NetAmount).toFixed(2)).style.textAlign = 'right';
                        if (item.TransAmt == item.NetAmount) {
                            createCell('Posted').style.backgroundColor = 'green';
                        } else {
                            createCell('Not Posted').style.backgroundColor = 'pink';

                        }

                        TxtTotalNetAmount += parseFloat(item.NetAmount ? item.NetAmount : '0');
                        TxtTotalRecQty += parseFloat(item.RecQty ? item.RecQty : '0');
                        TxtTotalOrderQty += parseFloat(item.OrderQty ? item.OrderQty : '0');





                    });

                    $('#TxtTotalNetAmount').val(TxtTotalNetAmount.toFixed(2));
                    $('#TxtTotalRecQty').val(TxtTotalRecQty.toFixed(2));
                    $('#TxtTotalOrderQty').val(TxtTotalOrderQty.toFixed(2));

                    // $('#scoperow').dblclick(function () {
                    //     alert(this.td[0].innerHTML);
                    // });
                    // const table = document.getElementById("PoreceivedRepotable");
                    // const tableBody = document.getElementById("PoreceivedRepotablebody");

                    // tableBody.addEventListener("dblclick", function(e) {
                    //   if (e.target.tagName === "TD") {
                    //     const td = e.target;
                    //     const tr = td.parentNode;
                    //     const tdElements = tr.getElementsByTagName("td");
                    //         console.log(tdElements[0].innerHTML);
                    //         var ACt = tdElements[0].innerHTML;
                    //         // window.open("/Account-Ledger?ACT="+ACt);

                    //         window.location.href="Account-Ledger?ACT="+ACt;
                    //   }
                    // });


                },
                error: function(data) {
                    console.log(data);
                    $('.overlay').hide();
                },
                complete: function() {
                    $('.overlay').hide();
                    // Hide the overlay and spinner after the request is complete
                }


            });

        }

        $(document).ready(function() {


            $('#BtnPrint').click(function(e) {
                var Qry = '';
                var Qry2 = '';
                var MRep = '';
                var MInvNo = '';
                var CmbCustomer = $('#CmbCustomer').val();
                var CmbVessel = $('#CmbVessel').val();
                var CmbStatus = $('#CmbStatus').val();
                var CmbTerms = $('#CmbTerms').val();
                var CmbDepartment = $('#CmbDepartment').val();
                var TxtDateFrom = $('#TxtDateFrom').val();
                var TxtVendorCode = $('#TxtVendorCode').val();
                var TxtDateTo = $('#TxtDateTo').val();
                var TxtItemCode = $('#TxtItemCode').val();
                var TxtItemCode1 = $('#TxtItemCode1').val();
                var TxtItemName = $('#TxtItemName').val();
                var TxtItemName1 = $('#TxtItemName1').val();
                var TxtPOFrom = $('#TxtPOFrom').val();
                var TxtGodownCode = $('#TxtGodownCode').val();
                var TxtPOTo = $('#TxtPOTo').val();
                var MBranchCode = '{{ $BranchCode }}';

                if (!$("#ChkPODateAll").is(":checked")) {
                    if (Qry !== "") Qry = Qry + " and ";
                    Qry = Qry + "PORecDate>='" + TxtDateFrom + "' and PORecDate<='" + TxtDateTo + "'";
                }

                if (!$("#ChkItemALL").is(":checked")) {
                    if (Qry2 !== "") Qry2 = Qry2 + " and ";
                    Qry2 = Qry2 + "IMPAItemCode='" + Qry2 + "'";
                }

                if (!$("#ChkAllItem").is(":checked")) {
                    if ($("#OptIn").is(":checked")) {
                        if (Qry2 !== "") Qry2 = Qry2 + " and ";
                        Qry2 = Qry2 + "ItemCode='" + TxtItemCode1 + "'";
                        Qry2 = Qry2 + "ItemName in'" + TxtItemName1 + "'";
                    } else if ($("#OptLike").is(":checked")) {
                        Qry2 = Qry2 + "ItemCode='" + TxtItemCode1 + "'";
                        Qry2 = Qry2 + "ItemName like '%" + TxtItemName1 + "%'";

                    }

                }

                if (!$("#ChkAllDepartment").is(":checked")) {
                    if (Qry2 !== "") Qry2 = Qry2 + " and ";
                    Qry2 = Qry2 + "DepartmentName='" + CmbDepartment + "'";
                }

                if (!$("#ChkAllCustomer").is(":checked")) {
                    if (Qry !== "") Qry = Qry + " and ";
                    Qry = Qry + "CustomerName='" + CmbCustomer + "'";
                }

                if (!$("#ChkAllVessel").is(":checked")) {
                    if (Qry !== "") Qry = Qry + " and ";
                    Qry = Qry + "VesselName='" + CmbVessel + "'";
                }


                if (!$("#ChkAllVendor").is(":checked")) {
                    if (Qry !== "") Qry = Qry + " and ";
                    Qry = Qry + "VendorCode='" + TxtVendorCode + "'";
                }

                if (!$("#ChkTermsAll").is(":checked")) {
                    if (Qry !== "") Qry = Qry + " and ";
                    Qry = Qry + "Terms='" + CmbTerms + "'";
                }

                if (!$("#ChkPOAll").is(":checked")) {
                    if (Qry !== "") Qry = Qry + " and ";
                    Qry = Qry + "PurchaseOrderNo>='" + TxtPOFrom + "' and PurchaseOrderNo<= '" + TxtPOTo +
                        "'";
                }
                MInvNo = Qry

                if ($("#OptDetail").is(":checked")) {
                    MRep = 'PurchaseOrderReportDetail';
                    if (Qry2 !== "") Qry2 = Qry2 + " and ";
                    Qry2 = Qry2 + "RecQty>0";

                } else if ($("#OptProductWise").is(":checked")) {
                    MRep = 'PurchaseOrderProductWise';
                    if (Qry2 !== "") Qry2 = Qry2 + " and ";
                    Qry2 = Qry2 + "RecQty>0";
                } else {
                    MRep = 'PurchaseOrderReportMASTER';
                    if (Qry2 !== "") Qry2 = Qry2 + " and ";
                    Qry2 = Qry2 + "RecQty>0";
                }

                window.location.href = "/PoReceivedReportprint?Qry=" + Qry + "&Qry2=" + Qry2 + "&MRep=" +
                    MRep + "&DateFrom=" + TxtDateFrom + "&DateTo=" + TxtDateTo;



            });


            $('#Dg1 tbody').on('dblclick', 'tr', function() {
                var rowData = tabledg.row(this).data();
                // console.log(rowData[9]);
                $('#TxtItemCode').val(rowData[9]);
                $('#TxtItemName').val(rowData[1]);
                $('#impalist').modal('hide');
                $('#ChkItemALL').prop("checked", false);
                $("#TxtItemCode").prop("disabled", false);
                $("#TxtItemName").prop("disabled", false);


            });


            $('#producers-tables tbody').on('dblclick', 'tr', function() {
                var rowData = table2.row(this).data();
                $('#TxtItemCode1').val(rowData.ItemCode);
                $('#TxtItemName1').val(rowData.ItemName);
                $('#searchrmodfull').modal('hide');
                $('#ChkAllItem').prop("checked", false);
                $("#TxtItemCode1").prop("disabled", false);
                $("#TxtItemName1").prop("disabled", false);
            });

        });
    </script>
@stop


@section('content')
