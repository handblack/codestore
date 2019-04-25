<?php
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

$buscar = set_value('buscar', @$this->session->_form_find);
$buscar = strtoupper($buscar);
?>
<style>
    table{width: 100%}
    th {
        background-color: #2d89ef;
        color: white;
        font-weight:normal;
        font-size: 12px;
        text-transform: uppercase;
    }
    tr{
        font-size: 11px;
    }
</style>
<form method="POST" action="<?php echo site_url(_PATH . '/find'); ?>">
    <div class="container-fluid" style="margin-bottom: 5px;">
        <div class="row">
            <div class="col-sm-7 col-xs-6">
                <div class="input-group">
                    <div class="input-group-btn">
                        <a class="btn btn-default input-sm" href="<?php echo _PATH; ?>" title="Recargar la página">
                            <span class="glyphicon glyphicon-refresh"></span> 
                        </a>
                        <a id="b_nuevo_form" class="btn  btn-success input-sm" href="#">
                            <span class="glyphicon glyphicon-plus"></span>
                            <span class="hidden-xs">&nbsp;Nuevo</span>
                        </a>
                    </div>
                    <input type="text" id="buscar" name="buscar" class="form-control input-sm" aria-label="Text input with multiple buttons" placeholder="Buscar" value="<?php echo $buscar; ?>">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default input-sm" aria-label="Help"><span class="glyphicon glyphicon-search"></span></button>
                        <button type="button" class="btn btn-default input-sm"><span class="glyphicon glyphicon-filter"></span></button>
                    </div>
                </div><!-- /.input-group -->
            </div>
            <div class="col-sm-5 col-xs-6 text-right">
                <h2 style="margin-top: 0px;">
                    <i class="fa fa-users hidden-xs" aria-hidden="true"></i> <?php echo $APPNAME; ?>
                </h2>
            </div>
        </div>
    </div>
</form>


<?php
/*
  $html = '';
  $html .= '<table class="table-hover table-condensed">';
  $html .= '<thead>';
  $html .= '<th>Codigo</th>';
  $html .= '<th>Nombre del producto</th>';
  $html .= '</thead>';
  foreach ($result as $row) {
  $lnk = site_url(_PATH . '/edit') . '/' . $row->product_id;
  $html .= "<tr class='clickableRow' href=\"$lnk\">";
  $html .= "<td>{$row->product_code}</td>";
  $html .= "<td>{$row->productname}</td>";
  $html .= "<td>{$row->isactive}</td>";
  $html .= "<td>{$row->updated}</td>";
  $html .= "<td>{$row->updatedby}</td>";
  $html .= "</tr>\n";
  }
  $html .= '</table>';
  echo $html;
 */
?>


<table class="table table-hover table-condensed" id='postsList'>
    <thead>
        <tr>
            <th>ID</th>
            <th>SKU</th>
            <th>Producto</th>
            <th>Marca/Fab</th>
            <th>Familia</th>
            <th>Tipo Producto</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<div id='pagination'></div>

<script type='text/javascript'>
    $(document).ready(function () {

        $('#pagination').on('click', 'a', function (e) {
            e.preventDefault();
            var pageno = $(this).attr('data-ci-pagination-page');
            loadPagination(pageno);
        });

        loadPagination(0);

        function loadPagination(pagno) {
            $.ajax({
                url: '<?php echo site_url(_PATH . '/loadRecord'); ?>/' + pagno,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    $('#pagination').html(response.pagination);
                    createTable(response.result, response.row, response.href);
                }
            });
        }

        function createTable(result, sno, href) {
            sno = Number(sno);
            $('#postsList tbody').empty();
            for (index in result) {
                var id = result[index].product_id;
                var title = result[index].productname;
                var code = result[index].product_code;
                var val1 = result[index].manufacturername;
                var val2 = result[index].categoryname;
                var val3 = result[index].groupname;
                var isactive = result[index].isactive;
                //var content = result[index].slug;
                //content = content.substr(0, 60) + " ...";
                var link = href + result[index].product_id;
                sno += 1;

                var tr = '<tr href="' + link + '">';
                tr += "<td>" + sno + "</td>";
                tr += "<td><a href='" + link + "'>" + code + "</a></td>";
                //tr += "<td>" + code + "</td>";
                tr += "<td>" + title + "</td>";
                tr += "<td>" + val1 + "</td>";
                tr += "<td>" + val2 + "</td>";
                tr += "<td>" + val3 + "</td>";
                tr += "<td>" + isactive + "</td>";
                tr += "</tr>";
                $('#postsList tbody').append(tr);

            }
        }
        

    });
</script>

<form class="form-horizontal" role="form" name="f_nuevo_form" method="post" action="<?php echo site_url(_PATH . '/add'); ?>">
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
