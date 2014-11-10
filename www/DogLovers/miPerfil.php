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
    
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['actualizar'])) {
            echo"hola";
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
                        <label for="nombreUsuario"> Nombre de usuario:</label>
                        <input type="text" id="nombreUsuario" placeholder="Nombre Usuario">

                        <label for="Contraseña"> Contraseña:</label>
                        <input type="password" id="contraseña" placeholder="Contraseña">

                        <label for="correo"> Correo:</label>
                        <input type="email" id="correo" placeholder="Correo">

                        <label for="Nombre"> Nombre:</label>
                        <input type="text" id="nombre" placeholder="Nombre">

                        <label for="Apellido1"> Primer Apellido:</label>
                        <input type="text" id="apellido1" placeholder="Primer Apellido">

                        <label for="Apellido2"> Segundo Apellido:</label>
                        <input type="text" id="apellido2" placeholder="Segundo Apellido">

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
                        <textarea id="dirección" placeholder="Dirección"></textarea>

                        <label for="Teléfono"> Teléfono:</label>
                        <input type="text" id="teléfono" placeholder="Teléfono">

                        <input type="submit" name="actualizar"value="Actualizar">
                        <input type="submit" name="cancelar"value="Cancelar">  
                    </div>
            </form>  
        </div>
    </body>
</html>