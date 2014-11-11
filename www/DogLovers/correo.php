<?php
$msg = null;
if (isset($_POST["phpmailer"])){
    $nombre = "DogLovers";
    $email = "alejandrinadatabase@gmail.com";
    $asunto =htmlspecialchars( $_POST["asunto"]);
    $mensaje = $_POST["mensaje"];
    $adjunto = $_FILES["adjunto"];
    
    require "phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;

    //indico a la clase que use SMTP
    $mail->IsSMTP();

    //permite modo debug para ver mensajes de las cosas que van ocurriendo
    //$mail->SMTPDebug = 2;

    //Debo de hacer autenticación SMTP
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";

    //indico el servidor de Gmail para SMTP
    $mail->Host = "smtp.gmail.com";

    //indico el puerto que usa Gmail
    $mail->Port = 465;

    //indico un usuario / clave de un usuario de gmail
    $mail->Username = "alejandrinadatabase@gmail.com";
    $mail->Password = "alejandrinadb123";
    $mail->From = "alejandrinadatabase@gmail.com";
    $mail->FromName = "DogLovers";
    $mail->Subject = $asunto;
    $mail->addAddress($email, $nombre);
    $mail->MsgHTML($mensaje);
    
    if ($adjunto ["size"] > 0){
        $mail->addAttachment($adjunto ["tmp_name"], $adjunto ["name"]);
    }
    if($mail->Send()){
        $msg= "Correo enviado exitosamente";
    }else{
        $msg = "Ha ocurrido un error al enviar el correo, inténtele más tarde";
    }
}
?>