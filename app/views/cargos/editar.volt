	{{ javascript_include("js/jquery.maskMoney.js") }}
	{{ javascript_include("js/bootstrap.js") }}
		<div class="col-sm-4">
	</div>
		<div class="col-sm-4">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Cargos</h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
									
													
												
						{{ form("cargos/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						{{ content() }}
						{{ hidden_field("id") }}
						
						{{ text_field("cargo", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
						{{ text_field("sueldo", "class":"form-control sueldo-decimal", "required":"required", "style":"text-transform:capitalize") }}

						<?php

							echo Phalcon\Tag::Select(array(
							'combonivel', 
							NivelCargo::find(array("order" => "id_nivelcargo ASC")),
							'using' => array('id_nivelcargo', 'nivel_cargo'),
							'useEmpty' => true,
							'class' => 'select2'
							));
						?>
						
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
	$(document).ready(function(){
		$(".sueldo-decimal").maskMoney({thousands:'', decimal:'.', allowZero:true, suffix: ''});
	});
</script>