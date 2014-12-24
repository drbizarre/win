<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <?php $data["current"] = "configuracion"; $this->load->view("admin/includes/menu",$data); ?>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Nuevo Usuario 
          <!-- page meta -->
          <span class="page-meta">Agregar Nuevo Usuario</span>
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
                  <div class="pull-left">Agregar Nuevo Usuario</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php $create_form = array('id'=>'users-form','class' => 'form-horizontal'); ?>

<?php echo form_open('admin/panel/create', $create_form); ?>

                      <div class="control-group">
                        <label class="control-label" for="username">Usuario</label>
                        <div class="controls">
                          <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>"  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="unidad">Role</label>
                        <div class="controls">
                          <select id="role" name="role" style="width:200px;">
                            <option value="0">Selecciona</option>
                          <?php 
                          if (isset($roles) && !empty($roles)) {
                            foreach ($roles as $role) {
                              echo "<option value=\"".$role->id."\">".$role->nombre."</option>";
                            }
                          }
                          ?>
                          </select>
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
                      <div class="control-group">
                        <label class="control-label" for="regiones">Regiones</label>
                        <div class="controls">
                         
                          <?php 
                          if (isset($regiones) && !empty($regiones)) {
                            foreach ($regiones as $region) {
                              echo "<input type=\"checkbox\" name=\"region[]\" value=\"".$region->id."\">".$region->nombre."<br>";
                            }
                          }
                          ?>
                        </div>
                      </div>                      
                      <div class="control-group">
                        <label class="control-label" for="email">Correo Electrónico</label>
                        <div class="controls">
                          <input type="text" id="email" name="email" value=""  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="password">Contraseña</label>
                        <div class="controls">
                          <input type="password" id="password" name="password" value=""  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="confirm_password">Confirmar Contraseña</label>
                        <div class="controls">
                          <input type="password" id="confirm_password" name="confirm_password" value=""  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="first_name">Nombre</label>
                        <div class="controls">
                          <input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>"  class="span5">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="last_name">Apellido</label>
                        <div class="controls">
                          <input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>"  class="span5">
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




