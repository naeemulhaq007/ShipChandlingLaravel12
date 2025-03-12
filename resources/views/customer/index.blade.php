@extends('layouts.app')
@section('content')

<div style="margin-bottom: 2%" class="btn-toolbar float-right" role="toolbar" aria-label="">
    <div class="btn-group" role="group" aria-label="">
        <button onclick="gfg_Run()" type="button" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> New</button>
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
            <h5 class="card-title">Create Customer</h5>


            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
          
            
            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
<div style="text-align: right" class="row">
    
    <div style="margin-left: 4%" class="col-md-3 ">
        <div class="form-group row">
        <label for="customer_id">Customer Id : </label>
        <div class="col-sm-7">
  <input type="number" disabled class="form-control" name="customer_id"  id="customer_id"  placeholder="">
        </div>  
        {{-- <button type="submit" id="customersearch"><i class="fa fa-search"></i></button> --}}
    </div>
    </div>

    <script>
        {{$lastid->ID}}
    let x = {{$lastid->ID}};
    x++;
    let z = x;
    
           
            var inputF = document.getElementById("customer_id");
      
            function gfg_Run() {
                inputF.value = z;
                
            }
        </script>

        {{-- <div class="col-lg-1 col-6">

            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" >
                Disable
            </label>
        </div> --}}

    

    <div class="col-lg-5 col-6">

        <input name="date" id="date" class="form-control" type="date" value="">
    </div>

</div>

<div class="row">
    
    <label for="customername">Name Of Customer : </label>
    <div class="col-sm-5">
<input style="margin-bottom: 2%" type="text" name="customername" class="form-control"  id="customername"  placeholder="Enter Customer Name">
    </div>
</div>

<div class="row">
    <div style="margin-left: 9%" class="col-md-3 float-left">
        <div class="form-group row">
        <label class="col-form-label" for="c-code">Code : </label>
        <div class="col-sm-5">
  <input type="text" class="form-control" name="c-code"  id="c-code"  placeholder="Enter Code">
        </div>
    </div>
    </div>

    <div style="margin-left: -3%" class="col-md-3 float-center">
        <div class="form-group row">
        <label for="c_type" class="col-sm-3 col-form-label"> CType:</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="c_type" id="c_type" placeholder="" >
        </div>
        </div>
          
    </div>

   

    <div class="col-md-3  ">
        <div class="form-group row">
            <label for="v_type" class="col-sm-3 col-form-label">VType:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="v_type" id="v_type" placeholder="">
            </div>
          </div>    
    </div>

</div>

<div class="row">
    <div style="margin-left: 7%" class="col-md-3 ">
        <div class="form-group row">
        <label for="Category">Category :</label>
        <div class="col-sm-5">
            <select class="custom-select" name="" id="">
                <option selected>A</option>
                <option value="">B</option>
                <option value="">f</option>
               
            </select>
        </div>
    </div>
    </div>

    <div class="col-md-4 ">
        <div class="form-group row">
        <label for="aob" class="col-sm-2 col-form-label"> AOB:</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="aob" id="aob" placeholder="" >
        </div>
        </div>
          
    </div>

   

    <div style="margin-left: -3%" class="col-md-4 ">
        <div class="form-group row">
            
            <div class="col-sm-5">

               <div class="form-group">
                  
                <select class="custom-select" name="" id="">
                   
                    <option selected>Select one</option>
                    @foreach ($custset as $item)
                    <option value="H">{{$item->AreaofBusiness}}</option>
                   @endforeach
                    
                </select>
                </div>



               
                      </div>
          </div>    
    </div>


