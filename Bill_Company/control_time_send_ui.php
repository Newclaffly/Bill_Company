<?php session_start();
error_reporting(0);
if ($_SESSION['username'] == "") {

    echo "<br><center><h3><font color=\"#CC0099\">คุณยังไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน</font></h3></center>";

    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2;URL=login.php\">";

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> หน้าหลัก</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            session_start();
            if ($_SESSION['permis'] == "Supplier") {
            ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="history.php"> <i class="fas fa-history"></i> รายการใบบิล<span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li> -->
                    </ul>
                <?php
            } else {
                ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="history_member.php"><i class="fas fa-history"></i> รายการใบวางบิล <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li> -->
                    </ul>
                <?php } ?>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> ยินดีต้อนรับคุณ <?php echo $_SESSION['username'];
                                                                            $user = $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="#">Action</a> -->
                                <a class="dropdown-item" href="login_forgot.php"><i class="fas fa-key"></i> เปลี่ยนรหัสผ่าน</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link " href="login.php" tabindex="-1" aria-disabled="true">เข้าสู่ระบบ</a>
                        </li>
                    <?php } ?>
                </ul>
                </div>
        </div>
    </nav>

    
    <div class="container">
        <div class="card">
            <div class="card-header">Header</div>
            <div class="card-body">Content</div>
            <div class="card-footer">Footer</div>
        </div>
    </div>
</body>

</html>