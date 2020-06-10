<?php require_once 'app/db.php' ?>
<?php require_once 'app/function.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

	<?php 

		// Single data select
		$id = $_GET['id'];

		// databse connecton and select data
		$sql = "SELECT * FROM information WHERE id='$id' ";
		$all_data = $connection -> query($sql);

		$fvalue = $all_data -> fetch_assoc();

	 ?>
	
	<div style="width: 450px;" class="wrap-table shadow">
		<a class="btn btn-info" href="all-students.php">Back</a>
		<div class="card">
			<div class="card-body"> 
				<img style="width: 150px;" class="mx-auto d-block img-thumbnail" src="photo/<?php echo $fvalue['photo']; ?>" alt="">
				<table class="table">
					<tr>
						<td>Name</td>
						<td><?php echo $fvalue['name'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $fvalue['email'] ?></td>
					</tr>
					<tr>
						<td>Cell</td>
						<td><?php echo $fvalue['cell'] ?></td>
					</tr>
					<tr>
						<td>Location</td>
						<td><?php echo $fvalue['location'] ?></td>
					</tr>
				</table>
			</div>
		</div>
		
	</div>


	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>