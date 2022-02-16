<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png">
    <title>Project Report</title>
    <!-- This page plugin CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link href="<?= base_url(); ?>assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">   
    <link href="<?php echo base_url();?>assets/css/response_table.css" rel="stylesheet"/>
    <style>
        div.dt-button-collection{
            background-color: #f8f9fa;
            width: 205px;
        }
        .buttons-columnVisibility{
            background-color: #f8f9fa;
            border: 0px;
            text-align: left;
            padding: 10px;
            /* background-color: #7460ee;
            border-color: #7460ee;
            color: white; */
        }
    </style>

</head>

<body>
    <div id="main-wrapper">
        <header class="topbar">
            <?php include('includes/header.php'); ?>
        </header>       
        <?php include('includes/left-sidebar.php'); ?>
        <div class="page-wrapper">           
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title">Project Report List</h4>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                </div>
            </div>        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xl-9 col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">All Project Report</h4>
                                    <div class="ml-auto">
                                        
                                    </div>
                                </div>
                                <?php if($this->session->flashdata('msg')): ?>
                                    <div id="flashdata" class="alert alert-success alert-dismissible" style="width:500px">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <?php echo $this->session->flashdata('msg'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table id="file_export"class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Project Start Date</th>
                                                <th>Description</th>
                                                <th>Responsibility</th>
                                                <th>Status</th>                                               
                                                <th><?php echo $this->session->userdata('dt_1');  ?></th>                                               
                                                <th><?php echo $this->session->userdata('dt_2');  ?></th>                                               
                                                <th><?php echo $this->session->userdata('dt_3');  ?></th>                                               
                                                <th><?php echo $this->session->userdata('dt_4');  ?></th>                                               
                                                <th><?php echo $this->session->userdata('dt_5');  ?></th>                                               
                                                <th><?php echo $this->session->userdata('dt_6');  ?></th>                                               
                                                <th><?php echo $this->session->userdata('dt_7');  ?></th>                                               
                                            </tr>
                                        </thead>
                                        <tbody id="report_table">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <?php include('includes/footer.php'); ?>
        </div>        
    </div> 
   
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
    <!-- apps -->
    <script src="<?= base_url(); ?>assets/js/app.min.js"></script>
    <!-- Theme settings -->
    <script src="<?= base_url(); ?>assets/js/app.init.dark.js"></script>
    <script src="<?= base_url(); ?>assets/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url(); ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url(); ?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url(); ?>assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="<?= base_url(); ?>assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/datatable/datatable-advanced.init.js"></script>
    <script>
    $(".bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>  

  
    <script type="text/javascript">
        $(document).ready(function() {
            project_report_data();   
        });

        // for export all data
        function newexportaction(e, dt, button, config) {
            var self = this;
            var oldStart = dt.settings()[0]._iDisplayStart;
            dt.one('preXhr', function (e, s, data) {
                // Just this once, load all data from the server...
                data.start = 0;
                data.length = 2147483647;
                dt.one('preDraw', function (e, settings) {
                    // Call the original action function
                    if (button[0].className.indexOf('buttons-copy') >= 0) {
                        $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                        $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                        $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-print') >= 0) {
                        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                    }
                    dt.one('preXhr', function (e, s, data) {
                        // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                        // Set the property to what it was before exporting.
                        settings._iDisplayStart = oldStart;
                        data.start = oldStart;
                    });
                    // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                    setTimeout(dt.ajax.reload, 0);
                    // Prevent rendering of the full data to the DOM
                    return false;
                });
            });
            // Requery the server with the new one-time export settings
            dt.ajax.reload();
        }

        function project_report_data(){   
            
            var ct = $('#file_export').DataTable({ 
                // 'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                'lengthChange': true,             
                'pageLength': 10,          
                'processing': true,        
                'serverSide': true,
                'serverMethod': 'post',
                "bDestroy": true, 
                "buttons": [
                            {   
                                "extend": 'copy',
                                "text": 'Copy',
                                "titleAttr": 'Copy',
                                "className": 'dt-button buttons-print btn btn-primary mr-1',
                                "exportOptions": {
                                    'columns': ':visible'
                                },
                                "action": newexportaction
                            },
                            {
                                "extend": 'excel',
                                "text": 'Excel',
                                "titleAttr": 'Excel',
                                "className": 'dt-button buttons-print btn btn-primary mr-1',
                                "exportOptions": {
                                    'columns': ':visible'
                                },
                                "action": newexportaction
                            },
                            {
                                "extend": 'csv',
                                "text": 'CSV',
                                "titleAttr": 'CSV',
                                "className": 'dt-button buttons-print btn btn-primary mr-1',
                                "exportOptions": {
                                    'columns': ':visible'
                                },
                                 "action": newexportaction
                            },
                            {
                                "extend": 'pdf',
                                "text": 'PDF',
                                "titleAttr": 'PDF',
                                "className": 'dt-button buttons-print btn btn-primary mr-1',
                                "exportOptions": {
                                    'columns': ':visible'
                                },
                                "action": newexportaction
                            },
                            {
                                "extend": 'print',
                                "text": 'Print',
                                "titleAttr": 'Print',
                                "className": 'dt-button buttons-print btn btn-primary mr-1',
                                "exportOptions": {
                                    'columns': ':visible'
                                },
                                "action": newexportaction
                            },
                            {
                                "extend": 'colvis',
                                "text": 'Colvis',
                                "titleAttr": 'Colvis',
                                "className": 'dt-button buttons-print btn btn-primary mr-1',                        
                            },
                                        
                ],  
                'dom': 'Blfrtip', 
                "aoColumnDefs": [
                    
                ],
                'ajax': {
                    'url': "<?= base_url(); ?>/index.php/project_report_data_menulist",                    
                    'data': function(data) {                       
                    }
                },
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                    $( row ).find('td:eq(1)').attr('data-label', 'Date');
                    $( row ).find('td:eq(2)').attr('data-label', 'Description').attr('name', 'second');
                    $( row ).find('td:eq(3)').attr('data-label', 'Responsibility');
                    $( row ).find('td:eq(4)').attr('data-label', 'Status');
                    $( row ).find('td:eq(5)').attr('data-label', 'Date 1');
                    $( row ).find('td:eq(6)').attr('data-label', 'Date 2');
                    $( row ).find('td:eq(7)').attr('data-label', 'Date 3');
                    $( row ).find('td:eq(8)').attr('data-label', 'Date 4');
                    $( row ).find('td:eq(9)').attr('data-label', 'Date 5');
                    $( row ).find('td:eq(10)').attr('data-label', 'Date 6');
                    $( row ).find('td:eq(11)').attr('data-label', 'Date 7');
                
                },
                "columns": [
                
                    {
                        title: 'S.No',
                        render: function(data, type, row, meta) {
                            
                            return meta.row + meta.settings._iDisplayStart + 1;

                        }
                    },                    

                    { "data": "created_on" },           
                    { "data": "prt_name" },           
                    { "data": "prt_tm" },           
                    { "data": "tl_prt_status" },           
                    { "data": "dt_1" },           
                    { "data": "dt_2" },           
                    { "data": "dt_3" },           
                    { "data": "dt_4" },           
                    { "data": "dt_5" },           
                    { "data": "dt_6" },           
                    { "data": "dt_7" },           
                    
                ],
                "order": [
                    [1, 'asc']
                ],
                rowsGroup: [
                    'first:name',
                    'second:name'
                ],
               
            });

        
        }

	</script>

</body>

</html>
   