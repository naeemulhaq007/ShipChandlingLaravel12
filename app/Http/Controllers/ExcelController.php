<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\ItemSetupNew;
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
public function importQuataionShow(Request $request){
    try {
        $file = $request->file('excel_file');
        $filePath = $file->getPathname();

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Get the highest row number
        $highestRow = $sheet->getHighestRow();

        $rowData = [];

        // Loop through each row
        for ($row = 1; $row <= $highestRow; $row++) {
            $rowValues = [];

            // Get the cell iterator for the current row
            $cellIterator = $sheet->getRowIterator($row)->current()->getCellIterator();

            // Loop through each cell in the row
            foreach ($cellIterator as $cell) {
                $rowValues[] = $cell->getValue();
            }

            $rowData[] = $rowValues;
        }

        return response()->json([
            'rowData' => $rowData,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
        ], 500);
    }
}
// public function importQuotation(Request $request) {
//     $file = $request->file('excel_file');
//     $filePath = $file->getPathname();
//     $spreadsheet = IOFactory::load($filePath);
//     $sheet = $spreadsheet->getActiveSheet();

//     $data = [];

//     // Fetch all relevant items and vendor products in advance to minimize database queries
//     // $items = ItemSetupNew::all()->keyBy('IMPACode');
//     // $vendorProducts = VenderProductList::all()->keyBy('IMPAItemCode');

//     // Loop through rows in the Excel sheet
//     for ($row = $request->input('start_row'); $row <= $request->input('end_row'); $row++) {
//         $rowData = [];

//         // Fetch cell values directly without unnecessary variables
//         $itemCode = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($request->input('itemCodeColumn') ? $request->input('itemCodeColumn') : 'z'), $row)->getValue();
//         $itemName = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($request->input('itemNameColumn') ? $request->input('itemNameColumn') : 'z'), $row)->getValue();
//         $uom = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($request->input('uomColumn') ? $request->input('uomColumn') : 'z'), $row)->getValue();
//         $vendorPrice = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($request->input('vendorPriceColumn') ? $request->input('vendorPriceColumn') : 'z'), $row)->getValue();
//         $sellPrice = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($request->input('sellPriceColumn') ? $request->input('sellPriceColumn') : 'z'), $row)->getValue();
//         $VendorName = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($request->input('VendorNameColumn') ? $request->input('VendorNameColumn') : 'z'), $row)->getValue();
//         $Vpart = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($request->input('VpartColumn') ? $request->input('VpartColumn') : 'z'), $row)->getValue();
//         $Qty = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($request->input('QtyColumn') ? $request->input('QtyColumn') : 'z'), $row)->getValue();
//         $Impa = $sheet->getCellByColumnAndRow(Coordinate::columnIndexFromString($request->input('Impacolumn') ? $request->input('Impacolumn') : "z"), $row)->getValue();
//         $highestSimilarityPercentage = 0;
//     //     info($itemCode);
//     // }
//         // Process Impa column directly
//         if (strlen($Impa) > 1) {
//             // if ($items->has($Impa)) {
//             //     $searchItem = $items;
//             // } elseif ($vendorProducts->has($Impa)) {
//             //     $searchItem = $vendorProducts;
//                           $impaitems = ItemSetupNew::where('IMPACode',$Impa)->get();
//                 $impaven = VenderProductList::where('IMPAItemCode',$Impa)->get();
//                 if(!$impaitems->isEmpty()){
//                     foreach ($impaitems as $item) {

//                     similar_text($itemName, $item->ItemName, $similarityPercentage);
//                     if ($similarityPercentage > $highestSimilarityPercentage) {
//                         $highestSimilarityPercentage = $similarityPercentage;
//                         $searchItem = $item;
//                     }
//                     $itemNameArray[] = [
//                         'ItemCode'=> $item->ItemCode,
//                         'ItemName'=> $item->ItemName,
//                         'UOM'=> $item->UOM,
//                         'Percentage'=> $similarityPercentage,
//                         'SaleRate'=> $item->SaleRate ? $item->SaleRate : $item->LastRate ,
//                         'VenderName'=> '' ,
//                         'VenderCode'=> '' ,

