<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Form Wizard - Ace Admin</title>

	<meta name="description" content="and Validation" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	{{ stylesheet_link("css/select2.css") }}
	{{ stylesheet_link("css/jquery-ui.css") }}
	{{ stylesheet_link("css/bootstrap-editable.css") }}
	{{ stylesheet_link("css/datepicker.css") }}
	{{ stylesheet_link("css/bootstrap-timepicker.css") }}
	{{ stylesheet_link("css/bootstrap-datetimepicker.css") }}
	{{ stylesheet_link("css/colorpicker.css") }}
	{{ stylesheet_link("css/jquery-ui.custom.css") }}
	{{ stylesheet_link("css/chosen.css") }}
	{{ javascript_include("js/jquery-ui.js") }}
	{{ javascript_include("js/jquery.easypiechart.js") }}
	{{ javascript_include("js/bootstrap.js") }}
	{{ javascript_include("js/fuelux/fuelux.wizard.js") }}
	{{ javascript_include("js/x-editable/bootstrap-editable.js") }}
	{{ javascript_include("js/x-editable/ace-editable.js") }}
	{{ javascript_include("js/ace/elements.fileinput.js") }}
	{{ javascript_include("js/ace/elements.aside.js") }}
	{{ javascript_include("js/ace/ace.ajax-content.js") }}
	{{ javascript_include("js/jquery.validate.js") }}
	{{ javascript_include("js/additional-methods.js") }}
	{{ javascript_include("js/bootbox.js") }}
	{{ javascript_include("js/jquery.maskedinput.js") }}
	{{ javascript_include("js/select2.js") }}
	{{ javascript_include("js/date-time/bootstrap-datepicker.js") }}
	{{ javascript_include("js/date-time/bootstrap-timepicker.js") }}
	{{ javascript_include("js/date-time/moment.js") }}
	{{ javascript_include("js/date-time/daterangepicker.js") }}
	{{ javascript_include("js/date-time/bootstrap-datetimepicker.js") }}
</head>

