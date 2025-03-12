<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\PDF;
use App\Mail\SendPdfEmail;
use Illuminate\Http\Request;
use App\Models\ReceiptVoucher;
use App\Models\OrderMasterModel;
use App\Models\CurrencyModel;
use App\Models\FixAccountSetup;
use App\Models\JournalVoucher;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class Vouchers extends Controller
{
    public function ReceiptVoucher()
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $vouchers = ReceiptVoucher::select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // dd($FixAccountSetup->ActCashCode);
        // $ReceiptVoucher = ReceiptVoucher::where('BranchCode', $BranchCode)->orderBy('Currency')->get();

        return view('Accounts.Vouchers.ReceiptVoucher', [
            'vouchers' => $vouchers,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,

        ]);

    }

    public function AddNewJournalvouchers(Request $request)
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $MVoucherNo = JournalVoucher::where('BranchCode', $BranchCode)->max('VoucherNo');
        info($MVoucherNo);
        if ($MVoucherNo == !null) {
            $TxtVoucherNo = $MVoucherNo + 1;
        } else {
            $TxtVoucherNo = 1;
        }
        $Insertion = JournalVoucher::insert(
            ['BranchCode' => $BranchCode, 'VoucherNo' => $TxtVoucherNo]
        );
        if ($Insertion) {
            $message = 'Inserted';
        } else {

            $message = 'Not-Inserted';
        }

        return response()->json([
            'MVoucherNo' => $TxtVoucherNo,
            'message' => $message,


        ]);
    }
    public function AddNewReceiptVouchers(Request $request)
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $MVoucherNo = ReceiptVoucher::max('VoucherNo')->where('BranchCode', $BranchCode);
        info($MVoucherNo);
        if ($MVoucherNo == !null) {
            $TxtVoucherNo = $MVoucherNo + 1;
        } else {
            $TxtVoucherNo = 1;
        }
        $Insertion = ReceiptVoucher::insert(
            ['BranchCode' => $BranchCode, 'VoucherNo' => $TxtVoucherNo]
        );
        if ($Insertion) {
            $message = 'Inserted';
        } else {

            $message = 'Not-Inserted';
        }

        return response()->json([
            'MVoucherNo' => $TxtVoucherNo,
            'message' => $message,


        ]);
    }
    public function OrderMasterstep(Request $request)
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $rvno = $request->input('rvno');
        $results = OrderMasterModel::where('RVNo', 'like', '%' . $rvno . '%')
            ->where('BranchCode', $BranchCode)
            ->get();
        if ($results->count() > 0) {
            try {
                foreach ($results as $result) {
                    OrderMasterModel::where('id', $result->id)
                        ->update([
                            'ReceivedAmt' => 0,
                            'ChqNo' => '',
                            'RVNo' => '',
                            'RVDate' => null
                        ]);
                }
                $message = 'saved';
            } catch (\Throwable $th) {
                $message = $th;

            }

            return response()->json([
                // 'MVoucherNo'=>$TxtVoucherNo,
                'message' => $message,


            ]);
        }



    }

    public function Steptwo(Request $request)
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $mWorkUser = Auth::user()->UserName;
        $txtVoucherNo = $request->input('txtVoucherNo');
        $txtVoucherDate = $request->input('txtVoucherDate');
        $txtTotAmount = $request->input('txtTotAmount');
        $txtActCashCode = $request->input('txtActCashCode');
        $txtActCashName = $request->input('txtActCashName');
        $txtBankDescription = $request->input('txtBankDescription');
        $cmbPayType = $request->input('cmbPayType');
        $radCashVouter = $request->input('radCashVouter');
        $datatable = $request->input('data');

        // $receiptVoucher = DB::delete("Delete from ReceiptVoucher where VoucherNo = ? and BranchCode = ?", [$txtVoucherNo, $BranchCode]);
        info($datatable);
        $mOrderNo123 = 0;
        $mRecAmount = 0;
        $mChqNo = "";
        $n = 0;
        $mActCode11 = "";

        foreach ($datatable as $a => $row) {
            $mItemName = $row["ActCode"];
            if (trim($mItemName) != "") {
                $receiptVoucher = ReceiptVoucher::where("VoucherNo", $txtVoucherNo)->where("BranchCode", $BranchCode)->first();
                $infoString = "Receipt Voucher Details: " . json_encode($receiptVoucher);
                info($infoString);
                // info($receiptVoucher);
//             ReceiptVoucher::updateOrInsert([
// 'VoucherNo' => $txtVoucherNo,
// 'VoucherDate' => $txtVoucherDate,
// 'TotAmount' => $txtTotAmount,
// 'ActCashCode' => $txtActCashCode,
// 'CashName' => $txtActCashName,
// 'BankDes' => $txtBankDescription,
// 'PayType' => $cmbPayType,
// 'TransType' => $radCashVouter,
// 'ActCode' => $row->ActCode,
// 'AcName3' => $row->AccountName,
// 'InvRecAmt' => $row->InvAmount,
// 'BankCharges' => $row->BankCharges,
// 'Amount' => $row->Amount,
// 'Currency' => $row->Currency,
// 'ChequeNo' => $row->ChqNo,
// 'ChequeDate' => $row->ChqDate,
// 'Des' => $row->Description,
// 'ClientOrderNo' => $row->ClientOrderNo,
// 'RefNo' => $row->RefNo,
// 'VesselName' => $row->VesselName,
// 'BranchCode' => $BranchCode,
// 'WorkUser' => $mWorkUser
// ]);
            }
        }
        $message = 'working on it';

        return response()->json([
            // 'MVoucherNo'=>$TxtVoucherNo,
            'message' => $message,


        ]);
    }


    public function searchReceiptVouchers(Request $request)
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $voucherNo = $request->input('voucherNo');
        $pono = $request->input('pono');
        //    $branchCode = $request->input('branchCode');

        //    $resultsmast = DB::table('ReceiptVoucher')
