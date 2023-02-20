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
    			<h1 class="text-center p-3">Change Password</h1>
    		    <div class="mb-3">
    		        <label for="name" class="form-label">Current Password</label>
    		        <input type="password" class="form-control" name="cur_pwd" id="cur_pwd">
    		    </div>
    		    <div class="mb-3">
    		        <label for="name" class="form-label">New Password</label>
    		        <input type="password" class="form-control" name="new_pwd" id="new_pwd">
    		    </div>
    		    <div class="mb-3">
    		        <label for="username" class="form-label">Confirm Password</label>
    		        <input type="password" class="form-control" name="conf_pwd" id="conf_pwd">
    		    </div>
    		    <br>
    		    <div class="text-center">
    		    	<button type="submit" class="btn btn-primary" name="pwd_submit" id="pwd_submit">Submit</button><br><br>
    		    </div>
    		</form>
    	</div>
    	
    </body>
</html>