</div>
<div class="row">
    <div style="margin-left: 10%" class="col-md-3 ">
        <div class="form-group row">
        <label for="Hold">Hold :</label>
        <div class="col-sm-5">
            <select class="custom-select" name="" id="">
               
                <option selected>H</option>
                <option value=""></option>
              
            </select>
        </div>
    </div>




    
    </div>

    <div style="margin-left: -4%" class="col-md-3 ">
        <div class="form-group row">
        <label style="margin-right: 4%" for="Status">Status :</label>
        <div class="col-sm-5">
            <select class="custom-select" name="" id="">
                <option selected>Active</option>
                <option value="">Inactive</option>
                <option value="">Approved</option>
                <option value="">UnApproved</option>
                <option value="">A</option>
                <option value="">I</option>
                
            </select>
        </div>
    </div>
    </div>

   

    {{-- <div style="margin-left: -2%" class="col-md-4 ">
        <div class="form-group row">
            <label for="AssignUser" class="col-sm-4 col-form-label"> AssignUser:</label>
            <div class="col-sm-4">
                <select class="custom-select" name="" id="">
                    <option selected>Select one</option>
                    <option value="H">H</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                      </div>
          </div>    
    </div> --}}


</div>
<hr>
<div class="row">
<h3>General Information</h3>

</div>

<div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">
    <label class="" for="Address">Address : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="Address" class="form-control"  id="Address"  placeholder="Enter Customer Address">
    </div>
</div>
<div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">
    <label for="ContactPerson">Contact Person : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="ContactPerson" class="form-control"  id="ContactPerson"  placeholder="Enter Customer ContactPerson">
    </div>
</div>
<div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">
    <label for="Telephone">Telephone : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="Telephone" class="form-control"  id="Telephone"  placeholder="Enter Customer Telephone">
    </div>
    <div style="text-align: right" class="col-sm-1">
    <label for="WEB">WEB : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="WEB" class="form-control"  id="WEB"  placeholder="Enter Customer WEB">
    </div>
</div>
<div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">
    <label for="Telephone">Fax # : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="Telephone" class="form-control"  id="Telephone"  placeholder="Enter Customer Telephone">
    </div>
    <div style="text-align: right" class="col-sm-1">

    <label for="Email">Email : </label>
    </div>
    <div class="col-sm-4">
<input type="Email" name="email" class="form-control"  id="Email"  placeholder="Enter Customer Email">
    </div>
</div>
<div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">

    <label for="Mobile">Mobile # : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="Mobile" class="form-control"  id="Mobile"  placeholder="Enter Customer Mobile">
    </div>
    <label for="StateName">State Name : </label>
    <div style="margin-left: 1%" class="col-sm-4">
        <select class="custom-select" name="" id="">
                   
            <option selected>Select one</option>
            @foreach ($custset as $item)
            <option value="{{$item->StateName}}">{{$item->StateName}}</option>
           @endforeach
            
        </select>
    </div>
</div>

<div class="row">
    <div style="text-align: right" class="col-sm-2">

    <label for="City">City : </label>
    </div>
    <div class="col-sm-4">
        <select class="custom-select" name="" id="">
                   
            <option selected>Select one</option>
            @foreach ($custset as $item)
            <option value="{{$item->City}}">{{$item->City}}</option>
           @endforeach
            <option value=""></option>
            <option value=""></option>
        </select>
    </div>
    <div style="text-align: right" class="col-sm-1">

    <label for="Country">Country : </label>
    </div>
    <div class="col-sm-4">
        <select class="custom-select" name="" id="">
                   
            <option selected>Select one</option>
            @foreach ($custset as $item)
            <option value="{{$item->Country}}">{{$item->Country}}</option>
           @endforeach
            
        </select>
    </div>
</div>


<hr>
<div class="row">
<h3>Billing Information</h3>


</div>

<div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2 ">

    <label for="ContactPerson">Contact Person : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="ContactPerson" class="form-control"  id="ContactPerson"  placeholder="Enter Customer ContactPerson">
    </div>
</div>
<div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">

    <label for="BillingAddress">Billing Address : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="BillingAddress" class="form-control"  id="BillingAddress"  placeholder="Enter Customer BillingAddress">
    </div>
</div>
<div  class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">

    <label for="telephone">Telephone : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="telephone" class="form-control"  id="telephone"  placeholder="Enter Customer telephone">
    </div>
