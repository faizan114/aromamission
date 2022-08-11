<!DOCTYPE html>
<html>
<?php
session_start();
include('adminpartials/head.php');
require_once('controllers/AdminController.php');
require_once('controllers/ScientistModel.php');
require_once('validation.php');
require_once('controllers/AdminController.php');
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
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6">


                 <?php
                  if($scientist=$admin->getScientistDetailById($_GET['id']))
                  {
                    //print_r($scientist['id']);
                 ?>
                    <form role="form"  method="post" enctype="multipart/form-data" >
                            <h1><b>Edit Scientist Detail</b> </h1>
                            <form>
 

  <div class="form-group">
    <label for="exampleFormControlSelect1"> Scientist</label>
    <select class="form-control" id="exampleFormControlSelect1" name="scientistID" disabled required>
    <option value="-1">--SELECT SCIENTIST--</option>
    <?php 
				   if($scientists=$admin->getScientists())
           {
           while($sc=mysqli_fetch_assoc($scientists))
				   	  {
           ?>
           <option <?php if($scientist['scientistId'] == $sc['id']) { ?> selected="selected"<?php } ?>   
           value="<?php echo $sc['id']   ?>"><?php echo $sc['name']   ?></option>
     
     
     
     <?php
               }
				   	  }
				   
				   ?>
    </select>
  </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Quater</label>
    <select class="form-control" id="exampleFormControlSelect1" name="quaterId" required>
    <option value="-1" >---SELECT QUATER---</option>
    <?php
    if($qauters=$admin->getQuaters())
           {
           while($qa=mysqli_fetch_assoc($qauters))
				   	  {
           ?>
      <option <?php if($scientist['quaterId'] == $qa['id']) { ?> selected="selected"<?php } ?>          value="<?php echo $qa['id']   ?>"><?php echo $qa['name']   ?></option>
      <?php
               }
				   	  }
				   
				   ?>
    </select>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control"  name="description" required id="exampleFormControlTextarea1" rows="3"><?php echo $scientist['description']; ?></textarea>
  </div>
   <div class="form-group">
   
    <label for="exampleFormControlFile1">File Input [ONLY PDF and Image files allowed]</label>

    <?php if($scientist['filename'])  echo '<br/> Uploaded FILE NAME: '.$scientist['filename'].'<br/>'; ?>
    <input type="file" class="form-control" id="exampleFormControlFile1" name="file"  value="<?php echo $scientist['filename']?>"  accept=
" application/pdf, image/*">
  </div>

  <div class="form-group">
  
    <label for="exampleFormControlFile1">PPT Input [ONLY PPT is allowed]</label>

    <?php  if($scientist['pptname']) echo '<br/>Uploaded PPT NAME: '.$scientist['pptname'].'<br/>'; ?>
    <input type="file" class="form-control" value="<?php echo $scientist['pptname']?>"  accept=
"application/vnd.ms-powerpoint,.ppt, .pptx,pptm"
 id="exampleFormControlFile1" name="pptfile">
  </div>
  <button type="submit" name="addbtn" class="btn btn-primary btn-block">UPDATE Scientist</button>
</form>

              <?php
                 }
                 ?>
                          
                    </div>
                    <div class="col-sm-3">
                    </div>

                </div>
                <!-- /.content-wrapper -->
             
</body>
<?php
       include('adminpartials/footer.php');
       ?>
</html>


<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


<!-- ADD SCIENTIST IN DATABASE -->
<?php


if($_SERVER['REQUEST_METHOD']=="POST")
{

 if(isset($_POST['addbtn']))
  {
    $result=false;
    //VALIDATE SCIENTIST ID AND QUATER ID
   // $sId=$_POST["scientistID"];
    $sId= $scientist['scientistId'];
    $qId=$_POST["quaterId"];
   
    if($sId==-1 || $qId==-1)
    {
      if($sId==-1)
      {
        echo"<script>alert('Please Select Scientist')</script>";
        return;
      }
      echo"<script>alert('Please Select Quater')</script>";
      return;
    }



      
    
    
    
     $file=$_FILES['file'];
     $ppt=$_FILES['pptfile'];
     $fileName=null;
    
     

     // FILE VALIDATION
    //  if($ppt['error']!=0)
    //  {
    //    if(!$validation->validatePPT($ppt['name']))
    //    {
    //     echo"<script>alert('Error while processing the ppt')</script>";
    //     return;
    //    }
    //  } 


    if($ppt['error']==0)
    {
      if(!$validation->validatePPT($ppt['name']))
      {
       echo"<script>alert('Please Choose PPT file only IN PPT Upload')</script>";
       return;
      }
    }

    if($file['error']==0)
    {
      //USER HAS CHOSEN A FILE
      //VALIDATE FILE TO SEE IF ITZ IMAGE OR PDF
       if(!$validation->validateImage($file['name']) && !$validation->validatepdf($file['type'],$file['size']))
       {
         echo"<script>alert('Please Choose an Image or pdf file only in FILE upload')</script>";
         return;
       }
    }
       //FILE 1 UPLOAD SECTION 

       if($file['error']==0)
       {
          // UPLOAD THE FILE 
          if($validation->validateImage($file['name']))
          {
              // UPLOAD IMAGE 
              $sourcePath=$file['tmp_name'];
              
               $target_dir = "uploads/";
              $validation->uploadeImage($file['name'],$sourcePath,$target_dir,$sId,$qId);
               $fileName='file_'.$sId.'_'.$qId.'.jpeg';

          }
          if($validation->validatepdf($file['type'],$file['size']))
          {
               // UPLOAD PDF
               $validation->uploadepdf($file['tmp_name'],$sId,$qId);
               $fileName='file_'.$sId.'_'.$qId.'.pdf';

          }
       }
      

       // FILE 2 UPLOAD SECTION [PPT FILE]
        $pptName=null;
       
        if($ppt['error']==0)
       {
         
      
         $sourcePath=$ppt['tmp_name'];
         $target_dir = "uploads/";
         $validation->uploadeppt($ppt['tmp_name'],$sId,$qId);
         $pptName='ppt_'.$sId.'_'.$qId.'.pptx';
       }
// FILE 2 END 
    $result=$admin->updateScientist($_POST["scientistID"],$_POST["quaterId"],$_POST["description"],$fileName?$fileName:$scientist["filename"],$pptName?$pptName:$scientist["pptname"],$scientist['id']);
    if(!$result)
    {
      echo"<script>alert('Something went wrong while Saving the Scientist')</script>";

      return;

    }

     if($result)
     {
       echo"<script>alert('Scientest Detail Updated  Succesfully')</script>";
     }
    // print_r($_FILES['file']);
     



    
    
    

  }


  
  




// if($_POST["scientistID"]==-1);
// {
//   echo"<script>
//   document.location='addScientist.php'
//   alert('SELECT SCIENTIST')
//   </script>  ";

//   return;
// }








}







?>
