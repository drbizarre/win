        <!-- Links -->
        <ul class="nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <?php echo ($this->session->userdata('user_level') == $this->config->item('admin_level')) ? "Administrador": "Usuario"; ?> <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url("secure/logout"); ?>"><i class="icon-off"></i> Salir</a></li>
            </ul>
          </li>
          
        </ul>