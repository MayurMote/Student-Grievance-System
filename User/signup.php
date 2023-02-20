<?php

require_once '../Shared/process.php'; 
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $reg_id = $_POST['reg_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    
    if(!empty($reg_id) && !empty($password) && !empty($email) && !empty($name))
    {
        //save to database
        $query = "insert into users (registration_id, name, email, password) values ('$reg_id', '$name', '$email','$password')";
        $conn->query($query) or die($conn->error);
        
        header("Location: ../index.php?new_user=Registration Successful!!");
        die;
        
    }
    else
    {
        header("Location: signup.php?error=Enter Valid Information!!");
        die;
    }
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
        <link rel="stylesheet" href="style.css">
        <title> Sign-Up Page</title>
    </head>
    <body>
    	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    		<form class="border shadow p-3 rounded" method="post"  style="width: 450px;">
    			<h1 class="text-center p-3">Sign Up</h1>
    			<?php if (isset($_GET['error'])) { ?>
    			<div class="alert alert-danger" role="alert">
				    <?=$_GET['error']?>
			    </div>
			    <?php } ?>
    		    <div class="mb-3">
    		        <label for="name" class="form-label">College Registration Id</label>
    		        <input type="text" class="form-control" name="reg_id" id="reg_id" >
    		    </div>
    		    <div class="mb-3">
    		        <label for="name" class="form-label">Name</label>
    		        <input type="text" class="form-control" name="name" id="name">
    		    </div>
    		    <div class="mb-3">
    		        <label for="username" class="form-label">Email-Id</label>
    		        <input type="text" class="form-control" name="email" id="email" >
    		    </div>
    		    <div class="mb-3">
    		        <label for="password" class="form-label">Password</label>
    		    	<input type="password" class="form-control" name="password" id="password">
    		    </div>
    		    <br>
    		    <div class="text-center">
    		    	<button type="submit" class="btn btn-primary">Sign-Up</button><br><br>
    		    </div>
		  		<p>Already have an account ?<a href="login.php">Login</a>
    		</form>
    	</div>
    	
    </body>
</html>