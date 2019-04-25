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
    <div style="margin-bottom: 10px"></div>