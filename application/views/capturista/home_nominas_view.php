<!-- Main content starts -->

<div class="content">
<div id="myModal" class="modal hide">
    <div class="modal-header">
        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Eliminar</h3>
    </div>
    <div class="modal-body">
        <p>Eliminando Fase de Prospectación del sistema.</p>
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
          <?php $data["current"] = "nominas"; $this->load->view("capturista/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Nominas 
          <!-- page meta -->
          <span class="page-meta">Lista de nominas.</span>
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
                  <div class="pull-left">Nominas</div>
                       <div class="pull-right">
                        <p><a href="<?php echo site_url("capturista/nuevo"); ?>" class="btn btn-primary">Nuevo</a></p>
                      </div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
                    <div id="cotien" style="display:none;" class="alert alert-success">Nomina generada</div>
					<?php
					if(isset($mensaje) && !empty($mensaje)){
						echo "<div class=\"alert alert-".$class."\">".$mensaje."</div>";
					}
                    ?>
<table class="table  table-bordered " id="estudios-listing">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Empresa</th>
                          <th>Periodo</th>
                          <th>Total</th>
                          <th>Creada el</th>
                          <th></th>
                          
                        </tr>
                      </thead>
                      <tbody>

                    <?php 
                    if (isset($nominas) && !empty($nominas)) {
                      foreach ($nominas as $nomina) {
                        $pdf = ($nomina->pdf==1)?"<a target=\"_blank\" class=\"btn btn-mini btn-warning\" href=\"http://creactivoclientes.com/sowi/cotizaciones/Nomina".$nomina->id.".pdf\"><i class=\"icon-file\"></i> </a>":"<a  id=\"pdf".$nomina->id."\" target=\"_blank\" class=\"btn btn-mini btn-warning\" href=\"http://creactivoclientes.com/sowi/cotizaciones/Nomina".$nomina->id.".pdf\" style=\"display:none;\"><i class=\"icon-file\"></i> </a>";
                        echo "<tr>
                        <td>".$nomina->id."</td>
                        <td><strong>".$nomina->empresa."</td>
                        <td>".$nomina->fechai." - ".$nomina->fechat."</td>
                        <td>$".number_format($nomina->total,2)."</td>
                        <td>".$nomina->created_date."</td>
                        <td>
                              $pdf
                              <a title=\"".$nomina->id."\" target=\"_blank\" class=\"btn btn-mini btn-success ajax\" href=\"".site_url("capturista/pdf/".$nomina->id)."\"><i class=\"icon-envelope\"></i> </a>
                              <a class=\"btn btn-mini btn-danger\" data-id=\"".$nomina->id."\" href=\"".site_url("capturista/delete/".$nomina->id)."\"><i class=\"icon-remove\"></i> </a>                        
                        </td>
                        </tr>";
                      }
                    }else{
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