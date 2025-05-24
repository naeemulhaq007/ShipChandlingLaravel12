@extends('layouts.app')



@section('title', 'Dashboard')

@section('content_header')
@stop


@section('content')
    </div>
    <form action="agent/store" method="POST">
        @csrf

        <div class="tab-content">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create Agent Commission</h5>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body col-lg-12">
                        <div class="row ">
                            <div class="inputbox py-2 col-sm-4 ">
                                <input type="text" class="" id="agentid" name="AgentCode" required="required"
                                    disabled>
                                <span class="Txtspan">
                                    Agent ID</span>
                            </div>
                            <input type="hidden" class="" id="agent_id" name="AgentCode" required="required">

                        </div>

                        <div class="row ">
                            <div class="inputbox col-sm-4 py-2 ">
                                <input type="text" class="" id="agentname" name="AgentName" required="required">
                                <span class="Txtspan">
                                    Name Of Agent
                            </div>
                        </div>



                        <div class="row ">
                            <div class="inputbox col-sm-4 py-2 ">
                                <input type="text" class="" id="CusCode" name="CusCode" required="required">
                                <span class="Txtspan">
                                    Code </span>
                                </div>
                                <div class="inputbox py-2 col-sm-1 ">
                                    <input type="text" readonly class="" id="act_code" required="required">
                                    <span class="Txtspan">
                                        Act Code
                                    </span>
                                </div>

                                <input type="hidden" id="actcode" name="ActCode" hidden>
                        </div>
                    </div>

                    <hr>
                    <script>

                    </script>
                    <div class="card-header">
                        <h2 class="text-center text-info ">General Information</h2>

                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row pt-4">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="text" class="" id="address" name="Address"
                                            required="required">
                                        <span class="Txtspan">
                                            Address
                                        </span>
                                    </div>

                                </div>
                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="tel" class="" id="telephone" name="PhoneNo"
                                            required="required">
                                        <span class="Txtspan">
                                            Telephone
                                        </span>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="text" class="" id="fax" name="FaxNo"
                                            required="required">
                                        <span class="Txtspan">
                                            Fax #
                                        </span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="email" class="" id="email" name="EmailAddress"
                                            required="required">
                                        <span class="Txtspan">
                                            Email
                                        </span>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="text" class="" id="web" name="WebAddress"
                                            required="required">
                                        <span class="Txtspan">
                                            Web
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="country" name="Country"
                                            required="required">
                                        <span class="Txtspan">
                                            Country </span>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="city" name="City"
                                            required="required">
                                        <span class="Txtspan">
                                            City
                                        </span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="state" name="State"
                                            required="required">
                                        <span class="Txtspan">
                                            State </span>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="zip" name="Zip"
                                            required="required">
                                        <span class="Txtspan">
                                            Zip </span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header">
                        <h2 class="text-center text-info ">Billing Information</h2>




                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="text" class="" id="contactperson" name="BContactPerson"
                                            required="required">
                                        <span class="Txtspan">
                                            Contact Person</span>
                                    </div>
                                </div>


                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="text" class="" id="billingaddress" name="BillingAddress"
                                            required="required">
                                        <span class="Txtspan">
                                            Zip </span>
                                    </div>
                                </div>


                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="number" class="" id="bilingtelephone" name="BTelephoneNo"
                                            required="required">
                                        <span class="Txtspan">
                                            Telephone </span>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="text" class="" id="bilingfax" name="BFaxNo"
                                            required="required">
                                        <span class="Txtspan">
                                            Fax # </span>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8 ">
                                        <input type="email" class="" id="bilingemail" name="BEmailAddress"
                                            required="required">
                                        <span class="Txtspan">
                                            Email </span>
                                    </div>
                                </div>
                                <div class="row  ">
                                    <a name="" id="BtnNew" class="btn btn-info mx-2 my-2"  role="button"><i class="fa fa-file" aria-hidden="true"></i> New</a>
                                    <button type="submit" class="btn btn-success mx-2 my-2"><i class="fa fa-cloud" aria-hidden="true"></i> Save</button>
                                        <a name="" id="BtnDelete" class="btn btn-danger mx-2 my-2"  role="button"><i class="fa fa-window-close" aria-hidden="true"></i> Delete</a>
                                     <a href="{{ url('agent-setup') }}" class="btn btn-danger mx-2 my-2" role="button">
    <i class="fas fa-door-open"></i> Exit
