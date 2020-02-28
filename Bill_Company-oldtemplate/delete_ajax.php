<?php
include_once('connect.php');
if (isset($_POST["id"])) {
  $sql = " DELETE FROM bill_invoice WHERE id = '" . $_POST["id"] . "' ";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
}
