 
        {{ stylesheet_link("css/select2.css") }}
        {{ stylesheet_link("css/jquery-ui.css") }}
        {{ stylesheet_link("css/bootstrap-editable.css") }}
        {{ stylesheet_link("css/datepicker.css") }}
        {{ stylesheet_link("css/bootstrap-timepicker.css") }}
        {{ stylesheet_link("css/bootstrap-datetimepicker.css") }}
        {{ stylesheet_link("css/colorpicker.css") }}
          {{ stylesheet_link("css/jquery-ui.custom.css") }}
        {{ stylesheet_link("css/chosen.css") }}
        {{ javascript_include("js/jquery-ui.js") }}
        {{ javascript_include("js/jquery.easypiechart.js") }}
        {{ javascript_include("js/bootstrap.js") }}
        {{ javascript_include("js/fuelux/fuelux.wizard.js") }}
        {{ javascript_include("js/x-editable/bootstrap-editable.js") }}
        {{ javascript_include("js/x-editable/ace-editable.js") }}
        {{ javascript_include("js/ace/elements.fileinput.js") }}
        {{ javascript_include("js/ace/elements.aside.js") }}
        {{ javascript_include("js/ace/ace.ajax-content.js") }}


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





<div id="row">
    <div class="widget-box">
        <div class="widget-header widget-header-blue widget-header-flat">
            <h4 class="widget-title lighter">Consultar Trabajador</h4>
        </div>

        <div class="widget-body">
            <div class="widget-main">

                <div class="page-content">

                {{ content() }}
                        <!-- /section:settings.box -->
                        <div class="page-header">
                            <h1>
                                Ficha del Trabajador
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    Tipo de Nomina
                                </small>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                    

                                <div class="hr dotted"></div>

                                

                                
                                    <div id="user-profile-2" class="user-profile">

                                                <div class="center">
                                                
                                                <span class="btn btn-app btn-sm btn-primary no-hover">
                                                    <span class="line-height-1 bigger-170"> <i class="ace-icon fa fa-refresh "></i> </span>

                                                    <br />
                                                    <span class="line-height-1 smaller-90"> Variación </span>
                                                </span>

                                                <span class="btn btn-app btn-sm btn-pink no-hover">
                                                    <span class="line-height-1 bigger-170"> <i class="ace-icon fa fa-fighter-jet "></i> </span>

                                                    <br />
                                                    <span class="line-height-1 smaller-90"> Vacaciones </span>
                                                </span>

                                                <a href="http://<?php echo $_SERVER['HTTP_HOST']; echo dirname($_SERVER['PHP_SELF']);?>/cargafamiliar/individual/<?php echo $dtrabajador->nu_cedula;?>"><span class="btn btn-app btn-sm btn-purple no-hover">
                                                    <span class="line-height-1 bigger-170"> Carga </span>

                                                    <br />
                                                    <span class="line-height-1 smaller-90">Familiar </span>
                                                </span></a>

                                                
                                                <button class="btn btn-app btn-sm btn-success no-hover">
                                                    <span class="line-height-1 bigger-170"> <i class="ace-icon fa fa-heart "></i> </span>

                                                    <br />
                                                    <?php echo $this->tag->linkTo(array("Reposos/index/".$dtrabajador->nu_cedula, "<span class=line-height-1 smaller-90\"> Reposos </span>"))  ?>

                                                    
                                                </button>

                                                <button class="btn btn-app btn-danger btn-sm no-hover">
                                                    <i class="ace-icon fa fa-gavel bigger-200"></i>
                                                        <?php echo $this->tag->linkTo(array("Embargos/index/".$dtrabajador->nu_cedula)) ?>
                                                            Embargos
                                                </button>

                                                <?php echo $this->tag->linkTo("./asigsdeducstrabajador/cargar/$dtrabajador->nu_cedula","Asignaciones y Deducciones");?>                                         
                                            </div>
                                    
                                            

                                            <div class="tab-content no-border padding-24">
                                                <div id="home" class="tab-pane in active">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-3 center">
                                                            <span class="profile-picture">
                                                            
                                                           
                                                            <img id="avatar" class="editable img-responsive" title="<?php echo $dtrabajador->nombre1." ".$dtrabajador->apellido1; ?>" src="../../public/empleados/fotos/<?php echo $dtrabajador->foto_p; ?>" />
                                                           <!--  {{ image("public/empleados/fotos/<?php echo $dtrabajador->foto_p;?>", "id": "avatar", "class": "editable img-responsive") }} --><a href="http://<?php echo $_SERVER['HTTP_HOST']; echo dirname($_SERVER['PHP_SELF']);?>/empleados/subir_foto.php?ced=<?php echo $dtrabajador->nu_cedula; ?>" target="popup" onClick="window.open(this.href, this.target, 'width=500,height=400'); return false;">Cambiar/Actualizar Foto</a>
                                                            </span>

                                                        </div><!-- /.col -->

                                                        <div class="col-xs-12 col-sm-9">
                                                            <h4 class="blue">
                                                                <span class="middle"><?php echo $dtrabajador->nombre1;
                                                                                    echo "&nbsp";
                                                                                    echo $dtrabajador->nombre2;
                                                                                    echo "&nbsp";
                                                                                    echo $dtrabajador->apellido1;
                                                                                    echo "&nbsp";
                                                                                    echo $dtrabajador->apellido2; ?></span>

                                                                <span class="label label-purple arrowed-in-right">
                                                                    <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                                                                    <?php echo $estatus1->estatus;?>
                                                                </span>
                                                            </h4>

                                                            <div class="profile-user-info">

                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name"> Cedula </div>

                                                                    <div class="profile-info-value">
                                                                        <?php echo $dtrabajador->nu_cedula;?>
                                                                    </div>
                                                                </div>

                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name"> Genero </div>

                                                                    <div class="profile-info-value">
                                                                        <span><?php echo $dtrabajador->genero;?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name"> Lugar de Nacimiento </div>

                                                                    <div class="profile-info-value">
                                                                        <span><?php echo $ciudad1->ciudad;?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name"> Edad </div>

                                                                    <div class="profile-info-value">
                                                                        <span><?php echo $dtrabajador->f_nac;?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name"> Estado Civil </div>

                                                                    <div class="profile-info-value">
                                                                        <span><?php echo $dtrabajador->edo_civil;?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name"> Discapacidad </div>

                                                                    <div class="profile-info-value">
                                                                        <span><?php echo $discapac1->discapacidad;?></span>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="hr hr-8 dotted"></div>

                                                            <div class="profile-user-info">
                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name"> Contacto </div>

                                                                    
                                                                </div>

                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name">
                                                                        <i class="fa fa-phone-square bigger-150 pink"></i>
                                                                    </div>

                                                                    <div class="profile-info-value">
                                                                        <?php echo $dtrabajador->telf_hab;
                                                                        echo $dtrabajador->telf_cel;?>
                                                                    </div>
                                                                </div>

                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name">
                                                                        <i class="middle ace-icon fa fa-envelope bigger-150 blue"></i>
                                                                    </div>

                                                                    <div class="profile-info-value">
                                                                        <?php echo $dtrabajador->correo_e;
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                                <div class="profile-info-row">
                                                                    <div class="profile-info-name">
                                                                        <i class="middle fa fa-map-marker light-orange bigger-150"></i>
                                                                    </div>

                                                                    <div class="profile-info-value">
                                                                        <?php echo $dtrabajador->dir_hab;?>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div><!-- /.col -->
                                                    </div><!-- /.row -->

                                                    <div class="space-20"></div>

                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="widget-box transparent">
                                                                <div class="widget-header widget-header-small">
                                                                    <h4 class="widget-title smaller">
                                                                        <i class="ace-icon fa fa-book bigger-110"></i>
                                                                        Contratación
                                                                    </h4>
                                                                </div>

                                                                <div class="widget-body">
                                                                    <div class="widget-main">
                                                <div class="profile-user-info profile-user-info-striped">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Fecha de Ingreso </div>

                                                    <div class="profile-info-value">
                                                        <span  id="username"><?php echo $dcontra->f_ing;  ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Fecha Egreso </div>

                                                    <div class="profile-info-value">
                                                        <?php echo $dcontra->f_egre;  ?>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Tipo de Nomina </div>

                                                    <div class="profile-info-value">
                                                        <span  id="age"><?php echo $tiponomi1->nomina;   ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Liquidación </div>

                                                    <div class="profile-info-value">
                                                        <span  id="signup"><?php echo $dcontra->liquidac;  ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Pago Liquidación </div>

                                                    <div class="profile-info-value">
                                                        <span  id="login"><?php //echo $dcontra->f_pago_liq;  ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Cargo </div>

                                                    <div class="profile-info-value">
                                                        <span  id="about"><?php echo $cargo1->cargo;  ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Tipo de Contrato </div>

                                                    <div class="profile-info-value">
                                                        <span  id="about"><?php echo $tipocontr1->contrato;  ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Ubicación Nominal </div>

                                                    <div class="profile-info-value">
                                                        <span  id="about"><?php echo $ubinom1->denominacion;  ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Ubicación Funcional </div>

                                                    <div class="profile-info-value">
                                                        <span  id="about"><?php echo $ubifun1->denominacion;  ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="widget-box transparent">
                                                                <div class="widget-header widget-header-small header-color-blue2">
                                                                    <h4 class="widget-title smaller">
                                                                        <i class="ace-icon fa fa-university bigger-120"></i>
                                                                        Profesión
                                                                    </h4>
                                                                </div>

                                                                <div class="widget-body">
                                                                    <div class="widget-main padding-16">
                                                                        <div class="clearfix">
                                                                            
                                                                            <div class="name">
                                                                            <?php echo $profesion1->profesion  ?>
                                                                            
                                                                                <span class="label label-info arrowed arrowed-in-right"><?php echo $nivelintru1->nivel_instruc;  ?></span>
                                                                            </div>
                                                                            

                                                                            
                                                                        </div>

                                                                        <div class="hr hr-16"></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="widget-box transparent">
                                                                <div class="widget-header widget-header-small">
                                                                    <h4 class="widget-title smaller">
                                                                        <i class="ace-icon fa fa-money bigger-110"></i>
                                                                        Datos Financieros
                                                                    </h4>
                                                                </div>

                                                                <div class="widget-body">
                                                                    <div class="widget-main">
                                                                                <div class="profile-user-info profile-user-info-striped">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Banco </div>

                                                    <div class="profile-info-value">
                                                        <span class="editable" id="username"><?php echo $bancos1->nb_bancos;  ?></span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> N de Cuenta </div>

                                                    <div class="profile-info-value">
                                                        <?php echo $dfinanc->n_cuenta;  ?>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Tipo de Cuenta </div>

                                                    <div class="profile-info-value">
                                                        <span class="editable" id="age"><?php echo $tipocuen1->tipo_cuenta;  ?></span>
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
                                

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->



            
            </div>
        </div>
    </div>
