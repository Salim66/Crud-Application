<?php 

	require_once 'app/db.php';
	require_once 'app/function.php';

	// Single data select
	$id = $_GET['id'];

	$sql = "DELETE FROM information WHERE id='$id'";
	$connection -> query($sql);

	header("location:all-students.php");