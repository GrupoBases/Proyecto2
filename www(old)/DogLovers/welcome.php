<!DOCTYPE HTML>
<html> 
<body>

    <?php
    session_start();
     echo "Bienvenido " . $_SESSION['userName'] . " su id es: ".$_SESSION['id_user'];   
    

    ?>
    
    
</body>
</html>