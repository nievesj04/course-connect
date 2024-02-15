<?php 
	session_start();

	require '../login/database.php';

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

	$sql = "SELECT * FROM pivot_table INNER JOIN courses WHERE pivot_table.user_id = $userId AND courses.id = pivot_table.course_id";
	$query = mysqli_query(new mysqli($server, $username, $password, $database), $sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Course Connect | <?=$user['name'];?> <?= $user['lastname'];?></title>
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/course-content.css">
        <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    </head>

    <body id="body">

    	<!--------------------------------->
    	<!-- Estructura del menú lateral -->
    	<!--------------------------------->

        <header>
           	<div class="menu__side" id="menu_side">
	            <div class="options__menu"> 

	                <a class="default">
	                    <div class="option profile">
	                        <img src="assets/img/profile_<?= $user['img'];?>.png" alt="">
	                        <h4><?= $user['name'];?> <?= $user['lastname'];?></h4>
	                    </div>
	                </a>
	                    
	                <a class="px15">
	                    <div class="option">
	                        <i class="fa-solid fa-house"></i>
	                        <h4>Inicio</h4>
	                    </div>
	                </a>
        
	                <a class="px15" data-boton="profile">
	                    <div class="option" id="profile_menu">
	                        <i class="fa-solid fa-user"></i>
	                        <h4>Perfil</h4>
	                    </div>
	                </a>

	                <a class="px15" data-boton="saved-courses">
	                    <div class="option" id="saved-courses_menu">
	                        <i class="fa-solid fa-graduation-cap"></i>
	                        <h4>Cursos Guardados</h4>
	                    </div>
	                </a>

	                <a class="logout px15" id="logout" href="logout.php">
	                    <div class="option">
	                        <i class="fa-solid fa-right-from-bracket"></i>
	                        <h4>Cerrar Sesion</h4>
	                    </div>
	                </a>
	            </div>
	        </div>  
        </header>


        <!--------------------------------->
        <!-------Saludo al usuario--------->
        <!--------------------------------->
        <section class="welcome">
            <div class="text">
                <h1>Hola <?= $user['name'];?> <?= $user['lastname'];?>!</h1>
                <h3>Es un placer verte de nuevo</h3>
            </div>
            <img src="assets/img/notion.png" alt="">
        </section>

        <!--------------------------------->
        <!-------Tarjetas de Cursos-------->
        <!--------------------------------->
        <section class="cards" id="cards">
        	
        	<div class="card" 
        	data-code="1"
        	data-cardname="Html y Css"
        	data-course_address="../course_topics/html_y_css.php"
        	data-courseimg="assets/img/programmer.png"
        	data-course_img="assets/img/desarrollo_web_wallpaper.jpg"
        	data-course_description="<li>Introducción a HTML</li>
									<li>Enlaces HTML</li>
									<li>Estructura de contenido/Layout HTML</li>
									<li>Introducción a CSS</li>
									<li>Selectores CSS</li>
									<li>Media Queries CSS</li>"
        	>
        		<a href="#">
        			<img src="assets/img/programmer.png" alt="">
		        	<h2>Html y Css</h2>
		        	<h4>Dificultad: Baja</h4> <br>
        		</a>
        	</div>

        	<div class="card" 
        	data-code="2"
        	data-cardname="Ingles A1"
        	data-course_address="../course_topics/ingles_a1.php"
        	data-courseImg="assets/img/ingles1.png"
        	data-course_img="assets/img/ingles_wallpaper.jpg"
        	data-course_description="<li>Introduccion al Idioma</li>
        							<li>El presente Continuo</li>
									<li>Pronombres Posesivos y Objetivos</li>
									<li>Pasado simple</li>
									<li>Preposiciones In, On, At</li>
									<li>“Going  to”</li>"
			>
        		<a href="#">
        			<img src="assets/img/ingles1.png" alt="">
		        	<h2>Ingles A1</h2>
		        	<h4>Dificultad: Baja</h4>
        		</a>
        	</div>

        	<div class="card" 
        	data-code="3"
        	data-cardname="Integrales"
        	data-course_address="../course_topics/integrales.php"
        	data-courseImg="assets/img/matematicas1-1.png"
        	data-course_img="assets/img/integrales_wallpaper.jpg"
        	data-course_description="<li>Introducción a las Integrales</li>
									<li>Integral Indefinida </li>
									<li>Integral de una Raíz </li>
									<li>Integral de un Polinomio </li>
									<li>Introducción a las Integrales por Sustitución</li>
									<li>Integración por Sustitución </li>"
        	>
        		<a href="#">
        			<img src="assets/img/matematicas1-1.png" alt="">
		        	<h2>Integrales</h2>
		        	<h4>Dificultad: Media</h4>
        		</a>
        	</div>

        	<div class="card"
        	data-code="4"
        	data-cardname="Reposteria"
        	data-course_address="../course_topics/reposteria.php"
        	data-courseImg="assets/img/reposteria1.png"
        	data-course_img="assets/img/reposteria_wallpaper.jpg"
        	data-course_description="<li>Torta tres leches</li>
									<li>Bizcocho</li>
									<li>Crema Chantilly</li>
									<li>Torta Normal</li>
									<li>Butter Cream</li>
									<li>Postre sin Horno</li>"
        	>
        		<a href="#">
        			<img src="assets/img/reposteria1.png" alt="">
		        	<h2>Resposteria</h2>
		        	<h4>Dificultad: Baja</h4>
        		</a>
        	</div>

        	<div class="card"
        	data-code="5"
        	data-cardname="Ofimatica 1/3"
        	data-course_address="../course_topics/ofimatica_1.php"
        	data-courseImg="assets/img/ofimatica.png"
        	data-course_img="assets/img/word_wallpaper.jpg"
        	data-course_description="<li>Introducción a Word</li>
									<li>Viñetas, sangrías y tabulación de Datos</li>
									<li>Insertar imágenes</li>
									<li>Tablas y estilos de Tablas</li>
									<li>Enumerar Paginas “Pie de Página”</li>
									<li>Separar Correspondencia</li>"
        	>
        		<a href="#">
        			<img src="assets/img/ofimatica.png" alt="">
		        	<h2>Ofimatica 1/3</h2>
		        	<h4>Dificultad: Baja</h4>
        		</a>
        	</div>	
        </section>

        <!--------------------------------->
        <!---------Panel Lateral----------->
        <!--------------------------------->
        <section class="panel_lateral_all">
        	
        	<!---------Panel Perfil----------->
        	<div class="container-panel" id="container-panel-profile">
	        	<div class="cont-panel">
	        		<a id="exit-panel-profile" class="exit-panel">X</a>
		        	<div class="content-panel-profile">
		        		<div class="img-panel">
		        			<img src="assets/img/profile_<?= $user['img'];?>.png" alt="">
		        		</div>
		        		<h3>Nombre: <?= $user['name'];?></h3>
		        		<h3>Apellido: <?= $user['lastname'];?></h3>
		        		<h3>Cedula:  <?= $user['ci'];?></h3>
		        		<h3> <?= $user['email'];?></h3>
		        	</div>
		        	<div class="editar">
		        		<a href="update.php?id=<?= $user['id'];?>"><button>Editar</button></a>
		        	</div>
	        	</div>
	        </div>


	        <!---------Panel Cursos Guardados----------->

	        <div class="container-panel" id="container-panel-saved-courses">
	        	<div class="cont-panel" id="cont_panel_saved_courses">
	        		<a id="exit-panel-saved-courses" class="exit-panel">X</a>
		        	<h1>Cursos Guardados</h1>
		        	   	
		        <?php while($row = mysqli_fetch_array($query)):?>
		        	<a href="<?= $row['php_course'];?>" class="courses-saved-cards">
		        		<div class="courses-saved-cards">
			        		<img src="<?= $row['img_course'];?>" alt="">
			        		<h3><?= $row['course_name'];?></h3>
			        		<a href="delete_course.php?id=<?= $row['id'];?>" class="course-remove">X</a>	
			        	</div>
		        	</a>
		        <?php endwhile; ?>
		        
	        	</div>
	        </div>
        </section>

        <section class="card_overlay" id="card_overlay">
			<div class="card_show" id="card_show">
				<span class="close_info" id="close_info">
					<a>X</a>
				</span>

				<!-- 
				<div class="content-courses" data-content_course="${courseName}" id="content_courses_id">
					<img src="${courseImgOverlay}" alt="">	
					<div class="content-courses-text">
						<h1>${courseName}</h1>
						<h3>Contenido:</h3>
						${courseDescription}
						<button class="espezar-curso" id="empezar-curso" data-course_name="${courseName}">Empezar Curso</button>
					</div>
				</div> 
				 -->
				
			</div>
		</section>
    </body>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/course-content.js"></script>
</html>