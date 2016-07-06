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
{{ javascript_include("js/ficha1.js") }}


<div id="row">
  <div class="widget-box">
    <div class="widget-header widget-header-blue widget-header-flat">
      <table border="0" width="100%" cellspacing="3" cellpadding="0">
       <tr>
        <td>
          <p align="left"><h4 class="widget-title lighter">Trabajadores - Ficha de Trabajador</h4></td>
            <td align="right"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/sistenomialc/trabajadores" title="Volver">
              <!-- <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/sistenomialc/img/btn-volver.png"></a>&nbsp;</td> -->
            </tr>
          </table>
        </div>

        <div class="widget-body">
          <div class="widget-main">

            <div class="page-content">

              <?php echo $this->flashSession->outPut(); ?>
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
                    <?= $this->tag->linkTo("trabajadores/ver/".$dtrabajador->nu_cedula."/deudas", "<span class='btn btn-app btn-sm btn-pink no-hover'>
                      <span class='line-height-1 bigger-170'> -<i class='glyphicon glyphicon-usd'></i> </span>
                      <br />
                      <span class='line-height-1 smaller-90'> Deudas </span>
                    </span>") ?>

                    <?= $this->tag->linkTo("trabajadores/ver/".$dtrabajador->nu_cedula."/vacaciones", "<span class='btn btn-app btn-sm btn-warning no-hover'>
                      <span class='line-height-1 bigger-170'><i class='ace-icon fa fa-fighter-jet'></i> </span>
                      <br />
                      <span class='line-height-1 smaller-90'> Vacaciones </span>
                    </span>") ?>

                    <?= $this->tag->linkTo("trabajadores/ver/".$dtrabajador->nu_cedula."/carga-familiar", "<span class='btn btn-app btn-sm btn-purple no-hover'>
                      <span class='line-height-1 bigger-170'> Carga </span>
                      <br />
                      <span class='line-height-1 smaller-90'>Familiar </span>
                    </span>") ?>

                    <?= $this->tag->linkTo("trabajadores/ver/".$dtrabajador->nu_cedula."/reposos", "<span class='btn btn-app btn-sm btn-success no-hover'>
                      <span class='line-height-1 bigger-170'> 
                        <i class='ace-icon fa fa-heart'></i> </span>

                        <br />
                        <span class='line-height-1 smaller-90'>Reposos </span>
                      </span>") ?>

                    <?= $this->tag->linkTo("trabajadores/ver/".$dtrabajador->nu_cedula."/embargos", "<span class='btn btn-app btn-sm btn-danger no-hover'>
                      <span class='line-height-1 bigger-170'> 
                        <i class='ace-icon fa fa-gavel'></i> </span>

                        <br />
                        <span class='line-height-1 smaller-90'>Embargos </span>
                      </span>") ?>

                    <?= $this->tag->linkTo("trabajadores/ver/".$dtrabajador->nu_cedula."/asignaciones-deducciones/".$dtrabajador->nu_cedula, "<span class='btn btn-app btn-sm btn-primary no-hover'>
                      <span class='line-height-1 bigger-170'><i class='ace-icon fa fa-money '></i> </span>
                      <br />
                      <span class='line-height-1 smaller-90'> Asig./Ded. </span>
                    </span>") ?>
                  </div>
                  <div class="tab-content no-border padding-24">
                    <div id="home" class="tab-pane in active">
                      <div class="row">
                        <div class="col-xs-12 col-sm-3 center">
                          <span class="profile-picture">
                            <?php

                            if ($dtrabajador->foto_p == null) {
                             ?>
                             <img class="editable img-responsive" title="No tiene Foto" src="../../public/img/sinfoto.png" />
                             <?php														  
                           }
                           else{
                             ?>
                             <img class="editable img-responsive" title="<?php echo $dtrabajador->nombre1." ".$dtrabajador->apellido1; ?>" src="../../public/empleados/fotos/<?php echo $dtrabajador->foto_p; ?>" />

                             <?php
                           }
                           ?>
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
                            <a href="../../trabajadores/ver/<?php echo $dtrabajador->nu_cedula ?>/editar-dp" class="smaller-70" style="position: relative;  float: right; right: 10px; top:10px">Editar</a>
                            <!-- <button id="d_pBtn" class="btn btn-white btn-purple btn-sm btnEdit" style="position: relative;  float: right; right: 10px"><span class="ace-icon fa fa-pencil-square-o"></span></button> -->

                          </h4>

                          <div class="profile-user-info">

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Cedula </div>

                              <div class="profile-info-value">
                                <?php echo $dtrabajador->nu_cedula;?>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Rif: </div>

                              <div class="profile-info-value">
                                <?php echo $dtrabajador->rif;?>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Nacionalidad: </div>

                              <div class="profile-info-value">
                                <?php 
                                if($dtrabajador->nacionalidad == "v" || $dtrabajador->nacionalidad == "V"){
                                  echo "Venezolana";
                                }else {
                                  echo "Extranjera";
                                } 
                                ?>
                              </div>
                            </div>

                            <div class="profile-info-row">
                              <div class="profile-info-name"> Genero </div>

                              <div class="profile-info-value">
                                <span><?php 


                                  if ($dtrabajador->genero == 1) {

                                    echo "Masculino <i class='ace-icon fa fa-male bigger-150 blue'></i>";

                                  }
                                  if ($dtrabajador->genero == 2) {

                                    echo "Femenino <i class='ace-icon fa fa-female bigger-150 pink'></i>";

                                  }
                                  ?></span>
                                </div>
                              </div>

                              <div class="profile-info-row">
                                <div class="profile-info-name"> Lugar de Nacimiento </div>

                                <div class="profile-info-value">
                                  <span><?php echo $ciudad1->ciudad;?></span>
                                </div>
                              </div>

                              <div class="profile-info-row">
                                <div class="profile-info-name"> Fecha de Nacimiento </div>

                                <div class="profile-info-value">
                                  <span><?php echo date('d-m-Y',strtotime($dtrabajador->f_nac));?></span>
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

                                    $dianaz=date('d',strtotime($dtrabajador->f_nac));
                                    $mesnaz=date('m',strtotime($dtrabajador->f_nac));
                                    $anonaz=date('Y',strtotime($dtrabajador->f_nac));

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
                                    <div class="profile-info-name"> Estado Civil </div>

                                    <div class="profile-info-value">
                                      <span><?php echo $edo_civil->estado_civil;?></span>
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
                                      <i class="fa fa-phone-square bigger-150 blue"></i>
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
                                      <i class="middle fa fa-map-marker red bigger-150"></i>
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

                                    <a href="../../trabajadores/ver/<?php echo $dtrabajador->nu_cedula ?>/editar-dc" style="position: relative;  float: right; right: 10px; top:10px">Editar</a>

                                    <!-- <button class="btn btn-white btn-purple btn-sm btnEdit" id="d_cBtn" style="position: relative;  float: right;"><span class="ace-icon fa fa-pencil-square-o"></span></button>-->
                                  </div>

                                  <div class="widget-body">
                                    <div class="widget-main">
                                      <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                          <div class="profile-info-name"> Fecha de Ingreso </div>

                                          <div class="profile-info-value">
                                            <span><?php echo date ("d-m-Y",strtotime($dcontra->f_ing));  ?></span>
                                          </div>
                                        </div>

                                        <div class="profile-info-row">
                                          <div class="profile-info-name"> Fecha Egreso </div>

                                          <div class="profile-info-value">
                                            <?php echo date("d-m-Y",strtotime($dcontra->f_egre));  ?>
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
                                            <span  id="login"><?php echo date("d-m-Y", strtotime($dcontra->f_pago_liq)); ?></span>
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
                                      <i class="ace-icon fa fa-graduation-cap bigger-120"></i>
                                      Profesión
                                    </h4>

                                    <a href="../../trabajadores/ver/<?php echo $dtrabajador->nu_cedula ?>/editar-dpf" style="position: relative;  float: right; right: 10px; top:10px">Editar</a>
                                    <!-- <button class="btn btn-white btn-purple btn-sm btnEdit" id="d_pfBtn" style="position: relative;  float: right"><span class="ace-icon fa fa-pencil-square-o"></span></button> -->

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
                                      <a href="../../trabajadores/ver/<?php echo $dtrabajador->nu_cedula ?>/editar-df" style="position: relative;  float: right; right: 10px; top:10px">Editar</a>

                                      <!-- <button class="btn btn-white btn-purple btn-sm btnEdit" id="d_fBtn" style="position: relative;  float: right"><span class="ace-icon fa fa-pencil-square-o"></span></button> -->
                                    </div>

                                    <div class="widget-body">
                                      <div class="widget-main">
                                        <div class="profile-user-info profile-user-info-striped">
                                          <div class="profile-info-row">
                                            <div class="profile-info-name"> Banco </div>

                                            <div class="profile-info-value">
                                              <span><?php echo $bancos1->nb_bancos;  ?></span>
                                            </div>
                                          </div>

                                          <div class="profile-info-row">
                                            <div class="profile-info-name"> N° de Cuenta </div>

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
          <div id="d_personales" class="hide">
            <div class="row">
              <div class="col-sm-4"><label>Rif:</label> </div>
              <div class="col-sm-8"><input type="text" name="rif" id="rif" class="input-large d_p" required placeholder="Ejem: v(o V) 12345678 9" value="<?php echo $dtrabajador->rif;?>"><span class="dp_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
              </div> 
            </div>
            <div class="row">
              <div class="col-sm-4"><label>Primer Nombre:</label> </div>
              <div class="col-sm-8"><input type="text" name="nombre1" id="nombre1" class="input-large d_p" required value="<?php echo $dtrabajador->nombre1;?>"><span class="dp_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span></div> 
            </div>
            <div class="row">
              <div class="col-sm-4"><label>Segundo Nombre:</label> </div>
              <div class="col-sm-8"><input type="text" name="nombre2" id="nombre2" class="input-large" required value="<?php echo $dtrabajador->nombre2;?>"></div> 
            </div>
            <div class="row">
              <div class="col-sm-4"><label>Primer Apellido:</label> </div>
              <div class="col-sm-8"><input type="text" name="apellido1" id="apellido1" class="input-large d_p" required value="<?php echo $dtrabajador->apellido1;?>"><span class="dp_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span></div> 
            </div>
            <div class="row">
              <div class="col-sm-4"><label>Segundo Apellido:</label> </div>
              <div class="col-sm-8"><input type="text" name="apellido2" id="apellido2" class="input-large" required value="<?php echo $dtrabajador->apellido2;?>"></div> 
            </div>
            <div class="row" style="margin-top: 4px">
              <div class="col-sm-4"><label>Genero:</label> </div>
              <div class="col-sm-8" style="margin: 5px 0 4px 0">
                <?php if($dtrabajador->genero == 1) { ?>
                <label class="line-height-1 blue">

                  {{ radio_field("genero", "id" : "m", "size" : 30, "placeholder":"Genero", "value":"1", "class":"ace" ,'checked' : 'checked') }}
                  <span class="lbl"> Hombre</span>
                </label>
                <label class="line-height-1 blue">

                  {{ radio_field("genero", "id" : "f", "size" : 30, "placeholder":"Genero", "value":"2", "class":"ace") }}
                  <span class="lbl"> Mujer</span>

                </label>

                <?php } else { ?>
                <label class="line-height-1 blue">

                  {{ radio_field("genero", "id" : "m", "size" : 30, "placeholder":"Genero", "value":"1", "class":"ace" ) }}
                  <span class="lbl"> Hombre</span>
                </label>
                <label class="line-height-1 blue">

                  {{ radio_field("genero", "id" : "f", "size" : 30, "placeholder":"Genero", "value":"2", "class":"ace" ,'checked' : 'checked') }}
                  <span class="lbl"> Mujer</span>

                </label>

                <?php } ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4"><label>Lugar Nacimiento:</label> </div>
              <div class="col-sm-8" ><?php

                echo Phalcon\Tag::Select(array(
                  'lugar_nac', 
                  Ciudades::find(array("order" => "ciudad ASC")),
                  'using' => array('id_ciudad', 'ciudad'),
                  'useEmpty' => true,
                  'emptyText' => 'Seleccione',
                  'class' => 'select2 d_p',
                  'style'=> "width: 210px",
                  "id" => "lugar_nac"
                  ));
                  ?>
                  <span class="dp_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                </div> 

              </div>
              <div class="row">
                <div class="col-sm-4"><label>Fecha Nacimiento:</label> </div>
                <div class="col-sm-8"><input type="text" name="f_nac" id="f_nac" class="d_p date-picker" style = "width: 210px" data-date-format="dd-mm-yyyy" required value="<?php echo date('d-m-Y',strtotime($dtrabajador->f_nac));?>"><span class="dp_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span></div>
              </div>
              <div class="row">
                <div class="col-sm-4"><label>telf. Habitación:</label> </div>
                <div class="col-sm-8"><input type="text" name="telf_hab" id="telf_hab" class="input-large" required value="<?php echo $dtrabajador->telf_hab;?>"></div> 
              </div>
              <div class="row">
                <div class="col-sm-4"><label>telf. Celular:</label> </div>
                <div class="col-sm-8"><input type="text" name="telf_cel" id="telf_cel" class="input-large" required value="<?php echo $dtrabajador->telf_cel;?>"></div> 
              </div>
              <div class="row">
                <div class="col-sm-4"><label>Dirección Habitación:</label> </div>
                <div class="col-sm-8"><input type="text" name="dir_hab" id="dir_hab" class="input-large d_p" required value="<?php echo $dtrabajador->dir_hab;?>"><span class="dp_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span></div> 
              </div>
              <div class="row">
                <div class="col-sm-4"><label>Correo:</label> </div>
                <div class="col-sm-8"><input type="text" name="correo" id="correo" class="input-large" required value="<?php echo $dtrabajador->correo_e;?>"></div> 
              </div>
              <div class="row">
                <div class="col-sm-4"><label for="estado_civil">Estado Civil:</label></div>
                <div class="col-sm-8"><!-- <select class="select2" name="ed" size="1" name="edo_civil" , id = "estado_civil" value="<?php echo $dtrabajador->edo_civil;?>"> -->

                  <?php

                  echo Phalcon\Tag::Select(array(
                    'edo_civil', 
                    EstadoCivil::find(array("order" => "id ASC")),
                    'using' => array('id', 'estado_civil'),
                    'useEmpty' => true,
                    'emptyText' => 'Seleccione',
                    'class' => 'select2 d_p',
                    'id' => 'estado_civil'
                    ));
                    ?>  
                    <span class="dp_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>         
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4"><label><Correo>Estatus</Correo>:</label> </div>
                  <div class="col-sm-8">
                    <?php

                    echo Phalcon\Tag::Select(array(
                      'estatus', 
                      EstatusT::find(array("order" => "estatus ASC")),
                      'using' => array('id_estat', 'estatus'),
                      'useEmpty' => true,
                      'emptyText' => 'Ingrese un valor',
                      'emptyValue' => '',
                      'class' => 'select2 d_p',
                      'id' => 'estatus'
                      ));
                      ?> 
                      <span class="dp_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-sm-4"><label for="discapacidad">Discapacidad:</label></div>
                    <div class="col-sm-8">
                      <?php
                      echo Phalcon\Tag::Select(array(
                        'discapacidad', 
                        Discapacidad::find(array("order" => "id_discapacid ASC")),
                        'using' => array('id_discapacid', 'discapacidad'),
                        'useEmpty' => true,
                        'emptyText' => 'Ingrese un valor',
                        'emptyValue' => '',
                        'class' => 'select2 d_p',
                        'style'=> "width: 210px",
                        "id" => "discapacidad"
                        ));
                        ?>
                        <span class="dp_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                      </div> 
                    </div>

                    {{ hidden_field("cedula") }}
                    {{ hidden_field("nacionalidad") }}
                    <br />
                    <div id="dpMsj" class="alert alert-success hidden"><i class="ace-icon fa fa-check"></i>&nbsp;Se ha modificado exitosamente.</div>
                  </div>

                  <div id="d_contratacion" class="hide">
                    <div class="row">
                      <div class="col-sm-4"><label>Fecha de Ingreso:</label></div>
                      <div class="col-sm-8"><input type="text" name="f_ingre" id="f_ingre" class="d_c date-picker" style = "width: 210px" data-date-format="dd-mm-yyyy" required value="<?php echo date('d-m-Y',strtotime($dcontra->f_ing));?>"><span class="dc_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span> </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4"><label>Fecha de Egreso:</label> </div>
                      <div class="col-sm-8"><input type="text" name="f_egre" id="f_egre" class="d_c date-picker" style = "width: 210px" data-date-format="dd-mm-yyyy" required value="<?php echo date('d-m-Y',strtotime($dcontra->f_egre));?>"><span class="dc_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span> </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4"><label>Tipo de nomina:</label> </div>
                      <div class="col-sm-8">
                        <?php
                        echo Phalcon\Tag::Select(array(
                          'tipo_nomina', 
                          tiponomi::find(array("order" => "id_nomina ASC")),
                          'using' => array('id_nomina', 'nomina'),
                          'useEmpty' => true,
                          'emptyText' => 'Seleccione',
                          'emptyValue' => '',
                          'class' => 'select2 d_c',
                          'style'=> "width: 210px",
                          "id" => "tipo_nomina"
                          ));
                          ?>
                          <span class="dc_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span> 
                        </div> 
                      </div>
                      <div class="row">
                        <div class="col-sm-4"><label>Liquidación:</label> </div>
                        <div class="col-sm-8"><input type="text" name="liquidacion" id="liquidacion" class="input-large" required value="<?php echo $dcontra->liquidac;?>"></div> 
                      </div>
                      <div class="row">
                        <div class="col-sm-4"><label>Pago Liquidación:</label> </div>
                        <div class="col-sm-8"><input type="text" name="pag_liquid" id="pag_liquid" class="form-control date-picker" style = "width: 210px" data-date-format="dd-mm-yyyy" required value="<?php echo date("d-m-Y", strtotime($dcontra->f_pago_liq)); ?>"></div> 
                      </div>
                      <div class="row">
                        <div class="col-sm-4"><label>Cargo:</label> </div>
                        <div class="col-sm-8">
                          <?php
                          echo Phalcon\Tag::Select(array(
                            'cargos', 
                            cargos::find(array("order" => "id_cargo ASC")),
                            'using' => array('id_cargo', 'cargo'),
                            'useEmpty' => true,
                            'emptyText' => 'Seleccione',
                            'emptyValue' => '',
                            'class' => 'select2 d_c',
                            'style'=> "width: 210px;",
                            "id" => "cargos"
                            ));
                            ?>
                            <span class="dc_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4"><label>Tipo de Contrato:</label> </div>
                          <div class="col-sm-8">
                            <?php
                            echo Phalcon\Tag::Select(array(
                              'tipo_contrat', 
                              tipocontrat::find(array("order" => "id_contrato ASC")),
                              'using' => array('id_contrato', 'contrato'),
                              'useEmpty' => true,
                              'emptyText' => 'Seleccione',
                              'emptyValue' => '',
                              'class' => 'select2 d_c',
                              'style'=> "width: 210px",
                              "id" => "tipo_contrat"
                              ));
                              ?>
                              <span class="dc_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                            </div> 
                          </div>
                          <div class="row">
                            <div class="col-sm-4"><label>Ubicacion Funcional:</label> </div>
                            <div class="col-sm-8">
                              <?php
                              echo Phalcon\Tag::Select(array(
                                'ubi_fun', 
                                NbDireciones::find(array("order" => "id_direcciones ASC")),
                                'using' => array('id_direcciones', 'denominacion'),
                                'useEmpty' => true,
                                'emptyText' => 'Seleccione',
                                'emptyValue' => '',
                                'class' => 'select2 d_c',
                                'style'=> "width: 210px;",
                                "id" => "ubi_fun"
                                ));
                                ?>
                                <span class="dc_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-4"><label>Ubicacion Nominal:</label> </div>
                              <div class="col-sm-8">
                                <?php
                                echo Phalcon\Tag::Select(array(
                                  'ubi_nom', 
                                  NbDireciones::find(array("order" => "id_direcciones ASC")),
                                  'using' => array('id_direcciones', 'denominacion'),
                                  'useEmpty' => true,
                                  'emptyText' => 'Seleccione',
                                  'emptyValue' => '',
                                  'class' => 'select2 d_c',
                                  'style'=> "width: 210px;",
                                  "id" => "ubi_nom"
                                  ));
                                  ?>
                                  <span class="dc_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                                </div>
                              </div>
                              <br />
                              <div id="dcMsj" class="alert alert-success hidden"><i class="ace-icon fa fa-check"></i>&nbsp;Se ha modificado exitosamente.</div>
                            </div>

                            <div id="d_profesionales" class="hide">
                              <div class="row">
                                <div class="col-sm-4"><label>Profesión:</label> </div>
                                <div class="col-sm-8">
                                  <?php
                                  echo Phalcon\Tag::Select(array(
                                    'profesion', 
                                    Profesiones::find(array("order" => "id_profesion ASC")),
                                    'using' => array('id_profesion', 'profesion'),
                                    'useEmpty' => true,
                                    'emptyText' => 'Seleccione',
                                    'emptyValue' => '',
                                    'class' => 'select2 d_pf',
                                    'style'=> "width: 210px;",
                                    "id" => "profesion"
                                    ));
                                    ?>   
                                    <span class="dc_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>        
                                  </div>                      
                                </div>
                                <div class="row">
                                  <div class="col-sm-4"><label>Nivel de Instrucción:</label> </div>
                                  <div class="col-sm-8">
                                    <?php
                                    echo Phalcon\Tag::Select(array(
                                      'nivel_instruc', 
                                      NivelInstruc::find(array("order" => "id_niveldinst ASC")),
                                      'using' => array('id_niveldinst', 'nivel_instruc'),
                                      'useEmpty' => true,
                                      'emptyText' => 'Seleccione',
                                      'emptyValue' => '',
                                      'class' => 'select2 d_pf',
                                      'style'=> "width: 210px;",
                                      "id" => "nivel_instruc"
                                      ));
                                      ?>  
                                      <span class="dc_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                                    </div>                              
                                  </div>
                                  <br />
                                  <div id="dpfMsj" class="alert alert-success hidden"><i class="ace-icon fa fa-check"></i>&nbsp;Se ha modificado exitosamente.</div>
                                </div>

                                <div id="d_financieros" class="hide">
                                  <div class="row">
                                    <div class="col-sm-4"><label>Banco:</label> </div>
                                    <div class="col-sm-8">
                                      <?php
                                      echo Phalcon\Tag::Select(array(
                                        'nb_bancos', 
                                        NbBancos::find(array("order" => "id_bancos ASC")),
                                        'using' => array('id_bancos', 'nb_bancos'),
                                        'useEmpty' => true,
                                        'emptyText' => 'Seleccione',
                                        'emptyValue' => '',
                                        'class' => 'select2 d_f',
                                        'style'=> "width: 210px",
                                        "id" => "nb_bancos"
                                        ));
                                        ?>
                                        <span class="df_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                                      </div> 
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><label>N° de Cuenta:</label> </div>
                                      <div class="col-sm-8"><input type="text" name="cta_nro" id="cta_nro" class=" d_f cta_nro" style = "width: 210px" placeholder="N° de 20 digitos" required value="<?php echo $dfinanc->n_cuenta; ?>"><span class="df_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-4"><label>Tipo de Cuenta:</label> </div>
                                      <div class="col-sm-8">
                                        <?php
                                        echo Phalcon\Tag::Select(array(
                                          'tipo_cuenta', 
                                          TipoCuent::find(array("order" => "id_tipocuent ASC")),
                                          'using' => array('id_tipocuent', 'tipo_cuenta'),
                                          'useEmpty' => true,
                                          'emptyText' => 'Seleccione',
                                          'emptyValue' => '',
                                          'class' => 'select2 d_f',
                                          'style'=> "width: 210px",
                                          "id" => "tipo_cuenta"
                                          ));
                                          ?>
                                          <span class="df_er hidden" style="color: red; font-size: 0.8em"> < REQUERIDO</span>
                                        </div> 
                                      </div>
                                      <br />
                                      <div id="dfMsj" class="alert alert-success hidden"><i class="ace-icon fa fa-check"></i>&nbsp;Se ha modificado exitosamente.</div>
                                    </div>

                                    <script type="text/javascript">
                                     jQuery(function($) {
                                       $('.date-picker').datepicker({
                                        changeMonth: true,
                                        changeYear: true
                                      })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                 $(this).prev().focus();
               });

// ------------------FORMATO DE TELEFONOS --------------------

$.mask.definitions['~']='[+-]';
$('#telf_hab').mask('(9999) 999-9999');
$.mask.definitions['~']='[+-]';
$('#telf_cel').mask('(9999) 999-9999');
$('#cta_nro').mask('99999999999999999999', {placeholder : " " });




jQuery.validator.addMethod("phone", function (value, element) {
  return this.optional(element) || /^\(\d{4}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
}, "Enter a valid phone number.");


            // ------------------FORMATO DE RIF --------------------
            $.mask.definitions['~']='[vV]';
            $('#rif').mask('~ 99999999 9', {autoclear : false, placeholder : ""});

            

        // ------------------VALIDACION DEL FORMULARIO --------------------
        $("#validation-form").validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          ignore: "",

          rules: {
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
            dir_hab: {
              required: true
            },
            edo_civil: {
              required: true
            },
            discapacidad: {
              required: true
            },
            estatus: {
              required: true
            },
            rif: {
              required: true
            }
          },

          messages: {
            correo_e: {
              required: "Ingrese un email valido.",
              email: "Ingrese un email valido."
            },
            rif: {
              required: "Ingrese un rif valido.",
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
                /*$('#avatar2').on('click', function(){
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
            </div>';*/


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

                </script>


