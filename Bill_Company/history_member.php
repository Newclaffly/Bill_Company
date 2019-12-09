<?php session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>History</title>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="index.php">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			session_start();
			if ($_SESSION['permis'] == "Supplier") {
				?>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="history.php">หน้าหลัก <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
					</ul>
				<?php
				} else {
					?>
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="history_member.php">หน้าหลัก <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
					</ul>
				<?php } ?>
				<ul class="navbar-nav ml-auto">
					<?php if (isset($_SESSION['id'])) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								ยินดีต้อนรับคุณ <?php echo $_SESSION['username'];
													$user = $_SESSION['username']; ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link " href="login.php" tabindex="-1" aria-disabled="true">Login</a>
						</li>
					<?php } ?>
				</ul>
				</div>
		</div>
	</nav>

	<div class="container">
		<?php
		date_default_timezone_set('Asia/Bangkok');
		$strUsername =  $_SESSION["username"];
		$strPermission = $_SESSION["permis"];
		ini_set('display_errors', 1);
		error_reporting(0);
		include_once('connect.php');

		$sql = "SELECT * FROM bill_data_message ";
		$query = mysqli_query($conn, $sql);

		$num_rows = mysqli_num_rows($query);

		$per_page = 10;   // Per Page
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
			<div class="mx-auto mt-5">
				<h1 align="center">รายการบันทึก</h1>
			</div>
			<table id="example" class="table table-bordered " cellspacing="0" width="100%">
				<thead class="thead-light">
					<tr>
						<th>
							<div align="center">ลำดับ </div>
						</th>
						<th>
							<div align="center">เวลาในการส่งใบบิล</div>
						</th>
						<th>
							<div align="center">หน่วยงาน</div>
						</th>
						<th>
							<div align="center">ข้อมูล</div>
						</th>
						<th>
							<div align="center">สถานะ</div>
						</th>
						<th>
							<div align="center">ผู้อัปโหลด</div>
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
							<td>
								<div align="center"><?php echo $result["date_upload"]; ?></div>
							</td>
							<td><?php echo $result["po"]; ?></td>
							<td><?php echo $result["header"]; ?></td>
							<td>
								<div align="center"><?php echo $result["process"]; ?></div>
							</td>
							<td>
								<div align="center"><?php echo $result["owner"]; ?></div>
							</td>
							<td align="center"><a class="btn btn-success" href="read.php?id=<?php echo $result["id"]; ?>">เปิดอ่าน</a></td>
						</tr>
					<?php
					}
					?>
					<thead>
			</table>

			<div class="form-grpup text-right">
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
				<br><br><br>
			</div>
		</div>
	</div>

	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>

</html>