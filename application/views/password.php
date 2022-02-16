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
    <title>Password</title>
    <!-- This page plugin CSS -->
    <link href="<?= base_url(); ?>assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">    
    <!-- Notification CSS -->
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
    <!-- Bootstrap plugin -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    
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
                        <h4 class="page-title">Changing Password</h4>
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
                                    <h4 class="card-title">New Password</h4>
                                </div>                               

                                <div class="row">
                                    <div class="col-lg-6 col-xl-12 col-md-6">
                                        <form action="javascript:void(0)" id="myprofile_user_form" method="post" enctype="multipart/form-data">                        
                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class=" ti-user text-white"></i></button>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="New Password" aria-label="no" required>
                                            </div>
                                            <span id="password_error_edit" class="text-danger"></span>
                                            <div class="input-group mb-3">
                                                <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" aria-label="no" required>
                                            </div>
                                            <span id="confirm_password_error_edit" class="text-danger"></span>                                            

                                            <input type="hidden" class="form-control" name="emp_id"  id="emp_id" value="<?php echo $this->session->userdata('emp_id'); ?>" aria-label="no" required>
                                            <button type="button"  onclick="setTimeout(function(){ window.location.href='<?php echo base_url();?>users'; }, 1000);" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" id="edit" name="edit" value="submit"  class="btn btn-success"><i class="ti-save"></i> Submit</button>
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
            
             <!-- Password Chenged Success Msg -->
             <div class="modal fade" id="passwordmodel" tabindex="-1" role="dialog" aria-labelledby="activemodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="javascript:void(0)" id="active_form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="activemodelLabel"><i class="ti-marker-alt m-r-10"></i> Password Change</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <strong>Password Changed Successfully!</strong>
                            </div>
                        </form>
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
    });
    </script>

<script>
    // Add User button function  
  
    $("#edit").on('click',()=>{
        $.ajax({
           url:"<?php echo base_url();?>/index.php/password_change",
           type:"POST",
           data:$("#myprofile_user_form").serialize(),
           dataType : "JSON",
           success:function(data)
           {
                // var res=JSON.parse(data);
                if(data.error)
                {
                    if(data.password_error_edit != '')
                    {
                    $('#password_error_edit').html(data.password_error_edit);
                    }
                    else
                    {
                    $('#password_error_edit').html('');
                    }
                    if(data.confirm_password_error_edit != '')
                    {
                    $('#confirm_password_error_edit').html(data.confirm_password_error_edit);
                    }
                    else
                    {
                    $('#confirm_password_error_edit').html('');
                    }
                }      
                else{
                    $('#passwordmodel').modal('show');
                    setTimeout(function(){
                        window.location.href='<?php echo base_url();?>index.php/Welcome/index';                     
                      }, 4000);
                }          
                
               
           }
        })           
    })
</script>

</body>

</html>
   