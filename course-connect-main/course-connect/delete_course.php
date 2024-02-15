<?php 
	
	require '../login/database.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM pivot_table WHERE course_id=$id";

	$query = mysqli_query(new mysqli($server, $username, $password, $database), $sql);

	if ($query) {
		header("Location: main.php");
	};

?>