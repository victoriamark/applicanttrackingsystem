<?php 
session_start();
session_destroy();
$_SESSION['status'] = "invalid";
echo "<script>window.location.href='/exam/index.php'</script>";

 ?>