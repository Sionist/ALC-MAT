{{ stylesheet_link("css/datepicker.css") }}
{{ javascript_include("js/bootstrap.js") }}
{{ javascript_include("js/date-time/bootstrap-datepicker.js") }}
{{ javascript_include("js/jquery.validate.js") }}
{{ javascript_include("js/jquery.maskedinput.js") }}

<div class="row">
  <h3 class="lighter blue center">Trabajador: <strong>"<?php echo $datos["nombre1"]." ".$datos["nombre2"]; ?>"</strong> Cedula: <strong>"<?php echo $datos["nu_cedula"]; ?>"</strong></h3>
  <hr> 
</div>
<div class=".container-fluid">
  <div class="col-md-9 col-md-offset-1">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="center">Editar Datos De Contratación</h4>
      </div>
      <div class="widget-body">
        <div class="widget-main no-padding">
          <div class="dialogs clearfix">
            {{ form("ficha1/editadoDC", "method":"post", "autocomplete" : "off", "class":"form-horizontal" ) }}
            {{ hidden_field("nu_cedula")}}

            <div class="col-md-4 col-md-offset-1">

              <div class="form-group">
                <label for="f_ing">Fecha de Ingreso:</label>
                <div class="input-group">
                  {{ text_field("f_ing", "class" : "date-picker form-control", "data-date-format" : "dd-mm-yyyy", "required":"required") }}
                  <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label for="f_nac">Fecha de Egreso:</label>
                <div class="input-group">
                  {{ text_field("f_egre", "class" : "date-picker form-control", "data-date-format" : "dd-mm-yyyy", "required":"required") }}
                  <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label for="tipo_nom">Tipo de Nomina:</label>
                <?php
                echo Phalcon\Tag::Select(array(
                  'tipo_nom', 
                  TipoNomi::find(array("order" => "id_nomina ASC")),
                  'using' => array('id_nomina', 'nomina'),
                  'useEmpty' => true,
                  'emptyText' => 'Seleccione',
                  'required' => 'required',
                  'class' => 'form-control',
                  "id" => "tipo_nom"
                  ));
                  ?>
                </div>

                <div class="form-group">
                  <label for="f_pago_liq">Fecha de Pago de Liquidación:</label>
                  <div class="input-group">
                    {{ text_field("f_pago_liq", "class" : "date-picker form-control", "data-date-format" : "dd-mm-yyyy", "required":"required") }}
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="liquidac">Liquidación</label>
                  {{ text_field("liquidac", "class" : "form-control", "required":"required") }}
                </div>

              </div><!-- termina col-md-2 -->
              <div class="col-md-offset-1 col-md-4">

                <div class="form-group">
                  <label for="lugar_nac">Cargo:</label>
                  <?php
                  echo Phalcon\Tag::Select(array(
                    't_cargo', 
                    Cargos::find(array("order" => "id_cargo ASC")),
                    'using' => array('id_cargo', 'cargo'),
                    'useEmpty' => true,
                    'emptyText' => 'Seleccione',
                    'required' => 'required',
                    'class' => 'form-control',
                    "id" => "t_cargo"
                    ));
                    ?>
                  </div>

                  <div class="form-group">
                    <label for="tipo_cont">Tipo de Contrato:</label>
                    <?php
                    echo Phalcon\Tag::Select(array(
                      'tipo_cont', 
                      TipoContrat::find(array("order" => "id_contrato ASC")),
                      'using' => array('id_contrato', 'contrato'),
                      'useEmpty' => true,
                      'emptyText' => 'Seleccione',
                      'required' => 'required',
                      'class' => 'form-control',
                      "id" => "tipo_cont"
                      ));
                      ?>
                    </div>

                    <div class="form-group">
                      <label for="ubi_nom">Ubicación Nominal:</label>
                      <?php
                      echo Phalcon\Tag::Select(array(
                        'ubi_nom', 
                        NbDireciones::find(array("order" => "id_direcciones ASC")),
                        'using' => array('id_direcciones', 'denominacion'),
                        'useEmpty' => true,
                        'emptyText' => 'Seleccione',
                        'required' => 'required',
                        'class' => 'form-control',
                        "id" => "ubi_nom"
                        ));
                        ?>
                      </div>

                      <div class="form-group">
                        <label for="ubi_fun">Ubicación Funcional:</label>
                        <?php
                        echo Phalcon\Tag::Select(array(
                          'ubi_fun', 
                          NbDireciones::find(array("order" => "id_direcciones ASC")),
                          'using' => array('id_direcciones', 'denominacion'),
                          'useEmpty' => true,
                          'emptyText' => 'Seleccione',
                          'required' => 'required',
                          'class' => 'form-control',
                          "id" => "ubi_fun"
                          ));
                          ?>
                        </div>

                      </div><!-- termina col-md-2 -->
                    </div>

                    <div class="form-actions center" style="margin-bottom: 0">
                      <input type="submit" value="Modificar" class="btn btn-primary">
                    </div>
                    {{ endForm() }}

                  </div>
                </div>
              </div><!-- fin widget-box -->
            </div>
          </div><!--fin container-fluid -->

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
        
      });
          </script>