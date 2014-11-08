<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/registrarMascotaEncontrada.css" />
    </head>
       
    <body>
        <div class="estructuraForm">
            <form>      
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor">         
                        <label for="campo obligatorio"> *Campo Obligatorio:</label>
                        
                        <label for="Tipo de Mascota"> * Tipo de mascota:</label>
                        <select id="tipoMascota">
                            <option value=""> --elejir tipo mascota-- </option>
                        </select>
                        
                        <label for="Raza"> * Raza:</label>
                        <select id="raza">
                            <option value=""> --elejir una raza-- </option>
                        </select>

                        <label for="nombreMascota"> Nombre de la mascota:</label>
                        <input type="text" id="nombreMascota" placeholder="Nombre Mascota">

                        <label for="Chip"> Chip de identificación:</label>
                        <input type="text" id="chip" placeholder="Chip de identificación">

                        <label for="Color"> * Color:</label>
                        <input type="text" id="color" placeholder="Color">

                        <label for="notas"> Notas:</label>
                        <input type="text" id="notas" placeholder="Notas">
                        
                        
                        <label for=""> ----------------------------------------------------------------------------------</label>
                        <label for="lugarPerdido"> * Lugar donde fué encontrado (a):</label>
                        
                        <label for="pais"> País:</label>
                            <select id="pais">
                            <option value=""> --país-- </option>
                        </select>
                        
                        <label for="provincia"> Provincia:</label>
                            <select id="provincia">
                            <option value=""> --provincia-- </option>
                        </select>
                        
                        <label for="canton"> Cantón:</label>
                            <select id="canton">
                            <option value=""> --cantón-- </option>
                        </select>
                        
                        <label for="distrito"> Distrito:</label>
                            <select id="ditrito">
                            <option value=""> --distrito-- </option>
                        </select>
                        
                        <label for="descripciones"> Descripciones:</label>
                        <textarea id="descripciones" placeholder="Descripciones"></textarea>
                        
                        <label for="FechaExtravio"> Día en que fué Encontrado (a):</label>
                        <input type="date" id="fechaExtravío" placeholder="Fecha de encontrado">   
                        

                        <input type="submit" value="Registrar">
                        <input type="submit" value="Cancelar">  
                    </div>
            </form>  
        </div>
    </body>
</html>