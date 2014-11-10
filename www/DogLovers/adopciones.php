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
        ?>
        
        
        <div class="estructuraForm">
            <form>      
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor" >  
                        
                        <h1 class="tagAdopcion"> Adopciones <span class="triangulo"</span></h1>
                        
                        <div id="casaCuna">
                            <label > Soy una adopcion </label>
                        </div>
                        
                        <h1 class="tagRegistrar"> Dar en adopción <span class="triangulo"</span></h1>


                        <input type="submit" value="Registrar Adopción" >

                    </div>
            </form>  
        </div>
    </body>
</html>