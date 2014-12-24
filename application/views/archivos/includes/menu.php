<ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

            <li class="nblue <?php echo ($current=="administracion")?"current":""; ?>"><a href="<?php echo site_url("admin"); ?>"><i class="icon-desktop"></i> Bienvenido</a></li>
          <li class="nlightblue <?php echo ($current=="empresas")?"current":""; ?>"><a href="<?php echo site_url("empresas"); ?>"><i class="icon-group"></i> Empresas</a></li>
            <li class="nlightblue <?php echo ($current=="empleados")?"current":""; ?>"><a href="<?php echo site_url("empleados"); ?>"><i class="icon-user"></i> Empleados</a></li>                        
            <li class="nlightblue <?php echo ($current=="archivos")?"current":""; ?>"><a href="<?php echo site_url("archivos"); ?>"><i class="icon-money"></i> Archivos</a></li>
              <li class="nlightblue <?php echo ($current=="nominas")?"current":""; ?>"><a href="<?php echo site_url("nominas"); ?>"><i class="icon-money"></i> Nominas</a></li>                        
              <li class="has_submenu nlightblue <?php echo ($current=="configuracion")?"current open":""; ?>">
              <a href="#">
                <i class="icon-wrench"></i> Configuración 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <ul>
                   <li><a href="<?php echo site_url("regiones"); ?>">Regiones</a></li>
                   <li><a href="<?php echo site_url("roles"); ?>">Roles de Usuarios</a></li>
                   <li><a href="<?php echo site_url("admin/usuarios"); ?>">Usuarios</a></li>
                </ul>
              </a>
            </li>

          </ul>
