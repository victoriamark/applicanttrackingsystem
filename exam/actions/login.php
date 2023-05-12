<?php 

if ($_SESSION['status']=='valid') {
    echo "<script>window.location.href='dashboard.php'</script>";
}
else
{
	$_SESSION['status'] = 'invalid';
}


if (isset($_POST['login'])) 
{
	$email = $conn->real_escape_string(trim($_POST['email']));
	$password = $conn->real_escape_string(trim($_POST['password']));

	if (empty($email) || empty($password)) 
	{
		echo "<script>alert('You must fill in the blanks')</script>";
		echo "<script>window.location.href='/exam/index.php'</script>";
	}
	else
	{
		$check = mysqli_query($conn,"SELECT * FROM account WHERE email='$email' AND password='$password'");
		$fetch = mysqli_fetch_array($check);

		  if (mysqli_num_rows($check) > 0) 
		  {
		  		$_SESSION['status'] = "valid";
		    	echo "<script>window.location.href='dashboard.php'</script>";		  	
		  }
		  else
		  {
		  	$_SESSION['status'] = "invalid";
		  	echo "<script>alert('You have entered wrong credentials.')</script>";
		    echo "<script>window.location.href='/exam/index.php'</script>";
		  }
	}
}



 ?>