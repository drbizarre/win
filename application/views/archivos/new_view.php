<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <?php $data["current"] = "empleados"; $this->load->view("empleados/includes/menu",$data); ?>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Empleado 
          <!-- page meta -->
          
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">
          <?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
<?php echo $this->session->flashdata('message'); ?>
<?php if (!empty($message)) { echo $message; } ?>

        	 <div class="widget wlightblue">
<div class="widget-head">
                  <div class="pull-left">Nuevo</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php $create_form = array('id'=>'prospectos-form','class' => 'form-horizontal'); ?>

<?php echo form_open('empleados/save', $create_form); ?>
                      <div class="row-fluid">
                        <div class="span12">
                          <div class="control-group">
                            <label class="control-label" for="no">No.</label>
                            <div class="controls">
                              <input type="text" id="no" name="no" value="<?php echo set_value('no'); ?>"  >
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row-fluid">
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="nombre">Nombre</label>
                            <div class="controls">
                              <input type="text" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>"  >
                            </div>
                          </div>
                        </div>
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="codigo">Apellido</label>
                            <div class="controls">
                              <input type="text" id="apellidos" name="apellidos" value="<?php echo set_value('apellidos'); ?>" >
                            </div>
                          </div>
                        </div>
                      </div>
                        
                          <div class="control-group">
                        <label class="control-label" for="unidad">Empresa</label>
                        <div class="controls">
                          <select id="empresa" name="empresa" style="width:200px;">
                            <option value="0">Selecciona</option>
                          <?php 
                          if (isset($empresas) && !empty($empresas)) {
                            foreach ($empresas as $empresa) {
                              echo "<option value=\"".$empresa->id."\">".$empresa->nombre."</option>";
                            }
                          }
                          ?>
                          </select>
                        </div>
                      </div>    

                      <div class="row-fluid">
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="puesto">Puesto</label>
                            <div class="controls">
                              <input type="text" id="puesto" name="puesto" value="<?php echo set_value('puesto'); ?>"  >
                            </div>
                          </div>
                        </div>
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="region">Región</label>
                            <div class="controls">
                              <select id="region" name="region">
                                <option value="">Selecciona</option>
                              <?php 
                              if (isset($regiones) && !empty($regiones)) {
                                foreach ($regiones as $region) {
                                  echo "<option value=\"".$region->id."\">".$region->nombre."</option>";
                                }
                              }
                              ?>                                                              
                              </select>
                              
                              
                            </div>
                          </div>
                        </div>
                      </div>                                        
                      <div class="row-fluid">
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="ciudad">Ciudad</label>
                            <div class="controls">
                              <input type="text" id="ciudad" name="ciudad" value="<?php echo set_value('ciudad'); ?>"  >
                            </div>
                          </div>
                        </div>
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="salario">Salario</label>
                            <div class="controls">
                              <input type="text" id="salario" name="salario" value="<?php echo set_value('salario'); ?>" >
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




