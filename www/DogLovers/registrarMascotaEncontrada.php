<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/registrarMascotaEncontrada.css" />
        
        <link rel="stylesheet" type="text/css" href="css/principal.css" />
        <link rel="stylesheet" type="text/css" href="css/fonts.css" />
        
        <script src="js/jquery-2.1.1.js"></script>
        <script src="jquery.select.js"></script>
    </head>
       
    <body>
        
        
        
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

        $tipoMascotaError=$razaError=$colorError=$paisError=$provinciaError=$cantonError=$distritoError=$validacionError="";// var                       errores
        

        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) { //Si estamos recibiendo datos nuevos verificarlos
                    if(empty($_POST["tipoMascota"]) or empty($_POST["raza"]) or empty($_POST["color"]) or  empty($_POST["pais"]) or                                     empty($_POST["provincia"]) or empty($_POST["canton"]) or empty($_POST["distrito"])) {
                        
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

                        
                    $tipoMascota=$raza=$nombreMascota=$chip=$color=$notas=$pais=$provincia=$canton=$distrito=$direccion="";
                    } else {
                        $idMascota = -1;
                        $idDireccion = "";
                        $idDir ="";
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
                        $direcccion = test_input($_POST["direccion"]); //si si esta verificarlo 
                        
                        
                        
                        
                        $stid = oci_parse($conn, 'begin :m := insertarDireccion(:a,:b,:c,:d,:e); end;'); 
                        oci_bind_by_name($stid, ':a', $pais);
                        oci_bind_by_name($stid, ':b', $provincia);
                        oci_bind_by_name($stid, ':c', $canton);
                        oci_bind_by_name($stid, ':d', $distrito);
                        oci_bind_by_name($stid, ':e', $direccion);
                        oci_bind_by_name($stid, ':m', $idDireccion);
                        oci_execute($stid);
                        
                        $idDir = $idDireccion;
                        
                        $stid = oci_parse($conn, 'begin :i := insertarMascota(:a,:b,:n,:e,:f,:g,:d,:c); end;'); 
                        oci_bind_by_name($stid, ':a', $tipoMascota);
                        oci_bind_by_name($stid, ':b', $raza);
                        oci_bind_by_name($stid, ':e', $nombreMascota);
                        oci_bind_by_name($stid, ':f', $chip);
                        oci_bind_by_name($stid, ':g', $color);
                        oci_bind_by_name($stid, ':d', $notas);
                        oci_bind_by_name($stid, ':c', $correo);
                        oci_bind_by_name($stid, ':n', $idDir);
                        oci_bind_by_name($stid, ':i', $idMascota);
                        oci_execute($stid);
                        
                         if($idMascota != -1){    //si no retorna null pasar 
                            header('Location: index.php');       
                        }else{
                            $validacionError = "Hubo un error en el registro vuelva a registrarse";   
                        }
                          
                    } 
                }
        else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
                }
        
        ?>
        
        
        <div id="header">
                <ul class="nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="">Mascotas DogLovers</a>
                        <ul>
                            <li><a href="registrarMascotaPerdida.php">Perdí una mascota</a></li>
                            <li><a href="registrarMascotaEncontrada.php">Encontré una mascota</a></li>
                            <li><a href="">Buscar</a></li>
                            </li>
                        </ul>
                    </li>
                    <li><a href="misPublicaciones.php">Mis Publicaciones</a>
                    </li>
                    <li><a href="casaCuna.php">Casa Cuna</a></li>
                    <li><a href="adopciones.php">Adopciones</a></li>
                    <li><a href="">Mi Perfil</a></li>
                    <li><a href="">Donaciones</a></li>
                    <li><a href="">Contacto</a></li>
                </ul>
          
        </div>


        <div class="estructuraForm">
            <form name="registrarMascotaEncontrada_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                  enctype="multipart/form-data">      
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                       
                    <div class="contenedor">         
                        <label for="campo obligatorio"> *Campo Obligatorio:</label>
                        
                        <h1 class="tagInfoMascota"> Información de la mascota <span class="triangulo"</span></h1>
                        
                        <label for="Tipo de Mascota"> * Tipo de mascota:</label>
                        <select name="tipoMascota"  id="tipoMascota" onclick="modificarSelect('tipoMascota', 'raza')">
                            <option value=""> --elejir tipo mascota-- </option>
                            <?php
                                $stid = oci_parse($conn, 'SELECT NOMBRE_TIPO FROM TBTIPOMASCOTA'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['NOMBRE_TIPO'].'>' . $row['NOMBRE_TIPO'] . '</option>');
                                }
                            ?>
                            <span class="error"> <?php echo $tipoMascotaError;?></span>
                        </select>
                        
                       
                        <label for="Raza"> * Raza:</label>
                        <select id="raza" name="raza">
                            <option value=""> --elejir una raza-- </option>     
                            <span class="error"> <?php echo $razaError;?></span>
                        </select>
  
                        <label for="nombreMascota"> Nombre de la mascota:</label>
                        <input type="text" name="nombreMascota" id="nombreMascota" placeholder="Nombre Mascota">

                        <label for="Chip"> Chip de identificación:</label>
                        <input type="text" name="chip"  id="chip" placeholder="Chip de identificación">

                        <label for="Color"> * Color:</label>
                        <input type="text" name="color" id="color" placeholder="Color">
                        <span class="error"> <?php echo  $colorError;?></span>

                        <label for="notas"> Notas:</label>
                        <input type="text" name="notas" id="notas" placeholder="Notas">
                        
                        
                        <h1 class="tagMasInfo"> Más información <span class="triangulo"</span></h1>
                        
                        <label for="lugarPerdido"> * Lugar donde fué encontrado (a):</label>
                    
                       <label for="Pais"> Pais:</label>
                        <select name="pais"  id="pais" onclick="modificarSelect('pais', 'provincia')">
                        <option value="">-----</option> 
                            <?php
                                $stid = oci_parse($conn, 'SELECT NOMBRE_PAIS FROM TBPAIS'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['NOMBRE_PAIS'].'>' . $row['NOMBRE_PAIS'] . '</option>');
                                }
                            ?>  
                        <span class="error"> <?php echo $paisError;?></span>  
                        </select>
                        
                        
                        <label for="Provincia"> Provincia:</label>   
                        <select name="provincia"  id="provincia" onclick="modificarSelect('provincia', 'canton')">
                        <option value="">-----</option>
                            <span class="error"> <?php echo $provinciaError;?></span>
                        </select>
                        
                        <label for="Canton"> Canton:</label>    
                        <select name="canton"  id="canton" onclick="modificarSelect('canton', 'distrito')">
                        <option value="">-----</option> 
                            <span class="error"> <?php echo $cantonError;?></span>
                        </select>
                        
                        <label for="Distrito"> Distrito:</label> 
                        <select name="distrito"  id="distrito" >
                        <option value="">-----</option> 
                            <span class="error"> <?php echo $distritoError;?></span>
                        </select>
                        
                        
                        <label for="direccion">Dirección exacta:</label>
                        <textarea name="direccion" id="direccion" placeholder="direccion"></textarea>
                        
                        <label for="FechaExtravio"> Día en que fué Encontrado (a):</label>
                        <input type="date" name="fechaExtravio" id="fechaExtravio" placeholder="Fecha de encontrado">   
                        
  
                        <input type="submit" name="register" value="Registrar" >
                        <input type="submit" name="cancelar" value="Cancelar" class="button">
                    </div>
            </form>  
        </div>
    </body>
</html>