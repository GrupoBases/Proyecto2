<?php include 'correo.php';?>

<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/contacto.css" />
        
        <link rel="stylesheet" type="text/css" href="fonts.css" />       
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="arriba.js"></script>

    </head>
       
    <body>
        
        <span class="irArriba icon-arrow-up"></span>
        
        <?php
        session_start();    //comprobamos si el usuario ya inicio secion
        if (!array_key_exists('userName', $_SESSION)) {
            header('Location: login.php');
        }

        include 'Conexion.php';
        include 'funcionalidad.php';
        $conexion=new Conexion();
        $conn=$conexion->conectar();
        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['enviar'])) {
        header('Location: index.php');
        }
         else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if

        ?>
        
        <div class="estructuraForm">
            
            <strong><?php echo $msg; ?></strong>

            <form name="contacto_form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data"> 
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor">         
                        <label for="campo obligatorio"> *Campo Obligatorio:</label>
                        
                        <h1 class="tagInfo"> Información <span class="triangulo"</span></h1>
                        
                        <div id="casaCuna">
                            <div id="info">
                                <h1 style="color:white"> Proyecto II de Bases de Datos I</h1>
                                <h2 style="color:white"> Desarrollado por:</h2>
                                <h3 style="color:white"> - Jeffrey Camareno Fonseca</h3>
                                <h3 style="color:white"> - Olman Quirós Jiménez</h3>
                                <h3 style="color:white"> - Cristiam Flores Núñez </h3>
                            </div>
                        </div>
                        
                        <h1 class="tagComentarios"> Sugerencias <span class="triangulo"</span></h1>
                        
                        <label for="asunto"> * Asunto:</label>
                        <input name="asunto" type="text" id="asunto" placeholder="Asunto">
                        
                        <label for=""> Adjuntar archivo:</label>
                        <input type="file" name="adjunto">
                        
                        <label for="comentarios"> * Sugerencias o comentarios:</label>
                        <textarea name="mensaje" id="mensaje" cols="50" rows="15" placeholder="Escribe tus sugerencias o comentarios"></textarea>


                        <input type="submit" name="enviar" value="Enviar">
                        <input type="submit" name="cancelar"value="Cancelar">  
                    </div>
                    <input type="hidden" name="phpmailer">
            </form>  
        </div>
    </body>
</html>