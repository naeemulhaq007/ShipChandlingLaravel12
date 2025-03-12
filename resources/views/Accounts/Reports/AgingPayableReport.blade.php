@extends('layouts.app')



@section('title', 'Aging-Payable-Report')

@section('content_header')

@stop

@section('content')
<?php echo View::make('partials.Chartacmodal')->with('BranchCode', $BranchCode) ?>

    </div>

    <div class="container-fluid">

        <div class="col-lg-12 py-3">


            <div class="card ">
                <div class="card-header" style="background-color: #eeeeee">
                    <div class="row">
                        <h3 class="mx-auto"><b>Aging Payable Report</b></h3>
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
                            <span class="" id="">Up To</span>
                        </div>

                    </div>

                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="row">

                                <div class="inputbox col-sm-1">
                                    <input class="" type="text" name="TxtActCode" id="TxtActCode">
                                    <span class="" id=""></span>

                                </div>

                                <div class="inputbox col-sm-9">
                                    <input class="" readonly type="text" name="TxtActName"
                                        id="TxtActName">
                                    <span class="Txtspan" id="">Vendor</span>
                                </div>

                                <a name="CmdCustomerCode" id="CmdCustomerCode" class="btn btn-info"  role="button"><i class="fa fa-search" aria-hidden="true"></i></a>

                                <div class="CheckBox1">

                                    <label class="input-group text-info mt-2 ml-2">
                                        <input class=" " type="checkbox" name="ChkAll" id="ChkAll" checked
                                            value=""> ALL
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="row">

                                <div class="CheckBox1">

                                    <label class="input-group text-info mt-2 ml-2">
                                        <input class=" " type="checkbox" name="ChkCompanyHeading" id="ChkCompanyHeading" checked
                                            value=""> Company Heading
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row py-2">
                        <a name="CmdGenerate" id="CmdGenerate" class="btn btn-dark mx-1" role="button"><i
                                class="fas fa-print"></i> Generate</a>

                        <a name="CmdExit" id="CmdExit" class="btn btn-danger mx-1" href="/" role="button"><i
                                class="fas fa-door-open"></i> Exit</a>

                    </div>

                </div>
            </div>

        </div>\

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
                        // dataget();
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
                $('#CmdCustomerCode').click(function (e) {
                    e.preventDefault();
                    $('#chart').modal('show');

                });

                $('.parrent').dblclick(function(e) {
                    let AcCode = $(this).data('accode');
                    $('#TxtActCode').val(AcCode);
                    let AcName = $(this).data('acname');
                    $('#TxtActName').val(AcName);
                    $('#chart').modal('hide');

                })


            });



            // function dataget() {
            //     //  var acCode = $('#TxtActCode').val();
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     $.ajax({
            //         url: '/ACFillType',
            //         type: 'POST',
            //         data: {
            //             ActCode: $('#TxtActCode').val(),
            //         },
            //         success: function(response) {
            //             console.log(response);
            //             let data = response.Trans;
            //             let select = document.getElementById('CmbType');
            //             select.innerHTML = ""; // Clear the select element
            //             data.forEach(function(item) {
            //                 select.innerHTML += "<option value=" + item.Vnoc + ">" + item.Vnoc +
            //                     "</option>";
            //             });

            //         },
            //         error: function(xhr, status, error) {
            //             console.log(error);

            //         }
            //     });


            // }
            $(document).ready(function() {

                $('#CmdGenerate').click(function(e) {
                    e.preventDefault();


                    var ACTcode = $('#TxtActCode').val().trim();
                    console.log($("#ChkAll").is(":checked"));
                    if(!$("#ChkAll").is(":checked")){

                        if (ACTcode.length === 0) {
                            $('#TxtActCode').focus();
                            return;
                        }
                    }


                    // console.log(Qry);


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{route("AgingPayableReportGen")}}',
                        type: 'POST',
                        data: {
                            ActCode: $('#TxtActCode').val(),
                            ActName: $('#TxtActName').val(),
                            TxtDateTo: $('#TxtDateTo').val(),
                            ChkAll: $("#ChkAll").is(":checked"),
                        },
                        success: function(response) {
                            console.log(response);
                            if(response.Message == 'Saved'){
                                // window.location.href = '{{route("AgingReportPrint")}}';
                            }

                        },
                        error: function(xhr, status, error) {
                            console.log(error);

                        }
                    });




                });




                $('#Newinv').click(function(e) {
                    $('#TxtActCode').val('');
                    $('#TxtActName').val('');
                });



            });
        </script>
    @stop


    @section('content')
