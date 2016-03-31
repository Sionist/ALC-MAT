{{ javascript_include("js/bootstrap.js") }}
{{ javascript_include("js/dataTables/extensions/ColVis/js/dataTables.colVis.js") }}
<div class="center"><h1>ASIGNACION DE PERMISOS DE USUARIO</h1></div>
<div class="row">
	<div class="header center form-actions"><h3><?php echo "USUARIO: <strong>".$user->username."</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOMBRE: <strong>".$user->nombre."</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ESTATUS: <strong>".$user->estatus."</strong>"; ?></h1>
	</div>
</div>
<div class="row">
	<div class="header center">
		<label>
			<h3>ASIGNAR TODOS&nbsp;</h3>
		</label>
		<label style="display: block; padding-bottom: 20px">
			<input name="asig_todos" value="" type="checkbox" id="asig_todos" class="ace input-lg" style="padding-bottom: 20px">
			<span class="lbl bigger-80"></span>
		</label>
	</div>
</div>
<div class="row col-sm-10 col-sm-offset-1">
	<div class="col-sm-11" id="permisos">

		{{ form("userrss/asignar-permisos", "method" : "post") }}
		{{ hidden_field("id") }}
		<?php $cont = 0; foreach($permisos as $k => $permiso){ ?>

		<div class="col-sm-6" id=<?php echo "'container".$cont++."'"; ?>>

			<div class="row">
				<div class="col-sm-6" style="padding-left: 0;text-transform: capitalize;"><h3 style="padding: 0; margin: 0"><?php echo $k; ?></h3></div>
				<div class="col-sm-5" style="padding-right: 0">
					<label class="block" style="text-align: right; margin-top: 3px;">
						<input name="todos[]" value="" type="checkbox" class="ace ace-checkbox-2">
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
	$(document).ready(function(){
		var permisos = new Array();
		<?php 
			$cont = 0; 
			foreach($permisosU as $p) {
				echo "permisos[$cont] = '$p->permiso_id'\n";
				$cont++;
			} 
		?>
		var inputs = $("#permisos").find('input[name="permisos[]"]');
		//alert("tamnaño es: "+permisos.length);
		$("#asig_todos").click(function(){
			if($("#asig_todos").is(":checked")){
				inputs.each(function(){
					$(this).prop("checked", true);
				});
			} else {
				inputs.each(function(){
					$(this).prop("checked", false);
				});
			}

		});

		//pone en estado checked los inputs que coincidan con el array permisos
		inputs.each(function(){
			for(var i=0; i < permisos.length ;i++){
				if($(this).val() == permisos[i]){
					//alert("el permiso es: " + permisos[i]);
					$(this).attr("checked", true);
				}
			}
			//alert($(this).val());
		});

		//pone en estado checked a inputs que esten en mismo grupo de todos[]
		$('input[name="todos[]"]').click(function(){
			var padre = $(this).parent().parent().parent().parent();
			var inputs = padre.find("input[name='permisos[]']");
			if($(this).is(":checked")){
				inputs.each(function(){
					$(this).prop("checked",true);
				});
			} else {
				inputs.each(function(){
					$(this).prop("checked",false);
				});
			}
		});

		/** CODIGO QUE PONE EN ESTADO CHECKED A INPUT ASIGNAR_TODOS SI TODOS PERMISOS[] ESTAN EN CHECKED **/
		/** ELSE -> LES QUITA ESTADO CHECKED **/
		var inputsPer = $("input[name='permisos[]']");
		var cont = 0; 
		inputs.each(function(){
			if($(this).is(":checked")){
				cont++;
			}
		});
		if(cont == inputsPer.length){
			$("#asig_todos").prop("checked",true);
		}else{
			$("#asig_todos").prop("checked",false);
		}

		/** CODIGO QUE PONE EN ESTADO CHECKED A INPUTS TODOS[] SI TODOS PERMISOS[] DE SU GRUPO ESTAN EN CHECKED **/
		/**ELSE -> LES QUITA ESTADO CHECKED **/
		var padresTods = $("input[name='todos[]']").parent().parent().parent().parent();

		padresTods.each(function(){
			var icheckeds = $(this).find("input[name='permisos[]']:checked"); 
			var inputsTods = $(this).find("input[name='permisos[]']");
			if(icheckeds.length == inputsTods.length){
				$(this).find("input[name='todos[]']").prop("checked",true);
			}else{
				$(this).find("input[name='todos[]']").prop("checked",false);
			}
		});

		/** PONE EN ESTADO CHECKED A INPUTS TODOS[] SI ASIGNAR_TODOS ESTA EN CHECKED **/
		/** ELSE -> LES QUIETA EL CHECKED **/
		$("#asig_todos").click(function(){
			if($("#asig_todos").is(":checked")){
				$("input[name='todos[]']").prop("checked",true);
			}else{
				$("input[name='todos[]']").prop("checked",false);
			}
		})

		/** PONE EN ESTADO CHECKED A INPUT TODOS[] SI TODOS PERMISOS[] EN SU GRUPO ESTAN EN CHECKED **/
		/** ELSE -> LE QUIETA EL CHECKED **/
		$("input[name='permisos[]']").click(function(){
			var padre = $(this).parent().parent().parent().parent();
			var inputsPer = padre.find("input[name='permisos[]']");
			var inputsPerCheck = padre.find("input[name='permisos[]']:checked");
			if(inputsPer.length == inputsPerCheck.length){
				padre.find("input[name='todos[]']").prop("checked",true)
			}else{
				padre.find("input[name='todos[]']").prop("checked",false)
			}
		});

		/** CODIGO QUE PONE EN ESTADO CHECKED A INPUT ASIGNAR_TODOS SI TODOS PERMISOS[] ESTAN EN CHECKED **/
		/** ELSE -> LES QUITA ESTADO CHECKED **/
		inputsPer.click(function(){
			var cont = 0; 
			inputsPer.each(function(){
				if($(this).is(":checked")){
					cont++;
				}
			});
			if(cont == inputsPer.length){
				$("#asig_todos").prop("checked",true);
			}else{
				$("#asig_todos").prop("checked",false);
			}	
		})

		/** CODIGO QUE PONE EN ESTADO CHECKED A INPUT ASIGNAR_TODOS SI TODOS "TODOS[]" ESTAN EN CHECKED **/
		/** ELSE -> LES QUITA ESTADO CHECKED **/
		var inputsTods = $("input[name='todos[]']");
		inputsTods.click(function(){
			var cont = 0; 
			inputsTods.each(function(){
				if($(this).is(":checked")){
					cont++;
				}
			});
			if(cont == inputsTods.length){
				$("#asig_todos").prop("checked",true);
			}else{
				$("#asig_todos").prop("checked",false);
			}	
		})
		
	});
</script>