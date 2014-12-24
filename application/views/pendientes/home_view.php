<!-- Main content starts -->

<div class="content">
<div id="myModal" class="modal hide">
    <div class="modal-header">
        <a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Eliminar</h3>
    </div>
    <div class="modal-body">
        <p>Eliminando Prospecto del sistema.</p>
        <p>Estas seguro?</p>
    </div>
    <div class="modal-footer">
      <a href="javascript:void(0);" id="btnYes" class="btn danger">Si</a>
      <a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
    </div>
</div>
  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
          <?php $data["current"] = "pendientes"; $this->load->view("pendientes/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Pendientes 
          <!-- page meta -->
          <span class="page-meta">Lista de Pendientes</span>
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
                  <div class="pull-left">Pendientes</div>
                       <div class="pull-right">
                        <p><a href="<?php echo site_url("pendientes/nuevo"); ?>" class="btn btn-primary">Nuevo</a></p>
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
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>&nbsp;</th>
                          <th>Nombre/Empresa</th>
                          <th>Pendiente</th>
                          <th>Oportunidad</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                  <?php 
                    if (isset($pendientes) && !empty($pendientes)) {
     
                      foreach ($pendientes as $pendiente) {
                        $date1 = new DateTime("now");
                        $date2 = new DateTime($pendiente->fecha);
                        $status = "";
                        /*if ($date2 < $date1) {
                          $status = "p";
                        }*/
                        echo "<tr id=\"".$pendiente->id."\">
                        <td>".$pendiente->id."</td>
                        <td>".$pendiente->fecha."</td>
                        <td>".$pendiente->hora."</td>                        
                        <td>".$status."</td>
                        <td><strong>".$pendiente->nombre."</strong></td>
                        <td><a href=\"".site_url("pendientes/ver/".$pendiente->id)."\">".$pendiente->pendiente."</a></td>                        
                        <td>".$pendiente->oportunidad."</td>                        
                        <td>
                              <a class=\"btn btn-mini btn-warning\" href=\"".site_url("pendientes/edit/".$pendiente->id)."\"><i class=\"icon-pencil\"></i> </a>
                              <a class=\"btn btn-mini btn-danger confirm-delete\" data-id=\"".$pendiente->id."\" href=\"".site_url("pendientes/delete/".$pendiente->id)."\"><i class=\"icon-remove\"></i> </a>                        
                        </td>
                        </tr>";
                      }
                    }else{
                      echo "<tr>";
                      echo "<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>";
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