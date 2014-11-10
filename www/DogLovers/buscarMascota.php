 <!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/buscarMascota.css" />
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
            if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['filtrar'])) { //Si estamos recibiendo datos nuevos verificarlos
                    echo "hola";  
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
  
                        <label for="estados"> Estados:</label>
                        <select id="estados">
                            <option value=""> --estados-- </option>
                        </select>     

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
                        
                        <label for="Fecha"> Fecha:</label>
                        <input type="date" id="fechaNacimiento" placeholder="Fecha">  
                        
                        <label for="Raza"> Raza:</label>
                        <select id="raza">
                            <option value=""> --elejir una raza-- </option>
                        </select>
                        
                        <label for="color"> Color:</label>
                        <select id="color">
                            <option value=""> --color-- </option>
                        </select>
                    
                        <label for="Chip"> Chip de identificación:</label>
                        <input type="text" id="chip" placeholder="Chip de identificación">                        

                        <input type="submit" name = "filtrar" value="Filtrar">
                        
                        <input type="submit" name = "cancelar" value="Cancelar">
                    </div>
            </form>  
        </div>
    </body>
</html>