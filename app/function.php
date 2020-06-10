<?php 


	// Data recovary
	function old($name) {

		if ( isset($_POST[$name]) ) {
			
			echo $_POST[$name];

		}
	}

	// Photo receive
	function fileUpload($photo, $location, $format) {
		$photo_name = $photo['name'];
		$photo_tmp_name = $photo['tmp_name'];

		// photo name extension
		$photo_array = explode(".", $photo_name);
		$photo_extension = strtolower(end($photo_array));


		// Unique photo name
		$uphoto_name = md5(time().rand()). '.' .$photo_extension;

		if ( in_array($photo_extension, $format) ) {
			// Uploade photo
			move_uploaded_file($photo_tmp_name, $location.$uphoto_name);
			$status = 'yes';
		}else{
			$status = 'no';
		}

		return [
			
			'file_name' => $uphoto_name,
			'status' => $status

		];
	}


