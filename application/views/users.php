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
    <title>Users</title>
    <!-- This page plugin CSS -->
    <link href="<?= base_url(); ?>assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">    
    <!-- Bootstrap plugin -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link href="<?php echo base_url();?>assets/css/response_table.css" rel="stylesheet"/>
    <style>        
        #tm{
            display: none;
        }
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
                        <h4 class="page-title">User List</h4>
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
                                    <h4 class="card-title">All Users</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-primary px-5" onClick="myFunction()" value="submit" style="margin-bottom: 20px;">Add Text Report</button> -->
                                            <button type="button" class="btn btn-dark" onClick="myFunction()" value="submit">
                                                Add User
                                            </button>
                                        </div>
                                    </div>
                                </div>                                                            
                                
                                <?php if($this->session->flashdata('msg')): ?>
                                    <div id="flashdata"  class="alert alert-success alert-dismissible" style="width:500px">
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
                                                <th>Designation</th>
                                                <th>Role</th>
                                                <th>Team Member</th>
                                                <th>Key Skills</th>
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
            
            <!-- Form Edit -->
            <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="javascript:void(0)" id="edit_form" method="post" enctype="multipart/form-data">                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="editmodelLabel"><i class="ti-marker-alt m-r-10"></i> Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div> 
                            <div class="modal-body"> 
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class=" ti-id-badge text-white"></i></button>
                                    <input type="text" class="form-control" name="emp_id" id="mytest" placeholder="Employee ID" aria-label="name">
                                </div>
                                <span id="emp_id_error_edit" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class=" ti-user text-white"></i></button>
                                    <input type="text" class="form-control" name="emp_name" id="mytest1" placeholder="Employee Name" aria-label="no">
                                </div>
                                <span id="emp_name_error_edit" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                    <input type="text" class="form-control" name="emp_email" id="mytest2" placeholder="Employee Email" aria-label="no">
                                </div>
                                <span id="emp_email_error_edit" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-mobile text-white"></i></button>
                                    <input type="text" class="form-control"  name="emp_mob" id="mytest3" placeholder="Mobile No" aria-label="no">
                                </div>
                                <span id="emp_mob_error_edit" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                    <input type="text" class="form-control" name="emp_des" id="mytest4" placeholder="Designation" aria-label="no">
                                </div>
                                <span id="emp_des_error_edit" class="text-danger"></span>
                                <?php if($this->session->userdata('role') == "Operations Head"){ ?>     
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-info-alt text-white"></i></button>
                                    <select id="mytest5"  name="emp_role" class="form-control">
                                        <option value="" disabled='disabled'>Role</option>
                                        <option value="Operations Head" id="role1">Operations Head</option>
                                        <option value="Team Leader" id="role2">Team Leader</option>
                                        <option value="Team Member" id="role3">Team Member</option>
                                    </select>
                                </div>    
                                <?php }  else if($this->session->userdata('role') == 'Team Leader'){  ?>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-info-alt text-white"></i></button>
                                    <select id="mytest5" name="emp_role" class="form-control">
                                        <option value="" disabled='disabled'>Role</option>
                                        <option value="Operations Head" id="role1">Operations Head</option>
                                        <option value="Team Leader" id="role2">Team Leader</option> 
                                        <option value="Team Member" id="role3">Team Member</option>
                                    </select>
                                </div>  
                                <!-- <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                    <select id="mytest6" name="emp_teammb[]" class="form-control" multiple>
                                        <option value="">Team Member</option>
                                        <?php
                                            // foreach($emp_name as $row)
                                            // {
                                            // echo '<option>'.$row->emp_name.'</option>';
                                            // }
                                        ?>
                                    </select>
                                </div>                                   -->
                                <?php } ?>                                                               
                                <div class="input-group mb-3" id="tm">
                                    <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                    <select id="mytest6" name="emp_teammb[]" class="form-control" multiple>
                                        <!-- <option value="">Team Member</option> -->
                                        <?php
                                            // foreach($emp_name as $row)
                                            // {
                                            // echo '<option>'.$row->emp_name.'</option>';
                                            // }
                                        ?>
                                    </select>
                                </div>     
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-tablet text-white"></i></button>
                                    <input type="text" class="form-control" name="emp_keyskill" id="mytest7" placeholder="Key Skills" aria-label="no">
                                </div> 
                                <span id="emp_keyskill_error_edit" class="text-danger"></span>
                            </div> 
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="user_id" class="form-control">
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
                                <h5 class="modal-title" id="deletemodelLabel"><i class="ti-marker-alt m-r-10"></i> Delete User</h5>
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
                                <h5 class="modal-title" id="activemodelLabel"><i class="ti-marker-alt m-r-10"></i> Active User</h5>
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
                                <h5 class="modal-title" id="activemodelLabel"><i class="ti-marker-alt m-r-10"></i> Deactive User</h5>
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
   
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
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
    <!-- This Page JS -->
    <script src="<?= base_url(); ?>assets/libs/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
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
        radioswitch.init();   

       
    });
    </script>

    <script>
        // Add User button function
        function myFunction() {
            window.location.href="<?php echo base_url();?>index.php/adduser";
        }

    </script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            user_report_data();   

            var timeout = 3000; // in miliseconds (3*1000)
            $('#flashdata').delay(timeout).fadeOut(300);

            $("#mytest5").change(function(){
                var role=$("#mytest5").val();
                var x = document.getElementById('tm');
                if(role == "Team Leader"){
                    // $(".input-group").show();
                    x.style.display = "flex";

                    //team member list get from db to show edit
                    $.ajax({
                        url:"<?php echo base_url();?>/index.php/un_selected_user_tm_opt",
                        type:"POST",
                        data:{
                            role : role,
                            },
                        dataType : "JSON",
                        success:function(data)
                        {
                            // alert(data)
                            if(data == '')
                            {
                                $("#tm").hide();
                            }
                            else{
                                $('#mytest6').html(data);
                            }
                                    
                        }
                    });
                    
                }else if((role == "Team Member")){
                    var emp_id=$("#mytest").val();
                    // alert(role)
                    $("#tm").hide();
                     //team member list get from db to show edit
                     $.ajax({
                        url:"<?php echo base_url();?>/index.php/delete_old_tl_list_user",
                        type:"POST",
                        data:{
                            emp_id : emp_id,
                            },
                        dataType : "JSON",
                        success:function(data)
                        {
                            // alert(data)
                            if(data == '')
                            {
                                $("#tm").hide();
                                user_report_data();
                            }
                            // else{
                            //     $('#mytest6').html(data);
                            // }
                                    
                        }
                    });

                }else{
                    $("#tm").hide();
                }
            })
            
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

        function user_report_data(){   
            var ct = $('#file_export').DataTable({ 
                'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
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
                    
                    
                ],  
                'dom': 'Blfrtip', 
                "aoColumnDefs": [
                    
                ],
                'ajax': {
                    // type: 'POST',
                    'url': "<?= base_url(); ?>/index.php/user_report_data",
                    'data': function(data) {                       
                    }
                },
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                    $( row ).find('td:eq(1)').attr('data-label', 'Employee ID');
                    $( row ).find('td:eq(2)').attr('data-label', 'Employee Name');
                    $( row ).find('td:eq(3)').attr('data-label', 'Employee Email');
                    $( row ).find('td:eq(4)').attr('data-label', 'Mobile No');
                    $( row ).find('td:eq(5)').attr('data-label', 'Designation');
                    $( row ).find('td:eq(6)').attr('data-label', 'Role');
                    $( row ).find('td:eq(7)').attr('data-label', 'Team Member');
                    $( row ).find('td:eq(8)').attr('data-label', 'Key Skills');
                    $( row ).find('td:eq(9)').attr('data-label', 'Action');
                
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
                    { "data": "emp_des" },           
                    { "data": "emp_role" },           
                    { "data": "emp_teammb" },           
                    { "data": "emp_keyskill" },           
                    { "data": "action" },           
                    
                ],
                "order": [
                    [1, 'asc']
                ]
            });

        
        }

        $('#report_table').on('click','.editRecord',function(){
            // alert("edit")
            var user_id = $(this).data('id'); 
            var mytest = $(this).data('emp_id'); 
            var mytest1 = $(this).data('emp_name'); 
            var mytest2 = $(this).data('emp_email'); 
            var mytest3 = $(this).data('emp_mob'); 
            var mytest4 = $(this).data('emp_des'); 
            var mytest5 = $(this).data('emp_role'); 
            var mytest6 = $(this).data('emp_teammb'); 
            var mytest7 = $(this).data('emp_keyskill'); 

            if(mytest5 == "Operations Head"){
                $("#role2").hide();
                $("#role3").hide();

                var x = document.getElementById('role1');              
                x.style.display = "flex";   

                var z = document.getElementById('tm');              
                z.style.display = "flex";   

                 //team member list get from db to show edit
                 $.ajax({
                    url:"<?php echo base_url();?>/index.php/user_tl_sel_opt",
                    type:"POST",
                    data:{
                        emp_id : mytest,
                        user_ops_head : mytest5,
                        },
                    dataType : "JSON",
                    success:function(data)
                    {
                        if(data == '')
                        {
                            $("#tm").hide();
                        }
                        else{
                            $('#mytest6').html(data);
                        }
                                
                    }
                });

            }else if(mytest5 == "Team Leader"){
                $("#role1").hide();

                var x = document.getElementById('role2');              
                x.style.display = "flex";  

                var y = document.getElementById('role3');              
                y.style.display = "flex"; 

                var z = document.getElementById('tm');              
                z.style.display = "flex";   

                 //team member list get from db to show edit
                 $.ajax({
                    url:"<?php echo base_url();?>/index.php/user_tm_sel_opt",
                    type:"POST",
                    data:{
                        emp_id : mytest,
                        user_tl : mytest5,
                        },
                    dataType : "JSON",
                    success:function(data)
                    {
                        if(data == '')
                        {
                            $("#tm").hide();
                        }
                        else{
                            $('#mytest6').html(data);
                        }
                                
                    }
                });

            }else if(mytest5 == "Team Member"){
                $("#role1").hide();

                var x = document.getElementById('role2');              
                x.style.display = "flex";  

                var y = document.getElementById('role3');              
                y.style.display = "flex"; 

                $("#tm").hide();
            } 

            $('#editmodel').modal('show');
            // alert(deptId);
            $('#mytest').val(mytest);
            $('#mytest1').val(mytest1);
            $('#mytest2').val(mytest2);
            $('#mytest3').val(mytest3);
            $('#mytest4').val(mytest4);
            $('#mytest5').val(mytest5);
            $('#mytest6').val(mytest6);
            $('#mytest7').val(mytest7);
            $('#user_id').val(user_id);

	    });

        $("#edit").on('click',()=>{   
        
            $.ajax({
            url:"<?php echo base_url();?>/index.php/user_update",
            type:"POST",
            data:$("#edit_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    
                if(data.error)
                {
                    if(data.emp_id_error_edit != '')
                    {
                    $('#emp_id_error_edit').html(data.emp_id_error_edit);
                    }
                    else
                    {
                    $('#emp_id_error_edit').html('');
                    }
                    if(data.emp_name_error_edit != '')
                    {
                    $('#emp_name_error_edit').html(data.emp_name_error_edit);
                    }
                    else
                    {
                    $('#emp_name_error_edit').html('');
                    }
                    if(data.emp_email_error_edit != '')
                    {
                    $('#emp_email_error_edit').html(data.emp_email_error_edit);
                    }
                    else
                    {
                    $('#emp_email_error_edit').html('');
                    }
                    if(data.emp_mob_error_edit != '')
                    {
                    $('#emp_mob_error_edit').html(data.emp_mob_error_edit);
                    }
                    else
                    {
                    $('#emp_mob_error_edit').html('');
                    }
                    if(data.emp_des_error_edit != '')
                    {
                    $('#emp_des_error_edit').html(data.emp_des_error_edit);
                    }
                    else
                    {
                    $('#emp_des_error_edit').html('');
                    }
                    if(data.emp_keyskill_error_edit != '')
                    {
                    $('#emp_keyskill_error_edit').html(data.emp_keyskill_error_edit);
                    }
                    else
                    {
                    $('#emp_keyskill_error_edit').html('');
                    }
                }
                else
                {
                    $('#mytest').val("");
                    $('#mytest1').val("");
                    $('#mytest2').val("");
                    $('#mytest3').val("");
                    $('#mytest4').val("");
                    $('#mytest5').val("");
                    $('#mytest6').val("");
                    $('#mytest7').val("");
                    $('#editmodel').modal('hide');
                    window.location.reload();
                    user_report_data();
                }
                                                            
            }
            });
            return false;        
        });
        
        $('#report_table').on('click','.deleteRecord',function(){
            var user_id = $(this).data('id'); 
            // alert(client_id)           
            $('#deletemodel').modal('show');
            // alert(deptId);
            $('#delete_id').val(user_id);
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
                user_report_data();
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
                    user_report_data();
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
                    user_report_data();
            }
            });
            return false;        
        });


	</script>


</body>

</html>
   