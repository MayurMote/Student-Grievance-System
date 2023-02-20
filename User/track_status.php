<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <title> Track Status</title>
</head>
<body>
	<div class="container my-5">
	<h2>Grievance Status</h2>
	<br>	
	<div class="row justify-content-center">
	<?php 
	    $result = $conn->query("SELECT * FROM grievance WHERE registration_id='$reg_id'") or die($conn->error);
	?>
		<table class="table">
			<thead>
				<tr>
					<th>Grievance ID</th>
					<th>Title</th>
					<th>Date and Time</th>
					<th>Status </th>
					<th>Remark</th>
				</tr>
			</thead>
				<?php while($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['grievance_id']; ?></td>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $row['date_time']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td><?php echo $row['remark']; ?></td>
				</tr>
				<?php endwhile; ?>
		</table>
	</div>    
	    

	</div>
</body>
</html>