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

<!-- Script for this page -->
<script type="text/javascript">

$(function () {
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

$('#role').change(function() {
if ($(this).val()==2) {
  $("#clientes-xref-users").show();
}else{
  $("#clientes-xref-users").hide();
}
});  
  
$('#clients-form').validate({
        rules: {
          comercial: {
            minlength: 2,
            required: true,
          },
          contacto: {
            minlength: 2,
            required: true,
            digits: false
          },          
          correo: {
            required: true,
            email: true
          },
          telefono: {
            required: true
          }          
        },
        highlight: function(label) {
            $(label).closest('.control-group').addClass('error');
        },
        success: function(label) {
            label
                .text('OK!').addClass('valid')
                .closest('.control-group').addClass('success');
        }
      });

$('#users-form-edit').validate({
        rules: {
          username: {
            minlength: 2,
            required: true,
          },
          email: {
            required: true,
            email: true
          },
          first_name: {
            required: true
          }            
        },
        highlight: function(label) {
            $(label).closest('.control-group').addClass('error');
        },
        success: function(label) {
            label
                .text('OK!').addClass('valid')
                .closest('.control-group').addClass('success');
        }
      });

$('#users-form').validate({
        rules: {
          username: {
            minlength: 2,
            required: true,
          },
          password: {
            minlength: 2,
            required: true
          },      
          confirm_password: {
            minlength: 2,
            required: true
          },  
          email: {
            required: true,
            email: true
          },
          first_name: {
            required: true
          }           
        },
        highlight: function(label) {
            $(label).closest('.control-group').addClass('error');
        },
        success: function(label) {
            label
                .text('OK!').addClass('valid')
                .closest('.control-group').addClass('success');
        }
      });
    /* Bar Chart starts */

    var d1 = [];
    for (var i = 0; i <= 30; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);

    var d2 = [];
    for (var i = 0; i <= 30; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);


    var stack = 0, bars = true, lines = false, steps = false;
    
    function plotWithOptions() {
        $.plot($("#bar-chart"), [ d1, d2 ], {
            series: {
                stack: stack,
                lines: { show: lines, fill: true, steps: steps },
                bars: { show: bars, barWidth: 0.8 }
            },
            grid: {
                borderWidth: 0, hoverable: true, color: "#777"
            },
            colors: ["#52b9e9", "#0aa4eb"],
            bars: {
                  show: true,
                  lineWidth: 0,
                  fill: true,
                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
            }
        });
    }

    plotWithOptions();
    
    $(".stackControls input").click(function (e) {
        e.preventDefault();
        stack = $(this).val() == "With stacking" ? true : null;
        plotWithOptions();
    });
    $(".graphControls input").click(function (e) {
        e.preventDefault();
        bars = $(this).val().indexOf("Bars") != -1;
        lines = $(this).val().indexOf("Lines") != -1;
        steps = $(this).val().indexOf("steps") != -1;
        plotWithOptions();
    });

    /* Bar chart ends */

});


/* Curve chart starts */

$(function () {
    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    var plot = $.plot($("#curve-chart"),
           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
               series: {
                   lines: { show: true, 
                            fill: true,
                            fillColor: {
                              colors: [{
                                opacity: 0.05
                              }, {
                                opacity: 0.01
                              }]
                          }
                  },
                   points: { show: true }
               },
               grid: { hoverable: true, clickable: true, borderWidth:0 },
               yaxis: { min: -1.2, max: 1.2 },
               colors: ["#fa3031", "#43c83c"]
             });


    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            width: 100,
            left: x + 5,
            border: '1px solid #000',
            padding: '2px 8px',
            color: '#ccc',
            'background-color': '#000',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#curve-chart").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
    }); 

    $("#curve-chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });

});

/* Curve chart ends */
</script>

</body>
</html>