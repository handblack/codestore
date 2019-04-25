<?php
$sequencename = $row->sequencename;
?>
<form method="POST" class="form-horizontal">
    <input type="hidden" name="sequence_id" value="<?php echo set_value('sequence_id', @$row->sequence_id);?>">
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">


                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Sequence Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sequencename" name="sequencename" placeholder="Denominacion del secuenciador" value="<?php echo set_value('sequencename', @$row->sequencename);?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Serial:</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" id="pwd" placeholder="Nro de Serie">
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                    </div>
                </div>
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