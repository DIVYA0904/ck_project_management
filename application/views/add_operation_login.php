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
    <title>Operations</title>
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
                    <div class="col-12 align-self-center">
                        <h4 class="page-title">Operations List</h4>
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
                                    <h4 class="card-title">All Operations</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createmodel">
                                                Add Operation Login
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
                                                <th>Employee ID</th>
                                                <th>Employee Name</th>
                                                <th>Employee Email</th>
                                                <th>Mobile No</th>
                                                <th>Operations Name</th>
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
                        <form method="post" action="javascript:void(0)" id="add_ops_login_form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Add Operations Login</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                               
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                    <select name="ops_name" id="ops_name" class="form-control">
                                        <option  value="" disabled='disabled' selected>Operations</option>
                                        <?php
                                            foreach($ops_name as $row)
                                            {
                                            echo '<option value="'.$row->ops_name.'">'.$row->ops_name.'</option>';
                                            }
                                        ?>
                                    </select> 
                                    <!-- <input type="text" class="form-control" name="ops_name" id="ops_name" placeholder="Operations Name" aria-label="name"> -->
                                </div>
                                <span id="ops_name_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-id-badge text-white"></i></button>
                                    <input type="text" class="form-control" name="ops_head_empid" id="ops_head_empid" placeholder="Operations Head Emp ID" aria-label="name">
                                </div>
                                <span id="ops_head_empid_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" name="ops_head_name" id="ops_head_name" placeholder="Operations Head Name" aria-label="name">
                                </div>
                                <span id="ops_head_name_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-mobile text-white"></i></button>
                                    <input type="text" class="form-control" name="ops_head_mobileno" id="ops_head_mobileno" placeholder="Operations Head Mobile Number" aria-label="name">
                                </div>
                                <span id="ops_head_mobileno_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                    <input type="email" class="form-control" name="ops_head_email" id="ops_head_email" placeholder="Operations Head Email" aria-label="name">
                                </div>
                                <span id="ops_head_email_error" class="text-danger"></span>
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
                                <h5 class="modal-title" id="editmodelLabel"><i class="ti-marker-alt m-r-10"></i> Edit Operations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                               
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                    <select name="ops_name" id="ops_name_edit" class="form-control">
                                        <option  value="" disabled='disabled' selected>Operations</option>
                                        <?php
                                            foreach($ops_name as $row)
                                            {
                                            echo '<option value="'.$row->ops_name.'">'.$row->ops_name.'</option>';
                                            }
                                        ?>
                                    </select> 
                                    <!-- <input type="text" class="form-control" name="ops_name" id="ops_name" placeholder="Operations Name" aria-label="name"> -->
                                </div>
                                <span id="ops_name_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-id-badge text-white"></i></button>
                                    <input type="text" class="form-control" name="ops_head_empid_edit" id="emp_id_edit" placeholder="Operations Head Emp ID" aria-label="name">
                                </div>
                                <span id="ops_head_empid_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" name="ops_head_name_edit" id="emp_name_edit" placeholder="Operations Head Name" aria-label="name">
                                </div>
                                <span id="ops_head_name_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-mobile text-white"></i></button>
                                    <input type="text" class="form-control" name="ops_head_mobileno_edit" id="emp_mob_edit" placeholder="Operations Head Mobile Number" aria-label="name">
                                </div>
                                <span id="ops_head_mobileno_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                    <input type="email" class="form-control" name="ops_head_email_edit" id="emp_email_edit" placeholder="Operations Head Email" aria-label="name">
                                </div>
                                <span id="ops_head_email_edit_error" class="text-danger"></span>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="ops_id_edit" id="ops_id_edit" class="form-control">
                                <input type="hidden" name="id_users_table" id="id_users" class="form-control">
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
                                <h5 class="modal-title" id="deletemodelLabel"><i class="ti-marker-alt m-r-10"></i> Delete Operations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <strong>Are you sure to delete this record? </strong>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="delete_id" class="form-control">
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
                                <h5 class="modal-title" id="activemodelLabel"><i class="ti-marker-alt m-r-10"></i> Active Operations</h5>
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
                                <h5 class="modal-title" id="activemodelLabel"><i class="ti-marker-alt m-r-10"></i> Deactive Operations</h5>
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

    //focus on Employee ID
    $("#ops_head_empid").on('focusout',()=>{

        var ops_head_empid =$("#ops_head_empid").val();
        // alert(ops_head_empid);

        $.ajax({  
            url:"<?php echo base_url();?>/index.php/check_ops_head_empid_user_tb",
            type:"POST",
            data:{
                    "ops_head_empid": ops_head_empid,            
                },                    
            dataType : "JSON",
            success:function(data)
            {
                if(data.res_error)
                {
                    if(data.res_error == "Already Entered")
                    {
                        var ops_head_empid_error = " ";                   
                        $('#ops_head_empid_error').html(ops_head_empid_error); 
                        var ops_head_empid_error = "The Employee ID field must contain a unique value.";                   
                        $('#ops_head_empid_error').html(ops_head_empid_error);
                        // var timeout = 3000; // in miliseconds (3*1000)
                        // $('#client_emp_id_error').delay(timeout).fadeOut(300);                                                      
                    }                            
                }else{
                    if(data.success == "Success")
                    {
                        var ops_head_empid_error = " ";                   
                        $('#ops_head_empid_error').html(ops_head_empid_error);                                                                                  
                    }                            
                }
            }
        }); 

    });
    </script>

    <script>
        // save new employee record
        $("#save").on('click',()=>{
        var add_ops_login_form=$("#add_ops_login_form").val();
        var ops_head_empid=$("#ops_head_empid").val();
        var ops_head_name=$("#ops_head_name").val();
        var ops_head_mobileno=$("#ops_head_mobileno").val();
        var ops_head_mobileno=$("#ops_head_mobileno").val();
        var ops_head_email=$("#ops_head_email").val();
        // alert(dept);
        // console.log(dept);
        $.ajax({
           url:"<?php echo base_url();?>/index.php/add_operation_login_form_insert",
           type:"POST",
           data:$("#add_ops_login_form").serialize(),
           dataType : "JSON",
           success:function(data)
           {
                if(data.error)
                {
                    if(data.ops_name_error != '')
                    {
                    $('#ops_name_error').html(data.ops_name_error);
                    }
                    else
                    {
                    $('#ops_name_error').html('');
                    }
                    if(data.ops_head_empid_error != '')
                    {
                    $('#ops_head_empid_error').html(data.ops_head_empid_error);
                    }
                    else
                    {
                    $('#ops_head_empid_error').html('');
                    }
                    if(data.ops_head_name_error != '')
                    {
                    $('#ops_head_name_error').html(data.ops_head_name_error);
                    }
                    else
                    {
                    $('#ops_head_name_error').html('');
                    }
                    if(data.ops_head_mobileno_error != '')
                    {
                    $('#ops_head_mobileno_error').html(data.ops_head_mobileno_error);
                    }
                    else
                    {
                    $('#ops_head_mobileno_error').html('');
                    }
                    if(data.ops_head_email_error != '')
                    {
                    $('#ops_head_email_error').html(data.ops_head_email_error);
                    }
                    else
                    {
                    $('#ops_head_email_error').html('');
                    }
                }else{
                    $('#dept').val("");
                    $('#createmodel').modal('hide');
                    window.location.reload();
                    ops_data();
                }
           }
        });
        return false;        
    });
    </script>

  
    <script type="text/javascript">
        $(document).ready(function() {
            ops_data();    

            var timeout = 3000; // in miliseconds (3*1000)
            $('#flashdata').delay(timeout).fadeOut(300);
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

        function ops_data(){   
            
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
                    
                    
                ],  
                'dom': 'Blfrtip', 
                "aoColumnDefs": [
                    
                ],
                'ajax': {
                    // type: 'POST',
                    'url': "<?= base_url(); ?>/index.php/admin_ops_login_report_data",
                    // 'url': BASE_URL + 'welocme/index',
                    // 'url': BASE_URL + 'welocme/Operations_report_data',
                    // "datetype": "json",
                    'data': function(data) {
                        // if(data){
                        //     alert(data)
                        // }
                    }
                },
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                    $( row ).find('td:eq(1)').attr('data-label', 'Employee ID');
                    $( row ).find('td:eq(2)').attr('data-label', 'Employee Name');
                    $( row ).find('td:eq(3)').attr('data-label', 'Employee Email');
                    $( row ).find('td:eq(4)').attr('data-label', 'Mobile No');
                    $( row ).find('td:eq(5)').attr('data-label', 'Operations Name');
                    $( row ).find('td:eq(6)').attr('data-label', 'Action');
                
                },
                "columns": [
                
                    {
                        title: 'S.No',
                        render: function(data, type, row, meta) {

                            return meta.row + meta.settings._iDisplayStart + 1;

                        }
                    },
                    { "data": "emp_id" },           
                    { "data": "emp_name" },           
                    { "data": "emp_email" },           
                    { "data": "emp_mob" },           
                    { "data": "ops_name_part" },           
                    { "data": "action" },           
                    
                ],
                "order": [
                    [1, 'asc']
                ]
            });

        
        }

        $('#report_table').on('click','.editRecord',function(){
            var id_users = $(this).data('id'); 
            var ops_name_edit = $(this).data('ops_name'); 
            var ops_id_edit = $(this).data('ops_id'); 
            var emp_id_edit = $(this).data('emp_id'); 
            var emp_name_edit = $(this).data('emp_name'); 
            var emp_mob_edit = $(this).data('emp_mob'); 
            var emp_email_edit = $(this).data('emp_email'); 

            // alert(client_id)           
            $('#editmodel').modal('show');
            // alert(deptId);
            $('#id_users').val(id_users);
            $('#ops_name_edit').val(ops_name_edit);
            $('#ops_id_edit').val(ops_id_edit);
            $('#emp_id_edit').val(emp_id_edit);
            $('#emp_name_edit').val(emp_name_edit);
            $('#emp_mob_edit').val(emp_mob_edit);
            $('#emp_email_edit').val(emp_email_edit);
	    });

        $("#edit").on('click',()=>{
            // var mytest=$("#mytest").val();
            // alert(mytest);
            $.ajax({
                url:"<?php echo base_url();?>/index.php/head_ops_login_update",
                type:"POST",
                data:$("#edit_form").serialize(),
                dataType : "JSON",
                success:function(data)
                {            
                    if(data.error)
                    {
                        if(data.ops_name_edit_error != '')
                        {
                        $('#ops_name_edit_error').html(data.ops_name_edit_error);
                        }
                        else
                        {
                        $('#ops_name_edit_error').html('');
                        }
                        if(data.ops_head_empid_edit_error != '')
                        {
                        $('#ops_head_empid_edit_error').html(data.ops_head_empid_edit_error);
                        }
                        else
                        {
                        $('#ops_head_empid_edit_error').html('');
                        }
                        if(data.ops_head_name_edit_error != '')
                        {
                        $('#ops_head_name_edit_error').html(data.ops_head_name_edit_error);
                        }
                        else
                        {
                        $('#ops_head_name_edit_error').html('');
                        }
                        if(data.ops_head_mobileno_edit_error != '')
                        {
                        $('#ops_head_mobileno_edit_error').html(data.ops_head_mobileno_edit_error);
                        }
                        else
                        {
                        $('#ops_head_mobileno_edit_error').html('');
                        }
                        if(data.ops_head_email_edit_error != '')
                        {
                        $('#ops_head_email_edit_error').html(data.ops_head_email_edit_error);
                        }
                        else
                        {
                        $('#ops_head_email_edit_error').html('');
                        }
                    }
                    else
                    {
                        $('#dept').val("");
                        $('#editmodel').modal('hide');
                        window.location.reload();
                        ops_data();
                    }
                }
            });
            return false;        
        });
        
        $('#report_table').on('click','.deleteRecord',function(){
            var ops_id = $(this).data('id'); 
            // alert(ops_id)           
            $('#deletemodel').modal('show');
            // alert(deptId);
            $('#delete_id').val(ops_id);
	    });

    
        $("#delete").on('click',()=>{
            var id=$("#delete_id").val();
            // alert(id);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/user_delete",
            type:"POST",
            data:$("#delete_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#deletemodel').modal('hide');
                    window.location.reload();
                    ops_data();
            }
            });
            return false;        
        });

        $('#report_table').on('click','.activeRecord',function(){
            var id = $(this).data('id'); 
            var status = $(this).data('status');
            // alert(id)
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
    

        $("#active").on('click',()=>{
            var id=$("#activeid").val();
            // alert(id);
            
            $.ajax({
            url:"<?php echo base_url();?>/index.php/user_active",
            type:"POST",
            data:$("#active_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#activemodel').modal('hide');
                    window.location.reload();
                    ops_data();
            }
            });
            return false;        
        });

        $("#deactive").on('click',()=>{
            var id=$("#deactiveid").val();
            // alert(id);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/user_deactive",
            type:"POST",
            data:$("#deactive_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#deactivemodel').modal('hide');
                    window.location.reload();
                    ops_data();
            }
            });
            return false;        
        });


	</script>

</body>

</html>
   