<?php

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\VSN;
use App\Http\Controllers\Order;
use App\Http\Controllers\Branch;
use App\Http\Controllers\Events;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Quotes;
use App\Http\Controllers\Printer;
use App\Http\Controllers\Reports;
use App\Http\Controllers\CusLogin;
use App\Http\Controllers\Vouchers;
use App\Http\Controllers\INVENTORY;

use App\Http\Controllers\ItemSetup;

use App\Http\Controllers\Quotation;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AgentSetup;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ChartOfAccount;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\VplatController;

use App\Http\Controllers\PythonController;
use App\Http\Controllers\SearchController;


use App\Http\Controllers\VendorController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdditionalLoginController;
use App\Http\Controllers\CountryStateCityController;

use App\Http\Controllers\ShipServController;
use Illuminate\Support\Facades\Auth;

// use App\Http\Livewire\Select2AutoSearch;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::match(['get', 'post'], '/add-to-wishlist', [HomeController::class, 'addtowishlist'])->name('add-to-wishlist');
Route::match(['get', 'post'], '/product-detail', [HomeController::class, 'productdetail'])->name('product-detail');
Route::match(['get', 'post'], '/add-to-cart', [HomeController::class, 'addtocart'])->name('add-to-cart');


Route::match(['get', 'post'], '/Welcome', [HomeController::class, 'welcome'])->name('welcome');

Route::match(['get', 'post'], '/additional-login', [AdditionalLoginController::class, 'showAdditionalLoginForm'])->name('additional-login')->middleware('additional_login');


// Route::match(['get','post'],'/home', function() {
//     return view('home');
// })->name('home');

//Chart Of Account
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::match(['get', 'post'], '/Dashboard', [HomeController::class, 'index'])->name('home');
    Route::match(['get', 'post'], '/ChartOfAccount', [ChartOfAccount::class, 'index']);
    Route::match(['get', 'post'], '/cmdchartedadd', [ChartOfAccount::class, 'cmdchartedadd']);
    Route::match(['get', 'post'], '/cmdchartedsave', [ChartOfAccount::class, 'cmdchartedsave']);
    Route::match(['get', 'post'], '/chartedcodegen', [ChartOfAccount::class, 'chartedcodegen']);
    Route::match(['get', 'post'], '/transcode', [ChartOfAccount::class, 'transcode']);
    //EmployeeRegistration
    Route::match(['get', 'post'], '/EmployeeRegistration', [ChartOfAccount::class, 'EmployeeRegistration']);
    Route::match(['get', 'post'], '/Employeesave', [ChartOfAccount::class, 'Employeesave'])->name('Employeesave');
    Route::match(['get', 'post'], '/Employeedelete', [ChartOfAccount::class, 'Employeedelete'])->name('Employeedelete');
    
    //Pay Roll
    Route::match(['get', 'post'], '/Pay-Roll', [ChartOfAccount::class, 'PayRoll'])->name('PayRoll');
    Route::match(['get', 'post'], '/searchPayRoll', [ChartOfAccount::class, 'searchPayRoll'])->name('searchPayRoll');
    
    //Bill-Invoice
    Route::match(['get', 'post'], '/BillInvoice', [ChartOfAccount::class, 'BillInvoice'])->name('BillInvoice');
    Route::match(['get', 'post'], '/searchBill', [ChartOfAccount::class, 'searchBill'])->name('searchBill');
    Route::match(['get', 'post'], '/BillMastersave', [ChartOfAccount::class, 'BillMastersave'])->name('BillMastersave');
    
    //IncomeBill-Invoice
    Route::match(['get', 'post'], '/IncomeBillInvoice', [ChartOfAccount::class, 'IncomeBillInvoice'])->name('IncomeBillInvoice');
    Route::match(['get', 'post'], '/IncomesearchBill', [ChartOfAccount::class, 'IncomesearchBill'])->name('IncomesearchBill');
    Route::match(['get', 'post'], '/IncomeBillMastersave', [ChartOfAccount::class, 'IncomeBillMastersave'])->name('IncomeBillMastersave');
    
    //Openingbalance
    Route::match(['get', 'post'], '/Openingbalance', [ChartOfAccount::class, 'Openingbalance'])->name('Openingbalance');
    Route::match(['get', 'post'], '/Openingbalancesearch', [ChartOfAccount::class, 'Openingbalancesearch'])->name('Openingbalancesearch');
    Route::match(['get', 'post'], '/Openingbalancesave', [ChartOfAccount::class, 'Openingbalancesave'])->name('Openingbalancesave');
    Route::match(['get', 'post'], '/OpeningbalancesaveChekc', [ChartOfAccount::class, 'OpeningbalancesaveChekc'])->name('OpeningbalancesaveChekc');
    
    //Account Ledger
    Route::match(['get', 'post'], '/Account-Ledger', [ChartOfAccount::class, 'AccountLedger'])->name('AccountLedger');
    Route::match(['get', 'post'], '/ACFillType', [ChartOfAccount::class, 'ACFillType'])->name('ACFillType');
    Route::match(['get', 'post'], '/AClGenrate', [ChartOfAccount::class, 'AClGenrate'])->name('AClGenrate');
    Route::match(['get', 'post'], '/LedgerGrid', [ChartOfAccount::class, 'LedgerGrid'])->name('LedgerGrid');
    
    
    
    
    //journal voucher
    Route::match(['get', 'post'], '/journal-voucher', [ChartOfAccount::class, 'journalvoucher'])->name('journalvoucher');
    Route::match(['get', 'post'], '/jvsearch', [ChartOfAccount::class, 'jvsearch'])->name('jvsearch');
    Route::match(['get', 'post'], '/jvsave', [ChartOfAccount::class, 'jvsave'])->name('jvsave');
    Route::match(['get', 'post'], '/jvdes', [ChartOfAccount::class, 'jvdes'])->name('jvdes');
    Route::match(['get', 'post'], '/jvact', [ChartOfAccount::class, 'jvact'])->name('jvact');
    Route::match(['get', 'post'], '/CheckRecon', [ChartOfAccount::class, 'CheckRecon'])->name('CheckRecon');
    
    //Reports   //    ///  //
    //TrialBalance
    Route::match(['get', 'post'], '/TrialBalance', [Reports::class, 'TrialBalance'])->name('TrialBalance');
    Route::match(['get', 'post'], '/TrialBalancesearch', [Reports::class, 'TrialBalancesearch'])->name('TrialBalancesearch');
    Route::match(['get', 'post'], '/TrialBalanceprint', [Printer::class, 'TrialBalanceprint'])->name('TrialBalanceprint');
    
    //OrderReport
    Route::match(['get', 'post'], '/Order-Report', [Reports::class, 'OrderReport'])->name('OrderReport');
    Route::match(['get', 'post'], '/Orderreportsearch', [Reports::class, 'OrderReportsearch'])->name('OrderReportsearch');
    Route::match(['get', 'post'], '/orderreportprint', [Reports::class, 'orderreportprint'])->name('orderreportprint');
    Route::match(['get', 'post'], '/orderrptcuscode', [Reports::class, 'OrderReportCuscode'])->name('OrderReportCuscode');
    
    //Po-Received-Report
    Route::match(['get', 'post'], '/Po-Received-Report', [Reports::class, 'PoReceivedReport'])->name('PoReceivedReport');
    // Route::match(['get','post'],'/orderrptcuscode',[Reports::class,'OrderReportCuscode'])->name('OrderReportCuscode');
    Route::match(['get', 'post'], '/PoReceivedReportsearch', [Reports::class, 'PoReceivedReportsearch'])->name('PoReceivedReportsearch');
    Route::match(['get', 'post'], '/PoReceivedReportprint', [Reports::class, 'PoReceivedReportprint'])->name('PoReceivedReportprint');







// // / / / / / / / / // / / / / / / ///
// Branch Setup
Route::match(['get', 'post'], 'branch-setup', [Branch::class, 'branch_setup']);
// Route::match(['get','post'],'branch-setup/{operation}', [Branch::class, 'branch_setup']);
// Route::match(['get','post'],'branch-setup/{operation}/{id}', [Branch::class, 'branch_setup']);
// Route::match(['get','post'],'branch-setup', [Branch::class, 'branch_setup']);
// Route::match(['get','post'],'branch-setup/{operation}', [Branch::class, 'branch_setup']);
// Route::match(['get','post'],'branch-setup/{operation}/{id}', [Branch::class, 'branch_setup']);
Route::match(['get', 'post'], 'branch/store', [Branch::class, 'branchstore'])->name('branch.store');
Route::match(['get', 'post'], 'BranchDelete', [Branch::class, 'BranchDelete'])->name('BranchDelete');

