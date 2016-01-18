{{ javascript_include("js/jquery.maskedinput.js") }}	
	
		<div class="col-sm-4">
	</div>
		<div class="col-sm-4">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Descuentos</h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
									
													
												
						{{ form("descuentos/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						{{ content() }}
						{{ hidden_field("id") }}

						<table border="0" width="100%" cellspacing="0" cellpadding="0">
							<tr>
								<td>Descuentos</td>
								<td>Rif</td>
							</tr>
							<tr>
								<td>{{ text_field("descuento", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}</td>
						        <td>{{ text_field("rif", "class":"form-control rif", "required":"required", "style":"text-transform:capitalize") }}</td>
							</tr>
						</table>
						
						
						</fieldset>
						<div class="form-actions center">
						{{ submit_button("Modificar", "class":"btn btn-primary", "id":"modificar") }}
						{{ endForm() }}
						</div>
						<div id="msj" class='alert alert-block alert-danger hide'>Debe introducir un Rif valido. Letras permitidas: J,G,V</div>
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
		$.mask.definitions['~']='[vVjJgG]';
        $('.rif').mask('~-99999999-9');

		$("#modificar").on('click', function(e) { 
                    
                    var rif = $("#rif").val();
                    var desc = $("#desc").val();
                    
                    //valida que el rif introducido sea correcto si descuento no esta vacio
                    if(desc != ""){
                        if(!rif.startsWith("j") && !rif.startsWith("g") && !rif.startsWith("v")){
                                e.preventDefault();
                                //muestra msj de error
                                $("#msj").removeClass("hide");
                                $("#msj_success").addClass("hide");
                                $("#rif").focus();
                            }
                        }else{
                            $("#msj").addClass("hide");
                            $("#msj_success").addClass("hide");
                        }
                    });
	});
	</script>