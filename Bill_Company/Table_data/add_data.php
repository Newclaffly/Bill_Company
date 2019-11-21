<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
  <title>Uploading excel Formating</title>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
    <h3 align="center">Import Database using Ajax</h3>
    <br /><br />
    <br /><br />
    <form mehtod="post" id="export_excel">
      <label>Select Excel</label>
      <input type="file" name="excel_file" id="excel_file" />
    </form>
    <br />
    <br />
    <div id="result">
    </div>
  </div>
</body>

</html>