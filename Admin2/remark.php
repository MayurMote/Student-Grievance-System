<?php

include '../Shared/process.php';
$grie_id = $_SESSION['grievance_id'];

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $remark = $_POST['remark'];
    
    $sql = "UPDATE grievance SET remark='$remark' WHERE grievance_id='$grie_id' ";
    $result = $conn->query($sql) or die($conn->error);
    
    header("Location: admin_home.php?msg_type=success&msg=Remark Added Successfully!!");
    die;
}

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
    </head>
    <body>
    	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    		<form class="border shadow p-3 rounded" method="post" style="width: 100%;">
    		    <div class="mb-3">
    		        <label for="name" class="form-label">Remark</label>
    		        <textarea name="remark" class="form-control" rows="4" cols="50"></textarea>
    		    </div>
    		    <div class="text-center">
    		    	<button type="submit" class="btn btn-primary" name="remark_submit">Submit</button>
    		    </div>
    		</form>
    	</div>
    	
    </body>
</html>