<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
  <title>Login From</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
  <div class="container box">
    <form name="frmlogin" method="post" action="check_login.php">
      <h3 align="center">From Login System</h3>
      Username:<br>
      <input type="text" name="txtusername" id="txtusername" placeholder="Username"><br>
      Password:<br>
      <input type="text" name="txtpassword" id="txtpassword" placeholder="Password"><br><br>
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>