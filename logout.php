<?php
session_start();
if (isset($_SESSION['email'])) { 	
 unset($_SESSION['email']);
 unset($_SESSION['previous']);	
 header("Location: index.php");	
} 
?>