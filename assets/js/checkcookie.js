$(document).ready(function(){
	var modalcookie = M.Modal.getInstance($('#modalcookie'));
	modalcookie.open();

	$('#mcookie').click(function(){
		$.post(base+"cookies", {}, function(data){
			location.reload(true);
		});
	});
});