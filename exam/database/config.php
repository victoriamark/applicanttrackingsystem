<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "examacc";

$conn = mysqli_connect($servername,$username,$password,$db);

if (!$conn) 
{
  echo "not connected";
}

/*

SELECT *
FROM attendance
WHERE date >= DATE_SUB(CURDATE(), INTERVAL 15 DAY);

*/


?>