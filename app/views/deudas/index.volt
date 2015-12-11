<div class="col-xs-12">
<div class="row">	
	<?php echo $this->tag->linkTo(array("deudas/nueva/".$cedula, "class" => "btn btn-primary", 
	"<i class='glyphicon glyphicon-usd'></i>&nbsp;Nueva Deuda</div>"))
	?>	
	<hr>
</div>

<div class="row"><div class="col-xs-12"><?php $this->flashSession->output(); ?></div></div>
	
<div class="row">
	<div class="col-md-12">
	<div class="table-header">
		<?php foreach ($dt as $dtt) { 
			echo "Trabajador:  <strong>".$dtt->nombre1." ".$dtt->apellido1."</strong> - Cedula:  <strong>".$dtt->nu_cedula."</strong>";
		}
		?>
	</div>
		
		<table class="table table-striped table-bordered table-hover no-footer">
			<thead>
				<th class='center'>N°</th>
				<th class='center'>Descuento</th>
				<th class='center'>Monto Inicial</th>
				<th class='center'>Cuotas</th>
				<th class='center'>Frecuencia</th>
				<th class='center'>Saldo</th>
				<th class='center'>Fecha de Compromiso</th>
				<th class="center">Acción</th>
			</thead>
			<tbody>
			<?php 
				$cont = 1; 
				foreach ($deudas as $d) { 
			?>
			<?php

				$fecha = new DateTime($d->f_compromiso);
				echo "<tr><td class='center'>".$cont."</td>";
				 
					echo "<td class='center'>".$d->descuento."</td><td class='center'>".
						$d->monto_inicial."</td><td class='center'>".
						$d->cuotas."</td><td class='center'>".$d->frecuencia."</td><td  class='center'>".
						$d->saldo."</td><td class='center'>".
						$fecha->format("d-m-Y")."</td>"; 
						$cont++;
				?>
			<td class='center'>
				<div class="hidden-sm hidden-xs action-buttons center">
                    <?php echo $this->tag->linkTo(array("deudas/editar/".$d->id_deuda, "<i class='ace-icon fa fa-pencil-square-o bigger-110'></i>"))  ?>
                </div>
            </td>
            <?php echo "</tr>"; } ?>
			</tbody>
		</table>
		 
	</div>
</div>
</div>
{{ javascript_include("js/jquery.maskMoney.js") }}