<?php
/*
  object(stdClass)#22 (14) {
  ["sequence_id"]=>  string(1) "1"
  ["sequencename"]=>  string(20) "GUIA DE REMISION 001"
  ["serial"]=>  string(4) "0001"
  ["lastnumber"]=>  string(4) "8019"
  ["interval"]=>  string(1) "1"
  ["format_serial"]=>  string(4) "0000"
  ["format_number"]=>  string(6) "000000"
  ["doctype_id"]=>  string(1) "1"
  ["iscpe"]=>  string(1) "N"
  ["isactive"]=>  string(1) "Y"
  ["created"]=>  string(19) "2018-11-06 22:12:01"
  ["createdby"]=>  string(1) "8"
  ["updated"]=>  string(19) "2018-09-24 06:40:34"
  ["updatedby"]=>  string(1) "8"
  } */
$html = '';
$html .= '<table class="table table-hover">';
foreach ($result as $row) {
    $lnk = site_url('sequence/edit') . '/' . $row->sequence_id;
    $html .= "<tr class='clickableRow' href=\"$lnk\">";
    $html .= "<td>{$row->sequencename}</td>";
    $html .= "<td>{$row->serial}</td>";
    $html .= "<td>{$row->lastnumber}</td>";
    $html .= "<td>{$row->isactive}</td>";
    $html .= "<td>{$row->doctype_id}</td>";
    $html .= "<td>{$row->updated}</td>";
    $html .= "</tr>\n";
}
$html .= '</table>';
if (isset($this->session->_success_message)) {
    echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
  <strong>Hecho!</strong> {$this->session->_success_message}.</div>";
}
if (isset($this->session->_error_message)) {
    echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
  <strong>Hecho!</strong> {$this->session->_error_message}.</div>";
}
$this->session->unset_userdata('_error_message');
$this->session->unset_userdata('_succes_message');
?>
<div class="container-fluid" style="margin-bottom: 10px;">
    <div class="row">
        <div class="col-sm-7 col-xs-6">
            <div class="btn-group hidden-xs">
                <a class="btn btn-sm btn-default" href="index.php?page=ventas_articulos" title="Recargar la página">
                    <span class="glyphicon glyphicon-refresh"></span> 
                </a>

                <a class="btn btn-sm btn-default" href="index.php?page=ventas_articulos&amp;default_page=TRUE" title="Marcar como página de inicio">
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                </a>

            </div>
            <div class="btn-group">
                <a id="b_nuevo_form" class="btn btn-sm btn-success" href="#">
                    <span class="glyphicon glyphicon-plus"></span>
                    <span class="hidden-xs">&nbsp;Nuevo</span>
                </a>

            </div>
            <div class="btn-group">
                <a href="index.php?page=ventas_atributos" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><span class="hidden-xs">&nbsp; Atributos</span></a>
                <a href="index.php?page=ventas_fabricantes" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span><span class="hidden-xs"> &nbsp; Fabricantes</span></a>
                <a href="index.php?page=ventas_familias" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span><span class="hidden-xs"> &nbsp; Familias</span></a>
            </div>
        </div>
        <div class="col-sm-5 col-xs-6 text-right">
            <h2 style="margin-top: 0px;">
                <i class="fa fa-users hidden-xs" aria-hidden="true"></i> <?php echo $APPNAME; ?>
            </h2>
        </div>
    </div>
</div>


<?php echo $html; ?>

<form class="form-horizontal" role="form" name="f_nuevo_form" method="post" action="<?php echo site_url('sequence/add'); ?>">
    <input type="hidden" name="modo" value="new">
    <div class="modal" id="modal_nuevo_form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $APPNAME; ?> - NUEVO</h4>
                    <p class="help-block">Se usa para la emision de comprobantes de Invoice de ventas y compras.</p>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Denominacion</label>
                        <div class="col-sm-9">
                            <input class="form-control input-sm" type="text" name="sequencename" maxlength="18" autocomplete="off" required="required"/>

                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tipo de Documento</label>
                        <div class="col-sm-9">
                            <select class="form-control input-sm" name="doctype_id" required>
                                <option disabled selected>-- SELECCIONA --</option>>
                                <option value="1">01 - FACTURA</option>
                                <option value="2">03 - BOLETA</option>
                                <option value="3">09 - GUIA REMISION</option>
                            </select>
                        </div>
                    </div>
                    -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Serie</label>
                        <div class="col-sm-8">
                            <input class="form-control input-sm" type="text" name="serial" autocomplete="off" maxlength="4" style="text-transform:uppercase;" required/>
                            <p class="help-block">Las series electronicas deben empezar con F### o B###.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="checkbox pull-left">
                        <label>
                            <input type="checkbox" name="fex" value="TRUE"/> Serie Electronica
                        </label>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">
                        <span class="glyphicon glyphicon-floppy-disk"></span>&nbsp; Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
