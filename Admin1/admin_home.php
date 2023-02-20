<?php

require_once '../Shared/process.php';

$user = $_SESSION['username'];
$email = $_SESSION['admin_email'];

$sql = "SELECT * FROM admins WHERE username='$user' ";
$result = $conn->query($sql) or die($conn->error);
$row = mysqli_fetch_assoc($result);
$dept = strtoupper($row['department']);

$sql = "SELECT * FROM grievance";
$result = $conn->query($sql) or die($conn->error);
$total = mysqli_num_rows( $result );

$sql = "SELECT * FROM grievance WHERE status='resolved'";
$result = $conn->query($sql) or die($conn->error);
$resolved = mysqli_num_rows( $result );

$sql = "SELECT * FROM grievance WHERE status='discarded' OR status='rejected'";
$result = $conn->query($sql) or die($conn->error);
$discarded = mysqli_num_rows( $result );

$sql = "SELECT * FROM grievance WHERE status='not yet processed' OR status='In Progress'";
$result = $conn->query($sql) or die($conn->error);
$pending = mysqli_num_rows( $result );

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
        $sql = "SELECT * FROM admins WHERE username='$user' ";
        $result = $conn->query($sql) or die($conn->error);
        $row = mysqli_fetch_assoc($result);
        
        if($cur_pwd == $row['password'])
        {
            $sql = "UPDATE admins SET password= '$new_pwd' WHERE username = '$user' ";
            $result = $conn->query($sql) or die($conn->error);
            
            header("Location: admin_home.php?msg_type=success&msg=Password Updated Successfully!!");
            die;
        }
        else
        {
            header("Location: admin_home.php?msg_type=danger&msg=current password does not match with existing password.!!");
            die;
        }
        
    }
    else
    {
        header("Location: admin_home.php?msg_type=danger&msg=new password and confirmed password does not match.!!");
        die;
    }
}

if(isset($_POST['update']))
{
    $a_email = $_POST['email'];
    $dept = strtoupper($_POST['dept']);
    
    if($a_email == ""){$a_email = $email;}
    if($dept == ""){$dept = "-";}
    $sql = "UPDATE admins SET department='$dept', email='$a_email' WHERE username='$user' ";
    $result = $conn->query($sql) or die($conn->error);
    
    header("Location: admin_home.php?msg_type=success&msg=Profile Updated Successfully!!");
    die;
} 

if(isset($_GET['forward']))
{
    $grie_id = $_GET['forward'];
    $sql = "UPDATE grievance SET status='In Progress' WHERE grievance_id='$grie_id' ";
    $result = $conn->query($sql) or die($conn->error);
    header("Location: admin_home.php?msg_type=success&msg=Grievance Forwarded Successfully!!");
    die;
}

if(isset($_GET['view']))
{
    $grie_id = $_GET['view'];
    $result = $conn->query("SELECT registration_id FROM grievance WHERE grievance_id = '$grie_id'") or die($conn->error);
    $data = mysqli_fetch_assoc($result);
    $reg_id = $data['registration_id'];
    
    $result1 = $conn->query("SELECT * FROM grievance WHERE grievance_id = '$grie_id'") or die($conn->error);
    $result2 = $conn->query("SELECT * FROM users WHERE registration_id = '$reg_id'") or die($conn->error);
    $data1 = mysqli_fetch_assoc($result1);
    $data2 = mysqli_fetch_assoc($result2);
    $_SESSION['data1'] = $data1;
    $_SESSION['data2'] = $data2;
    
    
    header("Location: view_details.php");
    die;
}

if(isset($_GET['remark']))
{
    $grie_id = $_GET['remark'];
    $_SESSION['grievance_id'] = $grie_id;
    header("Location: remark.php");
    die;
}

if(isset($_GET['discard']))
{
    $grie_id = $_GET['discard']; 
    $sql = "UPDATE grievance SET status='Discarded' WHERE grievance_id='$grie_id' ";
    $result = $conn->query($sql) or die($conn->error);
    header("Location: admin_home.php?msg_type=success&msg=Grievance has been discarded Successfully!!");
    die;
}

if(isset($_POST['submit']))
{
    $name = $_POST['uname'];
    $department = strtoupper($_POST['dept']);
    $emaill = $_POST['email'];
    $password = $_POST['pwd'];
    $password = md5($password);
    
    if($department == ""){$department = "-";}
    
    $sql = "INSERT INTO admins VALUES('$name', '$department', '$emaill', '$password')";
    $result = $conn->query($sql) or die($conn->error);
    
    header("Location: admin_home.php?msg_type=success&msg=New Admin Added Successfully!!");
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
        <title>Admin Home page</title>
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
                    <a href="#Dashboard" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    	<i class="fas fa-tachometer-alt me-2" style='font-size:24px'></i>Dashboard</a>
                    <a href="#ChangePassword" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    	<i class='fas fa-lock me-2' style='font-size:24px'></i>Change Password</a>
                    <a href="#Profile" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    	<i class='fas fa-user-alt me-2' style='font-size:24px'></i>Profile</a>
                    <a href="#ManageGrievance" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    	<i class='fas fa-book me-2' style='font-size:24px'></i>Manage Grievances</a>
                    <a href="#AddNewAdmin" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    	<i class='fas fa-user-plus me-2' style='font-size:24px'></i>Add New Admin</a>
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
                        <h3 class="fs-2 m-0">Welcome <?php echo $user?></h3>
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
                                    <i class="fas fa-user me-2"></i><?php echo $user?>
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
            
                <div id="Dashboard" style="display:none" class="myDiv">
                	<h1>Dashboard</h1>
                	<?php require_once '../Shared/dashboard.php';?>
                </div>
                	
                <div id="ChangePassword" style="display:none" class="myDiv">
                	<?php require_once '../Shared/change_password.php';?>
                </div>
                	
                <div id="Profile" style="display:none" class="myDiv">
                	<?php require_once '../Shared/admin_profile.php';?>
                </div>
                	
                <div id="ManageGrievance" style="display:none" class="myDiv">
                	<?php require_once 'manage_grievance.php';?>
                </div>
                	                	
                <div id="AddNewAdmin" style="display:none" class="myDiv">
                	<?php require_once '../Shared/add_new_admin.php';?>
                </div>
                
            </div>
    
            <!-- /#page-content-wrapper -->

        </div>
          <footer class="text-center text-lg-start bg-light text-muted">
              <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
               	Copyright &copy; 2022
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