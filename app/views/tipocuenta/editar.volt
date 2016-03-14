{{ javascript_include("js/bootstrap.js") }}	
	
	
		<div class="col-sm-4">
	</div>
		<div class="col-sm-4">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Tipos de Cuenta</h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
									
													
												
						{{ form("tipos-cuentas/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						{{ content() }}
						{{ hidden_field("id") }}
						{{ text_field("cuenta", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
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