//                      ];
//                     }

//                 }else if(!$impaven->isEmpty()){
//                     foreach ($impaven as $item) {

//                 similar_text($itemName, $item->ItemName, $similarityPercentage);

//                 if ($similarityPercentage > $highestSimilarityPercentage) {
//                     $highestSimilarityPercentage = $similarityPercentage;
//                     $searchItem = $item;
//                 }
//                 $itemNameArray[] = [
//                     'ItemCode'=> $item->ItemCode,
//                     'ItemName'=> $item->ItemName,
//                     'UOM'=> $item->UOM,
//                     'Percentage'=> $similarityPercentage,
//                     'SaleRate'=> $item->SaleRate ? $item->SaleRate : $item->LastRate ,
//                     'VenderName'=> $item->VenderName ? $item->VenderName : '' ,
//                     'VenderCode'=> $item->VenderCode ? $item->VenderCode : '' ,

//                  ];
//                 }

//             usort($itemNameArray, function ($a, $b) {
//                 return $b['Percentage'] <=> $a['Percentage'];
//             });
//             } else {
//                 $searchItem = null;
//             }
//             // info( $searchItem);
//         } else {
//         $searchItemWords = explode(' ', $itemName);

//             foreach ($searchItemWords as $word) {
//                 $items = ItemSetupNew::where('ItemName', 'like', '%' . $word . '%')->get();

//                 if ($items->isEmpty()) {
//                     $items = VenderProductList::where('ItemName', 'like', '%' . $word . '%')->limit(10)->get();
//                 }

//                 foreach ($items as $item) {
//                     similar_text($itemName, $item->ItemName, $similarityPercentage);

//                     if ($similarityPercentage > $highestSimilarityPercentage) {
//                         $highestSimilarityPercentage = $similarityPercentage;
//                         $searchItem = $item;
//                     }

//                     $itemNameArray[] = [
//                         'ItemCode'    => $item->ItemCode,
//                         'ItemName'    => $item->ItemName,
//                         'UOM'         => $item->UOM,
//                         'Percentage'  => $similarityPercentage,
//                         'SaleRate'    => $item->SaleRate ? $item->SaleRate : $item->LastRate,
//                         'VenderName'=> $item->VenderName ? $item->VenderName : '' ,
//                         'VenderCode'=> $item->VenderCode ? $item->VenderCode : '' ,
//                     ];

//                     // Sort the array in descending order based on 'Percentage' as you iterate
//                     usort($itemNameArray, function ($a, $b) {
//                         return $b['Percentage'] <=> $a['Percentage'];
//                     });

//                     // Optionally limit the array to a certain number of items
//                     $itemNameArray = array_slice($itemNameArray, 0, 10);
//                 }
//             }


//     }
//     if ($searchItem){
//             info( 'Most Similar Item: ' . $searchItem->ItemName . ' (Similarity Percentage: ' . $highestSimilarityPercentage . '%)');
//             $rowData['ItemCodeget'] = $searchItem->ItemCode;
//             $rowData['ItemNameget'] = $itemNameArray;

//             $rowData['UOMget'] = $searchItem->UOM;
//             $rowData['Priceget'] = $searchItem->SaleRate;
//             $rowData['Vendorcode'] = '';
//             $rowData['Vendor'] = '';

//             if($searchItem->ItemCode){
//                 $venditems = VenderProductList::where('ItemCode',$searchItem->ItemCode)->first();
//                 // info('Ven'.$venditems);

//                 if($venditems){
//                     $rowData['Priceget'] = $venditems->LastRate;
//                     $rowData['UOMget'] = $venditems->UOM;
//                     $rowData['Vendorcode'] =$venditems->VenderCode;
//                     $rowData['Vendor'] = $venditems->VenderName;
//                 }
//             }
//         }else{
//             info( 'No matching item found.');

