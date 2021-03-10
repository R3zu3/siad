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

	<header>
		<nav>
			<div class="container" style="width: 90%;">
				<div class="nav-wrapper">
					<a style="height: 103px; overflow: hidden; display: none;" href="<?php echo base_url();?>Siad" class="brand-logo show-on-medium-and-down" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">
						<table>
							<tr style="border: none;">
								<td style="padding: 0;">
									<img style="max-width: 100vw; max-height: 103px;" src="<?php echo base_url();?>assets/media/main/logo_siad_text.png">
								</td>
							</tr>
						</table>
					</a>

					<a style="height: 103px; overflow: hidden;" href="<?php echo base_url();?>Inicio" class="brand-logo hide-on-med-and-down" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">
						<table>
							<tr style="border: none;">
								<td style="padding: 0;">
									<img style="max-width: 100vw; max-height: 103px;" src="<?php echo base_url();?>assets/media/main/logo_somos.png">
								</td>
							</tr>
						</table>
					</a>

					<ul class="right hide-on-med-and-down">
						<li style="width: 500px;;">
							<a class="dropdown-trigger" href="#!" data-target="dropdesc" style="text-align: center; color: #383838; font-weight: bold;">
								Acerca de SIAD
							</a>
						</li>
					</ul>

					<ul id="dropdesc" class="dropdown-content" style="width: 500px; padding: 20px;">
						<li style="cursor: default; background-color: inherit;">
							<h4 style="margin: 0; font-weight: bold;">SIAD</h4>

							<p style="text-align: justify;">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur.
							</p>

							<h6 style="font-weight: bold;">Desarrollado por:</h6>

							<a href="http://zueprojects.tk" class="tooltipped" data-position="bottom" data-tooltip="Visitar Website" style="display: inline-block; padding: 0; width: fit-content; border-radius: 100px;">
								<div class="chip programmer" style="margin: 0; color: white;">
									<img src="<?php echo base_url();?>assets/media/persons/rz.jpg" alt="Person">
									Renzo Zue
								</div>
							</a>

							<a href="http://zueprojects.tk" class="tooltipped" data-position="bottom" data-tooltip="Visitar Website" style="display: inline-block; padding: 0; width: fit-content; border-radius: 100px;">
								<div class="chip programmer" style="margin: 0; color: white;">
									<img src="<?php echo base_url();?>assets/media/persons/jg.jpg" alt="Person">
									Jhonner Gonzalez
								</div>
							</a>

							<br>
							<br>

							<h6 style="font-weight: bold;">Participantes:</h6>

							<div class="chip">
								<img src="<?php echo base_url();?>assets/media/persons/mu.jpg" alt="Person">
								Persona
							</div>

							<div class="chip">
								<img src="<?php echo base_url();?>assets/media/persons/fu.jpg" alt="Person">
								Persona
							</div>

							<div class="chip">
								<img src="<?php echo base_url();?>assets/media/persons/mu.jpg" alt="Person">
								Persona
							</div>

							<div class="chip">
								<img src="<?php echo base_url();?>assets/media/persons/fu.jpg" alt="Person">
								Persona
							</div>

							<div class="chip">
								<img src="<?php echo base_url();?>assets/media/persons/mu.jpg" alt="Person">
								Persona
							</div>

							<div class="chip">
								<img src="<?php echo base_url();?>assets/media/persons/fu.jpg" alt="Person">
								Persona
							</div>

							<div class="chip">
								<img src="<?php echo base_url();?>assets/media/persons/mu.jpg" alt="Person">
								Persona
							</div>

							<div class="chip">
								<img src="<?php echo base_url();?>assets/media/persons/fu.jpg" alt="Person">
								sugerencia
							</div>

						</li>
					</ul>

				</div>
			</div>
		</nav>
	</header>

	<main>
		<div class="carousel" height="100vh" style="position: absolute; height: 100vh; width: 100vw; top: 0; left: 0; z-index: -1;">
			<a class="carousel-item" style="background-image: url(assets/media/siad_slider/0.jpg); background-position: center; width: 100%; height: 100%; background-size: cover;">
			</a>
		</div>
		<div id="mainsiadbtns" class="row valign-wrapper">
			<table>
				<tr class="hide-on-med-and-down">
					<td>
						<h1 class="center siadtext siadname">
							<img height="200px" src="<?php echo base_url();?>assets/media/main/logo_siad.png">
						</h1>
						<h4 class="center siadtext siaddesc">SISTEMA INTEGRADO ANÓNIMO DE DENUNCIAS</h4>
						<h6 class="center siadtext siaduni" style="font-size: 25px;">Tú voz es la mejor denuncia</h6>
					</td>
				</tr>
				<tr style="height: 25%;">
					<td>
						<div class="col s12 m12 l6 center" > 
							<div class="row">
								<a href="<?php echo base_url();?>Siad/Denunciar" class="pbtn waves-effect waves-light btn-large" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">
									<table>
										<tr style="border: none;">
											<td style="padding: 0; text-align: center;">
												<span style="height: 54px; font-size: 16px; position: relative; top: -6px;">Denunciar</span><i class="material-icons">priority_high</i>
											</td>
										</tr>
									</table>
								</a>
							</div>
						</div>
						<div class="col s12 m12 l6 center">
							<div class="row">
								<a href="<?php echo base_url();?>Siad/Denuncias" class="pbtn waves-effect waves-light btn-large" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">
									<table>
										<tr style="border: none;">
											<td style="padding: 0; text-align: center;">
												<span style="height: 54px; font-size: 16px; position: relative; top: -6px;">Ver Denuncias </span><i class="material-icons">remove_red_eye</i>
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
	</main>

	<footer class="page-footer" style="padding: 0;">
		<div class="footer-copyright">
			<div class="container">
				Somos Humboldt © 2019
				<a class="grey-text text-lighten-4 right" href="#!">Redes Sociales</a>
			</div>
		</div>
	</footer>

	<?php if (isset($va)) { if ($va) { ?>

	<div id="modalconf" class="modal">
		<div class="modal-content" style="font-size: 16px !important; padding-bottom: 0;">
			<h4 class="mtitle" style="font-size: 25px; text-decoration: underline;">DENUNCIA EXITOSA!</h4>
			<div class="row" style="margin: 0;">

				<div class="col s12">
					<br>
					<h6 style="font-weight: bold; margin: 0; text-transform: uppercase; font-size: inherit; color: red;">¡IMPORTANTE!</h6>
					<p style="text-align: justify; text-transform: uppercase; font-size: inherit;">
						Para poder consultar el estado de su denuncia se le ha asignado el siguiente ticket:
					</p>

					<h3 style="text-align: center;"><?php echo $vticket; ?></h3>

					<p style="text-align: justify; text-transform: uppercase; font-size: inherit;">
						Asegurese de guardarlo y no extraviarlo, de lo contrario no podra observar si se la ha dado una respuesta a su caso.
					</p>
				</div>

				<h4 style="font-size: 25px; text-decoration: underline;">SU DENUNCIA:</h4>
				<br>
				
				<div class="col s12 m6 l6">
					<h5 style="margin: 0; font-weight: bold; text-transform: uppercase; font-size: inherit; word-break: break-all;">
						<?php echo htmlentities($vasunto, ENT_QUOTES); ?>
					</h5>
				</div>

				<div class="col s12 show-on-small" style="display: none;"><br></div>

				<div class="col s12 m6 l6 noden" style="text-align: right;">
					<h5 style="margin: 0; font-weight: bold; text-transform: uppercase; font-size: inherit;">
						Denuncia No. <?php echo $vid; ?>
					</h5>
				</div>

				<div class="col s12"><br></div>

				<div class="col s6 m8 l8" style="text-transform: uppercase; font-weight: bold; font-size: inherit;">
					Categoria:
				</div>
				<div class="col s6 m4 l4" style="text-transform: uppercase; font-weight: bold; font-size: inherit;">
					Fecha:
				</div>

				<div class="col s6 m8 l8" style="text-transform: uppercase; font-size: inherit;">
					<?php echo $vcategoria; ?>
				</div>
				<div class="col s6 m4 l4" style="text-transform: uppercase; font-size: inherit;">
					<?php echo $vfecha; ?>
				</div>

				<div class="col s12"></div>

				<div class="col s6 m8 l8" style="text-transform: uppercase; font-weight: bold; font-size: inherit;">
					Sede:
				</div>
				<div class="col s6 m4 l4" style="text-transform: uppercase; font-weight: bold; font-size: inherit;">
					Carrera:
				</div>

				<div class="col s6 m8 l8" style="text-transform: uppercase; font-size: inherit;">
					<?php echo $vsede; ?>
				</div>
				<div class="col s6 m4 l4" style="text-transform: uppercase; font-size: inherit;">
					<?php echo $vcarrera; ?>
				</div>

				<div class="col s12">
					<br>
					<h6 style="font-weight: bold; margin: 0; text-transform: uppercase; font-size: inherit;">Denuncia:</h6>
					<p style="text-align: justify; text-transform: uppercase; font-size: inherit; word-break: break-word;">
						<?php echo htmlentities($vdenuncia, ENT_QUOTES); ?>
					</p>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a id="msend" href="#!" class="modal-close waves-effect waves-green btn-flat" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">DE ACUERDO!</a>
		</div>
	</div>

	<?php } } ?>

	<?php if (!$cookie) { ?>
	<div id="modalcookie" class="modal">
		<div class="modal-content" style="padding-bottom: 0;">
			<h4 class="mtitle">UTILIZAMOS COOKIES!</h4>
			<div class="row" style="margin: 0;">
				<p>
					En SomosHumboldt utilizamos cookies para mejorar tu experiencia de usuario
					<br>
					Al navegar en nuestro sitio aceptas el uso de cookies!
				</p>
			</div>
		</div>
		<div class="modal-footer">
			<a id="mcookie" href="#!" class="modal-close waves-effect waves-green btn-flat" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">OK!</a>
		</div>
	</div>
	<?php } ?>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/mediaq.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/siad_home.js"></script>

	<?php if (isset($va)) { if ($va) { ?>
	<script type="text/javascript">
		var base = '<?php echo base_url();?>';
	</script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/ticket.js"></script>
	<?php } } ?>

	<?php if (!$cookie) { ?>
	<script type="text/javascript">
		var base = '<?php echo base_url();?>';
	</script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/checkcookie.js"></script>
	<?php } ?>

	<script type="text/javascript">
		window.onbeforeunload = function(event) {
			$('#spinner').css({'opacity':'1','visibility':'visible'});
			$('body').css('overflow','hidden');
		}
	</script>
</body>
</html>