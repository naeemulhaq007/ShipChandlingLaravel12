<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouse = DB::table('GodownSetup')->get();
       return view('warehouse.index',compact('warehouse'));
    // return view('warehouse.index');
    }   

    //get request
    

    public function store(Request $request )
    {   
            $warehouse = new \App\Models\GodownSetup;
            $warehouse->warehouses_id = $request->warehouses_id;
            $warehouse->warehousename = $request->warehousename;
            
            
            $warehouse->printername = $request->printername;
            
            $warehouse->stockcode = $request->stockcode;
            $warehouse->stockname = $request->stockname;
            $warehouse->prefix = $request->prefix;
          
          
            $warehouse->save();
         //   return "Name: ".$request->name;
        //    return view('warehouse.create');
        return redirect('warehouse-setup');
    }

    public function update(request $request,$Id)
    {
        $warehouse = DB::table('GodownSetup')->find($request->Id);
       
        return view('warehouse.update',compact('warehouse'));
        // $warehouse = \App\Models\GodownSetup::find($id);
        // return view('warehouse.update',compact('warehouse'));
       // return "ID  ".$id;
    }

    public function modify(Request $request)
    {
        $warehouse = DB::table('GodownSetup')->find($request->Id);
        // $warehouse = \App\Models\GodownSetup::find($request->id);
        $warehouse->name = $request->name;
        $warehouse->address = $request->address;
        $warehouse->gender = $request->gender;
        $warehouse->save();
        return redirect('/warehouse/index');
    }
    public function detail($id)
    {
        $warehouse = \App\Models\GodownSetup::find($id);
        return view('warehouse.detail',compact('warehouse'));
    }
    public function destroy(Request $request)
    {
        $warehouse = \App\Models\GodownSetup::find($request->id);
        $warehouse->delete(); 
        return redirect('/warehouse/index');
    }

}
