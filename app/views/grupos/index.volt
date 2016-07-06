 {{ javascript_include("js/bootstrap.js") }}
 <div id="page-wrapper">

    

    <div class="row">
        <div class="col-xs-2" ></div>
        <div class="col-xs-7">
        <?php  echo $this->flashSession->output(); ?>
           {{ form("grupos/crear", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
           <!-- <label for="nombre">Nombre</label> -->
           {{ text_field("nombre", "class":"form-control", "required":"required", "placeholder":"Nuevo Grupo") }}
           {{submit_button("Crear", "class":"btn btn-primary")}}
           {{ endForm() }}
           <hr>
           <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header">
            Resultados para "Grupos"
        </div>


        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="center">
                        N°
                    </th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $numerito=1;
                foreach($grupos as $row) {
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

                        <td><span style="text-transform: capitalize;"><?php echo $row->nombre; ?></span></td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons center">
                                <?php echo $this->tag->linkTo(array("grupos/".$row->id."/editar", "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"))  ?>
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