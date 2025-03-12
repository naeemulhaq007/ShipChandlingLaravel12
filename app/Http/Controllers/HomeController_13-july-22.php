<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GroceryCrud\Core\GroceryCrud;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function branch_setup(){
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('BranchSetup');
        $crud->where(["BranchCode"=>\Auth::user()->BranchCode]);
        $crud->setSubject('Branch Setup', 'Branch Setup');
        $crud->unsetJquery();
        $crud->setSkin("bootstrap-v4");
        $crud->unsetBootstrap();
        $crud->fieldType('Inactive', 'checkbox_boolean');
        $crud
            ->displayAs("BranchCode","Branch Code")
            ->displayAs("BranchName","Branch Name")
            ->displayAs("CityName","City Name")
            ->displayAs("USDRate","USD Rate")
            ->displayAs("GSTPer","GST Per");

        //$crud->unsetFields(['BranchCode']);
        $output = $crud->render();
        $data["pagetitle"]="Branch Setup";


        return $this->_showOutput($output,$data);
    }

    public function company_setup(){
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('CompanySetup');
        $crud->where(["BranchCode"=>\Auth::user()->BranchCode]);
        $crud->setSubject('Company Setup', 'Company Setup');
        $crud->unsetJquery();
        $crud->unsetAdd();
        $crud->unsetDelete();
        $crud->unsetFields(['BranchCode']);
        $crud->unsetColumns(['BranchCode']);
        // $crud
        //     ->displayAs("CompanyName","Company Name")
        //     ->displayAs("CompanyAddress","Company Address")
        //     ->displayAs("PhoneNo","Phone No")
        //     ->displayAs("EmailAddress","Email Address")
        //     ->displayAs("FaxNo","Fax No")
        //     ->displayAs("WebsiteAddress","Website Address");

        $output = $crud->render();
        $data["pagetitle"]="Company Setup";


        return $this->_showOutput($output,$data);
    }

    public function warehouse_setup(){
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('GodownSetup');
        $crud->where(["BranchCode"=>\Auth::user()->BranchCode]);
        $crud->setSubject('Warehouse Setup', 'Warehouse Setup');
        $crud->unsetJquery();
        $crud->unsetEditFields(['BranchCode']);
        $crud->unsetColumns(['BranchCode']);
        $crud->fieldType('BranchCode', 'hidden');
        $crud->fieldType('ChkNotShow', 'checkbox_boolean');
        $crud->callbackBeforeInsert(function ($stateParameters) {
            $stateParameters->data['BranchCode'] = \Auth::user()->BranchCode;

            return $stateParameters;
        });

        $crud
            ->displayAs("GodownCode","Godown Code")
            ->displayAs("GodownName","Godown Name")
            ->displayAs("PrinterName","Printer Name")
            ->displayAs("StockCode","Stock Code")
            ->displayAs("StockName","Stock Name")
            ->displayAs("ChkNotShow","Chk Not Show");

        $output = $crud->render();
        $data["pagetitle"]="Warehouse Setup";


        return $this->_showOutput($output,$data);
    }

    public function agent_setup(){
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('AgentSetup');
        $crud->where(["BranchCode"=>\Auth::user()->BranchCode]);
        $crud->setSubject('Agent Setup', 'Agent Setup');
        $crud->unsetJquery();
        $crud->setSkin("bootstrap-v4");
        $crud->unsetBootstrap();
        $crud->unsetEditFields(['BranchCode']);
        $crud->unsetColumns(['BranchCode']);
        $crud->fieldType('BranchCode', 'hidden');
        $crud->callbackBeforeInsert(function ($stateParameters) {
            $stateParameters->data['BranchCode'] = \Auth::user()->BranchCode;
            return $stateParameters;
        });

        $crud->columns(['CustomerName','Address','PhoneNo','EmailAddress']);
        $crud
            ->displayAs("CustomerName","Customer Name")
            ->displayAs("PhoneNo","Phone No")
            ->displayAs("EmailAddress","Email Address");

        //$crud->unsetFields(['BranchCode']);
        $output = $crud->render();
        $data["pagetitle"]="Agent Setup";


        return $this->_showOutput($output,$data);
    }


    /**
     * Get everything we need in order to load Grocery CRUD
     *
     * @return GroceryCrud
     * @throws \GroceryCrud\Core\Exceptions\Exception
     */
    private function _getGroceryCrudEnterprise() {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        return $crud;
    }

    /**
     * Grocery CRUD Output
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    private function _showOutput($output,$data='') {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                ->header('Content-Type', 'application/json')
                ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;

        return view('default_template', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'data'=>$data
        ]);
    }

    /**
     * Get database credentials as a Zend Db Adapter configuration
     * @return array[]
     */
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

}
