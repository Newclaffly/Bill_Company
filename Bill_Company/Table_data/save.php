<html>
<head>
<title>Save Edit</title>
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

	$sql = "UPDATE bill_data_message SET 
			po = '".$_POST["txtpo"]."' ,
			header = '".$_POST["txtheader"]."' ,
			process = '".$_POST["txtprocess"]."' ,
			username = '".$_POST["txtusername"]."' 
			WHERE id = '".$_POST["txtid"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
	 echo "Record update successfully";
	}

	mysqli_close($conn);
?>
</body>
</html>
