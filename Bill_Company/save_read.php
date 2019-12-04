<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>บันทึกการเปิดอ่าน</title>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<meta http-equiv='refresh' content='1; url=index.php '>
</head>

<body>
	<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	date_default_timezone_set('Asia/Bangkok');
	$date = date('Y-m-d h:i:s');
	include_once('connect.php');
	$sql = "UPDATE bill_data_message SET 
			po = '" . $_POST["txtpo"] . "' ,
			header = '" . $_POST["txtheader"] . "' ,
			process = '" . $_POST["txtprocess"] . "' ,
			date_read = '" . $date . "' ,
			owner = '" . $_POST["txtowner"] . "' 
			WHERE id = '" . $_POST["txtid"] . "' ";


	$query = mysqli_query($conn, $sql);

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
