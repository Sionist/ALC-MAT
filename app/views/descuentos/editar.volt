	
	
		<div class="col-sm-4">
	</div>
		<div class="col-sm-4">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Descuentos</h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
									
													
												
						{{ form("descuentos/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						{{ content() }}
						{{ hidden_field("id") }}

						<table border="0" width="100%" cellspacing="0" cellpadding="0">
							<tr>
								<td>Descuentos</td>
								<td>Rif</td>
							</tr>
							<tr>
								<td>{{ text_field("descuento", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}</td>
						        <td>{{ text_field("rif", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}</td>
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