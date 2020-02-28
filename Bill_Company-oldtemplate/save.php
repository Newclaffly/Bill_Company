<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>บันทึกข้อมูลการแก้ไข</title>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<meta http-equiv='refresh' content='1; url=index.php '>
</head>

<body>
	<?php
	include_once('connect.php');
	$sql = "UPDATE bill_data_message SET 
			po = '" . $_POST["txtpo"] . "' ,
			header = '" . $_POST["txtheader"] . "' ,
			process = '" . $_POST["txtprocess"] . "' ,
			owner = '" . $_POST["txtowner"] . "' 
			WHERE id = '" . $_POST["txtid"] . "' ";

	$query = mysqli_query($conn, $sql);

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

	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>

</html>