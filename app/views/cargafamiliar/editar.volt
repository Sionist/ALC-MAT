{{ stylesheet_link("css/datepicker.css") }}
{{ javascript_include("js/bootstrap.js") }}
{{ javascript_include("js/date-time/bootstrap-datepicker.js") }}

<div id="page-wrapper">

  <?php echo $this->flashSession->output(); ?>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="widget-box">
        <div class="widget-header">

          <div class="center">
            <h5>Trabajador:&nbsp;&nbsp;<b><?php echo $dtrabajador->nombre1;?>&nbsp;&nbsp;<?php echo $dtrabajador->apellido1;?></b>&nbsp;&nbsp;Cédula:&nbsp;&nbsp;<b><?php echo $dtrabajador->nu_cedula;?></b></h5>
          </div>
        </div>
        <div class="widget-body">
          <div class="widget-main no-padding">
            <div class="dialogs clearfix">
              {{ form("carga-familiar/editado", "method":"post", "class":"form-horizontal", "id":"validation-form", "enctype":"multipart/form-data" ) }}
              {{ hidden_field("nu_cedula") }}
              {{ hidden_field("id_carga")}}
                        <div class="center"><h5><strong>Editar datos de la carga familiar:</strong></h5></div>
              <div class="col-md-3 col-md-offset-3">
                <div class="form-group">
                  <label for="ci_carga">Cedula</label>
                  {{ text_field("ci_carga", "class" : "form-control", "size" : 30) }}
                </div>
                <div class="form-group">
                  <label for="nomnbre1">Primer Nombre:</label>
                  {{ text_field("nombre1", "size" : 30, "class" : "form-control", "required":"required") }}
                </div>
                <div class="form-group">
                  <label for="nomnbre2">Segundo Nombre:</label>
                  {{ text_field("nombre2", "size" : 30, "class" : "form-control", "required":"required") }}
                </div>
                <div class="form-group">
                  <label for="apellido1">Primer Apellido:</label>
                  {{ text_field("apellido1", "size" : 30, "class" : "form-control", "required":"required") }}
                </div>
                <div class="form-group">
                  <label for="apellido2">Segundo Apellido:</label>
                  {{ text_field("apellido2", "size" : 30, "class" : "form-control", "required":"required") }}
                </div>
                <div class="form-group">
                  <label for="f_nac">Fecha de Nacimiento:</label>
                  <div class="input-group">
                    <input name="f_nac" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $f_nac; ?>" required="required">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>

              </div>
              <div class="col-md-3 col-md-offset-1">
                <div class="form-group">
                  <label>Genero:</label>
                  <div>
                    <label class="line-height-1 blue">
                      {{ radio_field("genero", "size" : 30, "placeholder":"Genero", "value":"M", "class":"ace") }}
                      <span class="lbl"> Hombre</span>
                    </label>
                  </div>
                  <div> 
                    <label class="line-height-1 blue">
                      {{ radio_field("genero", "size" : 30, "placeholder":"Genero", "value":"F", "class":"ace") }}
                      <span class="lbl"> Mujer</span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellido2">Ocupación:</label>
                  {{ text_field("ocupacion", "class" : "form-control", "size" : 30) }}
                </div>
                <div class="form-group">
                  <label for="apellido2">Parentesco:</label>
                  <?php

                  echo Phalcon\Tag::Select(array(
                    'id_parentesco', 
                    Parentesco::find(array("order" => "id_parentesco ASC")),
                    'using' => array('id_parentesco', 'parentesco'),
                    'useEmpty' => true,
                    'emptyText' => 'Ingrese un valor',
                    'emptyValue' => '',
                    'class' => 'form-control select2'
                    ));
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="apellido2">Discapacidad:</label>
                    <?php

                    echo Phalcon\Tag::Select(array(
                      'id_discapacidad', 
                      Discapacidad::find(array("order" => "id_discapacid ASC")),
                      'using' => array('id_discapacid', 'discapacidad'),
                      'useEmpty' => true,
                      'emptyText' => 'Ingrese un valor',
                      'emptyValue' => '',
                      'class' => 'select2 form-control'
                      ));
                      ?>
                    </div>
                    <!-- <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="3072000" />
                      <input id="foto" type="file"></input>
                    </div> -->
                  </div>
                </div>
                <div class="form-actions center" style="margin-bottom: 0">
                  <input type="submit" value="Modificar" class="btn btn-primary">
                </div>
                {{ endForm() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row hidden">
     <div class="col-xs-12">


       <div class="table-header">Carga Familiar Trabajador:<b><?php echo $trabaja->nombre1;?> <?php echo $trabaja->apellido1;?></b>  Cédula:<b><?php echo $trabaja->nu_cedula;?></b></div>


       <table class="table table-striped table-bordered table-hover">
        <tr>
          <td>

            {{ form("carga-familiar/guardar-nuevo", "method":"post", "class":"form-horizontal", "id":"validation-form", "enctype":"multipart/form-data" ) }}      

            <input type="hidden" name="nu_cedula" value="<?php echo $trabaja->nu_cedula; ?>" /> 
            <!-- {{ hidden_field("nu_cedula", "value":'<?php echo $trabaja->nu_cedula; ?>') }}  --> 

            <div align="center">
             <table border="0" width="700" cellspacing="5" cellpadding="0">
              <tr>
               <td colspan="2" bgcolor="#5CBECF" align="center">
                 <p align="center"><h4>Datos de Carga Familiar</h4></td>
                 </tr>
                 <tr>
                   <td width="50%">C&eacute;dula:</td>
                   <td width="50%"></td>
                 </tr>
                 <tr>
                   <td width="50%">{{ text_field("ci_carga", "size" : 30, "placeholder":"Cedula") }}</td>
                   <td width="50%"></td>
                 </tr>
                 <tr>
                   <td width="50%">Primer Nombre:</td>
                   <td width="50%">Segundo Nombre:</td>
                 </tr>
                 <tr>
                   <td width="50%">{{ text_field("nombre1", "size" : 30, "required":"required", "placeholder":"Primer Nombre") }}</td>
                   <td width="50%">{{ text_field("nombre2", "size" : 30, "placeholder":"Segundo Nombre") }}</td>
                 </tr>
                 <tr>
                   <td width="50%">Primer Apellido:</td>
                   <td width="50%">Segundo Apellido:</td>
                 </tr>
                 <tr>
                   <td width="50%">{{ text_field("apellido1", "size" : 30, "required":"required", "placeholder":"Primer Apellido") }}</td>
                   <td width="50%">{{ text_field("apellido2", "size" : 30, "placeholder":"Segundo Apellido") }}</td>
                 </tr>
                 <tr>
                   <td width="50%">Fecha de Nacimiento:</td>
                   <td width="50%">Ocupación:</td>
                 </tr>
                 <tr>
                   <td width="50%">
                     <div class="col-xs-8"> <div class="input-group">


                      {{ text_field("f_nac", "type" : "date", "required":"required", "class":"form-control date-picker", "data-date-format":"yyyy-mm-dd") }}
                      <span class="input-group-addon">
                        <i class="fa fa-calendar bigger-110"></i>
                      </span>
                    </div>

                  </div>

                </td>
                <td width="50%">{{ text_field("ocupacion", "size" : 30, "placeholder":"Ocupación") }}</td>
              </tr>
              <tr>
               <td width="50%">Género:</td>
               <td width="50%">Parentesco:</td>
             </tr>
             <tr>
               <td width="50%">
                 <div class="col-xs-12 col-sm-9"> 

                  <div><label class="line-height-1 blue">

                    {{ radio_field("genero", "size" : 30, "placeholder":"Genero", "value":"M", "class":"ace") }}
                    <span class="lbl"> Hombre</span>
                  </label></div>


                  <div> <label class="line-height-1 blue">

                    {{ radio_field("genero", "size" : 30, "placeholder":"Genero", "value":"F", "class":"ace") }}
                    <span class="lbl"> Mujer</span>
                  </label></div>
                </div>
              </div>

            </td>
            <td width="50%">
             <?php

             echo Phalcon\Tag::Select(array(
              'id_parentesco', 
              Parentesco::find(array("order" => "id_parentesco ASC")),
              'using' => array('id_parentesco', 'parentesco'),
              'useEmpty' => true,
              'emptyText' => 'Seleccione...',
              'emptyValue' => '',
              'class' => 'select2'
              ));
              ?>

            </td>
          </tr>
          <tr>
           <td width="50%"></td>
           <td width="50%">Discapacidad:</td>
         </tr>
         <tr>
           <td width="50%"><input type="hidden" name="foto_carga" value="1"></td>
           <td width="50%">
             <?php

             echo Phalcon\Tag::Select(array(
              'id_discapacidad', 
              Discapacidad::find(array("order" => "id_discapacid ASC")),
              'using' => array('id_discapacid', 'discapacidad'),
              'useEmpty' => true,
              'emptyText' => 'Seleccione...',
              'emptyValue' => '',
              'class' => 'select2'
              ));
              ?>

            </td>
          </tr>

        </table>
      </div>

    </td>
</tr>




</table>
</div>



</table>
</div>
</div>
</div>

{{ javascript_include("js/dataTables/jquery.dataTables.js") }}
{{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}
{{ javascript_include("js/dataTables/extensions/TableTools/js/dataTables.tableTools.js") }}
{{ javascript_include("js/dataTables/extensions/ColVis/js/dataTables.colVis.js") }}

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
             $('#nu_cedula').mask('99999999');


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
                url : "/sistenomialc/cargafamiliar/getCedula1",
                type : "get"
              }

            },
            nu_cedula: {
              required: true,
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



