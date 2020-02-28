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
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</head>

<body class="hold-transition login-page">
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

  <div class="login-box">
    <div class="login-logo">
      <a href="login.php"><b>Bill</b>Company</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" id="username" required placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" required placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>

          </div>
        </form>
        <p class="mb-1">
          <a href="login_forgot.php">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="login_create.php" class="text-center">Register a new membership</a>
        </p>
      </div>
    </div>
  </div>
  <!-- /.login-box -->
</body>

</html>