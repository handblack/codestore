
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
 <HEAD>
  <TITLE>codeSTORE</TITLE>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico');?>" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/ztree/zTreeStyle/zTreeStyle.css" type="text/css">
  <style>
    body {
    background-color: white;
    margin:0; padding:0;
    text-align: center;
    }
    div, p, table, th, td {
        list-style:none;
        margin:0; padding:0;
        color:#333; font-size:12px;
        font-family:dotum, Verdana, Arial, Helvetica, AppleGothic, sans-serif;
    }
    #testIframe {margin-left: 0px;}


    iframe {
        display: block;       /* iframes are inline by default */
        border: none;         /* Reset default border */
        height: 100vh;        /* Viewport-relative units */
        width: 100%;
    }
  </style>
<script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/ztree/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" >
  <!--
    var zTree;
    var demoIframe;
    var zNodes = [
        {id:1, pId:0, name:"Gestion / Configuracion", open:false},
        {id:101, pId:1, name:"Entorno", file:"<?php echo site_url('enviroment');?>"},

        {id:10, pId:1, name:"Producto", open:false},
        {id:1010, pId:10, name:"Maestro de Productos", file:"<?php echo site_url('product');?>"},
        {id:1010, pId:10, name:"Unidad de Medida", file:"<?php echo site_url('productum');?>"},
        {id:1011, pId:10, name:"Fabricante / Marca", file:"<?php echo site_url('productmaker');?>"},
        {id:1012, pId:10, name:"Grupos", file:"<?php echo site_url('productgroup');?>"},
        {id:1013, pId:10, name:"Colores", file:"<?php echo site_url('productcolor');?>"},
        /**/
        {id:11, pId:1, name:"SN - Establecimientos Anexos", open:false},
        {id:1110, pId:11, name:"Tipos de Establecimiento", file:"core/simpleData"},
        {id:1111, pId:11, name:"Tipos de Zonas", file:"core/simpleData"},
        {id:1112, pId:11, name:"Tipos de Via", file:"core/simpleData"},
        {id:1113, pId:11, name:"Tipos de Via2", file:"core/simpleData"},
        /**/
        {id:12, pId:1, name:"Bancos", file:"core/standardData"},
        {id:13, pId:1, name:"Tipo Documento bancario", file:"core/standardData"},
        {id:14, pId:1, name:"Divisas", file:"<?php echo site_url('currency');?>"},

        {id:15, pId:1, name:"Series", file:"<?php echo site_url('sequence');?>"},
        {id:16, pId:1, name:"Tipo Documentos", file:"<?php echo site_url('doctype');?>"},
        {id:17, pId:1, name:"Agencia de transportes", file:"core/standardData"},
        /* USUARIOS */
        {id:18, pId:1, name:"Usuarios", file:"core/standardData"},
        {id:1810, pId:18, name:"Maestro Usuarios", file:"core/standardData"},
        {id:1810, pId:18, name:"Maestro de Perfil", file:"core/standardData"},
        {id:1810, pId:18, name:"Asignacion de Perfil", file:"core/standardData"},



        {id:2, pId:0, name:"Socio de Negocio", open:false,icon:"<?php echo base_url();?>/assets/css/zTreeStyle/img/diy/bpartner.png"},
        {id:201, pId:2, name:"Datos Maestros", file:"<?php echo site_url('bpartner/find');?>"},
        {id:201, pId:2, name:"Gestor de CTE CTA", file:"<?php echo site_url('bpartner/find');?>"},

        {id:3, pId:0, name:"Ventas", open:false},
        {id:30, pId:3, name:"Comprobante de Venta", open:false},
        {id:30, pId:3, name:"Maestro de Ventas", open:false},

        {id:4, pId:0, name:"Cobranzas", open:false},
        {id:401, pId:4, name:"Cobranza (Caja)", open:false},
        {id:402, pId:4, name:"Maestro de Cobranzas", open:false},
        {id:5, pId:0, name:"Reportes", open:false},
        {id:50, pId:5, name:"Formato R2", open:false},


        ];
    var setting = {
        view: {
            dblClickExpand: false,
            showLine: true,
            selectedMulti: false
        },
        data: {
            simpleData: {
                enable:true,
                idKey: "id",
                pIdKey: "pId",
                rootPId: ""
            }
        },
        callback: {
            beforeClick: function(treeId, treeNode) {
                var zTree = $.fn.zTree.getZTreeObj("tree");
                if (treeNode.isParent) {
                    zTree.expandNode(treeNode);
                    return false;
                } else {
                    demoIframe.attr("src",treeNode.file);
                    return true;
                }
            }
        }
    };



    $(document).ready(function(){
        var t = $("#tree");
        t = $.fn.zTree.init(t, setting, zNodes);
        demoIframe = $("#testIframe");
        //demoIframe.bind("load", loadReady);
        var zTree = $.fn.zTree.getZTreeObj("tree");
        zTree.selectNode(zTree.getNodeByParam("id", 101));

    });

    function loadReady() {
        var bodyH = demoIframe.contents().find("body").get(0).scrollHeight,
        htmlH = demoIframe.contents().find("html").get(0).scrollHeight,
        maxH = Math.max(bodyH, htmlH), minH = Math.min(bodyH, htmlH),
        h = demoIframe.height() >= maxH ? minH:maxH ;
        if (h < 530) h = 530;
        demoIframe.height(h);
    }

  //-->
  </SCRIPT>
 </HEAD>

<BODY>
<TABLE border=0 width="100%" height=100% align=left style="border-collapse: collapse;">
    <TR>
        <TD width=250px align=left valign=top style="BORDER-RIGHT: #999999 1px dashed">
            <ul id="tree" class="ztree" style="width:250px; overflow:auto;"></ul>
        </TD>
        <TD align=left valign=top><IFRAME ID="testIframe" Name="testIframe" FRAMEBORDER="1" SCROLLING=AUTO  SRC="<?php echo site_url('dashboard/info');?>"></IFRAME></TD>
    </TR>
</TABLE>

<script>
loadReady();
</script>
 </BODY>
</HTML>
