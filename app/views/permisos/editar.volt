{{ javascript_include("js/bootstrap.js") }}
<div class="col-sm-4"> 
</div>
<div class="widget-box col-sm-4">
	<div class="widget-header">
		<h4 class="widget-title">Editar Permiso</h4>
	</div>

	<div class="widget-body">
		<div class="widget-main no-padding">													
			
			{{ form("permisos/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
			{{ hidden_field("id") }}
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
										<?php if($nivel =="normal") { ?>
											<option value="">Seleccione...</option>
											<option value="normal" selected="selected">Normal</option>
											<option value="administrativo">Administrativo</option>
										<?php } else { ?>
											<option value="">Seleccione...</option>
											<option value="normal">Normal</option>
											<option value="administrativo" selected="selected">Administrativo</option>
										<?php } ?>
									</select>
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