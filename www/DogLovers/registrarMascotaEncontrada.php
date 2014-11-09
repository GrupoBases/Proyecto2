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
        <script src="js/jquery.select.js"></script>
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
         
    
        $user = $pass = $correo = $telefono = $nombre = $apellido1 = $apellido2 = $fecha = $pais = $provincia = $canton = $distrito =                   $direccion =""; //var datos
        $userError=$passError=$validacionError=$correoError=$telefonoError=$nombreError=$apellido1Error=$apellido2Error=$fechaError=                        $paisError =$provinciaError = $cantonError = $distritoError= $direccionError =""; //var errores


        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) { //Si estamos recibiendo datos nuevos verificarlos
                    if(empty($_POST["nombreUsuario"]) or empty($_POST["contraseña"]) or empty($_POST["correo"]) or empty($_POST["teléfono"]) 
                      or empty($_POST["nombre"]) or empty($_POST["apellido1"]) or empty($_POST["apellido2"])
                      or empty($_POST["pais"]) or empty($_POST["provincia"]) or empty($_POST["canton"]) or empty($_POST["distrito"]) ) {
                       
                        if(empty($_POST["nombreUsuario"])){
                            $userError = "*Nombre de Usuario requerido";  //si el username no se encuentra mostrar error
                        }
                        if (empty($_POST["contraseña"])) {
                            $passError = "*Contraseña requerida"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["correo"])) {
                            $correoError = "*Correo requerido"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["teléfono"])) {
                            $telefonoError = "*Teléfono requerido"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["nombre"])) {
                            $nombreError = "*Nombre requerido"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["apellido1"])) {
                            $apellido1Error = "*Apellido requerido"; //si la pass no se encuentra mostrar error
                        }
                        if (empty($_POST["apellido2"])) {
                            $apellido2Error = "*Apellido requerido"; //si la pass no se encuentra mostrar error
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
                        

                    } else {
                        $idUser = -1;
                        $idDireccion = "";
                        $idDir ="";
                        $user = test_input($_POST["nombreUsuario"]); //si si esta verificarlo 
                        $pass = test_input($_POST["contraseña"]);    // si si esta verificarlo
                        $correo = test_input($_POST["correo"]); //si si esta verificarlo 
                        $telefono = test_input($_POST["teléfono"]); //si si esta verificarlo 
                        $nombre = test_input($_POST["nombre"]); //si si esta verificarlo 
                        $apellido1 = test_input($_POST["apellido1"]); //si si esta verificarlo 
                        $apellido2 = test_input($_POST["apellido2"]); //si si esta verificarlo 
                        $fecha = test_input($_POST["fechaNacimiento"]); //si si esta verificarlo 
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
                        
                        $stid = oci_parse($conn, 'begin :i := insertarUsuario(:a,:b,:n,:e,:f,:g,:d,:c); end;'); 
                        oci_bind_by_name($stid, ':a', $user);
                        oci_bind_by_name($stid, ':b', $pass);
                        oci_bind_by_name($stid, ':n', $idDir);
                        oci_bind_by_name($stid, ':e', $nombre);
                        oci_bind_by_name($stid, ':f', $apellido1);
                        oci_bind_by_name($stid, ':g', $apellido2);
                        oci_bind_by_name($stid, ':d', $telefono);
                        oci_bind_by_name($stid, ':c', $correo);
                        oci_bind_by_name($stid, ':i', $idUser);
                        oci_execute($stid);
                        
                         if($idUser != -1){    //si no retorna null pasar 
                            header('Location: login.php');       
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
                        </select>
                        
                        
                        
                        
                        <label for="Raza"> * Raza:</label>
                        <select id="raza">
                            <option value=""> --elejir una raza-- </option>      
                        </select>

                        <label for="nombreMascota"> Nombre de la mascota:</label>
                        <input type="text" name="nombreMascota" id="nombreMascota" placeholder="Nombre Mascota">

                        <label for="Chip"> Chip de identificación:</label>
                        <input type="text" name="chip"  id="chip" placeholder="Chip de identificación">

                        <label for="Color"> * Color:</label>
                        <input type="text" name="color" id="color" placeholder="Color">

                        <label for="notas"> Notas:</label>
                        <input type="text" name="notas" id="notas" placeholder="Notas">
                        
                        
                        <h1 class="tagMasInfo"> Más información <span class="triangulo"</span></h1>
                        
                        <label for="lugarPerdido"> * Lugar donde fué encontrado (a):</label>
                        
                        <label for="pais"> País:</label>
                            <select id="pais">
                            <option value=""> --país-- </option>
                        </select>
                        
                        <label for="provincia"> Provincia:</label>
                            <select id="provincia">
                            <option value=""> --provincia-- </option>
                        </select>
                        
                        <label for="canton"> Cantón:</label>
                            <select id="canton">
                            <option value=""> --cantón-- </option>
                        </select>
                        
                        <label for="distrito"> Distrito:</label>
                            <select id="ditrito">
                            <option value=""> --distrito-- </option>
                        </select>
                        
                        <label for="descripciones"> Descripciones:</label>
                        <textarea id="descripciones" placeholder="Descripciones"></textarea>
                        
                        <label for="FechaExtravio"> Día en que fué Encontrado (a):</label>
                        <input type="date" id="fechaExtravío" placeholder="Fecha de encontrado">   
                        
  
                        <input type="submit" name="register" value="Registrar" >
                        <input type="submit" name="cancelar" value="Cancelar" class="button">
                    </div>
            </form>  
        </div>
    </body>
</html>