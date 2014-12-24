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
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.dynatable.js"></script> 
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/DT_bootstrap.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrapSwitch.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>
    
<!-- Script for this page -->
<script type="text/javascript">

$(function () {
  $('#estudios-listing').dynatable();
  $("#toogle-checkbox").change(function() {
      var domain = '<?php echo site_url("clientes/status"); ?>';
          var url = domain+"/"+$("#id").val();
          $.ajax({
            type:'GET',
            url: url
          }).done(function() {
          window.location = '<?php echo site_url("clientes"); ?>';
          });    

  });
  var sexo = $("#sexo").val();
  if (sexo=="masculino"){
    $('#switch-gender').bootstrapSwitch('setState', false);
  }else{
    $('#switch-gender').bootstrapSwitch('setState', true);
  }
  
    $('#switch-gender').on('switch-change', function (e, data) {
    var $el = $(data.el);
    var value = data.value;
    if (!value){
       $("#sexo").val("masculino");
    }else{
$("#sexo").val("femenino");
    }
    console.log($("#sexo").val());
    });

$('#myModal').on('show', function() {
    var id = $(this).data('id'),
        removeBtn = $(this).find('.danger');
})

$('.confirm-delete').on('click', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    
    $('#myModal').data('id', id).modal('show');
});

$('#btnYes').click(function() {
    // handle deletion here
    var id = $('#myModal').data('id');
    var domain = '<?php echo site_url("empresas/delete"); ?>';
    var url = domain+"/"+id;
    console.log(url);
    $.ajax({type: "GET",url: url});    
    $('#myModal').modal('hide');
    
    //window.location = '<?php echo site_url("empresas"); ?>';
});


$('#datetimepicker1').datetimepicker({ pickTime: false }); 
$('#datetimepicker3').datetimepicker({ pickTime: false }); 

$('#no_cliente').keyup(function() {
  var client = $(this).val();
  $('#cliente').val(client);
});  

$('#cliente').change(function() {
  $("#no_cliente").val($(this).val());
});
$('#esquema').change(function() {
if ($(this).val()=="variable") {
  $("#container-tarifa-fija").hide();
  $("#container-tarifa-fija").val("");
  $("#container-tarifa-almacenamiento").show();
}else{
  $("#container-tarifa-fija").show();
  $("#container-tarifa-almacenamiento").hide();
  for (var i = 1; i <= 10; i++) {
    $("#tarimas"+i).val("");
    $("#tarifa"+i).val("");
  }
}
});  

 
  
$('#prospectos-form').validate({
        rules: {
          nombre: {
            minlength: 2,
            required: true,
          },
          codigo: {
            minlength: 2,
            required: true,
          }
        },
        highlight: function(label) {
            $(label).closest('.control-group').addClass('error');
        },
        success: function(label) {
            label.closest('.control-group').removeClass('error');
        }
      });

});

/* Curve chart ends */
</script>

</body>
</html>