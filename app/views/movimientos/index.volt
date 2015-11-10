<div class="form-actions" id="">
    {{ form("movimientos/buscar", "method" : "post", "autocomplete" : "off", "class" : "form-inline")}}
    <label>&nbsp;Nomina: &nbsp;</label>
    
    <?php
                    echo Phalcon\Tag::Select(array(
                    'nomina', 
                    TipoNomi::find(array("order" => "id_nomina ASC")),
                    'using' => array('id_nomina', 'nomina'),
                    'useEmpty' => true,
                    'class' => 'select2'
                    ));
                ?>    
    
    <label>&nbsp;Semana / Quincena / Mes&nbsp;</label>
    <select id="sqm"></select>
    <label for="cedula">&nbsp;Cedula: &nbsp;</label>
        {{ numeric_field("cedula", "class" : "form-control", "id" : "cedula" , "placeholder" : "") }}
        {{ submit_button("Buscar", "id" : "buscar", "class" : "btn btn-primary") }}
    {{endForm()}}
</div>

<div class="row" id="datos">
    <table class="tabla" id="tabla">
        <tr>
            <th>N°</th>
            <th>Movimiento</th>
            <th>Año</th>
            <th>Semana / Quincena / Mes</th>
            <th>Accion</th>
        </tr>
    </table>
</div>

 <div id="img" class="col-md-2 hidden">
    <span class="profile-picture">                                                                     
        <img id="foto" class="img-responsive" title="" src="" style=""></img>
        <div class="center">FOTO</div>
    </span>
</div>

<div class="row" id="content_table">
    
</div>
<div id="msj"></div>

<script type="text/javascript">
    jQuery(function($){
        //si select nomina cambia
                $("#nomina").change(function(){
                    
                    var nomina = $("#nomina").val()
                    
                    //se envia solicitud por ajax
                    $.post("../variaciones/nomina", { "nomina" : nomina },function(data){
                       var nomina = JSON.parse(data);
                        
                        //almacena la frecuencia del tipo de nomina 
                        var frecuencia = nomina.tipoNomi[0].f;
                                               
                        if(frecuencia == "quincenal"){
                            
                            //limpia el valor de select sqm
                            $("#sqm").html("");
                                                        
                            //almacena la fecha actual
                            var f = new Date(); 
                            
                            //almacena el mes actual
                            var mes = f.getMonth()+1;
                            
                            //var mes = 12; 
                            var quincena = mes * 2;
                            
                            var option="";
                            
                            //llena el select sqm con el numero de quincena de un año
                            for(var i=1 ;i<=24;i++){
                               option = "<option class='op' value=\""+i+"\">"+i+"</option>";
                                $("#sqm").append(option); 
                            }
                            
                            //calcula la quincena actual
                        if(f.getDate() < 15){
                                //asigna la primera quincena si dia actual menor a 15 
                                $("#sqm").val(quincena-1);
                            }else{
                                //asigna 2da quincena si dia mayor a 15
                                $("#sqm").val(quincena);
                            }
                            
                        }else if(frecuencia=="mensual"){
                            
                             $("#sqm").html("");
                            
                            //almacena la fecha actual
                            var f = new Date();
                            
                            //almacena el mes actual
                            var mes = f.getMonth()+1;
                            
                            var option="";
                            
                            //llena select sqm con meses del año
                            for(var i=1 ;i<=12;i++){
                                option = "<option class='op' value=\""+i+"\">"+i+"</option>";
                               
                                $("#sqm").append(option); 
                            }
                                                   
                            $("#sqm").val(mes);
                           
                        }else{
                            
                            $("#sqm").html("");
                            
                            //almacena la semana actual del año
                            var sem_actual = "<?php echo Date("W");  ?>";
                            
                            //calcula nro de semanas del año en curso
                            var sem_final = "<?php   $f = date("Y")."-12-31"; $fu = strtotime($f);  echo Date("W", $fu);  ?>"; 
                            
                            for(var i=1 ;i <= sem_final;i++){
                                option = "<option class='op' value=\""+i+"\">"+i+"</option>";
                               
                                $("#sqm").append(option); 
                            }
                            
                            //asigna semana anterior a select sqm
                            $("#sqm").val(sem_actual-1);    
                        }                                                   
                    });
                    
                    //si nomina = "choose", inputs disabled 
                    if($("#nomina").val() == ""){
                        $("#img").addClass("hidden");
                        $("#cedula").val("");
                        $("#msj").addClass("hidden"); 
                    }
                    
                }); 
        
        $("#buscar").click(function(){
            
            if($("#cedula").val() != ""){
                
                $.post("./buscar", { "cedula" : $("#cedula").val() , "sqm" : $("#sqm").val() } , function(data){
                    
                    var datos = JSON.parse(data);
                    var tr = ""; 
                    var nombre = datos.trabajador[0].nombre1 +" "+ datos.trabajador[0].apellido1;
                    var cedula = datos.trabajador[0].nu_cedula;
                    var ubi_f = datos.trabajador[0].denominacion;
                    var cargo = datos.trabajador[0].cargo;;
                    var foto = datos.trabajador[0].foto_p;
                    
                    
                    
                });
            }          
        });
        
    });
    
</script>