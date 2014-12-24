<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
            <?php $data["current"] = "administracion"; $this->load->view("admin/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar" style="background:#bcc0c8;">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Bienvenido 
          <!-- page meta -->
          <span class="page-meta">Sucesos Relevantes</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

          <!-- Today status. jQuery Sparkline plugin used. -->

          <div class="row-fluid">
           <!-- Dashboard Graph starts -->

          <div class="row-fluid">
            <div class="span8">
              <div clas="row">
                <div class="span3 main-service">
                  <h4>Empresas</h4>
                  <img src="<?php echo base_url(); ?>assets/img/prospectos.png">
                  <p><a href="<?php echo site_url("empresas"); ?>">Entrar</a></p>
                </div>
                <div class="span3 main-service">
                  <h4>Empleados</h4>
                  <img src="<?php echo base_url(); ?>assets/img/clientes.png">
                  <p><a href="<?php echo site_url("empleados"); ?>">Entrar</a></p>                  
                </div>
                <div class="span3 main-service">
                  <h4>Nómina</h4>
                  <img src="<?php echo base_url(); ?>assets/img/gastos.png">
                  <p><a href="<?php echo site_url("nominas"); ?>">Entrar</a></p>                         
                </div>
                <!--div class="span3 main-service">
                  <h4>Renovaciones</h4>
                  <img src="<?php echo base_url(); ?>assets/img/renovaciones.png">
                  <p><a href="#">Entrar</a></p>                    
                </div-->
              </div>
              <div class="row">&nbsp;</div>
              <!--div clas="row">
                <div class="span3 main-service">
                  <h4>Catalogos</h4>
                  <img src="<?php echo base_url(); ?>assets/img/catalogos.png">
                  <p><a href="#">Entrar</a></p>                    
                </div>
                <div class="span3 main-service">
                  <h4>Documentos</h4>
                  <img src="<?php echo base_url(); ?>assets/img/documentos.png">
                  <p><a href="#">Entrar</a></p>                    
                </div>
                <div class="span3 main-service">
                  <h4>Ventas</h4>
                  <img src="<?php echo base_url(); ?>assets/img/ventas.png">
                  <p><a href="#">Entrar</a></p>                    
                </div>  
                <div class="span3 main-service">
                  <h4>Cobros</h4>
                  <img src="<?php echo base_url(); ?>assets/img/cobros.png">
                  <p><a href="#">Entrar</a></p>                    
                </div>  
              </div-->              
              <!-- Widget -->
              <div class="widget wlightblue">
                <!-- Widget head -->
                <div class="widget-head" style="display:none;">
                  <div class="pull-left">Pendientes para HOY!</div>
                  <div class="clearfix"></div>
                </div>             

                <!-- Widget content -->
                <div class="widget-content" style="display:none;">
                  <div class="padd">
                     
                    <table class="table table-bordered" id="estudios-listing" style="display:none;">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>&nbsp;</th>
                          <th>Nombre/Empresa</th>
                          <th>Pendiente</th>
                          <th>Oportunidad</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                  <?php 
                    if (isset($pendientes) && !empty($pendientes)) {
     
                      foreach ($pendientes as $pendiente) {
                        $date1 = new DateTime("now");
                        $date2 = new DateTime($pendiente->fecha);
                        $status = "";
                        /*if ($date2 < $date1) {
                          $status = "p";
                        }*/
                        echo "<tr id=\"".$pendiente->id."\">
                        <td>".$pendiente->id."</td>
                        <td>".$pendiente->fecha."</td>
                        <td>".$pendiente->hora."</td>                        
                        <td>".$status."</td>
                        <td><strong>".$pendiente->nombre."</strong></td>
                        <td><a href=\"".site_url("pendientes/ver/".$pendiente->id)."\">".$pendiente->pendiente."</a></td>                        
                        <td>".$pendiente->oportunidad."</td>                        
                        <td>
                              <a class=\"btn btn-mini btn-info\" href=\"".site_url("pendientes/ver/".$pendiente->id)."\"><i class=\"icon-time\"></i> </a>
                        </td>
                        </tr>";
                      }
                    }else{
                      echo "<tr>";
                      echo "<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>";
                      echo "</tr>";
                    }
                    ?>
                      </tbody>
                    </table>


                  </div>
                </div>
                <!-- Widget ends -->

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