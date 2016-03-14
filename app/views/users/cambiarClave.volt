{{ javascript_include("js/bootstrap.js") }}
<div class="col-sm-4">
</div>
<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title">Cambiar Clave</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">						
				{{ form("clave-cambiada", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
				<fieldset>
					
					<input type = "hidden" name="username" value = <?php echo $this->session->get("username"); ?> />

					<table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td>Clave Nueva</td>
							<td>{{ password_field("claveNueva", "class":"form-control", "required":"required", "placeholder":"Nueva Clave...") }}</td>
						</tr>
						<tr>
							<td>Confirmar Clave</td>
							<td>{{ password_field("claveConfirm", "class":"form-control", "required":"required", "placeholder":"Confirmar Clave...") }}</td>
						</tr>

					</table>
					<br>
					<?php echo $this->flashSession->output(); ?>
				</fieldset>
				<div class="form-actions center">
					{{ submit_button("Cambiar", "class":"btn btn-primary") }}
					{{ endForm() }}

				</div>

			</div>

		</div>

	</div>
	<?php 
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if($url != $_SERVER["HTTP_REFERER"]){	
			echo $this->session->set("urlAnterior", $_SERVER["HTTP_REFERER"]);
		} 
	?>
	<a href = '<?php echo $this->session->get("urlAnterior"); ?>' class="btn btn-link">&#60;&#60;&#32;&#32;Pulsa AQUÍ para volver a donde estabas&#32;&#32;&#62;&#62;</a>	
</div>

