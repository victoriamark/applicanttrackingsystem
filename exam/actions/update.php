<?php 
require_once '../database/config.php';
if (empty($_SESSION['status']) || $_SESSION['status'] == 'invalid') 
{
    echo "<script>window.location.href='/exam/index.php'</script>";
    $_SESSION['status'] = 'invalid';
}
else
{
    if (isset($_POST['update'])) 
    {
        $id = $conn->real_escape_string(trim($_POST['id']));
        $name = $conn->real_escape_string(trim($_POST['name']));
        $contactno = $conn->real_escape_string(trim($_POST['contact']));
        $address = $conn->real_escape_string(trim($_POST['address']));
        $applying_position = $conn->real_escape_string(trim($_POST['position']));
        $applied_date = $conn->real_escape_string(trim($_POST['date']));

        $update = mysqli_query($conn, "UPDATE applicants SET name='$name',contactno='$contactno',address='$address',applying_position='$applying_position',applied_date='$applied_date' WHERE id='$id'");

        if ($update) 
        {
            unset($_SESSION['id']);
            unset($_SESSION['name']);
            unset($_SESSION['contact']);
            unset($_SESSION['address']);
            unset($_SESSION['position']);
            unset($_SESSION['date']);

            echo "<script>alert('Updated successfully!!')</script>";
            echo "<script>window.location.href='/exam/dashboard.php'</script>";
        }
        else
        {
            echo "<script>alert('Query error!!')</script>";
            echo "<script>window.location.href='/exam/dashboard.php'</script>";
        }
    }
}

 ?>