//             $rowData['ItemCodeget'] = '';
//             $rowData['ItemNameget'] = '';
//             $rowData['UOMget'] = '';
//             $rowData['Priceget'] = '';
//             $rowData['Vendorcode'] = '';
//             $rowData['Vendor'] = '';
//         }

//             $rowData['ItemCode'] = $itemCode;
//             $rowData['Impa'] = $Impa;
//             $rowData['ItemName'] = $itemName;
//             $rowData['percentage'] = $highestSimilarityPercentage;
//             $rowData['UOM'] = $uom;
//             $rowData['VPrice'] = $vendorPrice;
//             $rowData['Price'] = $sellPrice;
//             $rowData['VendorName'] = $VendorName;
//             $rowData['Vpart'] = $Vpart;
//             $rowData['Qty'] = $Qty;

//             $data[] = $rowData;
//     }

//     return response()->json($data);
// }

    public function importQuataion(Request $request){
        $file = $request->file('excel_file');
                $startRow = $request->input('start_row');
                $end_row = $request->input('end_row');
                $itemCodeColumn = $request->input('itemCodeColumn');
                $itemNameColumn = $request->input('itemNameColumn');
                $Impacolumn = $request->input('Impacolumn');
                $QtyColumn = $request->input('QtyColumn');
                $VpartColumn = $request->input('VpartColumn');
                $uomColumn = $request->input('uomColumn');
                $vendorPriceColumn = $request->input('vendorPriceColumn');
                $sellPriceColumn = $request->input('sellPriceColumn');
                $VendorNameColumn = $request->input('VendorNameColumn');

                $itemCodeColumn = $itemCodeColumn ? $itemCodeColumn : 'z';
                $itemNameColumn = $itemNameColumn ? $itemNameColumn : 'z';
                $Impacolumn = $Impacolumn ? $Impacolumn : 'z';
                $QtyColumn = $QtyColumn ? $QtyColumn : 'z';
                $VpartColumn = $VpartColumn ? $VpartColumn : 'z';
                $uomColumn = $uomColumn ? $uomColumn : 'z';
                $vendorPriceColumn = $vendorPriceColumn ? $vendorPriceColumn : 'z';
                $sellPriceColumn = $sellPriceColumn ? $sellPriceColumn : 'z';
                $VendorNameColumn = $VendorNameColumn ? $VendorNameColumn : 'z';

        $filePath = $file->getPathname();

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $data = [];
        for ($row = $startRow; $row <= $end_row; $row++) {
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
            $sellPrice = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($sellPriceColumn),
                $row
            )->getValue();
            $VendorName = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($VendorNameColumn),
                $row
            )->getValue();
            $Vpart = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($VpartColumn),
                $row
            )->getValue();
            $Qty = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($QtyColumn),
                $row
            )->getValue();
            $Impa = $sheet->getCellByColumnAndRow(
                Coordinate::columnIndexFromString($Impacolumn),
                $row
            )->getValue();

            $searchItemWords = explode(' ', $itemName);
            info($searchItemWords);
            $searchItem = null;
            $itemNameArray = [];
            $highestSimilarityPercentage = 0;

            if(strlen($Impa) > 1){
                $impaitems = ItemSetupNew::where('IMPACode',$Impa)->get();
                $impaven = VenderProductList::where('IMPAItemCode',$Impa)->get();
                if(!$impaitems->isEmpty()){
                    foreach ($impaitems as $item) {

                    similar_text($itemName, $item->ItemName, $similarityPercentage);
                    if ($similarityPercentage > $highestSimilarityPercentage) {
                        $highestSimilarityPercentage = $similarityPercentage;
                        $searchItem = $item;
                    }
                    $itemNameArray[] = [
                        'ItemCode'=> $item->ItemCode,
                        'ItemName'=> $item->ItemName,
                        'UOM'=> $item->UOM,
                        'Percentage'=> $similarityPercentage,
                        'SaleRate'=> $item->SaleRate ? $item->SaleRate : $item->LastRate ,
                        'VenderName'=> '' ,
                        'VenderCode'=> '' ,

                     ];
                    }

                }else if(!$impaven->isEmpty()){
                    foreach ($impaven as $item) {

                similar_text($itemName, $item->ItemName, $similarityPercentage);

                if ($similarityPercentage > $highestSimilarityPercentage) {
                    $highestSimilarityPercentage = $similarityPercentage;
                    $searchItem = $item;
                }
                $itemNameArray[] = [
                    'ItemCode'=> $item->ItemCode,
                    'ItemName'=> $item->ItemName,
                    'UOM'=> $item->UOM,
                    'Percentage'=> $similarityPercentage,
                    'SaleRate'=> $item->SaleRate ? $item->SaleRate : $item->LastRate ,
                    'VenderName'=> $item->VenderName ? $item->VenderName : '' ,
                    'VenderCode'=> $item->VenderCode ? $item->VenderCode : '' ,

                 ];
                }
            }
            usort($itemNameArray, function ($a, $b) {
                return $b['Percentage'] <=> $a['Percentage'];
            });

            }
            else{

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
                            'VenderName'=> $item->VenderName ? $item->VenderName : '' ,
                            'VenderCode'=> $item->VenderCode ? $item->VenderCode : '' ,
                        ];

                        // Sort the array in descending order based on 'Percentage' as you iterate
                        usort($itemNameArray, function ($a, $b) {
                            return $b['Percentage'] <=> $a['Percentage'];
                        });

                        // Optionally limit the array to a certain number of items
                        $itemNameArray = array_slice($itemNameArray, 0, 10);
                    }
                }

            if ($searchItem) {
                info( 'Most Similar Item: ' . $searchItem->ItemName . ' (Similarity Percentage: ' . $highestSimilarityPercentage . '%)');
            } else {
                info( 'No matching item found.');
            }
            // info($searchItem);



        }
        info($searchItem);
        if ($searchItem){
            $rowData['ItemCodeget'] = $searchItem->ItemCode;
            $rowData['ItemNameget'] = $itemNameArray;

            $rowData['UOMget'] = $searchItem->UOM;
            $rowData['Priceget'] = $searchItem->SaleRate;
            $rowData['Vendorcode'] = '';
            $rowData['Vendor'] = '';

            if($searchItem->ItemCode){
                $venditems = VenderProductList::where('ItemCode',$searchItem->ItemCode)->first();
                // info('Ven'.$venditems);

                if($venditems){
                    $rowData['Priceget'] = $venditems->LastRate;
                    $rowData['UOMget'] = $venditems->UOM;
                    $rowData['Vendorcode'] =$venditems->VenderCode;
                    $rowData['Vendor'] = $venditems->VenderName;
                }
            }
        }else{

            $rowData['ItemCodeget'] = '';
            $rowData['ItemNameget'] = '';
            $rowData['UOMget'] = '';
            $rowData['Priceget'] = '';
            $rowData['Vendorcode'] = '';
            $rowData['Vendor'] = '';
        }

            $rowData['ItemCode'] = $itemCode;
            $rowData['Impa'] = $Impa;
            $rowData['ItemName'] = $itemName;
            $rowData['percentage'] = $highestSimilarityPercentage;
            $rowData['UOM'] = $uom;
            $rowData['VPrice'] = $vendorPrice;
            $rowData['Price'] = $sellPrice;
            $rowData['VendorName'] = $VendorName;
            $rowData['Vpart'] = $Vpart;
            $rowData['Qty'] = $Qty;

            $data[] = $rowData;
        }

        return response()->json($data);
    }

