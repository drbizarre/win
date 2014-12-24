<!-- Main content starts -->
<?php 
//echo "<pre>";
//print_r($cliente);
//echo "</pre>";
?>
<div class="content">
<div id="myModal" class="modal hide">
    <div class="modal-header">
        <a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Eliminar</h3>
    </div>
    <div class="modal-body">
        <p>Eliminando Seguimiento del sistema.</p>
        <p>Estas seguro?</p>
    </div>
    <div class="modal-footer">
      <a href="javascript:void(0);" id="btnYes" class="btn secondary">Grabar</a>
      <a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true" class="btn">Cancelar</a>
    </div>
</div>

<div id="myModalNew" class="modal hide">
    <div class="modal-header">
        <a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true" class="close">×</a>
         <h3>Nuevo seguimiento</h3>
    </div>
    <div class="modal-body">

                                      
                      <div class="row-fluid">
                        <div class="span12">
                          <div class="control-group">
                            <label class="control-label" for="comentario">Comentarios</label>
                            <div class="controls">
                              
                              <textarea id="comentario" name="comentario" style="width:400px;"></textarea>
                              

                            </div>
                          </div>
                        </div>

                      </div>
    </div>
    <div class="modal-footer">
      <a href="javascript:void(0);" id="btnSaveSeg" class="btn btn-success">Grabar</a> ó
      <a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true" class="#">cancelar</a>
    </div>
</div>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Opciones del Sistema</a></div>

        <div class="sidebar-inner">
          <?php $data["current"] = "prospectos"; $this->load->view("seguimientos/includes/menu",$data); ?>
        </div>

    </div>

    <!-- Sidebar ends -->

    <!-- Main bar -->
    <div class="mainbar">


      <!-- Page heading -->
      <div class="page-head">
        <!-- Page heading -->
        <h2 class="pull-left">Seguimientos
          <!-- page meta -->
          <span class="page-meta">Lista de seguimiento por cliente</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->



      <!-- Matter -->

      <div class="matter">
        <div class="container-fluid">

          <div class="widget wlightblue">

                <div class="widget-head">
                  <div class="pull-left">Seguimientos de: <strong><?php echo $cliente->nombre;  ?></strong></div>
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $cliente->user_id; ?>">
  <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $cliente->id; ?>">
                       <div class="pull-right">
                        <p><a id="nuevo_se" href="<?php echo site_url("seguimientos/nuevo"); ?>" class="btn btn-primary">Nuevo Seguimiento</a> <a href="<?php echo site_url("pendientes/nuevo/".$cliente->id); ?>" class="btn btn-info">Nuevo Pendiente</a></p>
                      </div>
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">
          <?php
          if(isset($mensaje) && !empty($mensaje)){
            echo "<div class=\"alert alert-".$class."\">".$mensaje."</div>";
          }
                    ?>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>Comentarios</th>
                        </tr>
                      </thead>
                      <tbody>

                  <?php 
                    if (isset($seguimientos) && !empty($seguimientos)) {
     
                      foreach ($seguimientos as $seguimiento) {
                        $date1 = new DateTime("now");
                        $date2 = new DateTime($seguimiento->fecha);
                        $status = "";
                        echo "<tr id=\"".$seguimiento->id."\">
                        <td>".$seguimiento->id."</td>
                        <td>".$seguimiento->fecha."</td>
                        <td>".$seguimiento->hora."</td>                        
                        <td>".$seguimiento->comentario."</td>                        
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