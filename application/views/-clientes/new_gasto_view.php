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

            <li class="nblue current open"><a href="<?php echo site_url("clientes"); ?>"><i class="icon-desktop"></i> Panel</a></li>

            <!-- Menu with sub menu -->
            <li class="has_submenu nlightblue open">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-user"></i> Operaciones 
                <span class="pull-right"><i class="icon-angle-right"></i>
                <!-- Icon for dropdown -->
                <ul>
                  <li><a href="<?php echo site_url("gastos"); ?>">Gastos</a></li>
                  <li><a href="<?php echo site_url("solicitudes"); ?>">Solicitud</a></li>
                  
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
	      <h2 class="pull-left">Gastos 
          <!-- page meta -->
          <span class="page-meta">Nuevo Gasto</span>
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
                  <div class="pull-left">Nuevo Gasto</div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                       <div class="padd">
                  <!-- Widget content -->
                  <!-- Task list starts -->
<?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>

<?php if (!empty($message)) { echo $message; } ?>

           <div class="widget wlightblue">

                
          <?php $create_form = array('id'=>'gasto-form','class' => 'form-horizontal','enctype' => 'multipart/form-data'); ?>

              <?php echo form_open('gastos/save', $create_form); ?>
                      <input type="hidden" id="user" name="user" value="<?php echo $this->session->userdata('user_id'); ?>">
                      <input type="hidden" id="fecha" name="fecha" value="<?php echo date("Y-m-d"); ?>">
                      
                     <div class="row-fluid">
                     
                     <div  class="control-group">
                     
                      <label class="control-label" for="producto">Concepto</label>
                      <div class="controls">
                          <select id="producto" name="producto" style="width:500px;">
                            <option value="0">Selecciona</option>
                          <?php 
                          if (isset($productos) && !empty($productos)) {
                            foreach ($productos as $producto) {
                              echo "<option value=\"".$producto->id."\">".$producto->producto."</option>";
                            }
                          }
                          ?>
                          </select>
                      
                      </div>
                      </div> 
                      <div  class="control-group">
                     
                      <label class="control-label" for="producto">Provedor</label>
                      <div class="controls">
                          <select id="proveedor" name="proveedor" style="width:500px;">
                            <option value="0">Selecciona</option>
                          <?php 
                          if (isset($proveedores) && !empty($proveedores)) {
                            foreach ($proveedores as $proveedor) {
                              echo "<option value=\"".$proveedor->id."\">".$proveedor->nombre."</option>";
                            }
                          }
                          ?>
                          </select>
                      
                      </div>
                      </div> 
                      <div  class="control-group">
                      <label class="control-label" for="monto">Monto</label>
                      <div class="controls">
                        <div class="input-prepend input-append">
                            <span class="add-on">$</span>
                            <input class="span4" id="monto" name="monto" type="text">
                           
                          </div>
                      </div>
                      </div>
                      <div  class="control-group">
                      <label class="control-label" for="iva">IVA</label>
                      <div class="controls">
                        
                            
                            <select id="iva" name="iva" style="width:200px;">
                          <?php 
                          if (isset($ivas) && !empty($ivas)) {
                            foreach ($ivas as $iva) {
                              echo "<option value=\"".$iva->id."\">".$iva->descripcion."</option>";
                            }
                          }
                          ?>
                            </select>
                           
                        
                      </div>
                      </div>

                      <div  class="control-group">
                     
                      <label class="control-label" for="file"> Comprobante</label>
                      <div class="controls">
                        <div class="input-prepend input-append">
                            
                            <input id="file" name="file" type="file">
                            
                          </div>
<span class="help-inline">solo cuando el monto exceda los $10,000 pesos</span>
                      </div>
                   
                      </div>
                                                                    
                      </div>
                      <div  class="control-group error">
                     
                      <label class="control-label" for=""> &nbsp;</label>
                      <div class="controls">
                        <div class="input-prepend input-append">

                          </div>
                        <span class="help-inline">tamaño maximo de archivo 1MB</span>
                      </div>
                      
                      </div>
                                                                    
                      </div>                      
                      <div  class="control-group">
                     
                     <label class="control-label" for="input">Observaciones</label>
                      <div class="controls">
                        <div class="input-prepend input-append">
                            
                            <textarea id="input" name="input" class="cleditor"></textarea>
                           
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