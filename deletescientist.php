<?php
  session_start();
 
  require_once('controllers/AdminController.php');
  $admin=new AdminManager();
 
  $admin->isLoggedIn();
   
  $admin->deleteScientistDetail($_GET['delete']);
  
  $admin->Redirect('viewall.php', false);


?>