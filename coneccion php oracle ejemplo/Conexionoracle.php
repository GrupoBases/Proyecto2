<?php
$user="Proyecto";
$pass="Proyecto";
$host="localhost:1521/dbprueba";

$baseDatos="Proyecto";

//conectarse con la base

$conn = oci_connect($user, $pass, $host); //('usuario', 'contrasenia', 'localhost:1521/NombreBase')
if (!$conn) {
	$m = oci_error();
	echo $m['message'], "\n";
	exit;
}
?>


