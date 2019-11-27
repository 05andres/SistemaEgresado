function myFunction(id){
	console.log(id);
let btnAbrirPopup = id,
	overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup'),
	btnCerrarPopup = document.getElementById('btn-cerrar-popup');
	console.log(btnAbrirPopup)
	overlay.classList.add('active');
	popup.classList.add('active');


btnCerrarPopup.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
});
}

function myFunction2(id){
let btnAbrirPopup1 = id,
	overlay1 = document.getElementById('overlay1'),
	popup1 = document.getElementById('popup1'),
	btnCerrarPopup1 = document.getElementById('btn-cerrar-popup1');

	overlay1.classList.add('active');
	popup1.classList.add('active');


btnCerrarPopup1.addEventListener('click', function(e){
	e.preventDefault();
	overlay1.classList.remove('active');
	popup1.classList.remove('active');
});
}