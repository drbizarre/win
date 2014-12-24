<ul class="navi">
    <li class="nblue <?php echo ($current=="administracion")?"current":""; ?>"><a href="<?php echo site_url("empresa"); ?>"><i class="icon-desktop"></i> Bienvenido</a></li>
	<li class="nlightblue <?php echo ($current=="empleados")?"current":""; ?>"><a href="<?php echo site_url("empresa/empleados"); ?>"><i class="icon-group"></i> Empleados</a></li>
    <li class="nlightblue <?php echo ($current=="nominas")?"current":""; ?>"><a href="<?php echo site_url("empresa/nominas"); ?>"><i class="icon-money"></i> Nominas</a></li>                        
</ul>
