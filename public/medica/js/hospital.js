function entroEnFoco(elemento) {
	elemento.className='enfoco';
}

function salioDeFoco(elemento) {
	elemento.className='';
	
}
function revisarObligatorio(elemento) {
	if (elemento.value=="") {
		elemento.className='error';	
	} else {
		elemento.className='';	
	}
}

function revisarLongitud(elemento, minimoDeseado) {
	if (elemento.value!="") {
		var dato = elemento.value;
		if (dato.length<minimoDeseado) {
			elemento.className='error';	
		} else {
			elemento.className='';	
		}
	}
}

function cargar(){
	document.getElementById("opcion").value=3;	
}

function guardar(){	
	document.getElementById("opcion").value=1;
	
}

function limpiar(){
	document.getElementById("opcion").value=0;
}

function validar(event){
if(document.getElementById("opcion").value==1){
	var estaTodoOK = true;
	if (document.getElementById("nombre").value.length<2) {
		estaTodoOK = false;	
	}
	if (document.getElementById("apellidoPat").value.length<2) {
		estaTodoOK = false;	
	}
	
	if (document.getElementById("apellidoMat").value.length<2) {
		estaTodoOK = false;	
	}	
	
	if (!estaTodoOK) {
		alert("Algunos datos tienen errores, por favor corregir antes de volver a enviar.");	
	}
	return estaTodoOK;
}
}