
{{ javascript_include("js/bootstrap.js") }}
{{ javascript_include("js/jquery.maskedinput.js") }}

        <!--{{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}-->
<div id="page-wrapper" >

<!-- Formulario para agregar  (insertar) -->
{{ form("variaciones/cargar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
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
                <label for="año" class="">&nbsp; Año: &nbsp;</label>
                {{ text_field("año","id":"year", "class":"input-small center", "required":"required", "placeholder":"", "disabled":"disabled") }}     
            </div>    
            <div class="form-group">
                    <label for="sem_quin" class=""> &nbsp; Semana / Quincena / Mes: &nbsp;</label>  
                    <select id="sem_quin" name="sem_quin"></select>
            </div>
           &nbsp; ¿Esta De Acuerdo? &nbsp;
            <div  class="form-group">
            <label style="margin-top: 10px; display: block">
                <input name="switch-field-1" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" >
                <span class="lbl" data-lbl="SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO"></span>
            </label>
            </div>
          &nbsp; {{ submit_button("Aceptar","id":"buscar", "class":"btn btn-sm btn-primary") }}  
        </div>
    </div>
{{ endForm() }} 
    



    
<div style="display: block">
{{ form("variaciones/buscar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}

{{ content() }}

{{ text_field("cedula", "class":"form-control input-mask-cedula", "required":"required", "placeholder":"Cedula") }}

{{ submit_button("Buscar","id":"buscar", "class":"btn btn-primary") }}
{{ endForm() }}

</div>
<br />

{{ content() }}

<!-- fin  Formulario para agregar estatus -->

<!-- tabla para mostrar todos los registros de la tabla-->
                                         <div id="msj">
    </div>

                <div id="img" class="col-xs-12 col-sm-2" style="display: none;">
                    <span class="profile-picture">                                                                     
                        <img id="foto" class="img-responsive" title="" src="" style=""></img>
                    <div class="center">FOTO</div>
                    </span>
                </div>
				<div class="col-sm-10 col-xs-12" id="tprins" style="display: none;">
                                    
                                    <div class="col-sm-6">
                                        <div id="msj"></div>
                                        
                                        <div class="table-header">
                                            
                                            Trabajador: "<strong><span class="" id="nombre"></span></strong>"   - Cedula: <strong><span class="" id="Tcedula"></span></strong> <br />
                                            Ubicación Funcional: "<strong><span class="" id="ubi_f"></span></strong>"   - Cargo: "<strong><span class="" id="cargo"></span></strong>"
                                            
                                        </div>
                                        
                                      {{ form("variaciones/procesar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
                                        {{ hidden_field("ttcedula") }}
                                        {{ hidden_field("sd") }}
                                        <table id="dynamic-table" class="table table-striped table-bordered">
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
                
                var f = new Date();
                
                //establece el año actual
                $("#year").val(f.getFullYear());
                
                $("#nomina").change(function(){
                    
                    var nomina = $("#nomina").val()
                    
                    $.post("./nomina", { "nomina" : nomina },function(data){
                       var nomina = JSON.parse(data);
                        var frecuencia = nomina.tipoNomi[0].f;
                        
                        if(frecuencia == "quincenal"){
                            
                            var f = new Date();
                            var mes = f.getMonth()+1;
                
                            var quincena = mes * 2;
                            
                            var option="";
                            
                            option = 

                            //calcula la quincena actual
                            if(f.getDate() < 15){
                                option+= "<option value=\""+quincena-1+"\">"+quincena-1+"</option>";
                            }else{
                                $("#sem_quin").val(quincena);
                            }   
                        }
                            
                       
                    });
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
                           
                           $("#foto").attr("src","../public/empleados/fotos/"+foto)
                           
                           $("#foto").attr("title",nombre);
                           
                           //contador para diferenciar id´s de los checkbox
                           var cont = 1;
                           
                           var select = '<select name="semana[]" disabled><option value="15">15</option><option value="30">30</option></select>';
                           //recorre los datos del JSON recibido 
                           for(datos in asigs.asignaciones){ 
                            
                               //genera todas las asignaciones variables tabuladas con sus campos 
                                tr += "<tr id=\"f"+cont+"\"><td class=\"col-xs-15\" style=\"text-transform: capitalize;\">"+asigs.asignaciones[datos].asignacion+
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