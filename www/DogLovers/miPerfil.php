<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/miPerfil.css" />
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
                        
                        <label for="Pais"> Pais:</label>
                        <select id="pais"> 
                            <option value="pais"> Costa Rica</option>
                        </select>
                        
                        <label for="Provincia"> Provincia:</label>
                        <select id="provincia"> 
                            <option value="san jose"> San José</option>
                            <option value="alajuela"> Alajuela</option>
                            <option value="cartago"> Cartago</option>
                            <option value="heredia"> Heredia</option>
                            <option value="limon"> Limón</option>
                            <option value="guanacaste"> Guanacaste</option>
                            <option value="puntarenas"> Puntarenas</option>            
                        </select>
                        
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