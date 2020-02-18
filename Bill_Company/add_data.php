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
  <title>เพิ่มข้อมูล</title>
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
                <a class="dropdown-item" href="login_forgot.php">ลืมรหัสผ่าน</a>
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
    <div class="form-group mt-5">
      <h3 align="center">นำเข้าใบวางบิล</h3>
    </div>
    <form method="POST" enctype="multipart/form-data" action="export.php">
      <div class="form-group">
        <label for="exampleInputFile">กรุณาเลือกไฟล์ที่ต้องการอัปโหลด</label>
        <input type="file" class="form-control-file" name="file" id="exampleInputFile" onclick="return confirm('คุณแน่ใจที่ต้องการอัปโหลดข้อมูลหรือไม่ ?')" />
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="form-group float-right">
      <?php
      if ($_SESSION['permis'] == "Supplier") {
        ?>
        <a href="history.php" class="btn btn-secondary float-right">กลับหน้ารายการบันทึก</a>
      <?php } else { ?>
        <a href="history_member.php" class="btn btn-secondary float-right">กลับหน้ารายการบันทึก</a>
      <?php } ?>
    </div>
  </div>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>


</body>

</html>