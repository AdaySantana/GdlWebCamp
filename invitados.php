

      <?php include_once 'includes/templates/header.php' ?>


      <section class="seccion contenedor">
        <h2>Invitados</h2>


      <?php 

    try{
    
    require_once('includes/funciones/db-conexion.php'); //Llamamos a la función de conexión con la base de datos;
    
    $sql = "SELECT * FROM invitados";

    
    $resultado = $conn->query($sql);
    
    
    
    } catch(\Exception $e){
    
    echo $e->getMessage();
    
    } ?>
   

    <section class="invitados contenedor seccion">
      <ul class="lista-invitados clearfix">

    <?php 
      while ($invitados= $resultado->fetch_assoc()){ ?>

        
       <li>
       <div class="invitado">
        <a class="invitado-info" href="invitado<?php echo $invitados['invitado_id'] ?>">
          <img src="img/<?php echo $invitados['url_imagen']; ?>" alt="imagen invitado">
             <p><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?></p>
        </a>
       </div>
            </li>


       <div class="hidden">
             <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
               <h2><?php echo $invitados['nombre_invitado']. " " .$invitados['apellido_invitado'] ?></h2>
                 <img src="img/<?php echo $invitados['url_imagen']; ?>" alt="imagen invitado">
               <p><?php echo $invitados['descripcion']; ?></p> 
             </div>
       </div>
    <?php }  //fin del while?>
       </ul>
      </section>
            
    <?php $conn->close(); ?>
    </section>
            
     <?php include_once 'includes/templates/footer.php' ?>