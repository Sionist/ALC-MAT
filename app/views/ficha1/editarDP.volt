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
        <h4 class="center">Editar Datos Personales</h4>
      </div>
      <div class="widget-body">
        <div class="widget-main no-padding">
          <div class="dialogs clearfix">
            {{ form("ficha1/editadoDP", "method":"post", "autocomplete" : "off", "class":"form-horizontal", "enctype":"multipart/form-data" ) }}
            {{ hidden_field("nu_cedula")}}

            <div class="col-md-4 col-md-offset-1">

              <div class="form-group">
                <label for="nacionalidad">Nacionalidad:</label>
                <select size="1" name="nacionalidad" class="form-control">
                 <option value="V">Venezolano</option>
                 <option value="E">Extranjero</option>
               </select>
             </div>

             <div class="form-group">
              <label for="rif">Rif:</label>
              {{ text_field("rif", "class" : "form-control", "required":"required", "placeholder" : "Ejem: v(o V) 12345678 9" ) }}
            </div>


            <div class="form-group">
              <label for="nombre1">Primer Nombre:</label>
              {{ text_field("nombre1", "class" : "form-control", "required":"required") }}
            </div>


            <div class="form-group">
              <label for="nombre2">Segundo Nombre:</label>
              {{ text_field("nombre2", "class" : "form-control", "required":"required") }}
            </div>

            <div class="form-group">
              <label for="apellido1">Primer Apellido:</label>
              {{ text_field("apellido1", "class" : "form-control", "required":"required") }}
            </div>


            <div class="form-group">
              <label for="apellido2">Segundo Apellido:</label>
              {{ text_field("apellido2", "class" : "form-control", "required":"required") }}
            </div>


            <div class="form-group">
              <label>Genero:</label>
              <div class="row" style="margin-left: 2px;">
                <label class="line-height-1 blue">
                  <?php if($genero == "1"){ ?>
                  {{ radio_field("genero", "id" : "f", "size" : 30, "placeholder":"Genero", "value":"2", "class":"ace") }}
                  <span class="lbl"> Mujer</span>
                </label>
                <label class="line-height-1 blue">
                  {{ radio_field("genero", "id" : "f", "size" : 30, "placeholder":"Genero", "value":"1", "class":"ace", "checked" : "checked" ) }}
                  <span class="lbl"> Hombre</span>
                </label>
                <?php } else { ?>
                <label class="line-height-1 blue">
                  {{ radio_field("genero", "id" : "f", "size" : 30, "placeholder":"Genero", "value":"2", "class":"ace", "checked" : "checked") }}
                  <span class="lbl"> Mujer</span>
                </label>
                <label class="line-height-1 blue">
                  {{ radio_field("genero", "id" : "f", "size" : 30, "placeholder":"Genero", "value":"1", "class":"ace") }}
                  <span class="lbl"> Hombre</span>
                </label>
                <?php } ?>

              </div>
            </div>   


            <div class="form-group">
              <label for="lugar_nac">Lugar Nacimiento:</label>
              <?php
              echo Phalcon\Tag::Select(array(
                'lugar_nac', 
                Ciudades::find(array("order" => "ciudad ASC")),
                'using' => array('id_ciudad', 'ciudad'),
                'useEmpty' => true,
                'emptyText' => 'Seleccione',
                'class' => 'form-control',
                "id" => "lugar_nac"
                ));
                ?>
              </div>

              <div class="form-group">
                <label for="f_nac">Fecha Nacimiento:</label>
                <div class="input-group">
                  {{ text_field("f_nac", "class" : "date-picker form-control", "data-date-format" : "dd-mm-yyyy", "required":"required") }}
                  <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                  </span>
                </div>
              </div>

            </div><!-- termina col-md-2 -->
            <div class="col-md-offset-1 col-md-4">

              <div class="form-group">
                <label for="telf_hab">telf. Habitación:</label>
                {{ text_field("telf_hab", "class" : "form-control", "required":"required") }}
              </div>

              <div class="form-group">
                <label for="telf_cel">telf. Celular:</label>
                {{ text_field("telf_cel", "class" : "form-control", "required":"required") }}
              </div>

              <div class="form-group">
                <label for="dir_hab">Dirección de Habitación:</label>
                {{ text_field("dir_hab", "class" : "form-control", "required":"required") }}
              </div>


              <div class="form-group">
                <label for="correo">Correo:</label>
                {{ email_field("correo", "class" : "form-control", "required":"required") }}
              </div>


              <div class="form-group">
                <label for="edo_civil">Estado Civil:</label>
                <?php

                echo Phalcon\Tag::Select(array(
                  'edo_civil', 
                  EstadoCivil::find(array("order" => "id ASC")),
                  'using' => array('id', 'estado_civil'),
                  'useEmpty' => true,
                  'emptyText' => 'Seleccione',
                  'class' => 'form-control',
                  'id' => 'estado_civil'
                  ));
                  ?>  
                </div>


                <div class="form-group">
                  <label for="estatus">Estatus:</label>
                  <?php

                  echo Phalcon\Tag::Select(array(
                    'estatus', 
                    EstatusT::find(array("order" => "estatus ASC")),
                    'using' => array('id_estat', 'estatus'),
                    'useEmpty' => true,
                    'emptyText' => 'Ingrese un valor',
                    'emptyValue' => '',
                    'class' => 'form-control',
                    'id' => 'estatus'
                    ));
                    ?> 
                  </div>


                  <div class="form-group">
                    <label for="discapacidad">Discapacidad:</label>
                    <?php
                    echo Phalcon\Tag::Select(array(
                      'discapacidad', 
                      Discapacidad::find(array("order" => "id_discapacid ASC")),
                      'using' => array('id_discapacid', 'discapacidad'),
                      'useEmpty' => true,
                      'emptyText' => 'Ingrese un valor',
                      'emptyValue' => '',
                      'class' => 'form-control',
                      "id" => "discapacidad"
                      ));
                      ?>
                    </div>

                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input type="hidden" name="MAX_FILE_SIZE" value="2048000" />
                      <input name="imagen" id="imagen" type="file" />
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


         // ------------------FORMATO DE TELEFONOS --------------------

         $.mask.definitions['~']='[+-]';
         $('#telf_hab').mask('(9999) 999-9999');
         $.mask.definitions['~']='[+-]';
         $('#telf_cel').mask('(9999) 999-9999');
         $('#nu_cedula').mask('999999?99', {autoclear : false, placeholder : " "});


         jQuery.validator.addMethod("phone", function (value, element) {
          return this.optional(element) || /^\(\d{4}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
        }, "Enter a valid phone number.");


            // ------------------FORMATO DE RIF --------------------
            $.mask.definitions['~']='[vVjJgG]';
            $('#rif').mask('~-99999999-9', {autoclear : false, placeholder : " "});

            

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
            nu_cedula: {
              required: true,
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
      });
      </script>