<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/contacto.css" />
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

            // define variables and set to empty values
            $comentarios = ""; //variables para pasar datos
            $comentariosError=$validacionError=""; //variables de errores


            if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['enviar']) { //Si estamos reciviendo datos nuevos verificarlos
                if(empty($_POST["comentarios"])) {
                    
                    $comentariosError = "*Comentario requerido";  //si el username no se encuentra mostrar error
                    

                } else {
                    $userName= $_SESSION['userName'];
                    $idUser= $_SESSION["id_user"];
                    
                    
                    $para      = 'olmanqj@hotmail.com';
                    $asunto    = 'Prueba de SMTP local';
                    $mensaje   = 'Mensaje de prueba';
                    $cabeceras = 'From: remitente@dominio.com' . "\r\n" .
                     'Reply-To: remitente@dominio.com' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();
                        
                        
                    //$mensaje = "Usuario: ". $userName." ID: ".$idUser."ha enviado el siguiente comentario: ".$_POST["comentarios"];
                   // $mensaje = wordwrap($mensaje, 70, "\r\n");

                    
                    
                    //NO SIRVE NO MANA EMAILS    
                   // $email=mail($para, $asunto, $mensaje, $cabeceras);//mail($direccion, 'Comentario de Usuario DogLovers', $mensaje);
                
                    if($email){     
                       header('Location: index.php');        
                    } 
                    else{
                        $validacionError="Hubo un error al enviar su mensaje, envio fallido.";
                    }
                }
            }



    


            else if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['cancelar']) {
                header('Location: index.php');  
            }
        
        
        ?>
        
        
        
        
        
        <div class="estructuraForm">
            <form name="email-form"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                  enctype="multipart/form-data">     
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor">         
                        <label for="campo obligatorio"> *Campo Obligatorio:</label>
                        <br>
                        <span class="error"> <?php echo $validacionError;?></span>

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
                        
                        <label for="comentarios"> * Sugerencias o comentarios:</label>
                        <textarea id="comentarios" name="comentarios" placeholder="Escribe tus sugerencias o comentarios"></textarea>
                        <br>
                        <span class="error"> <?php echo $comentariosError;?></span>
                        <br>
                
                        <input type="submit" name="enviar" value="Enviar" />
                        <input type="submit" name="cancelar" value="Cancelar"  />
                    </div>
            </form>  
        </div>
    </body>
</html>