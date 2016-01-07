 
        {{ stylesheet_link("css/select2.css") }}
        {{ stylesheet_link("css/chosen.css") }}
        {{ stylesheet_link("css/datepicker.css") }}
        {{ stylesheet_link("css/bootstrap-timepicker.css") }}
        {{ stylesheet_link("css/daterangepicker.css") }}
        {{ stylesheet_link("css/bootstrap-datetimepicker.css") }}
        {{ stylesheet_link("css/colorpicker.css") }}
        {{ javascript_include("js/bootstrap.js") }}
        {{ javascript_include("js/fuelux/fuelux.wizard.js") }}
        {{ javascript_include("js/jquery.validate.js") }}
        {{ javascript_include("js/additional-methods.js") }}
        {{ javascript_include("js/bootbox.js") }}
        {{ javascript_include("js/jquery.maskedinput.js") }}
        {{ javascript_include("js/select2.js") }}
        {{ javascript_include("js/date-time/bootstrap-datepicker.js") }}
        {{ javascript_include("js/date-time/bootstrap-timepicker.js") }}
        {{ javascript_include("js/date-time/moment.js") }}
        {{ javascript_include("js/date-time/daterangepicker.js") }}
        {{ javascript_include("js/date-time/bootstrap-datetimepicker.js") }}



<?php 
use Phalcon\Mvc\View;
use Phalcon\Tag; 
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Select ?>

<div id="page-wrapper">
<div class="widget-box">
    <div class="widget-header widget-header-blue widget-header-flat">
        <h4 class="widget-title lighter">Ingresar Trabajador</h4>

    </div>

<div class="widget-body">
<div class="widget-main">
<div id="fuelux-wizard-container">

        <ul class="steps">
            <li data-step="1"  class="complete">
                <span class="step">1</span>
                <span class="title">Datos Personales</span>
            </li>

            <li data-step="2" class="complete">
                <span class="step">2</span>
                <span class="title">Contratación</span>
            </li>

            <li data-step="3" class="active">
                <span class="step">3</span>
                <span class="title">Datos Financieros</span>
            </li>

            <li data-step="4">
                <span class="step">4</span>
                <span class="title">Datos Profesionales</span>
            </li>
    </ul>
    <hr>

<div class="step-content pos-rel">
    
    <div class="step-pane" data-step="1">

   <h3 class="lighter block green">Datos Personales</h3>


    echo $this->flashSession->output();


    </div>  

    <div class="step-pane" data-step="2">
 
         <h3 class="lighter block green">Datos Contratación</h3>

        
    
    </div> 
    <div class="step-pane active" data-step="3">
     {{ form("trabajadores/nuevo-trabajador/datos-financieros", "method":"post", "class":"form-horizontal", "id":"validation-form2", "enctype":"multipart/form-data" ) }}
 <h3 class="lighter block green">Datos Financieros</h3>

            {{ hidden_field("nu_cedula") }}

            <hr>
         
         <h3 class="blue smaller lighter"><?php echo $trabajador->nombre1; ?>  <?php echo $trabajador->apellido1; ?></h3>
         <h4 class="blue smaller lighter">C.I.<?php echo $trabajador->nu_cedula; ?></h4>
         <hr>

            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cod_banco">Banco</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
           <?php  echo Phalcon\Tag::Select(array(
        'cod_banco', 
        NbBancos::find(array("order" => "nb_bancos ASC")),
        'using' => array('id_bancos', 'nb_bancos'),
        'useEmpty' => true,
        'emptyText' => 'Ingrese un valor',
        'emptyValue' => '',
        'class' => 'select2'
        ));
          ?>
            
            </div>
            </div>
            </div>    
    
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="n_cuenta">N de Cuenta</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
            {{ text_field("n_cuenta", "type" : "numeric", "placeholder":"N de Cuenta") }}
            
            </div>
            </div>
            </div>   
    
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="tipo_cuenta">Tipo de Cuenta</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
          <?php   echo Phalcon\Tag::Select(array(
        'tipo_cuenta', 
        TipoCuent::find(array("order" => "tipo_cuenta ASC")),
        'using' => array('id_tipocuent', 'tipo_cuenta'),
        'useEmpty' => true,
        'emptyText' => 'Ingrese un valor',
        'emptyValue' => '',
        'class' => 'select2'
        ));
          ?>
        
            </div>
            </div>
            </div>
    <div style="text-align:right">{{ submit_button('Siguiente', "class" :"btn btn-primary") }}</div>

    </form>

    </div> 
    <div class="step-pane" data-step="4"> 
      <h3 class="lighter block green">Datos Profesionales</h3>
  
    </div> 


</div>
</div>


</div>
</div>
</div>
</div>


<script type="text/javascript">
            jQuery(function($) {

                // ------------------CALENDARIO PARA FECHAS --------------------

                //datepicker plugin
                //link
                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    changeYear: true
                })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
            
                //or change it into a date range picker
                $('.input-daterange').datepicker({autoclose:true});
            
            
                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                $('input[name=date-range-picker]').daterangepicker({
                    'applyClass' : 'btn-sm btn-success',
                    'cancelClass' : 'btn-sm btn-default',
                    locale: {
                        applyLabel: 'Apply',
                        cancelLabel: 'Cancel',
                    }
                })
                .prev().on(ace.click_event, function(){
                    $(this).next().focus();
                });
            
            
                $('#timepicker1').timepicker({
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: false
                }).next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
                
                $('#date-timepicker1').datetimepicker().next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });


                           

             // -----------------ESTILOS DE TOOLTIP Y DE SELECT BOX --------------------
                $('[data-rel=tooltip]').tooltip();
            
                $(".select2").css('width','200px').select2({allowClear:true})
                .on('change', function(){
                    $(this).closest('form').validate().element($(this));
                }); 
            
             // ------------------FORMATO DE TELEFONOS --------------------
               
                $.mask.definitions['~']='[+-]';
                $('#telf_hab').mask('(9999) 999-9999');
                $.mask.definitions['~']='[+-]';
                $('#telf_cel').mask('(9999) 999-9999');
          
                jQuery.validator.addMethod("phone", function (value, element) {
                    return this.optional(element) || /^\(\d{4}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
                }, "Enter a valid phone number.");
            
        // ------------------VALIDACION DEL FORMULARIO --------------------
                $("#validation-form2").validate({
                    errorElement: 'div',
                    errorClass: 'help-block',
                    focusInvalid: false,
                    ignore: "",
                    
                rules: {

                    cod_banco: {
                        required: true
                    },
                    n_cuenta: {
                        required: true
                    },
                    tipo_cuenta: {
                        required: true
                    }
                },
                
                           
            
                    highlight: function (e) {
                        $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                    },
                    success: function (e) {
                        $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                        $(e).remove();
                    }
            });
                
                
                           
              // ------------------NO ESTOY SEGURA CREO QUE ES ALGO DEL SELECT BOX --------------------   
                          
                
                $(document).one('ajaxloadstart.page', function(e) {
                    //in ajax mode, remove remaining elements before leaving page
                    $('[class*=select2]').remove();
                });
            })
</script>