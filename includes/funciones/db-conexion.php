

<?php 

    $conn = new mysqli('localhost', 'root', 'root', 'gdlwebcamp_1');

    if($conn->connect_error){

        $error = $conn->connect_error;
    }

    if(!mysqli_set_charset($conn, 'utf8')) {
        printf('Error cargando los caracteres', mysqli_error($conn)); 
        exit(); 
    }


?>