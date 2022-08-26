<?php
include('envs.php');
include("adminauthentication.php");
session_start(); 

 if (!isset($_SESSION['admin_email']))
{
header("Location: adminlogin.php");
exit();
}
?>