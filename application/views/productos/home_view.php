<!-- Main content starts -->

<div class="content">
<div id="myModal" class="modal hide">
    <div class="modal-header">
        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Eliminar</h3>
    </div>
    <div class="modal-body">
        <p>Eliminando <?php echo $tipo; ?> del sistema.</p>
        <p>Estas seguro?</p>
    </div>
    <div class="modal-footer">
      <a href="#" id="btnYes" class="btn danger">Si</a>
      <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
    </div>
</div>
  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
          <?php $data["current"] = "catalogos"; $this->load->view("productos/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left"><?php echo ($tipo=="producto")?"Productos":"Servicios"; ?> 
          <span class="page-meta"><?php echo ($tipo=="producto")?"Productos":"Servicios"; ?> ofrecidos para clientes.</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

   <div class="widget wlightblue">

                <div class="widget-head">
                  <div class="pull-left"><?php echo ($tipo=="producto")?"Productos":"Servicios"; ?> </div>
                       <div class="pull-right">
                        <?php if ($tipo=="producto"): ?>
                          <p><a href="<?php echo site_url("productos/nuevo"); ?>" class="btn btn-primary">Nuevo</a></p>  
                        <?php endif ?>
                        <?php if ($tipo=="servicio"): ?>
                          <p><a href="<?php echo site_url("servicios/nuevo"); ?>" class="btn btn-primary">Nuevo</a></p>  
                        <?php endif ?>                        
                      </div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
					<?php
					if(isset($mensaje) && !empty($mensaje)){
						echo "<div class=\"alert alert-".$class."\">".$mensaje."</div>";
					}
                    ?>
                    <table class="table  table-bordered " id="estudios-listing">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th><?php echo ucfirst($tipo); ?></th>
                          <th>Precio</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                    <?php 
                    if (isset($productos) && !empty($productos)) {
                      foreach ($productos as $producto) {
                        echo "<tr>
                        <td>".$producto->id."</td>
                        <td><strong>".$producto->nombre."</strong></td>
                        <td>
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("productos/edit/".$producto->id)."\"><i class=\"icon-pencil\"></i> </a>
                              <a class=\"btn btn-mini btn-danger\" data-id=\"".$producto->id."\" href=\"".site_url("productos/delete/".$producto->id)."\"><i class=\"icon-remove\"></i> </a>                        
                        </td>
                        </tr>";
                      }
                    }elseif($tipo=="producto"){
                      echo "<tr>";
                      echo "<td colspan=\"4\">No se encontraron registros grabados.</td>";
                      echo "</tr>";
                    }
                    ?>
                    <?php 
                    if (isset($servicios) && !empty($servicios)) {
                      foreach ($servicios as $servicio) {
                        echo "<tr>
                        <td>".$servicio->id."</td>
                        <td><strong>".$servicio->nombre."</strong></td>
                        <td>
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("servicios/edit/".$servicio->id)."\"><i class=\"icon-pencil\"></i> </a>
                              <a class=\"btn btn-mini btn-danger\" data-id=\"".$servicio->id."\" href=\"".site_url("servicios/delete/".$servicio->id)."\"><i class=\"icon-remove\"></i> </a>                        
                        </td>
                        </tr>";
                      }
                    }elseif($tipo=="servicio"){
                      echo "<tr>";
                      echo "<td colspan=\"4\">No se encontraron registros grabados.</td>";
                      echo "</tr>";
                    }
                    ?>                    
                      </tbody>
                    </table>

                  </div>

                </div>


              </div>

          </div>       

        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->


 

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 