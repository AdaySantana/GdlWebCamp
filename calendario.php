

<?php include_once 'includes/templates/header.php' ?>


<section class="seccion contenedor">
<h2>Calendario de eventos</h2>


<?php 

try{
    
    require_once('includes/funciones/db-conexion.php'); //Llamamos a la función de conexión con la base de datos;
    
    $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,icono, nombre_invitado, apellido_invitado ";
    $sql .=" FROM eventos";
    $sql .=" INNER JOIN categoria_evento ";
    $sql .=" ON eventos.id_cat_evento = categoria_evento.id_categoria";
    $sql .=" INNER JOIN invitados";
    $sql .=" ON eventos.id_inv = invitados.invitado_id";
    $sql .=" ORDER BY evento_id";
    
    $resultado = $conn->query($sql); //
    
    
    
} catch(\Exception $e){
    
    echo $e->getMessage();
    
}
?>

<div class="calendario">
<?php 

$calendario = array();

while ($eventos = $resultado->fetch_assoc()){   //

    $fecha = $eventos['fecha_evento'];
    
    $evento = array(
        'titulo' => $eventos['nombre_evento'],
        'fecha' => $eventos['fecha_evento'],
        'hora' => $eventos['hora_evento'],
        'categoria' => $eventos['cat_evento'],
        'icono' =>'fa'. " " . $eventos['icono'],
        'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
    );
    
    $calendario[$fecha][] = $evento;


    ?>
    
    
    
    
    
    <?php }  //fin del while?>

    <div class="semana">


    <?php 


    
    foreach ($calendario as $key => $value) { ?>

    <h3> <i class="fa fa-calendar"></i>
    
    <?php 
    
    setlocale(LC_TIME, 'es_ES');
    echo strftime( "%A, %d de %B del %Y ", strtotime($key)); ?>
    </h3>

    <?php foreach($value as $evento_dia){ ?>

        <div class="dia">
            <p class="titulo">
                <?php echo $evento_dia['titulo']; ?>
            <p class="hora"><i class="fa fa-clock" aria-hidden="true"></i>
            <?php echo $evento_dia['fecha']. " " .$evento_dia['hora']; ?>
        </p>
        <p class="categoria">
            <i class="<?php echo $evento_dia['icono']; ?>"></i>
            <?php  echo $evento_dia['categoria'] ?>
        </p>
        <p>
        <i class="fa fa-user" aria-hidden="true"></i>
            <?php  echo $evento_dia['invitado'] ?>
        </p>

        </div>

    <?php } ?>
   <?php } ?>



    
   </div>
    
    
   
    
    </div>
    
    
    <?php $conn->close(); ?> //
    
    
    
    
    </section>
    
    
    
    
    
    <?php include_once 'includes/templates/footer.php' ?>