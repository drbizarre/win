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
          
        </h2>
        <a id="generar" target="_blank" class="pull-right btn btn-inverse btn-large " href="http://demoscreactivo.com/spacia/generador/Examples/gastos.php?asociado=<?php echo $asociado; ?>"><span id="linkactive"><i class="icon-book"></i> Reportar Gastos</span><span id="linkinactive">generando...</span></a>

        <!-- Breadcrumb -->
        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">
                             <div class="alert alert-warning">
                     <p>Su saldo actual es de: <span class="label">$<?php echo number_format($saldo->saldo,2); ?></span></p>
                     </div>
        <div class="alert alert-info">
                      <?php 
$first_friday_of_this_month = strtotime('first fri of this month');
$third_friday_of_this_month = strtotime('third fri of this month');
$first_friday_of_next_month = strtotime('first fri of next month');

$todays_date = date("Y-m-d");
$today = strtotime($todays_date);

if ($today < $first_friday_of_this_month) {
  echo "Próxima fecha de pago: <span class=\"label label-inverse\">".date('Y-m-d', $first_friday_of_this_month)."</span>";
}
if ($today > $first_friday_of_this_month && $today < $third_friday_of_this_month) {
  echo "Próxima fecha de pago: <span class=\"label label-inverse\">". date('Y-m-d', $third_friday_of_this_month)."</span>";
}
if ($today > $third_friday_of_this_month) {
  echo "Próxima fecha de pago: <span class=\"label label-inverse\">". date('Y-m-d', $first_friday_of_next_month)."</span>";
}
                       ?>
                    </div>
  <div class="widget wlightblue">

                <div class="widget-head">
                  <div class="pull-left">Gastos</div>
                       <div class="pull-right">
                        <p><a href="<?php echo site_url("gastos/new"); ?>" class="btn btn-primary">Nuevo</a></p>
                      </div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
          <?php
          if(isset($mensaje) && !empty($mensaje)){
            echo "<div class=\"alert alert-".$class."\">".$mensaje."</div>";
          }

         
                    ?>
                     <div>

                    <table class="table  table-bordered " id="gastos-listing">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>Concepto</th>
                          <th>Proveedor</th>
                          <th>Monto</th>
                          <th>IVA</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                    <?php
                     $total = 0; 
                    if (isset($gastos) && !empty($gastos)) {
                     
                      foreach ($gastos as $gasto) {

                       $total_gasto = (!empty($gasto->propina))?$gasto->propina+$gasto->monto:$gasto->monto;
                      $total = $total+$total_gasto;
                        echo "<tr>
                        <td>".$gasto->created_date."</td>
                        <td><strong>".$gasto->producto."</strong></td>
                        <td>".$gasto->proveedor."</td>
                        <td>$".number_format($total_gasto,2)."</td>
                        <td>".$gasto->descripcion_iva."</td>
                        <td>
                              <a class=\"btn btn-mini btn-danger\" href=\"".site_url("gastos/delete/".$gasto->gastoid)."\"><i class=\"icon-remove\"></i> </a>                        
                        </td>
                        </tr>";
                      }
                    }else{
                      echo "<tr>";
                      echo "<td colspan=\"6\">No se encontraron registros grabados.</td>";
                      echo "</tr>";
                    }
                    ?>
                      </tbody>
                      <?php if ($total>0) { ?>
                      <tfoot>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          

                          <td align="right">TOTAL</td>
                          <td><strong>$<?php echo number_format($total,2); ?></strong></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </tfoot>
                       <?php }?>
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