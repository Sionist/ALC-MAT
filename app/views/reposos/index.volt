
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
        
<?php 
use Phalcon\Mvc\View;
use Phalcon\Tag; 
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Select ?>

<div id="page-wrapper">



<!-- tabla para mostrar todos los registros de la tabla-->


 
<div class="row">


<!-- /*<?php echo $this->tag->linkTo(array("reposos/nuevo/","<i class='ace-icon fa fa-users bigger-160'></i>Nuevo","class"=>"btn btn-app btn-primary btn-xs", ""))  ?>*/-->

	{{ form("reposos/guardar", "method":"post", "autocomplete": "off", "class":"form-inline")}}


	

	<div class="col-xs-12">
      
   		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
        
        <div class="table-header">
            Reposos del Trabajador: <?php echo $nombre1."  ".$apellido1 ?> Cédula Identidad: <?php echo "  ".$nu_cedula ?>
        </div>

        	<?php echo $this->flashSession->output(); ?>

        	{{ hidden_field("ncedula", "class":"form-control") }}

        	{{ text_field("fechainicio", "type":"date", "class":"form-control date-picker", "data-date-format":"dd-mm-yyyy", "required":"required", "placeholder":"Fecha Inicio") }}<i class="fa fa-calendar bigger-110"></i>

        	{{ text_field("fechafinal", "type":"date", "class":"form-control date-picker", "data-date-format":"dd-mm-yyyy", "required":"required", "placeholder":"Fecha Finalización" )}}<i class="fa fa-calendar bigger-110"></i>

        	{{ text_field("diagnostico", "class":"form-control", "required":"required", "placeholder":"Diagnóstico") }}

        	

        	{{ submit_button("Guardar", "class":"btn btn-primary") }}
        	{{ endForm() }}
        	

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">
                                                N°
                                                </th>
                                                <th>Fecha Inicio</th>
												<th>Fecha Fin</th>
												<th>Diagnóstico</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $numerito=1;
                                            foreach($reposos as $row) {
                                            ?>
                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                    <?php 
                                                    	echo $numerito;
                                                    	$numerito++;
                                                    ?>
                                                    <span class="lbl"></span>
                                                    </label>
                                                </td>
												<td><span><?php echo date('d-m-Y', strtotime($row->f_inicio)); ?></span></td>
												<td><span><?php echo date('d-m-Y', strtotime($row->f_final))?></span></td>
												<td><span><?php echo $row->diagnostico ?></span></td>

                                                <!--<td><span style="text-transform: capitalize;"><?php echo $row->nombre1." ".$row->apellido1; ?></span></td>-->
                                                        
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons center">
                                                    <?php echo $this->tag->linkTo(array("trabajadores/ver/".$row->nu_cedula."/reposos/editar/".$row->id_reposo, "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"))  ?> 
                                                    </div>
                                                </td>
                                            </tr>
                                                <?php
                                                  }
                                                 ?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- fin tabla para mostrar todos los registros de la tabla-->

    <!-- modal -->



    <div id="dialog-message" class="hide"></div>

        
		{{ javascript_include("js/dataTables/jquery.dataTables.js") }}
		{{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}
		{{ javascript_include("js/dataTables/extensions/TableTools/js/dataTables.tableTools.js") }}
		{{ javascript_include("js/dataTables/extensions/ColVis/js/dataTables.colVis.js") }}
		
<script type="text/javascript">
$(document).ready(function()
{

	
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



		//initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();
			
			
				//TableTools settings
				TableTools.classes.container = "btn-group btn-overlap";
				TableTools.classes.print = {
					"body": "DTTT_Print",
					"info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
					"message": "tableTools-print-navbar"
				}
			
				//initiate TableTools extension
				var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
					"sSwfPath": "js/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf", //in Ace demo ../assets will be replaced by correct assets path
					
					"sRowSelector": "td:not(:last-child)",
					"sRowSelect": "multi",
					"fnRowSelected": function(row) {
						//check checkbox when row is selected
						try { $(row).find('input[type=checkbox]').get(0).checked = true }
						catch(e) {}
					},
					"fnRowDeselected": function(row) {
						//uncheck checkbox
						try { $(row).find('input[type=checkbox]').get(0).checked = false }
						catch(e) {}
					},
			
					"sSelectedClass": "success",
			        "aButtons": [
						{
							"sExtends": "copy",
							"sToolTip": "Copy to clipboard",
							"sButtonClass": "btn btn-white btn-primary btn-bold",
							"sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
							"fnComplete": function() {
								this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
									<p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
									1500
								);
							}
						},
						
						{
							"sExtends": "csv",
							"sToolTip": "Export to CSV",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
						},
						
						{
							"sExtends": "pdf",
							"sToolTip": "Export to PDF",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
						},
						
						{
							"sExtends": "print",
							"sToolTip": "Print view",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",
							
							"sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",
							
							"sInfo": "<h3 class='no-margin-top'>Print view</h3>\
									  <p>Please use your browser's print function to\
									  print this table.\
									  <br />Press <b>escape</b> when finished.</p>",
						}
			        ]
			    } );
				//we put a container before our table and append TableTools element to it
			    $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
				
				//also add tooltips to table tools buttons
				//addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
				//so we add tooltips to the "DIV" child after it becomes inserted
				//flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
				setTimeout(function() {
					$(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
						var div = $(this).find('> div');
						if(div.length > 0) div.tooltip({container: 'body'});
						else $(this).tooltip({container: 'body'});
					});
				}, 200);
				
				
				
				//ColVis extension
				var colvis = new $.fn.dataTable.ColVis( oTable1, {
					"buttonText": "<i class='fa fa-search'></i>",
					"aiExclude": [0, 6],
					"bShowAll": true,
					//"bRestore": true,
					"sAlign": "right",
					"fnLabel": function(i, title, th) {
						return $(th).text();//remove icons, etc
					}
					
				}); 
				
				//style it
				$(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
				
				//and append it to our table tools btn-group, also add tooltip
				$(colvis.button())
				.prependTo('.tableTools-container .btn-group')
				.attr('title', 'Show/hide columns').tooltip({container: 'body'});
				
				//and make the list, buttons and checkboxed Ace-like
				$(colvis.dom.collection)
				.addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
				.find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
				.find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
			
			
				
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) tableTools_obj.fnSelect(row);
						else tableTools_obj.fnDeselect(row);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(!this.checked) tableTools_obj.fnSelect(row);
					else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
				});
				
			
				
				
					$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
		
		});
		
		</script>		 
		