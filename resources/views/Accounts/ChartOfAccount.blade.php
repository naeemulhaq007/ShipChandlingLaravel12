@extends('layouts.app')



@section('title', 'Chart-Of-Account')

@section('content_header')

@stop

@section('content')
    <?php echo View::make('partials.AC_ledger'); ?>
    <?php echo View::make('partials.Modalchartofaccount')->with('BranchCode', $BranchCode); ?>


    </div>






    <div class="col-lg-12 row pt-2">
        <div class="col-md-12 contaniner">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-bold">Chart Of Account</h3>
                </div>

            </div>
        </div>


        <div class="col-md-6 contaniner">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h5 class="">Chart Of Account</h5>
                        <div class="card-tools ml-auto">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <div class="containers">
                        <ul>
                            @foreach ($Chartl1 as $l1)
                                <li><a class="parrent" data-acname="{{ $l1->AcName3 }}" data-accode="{{ $l1->ActCode }}"
                                        data-accode3="{{ $l1->AcCode3 }}" data-acname3="{{ $l1->AcName3 }}"
                                        data-accode2="{{ $l1->AcCode2 }}" data-accode1="{{ $l1->AcCode1 }}"
                                        data-chkinactive="{{ $l1->ChkInactive }}"
                                        data-openingbalance="{{ $l1->OpeningBalance }}"
                                        data-chksupplier="{{ $l1->ChkSupplier }}" data-chkcustomer="{{ $l1->ChkCustomer }}"
                                        data-chkexpence="{{ $l1->ChkExpence }}"
                                        data-raddebittrans="{{ $l1->RadDebitTrans }}"
                                        data-radcredittrans="{{ $l1->RadCreditTrans }}"
                                        data-raddebit="{{ $l1->RadDebit }}" data-radcredit="{{ $l1->RadCredit }}"
                                        data-chkrecac="{{ $l1->ChkRecAC }}" data-address="{{ $l1->Address }}"
                                        data-chklabour="{{ $l1->ChkLabour }}" data-branchcode="{{ $l1->BranchCode }}"
                                        data-opttype="{{ $l1->OptType }}" data-acode1="{{ $l1->acode1 }}"
                                        data-acode2="{{ $l1->acode2 }}" data-acode3="{{ $l1->acode3 }}"
                                        data-acode4="{{ $l1->acode4 }}" data-acode5="{{ $l1->acode5 }}"
                                        data-acode6="{{ $l1->acode6 }}" data-acode7="{{ $l1->acode7 }}"
                                        data-acode8="{{ $l1->acode8 }}" data-acode9="{{ $l1->acode9 }}"
                                        data-acode10="{{ $l1->acode10 }}" data-aclevel="{{ $l1->AcLevel }}"
                                        data-titlelevel1="{{ $l1->TitleLevel1 }}"
                                        data-titlelevel2="{{ $l1->TitleLevel2 }}"
                                        data-titlelevel3="{{ $l1->TitleLevel3 }}"
                                        data-titlelevel4="{{ $l1->TitleLevel4 }}"
                                        data-titlelevel5="{{ $l1->TitleLevel5 }}" data-address1="{{ $l1->Address1 }}"
                                        data-address2="{{ $l1->Address2 }}" data-address3="{{ $l1->Address3 }}"
                                        data-actype="{{ $l1->Actype }}" data-gst="{{ $l1->gst }}"
                                        data-sameaddress="{{ $l1->sameaddress }}" data-phone="{{ $l1->phone }}"
                                        data-fax="{{ $l1->fax }}" data-email="{{ $l1->email }}"
                                        data-optype="{{ $l1->OpType }}" data-chksalesman="{{ $l1->ChkSalesMan }}"
                                        data-chkcrbill="{{ $l1->ChkCrBill }}" data-workuser="{{ $l1->WorkUser }}"
                                        data-chknocost="{{ $l1->ChkNoCost }}" data-chkincome="{{ $l1->ChkIncome }}"
                                        data-chkdepreciation="{{ $l1->ChkDepreciation }}">{{ $l1->AcName3 }}</a>
                                    <ul>
                                        @foreach (DB::table('acfile3')->where('BranchCode', $BranchCode)->where('TitleLevel1', $l1->AcName3)->where('ACode3', 0)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l2)
                                            <li id="child"><a class="parrent" data-acname="{{ $l2->AcName3 }}"
                                                    data-accode="{{ $l2->ActCode }}" data-accode3="{{ $l2->AcCode3 }}"
                                                    data-acname3="{{ $l2->AcName3 }}" data-accode2="{{ $l2->AcCode2 }}"
                                                    data-accode1="{{ $l2->AcCode1 }}"
                                                    data-chkinactive="{{ $l2->ChkInactive }}"
                                                    data-openingbalance="{{ $l2->OpeningBalance }}"
                                                    data-chksupplier="{{ $l2->ChkSupplier }}"
                                                    data-chkcustomer="{{ $l2->ChkCustomer }}"
                                                    data-chkexpence="{{ $l2->ChkExpence }}"
                                                    data-raddebittrans="{{ $l2->RadDebitTrans }}"
                                                    data-radcredittrans="{{ $l2->RadCreditTrans }}"
                                                    data-raddebit="{{ $l2->RadDebit }}"
                                                    data-radcredit="{{ $l2->RadCredit }}"
                                                    data-chkrecac="{{ $l2->ChkRecAC }}" data-address="{{ $l2->Address }}"
                                                    data-chklabour="{{ $l2->ChkLabour }}"
                                                    data-branchcode="{{ $l2->BranchCode }}"
                                                    data-opttype="{{ $l2->OptType }}" data-acode1="{{ $l2->acode1 }}"
                                                    data-acode2="{{ $l2->acode2 }}" data-acode3="{{ $l2->acode3 }}"
                                                    data-acode4="{{ $l2->acode4 }}" data-acode5="{{ $l2->acode5 }}"
                                                    data-acode6="{{ $l2->acode6 }}" data-acode7="{{ $l2->acode7 }}"
                                                    data-acode8="{{ $l2->acode8 }}" data-acode9="{{ $l2->acode9 }}"
                                                    data-acode10="{{ $l2->acode10 }}"
                                                    data-aclevel="{{ $l2->AcLevel }}"
                                                    data-titlelevel1="{{ $l2->TitleLevel1 }}"
                                                    data-titlelevel2="{{ $l2->TitleLevel2 }}"
                                                    data-titlelevel3="{{ $l2->TitleLevel3 }}"
                                                    data-titlelevel4="{{ $l2->TitleLevel4 }}"
                                                    data-titlelevel5="{{ $l2->TitleLevel5 }}"
                                                    data-address1="{{ $l2->Address1 }}"
                                                    data-address2="{{ $l2->Address2 }}"
                                                    data-address3="{{ $l2->Address3 }}"
                                                    data-actype="{{ $l2->Actype }}" data-gst="{{ $l2->gst }}"
                                                    data-sameaddress="{{ $l2->sameaddress }}"
                                                    data-phone="{{ $l2->phone }}" data-fax="{{ $l2->fax }}"
                                                    data-email="{{ $l2->email }}" data-optype="{{ $l2->OpType }}"
                                                    data-chksalesman="{{ $l2->ChkSalesMan }}"
                                                    data-chkcrbill="{{ $l2->ChkCrBill }}"
                                                    data-workuser="{{ $l2->WorkUser }}"
                                                    data-chknocost="{{ $l2->ChkNoCost }}"
                                                    data-chkincome="{{ $l2->ChkIncome }}"
                                                    data-chkdepreciation="{{ $l2->ChkDepreciation }}">{{ $l2->AcName3 }}</a>
                                                <ul>
                                                    @foreach (DB::table('acfile3')->where('BranchCode', $BranchCode)->where('TitleLevel1', $l1->AcName3)->where('TitleLevel2', $l2->AcName3)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l3)
                                                        <li id="grandchild"><a class="parrent"
                                                                data-acname="{{ $l3->AcName3 }}"
                                                                data-accode="{{ $l3->ActCode }}"
                                                                data-accode3="{{ $l3->AcCode3 }}"
                                                                data-acname3="{{ $l3->AcName3 }}"
                                                                data-accode2="{{ $l3->AcCode2 }}"
                                                                data-accode1="{{ $l3->AcCode1 }}"
                                                                data-chkinactive="{{ $l3->ChkInactive }}"
                                                                data-openingbalance="{{ $l3->OpeningBalance }}"
                                                                data-chksupplier="{{ $l3->ChkSupplier }}"
                                                                data-chkcustomer="{{ $l3->ChkCustomer }}"
                                                                data-chkexpence="{{ $l3->ChkExpence }}"
                                                                data-raddebittrans="{{ $l3->RadDebitTrans }}"
                                                                data-radcredittrans="{{ $l3->RadCreditTrans }}"
                                                                data-raddebit="{{ $l3->RadDebit }}"
                                                                data-radcredit="{{ $l3->RadCredit }}"
                                                                data-chkrecac="{{ $l3->ChkRecAC }}"
                                                                data-address="{{ $l3->Address }}"
                                                                data-chklabour="{{ $l3->ChkLabour }}"
                                                                data-branchcode="{{ $l3->BranchCode }}"
                                                                data-opttype="{{ $l3->OptType }}"
                                                                data-acode1="{{ $l3->acode1 }}"
                                                                data-acode2="{{ $l3->acode2 }}"
                                                                data-acode3="{{ $l3->acode3 }}"
                                                                data-acode4="{{ $l3->acode4 }}"
                                                                data-acode5="{{ $l3->acode5 }}"
                                                                data-acode6="{{ $l3->acode6 }}"
                                                                data-acode7="{{ $l3->acode7 }}"
                                                                data-acode8="{{ $l3->acode8 }}"
                                                                data-acode9="{{ $l3->acode9 }}"
                                                                data-acode10="{{ $l3->acode10 }}"
                                                                data-aclevel="{{ $l3->AcLevel }}"
                                                                data-titlelevel1="{{ $l3->TitleLevel1 }}"
                                                                data-titlelevel2="{{ $l3->TitleLevel2 }}"
                                                                data-titlelevel3="{{ $l3->TitleLevel3 }}"
                                                                data-titlelevel4="{{ $l3->TitleLevel4 }}"
                                                                data-titlelevel5="{{ $l3->TitleLevel5 }}"
                                                                data-address1="{{ $l3->Address1 }}"
                                                                data-address2="{{ $l3->Address2 }}"
                                                                data-address3="{{ $l3->Address3 }}"
                                                                data-actype="{{ $l3->Actype }}"
                                                                data-gst="{{ $l3->gst }}"
                                                                data-sameaddress="{{ $l3->sameaddress }}"
                                                                data-phone="{{ $l3->phone }}"
                                                                data-fax="{{ $l3->fax }}"
                                                                data-email="{{ $l3->email }}"
                                                                data-optype="{{ $l3->OpType }}"
                                                                data-chksalesman="{{ $l3->ChkSalesMan }}"
                                                                data-chkcrbill="{{ $l3->ChkCrBill }}"
                                                                data-workuser="{{ $l3->WorkUser }}"
                                                                data-chknocost="{{ $l3->ChkNoCost }}"
                                                                data-chkincome="{{ $l3->ChkIncome }}"
                                                                data-chkdepreciation="{{ $l3->ChkDepreciation }}">{{ $l3->AcName3 }}</a>
                                                            {{-- <ul>
                                @foreach (DB::table('acfile3')->where('BranchCode', $BranchCode)->where('TitleLevel1', $l1->AcName3)->where('TitleLevel2', $l2->AcName3)->where('TitleLevel3', $l3->AcName3)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l4)
                                @if ($l4)
                                <li id="dgrandchild"><a class="parrent" data-acname="{{ $l4->AcName3 }}" data-accode="{{ $l4->ActCode }}">{{ $l4->AcName3 }}</a>
                                    </li>
                                @endif
                                @endforeach
                            </ul> --}}
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
        <div class="col-md-6 container ">
            <div class="card">
                <div class="card-header">
                    {{-- <h5 class="card-title">Item Box</h5> --}}

                    <button class="btn mx-1 btn-info collapse-button">Collapse All</button>
                    <button class="btn mx-1 btn-info expand-button">Expand All</button>
                    <label for="" id="titlelevel1"></label>
                    <label for="" id="titlelevel2"></label>
                    <label for="" id="titlelevel3"></label>
                    <label for="" id="titlelevel4"></label>
                    <label for="" id="titlelevel5"></label>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>


                    </div>
                </div>



                <!-- /.card-header -->
                <div class="card-body">


                    <div class="row py-2">

                        <div class="inputbox col-sm-6">
                            <input class="" type="text" name="TxtAccode" id="TxtAccode" placeholder="">
                            <span class="" id="">A/c Code</span>
                        </div>

                        <a name="" id="" data-target="#chart" data-toggle="modal"
                            class="btn btn-info col-sm-1" role="button"><i class="fa fa-search"
                                aria-hidden="true"></i></a>


                        <div class="CheckBox1">
                            <label class="input-group text-info mx-2 mt-2">
                                <input class="" type="checkbox" name="ChkInActive" id="ChkInActive"
                                    value=""> Inactive
                            </label>
                        </div>

                    </div>


                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtAcName" id="TxtAcName"
                                placeholder="Account Title">
                            <span class="" id="">Account Title</span>
                        </div>
                    </div>
                    <div class="row py-2 ml-5">

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-3">
                                <input class=" " type="checkbox" name="ChkCustomer" id="ChkCustomer"
                                    value="">
                                Customer
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-3">
                                <input class=" " type="checkbox" name="ChkExpenses" id="ChkExpenses"
                                    value="">
                                Expenses
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-3">
                                <input class=" " type="checkbox" name="ChkSalesMan" id="ChkSalesMan"
                                    value="">
                                Sales Man
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-2">
                                <input class=" " type="checkbox" name="ChkIncome" id="ChkIncome" value="">
                                Income
                            </label>
                        </div>
                    </div>

                    <div class="row py-2 ml-5">

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-3">
                                <input class=" " type="checkbox" name="ChkSupplier" id="ChkSupplier"
                                    value=""> Supplier
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-4">
                                <input class=" " type="checkbox" name="ChkRecAct" id="ChkRecAct" value="">
                                Bank/Cash
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info">
                                <input class=" " type="checkbox" name="ChkCrBill" id="ChkCrBill" value="">
                                Cr. Bill
                            </label>
                        </div>

                        <div class="CheckBox1">
                            <label class="input-group text-info mx-5">
                                <input class=" " type="checkbox" name="ChkDepreciation" id="ChkDepreciation"
                                    value=""> Depreciation
                            </label>
                        </div>
                    </div>


                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtAdd1" id="TxtAdd1" placeholder="Address">

                            <span class="" id="">Address</span>
                        </div>
                    </div>


                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtRem" id="TxtRem" value="-"
                                placeholder="">
                            <span class="" id="">GST</span>
                        </div>
                    </div>


                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtAdd21" id="TxtAdd21" value=""
                                placeholder="">
                            <span class="" id="">Mail Address</span>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="CheckBox1">
                            <label class="input-group text-info mx-2 mt-2">
                                <input class="" type="checkbox" name="ChkSameAddress" id="ChkSameAddress"
                                    value=""> Same As
                                Above
                            </label>
                        </div>
                        <div class="inputbox col-sm-10">

                        <input class="" type="text" name="TxtAdd22" id="TxtAdd22" value=""
                            placeholder="">
                        </div>
                    </div>


                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtPhone" id="TxtPhone"
                            value="" placeholder="">
                            <span class="" id="">Phone No</span>
                        </div>
                    </div>


                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="TxtFaxNo" id="TxtFaxNo"
                            value="" placeholder="">
                            <span class="" id="">Account #</span>
                        </div>
                    </div>


                    <div class="row py-2">
                        <div class="inputbox col-sm-12">
                            <input class="" type="text" name="txtemail" id="txtemail"
                            value="" placeholder="">
                            <span class="" id="">Email Address</span>
                        </div>
                    </div>

                    <div class="row py-2">
                        <label for="" class="text-right col-sm-10" id="LblBalance">0</label>
                    </div>

                    <div class="row py-2">
                        <div class="col-sm-9"></div>
                        <a name="CmdMoreInfo" id="CmdMoreInfo" data-toggle="modal" data-target="#AC_ledger"
                            class="form-control col-sm-2 btn btn-info">Ledger</a>
                    </div>













                    <div class="rdform row mt-3 ml-1">

                        <input id="OptTradingAc" type="radio" class="rainput" name="hopping" value="">
                        <label class="ralabel mx-2" for="OptTradingAc"><span></span>C.O.G.S</label>

                        <input id="OptBalanceSheetAc" type="radio" class="rainput" name="hopping" value="" >
                        <label class="ralabel  mx-2" for="OptBalanceSheetAc"><span></span>Balance Sheet A/C</label>

                        <input id="OptPLAc" type="radio" class="rainput" name="hopping" value="" checked>
                        <label class="ralabel  mx-2" for="OptPLAc"><span></span>Profit Account</label>

                        <input id="OptNoneOfAll" type="radio" class="rainput" name="hopping" value="" >
                        <label class="ralabel  mx-2" for="OptNoneOfAll"><span></span>None Of All</label>

                        <input id="OptExpense" type="radio" class="rainput" name="hopping" value="" >
                        <label class="ralabel  mx-2" for="OptExpense"><span></span>Expense Account</label>

                        <div class="worm">
                            @for ($i = 0; $i < 30; $i++)
                                <div class="worm__segment"></div>
                            @endfor
                        </div>
                    </div>

                    {{-- <div class="btn-group" data-toggle="buttons">
                        <div class="row py-1">
                            <label class="mx-2 btn btn-light">
                                <input id="OptTradingAc" type="radio" name="optype" autocomplete="off"> C.O.G.S
                            </label>
                            <label class="mx-2 btn btn-light">
                                <input id="OptBalanceSheetAc" type="radio" name="optype" autocomplete="off"> Balance
                                Sheet A/c
                            </label>

                            <label class="mx-2 btn btn-light">
                                <input id="OptPLAc" type="radio" name="optype" autocomplete="off"> Profit Account
                            </label>
                            <label class="mx-2 btn btn-light active">
                                <input id="OptNoneOfAll" type="radio" name="optype" autocomplete="off" checked> None
                                Of All
                            </label>

                            <label class="mx-2 btn btn-light">
                                <input id="OptExpense" type="radio" name="optype" autocomplete="off"> Expense Account
                            </label>
                        </div>
                    </div> --}}


                    <div class="row">
                        <div class="col-sm-7"></div>
                        <div class="input-group col-sm-2">
                            <div class="input-group-prepend">
                                <label for="" id="">Level : &nbsp;</label>
                            </div>
                            <label for="" id="Lvl">0</label>
                        </div>
                    </div>

                    <div class="row ml-5 py-2">
                        <a name="" id="CmdAdd" class="btn btn-primary mx-1" role="button"><i
                                class="fa fa-plus mr-1" aria-hidden="true"></i> Add</a>
                        <a name="" id="CmdSave" class="btn btn-success mx-1" role="button"><i
                                class="fa fa-cloud mr-1" aria-hidden="true"></i> Save</a>
                        <a name="" id="CmdDelete" class="btn btn-warning mx-1" role="button"><i
                                class="fa fa-trash mr-1" aria-hidden="true"></i> Delete</a>
                        <a name="" id="CmdFind" class="btn btn-dark mx-1" role="button"><i
                                class="fa fa-address-book mr-1" aria-hidden="true"></i> Main Account</a>
                        <a name="" id="CmdUpdate" class="btn btn-primary mx-1" role="button"><i
                                class="fa fa-recycle mr-1" aria-hidden="true"></i> Update</a>
                        <a name="" id="CmdExit" class="btn btn-danger mx-1" role="button"><i
                                class="fa fa-door-open" aria-hidden="true"></i> Exit</a>
                    </div>
                    <div hidden class="row py-2">

                        <input class="form-control" type="text" id="TxtOpBal" name="TxtOpBal">
                        <input class="form-control" type="text" id="a1" name="a1">
                        <input class="form-control" type="text" id="a2" name="a2">
                        <input class="form-control" type="text" id="a3" name="a3">
                        <input class="form-control" type="text" id="a4" name="a4">
                        <input class="form-control" type="text" id="a5" name="a5">
                        <input class="form-control" type="text" id="a6" name="a6">
                        <input class="form-control" type="text" id="a7" name="a7">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="mx-2 btn btn-light">
                                <input id="OpDR" type="radio" name="opob" autocomplete="off"> DR
                            </label>
                            <label class="mx-2 btn btn-light">
                                <input id="OpCR" type="radio" name="opob" autocomplete="off"> CR
                            </label>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </form> --}}


