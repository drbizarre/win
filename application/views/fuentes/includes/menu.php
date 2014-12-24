<ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

            <li class="nblue <?php echo ($current=="administracion")?"current":""; ?>"><a href="<?php echo site_url("admin"); ?>"><i class="icon-desktop"></i> Bienvenido</a></li>
            <li class="nlightblue <?php echo ($current=="cotizaciones")?"current":""; ?>"><a href="<?php echo site_url("cotizacion"); ?>"><i class="icon-file"></i> Cotizaciónes</a></li>
<li class="nlightblue <?php echo ($current=="administracion")?"current":""; ?>">
              <a href="<?php echo site_url("prospectos"); ?>"><i class="icon-group"></i> Prospectos</a>
            </li>
            <li class="nlightblue <?php echo ($current=="clientes")?"current":""; ?>"><a href="<?php echo site_url("clientes"); ?>"><i class="icon-user"></i> Clientes</a></li>                        
            <li class="nlightblue <?php echo ($current=="administracion")?"current":""; ?>"><a href="<?php echo site_url("pendientes"); ?>"><i class="icon-time"></i> Pendientes</a></li>            
            <li class="has_submenu nlightblue <?php echo ($current=="catalogos")?"current open":""; ?>">  
              <a href="#">
                <i class="icon-th-list"></i> Catálogos 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <ul>
                  <li><a href="<?php echo site_url("productos"); ?>">Productos</a></li>
                  <li><a href="<?php echo site_url("servicios"); ?>">Servicios</a></li>
                  <li><a href="<?php echo site_url("paquetes"); ?>">Paquetes</a></li>
                </ul>
              </a>
            </li>            
            <li class="has_submenu nlightblue <?php echo ($current=="configuracion")?"current open":""; ?>">
              <a href="#">
                <i class="icon-wrench"></i> Configuración 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <ul>
                  <li><a href="<?php echo site_url("fases"); ?>">Fases de Prospectación</a></li>
                  <li><a href="<?php echo site_url("fuentes"); ?>">Fuentes de Prospectación</a></li>
                  <li><a href="<?php echo site_url("roles"); ?>">Roles de Usuarios</a></li>
                  <li><a href="<?php echo site_url("admin/usuarios"); ?>">Usuarios</a></li>
                </ul>
              </a>
            </li>

          </ul>
