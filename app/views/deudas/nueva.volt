{{ stylesheet_link("css/datepicker.css")}}
{{ javascript_include("js/bootstrap.js") }}
{{ javascript_include("js/date-time/bootstrap-datepicker.js") }}
<div id="page-wrapper">

    {{ content() }}

    <div class="row">
       <?php foreach ($datos as $k) { ?>


       <h3 class="lighter blue center">Trabajador: <strong>"<?php echo $k->nombre1." ".$k->apellido1; ?>"</strong> Cedula: <strong>"<?php echo $k->nu_cedula; ?>"</strong></h3>
        <hr> 
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="widget-box">
                <div class="widget-header"><h4 class="widget-title">Nueva Deuda</h4></div>
                <div class="widget-body">
                    <div class="widget-main">   
                        <fieldset>
                            {{ form("deudas/guardar", "method" : "post", "class" : "form-horizontal") }}
                            <input type="hidden" id="cedula" name="cedula" value="<?php echo $k->nu_cedula; ?>">
                            <?php
                        }
                        ?>

                        <div class="form-group">
                            <label class="col-lg-4"for="descuento">Descuento:</label>
                            <div class="col-lg-8">
                                <?php
                                echo Phalcon\Tag::Select(array(
                                    'descuento', 
                                    Descuentos::find(array("order" => "id_descuent ASC")),
                                    'using' => array('id_descuent', 'descuento'),
                                    'useEmpty' => true,
                                    'emptyText' => "Seleccione...",
                                    'class' => 'form-control',
                                    'required' => 'required'
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-lg-4" for="monto">Monto:</label>
                                <div class="col-lg-8">{{ text_field("monto", "class" : "form-control monto",'required' : 'required') }}</div>
                            </div>
                            <div class="form-group">
                              <div class="col-lg-4"><label for="frecuencia">Frecuencia:</label></div>
                              <div class="col-lg-8">
                                <?php
                                echo Phalcon\Tag::Select(array(
                                    'frecuencia', 
                                    Frecuencia::find(array("order" => "id_frecuencia ASC")),
                                    'using' => array('id_frecuencia', 'frecuencia'),
                                    'useEmpty' => true,
                                    'emptyText' => "Seleccione...",
                                    'class' => 'form-control',
                                    'required' => 'required'
                                    ));
                                    ?>  
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-4"><label for="fCompromiso">Fecha Compromiso:</label></div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input name="fCompromiso" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" required = 'required'>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4"><label for="cuotas">N°de Cuotas:</label></div>
                                <div class="col-lg-8">{{ text_field("cuotas", "class" : "col-xs-3 center cuotas", "required" : "required" ) }}</div>      
                            </div>
                        </fieldset>                
                    </div>
                    <div class="form-actions center" style="margin-bottom: 0">
                        {{ submit_button("Guardar", "class" : "btn btn-primary") }}
                    </div>
                    {{ endForm() }}
                </div>
            </div>   
        </div>
    </div>
    {{ javascript_include("js/jquery.maskMoney.js") }}   
    {{ javascript_include("js/jquery.maskedinput.js") }}            
    <script type="text/javascript">

        jQuery(function($) {

            $(".monto").maskMoney({thousands:'', decimal:'.', allowZero:true, suffix: ''});
            $(".cuotas").mask('9?99',{ autoclear : false, placeholder : " " });


            /*  jquery del modal de edicion */
            $( ".id-btn-dialog1" ).on('click', function(e) {
                e.preventDefault();

                var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
                    modal: true,
                    title: "Editar ",
                    title_html: true,
                    buttons: [ 
                    {
                        text: "OK",
                        "class" : "btn btn-primary btn-minier",
                        click: function() {
                            $( this ).dialog( "close" ); 
                        } 
                    }
                    ]
                });
            });

            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true,
            })

        })
    </script>