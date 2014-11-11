<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/casaCuna.css" />
        
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

             $sqlEstado = "select p.nombre,w.estadomascota,l.nombretipomascota,d.nombre,q.estadomascota,v.nombretipomascota

                            from tbmascota p,tbmatch c,tbmascota d,tbestadomascota w,tbestadomascota q,
                            tbtipomascota l,tbtipomascota v

                            where p.id_mascota = c.id_mperdida 
                            and d.id_mascota = c.id_mencontrada
                            and p.id_tipomascota = l.id_tipomascota 
                            and d.id_tipomascota = v.id_tipomascota
                            and w.id_estadomascota = p.id_estadomascota 
                            and q.id_estadomascota = d.id_estadomascota";

            if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['match'])) { //Si estamos recibiendo datos nuevos verificarlos
                 $stid = oci_parse($conn, 'begin realizarmatch(); end;'); 
                        oci_execute($stid);
                header('Location: match.php'); 
            }

             else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if 
        ?>
        
        <div class="estructuraForm">
             <form name="registrarCasaCuna_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">       
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor" >  
                        
                        <!--<h1 class="tagRegistrar"> Realizar Match <span class="triangulo"</span></h1>-->
                        
                                                
                       <!-- <label for="frecuecia"> Frecuencia:</label>
                        <input name="frecuencia" type="text" id="frecuencia" placeholder="Frecuencia para el match">-->

                        
                        <input type="submit" name="match" value="Match">
                        
                        
                         <?php
                                if (!empty($sqlEstado)) {
                                    echo "<h1 class=\"tagRegistrar\"> Realizar Match <span class=\"triangulo\"</span></h1>";
                                $stid = oci_parse($conn, $sqlEstado); 
                                oci_execute($stid);
                                    $var=0;
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    
                                    echo "<div class=\"casaCuna\">
                                    <p> NOMBRE MASCOTA:".$row[$var]."   <br>
                                    ESTADO DE LA MASCOTA:".$row[$var+=1]."<br>
                                    TIPO DE MASCOTA: ".$row[$var+=1]." <br>
                                    NOMBRE MASCOTA:".$row[$var+=1]."   <br>
                                    ESTADO DE LA MASCOTA:".$row[$var+=1]."<br>
                                    TIPO DE MASCOTA: ".$row[$var+=1]."</p> <br>
                                    
                            
                                    </div>";
                                    $var=0;
                                    
                                }
                                }
                        ?>

                        <input type="submit" name="cancelar" value="Cancelar">


                    </div>
            </form>  
        </div>
    </body>
</html>