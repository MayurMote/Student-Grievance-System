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
    			<h1 class="text-center p-3">Lodge Grievance</h1>
    		    <div class="mb-3">
    		        <label for="name" class="form-label">Title</label>
    		        <input type="text" class="form-control" name="title">
    		    </div>
    		    <div class="mb-3">
    		        <label for="name" class="form-label">Description</label>
    		        <textarea name="description" class="form-control" rows="4" cols="50"></textarea>
    		    </div>
    		    <div class="mb-3">
    		        <label for="username" class="form-label">Concerned Department</label>
    		        <select class="form-control" name="dept">
                          <option value="computer">Computer</option>
                          <option value="entc">ENTC</option>
                          <option value="it">IT</option>
                          <option value="admission">Admission</option>
                          <option value="library">Library</option>
                          <option value="tnp">Training and Placement</option>
                          <option value="other">Other</option>
                    </select>      
    		    </div>
    		    
    		    <br>
    		    <div class="text-center">
    		    	<button type="submit" class="btn btn-primary" name="grievance_submit">Submit</button><br><br>
    		    </div>
    		</form>
    	</div>
    	
    </body>
</html>