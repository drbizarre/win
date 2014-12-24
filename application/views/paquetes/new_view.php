<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <?php $data["current"] = "catalogos"; $this->load->view("paquetes/includes/menu",$data); ?>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Paquetes 
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
  <?php $create_form = array('id'=>'fases-form','class' => 'form-horizontal'); ?>

<?php echo form_open('paquetes/save', $create_form); ?>
                      <input type="hidden" id="counter" name="counter" value="1" />
                      <div class="control-group">
                        <label class="control-label" for="servicio">Servicio</label>
                        <div class="controls">
                          <select id="servicio" name="servicio">
                            <?php
                            if (isset($servicios) && !empty($servicios)) {
                              echo "<option value=\"\">Selecciona...</option>";
                              foreach ($servicios as $servicio) {
                                echo "<option value=\"".$servicio->id."\">".$servicio->nombre."</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="nombre">Paquete</label>
                        <div class="controls">
                          <input type="text" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>"  class="span5">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="precio">Precio</label>
                        <div class="controls">
                          <span class="input-group-addon">$</span><input type="text" id="precio" name="precio" value="<?php echo set_value('precio'); ?>"  class="span1"><span class="input-group-addon">.00</span>
                        </div>
                      </div>
  
<table class="table table-bordered table-hover" id="tab_logic">
  <caption>Agregar el contenido del paquete</caption>
        <thead>
          <tr >
            <th class="text-center">
              #
            </th>
            <th class="text-center">
              Unidad de Medida
            </th>
            <th class="text-center">
              Concepto
            </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>
            1
            </td>
            <td>
            <input type="text" name='qty1'  placeholder='Cantidad' class="form-control span1"/>
            </td>
            <td>
              <select id="concepto1" name="concepto1">
                <?php 
                if (isset($productos) && !empty($productos)) {
                  echo "<option value=\"\">Selecciona...</option>";
                  foreach ($productos as $producto) {
                    echo "<option value=\"".$producto->id."\">".$producto->nombre."</option>";
                  }
                }
                ?>
              </select>
            <!--input type="text" name='concepto0' placeholder='Concepto' class="form-control"/-->
            </td>
          </tr>
                    <tr id='addr1'></tr>
        </tbody>
        <tfoot>
          <tr>
            <td><a id="add_row" class="btn btn-default">+</a></td>
            <td>&nbsp;</td>
            <td><a id='delete_row' class="btn btn-default">-</a> </td>
          </tr>
        </tfoot>
      </table>
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




