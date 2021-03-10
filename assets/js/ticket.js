$(document).ready(function(){
	var modal = M.Modal.getInstance($('#modalconf'));

	modal.open();

	$('.modal-overlay').off();

	$('#msend').click(function(){
		window.location.href = base;
	});
});