//Terms Setups
Route::match(['get', 'post'], 'terms-setup', [HomeController::class, 'Terms_setup']);
// Route::match(['get','post'],'terms-setup/{operation}', [HomeController::class, 'Terms_setup']);
// Route::match(['get','post'],'terms-setup/{operation}/{id}', [HomeController::class, 'Terms_setup']);
// Route::match(['get','post'],'terms-setup', [HomeController::class, 'Terms_setup']);
// Route::match(['get','post'],'terms-setup/{operation}', [HomeController::class, 'Terms_setup']);
// Route::match(['get','post'],'terms-setup/{operation}/{id}', [HomeController::class, 'Terms_setup']);
Route::match(['get', 'post'], 'TermsSave', [HomeController::class, 'TermsSave'])->name('TermsSave');

//ShipingPort Setups
Route::match(['get', 'post'], 'shipingport-setup', [HomeController::class, 'ShipingPort_Setup'])->name('shipingport-setup');
Route::match(['get', 'post'], 'ShipingPortSave', [HomeController::class, 'ShipingPortSave'])->name('ShipingPortSave');
Route::match(['get', 'post'], 'ShipingPortDelete', [HomeController::class, 'ShipingPortDelete'])->name('ShipingPortDelete');
// Route::match(['get','post'],'shipingport-setup/{operation}', [HomeController::class, 'ShipingPort_Setup']);
// Route::match(['get','post'],'shipingport-setup/{operation}/{id}', [HomeController::class, 'ShipingPort_Setup']);
// Route::match(['get','post'],'shipingport-setup', [HomeController::class, 'ShipingPort_Setup']);
// Route::match(['get','post'],'shipingport-setup/{operation}', [HomeController::class, 'ShipingPort_Setup']);
// Route::match(['get','post'],'shipingport-setup/{operation}/{id}', [HomeController::class, 'ShipingPort_Setup']);



//Company Setup
Route::match(['get', 'post'], 'company-setup', [HomeController::class, 'company_setup']);
Route::match(['get', 'post'], 'Company/store', [HomeController::class, 'Companystore']);
Route::match(['get', 'post'], 'CompanyDelete', [HomeController::class, 'CompanyDelete']);

//Watehouse Setup
Route::match(['get', 'post'], 'warehouse-setup', [HomeController::class, 'warehouse_setup'])->name('warehouse-setup');
Route::match(['get', 'post'], 'WarehouseSave', [HomeController::class, 'WarehouseSave']);
Route::match(['get', 'post'], 'WarehouseDelete', [HomeController::class, 'WarehouseDelete']);

//Agent Setup
Route::match(['get', 'post'], 'agent-setup', [AgentSetup::class, 'agent_setup']);
Route::match(['get', 'post'], 'agent/store', [AgentSetup::class, 'store'])->name('Agentstore');
Route::match(['get', 'post'], 'Deleteagent', [AgentSetup::class, 'Deleteagent'])->name('Deleteagent');



//Department Setup
Route::match(['get', 'post'], 'department-setup', [HomeController::class, 'department_setup']);
Route::match(['get', 'post'], 'Departmentget', [HomeController::class, 'Departmentget']);
Route::match(['get', 'post'], 'DepartmentSave', [HomeController::class, 'DepartmentSave']);
Route::match(['get', 'post'], 'DepartmentDelete', [HomeController::class, 'DepartmentDelete']);

//VesselSetup
Route::match(['get', 'post'], 'vessel-setup', [VesselController::class, 'vessel_setup']);
Route::match(['get', 'post'], '/VesselGet', [VesselController::class, 'VesselGet'])->name('VesselGetData');
Route::match(['get', 'post'], '/vessel/store', [VesselController::class, 'store'])->name('vesselstore');
Route::match(['get', 'post'], '/VesselDelete', [VesselController::class, 'VesselDelete'])->name('VesselDelete');
Route::match(['get', 'post'], '/import-Vessellist', [VesselController::class, 'importVessellist'])->name('import-Vessellist');
Route::match(['get', 'post'], '/getcustomer', [VesselController::class, 'getcustomer'])->name('getcustomer');
Route::match(['get', 'post'], '/Vessellist_save', [VesselController::class, 'Vessellist_save'])->name('Vessellist_save');


// Route::match(['get', 'post'], 'vessel-setups/update/{ID}', [VesselController::class, 'update']);
// Route::match(['get', 'post'], 'vessel-setups/update/{ID}/{operation}', [VesselController::class, 'update']);
// Route::match(['get', 'post'], 'vessel-setups/update/{ID}/{operation}/{id}', [VesselController::class, 'update']);
// Route::match(['get', 'post'], 'vessel-setups/update/{ID}', [VesselController::class, 'update']);
// Route::match(['get', 'post'], 'vessel-setups/update/{ID}/{operation}', [VesselController::class, 'update']);
// Route::match(['get', 'post'], 'vessel-setups/update/{ID}/{operation}/{id}', [VesselController::class, 'update']);


//searcher
// Route::match(['get','post'],'/sea', Select2AutoSearch::class);
Route::match(['get', 'post'], '/follow', [EventController::class, 'follow']);
Route::match(['get', 'post'], '/cussearch', [SearchController::class, 'cussearch']);
Route::match(['get', 'post'], '/ordersearch', [Order::class, 'ordersearch']);
Route::match(['get', 'post'], '/itemnameser', [SearchController::class, 'itemnameser']);
Route::match(['get', 'post'], '/indexitem', [SearchController::class, 'indexitem'])->name('indexitem');
Route::match(['get', 'post'], '/indexitema', [SearchController::class, 'indexitema'])->name('indexitema');
Route::match(['get', 'post'], '/searchvendor', [SearchController::class, 'searchvendor']);
Route::match(['get', 'post'], '/itemnameserimpa', [SearchController::class, 'itemnameserimpa']);
Route::match(['get', 'post'], '/Vendersearchmod', [SearchController::class, 'Vendersearchmod']);
Route::match(['get', 'post'], '/vendorselect', [VendorController::class, 'vendorselect']);
Route::match(['get', 'post'], '/itemselect', [VendorController::class, 'itemselect']);
Route::match(['get', 'post'], '/eventserch', [Quotes::class, 'eventserch']);
Route::match(['get', 'post'], '/calcList/{id}', [Quotes::class, 'calcList']);
Route::match(['get', 'post'], '/dislist', [CustomerController::class, 'dislist']);
Route::match(['get', 'post'], '/biddate', [Quotes::class, 'biddate'])->name('biddate');
Route::match(['get', 'post'], '/eventno', [Quotes::class, 'eventno']);
Route::match(['get', 'post'], 'autocomplete', [EventController::class, 'autocomplete'])->name('autocomplete');
Route::match(['get', 'post'], '/employee/search', [EventController::class, 'showEmployee'])->name('employee.search');



//VendorSetup
Route::match(['get', 'post'], 'vendorsearch', [HomeController::class, 'vendorsearch']);
Route::match(['get', 'post'], 'vendorsave', [HomeController::class, 'vendorsave']);
Route::match(['get', 'post'], 'vendor-setup', [HomeController::class, 'vendor_setup']);
Route::match(['get', 'post'], '/import-Vendorlist', [HomeController::class, 'importVendorlist'])->name('import-Vendorlist');
Route::match(['get', 'post'], '/Vendorlist_save', [HomeController::class, 'Vendorlist_save'])->name('Vendorlist_save');



/////////////////////////////////////////CustomerSetup///////////////////////////////////////////////

Route::match(['get', 'post'], 'customer-setup', [CustomerController::class, 'customer_setup']);
Route::match(['get', 'post'], 'search-customer', [CustomerController::class, 'customernamecheck']);
Route::match(['get', 'post'], 'customercodecheck', [CustomerController::class, 'customercodecheck']);

Route::match(['get', 'post'], '/import-Customerlist', [CustomerController::class, 'importCustomerlist'])->name('import-Customerlist');
Route::match(['get', 'post'], '/Customerlist_save', [CustomerController::class, 'Customerlist_save'])->name('Customerlist_save');
Route::match(['get', 'post'], 'SaveCustomer', [CustomerController::class, 'SaveCustomer'])->name('SaveCustomer');
Route::match(['get', 'post'], 'DeleteCustomer', [CustomerController::class, 'DeleteCustomer'])->name('DeleteCustomer');
Route::match(['get', 'post'], '/cuscontactsave', [CustomerController::class, 'cuscontactsave'])->name('cuscontactsave');
Route::match(['get', 'post'], '/Newcutcontact', [CustomerController::class, 'Newcutcontact'])->name('Newcutcontact');



