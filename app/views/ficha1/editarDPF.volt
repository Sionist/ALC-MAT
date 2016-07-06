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
        <h4 class="center">Editar Datos Profesionales</h4>
      </div>
      <div class="widget-body">
        <div class="widget-main no-padding">
          <div class="dialogs clearfix">
            {{ form("ficha1/editadoDPF", "method":"post", "autocomplete" : "off", "class":"form-horizontal" ) }}
            {{ hidden_field("nu_cedula")}}

            <div class="col-md-10 col-md-offset-1">

              <div class="form-group">
                <label for="nive_instr">Nivel de Instrucción:</label>
                <?php
                echo Phalcon\Tag::Select(array(
                  'nive_instr', 
                  NivelInstruc::find(array("order" => "id_niveldinst ASC")),
                  'using' => array('id_niveldinst', 'nivel_instruc'),
                  'useEmpty' => true,
                  'emptyText' => 'Seleccione',
                  'required' => 'required',
                  'class' => 'form-control',
                  "id" => "nive_instr"
                  ));
                  ?>
                </div>

                <div class="form-group">
                <label for="profesion">Profesión:</label>
                <?php
                echo Phalcon\Tag::Select(array(
                  'profesion', 
                  Profesiones::find(array("order" => "id_profesion ASC")),
                  'using' => array('id_profesion', 'profesion'),
                  'useEmpty' => true,
                  'emptyText' => 'Seleccione',
                  'required' => 'required',
                  'class' => 'form-control',
                  "id" => "profesion"
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

 