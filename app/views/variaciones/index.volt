
{{ javascript_include("js/bootstrap.js") }}
{{ javascript_include("js/jquery.maskedinput.js") }}

        <!--{{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}-->
<div id="page-wrapper">

<!-- Formulario para agregar  (insertar) -->

{{ form("variaciones/cargar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}

{{ content() }}

{{ text_field("cedula", "class":"form-control input-mask-cedula", "required":"required", "placeholder":"Cedula") }}

{{ submit_button("Buscar","id":"buscar", "class":"btn btn-primary") }}
{{ endForm() }}

{{ content() }}

<!-- fin  Formulario para agregar estatus -->

<!-- tabla para mostrar todos los registros de la tabla-->
                                         <div id="msj">
    </div>

				<div class="row" id="tprins" style="display: none;">
                                    <div class="col-xs-5">
                                        <div id="msj"></div>
                                        <div class="clearfix">
                                            <div class="pull-right tableTools-container"></div>
                                        </div>
                                        <div class="table-header">
                                            Trabajador: "<strong><span class="" id="nombre"></span></strong>"   - Cedula: <strong><span class="" id="Tcedula"></span></strong> <br />
                                            Ubicación Funcional: "<strong><span class="" id="ubi_f"></span></strong>"   - Cargo: "<strong><span class="" id="cargo"></span></strong>"
                                        </div>

                                      {{ form("variaciones/procesar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
                                        {{ hidden_field("ttcedula") }}
                                        {{ hidden_field("sd") }}
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                                <th class="center">Asignación</th>
                                                <th class="center">Horas / Dias</th>
                                                <th class="center">Semana</th>
                                                <th class="center">Habilitar</th>
                                            </tr>
                                        </thead>
                                        <tbody  id="asignacion"> 
                                        </tbody>
                                            </table>
                                        {{ submit_button("Enviar","id":"enviar", "class":"btn btn-primary" ,"disabled":"disabled") }}
                                        {{ endForm() }}
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- fin tabla para mostrar todos los registros de la tabla-->

    <!-- modal -->
    <!--<div id="dialog-message" class="hide"></div>-->

        
        
        
        <script type="text/javascript">
        
            jQuery(function($) {
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
                           var asigs = JSON.parse(data);   
                           
                           var tr = ""; 
                           
                           var nombre = "";
                           
                           var cedula = "";
                           
                           var ubi_f = "";
                           
                           var cargo = "";
                           
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
                           
                           //contador para diferenciar id´s de los checkbox
                           var cont = 1;
                           
                           var select = '<select name="semana[]" disabled><option value="15">15</option><option value="30">30</option></select>';
                           //recorre los datos del JSON recibido 
                           for(datos in asigs.asignaciones){                              
                               
                               //genera todas las asignaciones variables tabuladas con sus campos 
                                tr += "<tr id=\"f"+cont+"\"><td style=\"text-transform: capitalize;\">"+asigs.asignaciones[datos].asignacion+
                                    "</td><td class=\"col-xs-3\">"+
                                    "<input type=\"text\" id=\"tf\" name=\"asigss["+asigs.asignaciones[datos].id_asignac +"]\" class=\"input-mask-numeric col-xs-12 center\" required=\"required\" disabled>"
                                    +"</td>"
                                    +"<td class=\"col-xs-3\">"+
                                    select
                                    +"</td>"+"<td class=\"col-xs-1\">"+
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
                                //habilita o deshabilita el boton enviar
                                if($('#asignacion').find("input[type=checkbox]").is(":checked")){
                                    $("#enviar").attr("disabled",false)
                                }else{
                                    $("#enviar").attr("disabled",true) 
                                }

                            });                       
                       }else{   
                           $("#tprins").css("display","none");                        
                           $("#msj").html("<div class='alert alert-block alert-danger'>La cedula introducida no existe, no es valida o no tiene asignaciones relacionadas</div>");                          }           
                })}                 
                    if(cedula == ""){   
                        $("#tprins").css("display","none"); 
                        $("#msj").html("<div class='alert alert-block alert-danger'>Debe introducir una cedula valida</div>");
                    }            
                });
            
                $('.input-mask-cedula').mask('99999999');
                $('.input-mask-numeric').mask('9999');
            });
            
        </script>