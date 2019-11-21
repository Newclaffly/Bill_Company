<?php

/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_IOFactory - Reader */
include 'Classes/PHPExcel/IOFactory.php';


$inputFileName = "myData.xls";  
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
$objPHPExcel = $objReader->load($inputFileName);  

$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
$headingsArray = $headingsArray[1];

$r = -1;
$namedDataArray = array();
for ($row = 2; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        foreach($headingsArray as $columnKey => $columnHeading) {
            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
        }
    }
}

//echo '<pre>';
//var_dump($namedDataArray);
//echo '</pre><hr />';

//*** Connect to MySQL Database ***//

ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "password";
	$dbName = "bill_format";

    $objConnect = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    
//$objConnect = mysqli_connect("localhost","root","password") or die(mysql_error());
//$objDB = mysql_select_db("mydatabase");
$i = 0;
foreach ($namedDataArray as $result) {
		$i++;
		$strSQL = "";
		$strSQL .= "INSERT INTO bill_data_message ";
		$strSQL .= "(po,header,process,date_upload) ";
		$strSQL .= "VALUES ";
		$strSQL .= "('".$result["po"]."','".$result["header"]."' ";
		$strSQL .= ",'".$result["process"]."' ";
		$strSQL .= ",'".$result["date_upload"]."') ";
		mysql_query($strSQL) or die(mysql_error());
		echo "Row $i Inserted...<br>";
}
mysql_close($objConnect);
?>
