
<?php include_once 'includes/templates/header.php'  ?>
    
    <section class="seccion contenedor">
      
      <h2>La mejor conferencia de diseño web en español</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia quo blanditiis est minus in dolorum sed. Magni placeat in consequatur repellat sit accusamus, odit accusantium sunt dolorum, expedita ipsam nostrum!</p>
      
    </section> <!-- Section -->
    
    <section class="programa">
      <div class="contenedor-video">
        <video autoplay loop poster="img/bg-talleres.jpg">
          <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
              <source src="video/video.ogv" type="video/ogg">
              </video>
            </div> <!-- Contenedor video -->
            
            <div class="contenido-programa">
              <div class="contenedor">
                <div class="programa-evento clearfix">
                  
                  <h2>Programa del evento</h2>

                  <?php 

                  try {

                  require_once('includes/funciones/db-conexion.php');
                    
                    $sql = "SELECT * FROM categoria_evento ";
                    $sql .="ORDER BY orden";
                    $resultado = $conn->query($sql);


                  } catch (Exception $e) {
                    $error = $e->getMessage();
                  } ?>
                  <nav class="menu-programa">
                  <?php while($cat = $resultado->fetch_assoc()) { ?>
                    
                    <?php $categoria = $cat['cat_evento']; ?>
                    <a href='#<?php echo strtolower($categoria); ?>' >
                     <i class='fa <?php echo $cat['icono']; ?> '></i> <?php echo $categoria; ?>
                    </a>


                <?php  } ?>
                   
                  </nav>
                  
          <?php 

           try{
              
               require_once('includes/funciones/db-conexion.php'); //Llamamos a la función de conexión con la base de datos;
              
                $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,icono, nombre_invitado, apellido_invitado ";
                $sql .=" FROM eventos ";
                $sql .=" INNER JOIN categoria_evento ";
                $sql .=" ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .=" INNER JOIN invitados ";
                $sql .=" ON eventos.id_inv = invitados.invitado_id ";
                $sql .=" AND eventos.id_cat_evento = 1 ";
                $sql .=" ORDER BY evento_id LIMIT 2; ";
                $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,icono, nombre_invitado, apellido_invitado ";
                $sql .=" FROM eventos ";
                $sql .=" INNER JOIN categoria_evento ";
                $sql .=" ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .=" INNER JOIN invitados ";
                $sql .=" ON eventos.id_inv = invitados.invitado_id ";
                $sql .=" AND eventos.id_cat_evento = 2 ";
                $sql .=" ORDER BY evento_id LIMIT 2;";
                $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,icono, nombre_invitado, apellido_invitado ";
                $sql .=" FROM eventos ";
                $sql .=" INNER JOIN categoria_evento ";
                $sql .=" ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .=" INNER JOIN invitados ";
                $sql .=" ON eventos.id_inv = invitados.invitado_id ";
                $sql .=" AND eventos.id_cat_evento = 3 ";
                $sql .=" ORDER BY evento_id LIMIT 2;";
              
              
              
              
          } catch(\Exception $e){
              
              echo $e->getMessage();
              
          }
          ?>

          <?php $conn->multi_query($sql); ?>


          <?php do {
                $resultado = $conn->store_result();
                $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

            <?php $i = 0 ?> 
            <?php foreach($row as $evento) { ?>
              <?php if($i % 2 == 0){ ?>
             
                <div id="<?php echo strtolower($evento['cat_evento']); ?>" class="info-curso ocultar">
              <?php } ?>
                    
                    <div class="detalle-evento">
                      <h3><?php echo $evento['nombre_evento'] ?></h3>
                      <p><i class="fa fa-clock"></i><?php echo $evento['hora_evento']; ?></p>
                      <p><i class="fa fa-calendar"></i> <?php echo $evento['fecha_evento']; ?></p>
                      <p><i class="fa fa-user"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
                    </div>
                    
                    
               <?php if($i % 2 == 1): ?>  
                <a href="#" class="btn float-right">Ver todos</a>

                  </div> <!-- Talleres -->
               <?php endif; ?>
                  <?php $i++; ?>
               <?php } ?>
                  <?php $resultado->free(); ?>
       <?php   } while ($conn->more_results() && $conn->next_result()); ?>
       
                  
                  
       
                </div> <!-- Programa evento -->
              </div><!-- Contenedor -->
            </div><!-- Contenido Programa -->
          </section><!-- Programa -->
          
          <section class="invitados contenedor seccion">
            
            <h2>Nuestros Invitados</h2>
            <ul class="lista-invitados clearfix">
              <li>
                <div class="invitado">
                  
                  <img src="img/invitado1.jpg" alt="imagen invitado">
                  <p>Sancho Dragó</p>
                  
                </div>
              </li>
              <li>
                <div class="invitado">
                  <img src="img/invitado2.jpg" alt="imagen invitado">
                  <p>Lula Ramos</p>
                </div>
              </li>
              <li>
                <div class="invitado">
                  <img src="img/invitado3.jpg" alt="imagen invitado">
                  <p>San Juan</p>
                </div>
              </li>
              <li>
                <div class="invitado">
                  <img src="img/invitado4.jpg" alt="imagen invitado">
                  <p>Rita la Cantaora</p>
                </div>
              </li>
              <li>
                <div class="invitado">
                  <img src="img/invitado5.jpg" alt="imagen invitado">
                  <p>Rafael Bautista</p>
                </div>
              </li>
              <li>
                <div class="invitado">
                  <img src="img/invitado6.jpg" alt="imagen invitado">
                  <p>Ana Delgado</p>
                </div>
              </li>
            </ul>
          </section>
          
          <div class="contador parallax">
            <div class="contenedor">
              <ul class="resumen-evento clearfix">
                <li>
                  <p class="numero"></p>Invitados
                </li>
                <li>
                  <p class="numero"></p>Talleres
                </li>
                <li>
                  <p class="numero"></p>Días
                </li>
                <li>
                  <p class="numero"></p>Conferencias
                </li>
              </ul>
            </div>
          </div>
          
          <section class="precios seccion">
            
            <h2>Precios</h2>
            <div class="contenedor">
              <ul class="lista-precios clearfix">
                <li>
                  <div class="tabla-precio">
                    <h3>Pase por día</h3>
                    <p class="numero">30€</p>
                    <ul>
                      <li>Bocadillos gratis</li>
                      <li>Todas las conferencias</li>
                      <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="btn hollow">Comprar</a>
                  </div>
                </li>
                <li>
                  <div class="tabla-precio">
                    <h3>Todos los días</h3>
                    <p class="numero">50€</p>
                    <ul>
                      <li>Bocadillos gratis</li>
                      <li>Todas las conferencias</li>
                      <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="btn">Comprar</a>
                  </div>
                </li>
                <li>
                  <div class="tabla-precio">
                    <h3>Pase por 2 días</h3>
                    <p class="numero">45€</p>
                    <ul>
                      <li>Bocadillos gratis</li>
                      <li>Todas las conferencias</li>
                      <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="btn hollow">Comprar</a>
                  </div>
                </li>
              </ul>
            </div>
          </section>
          
          <div id="mapa" class="mapa">
            
            
            
          </div>
          
          <section class="seccion">
            <h2>Testimoniales</h2>
            <div class="testimoniales contenedor clearfix">
              <div class="testimonial">
                <blockquote>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut tempore voluptas fugiat dolorum eveniet cupiditate atque, eaque est similique esse iure doloribus possimus exercitationem sunt quidem numquam error, facilis odit.</p>
                  <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Antonio Calero <span>Programador Back End</span></cite>
                  </footer>
                </blockquote>
              </div> <!-- TESTIMONIAL -->
              <div class="testimonial">
                <blockquote>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut tempore voluptas fugiat dolorum eveniet cupiditate atque, eaque est similique esse iure doloribus possimus exercitationem sunt quidem numquam error, facilis odit.</p>
                  <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Antonio Calero <span>Programador Back End</span></cite>
                  </footer>
                </blockquote>
              </div> <!-- TESTIMONIAL -->
              <div class="testimonial">
                <blockquote>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut tempore voluptas fugiat dolorum eveniet cupiditate atque, eaque est similique esse iure doloribus possimus exercitationem sunt quidem numquam error, facilis odit.</p>
                  <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Antonio Calero <span>Programador Back End</span></cite>
                  </footer>
                </blockquote>
              </div> <!-- TESTIMONIAL -->
            </div>
          </section>
          
          <div class="newsletter parallax">
            <div class="contenido contenedor">
              <p>Regístrate a nuestro Newsletter:</p>
              <h3>gdlwebcamp</h3>
              <a href="#" class="btn transparent">Registro</a>
            </div><!-- Contenido -->
          </div><!-- Newsletter -->
          
          <section class="seccion">
            <h2>Faltan</h2>
            <div class="cuenta-regresiva contenedor">
              <ul class="clearfix">
                <li><p id="dias" class="numero"></p>Días</li>
                <li><p id="horas" class="numero"></p>Horas</li>
                <li><p id="minutos" class="numero"></p>Minutos</li>
                <li><p id="segundos" class="numero"></p>Segundos</li>
              </ul>
              
            </div>
          </section>
   

          <?php include_once 'includes/templates/footer.php' ?>
        