//Event
Route::match(['get', 'post'], 'events-setup', [EventController::class, 'Event_setup'])->name('events-setup');
Route::match(['get', 'post'], 'getshiptoevent', [EventController::class, 'getshiptoevent'])->name('getshiptoevent');
Route::match(['get', 'post'], 'Event_setup_godownsetup', [EventController::class, 'Event_setup_godownsetup'])->name('Es_godownsetup');
Route::match(['get', 'post'], 'Es_portsetup', [EventController::class, 'Es_portsetup'])->name('Es_portsetup');
Route::match(['get', 'post'], 'getcontact', [EventController::class, 'getcontact']);
Route::match(['get', 'post'], 'QuoteGet', [EventController::class, 'QuoteGet']);
Route::match(['get', 'post'], 'refcheck', [EventController::class, 'refcheck']);
Route::match(['get', 'post'], 'deleteevent', [EventController::class, 'deleteevent']);
Route::match(['get', 'post'], 'Mqoutssave', [EventController::class, 'Mqoutssave']);

Route::match(['get', 'post'], 'events-setups/update', [EventController::class, 'update']);
Route::match(['get', 'post'], '/event/store', [EventController::class, 'event_store']);
Route::match(['get', 'post'], '/quote/store', [EventController::class, 'quote_store']);
Route::match(['get', 'post'], 'event/update', [EventController::class, 'update_event_store']);


//Origin Setups
Route::match(['get', 'post'], 'origin-setup', [HomeController::class, 'Origin_Setup']);

//Quates
Route::match(['get', 'post'], 'quote-setup', [HomeController::class, 'quote_setup']);
Route::match(['get', 'post'], 'quote-setup/{operation}', [HomeController::class, 'quote_setup']);
Route::match(['get', 'post'], 'quote-setup/{operation}/{id}', [HomeController::class, 'quote_setup']);
Route::match(['get', 'post'], 'quote-setup', [HomeController::class, 'quote_setup']);
Route::match(['get', 'post'], 'quote-setup/{operation}', [HomeController::class, 'quote_setup']);
Route::match(['get', 'post'], 'quote-setup/{operation}/{id}', [HomeController::class, 'quote_setup']);


//Quotation
Route::match(['get', 'post'], 'quotation', [Quotation::class, 'index'])->name('route_quotation');
Route::match(['get', 'post'], 'itemgetfromship', [Quotation::class, 'itemgetfromship'])->name('itemgetfromship');
Route::match(['get', 'post'], 'QuotationItemsave', [Quotation::class, 'QuotationItemsave'])->name('QuotationItemsave');
Route::match(['get', 'post'], 'OrderItemsave', [Order::class, 'OrderItemsave'])->name('OrderItemsave');
Route::match(['get', 'post'], '/importQuataion', [ExcelController::class, 'importQuataion'])->name('importQuataion');
Route::match(['get', 'post'], '/importQuataionShow', [ExcelController::class, 'importQuataionShow'])->name('importQuataionShow');
Route::match(['get', 'post'], '/ExportQuataion', [ExcelController::class, 'ExportQuataion'])->name('ExportQuataion');
Route::match(['get', 'post'], '/frmoutlook', [Quotation::class, 'prepareEmail'])->name('frmoutlook');
Route::match(['get', 'post'], '/Recal', [Quotation::class, 'Recal'])->name('Recal');
Route::match(['get', 'post'], '/adnewitem', [Quotation::class, 'adnewitem'])->name('adnewitem');
Route::match(['get', 'post'], '/IMPAItem', [Quotation::class, 'SPIMPAItem'])->name('IMPAItem');
Route::match(['get', 'post'], '/Quotationget', [Quotation::class, 'Quotationget'])->name('Quotationget');
Route::match(['get', 'post'], '/get-token', [Quotation::class, 'getToken'])->name('get-token');
Route::match(['get', 'post'], '/get-quote-shipserve/{quoteId}', [Quotation::class, 'GetQuotesShipServe'])->name('GetQuotesShipServe');





//pricing
Route::match(['get', 'post'], 'quotation/pricing', [Quotation::class, 'pricing'])->name('pricing');
Route::match(['get', 'post'], 'PricingGet', [Quotation::class, 'PricingGet'])->name('PricingGet');
Route::match(['get', 'post'], '/pricing-store', [Quotation::class, 'pricestore']);
//rfq
Route::match(['get', 'post'], 'vplatsend', [Quotation::class, 'vplatsend'])->name('vplatsend');
Route::match(['get', 'post'], 'FillEmailOnly', [Quotation::class, 'FillEmailOnly'])->name('FillEmailOnly');
Route::match(['get', 'post'], 'updateinrfq', [Quotes::class, 'updateinrfq'])->name('updateinrfq');
Route::match(['get', 'post'], 'RFQvplatGet', [Quotation::class, 'RFQvplatGet'])->name('RFQvplatGet');
Route::match(['get', 'post'], 'RFQ-Vplat-View', [Quotation::class, 'RFQvplatView'])->name('RFQvplatView');
Route::match(['get', 'post'], 'quotation/rfq', [Quotation::class, 'RFQ'])->name('rfq');
Route::match(['get', 'post'], 'RFQGet', [Quotation::class, 'RFQGet'])->name('RFQGet');
Route::match(['get', 'post'], '/rfq_store', [Quotation::class, 'rfqstore']);
Route::match(['get', 'post'], '/reports', [Quotation::class, 'report']);
//fliptovsn
Route::match(['get', 'post'], 'quotation/fliptovsn', [Quotation::class, 'fliptovsn'])->name('fliptovsn');
Route::match(['get', 'post'], 'flipdataget', [Quotation::class, 'flipdataget'])->name('flipdataget');
Route::match(['get', 'post'], 'FlipFillAgent', [Quotation::class, 'FlipFillAgent'])->name('FlipFillAgent');
Route::match(['get', 'post'], 'quotation/fliptovsn/save', [Quotation::class, 'fliptovsnsave']);
Route::match(['get', 'post'], 'flipsavetwo', [Quotation::class, 'flipsavetwo']);



//ORDER
Route::match(['get', 'post'], 'Order', [Order::class, 'index'])->name('order');
Route::match(['get', 'post'], 'OrderDataGetEvent', [Order::class, 'OrderDataGetEvent'])->name('OrderDataGetEvent');
Route::match(['get', 'post'], 'OrderDataGetQuote', [Order::class, 'OrderDataGetQuote'])->name('OrderDataGetQuote');
Route::match(['get', 'post'], 'TxtPONOLostFocus', [Order::class, 'TxtPONO_LostFocus'])->name('TxtPONOLostFocus');
Route::match(['get', 'post'], 'Order-Save', [Order::class, 'ordersave'])->name('ordersave');
//ORDERentry
Route::match(['get', 'post'], 'OrderEntry', [Order::class, 'orderentry'])->name('orderEntry');
Route::match(['get', 'post'], '/Orderget', [Order::class, 'Orderget'])->name('Orderget');
Route::match(['get', 'post'], 'OrderEntrysave', [Order::class, 'orderentrysave'])->name('orderEntrysave');


//EventLog
Route::match(['get', 'post'], 'event-log', [Quotes::class, 'index'])->name('event-log');

//VsnLog
Route::match(['get', 'post'], 'Vsn-Log', [VSN::class, 'index'])->name('VSN-log');
Route::match(['get', 'post'], 'VsllogSerach', [VSN::class, 'VsllogSerach'])->name('VsllogSerach');
Route::match(['get', 'post'], 'ChargeList-VSN', [VSN::class, 'ChargeListVsn'])->name('ChargeList-VSN');
Route::match(['get', 'post'], 'ChargeListVsnGet', [VSN::class, 'ChargeListVsnGet'])->name('ChargeListVsnGet');
Route::match(['get', 'post'], 'chargelistPOShow', [VSN::class, 'chargelistPOShow'])->name('chargelistPOShow');
Route::match(['get', 'post'], 'chargelistDMShow', [VSN::class, 'chargelistDMShow'])->name('chargelistDMShow');
Route::match(['get', 'post'], 'ChargeListBanksave', [VSN::class, 'ChargeListBanksave'])->name('ChargeListBanksave');
Route::match(['get', 'post'], 'ShipDr', [VSN::class, 'ShipDR'])->name('ShipDR');
Route::match(['get', 'post'], 'ShipDRload', [VSN::class, 'ShipDRload'])->name('ShipDRload');
Route::match(['get', 'post'], 'shipdr_OrderMaster', [VSN::class, 'shipdr_OrderMaster'])->name('shipdr-OrderMaster');


//Venodr-Setup

Route::match(['get', 'post'], 'Vendor-Item-Setup', [VendorController::class, 'VendorItemSetup'])->name('Vendor-Item-Setup');
Route::match(['get', 'post'], '/populate-itemf', [VendorController::class, 'populateitemf']);
Route::match(['get', 'post'], '/venderitem/store', [VendorController::class, 'venderitem_store']);

