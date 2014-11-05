<?php
include 'Conexion.php';

$conexion=new Conexion();
$conn=$conexion->conectar();

$stid = oci_parse($conn, 'SELECT * FROM Articulo');
oci_execute($stid);

$stid = oci_parse($conn, 'SELECT * FROM Articulo');
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
    }
    echo "</tr>\n";
}
oci_free_statement($stid);

$conexion->desconectar();

?>

