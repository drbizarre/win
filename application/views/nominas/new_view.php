<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <?php $data["current"] = "nominas"; $this->load->view("nominas/includes/menu",$data); ?>

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

                <?php echo form_open('nominas/empleados', $create_form); ?>

                      <div class="row-fluid">
                        
                    
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
                         <input type="submit" value="Generar Reporte" class="btn btn-inverse">
                         <?php } ?>
                        </div>
                    </div>
                    
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




