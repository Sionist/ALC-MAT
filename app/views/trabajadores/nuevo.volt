 
        {{ stylesheet_link("css/select2.css") }}
        {{ stylesheet_link("css/jquery-ui.css") }}
        {{ javascript_include("js/jquery-ui.js") }}
        {{ stylesheet_link("css/chosen.css") }}
        {{ stylesheet_link("css/datepicker.css") }}
        {{ stylesheet_link("css/bootstrap-timepicker.css") }}
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

<div id="row">
<div class="widget-box">
    <div class="widget-header widget-header-blue widget-header-flat">
        <h4 class="widget-title lighter">Ingresar Trabajador</h4>

    </div>

<div class="widget-body">
<div class="widget-main">
<div id="fuelux-wizard-container">

        <ul class="steps">
            <li data-step="1" class="active">
                <span class="step">1</span>
                <span class="title">Datos Personales</span>
            </li>

            <li data-step="2">
                <span class="step">2</span>
                <span class="title">Contratación</span>
            </li>

            <li data-step="3">
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
     {{ form("trabajadores/datospersonales", "method":"post", "class":"form-horizontal", "id":"validation-form", "enctype":"multipart/form-data" ) }}
    <div class="step-pane active" data-step="1">

   <h3 class="lighter block green">Datos Personales</h3>


    {{ content() }}




    
        <div class="form-group">
            
            <label class="control-label col-xs-12 col-sm-3 no-padding-right"  for="nu_cedula">Número Cedula</label>
        
            <div class="col-xs-12 col-sm-9">
                <div class="clearfix">
            {{ text_field("nu_cedula", "id":"nu_cedula", "placeholder":"Cedula") }}
			</div>
			
            </div>
        </div>
    
        <div class="form-group">
        
            <label class="control-label col-xs-12 col-sm-3 no-padding-right"  for="rif">Rif</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
           
            {{ text_field("rif", "size" : 30, "placeholder":"RIF") }}
            </div>
         </div>
        </div>
    
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="nombre1">Primer Nombre</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
            {{ text_field("nombre1", "size" : 30, "placeholder":"Primer Nombre") }}
            </div>
            </div>
            </div>
    
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="nombre2">Segundo Nombre</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
            {{ text_field("nombre2", "size" : 30, "placeholder":"Segundo Nombre") }}
			</div>
            </div>
            </div>    
    
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="apellido1">Primer Apellido</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
            {{ text_field("apellido1", "size" : 30, "placeholder":"Primer Apellido") }}
			</div>
            </div>
            </div>  
    
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="apellido2">Segundo Apellido</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
            {{ text_field("apellido2", "size" : 30, "placeholder":"Segundo Apellido") }}
			</div>
            </div>
            </div>    
            <div class="space-2"></div>
            
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right">Genero</label>
             <div class="col-xs-12 col-sm-9"> 

            <div><label class="line-height-1 blue">
        
            {{ radio_field("genero", "size" : 30, "placeholder":"Genero", "value":"1", "class":"ace") }}
            <span class="lbl"> Hombre</span>
			</label></div>
            
             
            <div> <label class="line-height-1 blue">
        
            {{ radio_field("genero", "size" : 30, "placeholder":"Genero", "value":"2", "class":"ace") }}
            <span class="lbl"> Mujer</span>
           </label></div>
            </div>
            </div>
  
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="f_nac">Fecha de Nacimiento</label>
             <div class="col-xs-3"> <div class="input-group">
        
        
                {{ text_field("f_nac", "type" : "date", "class":"form-control date-picker", "data-date-format":"yyyy-mm-dd") }}
                <span class="input-group-addon">
                                                                        <i class="fa fa-calendar bigger-110"></i>
                                                                    </span>
			</div>
    
            </div>
            </div>    
        
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="lugar_nac">Lugar de Nacimiento</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
                <?php

                echo Phalcon\Tag::Select(array(
                'lugar_nac', 
                Ciudades::find(array("order" => "ciudad ASC")),
                'using' => array('id_ciudad', 'ciudad'),
                'useEmpty' => true,
                'emptyText' => 'Ingrese un valor',
                'class' => 'select2'
                ));
                  ?>
            </div>
            </div>
            </div>    
    
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="telf_hab">Telefono de Habitación</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
            <div class="input-group">
            <span class="input-group-addon"> <i class="ace-icon fa fa-phone"></i></span>
        
            {{ text_field("telf_hab", "size" : 30, "type":"tel") }}
			</div>
            </div>
            </div>
            </div>     
    
        <div class="space-2"></div>
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="telf_cel">Telfono de Celular</label>
            <div class="col-xs-12 col-sm-9"> 
            <div class="input-group">
            <span class="input-group-addon"> <i class="ace-icon fa fa-phone"></i></span>
        
            {{ text_field("telf_cel",  "type":"tel") }}

            </div>
            </div>
            </div>    
        <div class="space-2"></div>
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="dir_hab">Dirección de Habitación</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
            {{ text_field("dir_hab", "size" : 30, "placeholder":"Dirección de Habitación") }}
        
			</div>
             </div>
            </div>   
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="edo_civil">Estado Civil</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
            {{ text_field("edo_civil", "size" : 30, "placeholder":"Estado Civil") }}
        
			</div>
             </div>
            </div>   
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="correo_e">Correo</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
            {{ text_field("correo_e", "type":"email", "size" : 30, "placeholder":"correo@gmail.com") }}
        
			</div>
             </div>
            </div>   
        
            <!-- <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="foto_p">Foto Personal</label>
             <div class="col-xs-3">
                
              {{ file_field("files[]", "id":"foto_p") }} 
        
               
			
             </div>
            </div>-->   
    
        
            <div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="id_discapacidad">Discapacidad</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
            
        <?php

        echo Phalcon\Tag::Select(array(
        'id_discapacidad', 
        Discapacidad::find(array("order" => "id_discapacid ASC")),
        'using' => array('id_discapacid', 'discapacidad'),
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
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="estatus">Estatus</label>
             <div class="col-xs-12 col-sm-9"> <div class="clearfix">
        
        
      
            
        <?php

        echo Phalcon\Tag::Select(array(
        'estatus', 
        EstatusT::find(array("order" => "estatus ASC")),
        'using' => array('id_estat', 'estatus'),
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
                    changeMonth: true,
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


                 // ------------------ESTILO PARA CARGA DE ARCHIVO/IMAGENES --------------------

                $('#id-input-file-1 , #foto_p').ace_file_input({
                    no_file:'Vacio ...',
                    btn_choose:'Elije',
                    btn_change:'Cambia',
                    droppable:false,
                    onchange:null,
                    thumbnail:false //| true | large
                    //whitelist:'gif|png|jpg|jpeg'
                    //blacklist:'exe|php'
                    //onchange:''
                    //
                });
                //pre-show a file name, for example a previously selected file
                //$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
            
            
                $('#id-input-file-3').ace_file_input({
                    style:'well',
                    btn_choose:'Seleccione la imagen aqui',
                    btn_change:null,
                    no_icon:'ace-icon fa fa-cloud-upload',
                    droppable:true,
                    thumbnail:'small'//large | fit
                    //,icon_remove:null//set null, to hide remove/reset button
                    /**,before_change:function(files, dropped) {
                        //Check an example below
                        //or examples/file-upload.html
                        return true;
                    }*/
                    /**,before_remove : function() {
                        return true;
                    }*/
                    ,
                    preview_error : function(filename, error_code) {
                        //name of the file that failed
                        //error_code values
                        //1 = 'FILE_LOAD_FAILED',
                        //2 = 'IMAGE_LOAD_FAILED',
                        //3 = 'THUMBNAIL_FAILED'
                        //alert(error_code);
                    }
            
                }).on('change', function(){
                    //console.log($(this).data('ace_input_files'));
                    //console.log($(this).data('ace_input_method'));
                });
                
                
                //$('#id-input-file-3')
                //.ace_file_input('show_file_list', [
                    //{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
                    //{type: 'file', name: 'hello.txt'}
                //]);
            
                
                
            
                //dynamically change allowed formats by changing allowExt && allowMime function
                $('#id-file-format').removeAttr('checked').on('change', function() {
                    var whitelist_ext, whitelist_mime;
                    var btn_choose
                    var no_icon
                    if(this.checked) {
                        btn_choose = "Seleccione la imagen";
                        no_icon = "ace-icon fa fa-picture-o";
            
                        whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
                        whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
                    }
                    else {
                        btn_choose = "Drop files here or click to choose";
                        no_icon = "ace-icon fa fa-cloud-upload";
                        
                        whitelist_ext = null;//all extensions are acceptable
                        whitelist_mime = null;//all mimes are acceptable
                    }
                    var file_input = $('#id-input-file-3');
                    file_input
                    .ace_file_input('update_settings',
                    {
                        'btn_choose': btn_choose,
                        'no_icon': no_icon,
                        'allowExt': whitelist_ext,
                        'allowMime': whitelist_mime
                    })
                    file_input.ace_file_input('reset_input');
                    
                    file_input
                    .off('file.error.ace')
                    .on('file.error.ace', function(e, info) {
                        //console.log(info.file_count);//number of selected files
                        //console.log(info.invalid_count);//number of invalid files
                        //console.log(info.error_list);//a list of errors in the following format
                        
                        //info.error_count['ext']
                        //info.error_count['mime']
                        //info.error_count['size']
                        
                        //info.error_list['ext']  = [list of file names with invalid extension]
                        //info.error_list['mime'] = [list of file names with invalid mimetype]
                        //info.error_list['size'] = [list of file names with invalid size]
                        
                        
                        /**
                        if( !info.dropped ) {
                            //perhapse reset file field if files have been selected, and there are invalid files among them
                            //when files are dropped, only valid files will be added to our file array
                            e.preventDefault();//it will rest input
                        }
                        */
                        
                        
                        //if files have been selected (not dropped), you can choose to reset input
                        //because browser keeps all selected files anyway and this cannot be changed
                        //we can only reset file field to become empty again
                        //on any case you still should check files with your server side script
                        //because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
                    });
                
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
                $("#validation-form").validate({
                    errorElement: 'div',
                    errorClass: 'help-block',
                    focusInvalid: false,
                    ignore: "",
                    
                rules: {

                    nu_cedula: {
                    remote: {
                    url : "/sistenomialc/trabajadores/getCedula1",
                    type : "get"
                    }
                    
                    },
                    correo_e: {
                        required: true,
                        email:true
                    },
                    nombre1: {
                        required: true
                    },
                    apellido1: {
                        required: true
                    },
                    genero: {
                        required: true
                    },
                    f_nac: {
                        required: true
                    },
                    lugar_nac: {
                        required: true
                    },
                    telf_cel: {
                        required: true,
                        phone: 'required'
                    },
                    dir_hab: {
                        required: true
                    },
                    edo_civil: {
                        required: true
                    },
                    id_discapacidad: {
                        required: true
                    },
                    estatus: {
                        required: true
                    }
                },
                
                messages: {
                        correo_e: {
                            required: "Ingrese un email valido.",
                            email: "Ingrese un email valido."
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