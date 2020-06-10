<?php require_once 'app/db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table shadow">
		<a class="btn btn-info" href="all-students.php">Show all students</a>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<?php 

					if ( isset($mess) ) {
						echo $mess;
					}

				 ?>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
					<input name="search" type="text" placeholder="Location">
					<input name="search-button" class="btn btn-info btn-sm" type="submit" value="Search">
				</form>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Location</th>
							<th>photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							// Database thake data dhorar podhoti holo ba data katar podhoti holo
							// fetch_array()
							// fetch_assoc()
							// fetch_object()
							// fetch_all()


							if ( isset($_POST['search-button']) ) {
								$search = $_POST['search'];

							
								// select data from database
								$sql = "SELECT * FROM information WHERE location='$search'";
								$data = $connection -> query($sql);
								
							}



							if( isset($search) ):
							while ( $fdata = $data -> fetch_assoc() ) :

						 ?>
						<tr>
							<td><?php echo $fdata['id'] ?></td>
							<td><?php echo $fdata['name'] ?></td>
							<td><?php echo $fdata['email'] ?></td>
							<td><?php echo $fdata['cell'] ?></td>
							<td><?php echo $fdata['location'] ?></td>
							<td><img src="photo/<?php echo $fdata['photo']; ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="show.php?id=<?php echo $fdata['id']; ?>">View</a>
								<a class="btn btn-sm btn-warning" href="edit.php?id=<?php echo $fdata['id']; ?>">Edit</a>
								<a id='delete-item' class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $fdata['id']; ?>">Delete</a>
							</td>
						</tr>
						
						<?php endwhile; endif; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		
		$('a#delete-item').click(function() {

			let val = confirm('Are you sure?');

			if (val == true) {
				return true;
			} else {
				return false;
			}
		});

	</script>
</body>
</html>