// //Stock-Item
// Route::match(['get','post'], '/stockitem/store', [VendorController::class, 'stockitem_store']);
// Route::match(['get','post'], '/populate-items', [VendorController::class, 'populateitems']);
// Route::match(['get','post'],'Stock-Product-List', [VendorController::class, 'StockItemSetup'])->name('Stock-Product-List');

//printerouts

Route::match(['get', 'post'], '/downloadPDF', [Printer::class, 'downloadPDF'])->name('downloadPDF');
Route::match(['get', 'post'], 'print/quotation/{quote_no}', [Printer::class, 'quotationprint']);
Route::match(['get', 'post'], 'print/Order/{PONo}', [Printer::class, 'orderentryprint']);
Route::match(['get', 'post'], 'Purchaseorderprint/{PONO}', [Printer::class, 'Purchaseorderprint'])->name('Purchaseorderprint');
Route::match(['get', 'post'], 'Expensevoucherrpt/{Voucherno}', [Printer::class, 'Expensevoucherrpt'])->name('Expensevoucherrpt');
Route::match(['get', 'post'], 'DeliveryOrderPrint', [Printer::class, 'deliveryorderprint'])->name('deliveryorderprint');
Route::match(['get', 'post'], 'DeliveryOrderPrintre/{PONO}', [Printer::class, 'deliveryorderprintre'])->name('deliveryorderprintre');
Route::match(['get', 'post'], 'DeliveryOrderPrintse/{PONO}', [Printer::class, 'deliveryorderprintse'])->name('deliveryorderprintse');
Route::match(['get', 'post'], 'DeliveryOrderPrintWay/{PONO}', [Printer::class, 'deliveryorderprintnorway'])->name('deliveryorderprintnorway');
Route::match(['get', 'post'], 'FinalInvoicePrint/{PONO}', [Printer::class, 'FinalInvoicePrint'])->name('FinalInvoicePrint');

//Item-Register-Setup
Route::match(['get', 'post'], 'Item-Register-Setup', [ItemSetup::class, 'ItemRegisterSetup'])->name('Item-Register-Setup');
Route::match(['get', 'post'], '/itemregstore', [ItemSetup::class, 'itemreg_store'])->name('RegisterItem');
Route::match(['get', 'post'], '/bulkitemsave', [ItemSetup::class, 'bulkitemsave'])->name('bulkitemsave');
Route::match(['get', 'post'], '/itemCompre', [ItemSetup::class, 'itemCompre'])->name('itemCompre');
Route::match(['get', 'post'], '/populateitemreg', [ItemSetup::class, 'populateitemreg']);
Route::match(['get', 'post'], '/vendoritemcheck', [ItemSetup::class, 'vendoritemcheck']);
Route::match(['get', 'post'], '/itemregselect', [ItemSetup::class, 'itemregselect']);

Route::match(['get', 'post'], '/itemregsearch', [ItemSetup::class, 'itemregsearch'])->name('itemregsearch');
Route::match(['get', 'post'], '/itemdelete', [ItemSetup::class, 'itemdelete'])->name('itemdelete');
//purchase-order
Route::match(['get', 'post'], '/purchase-order', [Order::class, 'purchaseorder'])->name('purchase-order');
Route::match(['get', 'post'], '/purchaseorder', [Order::class, 'purchaseorderco'])->name('purchaseorderco');
Route::match(['get', 'post'], '/purchaseordercodataget', [Order::class, 'purchaseordercodataget'])->name('purchaseordercodataget');

Route::match(['get', 'post'], '/purchaseorderfiller', [Order::class, 'purchaseorderfiller'])->name('purchaseorderfiller');
;
Route::match(['get', 'post'], '/PObtnclick', [Order::class, 'PObtnclick'])->name('PObtnclick');
;
Route::match(['get', 'post'], '/posave', [Order::class, 'posave']);
Route::match(['get', 'post'], '/PO-Received', [Order::class, 'PO_received'])->name('PO-Received');
Route::match(['get', 'post'], '/PORecDataget', [Order::class, 'PORecDataget'])->name('PORecDataget');
Route::match(['get', 'post'], '/porecived', [Order::class, 'PO_received_save'])->name('PO-received-save');

//Delivery-order
Route::match(['get', 'post'], '/Delivery-Order', [Order::class, 'Delivery_Order'])->name('Delivery-Order');
Route::match(['get', 'post'], '/DeliveryOrdersave', [Order::class, 'DeliveryOrdersave'])->name('Delivery-Order-save');
Route::match(['get', 'post'], '/Delivery_Orderdataget', [Order::class, 'Delivery_Orderdataget'])->name('Delivery_Orderdataget');

//Final-Invoice
Route::match(['get', 'post'], '/Final-Invoice', [Order::class, 'Final_invoice'])->name('Final-Invoice');
Route::match(['get', 'post'], '/Final_invoiceDataget', [Order::class, 'Final_invoiceDataget'])->name('Final_invoiceDataget');
Route::match(['get', 'post'], '/CheckTerms', [Order::class, 'CheckTerms'])->name('CheckTerms');
Route::match(['get', 'post'], '/InvoiceSave', [Order::class, 'InvoiceSave'])->name('InvoiceSave');
Route::match(['get', 'post'], '/getvendorsetup', [Order::class, 'getvendorsetup'])->name('getvendorsetup');


//Vouchers

Route::match(['get', 'post'], '/ReceiptVoucher', [Vouchers::class, 'ReceiptVoucher'])->name('ReceiptVoucher');
Route::match(['get', 'post'], '/search-receipt-vouchers', [Vouchers::class, 'searchReceiptVouchers'])->name('searchReceiptVouchers');
Route::match(['get', 'post'], '/AddNew-receipt-vouchers', [Vouchers::class, 'AddNewReceiptVouchers'])->name('AddNewReceiptVouchers');
Route::match(['get', 'post'], '/AddNew-Journal-vouchers', [Vouchers::class, 'AddNewJournalvouchers'])->name('AddNewJournalvouchers');
Route::match(['get', 'post'], '/OrderMasterstep-receipt-vouchers', [Vouchers::class, 'OrderMasterstep'])->name('OrderMasterstep');
Route::match(['get', 'post'], '/Steptwo-receipt-vouchers', [Vouchers::class, 'Steptwo'])->name('Steptwo');

Route::match(['get', 'post'], '/VendorVoucher', [Vouchers::class, 'VendorVoucher'])->name('VendorVoucher');
Route::match(['get', 'post'], '/search-vendor-vouchers', [Vouchers::class, 'searchvendorVouchers'])->name('searchvendorVouchers');

Route::match(['get', 'post'], '/ExpensePaymentVoucher', [Vouchers::class, 'ExpensePaymentVoucher'])->name('ExpensePaymentVoucher');
Route::match(['get', 'post'], '/search-Expense-vouchers', [Vouchers::class, 'searchExpenseVouchers'])->name('searchExpenseVouchers');


//VplatUae


Route::match(['get', 'post'], '/Vplat-Quote-Uae', [VplatController::class, 'Vplat_quoteUae'])->name('Vplat_quoteUae');
Route::match(['get', 'post'], '/importvplatuae', [VplatController::class, 'importvplatUae'])->name('importvplatUae');
Route::match(['get', 'post'], '/upload-imageuae', [VplatController::class, 'uploadImageUae'])->name('uploadImageUae');
Route::match(['get', 'post'], '/saveqouteVplatuae', [VplatController::class, 'saveqouteVplatUae'])->name('saveqouteVplatUae');

//Vplat

Route::match(['get', 'post'], '/Vplat-Quote', [Quotes::class, 'Vplat_quote'])->name('Vplat_quote');
Route::match(['get', 'post'], '/importvplat', [Quotes::class, 'importvplat'])->name('importvplat');
Route::match(['get', 'post'], '/upload-image', [Quotes::class, 'uploadImage'])->name('uploadImage');
Route::match(['get', 'post'], '/uploadDatafile', [Quotes::class, 'uploadDatafile'])->name('uploadDatafile');
Route::match(['get', 'post'], '/saveqouteVplat', [Quotes::class, 'saveqouteVplat'])->name('saveqouteVplat');
//

Route::match(['get', 'post'], '/Branchupload-image', [Branch::class, 'branchuploadImage'])->name('branchuploadImage');
//Quote-log

Route::match(['get', 'post'], '/Quote-log', [Quotes::class, 'Quotelog'])->name('Quotelog');
Route::match(['get', 'post'], '/getquote', [Quotes::class, 'getquote'])->name('getquote');
Route::match(['get', 'post'], '/SetHot', [Quotes::class, 'SetHot'])->name('SetHot');
Route::match(['get', 'post'], '/NotHot', [Quotes::class, 'NotHot'])->name('NotHot');




