<?php
session_start();
error_reporting(0);
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 
if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
    $connect = mysqli_connect("localhost", "root", "", "bill_format");
    $arr_file = explode('.', $_FILES['file']['name']);
    $extension = end($arr_file);

    $strUsername =  $_SESSION["username"];
    $strPermission = $_SESSION["permis"];

    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }if('xls' == $extension){
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    }else{
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    print_r($sheetData);

    foreach ($spreadsheet->getWorksheetIterator() as $worksheet) {
        $highestRow = $worksheet->getHighestRow();
        for ($row = 2; $row <= $highestRow; $row++) {
             $PO = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
             $HEADER = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
             // $PROCESS = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
             //  $postal_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
             //  $country = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());  
             $PROCESS = "Inporcess";
             $query = "  INSERT INTO bill_data_message (po, header, process,owner)   VALUES ('" . $PO . "', '" . $HEADER . "', '" . $PROCESS . "', '" . $strUsername . "')  ";
             mysqli_query($connect, $query);
             $output .= '  
         <tr>  
              <td>' . $PO . '</td>  
              <td>' . $HEADER . '</td>  
              <td>' . $PROCESS . '</td> 
              <td>' . $strUsername . '</td> 
         </tr>  
         ';
        }
   }
}
