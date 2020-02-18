<?php
session_start();
error_reporting(0);
if($_SESSION['username']==""){

	echo "<br><center><h3><font color=\"#CC0099\"> คุณยังไม่ได้login กรุณาloginเข้าสู่ระบบก่อน</font></h3></center>";
	
	echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2;URL=login.php\">";
	
	exit();
	
	}
date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>สร้างบัญชีผู้ใช้</title>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<meta http-equiv='refresh' content='1; url=login.php '>
</head>

<body>
	<?php
    include_once('connect.php');
    $username = $_POST["username"];
    $password = $_POST["password"];
    $date_create = date('Y-m-d');
    $date_expired = date ("Y-m-d", strtotime("+90 day", strtotime($date_create)));
    $permission = 'Supplier';
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
	 $sql = "  INSERT INTO bill_member (username, password,date_created,date_expired,permis)   VALUES ('" . $username . "', '" . $password . "', '" . $date_create . "', '" . $date_expired . "','".$permission."')  ";

	 $query = mysqli_query($conn, $sql);

	 mysqli_close($conn);
	?>
	<div align="center">
		<p><br>
			<br>
			<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>สร้างบัญชีเรียบร้อยสำเร็จ</b></font>
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