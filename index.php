<!-- Horizontal Form -->
<?php
session_start();
include('adminpartials/head.php');
require_once('controllers/AdminController.php');

$admin=new AdminManager();
//$admin->isLoggedIn();
//$admin->logout();

if(isset($_SESSION['name']))
{
    $admin->Redirect('dashboard.php', false); 
}

if($_SERVER['REQUEST_METHOD']=="POST")                       
{
  $flag;
   $url="index.php"; 
 
        if($admin->authenticate($_POST['email'],$_POST['password']))
        {
          $flag='Welcome Validated Successfully...';
          
              $url='dashboard.php';
        }
      else
      $flag='Invalid Credentials Please try again...';
    }

?>
<script type="text/javascript">
alert('<?php echo $flag; ?>');        /*code for alerting the error or successful Validation*/
document.location=('<?php echo $url; ?>');  //code for redirecting the page
</script>

<?php
  

?>

<script type="text/javascript">
  alert('<?php echo $flag; ?>');        /*code for alerting the error or successful Validation*/

  document.location=('<?php echo $url; ?>');  //code for redirecting the page
</script>
<style>
  
  .projj{
  font-weight:bold;
  font-size:15px;
  background-color: green;
  color: #FFFFFF;
}



</style>



<div class="container">
    <div class="row">
    <div class="col-md-3"></div>
       <div class="col-md-6">
       <div class="box box-info" style="margin-top: 200px;">

            <div class="box-header with-border">
        <img src="images/csir_iiim_welcome.jpg" style="height:179px; width: 547px ">
          <div class="projj text-center">ADMINSTRATOR LOGIN (PME)</div>

  
 

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" required class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" required name="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info  btn-block">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>




       </div> 
       
       <div class="col-md-3"></div>

    </div>
</div>
