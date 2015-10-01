<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<link href="img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
        <title>Sistema de Nómina - Alcaldía de Maturín</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		{{ stylesheet_link("css/bootstrap.css") }}
		{{ stylesheet_link("css/font-awesome.css") }}

		<!-- text fonts -->
		{{ stylesheet_link("css/ace-fonts.css") }}

		<!-- ace styles -->
		{{ stylesheet_link("css/ace.css") }}

		<!--[if lte IE 9]>
			{{ stylesheet_link("css/ace-part2.css") }}
		<![endif]-->
		{{ stylesheet_link("css/ace-rtl.css") }}

		<!--[if lte IE 9]>
		  {{ stylesheet_link("css/ace-ie.css") }}
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		{{ javascript_include("js/html5shiv.js") }}
		{{ javascript_include("js/respond.js") }}
		<![endif]-->
	</head>

	<body class="login-layout">
		
			<!-- PAGE CONTENT BEGINS -->
                        

						{{ content() }}
							  
							  
							  
							  
							  
								<!-- PAGE CONTENT ENDS -->

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

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
