@extends('layouts.app')



@section('title', 'Trial-Balance')

@section('content_header')

@stop

@section('content')
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
                    <h3 class="text-center">Trial Balance</h3>

                </div>
                <div class="card-body">
                    <div class="row py-1">

                        <div class="inputbox col-sm-3">
                            <span class="Txtspan" id="">Date From</span>
                            <input id='TxtDateFrom' type="date" class="" value="">
                        </div>

                        <div class="inputbox col-sm-3">
                            <span class="Txtspan" id="">To</span>
                            <input id='TxtDateTo' type="date" class="" value="">
                        </div>

                    </div>

                    <div class="row py-2">

                        <div class="inputbox col-sm-6">
                            <span class="Txtspan" id="">A/c Code</span>
                            <input type="text" name="TxtActName" id="TxtActName">
                        </div>

                        <div class="inputbox col-sm-1">
                            <input type="text" name="TxtActCode" id="TxtActCode">
                        </div>

                        <button style="cursor: pointer;" onMouseOver="this.style.color='white'"
                            onMouseOut="this.style.color='white'" class="btn btn-info" data-target="#chart"
                            data-toggle="modal" id=""><i class="fas fa-search "></i></button>

                        <div class="CheckBox1 mt-2 ml-2">
                            <label class="input-group text-info mx-1">
                                <input class=" " type="checkbox" name="ChkActCode" id="ChkActCode" checked
                                    value=""> All
                            </label>
                        </div>

                        <div class="CheckBox1 mt-2 ml-3">

                            <label class="input-group text-info mx-1">
                                <input class=" " type="checkbox" onclick="" name="ChkCompanyHeading"
                                    id="ChkCompanyHeading" checked value=""> Company Heading
                            </label>

                        </div>
                        <div class="CheckBox1 mt-2 ml-2">

                            <label class="input-group text-info mx-1">
                                <input class="" type="checkbox" onclick="" name="ChkOnlyChartOfAccount"
                                    id="ChkOnlyChartOfAccount" checked value=""> Show Chart of Account
                            </label>

                        </div>

                    </div>
                    <div class="row py-2">
                        <div class="inputbox col-sm-6">
                            <span class="Txtspan" id="">Branch</span>
                            <input readonly disabled class="text-center" type="text" name="TxtBranchName"
                                value="{{ $BranchName }}" id="TxtBranchName">
                        </div>

                        <div class="inputbox col-sm-1">

                            <input readonly disabled class="text-center" type="text" name="TxtBranchCode"
                                value="{{ $MBranchCode }}" id="TxtBranchCode">
                        </div>

                        <button class="btn btn-info" id=""><i class="fas fa-search"></i></button>
                        <div class="CheckBox1 mt-2 ml-2">

                            <label class="input-group text-info mx-1">
                                <input class="" disabled type="checkbox" onclick="" name="ChkBranchALL"
                                    id="ChkBranchALL" value=""> All
                            </label>

                        </div>



                    </div>
                    <div class="row py-2 ml-1">



                    <button name="CmdGenerate" id="CmdGenerate" class="btn btn-dark mx-1 col-sm-1"
                        role="button"> <i class="fa fa-file text-white" aria-hidden="true"></i> Generate</button>
                    <button name="CmdPrintChartOfAccount" id="CmdPrintChartOfAccount"
                        class="btn btn-primary mx-1 col-sm-1" role="button"><i class="fas fa-print    "></i>
                        Print</button>
                    <button name="CmdExit" id="CmdExit" class="btn btn-danger mx-1 col-sm-1" href="/"
                        role="button "><i class="fas fa-door-open  text-white fa-fw"></i> Exit</button> </div>

                </div>
                <p class="text-blue"> Double Click to Open Ledger </p>
            </div>

            <div class="rounded shadow">
                <table class="table small" id="Trialbalancetable">
                    <thead class="">
                        <tr>
                            <th>Act&nbsp;Code</th>
                            <th style="width: 700px">Account&nbsp;Name</th>
                            <th class="text-right">Debit&nbsp;Amount</th>
                            <th class="text-right">Credit&nbsp;Amount</th>
                            <th>Currency</th>
                            <th style="width: 400px">Description</th>
                        </tr>
                    </thead>
                    <tbody id="Trialbalancetablebody">

                    </tbody>
                </table>
                <div class="row py-1">
                    <div class="col-sm-2 ml-auto"></div>
                    <input type="text" class="form-control col-sm-1 mx-1 text-right" name="TxtDebitAmt"
                        id="TxtDebitAmt">
                    <input type="text" class="form-control mr-auto col-sm-1 mx-1 text-right" name="TxtCreditAmt"
                        id="TxtCreditAmt">
                </div>
            </div>



        </div>



    </div>

    <div class="modal fade bd-example-modal-lg" id="chart" tabindex="-1" role="dialog"
        aria-labelledby="searchrmod" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Search in Chart Of Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body gc-modal-body">
                    <div class="containers">
                        <ul>
                            @foreach (DB::table('acfile3')->where('BranchCode', $BranchCode)->where('ACode2', 0)->where('ACode3', 0)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l1)
                                <li><a class="parrent" data-acname="{{ $l1->AcName3 }}"
                                        data-accode="{{ $l1->ActCode }}">{{ $l1->AcName3 }}</a>
                                    <ul>
                                        @foreach (DB::table('acfile3')->where('BranchCode', $BranchCode)->where('TitleLevel1', $l1->AcName3)->where('ACode3', 0)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l2)
                                            <li id="child"><a class="parrent" data-acname="{{ $l2->AcName3 }}"
                                                    data-accode="{{ $l2->ActCode }}">{{ $l2->AcName3 }}</a>
                                                <ul>
                                                    @foreach (DB::table('acfile3')->where('BranchCode', $BranchCode)->where('TitleLevel1', $l1->AcName3)->where('TitleLevel2', $l2->AcName3)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l3)
                                                        <li id="grandchild"><a class="parrent"
                                                                data-acname="{{ $l3->AcName3 }}"
                                                                data-accode="{{ $l3->ActCode }}">{{ $l3->AcName3 }}</a>

                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
            /* font-size: 11px; */

        }

        .card-body span {}

        .form-control {
            /* font-size: 11px; */

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
            var chekdate = new Date();
            const Today = chekdate.toISOString().substring(0, 10);
            var from = new Date('01/01/2000');
            const fromday = from.toISOString().substring(0, 10);
            $('#TxtDateFrom').val(fromday);
            $('#TxtDateTo').val(Today);

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



            $('#CmdPrintChartOfAccount').click(function(e) {
                e.preventDefault();
                var DateTo = $('#TxtDateTo').val();

                window.location.href = "/TrialBalanceprint?DateTo=" + DateTo;


            });


        });
        $(document).ready(function() {
            // dataget();
            var table = $('#Trialbalancetable').DataTable({

                scrollY: 450,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,


            });
            $(".dt-button").removeClass("dt-button")




            $('#Trialbalancetable tbody').on('click', 'tr', function() {
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


            $('.parrent').dblclick(function(e) {
                let AcCode = $(this).data('accode');
                $('#TxtActCode').val(AcCode);
                let AcName = $(this).data('acname');
                $('#TxtActName').val(AcName);
                $('#chart').modal('hide');

            })




        });



        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        }

        function dataget() {
            ajaxSetup();

            $.ajax({
                url: '/TrialBalancesearch',
                type: 'POST',
                data: {
                    TxtDateTo: $('#TxtDateTo').val(),
                    TxtDateFrom: $('#TxtDateFrom').val(),
                    TxtActCode: $('#TxtActCode').val(),
                    TxtActName: $('#TxtActName').val(),
                    TxtBranchCode: $('#TxtBranchCode').val(),
                    TxtBranchName: $('#TxtBranchName').val(),
                    TxtSearchAc: $('#TxtSearchAc').val(),
                    ChkActCode: $("#ChkActCode").is(":checked"),
                    ChkCompanyHeading: $("#ChkCompanyHeading").is(":checked"),
                    ChkOnlyChartOfAccount: $("#ChkOnlyChartOfAccount").is(":checked"),
                },
                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function(resposne) {
                    console.log(resposne);

                    let data = resposne.TempTrialBalance;
                    let table = document.getElementById('Trialbalancetablebody');
                    table.innerHTML = ""; // Clear the table
                    var ids = 0;
                    var tDebit = 0;
                    var tCredit = 0;

                    data.forEach(function(item) {
                        ids = ids + 1;


                        let row = table.insertRow();
                        //   row.setAttribute("data-row-id", ids);
                        //   row.setAttribute('id', 'scoperow');

                        let ActCodeCell = row.insertCell(0);
                        ActCodeCell.innerHTML = item.ActCode;


                        let AcName3Cell = row.insertCell(1);
                        AcName3Cell.innerHTML = item.AcName3;

                        let DebitCell = row.insertCell(2);
                        DebitCell.innerHTML = parseFloat(item.Debit).toFixed(2);
                        DebitCell.style.textAlign = 'right';

                        let CreditCell = row.insertCell(3);
                        CreditCell.innerHTML = parseFloat(item.Credit).toFixed(2);
                        CreditCell.style.textAlign = 'right';

                        let AcName2Cell = row.insertCell(4);
                        AcName2Cell.innerHTML = item.AcName2;

                        let AcName1Cell = row.insertCell(5);
                        AcName1Cell.innerHTML = item.AcName1;


                        tDebit += parseFloat(item.Debit);
                        tCredit += parseFloat(item.Credit);

                    });

                    $('#TxtDebitAmt').val(tDebit.toFixed(2));
                    $('#TxtCreditAmt').val(tCredit.toFixed(2));

                    // $('#scoperow').dblclick(function () {
                    //     alert(this.td[0].innerHTML);
                    // });
                    // const table = document.getElementById("Trialbalancetable");
                    const tableBody = document.getElementById("Trialbalancetablebody");

                    tableBody.addEventListener("dblclick", function(e) {
                        if (e.target.tagName === "TD") {
                            const td = e.target;
                            const tr = td.parentNode;
                            const tdElements = tr.getElementsByTagName("td");
                            console.log(tdElements[0].innerHTML);
                            var ACt = tdElements[0].innerHTML;
                            // window.open("/Account-Ledger?ACT="+ACt);

                            window.location.href = "Account-Ledger?ACT=" + ACt;
                        }
                    });


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


            $('#CmdGenerate').click(function(e) {
                dataget();
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
