        <!-- Links -->
        <ul class="nav pull-right">
          <li class="dropdown dropdown-big"><a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo site_url("pendientes"); ?>"></a>
                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -->
                    <h5><i class="icon-envelope-alt"></i> Pendientes</h5>
                    <!-- Use hr tag to add border -->
                    <hr>
                  </li>
                  <?php 
                  if (isset($pendientes) && !empty($pendientes)) {
                    foreach ($pendientes as $pendiente) {
                      echo "<li>";
                      echo "<a href=\"".site_url("pendientes/ver/".$pendiente->id)."\">".$pendiente->nombre." - ".$pendiente->oportunidad."</a>";
                      echo "<p>".$pendiente->fecha ." - ".$pendiente->hora ."</p><hr>";
                      echo "</li>";
                    }
                  }
                  ?>
                  <li>
                    <div class="drop-foot">
                      <a href="<?php echo site_url("pendientes"); ?>">ver todos</a>
                    </div>
                  </li>                                    
                </ul>
          </li>
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <?php echo ($this->session->userdata('user_level') == $this->config->item('admin_level')) ? "Administrador": "Usuario"; ?> <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <!--li><a href="<?php echo site_url("configuraciones"); ?>"><i class="icon-cogs"></i> Configuración</a></li-->
              <li><a href="<?php echo site_url("secure/logout"); ?>"><i class="icon-off"></i> Salir</a></li>
            </ul>
          </li>
          
        </ul>