					
<script type="text/javascript">
	//try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
</script>
<?php 
$url = $_SERVER['REQUEST_URI'];

$b = explode("/", $url);

$bread = "";

echo "<ul class='breadcrumb'>";

$cont =  count($b);

echo $cont;

if(is_numeric(end($b)) == true ){
	/*array_pop($b);
	array_pop($b);*/
}

// for ($i=0; $i < $cont; $i++){
// 	$uri .= $bb."/";
// 	$a = "<li><a href= '".$uri."'>".$bb."</a></li>";
// 	$bread .= $a;
// }

foreach ($b as $bb) {
	$uri .= "/".$bb;
	$a = "<li><a href= '".$uri."'>".$bb."</a></li>";
	$bread .= $a;
}
//var_dump($b);

echo $bread;

echo "</ul>";
?>


<!-- <ul class="breadcrumb">

	{#
	<a href="{{ url(dispatcher.getModuleName()~'/index/index') }}">{{ dispatcher.getModuleName() }}</a>
	#}


	<li>  <a href="{{ url(dispatcher.getModuleName()~''~dispatcher.getControllerName()~'/index') }}"><span style="text-transform: capitalize;">{{ dispatcher.getControllerName() }}</span></a></li>
	<li>	&nbsp;<a href="{{ dispatcher.getActionName() }}"><span style="text-transform: capitalize;">{{ dispatcher.getActionName() }}</span></a> </li> 
</ul>
-->
