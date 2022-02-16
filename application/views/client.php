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
    <title>Client</title>
    <!-- This page plugin CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link href="<?= base_url(); ?>assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- <link href="<?= base_url(); ?>assets/extra-libs/datatables.net-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/extra-libs/datatables.net-bs4/css/bootstrap.css" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" rel="stylesheet"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
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
                        <h4 class="page-title">Client List</h4>
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
                                    <h4 class="card-title">All Clients</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createmodel">
                                                Add Client
                                            </button>
                                        </div>
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
                                                <th>Client ID</th>
                                                <th>Client Name</th>
                                                <th>Client Email</th>
                                                <th>Mobile No</th>
                                                <th>Action</th>
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
           
            <!-- Form Insert -->
            <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="javascript:void(0)" id="client_form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Add  Client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" name="client_emp_id" id="client_emp_id" placeholder="Client ID" aria-label="name">
                                </div>
                                <span id="client_emp_id_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Client Name" aria-label="name">
                                </div>
                                <span id="name_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                    <input type="email" class="form-control" name="client_email" id="client_email" placeholder="Client Email" aria-label="name">
                                </div>
                                <span id="email_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-mobile text-white"></i></button>
                                    <input type="text" class="form-control" name="client_mob" id="client_mob" placeholder="Mobile No" aria-label="name">
                                </div>
                                <span id="mob_error" class="text-danger"></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="save" name="save" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Form Edit -->
            <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="javascript:void(0)" id="edit_form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editmodelLabel"><i class="ti-marker-alt m-r-10"></i> Edit Client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>                                                
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" id="mytest" name="client_name" placeholder="Client Name" aria-label="name">                                    
                                </div>
                                <span id="name_error_edit" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                    <input type="email" class="form-control" id="mytest1" name="client_email" placeholder="Client Email" aria-label="name">                                    
                                </div>
                                <span id="email_error_edit" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-mobile text-white"></i></button>
                                    <input type="text" class="form-control" id="mytest2" name="client_mob" placeholder="Client Mobile No" aria-label="name">                                    
                                </div>
                                <span id="mob_error_edit" class="text-danger"></span>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="client_id" class="form-control">
                                <input type="hidden" name="client_emp_id" id="mytest3" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="edit" name="edit" value="submit"><i class="ti-save"></i> Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Form Delete -->
            <div class="modal fade" id="deletemodel" tabindex="-1" role="dialog" aria-labelledby="deletemodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="javascript:void(0)" id="delete_form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deletemodelLabel"><i class="ti-marker-alt m-r-10"></i> Delete Client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <strong>Are you sure to delete this record? </strong>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="delete_id" class="form-control">
                                <input type="hidden" name="client_emp_id" id="delete_client_emp_id" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-success" id="delete" name="delete" value="submit"><i class="ti-save"></i> Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <!-- Form Active -->
            <div class="modal fade" id="activemodel" tabindex="-1" role="dialog" aria-labelledby="activemodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="javascript:void(0)" id="active_form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="activemodelLabel"><i class="ti-marker-alt m-r-10"></i> Active Client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <strong>Are you sure to active this record? </strong>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="activeid" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-success" id="active" name="active" value="submit"><i class="ti-save"></i> Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Form Deactive -->
            <div class="modal fade" id="deactivemodel" tabindex="-1" role="dialog" aria-labelledby="deactivemodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="javascript:void(0)" id="deactive_form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="activemodelLabel"><i class="ti-marker-alt m-r-10"></i> Deactive Client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <strong>Are you sure to deactive this record? </strong>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="deactiveid" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-success" id="deactive" name="deactive" value="submit"><i class="ti-save"></i> Yes</button>
                            </div>
                        </form>
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
    <!-- <script src="<?= base_url(); ?>assets/libs/datatable/buttons.colVis.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/js/pages/datatable/datatable-advanced.init.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    
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

        var timeout = 3000; // in miliseconds (3*1000)
        $('#flashdata').delay(timeout).fadeOut(300);
        
    });
    </script>

    <script>
        // save new employee record
        $("#save").on('click',()=>{
            $.ajax({
                url:"<?php echo base_url();?>/index.php/client_insert",
                type:"POST",
                data:$("#client_form").serialize(),
                dataType : "JSON",
                success:function(data)
                {  

                    if(data.error)
                    {
                        if(data.name_error != '')
                        {
                        $('#name_error').html(data.name_error);
                        }
                        else
                        {
                        $('#name_error').html('');
                        }
                        if(data.email_error != '')
                        {
                        $('#email_error').html(data.email_error);
                        }
                        else
                        {
                        $('#email_error').html('');
                        }
                        if(data.mob_error != '')
                        {
                        $('#mob_error').html(data.mob_error);
                        }
                        else
                        {
                        $('#mob_error').html('');
                        }
                        if(data.client_emp_id_error != '')
                        {
                        $('#client_emp_id_error').html(data.client_emp_id_error);
                        }
                        else
                        {
                        $('#client_emp_id_error').html('');
                        }
                    }
                    else
                    {
                        // alert(data);
                        $('#client_name').val("");
                        $('#client_email').val("");
                        $('#client_mob').val("");
                        $('#createmodel').modal('hide');
                        window.location.reload();
                        report_data();
                    }
                }
            });
            return false;        
        });
    </script>
  
    <script type="text/javascript">
        $(document).ready(function() {
            report_data();                
                        
        });
        

        //focus on client id
        $("#client_emp_id").on('focusout',()=>{

            var client_id =$("#client_emp_id").val();
            // alert(client_id);

            $.ajax({  
                url:"<?php echo base_url();?>/index.php/check_client_id_user_tb",
                type:"POST",
                data:{
                        "client_id": client_id,            
                    },                    
                dataType : "JSON",
                success:function(data)
                {
                    if(data.res_error)
                    {
                        if(data.res_error == "Already Entered")
                        {
                            var client_emp_id_error = " ";                   
                            $('#client_emp_id_error').html(client_emp_id_error); 
                            var client_emp_id_error = "The Client ID field must contain a unique value.";                   
                            $('#client_emp_id_error').html(client_emp_id_error);
                            // var timeout = 3000; // in miliseconds (3*1000)
                            // $('#client_emp_id_error').delay(timeout).fadeOut(300);                                                      
                        }                            
                    }else{
                        if(data.success == "Success")
                        {
                            var client_emp_id_error = " ";                   
                            $('#client_emp_id_error').html(client_emp_id_error);                                                                                  
                        }                            
                    }
                }
            }); 

        });

        //focus on client name
        $("#client_name").on('focusout',()=>{

            var client_name =$("#client_name").val();
            // alert(client_id);

            $.ajax({  
                url:"<?php echo base_url();?>/index.php/check_client_name_user_tb",
                type:"POST",
                data:{
                        "client_name": client_name,            
                    },                    
                dataType : "JSON",
                success:function(data)
                {
                    if(data.res_error)
                    {
                        if(data.res_error == "Already Entered")
                        {
                            var name_error = " ";                   
                            $('#name_error').html(name_error); 
                            var name_error = "The Client Name field must contain a unique value.";                   
                            $('#name_error').html('');     
                            $('#name_error').html(name_error);     
                            // var timeout = 3000; // in miliseconds (3*1000)
                            // $('#name_error').delay(timeout).fadeOut(300);                           
                        }                            
                    }else{
                        if(data.success == "Success")
                        {
                            var name_error = " ";                   
                            $('#name_error').html(name_error);                                                                                  
                        }
                    }
                }
            }); 

        });

        //focus on client email
        $("#client_email").on('focusout',()=>{

            var client_email =$("#client_email").val();
            // alert(client_id);

            $.ajax({  
                url:"<?php echo base_url();?>/index.php/check_client_email_user_tb",
                type:"POST",
                data:{
                        "client_email": client_email,            
                    },                    
                dataType : "JSON",
                success:function(data)
                {
                    if(data.res_error)
                    {
                        if(data.res_error == "Already Entered")
                        {
                            var email_error = " ";                   
                            $('#email_error').html(email_error); 
                            var email_error = "The Client Email field must contain a unique value.";                   
                            $('#email_error').html('');     
                            $('#email_error').html(email_error);     
                            // var timeout = 3000; // in miliseconds (3*1000)
                            // $('#email_error').delay(timeout).fadeOut(300);                           
                        }                            
                    }else{
                        if(data.success == "Success")
                        {
                            var email_error = " ";                   
                            $('#email_error').html(email_error);                                                                                  
                        }
                    }
                }
            }); 

        });

        //focus on client client_mob
        $("#client_mob").on('focusout',()=>{

            var client_mob =$("#client_mob").val();
            // alert(client_id);

            $.ajax({  
                url:"<?php echo base_url();?>/index.php/check_client_mob_user_tb",
                type:"POST",
                data:{
                        "client_mob": client_mob,            
                    },                    
                dataType : "JSON",
                success:function(data)
                {
                    if(data.res_error)
                    {
                        if(data.res_error == "Already Entered")
                        {
                            var mob_error = " ";                   
                            $('#mob_error').html(mob_error); 
                            var mob_error = "The Client Mobile Number field must contain a unique value.";                   
                            $('#mob_error').html(mob_error);     
                            // var timeout = 3000; // in miliseconds (3*1000)
                            // $('#mob_error').delay(timeout).fadeOut(300);                           
                        }                            
                    }else{
                        if(data.success == "Success")
                        {
                            var mob_error = " ";                   
                            $('#mob_error').html(mob_error);                                                                                  
                        }
                    }
                }
            }); 

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

        function report_data(){   
            
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
                        // "exportOptions": {
                        //     'columns': ':visible'
                        // },
                        "action": newexportaction
                    },
                    {
                        "extend": 'colvis',
                        "text": 'Colvis',
                        "titleAttr": 'Colvis',
                        "className": 'dt-button buttons-print btn btn-primary mr-1',                        
                    },
                    // 'colvis',
                    
                    
                ],  
                'dom': 'Blfrtip', 
                "aoColumnDefs": [
                    
                ],
                'ajax': {
                    // type: 'POST',
                    'url': "<?= base_url(); ?>/index.php/client_report_data",
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
                    $( row ).find('td:eq(1)').attr('data-label', 'Client ID');
                    $( row ).find('td:eq(2)').attr('data-label', 'Client Name');
                    $( row ).find('td:eq(3)').attr('data-label', 'Client Email');
                    $( row ).find('td:eq(4)').attr('data-label', 'Client Mobile');
                    $( row ).find('td:eq(5)').attr('data-label', 'Action');
                
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
                    { "data": "client_emp_id" },           
                    { "data": "client_name" },           
                    { "data": "client_email" },           
                    { "data": "client_mob" },           
                    { "data": "action" },           
                    
                ],
                "order": [
                    [1, 'asc']
                ]
            });

        
        }

        $('#report_table').on('click','.editRecord',function(){
            var client_id = $(this).data('id'); 
            var mytest = $(this).data('client_name'); 
            var mytest1 = $(this).data('client_email'); 
            var mytest2 = $(this).data('client_mob'); 
            var mytest3 = $(this).data('client_emp_id'); 

            // alert(client_id)           
            $('#editmodel').modal('show');
            // alert(deptId);
            $('#mytest').val(mytest);
            $('#mytest1').val(mytest1);
            $('#mytest2').val(mytest2);
            $('#mytest3').val(mytest3);
            $('#client_id').val(client_id);

	    });

        $("#edit").on('click',()=>{
            $.ajax({
            url:"<?php echo base_url();?>/index.php/client_update",
            type:"POST",
            data:$("#edit_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    
                if(data.error)
                {
                    if(data.name_error != '')
                    {
                    $('#name_error_edit').html(data.name_error);
                    }
                    else
                    {
                    $('#name_error_edit').html('');
                    }
                    if(data.email_error != '')
                    {
                    $('#email_error_edit').html(data.email_error);
                    }
                    else
                    {
                    $('#email_error_edit').html('');
                    }
                    if(data.mob_error != '')
                    {
                    $('#mob_error_edit').html(data.mob_error);
                    }
                    else
                    {
                    $('#mob_error_edit').html('');
                    }
                }
                else
                {
                    $('#client_name').val("");
                    $('#client_email').val("");
                    $('#client_mob').val("");
                    $('#editmodel').modal('hide');
                    window.location.reload();
                    report_data();
                }
                                                            
            }
            });
            return false;        
        });
        
        $('#report_table').on('click','.deleteRecord',function(){
            var client_id = $(this).data('id'); 
            var client_emp_id = $(this).data('client_emp_id'); 
            // alert(client_id)           
            $('#deletemodel').modal('show');
            // alert(deptId);
            $('#delete_id').val(client_id);
            $('#delete_client_emp_id').val(client_emp_id);
	    });

    
        $("#delete").on('click',()=>{
            var id=$("#delete_id").val();
            // alert(id);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/client_delete",
            type:"POST",
            data:$("#delete_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#deletemodel').modal('hide');
                    window.location.reload();
                    report_data();
            }
            });
            return false;        
        });

        $('#report_table').on('click','.activeRecord',function(){
            var id = $(this).data('id'); 
            var status = $(this).data('status');

            if(this.checked){
                // alert("1")
                $('#activemodel').modal('show');
                $('#activeid').val(id);

            }else{
                $('#deactivemodel').modal('show');
                $('#deactiveid').val(id);

            }
              
        });
    

        $("#active").on('click',()=>{
            var id=$("#activeid").val();
            // alert(id);
            
            $.ajax({
            url:"<?php echo base_url();?>/index.php/client_active",
            type:"POST",
            data:$("#active_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#activemodel').modal('hide');
                    window.location.reload();
                    report_data();
            }
            });
            return false;        
        });

        $("#deactive").on('click',()=>{
            var id=$("#deactiveid").val();
            // alert(id);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/client_deactive",
            type:"POST",
            data:$("#deactive_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#deactivemodel').modal('hide');
                    window.location.reload();
                    report_data();
            }
            });
            return false;        
        });


	</script>

    <script type="text/javascript">
        $(window).on('load','.actstatus',function(){
                var id = $(this).data('id'); 
                var status = $(this).data('status');
                alert(id)
                // alert(status)

                if(this.checked){
                    // alert("1")
                    $('#activemodel').modal('show');
                    $('#activeid').val(id);

                }else{
                    $('#deactivemodel').modal('show');
                    $('#deactiveid').val(id);

                }
                
            });
    </script>

</body>

</html>
   