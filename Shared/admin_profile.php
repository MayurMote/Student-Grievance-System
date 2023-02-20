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
    		<form class="border shadow p-3 rounded" method="post"  style="width: 100%;">
    			<h1 class="text-center p-3">Profile</h1>
    		    <div class="mb-3">
    		        <label for="name" class="form-label">Username</label>
    		        <input type="text" class="form-control" name="username" disabled value=<?php echo $user?>>
    		    </div>
    		    <div class="mb-3">
    		        <label for="name" class="form-label">Email</label>
    		        <input type="text" class="form-control" name="email" value="<?php echo $email?>">
    		    </div>
    		    <div class="mb-3">
    		        <label for="username" class="form-label">Department</label>
    		        <select class="form-control" name="dept">
                          <option value="computer" <?php if($dept=='COMPUTER') {echo 'selected';} ?> >Computer</option>
                          <option value="entc" <?php if($dept=='ENTC') {echo 'selected';} ?> >ENTC</option>
                          <option value="it" <?php if($dept=='IT') {echo 'selected';} ?> >IT</option>
                          <option value="admission" <?php if($dept=='ADMISSION') {echo 'selected';} ?> >Admission</option>
                          <option value="library" <?php if($dept=='LIBRARY') {echo 'selected';} ?> >Library</option>
                          <option value="tnp" <?php if($dept=='TNP') {echo 'selected';} ?> >Training and Placement</option>
                          <option value="other" <?php if($dept=='OTHER') {echo 'selected';} ?> >Other</option>
                    </select>   
    		    </div>
    		    <br>
    		    <div class="text-center">
    		    	<button type="submit" class="btn btn-primary" name="update">Update</button><br><br>
    		    </div>
    		</form>
    	</div>
    	
    </body>
</html>