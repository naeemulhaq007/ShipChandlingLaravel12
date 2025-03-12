@extends('layouts.app')



@section('title', 'Vendor-Outstanding-Report')

@section('content_header')

@stop

@section('content')
    </div>
    @php
        $ACTcode = request()->get('ACT');
    @endphp

    <div class="container-fluid">

        <div class="col-lg-12 py-3">


            <div class="card ">
                <div class="card-header" style="background-color: #eeeeee">
                    <div class="row">
                        <h3 class="mx-auto"><b>Vendor Outstanding Report</b></h3>
                        <div class="card-tools ">

                            <button type="button" name="headertoggle" class="btn btn-tool ml-auto"
                                data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- </div> --}}
                <div class="card-body">

                    <div class="row py-2 ">

                        <div class="inputbox col-sm-2">
                            <input class="" type="date" name="TxtDateTo" id="TxtDateTo">
                            <span class="" id="">Upto</span>
                        </div>

                    </div>

                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="row">

                                <div class="inputbox col-sm-1">
                                    <input type="text" name="TxtActCode" id="TxtActCode">
                                    <span class="" id=""></span>
                                </div>

                                <div class="inputbox col-sm-9">
                                    <input class="" readonly type="text" name="TxtActName" id="TxtActName">
                                    <span class="" id="">Vendor</span>
                                </div>

                                <a name="CmdCustomerCode" id="CmdCustomerCode" class="btn btn-info" data-target="#chart"
                                    data-toggle="modal" role="button"><i class="fa fa-search" aria-hidden="true"></i></a>

                                <div class="CheckBox1">

                                    <label class="input-group text-info mt-2 ml-2">
                                        <input class=" " type="checkbox" name="ChkAll" id="ChkAll" checked
                                            value=""> ALL
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="CheckBox1">

                            <label class="input-group text-info mt-2 ml-2">
                                <input class="mr-2" type="checkbox" name="ChkCompanyHeading" id="ChkCompanyHeading"
                                    checked value="">Company Heading
                            </label>
                        </div>
                    </div>


                    <div class="row py-2">
                        <a name="CmdGenerateNew" id="CmdGenerateNew" class="btn btn-dark mx-1" role="button"><i
                                class=""></i> Generate ALL</a>

                        <a name="CmdGenerate" id="CmdGenerate" class="btn btn-dark mx-1" role="button"><i
                                class="fas fa-file"></i> Generate</a>

                        <a name="CmdPrint" id="CmdPrint" class="btn btn-primary mx-1" role="button"><i
                                class="fas fa-print"></i> Print</a>

                        <a name="CmdExit" id="CmdExit" class="btn btn-danger mx-1" href="/" role="button"><i
                                class="fas fa-door-open"></i> Exit</a>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg-12 pb-5">
            <div class="row">



                <div class="col-sm-12">
                    <div class="rounded shadow">
                        <table class="table " id="DG2">
                            <thead class="bg-light">
                                <tr>
                                    <th>A/C&nbsp;Code</th>
                                    <th>Customers</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                </tr>
                            </thead>

                            <tbody id="DG2body">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>





            </div>




        </div>


        <form hidden method="post" action="/LedgerGrid">
            @csrf

            <input type="hidden" name="TxtDateFrom" id="gTxtDateFrom">
            <input type="hidden" name="TxtActCode" id="gTxtActCode">
            <input type="hidden" name="TxtActName" id="gTxtActName">
            <input type="hidden" name="TxtDateTo" id="gTxtDateTo">
            <input type="hidden" name="CHeading" id="gCHeading">
            <button type="submit" id="gsubmit">g</button>
        </form>

    @stop

    @section('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
        <style>
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
                font-size: 11px;

            }

            .card-body span {}

            .form-control {
                font-size: 11px;

            }

            .containers ul {
                padding: 0em;
            }

            .containers ul li,
            .containers ul li ul li {
                position: relative;
                top: 0;
                bottom: 0;
                padding-bottom: 7px;

            }

            .containers ul li ul {
                margin-left: 4em;
            }

            .containers li {
                list-style-type: none;
            }

            .containers li a {
                padding: 0 0 0 10px;
                position: relative;
                top: 1em;
            }

            .containers li a:hover {
                text-decoration: none;
            }

            .containers a.addBorderBefore:before {
                content: "";
                display: inline-block;
                width: 2px;
                height: 28px;
                position: absolute;
                left: -47px;
                top: -16px;
                border-left: 1px solid gray;
            }

            .containers li:before {
                content: "";
                display: inline-block;
                width: 25px;
                height: 0;
                position: relative;
                left: 0em;
                top: 1em;
                border-top: 1px solid gray;
            }

            .containers ul li ul li:last-child:after,
            .containers ul li:last-child:after {
                content: '';
                display: block;
                width: 1em;
                height: 1em;
                position: relative;
                background: #fff;
                top: 9px;
                left: -1px;
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
                var today = new Date().toISOString().split('T')[0];
                $('#TxtDateFrom').val(today);
                $('#TxtDateTo').val(today);

                var Getact = $('#TxtActCode').val();
                if (Getact !== 0 || Getact !== '') {
                    handleTxtActCodeBlur();
                }

                function handleTxtActCodeBlur() {
                    var txtActCode = document.getElementById('TxtActCode');
                    var txtActName = document.getElementById('TxtActName');

                    // Retrieve the matching element using data attribute
                    var matchingElement = document.querySelector(`[data-accode="${txtActCode.value}"]`);

                    if (matchingElement) {
                        // Retrieve the values from the matching element's data attributes
                        var acName = matchingElement.getAttribute('data-acname');
                        var acCode = matchingElement.getAttribute('data-accode');

                        // Set the values to the TxtActName textbox
                        txtActName.value = acName;

                        // Additional logic if needed
                        // ...
                        dataget();
                    }
                }

                // Attach the function to the blur event of TxtActCode textbox
                var txtActCode = document.getElementById('TxtActCode');
                txtActCode.addEventListener('blur', handleTxtActCodeBlur);

                // Attach the function to the keydown event of TxtActCode textbox to handle Enter key press
                txtActCode.addEventListener('keydown', function(event) {
                    if (event.keyCode === 13) {
                        handleTxtActCodeBlur();
                    }
                });
            });

            $(document).ready(function() {

                $('.parrent').dblclick(function(e) {
                    let AcCode = $(this).data('accode');
                    $('#TxtActCode').val(AcCode);
                    let AcName = $(this).data('acname');
                    $('#TxtActName').val(AcName);
                    $('#chart').modal('hide');

                })


            });



            function dataget() {
                //  var acCode = $('#TxtActCode').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/ACFillType',
                    type: 'POST',
                    data: {
                        ActCode: $('#TxtActCode').val(),
                    },
                    success: function(response) {
                        console.log(response);
                        let data = response.Trans;
                        let select = document.getElementById('CmbType');
                        select.innerHTML = ""; // Clear the select element
                        data.forEach(function(item) {
                            select.innerHTML += "<option value=" + item.Vnoc + ">" + item.Vnoc +
                                "</option>";
                        });

                    },
                    error: function(xhr, status, error) {
                        console.log(error);

                    }
                });


            }
            $(document).ready(function() {

                $('#CmdGenerate').click(function(e) {
                    e.preventDefault();
                    var ACTcode = $('#TxtActCode').val().trim();
                    if (ACTcode.length === 0) {
                        $('#TxtActCode').focus();
                        return;
                    }

                    var MDateTo = new Date($('#TxtDateTo').val());
                    var Myear = MDateTo.getFullYear();
                    var Mmonth = ("0" + (MDateTo.getMonth() + 1)).slice(-2);
                    var Mday = ("0" + MDateTo.getDate()).slice(-2);
                    MDateTo = year + "-" + month + "-" + day;

                    var MDateFrom = new Date($('#TxtDateFrom').val());
                    var year = MDateFrom.getFullYear();
                    var month = ("0" + (MDateFrom.getMonth() + 1)).slice(-2);
                    var day = ("0" + MDateFrom.getDate()).slice(-2);
                    MDateFrom = year + "-" + month + "-" + day;
                    var Qry = '';

                    var ChkDesALL = document.getElementById('ChkDesALL');
                    var ChkGodownAll = document.getElementById('ChkGodownAll');
                    var ChkTermsAll = document.getElementById('ChkTermsAll');
                    var ChkTypeAll = document.getElementById('ChkTypeAll');
                    var ChkVnonALL = document.getElementById('ChkVnonALL');

                    // console.log(Qry);

                    if (!$("#ChkDesALL").is(":checked")) {
                        if (Qry !== "") Qry += " and ";
                        Qry += "Des like '%" + $('#TxtDes').val() + "%'";
                    }
                    // console.log(Qry);

                    if (!$("#ChkTermsAll").is(":checked")) {
                        if (Qry !== "") Qry += " and ";
                        Qry += "TransType='" + $('#CmbTerms :selected').text() + "'";
                    }
                    // console.log(Qry);

                    if (!$("#ChkTypeAll").is(":checked")) {
                        if (Qry !== "") Qry += " and ";
                        Qry += "Vnoc='" + $('#CmbType').val() + "'";
                    }

                    // console.log(Qry);
                    if (!$("#ChkVnonALL").is(":checked")) {
                        if (Qry !== "") Qry += " and ";
                        Qry += "Vnon=" + parseFloat($('#TxtVnon').val()) + "";
                    }
                    // console.log(Qry);

                    if (!$("#ChkGodownAll").is(":checked")) {
                        if (Qry !== "") Qry += " and ";
                        Qry += "GodownCode='" + $('#Location').val() + "'";
                    }

                    // console.log(Qry);

                    ChkGodownAll = $("#ChkGodownAll").is(":checked");
                    var ChkCompanyHeading = $("#ChkCompanyHeading").is(":checked");
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '/AClGenrate',
                        type: 'POST',
                        data: {
                            ActCode: $('#TxtActCode').val(),
                            ActName: $('#TxtActName').val(),
                            TxtDateTo: $('#TxtDateTo').val(),
                            TxtDateFrom: $('#TxtDateFrom').val(),
                            Qry,
                            ChkGodownAll,
                            ChkCompanyHeading,
                        },
                        success: function(response) {
                            console.log(response);
                            $('#gTxtDateFrom').val(response.DateFrom);
                            $('#gTxtActCode').val(response.TxtActCode);
                            $('#gTxtActName').val(response.TxtActName);
                            $('#gTxtDateTo').val(response.DateTo);
                            $('#gCHeading').val(response.CHeading);
                            setTimeout(function() {
                                $('#gsubmit').click();
                            }, 1000);
                        },
                        error: function(xhr, status, error) {
                            console.log(error);

                        }
                    });




                });




                $('#Newinv').click(function(e) {
                    let table = document.getElementById('Receiptvocvertablebody');
                    table.innerHTML = "";
                    $('#TxtVoucherDate').val('');
                    $('#TxtActCashName').val('');
                    $('#TxtActCashCode').val('');
                    $('#TxtVesselName').val('');
                    $('#TxtRefNo').val('');
                    $('#TxtClientOrder').val('');
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


                $('.containers ul').each(function() {
                    $this = $(this);
                    $this.find("li").has("ul").addClass("hasSubmenu");
                });
                // Find the last li in each level
                $('.containers li:last-child').each(function() {
                    $this = $(this);
                    // Check if LI has children
                    if ($this.children('ul').length === 0) {
                        // Add border-left in every UL where the last LI has not children
                        $this.closest('ul').css("border-left", "1px solid gray");
                    } else {
                        // Add border in child LI, except in the last one
                        $this.closest('ul').children("li").not(":last").css("border-left", "1px solid gray");
                        // Add the class "addBorderBefore" to create the pseudo-element :defore in the last li
                        $this.closest('ul').children("li").last().children("a").addClass("addBorderBefore");
                        // Add margin in the first level of the list
                        $this.closest('ul').css("margin-top", "1px");
                        // Add margin in other levels of the list
                        $this.closest('ul').find("li").children("ul").css("margin-top", "20px");
                    };
                    if ($this.parents('ul').length > 1) {
                        $this.closest('ul').hide();
                        $this.prev('li').children('a').children('.fa-minus-circle').hide();
                        $this.prev('li').children('a').children('.fa-plus-circle').show();
                    }
                });
                // Add bold in li and levels above
                $('.containers ul li').each(function() {
                    $this = $(this);
                    $this.mouseenter(function() {
                        $(this).children("a").css({
                            "font-weight": "bold",
                            "color": "#336b9b"
                        });
                    });
                    $this.mouseleave(function() {
                        $(this).children("a").css({
                            "font-weight": "normal",
                            "color": "#428bca"
                        });
                    });
                });
                // Add button to expand and condense - Using FontAwesome
                $('.containers ul li.hasSubmenu').each(function() {
                    $this = $(this);
                    $this.prepend(
                        "<a href='#'><i class='fa fa-plus-circle'></i><i style='display:none;' class='fa fa-minus-circle'></i></a>"
                    );
                    $this.children("a").not(":last").removeClass().addClass("toogle");
                });
                // Actions to expand and consense
                $('.containers ul li.hasSubmenu a.toogle').click(function() {
                    $this = $(this);
                    $this.closest("li").children("ul").toggle("slow");
                    $this.children("i").toggle();
                    return false;
                });
            });
        </script>
    @stop


    @section('content')
