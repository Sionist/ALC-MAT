{{ javascript_include("js/bootstrap.js") }}
<div class="col-sm-4">
</div>
<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title">Nuevo Permiso</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">													
				
				{{ form("permisos/crear", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
				<fieldset>
					{{ content() }}
					
					<table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td>Permiso</td>
							
							<td>{{ text_field("nombre", "class":"form-control", "required":"required", "placeholder":"") }}</td>
						</tr>
						
						
						<tr>
							<td>URL</td>
							<td>{{ text_field("url", "class":"form-control", "required":"required", "placeholder":"") }}</td>
						</tr>

						<tr>
							<td>Grupo</td>
							<td>
								<?php
								echo Phalcon\Tag::Select(array(
									'grupo', 
									GrupoPermisos::find(array("order" => "id ASC")),
									'using' => array('id', 'nombre'),
									'useEmpty' => true,
									'emptyText' => "Seleccione...",
									'class' => 'select2',
									'style' => 'width: 159px',
									'required' => 'required'
									));
									?></td>
								</tr>
								<tr>
									<td>Nivel</td>
									<td>
										<select name="nivel" required="required">
											<option value="">Seleccione...</option>
											<option value="normal">Normal</option>
											<option value="administrativo">Administrativo</option>
										</select>
									</td>
								</tr>


							</table>


						</fieldset>
						<div class="form-actions center">
							{{ submit_button("Crear", "class":"btn btn-primary") }}
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