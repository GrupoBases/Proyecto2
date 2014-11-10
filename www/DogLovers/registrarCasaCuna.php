<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/registrarCasaCuna.css" />
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
                    <div class="contenedor">  
                        
                        <label for="Tipo de Mascota"> Tipo de mascota:</label>
                        <select id="tipoMascota">
                            <option value=""> --elejir tipo mascota-- </option>
                        </select>
                        
                        <label for="Tamano de Mascota"> Tamaño de mascota:</label>
                        <select id="tamanoMascota">
                            <option value=""> --elejir tamaño mascota-- </option>
                        </select>
                        
                        <div class="pregunta">
                            <font color="white"> ¿Requiere donación para alimento?</font> 
                            <br />
                            <input type="radio" name="si" id="si" value="si" > <font color="white">Sí</font> 
                            <br />
                            <input type="radio" name="no" id="no" value="no"> <font color="white">No</font>
                            <br />
                        </div>


                        <input type="submit"  class="registrar" value="Registrar">
                        <input type="submit" class="cancelar" value="Cancelar">  
                    </div>
            </form>  
        </div>
    </body>
</html>