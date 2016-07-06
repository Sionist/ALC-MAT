
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

	
		<!--<div class="col-sm-3">-->
		<!--		<td align="right"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/sistenomialc/beneficiados/index/<?php echo $ncedula; ?>" title="Volver">-->
		<!--		<img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/sistenomialc/img/btn-volver.png"></a>&nbsp;</td>			
		    </div>-->

		<div class="col-sm-8">
			<div class="widget-box" align="center">
				<div class="widget-header" align="center">
					<h4 class="widget-title">Editar Beneficiarios de Embargo a <?php echo $nombre1." ".$apellido1." " ?>Cédula:<?php echo " ".$ncedula ?></h4>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
												
						{{ form("beneficiados/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
						<fieldset>
						<?php echo $this->flashSession->output(); ?>
						
						{{ hidden_field("idbeneficiado") }}
						{{ hidden_field("ncedula") }}
						{{ hidden_field("idembargo") }}
						
						<table align="center">

							<tr>
								<td>
									<b><h4>Tribunal: <?php echo "  ".$tribunal ?></b></h4>
								</td>

								<td>

								</td>

								<td>
									<b><h4>N° Expediente: <?php echo "  ".$nexpediente ?></b></h4>
								</td>								
							</tr>

							<tr>
								
							</tr>
						

							<tr>
								<td>
									<th>Cédula del Beneficiario:</th>
								</td>
								
								<td>
									{{ text_field("cibene", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
								</td>								
							</tr>
							
							<tr>
								<td>
									<th>Apellidos:</th>
								</td>
								
								<td>	
									{{ text_field("apellidos", "class":"form-control", "required":"required", "style":"text-transform:capitalize") }}
								</td>									
							</tr>
								
							<tr>
								<td>
									<th>Nombres:</th>
								</td>
								
								<td>	
									{{ text_field("nombres", "class":"form-control", "style":"text-transform:capitalize") }}
								</td>									
							</tr>

							<tr>	
								<td>
									<th>Fecha Nacimiento:</th>
								</td>

								<td>	
									{{ text_field("fnac", "type":"date", "class":"form-control date-picker", "data-date-format":"yyyy-mm-dd", "required":"required", "style":"text-transform:capitalize") }}<i class="fa fa-calendar bigger-110"></i>
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
		
		{{ javascript_include("js/bootstrap.js") }}
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