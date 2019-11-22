<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <title>Login From</title>
  <!-- <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
</head>

<body>
  <div class="container box">
    <br>
    <h1 align="center" >หน้าจอเข้าสู่ระบบ</h1>
    <br><br>
    <form name="frmlogin" method="post" action="check_login.php">
      <div class="form-group">
        <label for="inputuser">ชื่อผู้ใช้</label>
        <input type="text" class="form-control" name="txtusername" id="txtusername" placeholder="กรอกชื่อผู้ใช้">
        <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="inputpassword">รหัสผ่าน</label>
        <input type="password" class="form-control" name="txtpassword" id="txtpassword" placeholder="กรอกรหัสผ่าน">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
    </form>
  </div>
  <!-- <div class="container box">
    <form name="frmlogin" method="post" action="check_login.php">
      <h3 align="center">From Login System>
      Username:
      <input type="text" name="txtusername" id="txtusername" placeholder="Username"><br>
      Password:r>
      <input type="text" name="txtpassword" id="txtpassword" placeholder="Password"><br><br>
      <button type="submit">Submitutton>
    </form>
  </div> -->
</body>

</html>