<?php
session_start();
//error_reporting(0);
date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>รีเซตรหัสผ่าน</title>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<meta http-equiv='refresh' content='1; url=login.php '>
</head>

<body>
	<?php
    include_once('connect.php');
    $username = $_POST["forgot_username"];
    $password = $_POST["password_confirm"];
    $date_create = date('Y-m-d');
    $date_expired = date ("Y-m-d", strtotime("+90 day", strtotime($date_create)));
    //$permission = 'Supplier';
    //$date_expired = 
    // echo  $username;
    // echo '<br>';
    // echo  $password;
    // echo '<br>';
    // echo  $date_create;
    // echo '<br>';
    // echo  $date_expired;
    // echo '<br>';
    // echo  $permission;
	 $sql = "UPDATE bill_member SET password = '" . $password . "', date_created ='" . $date_create . "', date_expired = '" . $date_expired . "' WHERE username = '".$username."' ";

	 $query = mysqli_query($conn, $sql);

	 mysqli_close($conn);
	?>
	<div align="center">
		<p><br>
			<br>
			<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>รีเซตรหัสผ่านเรียบร้อยสำเร็จ</b></font>
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