<div id="sidebar" class="sidebar                  responsive">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<ul class="nav nav-list">
		<li class="">
			<a href="#">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Menu</span>
			</a>

			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text">
					Trabajadores
				</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">

				<li class="">
					<a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/sistenomialc/trabajadores">
						<i class="menu-icon fa fa-caret-right"></i>
						Listar Trabajadores
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/sistenomialc/reposos">
						<i class="menu-icon fa fa-caret-right"></i>
						Reposos Trabajadores
					</a>

					<b class="arrow"></b>
				</li>


			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text"> Ejecucion Nomina </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<?php echo $this->tag->linkTo("nomina/variaciones-movimientos","<i class='menu-icon fa fa-caret-right'></i>Variaciones - Movimientos") ?>
					<b class="arrow"></b>
				</li>
			</ul>						
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Fideicomiso </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>


		</li>

		<li class="">
			<a href="widgets.html">
				<i class="menu-icon fa fa-list-alt"></i>
				<span class="menu-text"> Liquidaciones </span>
			</a>

			<b class="arrow"></b>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Catálogos </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<?php echo $this->tag->linkTo("asignaciones","<i class='menu-icon fa fa-caret-right'></i>Asignaciones") ?>
					<b class="arrow"></b>
				</li>

				<li class="">
					<?php echo $this->tag->linkTo("bancos","<i class='menu-icon fa fa-caret-right'></i>Bancos") ?>
					<b class="arrow"></b>
				</li>

				<li class="">

					<?php echo $this->tag->linkTo("cargos","<i class='menu-icon fa fa-caret-right'></i>Cargos") ?>

					<b class="arrow"></b>
				</li>

				<li class="">
					<?php echo $this->tag->linkTo("ciudades","<i class='menu-icon fa fa-caret-right'></i>Ciudades") ?>

					<b class="arrow"></b>
				</li>

				<li class="">
					<?php echo $this->tag->linkTo("clasificaciones","<i class='menu-icon fa fa-caret-right'></i>Clasificaciones") ?>

					<b class="arrow"></b>
				</li>

				<li class="">
					<?php echo $this->tag->linkTo("convencion-colectiva","<i class='menu-icon fa fa-caret-right'></i>Convención Colectiva") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("deducciones","<i class='menu-icon fa fa-caret-right'></i>Deducciones") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("descuentos","<i class='menu-icon fa fa-caret-right'></i>Descuentos") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("dias-bonificacion","<i class='menu-icon fa fa-caret-right'></i>Días de Bonificación Fin de Año") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("dias-prestaciones","<i class='menu-icon fa fa-caret-right'></i>Días Prestaciones") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("direcciones-alcaldia","<i class='menu-icon fa fa-caret-right'></i>Direcciones de Alcaldía") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("discapacidades","<i class='menu-icon fa fa-caret-right'></i>Discapacidades") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("estados","<i class='menu-icon fa fa-caret-right'></i>Estados") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("estatus","<i class='menu-icon fa fa-caret-right'></i>Estatus") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("fondos-embargos","<i class='menu-icon fa fa-caret-right'></i>Fondos para Embargo") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("frecuencias","<i class='menu-icon fa fa-caret-right'></i>Frecuencias") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("niveles-cargos","<i class='menu-icon fa fa-caret-right'></i>Niveles de Cargos") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("nivel-instruccion","<i class='menu-icon fa fa-caret-right'></i>Niveles de Instrucción") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("parentesco","<i class='menu-icon fa fa-caret-right'></i>Parentesco") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("profesiones","<i class='menu-icon fa fa-caret-right'></i>Profesiones") ?>
					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("tallas","<i class='menu-icon fa fa-caret-right'></i>Tallas") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("tasas-bcv","<i class='menu-icon fa fa-caret-right'></i>Tasas BCV") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("tipos-beneficios","<i class='menu-icon fa fa-caret-right'></i>Tipos de Beneficios") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("tipos-cobro","<i class='menu-icon fa fa-caret-right'></i>Tipos de Cobro") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("tipos-contrato","<i class='menu-icon fa fa-caret-right'></i>Tipos de Contratos") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
					<?php echo $this->tag->linkTo("tipos-cuentas","<i class='menu-icon fa fa-caret-right'></i>Tipos de Cuentas") ?>

					<b class="arrow"></b>
				</li>
				<li class="">
				<?php echo $this->tag->linkTo("tipos-nominas","<i class='menu-icon fa fa-caret-right'></i>Tipos de Nominas") ?>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>




	</ul><!-- /.nav-list -->

	<!-- #section:basics/sidebar.layout.minimize -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<!-- /section:basics/sidebar.layout.minimize -->
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
	<br>
	<br>
	<br>
	<br>
</div>
