<?php

include "../Conexion.php";


$conexion=new Conexion();
$conn=$conexion->conectar();

$var=$_GET['svalue'];      // el valor seleccionado del combo box padre
$target=$_GET['target'];   //el combo box que hay que cambiar

echo '<option value="'.$_GET['svalue'].'">' .$_GET['svalue']. "</option>";
if($target=="provincia"){
    $stid = oci_parse($conn, "SELECT NOMBRE_PROVINCIA FROM TBPROVINCIA,TBPAIS 
                                WHERE TBPROVINCIA.ID_PAIS = TBPAIS.ID_PAIS 
                                AND TBPAIS.NOMBRE_PAIS = :r "); 
    
    oci_bind_by_name($stid, ':r', $var);
    oci_execute($stid);

    while(($row = oci_fetch_array($stid, OCI_BOTH + OCI_RETURN_NULLS))!= false) {
        echo '<option value="'.$row['NOMBRE_PROVINCIA'].'">' . $row['NOMBRE_PROVINCIA'] . "</option>";
    }
}


else if($target=="canton"){

    $stid = oci_parse($conn, 'SELECT * FROM autor '); 
    oci_bind_by_name($stid, ':r', $var);
    oci_execute($stid);

    while(($row = oci_fetch_array($stid, OCI_BOTH + OCI_RETURN_NULLS))!= false) {
        echo '<option value="'.$row['AUTOR_ID'].'">' . $row['AUTOR_ID'] . "</option>";
    }
}


else if($target=="distrito"){

    $stid = oci_parse($conn, 'SELECT * FROM autor '); 
    oci_bind_by_name($stid, ':r', $var);
    oci_execute($stid);

    while(($row = oci_fetch_array($stid, OCI_BOTH + OCI_RETURN_NULLS))!= false) {
        echo '<option value="'.$row['AUTOR_ID'].'">' . $row['AUTOR_ID'] . "</option>";
    }
}




oci_free_statement($stid);
oci_close($conn);
?>