<body class="no-skin">
	<div class="main-container" id="main-container">
		<script type="text/javascript">
			try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>
		<div class="main-content">
			<div class="main-content-inner">

				<!-- /section:basics/content.breadcrumbs -->
				<div class="page-content">

					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<div class="widget-box">
								<div class="widget-body">
									<div class="widget-main">
										<!-- #section:plugins/fuelux.wizard -->
										<div id="fuelux-wizard-container">
											<div>
												<!-- #section:plugins/fuelux.wizard.steps -->
												<ul class="steps">
													<li data-step="1" class="active">
														<span class="step">1</span>
														<span class="title">Datos Personales</span>
													</li>

													<li data-step="2">
														<span class="step">2</span>
														<span class="title">Contratación</span>
													</li>

													<li data-step="3">
														<span class="step">3</span>
														<span class="title">Datos Financieros</span>
													</li>

													<li data-step="4">
														<span class="step">4</span>
														<span class="title">Datos Profesionales</span>
													</li>
												</ul>

												<!-- /section:plugins/fuelux.wizard.steps -->
											</div>

											<hr />

											<!-- #section:plugins/fuelux.wizard.container -->
											<div class="step-content pos-rel">
												<div class="step-pane active" data-step="1">
													<h3 class="lighter block green">Datos Personales</h3>
													<form class="form-horizontal" id="validation-form" method="get">
														<div class="form-group">

															<label class="control-label col-xs-12 col-sm-3 no-padding-right"  for="nu_cedula">Número Cedula</label>

															<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	{{ text_field("nu_cedula", "id":"nu_cedula", "placeholder":"Cedula") }}
																</div>

															</div>
														</div>

														<div class="space-2"></div>

														<div class="form-group">

															<label class="control-label col-xs-12 col-sm-3 no-padding-right"  for="rif">Rif</label>
															<div class="col-xs-12 col-sm-9"> <div class="clearfix">

																{{ text_field("rif", "size" : 30, "placeholder":"RIF") }}
															</div>
														</div>
													</div>

													<div class="space-2"></div>

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="nombre1">Primer Nombre</label>
														<div class="col-xs-12 col-sm-9"> 
															<div class="clearfix">
																{{ text_field("nombre1", "size" : 30, "placeholder":"Primer Nombre") }}
															</div>
														</div>
													</div>

													

													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="nombre2">Segundo Nombre</label>
														<div class="col-xs-12 col-sm-9"> <div class="clearfix">
															{{ text_field("nombre2", "size" : 30, "placeholder":"Segundo Nombre") }}
														</div>
													</div>
												</div>    
												<div class="space-2"></div>

												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="apellido1">Primer Apellido</label>
													<div class="col-xs-12 col-sm-9"> <div class="clearfix">
														{{ text_field("apellido1", "size" : 30, "placeholder":"Primer Apellido") }}
													</div>
												</div>
											</div>  

											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="apellido2">Segundo Apellido</label>
												<div class="col-xs-12 col-sm-9"> <div class="clearfix">
													{{ text_field("apellido2", "size" : 30, "placeholder":"Segundo Apellido") }}
												</div>
											</div>
										</div>    

										<div class="space-2"></div>

										<div class="form-group">
											<label class="control-label col-xs-12 col-sm-3 no-padding-right">Genero</label>
											<div class="col-xs-12 col-sm-9"> 

												<div><label class="line-height-1 blue">

													{{ radio_field("genero", "size" : 30, "placeholder":"Genero", "value":"1", "class":"ace") }}
													<span class="lbl"> Hombre</span>
												</label></div>


												<div> <label class="line-height-1 blue">

													{{ radio_field("genero", "size" : 30, "placeholder":"Genero", "value":"2", "class":"ace") }}
													<span class="lbl"> Mujer</span>
												</label></div>
											</div>
										</div>

										<div class="space-2"></div>

										<div class="form-group">
											<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="f_nac">Fecha de Nacimiento</label>
											<div class="col-xs-3"> <div class="input-group">
												{{ text_field("f_nac", "type" : "date", "class":"form-control date-picker", "data-date-format":"yyyy-mm-dd") }}
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>

										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="lugar_nac">Lugar de Nacimiento</label>
										<div class="col-xs-12 col-sm-9"> <div class="clearfix">

											<?php

											echo Phalcon\Tag::Select(array(
												'lugar_nac', 
												Ciudades::find(array("order" => "ciudad ASC")),
												'using' => array('id_ciudad', 'ciudad'),
												'useEmpty' => true,
												'emptyText' => 'Ingrese un valor',
												'class' => 'select2'
												));
												?>
											</div>
										</div>
									</div> 
									
									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="telf_hab">Telefono de Habitación</label>
										<div class="col-xs-12 col-sm-9"> <div class="clearfix">
											<div class="input-group">
												<span class="input-group-addon"> <i class="ace-icon fa fa-phone"></i></span>

												{{ text_field("telf_hab", "size" : 30, "type":"tel") }}
											</div>
										</div>
									</div>
								</div>   

								<div class="space-2"></div>  

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="telf_cel">Telfono de Celular</label>
									<div class="col-xs-12 col-sm-9"> 
										<div class="input-group">
											<span class="input-group-addon"> <i class="ace-icon fa fa-phone"></i></span>

											{{ text_field("telf_cel",  "type":"tel") }}

										</div>
									</div>
								</div>  

								<div class="space-2"></div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="dir_hab">Dirección de Habitación</label>
									<div class="col-xs-12 col-sm-9"> <div class="clearfix">

										{{ text_field("dir_hab", "size" : 30, "placeholder":"Dirección de Habitación") }}

									</div>
								</div>
							</div>     
							
							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="edo_civil">Estado Civil</label>
								<div class="col-xs-12 col-sm-9"> <div class="clearfix">


									{{ text_field("edo_civil", "size" : 30, "placeholder":"Estado Civil") }}

								</div>
							</div>
						</div>  
						
						<div class="space-2"></div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="correo_e">Correo</label>
							<div class="col-xs-12 col-sm-9"> <div class="clearfix">

								{{ text_field("correo_e", "type":"email", "size" : 30, "placeholder":"correo@gmail.com") }}

							</div>
						</div>
					</div>   

					<div class="space-2"></div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="id_discapacidad">Discapacidad</label>
						<div class="col-xs-12 col-sm-9"> <div class="clearfix">

							<?php

							echo Phalcon\Tag::Select(array(
								'id_discapacidad', 
								Discapacidad::find(array("order" => "id_discapacid ASC")),
								'using' => array('id_discapacid', 'discapacidad'),
								'useEmpty' => true,
								'emptyText' => 'Ingrese un valor',
								'emptyValue' => '',
								'class' => 'select2'
								));
								?>

							</div>
						</div>    
					</div>

					<div class="space-2"></div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="estatus">Estatus</label>
						<div class="col-xs-12 col-sm-9"> <div class="clearfix">

							<?php

							echo Phalcon\Tag::Select(array(
								'estatus', 
								EstatusT::find(array("order" => "estatus ASC")),
								'using' => array('id_estat', 'estatus'),
								'useEmpty' => true,
								'emptyText' => 'Ingrese un valor',
								'emptyValue' => '',
								'class' => 'select2'
								));
								?>
							</div>
						</div>
					</div> 
				</form>
			</div>

			<div class="step-pane" data-step="2">
				<div>
					<h3 class="lighter block green">Datos Contratación</h3>
				</div>
			</div>

			<div class="step-pane" data-step="3">
				<div class="center">
					<h3 class="blue lighter">This is step 3</h3>
				</div>
			</div>

			<div class="step-pane" data-step="4">
				<div class="center">
					<h3 class="green">Congrats!</h3>
					Your product is ready to ship! Click finish to continue!
				</div>
			</div>
		</div>

		<!-- /section:plugins/fuelux.wizard.container -->
	</div>

	<hr />
	<div class="wizard-actions">
		<!-- #section:plugins/fuelux.wizard.buttons -->
		<button class="btn btn-prev">
			<i class="ace-icon fa fa-arrow-left"></i>
			Previo
		</button>

		<button class="btn btn-success btn-next" data-last="Finish">
			Siguiente
			<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
		</button>

		<!-- /section:plugins/fuelux.wizard.buttons -->
	</div>

	<!-- /section:plugins/fuelux.wizard -->
