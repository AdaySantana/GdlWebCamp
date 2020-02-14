       
          <footer class="site-footer">
            <div class="contenedor clearfix">
              <div class="footer-informacion">
                <h3>Sobre <span>gdlwebcamp</span></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, velit eos impedit perspiciatis ipsa aliquid placeat iste libero voluptate cum aperiam sit! Ducimus dolorum eum ipsa dicta, dolores magnam atque.</p>
              </div>
              <div class="ultimos-tweets">
                <h3>Últimos <span>tweets</span></h3>
                <ul>
                  <li>sit amet consectetur adipisicing elit. Nulla soluta repudiandae nesciunt dolorum est blanditiis hic consequatur</li>
                  <li> ipsa consequuntur fugit quos delectus quis aperiam fugiat porro ratione laudantium laborum at!</li>
                  <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla soluta repudiandae nesciunt dolorum est blanditiis hic consequatur</li>
                </ul>
              </div>
              <div class="menu">
                <h3>Redes <span>Sociales</span></h3>
                <nav class="redes-sociales">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-pinterest-p"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
              </div>
            </div>
            
            <p class="copyright">Todos los derechos reservados GDLWEBCAMP 2019</p>
            
          </footer>
          
          
          <script src="js/vendor/modernizr-3.7.1.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
          <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
          <script src="js/plugins.js"></script>

          <?php $archivo = basename($_SERVER['PHP_SELF']);
                $pagina = str_replace('.php', '', $archivo);
                if($pagina == 'invitados'){
                 echo '<script src="js/jquery.colorbox-min.js"></script>';

                } else if($pagina == 'conferencias'){

                echo  '<script src="js/lightbox.js"></script>';
                }
          ?>
          <script src="js/jquery.countdown.min.js"></script>
          <script src="js/jquery.animateNumber.min.js"></script>
          <script src="js/jquery.lettering.js"></script>
          <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
          <script src="js/main.js"></script>
          
          <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
          <script>
            window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
          </script>
          <script src="https://www.google-analytics.com/analytics.js" async></script>
        </body>
        
        </html>