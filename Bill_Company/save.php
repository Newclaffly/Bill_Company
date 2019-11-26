<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Save Edit</title>
	<meta http-equiv=refresh content=1;URL=../Table_data/history.php> </head> <body>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "password";
	$dbName = "bill_format";

	$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

	$sql = "UPDATE bill_data_message SET 
			po = '" . $_POST["txtpo"] . "' ,
			header = '" . $_POST["txtheader"] . "' ,
			process = '" . $_POST["txtprocess"] . "' ,
			username = '" . $_POST["txtusername"] . "' 
			WHERE id = '" . $_POST["txtid"] . "' ";

	$query = mysqli_query($conn, $sql);

	if ($query) {
		echo "Record update successfully";
	}

	mysqli_close($conn);
	?>
	<div align="center">
		<p><br>
			<br>
			<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>บันทึกการแก้ไขข้อมูลเรียบร้อยสำเร็จ</b></font>
		</p>
		<p>
			<font size="3" face="MS Sans Serif, Tahoma, sans-serif">กรุณารอสักครู่ เพื่อกลับหน้าบันทึกรายการ</font><br>
			<br>
		</p>
	</div>
	</body>

</html>