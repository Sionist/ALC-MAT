        {{ javascript_include("js/jquery.maskedinput.js") }}    
        {{ javascript_include("js/bootstrap.js") }}
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
        	<div class="widget-box">
        		<div class="widget-header">
        			<h4 class="widget-title">Editar Centros Gestores</h4>
        		</div>

        		<div class="widget-body">
        			<div class="widget-main no-padding">
        				
        				
        				{{ form("direcciones-alcaldia/editado", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
        				<fieldset>
        					{{ content() }}
        					{{ hidden_field("id") }}
        					{{ text_field("sector", "class":"form-control sector", "required":"required", "style":"text-transform:capitalize") }}
        					{{ text_field("direccion", "class":"form_control", "required":"required","style":"text-transform:capitalize")}}
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
        	jQuery(function($){
        		$('.sector').mask('9?99999', {autoclear : false, placeholder : " "});
        	});
        </script>