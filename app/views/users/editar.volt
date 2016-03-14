{{ javascript_include("js/bootstrap.js") }}
<div class="col-xs-3"></div>
<div class="row">
	<div class="col-xs-4">
		<div class="row">
			<div class="page-header"><h2>Editar Usuario</h2></div>
		</div>
		{{ form("userrss/editado", "method" : "post", "class" : "inline-form", "autocomplete" : "off")}}
		{{ hidden_field("id") }}
		<div class="col-sm-offset-2">
			<?php echo $this->flashSession->output(); ?>
			<div class="row form-group">
				<label class="col-sm-3 control-label no-padding-right">Usuario:</label>
				<div class="col-sm-6">{{ text_field("usuario", "class" : "input-sm", "required":"required") }}</div>
			</div>
			<div class="row form-group">
				<label class="col-sm-3 control-label no-padding-right">Nombre:</label>
				<div class="col-sm-6">{{ text_field("nombre", "class" : "input-sm", "required":"required") }}</div>
			</div>
			<div class="row form-group">
				<label class="col-sm-3 control-label no-padding-right">Clave:</label>
				<div class="col-sm-8">{{ password_field("clave", "class" : "input-sm", "placeholder" : "Nueva Clave...") }}<strong style="color: red">&nbsp;&nbsp;**</strong></div>
			</div>
			<div class="row form-group">
				<label class=" col-sm-3 control-label no-padding-right">E-mail:</label>
				<div class="col-sm-6">{{ email_field("email", "class" : "input-sm", "required":"required") }}</div>
			</div>
			<div class="row form-group">
				<label class=" col-sm-3 control-label no-padding-right">Estatus:</label>
				<div class="col-sm-6">
					<select name="estatus">
					<?php if($estatus == "activo"){ ?>
						<option value="activo" <?php echo "selected='selected'"; ?> >Activo</option>
						<option value="inactivo">Inactivo</option>
					<?php } else{ ?>
						<option value="activo">Activo</option>
						<option value="inactivo" <?php echo "selected='selected'"; ?> >Inactivo</option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<hr>
	<div class="row form-group">
		<div class="col-sm-3 col-sm-offset-5">{{ submit_button("Modificar", "name" : "modificar","class" : "btn btn-primary") }}</div>
	</div>
	<div class="row form-group">
		<label class="col-sm-12 center"><strong style="color: red">** Deje este campo vacio si no desea cambiar la clave.</strong></label>
	</div>
</div>


</div>
</div>