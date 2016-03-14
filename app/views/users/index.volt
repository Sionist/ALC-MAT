{{ javascript_include("js/bootstrap.js") }}
<div id="page-wrapper">

    <!-- Formulario para agregar  (insertar) -->
    <div class="row">
        <div class="col-xs-1">
            <?php echo $this->tag->linkTo(array("userrss/nuevo","class"=>"btn btn-app btn-primary btn-xs","<i class='ace-icon glyphicon glyphicon-user'></i>Nuevo")) ?>
        </div>
    </div>
    <?php  echo $this->flashSession->output(); ?>
    <!-- fin  Formulario para agregar estatus -->

    <!-- tabla para mostrar todos los registros de la tabla-->
    <hr>
    <div class="row">
        <div class="col-xs-12">

            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                Resultados para "Usuarios"
            </div>


            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">
                            N°
                        </th>
                        <th>Usuario</th>
                        <th>Nombre y Apellido</th>
                        <th>Email</th>
                        <th>Creado</th>
                        <th>Estatus</th>
                        <th class="center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $numerito=1;
                    foreach($users as $row) {
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

                            <td><span><?php echo $row->username; ?></span></td>
                            <td>
                                <span style="text-transform: capitalize;"><?php echo $row->nombre; ?></span>
                            </td>
                            <td>
                                <span><?php echo $row->email; ?></span>
                            </td>
                            <td>
                                <span style="text-transform: capitalize;"><?php echo $row->created_at; ?></span>
                            </td>
                            <td>
                                <span style="text-transform: capitalize;"><?php echo $row->estatus; ?></span>
                            </td>

                            <td>
                                <div class="hidden-sm hidden-xs action-buttons center">
                                <?php echo $this->tag->linkTo(array("userrss/usuario-permisos/".$row->id, "<i class='ace-icon fa fa-key'></i>"))  ?>
                                    <?php echo $this->tag->linkTo(array("userrss/editar/".$row->id, "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"))  ?>
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