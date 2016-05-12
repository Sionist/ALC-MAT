<?php


include("conexion.php");

$conectar=conectar();


 $idcarga=$_GET[idcarga];


$sql=mysql_query("SELECT * FROM cargafamiliar WHERE id_carga='$idcarga'");
$filas=mysql_numrows($sql);


$cedula=mysql_result($sql, 0, nu_cedula).$idcarga;

$foto_e=mysql_result($sql, 0, foto_carga);


$web_image_folder = '../../public/empleados/fotos';
$exts = 'JPG';
$image_name = $cedula;
//echo $web_image_folder.'/'.$image_name.'.'.'JPG';




?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Subir o Actualizar Foto</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
	<style>
	.c1:focus {
	background-color : #FFFAC2;
      font-family:Verdana;
	 }
	.tabla {
	border: 1px dotted #000000;
      font-family:Verdana;
      font-size: 12px; 
      border:1px solid #ddd; border-radius:5px
	  }
      A {
	text-decoration:undeline;
	color:#336699;
	font-size: 11px; 
	font-family: tahoma;
      font-weight:900
      }
     A:hover{color:00CCFF;}
     
.sombra {text-shadow:#FFFFFF -1px 1px 0;padding:8px; font-size : 12px;}

.box{background:#fff;border-radius:5px;padding:5px}
.input-out{display:inline-block;background-color:#FFF;border-radius:4px;line-height:20px;min-height:20px;border:1px solid #B8B8B8;padding:4px}
select{font-size:13px}
.select{border:1px solid #989B9E;border-radius:4px;font-size:13px;padding:2px 4px}
input,textarea,select,.inputbox-sml{font-family:CuprumRegular, Arial, Helvetica, sans-serif;font-size:13px;outline:none}
.inputbox,textarea,.inputbox-sml,.inputbox2{border:1px solid #ccc;border-radius:5px;color:#666;background-color:#FFF;background-image:url(../images/inputbox.png);background-repeat:repeat-x;background-position:top;padding:8px 5px}
.inputbox2{background-color:#FFF;background-image:none;border:1px solid #999;border-radius:3px;padding:5px}
.inputbox-sml{padding:5px}
textarea{overflow:auto}
span.inputbox{display:inline-block;margin:0}
.inputbox:focus,textarea:focus{border:1px solid #aaa;background-color:#fff;background-image:none}
.inputbox.error{border:2px solid red;background-color:#FFF2F2;background-image:none}
.button,.button-alt,.button-sml,.button-alt-sml{border-radius:5px;background-color:#A3C5FF;border:1px solid #76A4D1;color:#003399;box-shadow:0 1px 3px 2px #ccc;background-image:url(imagenes/button.png);background-repeat:repeat-x;background-position:left top;cursor:pointer;text-shadow:1px 1px 1px rgba(0,0,0,.2);text-decoration:none;padding:6px 10px}
.button-sml,.button-alt-sml{border-radius:3px;font-size:12px;text-decoration:none;padding:2px 5px}
.button:hover,.button-sml:hover{background-position:left -30px;background-color:#FFFFFF;text-decoration:none}
.button-alt,.button-alt-sml{text-shadow:1px 1px 10px #fff;background-image:url(imagenes/button-alt.png);text-decoration:none;border:1px solid #AAA;color:#777}
.button-alt:hover,.button-alt-sml:hover{background-position:left -30px;text-decoration:none}
a.button-sml,a.button-alt-sml{padding:3px 6px}
a.button,a.button-alt{padding:7px 11px}
a.do-upload{background-image:url(imagenes/link.png);background-repeat:no-repeat;background-position:5px center;padding-left:25px;text-decoration:none;color:#444452;display:inline-block;padding-right:5px}
a.do-upload:hover{text-decoration:none}


.info{background-image:url(imagenes/info.png);background-repeat:no-repeat;background-position:5px 7px;background-color:#fff;border-radius:5px;border:1px solid #bbb;text-shadow:#fff 1px 1px 0;margin-bottom:10px;padding:5px 10px 5px 25px}

.info span{float:right}

.display,.forms{width:750px;border:1px solid #ddd; border-radius:5px}
.utility{width:100%;border:2px solid #C3C3C3;border-radius:8px;background-color: #F5F5F5;}
.display thead tr th,.forms thead tr th{font-size:15px;text-shadow:#fff 1px 1px 0;line-height:48px;height:48px;padding:0 8px}
.display tr td img,.forms tr td img{padding-right:2px;padding-left:2px}
.display tbody th.open{background-image:url(imagenes/th-bg2-open.png)}
.display tbody th.closed{background-image:url(imagenes/th-bg2-closed.png)}
.display tr td,.forms tr td{text-shadow:#fff -1px 1px 0;padding:8px}
.display tbody tr th,.forms tbody tr th{ text-shadow:#fff -1px 1px 0; text-align:left; font-weight:normal; background-image:url(imagenes/th-bg2.png); background-repeat:no-repeat; background-position:right top; padding:8px }
.display tfoot tr td,.forms tfoot tr td{background-image:url(imagenes/bg-fade.png);background-repeat:repeat-x;background-position:top;background-color:#FFF;border-radius:0 0 5px 5px;padding:8px 5px}
.display tbody tr td.red,.forms tbody tr td.red{ background-image:url(imagenes/td-bg-red.png); background-repeat: repeat-x; background-position: top; }
.display tbody tr td.green,.forms tbody tr td.green{ background-image:url(imagenes/td-bg-green.png); background-repeat: repeat-x; background-position: top; }
.display tfoot tr:hover{background:transparent}

.tip-yellowsimple{z-index:1000;text-align:left;border:1px solid #c7bf93;border-radius:4px;min-width:20px;max-width:auto;color:#000;text-shadow:1px 1px 1px #ddd;background-color:#fff9c9;padding:6px 8px}
.tip-yellowsimple .tip-inner{font-size:12px;line-height:1.2em}
.tip-yellowsimple .tip-arrow-top{margin-top:-6px;margin-left:-5px;top:0;left:50%;width:9px;height:6px;background:url(imagenes/tip-yellowsimple_arrows.gif) no-repeat}
.tip-yellowsimple .tip-arrow-right{margin-top:-4px;margin-left:0;top:50%;left:100%;width:6px;height:9px;background:url(imagenes/tip-yellowsimple_arrows.gif) no-repeat -9px 0}
.tip-yellowsimple .tip-arrow-bottom{margin-top:0;margin-left:-5px;top:100%;left:20px;width:9px;height:6px;background:url(imagenes/tip-yellowsimple_arrows.gif) no-repeat -18px 0}
.tip-yellowsimple .tip-arrow-left{margin-top:-4px;margin-left:-6px;top:50%;left:0;width:6px;height:9px;background:url(imagenes/tip-yellowsimple_arrows.gif) no-repeat -27px 0}

#captcha-code{width:80px;padding:6px 5px}
.captcha{background-color:#FFF;border:1px solid #ccc;display:inline-block;vertical-align:middle;border-radius:5px;-webkit-border-radius:5px;text-align:center;}





</style>
<script type="text/javascript" src="tooltip.js"></script>
<script type="text/javascript" language="Javascript">

function validar_datos()
{
	var F=document.formulario;
  	if(F.usuario.value=="")
 	{
	  alert("Falta ingresar USUARIO");
	  F.usuario.focus();
	  return false;
	}
  	if(F.clave_a.value=="")
 	{
	  alert("Falta ingresar CLAVE DE ACCESO ACTUAL");
	  F.clave_a.focus();
	  return false;
	}
  	if(F.clave_1.value=="")
 	{
	  alert("Falta ingresar CLAVE DE ACCESO NUEVA");
	  F.clave_1.focus();
	  return false;
	}
	if(F.clave_1.value!=F.clave_2.value)
 	{
	  alert("Discule, las claves no coinciden");
	  F.clave_1.focus();
	  F.clave_2.value="";
	  return false;
	}
	var r = confirm('¿Está seguro que desea Cambiar la Clave?');
	if (r)
	{
	  F.submit();
	}
}

var nav4 = window.Event ? true : false;
function numeros(evt)
{
   var key = nav4 ? evt.which : evt.keyCode;
   return (key <= 32 || (key >= 48 && key <= 59) || (key >= 44 && key <= 44 ));
}

</script>

	
</head>
<body>


  
<table align="center" class="tabla" width="500" cellpadding="2" >
<form action="#" method="post" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo mysql_result($sql, 0, id_carga)?>" />

    <tr>
      
    	<td colspan="2" align="center" bgcolor="#A3C5FF" class="sombra"><strong><font color="#003366">SUBIR / ACTUALIZAR FOTO</font></strong></td>

    </tr>

    <tr>
      <td colspan="2" align="center"><b>Foto Actual:</b></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
<div align="center"><img  name="miImagen" src="../../public/cargafamiliar/fotos/<?php if($foto_e<>' '){echo "$foto_e";}else{echo "sinfoto.gif";}?>" width="128" height="118" id="miImagen"/></div>





</td>
    </tr>

    <tr>
      <td align="right">Foto:</td>
      <td><input type="file" name="imagen"></td>
    </tr>
    
    <tr><td colspan="2" align="center">Extensiones Permitidas: <b>.jpg .png .bmp</b><br><br>Nombre de Archivo Sugerido:<font color=red><?php echo $cedula.".jpg"; ?></font></td></tr>
    <tr>
      <td colspan="2" align="center"><input class="button" type="submit" value="Subir Foto"/></td>

    </tr>
<tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
 </form>
<?php
       if(isset($_FILES['imagen'])){
       //configuracion
          $permitidas = array('jpg','jpeg','png','bmp'); //extensiones permitidas
          $size=2097152; //tamano maximo en bytes
	   $url="listado_personal.php"; //con / al final
          $carpeta="../../public/cargafamiliar/fotos/"; //carpeta de las imagenes
 
          $errores = array();
          $nombre = trim($_FILES['imagen']['name']);
          $ext = strtolower(end(explode('.',$nombre)));
          $tamano = $_FILES['imagen']['size'];
          $tmp = $_FILES['imagen']['tmp_name'];
          $urlimagen=$carpeta.$cedula.".".$ext;
	   $laimagen=$cedula.".".$ext;
		  
 
          if(in_array($ext,$permitidas) === false){
             $errores[] = 'Extension no permitida';
          }
          if($tamano>$size){
             $errores[] = 'El tamaño del archivo debe ser menor a 2mb';
          }
          if(empty($errores)){
             if(move_uploaded_file($tmp,$urlimagen)){
                


  $sql=mysql_query("UPDATE cargafamiliar SET foto_carga='$laimagen' WHERE id_carga='$_POST[id]'");
    

             ?>
                
                	<script type="text/javascript">
	  alert("Foto cargada con �xito!");
	  location.href=subir_foto.php?idcarga=<?php echo $_POST[id]; ?>';
	</script>
                
                
                <?php
             }
          }else{
             foreach($errores as $error){
                echo $error."<br />";
             }
          }
       }
?>



</table>





<center><a href="JavaScript:window.opener.location.reload(); window.close();">Cerrar Ventana</a></center>




<script type="text/javascript">
	document.formulario.cedula.focus();
</script>

</body>
</html>

