
        {{ javascript_include("js/bootstrap.js") }}
        {{ javascript_include("js/dataTables/jquery.dataTables.js") }}
        {{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}
        {{ javascript_include("js/dataTables/extensions/TableTools/js/dataTables.tableTools.js") }}
        {{ javascript_include("js/dataTables/extensions/ColVis/js/dataTables.colVis.js") }}

        {{ javascript_include("js/jquery.maskedinput.js") }}
<div id="page-wrapper">

<!-- Formulario para agregar  (insertar) -->

{{ form("dias-bonificacion/guardar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}

<?php echo $this->flashSession->output(); ?>
    
<label for="desde">Mes Desde:  </label>     
<select id="desde" name="desde">
<?php
    for($i=1; $i <= 12; $i++){
        echo "<option value=".$i.">".$i."</option>";
    }
    ?>    
</select>
    
<label for="hasta">Mes Hasta:  </label>    
<select id="hasta" name="hasta">
<?php
    for($i=1; $i <= 12; $i++){
        echo "<option value=".$i.">".$i."</option>";
    }
    ?>    
</select>
 
<label for="dias">Dias:  </label>  
<select id="dias" name="dias">
<?php
    for($i=1; $i <= 100; $i++){
        echo "<option value=".$i.">".$i."</option>";
    }
    ?>    
</select>

{{ submit_button("Guardar", "class":"btn btn-primary") }}
{{ endForm() }}

<!-- fin  Formulario para agregar discapacidad -->

<!-- tabla para mostrar todos los registros de la tabla-->
 
<div class="row">
                                    <div class="col-xs-12">
                                        
                                        <div class="clearfix">
                                            <div class="pull-right tableTools-container"></div>
                                        </div>
                                        <div class="table-header">
                                            Resultados para "Días de Bonificación de fin de año"
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">
                                                N°
                                                </th>
                                                <th>Desde</th>
												<th>Hasta</th>
												<th>Dias de Bonificación</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
												$numerito=1;
												foreach($diasb as $row) {
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

                                                <td><span style="text-transform: capitalize;"><?php echo $row->mes_desde; ?></span></td>
												<td><span style="text-transform: capitalize;"><?php echo $row->mes_hasta; ?></span></td>
												<td><span style="text-transform: capitalize;"><?php echo $row->dias_bonificacion; ?></span></td>
                                                        
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                    <?php echo $this->tag->linkTo(array("dias-bonificacion/editar/".$row->id_diasbonificacion, "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"))  ?>
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

    <!-- modal -->
    <div id="dialog-message" class="hide"></div>

        
        
    

        