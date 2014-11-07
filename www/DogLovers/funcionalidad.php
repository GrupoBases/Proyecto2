
<?php


function test_input($data) {        //funcion que verifica que el vcampo no contenga caracteres invalidos
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
}


?>