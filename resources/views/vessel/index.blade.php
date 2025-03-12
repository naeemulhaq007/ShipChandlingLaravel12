@extends('layouts.app')
@section('content')
<style>
    .file {
  visibility: hidden;
  position: absolute;
}
    </style>
<form action="/vessel" method="POST">
    @csrf
<div style="margin-bottom: 2%" class="btn-toolbar float-right" role="toolbar" aria-label="">
    <div class="btn-group" role="group" aria-label="">
        <button type="button" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> New</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-file-archive" aria-hidden="true"></i>Save</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-recycle" aria-hidden="true"></i>Delete</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-door-open" aria-hidden="true"></i>Exit</button>
    </div>
   
</div>
<div style="clear: both">



    

      <ul class="nav ">
        <li class=" btn"><a data-toggle="pill" href="#create">Create Vessel</a></li>
        <li class=" btn "><a data-toggle="pill" href="#search">Search</a></li>
        
      </ul>

   
      
      <div class="tab-content">
        <div id="create" class="tab-pane  in active">
        


          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create Vessel</h5>
        
        
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                  
                    
                    </div>
        
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                        
       
             <div class="row">
                <div style="text-align: right" class="col-sm-2">
                <label for="Address">Address : </label>
                </div>
                <div class="col-sm-5">
            <input style="margin-bottom: 2%" disabled type="text"  name="Address" class="form-control"  id="Address"  placeholder="">
                </div>
            </div>
            
        
       
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="Telephone">Telephone : </label>
            </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" disabled type="number"  name="telephone" class="form-control"  id="telephone"  placeholder="">
            </div>
        </div>
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="emailaddress">Email Address : </label>
        </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" disabled type="text"  name="emailaddress" class="form-control"  id="emailaddress"  placeholder="">
            </div>
        </div>
        
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label for="Facsirnile">Facsirnile </label>
            </div>
            <div class="col-sm-3">
        <input type="text"  disabled name="facsirnile" class="form-control"  id="currency"  placeholder="">
            </div>
            <div style="text-align: right" class="col-sm-2">
            <label for="web">Web : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" disabled name="web" class="form-control"  id="exchangeRate"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="Status"> Status </label>
            </div>
            <div class="col-sm-3">
        <input type="email" name="status" class="form-control"  id="idn    " disabled placeholder="">
            </div>
        </div>
        <hr>
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="companyname">Company Name : </label>
            </div>
            <div class="col-sm-3">
                <select class="custom-select" name="" id="">
                   
                    <option selected>Select one</option>
                    @foreach ($custset as $item)
                    <option value="{{$item->CustomerName}}">{{$item->CustomerName}}</option>
                   @endforeach
                    
                </select>
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="vesselcode">Vessel Code : </label>
                </div>
                <div class="col-sm-3">
            <input type="text" required name="vesselcode" class="form-control"  id="vesselcode"  placeholder="">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="vesselname">Vessel Name: </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="vesselname" class="form-control"  id="vesselname"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="IMO">IMO #: </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="imo" class="form-control"  id="imo"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="vesseltype">Vessel Type: </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="vesseltype" class="form-control"  id="vesseltype"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="callsign">Call Sign : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="callsign" class="form-control"  id="callsign"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="email">Email: </label>
            </div>
            <div class="col-sm-3">
        <input type="email" required name="email" class="form-control"  id="email"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="phonenumber">Phone number: </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="phonenumber" class="form-control"  id="phonenumber"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="vesselname">Vessel Notes: </label>
            </div>
            <div class="col-sm-5">
                <textarea class="form-control" name="vesselname" id="vesselname" rows="3"></textarea>
        
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="commission">Commission %: </label>
            </div>
            <div class="col-sm-2">
        <input type="text" required name="commission" class="form-control"  id="commission"  placeholder="">
            </div>
      
            <div class="form-group row">
                
                <div class="col-sm-5">
          <div class="dropdown open">
            <button class="btn btn-info dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    ------------
                    </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item disabled" href="#">Disabled action</a>
            </div>
          </div>
                </div>
            </div>
           
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="salesmannote">Sales Man Notes: </label>
            </div>
            <div class="col-sm-5">
                <textarea class="form-control" name="salesmannote" id="salesmannote" rows="3"></textarea>
        
            </div>
        </div>
           
        
        
        
        </div>
        
        
        
        
        
        </div>
        </div>
        </form>
        
        </div>
        <div id="search" class="tab-pane fade">
         
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Search data</h5>
    
    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                  
                    
                    </div>
    
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row" style="margin-bottom: 1%">
                        <div style="text-align: right" class="col-sm-3">
                        <label for="Telephone">Search : </label>
                        </div>
                        
                        <div class="col-sm-6">
                    <input type="text" required name="" class="form-control"  id=""  placeholder=" ">
                        </div>
                        
                                
                    </div>
                    <div class="row">
                        <div style="margin-left: 25%" class="col-md-12">
                            
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>IMO #</th>
                        <th>Vessel Name</th>
                        <th>ID</th>
                        <th>Vessel Type</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($Vessel as $item)
                        <tr>
                            <td >{{$item->IMONo}}</td>
                            <td>{{$item->VesselName}}</td>
                            <td>{{$item->ID}}</td>
                            <td>{{$item->VesselType}}</td>
                            
                            
                        </tr>
                       @endforeach
                    </tbody>
            </table>
    </div>
    </div>
   
    </div>
    
    </div>
    </div>
        </div>
      
      </div>




   

        <!-- /.card-header -->
        
            </div>



   
</div>


</div>
</div>
<script>
    $(document).ready(function () {
    $('#example').DataTable({
        scrollY: '200px',
        scrollCollapse: true,
        paging: false,
    });
});
</script>
{{-- <script>
    $(document).ready(function() {
    $('#country-dropdown').on('change', function() {
    var country_id = this.value;
    $("#state-dropdown").html('');
    $.ajax({
    url:"{{url('get-states-by-country')}}",
    type: "POST",
    data: {
    country_id: country_id,
    _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
    $('#state-dropdown').html('<option value="">Select State</option>'); 
    $.each(result.states,function(key,value){
    $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
    $('#city-dropdown').html('<option value="">Select State First</option>'); 
    }
    });
    });    
    $('#state-dropdown').on('change', function() {
    var state_id = this.value;
    $("#city-dropdown").html('');
    $.ajax({
    url:"{{url('get-cities-by-state')}}",
    type: "POST",
    data: {
    state_id: state_id,
    _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
    $('#city-dropdown').html('<option value="">Select City</option>'); 
    $.each(result.cities,function(key,value){
    $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
    });
    }
    });
    });
    });
    </script> --}}

@endsection