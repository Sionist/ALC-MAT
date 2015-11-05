	
	
		<div class="col-sm-3">
	</div>
		<div class="col-sm-5">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Escalas de <?php echo $des ?> de la Cláusula <?php echo $clau ?></h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							{{ form("clasificaciones/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
							<fieldset>
							{{ content() }}
						
							{{ hidden_field("id") }}
						
						
							<table>
								<tr>
									<td>
										<th>Mínimo</th>
									</td>
									<td>
										{{ text_field("minimo", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
									</td>	
								</tr>	
								
								<tr>
									<td>
										<th>Máximo</th>
									</td>
								
									<td>
										{{ text_field("maximo", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
									</td>								
								</tr>
							
							<tr>
								<td>
									<th>Tiempo</th>
								</td>
								
								<td>	
									{{ text_field("tiempo", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
								</td>									
							</tr>
								
							<tr>	
								<td>
									<th>Monto</th>
								</td>

								<td>	
									{{ text_field("monto", "class":"form-control", "style":"text-transform:capitalize") }}
								</td>	

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