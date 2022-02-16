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
    <title>Comments</title>
    <!-- This page plugin CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link href="<?= base_url(); ?>assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">    
    <link href="<?php echo base_url();?>assets/css/response_table.css" rel="stylesheet"/>

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
                    <div class="col-6 align-self-center">
                        <!-- <h4 class="page-title">Comments</h4> -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark" onClick="myFunction()" value="submit">
                                Go Back 
                            </button>
                        </div>
                    </div>
                    <div class="col-6 align-self-right text-left">
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
                                    <h4 class="card-title"><?php echo $this->session->userdata('task_name'); ?></h4><br>
                                </div>
                                <p><?php echo $this->session->userdata('task_detail'); ?></p>
                                <div class="table-responsive">
                                    <?php if($this->session->userdata('role') == "Head" || $this->session->userdata('role') == 'Team Leader') { ?>
                                    <table id="file_export"class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Created</th>
                                                <th>Comment</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="report_table">
                                            
                                        </tbody>
                                    </table>
                                    <?php } else if($this->session->userdata('role') == 'Team Member'){ ?>
                                    <table id="file_export"class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Comment</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="report_table">
                                            
                                        </tbody>
                                    </table>
                                    <?php } ?>
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
        radioswitch.init();
        view_report_data();      
    });
    </script>
  
    <?php if($this->session->userdata('role') == "Head" || $this->session->userdata('role') == "Team Leader" || $this->session->userdata('role') == 'Client'){ ?>     
        <script type="text/javascript">     
            function view_report_data(){   
                
                var ct = $('#file_export').DataTable({ 
                    // 'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    'lengthChange': true,      
                    'pageLength': 10,          
                    'processing': true,        
                    'serverSide': true,
                    'serverMethod': 'post',
                    "bDestroy": true,
                    "aoColumnDefs": [
                        
                    ],
                    'ajax': {
                        // type: 'POST',
                        'url': "<?= base_url(); ?>/index.php/view_comment_report_data",
                        // 'url': BASE_URL + 'welocme/index',
                        // 'url': BASE_URL + 'welocme/client_report_data',
                        // "datetype": "json",
                        'data': function(data) {
                            // if(data){
                            //     alert(data)
                            // }
                        }
                    },
                    createdRow: function( row, data, dataIndex ) {
                        $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                        $( row ).find('td:eq(1)').attr('data-label', 'Date');
                        $( row ).find('td:eq(2)').attr('data-label', 'Comment');
                        $( row ).find('td:eq(3)').attr('data-label', 'Created');
                    
                    },
                    "columns": [
                    
                        {
                            title: 'S.No',
                            render: function(data, type, row, meta) {
                                // console.log(row);
                                // sample_date=row.sample_received_on;					
                                // console.log(sample_date);
                                return meta.row + meta.settings._iDisplayStart + 1;

                            }
                        },
                        { "data": "emp_name" },           
                        { "data": "comment" },           
                        { "data": "task_update_date" },           

                    ],
                    "order": [
                        [1, 'asc']
                    ]
                });

            
            }
        
        </script>  
    <?php } else if($this->session->userdata('role') == 'Team Member'){ ?>
        <script type="text/javascript">     
            function view_report_data(){   
                
                var ct = $('#file_export').DataTable({ 
                    // 'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    'lengthChange': true,      
                    'pageLength': 10,          
                    'processing': true,        
                    'serverSide': true,
                    'serverMethod': 'post',
                    "bDestroy": true,
                    "aoColumnDefs": [
                        
                    ],
                    'ajax': {
                        // type: 'POST',
                        'url': "<?= base_url(); ?>/index.php/view_comment_report_data",
                        // 'url': BASE_URL + 'welocme/index',
                        // 'url': BASE_URL + 'welocme/client_report_data',
                        // "datetype": "json",
                        'data': function(data) {
                            // if(data){
                            //     alert(data)
                            // }
                        }
                    },
                    createdRow: function( row, data, dataIndex ) {
                        $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                        $( row ).find('td:eq(1)').attr('data-label', 'Date');
                        $( row ).find('td:eq(2)').attr('data-label', 'Comment');
                    
                    },
                    "columns": [
                    
                        {
                            title: 'S.No',
                            render: function(data, type, row, meta) {
                                // console.log(row);
                                // sample_date=row.sample_received_on;					
                                // console.log(sample_date);
                                return meta.row + meta.settings._iDisplayStart + 1;

                            }
                        },
                        { "data": "comment" },           
                        { "data": "task_update_date" },           

                    ],
                    "order": [
                        [1, 'asc']
                    ]
                });

            
            }
        
        </script>  
    <?php } ?>    

    <script>
        // Add User button function
        function myFunction() {
            window.location.href="<?php echo base_url();?>task";
        }      

    </script>
</body>

</html>
   