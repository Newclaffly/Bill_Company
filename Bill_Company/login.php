<?php
ob_start();
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>เข้าสู่ระบบ</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
  <?php
  session_start();
  include_once('connect.php');
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $conn->real_escape_string($_POST['password']);
    $sql = "SELECT * FROM `bill_member` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['permis'] = $row['permis'];
      $date_created = $_SESSION['date_created'] = $row['date_created'];
      $date_expired = $_SESSION['date_expired'] = $row['date_expired'];
      $date_now = date("Y-m-d");
      echo $date_now;
      if ($_SESSION['permis'] == "Supplier") {
        if ($date_expired <= $date_now) {
          header('location:login_forgot.php');
        } else {
          header('location:history.php');
        }
      } else {
        if ($date_expired <= $date_now) {
          header('location:login_forgot.php');
        } else {
          header('location:history_member.php');
        }
      }
    } else {
      echo "<script>alert('ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง!');</script>";
    }
  }
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto mt-5">
        <div class="card">
          <form action="" method="POST">
            <div class="card-header">
              Login in to Your Account!!
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="username" id="username" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="password" id="password" required>
                  <br>
                  <div class="float-right">
                    <a href="login_forgot.php" class="float-right">ลืมรหัสผ่าน</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-center">
              <input type="submit" name="submit" class="btn btn-success" value="เข้าสู่ระบบ">
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