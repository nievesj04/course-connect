const side_menu = document.getElementById("menu_side");
const btn_open = document.getElementById("btn_open");
const body = document.getElementById("body");

//Mostrar y Ocultar el Menú
    
side_menu.addEventListener("mouseover", function ( event ) {
    body.classList.add("body_move");
    side_menu.classList.add("menu__side_move");
});

side_menu.addEventListener("mouseout", function ( event ) {
    body.classList.remove("body_move");
    side_menu.classList.remove("menu__side_move"); 
});



// Mostrar Panel Lateral.

var dataset_options = document.querySelectorAll('.menu__side a h4');

dataset_options.forEach((elemento) => {	
	
	elemento.addEventListener('click', (evento) => {
		evento.preventDefault();
		var x = evento.target.parentNode.parentNode.dataset.boton;
		
		const profile_menu = document.getElementById(x+"_menu");
		const panel_lateral = document.getElementById('container-panel-'+x);
		const exit_panel = document.getElementById("exit-panel-"+x);
		const panel_lateral_all = document.querySelectorAll('.panel_lateral_all')

		profile_menu.addEventListener('click', () => {
			panel_lateral.classList.add('active');
		})

		exit_panel.addEventListener('click', () => {
			panel_lateral.classList.remove('active');
		})
	});
});




