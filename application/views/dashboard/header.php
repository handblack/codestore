<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es" >
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>_render_</title>
   <meta name="description" content="FacturaScripts es un software de facturación y contabilidad para pymes. Es software libre bajo licencia GNU/LGPL." />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta name="generator" content="MiaSoftware Network" />
   <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico');?>" />
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-yeti.min.css" />
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css" />
   <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css?updated=19-04-2019" />
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js" charset="UTF-8"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.autocomplete.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/base.js"></script>
   <script type="text/javascript">
      bootbox.setLocale("es");
      
      function show_precio(precio, coddivisa)
      {
         coddivisa || ( coddivisa = 'PEN' );
         
         if(coddivisa == 'PEN')
         {
            
            return 'S/'+number_format(precio, 2, '.', ',');
            
         }
         else
         {
            return number_format(precio, 2, '.', ',');
         }
      }
      function show_numero(numero)
      {
         return number_format(numero, 2, '.', ',');
      }
   </script>

</head>
<body>
    <!-- Fixed navbar -->
    <!--
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Productos</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parametros <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div> 
      </div>
    </nav>
    
    <div style="margin-bottom: 60px"></div>
    -->
    <div style="margin-bottom: 10px"></div>
    