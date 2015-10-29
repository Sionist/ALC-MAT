<div class="col-sm-4">
	</div>
		<div class="col-sm-4">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Asignación</h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
									
													
												
						{{ form("asignaciones/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						{{ content() }}
						{{ hidden_field("id") }}
						
						<table border="0" width="100%" cellspacing="0" cellpadding="0">
							<tr>
								<td>Asignación</td>
								
								<td>{{ text_field("asignacion", "class":"form-control", "required":"required", "placeholder":"Asignación") }}</td>
							</tr>
							
							
							<tr>
								<td>Formula</td>
								<td>{{ text_field("formula", "class":"form-control", "required":"required", "placeholder":"Formula") }}</td>
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
										'class' => 'select2'
										));
								?>
								</td>
							
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
										'class' => 'select2'
										));
								?>
								</td>
							</tr>

							<tr>
								<td>Partida Presupuesto</td>
								<td>{{ text_field( "parti_presupuesto", "class":"form-control", "required":"required", "placeholder":"Partida Presupuesto") }}</td>
							</tr>

							<tr>
								<td>Denominación</td>
								<td>{{ text_field( "denominacion", "class":"form-control", "required":"required", "placeholder":"Denominación") }}</td>
							</tr>
							<tr>
								<td>Tipo</td>
								<td><?php
										echo Phalcon\Tag::Select(array(
										'tipo', 
										AsigsTipo::find(array("order" => "id_tipo ASC")),
										'using' => array('id_tipo', 'descripcion'),
										'useEmpty' => true,
										'class' => 'select2'
										));
								
								?></td>
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