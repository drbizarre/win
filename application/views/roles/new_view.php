<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">

          <?php $data["current"] = "configuracion"; $this->load->view("roles/includes/menu",$data); ?>

        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Roles 
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

<?php echo form_open('roles/save', $create_form); ?>

                      <div class="control-group">
                        <label class="control-label" for="nombre">Role</label>
                        <div class="controls">
                          <input type="text" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>"  class="span5">
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




