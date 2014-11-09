<?php

include "Conexion.php";


$conexion=new Conexion();
$conn=$conexion->conectar();

$var=$_GET['svalue'];      // el valor seleccionado del combo box padre
$target=$_GET['target'];   //el combo box que hay que cambiar


echo '<option value="">-----</option>';
if($target == "provincia"){
    
    $stid = oci_parse($conn, "SELECT NOMBRE_PROVINCIA FROM TBPROVINCIA,TBPAIS 
                                WHERE TBPROVINCIA.ID_PAIS = TBPAIS.ID_PAIS 
                                AND TBPAIS.NOMBRE_PAIS = :r "); 
    
    oci_bind_by_name($stid, ':r', $var);
    oci_execute($stid);
    
    while(($row = oci_fetch_array($stid, OCI_BOTH + OCI_RETURN_NULLS))!= false) {
        echo utf8_encode( '<option value="'.$row['NOMBRE_PROVINCIA'].'">' . $row['NOMBRE_PROVINCIA'] . "</option>");
    }
    
}else if($target=="canton"){
    $stid = oci_parse($conn, "SELECT NOMBRE_CANTON FROM TBCANTON,TBPROVINCIA
                                WHERE TBCANTON.ID_PROVINCIA = TBPROVINCIA.ID_PROVINCIA
                                AND TBPROVINCIA.NOMBRE_PROVINCIA = :r"); 
    oci_bind_by_name($stid, ':r', $var);
    oci_execute($stid);

    while(($row = oci_fetch_array($stid, OCI_BOTH + OCI_RETURN_NULLS))!= false) {
        echo utf8_encode('<option value="'.$row['NOMBRE_CANTON'].'">' . $row['NOMBRE_CANTON'] . "</option>");
    }
}else if($target=="distrito"){
    $stid = oci_parse($conn, "SELECT NOMBRE_DISTRITO FROM TBDISTRITO,TBCANTON 
                                WHERE TBDISTRITO.ID_CANTON = TBCANTON.ID_CANTON
                                AND TBCANTON.NOMBRE_CANTON = :r"); 
    oci_bind_by_name($stid, ':r', $var);
    oci_execute($stid);

    while(($row = oci_fetch_array($stid, OCI_BOTH + OCI_RETURN_NULLS))!= false) {
        echo utf8_encode('<option value="'.$row['NOMBRE_DISTRITO'].'">' . $row['NOMBRE_DISTRITO'] . "</option>");
    }
}



}else if($target=="raza"){  //modificar este select, falta agregar id_TipoMacota <FK> a tbRazaMascota
    $stid = oci_parse($conn, "SELECT NOMBRE_RAZA FROM TBRAZA,TBTIPOMASCOTA 
                                WHERE TBDISTRITO.ID_CANTON = TBCANTON.ID_CANTON
                                AND TBCANTON.NOMBRE_CANTON = :r"); 
    oci_bind_by_name($stid, ':r', $var);
    oci_execute($stid);

    while(($row = oci_fetch_array($stid, OCI_BOTH + OCI_RETURN_NULLS))!= false) {
        echo utf8_encode('<option value="'.$row['NOMBRE_RAZA'].'">' . $row['NOMBRE_RAZA'] . "</option>");
    }
}



oci_free_statement($stid);
oci_close($conn);
?>


