<?php
include("authentication.php");
session_start(); 

 if (!isset($_SESSION['email']))
{
echo "<script>
  $(document).ready(function(){
    alert('Please login to view.');
  });
</script>";
header("Location: login.php");
exit();
}
?>