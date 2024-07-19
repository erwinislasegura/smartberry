$(document).ready(function(){
	$('#botonesSteps').removeClass('col-6');
	$('#botonesSteps').addClass('col-3');
	$('#section2').hide();
	$('#section3').hide();
	$('#btnPaso1').hide();
	$('#btnPaso3').hide();
	$('#btnPasoAgregar').hide();
	$('#btnCrear').hide();
})

//botones paso 1
$(document).on('click', '#btnPaso1',function(){
	var fi = $('#FECHAINSTRUCTIVO').val();
	var ts = $('#TSERVICIO').val();
	var te = $('#TEMBARQUE').val();
	var bkn = $('#BOOKINGINSTRUCTIVO').val;
	var nref = $('#NUMEROREFERENCIAINSTRUCTIVOE').val();

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
		$('#btnHeaderSection1').removeClass('btn-success');
		$('#btnHeaderSection2').removeClass('btn-success');
		$('#btnHeaderSection3').removeClass('btn-success');

		$('#btnHeaderSection1').removeClass('btn-secondary');
		$('#btnHeaderSection2').removeClass('btn-secondary');
		$('#btnHeaderSection3').removeClass('btn-secondary');

		$('#btnHeaderSection1').addClass('btn-success');
		$('#btnHeaderSection2').addClass('btn-secondary');
		$('#btnHeaderSection3').addClass('btn-secondary');

		$('#section1').show();
		$('#section2').hide();
		$('#section3').hide();

		$('#btnPaso1').hide();
		$('#btnPaso2').show();
		$('#btnPaso3').hide();

	// }
})



$(document).on('change','#FECHAINSTRUCTIVO', function(){
	var fi = $('#FECHAINSTRUCTIVO').val();
	console.log("fi", fi);
	botones(fi);

})

//botones paso 2
$(document).on('click', '#btnPaso2',function(){

	var fi = $('#FECHAINSTRUCTIVO').val();
	var ts = $('#TSERVICIO').val();
	var te = $('#TEMBARQUE').val();
	var bkn = $('#BOOKINGINSTRUCTIVO').val;
	var nref = $('#NUMEROREFERENCIAINSTRUCTIVOE').val();

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


		$('#btnHeaderSection1').removeClass('btn-success');
		$('#btnHeaderSection2').removeClass('btn-success');
		$('#btnHeaderSection3').removeClass('btn-success');
		$('#btnHeaderSection1').removeClass('btn-secondary');
		$('#btnHeaderSection2').removeClass('btn-secondary');
		$('#btnHeaderSection3').removeClass('btn-secondary');

		$('#btnHeaderSection1').addClass('btn-secondary');
		$('#btnHeaderSection2').addClass('btn-success');
		$('#btnHeaderSection3').addClass('btn-secondary');

		$('#section1').hide();
		$('#section3').hide();
		$('#section2').show();

		$('#btnPaso1').show();
		$('#btnPaso2').hide();
		$('#btnPaso3').show();
	// }
})

//botones paso 3
$(document).on('click', '#btnPaso3',function(){
	var fi = $('#FECHAINSTRUCTIVO').val();
	var ts = $('#TSERVICIO').val();
	var te = $('#TEMBARQUE').val();
	var bkn = $('#BOOKINGINSTRUCTIVO').val;
	var nref = $('#NUMEROREFERENCIAINSTRUCTIVOE').val();

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

		$('#btnHeaderSection1').removeClass('btn-success');
		$('#btnHeaderSection2').removeClass('btn-success');
		$('#btnHeaderSection3').removeClass('btn-success');

		$('#btnHeaderSection1').removeClass('btn-secondary');
		$('#btnHeaderSection2').removeClass('btn-secondary');
		$('#btnHeaderSection3').removeClass('btn-secondary');

		$('#btnHeaderSection1').addClass('btn-secondary');
		$('#btnHeaderSection2').addClass('btn-secondary');
		$('#btnHeaderSection3').addClass('btn-success');

		$('#section1').hide();
		$('#section2').hide();
		$('#section3').show();

		$('#btnPaso1').hide();
		$('#btnPaso2').show();
		$('#btnPaso3').hide();
		$('#btnCrear').show();


	// }
})


