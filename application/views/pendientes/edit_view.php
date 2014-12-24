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
          <span class="page-meta">Modificar Datos</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">
          <?php //echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
<?php //echo $this->session->flashdata('message'); ?>
<?php //if (!empty($message)) { echo $message; } ?>

          <?php 
          if (isset($mensaje)) {
            echo "<div class=\"alert alert-success\">
                      Información Actualizada.
                    </div>";
          }
           ?>

        	 <div class="widget wlightblue">
<div class="widget-head">
                  <div class="pull-left">Editar Pendiente</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php $create_form = array('id'=>'estudios-form-edit','class' => 'form-horizontal'); ?>

<?php echo form_open('pendientes/update', $create_form); ?>
<input type="hidden" id="id" name="id" value="<?php echo $pendiente->id; ?>">

                        <div class="control-group">
                        <label class="control-label" for="empresa">Empresa</label>
                        <div class="controls">
                              <?php 
                              if (isset($clientes) && !empty($clientes)) {
                                echo "<select id=\"cliente\" name=\"cliente\">";
                                echo "<option value=\"\">Selecciona</option>";
                                foreach ($clientes as $cliente) {
                                  if ($pendiente->cliente_id==$cliente->id) {
                                    echo "<option selected value=\"".$cliente->id."\">".$cliente->nombre."</option>";  
                                  }else{
                                    echo "<option value=\"".$cliente->id."\">".$cliente->nombre."</option>";
                                  }
                                  
                                }
                                echo "</select>";
                              }
                              ?>                          
                        </div>
                      </div>   
                      <div class="row-fluid">
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="nombre">Fecha</label>
                            <div class="controls ">
                              <?php 
                              $a = explode("-", $pendiente->fecha);
                              $fecha = $a[2]."/".$a[1]."/".$a[0];
                              ?>
                              <div class="input-append bootstrap-timepicker">
                              <input type="text" id="fecha" name="fecha" value="<?php echo $fecha; ?>" class="datepicker input-small" >
                              <span class="add-on"><i class="icon-calendar"></i></span>
                              
                          </i>
                          </div>
                        </span>
                            </div>
                          </div>
                        </div>
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="codigo">Hora</label>
                            <div class="controls">
                              <div class="input-append bootstrap-timepicker">
                                  <input id="timepicker1" name="hora" type="text" class="input-small" value="<?php echo $pendiente->hora; ?>">
                                  <span class="add-on"><i class="icon-time"></i></span>
                              </div>                              
                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row-fluid">
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="pendiente">Pendiente</label>
                            <div class="controls">
                              <input type="text" id="pendiente" name="pendiente" value="<?php echo $pendiente->pendiente; ?>"  >
                            </div>
                          </div>
                        </div>
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="oportunidad">Oportunidad</label>
                            <div class="controls">
                              <input type="text" id="oportunidad" name="oportunidad" value="<?php echo $pendiente->oportunidad; ?>" >
                            </div>
                          </div>
                        </div>
                      </div>                                        
                      <div class="row-fluid">
                        <div class="span12">
                          <div class="control-group">
                            <label class="control-label" for="comentario">Comentarios</label>
                            <div class="controls">
                              <div class="text-area">
                              <textarea id="comentario" name="comentario" class="cleditor"><?php echo $pendiente->comentario; ?></textarea>
                              </div>

                            </div>
                          </div>
                        </div>

                      </div>

                         


<hr>
<div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div>



<?php echo form_close(); ?>
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




