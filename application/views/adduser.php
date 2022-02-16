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
    <title>Add Users</title>
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
                        <h4 class="page-title">Add User</h4>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                </div>
            </div>        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">Add Users</h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xl-12 col-md-7">
                                        <form action="javascript:void(0)" id="user_form" method="post" enctype="multipart/form-data">                        
                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class=" ti-id-badge text-white"></i></button>
                                                <input type="text" class="form-control" name="emp_id"  id="emp_id" placeholder="Employee ID" aria-label="name" required> 
                                            </div>
                                            <span id="emp_id_error" class="text-danger"></span>
                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class=" ti-user text-white"></i></button>
                                                <input type="text" class="form-control" name="emp_name" id="emp_name" placeholder="Employee Name" aria-label="no" required>
                                            </div>
                                            <span id="emp_name_error" class="text-danger"></span>
                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                                <input type="email" class="form-control" name="emp_email" id="emp_email" placeholder="Employee Email" aria-label="no" required>
                                            </div>
                                            <span id="emp_email_error" class="text-danger"></span>
                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class="ti-mobile text-white"></i></button>
                                                <input type="text" class="form-control"  name="emp_mob" id="emp_mob" placeholder="Mobile No" aria-label="no" required>
                                            </div>
                                            <span id="emp_mob_error" class="text-danger"></span>
                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                                <input type="text" class="form-control" name="emp_des" id="emp_des" placeholder="Designation" aria-label="no" required>
                                            </div>
                                            <span id="emp_des_error" class="text-danger"></span>
                                            <?php if($this->session->userdata('role') == "Operations Head"){ ?>     
                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class="ti-info-alt text-white"></i></button>
                                                <select id="role" name="emp_role" class="form-control" required>
                                                    <option>Role</option>
                                                    <!-- <option value="Operations Head">Operations Head</option> -->
                                                    <option value="Team Leader">Team Leader</option>
                                                    <option value="Team Member">Team Member</option>
                                                </select>
                                            </div>    
                                            <?php }  else if($this->session->userdata('role') == 'Team Leader'){  ?>
                                                <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class="ti-info-alt text-white"></i></button>
                                                <select id="role" name="emp_role" class="form-control" required>
                                                    <option>Role</option>
                                                    <!-- <option value="teamleader">Team Leader</option> -->
                                                    <option value="Team Member">Team Member</option>
                                                </select>
                                            </div>   
                                            <?php } ?>
                                            <div class="input-group mb-3" id="tm">
                                                <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                                <select id="teammember" name="emp_teammb[]" class="form-control" multiple>
                                                    <option value="">Team Member</option>
                                                    <?php
                                                        foreach($emp_name as $row)
                                                        {
                                                        echo '<option>'.$row->emp_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>                                           

                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class="ti-tablet text-white"></i></button>
                                                <input type="text" class="form-control" name="emp_keyskill"  id="emp_keyskill" placeholder="Key Skills" aria-label="no" required>
                                            </div> 
                                            <span id="emp_keyskill_error" class="text-danger"></span>
                                            <button type="button"  onclick="setTimeout(function(){ window.location.href='<?php echo base_url();?>users'; }, 1000);" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" id="save" name="save" value="submit"  class="btn btn-success"><i class="ti-save"></i> Save</button>
                                        </form>                                
                                    </div>
                                    <div class="col-lg-6 col-xl-0 col-md-5">
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
            if(role == "Team Leader"){
                // $(".input-group").show();
                x.style.display = "flex";
            }else{
                $("#tm").hide();
            }
        })
    });

    //focus on Employee ID
    $("#emp_id").on('focusout',()=>{

        var emp_id =$("#emp_id").val();
        // alert(emp_id);

        $.ajax({  
            url:"<?php echo base_url();?>/index.php/check_empid_user_tb",
            type:"POST",
            data:{
                    "emp_id": emp_id,            
                },                    
            dataType : "JSON",
            success:function(data)
            {
                if(data.res_error)
                {
                    if(data.res_error == "Already Entered")
                    {
                        var emp_id_error = " ";                   
                        $('#emp_id_error').html(emp_id_error); 
                        var emp_id_error = "The Employee ID field must contain a unique value.";                   
                        $('#emp_id_error').html(emp_id_error);
                        // var timeout = 3000; // in miliseconds (3*1000)
                        // $('#client_emp_id_error').delay(timeout).fadeOut(300);                                                      
                    }                            
                }else{
                    if(data.success == "Success")
                    {
                        var emp_id_error = " ";                   
                        $('#emp_id_error').html(emp_id_error);                                                                                  
                    }                            
                }
            }
        }); 

    });
    </script>

<script>
    // Add User button function
    function myFunction() {
        window.location.href="<?php echo base_url();?>adduser";
    }

  
    $("#save").on('click',()=>{      
        $.ajax({
           url:"<?php echo base_url();?>/index.php/user_insert",
           type:"POST",
           data:$("#user_form").serialize(),
           dataType : "JSON",
           success:function(data)
           {
                // var res=JSON.parse(data);
                if(data.error)
                {
                    if(data.emp_id_error != '')
                    {
                    $('#emp_id_error').html(data.emp_id_error);
                    }
                    else
                    {
                    $('#emp_id_error').html('');
                    }
                    if(data.emp_name_error != '')
                    {
                    $('#emp_name_error').html(data.emp_name_error);
                    }
                    else
                    {
                    $('#emp_name_error').html('');
                    }
                    if(data.emp_email_error != '')
                    {
                    $('#emp_email_error').html(data.emp_email_error);
                    }
                    else
                    {
                    $('#emp_email_error').html('');
                    }
                    if(data.emp_mob_error != '')
                    {
                    $('#emp_mob_error').html(data.emp_mob_error);
                    }
                    else
                    {
                    $('#emp_mob_error').html('');
                    }
                    if(data.emp_des_error != '')
                    {
                    $('#emp_des_error').html(data.emp_des_error);
                    }
                    else
                    {
                    $('#emp_des_error').html('');
                    }
                    if(data.emp_keyskill_error != '')
                    {
                    $('#emp_keyskill_error').html(data.emp_keyskill_error);
                    }
                    else
                    {
                    $('#emp_keyskill_error').html('');
                    }
                }      
                else{

                    window.location.href='<?php echo base_url();?>index.php/users'; 
                    
                }          
                
               
           }
        })           
    })
</script>

</body>

</html>
   