<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/registrarDonaciones.css" />
    </head>
       
    <body>
        <div class="estructuraForm">
            <form>      
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                </div>
                    <div class="contenedor">   
                        
                        <label for="Asociaciones"> Elige una asocioacón para donar:</label>
                        <select id="Asociaciones"> 
                            <option value=""> --asociaciones--</option>        
                        </select>
                        
                        <label for="monto"> Monto a donar:</label>
                        <input type="text" name="tel" value="" 
                               onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  

                        <input type="submit" value="Donar">
                        <input type="submit" value="Cancelar">
                    </div>
            </form>  
        </div>
    </body>
</html>
