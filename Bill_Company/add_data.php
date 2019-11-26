<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="node_modules/datatables/datatables.min.css">
  <title>Uploading excel Formating</title>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="node_modules/datatables/datatables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#excel_file').change(function() {
        $('#export_excel').submit();
      });
      $('#export_excel').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: "export.php",
          cache: false,
          method: "POST",
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function(data) {
            $('#result').html(data);
            $('#excel_file').val();
          }
        });
      });
    });
  </script>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f1f1f1;
    }

    .box {
      width: 900px;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-top: 100px;
    }
  </style>
</head>

<body>
  <?php
  $strUsername =  $_SESSION["username"];
  $strPermission = $_SESSION["permis"];
  // print_r($strUsername);
  // print_r($strPermission);
  ?>
  <div class="container box">
    <a href="history.php">Back</a>
    <h3 align="center">Import Database using Ajax</h3>
    <br /><br />
    <br /><br />
    <form mehtod="post" id="export_excel">
      <label>Select Excel</label>
      <input type="file" name="excel_file" id="excel_file" onclick="return confirm('คุณแน่ใจที่ต้องการอัปโหลดข้อมูลหรือไม่ ?')" />
    </form>
    <br />
    <br />
    <div id="result">
    </div>
  </div>
</body>

</html>