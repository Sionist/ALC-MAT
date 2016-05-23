{{ javascript_include("js/bootstrap.js") }}
<div id="page-wrapper">

	<div class="row">
		<div class="col-xs-12">
			<?php echo $this->tag->linkTo(array("trabajadores/ver/".$trabaja->nu_cedula."/carga-familiar/nueva-carga","<i class='ace-icon fa fa-users bigger-160'></i>Nueva",'class'=>'btn btn-app btn-primary btn-xs')) ?>
			<?php echo $this->flashSession->output(); ?>
		</div>
	</div>
	<br />
<!-- <a href="http://190.202.129.59/sistenomialc/cargafamiliar/nuevo/<?php echo $trabaja->nu_cedula;?>" title="Agregar Carga Familiar" class="btn btn-app btn-primary btn-xs">
<i class="ace-icon fa fa-users bigger-160"></i>
Nuevo
</a> -->

<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">

		</div>
		<div class="table-header">Carga Familiar Trabajador:<b><?php echo $trabaja->nombre1;?> <?php echo $trabaja->apellido1;?></b>  Cédula:<b><?php echo $trabaja->nu_cedula;?></b></div>


		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>N°</th>
					<th>Ced. Pariente</th>
					<th>Nombre</th>
					<th>Fech. Nac.</th>
					<th>Genero</th>
					<th>Parentesco</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php $numerito=1;
				foreach($carga as $row) {
					?>
					<tr>
						<td><?php echo $numerito; $numerito++; ?></td>
						<td><?php echo $row->ci_carga; ?></td>
						<td><?php echo $row->nombre1; ?> <?php echo $row->apellido1; ?></td>
						<td><?php echo date('d-m-Y',strtotime($row->f_nac));?></td>
						<td><?php echo $row->genero; ?></td>
						<td><?php echo $row->parent; ?></td>
						<td>
							<?php echo $this->tag->linkTo("trabajadores/ver/".$trabaja->nu_cedula."/carga-familiar/detalle/".$row->id_carga,"<i class='ace-icon fa fa-search-plus bigger-130'></i>") ?>
							<?php echo $this->tag->linkTo("trabajadores/ver/".$trabaja->nu_cedula."/carga-familiar/editar/".$row->id_carga, "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>") ?>   
							<!-- <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/sistenomialc/trabajadores/carga-familiar/detalle/<?php echo $row->id_carga; ?>">Detalles</a></td> -->
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

{{ javascript_include("js/dataTables/jquery.dataTables.js") }}
{{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}
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

		$("#estado").on("change", function()
		{
			var id_estado = $("#estado option:selected").attr("value");

			$.get("<?php echo $this->url->get('ciudades/getCiudades') ?>", {"estado":id_estado}, function(data)
			{

				var ciud ="";

				var ciuda = JSON.parse(data);

				ciud += "<option value='0'>Seleccione Ciudad</option>";

				for(datos in ciuda.ciud)
				{
					ciud += '<option value="'+ciuda.ciud[datos].id_ciudad+'">'+
					ciuda.ciud[datos].ciudad.
					toUpperCase()+'</option>';
				}

				$('#cargar_ciudad').html(ciud);
			});

		});
		
		//initiate dataTables plugin
		var oTable1 = 
		$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					{ "bSortable": false },
					null, null, null, null, null,
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
		
		

		
		