{{ javascript_include("js/jquery.maskedinput.js") }}	
	
		<div class="col-sm-4">
	</div>
		<div class="col-sm-4">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Dias de Prestaciones a Obreros Fijos</h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
									
													
												
						{{ form("diasprestaciones/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						{{ content() }}
						{{ hidden_field("Id") }}
						
						<!--Este es el CONCEPTO.... <?php echo $concepto ?>-->
						
					
						<table>
							<tr>
								<td>Concepto</td>
								<td>Días de Prestaciones</td>
							</tr>
							<tr>
								<td>{{ text_field("concepto", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}</td>
								<td>{{ text_field("dias", "class":"form-control input-mask-numeric", "required":"required", "style":"text-transform:capitalize") }}</td>
							</tr>
						</table>
						
						</fieldset>
						<div class="form-actions center">
						{{ submit_button("Modificar", "class":"btn btn-primary") }}
						{{ endForm() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="col-sm-4">
	</div>
	<div class="col-sm-4">
	</div>

<script type="text/javascript">
    $(document).ready(function() { 
        $('.input-mask-numeric').mask('999');
	});
</script>
        