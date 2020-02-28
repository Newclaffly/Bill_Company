<?php
ob_start();
session_start();
if($_SESSION['username']==""){

	echo "<br><center><h3><font color=\"#CC0099\"> คุณยังไม่ได้login กรุณาloginเข้าสู่ระบบก่อน</font></h3></center>";
	
	echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2;URL=login.php\">";
	
	exit();
	
	}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>สร้างบัญชีผู้ใช้</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
  <?php
  session_start();
  include_once('connect.php');

  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto mt-5">
        <div class="card">
          <form action="save_create_login.php" method="POST">
            <div class="card-header">
              Created this Account!!
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="username" id="username">
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="password" id="password">
                  <br>
                  <div class="float-right">
                    <a href="login_forgot.php" class="float-right">ลืมรหัสผ่าน</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-center">
              <input type="submit" name="submit" class="btn btn-success" value="ยืนยันการสร้าง">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>

</html>