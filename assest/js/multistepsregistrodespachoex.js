$(document).ready(function(){
	$('#step2registrodespachoex').hide();
	$('#btncrearregistrodespachoex').hide();
	$('#btnStep1').hide();



})

//botones paso 1
$(document).on('click', '#btnStep2',function(){
	// var fi = $('#FECHAINSTRUCTIVO').val();
	// if (
	// 		fi == "" || ts == "" || te == "" || bkn == "" || nref == ""
	// 	) {
	// 	Swal.fire({
	// 		icon:"info",
	// 		title:"No puedes avanzar al campo siguiente",
	// 		text:"Debes llenar todos los campos obligatorios marcados en este formulario ",
	// 		showConfirmButton:true,
	// 		confirmButtonText:"OK"
	// 	})
	// } else {
		$('#headerStep1').removeClass('btn-success')
		$('#headerStep1').removeClass('btn-secondary')

		$('#headerStep2').removeClass('btn-success')
		$('#headerStep2').removeClass('btn-secondary')


		$('#headerStep1').addClass('btn-secondary')
		$('#headerStep2').addClass('btn-success')
		$('#btnStep1').show();
		$('#btnStep2').hide();
		$('#btncrearregistrodespachoex').show();
		$('#step1registrodespachoex').hide();
		$('#step2registrodespachoex').show();
	// }
})

//botones paso 2
$(document).on('click', '#btnStep1',function(){
	// var fi = $('#FECHAINSTRUCTIVO').val();
	// if (
	// 		fi == "" || ts == "" || te == "" || bkn == "" || nref == ""
	// 	) {
	// 	Swal.fire({
	// 		icon:"info",
	// 		title:"No puedes avanzar al campo siguiente",
	// 		text:"Debes llenar todos los campos obligatorios marcados en este formulario ",
	// 		showConfirmButton:true,
	// 		confirmButtonText:"OK"
	// 	})
	// } else {
		$('#headerStep1').removeClass('btn-success')
		$('#headerStep1').removeClass('btn-secondary')

		$('#headerStep2').removeClass('btn-success')
		$('#headerStep2').removeClass('btn-secondary')


		$('#headerStep2').addClass('btn-secondary')
		$('#headerStep1').addClass('btn-success')
		$('#btnStep2').show();
		$('#btnStep1').hide();
		$('#btncrearregistrodespachoex').show();
		$('#step2registrodespachoex').hide();
		$('#step1registrodespachoex').show();
	// }
})
