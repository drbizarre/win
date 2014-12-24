<!-- Main content starts -->

<div class="content">
<div id="myModal" class="modal hide">
    <div class="modal-header">
        <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Eliminar</h3>
    </div>
    <div class="modal-body">
        <p>Eliminando Fase de Prospectación del sistema.</p>
        <p>Estas seguro?</p>
    </div>
    <div class="modal-footer">
      <a href="#" id="btnYes" class="btn danger">Si</a>
      <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
    </div>
</div>
  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
          <?php $data["current"] = "affiliate"; $this->load->view("capturista/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left">Miembro: 456732436 
          <!-- page meta -->
          <span class="page-meta">Bienvenido.</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

            <!-- Today status. jQuery Sparkline plugin used. -->
            <div class="row">
              <div class="span12"> 
                <!-- List starts -->
                <ul class="today-datas">
                  <!-- List #1 -->
                  <li class="14828f">
                    <!-- Graph -->
                    <div class="pull-left"><span id="todayspark1" class="spark"><canvas height="50" width="103" style="display: inline-block; vertical-align: top; width: 103px; height: 50px;"></canvas></span></div>
                    <!-- Text -->
                    <div class="datas-text pull-right"><span class="bold">12,000</span> Visitors/Day</div>

                    <div class="clearfix"></div>
                  </li>
                  <li class="14828f">
                    <!-- Graph -->
                    <div class="pull-left"><i class="fa fa-group"></i></div>
                    <!-- Text -->
                    <div class="datas-text pull-right"><span class="bold">30,000</span> Members</div>

                    <div class="clearfix"></div>
                  </li>
                  <li class="14828f">
                    <!-- Graph -->
                    <div class="pull-left"><span id="todayspark2" class="spark"><canvas height="50" width="103" style="display: inline-block; vertical-align: top; width: 103px; height: 50px;"></canvas></span></div>
                    <!-- Text -->
                    <div class="datas-text pull-right"><span class="bold">15.66%</span> Bounce Rate</div>

                    <div class="clearfix"></div>
                  </li>
                  <li class="asd">
                    <!-- Graph -->
                    <div class="pull-left"><span id="todayspark3" class="spark"><canvas height="50" width="170" style="display: inline-block; vertical-align: top; width: 170px; height: 50px;"></canvas></span></div>
                    <!-- Text -->
                    <div class="datas-text pull-right"><span class="bold">$22,000</span> Total Profit</div>

                    <div class="clearfix"></div>
                  </li> 
                </ul> 
              </div>
            </div>
            <!--/ Today status ends -->

            <!-- Dashboard Graph starts -->
            <div class="row">
              <div class="span8">
                <!-- Widget -->
                <div class="widget wlightblue">
                  <!-- Widget head -->
                  <div class="widget-head">
                    <div class="pull-left">Afiliados recientes</div>
                    <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                    </div>
                    <div class="clearfix"></div>
                  </div>             
                  <!-- Widget content -->
                  <div class="widget-content">
<table class="table  table-bordered ">
                  <tbody><tr>
                    <th></th>
                    <th><center>Miembro</center></th>
                    <th>Nombre</th>
                    <th>Pagina</th>
                    <th>Fecha</th>
                  </tr>
                  <tr>
                    <td><img alt="" src="<?php echo base_url(); ?>assets/img/clientes.png" width="24"></td>
                    <th>1234564</th>
                    <td>Marco Carter</td>
                    <td>mcarter.win.com</td>
                    <th>Dic 24, 2014</th>
                  </tr> 
                  <tr>
                    <td><img alt="" src="<?php echo base_url(); ?>assets/img/clientes.png" width="24"></td>
                    <th>1234564</th>
                    <td>Marco Carter</td>
                    <td>mcarter.win.com</td>
                    <th>Dic 24, 2014</th>
                  </tr> 
                  <tr>
                    <td><img alt="" src="<?php echo base_url(); ?>assets/img/clientes.png" width="24"></td>
                    <th>1234564</th>
                    <td>Marco Carter</td>
                    <td>mcarter.win.com</td>
                    <th>Dic 24, 2014</th>
                  </tr> 
                  <tr>
                    <td><img alt="" src="<?php echo base_url(); ?>assets/img/clientes.png" width="24"></td>
                    <th>1234564</th>
                    <td>Marco Carter</td>
                    <td>mcarter.win.com</td>
                    <th>Dic 24, 2014</th>
                  </tr> 
                  <tr>
                    <td><img alt="" src="<?php echo base_url(); ?>assets/img/clientes.png" width="24"></td>
                    <th>1234564</th>
                    <td>Marco Carter</td>
                    <td>mcarter.win.com</td>
                    <th>Dic 24, 2014</th>
                  </tr>                                                                    
                  </tbody></table>                    
                  </div>
                  <!-- Widget ends -->

                </div>
              </div>
              <div class="span4">
                <div class="widget wlightblue">
                  <div class="widget-head">
                    <div class="pull-left">Ultimas comisiones</div>
                    <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                    </div>
                    <div class="clearfix"></div>
                  </div>             
                  <div class="widget-content">
<table class="table  table-bordered ">
                  <tbody><tr>
                    <td>Diciembre 2014</td>
                    <td>$000.00</td>
                  </tr> 
                  <tr>
                    <td>Noviembre 2014</td>
                    <td>$000.00</td>
                  </tr> 
                  <tr>
                    <td>Octubre 2014</td>
                    <td>$000.00</td>
                  </tr> 
                  <tr>
                    <td>Septiembre 2014</td>
                    <td>$000.00</td>
                  </tr> 
                  <tr>
                    <td>Agosto 2014</td>
                    <td>$000.00</td>
                  </tr> 
                  <tr>
                    <td>Julio 2014</td>
                    <td>$000.00</td>
                  </tr>                                                                                                     
                  </tbody></table>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Dashboard graph ends -->
           
          
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