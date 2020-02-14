<?php include_once "includes/templates/header.php" ?>




    

    <?php 
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];



    echo $nombre . '</br>'; 
    echo $apellido . '</br>';
    echo $email . '</br>';
    ?>


    <?php 
    
    
    try {


        include('includes/funciones/db-conexion.php');


        $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, apellido_usuario, email_usuario) VALUES (?,?,?)");
        $stmt->bind_param('sss', $nombre, $apellido, $email);
        $stmt->execute();


        
        $conn->close();





        
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    
    ?>





<pre>
    
    <?php var_dump($_POST) ?>
    
</pre>










<?php include_once "includes/templates/footer.php" ?>