$(document).ready(function(){

	M.AutoInit();

	var form = null;
	var modal = M.Modal.getInstance($('#modalconf'));

	$.validator.addMethod("select", function(value, element) {
		if (element.value == ""){
			return false;
		} else return true;
	}, "Please select an option.");

	form = $('#dform').validate({
		onkeyup: false,
		onclick: false,
		onfocusout: false,
		onblur: false,
		rules: {
			vasunto: {
				required: true,
				minlength: 10,
				maxlength: 40
			},

			vsede: {
				required: true,
				select: ''
			},

			vcarrera: {
				required: true,
				select: ''
			},

			vcategoria: {
				required: true,
				select: ''
			},

			vdenuncia: {
				required: true,
				minlength: 100,
				maxlength: 1000
			},

			captchaval: {
				required: true,
				select: ''
			}

		},

		messages: {
			vasunto: {
				required: 		'¡El asunto es requerido!',
				minlength: 		'¡El asunto requiere al menos 10 caracteres!',
				maxlength: 		'¡El asunto puede ser máximo de 50 caracteres!'
			},

			vsede: {
				required: 		'¡La sede es requerida!',
				select: 		'¡El nombre de usuario es requerido!'
			},

			vcarrera: {
				required: 		'¡La carrera es requerida!',
				select: 		'¡El nombre de usuario es requerido!'
			},

			vcategoria: {
				required: 		'¡La categoria es requerida!',
				select: 		'¡El nombre de usuario es requerido!'
			},

			vdenuncia: {
				required: 		'¡La denuncia es requerida!',
				minlength: 		'¡La denuncia requiere al menos 100 caracteres!<br>Sea claro preciso y conciso!',
				maxlength: 		'¡La denuncia puede ser maximo de 1000 caracteres!<br>Sea claro preciso y conciso!'
			},

			captchaval: {
				required: 		'¡El captcha es requerido!',
				select: 		'¡El captcha es requerido!'
			}
		},

		errorPlacement: function(error, element) {

			var a = error.eq(0).html();
			var b = element.eq(0).attr('id');
			materialerror(a,b);

		},

		showErrors: function(errorMap, errorList) {

			if (errorList.length) {
				this.errorList = [errorList[0]];
			}

			this.defaultShowErrors();

		}
	});

	$('.fakeselect').on( 'click keydown keyup keypress focus focusout', function(){
		if ($(this).val() == ''){
			$(this).addClass('fakeselinvalid');
			$(this).removeClass('fakeselvalid');
			$(this).css('font-weight','bold');
		} else {
			$(this).removeClass('fakeselinvalid');
			$(this).addClass('fakeselvalid');
			$(this).css('font-weight','initial');
		}
	});

	$('#btnsend').click( function() {
		$('#send').click();

		if (form.valid() == true ) {
			modal.open();
			return;
		}
	});

	var sendf = false;

	$("#dform").submit(function(e){
		if (!sendf){
			e.preventDefault();
		}
	});

	$('#msend').click( function() {
		sendf = true;
		$('#msend').off();
		$("#dform").submit();
	});

	$('#mcancel').click( function() {
		sendf = false;
		$("#dform").submit();
	});

	$('.trimmer').on( 'focus focusout', function(){
		var invalue = $(this).val();

		invalue = invalue.trim();

		invalue = invalue.replace(/ {2,}/g, ' ');

		invalue = invalue.toLowerCase();

		$(this).val(invalue);
	});

});