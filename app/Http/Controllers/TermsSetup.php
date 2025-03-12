<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;

class TermsSetup extends Controller
{
    // public function index()
    // {
        // if ($request->ajax()) {
        //     $data = termssetup::select('*');
        //     return Datatable::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){

        //                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        //         }
        //  $data = DB::table('TermsSetup')->get();

            // $results = DB::select('select * from BranchSetup' );
        // $data = \App\Models\BranchSetup::all();
    //    return view('termssetup.index',compact('data'));


    // return view('branch.index');
    // }

    //get request
    public function Terms_setup(){
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('TermsSetup');
        $crud->where(["BranchCode"=>config('app.MBranchCode')]);
        $crud->setSubject('Terms Setup', 'Terms Setup');
        // $crud->unsetJquery();

        $crud->setSkin("bootstrap-v4");
        // $crud->unsetBootstrap();
        // $crud->unsetFields(['BranchCode']);

        $crud
            ->displayAs("TermsCode","Terms Code")
            ->displayAs("Terms","Terms")
            ->displayAs("Days","Days");



        $output = $crud->render();
        $data["pagetitle"]="Terms Setup";


        return $this->_showOutput($output,$data);

    }

    private function _getGroceryCrudEnterprise() {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        return $crud;
    }

    private function _showoutput($output,$data='') {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                ->header('Content-Type', 'application/json')
                ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;
        $lastid = DB::table('TermsSetup')->orderBy('id', 'DESC')->first();


        return view('terms_view', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'data'=>$data,
            'lastid'=>$lastid,
        ]);
    }
    private function _getDatabaseConnection() {

        return [
            'adapter' => [
                'driver' => 'Pdo',
                'dsn' => 'sqlsrv:server = tcp:'.env('DB_HOST').',1433; Database = '.env('DB_DATABASE'),
                'database' => env('DB_DATABASE'),
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                //'charset' => 'utf8'
            ]
        ];
    }

    public function store(Request $request )
    {
        // $branch = new BranchSetup([


        //     'TermsCode'  => $request->TermsCode,
        //     'Terms'  => $request->Terms,
        //     "BranchCode" => config('app.MBranchCode'),
        //     'Days'  => $request->Days,
        // ]);

            // $trems = new \App\Models\termssetup;
            // $trems->branchcode = $request->branchcode;

            // $trems->inactive = $request->inactive;
            // $trems->branchname = $request->branchname;
            // $trems->cityname = $request->cityname;
            // $trems->currency = $request->currency;
            // $trems->branchemail = $request->branchemail;
            // $trems->password = $request->password;
            // $trems->exchangerate = $request->exchangerate;
            // $trems->gst = $request->gst;
            // $trems->smpt = $request->smpt;

            // $trems->save();
         //   return "Name: ".$request->name;
        //    return view('branch.create');
        return redirect('termssetup/index');
    }


}