//       ->where('VoucherNo', $voucherNo)
//       ->where('BranchCode', $BranchCode)
//       ->orderBy('ID', 'asc')
//       ->first();
//       if($resultsmast){

        //       }
        if ($voucherNo > 0 || $voucherNo == !null) {
            // info('search');
            $results = ReceiptVoucher::where('VoucherNo', $voucherNo)
                ->where('BranchCode', $BranchCode)
                ->orderBy('ID', 'asc')
                ->get();
            if ($results) {
                $pono = $results[0]->ClientOrderNo;
            }
            $firstVoucherNo = ReceiptVoucher::orderBy('VoucherNo', 'asc')->first()->VoucherNo;
            $lastVoucherNo = ReceiptVoucher::orderBy('VoucherNo', 'desc')->first()->VoucherNo;
            $OrderMaster = OrderMasterModel::where('PONO', $pono)->where('BranchCode', $BranchCode)->first();
            if (!$OrderMaster) {
                info('OrderMaster data is empty');
            }
            //   $MRecAmount = ReceiptVoucher::sum('Amount')->where('VoucherNo','<>',$voucherNo)->where('ClientOrderNo',$pono)->where('BranchCode',$BranchCode)->first();
            $MRecAmounts = ReceiptVoucher::select(DB::raw("Sum(Amount) as MRecAmount"))
                ->where('VoucherNo', '<>', $voucherNo)
                ->where('ClientOrderNo', $pono)
                ->where('BranchCode', $BranchCode)
                ->get();
            $MCrAmt = DB::table('creditnote')->select(DB::raw("Sum(CrNoteAmt) as MCrAmt"))
                ->where('ActCode', $OrderMaster->CustomerActCode)
                ->where('ClientOrderNo', $pono)
                ->where('BranchCode', $BranchCode)
                ->get();

            $MCrAmts = $MCrAmt[0]->MCrAmt;
            $MRecAmount = $MRecAmounts[0]->MRecAmount;
            if ($MRecAmount == !null) {
                $MRecAmount = $MRecAmount;
            } else {
                $MRecAmount = '';
            }
            if ($MCrAmts == !null) {
                $MCreditNoteAmt = $MCrAmts;
            } else {
                $MCreditNoteAmt = '';
            }
            $MCrNoteSAleAmt = $OrderMaster->CrNoteAmount;
            $TxtCreditNoteAmt = (float) ($MCrNoteSAleAmt) + (float) $MCreditNoteAmt;

        } else {
            // info('nopre');
            $results = null;
            $firstVoucherNo = ReceiptVoucher::orderBy('VoucherNo', 'asc')->first()->VoucherNo;
            $lastVoucherNo = ReceiptVoucher::orderBy('VoucherNo', 'desc')->first()->VoucherNo;
            $OrderMaster = null;
            $MRecAmount = 0;
            $TxtCreditNoteAmt = 0;
        }


        //   info($TxtCreditNoteAmt);
        //   info($MCreditNoteAmt);
