@extends('layouts.app')
@section('content')

<form action="/agent-setup" method="POST">
    @csrf
    
    
<div style="margin-bottom: 2%" class="btn-toolbar float-right" role="toolbar" aria-label="">
    <div class="btn-group" role="group" aria-label="">
       <button onclick="gfg_Run()" type="button" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> New Record</button>
        
        <button type="submit" class="btn btn-primary"><i class="fa fa-file-archive" aria-hidden="true"></i>Save</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-recycle" aria-hidden="true"></i>Delete</button>
        <a href="/home"><button type="button" class="btn btn-primary"><i class="fa fa-door-open" aria-hidden="true"></i>Exit</button></a>
    </div>
   
</div>
<div style="clear: both">



    

      <ul class="nav ">
        <li class=" btn"><a data-toggle="pill" href="#create">Agent Commission Create</a></li>
        <li class=" btn "><a data-toggle="pill" href="#search">Search</a></li>
        
      </ul>

   
      
      <div class="tab-content">
        <div id="create" class="tab-pane  in active">
        


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
                <div style="text-align: right" class="card-body">
                    <div class="row">
                        
       
            
            
                
                    <div style="text-align: right" class="col-sm-2">
                <label for="agent_id">Agent ID : </label>
                    </div>
                <div class="col-sm-1">
          <input type="text"   class="form-control" disabled name="agent_id" 
          {{-- value="{{$agent->id}}" --}}
           id="agentid"  placeholder="">
                </div>  
                {{-- <button type="submit" id="customersearch"><i class="fa fa-search"></i></button> --}}
            
            
        
            
        
            {{--<div class="col-sm-4 ">
        
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="disable" id="disable" value="checkedValue" >
                    Disable
                  </label>
                  
            </div> --}}
        </div>
        
            
        <script>
    
let x = {{$lastid->ID}};
x++;
let z = x;

       
        var inputF = document.getElementById("agentid");
  
        function gfg_Run() {
            inputF.value = z;
            
        }
    </script>
        
           
        
        </div>
        
        <div class="row">
            <div style="text-align: right" class="col-sm-2">
            <label for="agentname">Name Of Agent : </label>
            </div>
            <div class="col-sm-5">
        <input style="margin-bottom: 2%" type="text" required name="agentname" class="form-control"  id="agentname"  placeholder="">
            </div>
        </div>
        
   
        
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label for="agentcode">Code : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="agentcode" class="form-control"  id="agentcode"  placeholder="">
            </div>
          
            <div class="col-sm-3">
        <input type="text" required name="exchangerate" class="form-control"  id="exchangeRate"  placeholder="">
            </div>
        </div>
        <hr>
        <h2>General Information</h2>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="address">Address : </label>
            </div>
            <div class="col-sm-5">
        <input type="text" name="address" class="form-control"  id="address"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="telephone">Telephone : </label>
            </div>
            <div class="col-sm-5">
        <input type="number" name="telephone" class="form-control"  id="telephone"  placeholder="">
            </div>
        </div>
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="fax">Fax # : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="fax" class="form-control"  id="fax"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="email">Email : </label>
                </div>
                <div class="col-sm-3">
            <input type="email" name="email" class="form-control"  id="email"  placeholder="">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="web">Web  : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="web" class="form-control"  id="web"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="country">Country : </label>
                </div>
                <div class="col-sm-3">
            <input type="text" required name="country" class="form-control"  id="country"  placeholder="">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="city">City : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="city" class="form-control"  id="city"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="state">State : </label>
                </div>
                <div class="col-sm-3">
            <input type="text" required name="state" class="form-control"  id="state"  placeholder="">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="zip">Zip : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="zip" class="form-control"  id="zip"  placeholder="">
            </div>
        </div>
        
           
        <hr>
        <h2>Billing Information</h2>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="contactperson">Contact Person : </label>
            </div>
            <div class="col-sm-5">
        <input type="text" name="contactperson" class="form-control"  id="contactperson"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="billingaddress">Billing Address : </label>
            </div>
            <div class="col-sm-5">
        <input type="text" required name="billingaddress" class="form-control"  id="billingaddress"  placeholder="">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="bilingtelephone">Telephone : </label>
            </div>
            <div class="col-sm-5">
        <input type="number" name="bilingtelephone" class="form-control"  id="bilingtelephone"  placeholder="">
            </div>
        </div>
        
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="bilingfax">Fax # : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="bilingfax" class="form-control"  id="bilingfax"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="bilingemail">Email : </label>
                </div>
                <div class="col-sm-3">
            <input type="email" name="bilingemail" class="form-control"  id="bilingemail"  placeholder="">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="web">Web  : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required name="bilingweb" class="form-control"  id="bilingweb"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="bilingstatus">Status : </label>
                </div>
                <div class="col-sm-3">
            <input type="text" required  name="bilingstatus" class="form-control"  id="bilingstatus"  placeholder="">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="creaditlimit">Creadit Limit : </label>
            </div>
            <div class="col-sm-3">
        <input type="text" required  name="creaditlimit" class="form-control"  id="creaditlimit"  placeholder="">
            </div>
        
            <div style="text-align: right" class="col-sm-2">
                <label for="terms">Terms : </label>
                </div>
                <div class="col-sm-3">
            <input type="text" required  name="terms" class="form-control"  id="terms"  placeholder="">
                </div>
        </div>
        <div class="row" style="margin-bottom: 1%">
            <div style="text-align: right" class="col-sm-2">
            <label class="" for="eqcic">Event Quate Chargers Internal Comment : </label>
            </div>
            <div class="col-sm-5">

               
                  <textarea class="form-control" name="eqcic" id="eqcic" rows="3"></textarea>
                
    
            </div>
        </div>
        
        
        
        </div>
        
        
        
        
        
        </div>
        </div>
        
        </form>
        <script>
            
            </script>
        
        
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
                            <div class="row" style="margin-bottom: 1%">
                                <div style="text-align: right" class="col-sm-2">
                                <label for="Telephone">Search : </label>
                                </div>
                                
                                <div class="col-sm-6">
                            <input type="text"  name="" class="form-control"  id=""  placeholder=" ">
                                </div>
                                
                                        
                            </div>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>agent Code</th>
                        <th>agent Name</th>
                        <th>Code</th>
                        <th>ExchangeRate</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td ><a href="/agent-setup/update/{{$item->ID}}">"{{$item->ID}}"</a></td>
                            <td >{{$item->CustomerName}}</td>
                            <td>{{$item->CustomerCode}}</td>
                            
                            {{-- <td>{{$item->exchangeRate}}</td> --}}
                            
                            
                            
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


@endsection
