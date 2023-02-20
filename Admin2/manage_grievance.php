<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>Manage Grievances</title>
</head>
<body>
	<div class="container my-5">
	<h2>Manage Grievances</h2>
	<br>	
	<div class="row justify-content-center">
	<?php 
	    $result = $conn->query("SELECT * FROM grievance WHERE department = '$dept' AND status!='not yet processed' AND status!='Discarded' ") or die($conn->error);
	?>
		<table class="table">
			<thead>
				<tr>
					<th>Grievance ID</th>
					<th>Department</th>
					<th>Status</th>
					<th colspan='4' style="padding-left:100px">Action</th> 
				</tr>
			</thead>
				<?php while($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['grievance_id']; ?></td>
					<td><?php echo $row['department']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td>
						<a href="admin_home.php?resolved=<?php echo $row['grievance_id']?>" 
						   class="btn btn-warning <?php if($row['status'] != 'In Progress') {echo 'disabled';}?>">Resolved</a>
						<a href="admin_home.php?view=<?php echo $row['grievance_id']?>" 
						   class="btn btn-info" >View</a>
						<a href="admin_home.php?reject=<?php echo $row['grievance_id']?>" 
						   class="btn btn-danger <?php if($row['status'] == 'Rejected' || $row['status'] == 'Resolved') {echo 'disabled';}?>" >Reject</a>
						<a href="admin_home.php?remark=<?php echo $row['grievance_id']?>" 
						   class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Add Remark"><i class='fas fa-edit' style='font-size:24px'></i></a>

					</td>
				</tr>
				<?php endwhile; ?>
		</table>
	</div>    
	    

	</div>
</body>
</html>