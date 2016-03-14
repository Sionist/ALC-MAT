{{ javascript_include("js/bootstrap.js") }}	
	
		<div class="col-sm-3">
	</div>
		<div class="col-sm-5">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Clausulas de <?php echo $des ?></h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
									
													
												
						{{ form("clausulas/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						{{ content() }}
						
						{{ hidden_field("id") }}
						
						
						<table>
						
								<!--{{ text_field("nclausula", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}-->
								
							<tr>
								<td>
									<th>Cláusula</th>
								</td>
								
								<td>
								</td>
								
								<td>
									{{ text_field("clausula", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
								</td>								
							</tr>
							
							<tr>
								<td>
									<th>Estatus de Cláusula</th>
								</td>
								
								<td>
								
								</td>
								
								<td>	
									{{ text_field("activa", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
								</td>									
							</tr>
								
							<tr>	
								<td>
									<th>Observaciones</th>
								</td>

								<td>
								</td>
								
								<td>	
									{{ text_field("observa", "class":"form-control", "style":"text-transform:capitalize") }}
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