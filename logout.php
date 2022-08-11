<?php
session_start();
require_once('controllers/AdminController.php');
$admin=new AdminManager();
$admin->logout()
 //print_r($admin->getScientists());
 
?>