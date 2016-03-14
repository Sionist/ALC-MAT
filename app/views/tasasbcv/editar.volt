	{{ javascript_include("js/jquery.maskedinput.js") }}
{{ javascript_include("js/bootstrap.js") }}	
	
	<div class="col-sm-4">
	</div>
	<div class="col-sm-4">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Editar Tasas BCV</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">

					{{ form("tasas-bcv/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
					<fieldset>
						{{ content() }}
						{{ hidden_field("id") }}
						<table border="0">
							<tr>
								<th>Tasa BCV:</th>
								<td>
									{{ text_field("tasa", "class":"form-control tasa", "required":"required", "style":"text-transform:capitalize") }}
								</td>
							</tr>	

							<tr>
								<th>Mes:</th>
								<td>
									{{ text_field("mes", "class":"form-control tasa", "required":"required", "style":"text-transform:capitalize") }}
								</td>
							</tr>

							<tr>	
								<th>Año:</th>
								<td>
									{{ text_field("yeartasa", "class":"form-control año", "required":"required", "style":"text-transform:capitalize") }}
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
	<script type="text/javascript">
		jQuery(function($){
			$('.tasa').mask('9?9', {autoclear : false, placeholder : " "});
			$('.año').mask('9999', {autoclear : false, placeholder : " "});
		});
	</script>