</div>
<div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">
    <label for="Telephone">Fax # : </label>
    </div>
    <div class="col-sm-4">
<input type="number" name="Telephone" class="form-control"  id="Telephone"  placeholder="Enter Customer Telephone">
    </div>
    <div style="text-align: right" class="col-sm-1">

    <label for="Email">Email : </label>
    </div>
    <div class="col-sm-4">
<input type="Email" name="email" class="form-control"  id="Email"  placeholder="Enter Customer Email">
    </div>
</div>
<div class="row" style="margin-bottom: 1%">

<div style="text-align: right" class="col-sm-2">
    <label for="WEB">WEB : </label>
    </div>
    <div class="col-sm-4">
<input type="text" name="WEB" class="form-control"  id="WEB"  placeholder="Enter Customer WEB">
    </div>
</div>
<div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">
    <label for="creditlimit">Credit Limit : </label>
    </div>
    <div class="col-sm-4">
<input type="number" name="creditlimit" class="form-control"  id="creditlimit"  placeholder="Enter Customer creditlimit">
    </div>
    <div style="text-align: right" class="col-sm-1">

    <label for="Terms">Terms : </label>
    </div>
    <div class="col-sm-4">
        <select class="custom-select" name="" id="">
                   
            <option selected>Select one</option>
            @foreach ($TermsSetup as $item)
            <option value="{{$item->Terms}}">{{$item->Terms}}</option>
           @endforeach
           
        </select>
    </div>
</div>
<div class="row" style="margin-bottom: 1%">

    <div style="text-align: right" class="col-sm-2">
        <label for="eqcic">Event Quote chargers Internal Comments : </label>
        </div>
        <div class="col-sm-8">
    <textarea type="texta" name="eqcic" class="form-control"  id="eqcic"  placeholder="Enter event comments"></textarea>
        </div>
    </div>
    <div class="row" style="margin-bottom: 1%">

        <div style="text-align: right" class="col-sm-2">
            <label for="bankdetails">Bank Details : </label>
            </div>
            <div class="col-sm-8">
        <textarea type="texta" name="bankdetails" class="form-control"  id="bankdetails"  placeholder="Enter Customer bank details"></textarea>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>


        <hr>
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
                    <div class="col-md-12">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Department Name</th>
                    <th>Cash Disc %</th>
                    <th>Cr Note %</th>
                    <th>AVI Rebate %</th>
                    <th>Volume Disc %</th>
                    <th>Sls Comm %</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($TypeSetup as $item)
                    <tr>
                        
                        <td>{{$item->TypeName}}</td>
                        <td><input type="text" width="20px" id="row-1-age" name="row-1-age" value=""></td>
                        <td><input type="text" id="row-1-age" name="row-1-age" value=""></td>
                        <td><input type="text" id="row-1-age" name="row-1-age" value=""></td>
                        <td><input type="text" id="row-1-age" name="row-1-age" value=""></td>
                        <td><input type="text" id="row-1-age" name="row-1-age" value=""></td>
                          
                    </tr>
                    @endforeach    
                    {{-- <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> --}}
                </tbody>
        </table>
</div>
</div>
{{-- <div class="row" style="margin-bottom: 1%">
    <div style="text-align: right" class="col-sm-2">
    <label for="Telephone">Sale Man : </label>
    </div>
    <div class="col-sm-3">
        <div class="dropdown open">
            <button class="btn btn-info  dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    --------------------
                    </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item " href="#">Disabled action</a>
            </div>
          </div>
    </div>
    
    <div class="col-sm-2">
<input type="text" name="" class="form-control"  id=""  placeholder=" ">
    </div>
    <div class="col-sm-2">
        <input type="text" name="" class="form-control"  id=""  placeholder="">
            </div>
            <button type="submit" id="customersearch"><i class="fa fa-search"></i></button>
</div> --}}
</div>

</div>
</div>
</div>


</div>
</div>


@endsection
