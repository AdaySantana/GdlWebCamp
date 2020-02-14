<?php if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $total = $_POST['total_pedido'];
    $regalo = $_POST['regalo'];
    $fecha = date('Y-m-d H:i:s');
    //Pedido
    $camisas = $_POST['pedido_camisas'];
    $etiquetas = $_POST['pedido_etiquetas'];
    $pases = $_POST['pases'];
    include_once 'includes/funciones/funciones.php';
    $productos = productos_json($pases, $camisas, $etiquetas);
    //Eventos
    $evento = $_POST['registro'];
    $registro = eventos_json($evento);
    try {
        require_once 'includes/funciones/db-conexion.php';
        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $productos, $registro, $regalo, $total);
        $stmt-> execute();
        $stmt-> close();
        $conn-> close();
        header('Location: validar_registro.php?exitoso=1');
    } catch (Exception $e) {
        $error = $e->getMessage(); 
    }
}
?> 
<?php include_once 'includes/templates/header.php'?>
<section class="contenedor seccion">
<h2>Resumen Registro</h2>
<?php if(isset($_GET['exitoso'])){
    echo 'Registrado correctamente';
} ?>
    </section>

    
    <?php include_once 'includes/templates/footer.php'?>
    