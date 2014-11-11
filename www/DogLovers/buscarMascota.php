 <!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/buscarMascota.css" />
        
        <link rel="stylesheet" type="text/css" href="fonts.css"/> 
	    <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="arriba.js"></script>
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/jquery.select.js"></script>
        
        
    </head>
       
    <body>
        <span class="irArriba icon-arrow-up"></span>
        
         <?php
            session_start();    //comprobamos si el usuario ya inicio secion
            if (!array_key_exists('userName', $_SESSION)) {
                header('Location: login.php');
            }
             include 'Conexion.php';
             include 'funcionalidad.php';
             $conexion=new Conexion();
             $conn=$conexion->conectar();
             $tipoMascota=$raza=$nombreMascota=$chip=$color=$notas=$pais=$provincia=$canton=$distrito=$direccion="";// var datos   

        $tipoMascotaError=$razaError=$colorError=$paisError=$provinciaError=$cantonError=$distritoError=$validacionError= $nombreMascotaError= $tamañoError =$lugarError="";// var errores
            
            $sqlEstado = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['filtrar'])) { //Si estamos recibiendo datos nuevos verificarlos           
                    if(!empty($_POST["estados"])) {
                    $sqlEstado = "select tbmascota.nombre,tbmascota.montorecompenza,tbestadomascota.estadomascota
                                    from tbestadomascota,tbmascota 
                                    where tbmascota.id_estadomascota = ".$_POST["estados"]." and tbestadomascota.id_estadomascota =                                                                                          ".$_POST["estados"]."";
                    } // if estados
                
                    if(!empty($_POST["tipoMascota"])) {
                      $sqlEstado = "select tbmascota.nombre,tbmascota.montorecompenza,tbestadomascota.estadomascota
                                    from tbtipomascota,tbmascota,tbestadomascota
                                    where tbmascota.id_tipomascota = ".$_POST["tipoMascota"]." 
                                    and tbtipomascota.id_tipomascota = ".$_POST["tipoMascota"]." 
                                    and tbestadomascota.id_estadomascota =                                                                                                                 tbmascota.id_estadomascota "; 
                    } // if tipomascota
                    
                    if(!empty($_POST["raza"])){
                    $sqlEstado ="select tbmascota.nombre,tbmascota.montorecompenza,tbestadomascota.estadomascota
                                from tbtipomascota,tbmascota,tbestadomascota,tbraza
                                where tbraza.id_raza = ".$_POST["raza"]." and tbmascota.id_raza = ".$_POST["raza"]." 
                                and tbtipomascota.id_tipomascota = tbmascota.id_tipomascota 
                                and tbestadomascota.id_estadomascota = tbmascota.id_estadomascota";
                    } // if raza
                    
                    if(!empty($_POST["color"])){
                    $sqlEstado ="select tbmascota.nombre,tbmascota.montorecompenza,tbestadomascota.estadomascota
                                from tbtipomascota,tbmascota,tbestadomascota
                                where tbtipomascota.id_tipomascota = tbmascota.id_tipomascota 
                                and tbestadomascota.id_estadomascota = tbmascota.id_estadomascota
                                and tbmascota.color = '".$_POST["color"]."' ";
                    } // if color
                    
                    if(!empty($_POST["chip"])){
                    $sqlEstado ="select tbmascota.nombre,tbmascota.montorecompenza,tbestadomascota.estadomascota
                                from tbtipomascota,tbmascota,tbestadomascota
                                where tbtipomascota.id_tipomascota = tbmascota.id_tipomascota 
                                and tbestadomascota.id_estadomascota = tbmascota.id_estadomascota
                                and tbmascota.chipidentificacion = '".$_POST["chip"]."'";
                    } // if color
                
                    else if(empty($_POST["estados"]) and empty($_POST["tipoMascota"]) and empty($_POST["raza"])
                       and empty($_POST["color"])){
                    $sqlEstado = "select tbmascota.nombre,tbmascota.montorecompenza,tbestadomascota.estadomascota
                                    from tbestadomascota,tbmascota
                                    where tbmascota.id_estadomascota = tbestadomascota.id_estadomascota ";    
                    }
                    
                    
                
            }
            else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if 
        ?>
        
        <div class="estructuraForm">
            <form name="buscarMascota_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">       
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor">   
                        
                        <h1 class="tagFiltros"> Filtros <span class="triangulo"</span></h1>
  
                        <label for="estados"> Estados:</label>
                        <select name= "estados" id="estados">
                            <option value=""> --estados-- </option>
                            <?php
                                $stid = oci_parse($conn, 'SELECT * FROM TBESTADOMASCOTA'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['ID_ESTADOMASCOTA'].'>' . $row['ESTADOMASCOTA'] . '</option>');
                                }
                            ?>
                        </select>     
                            
                        <label for="Tipo de Mascota"> * Tipo de mascota:</label> 
                        <select name="tipoMascota"  id="tipoMascota" onclick="modificarSelect('tipoMascota', 'raza')">
                            <option value="">-----</option>
                            <?php
                                $stid = oci_parse($conn, 'SELECT * FROM TBTIPOMASCOTA'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['ID_TIPOMASCOTA'].'>' . $row['NOMBRETIPOMASCOTA'] . '</option>');
                                }
                            ?>
                            
                            
                        </select>
                        <br>
                        <span class="error"> <?php echo $tipoMascotaError;?></span>
                        
                        <label for="Raza"> Raza:</label>
                        <select name= "raza" id="raza">
                            <option value=""> --elejir una raza-- </option>
                            <?php
                                $stid = oci_parse($conn, 'SELECT * FROM TBRAZA'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['ID_RAZA'].'>' . $row['NOMBRERAZA'] . '</option>');
                                }
                            ?>
                        </select>
                        
                        
                        
                        <label for="Color"> Color:</label>
                        <input type="text" name= "color" id="color" placeholder="Color">                        
                    
                        <label for="Chip"> Chip de identificación:</label>
                        <input type="text" name ="chip" id="chip" placeholder="Chip de identificación">                        
                        
                        <input type="submit" name = "filtrar" value="Filtrar">
                        <?php
                                if (!empty($sqlEstado)) {
                                    echo "<h1 class=\"tagResultado\"> Resultados <span class=\"triangulo\"</span></h1>";
                                $stid = oci_parse($conn, $sqlEstado); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    
                                    echo "<div id=\"resultados\">
                                    <p> NOMBRE:".$row['NOMBRE']."   <br>
                                    MONTO DE RECOMPENZA:".$row['MONTORECOMPENZA']."<br>
                                    ESTADO DE MASCOTA: ".$row['ESTADOMASCOTA']."</p> <br>
                            
                                    </div>";
                                    
                                    
                                }
                                }
                            ?>
                        
                        
                        
                        
                        <input type="submit" name = "cancelar" value="Cancelar">
                        
                    </div>
            </form>  
        </div>
    </body>
</html>