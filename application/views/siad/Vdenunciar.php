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
	<title>SIAD - DENUNCIAR</title>
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
					<a style="height: 103px; overflow: hidden;" href="<?php echo base_url();?>inicio" class="brand-logo" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">
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
							<a class="dropdown-trigger" href="javascript:void(0);" data-target="dropdesc" style="text-align: center; color: #383838; font-weight: bold;">
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

							<a href="https://zueprojects.dev" class="tooltipped" data-position="bottom" data-tooltip="Visitar Website" style="display: inline-block; padding: 0; width: fit-content; border-radius: 100px;">
								<div class="chip programmer" style="margin: 0; color: white;">
									<img src="<?php echo base_url();?>assets/media/persons/rz.jpg" alt="Person">
									Renzo Zue
								</div>
							</a>

							<a href="https://zueprojects.dev" class="tooltipped" data-position="bottom" data-tooltip="Visitar Website" style="display: inline-block; padding: 0; width: fit-content; border-radius: 100px;">
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
			<div class="row">

				<div class="row">
					<nav style="background: transparent; box-shadow: none;">
						<div class="nav-wrapper">
							<div class="col s12">
								<a href="<?php echo base_url();?>inicio" class="breadcrumb" style="font-weight: bold; color: #1e1e1e;" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">SIAD</a>
								<a href="<?php echo base_url();?>denunciar" class="breadcrumb" style="font-weight: bold; color: #1e1e1e;" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">Denunciar</a>
							</div>
						</div>
					</nav>

					<div class="row" style="margin: 0;">
						<div class="col s12">
							<a href="<?php echo base_url();?>inicio" class="pbtn waves-effect waves-light btn-large" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">
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
				</div>

			</div>
			<div class="row" style="margin: 0;">

				<div class="row">
					<div class="card">
						<div class="card-content">
							<div class="row">

								<div class="col s12" style="text-align: center; font-weight: bold; font-size: 20px; margin-bottom: 10px">
									POR FAVOR RELLENE LOS CAMPOS PARA FORMULAR SU DENUNCIA
								</div>

								<form id="dform" class="col s12" action="<?php echo base_url();?>denunciar" method="POST">

									<input type="hidden" name="va" value="true">

									<div class="row">

										<div class="row">
											<div class="input-field col s12">
												<input style="text-transform: uppercase;" id="vasunto" placeholder="ASUNTO" name="vasunto" type="text" class="validate trimmer" required="required" autocomplete="off" minlength="10" maxlength="40">
											</div>
										</div>

										<div class="row">
											<div id="sedecont" class="input-field col s12">
												<select id="vsede" class="browser-default fakeselect" name="vsede" required="required" style="text-transform: uppercase;">
													<option value="" selected>SEDE</option>
													<?php
													foreach ($sedes as $key) {
														echo '<option value="'.$key->IDS.'">'.$key->sede.'</option>';
													}
													?>
												</select>
											</div>
										</div>

										<div class="row">
											<div id="carrcont" class="input-field col s12">
												<select id="vcarrera" class="browser-default fakeselect" name="vcarrera" required="required" style="text-transform: uppercase;">
													<option value="" selected>CARRERA</option>
													<?php
													foreach ($carreras as $key) {
														echo '<option value="'.$key->IDC.'">'.$key->carrera.'</option>';
													}
													?>
												</select>
											</div>
										</div>

										<div class="row">
											<div id="catecont" class="input-field col s12">
												<select id="vcategoria" class="browser-default fakeselect" name="vcategoria" required="required" style="text-transform: uppercase;">
													<option value="" selected>CATEGORIA</option>
													<?php
													foreach ($categorias as $key) {
														echo '<option value="'.$key->IDCAT.'">'.$key->categoria.'</option>';
													}
													?>
												</select>
											</div>
										</div>

										<div class="row">
											<div class="input-field col s12">
												<textarea id="vdenuncia" placeholder="DENUNCIA" name="vdenuncia" class="materialize-textarea fakeselect trimmer" data-length="120" required="required" autocomplete="off" minlength="100" maxlength="1000" style="text-align: justify; text-transform: uppercase;"></textarea>
											</div>
										</div>

										<input id="captchaval" style="display: initial; position: absolute; visibility: hidden;" type="number" name="captchaval" required="required" value="">

										<div class="row">
											<div class="col s12 m6" style="text-align: center;">
												<div id="html_element" style="margin: auto; overflow: hidden;"></div>
												<style type="text/css">
													#html_element div{
														max-width: 100%;
													}

													#html_element div div iframe{
														max-width: 100%;
													}

													.rc-anchor-normal-footer {
														position: relative;
														left: -54px;
													}
												</style>
											</div>
											<div class="col s12 m6" style="text-align: center;">
												<a id="btnsend" style="margin-top: 20px;" class="pbtn waves-effect waves-light btn-large">
													<table>
														<tr style="border: none;">
															<td style="padding: 0; text-align: center;">
																<span style="height: 54px; font-size: 16px; position: relative; top: -6px;">DENUNCIAR</span><i class="material-icons">priority_high</i>
															</td>
														</tr>
													</table>
												</a>
											</div>
										</div>

										<input id="send" style="display: none;" type="submit" value="DENUNCIAR">

									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</main>

	<footer class="page-footer" style="padding: 0;">
		<div class="footer-copyright">
			<div class="container">
				Somos Humboldt © 2019
				<a class="grey-text text-lighten-4 right" href="javascript:void(0);">Redes Sociales</a>
			</div>
		</div>
	</footer>

	<div id="modalconf" class="modal">
		<div class="modal-content">
			<h4>Confirmar Denuncia</h4>
			<p>¿Esta seguro que desea realizar la denuncia?</p>
		</div>
		<div class="modal-footer">
			<a id="mcancel" href="javascript:void(0);" class="modal-close waves-effect waves-green btn-flat">CANCELAR</a>
			<a id="msend" href="javascript:void(0);" class="modal-close waves-effect waves-green btn-flat" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">>SI</a>
		</div>
	</div>

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
			<a id="mcookie" href="javascript:void(0);" class="modal-close waves-effect waves-green btn-flat" onclick="$('#spinner').css({'opacity':'1','visibility':'visible'}); $('body').css('overflow','hidden');">>OK!</a>
		</div>
	</div>
	<?php } ?>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/icons.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/additional-methods.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/toasts.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/precaptcha.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/siad_denunciar.js"></script>
	<style type="text/css">
		select{
			display: initial;
			font-weight: initial;
		}

		select:focus{
			outline: none;
		}
	</style>

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