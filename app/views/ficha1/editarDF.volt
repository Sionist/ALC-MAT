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
  <div class="col-md-4 col-md-offset-4">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="center">Editar Datos Financieros</h4>
      </div>
      <div class="widget-body">
        <div class="widget-main no-padding">
          <div class="dialogs clearfix">
            {{ form("ficha1/editadoDF", "method":"post", "autocomplete" : "off", "class":"form-horizontal" ) }}
            {{ hidden_field("nu_cedula")}}

            <div class="col-md-10 col-md-offset-1">

              <div class="form-group">
                <label for="cod_banco">Banco:</label>
                <?php
                echo Phalcon\Tag::Select(array(
                  'cod_banco', 
                  NbBancos::find(array("order" => "id_bancos ASC")),
                  'using' => array('id_bancos', 'nb_bancos'),
                  'useEmpty' => true,
                  'emptyText' => 'Seleccione',
                  'required' => 'required',
                  'class' => 'form-control',
                  "id" => "cod_banco"
                  ));
                  ?>
                </div>


                <div class="form-group">
                  <label for="num_cta">Numero de Cuenta:</label>
                  {{ text_field("num_cta", "class" : "form-control", "id" : "cta_nro", "required":"required", "placeholder" : "debe contener 20 digitos" ) }}
                </div>

                <div class="form-group">
                  <label for="tipo_cuenta">Tipo de Cuenta:</label>
                  <?php
                  echo Phalcon\Tag::Select(array(
                    'tipo_cuenta', 
                    TipoCuent::find(array("order" => "id_tipocuent ASC")),
                    'using' => array('id_tipocuent', 'tipo_cuenta'),
                    'useEmpty' => true,
                    'emptyText' => 'Seleccione',
                    'required' => 'required',
                    'class' => 'form-control',
                    "id" => "tipo_cuenta"
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
    $.mask.definitions['~']='[+-]';
    $('#cta_nro').mask('99999999999999999999', {placeholder : " " });
  });
</script>
