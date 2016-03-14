{{ javascript_include("js/bootstrap.js") }}
<div class="col-sm-4"> 
</div>
<div class="widget-box col-sm-4">
	<div class="widget-header">
		<h4 class="widget-title">Editar Grupo</h4>
	</div>

	<div class="widget-body">
		<div class="widget-main no-padding">													

		{{ form("grupos/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
			{{ hidden_field("id") }}
			<fieldset>
				{{ content() }}

				<table border="0" width="100%" cellspacing="0" cellpadding="0">
					<tr>
						<td>Nombre:</td>

						<td>{{ text_field("nombre", "class":"form-control", "required":"required", "placeholder":"") }}</td>
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