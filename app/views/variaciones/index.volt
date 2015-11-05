
{{ javascript_include("js/bootstrap.js") }}
{{ javascript_include("js/jquery.maskedinput.js") }}

        <!--{{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}-->
<div id="page-wrapper" >

<!-- Formulario para agregar  (insertar) -->
{{ form("", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
    {{ hidden_field("frecuencia") }}
    <div class="page-header">
        <div class="form-actions">
            <div class="form-group">
                <label for="nomina" class=""><span>Nomina: &nbsp;</span> </label>
                <?php
                    echo Phalcon\Tag::Select(array(
                    'nomina', 
                    TipoNomi::find(array("order" => "id_nomina ASC")),
                    'using' => array('id_nomina', 'nomina'),
                    'useEmpty' => true,
                    'class' => 'select2'
                    ));
                ?>    
            </div> 
            <div class="form-group">
                <label for="ano" class="">&nbsp; Año: &nbsp;</label>
                <select id="ano" name="ano" disabled>
                    <option value="<?php echo (Date("Y")-1).'">'.(Date("Y")-1); ?></option>
                    <option value="<?php echo Date("Y").'">'.Date("Y"); ?></option>
                </select>
<!--                {{ text_field("año","id":"year", "class":"input-small center", "required":"required", "placeholder":"", "disabled":"disabled") }}     -->
            </div>    
            <div class="form-group">
                    <label for="sqm" class=""> &nbsp; Semana / Quincena / Mes: &nbsp;</label>  
                        <select id="sqm" name="sqm" disabled>                             
                    </select>
            </div>
           &nbsp; ¿Esta De Acuerdo? &nbsp;
            <div  class="form-group">
            <label style="margin-top: 10px; display: block">
                <input id="sel_acep" name="switch-field-1" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" disabled>
                <span class="lbl" data-lbl="NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SI"></span>
            </label>
            </div>
          &nbsp; <button id="aceptar" class="btn btn-sm btn-primary">Aceptar</button>  
        </div>
    </div>
{{ endForm() }} 
    



    
<div id="div_buscar" class="hidden" style="display: block">
{{ form("variaciones/buscar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}

{{ content() }}

{{ text_field("cedula", "class":"form-control input-mask-cedula", "required":"required", "placeholder":"Cedula") }}

{{ submit_button("Buscar","id":"buscar", "class":"btn btn-sm btn-primary") }}
{{ endForm() }}

</div>
<br />

{{ content() }}

<!-- fin  Formulario para agregar estatus -->

<!-- tabla para mostrar todos los registros de la tabla-->
                                         <div id="msj">
    </div>
                <div id="row">
                    <div id="img" class="col-md-2" style="display: none;">
                        <span class="profile-picture">                                                                     
                            <img id="foto" class="img-responsive" title="" src="" style=""></img>
                        <div class="center">FOTO</div>
                        </span>
                    </div>
                </div>
                <div class="row">
				<div class="col-md-5" id="tprins" style="display: none;">
                                    
                                    <div class="">
                                        <div id="msj"></div>
                                        
                                        <div class="table-header">
                                            
                                            Trabajador: "<strong><span class="" id="nombre"></span></strong>"   - Cedula: <strong><span class="" id="Tcedula"></span></strong> <br />
                                            Ubicación Funcional: "<strong><span class="" id="ubi_f"></span></strong>"   - Cargo: "<strong><span class="" id="cargo"></span></strong>"
                                            
                                        </div>
                                        
                                      {{ form("variaciones/procesar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
                                        {{ hidden_field("ttcedula") }}
                                        {{ hidden_field("sd") }}
                                        {{ hidden_field("year") }}
                                        {{ hidden_field("s-q-m") }}
                                        {{ hidden_field("nomi") }}
                                        <table id="dynamic-table" class="table table-striped table-bordered">
                                        <thead>
                                                <th class="center">Asignación</th>
                                                <th class="center">Horas / Dias</th>
                                                <th class="center">Habilitar</th>
                                            </tr>
                                        </thead>
                                        <tbody  id="asignacion"> 
                                        </tbody>
                                            </table>
                                        {{ submit_button("GUARDAR","id":"guardar", "class":"btn btn-primary btn-block" ,"disabled":"disabled") }}
                                        {{ endForm() }}
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- fin tabla para mostrar todos los registros de la tabla-->
<br />
<div class="row">
    <div id="msj_exito" class="alert alert-block alert-success hidden col-md-12">exito</div>
</div>
<div class="row">
    <div id="msj_error" class="alert alert-block alert-danger col-md-12 hidden">error</div>
</div>

    <!-- modal -->
<div id="dialog-confirm" class="hide">
    <p>
        <h4>¿Esta seguro?</h4>
    </p>
</div>
    <!--<div id="dialog-message" class="hide"></div>-->

        
        
        
        <script type="text/javascript">
        
            jQuery(function($) {
                
                var f = new Date();
                
                //establece el año actual
                $("#ano").val(f.getFullYear());
                
                $("#nomina").change(function(){
                    
                    var nomina = $("#nomina").val()
                    
                    $.post("./nomina", { "nomina" : nomina },function(data){
                       var nomina = JSON.parse(data);
                        var frecuencia = nomina.tipoNomi[0].f;
                        
                        if(frecuencia == "quincenal"){
                            
                             $("#sqm").html("");
                                                        
                            //almacena la fecha actual
                            var f = new Date(); 
                            
                            //almacena el mes actual
                            var mes = f.getMonth()+1;
                            
                            //var mes = 12; 
                            var quincena = mes * 2;
                            
                            var option="";
                            
                            for(var i=1 ;i<=24;i++){
                               option = "<option class='op' value=\""+i+"\">"+i+"</option>";
                                $("#sqm").append(option); 
                            }
                            
                            //calcula la quincena actual
                        if(f.getDate() < 15){
                            
                                $("#sqm").val(quincena-1);
                            }else{
                                //alert(quincena);
                                $("#sqm").val(quincena);
                            }
                            
                        }else if(frecuencia=="mensual"){
                            
                             $("#sqm").html("");
                            
                            //almacena la fecha actual
                            var f = new Date();
                            
                            var mes = f.getMonth()+1;
                            
                            var option="";
                            
                            for(var i=1 ;i<=12;i++){
                                option = "<option class='op' value=\""+i+"\">"+i+"</option>";
                               
                                $("#sqm").append(option); 
                            }
                                                   
                            $("#sqm").val(mes);
                           
                        }else{
                            
                            $("#sqm").html("");
                            
                            var sem_actual = "<?php echo Date("W");  ?>";
                            
                            var sem_final = "<?php   $f = date("Y")."-12-31"; $fu = strtotime($f);  echo Date("W", $fu);  ?>"; 
                            
                            for(var i=1 ;i <= sem_final;i++){
                                option = "<option class='op' value=\""+i+"\">"+i+"</option>";
                               
                                $("#sqm").append(option); 
                            }
                            
                            $("#sqm").val(sem_actual);    
                        }                                                   
                    });
                    
                    if($("#nomina").val() != ""){
                        $("#sel_acep").attr("disabled",false);
                        $("#aceptar").attr("disabled",false);
                    }else{
                        $("#sel_acep").attr("disabled",true);
                        $("#aceptar").attr("disabled",true);
                    }
                    $("#sel_acep").click(function(){
                        if($("#sel_acep").is(":checked") && $("#nomina").val() != ""){
                            $("#ano").attr("disabled",false);
                            $("#sqm").attr("disabled",false)
                        }else{
                            $("#ano").attr("disabled",true);
                            $("#sqm").attr("disabled",true)
                        } 
                    });
                }); 
                
                $("#aceptar").click(function(e){
                    e.preventDefault();
                    $("#div_buscar").removeClass("hidden");
                });
                
                                                                                      
    
                $("#cedula").focus();
                
                $("#buscar").click(function(e){
                    
                    e.preventDefault();
                    
                    //alamacena la cedula introducida
                    var cedula = $("#cedula").val();
                                       
                    if(cedula !=""){                  
                    //solicitud ajax por POST a action : procesar
                    $.post("./buscar", { "cedula" : cedula },function(data){              
                           
                        //data contiene la respuesta JSON del controlador
                       if(data != ""){
                           //convierte la data en un objeto
                           
                           $("#year").val($("#ano").val());
                           $("#s-q-m").val($("#sqm").val());
                           $("#nomi").val($("#nomina").val());
                           
                           var asigs = JSON.parse(data);   
                           
                           var tr = ""; 
                           
                           var nombre = "";
                           
                           var cedula = "";
                           
                           var ubi_f = "";
                           
                           var cargo = "";
                           
                           var foto = asigs.trabajador[0].foto_p;
                           
                           var sueldo = asigs.sd;
                           
                           $("#sd").val(sueldo);                           
                           //almacena nombre y apellido del trabajador
                           nombre += asigs.trabajador[0].nombre1 +" "+ asigs.trabajador[0].apellido1;
                           
                           //almacena cedula del trabajador
                           cedula += asigs.trabajador[0].nu_cedula;
                           
                           ubi_f += asigs.trabajador[0].denominacion;
                           
                           cargo += asigs.trabajador[0].cargo;

                           $("#Tcedula").html(cedula);
                           
                           $("#nombre").html(nombre);
                           
                           $("#ubi_f").html(ubi_f);
                           
                           $("#cargo").html(cargo);
                           
                           $("#ttcedula").val(asigs.trabajador[0].nu_cedula);
                           
                           if(foto !=null){
                                $("#foto").attr("src","../public/empleados/fotos/"+foto)
                                $("#foto").attr("title",nombre);
                           }else{
                                $("#foto").attr("src","../public/img/interrogante.png")
                           }
                           
                           //contador para diferenciar id´s de los checkbox
                           var cont = 1;
                           
                           //recorre los datos del JSON recibido 
                           for(datos in asigs.asignaciones){ 
                            
                               //genera todas las asignaciones variables tabuladas con sus campos 
                                tr += "<tr id=\"f"+cont+"\"><td class=\"col-xs-15\" style=\"text-transform: capitalize;\">"+asigs.asignaciones[datos].asignacion+
                                    "</td><td class=\"col-xs-3\">"+
                                    "<input type=\"text\" id=\"tf\" name=\""+asigs.asignaciones[datos].id_asignac +"\" class=\"input-mask-numeric col-xs-12 center\" required=\"required\" disabled>"
                                    +"</td>"
                                    +"<td class=\"col-xs-1\">"+
                                    "<input name=\"switch-field-1\" id=\"c"+cont+"\" class=\"ace ace-switch ace-switch-6\"                                                       type=\"checkbox\">"+"<span class=\"lbl\"></span>"
                                    +"</td></tr>";
                                cont++;
                                                             
                            }
                            //oculta el div que contiene la tabla
                            $("#tprins").css("display","none"); 
                            //mensaje de error si no existe la cedula o no se introdujo una valida o campo vacio
                            $("#msj").html("");
                            //agrega la info generada dentro de tbody : asignacion
                            $("#asignacion").html(tr);
                            //efecto slide para la tabla
                            $("#tprins").slideDown(100);
                            $("#img").slideDown(100);
                        
                           //habilita o deshabilita los campos de texto segun estado de los checkbox
                           $("input[type=checkbox]").click(function(){
                                var hijo = $(this).attr("id");
                                var padre = $(this).parent().parent().attr("id");
                               
                                $.mask.definitions['~']='[+-]';
                                $('.input-mask-numeric').mask('99');
                               
                               if($('#'+hijo).is(":checked")){
                                    $('#'+padre).find("input[type=text]").attr("disabled",false);
                                    $('#'+padre).find("select").attr("disabled",false);
                                }else{
                                    $('#'+padre).find("input[type=text]").attr("disabled",true);
                                    $('#'+padre).find("select").attr("disabled",true);
                                }
                                //habilita o deshabilita el boton guardar
                                if($('#asignacion').find("input[type=checkbox]").is(":checked")){
                                    $("#guardar").attr("disabled",false)
                                }else{
                                    $("#guardar").attr("disabled",true) 
                                }

                            });                       
                       }else{   
                           $("#tprins").css("display","none");  
                           $("#img").css("display","none");
                           $("#msj").html("<div class='alert alert-block alert-danger'>La cedula introducida no existe, no es valida o no tiene asignaciones relacionadas</div>");                          }           
                })}                 
                    if(cedula == ""){   
                        $("#tprins").css("display","none"); 
                        $("#msj").html("<div class='alert alert-block alert-danger'>Debe introducir una cedula valida</div>");
                    }            
                });
            
                $('.input-mask-cedula').mask('99999999');
                $('.input-mask-numeric').mask('9999');
                
                
               /**              **
                * DIALOGO MODAL  *
                **              **/               
                $( "#guardar" ).on('click', function(e) {
					e.preventDefault();
				
					$( "#dialog-confirm" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
				        title: "¡SE VAN A GUARDAR LOS DATOS!",
						title_html: true,
						buttons: [
							{
								html: "<i class='ace-icon glyphicon glyphicon-remove'></i>&nbsp; Confirmar",
								"class" : "btn btn-success btn-minier",
                                "id":"btnConfirm",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancelar",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});
                    
                    $("#btnConfirm").click(function(){
                        
                        var nomina = $("#nomina").val();
                        var ano = $("#ano").val();
                        var sqm = $("#sqm").val();
                        var cedula = $("#ttcedula").val();
                        var asigs = new Object();
                        var name = "";
                        var valor = "";
                        var sd = $("#sd").val(); 
                    
                        $("#asignacion").find("tr").find("input[type=text]").each( function(){ 
                            name = $(this).attr('name');
                            if($(this).val() != ""){
                                valor = $(this).val();
                                asigs[name] = $(this).val();
                                alert (name +"="+ asigs[name]);
                            }
                            
                        });
                                               
                        $.post("./procesar", { 
                            "nomina" : nomina,
                            "ano" : ano,
                            "sqm" : sqm,
                            "cedula" : cedula,
                            "asigs" : asigs,
                            "sd" : sd  },function(data){

                            var res = JSON.parse(data);
                            
                            alert(res.msj_error);
                            alert(res.msj_exito);
                            if(res != ""){
                                $("#msj_exito").html(res.msj_exito).removeClass("hidden");
                                if(typeof(res.msj_error) != "undefined"){
                                    $("#msj_error").html(res.msj_error).removeClass("hidden");
                                }
                            }
                            
                        });
                       

				    });
                });
                
            
                    
                    
                    
                    /**/

        });            
        </script>