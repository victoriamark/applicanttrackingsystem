<?php 
require_once 'database/config.php';
if (empty($_SESSION['status']) || $_SESSION['status'] == 'invalid') 
{
    echo "<script>window.location.href='/exam/index.php'</script>";
    $_SESSION['status'] = 'invalid';
}

 

?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">


  <title>Insert Applicant Info</title>
  <style>
    body {
      padding-top: 50px;
      align-content: space-between;
      align-items: center;
      display: flex;

    }

    .navbar {
      height: 50px;
    }

    form .form-group
    {
      width: 50%;
      text-align: left;
    }
    
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="dashboard.php">Applicant Tracking System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="actions/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5 mb-5">
    <center>
    <form action="actions/add.php" method="POST" id="update-form" class="update-form">

      <h2 class="text-center">INSERT APPLICANT INFORMATION</h2>

      <div class="form-group">
        <label>Applicant's Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter applicant's name" required>
      </div>
      <div class="form-group">
        <label>Contact Number</label>
        <input type="number" name="contact" class="form-control" placeholder="Enter contact number" oninput='validateNumberLength(this)' required >
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control" placeholder="Enter address" required>
      </div>
      <div class="form-group">
        <label>Applying Position</label>
        <input type="text" name="position" class="form-control" placeholder="Enter applying position" required>
      </div>
      <div class="form-group">
        <label>Applied Date</label>
        <input type="date" name="date" class="form-control" placeholder="Enter date" required>
      </div>
      <input type="submit" class="btn btn-primary btn-block bg-dark border-dark" style="width:50%" name="insert" value="INSERT">
      <!-- <div class="form-group">
        <a href="#">Forgot password</a>
      </div> -->
    </form>
    </center>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
  




  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 

<script type="text/javascript">
	$(document).ready(function() {
  var table = $('#example').DataTable({
    dom: '<"top"f>rt<"bottom"lp>',
    language: {
      search: '',
    },
    initComplete: function() {
	  $('.top').append('<button id="printBtn" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Save a Copy</button>');
	  
	  // Add event listener for button click
	  $('#printBtn').on('click', function() {
	    // Redirect to the PHP file
	    window.open('printNow.php', '_blank');
	  });
	}

  });
});



</script>
<script>
function validateNumberLength(input) {
  const maxLength = 11; // Set the maximum number of digits allowed
  const value = input.value;
  
  if (value.length > maxLength) {
    input.value = value.slice(0, maxLength); // Truncate the input to the maximum length
  }
}
</script>
</body>

</html>
