<?php session_start();
error_reporting(0);
if($_SESSION['username']==""){

	echo "<br><center><h3><font color=\"#CC0099\">คุณยังไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน</font></h3></center>";
	
	echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2;URL=login.php\">";
	
	exit();
	
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>History</title>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="index.php">หน้าหลัก</a>
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
							<a class="nav-link" href="history.php">รายการบันทึกใบวางบิล<span class="sr-only">(current)</span></a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li> -->
					</ul>
				<?php
			} else {
				?>
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="history_member.php">หน้าหลัก <span class="sr-only">(current)</span></a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li> -->
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
								<a class="dropdown-item" href="login_forgot.php">เปลี่ยนรหัสผ่าน</a>
								<!-- <a class="dropdown-item" href="#">Another action</a> -->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
							</div>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link " href="login.php" tabindex="-1" aria-disabled="true">เข้าสู่ระบบ</a>
						</li>
					<?php } ?>
				</ul>
				</div>
		</div>
	</nav>

	<div class="container">
		<div class="container">
			<div class="mx-auto mt-5">
				<h1 align="center">รายการบันทึกใบวางบิล</h1>
			</div>
			<!-- <div class="form-group float-right">
				<a href="" class="btn btn-outline-success float-right">Export</a>
				&nbsp;
			</div> -->
			<div class="form-group float-right">
				<a href="add_data.php" class="btn btn-outline-primary float-right">เพิ่มข้อมูล</a>
				&nbsp;
			</div>

			<div class="form-group float-right">
				<a href="Format.xls" class="btn btn-outline-warning float-right">ดาวโหลดฟอร์แมตเอกสาร</a>
			</div>
		</div>
		<table id="myTable" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<!-- <th>ลำดับ</th> -->
					<th>วันที่ออกเอกสาร</th>
					<th>บริษัทลูกค้า</th>
					<th>วันครบกำหนด</th>
					<th>วันที่ลูกค้าเปิดอ่านเอกสาร</th>
					<th>สถานะเอกสาร</th>
					<th>เครื่องมือ</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>

	</div>

	


	<!-- Modal Edit -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">รายละเอียดข้อมูล</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>

						<div class="form-group">
							<label for="id" class="col-form-label">ID:</label>
							<input type="text" class="form-control" disabled id="id">
						</div>
						<div class="form-group">
							<label for="start_date_bo" class="col-form-label">วันที่ออกเอกสาร:</label>
							<input type="text" class="form-control" disabled id="start_date_bo">
						</div>
						<div class="form-group">
							<label for="name_company_cus" class="col-form-label">บริษัทลูกค้า:</label>
							<input type="text" class="form-control" disabled id="name_company_cus">
						</div>
						<div class="form-group">
							<label for="end_date_bo" class="col-form-label">วันครบกำหนด:</label>
							<input type="text" class="form-control" disabled id="end_date_bo">
						</div>
						<div class="form-group">
							<label for="read_date_cus" class="col-form-label">วันที่เปิดอ่านเอกสาร:</label>
							<input type="text" class="form-control" disabled id="read_date_cus">
						</div>
						<div class="form-group">
							<label for="status_docs" class="col-form-label">สถานะเอกสาร:</label>
							<input type="text" class="form-control" disabled id="status_docs">
						</div>

						
						<input type="hidden" id="customer_id">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
					<!-- <button type="button" onclick="Edit_rows()" class="btn btn-primary">Update</button> -->
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" charset="utf8" src="DataTables/media/js/jquery.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
	<script type="text/javascript" charset="utf8" src="DataTables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="DataTables/media/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="DataTables/media/css/jquery.dataTables.min.css">

	<script>
	$(document).ready(function() {
			$('#myTable').DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": "server-side.php"
			});
		});

		function Delete_rows(id) {
			$.ajax({
				url: "delete_ajax.php",
				method: "POST",
				data: {
					id: id
				},
				success: function(data) {
					alert("ลบข้อมูลเรียบร้อยแล้ว");
					$('#myTable').DataTable().draw();
				}

			})
		}

		$('#exampleModal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('whatever') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)

			$('#customer_id').val(id);

			$.ajax({
				url: "preview_ajax.php",
				method: "POST",
				data: {
					id: id
				},
				success: function(data) {
					//alert(data);
					var json = $.parseJSON(data);
					$('#id').val(json[0].id);
					$('#start_date_bo').val(json[0].start_date_bo);
					$('#name_company_cus').val(json[0].name_company_cus);
					$('#end_date_bo').val(json[0].end_date_bo);
					$('#read_date_cus').val(json[0].read_date_cus);
					$('#status_docs').val(json[0].status_docs);
				}
			})

			// modal.find('.modal-title').text('Update Data No.' + id);
			// modal.find('.modal-body input').val(id);
		})

		// Edit
		// function Edit_rows() {
		// 	var id = $('#customer_id').val();
		// 	var date_docs = $('#date_docs').val();
		// 	var number_docs = $('#number_docs').val();
		// 	var code_customer = $('#code_customer').val();
		// 	var name_customer = $('#name_customer').val();
		// 	//alert(date_docs);
		// 	$.ajax({
		// 		url: "update_ajax.php",
		// 		method: "POST",
		// 		data: {
		// 			id: id,
		// 			date_docs: date_docs,
		// 			number_docs: number_docs,
		// 			code_customer: code_customer,
		// 			name_customer: name_customer
		// 		},
		// 		success: function(data) {
		// 			alert("บันทึกข้อมูลสำเร็จแล้ว");
		// 			$('#myTable').DataTable().draw();
		// 		}
		// 	})
		// }
	</script>
</body>

</html>