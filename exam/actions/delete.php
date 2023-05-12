<?php 
require_once '../database/config.php';
if (empty($_SESSION['status']) || $_SESSION['status'] == 'invalid') 
{
    echo "<script>window.location.href='/exam/index.php'</script>";
    $_SESSION['status'] = 'invalid';
}
else
{
    $id = $conn->real_escape_string(trim($_GET['id']));

    $delete = mysqli_query($conn, "DELETE FROM applicants WHERE id='$id'");

    if ($delete) 
    {
        echo "<script>alert('Removed successfully!!')</script>";
        echo "<script>window.location.href='/exam/dashboard.php'</script>";
    }
    else
    {
        echo "<script>alert('Query error!!')</script>";
        echo "<script>window.location.href='/exam/dashboard.php'</script>";
    }
}

 ?>