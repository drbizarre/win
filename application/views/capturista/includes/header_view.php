<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Wealth Information Network</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <!-- Stylesheets -->
  <link href="<?php echo base_url(); ?>assets/style/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/font-awesome.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/fullcalendar.css">
  <!-- prettyPhoto -->
  
  <!-- Star rating -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/bootstrap-datetimepicker.min.css">
  <!-- jQuery Gritter -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/jquery.gritter.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/jquery.cleditor.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/bootstrap-toggle-buttons.css">
  <!-- Main stylesheet -->
  <link href="<?php echo base_url(); ?>assets/style/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="<?php echo base_url(); ?>assets/style/widgets.css" rel="stylesheet">   
  <!-- Responsive style (from Bootstrap) -->
  <link href="<?php echo base_url(); ?>assets/style/bootstrap-responsive.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/style/DT_bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/style/bootstrapSwitch.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/style/select2.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>assets/style/daterangepicker-bs2.css" rel="stylesheet">
  <style type="text/css">
  td.tdr{padding-right: 0!important; }
    td.tdr img{display: block;}
  
  </style>
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url(); ?>assets/js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon/favicon.png">
</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <!-- Menu button for smallar screens -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
      </a>
      <!-- Site name for smallar screens -->

      <a href="<?php echo site_url("capturista"); ?>" class="brand"> <img src="<?php echo base_url(); ?>assets/img/logo2.png" ></a>

      <!-- Navigation starts -->
      <div class="nav-collapse collapse">        

       <?php $this->load->view("settings-capturistas"); ?>



      </div>

    </div>
  </div>
</div>
