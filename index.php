<?php require_once './Shared/process.php';?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <title> Student Grievance Management Portal</title>
        <style>
          #intro 
          {
            background-image: url("Images/back_ground.png");
            height: 100vh;
          }
        </style>
    </head>
    <body>
    	<?php if (isset($_GET['new_user'])) { ?>
    		<div class="alert alert-success alert-dismissible fade show" role="alert">
				   <?=$_GET['new_user']?>
				     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
			</div>
		<?php } ?>
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Grievance Management System</a>

            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./User/signup.php">User Registration</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="./User/login.php">User Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="./Shared/admin_login.php">Admin Login</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div id="intro" class="bg-image shadow-2-strong"> </div>
        
          <footer class="text-center text-lg-start bg-light text-muted">
              <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
               	Copyright &copy; 2022
                <a class="text-reset fw-bold" href="#">www.mdm.com</a>&nbsp;All rights reserved!
              </div>
          </footer>
        
    </body>
</html>