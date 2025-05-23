@extends('layouts.app')



@section('title', 'Origin-Setup')

@section('content_header')

@stop

@section('content')
 
    <?php echo View::make('partials.search'); ?>
    <?php echo View::make('partials.searchves'); ?>


    <div class="container-fluid ">

        <div class="col-lg-12 pt-3">


            <div class="card ">
                <div class="card-header ">
                    <div class="card-tools ">


                        <button type="button" name="headertoggle" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <b>
                        <h4 class="text-black">Origin Setup</h4>
                    </b>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">



                                <div class="inputbox col-sm-2 py-2">
                                    <!--<input type="text" class="" id="TxtCode" name="TxtCode"-->
                                    <!--    required="required">-->
                                    
                                    @php
    $nextCode = DB::table('originsetup')->where('BranchCode', $BranchCode)->max('OriginCode');
    $nextCode = $nextCode ? $nextCode + 1 : 1;
@endphp
                                    <input type="text" class="" id="TxtCode" name="TxtCode" value="{{ $nextCode }}" readonly required="required">
                                    <span class="Txtspan">
                                        Code </span>
                                </div>
                                <div class="inputbox col-sm-6 py-2">
                                    <input type="text" class="" id="TxtTerms" name="TxtPortName"
                                        required="required">
                                    <span class="Txtspan">
                                        Origin Name </span>
                                </div>





                        </div>

                        <div class="col-lg-6">
                            <div class="row py-2">
                                <div class="inputbox col-sm-12">
                                    <input type="text" class="" onkeyup="cusFunction()" id="TxtFind" name="TxtFind" required="required">
                                    <span class="ml-2">
                                        Search
                                    </span>
                                </div>
                            </div>
                            <div class="row py-2">



                                <div class="col-sm-12">

                                    <div class="rounded shadow">
                                              <input type="hidden" id="originId" name="originId">
                                        <table class="table small" id="Gd1">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Code</th>

                                                    <th>Origin&nbsp;Name</th>
                                                </tr>
                                            </thead>
                                      

                                            <tbody id="Gd1body">
    @foreach ($OriginSetup as $OriginSetupitem)
        <tr class="origin-row"
            data-code="{{ $OriginSetupitem->OriginCode }}"
            data-name="{{ $OriginSetupitem->OriginName }}">
            <td>{{ $OriginSetupitem->OriginCode }}</td>
            <td>{{ $OriginSetupitem->OriginName }}</td>
        </tr>
    @endforeach
</tbody>

                                            <!--<tbody id="Gd1body">-->
                                            <!--    @foreach ($OriginSetup as $OriginSetupitem)-->
                                            <!--        <tr>-->
                                            <!--            <td>{{ $OriginSetupitem->OriginCode }}</td>-->

                                            <!--            <td>{{ $OriginSetupitem->OriginName }}</td>-->
                                            <!--        </tr>-->
                                            <!--    @endforeach-->
                                            <!--</tbody>-->
                                        </table>
                                    </div>
                                </div>

                            </div>











                            </div>
                        </div>
                        <div class="row ml-1">
                            <button class="btn btn-primary my-2 mx-2" id="CmdAdd"  onclick="location.reload();" role="button"> <i
                                    class="fa fa-plus mr-1" aria-hidden="true"></i>New</button>

                            <button class="btn btn-success my-2 mx-2" id="CmdSave" role="button"> <i
                                    class="fa fa-cloud mr-1" aria-hidden="true"></i>Save</button>

                                    <button class="btn btn-warning mx-2 my-2" id="CmdDelete" role="button"> <i
                                        class="fa fa-multiply mr-1" aria-hidden="true"></i>Delete</button>
                              <a class="btn btn-danger mx-2 my-2" id="CmdExit" href="{{ url('origin-setup') }}" role="button">
    <i class="fa fa-door-open mr-1" aria-hidden="true"></i> Exit