public function ExportQuataion(Request $request)
{
        $MBranchCode = Auth::user()->BranchCode;

    // Load the existing Excel file with the desired format
    $templatePath = 'Reports/export.xlsx';
    $spreadsheet = IOFactory::load($templatePath);
    $sheet = $spreadsheet->getActiveSheet();
    $quoteno = $request->quoteno;

    $QuoteMaster = Quote::where('QuoteNo',$quoteno)->where('BranchCode',$MBranchCode)->first();
    // Retrieve the QuoteDetails data
    $CustomerName = $QuoteMaster->CustomerName;
    $VesselName =$QuoteMaster->VesselName;
    $EventNo =  $QuoteMaster->EventNo;
    $QuoteNo =  $quoteno;
    $Department =$QuoteMaster->DepartmentName;
    $CustomerRef = $QuoteMaster->CustomerRefNo;
    $Date =date('d/M/Y',strtotime($QuoteMaster->QDate));
    $Terms = $QuoteMaster->Terms;
    // Set the values for specific rows and columns
    $sheet->setCellValue('A8', 'Customer Name: ' . $CustomerName);
    $sheet->setCellValue('A9', 'Vessel Name: ' . $VesselName);
    $sheet->setCellValue('A11', 'Event No: ' . $EventNo);
    $sheet->setCellValue('A12', 'Quote No: ' . $QuoteNo);
    $sheet->setCellValue('E10', 'Department: ' . $Department);
    $sheet->setCellValue('E11', 'Customer Ref #: ' . $CustomerRef);
    $sheet->setCellValue('E12', 'Dated: ' . $Date);
    $sheet->setCellValue('E13', 'Terms: ' . $Terms);
    $MBranchCode = config('app.MBranchCode');
    $QuoteDetails = QuoteDetails::where('QuoteNo', $quoteno)->where('BranchCode', $MBranchCode)->get();

    $data = [];
    $totalSum = 0;
    foreach ($QuoteDetails as $key => $Details) {
        $rowData = [
            $Details->SNo,
            $Details->Qty,
            $Details->PUOM,
            $Details->ItemName,
            $Details->CustomerNotes,
            $Details->IMPAItemCode,
            $Details->SuggestPrice,
            $Details->Total
        ];
        $totalSum += $Details->Total;
        $data[] = $rowData;
    }

    // Define the starting cell for the table in the Excel file
    $startRow = 16; // Adjust as needed
    $startColumn = 'A'; // Adjust as needed

    // Export the table data to the Excel file
    $rowIndex = $startRow;
    foreach ($data as $row) {
        $columnIndex = $startColumn;
        foreach ($row as $cellValue) {
            $sheet->setCellValue($columnIndex . $rowIndex, $cellValue);
            $columnIndex++;
        }
        $rowIndex++;
    }
// Set the sum of Total in the last row and column H
    $lastRowIndex = $rowIndex; // Index of the last row of the table
    $disRowIndex = $rowIndex+1; // Index of the last row of the table
    $totRowIndex = $disRowIndex+1; // Index of the last row of the table
    $sheet->setCellValue('F' . $lastRowIndex, 'Total Amount');
    $sheet->setCellValue('H' . $lastRowIndex, $totalSum);
    $inv = (float) $request->inv;
    if($inv !== 0){
        $discount = $inv*$totalSum/100;
    }else{
        $discount = 0;
    }


    $tot = (float) $totalSum - (float) $discount;
    $sheet->setCellValue('F' . $disRowIndex, 'Discount%');
    $sheet->setCellValue('G' . $disRowIndex, $inv.'%');
    $sheet->setCellValue('H' . $disRowIndex, $discount);
    $sheet->setCellValue('F' . $totRowIndex, 'Net Amount');
    $sheet->setCellValue('H' . $totRowIndex, $tot);
    // Save the modified Excel file
    $exportPath = 'Reports/Quotation'.$quoteno.'.xlsx'; // Specify the path to save the exported file
    $writer = new Xlsx($spreadsheet);
    $writer->save($exportPath);
    $filename = 'exported_file_' . $exportPath;
    $sanitizedFilename = str_replace(['/', '\\'], '_', $filename);

    // $temporaryUrl = Storage::url($exportPath);
    return response()
    ->download($exportPath, $sanitizedFilename)
    ->deleteFileAfterSend(false); // Deletes the temporary file after it's sent
    // return response()->download($exportPath)->deleteFileAfterSend(true);
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
