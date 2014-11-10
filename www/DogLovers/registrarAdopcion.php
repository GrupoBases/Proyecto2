<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/registrarAdopcion.css" />
    </head>
       
    <body>
         <?php
            session_start();    //comprobamos si el usuario ya inicio secion
            if (!array_key_exists('userName', $_SESSION)) {
                header('Location: login.php');
            }
            include 'Conexion.php';
        include 'funcionalidad.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) {
            echo"hola";
        }
          else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if 

        ?>
        
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
                        <select id="tipoMascota">
                            <option value=""> --elejir tipo mascota-- </option>
                        </select>
                        
                        <label for="Raza"> * Raza:</label>
                            <select id="raza">
                            <option value=""> --elejir una raza-- </option>
                        </select>

                        <label for="nombreMascota"> * Nombre de la mascota:</label>
                        <input type="text" id="nombreMascota" placeholder="Nombre Mascota">

                        <label for="Chip"> Chip de identificación:</label>
                        <input type="text" id="chip" placeholder="Chip de identificación">

                        <label for="Color"> * Color:</label>
                        <input type="text" id="color" placeholder="Color">

                        <label for="notas"> Notas:</label>
                        <input type="text" id="notas" placeholder="Notas">
                        
                        
                        <h1 class="tagMasInfo"> Más información <span class="triangulo"</span></h1>
                        
                        <label for="lugarPerdido"> * Dirección:</label>
                        
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


                        <input type="submit" name="register"value="Registrar">
                        <input type="submit" name="cancelar"value="Cancelar">  
                    </div>
            </form>  
        </div>
    </body>
</html>