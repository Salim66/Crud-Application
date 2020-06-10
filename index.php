<?php require_once 'app/db.php'; ?>
<?php require_once 'app/function.php'; ?>
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
	
	<?php 
		/**
		 *  Form management system validation with database
		 */
		if (isset($_POST['signup'])) {
			// Data receive
			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];
			$location = $_POST['location'];

			
			if ( empty($name) || empty($email) || empty($cell) || empty($location)) {
				$mess = "<p class='alert alert-danger'>All fields are required !<button class='close' data-dismiss='alert' >&times;</button></p>";
			} else {

				// Upload photo with validation
				$photo_data = fileUpload($_FILES['photo'], ['jpg','png','jpeg','gif']);
				$students_data = $photo_data['file-name'];


				if ($photo_data['status'] == 'yes') {
					// Insert data in DataBase 
					$sql = "INSERT INTO information(name, email, cell, location, photo, status) VALUES('$name','$email','$cell', '$location', '$students_data', 'active')";
					$connection -> query($sql);

					$mess = "<p class='alert alert-success'>Data stable !<button class='close' data-dismiss='alert' >&times;</button></p>";
				} else {
					$mess = "<p class='alert alert-warning'>Invalid image format !<button class='close' data-dismiss='alert' >&times;</button></p>";
				}
				
				
			}
			
		}

	 ?>

	<div class="wrap shadow">
		<a class="btn btn-info" href="all-students.php">All students</a>
		<div class="card">
			<?php 

				if ( isset($mess) ) {
					echo $mess;
				}

			 ?>
			<div class="card-body">
				<h2>Sign Up</h2>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST' enctype='multipart/form-data'>
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php echo old('name'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php echo old('email'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php echo old('cell'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<input name="location" class="form-control" value="<?php echo old('location'); ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name="signup" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>