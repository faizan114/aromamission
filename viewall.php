<!DOCTYPE html>
<html>
<?php
session_start();
include('adminpartials/head.php');
require_once('controllers/AdminController.php');
require_once('controllers/ScientistModel.php');
require_once('validation.php');
$admin=new AdminManager();
$validation=new Validation();
$admin->isLoggedIn();
 //print_r($admin->getScientists());
 
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

            <section class="content">
                <!-- /.content -->
                <div class="row">

                    <div class="col-sm-12">

                    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Scientists</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SNO</th>
                  <th>Project Name</th>
                  <th>Month Name</th>
                  <th>Week Name</th>
                  
                  <th>Description</th>
                  <th>Files</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				   if($scientists=$admin->getScientistDeatils())
           {
               $count=0;
           while($sc=mysqli_fetch_assoc($scientists))
				   	  {
                             $count++;
           ?>
      <tr>
                  <td><?php echo $count   ?></td>
                  <td><?php echo $sc['ProjectName']   ?> </td>
                  <td><?php echo $sc['MonthName']     ?>  </td>
                  <td><?php echo $sc['WeekName']     ?> </td>
                  <td><?php echo $sc['description']   ?> </td>

                  <td> <?php if($sc['filename']){  ?>  <a class="btn btn-primary" href="uploads/<?php echo$sc['filename']  ?>">View PDF/Image</a>
                        <?php }?>
                        <?php if($sc['ppt_name']){  ?> 
                      <a class="btn btn-primary"  href="uploads/<?php echo $sc['ppt_name']  ?>">View PTT </a>
                    </td>
                      <?php 
                    
                          }?>
                   
                     
                      <td>
                      <a class="btn btn-danger" onclick="confirmation(<?php  echo $sc['id'] ?>)" >Delete </a>
                      </td>
                </tr>
      <?php
               }
				   	  }
				   
				   ?>
                
               
               
              </table>
            </div>
            <!-- /.box-body -->
                    </div>
 
                          
                    </div>
                    

                </div>
                <!-- /.content-wrapper -->
             
</body>
<?php
       include('adminpartials/footer.php');
       ?>
</html>



<script>
   
    function confirmation(id)
    {
     let T=confirm("Are you sure you want to delete this Scientist Detail");
    if (T==true){
        window.location.href="deletescientist.php?delete="+id;
        console.log(id)
    }
    return T;
    }
</script>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>



