
        {{ javascript_include("js/bootstrap.js") }}
        {{ javascript_include("js/dataTables/jquery.dataTables.bootstrap.js") }}
<div id="page-wrapper">

<!-- Formulario para agregar  (insertar) -->

{{ form("variaciones/cargar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}

{{ content() }}

{{ text_field("cedula", "class":"form-control", "required":"required", "placeholder":"Cedula") }}

{{ submit_button("Buscar","id":"buscar", "class":"btn btn-primary") }}
{{ endForm() }}

{{ content() }}

<!-- fin  Formulario para agregar estatus -->

<!-- tabla para mostrar todos los registros de la tabla-->
 
				<div class="row">
                                    <div class="col-xs-5">
                                        
                                        <div class="clearfix">
                                            <div class="pull-right tableTools-container"></div>
                                        </div>
                                        <div class="table-header">
                                            Asignaciones relacionadas con "NOMBRE APELLIDO Y CEDULA"
                                        </div>

                                      
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                                <th class="center">Asignación</th>
                                                <th class="center">Campo</th>
                                            </tr>
                                        </thead>
                                        {{ form("variaciones/cargar", "method":"post", "autocomplete" : "off", "class":"form-inline") }}
                                        <tbody  id="asignacion"> 
                                            <tr>                                                                            
                                                <td class="center" >
                                                    <label class="pos-rel">
                                                   
                                                    <span class="lbl"></span>
                                                    </label>
                                                </td>
                                                <td class="center" id="campo">
                                                    <label class="pos-rel">
       
                                                    <span class="lbl"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            </tbody>
                                        {{ endForm() }}
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
                
                $("#buscar").click(function(e){
                    e.preventDefault();
                    var cedula = $("#cedula").val();
                    if(cedula != null){
                       $.post("./variaciones/buscar/", {"cedula": cedula},function(data){
                           
                           var asigs =JSON.parse(data);
                           
                           //alert(asigs);
                           
                           var tr = ""; 
                           
                           var formI = "<input type=\"text\" id=\"cedula\" name=\"cedula\" class=\"col-xs-4 center\" required=\"required\">";
                           alert(formI);
                           $("#asignacion").html(formI);
                           for(datos in asigs["asignaciones"]){
                                tr += "<tr><td style=\"text-transform: capitalize;\">"+asigs.asignaciones[datos].asignacion+"</td><td class=\"col-xs-3\">"+formI+"</td></tr>";
                           }
                           
                           $("#asignacion").html(tr);
                       
                       });
                    }
                    
                });
            
            /*  jquery del modal de edicion */
                /*$( ".id-btn-dialog1" ).on('click', function(e) {
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
            
                    /**
                    dialog.data( "uiDialog" )._title = function(title) {
                        title.html( this.options.title );
                    };
                    **/
                /*});*/
            
            
            
            
                
                
                //And for the first simple table, which doesn't have TableTools or dataTables
                //select/deselect all rows according to table header checkbox
               /* var active_class = 'active';
                $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
                    var th_checked = this.checked;//checkbox inside "TH" table header
                    
                    $(this).closest('table').find('tbody > tr').each(function(){
                        var row = this;
                        if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                        else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                    });
                });
                
                //select/deselect a row when the checkbox is checked/unchecked
                $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
                    var $row = $(this).closest('tr');
                    if(this.checked) $row.addClass(active_class);
                    else $row.removeClass(active_class);
                });*/
            
                
            
                /********************************/
                //add tooltip for small view action buttons in dropdown menu
               /* $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
                
                //tooltip placement on right or left
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('table')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();
            
                    var off2 = $source.offset();
                    //var w2 = $source.width();
            
                    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                    return 'left';
                }*/
            
            })
        </script>