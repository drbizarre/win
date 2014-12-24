<!-- Main content starts -->

<div class="content">
<div id="myModal" class="modal hide">
    <div class="modal-header">
        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Eliminar</h3>
    </div>
    <div class="modal-body">
        <p>Eliminando empresa del sistema.</p>
        <p>Estas seguro?</p>
    </div>
    <div class="modal-footer">
      <button id="btnYes" class="btn danger">SI</button>
      <!--a href="$" id="btnYes" class="btn danger">Si</a-->
      <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
    </div>
</div>
  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
          <?php $data["current"] = "empresas"; $this->load->view("empresas/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Empresas 
          <!-- page meta -->
          <span class="page-meta">Lista de Empresas</span>
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
                  <div class="pull-left">Empresas</div>
                       <div class="pull-right">
                        <p><a href="<?php echo site_url("empresas/nuevo"); ?>" class="btn btn-primary">Nuevo</a></p>
                      </div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
					<?php
					if(isset($mensaje) && !empty($mensaje)){
						echo "<div class=\"alert alert-".$class."\">".$mensaje."</div>";
					}
                    ?>
                    <table class="table table-bordered" id="estudios-listing">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Fecha de registro</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                  <?php 
                    if (isset($empresas) && !empty($empresas)) {
                      foreach ($empresas as $empresa) {
                        echo "<tr id=\"".$empresa->id."\">
                        <td>".$empresa->id."</td>
                        <td><strong>".$empresa->nombre."</strong></td>
                        <td>".$empresa->descripcion."</td>
                        <td>".$empresa->creacted_date."</td>
                        <td>
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("empresas/edit/".$empresa->id)."\"><i class=\"icon-pencil\"></i> </a>
                              
                              <a class=\"btn btn-mini btn-danger confirm-delete\" data-id=\"".$empresa->id."\" href=\"".site_url("empresas/delete/".$empresa->id)."\"><i class=\"icon-remove\"></i> </a>                        
                        </td>
                        </tr>";
                      }
                    }else{
                      echo "<tr>";
                      echo "<td colspan=\"5\">No se encontraron registros grabados.</td>";
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