@extends('layouts.app')



@section('title', 'RFQ-Customer-Summary')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.impalistitemmodal'); ?>
    <?php echo View::make('partials.itemsearchmodal'); ?>
    <?php echo View::make('partials.search') ?>
    <?php echo View::make('partials.searchves') ?>

    </div>

    <div class="container-fluid ">

        <div class="col-lg-12">
            <div class="row">

            </div>

            <div class="card mt-3">
                <div style="background-color:#d2fafa; " class="card-header">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <b>
                        <h4 class="text-black">RFQ Customer Summary</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                            <div class="row py-2 ">

                                <div class="input-group col-sm-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Quoted From :
                                        </span>
                                    </div>
                                    <input id='TxtDateFrom' type="date" class="custom-input form-control" value="">
                                </div>
                                <div class="input-group col-sm-5 ml-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:80px" id="">To :</span>
                                    </div>
                                    <input id='TxtDateTo' type="date" class="custom-input form-control" value="">
                                </div>
                                {{-- <div class="form-check form-check-inline">
                                    <label class="form-check-label text-info mx-1">
                                        <input class="form-check-input " type="checkbox" name="ChkPODateAll"
                                            id="ChkPODateAll" value=""> All
                                    </label>
                                </div> --}}



                            </div>



                            <div class="row py-2 ">

                                <div class="input-group col-sm-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Due From :
                                        </span>
                                    </div>
                                    <input id='TxtDateETAFrom' type="date" class="custom-input form-control"
                                        value="">
                                </div>

                                <div class="input-group col-sm-5 ml-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:80px" id="">To :</span>
                                    </div>
                                    <input id='TxtDateETATo' type="date" class="custom-input form-control"
                                        value="">
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label text-info mx-1">
                                        <input class="form-check-input " type="checkbox" checked name="ChkAllETA"
                                            id="ChkAllETA" value=""> All
                                    </label>
                                </div>


                            </div>

                            <div class="row py-2">

                                <div class="input-group col-sm-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Status
                                            :</span>
                                    </div>
                                    <select id="CmbStatus" disabled class="form-control" name="CmbStatus">

                                    </select>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkAllStatus"
                                                id="ChkAllStatus" checked value=""> All
                                        </label>
                                    </div>

                                </div>

                            </div>


                            <div class="row py-2">
                                <div class="input-group col-sm-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Username
                                            :</span>
                                    </div>
                                    <select id="CmbUser" disabled class="form-control" name="CmbUserr">

                                    </select>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkAllUser"
                                                id="ChkAllUser" checked value=""> All
                                        </label>
                                    </div>
                                </div>

                            </div>





                            <div class="row py-2">
                                <div class="input-group col-sm-12">
                                    <div class="input-group-prepend-inline">
                                        <span class="input-group-text" style="width:110px" id="">Customer
                                            :</span>
                                    </div>
                                    <input type="text" name="CmbCustomer" disabled id="CmbCustomer" class="form-control">
                                    <input type="hidden" name="TxtCustomerCode"  id="TxtCustomerCode" class="form-control">
                                    {{-- <select id="CmbCustomer" disabled class="form-control" name="CmbCustomer">


                                    </select> --}}
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="cursor: pointer;" id="opnCustomer"><i
                                                class="fas fa-search    "></i></span>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkAllCustomer"
                                                id="ChkAllCustomer" checked value=""> All
                                        </label>
                                    </div>
                                </div>

                            </div>



                            <!--
                                    <div class="row py-2">
                                        <div class="input-group col-sm-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:110px" id="">Terms
                                                    :</span>
                                            </div>
                                            <select id="CmbTerms" disabled class="form-control" name="CmbTerms">

                                            </select>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label text-info mx-1">
                                                    <input class="form-check-input " type="checkbox" name="ChkTermsAll"
                                                        id="ChkTermsAll" checked value=""> All
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                -->

                            <div class="row py-2">
                                <div class="input-group col-sm-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Vessel
                                            :</span>
                                    </div>
                                    {{-- <select id="CmbVessel" disabled class="form-control" name="CmbVessel">

                                    </select> --}}
                                    <input type="text" name="txtVessel" id="txtVessel" readonly class="form-control">

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkAllVessel"
                                                id="ChkAllVessel" checked value=""> All
                                        </label>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="row py-2">
                                <div class="input-group col-sm-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Event No. :
                                        </span>
                                    </div>
                                   <input type="text" name="TxtEventNo" id="TxtEventNo" readonly class="form-control">

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkEventAll"
                                                id="ChkEventAll" checked value=""> All
                                        </label>
                                    </div>
                                </div>

                            </div>





                            <div class="row py-2">
                                <div class="input-group col-sm-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Port
                                            :</span>
                                    </div>
                                    <select id="CmbPort" disabled class="form-control" name="CmbPort">

                                    </select>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkPortALL"
                                                id="ChkPortALL" checked value=""> All
                                        </label>
                                    </div>
                                </div>

                            </div>




                            <!--
                                    <div class="row py-2">
                                        <div class="input-group col-sm-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:100px" id="">IMPA Code
                                                    :</span>
                                            </div>
                                            <input type="text" class="form-control col-sm-2" disabled name="TxtItemCode"
                                                id="TxtItemCode">
                                            <input type="text" class="form-control col-sm-7" disabled name="TxtItemName"
                                                id="TxtItemName">
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="cursor: pointer;" id="impbtn"><i
                                                        class="fas fa-search    "></i></span>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label text-info mx-1">
                                                    <input class="form-check-input " type="checkbox" name="ChkItemALL"
                                                        id="ChkItemALL" checked value=""> All
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                -->




                            <!--
                                    <div class="row py-2">
                                        <div class="input-group col-sm-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" style="width:110px" id="">Item Name
                                                    :</span>
                                            </div>
                                            <input type="text" class="form-control col-sm-20" name="TxtItemCode1"
                                                id="TxtItemCode1">
                                            <input type="text" class="form-control col-sm-7" name="TxtItemName1"
                                                id="TxtItemName1">
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="cursor: pointer;" id="opnitemfull"><i
                                                        class="fas fa-search    "></i></span>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label text-info mx-1">
                                                    <input class="form-check-input " type="checkbox" name="ChkAllItem"
                                                        id="ChkAllItem" checked value=""> All
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                -->

                            <div class="row py-2">
                                <div class="input-group col-sm-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Quote Entry
                                            :</span>
                                    </div>
                                    <select id="CmbQuoteEntry" disabled class="form-control" name="CmbQuoteEntry">
                                        <option value=""></option>
                                        <option value="Y">Y</option>
                                        <option value="N">N</option>

                                    </select>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkAllQuote"
                                                id="ChkAllQuote" checked value=""> All
                                        </label>
                                    </div>
                                </div>
                            </div>










                            <div class="row py-2">
                                <div class="input-group col-sm-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Costing
                                            :</span>
                                    </div>
                                    <select id="CmbCosting" disabled class="form-control" name="CmbCosting">
                                        <option value=""></option>
                                        <option value="Y">Y</option>
                                        <option value="N">N</option>
                                    </select>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkAllCosting"
                                                id="ChkAllCosting" checked value=""> All
                                        </label>
                                    </div>
                                </div>

                            </div>




                            <div class="row py-2">
                                <div class="input-group col-sm-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width:110px" id="">Pricing
                                            :</span>
                                    </div>
                                    <select id="CmbPricing" disabled class="form-control" name="CmbPricing">
                                        <option value=""></option>
                                        <option value="Y">Y</option>
                                        <option value="N">N</option>
                                    </select>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label text-info mx-1">
                                            <input class="form-check-input " type="checkbox" name="ChkAllPricing"
                                                id="ChkAllPricing" checked value=""> All
                                        </label>
                                    </div>
                                </div>

                            </div>



                        </div>





                        <div class="row px-3 py-2">
                            <a name="BtnFill" id="BtnFill" class="btn btn-outline-success" role="button"><i
                                    class="fa fa-file-text text-success" aria-hidden="true"></i> Show</a>
                        </div>
                        <div class="row px-3 py-2">
                            <a name="BtnExit" id="BtnExit" class="btn btn-outline-danger"
                                href="/"role="button"><i class="fas fa-door-open   text-danger"></i> Exit</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-12 pb-5">
            <div class="row">

                <div class="col-sm-6">
                    <label class="form-check-label text-info mx-4">
                        <input class="form-check-input " type="checkbox" name="ChkAllDepartment"
                            id="ChkAllDepartment" checked value=""> All
                    </label>
                    <div class="rounded shadow">
                        <table class="table small" id="Departmenttable">
                            <thead class="bg-info">
                                <tr>
                                    <th>Select</th>
                                    <th>Department&nbsp;Name</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                            <tbody id="Departmenttablebody">
                                @foreach ($Typesetup as $Type)
                                <tr>
                                    <td>
                                            <input type="checkbox" class="departmentcheck" id="" checked>
                                    </td>
                                    <td>
                                        {{$Type->TypeName}}
                                    </td>
                                    <td>
                                        {{$Type->Typecode}}
                                    </td>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-sm-6">
                    <label class="form-check-label text-info mx-4">
                        <input class="form-check-input " type="checkbox" name="ChkAllWarehouse"
                            id="ChkAllWarehouse" checked value=""> All
                    </label>
                    <div class="rounded shadow">
                        <table class="table small" id="Warehousetable">
                            <thead class="bg-info">
                                <tr>
                                    <th>Select</th>
                                    <th>Warehouse</th>
                                    <th>Code</th>
                                </tr>
                            </thead>
                            <tbody id="Warehousetablebody">
                                @foreach ($GodownSetup as $Godown)
                                <tr>
                                    <td>
                                            <input type="checkbox" class="departmentcheck" id="" checked>
                                    </td>
                                    <td>
                                        {{$Godown->GodownName}}
                                    </td>
                                    <td>
                                        {{$Godown->GodownCode}}
                                    </td>

                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>




    </div>


    </div>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

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

