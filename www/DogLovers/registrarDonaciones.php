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
        <?php
         session_start();    //comprobamos si el usuario ya inicio secion
            if (!array_key_exists('userName', $_SESSION)) {
                header('Location: login.php');
            }

            include 'Conexion.php';
            include 'funcionalidad.php';
            $conexion=new Conexion();
            $conn=$conexion->conectar();
    
            $montoError = $asociacionError = $validacionError="";
            $monto=$asociacion ="";
            if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) { //Si estamos recibiendo datos nuevos verificarlos
            if(empty($_POST["asociacion"]) or empty($_POST["monto"])) {
                if(empty($_POST["asociacion"])){
                            $asociacionError = "*Asociacion requerida";  //si el username no se encuentra mostrar error
                }
                if (empty($_POST["monto"])) {
                            $montoError = "*Monto requerido"; //si la pass no se encuentra mostrar error
                }
            }//if empty
            else{
                $idUsuario = $_SESSION["id_user"];
                $asociacion = test_input($_POST["asociacion"]);    // si si esta verificarlo 
                $monto = test_input($_POST["monto"]); //si si esta verifi
                $idDireccion = -1;
                
                $stid = oci_parse($conn, 'begin :m := insertardonacion(:a,:b,:c); end;'); 
                oci_bind_by_name($stid, ':a', $idUsuario);
                oci_bind_by_name($stid, ':b', $asociacion);
                oci_bind_by_name($stid, ':c', $monto);
                oci_bind_by_name($stid, ':m', $idDireccion);
                oci_execute($stid);
                
                if($idDireccion != -1){    //si no retorna null pasar 
                    header('Location: index.php');       
                }else{
                    $validacionError = "Hubo un error en el registro vuelva a registrarse";   
                }
            }// else empty
        }//if principal
        else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['cancelar'])) {
                    header('Location: index.php');  
        } // else if 

        ?>
        <div class="estructuraForm">
            <form name="registrarDonacion_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">          
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                </div>
                    <div class="contenedor">   
                        <br>
                        <span class="error"> <?php echo $validacionError;?></span> 
                        <label for="Asociaciones"> Elige una asociación para donar:</label>
                        <select name ="asociacion" id="Asociaciones"> 
                            <option value=""> ----</option> 
                             <?php
                                $stid = oci_parse($conn, 'SELECT NOMBRE FROM TBASOCIACION'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['NOMBRE'].'>' . $row['NOMBRE'] . '</option>');
                                }
                            ?>
                        </select>
                        <br>
                        <span class="error"> <?php echo $asociacionError;?></span> 
                        
                        <label for="monto"> Monto a donar:</label>
                        <input type="text" name="monto" id="monto"value="">  
                        <br>
                        <span class="error"> <?php echo $montoError;?></span> 

                        <input type="submit" name="register"value="Donar">
                        <input type="submit" name= "cancelar"value="Cancelar">
                    </div>
            </form>  
        </div>
    </body>
</html>
