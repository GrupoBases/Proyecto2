<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/registrarUsuario.css" />
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/jquery.select.js"></script>
        
        <link rel="stylesheet" type="text/css" href="fonts.css" />       
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="arriba.js"></script>
        
    </head>
       
    <body>
        
        
        <span class="irArriba icon-arrow-up"></span>

        <?php
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
                        oci_bind_by_name($stid, ':m', $idDireccion,40);
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
                    header('Location: login.php');  
                }
        
        ?>
        <div class="estructuraForm">
            <form name="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                  enctype="multipart/form-data">     
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor">
                        
                        <font color="white"> *Campo Obligatorio</font> 
                        
                        <h1 class="tagInfo"> Información del usuario <span class="triangulo"</span></h1>
                        
                        <span class="error"> <?php echo $validacionError;?></span>
                        
                        <label for="nombreUsuario"> * Nombre de usuario:</label>
                        <input type="text" name = "nombreUsuario"id="nombreUsuario" placeholder="Nombre Usuario">
                        <span class="error"> <?php echo $userError;?></span>
                        

                        <label for="Contraseña"> * Contraseña:</label>
                        <input type="password" name = " contraseña"id="contraseña" placeholder="Contraseña">
                        <span class="error"> <?php echo $passError;?></span>

                        <label for="Correo"> * Correo:</label>
                        <input type="email" name= "correo"id="correo" placeholder="Correo">
                        <span class="error"> <?php echo $correoError;?></span>
                        
                        <label for="Teléfono"> * Teléfono:</label>
                        <input type="text" name="teléfono"id="teléfono" placeholder="Teléfono">
                        <span class="error"> <?php echo $telefonoError;?></span>

                        <label for="Nombre"> * Nombre:</label>
                        <input type="text" name= "nombre"id="nombre" placeholder="Nombre">
                        <span class="error"> <?php echo $nombreError;?></span>

                        <label for="Apellido1"> * Primer Apellido:</label>
                        <input type="text" name = "apellido1"id="apellido1" placeholder="Primer Apellido">
                        <span class="error"> <?php echo $apellido1Error;?></span>

                        <label for="Apellido2"> * Segundo Apellido:</label>
                        <input type="text" name = "apellido2"id="apellido2" placeholder="Segundo Apellido">
                        <span class="error"> <?php echo $apellido2Error;?></span>

                        <label for="FechaNacimiento"> *Fecha de Nacimiento:</label>
                        <input type="date" name = "fechaNacimiento"id="fechaNacimiento" placeholder="Fecha de nacimiento">                   
                        <span class="error"> <?php echo $fechaError;?></span>
                        
                        <h1 class="tagMasInfo"> Más Información <span class="triangulo"</span></h1>
                        
                        <label for=""> Subir una foto:</label>
                        <input type="file" name="image" id="image">
                        
                        <label> * Direccion:</label>
                        
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
                        
                        
                        <label for="Dirección"> Dirección Exacta:</label>
                        <span class="error"> <?php echo $direccionError;?></span>
                        <textarea name = "direccion" id="dirección" placeholder="Dirección"></textarea>

                         <div class="footer">
                    
                        <input type="submit" name="register" value="Registrar" >
                        <input type="submit" name="cancelar" value="Cancelar" class="button">  
                </div>
                        
                    </div>
            </form>  
        </div>
    </body>
</html>
