@extends('layouts.app')
@section('content')
<style>
    .file {
  visibility: hidden;
  position: absolute;
}
    </style>
<form action="/warehouse" method="POST">
    @method('PUT')
    @csrf
<div style="margin-bottom: 2%" class="btn-toolbar float-right" role="toolbar" aria-label="">
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> Add</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-file-archive" aria-hidden="true"></i>Save</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-recycle" aria-hidden="true"></i>Delete</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-door-open" aria-hidden="true"></i>Exit</button>
    </div>
   
</div>
<div style="clear: both">



    

      {{-- <ul class="nav ">
        <li class=" btn"><a data-toggle="pill" href="#create">Create Warehouse</a></li>
        <li class=" btn "><a data-toggle="pill" href="#search">Search</a></li>
        
      </ul> --}}

   
      
      {{-- <div class="tab-content">
        <div id="create" class="tab-pane fade in active"> --}}
        


          
        
        </div>
        {{-- <div id="search" class="tab-pane fade"> --}}
         
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   
    
    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                  
                    
                    </div>
    
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            
            <table  style="margin-left: 20%"class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Code</th>
                        <th>Warehouse Name</th>
                        <th>Printer Name</th>
                        <th>Stock Code</th>
                        <th>Stock Name</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                    </tbody>
            </table>
    </div>
    </div>
    
    </div>
    
    </div>
     </div>
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
        
        
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                  
                    
                    </div>
        
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        
        <div style="margin-left: 20%" class="row">
            
            
                
                    {{-- <div style="margin-left: 4%  text-align: right" class="col-sm-4">
                <label for="Address">Address : </label>
                    </div> --}}
                    <div class="<div class="btn-group" data-toggle="buttons">
                        <button type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button>   
                    </div>
                    
                <div class="col-sm-5">
          <input type="text"  style="margin-bottom: 4%" class="form-control" name="warehouses_id"  id="warehouse_id"  placeholder="">
                </div>  
                <div class="<div class="btn-group"  data-toggle="buttons">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-arrow-right"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>   
                </div>
                
            </div>
            
        
            
        
           
            
        
           
        
        </div>
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="warehouse">Warehouse : </label>
            </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" type="text" value="{{$warehouse->Id}}" name="warehouse" class="form-control"  id="warehouse"  placeholder="">
            </div>
        </div>
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="printername">Printer Name : </label>
        </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" type="text" required name="printername" class="form-control"  id="printername"  placeholder="">
            </div>
        </div>
        
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label for="stocks">Stock A/c </label>
            </div>
            <div class="col-sm-1">
        <input type="text" required name="stockcode" class="form-control"  id="stockcode"  placeholder="">
            </div>
            
            <div class="col-sm-3">
        <input type="text" disabled name="stocksname" class="form-control"  id="stocksname" value="Stocks" placeholder="">
            </div>
       
            
            <button  id="customersearch"><i class="fa fa-search"></i></button>
        </div>
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="prefix">Prefix : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" name="prefix" class="form-control"  id="prefix"  placeholder="">
            </div>
        
          
        
           
        
        
        
        </div>
        
        
        
        
        
        </div>
        </div>
        </form>

      {{-- {--  </div> --} --}}
      
      </div>




   

        <!-- /.card-header -->
        
            </div>



   
</div>


</div>
</div>


@endsection