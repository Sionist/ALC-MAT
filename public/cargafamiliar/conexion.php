<?php
     
     function conectar()
     {
     $host="localhost";
     $port="3306";
     $user_bd="root";
     $pass_user="Maturinmysql2013";
     $db="db1_nomi";
     $conn=mysql_connect("$host","$user_bd", "$pass_user");
     mysql_query("SET NAMES 'utf8'");
     mysql_select_db($db,$conn);
     
     return $conn;
     }
	function conex()
	{	if (!$c=mysql_connect("localhost","root","1234"))
		{	//no se puede conectar al servidor
			echo "error 1: no se puede conectar al servidor"; 	
			exit();
		}
		if (!mysql_select_db("db1_nomi",$c))
		{	// no se puede seleccionar la base de datos
			echo "error 2: no se puede seleccionar la base de datos";
			exit();
		}
		return $c;		
	}


	 function desconectar()
	 {
	 mysql_close();
	 }
?>
