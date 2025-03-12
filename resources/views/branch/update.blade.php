@extends('layouts.app')
@section('content')
<style>
    .file {
  visibility: hidden;
  position: absolute;
}
    </style>
<form action="/branch" method="POST">
    @method('PUT')
    @csrf
<div style="margin-bottom: 2%" class="btn-toolbar float-right" role="toolbar" aria-label="">
    <div class="btn-group" role="group" aria-label="">
      <a href="/branch-setup">  <button type="button" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> New</button>
       </a> <button type="submit" class="btn btn-primary"><i class="fa fa-file-archive" aria-hidden="true"></i>Save</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-recycle" aria-hidden="true"></i>Delete</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-door-open" aria-hidden="true"></i>Exit</button>
    </div>
   
</div>
<div style="clear: both">



    

      <ul class="nav ">
        <li class=" btn"><a data-toggle="pill" href="/branch">Create Branch</a></li>
        <li class=" btn "><a data-toggle="pill" href="#search">Search</a></li>
        
      </ul>

   
      
      <div class="tab-content">
        <div id="create" class="tab-pane  in active">
        


          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create Branch</h5>
        
        
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                  
                    
                    </div>
        
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        
        <div style="margin-left: 9%" class="row">
            
            
                
                    <div style="  text-align: right" class="col-sm-4">
                <label for="branchcode">Branch code : </label>
                    </div>
                <div class="col-sm-5">
          <input type="text" disabled style="margin-bottom: 4%" class="form-control" name="branchcode"  id="branchcode" value="{{$data->id}}" placeholder="">
                </div>  
                {{-- <button type="submit" id="customersearch"><i class="fa fa-search"></i></button> --}}
            </div>
            
        
            
        
            {{-- <div class="col-sm-4 ">
        
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="inactive" id="inactive" value="checkedValue" >
                    Inactive
                  </label>
            </div> --}}
        
            
        
           
        
        </div>
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="branchname">Branch Name : </label>
            </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" type="text" required name="branchname" class="form-control"  id="branchname" value="{{$data->BranchName}}"  placeholder="">
            </div>
        </div>
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="cityname">City Name : </label>
        </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" type="text" required name="cityname" class="form-control"  id="cityname" value="{{$data->CityName}}" placeholder="">
            </div>
        </div>
        
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label for="Currency">Currency : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="currency" class="form-control" value="{{$data->Currency}}"  id="currency"  placeholder="">
            </div>
            <div style="text-align: right" class="col-sm-2">
            <label for="exchangeRate">ExchangeRate : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="exchangerate" class="form-control" value="{{$data->USDRate}}"  id="exchangeRate"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="branchemail">Branch Email : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" name="branchemail" class="form-control" value="{{$data->Email}}"  id="branchemail"  placeholder="">
            </div>
        </div>
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="Password">Password : </label>
            </div>
            <div class="col-sm-3">
        <input type="password" name="password" class="form-control" value="{{$data->Password}}"  id="password"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="SMPT">SMPT : </label>
                </div>
                <div class="col-sm-3">
            <input type="text" required name="smpt" class="form-control"  value="{{$data->SMTP}}" id="smpt"  placeholder="">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="gst">GST %: </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="gst" class="form-control" value="{{$data->GSTPer}}" id="gst"  placeholder="">
            </div>
        </div>
        
           
        
        
        
        </div>
        
        
        
        
        
        </div>
        </div>
        
        <div class="col-md-12">
           
                
                <div id="msg"></div>
                <form method="post" id="image-form">
                  <input type="file" name="img[]" class="file" accept="image/*">
                  <div class="input-group my-3">
                    <input type="text" required class="form-control" disabled placeholder="Upload File" id="file">
                    <div class="input-group-append">
                      <button type="button" class="browse btn btn-primary">Browse...</button>
                    </div>
                  </div>
                </form>
              
              
               <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
              
              <script>
                        $(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
              </script>
        </div></form>
        
        </div>
        
      
      </div>




   

        <!-- /.card-header -->
        
            </div>



   
</div>


</div>
</div>


@endsection
