<!DOCTYPE html>
 
<html lang='en'>
    <head>
        <meta charset="UTF-8"/> 
        <title>
            Dog Lovers
        </title>
        <link rel="shortcut icon" type="image/x-icon" href="graficos/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/login.css" />
        <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    </head>
    
    
    <body>
        <?php
        include 'Conexion.php';
        include 'funcionalidad.php';

        session_start();

        $conexion=new Conexion();
        $conn=$conexion->conectar();

        // define variables and set to empty values
        $user = $pass = ""; //variables para pasar datos
        $userError=$passError=$validacionError=""; //variables de errores
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['login'])) { //Si estamos reciviendo datos nuevos verificarlos
            if(empty($_POST["user"]) or empty($_POST["pass"]) ) {
                if(empty($_POST["user"])){
                    $userError = "Nombre de Usuario requerido";  //si el username no se encuentra mostrar error
                }
                if (empty($_POST["pass"])) {
                    $passError = "Contraseña requerida"; //si la pass no se encuentra mostrar error
                }

            } else {
                $idUser=-1;//aca vamos a guardar el id del user
                $user = test_input($_POST["user"]); //si si esta verificarlo 
                $pass = test_input($_POST["pass"]);    // si si esta verificarlo


                $stid = oci_parse($conn, 'begin :r := verificarUsuario(:u,:p); end;'); //VERIFICARUSUARIO('user','pass');
                oci_bind_by_name($stid, ':u', $user);
                oci_bind_by_name($stid, ':p', $pass);
                oci_bind_by_name($stid, ':r', $idUser);
                oci_execute($stid);

                if($idUser!=-1){    //si el idUser retornado es diferente a -1 iniciar sesion 

                    $_SESSION["userName"] = $user;
                    $_SESSION["id_user"] = $idUser;
                    header('Location: index.php');       
                }else{
                    $validacionError = "Nombre de Usuario o Contraseña no validos";   
                }  
            } 
        }
        else if ($_SERVER["REQUEST_METHOD"] == "POST" and ($_POST['register'])) {
            header('Location: registrarUsuario.php');  
        }
        
        
        ?>
        <div id="wrapper">
            <form name="login-form" class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                  enctype="multipart/form-data">
                
                <div class="header">
                    <img id = "logo" src="graficos/logo1.png";
                </div>

                <div class="content">
                    <input name="user" type="text" class="input username" placeholder="Username" />
                    <span class="error"> <?php echo $userError;?></span>
                    
                    <input name="pass" type="password" class="input password" placeholder="Password" />
                    <span class="error"> <?php echo $passError;?></span>
                   
                    <span class="error"> <?php echo $validacionError;?></span>
                 
                </div>

                <div class="footer">
                    <input type="submit" name="login" value="Entrar" class="button" />
                    <input type="submit" name="register" value="Registrarse" class="register" />
                        
                </div>
            </form>
        </div>
        
        <div class="gradient">
        </div>
    </body>
</html>