//    return response()->json($results);
        return response()->json([
            'results' => $results,
            'firstVoucherNo' => $firstVoucherNo,
            'lastVoucherNo' => $lastVoucherNo,
            'OrderMaster' => $OrderMaster,
            'MRecAmount' => $MRecAmount,
            'TxtCreditNoteAmt' => $TxtCreditNoteAmt,


        ]);

    }
    public function searchvendorVouchers(Request $request)
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $voucherNo = $request->input('voucherNo');
        $pono = $request->input('pono');
        //    $branchCode = $request->input('branchCode');

        //    $resultsmast = DB::table('ReceiptVoucher')
//       ->where('VoucherNo', $voucherNo)
//       ->where('BranchCode', $BranchCode)
//       ->orderBy('ID', 'asc')
//       ->first();
//       if($resultsmast){

        //       }
        $firstVoucherNo = DB::table('qrypaymentvoucher')->orderBy('VoucherNo', 'asc')->first()->VoucherNo;
        $lastVoucherNo = DB::table('qrypaymentvoucher')->orderBy('VoucherNo', 'desc')->first()->VoucherNo;
        // if($voucherNo > 0 || $voucherNo == !null){
// info('search');
        $results = DB::table('qrypaymentvoucher')
            ->where('VoucherNo', $voucherNo)
            ->where('BranchCode', $BranchCode)
            ->orderBy('ID', 'asc')
            ->get();

        //   if($results){
        //     $pono = $results[0]->ClientOrderNo;
        //   }


        //   $OrderMaster = OrderMasterModel::where('PONO',$pono)->where('BranchCode',$BranchCode)->first();
// if(!$OrderMaster){
//     info('OrderMaster data is empty');
// }
        //   $MRecAmount = ReceiptVoucher::sum('Amount')->where('VoucherNo','<>',$voucherNo)->where('ClientOrderNo',$pono)->where('BranchCode',$BranchCode)->first();
        //   $MRecAmounts = ReceiptVoucher::select(DB::raw("Sum(Amount) as MRecAmount"))
        //   ->where('VoucherNo','<>',$voucherNo)
        //   ->where('ClientOrderNo',$pono)
        //   ->where('BranchCode',$BranchCode)
        //   ->get();
        //   $MCrAmt = DB::table('CreditNote')->select(DB::raw("Sum(CrNoteAmt) as MCrAmt"))
        //   ->where('ActCode',$OrderMaster->CustomerActCode)
        //   ->where('ClientOrderNo',$pono)
        //   ->where('BranchCode',$BranchCode)
        //   ->get();

        //   $MCrAmts = $MCrAmt[0]->MCrAmt;
        //   $MRecAmount = $MRecAmounts[0]->MRecAmount;
        //   if ($MRecAmount == !null) {
        //     $MRecAmount = $MRecAmount;
        //   } else {
        //     $MRecAmount = '';
        //   }
        //   if ($MCrAmts == !null) {
        //     $MCreditNoteAmt = $MCrAmts;
        //   } else {
        //     $MCreditNoteAmt = '';
        //   }
        //   $MCrNoteSAleAmt = $OrderMaster->CrNoteAmount;
        //   $TxtCreditNoteAmt = (float)($MCrNoteSAleAmt)+(float)$MCreditNoteAmt;

        // }else{
        // info('nopre');
