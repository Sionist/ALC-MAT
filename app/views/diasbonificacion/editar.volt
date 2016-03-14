{{ javascript_include("js/jquery.maskedinput.js") }}	
{{ javascript_include("js/bootstrap.js") }}
<div class="col-sm-3">
</div>
<div class="col-sm-6">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title">Editar Días de Bonificación</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">



				{{ form("dias-bonificacion/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
				<fieldset>
					{{ content() }}
					{{ hidden_field("id") }}

					<table class="center" border="0" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td>Desde</td>
							<td>Hasta</td>
							<td>Días de Bonificación</td>
						</tr>
						<tr>
							<td>    

								<?php
								echo $this->tag->selectStatic(
									array(
										"desde",
										array(
											"1"=>"1",
											"2"=>"2",
											"3"=>"3",
											"4"=>"4",
											"5"=>"5",
											"6"=>"6",
											"7"=>"7",
											"8"=>"8",
											"9"=>"9",
											"10"=>"10",
											"11"=>"11",
											"12"=>"12",
											)
										)
									);
									?>    

								</td>
								<td>   
									<?php
									echo $this->tag->selectStatic(
										array(
											"hasta",
											array(
												"1"=>"1",
												"2"=>"2",
												"3"=>"3",
												"4"=>"4",
												"5"=>"5",
												"6"=>"6",
												"7"=>"7",
												"8"=>"8",
												"9"=>"9",
												"10"=>"10",
												"11"=>"11",
												"12"=>"12",
												)
											)
										);
										?>    
									</td>
									<td>{{ text_field("diasb", "class":"form-control numeros", "required":"required", "style":"text-transform:capitalize") }}</td>
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
			jQuery(function($) {
				$('.numeros').mask('9?99999999999', {autoclear : false , placeholder : " "});
			});
		</script>