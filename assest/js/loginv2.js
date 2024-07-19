// ocultar los formularios
$('#login1').toggle();
$('#login2').toggle();
$('#login3').toggle();
$('#btn_volver').toggle();


$('#btn_fruta').on('click', function(){
	$('#selector_botones').fadeOut(500, function(){
		$('#login1').fadeIn(1000);
		$('#description_text').html('Ingrese sus datos para continuar');
		$('#title_section').html('fruta')
	});
})

$('#btn_materiales').on('click', function(){
	$('#selector_botones').fadeOut(500, function(){
		$('#login2').fadeIn(1000);
		$('#description_text').html('Ingrese sus datos para continuar');
		$('#title_section').html('materiales')
	});
})

$('#btn_exportadora').on('click', function(){
	$('#selector_botones').fadeOut(500, function(){
		$('#login3').fadeIn(1000);
		$('#description_text').html('Ingrese sus datos para continuar');
		$('#title_section').html('exportadora')
	});
})

$('#btn_volver_fruta').on('click', function(){
	$('#login1').fadeOut(500, function(){
		$('#selector_botones').fadeIn(1000);
		$('#description_text').html('Selecciona una seccion');
		$('#title_section').html('')
	})
})

$('#btn_volver_materiales').on('click', function(){
	$('#login2').fadeOut(500, function(){
		$('#selector_botones').fadeIn(1000);
		$('#description_text').html('Selecciona una seccion');
		$('#title_section').html('')
	})
})

$('#btn_volver_exportadora').on('click', function(){
	$('#login3').fadeOut(500, function(){
		$('#selector_botones').fadeIn(1000);
		$('#description_text').html('Selecciona una seccion');
		$('#title_section').html('')
	})
})

// function validacion() {
// 	NOMBRE = document.getElementById("NOMBRE").value;
// 	CONTRASENA = document.getElementById("CONTRASENA").value;
// 	document.getElementById('val_nombre').innerHTML = "";
// 	document.getElementById('val_contrasena').innerHTML = "";
// 	if (NOMBRE == null || NOMBRE.length == 0 || /^\s+$/.test(NOMBRE)) {
// 		document.form_reg_dato.NOMBRE.focus();
// 		document.form_reg_dato.NOMBRE.style.borderColor = "#FF0000";
// 		document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
// 		return false;
// 	}

// 	document.form_reg_dato.NOMBRE.style.borderColor = "#4AF575";
// 	if (CONTRASENA == null || CONTRASENA.length == 0 || /^\s+$/.test(CONTRASENA)) {
// 		document.form_reg_dato.CONTRASENA.focus();
// 		document.form_reg_dato.CONTRASENA.style.borderColor = "#FF0000";
// 		document.getElementById('val_contrasena').innerHTML = "NO A INGRESADO DATO";
// 		return false;
// 	}
// 	document.form_reg_dato.CONTRASENA.style.borderColor = "#4AF575";
// }


