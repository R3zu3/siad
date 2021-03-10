<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#spinner{
			-webkit-transition: visibility 1s, opacity 1s;
			-o-transition: visibility 1s, opacity 1s;
			transition: visibility 1s, opacity 1s;
			position: fixed !important;
		}

		.ring{
			position: absolute;
			width: 200px;
			height: 80px;
			margin: 0 auto;
			overflow: hidden;
			border-radius: 100%;
			-webkit-animation:vertical-movement 3s infinite ease-in-out;
			animation:vertical-movement 3s infinite ease-in-out;
		}

		.ring.a:after {
			content: '';
			position: absolute;
			left: 26px;
			top: 4px;
			border-radius: 100%;
			width: 158px;
			height: 65px;
			-webkit-box-shadow: 0px 0px 0px 2000px #007ea4;
			box-shadow: 0px 0px 0px 2000px #007ea4;
		}

		.ring.b:after {
			content: '';
			position: absolute;
			left: 10px;
			top: 3px;
			border-radius: 100%;
			width: 158px;
			height: 65px;
			-webkit-box-shadow: 0px 0px 0px 2000px #ff2736;
			box-shadow: 0px 0px 0px 2000px #ff2736;
		}

		.ring.c:after {
			content: '';
			position: absolute;
			left: 14px;
			top: 9px;
			border-radius: 100%;
			width: 158px;
			height: 65px;
			-webkit-box-shadow: 0px 0px 0px 2000px #00ebff;
			box-shadow: 0px 0px 0px 2000px #00ebff;
		}

		.ring.d:after {
			content: '';
			position: absolute;
			left: 20px;
			top: 4px;
			border-radius: 100%;
			width: 158px;
			height: 65px;
			-webkit-box-shadow: 0px 0px 0px 2000px #00d000;
			box-shadow: 0px 0px 0px 2000px #00d000;
		}

		.ring.e:after {
			content: '';
			position: absolute;
			left: 18px;
			top: 3px;
			border-radius: 100%;
			width: 158px;
			height: 65px;
			-webkit-box-shadow: 0px 0px 0px 2000px #ffca00;
			box-shadow: 0px 0px 0px 2000px #ffca00;
		}

		.a{
			-webkit-animation-delay:-0.5s;
			animation-delay:-0.5s;
		}

		.b{
			-webkit-animation-delay:-1.0s;
			animation-delay:-1.0s;
		}

		.c{
			-webkit-animation-delay:-1.5s;
			animation-delay:-1.5s;
		}

		.d{
			-webkit-animation-delay:-2.0s;
			animation-delay:-2.0s;
		}

		.e{
			-webkit-animation-delay:-2.5s;
			animation-delay:-2.5s;
		}

		@-webkit-keyframes vertical-movement {
			0%,100% {
				-webkit-transform: translateY(0%);
			}
			50% {
				-webkit-transform: translateY(30px);
			}
		}

		@keyframes vertical-movement {
			0%,100% {
				-webkit-transform: translateY(0%);
				-ms-transform: translateY(0%);
				transform: translateY(0%);
			}
			50% {
				-webkit-transform: translateY(5px) scale(0.95);
				-ms-transform: translateY(5px) scale(0.95);
				transform: translateY(5px) scale(0.95);
			}
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1, user-scalable=no"/>
	<meta charset="utf-8">
	<title>SIAD - INICIO</title>
	<script type="text/javascript">
		var base = '<?php echo base_url();?>';
	</script>
</head>

<body style="overflow: hidden;">
	<div id="spinner" style="position: absolute; z-index: 1000000; background-color: white;">
		<table style="width: 100vw; height: 100vh;">
			<tr style="border: none;">
				<td style="padding: 0;">
					<div style="position: relative; width: 210px; height: 190px; margin: auto;">
						<div class="ring a" style="z-index: 5; left: 10px;"></div>
						<div class="ring b" style="z-index: 4; top: 25px; left: -5px;"></div>
						<div class="ring c" style="z-index: 3; top: 50px; left: 16px;"></div>
						<div class="ring d" style="z-index: 2; top: 75px; left: 5px;"></div>
						<div class="ring e" style="z-index: 1; top: 100px;"></div>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/spinnerchk.js"></script>

	<main>
		<div class="carousel" height="100vh" style="position: absolute; height: 100vh; width: 100vw; top: 0; left: 0; z-index: -1;">
			<a class="carousel-item" style="background-image: url(<?php echo base_url();?>assets/media/siad_slider/0.jpg); background-position: center; width: 100%; height: 100%; background-size: cover;">
			</a>
		</div>
		<div id="mainsiadbtns" class="row valign-wrapper" style="height: 100vh !important;">
            <div class="col s12 m6 card" style="margin: auto;">
                <table>
                    <tr>
                        <td>
                            <h1 class="center siadtext siadname">
                                <img width="300px" src="<?php echo base_url();?>assets/media/main/logo_siad.png">
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>INICIAR SESION</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input id="user" placeholder="Usuario" />
                            <input id="pass" placeholder="Contraseña" />
                        </td>
                    </tr>
                    <tr style="height: 25%;">
                        <td>
                            <div class="col s12 center">
                                <div class="row">
                                    <a id="login" class="pbtn waves-effect waves-light btn-large">
                                        <table>
                                            <tr style="border: none;">
                                                <td style="padding: 0; text-align: center;">
                                                    <span style="height: 54px; font-size: 16px;">ACCEDER</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
		</div>
	</main>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/mediaq.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/siad_home.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/siad_login.js"></script>

	<script type="text/javascript">
		window.onbeforeunload = function(event) {
			$('#spinner').css({'opacity':'1','visibility':'visible'});
			$('body').css('overflow','hidden');
		}
	</script>
</body>
</html>