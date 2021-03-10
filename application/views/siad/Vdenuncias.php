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
	<title>SIAD - DENUNCIAS</title>
</head>

<?php

$numvis = 0;
$totalnumden = 0;
$lastden = 0;

if ($datos) {
	foreach ($datos as $fila) {
		$numvis = $numvis + 1;
	}
}

if ($numden) {
	foreach ($numden as $fila) {
		$totalnumden = $fila->total;
	}
}

?>
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
					<a style="height: 103px; overflow: hidden;" href="<?php echo base_url();?>Siad" class="brand-logo" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">
						<table>
							<tr style="border: none;">
								<td style="padding: 0;">
									<img style="max-width: 100vw; max-height: 103px;" src="<?php echo base_url();?>assets/media/main/logo_siad_text.png">
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
								Persona
							</div>

						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<main style="background-image: linear-gradient(to bottom right, #ffffff9e, #ffffff9e), url(<?php echo base_url();?>assets/media/main/verdbg.jpg); background-size: cover; background-attachment: fixed;">
		<div class="container">
			<div class="row" style="margin: 0;">

				<div class="row" style="margin: 0;">
					<nav style="background: transparent; box-shadow: none;">
						<div class="nav-wrapper">
							<div class="col s12">
								<a href="<?php echo base_url();?>Siad" class="breadcrumb" style="font-weight: bold; color: #1e1e1e;" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">SIAD</a>
								<a href="<?php echo base_url();?>Siad/Denuncias" class="breadcrumb" style="font-weight: bold; color: #1e1e1e;" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">Denuncias</a>
							</div>
						</div>
					</nav>

					<div class="row">
						<div class="col s12">
							<a href="<?php echo base_url();?>Siad" class="pbtn waves-effect waves-light btn-large" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">
								<table>
									<tr style="border: none;">
										<td style="padding: 0; text-align: center;">
											<i class="material-icons">arrow_back</i><span style="height: 54px; font-size: 16px; position: relative; top: -6px;">REGRESAR</span>
										</td>
									</tr>
								</table>
							</a>
						</div>
					</div>

					<!--SI HAY DENUNCIAS -->

					<?php if ($datos) { ?>

						<!--CONSULTAR TICKET -->

						<div class="row" style="margin: 0;">
							<div class="col s12 m6 l6">
								<a class="pbtnf btn-large" style="width: 100%; padding: 0;">
									Existen <?php echo $totalnumden; ?> Denuncias
								</a>
							</div>

							<div class="col s12 show-on-small" style="display: none;">
								<br>
							</div>

							<div class="col s12 m6 l6" style="position: relative;">
								<a class="pbtnf btn-large" style="width: 100%; padding: 0;">
									<table>
										<tr style="border: none;">
											<td style="padding: 0;text-align: center;">
												<span style="display: inline-block; height: 54px; font-size: 16px; width: 70%;">
													<input id="tkinput" type="text" maxlength="10" placeholder="CONSULTAR TICKET" style="color: white; text-transform: uppercase; position: relative; top: -6px;">
												</span>
												<a id="stbtn" class="pbtn btn-small" style="display: inline-block; width: 40px; height: 40px; line-height: 40px; padding: 0; position: relative; top: -2px;">
													<i class="material-icons">search</i>
												</a>
											</td>
										</tr>
									</table>
								</a>
							</div>
						</div>

						<?php if ($numvis != 0) { ?>

							<!--FILTROS DENUNCIAS-->

							<div class="row" style="margin: 0;">
								<div class="input-field col s6 m6 l3">
									<a class="pbtnf btn-large" style="width: 100%;">
										<select id="sedsel" class="browser-default fakeselect" style="font-weight: initial; color: white">
											<option value="-1" selected>SEDE</option>
											<?php
											foreach ($sedes as $key) {
												echo '<option value="'.$key->IDS.'">'.$key->sede.'</option>';
											}
											?>
										</select>
									</a>
								</div>
								<div class="input-field col s6 m6 l3">
									<a class="pbtnf btn-large" style="width: 100%;">
										<select id="carsel" class="browser-default fakeselect" style="font-weight: initial; color: white">
											<option value="-1" selected>CARRERA</option>
											<?php
											foreach ($carreras as $key) {
												echo '<option value="'.$key->IDC.'">'.$key->carrera.'</option>';
											}
											?>
										</select>
									</a>
								</div>
								<div class="input-field col s6 m6 l3">
									<a class="pbtnf btn-large" style="width: 100%;">
										<select id="catsel" class="browser-default fakeselect" style="font-weight: initial; color: white">
											<option value="-1" selected>CATEGORIA</option>
											<?php
											foreach ($categorias as $key) {
												echo '<option value="'.$key->IDCAT.'">'.$key->categoria.'</option>';
											}
											?>
										</select>
									</a>
								</div>
								<div class="input-field col s6 m6 l3">
									<a class="pbtnf btn-large" style="width: 100%;">
										<input id="idinpu" type="number" placeholder="DENUNCIA NO." min="1" max="100000" style="font-weight: initial; color: white; position: relative; top: -6px;"/>
									</a>
								</div>
							</div>

						<?php } ?>

					<?php } ?>

				</div>

			</div>
			<div id="contenedor_den">
				<?php if ($datos) { ?>

					<div class="row" style="margin: 0;">

						<?php foreach ($datos as $fila) { ?>

							<?php $lastden = $fila->ID; ?>

							<!--CONTENEDOR DENUNCIAS -->

							<div class="col s12">
								<div class="row">
									<div class="card">
										<div class="card-content">
											<div class="row" style="margin: 0;">
												<div class="col s12 m6 l6">
													<h5 style="margin: 0; font-weight: bold; text-transform: uppercase; word-break: break-word;">
														<?php echo htmlentities($fila->asunto, ENT_QUOTES); ?>
													</h5>
												</div>

												<div class="col s12 show-on-small" style="display: none;"><br></div>

												<div class="col s12 m6 l6 noden" style="text-align: right;">
													<h5 style="margin: 0; font-weight: bold; text-transform: uppercase;">
														Denuncia No. <?php echo $fila->ID; ?>
													</h5>
												</div>

												<div class="col s12"><br></div>

												<div class="col s6 m8 l8" style="text-transform: uppercase; font-weight: bold;">
													Categoria:
												</div>
												<div class="col s6 m4 l4" style="text-transform: uppercase; font-weight: bold;">
													Fecha:
												</div>

												<div class="col s6 m8 l8" style="text-transform: uppercase;">
													<?php echo $fila->categoria; ?>
												</div>
												<div class="col s6 m4 l4" style="text-transform: uppercase;">
													<?php echo $fila->fechacrea; ?>
												</div>

												<div class="col s12"></div>

												<div class="col s6 m8 l8" style="text-transform: uppercase; font-weight: bold;">
													Sede:
												</div>
												<div class="col s6 m4 l4" style="text-transform: uppercase; font-weight: bold;">
													Carrera:
												</div>

												<div class="col s6 m8 l8" style="text-transform: uppercase;">
													<?php echo $fila->sede; ?>
												</div>
												<div class="col s6 m4 l4" style="text-transform: uppercase;">
													<?php echo $fila->carrera; ?>
												</div>

												<div class="col s12">
													<br>
													<h6 style="font-weight: bold; margin: 0; text-transform: uppercase;">Denuncia:</h6>
													<p style="text-align: justify; text-transform: uppercase; word-break: break-word;">
														<?php echo htmlentities($fila->denuncia, ENT_QUOTES); ?>
													</p>
												</div>

												<?php if ($fila->respuesta) { ?>

													<div class="col s12">
														<br>
														<h6 style="font-weight: bold; margin: 0; text-transform: uppercase;">Respuesta:</h6>
														<p style="text-align: justify; text-transform: uppercase; word-break: break-word;">
															<?php echo htmlentities($fila->respuesta, ENT_QUOTES); ?>
														</p>
													</div>

												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php } ?>

					<?php } else {?>

						<!--SI NO HAY DENUNCIAS -->

						<div class="row">
							<div class="col s12">
								<div class="row">
									<div class="card">
										<div class="card-content">
											<div class="row" style="margin: 0;">
												<div class="col s12">
													<h5 style="margin: 0; font-weight: bold; text-transform: uppercase; word-break: break-word; padding-top: 35px; padding-bottom: 35px;">
														ESTIMADO USUARIO EN ESTE MOMENTO NO HAY DENUNCIAS
													</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php } ?>
				</div>

				<div class="row">
					<div class="col s12" style="text-align: center;">
						<span style="font-weight: bold;">Denuncias por páginas: </span>
						<select id="ne" class="browser-default" style="width: auto; padding: 0; border: 0;display: inline-block; height: 30px;">
							<option value="1" selected>1</option>
							<option value="5" >5</option>
							<option value="10">10</option>
							<option value="15">15</option>
						</select>
					</div>
					<div class="col s12" style="text-align: center;">
						<ul class="pagination" style="margin: auto;display: inline;">
							<li class="disabled" title="primera página" onclick="filtrar_pagina(1);">
								<a href="#!">
									<i class="material-icons">first_page</i>
								</a>
							</li>
							<li class="disabled" title="página anterior">
								<a href="#!">
									<i class="material-icons">chevron_left</i>
								</a>
							</li>
							<li class="active">
								<a href="#!" onclick="filtrar_pagina(1);" >1</a>
							</li>
							<li class="waves-effect">
								<a href="#!" onclick="filtrar_pagina(2);" >2</a>
							</li>
							<li class="waves-effect">
								<a href="#!" onclick="filtrar_pagina(3);" >3</a>
							</li>
							<li class="waves-effect">
								<a href="#!" onclick="filtrar_pagina(4);" >4</a>
							</li>
							<li class="waves-effect">
								<a href="#!" onclick="filtrar_pagina(5);" >5</a>
							</li>
							<li class="waves-effect" title="página siguiente">
								<a href="#!">
									<i class="material-icons">chevron_right</i>
								</a>
							</li>
							<li class="waves-effect" title="última página">
								<a href="#!">
									<i class="material-icons">last_page</i>
								</a>
							</li>
						</ul>
					</div>
				</div>

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
					<a id="mcookie" href="#!" class="modal-close waves-effect waves-green btn-flat">OK!</a>
				</div>
			</div>
		<?php } ?>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/icons.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/mediaq.css">
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/toasts.js"></script>

		<script type="text/javascript">
			var base = '<?php echo base_url(); ?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/siad_denuncias.js"></script>

		<?php if (!$cookie) { ?>
			<script type="text/javascript">
				var base = '<?php echo base_url();?>';
			</script>
			<script type="text/javascript" src="<?php echo base_url();?>assets/js/checkcookie.js"></script>
		<?php } ?>

		<style type="text/css">
			select:focus{
				outline: none;
			}

			select option{
				color: black;
			}
		</style>
		<style type="text/css">
			::placeholder{ color: white; font-weight: initial;} 
		</style>

		<script type="text/javascript">
			window.onbeforeunload = function(event) {
				$('#spinner').css({'opacity':'1','visibility':'visible'});
				$('body').css('overflow','hidden');
			}
		</script>
	</body>
	</html>