<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/registrarMascotaPerdida.css" />
        
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/jquery.select.js"></script>
    
        <link rel="stylesheet" type="text/css" href="fonts.css" />       
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="arriba.js"></script>

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
            
            $tipoMascota=$raza=$tamano=$nombreMascota=$chip=$color=$notas=$pais=$provincia=$canton=$distrito=$direccion="";// var datos   

            $tipoMascotaError=$razaError=$colorError=$paisError=$provinciaError=$cantonError=$distritoError=$validacionError=    $nombreMascotaError= $tamañoError =$lugarError="";// var errores
            
            if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['register']) { //Si estamos recibiendo datos nuevos verificarlos
                    if(empty($_POST["tipoMascota"]) or empty($_POST["raza"]) or empty($_POST["color"]) or  empty($_POST["pais"]) or empty($_POST["provincia"]) or empty($_POST["canton"]) or empty($_POST["distrito"]) or empty($_POST["tamaño"])) {
                        
                        if(empty($_POST["tipoMascota"])){
                            $tipoMascotaError = "*Tipo de mascota requerido";  //si el username no se encuentra mostrar error
                        }
                        if (empty($_POST["raza"])) {
                            $razaError = "*Raza de mascota requerida"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["color"])) {
                            $colorError = "*Color de mascota requerido"; //si la pass no se encuentra mostrar error
                        }            
                        if (empty($_POST["pais"])) {
                            $paisError = "Pais requerido"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["provincia"])) {
                            $provinciaError = "*Provincia requerida"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["canton"])) {
                            $cantonError = "*Canton requerido"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["distrito"])) {
                            $distritoError = "*Distrito requerido"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["tamaño"])) {
                            $tamañoError = "*Tamaño requerido"; //si la pass no se encuentra mostrar error
                        }
                        

                    } // if pequeno 
                    else {
                        $idMascota = -1;
                        $idDireccion = "";
                        $idDir = "";
                        $idUsuario =$_SESSION["id_user"];
                        $tamano = test_input($_POST["tamaño"]);    // si si esta verificarlo 
                        $tipoMascota = test_input($_POST["tipoMascota"]); //si si esta verificarlo 
                        $raza = test_input($_POST["raza"]);    // si si esta verificarlo
                        $nombreMascota = test_input($_POST["nombreMascota"]); //si si esta verificarlo 
                        $chip = test_input($_POST["chip"]); //si si esta verificarlo 
                        $color = test_input($_POST["color"]); //si si esta verificarlo 
                        $notas = test_input($_POST["notas"]); //si si esta verificarlo 
                        $pais = test_input($_POST["pais"]); //si si esta verificarlo 
                        $provincia = test_input($_POST["provincia"]); //si si esta verificarlo 
                        $canton = test_input($_POST["canton"]); //si si esta verificarlo 
                        $distrito = test_input($_POST["distrito"]); //si si esta verificarlo 
                        $direccion = test_input($_POST["direccion"]); //si si esta verificarlo 
                        $recompenza = test_input($_POST["recompenza"]); //si si esta verificarlo 
                        
                        $stid = oci_parse($conn, 'begin :m := insertarDireccion(:a,:b,:c,:d,:e); end;'); 
                        oci_bind_by_name($stid, ':a', $pais);
                        oci_bind_by_name($stid, ':b', $provincia);
                        oci_bind_by_name($stid, ':c', $canton);
                        oci_bind_by_name($stid, ':d', $distrito);
                        oci_bind_by_name($stid, ':e', $direccion);
                        oci_bind_by_name($stid, ':m', $idDireccion,40);
                        oci_execute($stid);
                        
                        $idDir = $idDireccion;
                        
                        $estado = 2;
                        $stid = oci_parse($conn, 'begin :j := insertarMascota(:a,:b,:c,:x,:i,:q,:d,:e,:f,:w,:g); end;'); 
                        oci_bind_by_name($stid, ':a', $idUsuario);
                        oci_bind_by_name($stid, ':b', $tipoMascota);
                        oci_bind_by_name($stid, ':c', $raza);
                        oci_bind_by_name($stid, ':x', $tamano);
                        oci_bind_by_name($stid, ':q', $estado);
                        oci_bind_by_name($stid, ':d', $nombreMascota);
                        oci_bind_by_name($stid, ':e', $chip);
                        oci_bind_by_name($stid, ':f', $color);
                        oci_bind_by_name($stid, ':g', $notas);
                        oci_bind_by_name($stid, ':i', $idDir);
                        oci_bind_by_name($stid, ':w', $recompenza);
                        oci_bind_by_name($stid, ':j', $idMascota);
                        oci_execute($stid);
                        
                         if($idMascota != -1){    //si no retorna null pasar 
                            header('Location: index.php');
                             
                        }else{
                            $validacionError = "Hubo un error en el registro vuelva a registrarse";   
                        }
                          
                        }  // primer else
            } // primer if o principal 
            else if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['cancelar']) {
                        header('Location: index.php');  
            } // else if 

        ?>
        
        <div class="estructuraForm">
            <form name="registrarMascotaPerdoda_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">       
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor">         
                        <label for="campo obligatorio"> *Campo Obligatorio:</label>
                        
                        <h1 class="tagInfoMascota"> Información de la mascota <span class="triangulo"</span></h1>
                        
                         <span class="error"> <?php echo $validacionError;?></span>
                        
                        <label for="Tipo de Mascota"> * Tipo de mascota:</label> 
                        <select name="tipoMascota"  id="tipoMascota" onclick="modificarSelect('tipoMascota', 'raza')">
                            <option value="">-----</option>
                            <?php
                                $stid = oci_parse($conn, 'SELECT NOMBRETIPOMASCOTA FROM TBTIPOMASCOTA'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['NOMBRETIPOMASCOTA'].'>'. $row['NOMBRETIPOMASCOTA'].'</option>');
                                }
                            ?>
                            
                            
                        </select>
                        <br>
                        <span class="error"> <?php echo $tipoMascotaError;?></span>
                        
                        
                         <label for="Raza"> * Raza:</label>
                        <select name = "raza" id="raza">
                            <option value="">-----</option> 
                           
                        </select>
                        <br>
                        <span class="error"> <?php echo $razaError;?></span>
                        
                        
                        
                        <label for="Tamaño"> *Tamaño:</label>
                            <select name="tamaño"  id="tamaño"> 
                                <option value="">-----</option> 
                            <?php
                                $stid = oci_parse($conn, 'SELECT NOMBRETAMANO FROM TBTAMANOMASCOTA'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['NOMBRETAMANO'].'>' . $row['NOMBRETAMANO'] . '</option>');
                                }
                            ?>  
                        
                        </select>
                        <br>
                        <span class="error"> <?php echo $tamañoError;?></span> 

                        <label for="nombreMascota"> *Nombre de la mascota:</label>
                        <input type="text" name = "nombreMascota"id="nombreMascota" placeholder="Nombre Mascota">
                        <br>
                        <span class="error"> <?php echo $nombreMascotaError;?></span>

                        <label for="Chip"> Chip de identificación:</label>
                        <input type="text" name = "chip" id="chip" placeholder="Chip de identificación">

                        <label for="Color"> * Color:</label>
                        <input type="text" name = "color" id="color" placeholder="Color">
                        <br>
                        <span class="error"> <?php echo $colorError;?></span>
                        
                        <label for="Recompenza">Monto de recompenza:</label>
                        <input type="text" name = "recompenza" id="recompenza" placeholder="Recompenza">

                        <label for="notas"> Notas:</label>
                        <input type="text" name = "notas" id="notas" placeholder="Notas">
                        
                        
                        <h1 class="tagMasInfo"> Más información <span class="triangulo"</span></h1>
                        
                        <label for=""> Subir una foto:</label>
                        <input type="file" name="image" id="image">
                        
                        <label for="lugarPerdido"> * Lugar donde fué encontrado (a):</label>
                        <br>
                        <span class="error"> <?php echo $lugarError;?></span>
                        
                        
                        <label for="pais"> País:</label>
                            <select name="pais"  id="pais" onclick="modificarSelect('pais', 'provincia')">
                            <option value="">-----</option> 
                            <?php
                                $stid = oci_parse($conn, 'SELECT NOMBRE_PAIS FROM TBPAIS'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['NOMBRE_PAIS'].'>' . $row['NOMBRE_PAIS'] . '</option>');
                                }
                            ?>  
                        </select>
                        <br>
                        <span class="error"> <?php echo $paisError;?></span> 
                        
                        
                        
                        
                        <label for="provincia"> Provincia:</label>
                            <select name ="provincia"id="provincia" onclick="modificarSelect('provincia', 'canton')">>
                            <option value="">-----</option>
                        </select>
                        <br>
                        <span class="error"> <?php echo $provinciaError;?></span>
                        
                        
                        <label for="canton"> Cantón:</label>
                            <select name= "canton"id="canton" onclick="modificarSelect('canton', 'distrito')">
                            <option value="">-----</option> 
                        </select>
                        <br>
                        <span class="error"> <?php echo $cantonError;?></span>
                        
                        
                        <label for="distrito"> Distrito:</label>
                            <select name = "distrito" id="distrito">
                            <option value="">-----</option> 
                        </select>
                        <br>
                        <span class="error"> <?php echo $distritoError;?></span>
                        
                        <label for="Dirección"> Dirección Exacta:</label>
                        <textarea name = "direccion" id="direccion" placeholder="Dirección"></textarea>
                        
                        
                        <label for="FechaExtravio"> Fecha de Extravío:</label>
                        <input type="date" id="fechaExtravío" placeholder="Fecha de extravío">   
                        
                        <input type="submit" id="cancelar" name = "register" value="Registrar">
                        <input type="submit" id="cancelar" name = "cancelar" value="Cancelar"> 
                    </div>
            </form>  
        </div>
    </body>
</html>