@stop

@section('css')
    {{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> --}}
    {{-- <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"> --}}
    <style>
        header {
            margin-top: 3rem;
            width: 100%;
            height: 6vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* margin-bottom: 30px; */
        }

        header h5 {
            position: absolute;
            width: 70%;
            font-size: 35px;
            font-weight: 600;
            color: transparent;
            background-image: linear-gradient(to right, #553c9a, #ee4b2b, #00c2cb, #ff7f50, #553c9a);
            -webkit-background-clip: text;
            background-clip: text;
            background-size: 200%;
            background-position: -200%;
            transition: all ease-in-out 2s;
            cursor: pointer;
        }

        header h5:hover {
            background-position: 200%;
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
        transform: translateX(6.88em);
        /* Distance Can be changed accorfing to length of letters */
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
        transform: translateX(17.75em);
        /* Distance Can be changed accorfing to length of letters */
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
    .rainput:nth-of-type(4):checked~.worm .worm__segment {
        transform: translateX(27.05em);
    }

    .rainput:nth-of-type(4):checked~.worm .worm__segment:before {
        animation-name: hop4;
    }

    @keyframes hop4 {

        from,
        to {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-1.5em);
        }
    }

    .rainput:nth-of-type(5):checked~.worm .worm__segment {
        transform: translateX(34.95em);
    }

    .rainput:nth-of-type(5):checked~.worm .worm__segment:before {
        animation-name: hop5;
    }

    @keyframes hop5 {

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            // Get a reference to the input element by its id
            const $txtAccode = $("#TxtAccode");

            $txtAccode.on("change", function() {
                // Get the value of the input field
                const act = $txtAccode.val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Make an AJAX request to your server-side script
                $.ajax({
                    type: 'POST',
                    url: '{{ URL::to('transcode') }}',
                    data: {
                        act: act
                    },
                    success: function(data) {
                        // This code block will be executed when the AJAX request is successful
                        //   console.log("The sum of TransAmt is: " + data.MTransAmt);
                        $('#LblBalance').text(parseFloat(data.MTransAmt).toFixed(2));
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // This code block will be executed if the AJAX request encounters an error
                        console.error("AJAX request failed: " + errorThrown);
                    }
                });
            });



            function vnill() {

                $('#ChkIncome').prop('checked', false);
                $('#ChkSalesMan').prop('checked', false);
                $('#ChkRecAct').prop('checked', false);
                $('#ChkCrBill').prop('checked', false);
                $('#ChkSameAddress').prop('checked', false);
                $('#ChkInActive').prop('checked', false);
                $('#TxtAccode').val('');
                $('#TxtAcName').val('');
                $('#TxtOpBal').val('');
                $('#TxtPhone').val('');
                $('#TxtFaxNo').val('');
                $('#txtemail').val('');
                $('#TxtAdd1').val('');
                $('#TxtAdd2').val('');
                $('#TxtAdd3').val('');
                $('#TxtRem').val('');
                $('#TxtAdd22').val('');
                $('#TxtAdd23').val('');
                $('#Level1').text('');
                $('#Level2').text('');
                $('#Level3').text('');
                $('#Level4').text('');
                $('#Level5').text('');
                $('#a1').val('');
                $('#a2').val('');
                $('#a3').val('');
                $('#a4').val('');
                $('#a5').val('');
                $('#a6').val('');
                $('#a7').val('');
                $('#Lvl').text('');
                $('#TxtOpBal').val('');
                let openingbalance = $('#TxtOpBal').val();

                if (openingbalance > 0) {
                    $('#OpCR').prop('checked', true);
                    $('#OpDR').prop('checked', false);
                } else {
                    $('#OpDR').prop('checked', true);
                    $('#OpCR').prop('checked', false);
                }
            };

            function codegen(TxtAcName) {
                let Accode = $('#TxtAccode').val();
                let acName = TxtAcName;
                let Lvl = $('#Lvl').val();
                if (Accode == '') {
                    $('#TxtAccode').focus();
                    return;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ URL::to('chartedcodegen') }}',
                    data: {
                        acName,
                        Accode,
                        Lvl,
                    },

                    success: function(response) {
                        if (response.hasOwnProperty('message')) {
                            alert(response.message);
                        }
                        if (response.Lvl == 2) {
                            $('#a2').val(response.tcode);
                            $('#titlelevel1').text(response.acName);
                        }
                        if (response.Lvl == 3) {
                            $('#a3').val(response.tcode);
                            $('#titlelevel2').text(response.acName);
                        }
                        if (response.Lvl == 4) {
                            $('#a4').val(response.tcode);
                            $('#titlelevel3').text(response.acName);
                        }
                        if (response.Lvl == 7) {
                            vnill();
                            $('#TxtAccode').val('');
                            $('#CmdAdd').click();
                            alert('level 7');
                        }
                        if (response.hasOwnProperty('txtAccode')) {
                            let code = response.txtAccode;
                            $('#TxtAccode').val(code);
                        }

                        $('#Lvl').text(response.Lvl);

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }

                });


            };

            function clear() {
                let TxtAcName = $('#TxtAcName').val();
                $('#TxtAcName').val('');
                $('#TxtOpBal').val(0);
                $('#TxtPhone').val('');
                $('#txtemail').val('');
                $('#TxtAdd1').val('');
                $('#TxtAdd2').val('');
                $('#TxtAdd3').val('');
                $('#TxtRem').val('');
                $('#ChkDepreciation').prop('checked', false);
                $('#Lvl').text(0);
                let TxtOpBal = $('#TxtOpBal').val();
                if (TxtOpBal < 0) {
                    $('#OpCR').prop('checked', true);
                    $('#OpDR').prop('checked', false);
                } else {
                    $('#OpDR').prop('checked', true);
                    $('#OpCR').prop('checked', false);
                }
                codegen(TxtAcName);
                if ($('#TxtAccode').val() == "") {

                    $('#CmdAdd').focus();
                    return;
                } else {
                    $('#TxtAcName').focus();

                }
            };

            $('#CmdAdd').click(function(e) {
                let Accode = $('#TxtAccode').val();
                let acName = $('#TxtAcName').val();
                let Lvl = $('#Lvl').text();

                if (Accode.trim().length === 0) {
                    alert("Please Select Account First");
                    return;
                }
                if (acName.trim().length === 0) {
                    alert("Please Select Control a/c Before Add Code");
                    return;
                }
                if (Lvl >= 5) {
                    alert("You Can Not Open More Than 5 Level");
                    return;
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ URL::to('cmdchartedadd') }}',
                    data: {
                        acName,
                        Accode,
                        Lvl,
                    },

                    success: function(response) {
                        if (response.status == 'data') {
                            (
                                'Already Have Transctions in this Account, Please Select Control Account'
                            );
                        } else {
                            if (response.hasOwnProperty('message')) {
                                alert(response.message);
                                return;
                            }
                            if (response.hasOwnProperty('acName')) {
                                let length = response.acName.length;
                                console.log(response);
                                console.log(response.acName);
                                console.log(length);
                                if (length === 0) {
                                    alert('Please Select Control a/c Before Add Code');
                                    return;
                                }
                            }
                            clear();
                            if (response.hasOwnProperty('level')) {
                                $('#Lvl').text(response.level);

                            }
                        }
                        // alert(response.status);
                        console.log(response);

                        // clear();
                        // Handle other response properties here

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }

                });


                // alert('Add');
            });
            $('#CmdSave').click(function(e) {
                let OpCr = $('#OpCR').is(":checked");
                let ChkSameAddress = $('#ChkSameAddress').is(":checked");
                let ChkInactive = $('#ChkInactive').is(":checked");
                let OptNoneOfAll = $('#OptNoneOfAll').is(":checked");
                let OptTradingAc = $('#OptTradingAc').is(":checked");
                let OptPLAc = $('#OptPLAc').is(":checked");
                let OptExpense = $('#OptExpense').is(":checked");
                let OptBalanceSheetAc = $('#OptBalanceSheetAc').is(":checked");
                let ChkExpence = $('#ChkExpence').is(":checked");
                let ChkSupplier = $('#ChkSupplier').is(":checked");
                let ChkCustomer = $('#ChkCustomer').is(":checked");
                let ChkDepreciation = $('#ChkDepreciation').is(":checked");
                let ChkIncome = $('#ChkIncome').is(":checked");
                let ChkCrBill = $('#ChkCrBill').is(":checked");
                let ChkSalesMan = $('#ChkSalesMan').is(":checked");
                let ChkRecAC = $('#ChkRecAC').is(":checked");
                // alert(OpCr);
                // return;
                let acName = $('#TxtAcName').val();
                let Accode = $('#TxtAccode').val();
                let TxtOpBal = $('#TxtOpBal').val();
                let Address1 = $('#TxtAdd1').val();
                let Address2 = $('#TxtAdd2').val();
                let Address3 = $('#TxtAdd3').val();
                let gST = $('#TxtRem').val();
                let txtemail = $('#txtemail').val();
                let TxtFaxNo = $('#TxtFaxNo').val();
                let TxtPhone = $('#TxtPhone').val();
                let a1 = $('#a1').val();
                let a2 = $('#a2').val();
                let a3 = $('#a3').val();
                let a4 = $('#a4').val();
                let a5 = $('#a5').val();
                let a6 = $('#a6').val();
                let a7 = $('#a7').val();
                let Lvl = $('#Lvl').text();
                // alert(Lvl);
                if (Lvl == 1) {
                    $('#titlelevel1').text(acName);
                }
                if (Lvl == 2) {
                    $('#titlelevel2').text(acName);
                }
                if (Lvl == 3) {
                    $('#titlelevel3').text(acName);
                }
                if (Lvl == 4) {
                    $('#titlelevel4').text(acName);
                }
                if (Lvl == 5) {
                    $('#titlelevel5').text(acName);
                }
                let Level1 = $('#titlelevel1').text();
                let Level2 = $('#titlelevel2').text();
                let Level3 = $('#titlelevel3').text();
                let Level4 = $('#titlelevel4').text();
                let Level5 = $('#titlelevel5').text();
                // return;
                // var formData = new FormData(a1);
                // // formData.append('a1', a1);
                // formData.append('a2', a2);
                // formData.append('a3', a3);
                // formData.append('a4', a4);
                // console.log(formData);
                // return;
                if (Accode.length == 0) {
                    alert('Invalid Code entry');
                    return;
                }
                if (acName.length == 0) {
                    alert('Invalid A/c Title entry');
                    return;
                }
                acName = acName.trim();
                // alert($acName3);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ URL::to('cmdchartedsave') }}',
                    data: {
                        acName,
                        Accode,
                        TxtOpBal,
                        OpCr,
                        Address1,
                        Address2,
                        Address3,
                        gST,
                        ChkSameAddress,
                        ChkSalesMan,
                        ChkRecAC,
                        txtemail,
                        TxtFaxNo,
                        TxtPhone,
                        Level1,
                        Level2,
                        Level3,
                        Level4,
                        Level5,
                        Lvl,
                        a1,
                        a2,
                        a3,
                        a4,
                        a5,
                        a6,
                        a7,
                        ChkCrBill,
                        ChkIncome,
                        ChkInactive,
                        OptNoneOfAll,
                        OptPLAc,
                        OptExpense,
                        OptBalanceSheetAc,
                        ChkExpence,
                        ChkSupplier,
                        ChkCustomer,
                        ChkDepreciation,
                    },

                    success: function(response) {
                        if (response.status == 'data') {
                            alert('Account Name : ' + response.acName3 +
                                ' Already Exist, Please Enter Different Name');
                        }
                        if (response.hasOwnProperty('Message')) {
                            alert(response.Message);
                        }
                        alert(response.status);
                        console.log(response);
                        if (response.status == 'Account Save') {
                            location.reload();
                            // location.reload(true);
                        }
                    },
                    failed: function(response) {
                        var errors = response.responseJSON;
                        alert(errors.message);
                        //Swal.close();
                    }
                });
            });
            $('#CmdDelete').click(function(e) {
                alert('Delete');
            });
            $('#CmdFind').click(function(e) {
                alert('Find');
            });
            $('#CmdUpdate').click(function(e) {
                alert('Update');
            });
            $('#CmdExit').click(function(e) {
                alert('Exit');
            });

            $('.parrent').click(function(e) {
                let AcCode = $(this).data('accode');
                $('#TxtAccode').val(AcCode).trigger("change");
                let AcName = $(this).data('acname');
                $('#TxtAcName').val(AcName);
                let acname3 = $(this).data('acname3');
                let accode2 = $(this).data('accode2');
                let accode1 = $(this).data('accode1');
                let chkinactive = $(this).data('chkinactive');
                if (chkinactive > 0) {
                    $('#ChkInActive').prop('checked', true);
                } else {
                    $('#ChkInActive').prop('checked', false);
                }
                let openingbalance = $(this).data('openingbalance');
                $('#TxtOpBal').val(openingbalance);

                if (openingbalance > 0) {
                    $('#OpDR').prop('checked', true);
                    $('#OpCR').prop('checked', false);
                } else {
                    $('#OpCR').prop('checked', true);
                    $('#OpDR').prop('checked', false);
                }
                let chksupplier = $(this).data('chksupplier');
                if (chksupplier > 0) {
                    $('#ChkSupplier').prop('checked', true);
                } else {
                    $('#ChkSupplier').prop('checked', false);
                }
                let chkcustomer = $(this).data('chkcustomer');
                if (chkcustomer > 0) {
                    $('#ChkCustomer').prop('checked', true);
                } else {
                    $('#ChkCustomer').prop('checked', false);
                }
                let chkexpence = $(this).data('chkexpence');
                if (chkexpence > 0) {
                    $('#ChkExpenses').prop('checked', true);
                } else {
                    $('#ChkExpenses').prop('checked', false);
                }
                let raddebittrans = $(this).data('raddebittrans');
                let radcredittrans = $(this).data('radcredittrans');
                let raddebit = $(this).data('raddebit');
                let radcredit = $(this).data('radcredit');
                let chkrecac = $(this).data('chkrecac');
                if (chkrecac > 0) {
                    $('#ChkRecAct').prop('checked', true);
                } else {
                    $('#ChkRecAct').prop('checked', false);
                }
                let address = $(this).data('address');

                let chklabour = $(this).data('chklabour');
                let branchcode = $(this).data('branchcode');
                let OptType = $(this).data('opttype');
                let acode1 = $(this).data('acode1');
                $('#a1').val(acode1);
                let acode2 = $(this).data('acode2');
                $('#a2').val(acode2);
                let acode3 = $(this).data('acode3');
                $('#a3').val(acode3);
                let acode4 = $(this).data('acode4');
                $('#a4').val(acode4);
                let acode5 = $(this).data('acode5');
                $('#a5').val(acode5);
                let acode6 = $(this).data('acode6');
                $('#a6').val(acode6);
                let acode7 = $(this).data('acode7');
                $('#a7').val(acode7);
                let acode8 = $(this).data('acode8');
                let acode9 = $(this).data('acode9');
                let acode10 = $(this).data('acode10');
                let aclevel = $(this).data('aclevel');
                $('#Lvl').text(aclevel);
                let titlelevel1 = $(this).data('titlelevel1');
                $('#titlelevel1').text(titlelevel1);
                let titlelevel2 = $(this).data('titlelevel2');
                $('#titlelevel2').text(titlelevel2);
                let titlelevel3 = $(this).data('titlelevel3');
                $('#titlelevel3').text(titlelevel3);
                let titlelevel4 = $(this).data('titlelevel4');
                $('#titlelevel4').text(titlelevel4);
                let titlelevel5 = $(this).data('titlelevel5');
                $('#titlelevel5').text(titlelevel5);
                let address1 = $(this).data('address1');
                $('#TxtAdd1').val(address1);
                let address2 = $(this).data('address2');
                $('#TxtAdd2').val(address2);
                let address3 = $(this).data('address3');
                $('#TxtAdd3').val(address3);
                let actype = $(this).data('actype');
                let gst = $(this).data('gst');
                $('#TxtRem').val(gst);
                let sameaddress = $(this).data('sameaddress');
                $('#TxtAdd22').val(address3);
                let phone = $(this).data('phone');
                $('#TxtPhone').val(phone);
                let fax = $(this).data('fax');
                $('#TxtFaxNo').val(fax);
                let email = $(this).data('email');
                $('#txtemail').val(email);
                let optype = $(this).data('optype');
                if (OptType == 'N') {
                    $('#OptNoneOfAll').prop('checked', true).parent().addClass('active');
                    $('#OptTradingAc').prop('checked', false).parent().removeClass('active');
                    $('#OptPLAc').prop('checked', false).parent().removeClass('active');
                    $('#OptExpense').prop('checked', false).parent().removeClass('active');
                    $('#OptBalanceSheetAc').prop('checked', false).parent().removeClass('active');
                } else if (OptType == 'C') {
                    $('#OptTradingAc').prop('checked', true).parent().addClass('active');
                    $('#OptNoneOfAll').prop('checked', false).parent().removeClass('active');
                    $('#OptPLAc').prop('checked', false).parent().removeClass('active');
                    $('#OptExpense').prop('checked', false).parent().removeClass('active');
                    $('#OptBalanceSheetAc').prop('checked', false).parent().removeClass('active');
                } else if (OptType == 'P') {
                    $('#OptPLAc').prop('checked', true).parent().addClass('active');
                    $('#OptTradingAc').prop('checked', false).parent().removeClass('active');
                    $('#OptNoneOfAll').prop('checked', false).parent().removeClass('active');
                    $('#OptExpense').prop('checked', false).parent().removeClass('active');
                    $('#OptBalanceSheetAc').prop('checked', false).parent().removeClass('active');
                } else if (OptType == 'E') {
                    $('#OptExpense').prop('checked', true).parent().addClass('active');
                    $('#OptPLAc').prop('checked', false).parent().removeClass('active');
                    $('#OptTradingAc').prop('checked', false).parent().removeClass('active');
                    $('#OptNoneOfAll').prop('checked', false).parent().removeClass('active');
                    $('#OptBalanceSheetAc').prop('checked', false).parent().removeClass('active');
                } else if (OptType == 'B') {
                    $('#OptBalanceSheetAc').prop('checked', true).parent().addClass('active');
                    $('#OptExpense').prop('checked', false).parent().removeClass('active');
                    $('#OptPLAc').prop('checked', false).parent().removeClass('active');
                    $('#OptTradingAc').prop('checked', false).parent().removeClass('active');
                    $('#OptNoneOfAll').prop('checked', false).parent().removeClass('active');
                } else {
                    $('#OptNoneOfAll').prop('checked', true).parent().addClass('active');
                    $('#OptTradingAc').prop('checked', false).parent().removeClass('active');
                    $('#OptPLAc').prop('checked', false).parent().removeClass('active');
                    $('#OptExpense').prop('checked', false).parent().removeClass('active');
                    $('#OptBalanceSheetAc').prop('checked', false).parent().removeClass('active');
                }


                let chksalesman = $(this).data('chksalesman');
                if (chksalesman > 0) {
                    $('#ChkSalesMan').prop('checked', true);
                } else {
                    $('#ChkSalesMan').prop('checked', false);
                }
                let chkcrbill = $(this).data('chkcrbill');
                if (chkcrbill > 0) {
                    $('#ChkCrBill').prop('checked', true);
                } else {
                    $('#ChkCrBill').prop('checked', false);
                }
                let workuser = $(this).data('workuser');
                $('#LBLWorkUser').text(workuser);

                let chknocost = $(this).data('chknocost');
                if (chknocost > 0) {
                    $('#ChknoCost').prop('checked', true);
                } else {
                    $('#ChknoCost').prop('checked', false);
                }
                let chkincome = $(this).data('chkincome');
                if (chkincome > 0) {
                    $('#ChkIncome').prop('checked', true);
                } else {
                    $('#ChkIncome').prop('checked', false);
                }
                let chkdepreciation = $(this).data('chkdepreciation');
                if (chkdepreciation > 0) {
                    $('#ChkDepreciation').prop('checked', true);
                } else {
                    $('#ChkDepreciation').prop('checked', false);
                }

                $('#chart').modal('hide');
                $('.modal-backdrop').remove();

                // alert(AcName);
            });

            // Collapse all subtrees on button click
            $('.collapse-button').click(function() {
                // $('.toogle > .fa-plus-circle').trigger('click');
                $('.containers li:last-child').each(function() {
                    $this = $(this);

                    if ($this.parents('ul').length > 1) {
                        $this.closest('ul').hide();
                        $this.prev('li').children('a').children('.fa-minus-circle').hide();
                        $this.prev('li').children('a').children('.fa-plus-circle').show();
                    }
                });
            });
            // Expand all subtrees on button click
            $('.expand-button').click(function() {
                // $('.toogle > .fa-minus-circle').trigger('click');
                $('.containers li:last-child').each(function() {
                    $this = $(this);

                    if ($this.parents('ul').length > 1) {
                        $this.closest('ul').show();
                        $this.prev('li').children('a').children('.fa-plus-circle').hide();
                        $this.prev('li').children('a').children('.fa-minus-circle').show();
                    }
                });
            });


            // Select the main list and add the class "hasSubmenu" in each LI that contains an UL
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
