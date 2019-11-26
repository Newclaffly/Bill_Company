<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Uploading excel Formating</title>
</head>
<body>
<?php  
     $strUsername =  $_SESSION["username"];
	$strPermission = $_SESSION["permis"];
 //export.php  
 if(!empty($_FILES["excel_file"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "password", "bill_format");  
      $file_array = explode(".", $_FILES["excel_file"]["name"]);  
      if($file_array[1] == "xls")  
      {  
           include("Classes/PHPExcel/IOFactory.php");  
           $output = '';  
           $output .= "  
           <label class='text-success'>เพิ่มข้อมูลสำเร็จแล้ว</label>  
                <table class='table table-bordered'>  
                     <tr>  
                          <th>PO</th>  
                          <th>Header</th>  
                          <th>Process</th>
                          <th>Owner</th>  
                     </tr>  
                     ";  
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
           foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=2; $row<=$highestRow; $row++)  
                {  
                     $PO = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                     $HEADER = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                    // $PROCESS = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                    //  $postal_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
                    //  $country = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());  
                    $PROCESS ="Inporcess";
                     $query = "  INSERT INTO bill_data_message  (po, header, process,username)   VALUES ('".$PO."', '".$HEADER."', '".$PROCESS."', '".$strUsername."')  ";  
                     mysqli_query($connect, $query);  
                     $output .= '  
                     <tr>  
                          <td>'.$PO.'</td>  
                          <td>'.$HEADER.'</td>  
                          <td>'.$PROCESS.'</td> 
                          <td>'.$strUsername.'</td> 
                     </tr>  
                     ';  
                }  
           }  
           $output .= '</table>';  
           echo $output;  
      }  
      else  
      {  
           echo '<label class="text-danger">Invalid File</label>';  
      }  
 }
 ?> 
</body>
</html>