<?php

require_once '../Shared/process.php';

if (isset($_POST['username']) && isset($_POST['password']) ) 
{
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    
    if (empty($username)) 
    {
        header("Location: login.php?error=User Name is Required");
    }
    else if (empty($password)) 
    {
        header("Location: login.php?error=Password is Required");
    }
    else 
    {
        // Hashing the password
        $password = md5($password);
        
        $sql = "SELECT * FROM users WHERE (email='$username' OR registration_id='$username') AND password='$password'";
        $result = $conn->query($sql) or die($conn->error);
        
        
        if (mysqli_num_rows($result) === 1) 
        {
            // the user name must be unique
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password && ($row['email'] == $username || $row['registration_id'] == $username)) 
            {
                $_SESSION['registration_id'] = $row['registration_id'];
                
                header("Location: home.php");
            }
            else 
            {
                header("Location: login.php?error=Incorect User name or password");
            }
        }
        else 
        {
            header("Location: login.php?error=Incorect User name or password");
        }
        
    }
}
else 
{
	header("Location: ../index.php");
}

?>