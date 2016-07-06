
		{{ stylesheet_link("css/datepicker.css") }}
        {{ stylesheet_link("css/bootstrap-timepicker.css") }}
        {{ stylesheet_link("css/daterangepicker.css") }}
        {{ stylesheet_link("css/bootstrap-datetimepicker.css") }}
        {{ stylesheet_link("css/colorpicker.css") }}
		
        {{ javascript_include("js/bootstrap.js") }}
        {{ javascript_include("js/dataTables/jquery.dataTables.js") }}
        {{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}
        {{ javascript_include("js/dataTables/extensions/TableTools/js/dataTables.tableTools.js") }}
        {{ javascript_include("js/dataTables/extensions/ColVis/js/dataTables.colVis.js") }}
		
        {{ javascript_include("js/date-time/bootstrap-datepicker.js") }}
        {{ javascript_include("js/date-time/bootstrap-timepicker.js") }}
        {{ javascript_include("js/date-time/moment.js") }}
        {{ javascript_include("js/date-time/daterangepicker.js") }}
        {{ javascript_include("js/date-time/bootstrap-datetimepicker.js") }}

	
		<div class="col-sm-3">
		</div>

		<div class="col-sm-6">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title">Editar Embargo de <?php echo $nombre1." ".$apellido1." " ?>Cédula:<?php echo " ".$ncedula ?></h4>
				</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
												
						{{ form("embargos/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						{{ content() }}
						
						{{ hidden_field("idembargo") }}
						{{ hidden_field("ncedula") }}
						
						
						<table align="center">
						
							<tr>
								<td>
									<th>Tribunal</th>
								</td>
								
								<td>
								</td>
								
								<td>
									{{ text_field("tribunal", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
								</td>								
							</tr>
							
							<tr>
								<td>
									<th>N° Expediente</th>
								</td>
								
								<td>
								
								</td>
								
								<td>	
									{{ text_field("nexpediente", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
								</td>									
							</tr>
								
							<tr>
								<td>
									<th>Fecha Dictamen</th>
								</td>
								
								<td>
								
								</td>
								
								<td>	
									{{ text_field("fdictamen", "type":"date", "class":"form-control date-picker", "data-date-format":"yyyy-mm-dd", "required":"required", "style":"text-transform:capitalize") }}<i class="fa fa-calendar bigger-110"></i>
								</td>									
							</tr>

							<tr>	
								<td>
									<th>Porcentaje a Descontar</th>
								</td>

								<td>

								</td>
								
								<td>	
									{{ text_field("porcentaje", "class":"form-control", "style":"text-transform:capitalize") }}
								</td>	

							</tr>
					
							<tr>	
								<td>
									<th>Concepto Descuento</th>
								</td>

								<td>

								</td>
								
								<td>	

									<?php
										echo $this->tag->select(array(
   										'concepto',
   										FondoDesc::find(array('order' => 'id_fondo ASC')),
   										'using' => array('id_fondo', "fondo"),
   										'useEmpty' => true,
   										'emptyText' => "Seleccione Concepto de Embargo",
   										"class" => "form-control",
   										"required" => "required"
   										))
   									?>	
									
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
		

		{{ javascript_include("js/dataTables/jquery.dataTables.js") }}
		{{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}
		{{ javascript_include("js/dataTables/extensions/TableTools/js/dataTables.tableTools.js") }}
		{{ javascript_include("js/dataTables/extensions/ColVis/js/dataTables.colVis.js") }}

	<script type="text/javascript">
$(document).ready(function()
{
	$(document).ready(function() {
        $('#stream_table').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "aaSorting": [[ 0, "asc" ]]
        }
       );
    });

	$("#concepto").on("change", function()
    {
     var idfondo = $("#concepto option:selected").attr("value");
	
	 $.get("<?php echo $this->url->get('embargos/obtenerFondo') ?>", {"id":idfondo}, function(data)
		{
	  		var fondo = "";
	  		fondo = JSON.parse(data);
	  		$("#concep").html(fondo);
		});
		
	});

		


	
                // ------------------CALENDARIO PARA FECHAS --------------------

                //datepicker plugin
                //link
                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    changeYear: true
                })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
            
                //or change it into a date range picker
                $('.input-daterange').datepicker({autoclose:true});
            
            
                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                $('input[name=date-range-picker]').daterangepicker({
                    'applyClass' : 'btn-sm btn-success',
                    'cancelClass' : 'btn-sm btn-default',
                    locale: {
                        applyLabel: 'Apply',
                        cancelLabel: 'Cancel',
                    }
                })
                .prev().on(ace.click_event, function(){
                    $(this).next().focus();
                });
            
            
                $('#timepicker').timepicker({
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: false
                }).next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
                
                $('#date-timepicker').datetimepicker().next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
		});
		
		</script>		 