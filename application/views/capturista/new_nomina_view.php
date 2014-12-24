<!-- Main content starts -->

<div class="content">

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
	      <h2 class="pull-left">Nominas</h2>
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
                  <div class="pull-left">Nueva</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
  <?php $create_form = array('id'=>'fases-form','class' => 'form-inline'); ?>

                <?php echo form_open('capturista/empleados', $create_form); ?>
                  <input type="hidden" id="nomina" name="nomina" value="<?php echo $nomina; ?>">
                   <input type="hidden" id="empresa" name="empresa" value="<?php echo $empresa1; ?>">

                      <div class="row-fluid">
                        <div class="span3">
                          <div class="control-group">
                            <div class="controls">
                             <select id="empresa2" name="empresa2" style="width:200px!important;" disabled>
                              
                                <?php 
                                if (isset($empresas) && !empty($empresas)) {
                                  echo "<option value=\"0\">Empresa...</option>";
                                  foreach ($empresas as $empresa) {
                                    if (isset($empresa1) && $empresa1==$empresa->id) {
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
                    
                       <div class="span3">
                            <div class="control-group">
                              <div class="controls">
                                <div class="input-prepend input-group">
                                  <span class="add-on input-group-addon"><i class="icon-calendar"></i></span><input type="text" style="width: 200px" name="fechas" id="fechas" class="form-control" value="<?php echo (isset($fechas))?$fechas:"Rango de Fechas"; ?>" /> 
                                </div>
                              </div>
                            </div>
                       </div>
                      
                      <div class="span3">
                        <?php if (!isset($fechas)) { ?>

                         <input type="submit" value="Buscar Empleados" class="btn btn-inverse">
                         <?php } ?>
                        </div>
                    </div>
                    
<?php echo form_close(); ?>
<?php 
if (isset($empleados) && !empty($empleados)) {
?>
<?php echo form_open('capturista/generar', $create_form); ?>
<input type="hidden" id="nomina" name="nomina" value="<?php echo $nomina; ?>">
<input type="hidden" id="empresa" name="empresa" value="<?php echo (isset($empresa1))?$empresa1:""; ?>">
<input type="hidden" id="fechas" name="fechas" value="<?php echo (isset($fechas))?$fechas:""; ?>">

  <table class="table  table-bordered">
    <thead>
      <th>No. Empleado</th>
      <th>Nombre</th>
      <th>Salario</th>
      <th>
      <table>
        <thead>
          <tr>
            <?php
              foreach ($rangos as $rango) {
                $dia = explode("-", $rango);
                echo "<th class=\"textr\"><img src=\"http://creactivoclientes.com/sowi/assets/img/".@date('l', strtotime($rango)).".jpg\"/><br><img src=\"http://creactivoclientes.com/sowi/assets/img/".$dia[2].".jpg\"/></th>";
              }
            ?>
          </tr>
        </thead>
       
      </table>
      </th>
    </thead>
    <tbody>
  <?php 
    foreach ($empleados as $empleado) {
      if (in_array($empleado->region, $regiones)) {

  ?>
  <tr>
    <td><?php echo $empleado->no; ?></td>
    <td><?php echo $empleado->nombre." ".$empleado->apellidos; ?></td>
    <?php if (!empty($empleado->salario)) { ?>
    <td>$<?php echo $empleado->salario; ?></td>
    <?php }else{ ?>
    <td>$0</td>
    <?php } ?>
    <td>
      <table>

        <tr>
      <?php
        foreach ($rangos as $rango) {
          echo "<td class=\"tdr\"><input name=\"dias".$empleado->id."[]\" type=\"checkbox\" checked=\"checked\" value=\"".$rango."\"></td>";
        }
      ?>
      </tr>

      </table>
  </tr>
  <?php 
    }}
  ?>

  </tbody>
  </table>
  <?php if (isset($fechas)) { ?>
  <div class="form_button"><input type="submit" class="btn btn-inverse" value="Grabar"></div>
  <?php } ?>
  <?php echo form_close(); ?>
<?php
}elseif(isset($fechas)) {
  echo "<div class=\"alert alert-warning\">No hay empleados asignados a esta empresa. <a href=\"".site_url("capturista/delete/".$nomina)."\">ir a crear nueva nomina</div>";
}
?>
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




