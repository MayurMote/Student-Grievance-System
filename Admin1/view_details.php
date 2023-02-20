<?php 
include '../Shared/process.php';
$data1 = $_SESSION['data1'];
$data2 = $_SESSION['data2'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>View Details</title>
</head>
 <body>
  	<div class="container d-flex justify-content-center align-items-center">
    <div class="card" style="width: 50rem;">
      <div class="card-header">
        <h2>Grievance Details</h2>
      </div>
      <div class="card-body">
    			<span class="font-weight-bold">User Name: </span> <?php echo $data2['name']?> <br> <br>
    			<span class="font-weight-bold">Email: </span> <?php echo $data2['email']?> <br> <br>
    			<span class="font-weight-bold">Registration ID: </span> <?php echo $data2['registration_id']?> <br> <br>
    			<span class="font-weight-bold">Grievance ID: </span> <?php echo $data1['grievance_id']?> <br> <br>
    			<span class="font-weight-bold">Concern Department: </span> <?php echo $data1['department']?> <br> <br>
    			<span class="font-weight-bold">Date and Time: </span> <?php echo $data1['date_time']?> <br> <br>
    			<span class="font-weight-bold">Title: </span> <?php echo $data1['title']?> <br> <br>
    			<span class="font-weight-bold">Desciption: </span> <?php echo $data1['description']?> <br> <br>
    			<span class="font-weight-bold">Status: </span> <?php echo $data1['status']?> <br> <br>

        <a href="admin_home.php#ManageGrievance" class="btn btn-primary">Close</a>
      </div>
    </div>
    </div>

   </body>
 </html>