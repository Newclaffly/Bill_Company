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
  $serverName = "localhost";
  $userName = "root";
  $userPassword = "password";
  $dbName = "bill_format";
  $conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
  $sql = "SELECT * FROM bill_data_message WHERE id = '" . $strCustomerID . "' ";
  $query = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
  ?>
  <form action="save.php" name="frmAdd" method="post">
    <table width="284" border="1">
      <tr>
        <th width="120">ID</th>
        <td width="238"><input type="hidden" name="txtid" value="<?php echo $result["id"]; ?>"><?php echo $result["id"]; ?></td>
      </tr>
      <tr>
        <th width="120">Po</th>
        <td><input type="text" name="txtpo" size="20" value="<?php echo $result["po"]; ?>"></td>
      </tr>
      <tr>
        <th width="120">Header</th>
        <td><input type="text" name="txtheader" size="20" value="<?php echo $result["header"]; ?>"></td>
      </tr>
      <tr>
        <th width="120">Process</th>
        <td><input type="text" name="txtprocess" size="2" value="<?php echo $result["process"]; ?>"></td>
      </tr>
      <tr>
        <th width="120">Username</th>
        <td><input type="text" name="txtusername" size="5" value="<?php echo $result["username"]; ?>"></td>
      </tr>
    </table>
    <input type="submit" name="submit" value="submit">
  </form>
  <?php
  mysqli_close($conn);
  ?>
</body>

</html>