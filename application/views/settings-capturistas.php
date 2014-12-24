        <!-- Links -->
        <ul class="nav pull-right">
          <li class="dropdown pull-right">  

            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <img class="nav-user-pic img-responsive" alt="" src="<?php echo base_url(); ?>assets/img/user.jpg">          
              <?php echo ($this->session->userdata('user_level') == $this->config->item('admin_level')) ? "Administrador": "Afiliado: ".strtoupper($this->session->userdata('first_name')); ?> <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url("secure/logout"); ?>"><i class="icon-off"></i> Salir</a></li>
            </ul>
          </li>
          
        </ul>