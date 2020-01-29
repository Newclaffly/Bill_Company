<?php
ini_set('display_errors', 1);
error_reporting(~0);
date_default_timezone_set('Asia/Bangkok');
$date = date('Y-m-d');
echo $date;
include_once('connect.php');
if (isset($_POST["read_date_cus"]) && ($_POST["status_docs"])) {
    $status = "Success";
    // $read_date_cus = mysqli_real_escape_string($conn, $_POST["read_date_cus"]);
    $status_docs = $status;
    $read_date_cus = $date;
    $sql = "Update bill_invoice SET read_date_cus = '$read_date_cus' ,status_docs ='$status_docs'  WHERE id = " . $_POST["id"];
    mysqli_query($conn, $sql);
    mysqli_close($conn);
} else {
    echo 'error';
}
