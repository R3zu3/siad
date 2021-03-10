M.AutoInit();

var xhr = $.post();

$('#stbtn').click(function(){
	var ticket = $('#tkinput').val();

	if (ticket == '') {
		materialerror('¡Debe introducir el ticket!', 'tkinput');
		return;
	}

	if (ticket.length < 10) {
		materialerror('¡El ticket debe ser de 10 caracteres!', 'tkinput');
		return;
	}

	ticket = ticket.toUpperCase();

	$('#stbtn').fadeOut(250);

	M.toast({html: '¡Buscando denuncia!'});

	$.post(base+"Siad/Denuncia/0000000000", {
		"vticket": ticket
	}, function(data){
		if(data){
			if (data == 1){
				M.toast({html: '¡Abriendo denuncia!', classes: 'oppositivo'});

				$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');

				$('#stbtn').off();

				var counter = 0;

				var interval = setInterval(function() {
					counter++;

					if (counter == 2) {
						clearInterval(interval);
						window.location.href = base+"Siad/Denuncia/"+ticket;
					}

				}, 1000);
			}

			if (data == 0){
				M.toast({html: '¡No se encuentra esta denuncia!', classes: 'opnegativo'});
				$('#stbtn').fadeIn(250);
			}
		} else{
			M.toast({html: '¡Error Desconocido!', classes: 'opnegativo'});
		}
	});
});

$('#sedsel, #carsel, #catsel, #idinpu, #ne').on("input", function(){
	filtrar_pagina(1);
});

function filtrar_pagina(pagina){
	var id = $('#idinpu').val();
	var se = $('#sedsel').val();
	var ca = $('#carsel').val();
	var ct = $('#catsel').val();
	var ne = $('#ne').val();

	if ( id == '' ){
		id = -1;
	}

	M.toast({html: '¡Aplicando filtros!'});

	xhr.abort();

	xhr = $.post(base+"Siad/Filtros", {
		'vsede'			: se,
		'vcategoria' 	: ct,
		'vcarrera' 		: ca,
		'vid' 			: id,
		'ne'			: ne,
		'numpag'		: pagina
	}, function(data){
		if(data){
			M.toast({html: '¡Filtros Aplicados!', classes: 'oppositivo'});

		    $('#contenedor_den').html('');
			$('#contenedor_den').html(data);
		} else{
			M.toast({html: '¡Error Desconocido!', classes: 'opnegativo'});
		}
	});
}