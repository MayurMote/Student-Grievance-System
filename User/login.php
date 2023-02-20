<?php 
   
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {   ?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <title> User Login Page</title>
    </head>
    <body>
    	<?php require_once '../Shared/process.php';?>
    	
    	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    		<form class="border shadow p-3 rounded" action="check-login.php"  method="post"  style="width: 450px;">
    			<h1 class="text-center p-3">LOGIN</h1>
    			<?php if (isset($_GET['error'])) { ?>
    			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				    <?=$_GET['error']?>
				     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
			    </div>
			    <?php } ?>
    		    <div class="mb-3">
    		        <label for="username" class="form-label">Registration Id/ Email-Id</label>
    		        <input type="text" class="form-control" name="username" id="username">
    		    </div>
    		    <div class="mb-3">
    		        <label for="password" class="form-label">Password</label>
    		    	<input type="password" class="form-control" name="password" id="password">
    		    </div>
    		    <br>
    		    <div class="text-center">
    		    	<button type="submit" class="btn btn-primary">LOGIN</button><br><br>
    		    </div>
		  		<p>Don't have an account yet?<a href="signup.php">Sign Up</a>
    		</form>
    	</div>
    	
    </body>
</html>
<?php }
else
{
	header("Location: home.php");
} ?>