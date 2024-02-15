<!-- My Code -->


<?php 
	session_start();

	require 'database.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results;
		}		
	}	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Course Connect | Login</title>
		<link rel="stylesheet" href="assets/css/styles2.css">
		<link rel="stylesheet" href="assets/css/login_form.css">
	</head>
	<body>
		<div class="hero"></div>
		<?php if (!empty($user)): ?>
			<br> Welcome. <b><?= $user['email']; ?></b>
			<br>You're successfully Logged In
			<a href="../course-connect/logout.php">
				Logout
			</a> 
		<?php else: ?>
			<h1>Inicia Sesión o Registrate</h1>
			
			<a href="login.php">Iniciar Sesión</a> or
			<a href="signup.php">Registrarse</a>
		<?php endif; ?>

	</body>

</html>