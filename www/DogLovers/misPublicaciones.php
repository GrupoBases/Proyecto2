<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/misPublicaciones.css" />
    </head>
       
    <body>
         <?php
            session_start();    //comprobamos si el usuario ya inicio secion
            if (!array_key_exists('userName', $_SESSION)) {
                header('Location: login.php');
            }
        ?>
        
        <div class="estructuraForm">
            <form>      
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                </div>
                    <div class="contenedor">   
                        
                        <label for="Buscar por"> Buscar Por:</label>
                        <select id="buscarPor"> 
                            <option value=""> --buscar por--</option>        
                        </select>
                        
                        <div id="publicacion">
                            <label for="descripcion"> Soy una publicación:</label>
                            <label for="descripcion"> Descripción:</label>
                            <a href="http://www.google.com"> Editar Publicación</a>
                        </div>

                        <input type="submit" value="Buscar">
                    </div>
            </form>  
        </div>
    </body>
</html>
