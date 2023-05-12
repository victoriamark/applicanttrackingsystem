<?php 
error_reporting(0);
require_once 'database/config.php';
require_once 'actions/login.php';



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8" />
   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>

</head>
<body>
	<div class="container" id="root">
    <form action="" method="POST" id="login-form" class="login-form">

      <h2 class="text-center">LOGIN</h2>

      <div class="form-group">
        <label>Username</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email"  required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>
      <input type="submit" class="btn btn-primary btn-block bg-dark border-dark" name="login" value="LOGIN">
      <!-- <div class="form-group">
        <a href="#">Forgot password</a>
      </div> -->
    </form>
  </div>
</body>
</html>
