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
    </head>
       
    <body>
        <?php
        include 'Conexion.php';
        include 'funcionalidad.php';
        $conexion=new Conexion();
        $conn=$conexion->conectar();
         
    
        $user = $pass = $correo = $telefono = $nombre = $apellido1 = $apellido2 = $fecha =""; //variables para pasar datos
        $userError=$passError=$validacionError=$correoError=$telefonoError=$nombreError=$apellido1Error=$apellido2Error=$fechaError=""; //var errores

        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) { //Si estamos recibiendo datos nuevos verificarlos
                    if(empty($_POST["nombreUsuario"]) or empty($_POST["contraseña"]) ) {
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
                        if (empty($_POST["fechaNacimiento"])) {
                            $fechaError = "*Fecha de nacimiento requerida"; //si la pass no se encuentra mostrar error
                        }

                    } else {
                        $idUser = "";
                        $user = test_input($_POST["nombreUsuario"]); //si si esta verificarlo 
                        $pass = test_input($_POST["contraseña"]);    // si si esta verificarlo
                        $correo = test_input($_POST["correo"]); //si si esta verificarlo 
                        $telefono = test_input($_POST["teléfono"]); //si si esta verificarlo 
                        $nombre = test_input($_POST["nombre"]); //si si esta verificarlo 
                        $apellido1 = test_input($_POST["apellido1"]); //si si esta verificarlo 
                        $apellido2 = test_input($_POST["apellido2"]); //si si esta verificarlo 
                        $fecha = test_input($_POST["fechaNacimiento"]); //si si esta verificarlo 
                        
                        $stid = oci_parse($conn, 'begin :i := insertarDireccion(:a,:b,:idponer,:e,:f,:g,:d,:c,:h); end;'); 
                        oci_bind_by_name($stid, ':a', $user);
                        oci_bind_by_name($stid, ':b', $pass);
                        oci_bind_by_name($stid, ':c', $correo);
                        oci_bind_by_name($stid, ':d', $telefono);
                        oci_bind_by_name($stid, ':e', $nombre);
                        oci_bind_by_name($stid, ':f', $apellido1);
                        oci_bind_by_name($stid, ':g', $apellido2);
                        oci_bind_by_name($stid, ':h', $fecha);
                        oci_bind_by_name($stid, ':i', $idUser);
                        oci_execute($stid);
                        
                         if(!empty($idUser)){    //si no retorna null pasar 
                            header('Location: login.php');       
                        }else{
                            $validacionError = "Hubo un error en el registro vuelva a registrarse";   
                        }
                          
                    } //else principal 
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
                        <p>*Campos Requeridos</p>
                        <span class="error"> <?php echo $validacionError;?></span>
                        
                        <label for="nombreUsuario"> *Nombre de usuario:</label>
                        <input type="text" id="nombreUsuario" placeholder="Nombre Usuario">
                        <span class="error"> <?php echo $userError;?></span>
                        

                        <label for="Contraseña"> *Contraseña:</label>
                        <input type="password" id="contraseña" placeholder="Contraseña">
                        <span class="error"> <?php echo $passError;?></span>

                        <label for="Correo"> *Correo:</label>
                        <input type="email" id="correo" placeholder="Correo">
                        <span class="error"> <?php echo $correoError;?></span>
                        
                        <label for="Teléfono"> *Teléfono:</label>
                        <input type="text" id="teléfono" placeholder="Teléfono">
                        <span class="error"> <?php echo $telefonoError;?></span>

                        <label for="Nombre"> *Nombre:</label>
                        <input type="text" id="nombre" placeholder="Nombre">
                        <span class="error"> <?php echo $nombreError;?></span>

                        <label for="Apellido1"> *Primer Apellido:</label>
                        <input type="text" id="apellido1" placeholder="Primer Apellido">
                        <span class="error"> <?php echo $apellido1Error;?></span>

                        <label for="Apellido2"> *Segundo Apellido:</label>
                        <input type="text" id="apellido2" placeholder="Segundo Apellido">
                        <span class="error"> <?php echo $apellido2Error;?></span>

                        <label for="FechaNacimiento"> *Fecha de Nacimiento:</label>
                        <input type="date" id="fechaNacimiento" placeholder="Fecha de nacimiento">                   
                        <span class="error"> <?php echo $fechaError;?></span>
                        
                        <label> *Direccion:</label>
                        
                        
                        <label for="Pais"> Pais:</label>
                        <select name="pais"  id="pais" onclick="modificarSelect('pais', 'provincia')">
                            <?php
                                $stid = oci_parse($conn, 'SELECT * FROM autor'); // Cambair este select por uno que seleccione los nombres de                                                                                       los paises
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo '<option value='.$row['AUTOR_NAME'].'>' . $row['AUTOR_NAME'] . '</option>';
                                }
                            ?>  
                        </select>
                        
                        
                        <label for="Provincia"> Provincia:</label>   
                        <select name="provincia"  id="provincia" onclick="modificarSelect('provincia', 'canton')">
                            <option value="">-----</option>   
                        </select>
                        
                        <label for="Canton"> Canton:</label>    
                        <select name="canton"  id="canton" onclick="modificarSelect('canton', 'distrito')">
                            <option value="">-----</option>  
                        </select>
                        
                        <label for="Distrito"> Distrito:</label> 
                        <select name="distrito"  id="distrito" >
                            <option value="">-----</option>
                        </select>
                        
                        
                        <label for="Dirección"> Dirección Exacta:</label>
                        <textarea id="dirección" placeholder="Dirección"></textarea>

                         <div class="footer">
                    
                        <input type="submit" name="register" value="Registrar" >
                        <input type="submit" name="cancelar" value="Cancelar" class="button">  
                </div>
                        
                    </div>
            </form>  
        </div>
    </body>
</html>
