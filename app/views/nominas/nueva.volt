{{ stylesheet_link("css/datepicker.css") }}
{{ javascript_include("js/bootstrap.js") }}
{{ javascript_include("js/date-time/bootstrap-datepicker.js") }}
<div class="row">
	<div class="col-sm-4">
	</div>
	<div class="col-sm-4">
		<div class="widget-box">
			<div class="widget-header center">
				<h4 class="widget-title ">NUEVA NOMINA</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">													

					{{ form("nominas/crear", "method":"post", "autocomplete" : "off", "class":"form-horizontal") }}
					<fieldset>
						{{ content() }}
						<div class="form-group">
							<label class="col-lg-4">Tipo Nomina</label>
							<div class="col-lg-7">
								<?php
								echo Phalcon\Tag::Select(array(
									'nomina', 
									TipoNomi::find(array("order" => "id_nomina ASC")),
									'using' => array('id_nomina', 'nomina'),
									'useEmpty' => true,
									'emptyText' => "Seleccione...",
									'class' => 'form-control',
									'id' => 'nomina',
									'required' => 'required'
									));
									?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4">S.Q.M</label>
								<div class="col-lg-7"><select name="sqm" class="form-control" id="sqm"></select></div>
							</div>
							<div>

								<div class="form-group">
									<label class="col-lg-4">Comienza</label>
									<div class="col-lg-7">
										<div class="input-group">
											<input name="finicio" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" required="required">
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-4">Finaliza</label>
									<div class="col-lg-7">
										<div class="input-group">
											<input name="ffinal" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" required="required">
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-4">Nº de Lunes</label>
									<div class="col-lg-7">
										<input disabled="disabled" type="text" name="nLunes" class="form-control" value=
											<?php
											$hoy = getDate();
											$fecha = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'];
											$dias_mes = date("t",strtotime($fecha));
												//echo $dias_mes."<br>";
											$cont = 0;

											for($i=1; $i <= $dias_mes ; $i++) {
												$fb = $hoy['year'].'-'.$hoy['mon'].'-'.$i;
												$ff = date("N",strtotime($fb));  	 
												if($ff == 1){
													$cont++;
												}
											}
											echo $cont;									
											?>
											>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-4">¿Deducciones?</label>

									<div class="col-lg-7">
										<input name="deducs" class="ace ace-checkbox-2" type="checkbox">
										<span class="lbl"></span>
									</div>

								</div>
							</fieldset>
							<div class="form-actions center">
								{{ submit_button("Guardar", "class":"btn btn-primary") }}
								{{ endForm() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(function($){
			//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true,
				})
			});

			$("#nomina").change(function(){
				var nomina = $("#nomina").val();

				$.post("../variaciones/nomina", { "nomina" : nomina },function(data){
					var nomina = JSON.parse(data);

	                //almacena la frecuencia del tipo de nomina
	                var frecuencia = nomina.tipoNomi[0].f;

	                if(frecuencia == "quincenal"){

	                    //limpia el valor de select sqm
	                    $("#sqm").html("");

	                    //almacena la fecha actual
	                    var f = new Date();

	                    //almacena el mes actual
	                    var mes = f.getMonth()+1;

	                    //var mes = 12;
	                    var quincena = mes * 2;

	                    var option="";

	                    //llena el select sqm con el numero de quincena de un año
	                    for(var i=1 ;i<=24;i++){
	                    	option = "<option class='op' value=\""+i+"\">"+i+"</option>";
	                    	$("#sqm").append(option);
	                    }

	                    //calcula la quincena actual
	                    if(f.getDate() < 15){
	                        //asigna la primera quincena si dia actual menor a 15
	                        $("#sqm").val(quincena-1);
	                    }else{
	                        //asigna 2da quincena si dia mayor a 15
	                        $("#sqm").val(quincena);
	                    }

	                }else if(frecuencia=="mensual"){

	                	$("#sqm").html("");

	                    //almacena la fecha actual
	                    var f = new Date();

	                    //almacena el mes actual
	                    var mes = f.getMonth()+1;

	                    var option="";

	                    //llena select sqm con meses del año
	                    for(var i=1 ;i<=12;i++){
	                    	option = "<option class='op' value=\""+i+"\">"+i+"</option>";

	                    	$("#sqm").append(option);
	                    }

	                    $("#sqm").val(mes);

	                }else{

	                	$("#sqm").html("");

	                    //almacena la semana actual del año
	                    var sem_actual = "<?php echo Date("W");  ?>";

	                    //calcula nro de semanas del año en curso
	                    var sem_final = "<?php   $f = date("Y")."-12-31"; $fu = strtotime($f);  echo Date("W", $fu);  ?>";

	                    for(var i=1 ;i <= sem_final;i++){
	                    	option = "<option class='op' value=\""+i+"\">"+i+"</option>";

	                    	$("#sqm").append(option);
	                    }

	                    //asigna semana anterior a select sqm
	                    $("#sqm").val(sem_actual-1);
	                }
	            });

			});
		</script>