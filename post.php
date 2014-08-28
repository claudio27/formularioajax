<?php

if(isset($_POST["nombre"]) && isset($_POST["clave"]))
{
	
	$nombre = $_POST["nombre"];
	$clave = $_POST["clave"];



	echo "Su nombre y clave son <strong>$nombre, $clave </strong> respectivamente";

	
}


// var_dump(isset()) --> tipo de dato
?>