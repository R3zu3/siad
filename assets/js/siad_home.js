$(document).ready(function(){
	M.AutoInit();

	var car = null;
	var carinterval = null;

	setcarins();

	function setcarins(){
		clearInterval(carinterval);

		if (car){
			car.destroy();
		}

		$('.carousel').carousel({'dist':0,'fullWidth':true,'noWrap':false,'numVisible':0});

		car = M.Carousel.getInstance($('.carousel'));

		carinterval = setInterval(function(){
			car.next();
		},5000);
	}

	window.onresize = function() {
		setcarins();
	}
});