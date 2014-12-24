<!-- Main content starts -->

<div class="content">

      <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <!--- Sidebar navigation -->
          <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
          <ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

            <li class="nblue current open"><a href="<?php echo site_url("recepcionistas"); ?>"><i class="icon-desktop"></i> Panel</a></li>

            <!-- Menu with sub menu -->
            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-group"></i> Pacientes 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li><a href="#"><i class="icon-plus"></i> Altas</a></li>
                  <li><a href="#"><i class="icon-search"></i>Consultar</a></li>
                </ul>
              </a>
            </li>

            <li class="has_submenu nlightblue open">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-book"></i> Citas 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li><a href="<?php echo site_url("citas/nueva") ?>"><i class="icon-plus"></i> Agendar</a></li>
                  <li><a href="#"><i class="icon-search"></i> Consultar</a></li>
                  <li><a href="#"><i class="icon-calendar"></i> Calendario</a></li>
                </ul>
              </a>
            </li>

            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-medkit"></i> Biopsias 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li><a href="#"><i class="icon-plus"></i> Altas</a></li>
                  <li><a href="#"><i class="icon-search"></i> Consultar</a></li>
                </ul>
              </a>
            </li>

            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-money"></i> Corte de caja 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li><a href="#"><i class="icon-plus"></i> Crear</a></li>
                  <li><a href="#"><i class="icon-search"></i> Historial</a></li>
                </ul>
              </a>
            </li>

          </ul>

        </div>

    </div>

    <!-- Sidebar ends -->
  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Citas 
          <!-- page meta -->
          <span class="page-meta">Nueva</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

         

          <div class="row-fluid">
           <!-- Dashboard Graph starts -->

          <div class="row-fluid">

            <div class="span12">

              <div class="widget wlightblue">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left"><strong>Nueva Cita</strong></div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                       <div class="padd">
                  <!-- Widget content -->
                  <!-- Task list starts -->
<?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>

<?php if (!empty($message)) { echo $message; } ?>

           <div class="widget wlightblue">

                
          <?php $create_form = array('id'=>'users-form','class' => 'form-horizontal'); ?>

              <?php echo form_open('citas/save', $create_form); ?>
                      <input type="hidden" id="sucursal" name="sucursal" value="<?php echo $sucursal; ?>">
                      <input type="hidden" id="creada_por" name="creada_por" value="<?php echo $recepcionista; ?>">
                      <input type="hidden" id="asunto_text" name="asunto_text" value="">
                      <input type="hidden" id="paciente_text" name="paciente_text" value="">
                      <input type="hidden" id="tipo_text" name="tipo_text" value="">
                      <input type="hidden" id="atiende_text" name="atiende_text" value="">
                      <div class="row-fluid">
                      <div class="control-group span5">
                            <label class="control-label" for="asunto">Asunto</label>
                            <div class="controls">
                              <select id="asunto" name="asunto" class="span9 combobox">
                                <option value="">Selecciona</option>
                                <?php 
                                if (isset($procedimientos) && !empty($procedimientos)) {
                                  foreach ($procedimientos as $procedimiento) {
                                    echo "<option value=\"".$procedimiento->id."\">".$procedimiento->concepto."</option>";
                                  }
                                }
                                ?>
                              </select>
                          </div>
                     </div>
                   </div>
                      <div class="row-fluid">
                      <div class="control-group span5">
                            <label class="control-label" for="paciente">Paciente</label>
                            <div class="controls">
                              <select id="paciente" name="paciente" class="span9 combobox">
                                <option value="">Selecciona</option>
                                <?php 
                                if (isset($pacientes) && !empty($pacientes)) {
                                  foreach ($pacientes as $paciente) {
                                    echo "<option value=\"".$paciente->id."\">".$paciente->nombre." ".$paciente->apellido."</option>";
                                  }
                                }
                                ?>
                              </select>
                          </div>
                     </div>
                   </div>
                      <div class="row-fluid">
                          <div class="control-group span5">
                            <label class="control-label" for="genero">Atendido por:</label>
                            <div class="controls">
                              <div id="switch-atendido" class="switcher" data-on-label="<i class='icon-female icon-white'></i>" data-off-label="<i class='icon-stethoscope'></i>">
                                <input type="checkbox" checked />
                              </div>                              
                              <input type="hidden" id="tipo" name="tipo" value="cosmetologa">
                            </div>
                          </div> 
                   </div>
                      <div id="cosmetologas-listing" class="row-fluid">
                      <div class="control-group span5">
                            <label class="control-label" for="cosmetologa">Cosmetologa</label>
                            <div class="controls">
                              <select id="atiende" name="atiende" class="span9 combobox">
                                <option value="">Selecciona</option>
                                <?php 
                                if (isset($cosmetologas) && !empty($cosmetologas)) {
                                  foreach ($cosmetologas as $cosmetologa) {
                                    echo "<option value=\"".$cosmetologa->user_id."\">".$cosmetologa->first_name."</option>";
                                  }
                                }
                                ?>
                              </select>
                          </div>
                     </div>
                   </div>
                      <div id="doctores-listing" class="row-fluid">
                      <div class="control-group span5">
                            <label class="control-label" for="doctor">Doctor</label>
                            <div class="controls">
                              <select id="atiende" name="atiende" class="span9 combobox">
                                <option value="">Selecciona</option>
                                <?php 
                                if (isset($doctores) && !empty($doctores)) {
                                  foreach ($doctores as $doctor) {
                                    echo "<option value=\"".$doctor->user_id."\">".$doctor->first_name."</option>";
                                  }
                                }
                                ?>
                              </select>
                          </div>
                     </div>
                   </div>
                   <div class="row-fluid">
                    <div class="control-group">
                      <label class="control-label" for="fecha_inicio">Fecha</label>
                      <div class="controls">
                        <div class="input-append datetimepicker1">
                          <input data-format="yyyy-MM-dd" type="text" id="fecha_inicio" name="fecha_inicio" class="span6">
                          <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>    
                   </div>
                   <div class="row-fluid">
                   <div class="span3">
                    <div class="control-group">
                      <label class="control-label" for="hora_inicio">Desde</label>
                      <div class="controls">
                        <div class="input-append datetimepicker2">
                          <input data-format="hh:mm:ss" type="text" id="hora_inicio" name="hora_inicio" class="span6">
                          <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>    
                   </div>
                   <div class="span3">
                    <div class="control-group">
                      <label class="control-label" for="hora_fin">Hasta</label>
                      <div class="controls">
                        <div class="input-append datetimepicker3">
                          <input data-format="hh:mm:ss" type="text" id="hora_fin" name="hora_fin" class="span6">
                          <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar" ></i>
                          </span>
                        </div>
                      </div>
                    </div>    
                   </div>
                   </div>

                      <div class="row-fluid">
                      <div class="control-group">
                        <label class="control-label" for="comentarios_adicionales">Comentarios Adicionales</label>
                        <div class="controls">
                            <textarea class="cleditor" name="input" name="comentarios_adicionales" id="comentarios_adicionales">
                             
                            </textarea>
                        </div>
                      </div>  
                      </div>
                      <hr>
                      <div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div>
                      <?php echo form_close(); ?>
                  <div class="clearfix"></div>  


                </div>

              </div>

            </div>
          </div>
          <!-- Dashboard graph ends -->
                </div>

                <div class="widget-foot">
                    <!-- Footer goes here -->
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