</div>


        <script type="text/javascript">
            jQuery(function($) {
            
                //editables on first profile page
                $.fn.editable.defaults.mode = 'inline';
                $.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
                $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                            '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
                
                //editables 
                
                //text editable
                $('#username')
                .editable({
                    type: 'text',
                    name: 'username'
                });
            
            
                
            
                
                
                
                // *** editable avatar *** //
                try {//ie8 throws some harmless exceptions, so let's catch'em
            
                    //first let's add a fake appendChild method for Image element for browsers that have a problem with this
                    //because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
                    try {
                        document.createElement('IMG').appendChild(document.createElement('B'));
                    } catch(e) {
                        Image.prototype.appendChild = function(el){}
                    }
            
                    var last_gritter
                    $('#avatar').editable({
                        type: 'image',
                        name: 'avatar',
                        value: null,
                        image: {
                            //specify ace file input plugin's options here
                            btn_choose: 'Cambiar Foto',
                            droppable: true,
                            maxSize: 1100000,//~1000Kb
            
                            //and a few extra ones here
                            name: 'avatar',//put the field name here as well, will be used inside the custom plugin
                            on_error : function(error_type) {//on_error function will be called when the selected file has a problem
                                if(last_gritter) $.gritter.remove(last_gritter);
                                if(error_type == 1) {//file format error
                                    last_gritter = $.gritter.add({
                                        title: 'No es una imagen!',
                                        text: 'Elije imagen tipo jpg|gif|png image!',
                                        class_name: 'gritter-error gritter-center'
                                    });
                                } else if(error_type == 2) {//file size rror
                                    last_gritter = $.gritter.add({
                                        title: 'File too big!',
                                        text: 'El tamano de la imagen supera los 1Mb!',
                                        class_name: 'gritter-error gritter-center'
                                    });
                                }
                                else {//other error
                                }
                            },
                            on_success : function() {
                                $.gritter.removeAll();
                            }
                        },
                        url: function(params) {
                            // ***UPDATE AVATAR HERE*** //
                            //for a working upload example you can replace the contents of this function with 
                            //examples/profile-avatar-update.js
            
                            var deferred = new $.Deferred
            
                            var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
                            if(!value || value.length == 0) {
                                deferred.resolve();
                                return deferred.promise();
                            }
            
            
                            //dummy upload
                            setTimeout(function(){
                                if("FileReader" in window) {
                                    //for browsers that have a thumbnail of selected image
                                    var thumb = $('#avatar').next().find('img').data('thumb');
                                    if(thumb) $('#avatar').get(0).src = thumb;
                                }
                                
                                deferred.resolve({'status':'OK'});
            
                                if(last_gritter) $.gritter.remove(last_gritter);
                                last_gritter = $.gritter.add({
                                    title: 'Foto Actualizada!',
                                    text: ' ',
                                    class_name: 'gritter-info gritter-center'
                                });
                                
                             } , parseInt(Math.random() * 800 + 800))
            
                            return deferred.promise();
                            
                            // ***END OF UPDATE AVATAR HERE*** //
                        },
                        
                        success: function(response, newValue) {
                        }
                    })
                }catch(e) {}
                
                /**
                //let's display edit mode by default?
                var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
                if(blank_image) {
                    $('#avatar').editable('show').on('hidden', function(e, reason) {
                        if(reason == 'onblur') {
                            $('#avatar').editable('show');
                            return;
                        }
                        $('#avatar').off('hidden');
                    })
                }
                */
            
                //another option is using modals
                $('#avatar2').on('click', function(){
                    var modal = 
                    '<div class="modal fade">\
                      <div class="modal-dialog">\
                       <div class="modal-content">\
                        <div class="modal-header">\
                            <button type="button" class="close" data-dismiss="modal">&times;</button>\
                            <h4 class="blue">Change Avatar</h4>\
                        </div>\
                        \
                        <form class="no-margin">\
                         <div class="modal-body">\
                            <div class="space-4"></div>\
                            <div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
                         </div>\
                        \
                         <div class="modal-footer center">\
                            <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
                            <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                         </div>\
                        </form>\
                      </div>\
                     </div>\
                    </div>';
                    
                    
                    var modal = $(modal);
                    modal.modal("show").on("hidden", function(){
                        modal.remove();
                    });
            
                    var working = false;
            
                    var form = modal.find('form:eq(0)');
                    var file = form.find('input[type=file]').eq(0);
                    file.ace_file_input({
                        style:'well',
                        btn_choose:'Click to choose new avatar',
                        btn_change:null,
                        no_icon:'ace-icon fa fa-picture-o',
                        thumbnail:'small',
                        before_remove: function() {
                            //don't remove/reset files while being uploaded
                            return !working;
                        },
                        allowExt: ['jpg', 'jpeg', 'png', 'gif'],
                        allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
                    });
            
                    form.on('submit', function(){
                        if(!file.data('ace_input_files')) return false;
                        
                        file.ace_file_input('disable');
                        form.find('button').attr('disabled', 'disabled');
                        form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");
                        
                        var deferred = new $.Deferred;
                        working = true;
                        deferred.done(function() {
                            form.find('button').removeAttr('disabled');
                            form.find('input[type=file]').ace_file_input('enable');
                            form.find('.modal-body > :last-child').remove();
                            
                            modal.modal("hide");
            
                            var thumb = file.next().find('img').data('thumb');
                            if(thumb) $('#avatar2').get(0).src = thumb;
            
                            working = false;
                        });
                        
                        
                        setTimeout(function(){
                            deferred.resolve();
                        } , parseInt(Math.random() * 800 + 800));
            
                        return false;
                    });
                            
                });
            
                
            
                //////////////////////////////
                $('#profile-feed-1').ace_scroll({
                    height: '250px',
                    mouseWheelLock: true,
                    alwaysVisible : true
                });
            
                $('a[ data-original-title]').tooltip();
            
                $('.easy-pie-chart.percentage').each(function(){
                var barColor = $(this).data('color') || '#555';
                var trackColor = '#E2E2E2';
                var size = parseInt($(this).data('size')) || 72;
                $(this).easyPieChart({
                    barColor: barColor,
                    trackColor: trackColor,
                    scaleColor: false,
                    lineCap: 'butt',
                    lineWidth: parseInt(size/10),
                    animate:false,
                    size: size
                }).css('color', barColor);
                });
              
                ///////////////////////////////////////////
            
                //right & left position
                //show the user info on right or left depending on its position
                $('#user-profile-2 .memberdiv').on('mouseenter touchstart', function(){
                    var $this = $(this);
                    var $parent = $this.closest('.tab-pane');
            
                    var off1 = $parent.offset();
                    var w1 = $parent.width();
            
                    var off2 = $this.offset();
                    var w2 = $this.width();
            
                    var place = 'left';
                    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';
                    
                    $this.find('.popover').removeClass('right left').addClass(place);
                }).on('click', function(e) {
                    e.preventDefault();
                });
            
            
                ///////////////////////////////////////////
                $('#user-profile-3')
                .find('input[type=file]').ace_file_input({
                    style:'well',
                    btn_choose:'Change avatar',
                    btn_change:null,
                    no_icon:'ace-icon fa fa-picture-o',
                    thumbnail:'large',
                    droppable:true,
                    
                    allowExt: ['jpg', 'jpeg', 'png', 'gif'],
                    allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
                })
                .end().find('button[type=reset]').on(ace.click_event, function(){
                    $('#user-profile-3 input[type=file]').ace_file_input('reset_input');
                })
                .end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
                    $(this).prev().focus();
                })
                $('.input-mask-phone').mask('(999) 999-9999');
            
                $('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);
            
            
                ////////////////////
                //change profile
                $('[data-toggle="buttons"] .btn').on('click', function(e){
                    var target = $(this).find('input[type=radio]');
                    var which = parseInt(target.val());
                    $('.user-profile').parent().addClass('hide');
                    $('#user-profile-'+which).parent().removeClass('hide');
                });
                
                
                
                /////////////////////////////////////
                $(document).one('ajaxloadstart.page', function(e) {
                    //in ajax mode, remove remaining elements before leaving page
                    try {
                        $('.editable').editable('destroy');
                    } catch(e) {}
                    $('[class*=select2]').remove();
                });
            });
        </script>