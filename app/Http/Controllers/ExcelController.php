<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Support\Facades\DB;
use App\Models\ItemSetupNew;
 use Illuminate\Database\QueryException;
use App\Models\QuoteDetails;
use Illuminate\Http\Request;
use App\Models\VenderProductList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExcelController extends Controller
{
   
//     public function importExcel(Request $request)
//     {
//         $file = $request->file('excel_file');
//         $startRow = $request->input('start_row'); // Starting row fixed at 7
//         $startColumn = $request->input('start_column');
//         $itemCodeColumn = $request->input('itemCodeColumn');
//         $itemNameColumn = $request->input('itemNameColumn');
//         $uomColumn = $request->input('uomColumn');
//         $vendorPriceColumn = $request->input('vendorPriceColumn');


//         $filePath = $file->getPathname();

//         $spreadsheet = IOFactory::load($filePath);
//         $sheet = $spreadsheet->getActiveSheet();

//         $data = [];
//         for ($row = $startRow; $row <= $sheet->getHighestRow(); $row++) {
//             $rowData = [];
//             $itemCode = $sheet->getCellByColumnAndRow($itemCodeColumn, $row)->getValue();
//             $itemName = $sheet->getCellByColumnAndRow($itemNameColumn, $row)->getValue();
//             $uom = $sheet->getCellByColumnAndRow($uomColumn, $row)->getValue();
//             $vendorPrice = $sheet->getCellByColumnAndRow($vendorPriceColumn, $row)->getValue();

//             $rowData['item_code'] = $itemCode;
//             $rowData['item_name'] = $itemName;
//             $rowData['uom'] = $uom;
//             $rowData['vendor_price'] = $vendorPrice;

//             $data[] = $rowData;
//         }
// info($data);
//         return response()->json($data);
//     }
public function importExcel(Request $request){
    $file = $request->file('excel_file');

            $startRow = $request->input('start_row'); // Starting row fixed at 7
            $startColumn = $request->input('start_column');
            $endRow = $request->input('end_Row');
            $Impacolumn = $request->input('Impacolumn');
            $itemCodeColumn = $request->input('itemCodeColumn');
            $itemNameColumn = $request->input('itemNameColumn');
            $uomColumn = $request->input('uomColumn');
            $vendorPriceColumn = $request->input('vendorPriceColumn');

            $Impacolumn = $Impacolumn ? $Impacolumn : 'z';

    $filePath = $file->getPathname();

    $spreadsheet = IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();

    $data = [];
    for ($row = $startRow; $row <= $endRow; $row++) {
        $rowData = [];
        $itemCode = $sheet->getCellByColumnAndRow(
            Coordinate::columnIndexFromString($itemCodeColumn),
            $row
        )->getValue();
        $itemName = $sheet->getCellByColumnAndRow(
            Coordinate::columnIndexFromString($itemNameColumn),
            $row
        )->getValue();
        $uom = $sheet->getCellByColumnAndRow(
            Coordinate::columnIndexFromString($uomColumn),
            $row
        )->getValue();
        $vendorPrice = $sheet->getCellByColumnAndRow(
            Coordinate::columnIndexFromString($vendorPriceColumn),
            $row
        )->getValue();
        $Impa = $sheet->getCellByColumnAndRow(
            Coordinate::columnIndexFromString($Impacolumn),
            $row
        )->getValue();

        $searchItem = null;
        $highestSimilarityPercentage = 0;
        $itemNameArray = [];
        if(strlen($Impa) > 1){
            $impaitems = ItemSetupNew::where('IMPACode',$Impa)->first();
            $impaven = VenderProductList::where('IMPAItemCode',$Impa)->first();
            if($impaitems){

            similar_text($itemName, $impaitems->ItemName, $similarityPercentage);

            if ($similarityPercentage > $highestSimilarityPercentage) {
                $highestSimilarityPercentage = $similarityPercentage;
                $searchItem = $impaitems;
            }
            }else if($impaven){

            similar_text($itemName, $impaven->ItemName, $similarityPercentage);

            if ($similarityPercentage > $highestSimilarityPercentage) {
                $highestSimilarityPercentage = $similarityPercentage;
                $searchItem = $impaven;
            }
        }
        $itemNameArray[] = [
            'ItemCode'=> $searchItem->ItemCode,
            'ItemName'=> $searchItem->ItemName,
            'UOM'=> $searchItem->UOM,
            'Percentage'=> $similarityPercentage,
            'SaleRate'=> $searchItem->SaleRate ? $searchItem->SaleRate : $searchItem->LastRate ,

         ];
        }
        else{

            info('not');
            $searchItemWords = explode(' ', $itemName);

            foreach ($searchItemWords as $word) {
                $items = ItemSetupNew::where('ItemName', 'like', '%' . $word . '%')->get();

                if ($items->isEmpty()) {
                    $items = VenderProductList::where('ItemName', 'like', '%' . $word . '%')->limit(10)->get();
                }

                foreach ($items as $item) {
                    similar_text($itemName, $item->ItemName, $similarityPercentage);

                    if ($similarityPercentage > $highestSimilarityPercentage) {
                        $highestSimilarityPercentage = $similarityPercentage;
                        $searchItem = $item;
                    }

                    $itemNameArray[] = [
                        'ItemCode'    => $item->ItemCode,
                        'ItemName'    => $item->ItemName,
                        'UOM'         => $item->UOM,
                        'Percentage'  => $similarityPercentage,
                        'SaleRate'    => $item->SaleRate ? $item->SaleRate : $item->LastRate,
                    ];

                    // Sort the array in descending order based on 'Percentage' as you iterate
                    usort($itemNameArray, function ($a, $b) {
                        return $b['Percentage'] <=> $a['Percentage'];
                    });

                    // Optionally limit the array to a certain number of items
                    $itemNameArray = array_slice($itemNameArray, 0, 10);
                }
            }

        }

            if ($searchItem) {
                info( 'Most Similar Item: ' . $searchItem->ItemName . ' (Similarity Percentage: ' . $highestSimilarityPercentage . '%)');
            } else {
                info( 'No matching item found.');
            }
                // info($searchItem);



                if ($searchItem){
                    $rowData['ItemCodeget'] = $searchItem->ItemCode;
                    $rowData['ItemNameget'] = $itemNameArray;
                    $rowData['UOMget'] = $searchItem->UOM;
                    $rowData['Priceget'] = $searchItem->SaleRate ? $searchItem->SaleRate : $searchItem->LastRate;
                }else{

                    $rowData['ItemCodeget'] = '';
                    $rowData['ItemNameget'] = '';
                    $rowData['UOMget'] = '';
                    $rowData['Priceget'] = '';
                }



        $rowData['ItemCode'] = $itemCode;
        $rowData['percentage'] = $highestSimilarityPercentage;
        $rowData['ItemName'] = $itemName;
        $rowData['UOM'] = $uom;
        $rowData['Price'] = $vendorPrice;

        $data[] = $rowData;
    }

    return response()->json($data);
}















public function importQuataionShow(Request $request)
{
    try {
        $file = $request->file('excel_file');
        if (!$file) {
            return response()->json(['error' => 'Excel file not found'], 400);
        }

        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();

        $rowData = [];
        foreach ($sheet->toArray() as $row) {
            $rowData[] = $row;
        }

        return response()->json(['rowData' => $rowData]);
    } catch (\Throwable $e) {
        \Log::error('Import Error: '.$e->getMessage());
        return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
    }
}









public function importQuataion(Request $request)
{
    if (!$request->hasFile('excel_file')) {
        return response()->json(['status' => 'error', 'message' => 'No file uploaded.'], 400);
    }

    try {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($request->file('excel_file')->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Failed to read Excel file.'], 500);
    }

    $startRow = (int) $request->input('start_row', 2); // Default to 2 (skip header)

    $data = [];

    foreach ($rows as $index => $row) {
        if ($index < $startRow) continue; // Skip rows before start_row

        $data[] = [
            'ItemCode' => $row['A'] ?? '',
            'ItemName' => $row['B'] ?? '',
            'ItemNameVendor' => $row['C'] ?? '',
            'UOM' => $row['D'] ?? '',
            'IMPAItemCode' => $row['E'] ?? '',
            'VendorPrice' => is_numeric($row['F'] ?? null) ? $row['F'] : 0,
            'LastDate' => '',
            'WorkUser' => '',
            'VPartCode' => '',
            'Remarks' => $row['G'] ?? '',
        ];
    }

    return response()->json(['status' => 'success', 'data' => $data]);
}



// public function importQuataion(Request $request)
// {
//     if (!$request->hasFile('excel_file')) {
//         return response()->json(['status' => 'error', 'message' => 'No file uploaded.'], 400);
//     }

//     try {
//         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($request->file('excel_file')->getPathname());
//         $sheet = $spreadsheet->getActiveSheet();
//         $rows = $sheet->toArray(null, true, true, true);
//     } catch (\Exception $e) {
//         return response()->json(['status' => 'error', 'message' => 'Failed to read Excel file.'], 500);
//     }

//     $data = [];

//     foreach ($rows as $index => $row) {
//         if ($index === 1) continue; // Skip header

//         $data[] = [
//             'ItemCode' => $row['A'] ?? '',
//             'ItemName' => $row['B'] ?? '',
//             'ItemNameVendor' => $row['C'] ?? '',
//             'UOM' => $row['D'] ?? '',
//             'IMPAItemCode' => $row['E'] ?? '',
//             'VendorPrice' => is_numeric($row['F'] ?? null) ? $row['F'] : 0,
//             'LastDate' => '',
//             'WorkUser' => '',
//             'VPartCode' => '',
//             'Remarks' => $row['G'] ?? '',
//         ];
//     }

//     return response()->json(['status' => 'success', 'data' => $data]);
// }




// public function importQuataion(Request $request)
// {
//     if (!$request->hasFile('excel_file')) {
//         return response()->json(['status' => 'error', 'message' => 'No file uploaded.'], 400);
//     }

//     $file = $request->file('excel_file');

//     try {
//         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());
//     } catch (\Exception $e) {
//         return response()->json(['status' => 'error', 'message' => 'Failed to read Excel file.'], 500);
//     }

//     $sheet = $spreadsheet->getActiveSheet();
//     $rows = $sheet->toArray(null, true, true, true);

//     $data = [];
//     foreach ($rows as $index => $row) {
//         if ($index === 1) continue; // Skip header

//         $itemCode = $row['A'] ?? null;
//         $itemName = $row['B'] ?? null;
//         $vendorName = $row['C'] ?? null;
//         $uom = $row['D'] ?? null;
//         $impaCode = $row['E'] ?? null;
//         $vendorPrice = $row['F'] ?? 0;
//         $remarks = $row['G'] ?? null;

//         if (empty($itemCode) && empty($itemName)) {
//             continue;
//         }

//         // Validate prices
//         if (!is_numeric($vendorPrice)) {
//             \Log::warning("Non-numeric price at row $index", ['vendorPrice' => $vendorPrice]);
//             $vendorPrice = 0;
//         }

//         $ourPrice = $vendorPrice;

//         $vProduct = new VenderProductList();
//         $vProduct->ItemCode = $itemCode;
//         $vProduct->IMPAItemCode = $impaCode;
//         $vProduct->ItemName = $itemName;
//         $vProduct->UOM = $uom;
//         $vProduct->VendorPrice = $vendorPrice;
//         $vProduct->OurPrice = $ourPrice;
//         $vProduct->Rate = $ourPrice;
//         $vProduct->LastRate = $vendorPrice;
//         $vProduct->GP = ($ourPrice != 0) ? (($ourPrice - $vendorPrice) / $ourPrice) * 100 : 0;
//         $vProduct->VenderCode = null;
//         $vProduct->VenderName = $vendorName;
//         $vProduct->VendorCodeItem = null;
//         $vProduct->VendorNameItem = $vendorName;
//         $vProduct->VPartCode = null;
//         $vProduct->StockQty = 0;
//         $vProduct->ItemNameVender = $itemName;

//         try {
//             $vProduct->save();
//             \Log::info("Inserted row $index");
//             $data[] = $vProduct;
//         } catch (\Illuminate\Database\QueryException $e) {
//             \Log::error("Insert failed at row $index", ['error' => $e->getMessage()]);
//         }
//     }

//     return response()->json(['status' => 'success', 'data' => $data]);
// }





// public function importQuataion(Request $request)
// {
    
//     $file = $request->file('excel_file');
//     $startRow = $request->input('start_row');
//     $end_row = $request->input('end_row');

//     $itemCodeColumn = strtoupper($request->input('itemCodeColumn', 'Z'));
//     $itemNameColumn = strtoupper($request->input('itemNameColumn', 'Z'));
//     $Impacolumn = strtoupper($request->input('Impacolumn', 'Z'));
//     $QtyColumn = strtoupper($request->input('QtyColumn', 'Z'));
//     $VpartColumn = strtoupper($request->input('VpartColumn', 'Z'));
//     $uomColumn = strtoupper($request->input('uomColumn', 'Z'));
//     $vendorPriceColumn = strtoupper($request->input('vendorPriceColumn', 'Z'));
//     $sellPriceColumn = strtoupper($request->input('sellPriceColumn', 'Z'));
//     $VendorNameColumn = strtoupper($request->input('VendorNameColumn', 'Z'));

//     $spreadsheet = IOFactory::load($file->getPathname());
//     $sheet = $spreadsheet->getActiveSheet();

//     $data = [];

//     for ($row = $startRow; $row <= $end_row; $row++) {
//         $rowData = [];

//         $itemCode = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($itemCodeColumn), $row)->getValue();
//         $itemName = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($itemNameColumn), $row)->getValue();
//         $uom = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($uomColumn), $row)->getValue();
//         $vendorPrice = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($vendorPriceColumn), $row)->getValue();
//         $sellPrice = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($sellPriceColumn), $row)->getValue();
//         $VendorName = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($VendorNameColumn), $row)->getValue();
//         $Vpart = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($VpartColumn), $row)->getValue();
//         $Qty = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($QtyColumn), $row)->getValue();
//         $Impa = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($Impacolumn), $row)->getValue();
        
        

//         $searchItem = null;
//         $itemNameArray = [];
//         $highestSimilarityPercentage = 0;

//         $ImpaTrimmed = trim($Impa);
//         $itemNameTrimmed = trim($itemName);

//         if (strlen($ImpaTrimmed) > 1) {
//             $impaitems = ItemSetupNew::where('IMPACode', $ImpaTrimmed)->get();
            

//             if ($impaitems->isEmpty() && is_numeric($ImpaTrimmed)) {
//                 $impaitems = ItemSetupNew::where('ItemCode', $ImpaTrimmed)->get();
                
//             }

//             if ($impaitems->isEmpty()) {
//                 $impaitems = ItemSetupNew::where('IMPACode', 'like', "%$ImpaTrimmed%")->get();
//             }
            
//             foreach ($impaitems as $item) {
                
//                 similar_text($itemNameTrimmed, $item->ItemName, $similarityPercentage);
//                 $itemNameArray[] = [
//                     'ItemCode' => $item->ItemCode,
//                     'ItemName' => $item->ItemName,
//                     'UOM' => $item->UOM,
//                     'Percentage' => $similarityPercentage,
//                     'SaleRate' => $item->SaleRate ?: $item->LastRate,
//                     'VenderName' => '',
//                     'VenderCode' => ''
//                 ];

//                 if ($similarityPercentage > $highestSimilarityPercentage) {
//                     $highestSimilarityPercentage = $similarityPercentage;
//                     $searchItem = $item;
//                 }
//             }

//             usort($itemNameArray, fn($a, $b) => $b['Percentage'] <=> $a['Percentage']);
            
//         } else {
            
//             $searchItemWords = explode(' ', $itemNameTrimmed);
//             foreach ($searchItemWords as $word) {
//                 $items = ItemSetupNew::where('ItemName', 'like', '%' . $word . '%')->get();

//                 if ($items->isEmpty()) {
//                     $items = VenderProductList::where('ItemName', 'like', '%' . $word . '%')->limit(10)->get();
//                 }

//                 foreach ($items as $item) {
//                     similar_text($itemNameTrimmed, $item->ItemName, $similarityPercentage);

//                     if ($similarityPercentage > $highestSimilarityPercentage) {
//                         $highestSimilarityPercentage = $similarityPercentage;
//                         $searchItem = $item;
//                     }

//                     $itemNameArray[] = [
//                         'ItemCode' => $item->ItemCode,
//                         'ItemName' => $item->ItemName,
//                         'UOM' => $item->UOM,
//                         'Percentage' => $similarityPercentage,
//                         'SaleRate' => $item->SaleRate ?? $item->LastRate,
//                         'VenderName' => $item->VenderName ?? '',
//                         'VenderCode' => $item->VenderCode ?? '',
//                     ];
//                 }

//                 usort($itemNameArray, fn($a, $b) => $b['Percentage'] <=> $a['Percentage']);
//                 $itemNameArray = array_slice($itemNameArray, 0, 10);
//             }
//         }

//         if ($searchItem) {
            
//             $rowData['ItemCodeget'] = $searchItem->ItemCode;
//             $rowData['ItemNameget'] = $itemNameArray;
//             $rowData['UOMget'] = $searchItem->UOM;
//             $rowData['Priceget'] = $searchItem->SaleRate;
//             $rowData['Vendorcode'] = '';
//             $rowData['Vendor'] = '';

//             $venditems = VenderProductList::where('ItemCode', $searchItem->ItemCode)->first();
//             if ($venditems) {
                
//                 $rowData['Priceget'] = $venditems->LastRate;
//                 $rowData['UOMget'] = $venditems->UOM;
//                 $rowData['Vendorcode'] = $venditems->VenderCode ?? '';
//                 $rowData['Vendor'] = $venditems->VenderName ?? '';
//             }
//         } else {
            
//             $rowData['ItemCodeget'] = '';
//             $rowData['ItemNameget'] = '';
//             $rowData['UOMget'] = '';
//             $rowData['Priceget'] = '';
//             $rowData['Vendorcode'] = '';
//             $rowData['Vendor'] = '';
            
//         }

//         $rowData['ItemCode'] = $itemCode;
//         $rowData['Impa'] = $Impa;
//         $rowData['ItemName'] = $itemName;
//         $rowData['percentage'] = $highestSimilarityPercentage;
//         $rowData['UOM'] = $uom;
//         $rowData['VPrice'] = $vendorPrice;
//         $rowData['Price'] = $sellPrice;
//         $rowData['VendorName'] = $VendorName;
//         $rowData['Vpart'] = $Vpart;
//         $rowData['Qty'] = $Qty;

//         $data[] = $rowData;
//     }
    
// //     foreach ($data as $rowData) {
// //     $pRoductList = new VenderProductList;
// //     $pRoductList->ItemCode = $rowData['ItemCode'] ?? null;
// //     $pRoductList->IMPAItemCode = $rowData['Impa'] ?? null;
// //     $pRoductList->ItemName = $rowData['ItemName'] ?? null;
// //     $pRoductList->UOM = $rowData['UOM'] ?? null;
// // $pRoductList->VendorPrice = $rowData['VPrice'] ?? null;
// //     $pRoductList->OurPrice = $rowData['Price'] ?? null;
// //     $pRoductList->Rate = $rowData['Price'] ?? null;
// //     $pRoductList->LastRate = $rowData['VPrice'] ?? null;

// //     $price = $rowData['Price'] ?? 0;
// //     $vprice = $rowData['VPrice'] ?? 0;
// //     $pRoductList->GP = ($price != 0) ? (($price - $vprice) / $price) * 100 : 0;

    
// //     $pRoductList->VenderCode = !empty($rowData['Vendorcode']) ? $rowData['Vendorcode'] : null;
// //     $pRoductList->VenderName = $rowData['VendorName'] ?? null;
// //     $pRoductList->VendorCodeItem = !empty($rowData['Vendorcode']) ? $rowData['Vendorcode'] : null;
// //     $pRoductList->VendorNameItem = $rowData['VendorName'] ?? null;
// //     $pRoductList->VPartCode = $rowData['Vpart'] ?? null;
// //     $pRoductList->StockQty = $rowData['Qty'] ?? 0;
// //     $pRoductList->ItemNameVender = $rowData['ItemName'] ?? null;
// //     $pRoductList->save();
// //   \Log::info('Inserted VenderProductList', $pRoductList->toArray());
    
// // }

 

// foreach ($data as $index => $rowData) {
//     try {
//         $pRoductList = new VenderProductList;
//         $pRoductList->ItemCode = $rowData['ItemCode'] ?? null;
//         $pRoductList->IMPAItemCode = $rowData['Impa'] ?? null;
//         $pRoductList->ItemName = $rowData['ItemName'] ?? null;
//         $pRoductList->UOM = $rowData['UOM'] ?? null;
//         $pRoductList->VendorPrice = $rowData['VPrice'] ?? null;
//         $pRoductList->OurPrice = $rowData['Price'] ?? null;
//         $pRoductList->Rate = $rowData['Price'] ?? null;
//         $pRoductList->LastRate = $rowData['VPrice'] ?? null;

//         $price = $rowData['Price'] ?? 0;
//         $vprice = $rowData['VPrice'] ?? 0;
//         $pRoductList->GP = ($price != 0) ? (($price - $vprice) / $price) * 100 : 0;

//         $pRoductList->VenderCode = !empty($rowData['Vendorcode']) ? $rowData['Vendorcode'] : null;
//         $pRoductList->VenderName = $rowData['VendorName'] ?? null;
//         $pRoductList->VendorCodeItem = !empty($rowData['Vendorcode']) ? $rowData['Vendorcode'] : null;
//         $pRoductList->VendorNameItem = $rowData['VendorName'] ?? null;
//         $pRoductList->VPartCode = $rowData['Vpart'] ?? null;
//         $pRoductList->StockQty = $rowData['Qty'] ?? 0;
//         $pRoductList->ItemNameVender = $rowData['ItemName'] ?? null;

//         $pRoductList->save();

//         \Log::info("Inserted VenderProductList Row #$index", $pRoductList->toArray());

//     } catch (QueryException $qe) {
       
//         \Log::error("DB ERROR on Row #$index: " . $qe->getMessage(), [
//             'sql' => $qe->getSql(),
//             'bindings' => $qe->getBindings(),
//             'rowData' => $rowData,
//         ]);
//     } catch (\Exception $e) {
       
//         \Log::error("General ERROR on Row #$index: " . $e->getMessage(), [
//             'rowData' => $rowData,
//         ]);
//     }
// }

    
    

//  return response()->json([
//     'status' => 'success',
//     'data' => $data
// ]);

// }


public function ExportQuataion(Request $request)
{
    $MBranchCode = Auth::user()->BranchCode;
    $quoteno = $request->quoteno;

    $QuoteMaster = Quote::where('QuoteNo', $quoteno)->where('BranchCode', $MBranchCode)->first();

    if (!$QuoteMaster) {
        return response()->json(['error' => 'Quote not found.'], 404);
    }

    $templatePath = 'Reports/export.xlsx';
    $spreadsheet = IOFactory::load($templatePath);
    $sheet = $spreadsheet->getActiveSheet();

    // Set header info
    $sheet->setCellValue('A8', 'Customer Name: ' . $QuoteMaster->CustomerName);
    $sheet->setCellValue('A9', 'Vessel Name: ' . $QuoteMaster->VesselName);
    $sheet->setCellValue('A11', 'Event No: ' . $QuoteMaster->EventNo);
    $sheet->setCellValue('A12', 'Quote No: ' . $quoteno);
    $sheet->setCellValue('E10', 'Department: ' . $QuoteMaster->DepartmentName);
    $sheet->setCellValue('E11', 'Customer Ref #: ' . $QuoteMaster->CustomerRefNo);
    $sheet->setCellValue('E12', 'Dated: ' . date('d/M/Y', strtotime($QuoteMaster->QDate)));
    $sheet->setCellValue('E13', 'Terms: ' . $QuoteMaster->Terms);

    // Fetch detail items
    $QuoteDetails = DB::table('quotedetails')
        ->where('QuoteNo', $quoteno)
        ->where('BranchCode', $MBranchCode)
        ->orderBy('SNo', 'asc')
        ->get();

    $rowIndex = 16;
    $totalSum = 0;

    foreach ($QuoteDetails as $item) {
        $sheet->setCellValue('A' . $rowIndex, $item->SNo);
        $sheet->setCellValue('B' . $rowIndex, $item->Qty);
        $sheet->setCellValue('C' . $rowIndex, $item->PUOM);
        $sheet->setCellValue('D' . $rowIndex, $item->ItemName);
        $sheet->setCellValue('E' . $rowIndex, $item->CustomerNotes);
        $sheet->setCellValue('F' . $rowIndex, $item->IMPAItemCode);
        $sheet->setCellValue('G' . $rowIndex, $item->SuggestPrice);
        $sheet->setCellValue('H' . $rowIndex, $item->Total);
        $totalSum += $item->Total;
        $rowIndex++;
    }

    // Totals
    $sheet->setCellValue('F' . $rowIndex, 'Total Amount');
    $sheet->setCellValue('H' . $rowIndex, $totalSum);

    $discountRow = $rowIndex + 1;
    $netAmountRow = $discountRow + 1;

    $inv = (float) $request->inv;
    $discount = $inv !== 0 ? ($inv * $totalSum / 100) : 0;
    $netAmount = $totalSum - $discount;

    $sheet->setCellValue('F' . $discountRow, 'Discount%');
    $sheet->setCellValue('G' . $discountRow, $inv . '%');
    $sheet->setCellValue('H' . $discountRow, $discount);

    $sheet->setCellValue('F' . $netAmountRow, 'Net Amount');
    $sheet->setCellValue('H' . $netAmountRow, $netAmount);

    // Save and return
    $exportPath = 'Reports/Quotation' . $quoteno . '.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($exportPath);

    $filename = 'exported_file_' . str_replace(['/', '\\'], '_', $exportPath);

    return response()->download($exportPath, $filename)->deleteFileAfterSend(false);
}


//     private function getTableData($quoteno){
//         $MBranchCode = Auth::user()->BranchCode;

//     // Implement your logic to retrieve the table data from your Blade view
//     // and return it as a 2D array
//     $QuoteDetails = QuoteDetails::where('QuoteNo',$quoteno)->where('BranchCode',$MBranchCode)->get();
//     info($QuoteDetails);
//     // Example data
//     $data = [
//         ['Column 1', 'Column 2', 'Column 3'],
//         ['Value 1', 'Value 2', 'Value 3'],
//         // Add more rows as needed
//     ];

//     return $data;
// }


}
