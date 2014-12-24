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
	      <h2 class="pull-left">Usuarios 
          <!-- page meta -->
          <span class="page-meta">Ediatar Usuario</span>
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
                  <div class="pull-left">Modificar Información de Usuario</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
            <?php $create_form = array('id'=>'users-form-edit','class' => 'form-horizontal'); ?>

            <?php echo form_open('admin/actualizar_usuario', $create_form); ?>
               <input type="hidden" id="id" name="id" value="<?php echo $usuario->user_id; ?>">
                      <div class="control-group">
                        <label class="control-label" for="username">Usuario</label>
                        <div class="controls">
                          <input type="text" id="username" name="username" value="<?php echo $usuario->username; ?>"  class="span3">
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
                                if ($role->id == $usuario->user_level) {
                                  echo "<option selected=\"selected\" value=\"".$role->id."\">".$role->nombre."</option>";  
                                }else{
                                  echo "<option value=\"".$role->id."\">".$role->nombre."</option>";
                                }
                              }
                            }
                          ?>
                          </select>
                        </div>
                      </div>                      
                      <!--div class="control-group">
                        <label class="control-label" for="saldo">Saldo</label>
                        <div class="controls">
                          <input type="text" id="saldo" name="saldo" value="<?php echo $usuario->saldo; ?>"  class="span2">
                        </div>
                      </div-->                      
                      <!--div class="control-group">
                        <label class="control-label" for="unidad">Business Unit</label>
                        <div class="controls">
                          <select id="unidad" name="unidad" style="width:200px;">
                            <option value="0">Selecciona</option>
                          <?php 
                          if (isset($business) && !empty($business)) {
                            foreach ($business as $busines) {
                              if ($busines->id == $usuario->unidad) {
                                echo "<option selected value=\"".$busines->id."\">".$busines->unidad." ".$busines->idbu."</option>";  
                              }else{
                                echo "<option value=\"".$busines->id."\">".$busines->unidad." ".$busines->idbu."</option>";
                              }
                            }
                          }else{
                            echo "string";
                          }
                          ?>
                          </select>
                        </div>
                      </div> 
                      <div class="control-group">
                        <label class="control-label" for="unidad">Projects</label>
                        <div class="controls">
                          <select id="project" name="project" style="width:200px;">
                            <option value="0">Selecciona</option>
                          <?php 
                          if (isset($projects) && !empty($projects)) {
                            foreach ($projects as $project) {
                              if ($project->id == $usuario->project) {
                                echo "<option selected value=\"".$project->id."\">".$project->nombre." ".$project->idp."</option>";  
                              }else{
                                echo "<option value=\"".$project->id."\">".$project->nombre." ".$project->idp."</option>";
                              }
                            }
                          }else{
                            echo "string";
                          }
                          ?>
                          </select>
                        </div>
                      </div--> 
                      <div class="control-group">
                        <label class="control-label" for="email">Correo Electrónico</label>
                        <div class="controls">
                          <input type="text" id="email" name="email" value="<?php echo $usuario->email; ?>"  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="password">Contraseña</label>
                        <div class="controls">
                          <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>"  class="span3">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="first_name">Nombre</label>
                        <div class="controls">
                          <input type="text" id="first_name" name="first_name" value="<?php echo $usuario->first_name; ?>"  class="span5">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="last_name">Nombre</label>
                        <div class="controls">
                          <input type="text" id="last_name" name="last_name" value="<?php echo $usuario->last_name; ?>"  class="span5">
                        </div>
                      </div>

                          

                      <!--div class="control-group">
                        <label class="control-label" for="last_name">Tipo de Usuario</label>
                        <div class="controls">
                          <select id="role" name="role" style="width:200px;">
                            <option value="0">Selecciona</option>
                            <option value="1" <?php echo ($usuario->user_level==1)?"selected":""; ?>>Cliente</option>
                            <option value="69" <?php echo ($usuario->user_level==69)?"selected":""; ?>>Administrador</option>
                          </select>
                        </div>
                      </div-->
               

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




