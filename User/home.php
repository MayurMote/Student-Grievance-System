<?php

require_once '../Shared/process.php';

$reg_id = $_SESSION['registration_id'];

$sql = "SELECT * FROM users WHERE registration_id='$reg_id' ";
$result = $conn->query($sql) or die($conn->error);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];

if(isset($_POST['pwd_submit']))
{
    //something was posted
    $cur_pwd = $_POST['cur_pwd'];
    $new_pwd = $_POST['new_pwd'];
    $conf_pwd = $_POST['conf_pwd'];
    
    $cur_pwd = md5($cur_pwd);
    $new_pwd = md5($new_pwd);
    $conf_pwd = md5($conf_pwd);
    
    if($new_pwd == $conf_pwd)
    {
        $sql = "SELECT * FROM users WHERE email='$email' ";
        $result = $conn->query($sql) or die($conn->error);
        $row = mysqli_fetch_assoc($result);
        
        if($cur_pwd == $row['password'])
        {
            $sql = "UPDATE users SET password= '$new_pwd' WHERE registration_id = '$reg_id' ";
            $result = $conn->query($sql) or die($conn->error);
            
            header("Location: home.php?msg_type=success&msg=Password Updated Successfully!!");
            die;
        }
        else
        {
            header("Location: home.php?msg_type=danger&msg=current password does not match with existing password.!!");
            die;
        }
        
    }
    else
    {
        header("Location: home.php?msg_type=danger&msg=new password and confirmed password does not match.!!");
        die;
    }
} 

if(isset($_POST['update']))
{
    //something was posted
    $u_reg_id = $_POST['reg_id'];
    $u_name = $_POST['name'];
    $u_email = $_POST['email'];
    
    if($u_email == ""){$u_email = $email;}
    if($u_name == ""){$u_name = $name;}
    $sql = "UPDATE users SET name='$u_name', email='$u_email' WHERE registration_id = '$reg_id' ";
    $result = $conn->query($sql) or die($conn->error);
            
    header("Location: home.php?msg_type=success&msg=Profile Updated Successfully!!");
    die;
} 

if(isset($_POST['grievance_submit']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dept = strtoupper($_POST['dept']);
    $grievance_id = (string)uniqid (rand(), true);
    $grievance_id = substr($grievance_id, 0, 10);
    $status = "not yet processed";
    
    $sql = "INSERT INTO grievance(registration_id, grievance_id, title, description, department, status, date_time) Values('$reg_id', '$grievance_id', '$title', '$description', '$dept', '$status', NOW())";
    $result = $conn->query($sql) or die($conn->error);
    header("Location: home.php?msg_type=success&msg=Grievance Added Successfully!!");
    die;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="../Shared/style.css" />
        <title>User Home page</title>
    </head>
    
    <body>
    	<?php if (isset($_GET['msg'])) { ?>
    		<div class="alert alert-<?=$_GET['msg_type'] ?> alert-dismissible fade show" role="alert">
				<?=$_GET['msg']?>
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
			</div>
		<?php } ?>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                	<i class='fas fa-cogs me-2' style='font-size:36px'></i>Grievance</div>
                <div class="list-group list-group-flush my-3">
                    <a href="#ChangePassword" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    	<i class='fas fa-lock me-2' style='font-size:24px'></i>Change Password</a>
                    <a href="#Profile" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    	<i class='fas fa-user-alt me-2' style='font-size:24px'></i>Profile</a>
                    <a href="#LodgeGrievance" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    	<i class='fas fa-book me-2' style='font-size:24px'></i>Lodge Grievance</a>
                    <a href="#TrackStatus" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    	<i class='fas fa-table me-2' style='font-size:24px'></i>Track Status</a>
                    <a href="../Shared/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                            class="fas fa-power-off me-2"></i>Logout</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->
    
            <!-- Page Content -->
            <div id="page-content-wrapper">
            
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h3 class="fs-2 m-0">Welcome <?php echo $name?></h3>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $reg_id?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#Profile">Profile</a></li>
                                <li><a class="dropdown-item" href="#ChangePassword">Settings</a></li>
                                <li><a class="dropdown-item" href="../Shared/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
                      	
                <div id="ChangePassword" style="display:none" class="myDiv">
                	<?php require_once '../Shared/change_password.php';?>
                </div>
                	
                <div id="Profile" style="display:none" class="myDiv">
                	<?php require_once 'profile.php';?>
                </div>
                	
                <div id="LodgeGrievance" style="display:none" class="myDiv">
                	<?php require_once 'lodge_grievance.php';?>
                </div>
                	
                <div id="TrackStatus" style="display:none" class="myDiv">
                	<?php require_once 'track_status.php';?>
                </div>
                
             </div>
            	
            <!-- /#page-content-wrapper -->
            
        </div>
          <footer class="text-center text-lg-start bg-light text-muted">
              <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
               	Copyright &copy;
                <a class="text-reset fw-bold" href="#">www.mdm.com</a>&nbsp;All rights reserved!
              </div>
          </footer>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            var el = document.getElementById("wrapper");
            var toggleButton = document.getElementById("menu-toggle");
    
            toggleButton.onclick = function () {
                el.classList.toggle("toggled");
            };
        </script>
    </body>
    
    
</html>