//     $results = null;
//     $firstVoucherNo = ReceiptVoucher::orderBy('VoucherNo', 'asc')->first()->VoucherNo;
//     $lastVoucherNo = ReceiptVoucher::orderBy('VoucherNo', 'desc')->first()->VoucherNo;
//     $OrderMaster = null;
//     $MRecAmount= 0;
//     $TxtCreditNoteAmt= 0;
// }
        info($results);

        //   info($TxtCreditNoteAmt);
        //   info($MCreditNoteAmt);
//    return response()->json($results);
        return response()->json([
            'results' => $results,
            'firstVoucherNo' => $firstVoucherNo,
            'lastVoucherNo' => $lastVoucherNo,
            // 'OrderMaster' =>$OrderMaster,
            // 'MRecAmount' =>$MRecAmount,
            // 'TxtCreditNoteAmt' =>$TxtCreditNoteAmt,


        ]);

    }
    public function searchExpenseVouchers(Request $request)
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $voucherNo = $request->input('voucherNo');
        $pono = $request->input('pono');
        $firstVoucherNo = DB::table('qryexpensepaymentvoucher')->orderBy('VoucherNo', 'asc')->first()->VoucherNo;
        $lastVoucherNo = DB::table('qryexpensepaymentvoucher')->orderBy('VoucherNo', 'desc')->first()->VoucherNo;
        $results = DB::table('qryexpensepaymentvoucher')
            ->where('VoucherNo', $voucherNo)
            ->where('BranchCode', $BranchCode)
            ->orderBy('VoucherNo', 'asc')
            ->get();


        info($results);

        return response()->json([
            'results' => $results,
            'firstVoucherNo' => $firstVoucherNo,
            'lastVoucherNo' => $lastVoucherNo,

        ]);

    }


    public function VendorVoucher()
    {

        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $vouchers = DB::table('paymentvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // dd($FixAccountSetup->ActCashCode);
        // $ReceiptVoucher = ReceiptVoucher::where('BranchCode', $BranchCode)->orderBy('Currency')->get();

        return view('Accounts.Vouchers.VendorVoucher', [
            'vouchers' => $vouchers,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,

        ]);
    }
    public function ExpensePaymentVoucher()
    {
        // $message='';
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $vouchers = DB::table('expensepaymentvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // dd($FixAccountSetup->ActCashCode);
        // $ReceiptVoucher = ReceiptVoucher::where('BranchCode', $BranchCode)->orderBy('Currency')->get();

        return view('Accounts.Vouchers.ExpensePaymentVoucher', [
            'vouchers' => $vouchers,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            // 'message' => $message,

        ]);
    }
    public function sendemail(Request $request)
    {
        $pdf_file = $request->file('pdf_file');

        // Store the uploaded PDF file in the "public" disk
        $path = Storage::disk('public')->put('pdf', $pdf_file);

        // Send the email with the PDF attachment
        Mail::send('emails.pdf_attachment', ['pdf_path' => $path], function ($message) use ($path) {
            $message->to('naeemulhaq06@gmail.com')
                ->subject('Expenese Email PDF Attachment')
                ->attach(Storage::disk('public')->path($path));
        });


        return back();
    }
    public function showPDF()
    {
        $pathToFile = public_path('pdfs/sample.pdf');
        return response()->file($pathToFile);
    }
    public function storePDF(Request $request)
    {
        $pathToFile = $request->file('pdf_file')->store('pdfs');
        return response()->file(storage_path('app/' . $pathToFile));
    }
    // public function sendemail(Request $request){
//     $pdf_path = $request->input('pdf_path');

    //     // Send the email with the PDF attachment
//     Mail::send('emails.pdf_attachment', ['pdf_path' => $pdf_path], function ($message) use ($pdf_path) {
//         $message->to('naeemulhaq06@gmail.com')
//           ->subject('Expenese Email PDF Attachment')
//           ->attach(storage_path('app/public/' . $pdf_path));
//       });

    //     return back();
// }

    public function uploadPdf(Request $request)
    {
        $validated = $request->validate([
            'pdf-file' => 'required|mimes:pdf|max:2048'
        ]);

        $pdfFile = $request->file('pdf-file');
        $tempFilePath = $pdfFile->store('temp');

        $pdf = FacadePdf::loadView('pdf.preview', ['pdfFile' => $tempFilePath]);

        Mail::to($request->input('email'))
            ->send(new SendPdfEmail($pdf));
    }

    public function PettyCashVoucher()
    {
        //     $message='';
//  $PVendorcode= 756;
        $BranchCode = Auth::user()->BranchCode;
        $vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // dd($FixAccountSetup->ActCashCode);
        // $ReceiptVoucher = ReceiptVoucher::where('BranchCode', $BranchCode)->orderBy('Currency')->get();

        return view('Accounts.Vouchers.PettyCashVoucher', [
            'vouchers' => $vouchers,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            // 'message' => $message,

        ]);
    }



    public function Credit_Note()
    {
        //     $message='';
//  $PVendorcode= 756;
        $BranchCode = Auth::user()->BranchCode;
        $vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // dd($FixAccountSetup->ActCashCode);
// $ReceiptVoucher = ReceiptVoucher::where('BranchCode', $BranchCode)->orderBy('Currency')->get();


        return view('Accounts.Vouchers.Credit_Note', [
            'vouchers' => $vouchers,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            // 'message' => $message,

        ]);
    }


    public function Vendor_Credit_Note()
    {
        //     $message='';
//  $PVendorcode= 756;
        $BranchCode = Auth::user()->BranchCode;
        $vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // dd($FixAccountSetup->ActCashCode);
// $ReceiptVoucher = ReceiptVoucher::where('BranchCode', $BranchCode)->orderBy('Currency')->get();


        return view('Accounts.Vouchers.Vendor_Credit_Note', [
            'vouchers' => $vouchers,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            // 'message' => $message,

        ]);
    }

    public function Bill_Receipt_Voucher()
    {
        //     $message='';
//  $PVendorcode= 756;
        $BranchCode = Auth::user()->BranchCode;
        $vouchers = DB::table('pettycashvoucher')->select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // dd($FixAccountSetup->ActCashCode);
// $ReceiptVoucher = ReceiptVoucher::where('BranchCode', $BranchCode)->orderBy('Currency')->get();


        return view('Accounts.Vouchers.Bill_Receipt_Voucher', [
            'vouchers' => $vouchers,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,
            // 'message' => $message,


        ]);
    }

    public function BillPaymentVoucher()
    {
        $PVendorcode = 756;
        $BranchCode = Auth::user()->BranchCode;
        $vouchers = ReceiptVoucher::select('VoucherNo')->distinct()->where('BranchCode', $BranchCode)->orderBy('VoucherNo')->get();
        $Currency = CurrencyModel::select('Currency')->where('BranchCode', $BranchCode)->orderBy('Currency')->get();
        $FixAccountSetup = FixAccountSetup::where('BranchCode', $BranchCode)->first();
        // dd($FixAccountSetup->ActCashCode);
        // $ReceiptVoucher = ReceiptVoucher::where('BranchCode', $BranchCode)->orderBy('Currency')->get();

        return view('Accounts.Vouchers.BillPaymentVoucher', [
            'vouchers' => $vouchers,
            'Currency' => $Currency,
            'FixAccountSetup' => $FixAccountSetup,

        ]);

    }




}
