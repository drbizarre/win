<!-- JS -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script> <!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.2.custom.min.js"></script> <!-- jQuery UI -->
<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo base_url(); ?>assets/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="<?php echo base_url(); ?>assets/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->

<!-- jQuery Flot -->
<script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flot.stack.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script> <!-- jQuery Gritter -->
<script src="<?php echo base_url(); ?>assets/js/sparklines.js"></script> <!-- Sparklines -->
<script src="<?php echo base_url(); ?>assets/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="<?php echo base_url(); ?>assets/js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
<script src="<?php echo base_url(); ?>assets/js/filter.js"></script> <!-- Filter for support page -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script> <!-- Custom codes -->
<script src="<?php echo base_url(); ?>assets/js/charts.js"></script> <!-- Custom chart codes -->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/DT_bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script> 
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/select2.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/select2_locale_es.js"></script>    
<!-- Script for this page -->
<script type="text/javascript">
$(function () {
$("#producto").select2({allowClear: true}); 
$("#proveedor").select2({allowClear: true}); 
$("#iva").select2({allowClear: true}); 
$("#generar").click(function (e) {
        e.preventDefault();
        $("#linkactive").hide();
        $("#linkinactive").show();
        url = $(this).attr('href');
        $.ajax({ url: url }).done(function() {
            window.location = window.location; 
        });
});
});
  
/*  $("#generar").click(function (e) {
        e.preventDefault();
        $("#linkactive").hide();
        $("#linkinactive").show();
        url = $(this).attr('href');
        $.ajax({ url: url }).done(function() {
            window.location = window.location; 
        });

     



      $('#listing-entradas').dataTable( {
      "sDom": "<'row-fluid'<'span6 padding-controls'l><'span6 padding-controls'f>r>t<'row-fluid'<'span6 padding-controls'i><'span6 padding-controls'p>>",
      "sPaginationType": "bootstrap",
      "oLanguage": {
        "sLengthMenu": "_MENU_ entradas por página"
      }
    });



*/


</script>


</body>

</html>