console.log('XD');
window.onload = iniciar;

function iniciar() {
	document.getElementById("enviar").addEventListener('click', validar, false);
}

function validarCiudad() {
	var elemento = document.getElementById("nombre");
	if (elemento.value == "" || !isNaN(elemento.value)) {
		alertica('Y la Ciudad?');
		return false;
	}
	return true;
}
function validarClima() {
	var elemento = document.getElementById("clima");
	if (elemento.value == "Elija...") {
		alertica('Y el clima?');
		return false;
	}
	return true;
}
function validarPais() {
	var elemento = document.getElementById("pais");
	if (elemento.value == "Elija...") {
		alertica('Y el pais?');
		return false;
	}
	return true;
}

function validar(e) {
	if (validarCiudad() && validarClima() && validarPais()) {
		return true;
	} else {
		e.preventDefault();
		return false;
	}
}

// Alertica :v
function alertica(mensaje) {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 5000
	});
	Toast.fire({
		type: 'error',
		title: mensaje,
	});
}