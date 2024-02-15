<?php 

	require '../login/database.php';

	$id = $_POST['id'];
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$ci = $_POST['ci'];
	$email = $_POST['email'];
	$passwordUser = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$img = $_POST['img'];

	$sql = "UPDATE users SET name='$name', lastname='$lastname', ci=$ci, email='$email', password='$passwordUser', img='$img' WHERE id='$id'";

	$query = mysqli_query(new mysqli($server, $username, $password, $database), $sql);

	if ($query) {
		header("Location: main.php");
	};

?>