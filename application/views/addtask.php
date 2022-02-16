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
    <title>Add Task</title>
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
                        <h4 class="page-title">Add Task</h4>
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
                                    <h4 class="card-title">Add Task</h4>
                                </div>
                                
                                <?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert alert-success alert-dismissible" style="width:500px">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <?php echo $this->session->flashdata('msg'); ?>
                                    </div>
                                <?php endif; ?>

                                 <?php //print_r($errors); 
                                    if(!empty($errors)){
                                        echo $errors;
                                    }
                                ?>
                                <div class="row">
                                    <div class="col-lg-7 col-xl-12 col-md-7">
                                        <!-- <form class="project_form_insert" action="<?php //echo base_url('welcome/project_form_insert'); ?>" enctype="multipart/form-data" id="project_form_insert"  data-parsley-validate method="post" autocomplete="off"> -->
                                        <!-- <form class="form-horizontal" id="submit" enctype="multipart/form-data">                                             -->
                                        <form action="javascript:void(0)" id="task_form" enctype="multipart/form-data">                        
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class=" ti-id-badge text-white"></i></button>
                                                    <select id="task_name" name="task_name" class="form-control">
                                                        <option>Project </option>
                                                        <!-- <option>Project 1</option>
                                                        <option>Project </option> -->
                                                        <?php
                                                            foreach($prt_name as $row)
                                                            {
                                                                echo '<option>'.$row->prt_name.'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <span id="task_name_error" class="text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class=" ti-user text-white"></i></button>
                                                    <select id="tl_task" name="tl_task" class="form-control">
                                                        <option>Team Leader</option>
                                                        <!-- <option>Team </option>
                                                        <option> Leader</option> -->
                                                        <?php
                                                            foreach($emp_name as $row)
                                                            {
                                                            echo '<option>'.$row->emp_name.'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <span id="tl_task_error" class="text-danger"></span>      
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                                    <textarea class="form-control" name="task_detail" id="task_detail" placeholder="Task Details" style="height: 100px"></textarea>                                    
                                                </div>
                                                <span id="task_detail_error" class="text-danger"></span>
                                                <div class="input-group mb-3">
                                                    <button type="button" class="btn btn-info"><i class="ti-file text-white"></i></button>
                                                    <input type="file" id="file_name" multiple="multiple" name="file_name[]" class="form-control" placeholder="File Upload" aria-label="name">
                                                </div>
                                                <span id="file_name_error" class="text-danger"></span>
                                            </div>
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
    });
    </script>

<script>
$(document).ready(function(){
    // Submit form data via Ajax
    $("#task_form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url();?>task_insert",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                if(data.error)
                {
                    if(data.task_name_error != '')
                    {
                    $('#task_name_error').html(data.task_name_error);
                    }
                    else
                    {
                    $('#task_name_error').html('');
                    }
                    if(data.tl_task_error != '')
                    {
                    $('#tl_task_error').html(data.tl_task_error);
                    }
                    else
                    {
                    $('#tl_task_error').html('');
                    }
                    if(data.task_detail_error != '')
                    {
                    $('#task_detail_error').html(data.task_detail_error);
                    }
                    else
                    {
                    $('#task_detail_error').html('');
                    }
                    if(data.file_name_error != '')
                    {
                    $('#file_name_error').html(data.file_name_error);
                    }
                    else
                    {
                    $('#file_name_error').html('');
                    }
                } 
                else
                {       
                    window.location.href='<?php echo base_url();?>task'; 
                }  
            }
        });
    });
	
    
});
</script>

</body>

</html>
   