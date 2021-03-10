<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lastitem = 0;

?>

<?php if ($datos) { $pslec = false; ?>

	<?php foreach ($datos as $fila) { ?>

		<!--CONTENEDOR DENUNCIAS -->

		<?php
			$lastitem = $fila->ID;
		?>

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

	<div class="row">
		<div class="col s12" style="text-align: center; padding-bottom: 10px;">
			<span style="font-weight: bold;">Denuncias por páginas: </span>
			<select id="ne" class="browser-default" style="width: auto; padding: 0; border: 0;display: inline-block; height: 30px;">
				<option value="1" <?php if ($ne == 1) { echo "selected"; } ?>>1</option>
				<option value="5" <?php if ($ne == 5) { echo "selected"; } ?>>5</option>
				<option value="10"<?php if ($ne == 10) { echo "selected"; } ?>>10</option>
				<option value="15"<?php if ($ne == 15) { echo "selected"; } ?>>15</option>
			</select>
		</div>
		<div class="col s12" style="text-align: center;" id="contnumdenitem">
			<ul class="pagination" style="margin: auto;display: inline;">
				<?php for ($i=0; $i < $num_paginas; $i++) { ?>

				<!-- PRIMERA Y ANTERIOR -->
				<?php if($i == 0){
					if($act_pag == 1){ ?>
						<!-- SI LA PAGINA ACTUAL ES LA PRIMERA -->
						<li class="disabled hide-on-small-only" title="primera página" id="fpp">
							<a href="#!">
								<i class="material-icons">first_page</i>
							</a>
						</li>
						<li class="disabled" title="página anterior">
							<a href="#!">
								<i class="material-icons">chevron_left</i>
							</a>
						</li>
					<?php } else { ?>
						<!-- SI LA PAGINA ACTUAL NO ES LA PRIMERA -->
						<li class="waves-effect hide-on-small-only" title="primera página" id="fpp" onclick="filtrar_pagina(1);">
							<a href="#!">
								<i class="material-icons">first_page</i>
							</a>
						</li>
						<li class="waves-effect" title="página anterior" onclick="filtrar_pagina(<?php echo $act_pag-1; ?>);">
							<a href="#!">
								<i class="material-icons">chevron_left</i>
							</a>
						</li>
					<?php }
				} ?>

				<?php if (($i + 1) == $act_pag) { ?>
					<!-- ESTA ES LA PAGINA ACTUAL -->
					<li class="active pagin">
						<a href="#!" onclick="filtrar_pagina(<?php echo $i+1; ?>);" ><?php echo $i+1; ?></a>
					</li>
				<?php } else { ?>
					<!-- LAS DEMAS PAGINAS -->
					<li class="waves-effect pagin">
						<a href="#!" onclick="filtrar_pagina(<?php echo $i+1; ?>);" ><?php echo $i+1; ?></a>
					</li>
				<?php } ?>

				<!-- SIGUIENTE Y ULTIMA -->
				<?php if($act_pag == $num_paginas){ if(($i+1) == $num_paginas){?>
					<!-- SI LA PAGINA ACTUAL ES LA ULTIMA -->
					<li class="disabled" title="página siguiente">
						<a href="#!">
							<i class="material-icons">chevron_right</i>
						</a>
					</li>
					<li class="disabled hide-on-small-only" title="última página" id="lpp">
						<a href="#!">
							<i class="material-icons">last_page</i>
						</a>
					</li>
				<?php } } else { if(($i+1) == $num_paginas){?>
					<!-- SI LA PAGINA ACTUAL NO ES LA ULTIMA -->
					<li class="waves-effect" title="página siguiente">
						<a href="#!" onclick="filtrar_pagina(<?php echo $act_pag+1; ?>);">
							<i class="material-icons">chevron_right</i>
						</a>
					</li>
					<li class="waves-effect hide-on-small-only" title="última página" id="lpp">
						<a href="#!" onclick="filtrar_pagina(<?php echo $num_paginas ?>);">
							<i class="material-icons">last_page</i>
						</a>
					</li>
				<?php } } ?>

				<?php } ?>
			</ul>
		</div>
	</div>

	<script type="text/javascript">
		var actp = <?php echo $act_pag; ?>;
		var totp = <?php echo $num_paginas; ?>;
		var items = [];

		var i = 0;

		$('.pagin').each(function () {
			items[i] = $(this);
			items[i].hide();
			i++;
		})

		if (totp <= 1) {
			$('#contnumdenitem').hide();
		}

		if (totp <= 5) {
			$('#lpp').hide();
			$('#fpp').hide();
		}

		if (totp > 5) {

			if (actp < 3) {
				i = 0;
				$.each(items, function () {
					if (i < 3) {
						items[i].show();
					}

					if ((i + 1) == totp) {
						items[i].show();
					}

					i++;
				})

				items[2].after('<li class="disabled" title="Mas Paginas"><a href="#!">...</a></li>');

			} else {
				if (actp >= (totp - 4)) {
					for (var i = totp - 5; i < totp; i++) {
						items[i].show();
					}

				} else {
					i = 0;
					$.each(items, function () {
						if ((i + 1) == (actp - 1)) {
							items[i].show();
						}

						if ((i + 1) == actp) {
							items[i].show();
						}

						if ((i + 1) == (actp + 1)) {
							items[i].show();
							items[actp + 1].after('<li class="disabled" title="Mas Paginas"><a href="#!">...</a></li>');
						}

						items[totp-1].show();

						i++;
					})
				}
			}
		} else {
			i = 0;
			$.each(items, function () {
				items[i].show();
				i++;
			})
		}

		$('#ne').on("input", function(){
			filtrar_pagina(1);
		});
	</script>

<?php } else { ?>

	<!--SI NO HAY DENUNCIAS -->

	<div class="row">
		<div class="col s12">
			<div class="row">
				<div class="card">
					<div class="card-content">
						<div class="row" style="margin: 0;">
							<div class="col s12">
								<h5 style="margin: 0; font-weight: bold; text-transform: uppercase; word-break: break-word; padding-top: 35px; padding-bottom: 35px;">
									NO SE ENCONTRARON DENUNCIAS
								</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php } ?>