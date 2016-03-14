{{ javascript_include("js/bootstrap.js") }} 
<div id="page-wrapper">

{{ content() }}


<div class="row">
	<div class="col-xs-12">
										
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
			<div class="table-header">Resultados por "Tabuladores para Cláusulas de Convenciones Colectivas"</div>


				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>N°</th>
							<th>N° de Cláusula</th>
							<th>Cláusula</th>
							<th>Mínimo</th>
							<th>Máximo</th>
							<th>Tiempo</th>
							<th>Monto</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						<?php $numerito=1;
							foreach($clasificaciones as $row) {
						?>
						<tr>
							<td><?php echo $numerito; $numerito++; ?></td>
							<td><?php echo $row->nclausula; ?></td>
							<td><?php echo $row->clausula; ?></td>
							<td><?php echo $row->minimo; ?></td>
							<td><?php echo $row->maximo; ?></td>
							<td><?php echo $row->tiempo; ?></td>
							<td><?php echo $row->monto; ?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<?php echo $this->tag->linkTo(array("clasificaciones/editar/".$row->id_clasi, "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"))  ?>
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
