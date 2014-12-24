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
          <?php $data["current"] = "archivos"; $this->load->view("capturista/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Mis Archivos 
          <!-- page meta -->
          <span class="page-meta">Lista de archivos.</span>
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
                  <div class="pull-left">Carpetas</div>
                       <div class="pull-right">
                        
                      </div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
                    
    <div class="accordion" id="accordion2">
      <?php
      if (isset($tipos) && !empty($tipos)) {
        $i=1;
        foreach ($tipos as $tipo) {
          
          $counter = 0;
          
          foreach ($archivos as $archivo) {
            if ($archivo->tipo==$tipo->nombre) {
              $counter++;
            }
          }
          if ($counter>0) {
            
          
          echo "<div class=\"accordion-group\">";
            echo "<div class=\"accordion-heading\">";
              echo "<a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion2\" href=\"#collapse".$i."\"><strong>".$tipo->nombre."<span style=\"float:right;\" class=\"badge badge-success\">(".$counter.")</span></strong></a>";
            echo "</div>";
            echo "<div id=\"collapse".$i."\" class=\"accordion-body collapse \">";
              echo "<div class=\"accordion-inner\">";
                echo "<ul class=\"nav nav-tabs nav-stacked\">";
                  if (!empty($archivos)) {
                    foreach ($archivos as $archivo) {

                      if ($archivo->tipo==$tipo->nombre) {
                        echo "<li><a target=\"_blank\" href=\"".base_url()."media/".$archivo->archivo."\">".$archivo->archivo."</a></li>";
                      }
                    }
                  }else{
                    echo "<li>-</li>";
                  }
                echo "</ul>";
              echo "</div>";
            echo "</div>";
          echo "</div>";
          }
          $i++;
        }

      }
      ?>
    </div>
                   
					<?php
					if(isset($mensaje) && !empty($mensaje)){
						echo "<div class=\"alert alert-".$class."\">".$mensaje."</div>";
					}
                    ?>

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