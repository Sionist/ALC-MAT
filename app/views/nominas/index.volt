
{{ javascript_include("js/bootstrap.js") }}
<div id="page-wrapper">

    <!-- Formulario para agregar  (insertar) -->

    <a href="./nominas/nueva" title="Nueva Nomina" class="btn btn-app btn-primary btn-xs">
        <i class="ace-icon fa fa-folder bigger-160"></i>
        Nueva
    </a>

    <?php  echo $this->flashSession->output(); ?>
    <hr>

    <!-- fin  Formulario para agregar estatus -->

    <!-- tabla para mostrar todos los registros de la tabla-->
    <div class="row">
        <div class="col-xs-12">
            
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header center">
                <strong>NOMINAS EN PROCESO</strong>
            </div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">
                            N°
                        </th>
                        <th>Nomina</th>
                        <th>S.Q.M</th>
                        <th>Fecha</th>
                        <th>Inicia</th>
                        <th>Finaliza</th>
                        <th>Estatus</th>
                        <th>¿Aplicar Deducs?</th>
                        <th>¿Aplicar Deudas?</th>
                        <th>¿Aplicar Embargos?</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $numerito=1;
                    foreach($nominas as $row) {
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
                            
                            <td><span style="text-transform: capitalize;"><?php echo $row->nomina; ?></span></td>
                            <td><span style="text-transform: capitalize;"><?php echo $row->sqm; ?></span></td>
                            <td><span style="text-transform: capitalize;"><?php echo date("d-m-Y",strtotime($row->fecha)); ?></span></td> 
                            <td><span style="text-transform: capitalize;"><?php echo date("d-m-Y",strtotime($row->f_inicio)); ?></span></td>
                            <td><span style="text-transform: capitalize;"><?php echo date("d-m-Y",strtotime($row->f_final)); ?></span></td>
                            <td><span style="text-transform: capitalize;"><?php echo $row->estatus; ?></span></td> 
                            <td><span style="text-transform: capitalize;"><?php echo $row->deducs; ?></span></td>
                            <td><span style="text-transform: capitalize;"><?php echo $row->deudas; ?></span></td>
                            <td><span style="text-transform: capitalize;"><?php echo $row->embargos; ?></span></td>
                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <?php echo $this->tag->linkTo(array("asignaciones/editar/".$row->id_asignac, "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"))  ?>
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
<!--<div id="dialog-message" class="hide"></div>-->

<script type="text/javascript">
    jQuery(function($) {
      
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

    })
</script>