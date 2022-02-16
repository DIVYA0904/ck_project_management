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
    <title>Add Project</title>
    <!-- This page plugin CSS -->
    <link href="<?= base_url(); ?>assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">    
    <!-- Notification CSS -->
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
    <!-- Bootstrap plugin -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <style>
        #tm{
            display: none;
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
                        <h4 class="page-title">Add Project</h4>
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
                                    <h4 class="card-title">Add Project</h4>
                                </div>
                                
                                 <?php //print_r($errors); 
                                    if(!empty($errors)){
                                        echo $errors;
                                    }
                                ?>

                                <?php if($this->session->flashdata('msg')): ?>
                                    <div id="flashdata" class="alert alert-success alert-dismissible" style="width:500px">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <?php echo $this->session->flashdata('msg'); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-lg-7 col-xl-12 col-md-7">
                                        <!-- <form class="project_form_insert" action="<?php //echo base_url('welcome/project_form_insert'); ?>" enctype="multipart/form-data" id="project_form_insert"  data-parsley-validate method="post" autocomplete="off"> -->
                                        <!-- <form class="form-horizontal" id="submit" enctype="multipart/form-data">                                             -->
                                        <form action="javascript:void(0)" id="project_form" enctype="multipart/form-data">                        
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-notepad text-white"></i></button>
                                                    <input type="text" class="form-control" name="prt_name" id="prt_name" placeholder="Project Name" aria-label="name">
                                                </div>
                                                <span id="prt_name_error" class="text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                                    <textarea class="form-control" name="prt_des" id="prt_des" placeholder="Project Description" style="height: 100px"></textarea>                                    
                                                </div>
                                                <span id="prt_des_error" class="text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-calendar text-white"></i></button>
                                                    <input type="date" name="prt_date" id="prt_date" class="form-control">                 
                                                </div>
                                                <span id="prt_date_error" class="text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-bar-chart text-white"></i></button>
                                                    <select name="prt_priority" id="prt_priority" placeholder="Priority" aria-label="no" class="form-control">
                                                        <option value="" disabled='disabled' selected>Priority</option>
                                                        <option>Normal</option>
                                                        <option>Medium</option>
                                                        <option>High</option>
                                                        <option>Low</option>
                                                    </select>                            
                                                </div>
                                                <span id="prt_priority_error" class="text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-hand-point-right text-white"></i></button>
                                                    <select name="prt_client" id="prt_client" class="form-control">
                                                        <option  value="" disabled='disabled' selected>Client</option>
                                                        <?php
                                                            foreach($client_name as $row)
                                                            {
                                                            echo '<option value="'.$row->client_name.'">'.$row->client_name.'</option>';
                                                            }
                                                        ?>
                                                    </select>                                
                                                </div>
                                                <span id="prt_client_error" class="text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-file text-white"></i></button>
                                                    <select name="prt_dept" id="prt_dept" class="form-control">
                                                        <option value="" disabled='disabled' selected>Department</option>
                                                        <?php
                                                            foreach($dept as $row)
                                                            {
                                                                echo '<option value="'.$row->dept.'">'.$row->dept.'</option>';
                                                            }
                                                        ?>
                                                    </select> 
                                                </div>
                                                <span id="prt_dept_error" class="text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                                    <select  name="prt_tl" id="prt_tl" class="form-control">
                                                        <option value="" disabled='disabled' selected>Team Leader</option>
                                                        <?php
                                                            foreach($emp_name as $row)
                                                            {
                                                                echo '<option value="'.$row->emp_name.'">'.$row->emp_name.'</option>';
                                                            }
                                                        ?>
                                                    </select>                                
                                                </div>         
                                                <span id="prt_tl_error" class="text-danger"></span>
                                                <div class="input-group mb-3" id="tm">
                                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                                    <select id="prt_tm_list" name="prt_tm_list[]" multiple placeholder="Team Member" aria-label="no" class="form-control" multiple>
                                                        <!-- <option>Team Member</option> -->                                                       
                                                    </select>                                   
                                                </div>         
                                                <span id="prt_tm_list_error" class="text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-file text-white"></i></button>
                                                    <input type="file" id="file_name" multiple="multiple" name="file_name[]" class="form-control" placeholder="File Upload" aria-label="name">
                                                </div>
                                            </div>
                                            <span id="file_name_error" class="text-danger"></span>
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <!-- <button class="btn btn-success" id="btn_upload" type="submit">Upload</button> -->
                                                    <button type="submit" id="submit" name="submit" value="submit"  class="btn btn-success submitBtn">Save</button>
                                                    <!-- <button type="submit" onclick="testing()" class="btn btn-primary w-md">Submit</button> -->
                                                </div>
                                                
                                            </div>
                                        </form>               
                                    </div>
                                    <div class="col-lg-5 col-xl-0 col-md-5">
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                      
            <?php include('includes/footer.php'); ?>
        </div>        
    </div> 
   
    <!-- ============================================================== onclick="info_noti();" -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!--notification js -->
	<script src="<?= base_url(); ?>assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/notifications/js/notification-custom-script.js"></script>


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

        var timeout = 3000; // in miliseconds (3*1000)
        $('#flashdata').delay(timeout).fadeOut(300);


            //focus on project name
            $("#prt_name").on('focusout',()=>{

                var prt_name =$("#prt_name").val();
                // alert(client_id);

                $.ajax({  
                    url:"<?php echo base_url();?>/index.php/check_prt_name_project_tb",
                    type:"POST",
                    data:{
                            "prt_name": prt_name,            
                        },                    
                    dataType : "JSON",
                    success:function(data)
                    {
                        if(data.res_error)
                        {
                            if(data.res_error == "Already Entered")
                            {
                                var prt_name_error = " ";                   
                                $('#prt_name_error').html(prt_name_error); 
                                var prt_name_error = "The Project Name field must contain a unique value.";                   
                                $('#prt_name_error').html('');     
                                $('#prt_name_error').html(prt_name_error);     
                                // var timeout = 3000; // in miliseconds (3*1000)
                                // $('#name_error').delay(timeout).fadeOut(300);                           
                            }                            
                        }else{
                            if(data.success == "Success")
                            {
                                var prt_name_error = " ";                   
                                $('#prt_name_error').html(prt_name_error);                                                                                  
                            }
                        }
                    }
                }); 

            });

        $("#role").change(function(){
            var role=$("#role").val();
            var x = document.getElementById('tm');
            if(role == "teamleader"){
                // $(".input-group").show();
                x.style.display = "flex";
            }else{
                $("#tm").hide();
            }
        })

        $("#prt_tl").change(function(){
            var prt_tl=$("#prt_tl").val();
            // alert(prt_tl)
            var x = document.getElementById('tm');
            if(prt_tl != null && prt_tl != ''){
                // $(".input-group").show();
                
                x.style.display = "flex";

                $.ajax({
                    url:"<?php echo base_url();?>/index.php/project_team_member_option",
                    type:"POST",
                    data:{
                        prt_tl : prt_tl,
                        },
                    dataType : "JSON",
                    success:function(data)
                    {
                            // var res=JSON.parse(data);
                        // alert(data)prt_tm_list
                        if(data == '')
                        {
                            $("#tm").hide();
                        }
                        else{
                            $('#prt_tm_list').html(data);
                        }
                                
                    }
                });

            }else{
                $("#tm").hide();
            }
        })
    });
    </script>

