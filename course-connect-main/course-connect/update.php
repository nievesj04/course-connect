<?php 
	
	require '../login/database.php';

	$id = $_GET['id'];

	$sql = "SELECT * FROM users WHERE id=$id";
	$query = mysqli_query(new mysqli($server, $username, $password, $database), $sql);

	$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Course Connect | Editar Usuario</title>
		<link rel="stylesheet" href="../login/assets/css/styles2.css">
		<link rel="stylesheet" href="../login/assets/css/login_form.css">
	</head>
	<body>

		<h1>Editar Usuario</h1>

		<form action="edit_user.php" method="POST">
			<input type="hidden" name="id" value="<?= $row['id'];?>"> 
			<input type="text" name="name" placeholder="Nombre" value="<?= $row['name'];?>">
			<input type="text" name="lastname" placeholder="Apellido" value="<?= $row['lastname'];?>">
			<input type="text" name="ci" placeholder="Cedula" value="<?= $row['ci'];?>">
			<input type="text" name="email" placeholder="Email" value="<?= $row['email'];?>">
			<input type="password" name="password" placeholder="Contraseña">
			<select name="img" class="select">
				<option name="icon">Icono</option>
		        <option name="rick">Rick</option>
		        <option name="princesa">Dulce_Princesa</option>
		        <option name="perla">Perla</option>
	      	</select>
			<input type="submit" value="Enviar">
		</form>

	</body>
</html>