$(document).ready(function () {
    var table1 = $('#Warehousetable').DataTable({
        scrollY:410,
        deferRender:true,
        scroller:true,
        paging: false,
        info:false,
        ordering:false,
        searching:false,
    });

    var table2 = $('#Departmenttable').DataTable({
        scrollY:410,
        deferRender:true,
        scroller:true,
        paging: false,
        info:false,
        ordering:false,
        searching:false,
    });


});



    $(document).ready(function() {
        var chekdate = new Date();
    const Today = chekdate.toISOString().substring(0, 10);

        $('#TxtDateFrom').val(Today);
        $('#TxtDateTo').val(Today);
        $('#TxtDateETAFrom').val(Today);
        $('#TxtDateETATo').val(Today);

        $('#BtnFill').click(function (e) {

            e.preventDefault();

            let Qry = "";
            let Qry2 = "";
            let Qryd = "";
            let Qry3 = "";
            let QryW = "";

            Qry = "QDate>='" + $('#TxtDateFrom').val() + "' and QDate<='" + $('#TxtDateTo').val() + "' And BranchCode=" + parseInt({{$BranchCode}}) + "";

            if (!$('#ChkAllETA').is(":checked")) {
              if (Qry2 !== "") Qry2 += " And ";
              Qry2 += " And BidDueDate>='" + $('#TxtDateETAFrom').val() + "' And BidDueDate<='" + $('#TxtDateETATo').val() + "' ";
            }

            if (!$('#ChkPortALL').is(":checked")) {
              if (Qry2 !== "") Qry2 += " and ";
              Qry2 += "ShippingPort='" + $('#CmbPort').val() + "'";
            }

            if (!$('#ChkAllVessel').is(":checked")) {
              if (Qry2 !== "") Qry2 += " And ";
              Qry2 += "IMONo='" + $('#txtVessel').val() + "'";
            }

            if (!$('#ChkAllCustomer').is(":checked")) {
              if (Qry !== "") Qry += " And ";
              Qry += "CustomerCode=" + parseInt($('#TxtCustomerCode').val()) + "";
            }



            if (!$('#ChkAllUser').is(":checked")) {
              if (Qry !== "") Qry += " and ";
              Qry += "WorkSellPricied='" + $('#CmbUser').val() + "'";
            }



            if (!$('#ChkAllDepartment').is(":checked")) {
              let il;
              if (Qryd === "") Qryd = "";

              let table = document.getElementById('Departmenttablebody');
                let rows = table.rows;

              for (il = 0; il < rows.length; il++) {
                let cells = rows[il].cells;

                let checkboxCell = cells[0]; // Assuming the checkbox cell is the first cell
                if (checkboxCell.querySelector('input[type="checkbox"]').checked) {
                    if (Qryd !== "") Qryd += ",";
                        let departmentCode = cells[2].innerText;
                        Qryd += departmentCode;
                    }
              }

              if (Qryd !== "") {
                if (Qry !== "") Qry += " and ";
                Qry += "(DepartmentCode in [" + Qryd + "])";
                //Qry += "({OrderMaster.DepartmentCode} in [" + Qry2 + "])";
              }
            }

            if (!$('#ChkAllWarehouse').is(":checked")) {
              let iW;
              if (QryW !== "") QryW = "";

              let tablew = document.getElementById('Warehousetablebody');
                let rowsw = tablew.rows;

              for (iW = 0; iW < rowsw.length; iW++) {
                let cellsw = rowsw[iW].cells;
                let checkboxCellw = cellsw[0]; // Assuming the checkbox cell is the first cell
                if (checkboxCellw.querySelector('input[type="checkbox"]').checked) {
                    if (QryW !== "") QryW += ",";
                        let Code = cellsw[2].innerText;
                        QryW += Code;
                    }
              }

              if (QryW !== "") {
                if (Qry2 !== "") Qry2 += " and ";
                Qry2 += "(GodownCode in [" + QryW + "])";
              }
            }

            if (!$('#ChkEventAll').is(":checked")) {
              if (Qry2 !== "") Qry2 += " and ";
              Qry2 += "EventNo=" + ($('#TxtEventNo').val()) + "";
            }

            if (!$('#ChkAllStatus').is(":checked")) {
              if (Qry !== "") Qry += " and ";
              Qry += "StatusCode=" + ($('#CmbStatus').val()) + "";
            }

            if (!$('#ChkAllQuote').is(":checked")) {
              if (Qry !== "") Qry += " and ";

              if ($('#CmbQuoteEntry').val() === "Y") {
                Qry += "ChkQuoteEntry=True";
              } else {
                Qry += "ChkQuoteEntry=false";
              }
            }

            if (!$('#ChkAllCosting').is(":checked")) {
              if (Qry !== "") Qry += " and ";

              if ($('#CmbCosting').val() === "Y") {
                Qry += "ChkCosting=True";
              } else {
                Qry += "ChkCosting=false";
              }
            }

            if (!$('#ChkAllPricing').is(":checked")) {
              if (Qry !== "") Qry += " and ";

              if ($('#CmbPricing').val() === "Y") {
                Qry += "ChkPricing=True";
              } else {
                Qry += "ChkPricing=false";
              }
            }

            MInvNo = Qry;

            console.log(MInvNo);
            console.log(Qry2);
            window.location.href='/RFQ-C-Print?MInvNo='+MInvNo+'&Qry2='+Qry2;

        });






            $("#ChkAllUser").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbUser").prop("disabled", true);
                    $("#CmbUser").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbUser").prop("disabled", false);
                    $("#CmbUser").prop("disabled", false);
                }
            });



            $("#ChkAllStatus").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbStatus").prop("disabled", true);
                    $("#CmbStatus").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbStatus").prop("disabled", false);
                    $("#CmbStatus").prop("disabled", false);
                }
            });




            $("#ChkAllCustomer").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbCustomer").prop("disabled", true);
                    $("#CmbCustomer").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbCustomer").prop("disabled", false);
                    $("#CmbCustomer").prop("disabled", false);
                }
            });






            $("#ChkAllVessel").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#txtVessel").prop("readonly", true);
                    $("#txtVessel").prop("readonly", true);
                } else {
                    // Enable the select element
                    $("#txtVessel").prop("readonly", false);
                    $("#txtVessel").prop("readonly", false);
                }
            });

            // $('#txtVessel').click(function (e) {
            //     alert();
            //     // e.preventDefault();
            // });



            $("#ChkEventAll").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#TxtEventNo").prop("readonly", true);
                    $("#TxtEventNo").prop("readonly", true);
                } else {
                    // Enable the select element
                    $("#TxtEventNo").prop("readonly", false);
                    $("#TxtEventNo").prop("readonly", false);
                }
            });



            $("#ChkPortALL").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbPort").prop("disabled", true);
                    $("#CmbPort").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbPort").prop("disabled", false);
                    $("#CmbPort").prop("disabled", false);
                }
            });




            $("#ChkAllQuote").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbQuoteEntry").prop("disabled", true);
                    $("#CmbQuoteEntry").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbQuoteEntry").prop("disabled", false);
                    $("#CmbQuoteEntry").prop("disabled", false);
                }
            });




            $("#ChkAllCosting").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbCosting").prop("disabled", true);
                    $("#CmbCosting").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbCosting").prop("disabled", false);
                    $("#CmbCosting").prop("disabled", false);
                }
            });



            $("#ChkAllPricing").change(function() {
                // Check if the checkbox is checked
                if ($(this).is(":checked")) {
                    // Disable the select element
                    $("#CmbPricing").prop("disabled", true);
                    $("#CmbPricing").prop("disabled", true);
                } else {
                    // Enable the select element
                    $("#CmbPricing").prop("disabled", false);
                    $("#CmbPricing").prop("disabled", false);
                }
            });




$('#opnCustomer').click(function (e) {
    e.preventDefault();
    $('#searchrmod').modal('show');
});


$(document).on("dblclick", ".js-click", function() {
    var customer = $(this).attr('data-cusname');
    var custcode = $(this).attr('data-custcode');
$('#CmbCustomer').val(customer);
$('#TxtCustomerCode').val(custcode);
$('#searchbox').val(custcode);
    // alert(customer);
    $('#searchrmod').modal('hide');
    $("#CmbCustomer").prop("disabled", false);
    $('#ChkAllCustomer').prop("checked" ,false)
});









$('#txtVessel').click(function (e) {
    e.preventDefault();
    $('#searchrmodw').modal('show');
});


$(document).on("dblclick", ".js-click", function() {
    var customer = $(this).attr('data-cusname');
$('#CmbVessel').val(customer);
    // alert(customer);
    $('#searchrmodw').modal('hide');
    $("#CmbVessel").prop("disabled", false);
    $('#ChkAllVessel').prop("checked" ,false)
});
















        });
    </script>




@stop


@section('content')
