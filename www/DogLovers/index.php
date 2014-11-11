<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/fonts.css" />

        <link rel="stylesheet" type="text/css" href="fonts.css" />       
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="arriba.js"></script>
        
        <body> 
            
           <span class="irArriba icon-arrow-up"></span>

            <?php
                 //comprobamos si el usuario ya inicio secion
                session_start();    
                if (array_key_exists('userName', $_SESSION)) {
                    echo "<p>Bienvenido " . $_SESSION['userName']."</p>" ;
                }
                else{
                    header('Location: login.php');
                }
            ?>

            
            <div id="header">
                <ul class="nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="">Mascotas DogLovers</a>
                        <ul>
                            <li><a href="registrarMascotaPerdida.php">Perdí una mascota</a></li>
                            <li><a href="registrarMascotaEncontrada.php">Encontré una mascota</a></li>
                            <li><a href="buscarMascota.php">Buscar</a></li>
                            </li>
                        </ul>
                    </li>
                    <li><a href="misPublicaciones.php">Mis Publicaciones</a>
                    </li>
                    <li><a href="casaCuna.php">Casa Cuna</a></li>
                    <li><a href="adopciones.php">Adopciones</a></li>
                    <li><a href="miPerfil.php">Mi Perfil</a></li>
                    <li><a href="registrarDonaciones.php">Donaciones</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                </ul>
        
        
            </div>
            
    
            
    
            <!--slider show----------------------------------------------------------------------->
            <div class="main">
                <div class="slides">
                    <img src="graficos/logo.png" alt="">
                    <img src="graficos/1.jpg" alt="">
                    <img src="graficos/2.jpg" alt="">
                    <img src="graficos/3.jpg" alt="">
                </div>
            </div>
            
            <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
            <script src="js/jquery.slides.js"></script>
    
        <script>
            $(function(){
                $(".slides").slidesjs({
                    play: {
                        active: true,
                        // [boolean] Generate the play and stop buttons.
                        // You cannot use your own buttons. Sorry.
                        effect: "slide",
                        // [string] Can be either "slide" or "fade".
                        interval: 3000,
                        // [number] Time spent on each slide in milliseconds.
                        auto: true,
                        // [boolean] Start playing the slideshow on load.
                        swap: true,
                        // [boolean] show/hide stop and play buttons
                        pauseOnHover: false,
                        // [boolean] pause a playing slideshow on hover
                        restartDelay: 2500
                        // [number] restart delay on inactive slideshow
                    }
                });
            });
        </script>

    
	</body>
</html>
 