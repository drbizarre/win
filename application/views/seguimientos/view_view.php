<!-- Main content starts -->

<div class="content">

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
          <span class="page-meta">Ver Datos</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

          <?php 
          if (isset($mensaje)) {
            echo "<div class=\"alert alert-success\">
                      Información Actualizada.
                    </div>";
          }
           ?>

        	 <div class="widget wlightblue">
<div class="widget-head">
                  <div class="pull-left">Revisar Pendiente</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
<input type="hidden" id="id" name="id" value="<?php echo $pendiente->id; ?>">
              <table class="table">
                <tr>
                  <td>Estado</td>
                  <td>
 <div class="controls">                               
                                              <div class="toggle-button">
                                                  <input id="toogle-checkbox" type="checkbox" value="value1" <?php echo ($pendiente->status=="on")?"checked=\"checked\"":""; ?>>
                                              </div> 
                                            </div>                    
                  </td>
                </tr>
                <tr>
                  <td>Empresa</td>
                  <td><?php echo $pendiente->cliente_id; ?></td>
                </tr>
                <tr>
                  <td>Fecha</td>
                  <td><?php echo $pendiente->fecha; ?></td>
                </tr>                
                <tr>
                  <td>Hora</td>
                  <td><?php echo $pendiente->hora; ?></td>
                </tr>
                <tr>
                  <td>Pendiente</td>
                  <td><?php echo $pendiente->pendiente; ?></td>
                </tr>
                <tr>
                  <td>Oportunidad</td>
                  <td><?php echo $pendiente->oportunidad; ?></td>
                </tr>  
                <tr>
                  <td>Comentario</td>
                  <td><?php echo $pendiente->comentario; ?></td>
                </tr>
              </table>
                       

                         


<hr>
<div class="form_button"><a class="btn" href="<?php echo site_url("pendientes"); ?>">Regresar a pendientes</a></div>


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




