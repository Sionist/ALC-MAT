{{ javascript_include("js/bootstrap.js") }}
<div class="col-xs-3"></div>
<div class="row">
	<div class="col-xs-4">
		<div class="row">
			<div class="page-header"><h2>Crear Usuario</h2></div>
		</div>
		{{ form("userrss/crear", "method" : "post", "class" : "inline-form", "autocomplete" : "off")}}
		<div class="col-sm-offset-2">
			<?php echo $this->flashSession->output(); ?>
			<div class="row form-group">
				<label class="col-sm-3 control-label no-padding-right">Usuario:</label>
				<div class="col-sm-4">{{ text_field("usuario", "class" : "input-sm", "required":"required") }}</div>
			</div>
			<div class="row form-group">
				<label class="col-sm-3 control-label no-padding-right">Nombre:</label>
				<div class="col-sm-4">{{ text_field("nombre", "class" : "input-sm", "required":"required") }}</div>
			</div>
			<div class="row form-group">
				<label class="col-sm-3 control-label no-padding-right">Clave:</label>
				<div class="col-sm-4">{{ password_field("clave", "class" : "input-sm", "required":"required") }}</div>
			</div>
			<div class="row form-group">
				<label class=" col-sm-3 control-label no-padding-right">E-mail:</label>
				<div class="col-sm-4">{{ email_field("email", "class" : "input-sm", "required":"required") }}</div>
			</div>
			<div class="row form-group">
				<label class=" col-sm-3 control-label no-padding-right">Estatus:</label>
				<div class="col-sm-4">
					<select name="estatus">
						<option value="activo">Activo</option>
						<option value="inactivo">Inactivo</option>
					</select>
				</div>
			</div>
			<hr>
			<div class="row form-group checkbox">
				<label>
					<input name="admin" class="ace ace-checkbox-2" type="checkbox">
					<span class="lbl">&nbsp;&nbsp;Administrador</span>
				</label>
			</div>
		</div>
		<hr>
		<div class="row form-group">
			<div class="col-sm-3 col-sm-offset-5">{{ submit_button("Crear", "name" : "crear","class" : "btn btn-primary") }}</div>
		</div>
	</div>
	
	
</div>
</div>