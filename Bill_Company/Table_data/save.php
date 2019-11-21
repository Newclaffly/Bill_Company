<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
</head>

<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "password";
	$dbName = "bill_format";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "INSERT INTO bill_data_message (po,header,process,date_upload) VALUES ('".$_POST["txtpo"]."','".$_POST["txtheader"]."','".$_POST["txtprocess"]."','".$_POST["txtdate"]."')";

	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
	}else{
        echo "Not Record". "<br>" . $conn->error;
    }

	mysqli_close($conn);
?>
</body>

</html> 