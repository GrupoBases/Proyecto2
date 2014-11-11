<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/casaCuna.css" />
        
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

            if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) { //Si estamos recibiendo datos nuevos verificarlos
                header('Location: registrarCasaCuna.php'); 
            }
             else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if 
        ?>
        
        <div class="estructuraForm">
             <form name="registrarCasaCuna_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">       
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor" >  
                        
                        <h1 class="tagRegistrar"> Realizar Match <span class="triangulo"</span></h1>
                        
                                                
                        <label for="frecuecia"> Frecuencia:</label>
                        <input name="frecuencia" type="text" id="frecuencia" placeholder="Frecuencia para el match">

                        
                        <input type="submit" name="match" value="Match">
                        
                        <div id="casaCuna">
                            <label > Soy un match </label>
                        </div>
                        

                        <input type="submit" name="cancelar" value="Cancelar">


                    </div>
            </form>  
        </div>
    </body>
</html>