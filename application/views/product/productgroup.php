<div id="CrudTableContainer"></div>

    
<script type="text/javascript">

    $(document).ready(function () {

        $('#CrudTableContainer').jtable({
            title: '<?php echo $APPNAME;?>',
            paging: true, //Enable paging
            sorting: true, //Enable sorting
            columnResizable: false, //Disable column resizing
            columnSelectable: false, //Disable column selecting
            defaultSorting: 'Name ASC',
            openChildAsAccordion: true,
            actions: {
                listAction: '<?php echo _PATHC;?>/crud/list',
                createAction: '<?php echo _PATHC;?>/crud/create',
                updateAction: '<?php echo _PATHC;?>/crud/update',
                deleteAction: '<?php echo _PATHC;?>/crud/delete'
            },
            toolbar: {
                items: [{
                    tooltip: 'Click here to export this table to excel',
                    icon: 'assets/jtable/css/images/Misc/excel.png',
                    text: 'Export to Excel',
                    click: function () {
                        alert('This item is just a demonstration for new toolbar feature. You can add your custom toolbar items here. Then, for example, you can download excel file from server when user clicks this item. See toolbar in API reference documentation for usage.');
                    }
                }]
            },
            fields: {
                productgroup_id: {
                    key: true,
                    create: false,
                    edit: false,
                    list: false
                },
                productgroupname: {
                    title: 'Fabricante',
                    width: '60%',
                    inputClass: 'validate[required]'
                },
                isactive: {
                    title: 'Activo',
                    width: '12%',
                    type: 'checkbox',
                    values: { 'false': 'Deshabilitado', 'true': 'Activo' },
                    defaultValue: 'true'
                },
                updated: {
                    title: 'Actualizado',
                    width: '20%',
                    type: 'date',
                    displayFormat: 'yy-mm-dd',
                    create: false,
                    edit: false,
                    sorting: false //This column is not sortable!
                }
            },
            formCreated: function (event, data) {
                data.form.validationEngine();
            },
            formSubmitting: function (event, data) {
                return data.form.validationEngine('validate');
            },
            formClosed: function (event, data) {
                data.form.validationEngine('hide');
                data.form.validationEngine('detach');
            }
        });

        //Load person list from server
        $('#CrudTableContainer').jtable('load');

    });

</script>