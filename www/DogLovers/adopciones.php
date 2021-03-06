<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/adopciones.css" />   
        
        
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

        $sqlEstado = "select tbmascota.nombre,tbmascota.color,tbmascota.chipidentificacion
                        from tbmascota
                        where tbmascota.id_estadomascota = 4 ";

        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) {
           header('Location: registrarAdopcion.php'); 
        }

        else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if 
        ?>
        
        
        <div class="estructuraForm">
           <form name="adopciones_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">       
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor" >  
                        
                        <!--<h1 class="tagAdopcion"> Adopciones <span class="triangulo"</span></h1>-->
                        
                        
                         <?php
                                if (!empty($sqlEstado)) {
                                    echo "<h1 class=\"tagAdopcion\"> En Adopción <span class=\"triangulo\"</span></h1>";
                                $stid = oci_parse($conn, $sqlEstado); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo "<div id=\"adopcion\">
                                    <p> NOMBRE:".$row['NOMBRE']."   <br>
                                    COLOR:".$row['COLOR']."<br>
                                    CHIP DE IDENTIFICACION: ".$row['CHIPIDENTIFICACION']."</p> <br>
                            
                                    </div>";
                                    
                                    
                                }
                                }
                            ?>
                        
                        <h1 class="tagRegistrar"> Dar en adopción <span class="triangulo"</span></h1>


                        <input type="submit" name="register"value="Registrar Adopción" >
                        <input type="submit" name="cancelar"value="Cancelar" >

                    </div>
            </form>  
        </div>
    </body>
</html>