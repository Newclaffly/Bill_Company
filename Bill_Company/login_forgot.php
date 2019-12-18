<?php
ob_start();
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ลืมรหัสผ่าน</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="save_forgot.php" method="POST">
                        <div class="card-header">
                            Forgot in to Your Account!!
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="forgot_username" class="col-sm-3 col-form-label">ชื่อผู้ใช้</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="forgot_username" id="forgot_username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="forgot_password" class="col-sm-3 col-form-label">รหัสผ่าน</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="forgot_password" id="forgot_password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirm" class="col-sm-3 col-form-label">ยืนยันรหัสผ่าน</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-success" value="เปลี่ยนรหัสผ่าน">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>

</html>