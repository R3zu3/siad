function materialerror(error, id){
	if (error) {
		M.toast({html: error, classes: 'opnegativo'});
	}

	if (id) {
		goToByScroll(id);
	}
}

function goToByScroll(id) {
	$('html,body').animate({ scrollTop: $("#" + id).offset().top - 20 }, 'slow', function(){ $('#'+id).focus(); });
}