Route::match(['get', 'post'], '/upload-pdf', 'PdfController@uploadPdf')->name('upload-pdf');

Route::match(['get', 'post'], '/send-email', [Vouchers::class, 'sendemail'])->name('send-email');
Route::match(['get', 'post'], '/send-email', [Vouchers::class, 'sendemail'])->name('send-email');
Route::match(['get', 'post'], '/storePDF', [Vouchers::class, 'storePDF'])->name('storePDF');

///////// INVENTORY /////////
//OPENING-Stock
Route::match(['get', 'post'], '/Opening-Stock', [INVENTORY::class, 'OpeningStock'])->name('OpeningStock');
Route::match(['get', 'post'], '/searchOpeningStock', [INVENTORY::class, 'searchOpeningStock'])->name('searchOpeningStock');

//PurchaseOrder-Stock
Route::match(['get', 'post'], '/Stock-Purchase-Order', [INVENTORY::class, 'StockPurchaseOrder'])->name('StockPurchaseOrder');
Route::match(['get', 'post'], '/searchStockPurchase', [INVENTORY::class, 'searchStockPurchase'])->name('searchStockPurchase');
Route::match(['get', 'post'], '/serchVenProList', [INVENTORY::class, 'serchVenProList'])->name('serchVenProList');
Route::match(['get', 'post'], '/stpuordelete', [INVENTORY::class, 'stpuordelete'])->name('stpuordelete');

//Stock PO Purchased
Route::match(['get', 'post'], '/Stock-PO-Purchased', [INVENTORY::class, 'StockPOPurchased'])->name('StockPOPurchased');
Route::match(['get', 'post'], '/searchStockPOPurchased', [INVENTORY::class, 'searchStockPOPurchased'])->name('searchStockPOPurchased');
Route::match(['get', 'post'], '/StockPOPurchaseddelete', [INVENTORY::class, 'StockPOPurchaseddelete'])->name('StockPOPurchaseddelete');

//Pull Stock
Route::match(['get', 'post'], '/Pull-Stock', [INVENTORY::class, 'PullStock'])->name('PullStock');
Route::match(['get', 'post'], '/searchPullStock', [INVENTORY::class, 'searchPullStock'])->name('searchPullStock');
Route::match(['get', 'post'], '/PullStocksave', [INVENTORY::class, 'PullStocksave'])->name('PullStocksave');
Route::match(['get', 'post'], '/PullStockdelete', [INVENTORY::class, 'PullStockdelete'])->name('PullStockdelete');
Route::match(['get', 'post'], '/getmoredata', [INVENTORY::class, 'getmoredata'])->name('getmoredata');

//Sale-Return
Route::match(['get', 'post'], '/Sale-Return', [INVENTORY::class, 'SaleReturn'])->name('SaleReturn');
Route::match(['get', 'post'], '/searchSaleReturn', [INVENTORY::class, 'searchSaleReturn'])->name('searchSaleReturn');
Route::match(['get', 'post'], '/SaleReturnsave', [INVENTORY::class, 'SaleReturnsave'])->name('SaleReturnsave');
Route::match(['get', 'post'], '/SaleReturndelete', [INVENTORY::class, 'SaleReturndelete'])->name('SaleReturndelete');

//Stock-Transfer
Route::match(['get', 'post'], '/Stock-Transfer', [INVENTORY::class, 'StockTransfer'])->name('StockTransfer');
Route::match(['get', 'post'], '/searchStockTransfer', [INVENTORY::class, 'searchStockTransfer'])->name('searchStockTransfer');
Route::match(['get', 'post'], '/StockTransfersave', [INVENTORY::class, 'StockTransfersave'])->name('StockTransfersave');
Route::match(['get', 'post'], '/StockTransferdelete', [INVENTORY::class, 'StockTransferdelete'])->name('StockTransferdelete');

//Barcode
Route::match(['get', 'post'], '/barcodesearch', [INVENTORY::class, 'barcodesearch'])->name('barcodesearch');

//Current-Stock-Position
Route::match(['get', 'post'], '/Current-Stock-Position', [INVENTORY::class, 'CurrentStockPosition'])->name('CurrentStockPosition');
Route::match(['get', 'post'], '/searchCurrentStockPosition', [INVENTORY::class, 'searchCurrentStockPosition'])->name('searchCurrentStockPosition');
Route::match(['get', 'post'], '/CurrentStockPositionsave', [INVENTORY::class, 'CurrentStockPositionsave'])->name('CurrentStockPositionsave');
Route::match(['get', 'post'], '/CurrentStockPositiondelete', [INVENTORY::class, 'CurrentStockPositiondelete'])->name('CurrentStockPositiondelete');
//Current-Stock-Position-print
Route::match(['get', 'post'], '/Current-StockPosition-print', [Printer::class, 'CurrentStockPositionprint'])->name('CurrentStockPositionprint');

//Current-Stock-Position
Route::match(['get', 'post'], '/Stock-Ledger', [INVENTORY::class, 'StockLedger'])->name('StockLedger');
Route::match(['get', 'post'], '/searchStockLedger', [INVENTORY::class, 'searchStockLedger'])->name('searchStockLedger');
Route::match(['get', 'post'], '/FillOrderCalculation', [INVENTORY::class, 'FillOrderCalculationStockLedgersave'])->name('StockLedgersave');
Route::match(['get', 'post'], '/FillPullStockCal', [INVENTORY::class, 'FillPullStockCalStockLedgersave'])->name('StockLedgersave');
Route::match(['get', 'post'], '/StockLedgerdelete', [INVENTORY::class, 'StockLedgerdelete'])->name('StockLedgerdelete');
//Current-Stock-Position-print
Route::match(['get', 'post'], '/Stock-Ledger-print', [Printer::class, 'StockLedgerprint'])->name('StockLedgerprint');


//Stock-Item
Route::match(['get', 'post'], '/stockitem/store', [INVENTORY::class, 'stockitem_store'])->name('stockitem_store');
Route::match(['get', 'post'], '/populate-items', [INVENTORY::class, 'populateitems'])->name('populateitems');
Route::match(['get', 'post'], 'Stock-Product-List', [INVENTORY::class, 'StockItemSetup'])->name('Stock-Product-List');

//Vplat-WCI
Route::match(['get', 'post'], '/Vplat-Quote-WCI', [VplatController::class, 'Vplat_quoteWCI'])->name('Vplat_quote');
Route::match(['get', 'post'], '/importvplatWCI', [VplatController::class, 'importvplatWCI'])->name('importvplat');
Route::match(['get', 'post'], '/upload-imageWCI', [VplatController::class, 'uploadImageWCI'])->name('uploadImageWCI');
Route::match(['get', 'post'], '/saveqouteVplatWCI', [VplatController::class, 'saveqouteVplatWCI'])->name('saveqouteVplatWCI');


//Income
Route::match(['get', 'post'], '/Income-Statment', [Reports::class, 'TempIncome'])->name('TempIncome');
Route::match(['get', 'post'], '/ProfitLossStatment', [ChartOfAccount::class, 'PROFITLOSSSTATMENT'])->name('PROFITLOSSSTATMENT');
Route::match(['get', 'post'], '/GetTempIncome', [Reports::class, 'GetTempIncome'])->name('GetTempIncome');
Route::match(['get', 'post'], '/GetIncomepr', [Reports::class, 'GetIncomepr'])->name('GetIncomepr');


//Excel

Route::match(['get', 'post'], '/import-excel', [ExcelController::class, 'importExcel'])->name('import-excel');




//python

Route::match(['get', 'post'], '/PythonScript', [PythonController::class, 'extractText'])->name('executePythonScript');




//PerformaInvoice

Route::match(['get', 'post'], '/PerformaInvoicePrint', [Reports::class, 'PerformaInvoicePrint'])->name('PerformaInvoicePrint');

/////////////////////REPORTS//////////////

//InvoiceReport
Route::match(['get', 'post'], '/Invoice-Report', [Reports::class, 'InvoiceReport'])->name('InvoiceReport');
Route::match(['get', 'post'], '/InvoiceReportsearch', [Reports::class, 'InvoiceReportsearch'])->name('InvoiceReportsearch');
Route::match(['get', 'post'], '/InvoiceReportprint', [Reports::class, 'InvoiceReportprint'])->name('InvoiceReportprint');

//DMMissingReport
Route::match(['get', 'post'], '/DMMissing-Report', [Reports::class, 'DMMissingReport'])->name('DMMissingReport');
Route::match(['get', 'post'], '/DMMissingReportsearch', [Reports::class, 'DMMissingReportsearch'])->name('DMMissingReportsearch');
Route::match(['get', 'post'], '/DMMissingReportprint', [Reports::class, 'DMMissingReportprint'])->name('DMMissingReportprint');

