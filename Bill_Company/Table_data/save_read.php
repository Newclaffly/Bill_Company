<?php
session_start();
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Save_read</title>
	<meta http-equiv=refresh content=1;URL=../Table_data/history_member.php> </head> 
	<body>
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
			username = '" . $_POST["txtusername"] . "', 
			date_read = '" . $_POST["txtdate"] . "' 
			WHERE id = '" . $_POST["txtid"] . "' ";

	$query = mysqli_query($conn, $sql);

	if ($query) {
		//echo "Record update successfully";
	}

	mysqli_close($conn);
	?>
	<div align="center">
		<p><br>
			<br>
			<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>บันทึกการเปิดอ่านข้อมูลเรียบร้อยสำเร็จ</b></font>
		</p>
		<p>
			<font size="3" face="MS Sans Serif, Tahoma, sans-serif">กรุณารอสักครู่ เพื่อกลับหน้าบันทึกรายการ</font><br>
			<br>
		</p>
	</div>
	</body>

</html>