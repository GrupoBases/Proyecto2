<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/miPerfil.css" />
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/jquery.select.js"></script>
    </head>
       
    <body>
         <?php
            session_start();    //comprobamos si el usuario ya inicio sesion
            if (!array_key_exists('userName', $_SESSION)) {
                header('Location: login.php');
            }
             include 'Conexion.php';
        include 'funcionalidad.php';
        $conexion=new Conexion();
        $conn=$conexion->conectar();
        $user = $pass = $correo = $telefono = $nombre = $apellido1 = $apellido2 = $fecha = $pais = $provincia = $canton = $distrito =                   $direccion =""; //var datos
        $userError=$passError=$validacionError=$correoError=$telefonoError=$nombreError=$apellido1Error=$apellido2Error=$fechaError=                        $paisError =$provinciaError = $cantonError = $distritoError= $direccionError =""; //var errores
    
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['actualizar'])) {
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
                        $idUsuario =$_SESSION["id_user"];
                        $user = test_input($_POST["nombreUsuario"]); //si si esta verificarlo 
                        $pass = test_input($_POST["contraseña"]);    // si si esta verificarlo
                        $correo = test_input($_POST["correo"]); //si si esta verificarlo 
                        $telefono = test_input($_POST["teléfono"]); //si si esta verificarlo 
                        $nombre = test_input($_POST["nombre"]); //si si esta verificarlo 
                        $apellido1 = test_input($_POST["apellido1"]); //si si esta verificarlo 
                        $apellido2 = test_input($_POST["apellido2"]); //si si esta verificarlo 
                        $pais = test_input($_POST["pais"]); //si si esta verificarlo 
                        $provincia = test_input($_POST["provincia"]); //si si esta verificarlo 
                        $canton = test_input($_POST["canton"]); //si si esta verificarlo 
                        $distrito = test_input($_POST["distrito"]); //si si esta verificarlo 
                        $direccion = test_input($_POST["direccion"]); //si si esta verificarlo 
                        
                        $stid = oci_parse($conn, 'begin :m := insertarDireccion(:a,:b,:c,:d,:e); end;'); 
                        oci_bind_by_name($stid, ':a', $pais);
                        oci_bind_by_name($stid, ':b', $provincia);
                        oci_bind_by_name($stid, ':c', $canton);
                        oci_bind_by_name($stid, ':d', $distrito);
                        oci_bind_by_name($stid, ':e', $direccion);
                        oci_bind_by_name($stid, ':m', $idDireccion,40);
                        oci_execute($stid);
                        
                        $idDir = $idDireccion;
                        
                        $stid = oci_parse($conn, 'begin :i := updatePersonap(:p,:a,:b,:n,:e,:f,:g,:d,:c); end;'); 
                        oci_bind_by_name($stid, ':a', $user);
                        oci_bind_by_name($stid, ':p', $idUsuario);
                        oci_bind_by_name($stid, ':b', $pass);
                        oci_bind_by_name($stid, ':n', $idDir);
                        oci_bind_by_name($stid, ':e', $nombre);
                        oci_bind_by_name($stid, ':f', $apellido1);
                        oci_bind_by_name($stid, ':g', $apellido2);
                        oci_bind_by_name($stid, ':d', $telefono);
                        oci_bind_by_name($stid, ':c', $correo);
                        oci_bind_by_name($stid, ':i', $idUser);
                        oci_execute($stid);
                        
                         if($idUser == 1){    //si no retorna null pasar 
                            header('Location: index.php');       
                        }else{
                            $validacionError = "Hubo un error en el registro vuelva a registrarse";   
                        }
                          
                    }
        }
          else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if 
        ?>
        
        <div class="estructuraForm">
            <form name="miperfil_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">       
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor">            
                        
                        <span class="error"> <?php echo $validacionError;?></span>
                        <label for="NombreUsuario"> Nombre de usuario:</label>
                        <?php
                            $stid = oci_parse($conn, "SELECT NOMBREUSUARIO FROM TBUSUARIO where ID_USUARIO=".$_SESSION['id_user']); 
                            oci_execute($stid);
                            $row = oci_fetch_array($stid, OCI_BOTH);
                            echo "<input name=\"nombreUsuario\" type=\"text\" class=\"input username\" value='".$row['NOMBREUSUARIO']."'/>";                              
                        ?>  
                        <span class="error"> <?php echo $userError;?></span>
                        
                        

                        <label for="Contraseña"> Contraseña:</label>
                         <?php
                            $stid = oci_parse($conn, "SELECT CONTRASENA FROM TBUSUARIO where ID_USUARIO=".$_SESSION['id_user']); 
                            oci_execute($stid);
                            $row = oci_fetch_array($stid, OCI_BOTH);
                            echo "<input name=\"contraseña\" type=\"text\" class=\"input username\" value='".$row['CONTRASENA']."'/>";                              
                        ?>  
                        <span class="error"> <?php echo $passError;?></span>
                        
                        

                        <label for="Correo"> Correo:</label>
                        <?php
                            $stid = oci_parse($conn, "SELECT CORREO FROM TBPERSONA where ID_USUARIO=".$_SESSION['id_user']); 
                            oci_execute($stid);
                            $row = oci_fetch_array($stid, OCI_BOTH);
                            echo "<input name=\"correo\" type=\"text\" class=\"input username\" value='".$row['CORREO']."'/>";                              
                        ?>
                        <span class="error"> <?php echo $correoError;?></span>
                        
                        <label for="Teléfono"> Teléfono:</label>
                        <?php
                            $stid = oci_parse($conn, "SELECT TELEFONO FROM TBPERSONA where ID_USUARIO=".$_SESSION['id_user']); 
                            oci_execute($stid);
                            $row = oci_fetch_array($stid, OCI_BOTH);
                            echo "<input name=\"teléfono\" type=\"text\" class=\"input username\" value='".$row['TELEFONO']."'/>";                              
                        ?>
                        <span class="error"> <?php echo $telefonoError;?></span>

                        <label for="Nombre"> Nombre:</label>
                        <?php
                            $stid = oci_parse($conn, "SELECT NOMBREPERSONA FROM TBPERSONA where ID_USUARIO=".$_SESSION['id_user']); 
                            oci_execute($stid);
                            $row = oci_fetch_array($stid, OCI_BOTH);
                            echo "<input name=\"nombre\" type=\"text\" class=\"input username\" value='".$row['NOMBREPERSONA']."'/>";                              
                        ?>
                        <span class="error"> <?php echo $nombreError;?></span>

                        <label for="Apellido1"> Primer Apellido:</label>
                        <?php
                            $stid = oci_parse($conn, "SELECT PRIMERAPELLIDO FROM TBPERSONA where ID_USUARIO=".$_SESSION['id_user']); 
                            oci_execute($stid);
                            $row = oci_fetch_array($stid, OCI_BOTH);
                            echo "<input name=\"apellido1\" type=\"text\" class=\"input username\" value='".$row['PRIMERAPELLIDO']."'/>";                              
                        ?>
                       <span class="error"> <?php echo $apellido1Error;?></span>

                        <label for="Apellido2"> Segundo Apellido:</label>
                        <?php
                            $stid = oci_parse($conn, "SELECT SEGUNDOAPELLIDO FROM TBPERSONA where ID_USUARIO=".$_SESSION['id_user']); 
                            oci_execute($stid);
                            $row = oci_fetch_array($stid, OCI_BOTH);
                            echo "<input name=\"apellido2\" type=\"text\" class=\"input username\" value='".$row['SEGUNDOAPELLIDO']."'/>";                              
                        ?>
                        <span class="error"> <?php echo $apellido2Error;?></span>

                        <label for="FechaNacimiento"> Fecha de Nacimiento:</label>
                        <input type="date" id="fechaNacimiento" placeholder="Fecha de nacimiento">  
                        
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
                        
                        <label for="Dirección"> Dirección:</label>
                        <textarea name ="direccion" id="direccion" placeholder="Dirección"></textarea>

                        
                        
                        <input type="submit" name="actualizar"value="Actualizar">
                        <input type="submit" name="cancelar"value="Cancelar">  
                    </div>
            </form>  
        </div>
    </body>
</html>