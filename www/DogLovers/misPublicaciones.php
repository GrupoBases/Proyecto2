<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/misPublicaciones.css" />
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
            $idUsuario =$_SESSION["id_user"];

            $sqlEstado = "select tbmascota.nombre,tbmascota.montorecompenza,tbestadomascota.estadomascota
                            from tbtipomascota,tbmascota,tbestadomascota,Tbusuario
                            where tbtipomascota.id_tipomascota = tbmascota.id_tipomascota 
                            and tbestadomascota.id_estadomascota = tbmascota.id_estadomascota
                            and tbUsuario.Id_Usuario = ".$idUsuario."
                            and tbmascota.id_usuario = ".$idUsuario." ";

            if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if 

        ?>
        
        <div class="estructuraForm">
            <form name="mispublicaciones_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">       
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                </div>
                    <div class="contenedor">   
                        
                       <!--
                        <h1 class="tagBuscar"> Buscar <span class="triangulo"</span></h1>
                    
                        <label for="Buscar por"> Buscar Por:</label>
                        <select id="buscarPor"> 
                            <option value=""> --buscar por--</option>        
                        </select>
                        
                        <div id="publicacion">
                            <label for="descripcion"> Soy una publicación:</label>
                            <label for="descripcion"> Descripción:</label>
                            <a href="http://www.google.com"> Editar Publicación</a>
                        </div>
                        
                        -->
                          <?php
                                if (!empty($sqlEstado)) {
                                    echo "<h1 class=\"tagBuscar\"> Mis Publicaciones <span class=\"triangulo\"</span></h1>";
                                $stid = oci_parse($conn, $sqlEstado); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    
                                    echo "<div id=\"publicacion\">
                                    <p> NOMBRE:".$row['NOMBRE']."   <br>
                                    MONTO DE RECOMPENZA:".$row['MONTORECOMPENZA']."<br>
                                    ESTADO DE MASCOTA: ".$row['ESTADOMASCOTA']."</p> <br>
                            
                                    </div>";
                                    
                                    
                                }
                                }
                            ?>

                        <!--<input type="submit" name= "buscar" value="Buscar">-->
                        
                        <input type="submit" name= "cancelar" value="Cancelar">
                    </div>
            </form>  
        </div>
    </body>
</html>
