<div id="page-wrapper">
{{ form("estados/guardar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
{{ content() }}

{{ text_field("estado", "class":"form-control", "required":"required", "placeholder":"Estados") }}

{{ submit_button("Guardar", "class":"btn btn-primary") }}
 
	<table class="table">
		 <tr>
		 <td>ID</td>
		 <td>Estados</td>
		 <td>Accion</td>
		 </tr>
		 <tbody>
		<?php
			foreach($estado as $row) {
		 ?>
		<tr>
		<td><?php echo $row->id_estado; ?></td>
		<td><?php echo $row->estado; ?></td>
		<td> <?php echo $this->tag->linkTo(array("estados/editar/".$row->id_estado, "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"))  ?></a></td>
		</tr>
		 <?php
		  }
		 ?>
		 </tbody>
	</table>
	
	<a href="#" id="id-btn-dialog1" class="btn btn-purple btn-sm">Modal Dialog</a>
	
				<div id="dialog-message" class="hide">
fgdhdhdfh				</div>
	
</div>

<script type="text/javascript">
			jQuery(function($) {
			
	
			
				$( "#id-btn-dialog1" ).on('click', function(e) {
					e.preventDefault();
			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						modal: true,
						title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> jQuery UI Dialog</h4></div>",
						title_html: true,
						buttons: [ 
							{
								text: "Cancel",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" ); 
								} 
							},
							{
								text: "OK",
								"class" : "btn btn-primary btn-minier",
								click: function() {
									$( this ).dialog( "close" ); 
								} 
							}
						]
					});
			
					/**
					dialog.data( "uiDialog" )._title = function(title) {
						title.html( this.options.title );
					};
					**/
				});
			
			
						
			});
		</script>	