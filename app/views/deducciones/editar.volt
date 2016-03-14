{{ javascript_include("js/bootstrap.js") }}
<div class="col-sm-4">
</div>
<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title">Editar Deducción</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">
				
				
				
				{{ form("deducciones/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
				<fieldset>
					{{ content() }}
					{{ hidden_field("id") }}
					
					<table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td>Deducción</td>
							
							<td>{{ text_field("deduccion", "class":"form-control", "required":"required") }}</td>
						</tr>
						
						
						<tr>
							<td>Formula</td>
							<td>{{ text_field("formula", "class":"form-control", "required":"required") }}</td>
						</tr>

						<tr>
							<td>Frecuencia</td>
							<td>
								<?php
								echo Phalcon\Tag::Select(array(
									'frecuencia', 
									Frecuencia::find(array("order" => "id_frecuencia ASC")),
									'using' => array('id_frecuencia', 'frecuencia'),
									'useEmpty' => true,
									'emptyText' => "Seleccione...",
									'class' => 'select2'
									));
									?>
								</td>
							</tr>

							<tr>
								<td>Nomina</td>
								<td>
									<?php
									echo Phalcon\Tag::Select(array(
										'nomina', 
										TipoNomi::find(array("order" => "id_nomina ASC")),
										'using' => array('id_nomina', 'nomina'),
										'useEmpty' => true,
										'emptyText' => "Seleccione...",
										'class' => 'select2'
										));
										?>
									</td>
									
								</tr>
								
								<tr>
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