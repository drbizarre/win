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
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script> 

    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/DT_bootstrap.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrapSwitch.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>
    
<!-- Script for this page -->
<script type="text/javascript">

$(function () {
  $("#toogle-checkbox").change(function() {
    var answer = $(this).attr('checked');
    if (answer==undefined) {
      var domain = '<?php echo site_url("pendientes/status"); ?>';
          var url = domain+"/"+$("#id").val();
          $.ajax({
            type:'GET',
            url: url
          }).done(function() {
          window.location = window.location;
          });    
    }
  });
  $("#btnSaveSeg").click(function(e) {
      e.preventDefault();

      var domain = '<?php echo base_url(); ?>'+'seguimientos/grabar';
          
          $.ajax({
          type: "POST",
          url: domain,
          data: { comentario:$("#comentario").val(),user_id:$("#user_id").val(),cliente_id:$("#cliente_id").val() }
          }).done(function( msg ) {
            window.location = window.location;
          });
    
  });  

  $('.datepicker').datepicker();
  $('#timepicker1').timepicker();  
  $('#estudios-listing').dynatable();
$.fn.sort_select_box = function(){
    var my_options = $("#" + this.attr('id') + ' option');
    my_options.sort(function(a,b) {
        if (a.text > b.text) return 1;
        else if (a.text < b.text) return -1;
        else return 0
    })
   return my_options;
}
$('#pais').sort_select_box();  
$('#pais').change(function() {
  $('#estado').children().remove().attr('disabled',true).end().append('<option selected value="0">Cargando</option>');
  $('#ciudad').children().remove().attr('disabled',true).end().append('<option selected value="0">Selecciona Estado</option>');
    $.get("<?php echo base_url(); ?>estados.xml",{},function(xml){
      $('#estado').children().remove();
          var elem = new Option("Selecciona Estado","0");
          $('#estado').append(elem);      
      $('RECORD',xml).each(function(i) {
        estadoName = $(this).find("Name").text();
        estadoCountry = $(this).find("Country").text();
        if (estadoCountry == $("#pais").val()) {
          var elem = new Option(estadoName, estadoName);
          $('#estado').append(elem);
        }
      });    
  });
});
$('#estado').change(function() {
  $('#ciudad').children().remove().attr('disabled',true).end().append('<option selected value="0">Cargando</option>');
    $.get("<?php echo base_url(); ?>ciudades.xml",{},function(xml){
      $('#ciudad').children().remove();
          var elem = new Option("Selecciona Ciudad","0");
          $('#ciudad').append(elem);      
      $('RECORD',xml).each(function(i) {
        ciudad = $(this).find("Name").text();
        estado = $(this).find("Province").text();
        if (estado == $("#estado").val()) {
          var elem = new Option(ciudad, ciudad);
          $('#ciudad').append(elem);
        }
      });    
  });
});
  $('#tipo_consulta').change(function() {
  if ($(this).val()=="empresa") {
    $("#empresa").attr('disabled',false);
  }else{
    $("#empresa").val("");
    $("#empresa").attr('disabled',true);

  }
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
$('#nuevo_se').click( function(e) {
    e.preventDefault();
    $('#datetimepicker1').datetimepicker({ pickTime: false }); 
    $('#myModalNew').modal('show');
    
});

$('#btnYes').click(function() {
    // handle deletion here
    var id = $('#myModal').data('id');
    var domain = '<?php echo site_url("pendientes/delete"); ?>';
    var url = domain+"/"+id;
    //$.ajax({type: "GET",url: url});    
$.ajax({
  type:'GET',
  url: url
}).done(function() {
//$('#myModal').modal('hide');
window.location = window.location;
});    
    
    
    
});


$('#datetimepicker1').datetimepicker({ pickTime: false }); 
$('#datetimepicker3').datetimepicker({ pickTime: false }); 

  
$('#pendientes-form').validate({
        rules: {
          cliente: {
            required: true
          },
          fecha: {
            required: true
          },
          hora: {
            required: true
          },
          pendiente: {
            required: true
          },
          oportunidad: {
            required: true
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