<!DOCTYPE html>
<html>

<head>
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
  <form action="save_read.php" name="frmAdd" method="post">
    <input type="hidden" name="txtid" value="<?php echo $result["id"]; ?>">
    <input type="hidden" name="txtpo" size="20" value="<?php echo $result["po"]; ?>">
    <input type="hidden" name="txtheader" size="20" value="<?php echo $result["header"]; ?>">
    <input type="hidden" name="txtprocess" size="2" value="Success">
    <input type="hidden" name="txtusername" size="5" value="<?php echo $result["username"]; ?>">
    <input type="hidden" name="txtdate" size="5" value="<?php $date ?>">
    <table width="284" border="1">
      <tr>

        <th width="120">ID</th>
        <td><input type="text" name="txtid" size="20" value="<?php echo $result["id"]; ?>" disabled></td>
      </tr>
      <tr>
        <th width="120">Po</th>

        <td><input type="text" name="txtpo" size="20" value="<?php echo $result["po"]; ?>" disabled></td>
      </tr>
      <tr>
        <th width="120">Header</th>

        <td><input type="text" name="txtheader" size="20" value="<?php echo $result["header"]; ?>" disabled></td>
      </tr>
      <tr>
        <th width="120">Process</th>

        <td><input type="text" name="txtprocess" size="2" value="<?php echo $result["process"]; ?>" disabled></td>
      </tr>
      <tr>
        <th width="120">Username</th>
        <td><input type="text" name="txtusername" size="5" value="<?php echo $result["username"]; ?>" disabled></td>
      </tr>
    </table>
    <input type="submit" name="submit" value="ยืนยันการเปิดอ่าน">
  </form>
  <?php
  mysqli_close($conn);
  ?>
</body>

</html>