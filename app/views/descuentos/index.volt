    
        {{ javascript_include("js/bootstrap.js") }}
        {{ javascript_include("js/dataTables/jquery.dataTables.js") }}
        {{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}
        {{ javascript_include("js/dataTables/extensions/TableTools/js/dataTables.tableTools.js") }}
        {{ javascript_include("js/dataTables/extensions/ColVis/js/dataTables.colVis.js") }}
        {{ javascript_include("js/jquery.maskedinput.js") }}
<div id="page-wrapper">

<?php //echo "<div id='hola'>".$_SERVER[HTTP_REFERER]."</div>"; ?>
<!-- Formulario para agregar  (insertar) -->

{{ form("descuentos/guardar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}

 <?php echo $this->flashSession->output(); ?>
 
{{ text_field("descuento", "id":"desc", "class":"form-control", "required":"required", "placeholder":"Descuento") }}
{{ text_field("rif","id":"rif", "class":"form-control rif", "required":"required", "placeholder":"Rif") }}

{{ submit_button("Guardar", "id":"guardar", "class":"btn btn-primary") }}
{{ endForm() }}
{{ content() }}
<div id="msj" class='alert alert-block alert-danger hide'>Debe introducir un Rif valido. Letras permitidas: J,G,V</div>

<!-- fin  Formulario para agregar estatus -->

<!-- tabla para mostrar todos los registros de la tabla-->
 
				<div class="row">
                                    <div class="col-xs-12">
                                        
                                        <div class="clearfix">
                                            <div class="pull-right tableTools-container"></div>
                                        </div>
                                        <div class="table-header">
                                            Resultados para "Descuentos"
                                        </div>

                                      
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">
                                                N°
                                                </th>
                                                <th>Tipo de Cobro</th>
												<th>Rif</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $numerito=1;
                                            foreach($descuento as $row) {
                                            ?>
                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                    <?php 
                                                    echo $numerito;
                                                    $numerito++;
                                                    ?>
                                                    <span class="lbl"></span>
                                                    </label>
                                                </td>

                                                <td><span style="text-transform: capitalize;"><?php echo $row->descuento; ?></span></td>
												
												<td><span style="text-transform: capitalize;"><?php echo $row->rif; ?></span></td>
                                                        
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                    <?php echo $this->tag->linkTo(array("descuentos/editar/".$row->id_descuent, "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"))  ?>
                                                    </div>
                                                </td>
                                            </tr>
                                                <?php
                                                  }
                                                 ?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- fin tabla para mostrar todos los registros de la tabla-->

        <script type="text/javascript">
        
            jQuery(function($) {
                //oculta el msj success despues de 4 seg
                var time = setTimeout( function(){ $("#msj_success").slideUp(500); }, 4000 );
                $("#rif").val("");
                $("#desc").val("");
                
                //mascara de validacion para campo rif
                $.mask.definitions['~']='[vVjJgG]';
                $('.rif').mask('~-99999999-9');
                            
            /*  jquery del modal de edicion */
                $( ".id-btn-dialog1" ).on('click', function(e) {
                    e.preventDefault();
            
                    var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
                        modal: true,
                        title: "Editar ",
                        title_html: true,
                        buttons: [ 
                        {
                                text: "OK",
                                "class" : "btn btn-primary btn-minier",
                                click: function() {
                                    $( this ).dialog( "close" ); 
                                } 
                            }
                        ]
                    });
                });
            });
        </script>

