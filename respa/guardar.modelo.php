<?php

include("dbconnect.php");

$modelo = $_POST['modelo'];

$query = "INSERT INTO modelo (numero_modelo) values ('$modelo')";
$resultado = $DBcon->query($query);
if($resultado){

	echo "insercion exitosa";
} 
			else{

				echo "operacion  no exitosa";
			}
?>
