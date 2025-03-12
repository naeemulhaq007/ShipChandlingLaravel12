@extends('layouts.app')
@section('content')
<style>
    .file {
  visibility: hidden;
  position: absolute;
}
    </style>
<form action="/branch" method="POST">
    @csrf
<div style="margin-bottom: 2%" class="btn-toolbar float-right" role="toolbar" aria-label="">
    <div class="btn-group" role="group" aria-label="">
        <button onclick="gfg_Run()" type="button" href="#" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i>new</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-file-archive" aria-hidden="true"></i>Save</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-recycle" aria-hidden="true"></i>Delete</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-door-open" aria-hidden="true"></i>Exit</button>
    </div>
   
</div>
<div style="clear: both">



    

      <ul class="nav ">
        <li class=" btn"><a data-toggle="pill" href="#create">Create Branch</a></li>
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
                        
        <div style="margin-left: 7%" class="row">
            
           
                    <div style="  text-align: right" class="col-sm-4">
                <label for="branchcode">Branch code : </label>
                    </div>
                <div class="col-sm-5">
          <input type="text" disabled  style="margin-bottom: 4%" class="form-control" name="branchcode"  id="bcode"   placeholder=""/>
                </div>  
                {{-- <button type="submit" id="customersearch"><i class="fa fa-search"></i></button> --}}
            </div>
            
        
            
        
            {{-- <div class="col-sm-4 ">
        
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="inactive" id="inactive" value="checkedValue" >
                    Inactive
                  </label>
            </div> --}}
        
            <script>
    {{$lastid->id}}
let x = {{$lastid->id}};
x++;
let z = x;

       
        var inputF = document.getElementById("bcode");
  
        function gfg_Run() {
            inputF.value = z;
            
        }
    </script>
        
           
        
        </div>
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="branchname">Branch Name : </label>
            </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" type="text" required name="branchname" class="form-control"  id="branchname"  placeholder="">
            </div>
        </div>
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="cityname">City Name : </label>
        </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" type="text" required name="cityname" class="form-control"  id="cityname"  placeholder="">
            </div>
        </div>
        
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label for="Currency">Currency : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="currency" class="form-control"  id="currency"  placeholder="">
            </div>
            <div style="text-align: right" class="col-sm-2">
            <label for="exchangeRate">ExchangeRate : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="exchangerate" class="form-control"  id="exchangeRate"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="branchemail">Branch Email : </label>
            </div>
            <div class="col-sm-3">
        <input type="email" name="branchemail" class="form-control"  id="branchemail"  placeholder="">
            </div>
        </div>
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="Password">Password : </label>
            </div>
            <div class="col-sm-3">
        <input type="password" name="password" class="form-control"  id="password"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="SMPT">SMPT : </label>
                </div>
                <div class="col-sm-3">
            <input type="text" required name="smpt" class="form-control"  id="smpt"  placeholder="">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="gst">GST %: </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="gst" class="form-control"  id="gst"  placeholder="">
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
                    <div class="row">
                        <div style="margin-left: 25%" class="col-md-12">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Branch Code</th>
                        <th>Branch Name</th>
                        <th>In Active</th>
                        <th>Currency</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td ><a href="/branch/update/{{$item->id}}">{{$item->id}}</a></td>
                            <td>{{$item->BranchName}}</td>
                            <td >{{$item->Inactive}}</td>
                            <td>{{$item->Currency}}</td>
                            
                            
                            
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
            </table>
    </div>
    </div>
    <div class="row" style="margin-bottom: 1%">
        <div style="text-align: right" class="col-sm-2">
        <label for="Telephone">Search : </label>
        </div>
        
        <div class="col-sm-6">
    <input type="text" required name="" class="form-control"  id=""  placeholder=" ">
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


@endsection
