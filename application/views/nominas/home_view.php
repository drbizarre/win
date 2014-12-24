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
          <?php $data["current"] = "nominas"; $this->load->view("nominas/includes/menu",$data); ?>
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
          <span class="page-meta">Generar nomina de empresas.</span>
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
                        <p><a href="<?php echo site_url("nominas/nuevo"); ?>" class="btn btn-primary">Nuevo</a></p>
                      </div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
                    <div id="cotien" style="display:none;" class="alert alert-success">Nomina enviada</div>
					<?php
					if(isset($mensaje) && !empty($mensaje)){
						echo "<div class=\"alert alert-".$class."\">".$mensaje."</div>";
					}
                    ?>
                    <table class="table  table-bordered " id="estudios-listing">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Periodo</th>
                          <th>Total</th>
                          <th>Creada el</th>
                          <th>Exportar</th>
                          <th>Borrar</th>
                        </tr>
                      </thead>
                      <tbody>

                    <?php 
                    function numtomes($num){
                      switch ($num) {
                        case '01': $mes = "Ene"; break;
                        case '02': $mes = "Feb"; break;
                        case '03': $mes = "Mar"; break;
                        case '04': $mes = "Abr"; break;
                        case '05': $mes = "May"; break;
                        case '06': $mes = "Jun"; break;
                        case '07': $mes = "Jul"; break;
                        case '08': $mes = "Ago"; break;
                        case '09': $mes = "Sep"; break;
                        case '10': $mes = "Oct"; break;
                        case '11': $mes = "Nov"; break;
                        case '12': $mes = "Dic"; break;
                        case '00': $mes = "-"; break;
                      }
                      return $mes;
                    }
                    if (isset($nominas) && !empty($nominas)) {
                      foreach ($nominas as $nomina) {
                        $fechai = explode("-", $nomina->fechai);
                        $fechat = explode("-", $nomina->fechat);
                        $fechac = explode("-", $nomina->created_date);
                        //$pdf = ($nomina->status=="completa")?"<a target=\"_blank\" class=\"btn btn-mini btn-warning\" href=\"http://creactivoclientes.com/sowi/cotizaciones/Nomina".$nomina->id.".pdf\"><i class=\"icon-file\"></i> </a>":"";
                        echo "<tr>
                        <td>".$nomina->id."</td>

                        <td><i>".$fechai[2]." de ".numtomes($fechai[1])." del ".$fechai[0]. "</i> al <i>".$fechat[2]." de ".numtomes($fechat[1])." del ".$fechat[0]."</i></td>
                        <td>$".number_format($nomina->total,2)."</td>
                        <td>".$fechai[2]."/".$fechac[1]."/".$fechac[0]."</td>
                        <td>
                              <a target=\"_blank\" href=\"".site_url()."export.php?nomina=".$nomina->id."\"><img src=\"".base_url("assets/img/excel.jpg")."\" /> </a>
                              </td>
                        <td>
                               <a class=\"btn btn-mini btn-danger\" data-id=\"".$nomina->id."\" href=\"".site_url("nominas/deleteg/".$nomina->id)."\"><i class=\"icon-remove\"></i> </a>                        
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