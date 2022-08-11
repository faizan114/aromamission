<!DOCTYPE html>
<html>
<?php
session_start();
include('adminpartials/head.php');
require_once('controllers/AdminController.php');
require_once('controllers/AdminController.php');
$admin=new AdminManager();
$admin->isLoggedIn();
//print_r($_SESSION['name']);

    
?>



<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php
include('adminpartials/header.php');
?>



        <!-- Left side column. contains the logo and sidebar -->
    <?php
    include('adminpartials/aside.php');
    
    ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
       
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
       <?php
       include('adminpartials/footer.php');
       ?>
</body>

</html>
