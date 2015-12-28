	
	
		<div class="col-sm-4">
	</div>
		<div class="col-sm-4">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Tipos de Nómina</h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
									
													
												
						{{ form("tipos-nominas/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						{{ content() }}
						{{ hidden_field("id") }}
						{{ hidden_field("idf") }}
						
						
						<table border="0" width="100%" cellspacing="0" cellpadding="0">
							<tr>
								<td>Tipo de Nómina</td>
								<td>Frecuencia</td>
							</tr>
							<tr>
								<td>{{ text_field("tiponomi", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}</td>



								<td><?php

										echo Phalcon\Tag::Select(array(
										'frecuencia', 
										Frecuencia::find(array("order" => "id_frecuencia ASC")),
										'using' => array('id_frecuencia', 'frecuencia'),
										'useEmpty' => true,
										'class' => 'select2'
										));
								?></td>
							</tr>
							
						</table>						

						
						<!--<select name="frecuencia" id="cargar_frecuencia" class="form-control" required>	
							<?php
								/*foreach($frecuencia as $frecu)
								{
									echo "<option value=".$frecu->id_frecuencia.">".$frecu->frecuencia."</option>";
								}*/
							?>
						</select>-->

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