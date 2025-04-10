<div class="modalq modal fade bd-example-modal-lg" id="searchrmodw"  tabindex="-1" role="dialog" aria-labelledby="searchrmodw" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div  class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Search</h5>

        <div class="card-tools ml-auto">
            <a name="" id="vesseltran"  class=" btn btn-default ml-auto"   role="button">Create Vessel</a>
            {{-- <button class="btn btn-primary" id="Newbtn">New</button> --}}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>


        </div>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
      <div class="modal-body gc-modal-body">
       <div class="container-fluid">

        <div class="row py-2">
            <div class="inputbox col-sm-3">
                    <span class="Txtspan" id="">Customer Code</span>
                <input type="text" readonly class="form-control  modal-serc"  id="searchbox" name="search" >
            </div>
            <div class="inputbox col-sm-7">
                    <span class="Txtspan" id="">Customer Name</span>
                <input type="text" readonly class="form-control  "  id="searchcustname" name="searchcustname" >
            </div>
            </div>
            <div class="row py-2">


            <div class="inputbox col-sm-5">
                <span class="Txtspan" >Vessel</span>
                <input type="text"  class="form-control " onkeyup="vesFunction()"  id="vesselserach" name="vesselserach" >
            </div>


                  <button type="button" name="serchbtn" id="serchbtn" class="form-control btn btn-info col-sm-2">Search</button>

             {{-- id="cussearch" --}}

        </div>

          <table class="table table-bordered table-hover" id="eventvesseltable">
              <thead>
              <tr>
              <th class="modal-th1">Vessel Name</th>
              <th class="modal-th2"> Vessel Type</th>
              <th class="modal-th2"> IMO</th>
              </tr>
              </thead>
              <tbody class="ves">
              </tbody>
              </table>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

      <!-- /.modal -->


{{-- </div> --}}

 {{-- <div id="vsl"class="tab-pane  in fade">

<div class="container">

    <h5 class="modal-title" id="exampleModalLongTitle">Vessel</h5>

   <div class="row mt-5">
      <div class="col-md-6">

                <form action="" method="POST">
                    <div class="row">
                      <div class="col-md-12">
                         <div class="input-group mb-3">

                          <a data-toggle="pill" href="#tabser"><input type="text" class="form-control" name="Customercode"  placeholder="Search employee" id="search"></a>

</div>
</div>
</div>
</form>
<table id="tabser" class="table table-striped table-inverse table-responsive d-table tab-pane in fade">
<thead>

</thead>

<tbody class="ves">
</tbody>
</table>

</div>
</div>
</div>
</div> --}}
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
<script>
function vesFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("vesselserach");
  filter = input.value.toUpperCase();
  table = document.getElementById("eventvesseltable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
  $('#serchbtn').on('click', function(){
    search();
  });
    $("#searchrmodw").on("shown.bs.modal", function(event) {
      search();
    //   $('#searchbox').trigger('focus')
      $('#vesselserach').focus();

    //   alert("Wait a few Second");
  });
//   search();
  function search(){
       var keyword = $('#searchbox').val();
       $.post('{{ route("employee.search") }}',
        {
           _token: $('meta[name="csrf-token"]').attr('content'),
           keyword:keyword
         },
         function(data){
          table_post_row(data);
            console.log(data);
         });
  }
  // table row with ajax
  function table_post_row(res){
  let htmlView = '';
  if(res.employees.length <= 0){
      htmlView+= `
         <tr>
            <td colspan="4">No data.</td>
        </tr>`;
  }
  for(let i = 0; i < res.employees.length; i++){
      htmlView += `
          <tr class="vesrow" id="`+res.employees[i].VesselName+`" data-vesname="`+res.employees[i].VesselName+`" data-vesimo="`+res.employees[i].IMONo+`"  >

                <td >`+res.employees[i].VesselName+`</td>
                 <td>`+res.employees[i].VesselType+`</td>
                 <td>`+res.employees[i].IMONo+`</td>
          </tr>`;
  }
       $('.ves').html(htmlView);
      $('#vesselserach').focus();

  }

  $(document).ready(function () {
    $('#vesseltran').click(function(e){
       let code = $('#companycode').val();
       let name = $('#companyname').val();
        window.open("/vessel-setup?code="+code+'&name='+name, "_blank");

    });
  });
  </script>
