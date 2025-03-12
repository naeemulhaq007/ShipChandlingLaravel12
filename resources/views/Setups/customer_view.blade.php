@extends('adminlte::page')

@section('title', 'Customer-Setup')



@section('content')
    <?php echo View::make('partials.search'); ?>
    <?php echo View::make('partials.Customerlistimport'); ?>
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! \Session::get('success') !!}</strong>
        </div>
    @endif
    @if (\Session::has('ERROR'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! \Session::get('ERROR') !!}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach ($errors->all() as $error)
                <strong>{{ $error }}</strong>
            @endforeach

        </div>
    @endif

    <div class="container-fluid ">
        <form id="CustomerForm" enctype="multipart/form-data" >
            {{-- @csrf --}}

            <div class="card">
                <div class="card-header fixed-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary mx-2 my-1" id="BtnNew" role="button">
                            <i class="fa fa-plus mr-1" aria-hidden="true"></i>New</button>

                        <button class="btn btn-success  mx-2 my-1" type="submit" id="BtnFill" role="button">
                            <i class="fa fa-cloud" aria-hidden="true"></i> Save</button>

                        <button type="button" class="btn btn-warning mx-2 my-1" id="CmdDelete" role="button">
                            <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>

                        <a href="/" class="btn btn-danger mx-2 my-1" role="button"> <i
                                class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</a>
                        <a name="impcuslist" id="impcuslist" class="btn btn-default text-success  my-1"
                            role="button">IMPORT Customer List</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <div class="row">
                        {{-- <div class="col-sm-1"></div> --}}
                        <h2 class="text-blue">Create Customer</h2>


                    </div>

                </div>

                <div class="card-body">
                    <div class="col-md-12">


                        <div class="row firstrow">




                            <div hidden class="inputbox">
                                <input hidden type="hidden" class=" " id="TxtCustomerCode" required="required">
                                <input type="hidden" name="CustomerCode" id="CustomerCode" value="" placeholder="">
                            </div>
                            <div class="inputbox col-sm-2 py-1">

                                <input type="number" name="CustomerCode" placeholder="" id="CustomerCodeshow" required>
                                <span class="">
                                    Customer Id
                                </span>
                            </div>

                            <div id="suggestions"></div>


                            <div class="CheckBox1 col-5 mt-2 ml-2 py-1">
                                <label class="input-group text-info ml-1">
                                    <input class="" type="checkbox" name="Chk_Inactive" id="ChkInactive"
                                        value=""> Inactive
                                </label>
                            </div>
                            <input type="hidden" id="chekbox" name="ChkInactive" value="0">

                            <div class="col-sm-1 col-5 ml-2 py-1">
                                <button type="button" id="btnsearchcus" class="input-group-text bg-info"><i
                                        class="fa fa-search mr-1"></i>Search</button>
                            </div>






                        </div>



                        <div class="row">
                            <div class="inputbox col-6 col-sm-6 py-2">
                                <input oninvalid="this.setCustomValidity('Entering Customer Name is necessary!')"
                                    oninput="this.setCustomValidity('')" required title="Please enter CustomerName"
                                    type="text" name="customername" id="customername"
                                    onblur="this.value = this.value.toUpperCase()">
                                <span class="">
                                    Name
                                </span>
                            </div>
                            <div hidden class="inputbox col-sm-3 py-2">
                                <input onblur="this.value = this.value.toUpperCase()"
                                    oninvalid="this.setCustomValidity('Entering Code is necessary!')"
                                    oninput="this.setCustomValidity('')" type="text" name="CusCode" id="ccode">
                                <span class="">
                                    Code
                                </span>
                            </div>

                            <div class="inputbox col-6 col-sm-3 py-2">
                                <input type="text" onblur="this.value = this.value.toUpperCase()" name="c_type"
                                    id="c_type" >
                                <span class="">
                                    CType</span>
                            </div>
                        </div>

                        <div class="row">


                            <div class="inputbox col-6 col-sm-3 py-2">
                                <input type="text" onblur="this.value = this.value.toUpperCase()" name="v_type"
                                    id="v_type" >
                                <span class="">
                                    VType</span>
                            </div>
                            <div class="inputbox col-6 col-sm-3 py-2">
                                <span class="Txtspan">
                                    Category</span>
                                <select name="CustCategory" id="CustCategory">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="F">F</option>

                                </select>
                            </div>
                            <input class="form-control" type="hidden" name="AreaCode" id="aobcode" placeholder="">


                            <div class="inputbox  col-sm-3 py-2">
                                <span class="Txtspan">
                                    AOB
                                </span>
                                <select name="AreaofBusiness" id="aob">


                                    <option value="">Type here...</option>

                                    @foreach ($AOB as $item)
                                        <option id="" value="{{ $item->AreaofBusiness }}">
                                            {{ $item->AreaofBusiness }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row pb-2">

                            <div class="inputbox col-sm-3 py-2">
                                <span class="Txtspan">
                                    Hold
                                </span>
                                <select name="Priority" id="hold">

                                    <option selected id="holder" value=""></option>
                                    <option value=""></option>
                                    <option value="H">H</option>

                                </select>
                            </div>
                            <div hidden class="inputbox col-sm-3 py-2">
                                <span class="Txtspan">
                                    Status
                                </span>
                                <select name="Status" id="Status">
                                    <option id="Statuss" placeholder="Select your option" selected></option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>


                                </select>
                            </div>
                        </div>








                        <hr>
                        <h2 class="text-center ">General Information</h2>
                        <hr>


                        <div class="row">
                            <div class="inputbox col-sm-11 pb-2">
                                <input type="text" name="Address" id="Address" required>
                                <span class="">
                                    Address
                                </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="inputbox col-sm-3 py-2">
                                <input type="text" name="ContactPerson" id="ContactPerson"
                                    placeholder="Enter Customer Contact Person">
                                <span class="Txtspan">
                                    Contact
                                </span>
                            </div>

                            <div class="inputbox col-sm-3 py-2">
                                <input type="text" name="PhoneNo" id="PhoneNo"
                                    placeholder="Enter Customer Telephone">
                                <span class="Txtspan">
                                    Telephone
                                </span>
                            </div>
                            <div class="inputbox col-sm-3 py-2">
                                <input type="text" name="WEB" id="WEB" placeholder="Enter Customer WEB">
                                <span class="Txtspan">
                                    WEB
                                </span>
                            </div>


                        </div>

                        <div class="row">
                            <div class="inputbox col-sm-3 py-2">
                                <input type="text" name="FaxNo" id="faxno" placeholder="Enter Customer Fax">
                                <span class="Txtspan">
                                    Fax#
                                </span>
                            </div>

                            <div class="inputbox col-sm-3 py-2">
                                <input type="Email" name="EmailAddress" id="Email"
                                    placeholder="Enter Customer Email">
                                <span class="Txtspan">
                                    Email
                                </span>
                            </div>
                            <div class="inputbox col-sm-3 py-2">
                                <input type="text" name="MobileNo" id="Mobile"
                                    placeholder="Enter Customer Mobile">
                                <span class="Txtspan">
                                    Mobile No.
                                </span>
                            </div>


                        </div>

                        <div class="row ">
                            <div class="inputbox col-sm-3 py-2">
                                <span class="Txtspan">
                                    Country
                                </span>
                                <select name="Countrys" id="Countrys">

                                    <option value="">Select Country</option>
                                    {{-- @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">
                                            {{ $country->name }}
                                        </option>
                                    @endforeach --}}
                                    @foreach ($Country as $country)
                                        <option value="{{ $country->Country }}">
                                            {{ $country->Country }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="inputbox col-sm-3 py-2">
                                <span class="Txtspan">
                                    State
                                </span>
                                <select name="StateName" id="StateName">
                                    <option selected value="">Type here...</option>
                                    @foreach ($StateName as $item)
                                        <option value="{{ $item->StateName }}">{{ $item->StateName }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="inputbox col-sm-3 py-2">
                                <span class="Txtspan">
                                    City
                                </span>
                                <select name="Citys" id="Citys">

                                    <option value="">Type here...</option>
                                    @foreach ($City as $item)
                                        <option value="{{ $item->City }}">{{ $item->City }}</option>
                                    @endforeach

                                </select>
                            </div>



                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <h2 class="text-center ">Billing Information</h2>
                                        </div>
                                        {{-- <div class="col-lg-6">

                                        <h2 class="text-center">Customer Discounts</h2></div> --}}

                                    </div>

                                </div>

                                <div class="row py-2">
                                    <div class="inputbox py-2 col-sm-12">
                                        <input type="text" name="BContactPerson" id="BContactPerson"
                                            placeholder="Enter Customer ContactPerson">
                                        <span class="Txtspan">
                                            Contact Person
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="inputbox col-sm-12 py-2">
                                        <input type="text" name="BillingAddress" id="bBillingAddress"
                                            placeholder="Enter Customer BillingAddress">
                                        <span class="Txtspan">
                                            Billing Address
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="inputbox col-sm-3 py-2">
                                        <input type="text" name="BTelephoneNo" id="btelephone"
                                            placeholder="Enter Customer telephone">
                                        <span class="Txtspan">
                                            Telephone
                                        </span>
                                    </div>

                                    <div class="inputbox col-sm-3 py-2">
                                        <input type="text" name="BFaxNo" id="BFaxNo"
                                            placeholder="Enter Customer Fax">
                                        <span class="Txtspan">
                                            Fax#
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-3 py-2">
                                        <input type="Email" name="BEmailAddress" id="BEmailAddress"
                                            placeholder="Enter Customer Email">
                                        <span class="Txtspan">
                                            Email
                                        </span>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="inputbox col-sm-3 py-2">
                                        <input type="text" name="BWeb" id="BWeb"
                                            placeholder="Enter Customer WEB">
                                        <span class="Txtspan">
                                            WEB
                                        </span>
                                    </div>

                                    <div class="inputbox col-sm-3 py-2">
                                        <input type="number" name="CreditLimit" id="creditlimit"
                                            placeholder="Enter Customer creditlimit">
                                        <span class="Txtspan">
                                            Credit Limit
                                        </span>
                                    </div>
                                    <div class="inputbox col-sm-3 py-2">
                                        <span class="Txtspan">
                                            Terms
                                        </span>
                                        <select required oninvalid="this.setCustomValidity('Select Terms is necessary!')"
                                            oninput="this.setCustomValidity('')" name="Terms" id="Termss">

                                            <option id="Terms" value="" placeholder="Select your option"
                                                selected>
                                            </option>
                                            @foreach ($TermsSetup as $item)
                                                <option value="{{ $item->Terms }}">{{ $item->Terms }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                </div>

                                <div class="row py-2">

                                    <div class="inputbox col-sm-6">
                                        <textarea type="text" name="EventQuateCharges" id="eqcic" placeholder="Enter event comments"></textarea> <span class="Txtspan">
                                            Event Quote Chargers</span>

                                    </div>

                                </div>


                                <div class="row py-2">

                                    <div class="inputbox col-sm-6">
                                        <textarea type="text" name="BankDetail" id="bankdetails" placeholder="Enter Customer bank details"></textarea>
                                        <span class="Txtspan">
                                            Bank Details</span>

                                    </div>

                                </div>
                                <div class="row py-2">



                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="card-header">
                                    <div class="row">
                                        {{-- <div class="col-lg-6">

                                        <h2 class="text-center ">Billing Information</h2></div> --}}
                                        <div class="col-lg-12">

                                            <h2 class="text-center">Customer Discounts</h2>
                                        </div>

                                    </div>

                                </div>
                                <table class="table table-light table-responsive">
                                    <thead class="thead">
                                        <tr>
                                            <th>Department&nbsp;Name</th>
                                            <th>Cash&nbsp;Disc&nbsp;%</th>
                                            <th>Cr&nbsp;Note&nbsp;%</th>
                                            <th>AVI&nbsp;Rebate&nbsp;%</th>
                                            <th>Volume&nbsp;Disc&nbsp;%</th>
                                            <th>Sls&nbsp;Comm&nbsp;%</th>

                                        </tr>
                                    </thead>
                                    <tbody class="percentage">

                                        @foreach ($TypeSetup as $item)
                                            <?php
                                            $typecode = $item->TypeCode;
                                            ?>
                                            <tr>


                                                <input type="hidden" class="form-control"
                                                    id="customercodediscount{{ $item->TypeCode }}" name="cdcode[]"
                                                    value="">
                                                <input type="hidden" class="form-control" id="{{ $item->TypeCode }}"
                                                    name="cdDepartmentCode[]" value="{{ $item->TypeCode }}">
                                                <input type="hidden" class="form-control" id="{{ $item->TypeCode }}"
                                                    name="cdDepartmentName[]" value="{{ $item->TypeName }}">

                                                <td><input type="text" class="form-control" disabled
                                                        id="{{ $item->TypeCode }}" name=""
                                                        value="{{ $item->TypeName }}"></td>
                                                <td><input type="number" class="form-control" id="InvDiscPer"
                                                        name="cdInvDiscPer[]" value="" placeholder="0%"></td>
                                                <td><input type="number" class="form-control" id="CrNotePer"
                                                        name="cdCrNotePer[]" value="" placeholder="0%"></td>
                                                <td><input type="number" class="form-control" id="AVIRebatePer"
                                                        name="cdAVIRebatePer[]" value="" placeholder="0%"></td>
                                                <td><input type="number" class="form-control" id="AgentCommPer"
                                                        name="cdAgentCommPer[]" value="" placeholder="0%"></td>
                                                <td><input type="number" class="form-control SlsCommPer" id="SlsCommPer"
                                                        name="cdSlsCommPer[]" value="" placeholder="0%"></td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                                <div class="row">
                                    <div id="select-container" style="display:none;">
                                        <div class="inputbox col-sm-12 py-2">
                                            <select class="custom-select" name="SManCodedata" id="SManselect">
                                                <option id="salesman" value="" selected> </option>
                                                @foreach ($SalesMan as $item)
                                                    <option id="salesmanr" value="{{ $item->SManCode }}">
                                                        {{ $item->SManName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="Txtspan">
                                                Saleman
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>






                        <input type="hidden" class="form-control col-sm-1" name="ActCode" id="act_code"
                            value="" placeholder="">
                        <input type="hidden" class="form-control col-sm-1" name="SManActCode" id="SManAct_Code"
                            value="" placeholder="">
                    </div>


                </div>
            </div>



        </form>
    </div>
    </div>
    <div class="container-fluid ">
        <div class="col-lg-12">
            <div class="card collapsed-card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" id="cushow" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <h2 class="text-center text-info">Customer Contact</h2>



                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form id="customercontactform" enctype="multipart/form-data">
                                {{-- @csrf --}}
                                <div class="row ">

                                    <div class="inputbox py-2 col-sm-5">
                                        <input type="text" required name="coTITLE" id="coTITLE" placeholder=""
                                            list="titlr">
                                        <datalist id="titlr">
                                            <option value="MR.">
                                            <option value="MRs.">
                                            <option value="Miss">
                                        </datalist>

                                        <span class="Txtspan" id="">Title</span>

                                    </div>
                                    <div class="inputbox py-2 col-sm-5">
                                        <input readonly type="number" value="{{ $lastidcontact }}" name="coID"
                                            id="coID" placeholder="">
                                        <span class="Txtspan">ID</span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="inputbox col-sm-10">
                                        <input type="text" id="coNAME" name="coNAME" required>
                                        <span class="Txtspan">
                                            Name
                                        </span>


                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="inputbox col-sm-10">
                                        <input type="text" id="coDEPARTMENT" name="coDEPARTMENT" required>
                                        <span class="Txtspan">
                                            Department
                                        </span>


                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="inputbox col-sm-10">
                                        <input type="tel" id="coPHONE" name="coPHONE" required>
                                        <span class="Txtspan">
                                            Phone
                                        </span>


                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-10">
                                        <input type="tel" id="coCELL" name="coCELL" required>
                                        <span class="Txtspan">
                                            Cell
                                        </span>


                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-10">
                                        <input type="tel" id="coFAX" name="coFAX" required>
                                        <span class="Txtspan">
                                            Fax
                                        </span>


                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-10">
                                        <input type="email" id="coEMAIL" name="coEMAIL" required>
                                        <span class="Txtspan">
                                            Email
                                        </span>


                                    </div>
                                </div>

                                <div class="row py-2">

                                    <div class="inputbox col-sm-10">
                                        <textarea class="" name="coNOTES" id="coNOTES" rows="1"></textarea> <span class="Txtspan">
                                            Notes </span>

                                    </div>

                                </div>

                                <div class="row py-2">
                                    <div class="inputbox col-sm-10">
                                        <input type="tel" id="coIMONO" name="coIMONO" required>
                                        <span class="Txtspan">
                                            IMO No
                                        </span>


                                    </div>
                                </div>
                                <div class="col-sm-1" hidden>
                                    <a name="" id="" class="form-control btn btn-default"
                                        role="button"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>

                                <div class="row py-1">
                                    <div class="col-sm-12">
                                        <input class="form-control" type="hidden" name="coVESSEL" id="coVESSEL"
                                            placeholder="">
                                        <input class="form-control" type="hidden" name="coCustomerCode"
                                            id="coCustomerCode" placeholder="">
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <button type="button" class="btn btn-primary mx-2" id="conBtnNew" role="button">
                                        <i class="fa fa-plus mr-1" aria-hidden="true"></i>New</button>

                                    <button type="submit" class="btn btn-success mx-2" id="CmdSave" role="button">
                                        <i class="fa fa-cloud mr-1" aria-hidden="true"></i>Save</button>

                                    <button class="btn btn-danger mx-2" id="CmdPrint" role="button"> <i
                                            class="fa fa-multiply mr-1" aria-hidden="true"></i>Delete</button>

                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 table-responsive">
                            <table class="table table-responsive" id="customercontacts" style="width: 100%">
                                <thead class="bg-info">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody class="customercontact">

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="position-fixed bg-success text-white rounded p-3" id="myElement"
        style="right: -300px; top: 50px; transition: right 0.5s;">
        <p>Press F2 to Type... </p>
    </div>
@stop

@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .table-scroll {
            height: 400px;
            overflow: scroll;
        }
        @media screen and (max-width: 600px) {
            .firstrow{
                margin-top: 100px;
            }
        }
        .fixed-header {
            position: absolute; /* Initial position */
            top: 0;
            width: 100%;
            background-color: #fff; /* Set your desired background color */
            z-index: 1000; /* Set a high z-index to ensure it's above other content */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: Add a shadow for a nice effect */
            transition: background-color 0.3s; /* Optional: Add a smooth background color transition */
        }

    </style>
@stop

@section('js')

    <script>
        $(document).ready(function() {
            var header = $(".fixed-header");
  var cardBody = $(".card-body");
  var headerOffset = header.offset().top;

  $(window).scroll(function() {
    if ($(window).scrollTop() > headerOffset) {
      header.css({ position: "fixed", top: "0", width: '94.5%' });
      cardBody.css({ paddingTop: header.height() + "px" });
    } else {
      header.css({ position: "absolute", top: "0", width: '100%' });
      cardBody.css({ paddingTop: "80px" });
    }
  });

            $('#CustomerForm').submit(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get form data
            var formData = $(this).serialize();
            ajaxSetup();
            // Make an AJAX POST request
            $.ajax({
                type: 'POST',
                url: "{{route('SaveCustomer')}}", // Replace with your server endpoint
                data: formData,
                beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                success: function (response) {
                    // Handle the successful response here
                    // $('#result').html(response);
                    if (response.message == 'Error') {
                        Swaal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.Message,
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                        })
                    }else{

                        Swaal.fire({
                            icon: 'success',
                            title: 'Process Success',
                            text: 'Customer '+ response.message +' Success',
                            showConfirmButton: true,
                            timer: 1500
                        })
                    }
                    console.log(response);
                },
                error: function () {
                    // Handle errors here
                    // $('#result').html('An error occurred.');
                    Swaal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                }
               ,complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
            });
        });
            $('#customercontactform').submit(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get form data
            var formData = $(this).serialize();
            ajaxSetup();
            // Make an AJAX POST request
            $.ajax({
                type: 'POST',
                url: "{{route('cuscontactsave')}}", // Replace with your server endpoint
                data: formData,
                beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                success: function (response) {
                    // Handle the successful response here
                    // $('#result').html(response);
                    console.log(response);
                    Swaal.fire({
                        icon: 'success',
                        title: 'Process Success',
                        text: 'Customer '+ response.message +' Success',
                        showConfirmButton: true,
                        timer: 1500
                    })
                    newcontact();
                    discountsearc();
                },
                error: function () {
                    // Handle errors here
                    // $('#result').html('An error occurred.');
                    Swaal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                }
               ,complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
            });
        });
        $('#conBtnNew').click(function (e) {
            e.preventDefault();
            Swaal.fire({
            title: 'Clear Customer Contact',
            text: 'Are You Sure You Want To Clear.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Clear',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
            newcontact();

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Code to execute when "Cancel" button is clicked or overlay is clicked outside the modal
                Swal.fire(
                    'Cancelled',
                    'Not Cleared.',
                    'error'
                );
            }
        });
        });
        $('#CmdDelete').click(function (e) {
            e.preventDefault();
            var CustomerCode = $('#CustomerCodeshow').val();
            Swaal.fire({
            title: 'Deleteing Customer',
            text: 'Are You Sure You Want To Delete.',
            icon: 'question',
            input: 'password', // Adding an input field for password
            inputPlaceholder: 'Enter your password', // Placeholder for the input field
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
            showLoaderOnConfirm: true, // You can display a loader animation while confirming
                    preConfirm: (password) => {
                        // Here you can validate the password and perform your delete action
                        // You can also return a Promise if you need to perform an asynchronous action
                        return new Promise((resolve, reject) => {
                            // Example password validation
                            if (password === '332211') {
                                resolve();
                            } else {
                                reject('Incorrect password');
                            }
                        }).catch(error => {
                            Swal.showValidationMessage(`Error: ${error}`);
                            return;
                        });
                    },
        }).then((result) => {
            if (result.isConfirmed) {
            ajaxSetup();
            // Make an AJAX POST request
            $.ajax({
                type: 'POST',
                url: "{{route('DeleteCustomer')}}", // Replace with your server endpoint
                data: {
                    CustomerCode
                },
                beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                success: function (response) {
                    console.log(response);
                    Swaal.fire({
                        icon: 'success',
                        title: 'Process Success',
                        text: 'Customer '+ response.message +' Success',
                        showConfirmButton: true,
                        timer: 1500
                    })
                location.reload();

                },
                error: function () {
                    // Handle errors here
                    Swaal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                }
               ,complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Code to execute when "Cancel" button is clicked or overlay is clicked outside the modal
                Swal.fire(
                    'Cancelled',
                    'Not Deleted.',
                    'error'
                );
            }
        });
        });

            $(document).on("dblclick", ".js-click", function() {
                $targetcustcode = $(this).attr('data-custcode');
                $targetact = $(this).attr('data-act');
                $targetcuscode = $(this).attr('data-cuscode');
                $targetcusname = $(this).attr('data-cusname');
                $targetAddress = $(this).attr('data-Address');
                $targetCallSign = $(this).attr('data-CallSign');
                $targetPhoneNo = $(this).attr('data-PhoneNo');
                $targetFaxNo = $(this).attr('data-FaxNo');
                $targetEmailAddress = $(this).attr('data-EmailAddress');
                $targetWebAddress = $(this).attr('data-WebAddress');
                $targetBContactPerson = $(this).attr('data-BContactPerson');
                $BillingAddress = $(this).attr('data-BillingAddress');
                $BTelephoneNo = $(this).attr('data-BTelephoneNo');
                $BFaxNo = $(this).attr('data-BFaxNo');
                $BEmailAddress = $(this).attr('data-BEmailAddress');
                $BWeb = $(this).attr('data-BWeb');
                $Status = $(this).attr('data-Status');
                $ChkInactive = $(this).attr('data-ChkInactive');
                $CreditLimit = $(this).attr('data-CreditLimit');
                $Country = $(this).attr('data-Country');
                $BranchCode = $(this).attr('data-BranchCode');
                $Terms = $(this).attr('data-Terms');
                $EventQuateCharges = $(this).attr('data-EventQuateCharges');
                $City = $(this).attr('data-City');
                $CustomerDiscPer = $(this).attr('data-CustomerDiscPer');
                $InvoiceDiscPer = $(this).attr('data-InvoiceDiscPer');
                $SalesManCommPer = $(this).attr('data-SalesManCommPer');
                $RebaitPer = $(this).attr('data-RebaitPer');
                $CreditNotePer = $(this).attr('data-CreditNotePer');
                $AgentCommPer = $(this).attr('data-AgentCommPer');
                $BankDetail = $(this).attr('data-BankDetail');
                $Priority = $(this).attr('data-Priority');
                $EnterCustomer = $(this).attr('data-EnterCustomer');
                $CType = $(this).attr('data-CType');
                $Vtype = $(this).attr('data-Vtype');
                $CustCategory = $(this).attr('data-CustCategory');
                $AreaofBusiness = $(this).attr('data-AreaofBusiness');
                $AreaCode = $(this).attr('data-AreaCode');
                $ContactPerson = $(this).attr('data-ContactPerson');
                $StateName = $(this).attr('data-StateName');
                $CashDiscPer = $(this).attr('data-CashDiscPer');
                $MobileNo = $(this).attr('data-MobileNo');
                $SManCode = $(this).attr('data-smancode');
                $SManActCode = $(this).attr('data-SManActCode');
                $WorkUser = $(this).attr('data-WorkUser');
                $AgentCode = $(this).attr('data-AgentCode');
                $AgentActCode = $(this).attr('data-AgentActCode');
                $AssignUser = $(this).attr('data-AssignUser');
                $LastEditDateTime = $(this).attr('data-LastEditDateTime');
                // $smanname = $(this).attr('data-smanasale');

                document.getElementById("customername").value = $targetcusname;
                document.getElementById("CustomerCodeshow").value = $targetcustcode;
                document.getElementById("coCustomerCode").value = $targetcustcode;
                document.getElementById("CustomerCode").value = $targetcustcode;

                document.getElementById("ccode").value = $targetcuscode;
                document.getElementById("act_code").value = $targetact;
                document.getElementById("ccode").value = $targetcuscode;
                document.getElementById("c_type").value = $CType;
                document.getElementById("v_type").value = $Vtype;
                $('#CustCategory').val($CustCategory);

                document.getElementById("aob").value = $AreaofBusiness;
                document.getElementById("aobcode").value = $AreaCode;
                document.getElementById("holder").innerHTML = $Priority;
                document.getElementById("holder").value = $Priority;
                document.getElementById("Statuss").innerHTML = $Status;
                document.getElementById("Statuss").value = $Status;
                document.getElementById("Address").value = $targetAddress;
                document.getElementById("ContactPerson").value = $ContactPerson;
                document.getElementById("PhoneNo").value = $targetPhoneNo;
                document.getElementById("WEB").value = $targetWebAddress;
                document.getElementById("faxno").value = $targetFaxNo;
                document.getElementById("Email").value = $targetEmailAddress;
                document.getElementById("Mobile").value = $MobileNo;
                $('#StateName').val($StateName);
                $('#Citys').val($City);
                $('#Countrys').val($Country);

                document.getElementById("BContactPerson").value = $targetBContactPerson;
                document.getElementById("bBillingAddress").value = $BillingAddress;
                document.getElementById("btelephone").value = $BTelephoneNo;
                document.getElementById("BFaxNo").value = $BFaxNo;
                document.getElementById("BEmailAddress").value = $BEmailAddress;
                document.getElementById("BWeb").value = $BWeb;
                document.getElementById("creditlimit").value = $CreditLimit;
                document.getElementById("Terms").value = $Terms;
                document.getElementById("Terms").innerHTML = $Terms;
                document.getElementById("eqcic").value = $EventQuateCharges;
                document.getElementById("bankdetails").value = $BankDetail;
                document.getElementById("ChkInactive").value = $ChkInactive;
                document.getElementById("chekbox").value = $ChkInactive;
                document.getElementById("salesman").value = $SManCode;
                document.getElementById("customercodediscount1").value = $targetcustcode;
                document.getElementById("customercodediscount2").value = $targetcustcode;
                document.getElementById("customercodediscount3").value = $targetcustcode;
                document.getElementById("customercodediscount4").value = $targetcustcode;
                document.getElementById("customercodediscount7").value = $targetcustcode;
                document.getElementById("customercodediscount8").value = $targetcustcode;
                document.getElementById("customercodediscount10").value = $targetcustcode;
                document.getElementById("customercodediscount11").value = $targetcustcode;
                document.getElementById("customercodediscount12").value = $targetcustcode;
                document.getElementById("customercodediscount13").value = $targetcustcode;
                $('#searchrmod').modal('hide');

                // alert('dbl');
                // document.getElementById("chekbox").value = $ChkInactive;
                discountsearc();


                if ($ChkInactive == 1) {
                    // $("#ChkInactive").removeAttr("checked");
                    $("#ChkInactive").prop("checked", true);

                }
                if ($ChkInactive == 0) {
                    // $("#ChkInactive").removeAttr("checked");
                    $("#ChkInactive").prop("checked", false);

                }

                // $(document).ready(function() { $('#searchrmod').hide(); });
            })

            // $('#Countrys').on('change', function() {
            //     var country_id = this.value;
            //     $("#StateName").html('');
            //     $.ajax({
            //         url: "{{ url('get-states-by-country') }}",
            //         type: "POST",
            //         data: {
            //             country_id: country_id,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         dataType: 'json',
            //         success: function(result) {
            //             $('#StateName').html('<option value="">Select State</option>');
            //             $.each(result.states, function(key, value) {
            //                 $("#StateName").append('<option value="' + value.id + '">' +
            //                     value.name + '</option>');
            //             });
            //             $('#Citys').html('<option value="">Select State First</option>');
            //         }
            //     });
            // });
            // $('#StateName').on('change', function() {
            //     var state_id = this.value;
            //     $("#Citys").html('');
            //     $.ajax({
            //         url: "{{ url('get-cities-by-state') }}",
            //         type: "POST",
            //         data: {
            //             state_id: state_id,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         dataType: 'json',
            //         success: function(result) {
            //             $('#Citys').html('<option value="">Select City</option>');
            //             $.each(result.cities, function(key, value) {
            //                 $("#Citys").append('<option value="' + value.id + '">' +
            //                     value.name + '</option>');
            //             });
            //         }
            //     });
            // });
        });

        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function newcontact() {
            ajaxSetup();
            $.ajax({
                    url: "{{route('Newcutcontact')}}",
                    type: "get",


                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function(response) {

                    $('coID').val(response.newidcontact);
                    $('coTITLE').val('');
                    $('coNAME').val('');
                    $('coDEPARTMENT').val('');
                    $('coPHONE').val('');
                    $('coCELL').val('');
                    $('coFAX').val('');
                    $('coEMAIL').val('');
                    $('coNOTES').val('');
                    $('coIMONO').val('');

                    },
                    failed: function(output) {
                        var errors = output.responseJSON;
                        Swaal.fire({
                        icon: 'error',
                        title: 'Oops...Something went wrong!',
                        text: errors.message,
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                        // alert(errors.message);
                        //Swal.close();
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }



                });
        }

        $(document).ready(function() {

            function ajaxSetup() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            $('#BtnNew').click(function(e) {
                e.preventDefault();
                location.reload();
            });
            var table4 = $('#customercontacts').DataTable({
                scrollY: 400,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,

            });
            // $(document).ready(function () {
            $('#btnsearchcus').click(function(e) {
                e.preventDefault();
                $('#searchrmod').modal('show');
            });

            // });

            function discountsearc() {
                ajaxSetup();

                var customercode = $('#CustomerCode').val();
                $.ajax({
                    url: "/dislist",
                    type: "POST",
                    data: {
                        customercode,
                    },

                    beforeSend: function() {
                        // Show the overlay and spinner before sending the request
                        $('.overlay').show();
                    },
                    success: function($response) {

                        $('.percentage').html($response.output);
                        if ($response.datacontact) {
                            $('.customercontact').html($response.datacontact);
                            table4.columns.adjust();

                        }
                        document.getElementById("salesman").innerHTML = $response.SalesMandata;


                    },
                    failed: function(output) {
                        var errors = output.responseJSON;
                        Swaal.fire({
                        icon: 'error',
                        title: 'Oops...Something went wrong!',
                        text: errors.message,
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                        // alert(errors.message);
                        //Swal.close();
                    },
                    complete: function() {
                        // Hide the overlay and spinner after the request is complete
                        $('.overlay').hide();
                    }



                });

            }

            function js() {
                // alert();


            }

            $('#CustomerCodeshow').blur(function(e) {

                e.preventDefault();
                var code = $('#CustomerCodeshow').val();
                ajaxSetup();
                $.ajax({
                    url: '/customercodecheck',
                    data: {
                        code,
                    },
                    method: 'post',
                    success: function(response) {
                        console.log(response);
                        if (response.customers) {
                            var Customer = response.customers;
                            $("#customername").val(Customer.CustomerName);
                            $("#CustomerCodeshow").val(Customer.CustomerCode);
                            $("#coCustomerCode").val(Customer.CustomerCode);
                            $("#CustomerCode").val(Customer.CustomerCode);
                            $("#ccode").val(Customer.CusCode);
                            $("#act_code").val(Customer.ActCode);
                            $("#c_type").val(Customer.CType);
                            console.log(Customer.Vtype);
                            $("#v_type").val(Customer.Vtype);
                            $('#CustCategory').val(Customer.CustCategory);
                            $("#aob").val(Customer.AreaofBusiness);
                            $("#aobcode").val(Customer.AreaCode);
                            $("#holder").text(Customer.Priority);
                            $("#holder").val(Customer.Priority);
                            $("#Statuss").text(Customer.Status);
                            $("#Statuss").val(Customer.Status);
                            $("#Address").val(Customer.Address);
                            $("#ContactPerson").val(Customer.ContactPerson);
                            $("#PhoneNo").val(Customer.PhoneNo);
                            $("#WEB").val(Customer.WebAddress);
                            $("#faxno").val(Customer.FaxNo);
                            $("#Email").val(Customer.EmailAddress);
                            $("#Mobile").val(Customer.MobileNo);
                            $('#StateName').val(Customer.StateName);
                            $('#Citys').val(Customer.City);
                            $('#Countrys').val(Customer.Country);
                            $("#BContactPerson").val(Customer.BContactPerson);
                            $("#bBillingAddress").val(Customer.BillingAddress);
                            $("#btelephone").val(Customer.BTelephoneNo);
                            $("#BFaxNo").val(Customer.BFaxNo);
                            $("#BEmailAddress").val(Customer.BEmailAddress);
                            $("#BWeb").val(Customer.BWeb);
                            $("#creditlimit").val(Customer.CreditLimit);
                            $("#Terms").val(Customer.Terms);
                            $("#Terms").text(Customer.Terms);
                            $("#eqcic").val(Customer.EventQuateCharges);
                            $("#bankdetails").val(Customer.BankDetail);
                            $("#ChkInactive").val(Customer.ChkInactive);
                            $("#chekbox").val(Customer.ChkInactive);
                            $("#salesman").val(Customer.SManCode);
                            $("#customercodediscount1").val(Customer.CustomerCode);
                            $("#customercodediscount2").val(Customer.CustomerCode);
                            $("#customercodediscount3").val(Customer.CustomerCode);
                            $("#customercodediscount4").val(Customer.CustomerCode);
                            $("#customercodediscount7").val(Customer.CustomerCode);
                            $("#customercodediscount8").val(Customer.CustomerCode);
                            $("#customercodediscount10").val(Customer.CustomerCode);
                            $("#customercodediscount11").val(Customer.CustomerCode);
                            $("#customercodediscount12").val(Customer.CustomerCode);
                            $("#customercodediscount13").val(Customer.CustomerCode);
                            discountsearc();

                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                    }
                });
            });



            $("#customername").blur(function() {
                var textBoxValue = $("#customername").val();
                var firstLetters = getFirstLetters(textBoxValue);
                // console.log("Textbox Value:", textBoxValue);
                console.log("First Letters:", firstLetters);
                $('#ccode').val(firstLetters);
            });

            function getFirstLetters(text) {
                // Split the input text by spaces to get individual words
                var words = text.split(" ");
                var firstLetters = "";

                // Loop through each word and get its first letter (if it exists)
                for (var i = 0; i < words.length; i++) {
                    var word = words[i].trim();
                    if (word.length > 0) {
                        var firstLetter = word.charAt(0).toUpperCase();
                        firstLetters += firstLetter;
                    }
                }

                return firstLetters;
            }

            let z = {{ $lastid }};
            $('#CustomerCode').val(z);
            $('#CustomerCodeshow').val(z);

            let a = "1.3."
            let e = "1.4."
            let s = a + z;
            let r = e + z;
            $('#act_code').val(s);
            $('#SManAct_Code').val(r);
            $("#customercodediscount1").val(z);
            $("#customercodediscount2").val(z);
            $("#customercodediscount3").val(z);
            $("#customercodediscount4").val(z);
            $("#customercodediscount7").val(z);
            $("#customercodediscount8").val(z);
            $("#customercodediscount10").val(z);
            $("#customercodediscount11").val(z);
            $("#customercodediscount12").val(z);
            $("#customercodediscount13").val(z);

            $('.SlsCommPer').on('input', function() {
                if ($('.SlsCommPer').filter(function() {
                        return this.value != '';
                    }).length > 0) {
                    $('#select-container').show();
                    $('#SManselect').prop('required', true);
                } else {
                    $('#select-container').hide();
                    $('#SManselect').prop('required', false);
                }
            });

            $('#StateName').on('focus', function() {
                document.getElementById("myElement").style.right = "0";
                setTimeout(function() {
                    // Set the right property of the element back to -300px to hide it
                    document.getElementById("myElement").style.right = "-300px";
                }, 10000);
            });
            $('#aob').on('focus', function() {
                document.getElementById("myElement").style.right = "0";
                setTimeout(function() {
                    // Set the right property of the element back to -300px to hide it
                    document.getElementById("myElement").style.right = "-300px";
                }, 10000);
            });
            $('#Citys').on('focus', function() {
                document.getElementById("myElement").style.right = "0";
                setTimeout(function() {
                    // Set the right property of the element back to -300px to hide it
                    document.getElementById("myElement").style.right = "-300px";
                }, 10000);
            });
            $('#Countrys').on('focus', function() {
                document.getElementById("myElement").style.right = "0";
                setTimeout(function() {
                    // Set the right property of the element back to -300px to hide it
                    document.getElementById("myElement").style.right = "-300px";
                }, 10000);
            });
            $('#StateName').on('keydown', function(event) {
                if (event.which === 113) {
                    event.preventDefault();

                    var selectInput = $('#StateName');

                    var typedValue = prompt('Please enter a custom value:');
                    if (typedValue !== null) {

                        typedValue = typedValue.toUpperCase();
                        var customOption = new Option(typedValue, typedValue, true, true);

                        selectInput.append(customOption).val(typedValue);
                    }
                }
            });
            $('#aob').on('keydown', function(event) {
                if (event.which === 113) {
                    event.preventDefault();

                    var selectInput = $('#aob');

                    var typedValue = prompt('Please enter a custom value:');
                    if (typedValue !== null) {
                        typedValue = typedValue.toUpperCase();
                        var customOption = new Option(typedValue, typedValue, true, true);
                        selectInput.append(customOption).val(typedValue);
                    }
                }
            });
            $('#Citys').on('keydown', function(event) {
                if (event.which === 113) {
                    event.preventDefault();

                    var selectInput = $('#City');

                    var typedValue = prompt('Please enter a custom value:');
                    if (typedValue !== null) {
                        typedValue = typedValue.toUpperCase();
                        var customOption = new Option(typedValue, typedValue, true, true);
                        selectInput.append(customOption).val(typedValue);
                    }
                }
            });
            $('#Countrys').on('keydown', function(event) {
                if (event.which === 113) {
                    event.preventDefault();

                    var selectInput = $('#Country');

                    var typedValue = prompt('Please enter a custom value:');
                    if (typedValue !== null) {
                        typedValue = typedValue.toUpperCase();
                        var customOption = new Option(typedValue, typedValue, true, true);
                        selectInput.append(customOption).val(typedValue);
                    }
                }
            });

            var table2 = $('#customerlisttable').DataTable({
                scrollY: 350,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                responsive: true,
                searching: false,


            });
            $('#impcuslist').click(function(e) {
                e.preventDefault();
                $('#Customerlistmodal').modal('show')
            });

            $('#importForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('import-Customerlist') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        displayImportedData(response);
                    }
                });
            });

            function displayImportedData(data) {
                let table = document.getElementById('customerlisttablebody');
                table.innerHTML = ""; // Clear the table
                data.forEach(function(item) {
                    let row = table.insertRow();

                    function createCell(content) {
                        let cell = row.insertCell();
                        cell.innerHTML = content;
                        return cell;
                    }
                    createCell(item.CustomerCode);
                    createCell(item.CustomerName);
                    createCell(item.Ctype);
                    createCell(item.Vtype);
                    createCell(item.Category);


                });

                $('#customerlisttables').show();
                $('#Savecustomerlist').show();
                table2.columns.adjust();

                function tablecompser() {
                    let table = document.getElementById('customerlisttablebody');
                    let rows = table.rows;
                    let dataarray = [];
                    for (let i = 0; i < rows.length; i++) {
                        let cells = rows[i].cells;
                        dataarray.push({

                            CustomerCode: cells[0] ? cells[0].innerHTML : '',
                            CustomerName: cells[1] ? cells[1].innerHTML : '',
                            Ctype: cells[2] ? cells[2].innerHTML : '',
                            Vtype: cells[3] ? cells[3].innerHTML : '',
                            Category: cells[4] ? cells[4].innerHTML : '',

                        });
                    }
                    return dataarray;
                }




                $('#Savecustomerlist').click(function(e) {
                    e.preventDefault();
                    var dataarray = tablecompser();
                    console.log(dataarray);
                    ajaxSetup();
                    $.ajax({
                        url: '{{ route('Customerlist_save') }}',
                        type: 'POST',
                        data: {
                            dataarray
                        },
                        beforeSend: function() {
                            // Show the overlay and spinner before sending the request
                            $('.overlay').show();
                            $("#Savecustomerlist").hide();
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.message == 'Saved') {
                                // alert(response.message);

                            }
                        },
                        complete: function() {
                            // Hide the overlay and spinner after the request is complete
                            $('.overlay').hide();
                            $('#Savecustomerlist').show();

                        }
                    });
                });


            }











            $('#deletecus').click(function(e) {
                alert('dekete');
            });

            // $('#customername').keyup(function() {
            //     // function searchCustomer() {
            //     $keywords = $(this).val();
            //     var input = $('#customername');
            //     var term = input.val();

            //     if (!term) {
            //         return;
            //     }
            //     if ($keywords.length >= 3) {
            //         $.ajaxSetup({
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         });
            //         $.ajax({
            //             url: '/search-customer',
            //             data: {
            //                 term: term
            //             },
            //             method: 'GET',
            //             success: function(customers) {
            //                 showSuggestions(input, customers);
            //             },
            //             error: function(xhr, status, error) {
            //                 // Handle error
            //             }
            //         });
            //     }
            // })


            // function showSuggestions(input, customers) {
            //     var suggestions = $('#suggestions');
            //     suggestions.empty();

            //     if (customers.length === 0) {
            //         suggestions.hide();
            //         return;
            //     }

            //     var ul = $('<ul>').addClass('suggestions-list list-group').css({
            //         'position': 'absolute',
            //         'z-index': '100',
            //         'width': input.outerWidth() + 'px'
            //     });

            //     for (var i = 0; i < customers.length; i++) {
            //         var customer = customers[i];
            //         var li = $('<li>')
            //             .addClass('list-group-item')
            //             .text(customer.CustomerName)
            //             .data('cusname', customer.CustomerName)
            //             .data('customerId', customer.CustomerCode)
            //             .data('act', customer.ActCode)
            //             .data('cuscode', customer.CusCode)
            //             .data('Address', customer.Address)
            //             .data('CallSign', customer.CallSign)
            //             .data('PhoneNo', customer.PhoneNo)
            //             .data('FaxNo', customer.FaxNo)
            //             .data('EmailAddress', customer.EmailAddress)
            //             .data('WebAddress', customer.WebAddress)
            //             .data('BContactPerson', customer.BContactPerson)
            //             .data('BillingAddress', customer.BillingAddress)
            //             .data('BTelephoneNo', customer.BTelephoneNo)
            //             .data('BFaxNo', customer.BFaxNo)
            //             .data('BEmailAddress', customer.BEmailAddress)
            //             .data('BWeb', customer.BWeb)
            //             .data('Status', customer.Status)
            //             .data('ChkInactive', customer.ChkInactive)
            //             .data('CreditLimit', customer.CreditLimit)
            //             .data('Country', customer.Country)
            //             .data('BranchCode', customer.BranchCode)
            //             .data('Terms', customer.Terms)
            //             .data('EventQuateCharges', customer.EventQuateCharges)
            //             .data('City', customer.City)
            //             .data('CustomerDiscPer', customer.CustomerDiscPer)
            //             .data('InvoiceDiscPer', customer.InvoiceDiscPer)
            //             .data('SalesManCommPer', customer.SalesManCommPer)
            //             .data('CreditNotePer', customer.CreditNotePer)
            //             .data('AgentCommPer', customer.AgentCommPer)
            //             .data('BankDetail', customer.BankDetail)
            //             .data('Priority', customer.Priority)
            //             .data('EnterCustomer', customer.EnterCustomer)
            //             .data('ContactPerson', customer.ContactPerson)
            //             .data('StateName', customer.StateName)
            //             .data('CashDiscPer', customer.CashDiscPer)
            //             .data('MobileNo', customer.MobileNo)
            //             .data('smancode', customer.smancode)
            //             .data('SManActCode', customer.SManActCode)
            //             .data('WorkUser', customer.WorkUser)
            //             .data('AgentCode', customer.AgentCode)
            //             .data('AgentActCode', customer.AgentActCode)
            //             .data('AssignUser', customer.AssignUser)
            //             .data('LastEditDateTime', customer.LastEditDateTime)
            //             .data('CType', customer.CType)
            //             .data('Vtype', customer.Vtype)
            //             .data('CustCategory', customer.CustCategory)
            //             .data('AreaofBusiness', customer.AreaofBusiness)
            //             .data('AreaCode', customer.AreaCode)
            //         ul.append(li);
            //     }

            //     // adjust the position of the ul element
            //     var inputOffset = input.offset();
            //     ul.css({
            //         'top': 90 + 'px',
            //         'left': 132 + 'px'
            //     });

            //     suggestions.append(ul).show();
            // }



            // add an event listener to the document object
            $(document).on('blur', '#customername', function(event) {
                var suggestions = $('#suggestions');
                suggestions.hide();

            })
            $(document).on('click', function(event) {
                var suggestions = $('#suggestions');
                // check if the clicked element is inside the suggestions box
                if (!$(event.target).closest(suggestions).length) {
                    suggestions.hide();

                }
                suggestions.hide();

            });




            $(document).on('click', '.suggestions-list li', function() {
                //   var customerId = $(this).data('customerId');
                //   alert('yes'+customerId);
                //   $('#CustomerCodeshow').val(customerId);

                $targetcustcode = $(this).data('customerId');
                $targetact = $(this).data('act');
                $targetcuscode = $(this).data('cuscode');
                $targetcusname = $(this).data('cusname');
                $targetAddress = $(this).data('Address');
                $targetCallSign = $(this).data('CallSign');
                $targetPhoneNo = $(this).data('PhoneNo');
                $targetFaxNo = $(this).data('FaxNo');
                $targetEmailAddress = $(this).data('EmailAddress');
                $targetWebAddress = $(this).data('WebAddress');
                $targetBContactPerson = $(this).data('BContactPerson');
                $BillingAddress = $(this).data('BillingAddress');
                $BTelephoneNo = $(this).data('BTelephoneNo');
                $BFaxNo = $(this).data('BFaxNo');
                $BEmailAddress = $(this).data('BEmailAddress');
                $BWeb = $(this).data('BWeb');
                $Status = $(this).data('Status');
                $ChkInactive = $(this).data('ChkInactive');
                $CreditLimit = $(this).data('CreditLimit');
                $Country = $(this).data('Country');
                $BranchCode = $(this).data('BranchCode');
                $Terms = $(this).data('Terms');
                $EventQuateCharges = $(this).data('EventQuateCharges');
                $City = $(this).data('City');
                $CustomerDiscPer = $(this).data('CustomerDiscPer');
                $InvoiceDiscPer = $(this).data('InvoiceDiscPer');
                $SalesManCommPer = $(this).data('SalesManCommPer');
                $RebaitPer = $(this).data('RebaitPer');
                $CreditNotePer = $(this).data('CreditNotePer');
                $AgentCommPer = $(this).data('AgentCommPer');
                $BankDetail = $(this).data('BankDetail');
                $Priority = $(this).data('Priority');
                $EnterCustomer = $(this).data('EnterCustomer');
                $CType = $(this).data('CType');
                $Vtype = $(this).data('Vtype');
                $CustCategory = $(this).data('CustCategory');
                $AreaofBusiness = $(this).data('AreaofBusiness');
                $AreaCode = $(this).data('AreaCode');
                $ContactPerson = $(this).data('ContactPerson');
                $StateName = $(this).data('StateName');
                $CashDiscPer = $(this).data('CashDiscPer');
                $MobileNo = $(this).data('MobileNo');
                $SManCode = $(this).data('smancode');
                $SManActCode = $(this).data('SManActCode');
                $WorkUser = $(this).data('WorkUser');
                $AgentCode = $(this).data('AgentCode');
                $AgentActCode = $(this).data('AgentActCode');
                $AssignUser = $(this).data('AssignUser');
                $LastEditDateTime = $(this).data('LastEditDateTime');
                // $smanname = $(this).attr('data-smanasale');

                document.getElementById("customername").value = $targetcusname;
                document.getElementById("CustomerCodeshow").value = $targetcustcode;
                document.getElementById("coCustomerCode").value = $targetcustcode;
                document.getElementById("CustomerCode").value = $targetcustcode;

                // document.getElementById("search").value = $targetcustcode;
                document.getElementById("ccode").value = $targetcuscode;
                document.getElementById("act_code").value = $targetact;
                document.getElementById("ccode").value = $targetcuscode;
                document.getElementById("c_type").value = $CType;
                document.getElementById("v_type").value = $Vtype;
                // document.getElementById("CustCategoryse").innerHTML = $CustCategory;
                // document.getElementById("aobs").innerHTML = $AreaofBusiness;
                document.getElementById("aob").value = $AreaofBusiness;
                document.getElementById("aobcode").value = $AreaCode;
                document.getElementById("holder").innerHTML = $Priority;
                document.getElementById("holder").value = $Priority;
                document.getElementById("Statuss").innerHTML = $Status;
                document.getElementById("Statuss").value = $Status;
                document.getElementById("Address").value = $targetAddress;
                document.getElementById("ContactPerson").value = $ContactPerson;
                document.getElementById("PhoneNo").value = $targetPhoneNo;
                document.getElementById("WEB").value = $targetWebAddress;
                document.getElementById("faxno").value = $targetFaxNo;
                document.getElementById("Email").value = $targetEmailAddress;
                document.getElementById("Mobile").value = $MobileNo;
                // document.getElementById("StateNames").innerHTML = $StateName;
                // document.getElementById("StateNames").value = $StateName;
                $('#StateName').val($StateName);
                // document.getElementById("Citys").innerHTML = $City;
                // document.getElementById("Citys").value = $City;
                $('#Citys').val($City);
                $('#Countrys').val($Country);
                $('#CustCategory').val($CustCategory);

                // document.getElementById("Countrys").innerHTML = $Country;
                document.getElementById("BContactPerson").value = $targetBContactPerson;
                document.getElementById("bBillingAddress").value = $BillingAddress;
                document.getElementById("btelephone").value = $BTelephoneNo;
                document.getElementById("BFaxNo").value = $BFaxNo;
                document.getElementById("BEmailAddress").value = $BEmailAddress;
                document.getElementById("BWeb").value = $BWeb;
                document.getElementById("creditlimit").value = $CreditLimit;
                document.getElementById("Terms").value = $Terms;
                document.getElementById("Terms").innerHTML = $Terms;
                document.getElementById("eqcic").value = $EventQuateCharges;
                document.getElementById("bankdetails").value = $BankDetail;
                document.getElementById("ChkInactive").value = $ChkInactive;
                document.getElementById("chekbox").value = $ChkInactive;
                // document.getElementById("salesman").value = $smanname;
                // document.getElementById("salesman").innerHTML = $smanname;
                document.getElementById("salesman").value = $SManCode;
                // document.getElementById("salesman").innerHTML = $SManCode;
                //discount
                document.getElementById("customercodediscount1").value = $targetcustcode;
                document.getElementById("customercodediscount2").value = $targetcustcode;
                document.getElementById("customercodediscount3").value = $targetcustcode;
                document.getElementById("customercodediscount4").value = $targetcustcode;
                document.getElementById("customercodediscount7").value = $targetcustcode;
                document.getElementById("customercodediscount8").value = $targetcustcode;
                document.getElementById("customercodediscount10").value = $targetcustcode;
                document.getElementById("customercodediscount11").value = $targetcustcode;
                document.getElementById("customercodediscount12").value = $targetcustcode;
                document.getElementById("customercodediscount13").value = $targetcustcode;



                $discounts = document.getElementById("CustomerCode").value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var customercode = $targetcustcode;
                console.log(customercode);
                discountsearc();
                // $.ajax({
                //     type: "POST",
                //     url: "/dislist/" + customercode,
                //     beforeSend: function() {
                //         // Show the overlay and spinner before sending the request
                //         $('.overlay').show();
                //     },
                //     success: function($response) {

                //         $('.percentage').html($response.output);
                //         $('.customercontact').html($response.datacontact);
                //         document.getElementById("salesman").innerHTML = $response.SalesMandata;


                //     },
                //     failed: function(output) {
                //         var errors = output.responseJSON;
                //         alert(errors.message);
                //         //Swal.close();
                //     },
                //     complete: function() {
                //         // Hide the overlay and spinner after the request is complete
                //         $('.overlay').hide();
                //     }



                // });






                // do something with the customerId
                var suggestions = $('#suggestions');
                // check if the clicked element is inside the suggestions box
                if (!$(event.target).closest(suggestions).length) {
                    suggestions.hide();
                }
            });






            $(document).on("dblclick", "#rowcell", function() {
                $con_ID = $(this).attr('data-ID');
                $con_CustomerCode = $(this).attr('data-CustomerCode');
                $con_Title = $(this).attr('data-Title');
                $con_CustName = $(this).attr('data-CustName');
                $con_DepartmentName = $(this).attr('data-DepartmentName');
                $con_Phone = $(this).attr('data-Phone');
                $con_Cell = $(this).attr('data-Cell');
                $con_Fax = $(this).attr('data-Fax');
                $con_Email = $(this).attr('data-Email');
                $con_Notes = $(this).attr('data-Notes');
                $con_IMONo = $(this).attr('data-IMONo');

                document.getElementById("coID").value = $con_ID;
                document.getElementById("coCustomerCode").value = $con_CustomerCode;
                document.getElementById("coTITLE").value = $con_Title;
                document.getElementById("coNAME").value = $con_CustName;
                document.getElementById("coDEPARTMENT").value = $con_DepartmentName;
                document.getElementById("coPHONE").value = $con_Phone;
                document.getElementById("coCELL").value = $con_Cell;
                document.getElementById("coFAX").value = $con_Fax;
                document.getElementById("coEMAIL").value = $con_Email;
                document.getElementById("coNOTES").value = $con_Notes;
                document.getElementById("coIMONO").value = $con_IMONo;

            });



            $(document).ready(function() {
                $('input[type="checkbox"]').click(function() {
                    if ($(this).prop("checked") == true) {
                        // alert("Checkbox is checked.");
                        var inputf = document.getElementById("chekbox");


                        inputf.value = 1;
                    } else if ($(this).prop("checked") == false) {
                        // alert("Checkbox is unchecked.");
                        var inputf = document.getElementById("chekbox");


                        inputf.value = 0;
                    }
                });
            });
        });

        function discountsearc() {
            ajaxSetup();

            var customercode = $('#CustomerCode').val();
            $.ajax({
                url: "/dislist",
                type: "POST",
                data: {
                    customercode,
                },

                beforeSend: function() {
                    // Show the overlay and spinner before sending the request
                    $('.overlay').show();
                },
                success: function($response) {
                    var table4 = $('#customercontacts').DataTable();
                    $('.percentage').html($response.output);
                    if ($response.datacontact) {
                        $('.customercontact').html($response.datacontact);
                        table4.columns.adjust();

                    }
                    document.getElementById("salesman").innerHTML = $response.SalesMandata;


                },
                failed: function(output) {
                    var errors = output.responseJSON;
                    Swaal.fire({
                        icon: 'error',
                        title: 'Oops...Something went wrong!',
                        text: errors.message,
                        footer: '<a href="https://wa.link/d2jy7g">Why do I have this issue?</a>'
                })
                    //Swal.close();
                },
                complete: function() {
                    // Hide the overlay and spinner after the request is complete
                    $('.overlay').hide();
                }



            });

        }
    </script>

@stop


@section('content')