</div><!-- /.widget-main -->
</div><!-- /.widget-body -->
</div>

<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
	window.jQuery || document.write("<script src='../assets/js/jquery.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
</script>


<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {

		// ------------------CALENDARIO PARA FECHAS --------------------

                //datepicker plugin
                //link
                $('.date-picker').datepicker({
                	changeMonth: true,
                	changeYear: true
                })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                	$(this).prev().focus();
                });

                //or change it into a date range picker
                $('.input-daterange').datepicker({autoclose:true});

                $('[data-rel=tooltip]').tooltip();

                $(".select2").css('width','200px').select2({allowClear:true})
                .on('change', function(){
                	$(this).closest('form').validate().element($(this));
                }); 

                var $validation = false;
                $('#fuelux-wizard-container')
                .ace_wizard({
                    //step: 2 //optional argument. wizard will jump to step "2" at first
                    //buttons: '.wizard-actions:eq(0)'
                })
                .on('actionclicked.fu.wizard' , function(e, info){
                	if(info.step == 1 && $validation) {
                		if(!$('#validation-form').valid()) e.preventDefault();
                	}
                })
                .on('finished.fu.wizard', function(e) {
                	bootbox.dialog({
                		message: "Thank you! Your information was successfully saved!", 
                		buttons: {
                			"success" : {
                				"label" : "OK",
                				"className" : "btn-sm btn-primary"
                			}
                		}
                	});
                }).on('stepclick.fu.wizard', function(e){
                    //e.preventDefault();//this will prevent clicking and selecting steps
                });

                //jump to a step
                /**
                var wizard = $('#fuelux-wizard-container').data('fu.wizard')
                wizard.currentStep = 3;
                wizard.setState();
                */

                //determine selected step
                //wizard.selectedItem().s   //documentation : http://docs.jquery.com/Plugins/Validation/validate


                 // ------------------FORMATO DE TELEFONOS --------------------
               
                $.mask.definitions['~']='[+-]';
                $('#telf_hab').mask('(9999) 999-9999');
                $.mask.definitions['~']='[+-]';
                $('#telf_cel').mask('(9999) 999-9999');
                $('#nu_cedula').mask('999999?99', {autoclear : false, placeholder : " "});

          
                jQuery.validator.addMethod("phone", function (value, element) {
                    return this.optional(element) || /^\(\d{4}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
                }, "Introduzca un numero telefonico valido.");


                $("#validation-form").validate({
                    errorElement: 'div',
                    errorClass: 'help-block',
                    focusInvalid: false,
                    ignore: "",
                    
                rules: {

                    nu_cedula: {
                    remote: {
                    url : "/sistenomialc/trabajadores/getCedula1",
                    type : "get"
                    }
                    
                    },
                    nu_cedula: {
                        required: true,
                    },
                    nombre1: {
                        required: true
                    },
                    apellido1: {
                        required: true
                    },
                    genero: {
                        required: true
                    },
                    f_nac: {
                        required: true
                    },
                    lugar_nac: {
                        required: true
                    },
                    dir_hab: {
                        required: true
                    },
                    edo_civil: {
                        required: true
                    },
                    id_discapacidad: {
                        required: true
                    },
                    estatus: {
                        required: true
                    }
                },
                
                messages: {
                        correo_e: {
                            required: "Ingrese un email valido.",
                            email: "Ingrese un email valido."
                        }
                        
                    },
            
            
                    highlight: function (e) {
                        $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                    },
                    success: function (e) {
                        $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                        $(e).remove();
                    }
            });




$('#modal-wizard-container').ace_wizard();
$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');


                /**
                $('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
                    $(this).closest('form').validate().element($(this));
                });
                
                $('#mychosen').chosen().on('change', function(ev) {
                    $(this).closest('form').validate().element($(this));
                });
*/


$(document).one('ajaxloadstart.page', function(e) {
                    //in ajax mode, remove remaining elements before leaving page
                    $('[class*=select2]').remove();
                });
})
</script>

<!-- the following scripts are used in demo only for onpage help and you don't need them -->

</body>
</html>
