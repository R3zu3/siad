var xhr = $.post();

$('#login').click(function(){
    xhr.abort();

    var us = $('#user').val();
	var ps = $('#pass').val();

	xhr = $.post(base+"ADM/Iniciar", {
		'vuser'			: us,
		'vpass' 	    : ps,
	}, function(data){
		if(data){
            if(data != 0){
                M.toast({html: '¡Inicio de Sesion Exitoso!', classes: 'oppositivo'});
                $('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');
                window.location.href = base+'ADM/Dashboard';
            } else{
                M.toast({html: '¡Usuario o Contraseña Erroneos!', classes: 'opnegativo'});
            }
		} else{
			M.toast({html: '¡Error Desconocido!', classes: 'opnegativo'});
		}
	});
})