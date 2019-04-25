<?php
//$sequencename = $row->sequencename;
?>
<form method="POST" class="form-horizontal">
    <input type="hidden" name="sequence_id" value="<?php echo set_value('sequence_id', @$row->sequence_id); ?>">
    <div class="container-fluid" style="margin-bottom: 10px;">
        <div class="row">
            <div class="col-xs-7">
                <div class="btn-group">
                    <a href="<?php echo site_url($this->router->fetch_class()); ?>" class="btn btn-sm btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                        <span class="hidden-xs">&nbsp;Regresar</span>
                    </a>
                    <a href="index.php?page=ventas_articulo&amp;ref=1010022" class="btn btn-sm btn-default hidden-xs" title="Recargar la página">
                        <span class="glyphicon glyphicon-refresh"></span>
                    </a>
                </div>
            </div>
            <div class="col-xs-5 text-right">
                <h2 style="margin-top: 0px;"><?php echo $APPNAME; ?></h2>
                <a class="btn btn-sm btn-success" href="index.php?page=ventas_articulos&amp;b_codfamilia=&amp;b_codfabricante=#nuevo" title="Nuevo artículo">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>

                <a href="#" id="b_eliminar_articulo" class="btn btn-sm btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>
                    <span class="hidden-xs">&nbsp;Eliminar</span>
                </a>

            </div>
        </div>
    </div>
    <?php
    /*
      CREATE TABLE `dt_product` (
      `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
      `producttype` enum('S','A','P') NOT NULL DEFAULT 'P',
      `productname` varchar(100) NOT NULL,
      `productshort` varchar(50) DEFAULT NULL,
      `isactive` char(1) NOT NULL DEFAULT 'Y',
      `category_id` bigint(20) NOT NULL DEFAULT '0',
      `product_code` varchar(30) DEFAULT NULL,
      `ean` varchar(20) DEFAULT NULL,
      `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `createdby` bigint(20) DEFAULT NULL,
      `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
      `updatedby` bigint(20) DEFAULT NULL,
      `um_id` bigint(20) DEFAULT NULL,
      `lotetype` char(1) NOT NULL DEFAULT 'O' COMMENT 'S=Serial/L=Lote/O=no-requiere',
      `priceunit` double DEFAULT '0',
      `group_id` double DEFAULT NULL,
      `isbom` char(1) NOT NULL DEFAULT 'N',
      `acct_venta_id` bigint(20) DEFAULT NULL,
      `manufacturer_id` bigint(20) DEFAULT NULL,
      PRIMARY KEY (`product_id`),
      KEY `category_id` (`category_id`),
      KEY `manufacturer_id` (`manufacturer_id`),
      KEY `um_id` (`um_id`),
      CONSTRAINT `dt_product_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `dt_parametros` (`param_id`),
      CONSTRAINT `dt_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `dt_parametros` (`param_id`),
      CONSTRAINT `dt_product_ibfk_3` FOREIGN KEY (`um_id`) REFERENCES `dt_parametros` (`param_id`)
      ) ENGINE=InnoDB AUTO_INCREMENT=6875 DEFAULT CHARSET=latin1
     */

    echo set_value('sequencename', @$row->sequencename);
    ?>
    <style>
        .ttdd{
                width:170px;
              background-color: #dcdcdc;
              color:#000;
              font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
              font-weight: normal;
              font-size: 14px;
              letter-spacing: -0.5pt;
              text-transform:uppercase;
            }
            td{
                padding: 3px 5px 3px 5px;
                background-color: #d9edf7
            }
        
        </style>

        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h2>INFORMACION - <?php echo strtoupper($APPNAME); ?></h2>
                <table width="100%" border="0" cellpadding="1" cellspacing="1">
                    
                    <tr>
                        <td class="ttdd">Tipo de Producto :</td>
                        <td>
                            <select class="form-control" style="width:200px">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="ttdd">Producto :</td>
                        <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="ttdd">Nombre Corto :</td>
                        <td><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="ttdd">Unidad de Medida :</td>
                        <td>
                            <select class="form-control" style="width:350px">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="ttdd">Categoria/Tipo Prod. :</td>
                        <td>
                        <select class="form-control" style="width:350px">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="ttdd">Grupo :</td>
                        <td>
                        <select class="form-control" style="width:350px">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="ttdd">Marca/Fabricante :</td>
                        <td>
                            <select class="form-control" style="width:350px">
                            </select>
                        </td>
                    </tr>
                </table>




               
            </div>
            <div class="col-sm-12">
                <?php echo validation_errors(); ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10">
            </div>
            <div class="col-sm-2 text-right">
                <button class="btn btn-sm btn-primary" type="submit" onclick="this.disabled = true; this.form.submit();">
                    <span class="glyphicon glyphicon-floppy-disk"></span>&nbsp; Guardar
                </button>
            </div>
        </div>
    </div>
</form>      