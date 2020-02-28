<?php session_start();
error_reporting(0);
$temp = $_SESSION['username'];
$date_expired = $_SESSION['date_expired'];
if ($_SESSION['username'] == "") {

    //echo "<br><center><h3><font color=\"#CC0099\">คุณยังไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน</font></h3></center>";

    //echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2;URL=login.php\">";

    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>History Pages</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- DataTable -->
    <script type="text/javascript" charset="utf8" src="DataTables/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="DataTables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="DataTables/media/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="DataTables/media/css/jquery.dataTables.min.css">
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <?php
                session_start();
                if ($_SESSION['permis'] == "Supplier") {
                ?>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="history.php" class="nav-link">History Bill</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="history_member.php" class="nav-link">History Bill</a>
                    </li>
                <?php  } ?>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Bill Company</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo  $temp ?></a>
                        <a href="#" class="d-block">Expired : <?php echo  $date_expired ?></a>
                        <a href="logout.php" class="d-block">Logout</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Manage
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="change_time_ui.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Time Notification</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="login_forgot.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="../../index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>รายการบันทึกใบวางบิล</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">History Bill</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="container">
                            <div class="form-group float-right">
                                <a href="add_data.php" class="btn btn-outline-primary float-right"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูล</a>
                                &nbsp;
                            </div>
                            <div class="form-group float-right">
                                <a href="Format.xls" class="btn btn-outline-success float-right"><i class="fas fa-file-excel"></i> ดาวโหลดฟอร์แมตเอกสาร</a>
                            </div>
                            <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <!-- <th>ลำดับ</th> -->
                                        <th>วันที่ออกเอกสาร</th>
                                        <th>บริษัทลูกค้า</th>
                                        <th>วันครบกำหนด</th>
                                        <th>วันที่ลูกค้าเปิดอ่านเอกสาร</th>
                                        <th>สถานะเอกสาร</th>
                                        <th>เครื่องมือ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.2
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Modal Show Detail-->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">รายละเอียดข้อมูล</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" disabled id="id">
                        </div>
                        <div class="form-group">
                            <label for="start_date_bo" class="col-form-label">วันที่ออกเอกสาร:</label>
                            <input type="text" class="form-control" disabled id="start_date_bo">
                        </div>
                        <div class="form-group">
                            <label for="name_company_cus" class="col-form-label">บริษัทลูกค้า:</label>
                            <input type="text" class="form-control" disabled id="name_company_cus">
                        </div>
                        <div class="form-group">
                            <label for="end_date_bo" class="col-form-label">วันครบกำหนด:</label>
                            <input type="text" class="form-control" disabled id="end_date_bo">
                        </div>
                        <div class="form-group">
                            <label for="read_date_cus" class="col-form-label">วันที่เปิดอ่านเอกสาร:</label>
                            <input type="text" class="form-control" disabled id="read_date_cus">
                        </div>
                        <div class="form-group">
                            <label for="status_docs" class="col-form-label ">สถานะเอกสาร:</label>
                            <input type="text" class="form-control" disabled id="status_docs">
                        </div>
                        <input type="hidden" id="customer_id">
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "server-side.php"
            });
        });

        function Delete_rows(id) {
            $.ajax({
                url: "delete_ajax.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    alert("ลบข้อมูลเรียบร้อยแล้ว");
                    $('#myTable').DataTable().draw();
                }

            })
        }

        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)

            $('#customer_id').val(id);

            $.ajax({
                url: "preview_ajax.php",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    //alert(data);
                    var json = $.parseJSON(data);
                    $('#id').val(json[0].id);
                    $('#start_date_bo').val(json[0].start_date_bo);
                    $('#name_company_cus').val(json[0].name_company_cus);
                    $('#end_date_bo').val(json[0].end_date_bo);
                    $('#read_date_cus').val(json[0].read_date_cus);
                    $('#status_docs').val(json[0].status_docs);
                }
            })

            // modal.find('.modal-title').text('Update Data No.' + id);
            // modal.find('.modal-body input').val(id);
        })
    </script>
</body>

</html>