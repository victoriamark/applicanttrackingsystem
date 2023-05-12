<?php 
require_once '../database/config.php';
if (empty($_SESSION['status']) || $_SESSION['status'] == 'invalid') 
{
    echo "<script>window.location.href='/exam/index.php'</script>";
    $_SESSION['status'] = 'invalid';
}
else
{
    if (isset($_POST['insert'])) 
    {
        $name = $conn->real_escape_string(trim($_POST['name']));
        $contactno = $conn->real_escape_string(trim($_POST['contact']));
        $address = $conn->real_escape_string(trim($_POST['address']));
        $applying_position = $conn->real_escape_string(trim($_POST['position']));
        $applied_date = $conn->real_escape_string(trim($_POST['date']));

        $insert = mysqli_query($conn, "INSERT INTO applicants(name,contactno,address,applying_position,applied_date) VALUES('$name','$contactno','$address','$applying_position','$applied_date')");

        if ($insert) 
        {

            echo "<script>alert('Created successfully!!')</script>";
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