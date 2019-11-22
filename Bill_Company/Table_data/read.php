<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <title>Edit</title>
</head>

<body>
  <?php
  ini_set('display_errors', 1);
  error_reporting(~0);

  $strCustomerID = null;

  if (isset($_GET["id"])) {
    $strCustomerID = $_GET["id"];
  }
  date_default_timezone_set('Asia/Bangkok');
  $serverName = "localhost";
  $userName = "root";
  $userPassword = "password";
  $dbName = "bill_format";

  $conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

  $sql = "SELECT * FROM bill_data_message WHERE id = '" . $strCustomerID . "' ";

  $query = mysqli_query($conn, $sql);

  $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
  $date = date("Y-m-d");
  ?>
  <a class="btn btn-link" href="history_member.php">กลับ</a>
  <div class="container">
    <form action="save_read.php" name="frmAdd" method="post">

      <input type="hidden" name="txtid" value="<?php echo $result["id"]; ?>">
      <input type="hidden" name="txtpo" size="20" value="<?php echo $result["po"]; ?>">
      <input type="hidden" name="txtheader" size="20" value="<?php echo $result["header"]; ?>">
      <input type="hidden" name="txtprocess" size="2" value="Success">
      <input type="hidden" name="txtusername" size="5" value="<?php echo $result["username"]; ?>">
      <input type="hidden" name="txtdate" size="5" value="<?php $date ?>">

      <h1 align="center">หน้าจอแก้ใขข้อมูล</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
              <th>ID</th>
              <td><input type="text" class="form-control" name="txtid" size="20" value="<?php echo $result["id"]; ?>" disabled>
            </td> 
          </tr>
          <tr>
              <th>Po</th>
              <td><input type="text" class="form-control" name="txtpo" size="20" value="<?php echo $result["po"]; ?>" disabled></td>    
          </tr>
          <tr>
              <th>Header</th>
              <td><input type="text" class="form-control" name="txtheader" size="20" value="<?php echo $result["header"]; ?>" disabled></td>
          </tr>
          <tr>
              <th>Process</th>
              <td><input type="text" class="form-control" name="txtprocess" size="2" value="<?php echo $result["process"]; ?>" disabled></td>
          </tr>
          <tr>
              <th>Username</th>
              <td><input type="text" n class="form-control" ame="txtusername" size="5" value="<?php echo $result["username"]; ?>" disabled></td>
          </tr>
        </thead>
      </table>
      <button type="submit" class="btn btn-success " name="submit">ยืนยันการเปิดอ่าน</button>
    </form>
    <?php
    mysqli_close($conn);
    ?>
  </div>
</body>

</html>