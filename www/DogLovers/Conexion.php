
<?php


class Conexion{

	var $conn;
	//conectarse con la base
	public function conectar(){
		global $conn;
		$conn = oci_connect('Proyecto2', 'Proyecto2', 'localhost:1521/Prueba'); //('usuario', 'contrasenia', 'localhost:1521/NombreBase')
		if (!$conn) {
			$m = oci_error();
			echo $m['message'], "\n";
			exit;
		}
		return $conn;
	}

	public function desconectar(){
		global $conn;
		oci_close($conn);
	}
}


