<?php 
	session_start();

	require 'database.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT * FROM users WHERE id = :id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results;
		}
	}	

	$userId = $user['id'];
	$code = $_POST['code'];

	
	$sqlInsert = "INSERT INTO pivot_table (user_id, course_id) VALUES ($userId, $code)";
	$queryInsert =  mysqli_query(new mysqli($server, $username, $password, $database), $sqlInsert);

	$sql2 = "SELECT * FROM courses WHERE id = $code";
	$query2 =  mysqli_query(new mysqli($server, $username, $password, $database), $sql2);

	$row = mysqli_fetch_array($query2);

	$addressCourse = $row['php_course'];

	if ($queryInsert) {
		header("Location: $addressCourse");
	};

?>