<script>
$(document).ready(function(){
    // Submit form data via Ajax
    $("#project_form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url();?>/index.php/project_form_insert",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
               if(data.error)
                {
                    if(data.prt_name_error != '')
                    {
                    $('#prt_name_error').html(data.prt_name_error);
                    }
                    else
                    {
                    $('#prt_name_error').html('');
                    }
                    if(data.prt_des_error != '')
                    {
                    $('#prt_des_error').html(data.prt_des_error);
                    }
                    else
                    {
                    $('#prt_des_error').html('');
                    }
                    if(data.prt_priority_error != '')
                    {
                    $('#prt_priority_error').html(data.prt_priority_error);
                    }
                    else
                    {
                    $('#prt_priority_error').html('');
                    }
                    if(data.prt_client_error != '')
                    {
                    $('#prt_client_error').html(data.prt_client_error);
                    }
                    else
                    {
                    $('#prt_client_error').html('');
                    }
                    if(data.prt_dept_error != '')
                    {
                    $('#prt_dept_error').html(data.prt_dept_error);
                    }
                    else
                    {
                    $('#prt_dept_error').html('');
                    }
                    if(data.prt_tl_error != '')
                    {
                    $('#prt_tl_error').html(data.prt_tl_error);
                    }
                    else
                    {
                    $('#prt_tl_error').html('');
                    }
                    if(data.prt_tm_list_error != '')
                    {
                    $('#prt_tm_list_error').html(data.prt_tm_list_error);
                    }
                    else
                    {
                    $('#prt_tm_list_error').html('');
                    }
                    if(data.file_name_error != '')
                    {
                    $('#file_name_error').html(data.file_name_error);
                    }
                    else
                    {
                    $('#file_name_error').html('');
                    }
                    if(data.prt_date_error != '')
                    {
                    $('#prt_date_error').html(data.prt_date_error);
                    }
                    else
                    {
                    $('#prt_date_error').html('');
                    }
                }else if(data.res_error == "Already Entered"){
                    // alert("dd")
                    $('#prt_priority_error').html('');
                    $('#prt_tl_error').html('');
                    $('#prt_tm_list_error').html('');
                    $('#prt_name_error').html('');

                    var prt_name_error = "The Project name field must contain a unique value.";                   
                    $('#prt_name_error').html(prt_name_error);                   

                }else{       
                    window.location.href='<?php echo base_url();?>index.php/project'; 
                }  
            }
        });
    });
	
    
});
</script>

</body>

</html>
   