//RFQ CUSTOMER SUMMRAY
Route::match(['get', 'post'], '/RFQ-C-Summary', [Reports::class, 'RFQCustomerSummary'])->name('RFQSummary');
Route::match(['get', 'post'], '/RFQ-C-Print', [Printer::class, 'RFQ_C_Print'])->name('RFQ-C-Print');

Route::match(['get', 'post'], '/RFQVesselSummary', [Reports::class, 'RFQVesselSummary'])->name('RFQVesselSummary');
Route::match(['get', 'post'], '/RFQVesselSummarySearch', [Reports::class, 'RFQVesselSummarySearch'])->name('RFQVesselSummarySearch');
Route::match(['get', 'post'], '/RFQVesselSummaryP', [Reports::class, 'RFQVesselSummaryP'])->name('RFQVesselSummaryP');
Route::match(['get', 'post'], '/RFQVesselSummrayprint', [Printer::class, 'RFQVesselSummrayprint'])->name('RFQVesselSummrayprint');



//////////new
Route::match(['get', 'post'], '/Month-Wise-NetProfit-Report', [Reports::class, 'MonthWiseNetProfitReport'])->name('MonthWiseNetProfitReport');
Route::match(['get', 'post'], '/MonthWiseNetProfitReportShow', [Reports::class, 'MonthWiseNetProfitReportShow'])->name('MonthWiseNetProfitReportShow');
Route::match(['get', 'post'], '/Month-Wise-QuoteReport', [Reports::class, 'MonthWiseQuoteReport'])->name('MonthWiseQuoteReport');
Route::match(['get', 'post'], '/MonthWiseQuoteReportShow', [Reports::class, 'MonthWiseQuoteReportShow'])->name('MonthWiseQuoteReportShow');
Route::match(['get', 'post'], '/Month-Quote-Success-CustomerWise-Report', [Reports::class, 'MonthQuoteSuccessCustomerWiseReport'])->name('MonthQuoteSuccessCustomerWiseReport');
Route::match(['get', 'post'], '/MonthQuoteSuccessCustomerWiseReportShow', [Reports::class, 'MonthQuoteSuccessCustomerWiseReportShow'])->name('MonthQuoteSuccessCustomerWiseReportShow');
Route::match(['get', 'post'], '/Yearly-Quotation-Report', [Reports::class, 'YearlyQuotationReport'])->name('YearlyQuotationReport');
Route::match(['get', 'post'], '/YearlyQuotationReportShow', [Reports::class, 'YearlyQuotationReportShow'])->name('YearlyQuotationReportShow');
Route::match(['get', 'post'], '/Yearly-SaleReport', [Reports::class, 'YearlySaleReport'])->name('YearlySaleReport');
Route::match(['get', 'post'], '/YearlySaleReportShow', [Reports::class, 'YearlySaleReportShow'])->name('YearlySaleReportShow');
Route::match(['get', 'post'], '/Yearly-UserReport', [Reports::class, 'YearlyUserReport'])->name('YearlyUserReport');
Route::match(['get', 'post'], '/YearlyUserReportShow', [Reports::class, 'YearlyUserReportShow'])->name('YearlyUserReportShow');



Route::match(['get', 'post'], '/PO-Not-Received', [Reports::class, 'PO_NotReceived'])->name('PO_NotReceived');
Route::match(['get', 'post'], '/ReturnItemReport', [Reports::class, 'ReturnItemReport'])->name('ReturnItemReport');
Route::match(['get', 'post'], '/ReturnItemReportsearch', [Reports::class, 'ReturnItemReportsearch'])->name('ReturnItemReportsearch');
Route::match(['get', 'post'], '/Net-Profit-Report', [Reports::class, 'invNetProfitReport'])->name('invNetProfitReport');
Route::match(['get', 'post'], '/NetProfitReportsearch', [Reports::class, 'NetProfitReportsearch'])->name('NetProfitReportsearch');
Route::match(['get', 'post'], '/Daily-Quotation-Report', [Reports::class, 'DailyQuotationReport'])->name('DailyQuotationReport');
Route::match(['get', 'post'], '/AVI-Rebate-Report', [Reports::class, 'AVIRebateReport'])->name('AVIRebateReport');
Route::match(['get', 'post'], '/AviRebaterepShow', [Reports::class, 'AviRebaterepShow'])->name('AviRebaterepShow');
Route::match(['get', 'post'], '/Max-Purchase-Item-Report', [Reports::class, 'MaxPurchasedItemReport'])->name('MaxPurchasedItemReport');
Route::match(['get', 'post'], '/Purchase-Return-Report', [Reports::class, 'PurchaseReturnReport'])->name('PurchaseReturnReport');
Route::match(['get', 'post'], '/User-Performance', [Reports::class, 'UserPerformance'])->name('UserPerformance');
Route::match(['get', 'post'], '/UserPerformanceShow', [Reports::class, 'UserPerformanceShow'])->name('UserPerformanceShow');
Route::match(['get', 'post'], '/saveWithRS', [Reports::class, 'saveWithRS'])->name('saveWithRS');

Route::match(['get', 'post'], '/Daily-Quotation-Report-Report', [Printer::class, 'DailyQuotationReportprint'])->name('DailyQuotationReportprint');
//AVI-Rebate-Print
Route::match(['get', 'post'], '/AVI-Rebate-print', [Printer::class, 'AVIRebateprint'])->name('AVIRebateprint');
//UserPerformancePrint
Route::match(['get', 'post'], '/Purchase-Return-Print', [Printer::class, 'PurchaseReturnprint'])->name('PurchaseReturnprint');
//UserPerformancePrint
Route::match(['get', 'post'], '/User-Performance-Print', [Printer::class, 'UserPerformanceprint'])->name('UserPerformanceprint');
//UserPerformanceSummaryPrint
Route::match(['get', 'post'], '/User-Performance-Summary-Print', [Printer::class, 'UserPerformanceSummaryprint'])->name('UserPerformanceSummaryprint');

//AccountsBalancesheetReport
Route::match(['get', 'post'], '/Accounts-Balancesheet-Report', [Reports::class, 'AccountsBalancesheetReport'])->name('AccountsBalancesheetReport');
//Balancesheet-Comparison-Report
Route::match(['get', 'post'], '/Balancesheet-Comparison-Report', [Reports::class, 'BalancesheetComparisonReport'])->name('BalancesheetComparisonReport');
//OutstandingReportInvoiceWise
Route::match(['get', 'post'], '/Outstanding-Report-InvoiceWise', [Reports::class, 'OutstandingReportInvoiceWise'])->name('OutstandingReportInvoiceWise');
Route::match(['get', 'post'], '/OutstandingReportshow', [Reports::class, 'OutstandingReportshow'])->name('OutstandingReportshow');
//OutstandingReportInvoiceWise_Print
Route::match(['get', 'post'], '/Outstanding-Report-InvoiceWise-Print', [Printer::class, 'OutstandingReportInvoiceWisePrint'])->name('OutstandingReportInvoiceWisePrint');

Route::match(['get', 'post'], '/OutstandingReportpr', [Reports::class, 'OutstandingReportpr'])->name('OutstandingReportpr');



// Route::match(['get','post'],'/GetSettingData',[HomeController::class,'GetSettingData'])->name('GetSettingData');


//AccountsBalancesheetReport
Route::match(['get', 'post'], '/Accounts-Balancesheet-Report', [Reports::class, 'AccountsBalancesheetReport'])->name('AccountsBalancesheetReport');
//Balancesheet-Comparison-Report
Route::match(['get', 'post'], '/Balancesheet-Comparison-Report', [Reports::class, 'BalancesheetComparisonReport'])->name('BalancesheetComparisonReport');
//OutstandingReportInvoiceWise
Route::match(['get', 'post'], '/Outstanding-Report-InvoiceWise', [Reports::class, 'OutstandingReportInvoiceWise'])->name('OutstandingReportInvoiceWise');
//OutstandingReportInvoiceWise_Print
Route::match(['get', 'post'], '/Outstanding-Report-InvoiceWise-Print', [Printer::class, 'OutstandingReportInvoiceWisePrint'])->name('OutstandingReportInvoiceWisePrint');
//CardFollowUP
// Route::match(['get', 'post'], '/Card-FollowUP', [Activity::class, 'CardFollowUP'])->name('CardFollowUP');
//Profit/Loss Comparision Report
Route::match(['get', 'post'], '/profit-loss-comparision', [Reports::class, 'profit_loss_comparisionReport'])->name('profit_loss_comparisionReport');
//profit/loss 2 months comparision report
Route::match(['get', 'post'], '/profit-loss-2months-comparisionReport', [Reports::class, 'profit_loss_2months_comparisionReport'])->name('profit_loss_2months_comparisionReport');
//Aging Report
Route::match(['get', 'post'], '/Aging-Report', [Reports::class, 'AgingReport'])->name('AgingReport');
//OutstandingInvoiceAlert
Route::match(['get', 'post'], '/Outstanding-Invoice-Alert', [Reports::class, 'OutstandingInvoiceAlert'])->name('OutstandingInvoiceAlert');
//Vendor Outstanding Invoice Wise Report
Route::match(['get', 'post'], '/Vendor-Outstanding-InvoiceWise-Report', [Reports::class, 'VendorOutstandingInvoiceWiseReport'])->name('VendorOutstandingInvoiceWiseReport');
Route::match(['get', 'post'], '/Customer-Reports', [Reports::class, 'CustomerReports'])->name('CustomerReports');

