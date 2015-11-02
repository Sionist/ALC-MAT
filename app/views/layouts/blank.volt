<?php
if (!$this->session->get('auth-identity')) {
          
           return $this->response->redirect('login');
       
       }
	   ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Alcaldía de Maturín - Sistema de Nómina</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		
		<!-- bootstrap & fontawesome -->
		{{ stylesheet_link("css/bootstrap.css") }}
		{{ stylesheet_link("css/font-awesome.css") }}

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		{{ stylesheet_link("css/ace-fonts.css") }}

		<!-- ace styles -->
		{{ stylesheet_link("css/ace.css") }}
		{{ stylesheet_link("css/jquery-ui.css") }}
		{{ stylesheet_link("css/jquery.gritter") }}
		

		<!--[if lte IE 9]>
			{{ stylesheet_link("css/ace-part2.css") }}
		<![endif]-->

		<!--[if lte IE 9]>
		  {{ stylesheet_link("css/ace-ie.css") }}
		<![endif]-->

		<!-- inline styles related to this page -->
		{{ javascript_include("js/jquery.js") }}
		{{ javascript_include("js/bootstrap.js") }}
		
		<!-- ace settings handler -->
		{{ javascript_include("js/ace-extra.js") }}

		<!-- page specific plugin scripts -->
		{{ javascript_include("js/jquery-ui.js") }}
		{{ javascript_include("js/jquery.ui.touch-punch.js") }}
		
		{{ javascript_include("js/jquery-ui.custom.js") }}
		{{ javascript_include("js/jquery.ui.touch-punch.js") }}
		{{ javascript_include("js/jquery.easypiechart.js") }}
		{{ javascript_include("js/jquery.sparkline.js") }}
		{{ javascript_include("js/flot/jquery.flot.js") }}
		{{ javascript_include("js/flot/jquery.flot.pie.js") }}
		{{ javascript_include("js/flot/jquery.flot.resize.js") }}
		{{ javascript_include("js/jquery.gritter.js") }}
		{{ javascript_include("js/spin.js") }}
		{{ javascript_include("js/bootbox.js") }}

		<!-- ace scripts -->
		{{ javascript_include("js/ace/elements.scroller.js") }}
		{{ javascript_include("js/ace/elements.colorpicker.js") }}
		{{ javascript_include("js/ace/elements.fileinput.js") }}
		{{ javascript_include("js/ace/elements.typeahead.js") }}
		{{ javascript_include("js/ace/elements.wysiwyg.js") }}
		{{ javascript_include("js/ace/elements.spinner.js") }}
		{{ javascript_include("js/ace/elements.treeview.js") }}
		{{ javascript_include("js/ace/elements.wizard.js") }}
		{{ javascript_include("js/ace/elements.aside.js") }}
		{{ javascript_include("js/ace/ace.js") }}
		{{ javascript_include("js/ace/ace.ajax-content.js") }}
		{{ javascript_include("js/ace/ace.touch-drag.js") }}
		{{ javascript_include("js/ace/ace.sidebar.js") }}
		{{ javascript_include("js/ace/ace.sidebar-scroll-1.js") }}
		{{ javascript_include("js/ace/ace.submenu-hover.js") }}
		{{ javascript_include("js/ace/ace.widget-box.js") }}
		{{ javascript_include("js/ace/ace.settings.js") }}
		{{ javascript_include("js/ace/ace.settings-rtl.js") }}
		{{ javascript_include("js/ace/ace.settings-skin.js") }}
		{{ javascript_include("js/ace/ace.widget-on-reload.js") }}
		{{ javascript_include("js/ace/ace.searchbox-autocomplete.js") }}
		
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Menu Móvil</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						
						 {{ image("img/logo.png") }}
						
					<!--	
						<small>
							<i class="fa fa-leaf"></i>
							Sistema de Nómina
						</small>
						-->
						
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>
				

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					
					<ul class="nav ace-nav">
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								{{ image("avatars/avatar2.png") }}
								<span class="user-info">
									<small>Bienvenido,</small>
									<?php echo $this->session->get('auth-identity')['usu-username']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Configuraciones
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Perfil de Usuairo
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="http://<?php echo $_SERVER['HTTP_HOST']; echo dirname($_SERVER['PHP_SELF']);?>/login/salir">
										<i class="ace-icon fa fa-power-off"></i>
										Salir del Sistema
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<!-- aqui va el menu -->
            {% include "partials/menu.volt" %}
			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
                    <div class="breadcrumbs" id="breadcrumbs">
						
					<!--breadcrumb aqui	-->
					
					<!-- {% include "partials/breadcrumb.volt" %} -->
					
					<!--breadcrumb aqui fin	-->
					</div>
                     
					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						

						<!-- /section:settings.box -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                              {{ content() }}
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
			<div class="footer-inner">
            <!-- aqui va el footer -->
			{% include "partials/footer.volt" %}
			</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
	<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
{{ javascript_include("js/bootstrap.js") }}

</html>
