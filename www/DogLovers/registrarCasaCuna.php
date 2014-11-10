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

            include 'Conexion.php';
            include 'funcionalidad.php';
            $conexion=new Conexion();
            $conn=$conexion->conectar();

        $tipoMascotaError = $tamanoError = $validacionError="";
         $tamano =$tipoMascota ="";
        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) { //Si estamos recibiendo datos nuevos verificarlos
            if(empty($_POST["tipoMascota"]) or empty($_POST["tamano"])) {
                if(empty($_POST["tipoMascota"])){
                            $tipoMascotaError = "*Tipo de mascota requerido";  //si el username no se encuentra mostrar error
                }
                if (empty($_POST["tamano"])) {
                            $tamanoError = "*Tamaño requerido"; //si la pass no se encuentra mostrar error
                }
            }//if empty
            else{
                $idUsuario =$_SESSION["id_user"];
                $tamano = test_input($_POST["tamano"]);    // si si esta verificarlo 
                $tipoMascota = test_input($_POST["tipoMascota"]); //si si esta verifi
                $donacion = test_input($_POST["pregunta"]); //si si esta verifi
                $idDireccion = -1;
                
                $stid = oci_parse($conn, 'begin :m := insertarCasaCuna(:a,:b,:c,:d); end;'); 
                oci_bind_by_name($stid, ':a', $idUsuario);
                oci_bind_by_name($stid, ':b', $tipoMascota);
                oci_bind_by_name($stid, ':c', $tamano);
                oci_bind_by_name($stid, ':d', $donacion);
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
            <form name="registrarMascotaEncontrada_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
                  enctype="multipart/form-data">     
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>
                    <div class="contenedor">  
                        
                        <span class="error"> <?php echo $validacionError;?></span>
                        <label for="Tipo de Mascota"> Tipo de mascota:</label>
                        <select name = "tipoMascota"id="tipoMascota">
                            <option value=""> ---- </option>
                             <?php
                                $stid = oci_parse($conn, 'SELECT NOMBRETIPOMASCOTA FROM TBTIPOMASCOTA'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['NOMBRETIPOMASCOTA'].'>' . $row['NOMBRETIPOMASCOTA'] . '</option>');
                                }
                            ?>
                        </select>
                        <br>
                        <span class="error"> <?php echo $tipoMascotaError;?></span>
                        
                        <label for="Tamano de Mascota"> Tamaño de mascota:</label>
                        <select name="tamano"id="tamanoMascota">
                            <option value=""> ---- </option>
                             <?php
                                $stid = oci_parse($conn, 'SELECT NOMBRETAMANO FROM TBTAMANOMASCOTA'); 
                                oci_execute($stid);
                                while(($row = oci_fetch_array($stid, OCI_BOTH))!= false) {
                                    echo utf8_encode('<option value='.$row['NOMBRETAMANO'].'>' . $row['NOMBRETAMANO'] . '</option>');
                                }
                            ?> 
                        </select>
                        <br>
                        <span class="error"> <?php echo $tamanoError;?></span> 
                        
                        <div class="pregunta">
                            <font color="white"> ¿Requiere donación para alimento?</font> 
                            <br />
                            <input type="radio" name="pregunta" id="si" value="SI" > <font color="white">Sí</font> 
                            <br />
                            <input type="radio" name="pregunta" id="no" value="NO"> <font color="white">No</font>
                            <br />
                        </div>


                        <input type="submit"  name= "register"class="registrar" value="Registrar">
                        <input type="submit" name = "cancelar"class="cancelar" value="Cancelar">  
                    </div>
            </form>  
        </div>
    </body>
</html>