</a>


                                        <!--<button class="btn btn-danger mx-2 my-2" id="CmdExit" href="{{url('origin-setup') }}" role="button"> <i-->
                                        <!--    class="fa fa-door-open mr-1" aria-hidden="true"></i>Exit</button>-->
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
            transform: translateX(5.8em);
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
            transform: translateX(11.6em);
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
            transform: translateX(6.8em);
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
        function ajaxSetup() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }



        $(document).ready(function() {



            var table1 = $('#Gd1').DataTable({

                scrollY: 600,
                deferRender: true,
                scroller: true,
                paging: false,
                info: false,
                ordering: false,
                searching: false,
                responsive: true,


            });



            // table1.column.adjust();


        });
        
        
      $(document).ready(function () {
    // Click row to fill form
    $('#Gd1body').on('click', '.origin-row', function () {
        const code = $(this).data('code');
        const name = $(this).data('name');

        $('#originId').val(code); // hidden ID for update
        $('#TxtCode').val(code);  // input field
        $('#TxtTerms').val(name); // input field
    });
});



        function cusFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("TxtFind");
  filter = input.value.toUpperCase();
  table = document.getElementById("Gd1body");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
};
        $(document).ready(function() {


            $('#CmdSave').click(function(e) {
    e.preventDefault();
    ajaxSetup();

    let formData = new FormData();
    formData.append('OriginCode', $('#TxtCode').val());
    formData.append('OriginName', $('#TxtTerms').val());

    $.ajax({
        url: '{{ route("origin.save") }}', // ðŸ‘ˆ define this route
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('.overlay').show();
        },

//         success: function(response) {
//     if (response.status === 'success') {
//         Swal.fire({
//             icon: 'success',
//             title: 'Saved!',
//             text: 'Origin saved successfully!',
//             confirmButtonColor: '#3085d6',
//             confirmButtonText: 'OK'
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 location.reload();
//             }
//         });
//     } else {
//         Swal.fire({
//             icon: 'error',
//             title: 'Failed!',
//             text: 'Failed to save origin.',
//             confirmButtonColor: '#d33',
//             confirmButtonText: 'Close'
//         });
//     }
// },
success: function(response) {
    if (response.status === 'success') {
        let msgTitle = response.message === 'Updated' ? 'Updated!' : 'Saved!';
        let msgText = response.message === 'Updated'
            ? 'Origin updated successfully!'
            : 'Origin saved successfully!';

        Swal.fire({
            icon: 'success',
            title: msgTitle,
            text: msgText,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Failed!',
            text: 'Failed to save origin.',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Close'
        });
    }
},

error: function(xhr, status, error) {
    console.error("Save error:", error);
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Something went wrong while saving.',
    });
},

        complete: function () {
            $('.overlay').hide();
        }
    });
});






        });
        
        
        
        
        
        
$(document).on('click', '#CmdDelete', function (e) {
    e.preventDefault();

    const code = $('#TxtCode').val();

    if (!code) {
        Swal.fire('Please select a row first.');
        return;
    }

    // 🔐 Step 1: Prompt for admin password
    const password = prompt("Enter Admin Authentication Password:");

    if (password !== "332211") {
        Swal.fire('Authentication Failed', 'Incorrect password. Access denied.', 'error');
        return;
    }

    // ✅ Step 2: Password is correct → show confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "This origin will be deleted permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteOrigin(code); // call the delete function
        }
    });
});



function deleteOrigin(code) {
    ajaxSetup();

    $.ajax({
        url: '{{ route("origin.delete") }}',
        type: 'POST',
        data: {
            OriginCode: code
        },
        success: function (response) {
            if (response.status === 'success') {
                Swal.fire('Deleted!', 'Origin has been deleted.', 'success');

           
                $('#Gd1body tr').filter(function () {
                    return $(this).find('td:first').text().trim() == response.code;
                }).remove();

      
                $('#TxtCode').val('');
                $('#TxtTerms').val('');
                $('#originId').val('');
            } else {
                Swal.fire('Error', response.message, 'error');
            }
        },
        error: function (xhr) {
            Swal.fire('Error', 'Something went wrong during deletion.', 'error');
        }
    });
}


// function deleteOrigin(code) {
//     ajaxSetup();

//     console.log('Deleting OriginCode:', code); // ✅ yahan check karo

//     $.ajax({
//         url: '{{ route("origin.delete") }}',
//         type: 'POST',
//         data: {
//             OriginCode: code
//         },
//         success: function (response) {
//             console.log('Success:', response);
//         },
//         error: function (xhr) {
//             console.error('Error:', xhr);
//         }
//     });
// }

    </script>




@stop


@section('content')