/////////////////////Security/////////////////////
Route::match(['get', 'post'], '/webSettings', [SecurityController::class, 'webSettings'])->name('webSettings');
Route::match(['get', 'post'], '/settings/update', [SecurityController::class, 'Settingupdate'])->name('settings.update');
Route::match(['get', 'post'], '/User-Rights', [SecurityController::class, 'UserRights'])->name('UserRights');
Route::match(['get', 'post'], '/Get-Userrights', [SecurityController::class, 'GetUserrights'])->name('GetUserrights');
Route::match(['get', 'post'], '/GetUserlist', [SecurityController::class, 'GetUserlist'])->name('GetUserlist');
Route::match(['get', 'post'], '/update-Userrights', [SecurityController::class, 'updateUserrights'])->name('updateUserrights');
Route::match(['get', 'post'], '/User-Add-Delete', [SecurityController::class, 'UserAddDelete'])->name('UserAddDelete');
Route::match(['get', 'post'], '/UserDELETE', [SecurityController::class, 'UserDELETE'])->name('settings.UserDelete');
Route::match(['get', 'post'], '/UserAdd', [SecurityController::class, 'UserAdd'])->name('settings.UserADD');
Route::match(['get', 'post'], '/Getuid', [SecurityController::class, 'Getuid'])->name('settings.Getuid');

///////////////////////////////////////////////////////////




//BankReconcilationReport
Route::match(['get', 'post'], '/Bank_Reconcilation_Report', [Reports::class, 'BankReconcilationReport'])->name('BankReconcilationReport');
//Outstanding Report Invoice Wise Alert Print
Route::match(['get', 'post'], '/Outstanding_Report_InvoiceWise_Alert_Print', [Printer::class, 'OutstandingReportInvoiceWiseAlertPrint'])->name('OutstandingReportInvoiceWiseAlertPrint');
//profit_loss_comparision print
Route::match(['get', 'post'], '/profit_loss_comparisionprint', [Printer::class, 'profit_loss_comparisionprint'])->name('profit_loss_comparisionprint');
//profit_loss_2month_comparision print
Route::match(['get', 'post'], '/profit_loss_2month_comparisionprint', [Printer::class, 'profit_loss_2month_comparisionprint'])->name('profit_loss_2month_comparisionprint');
//Aging Print
Route::match(['get', 'post'], '/Aging-Print', [Printer::class, 'Agingprint'])->name('Agingprint');
//Balancesheet Comparision print
Route::match(['get', 'post'], '/Balancesheet-Comparision-Print', [Printer::class, 'BalancesheetComparisionprint'])->name('BalancesheetComparisionprint');
//AccountsBalancesheetprint
Route::match(['get', 'post'], '/Accounts_Balancesheet_print', [Printer::class, 'AccountsBalancesheetprint'])->name('AccountsBalancesheetprint');
//vendor Contract Provision
Route::match(['get', 'post'], '/Vendor-Contract-Provision', [VendorController::class, 'Vendor_Contract_Provision'])->name('Vendor_Contract_Provision');
Route::match(['get', 'post'], '/importVendorContract', [VendorController::class, 'importVendorContract'])->name('importVendorContract');
Route::match(['get', 'post'], '/GetNewComp', [VendorController::class, 'GetNewComp'])->name('GetNewComp');
Route::match(['get', 'post'], '/VendorContracSave', [VendorController::class, 'VendorContracSave'])->name('VendorContracSave');
Route::match(['get', 'post'], '/GetDataVenContract', [VendorController::class, 'GetDataVenContract'])->name('GetDataVenContract');
Route::match(['get', 'post'], '/venconitem', [SearchController::class, 'venconitem'])->name('venconitem');
Route::match(['get', 'post'], '/Contactfiller', [VendorController::class, 'Contactfiller'])->name('Contactfiller');
//Bank Reconciliation Print
Route::match(['get', 'post'], '/BankReconciliationPrint', [printer::class, 'BankReconciliationPrint'])->name('BankReconciliationPrint');

Route::match(['get', 'post'], '/VendorProductListprint', [printer::class, 'VendorProductListprint'])->name('VendorProductListprint');

// Route::get('country-state-city', [CountryStateCityController::class, 'index']);
Route::post('get-states-by-country', [CountryStateCityController::class, 'getState']);
Route::post('get-cities-by-state', [CountryStateCityController::class, 'getCity']);

//FixAccountSetup from Home controller
Route::match(['get', 'post'], '/Fix-Account-Setup', [HomeController::class, 'FixAccountSetup'])->name('FixAccountSetup');
Route::match(['get', 'post'], 'FixAccountSetupGet', [HomeController::class, 'FixAccountSetupGet'])->name('FixAccountSetupGet');
Route::match(['get', 'post'], 'FixAccountSetupupdate', [HomeController::class, 'FixAccountSetupupdate'])->name('FixAccountSetupupdate');
//state setup
Route::match(['get', 'post'], 'State-Setup', [HomeController::class, 'State_Setup'])->name('State_Setup');

//category Setup
Route::match(['get', 'post'], 'Category-Setup', [HomeController::class, 'Category_Setup'])->name('Category_Setup');
Route::match(['get', 'post'], 'CategorySave', [HomeController::class, 'CategorySave'])->name('CategorySave');
Route::match(['get', 'post'], 'CategoryDelete', [HomeController::class, 'CategoryDelete'])->name('CategoryDelete');

//VSn Status Setup
Route::match(['get', 'post'], 'Status-Setup', [HomeController::class, 'Status_Setup'])->name('Status_Setup');

//Priority_Setup
Route::match(['get', 'post'], 'Priority-Setup', [HomeController::class, 'Priority_Setup'])->name('Priority_Setup');

//Log Status
Route::match(['get', 'post'], 'Log-Setup', [HomeController::class, 'Log_Setup'])->name('Log_Setup');

//UOM_Setup
Route::match(['get', 'post'], 'UOM-Setup', [HomeController::class, 'UOM_Setup'])->name('UOM_Setup');
Route::match(['get', 'post'], 'UomSave', [HomeController::class, 'UomSave'])->name('UomSave');
Route::match(['get', 'post'], 'Uomdelete', [HomeController::class, 'Uomdelete'])->name('Uomdelete');

//Shipserv_Setup
Route::match(['get', 'post'], 'Shipserv-Setup', [HomeController::class, 'Shipserv_Setup'])->name('Shipserv_Setup');

//Shipvia_Setup
Route::match(['get', 'post'], 'Shipvia-Setup', [HomeController::class, 'Shipvia_Setup'])->name('Shipvia_Setup');
Route::match(['get', 'post'], 'indexload', [HomeController::class, 'indexload'])->name('indexload');

//Petty Cash Voucher
Route::match(['get', 'post'], '/Petty-Cash-Voucher', [Vouchers::class, 'PettyCashVoucher'])->name('PettyCashVoucher');

//Currency Setup
Route::match(['get', 'post'], '/Currency-Setup', [HomeController::class, 'Currency_Setup'])->name('Currency_Setup');
Route::match(['get', 'post'], 'CurrencySave', [HomeController::class, 'CurrencySave'])->name('CurrencySave');
Route::match(['get', 'post'], 'Currencydataget', [HomeController::class, 'Currencydataget'])->name('Currencydataget');
Route::match(['get', 'post'], 'currencyDelete', [HomeController::class, 'currencyDelete'])->name('currencyDelete');
Route::match(['get', 'post'], 'CurrencyDelete', [HomeController::class, 'CurrencyDelete'])->name('CurrencyDelete');

Route::match(['get', 'post'], '/Chat', [SecurityController::class, 'Chat'])->name('Chat');
Route::match(['get', 'post'], '/changecurrent', [SecurityController::class, 'changecurrent'])->name('changecurrent');

//Credit Note
Route::match(['get', 'post'], '/Credit-Note', [Vouchers::class, 'Credit_Note'])->name('Credit_Note');

