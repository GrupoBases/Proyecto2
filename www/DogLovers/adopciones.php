<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/adopciones.css" />
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

        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) {
           header('Location: registrarAdopcion.php'); 
        }

        else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if 
        ?>
        
        
        <div class="estructuraForm">
           <form name="adopciones_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">       
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor" >  
                        
                        <h1 class="tagAdopcion"> Adopciones <span class="triangulo"</span></h1>
                        
                        <div id="casaCuna">
                            <label > Soy una adopcion </label>
                        </div>
                        
                        <h1 class="tagRegistrar"> Dar en adopción <span class="triangulo"</span></h1>


                        <input type="submit" name="register"value="Registrar Adopción" >
                        <input type="submit" name="cancelar"value="Cancelar" >

                    </div>
            </form>  
        </div>
    </body>
</html>