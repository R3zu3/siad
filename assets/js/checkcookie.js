$(document).ready(function(){
	var modalcookie = M.Modal.getInstance($('#modalcookie'));
	modalcookie.open();

	$('#mcookie').click(function(){
		$.post(base+"Siad/Cookies", {}, function(data){
			location.reload(true);
		});
	});
});