//Vendor Credit Note
Route::match(['get', 'post'], '/Vendor-Credit-Note', [Vouchers::class, 'Vendor_Credit_Note'])->name('Vendor_Credit_Note');


//Customer Setup Income
Route::match(['get', 'post'], '/Customer-Setup-Income', [ChartOfAccount::class, 'Customer_Setup_Income'])->name('Customer_Setup_Income');


//Vendor Setup Income
Route::match(['get', 'post'], '/Vendor-Setup-Income', [ChartOfAccount::class, 'Vendor_Setup_Income'])->name('Vendor_Setup_Income');

//Expense Setup
Route::match(['get', 'post'], '/Expense-Setup', [ChartOfAccount::class, 'Expense_Setup'])->name('Expense_Setup');

//Fixed_Assets_Depreciation
Route::match(['get', 'post'], '/Fixed-Assets-Depreciation', [ChartOfAccount::class, 'Fixed_Assets_Depreciation'])->name('Fixed_Assets_Depreciation');

//Multi Account Ledger
Route::match(['get', 'post'], '/MultiAccount-Ledger', [ChartOfAccount::class, 'MultiAccountLedger'])->name('MultiAccountLedger');

//Bill Receipt Voucher
Route::match(['get', 'post'], '/Bill-Receipt-Voucher', [Vouchers::class, 'Bill_Receipt_Voucher'])->name('Bill_Receipt_Voucher');

// Customer_Receipt_History
Route::match(['get', 'post'], '/Customer-Receipt-History', [ChartOfAccount::class, 'Customer_Receipt_History'])->name('Customer_Receipt_History');

//Vouchers Bill Payment Voucher
Route::match(['get', 'post'], '/Bill-Payment-Voucher', [Vouchers::class, 'BillPaymentVoucher'])->name('BillPaymentVoucher');

//Yearly Expens Report
Route::match(['get', 'post'], '/Yearly-Expense-Report', [ChartOfAccount::class, 'YearlyExpenseReport'])->name('YearlyExpenseReport');

//Receipt Voucher Report
Route::match(['get', 'post'], '/Receipt-Voucher-Report', [Reports::class, 'ReceiptVoucherReport'])->name('ReceiptVoucherReport');
Route::match(['get', 'post'], '/ReceiptVoucherShow', [Reports::class, 'ReceiptVoucherShow'])->name('ReceiptVoucherShow');

//Vendor Payment Voucher Report
Route::match(['get', 'post'], '/Vendor-Payment-Voucher-Report', [Reports::class, 'VendorPaymentVoucherReport'])->name('VendorPaymentVoucherReport');

//Debit Note Report
Route::match(['get', 'post'], '/DebitNote-Report', [Reports::class, 'DebitNoteReport'])->name('DebitNoteReport');

//Credit Note Report
Route::match(['get', 'post'], '/CreditNote-Report', [Reports::class, 'CreditNoteReport'])->name('CreditNoteReport');

//Expense Report
Route::match(['get', 'post'], '/Expense-Report', [Reports::class, 'ExpenseReport'])->name('ExpenseReport');

//Outstanding Invoice Alert Report
Route::match(['get', 'post'], '/Outstanding-Invoice-Alert-Report', [Reports::class, 'OutstandingInvoiceAlertReport'])->name('OutstandingInvoiceAlertReport');

// AccAgingReport
Route::match(['get', 'post'], '/Accounts-Aging-Report', [Reports::class, 'AccAgingReport'])->name('AccAgingReport');
Route::match(['get', 'post'], '/AccAgingGen', [Reports::class, 'AccAgingGen'])->name('AccAgingGen');

// Vendor Bill Outstanding Report
Route::match(['get', 'post'], '/Vendor-Bill-Outstanding-Report', [Reports::class, 'VendorBillOutstandingReport'])->name('VendorBillOutstandingReport');

// Vendor Outstanding Report
Route::match(['get', 'post'], '/Vendor-Outstanding-Report', [Reports::class, 'VendorOutstandingReport'])->name('VendorOutstandingReport');

//Vendor Outstanding Invoice Wise Report
Route::match(['get', 'post'], '/Vendor-Outstanding-Report-Invoice-Wise', [Reports::class, 'AccVendorOutstandingInvoiceWiseReport'])->name('AccVendorOutstandingInvoiceWiseReport');

// Aging-Payable-Report
Route::match(['get', 'post'], '/Aging-Payable-Report', [Reports::class, 'AgingPayableReport'])->name('AgingPayableReport');
//save
Route::match(['get', 'post'], '/Aging-Payable-Report-Gen', [Reports::class, 'AgingPayableReportGen'])->name('AgingPayableReportGen');
Route::match(['get', 'post'], '/AgingReportPrint', [Printer::class, 'AgingReportPrint'])->name('AgingReportPrint');

// Accounts Customer Aging Invoice Wise Report
Route::match(['get', 'post'], '/Customer-Aging-Report-Invoicewise', [Reports::class, 'AccCustomerAgingInvoiceWiseReport'])->name('AccCustomerAgingInvoiceWiseReport');

// Bank Reconcilation Report
Route::match(['get', 'post'], '/Bank-Reconcilation-Report', [Reports::class, 'AccBankReconcilationReport'])->name('AccBankReconcilationReport');

// Vendor Reconcilation Report
Route::match(['get', 'post'], '/Vendor-Reconcilation-Report', [Reports::class, 'AccVendorReconcilationReport'])->name('AccVendorReconcilationReport');


//Customer Reconcilation Report
Route::match(['get', 'post'], '/Customer-Reconcilation-Report', [Reports::class, 'AccCustomerReconcilationReport'])->name('AccCustomerReconcilationReport');

//Aging Payable Invoice Wise Report
Route::match(['get', 'post'], '/Aging-Payable-InvoiceWise-Report', [Reports::class, 'AccAgingPayableInvoiceWiseReport'])->name('AccAgingPayableInvoiceWiseReport');

// Customer Outstanding Report
Route::match(['get', 'post'], '/Customer-Outstanding-Report', [Reports::class, 'CustomerOutstandingReport'])->name('CustomerOutstandingReport');

// Outstanding InvoiceWise Report
Route::match(['get', 'post'], '/Outstanding-Report-InvoiceWise', [Reports::class, 'AccOutstandingInvoiceWiseReport'])->name('AccOutstandingInvoiceWiseReport');


//NotDeliveredFillReport
Route::match(['get', 'post'], '/Not-Delivered-Fill-Report', [Order::class, 'NotDeliveredFillReport'])->name('NotDeliveredFillReport');

//Cr-Note-With-Item
// Route::match(['get', 'post'], '/Not-Delivered-Fill-Report', [Order::class, 'NotDeliveredFillReport'])->name('NotDeliveredFillReport');

//Cancelled Charge
// Route::match(['get', 'post'], '/Not-Delivered-Fill-Report', [Order::class, 'NotDeliveredFillReport'])->name('NotDeliveredFillReport');

//Order Formm
// Route::match(['get', 'post'], 'Order-form', [Order::class, 'index'])->name('order');

//Pull Stock
Route::match(['get', 'post'], '/Pullstock', [Order::class, 'Pullstock'])->name('Pullstock');

//Order Transfer And Copy
Route::match(['get', 'post'], '/ordertransfer', [Order::class, 'ordertransfer'])->name('ordertransfer');

//Stock Gate Pass
Route::match(['get', 'post'], '/Stock-Gate-Pass', [Order::class, 'StockGatePass'])->name('StockGatePass');

//Delete Charge
Route::match(['get', 'post'], '/Not-Delivered-Fill-Report', [Order::class, 'NotDeliveredFillReport'])->name('NotDeliveredFillReport');


///// ProvisionGetQuote///
// Route::match(['get', 'post'], '/Provision', [Quotes::class, 'welcome']);
Route::match(['get', 'post'], '/get-products', [Quotes::class, 'getProducts']);
Route::match(['get', 'post'], '/add-to-cart', [Quotes::class, 'addtocart']);
Route::match(['get', 'post'], '/ProvisionGetQuoteSave', [Quotes::class, 'ProvisionGetQuoteSave'])->name('ProvisionGetQuoteSave');
Route::match(['get', 'post'], '/ProvisionSubscription', [Quotes::class, 'ProvisionSubscription'])->name('ProvisionSubscription');

Route::match(['get', 'post'], '/ChatApp', [SecurityController::class, 'ChatApp'])->name('ChatApp');
Route::post('/send-message', [SecurityController::class, 'sendMessage']);


///// ShipServ///
Route::match(['get', 'post'], '/ShipServ', [ShipServController::class, 'index'])->name('ShipServ');
Route::match(['get', 'post'], '/getShipserve', [ShipServController::class, 'getShipserve'])->name('getShipserve');
});