</a>

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="bilingweb" name="BWeb"
                                            required="required">
                                        <span class="Txtspan">
                                            Web </span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="bilingstatus" name="Status"
                                            required="required">
                                        <span class="Txtspan">
                                            Status </span>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8">
                                        <input type="number" step="0.01" class="" id="creaditlimit" name="CreditLimit"
                                            required="required">
                                        <span class="Txtspan">
                                            Credit Limit </span>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8">
                                        <input type="text" class="" id="terms" name="Terms"
                                            required="required">
                                        <span class="Txtspan">
                                            Terms </span>
                                    </div>
                                </div>

                                <div class="row pt-3">
                                    <div class="inputbox col-sm-8">
                                        <textarea type="text" name="EventQuateCharges" id="eqcic" rows="3"></textarea>


                                        <span class="Txtspan">
                                            Event Quote Chargers Internal Comment </span>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>




                </div>
            </div>



    </form>
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">Update Agent</h5>


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>


                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
        <table class="table table table-light" id="agent-table">
            <thead class="thead-light">
                <tr>

                    <th>Agent Code</th>
                    <th>Act Code</th>
                    <th>Agent Name</th>
                    <th>Address</th>
                    <th>Credit Limit</th>
                    <th>Cus Code</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($AgentCommSetup as $AgentCommSetupitem)
                <tr class="js-row">
                    <td>{{ $AgentCommSetupitem->AgentCode }}</td>
                    <td>{{ $AgentCommSetupitem->ActCode }}</td>
                    <td>{{ $AgentCommSetupitem->AgentName }}</td>
                    <td>{{ $AgentCommSetupitem->Address }}</td>
                    <td>{{ $AgentCommSetupitem->CreditLimit }}</td>
                    <td>{{ $AgentCommSetupitem->CusCode }}</td>
                    </tr>
                    @endforeach
            </tbody>

        </table>
    </div>
    </div>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


@stop

@section('js')
<script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>











@if(Session::has('Message') && Session::get('Message') == 'Saved')
<script>
    $(document).ready(function () {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Agent saved successfully!',
            timer: 2000,
            showConfirmButton: false
        });
    });
</script>
@endif



    <script>

