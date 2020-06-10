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


		// Get url id receive
		$id = $_GET['id'];

		

		/**
		 *  Data update management system
		 */
		if (isset($_POST['update-data'])) {
			// Data receive
			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];
			$location = $_POST['location'];

			// Photo Manage
			$new_photo = $_FILES['new-photo']['name'];
			$old_photo = $_POST['old-photo'];

			if ( empty($new_photo) ) {
				$photo_name = $old_photo;
			}else{

				$data = fileUpload( $_FILES['new-photo'], 'photo/', ['jpg','jpeg','png','gif']);
				$photo_name = $data['file_name'];

			}

			
			// Form validation 
			if( empty($name) || empty($email) || empty($cell) || empty($location) ){
				$mess = "<p class='alert alert-danger'>All fields are required !<button class='close' data-dismiss='alert'>&times;</button></p>";
			}else {

				// Update Data
				$sql = "UPDATE information SET name='$name', email='$email', cell='$cell', location='$location', photo='$photo_name'  WHERE id='$id' ";
				$connection -> query($sql);

				$mess = "<p class='alert alert-success'>Data update successful !<button class='close' data-dismiss='alert'>&times;</button></p>";

			}
			
		}
		// old data
		$sql = "SELECT * FROM information WHERE id='$id'";
		$data = $connection -> query($sql);

		$student_data = $data -> fetch_assoc();
		

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
				<h2>Edit Single Student</h2>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $id; ?>" method='POST' enctype='multipart/form-data'>
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php echo $student_data['name']; ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php echo $student_data['email']; ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php echo $student_data['cell']; ?>"  type="text">
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<input name="location" class="form-control" value="<?php echo $student_data['location']; ?>" type="text">
					</div>
					<div class="form-group">
						<img src="photo/<?php echo $student_data['photo'] ?>" alt="">
						<input name="old-photo" value="<?php echo $student_data['photo'] ?>" type="hidden">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="new-photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name="update-data" class="btn btn-primary" type="submit" value="Update Data">
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