{{ javascript_include("js/bootstrap.js") }}
<div class="row">
	<div class="col-xs-6 col-sm-offset-3" style="margin-top: 200px">
		<h1 class="header largest red center"><strong>ACCESO DENEGADO</strong></h1>
		<?php 
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if($url != $_SERVER["HTTP_REFERER"]){	
			echo $this->session->set("urlAnterior", $_SERVER["HTTP_REFERER"]);
		} 
	?>
	<div class="center"><a href = '<?php echo $this->session->get("urlAnterior"); ?>' class="red">&#60;&#60;&#32;&#32;Pulsa AQUÍ para volver a donde estabas&#32;&#32;&#62;&#62;</a></div>
	</div>
</div>