function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        $(document).ready(function () {
            let x = {{ $lastid }};
            let z = x;
            let a = "3.16.";
            let b = a + x;

            $('#agentid').val(z);
            $('#agent_id').val(z);
            $('#act_code').val(b);
            $('#actcode').val(b);


    //         $('.js-row').dblclick(function (e) {
    //     e.preventDefault();
    //     var row = $(this);
    // var AgentCode = row.find('td:eq(0)').text();
    // var ActCode = row.find('td:eq(1)').text();
    // var AgentName = row.find('td:eq(2)').text();
    // var Address = row.find('td:eq(3)').text();
    // var CreditLimit = row.find('td:eq(4)').text();
    // var CusCode = row.find('td:eq(5)').text();

    // $('#actcode').val(ActCode);
    // $('#actcode').val(ActCode);
    // $('#act_code').val(ActCode);
    // $('#agentname').val(AgentName);
    // $('#agentid').val(AgentCode);
    // $('#address').val(Address);
    // $('#WebsiteAddress').val(WebsiteAddress);
    // $('#BranchCode').val(BranchCode);
    // });
// $('.js-row').dblclick(function (e) {
//     e.preventDefault();
//     var row = $(this);

//     var agentid = row.find('td:eq(0)').text().trim();
//     var exchangeRate = row.find('td:eq(1)').text().trim();
//     var agentname = row.find('td:eq(2)').text().trim();
//     var Address = row.find('td:eq(3)').text().trim();
//     var creaditlimit = row.find('td:eq(4)').text().trim();
//     var CustomerCode = row.find('td:eq(5)').text().trim();

//     // Fill only available fields
//     $('#agentid').val(agentid);
//     $('#agentname').val(agentname);
//     $('#CustomerCode').val(CustomerCode);
//     $('#exchangeRate').val(exchangeRate);
//     $('#Address').val(Address);
//     $('#creaditlimit').val(creaditlimit);

  
//     $('#telephone').val('');
//     $('#fax').val('');
//     $('#email').val('');
//     $('#web').val('');
//     $('#country').val('');
//     $('#city').val('');
//     $('#state').val('');
//     $('#zip').val('');
//     $('#contactperson').val('');
//     $('#billingaddress').val('');
//     $('#bilingtelephone').val('');
//     $('#bilingfax').val('');
//     $('#bilingemail').val('');
//     $('#bilingweb').val('');
//     $('#bilingstatus').val('');
//     $('#terms').val('');
//     $('#eqcic').val('');
// });

$('.js-row').dblclick(function (e) {
    e.preventDefault();
    var agentId = $(this).find('td:eq(0)').text().trim(); 
    
    if (agentId) {
        ajaxSetup();
        $.ajax({
            url: '/agent-setup/fetch',  // new route
            type: 'POST',
            data: { AgentCode: agentId },
            success: function (response) {
                if (response.agent) {
                    var agent = response.agent;

                    $('#agentid').val(agent.AgentCode);
                    $('#agent_id').val(agent.AgentCode);
                    $('#act_code').val(agent.ActCode);
                    $('#actcode').val(agent.ActCode);
                    $('#agentname').val(agent.AgentName);
                    $('#CusCode').val(agent.CusCode);
                       $('#Address').val(agent.Address); 
                    $('#telephone').val(agent.PhoneNo);
                    $('#fax').val(agent.FaxNo);
                    $('#email').val(agent.EmailAddress);
                    $('#web').val(agent.WebAddress);
                    $('#country').val(agent.Country);
                    $('#city').val(agent.City);
                    $('#state').val(agent.State);
                    $('#zip').val(agent.Zip);
                    $('#contactperson').val(agent.BContactPerson);
                    $('#billingaddress').val(agent.BillingAddress);
                    $('#bilingtelephone').val(agent.BTelephoneNo);
                    $('#bilingfax').val(agent.BFaxNo);
                    $('#bilingemail').val(agent.BEmailAddress);
                    $('#bilingweb').val(agent.BWeb);
                    $('#bilingstatus').val(agent.Status);
                    $('#creaditlimit').val(agent.CreditLimit);
                    $('#terms').val(agent.Terms);
                    $('#eqcic').val(agent.EventQuateCharges);
                } else {
                    Swal.fire("Error", "Agent not found!", "error");
                }
            },
            error: function () {
                Swal.fire("Error", "Server error!", "error");
            }
        });
    }
});





var table = $('#agent-table').DataTable({
    scrollY: 400,
    deferRender: true,
    scroller: true,
    ordering: true,
    order: [[0, 'desc']], 
    responsive: true,
});

                
                $('#BtnNew').click(function (e) {
                    e.preventDefault();
                    location.reload();
                });
           
//                 $('#BtnDelete').click(function (e) {
//     e.preventDefault();

//     var AgentCode = $('#agentid').val();

//     if (!AgentCode) {
//         Swal.fire("Error", "Please select an agent to delete.", "warning");
//         return;
//     }

//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You want to delete this agent?",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#3085d6',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             ajaxSetup();

//             $.ajax({
//                 url: '{{ route('Deleteagent') }}',
//                 type: 'POST',
//                 data: {
//                     AgentCode,
//                 },
//                 success: function (response) {
//                     console.log(response);

//                     if (response.Message === 'Deleted') {
//                         Swal.fire({
//                             icon: 'success',
//                             title: 'Deleted!',
//                             text: 'Agent deleted successfully.',
//                             timer: 2000,
//                             showConfirmButton: false
//                         });

//                         setTimeout(function () {
//                             location.reload();
//                         }, 2000);
//                     } else {
//                         Swal.fire("Error", "Could not delete agent.", "error");
//                     }
//                 },
//                 error: function () {
//                     Swal.fire("Error", "Something went wrong.", "error");
//                 }
//             });
//         }
//     });
// });
   
       $('#BtnDelete').click(function (e) {
                    e.preventDefault();
                    var AgentCode = $('#agentid').val();
                    var password = prompt("Please enter Admin Authentication:");
                    if (password === "332211") {
                    if (confirm("Are you sure you want to proceed?")) {
                        // proceed with action
                        ajaxSetup();
                    $.ajax({
                            url: '{{ route('Deleteagent') }}',
                            type: 'POST',
                            data: {
                                AgentCode,
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.Message = 'Deleted') {
                                    alert(response.Message);
                                    location.reload();


                                }
                            }
                        });
                    } else {
                        alert("Access denied.");
                    }
                    } else {
                        alert("Incorrect password.");
                    }

                });


        });
    </script>
@stop


@section('content')
