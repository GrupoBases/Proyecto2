<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        
        <link rel="stylesheet" type="text/css" href="css/principal.css" />
        <link rel="stylesheet" type="text/css" href="css/fonts.css" />
        
        
        <body>  
            <div id="header">
                <ul class="nav">
                    <li><a href="">Inicio</a></li>
                    <li><a href="">Mascotas DogLovers</a>
                        <ul>
                            <li><a href="">Perdí una mascota</a></li>
                            <li><a href="">Encontré una mascota</a></li>
                            <li><a href="">Buscar</a></li>
                            </li>
                        </ul>
                    </li>
                    <li><a href="">Mis Publicaciones</a>
                    </li>
                    <li><a href="">Casa Cuna</a></li>
                    <li><a href="">Adopciones</a></li>
                    <li><a href="">Mi Perfil</a></li>
                    <li><a href="">Donaciones</a></li>
                    <li><a href="">Contacto</a></li>
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
 