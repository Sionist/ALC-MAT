{{ javascript_include("js/bootstrap.js") }}
{{ javascript_include("js/dataTables/extensions/ColVis/js/dataTables.colVis.js") }}
<div class="row col-sm-10 col-sm-offset-1">
	<div class="col-sm-11">

	{{ form("userrss/asignar-permisos", "method" : "post") }}
	{{ hidden_field("id") }}
		<?php foreach($permisos as $k => $permiso){ ?>

		<div class="col-sm-6">

			<div class="row">
				<div class="col-sm-6" style="padding-left: 0;text-transform: capitalize;"><h3 style="padding: 0; margin: 0"><?php echo $k; ?></h3></div>
				<div class="col-sm-5" style="padding-right: 0">
					<label class="block" style="text-align: right; margin-top: 3px;">
						<input name="" value="" type="checkbox" class="ace">
						Todos&nbsp;&nbsp;<span class="lbl bigger-80"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<hr style="margin-right: 30px">
			</div>
			<?php foreach ($permiso as $p): ?>
				<div class="row well well-sm" style="margin-right: 20px">
					<div class="col-sm-10 label-control no-padding-right"><label><?php echo $p->nombre; ?></label></div>
					<div class="col-sm-2">
						<label class="block" style="text-align: right;">
							<input name="permisos[]" value=<?php echo $p->id; ?> type="checkbox" class="ace input-lg">
							<span class="lbl bigger-120"></span>
						</label>
					</div>
				</div>
			<?php endforeach ?>

		</div>

		<?php } ?>
		{{ submit_button("ASIGNAR", "class" : "btn btn-primary btn-block", "style" : "max-width: 834px") }}
		{{ endForm() }}
	</div>
</div>
<script type="text/javascript">
	/*$(document).ready(function(){

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
	//and make the list, buttons and checkboxed Ace-like
	$(colvis.dom.collection)
	.addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
                .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
                .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
            });/*
</script>