function hamburguesa () {
	var botonera = document.getElementById('botonera')
	if(botonera.style.display=='block'){
	botonera.style.display = 'none'		
	} else {
		botonera.style.display = 'block'
	}
}
function mostrar () {
	var texto = document.getElementById ('Comida')
	texto.style.display = 'block'
}
function ocultar () {
	var texto2 = document.getElementById ('bebida')
	texto2.style.display = 'none'
}