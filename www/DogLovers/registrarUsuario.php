<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        
        <link rel="stylesheet" type="text/css" href="css/registrarUsuario.css" />
    </head>
       
    <body>
        <form>          
            <label for="nombreUsuario"> Nombre de usuario:</label>
            <input type="text" id="nombreUsuario" placeholder="Nombre Usuario">

            <label for="Contraseña"> Contraseña:</label>
            <input type="password" id="contraseña" placeholder="Contraseña">

            <label for="correo"> Correo:</label>
            <input type="email" id="correo" placeholder="Correo">

            <label for="Nombre"> Nombre:</label>
            <input type="text" id="nombre" placeholder="Nombre">

            <label for="Apellido1"> Primer Apellido:</label>
            <input type="text" id="apellido1" placeholder="Primer Apellido">

            <label for="Apellido2"> Segundo Apellido:</label>
            <input type="text" id="apellido2" placeholder="Segundo Apellido">

            <label for="FechaNacimiento"> Fecha de Nacimiento:</label>
            <input type="date" id="fechaNacimiento" placeholder="Fecha de nacimiento">    

            <label for="Dirección"> Dirección:</label>
            <textarea id="dirección" placeholder="Dirección"></textarea>

            <label for="Teléfono"> Teléfono:</label>
            <input type="text" id="teléfono" placeholder="Teléfono">

            <input type="submit" value="Registrar">
            <input type="submit" value="Cancelar">            
        </form>  
    </body>
</html>
