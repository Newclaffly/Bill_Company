<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<title>Title of the document</title>
</head>

<body>
	<?php
	date_default_timezone_set('Asia/Bangkok');
	$strUsername =  $_SESSION["username"];
	$strPermission = $_SESSION["permis"];
	// print_r($strUsername);
	// print_r($strPermission);
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "password";
	$dbName = "bill_format";

	$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

	$sql = "SELECT * FROM bill_data_message WHERE username = '$strUsername'";
	$query = mysqli_query($conn, $sql);

	$num_rows = mysqli_num_rows($query);

	$per_page = 20;   // Per Page
	$page  = 1;

	if (isset($_GET["Page"])) {
		$page = $_GET["Page"];
	}

	$prev_page = $page - 1;
	$next_page = $page + 1;

	$row_start = (($per_page * $page) - $per_page);
	if ($num_rows <= $per_page) {
		$num_pages = 1;
	} else if (($num_rows % $per_page) == 0) {
		$num_pages = ($num_rows / $per_page);
	} else {
		$num_pages = ($num_rows / $per_page) + 1;
		$num_pages = (int) $num_pages;
	}
	$row_end = $per_page * $page;
	if ($row_end > $num_rows) {
		$row_end = $num_rows;
	}


	$sql .= " ORDER BY id ASC LIMIT $row_start ,$row_end ";
	$query = mysqli_query($conn, $sql);


	?>

	<div class="container">
		<h1 align="center">รายการบันทึก</h1>
		<a class="btn btn-primary" href="add_data.php">เพิ่มข้อมูล</a>
		<a class="btn btn-danger" href="logout.php" onclick="return confirm('ยันยันการออกจากระบบหรือไม่ ?')">Logout</a>
		<table id="example" class="table table-bordered " cellspacing="0" width="100%">
			<thead class="thead-light">
				<tr>
					<th>
						<div align="center">ลำดับ </div>
					</th>
					<th>
						<div align="center">วันที่ / เวลา </div>
					</th>
					<th>
						<div align="center">หน่วยงาน</div>
					</th>
					<th>
						<div align="center">สถานะ </div>
					</th>
					<th>
						<div align="center">เจ้าของ</div>
					</th>
					<th>
						<div align="center">เครื่องมือ </div>
					</th>
				</tr>

				<?php
				while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					?>
					<tr>
						<td>
							<div align="center"><?php echo $result["id"]; ?></div>
						</td>
						<td><?php echo $result["po"]; ?></td>
						<td><?php echo $result["header"]; ?></td>
						<td>
							<div align="center"><?php echo $result["process"]; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $result["username"]; ?></div>
						</td>
						<td align="center"><a class="btn btn-warning" href="edit.php?id=<?php echo $result["id"]; ?>">Edit</a></td>
					</tr>
				<?php
				}
				?>
				<thead>
		</table>

		<br>
		จำนวน <?php echo $num_rows; ?> แถว : <?php echo $num_pages; ?> หน้าที่ :

		<?php
		if ($prev_page) {
			echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$prev_page'><< Back</a> ";
		}

		for ($i = 1; $i <= $num_pages; $i++) {
			if ($i != $page) {
				echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
			} else {
				echo "<b> $i </b>";
			}
		}
		if ($page != $num_pages) {
			echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$next_page'>Next>></a> ";
		}
		$conn = null;
		?>
	</div>
</body>

</html>