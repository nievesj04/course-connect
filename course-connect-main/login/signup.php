<?php
	require 'database.php';

	$message = '';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$sql = "INSERT INTO users(name, lastname, ci, email, password, img) VALUES (:name, :lastname, :ci, :email, :password, :img)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':name', $_POST['name']);
		$stmt->bindParam(':lastname', $_POST['lastname']);
		$stmt->bindParam(':ci', $_POST['ci']);
		$stmt->bindParam(':email',$_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':img',$_POST['img']);

		if ($stmt->execute()) {
			$message = 'Nuevo Usuario Creado Exitosamente ';
		}else{
			$message = '¡Lo siento! Hubo un error al crear su contraseña';
		}	
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Course Connect | Registrarse</title>
		<link rel="stylesheet" href="assets/css/styles2.css">
		<link rel="stylesheet" href="assets/css/login_form.css">
	</head>
	<body>

		<?php if (!empty($message)):?>
			<p><?= $message ?></p>
		<?php endif;?>


		<h1>Registrarse</h1>
		<span>or <a href="login.php">Iniciar Sesión</a></span>

		<form action="signup.php" method="POST">
			<input type="text" required name="name" placeholder="Nombre">
			<input type="text" required name="lastname" placeholder="Apellido">
			<input type="text" required name="ci" placeholder="Cedula">
			<input type="text" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required name="email" placeholder="E-mail">
			<input type="password" required name="password" placeholder="Contraseña">
			<div class="select">
				<select name="img" class="select">
			        <option name="icon">Icono</option>
			        <option name="rick">Rick</option>
			        <option name="princesa">Dulce_Princesa</option>
			        <option name="perla">Perla</option>
		      	</select>
			</div>
			<input type="submit" value="Enviar">
		</form>

	</body>
</html>