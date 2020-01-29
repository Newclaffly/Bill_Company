<?php
  include_once('connect.php');
    $sql = "select * from bill_invoice where id = ".$_POST["id"];
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $arr[] = $row;
    }
    
    echo json_encode($arr);
    mysqli_free_result($result);
    mysqli_close($conn);
