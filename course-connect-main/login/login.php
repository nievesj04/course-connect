<?php
	session_start();

	if (isset($_SESSION['user_id'])) {
		header('Location: /php-login');
	}

	require 'database.php';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
			$_SESSION['user_id'] = $results['id'];
			header('Location: ../course-connect/main.php');
		}else{
			$message = 'Lo siento! Email o Contraseña Incorrecta';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Iniciar Sesión</title>
		<link rel="stylesheet" href="assets/css/styles2.css">
		<link rel="stylesheet" href="assets/css/login_form.css">
	</head>
	<body>
		
		<?php if (!empty($message)): ?>
			<p> <?= $message ?></p>
		<?php endif; ?>

		<h1>Iniciar Sesión</h1>
		<span>o <a href="signup.php">Registrarse</a></span>

		<form action="login.php" method="POST">
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Contraseña">
			<input type="submit" value="Iniciar">
		</form>
		
	</body>
</html>