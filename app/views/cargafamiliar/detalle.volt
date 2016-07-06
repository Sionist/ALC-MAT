{{ javascript_include("js/bootstrap.js") }}
<div id="page-wrapper">

    {{ content() }}

    <div class="row">
     <div class="col-xs-12">

         <div class="tab-content no-border padding-24">
            <div id="home" class="tab-pane in active">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 center">
                        <span class="profile-picture">
                            <img id="avatar" class="img-responsive" title="<?php echo $carga->nombre1." ".$carga->apellido1; ?>" src=
                            <?php 
                                if($carga->foto_carga){
                                    echo "http://localhost/sistenomialc/cargafamiliar/fotos/".$carga->foto_carga; 
                                } else { 
                                    echo "http://localhost/sistenomialc/cargafamiliar/fotos/sinfoto.gif";
                                } 
                            ?> 
                            />
                        </span>

                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-9">
                        <h4 class="blue">
                            <span class="middle" style="text-transform: capitalize;"><?php echo $carga->nombre1;
                                echo "&nbsp";
                                echo $carga->nombre2;
                                echo "&nbsp";
                                echo $carga->apellido1;
                                echo "&nbsp";
                                echo $carga->apellido2; ?></span>

                                <span class="label label-purple arrowed-in-right">
                                    <i class="ace-icon fa fa-eye smaller-80 align-middle"></i>
                                    <?php 


                                    echo $parentesco->parentesco;


                                    ?>
                                </span>
                            </h4>

                            <div class="profile-user-info">

                               <div class="profile-info-row">
                                <div class="profile-info-name"> C&eacute;dula </div>

                                <div class="profile-info-value">
                                    <span><?php echo $carga->ci_carga;?></span>
                                </div>
                            </div>



                            <div class="profile-info-row">
                                <div class="profile-info-name"> Genero </div>

                                <div class="profile-info-value">
                                    <span><?php 

                                       if ($carga->genero=='M') {echo "Masculino";}

                                       if ($carga->genero=='F') {echo "Femenino";}
                                       ?></span>
                                   </div>
                               </div>

                               <div class="profile-info-row">
                                <div class="profile-info-name"> Fecha de Nacimiento </div>

                                <div class="profile-info-value">
                                    <span><?php echo date('d-m-Y',strtotime($carga->f_nac));?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Edad </div>

                                <div class="profile-info-value">
                                    <span>



                                      <?php


                                      $dia=date(j);
                                      $mes=date(n);
                                      $ano=date(Y);

                                      $dianaz=date('d',strtotime($carga->f_nac));
                                      $mesnaz=date('m',strtotime($carga->f_nac));
                                      $anonaz=date('Y',strtotime($carga->f_nac));

//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

                                      if (($mesnaz == $mes) && ($dianaz > $dia)) {
                                        $ano=($ano-1); }

//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

                                        if ($mesnaz > $mes) {
                                            $ano=($ano-1);}

//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

                                            $edad=($ano-$anonaz);

                                            echo $edad; 

                                            ?>

                                        </span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Ocupación </div>

                                    <div class="profile-info-value">
                                        <span><?php echo $carga->ocupacion;?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Discapacidad </div>

                                    <div class="profile-info-value">
                                        <span><?php echo $discapacidad[0]["discapacidad"]; ?></span>
                                    </div>
                                </div>


                            </div>




                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->




            </div>
        </div>




    </div>
</div>
</div>
</div>
</div>

</div>
</div><!-- /#home -->

</div>				


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
                    changeMonth: false,
                    changeYear: false
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



