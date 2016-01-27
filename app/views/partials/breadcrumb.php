					
<!--<script type="text/javascript"> -->
<!--try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}-->
<!--</script>-->
<?php 

$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if(substr($url, -1) == "/"){
	$url= substr($url,0, -1);		
}

$b = explode("/", $url);
$cont =  count($b);

if($cont > 3){
//$bread = "";

//echo "<ul class='breadcrumb'>";

	$uri = "";

	if(is_numeric(end($b)) == true){
		array_pop($b);
		array_pop($b);

	}else{
		array_pop($b);
	}

	$cont =  count($b);

	for ($i=1; $i <= $cont; $i++){
		$uri .= "/".$b[$i];
	}

	if(substr($uri, -1) == "/"){
		$uri = substr($uri,0, -1);		
	}

	$a = "<a href='".$uri."' title='Volver' style='position: absolute; right: 30px'><img src='http://".$_SERVER[HTTP_HOST]."/sistenomialc/img/btn-volver.png'></a>";
	//echo $uri;
	echo $a;

//echo "</ul>";
}
?>


<!-- <ul class="breadcrumb">

	{#
	<a href="{{ url(dispatcher.getModuleName()~'/index/index') }}">{{ dispatcher.getModuleName() }}</a>
	#}


	<li>  <a href="{{ url(dispatcher.getModuleName()~''~dispatcher.getControllerName()~'/index') }}"><span style="text-transform: capitalize;">{{ dispatcher.getControllerName() }}</span></a></li>
	<li>	&nbsp;<a href="{{ dispatcher.getActionName() }}"><span style="text-transform: capitalize;">{{ dispatcher.getActionName() }}</span></a> </li> 
</ul>
-->
