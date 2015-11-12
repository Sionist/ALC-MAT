
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
            &nbsp; Operación: &nbsp;
            <div class="form-group">
               <select id="operacion">
                   <option>Variaciones</option>
                   <option>Movimientos</option>
                </select>
            </div>
          &nbsp; <button id="aceptar" class="btn btn-sm btn-primary" disabled>Aceptar</button>

        </div>


</div>
{{ endForm() }}

<div id="div_buscar" class="hidden" style="display: block">
    {{ form("variaciones/buscar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}

    {{ content() }}

    {{ numeric_field("cedula", "class":"form-control", "required":"required", "placeholder":"Cedula", "max":"99999999" ) }}

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
                    <div id="img" class="col-md-2 hidden">
                        <span class="profile-picture">

                            <img id="foto" class="" title="" src="" style="width: 120px; height: auto "></img>
                        <div class="center">FOTO</div>
                        </span>
                    </div>
                </div>
                <div class="">
                <div class="col-md-5 hidden" id="tprins" >

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
                                                <th class="center">¿Habilitar Todos?
                                                <label style="margin-top: 10px; display: block">
                                                    <input id="t_enabled" name="switch-field-1" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox">
                                                    <span class="lbl" data-lbl="SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO"></span>
                                                </label>
                                            </th>
                                        </thead>
                                        <tbody  id="asignacion">
                                        </tbody>
                                            </table>
                                        {{ submit_button("GUARDAR","id":"guardar", "class":"btn btn-primary btn-block" ,"disabled":"disabled") }}
                                        {{ endForm() }}
                                        </div>
                                    </div>
                                </div>

<!-- columna de movimientos -->
<div id="movimientos" class="col-md-6 hidden">
    <div class="table-header">
<!--        <div class="center"><strong>MOVIMIENTOS</strong></div>-->
        Trabajador: "<strong><span class="" id="Mnombre"></span></strong>"   - Cedula: <strong><span class="" id="MTcedula"></span></strong> <br />
        Ubicación Funcional: "<strong><span class="" id="Mubi_f"></span></strong>"   - Cargo: "<strong><span class="" id="Mcargo"></span></strong>"
    </div>
    <table class="table table-striped table-bordered">
        <tr>
            <th class="center">Movimiento</th>
            <th class="center">H / D</th>
            <th class="center">S / Q / M</th>
            <th class="center">Año</th>
            <th class="center">Fecha </th>
            <th class="center">Acción</th>
        </tr>
        <tbody id="t_movimiento">

        </tbody>
    </table>
</div>
<!-- Fin columna movimientos-->

<!--Deducciones-->
<div class="col-md-4">
    <table class="form-inline">
<div class="table-header">
<!--        <div class="center"><strong>MOVIMIENTOS</strong></div>-->
        Trabajador: "<strong><span class="" id="Mnombre"></span></strong>"   - Cedula: <strong><span class="" id="MTcedula"></span></strong> <br />
        Ubicación Funcional: "<strong><span class="" id="Mubi_f"></span></strong>"   - Cargo: "<strong><span class="" id="Mcargo"></span></strong>"
    </div>
    </table>
</div>
<!--Fin Deducciones-->
</div>
                                <!-- fin tabla para mostrar todos los registros de la tabla-->
<br />
<div class="row">
    <div id="msj_exito" class="alert alert-block alert-success hidden col-md-12"></div>
</div>
<div class="row">
    <div id="msj_error" class="hidden">
        <div class="btn btn-danger btn-block col-xs-6">Las siguiente operaciones no fueron procesadas debido a problemas con la formula de las mismas:</div>
        <table id="t_errors" class="table table-striped table-bordered col-md-6">
            <thead id="thead">
                <th class="center">Asignación Variable</th>
                <th class="center">Formula</th>
            </thead>
            <div id="tb"></div>
        </table>
    </div>
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


                /**
                **
                **CALCULA DE SEMANA, MES O AÑO SEGUN EL TIPO DE NOMINA
                **
                **/

                $("#nomina").change(function(){

                    var nomina = $("#nomina").val()

                    //se envia solicitud por ajax
                    $.post("./nomina", { "nomina" : nomina },function(data){
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
                    if($("#nomina").val() != ""){
                        $("#sel_acep").attr("disabled",false);
                        $("#aceptar").attr("disabled",false);
                    }else{
                        $("#sel_acep").attr("disabled",true);
                        $("#aceptar").attr("disabled",true);
                        $("#tprins").addClass("hidden");
                        $("#img").addClass("hidden");
                        $("#div_buscar").addClass("hidden");
                        $("#cedula").val("");
                        $("#msj_exito").addClass("hidden");
                        $("#msj_error").addClass("hidden");

                    }

                    $("#sel_acep").click(function(){

                        //nomina !="" y sel_acep es "NO", habilita los controles
                        if($("#sel_acep").is(":checked") && $("#nomina").val() != ""){
                            $("#ano").attr("disabled",false);
                            $("#sqm").attr("disabled",false)
                        }else{
                            $("#ano").attr("disabled",true);
                            $("#sqm").attr("disabled",true)

                        }
                    });
                });


                /**
                **
                **HABILITA DIV DE LA CAJA DE BUSQUEDA
                **
                **/

                $("#aceptar").click(function(e){
                    e.preventDefault();
                    $("#div_buscar").removeClass("hidden");
                    $("#cedula").focus();
                });


                /**
                **
                **BUSQUEDA DE EMPLEADOS
                **
                **/

                $("#buscar").click(function(e){

                    e.preventDefault();

                    //alamacena la cedula introducida
                    var cedula = $("#cedula").val();

                    if(cedula != ""){

                    var tr = "";
                    var nombre = "";
                    var ci = "";
                    var ubi_f = "";
                    var cargo = "";
                    var nomi = $("#nomina").val();
                    var foto = "";
                    var sueldo = "";

                    if($("#operacion").val() == "Variaciones"){
                    //solicitud ajax por POST a action : procesar
                    $("#movimientos").addClass("hidden");
                    $.post("./buscar", { "cedula" : cedula, "nomina" : nomi },function(data){

                        //data contiene la respuesta JSON del controlador
                       if(data != ""){

                           //convierte la data en un objeto
                           $("#year").val($("#ano").val());
                           $("#s-q-m").val($("#sqm").val());
                           $("#nomi").val($("#nomina").val());

                           var asigs = JSON.parse(data);

                           if(asigs.trabajador.length > 0){

                               foto = asigs.trabajador[0].foto_p;
                               sueldo = asigs.sd;

                               $("#sd").val(sueldo);

                               //almacena nombre y apellido del trabajador
                               nombre += asigs.trabajador[0].nombre1 +" "+ asigs.trabajador[0].apellido1;
                               //almacena cedula del trabajador
                               ci += asigs.trabajador[0].nu_cedula;
                               ubi_f += asigs.trabajador[0].denominacion;
                               cargo += asigs.trabajador[0].cargo;

                               $("#Tcedula").html(ci);
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
                                        +"<td class=\"col-xs-1\">"+ "<label style=\"margin-top: 10px; display: block\">"+
                                        "<input name=\"switch-field-1\" id=\"c"+cont+"\" class=\"ace ace-switch ace-switch-6\" type=\"checkbox\">"+"<span class=\"lbl\"></span>"
                                        +"</td></tr>";
                                    cont++;
                                }
                                //oculta el div que contiene la tabla
                                $("#tprins").addClass("hidden");
                                //mensaje de error si no existe la cedula o no se introdujo una valida o campo vacio
                                $("#msj").html("");
                                //agrega la info generada dentro de tbody : asignacion
                                $("#asignacion").html(tr);
                                //efecto slide para la tabla
                                $("#tprins").slideDown(100).removeClass("hidden");
                                $("#img").slideDown(100).removeClass("hidden");
                               //habilita o deshabilita los campos de texto segun estado de los checkbox
                               $("input[type=checkbox]").click(function(){
                                    var hijo = $(this).attr("id");
                                    var padre = $(this).parent().parent().parent().attr("id");

                                    $.mask.definitions['~']='[+-]';
                                    $('.input-mask-numeric').mask('99');
                                   if($('#'+hijo).is(":checked")){
                                        $('#'+padre).find("input[type=text]").attr("disabled",false);
                                        $('#'+padre).find("select").attr("disabled",false);
                                    }else{
                                        $('#'+padre).find("input[type=text]").attr("disabled",true).val("");
                                        $('#'+padre).find("select").attr("disabled",true);
                                    }
                                    //habilita o deshabilita el boton guardar
                                    if($('#asignacion').find("input[type=checkbox]").is(":checked")){
                                        $("#guardar").attr("disabled",false)
                                    }else{
                                        $("#guardar").attr("disabled",true)
                                    }
                                });
                       }
                       else{
                           $("#tprins").addClass("hidden");
                           $("#img").addClass("hidden");
                           $("#msj").html("<div class='alert alert-block alert-danger'>La cedula introducida no existe, o no pertenece a la nomina seleccionada</div>");
                       }
                }
                })}else{
                        $("#tprins").addClass("hidden");
                        $.post("../movimientos/buscar", { "cedula" : cedula, "nomina" : nomi, "sqm" : $("#sqm").val(), "ano" : $("#ano").val() },function(data){

                        //data contiene la respuesta JSON del controlador
                       if(data != ""){

                           $("#movimientos").removeClass("hidden");
                           //convierte la data en un objeto
                           $("#year").val($("#ano").val());
                           $("#s-q-m").val($("#sqm").val());
                           $("#nomi").val($("#nomina").val());

                           var movi = JSON.parse(data);

                           if(movi.datosT.length > 0 && movi.variaciones.length > 0){

                               foto = movi.datosT[0].foto_p;

                               //almacena nombre y apellido del trabajador
                               Mnombre = movi.datosT[0].nombre1 +" "+ movi.datosT[0].apellido1;
                               //almacena cedula del trabajador
                               ci = movi.datosT[0].nu_cedula;
                               ubi_f = movi.datosT[0].denominacion;
                               Mcargo = movi.datosT[0].cargo;


                               $("#MTcedula").html(ci);
                               $("#Mnombre").html(Mnombre);
                               $("#Mubi_f").html(ubi_f);
                               $("#Mcargo").html(Mcargo);
                               //$("#cedula").val(movi.dt[0].nu_cedula);

                               if(foto !=null){
                                    $("#foto").attr("src","../public/empleados/fotos/"+foto)
                                    $("#foto").attr("title",nombre);
                               }else{
                                    $("#foto").attr("src","../public/img/interrogante.png")
                               }

                               var total = 0;

                               var cont = movi.variaciones.length;

                               for(datos in movi.variaciones){

                                    total = total + Number(movi.variaciones[datos].monto);

                                    tr+="<tr><td>"+movi.variaciones[datos].asignacion+"</td><td class='center'>"+movi.variaciones[datos].horas_dias+"</td>"+
                                        "<td class='center'>"+movi.variaciones[datos].sqm+"</td><td>"+movi.variaciones[datos].ano+"</td>"+
                                        "<td class='center'>"+movi.variaciones[datos].fecha+"</td>"+"<td class='center'><div class=\"hidden-sm hidden-xs action-buttons\">"+
                                        "<a href=\"../movimientos/editar/"+movi.variaciones[datos].id_variacion+"\"><i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"+
                                        "</div></td></tr>";
                               }

                               tr+="<tr><td class='success'><strong>TOTAL</strong>: </td><td class='warning'><strong><p class='bg-warning'>"+ total.toFixed(2) +"</p></strong></td></tr>";
                               $("#t_movimiento").html(tr);
                               $("#img").removeClass("hidden");
                               $("#msj").html("");

                       }

                       }else{
                           $("#tprins").addClass("hidden");
                           $("#movimientos").addClass("hidden");
                           $("#img").addClass("hidden");
                           $("#msj").html("<div class='alert alert-block alert-danger'>La cedula introducida no existe, no pertenece a la nomina seleccionada o no tiene movimientos</div>");
                    }
                });
                    }
                    }else{
                        $("#tprins").addClass("hidden");
                        $("#movimientos").addClass("hidden")
                        $("#img").addClass("hidden");
                        $("#msj").html("<div class='alert alert-block alert-danger'>Debe introducir una cedula valida</div>");
                    }
                });

                $("#t_enabled").click(function(){

                    if($(this).is(":checked")){
                        $("#asignacion").find("input[type=checkbox]").prop("checked",true);
                        $("#asignacion").find("input[type=text]").attr("disabled",false);
                    }else{
                        $("#asignacion").find("input[type=checkbox]").prop("checked",false);
                        $("#asignacion").find("input[type=text]").attr("disabled",true);
                    }
                });

                /**
                **
                **MASCARAS PARA CAMPOS NUMERICOS
                **
                **/
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

                    $("#msj_exito").addClass("hidden").html("");
                    $("#t_errors tbody").html("");
                    $("#msj_error").addClass("hidden");


                    /**
                    **
                    **ACCION DEL BOTON CONFIRMAR DEL DIALOGO MODAL
                    **
                    **/
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
                               // alert (name +"="+ asigs[name]);
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

                            var msj_exito = "Variaciones procesadas exitosamente: "+res.msj_exito;
                            var msj_error = "Variaciones no procesadas por falla en la ejecucion de la formula";

                            var tr = "";

                            //alert(res.msj_exito);
                            if(res != ""){
                                if(res.msj_exito != ""){
                                    $("#msj_exito").html(msj_exito).removeClass("hidden");
                                }
                                if(res.msj_error){
                                    //alert("lleno");
                                    var cont = 0;
                                    for (datos in res.msj_error){
                                        tr+= "<tr><td>"+datos+"</td><td>"+res.msj_error[datos]+"</td></tr>"
                                        cont++;
                                    }
                                    if(cont > 0){
                                        $("#msj_error").removeClass("hidden");
                                    }
                                }
                            }

                            $("#t_errors").append(tr);

                        });

                        $("#asignacion").find("input[type=text]").attr("disabled",true).val("");
                        $("#asignacion").find("input[type=checkbox]").attr("checked",false);
                        $("#guardar").attr("disabled",true)
                        $("#t_enabled").prop("checked",false);

                        $("#buscar").click(function(){
                            $("#msj_exito").addClass("hidden").html("");
                            $("#t_errors").html("");
                            $("#msj_error").addClass("hidden");
                        });
                    });
                });
        });
        </script>
