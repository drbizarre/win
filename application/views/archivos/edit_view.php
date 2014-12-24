<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <?php $data["current"] = "archivos"; $this->load->view("archivos/includes/menu",$data); ?>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Archivos de capturista 
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
          <?php 
          if (isset($mensaje)) {
            echo "<div class=\"alert alert-success\">
                      Información Actualizada.
                    </div>";
          }
           ?>

        	 <div class="widget wlightblue">
<div class="widget-head">
                  <div class="pull-left">Datos del usuario</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php //$create_form = array('id'=>'estudios-form-edit','class' => 'form-horizontal'); ?>

<?php //echo form_open('archivos/update', $create_form); ?>
<input type="hidden" id="id" name="id" value="<?php echo $empleado->user_id; ?>">
                      <div class="row-fluid">
                        <div class="span3">
                          <div class="control-group">
                            <label class="control-label" for="no">No.</label>
                            <div class="controls">
                              <input type="text" id="no" name="no" value="<?php echo $empleado->user_id; ?>" disabled  >
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row-fluid">
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="nombre">Nombre</label>
                            <div class="controls">
                              <input type="text" id="nombre" name="nombre" value="<?php echo $empleado->first_name; ?>" disabled >
                            </div>
                          </div>
                        </div>
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="codigo">Apellido</label>
                            <div class="controls">
                              <input type="text" id="apellidos" name="apellidos" value="<?php echo $empleado->last_name; ?>" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                          <div class="control-group">
                        <label class="control-label" for="unidad">Empresa</label>
                        <div class="controls">
                          <select id="empresa" name="empresa" style="width:200px;" disabled>
                            <option value="0">Selecciona</option>
                          <?php 
                          if (isset($empresas) && !empty($empresas)) {
                            foreach ($empresas as $empresa) {
                              if ($empresa->id==$empleado->empresa) {
                                 echo "<option selected value=\"".$empresa->id."\">".$empresa->nombre."</option>";
                              }else{
                                 echo "<option value=\"".$empresa->id."\">".$empresa->nombre."</option>";
                              }
                             

                            }
                          }
                          ?>
                          </select>
                        </div>
                      </div>                      

</div>
</div>
</div>
<div class="widget wlightblue">
<div class="widget-head">
                  <div class="pull-left">Subir archivos del capturista</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php $create_form = array('id'=>'archivos-form-edit','class' => 'form-inline'); ?>

<?php echo form_open_multipart('archivos/save', $create_form); ?>
<input type="hidden" id="id" name="id" value="<?php echo $empleado->user_id; ?>">

                      <div class="row-fluid">
                        <div class="span12">
                          <table class="table table-bordered">
                            <tr>
                              <td><label>Tipo</label> 
                                <?php
                                if (isset($tipos) && !empty($tipos)) {
                                  echo "<select id=\"tipo\" name=\"tipo\">";
                                  echo "<option value=\"\">Selecciona</option>";
                                  foreach ($tipos as $tipo) {
                                    echo "<option value=\"".$tipo->id."\">".$tipo->nombre."</option>";
                                  }
                                  echo "</select>";
                                }
                                ?>
                              </td>
                              <td><label>Archivo</label><input type="file" id="archivo" name="archivo"></td>
                              <td><div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div></td>
                            </tr>
                          </table>
                        </div>
                      </div>

<hr>




<?php echo form_close(); ?>


<div class="row-fluid">
                        <div class="span12">
                          <?php 
                          if ($this->session->flashdata('message') && $this->session->flashdata('message')=="borrado") {
                            echo "<div class=\"alert alert-warning\">Archivo borrado.</div>";
                          }
                          ?>
                          <?php 
                          if ($this->session->flashdata('message') && $this->session->flashdata('message')=="agregado") {
                            echo "<div class=\"alert alert-success\">Archivo agregado.</div>";
                          }
                          ?>                          
                          <table class="table table-bordered">
                            <caption>Archivos</caption>
                            <?php 
                            if (isset($archivos) && !empty($archivos)) {
                              foreach ($archivos as $archivo) {
                                echo "<tr>";
                                  
                                  echo "<td><a target=\"_blank\" href=\"".base_url("media/".$archivo->archivo)."\">".$archivo->tipo."</a></td>";
                                  echo "<td><a class=\"btn btn-mini btn-danger\" href=\"".site_url("archivos/delete/".$archivo->id."/".$empleado->user_id)."\"><i class=\"icon-remove\"></i></a></td>";
                                echo "</tr>";
                              }
                            }
                            else{
                                echo "<tr>";
                                  echo "<td>No hay archivos registrados</td>";
                                echo "</tr>";
                            }
                            ?>
                          </table>
                        </div>
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




