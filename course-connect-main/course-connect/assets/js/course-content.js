const card = document.querySelectorAll('.card');
const card_overlay = document.querySelector('.card_overlay');
const card_show = document.querySelector('.card_show');
const close_info = document.querySelector('.close_info');
const content_courses = document.getElementById('card_show');

card.forEach((elemento) => {	
	elemento.addEventListener('click', (evento) => {
		evento.preventDefault();
		let courseName = evento.target.parentNode.parentNode.dataset.cardname;
		let courseDescription = evento.target.parentNode.parentNode.dataset.course_description;
		let courseImgOverlay = evento.target.parentNode.parentNode.dataset.course_img;
		let courseimg = evento.target.parentNode.parentNode.dataset.courseimg;
		let code = evento.target.parentNode.parentNode.dataset.code;
		let course_address = evento.target.parentNode.parentNode.dataset.course_address;
		card_overlay.classList.add('show');
		card_show.classList.add('show');

		content_courses.insertAdjacentHTML('beforeend',`
				<a href="main.php">
					<div class="content-courses" data-content_course="${courseName}" id="content_courses_id">
						<img src="${courseImgOverlay}" alt="">	
						<div class="content-courses-text">
							<h1>${courseName}</h1>
							<h3>Contenido:</h3>
							${courseDescription}
							<form action="../login/agg.php" method="POST">
								<input class="hidden" type="number" name="code" value="${code}" />
					        	<input class="empezar_curso"type="submit" value="Empezar Curso">
					        </form>
						</div>
					</div>
				</a> 
		`);


		const content_courses_id = document.getElementById('content_courses_id');

		close_info.addEventListener('click', () => {
			card_overlay.classList.remove('show');
			card_show.classList.remove('show');
			if (content_courses_id) {
				content_courses_id.remove();
			}
		})



	


		// const cont_panel_saved_courses = document.getElementById('cont_panel_saved_courses')
		// const empezar_curso = document.getElementById('empezar-curso');

		// empezar_curso.addEventListener('click', () => {
		// 	cont_panel_saved_courses.insertAdjacentHTML('beforeend',`
		// 			<div data-course-name="${courseName}" class="courses-saved-cards" id="courses_saved_id_${code}">
		//         		<img src="${courseimg}" alt="">
		//         		<h3>${courseName}</h3>
		//         		<a class="course-remove remove-course-${code}">X</a>	
		//         	</div>
		// 	`);

		// 	const course_remove = document.querySelector('.remove-course-'+code);
		// 	const courses_saved_id = document.getElementById('courses_saved_id_'+code);

		// 	course_remove.addEventListener('click', () => {
		// 		if (courses_saved_id) {
		// 			courses_saved_id.remove();
		// 		}
		// 	})
		// })


	});
});






