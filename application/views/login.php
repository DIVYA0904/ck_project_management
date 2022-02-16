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
    <title>Login</title>
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/css/style.min.css" rel="stylesheet">  
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">    

</head>

<body>
    <div id="main-wrapper">            
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="<?= base_url(); ?>assets/images/logo-icon.png" alt="logo" class="login_logo" /></span>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" action="javascript:void(0)" id="login_form" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Employee ID" id="emp_id" name="emp_id" aria-label="Employee ID" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-notepad"></i></span>
                                    </div>
                                    <select name="role_type" id="role_type"
                                        class="form-control">
                                        <option value="">Select Role Type</option>
                                        <!-- <option value="" disabled='disabled' selected>Priority</option> -->
                                        <option value="Admin">Admin</option>
                                        <option value="Operations Head">Operations Head</option>
                                        <option value="Team Leader">Team Leader</option>
                                        <option value="Team Member">Team Member</option>
                                        <option value="Client">Client</option>
                                        <option value="Client">Durga</option>
                                        <option value="Client">Divya</option>
                                    </select>                                
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" id="emp_pass"  name="emp_pass" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" id="check_login" type="submit">Log In</button>
                                    </div>
                                </div>
                                <span id="message"></span>
                                <?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert alert-success alert-dismissible" style="width:300px">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <?php echo $this->session->flashdata('msg'); ?>
                                    </div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div> 
   
    <script src="<?= base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });

    var timeout = 3000; // in miliseconds (3*1000)
    $('#flashdata').delay(timeout).fadeOut(300);
    
    </script>
        
    <script>
        $("#check_login").on('click',()=>{
            var emp_id=$("#emp_id").val();
            // alert(emp_id)   
            var emp_pass=$("#emp_pass").val();
            // alert(emp_pass)   

            $.ajax({
            url:"<?php echo base_url();?>/index.php/check_login",
            type:"POST",
            data:$("#login_form").serialize(),
            success:function(data)
                {
                    var response=JSON.parse(data);            
                    if(response.res == "Admin"){
                        $("#message").html("Login successfully!").css("color", "green");
                        setTimeout(function(){
                            window.location.href="<?php echo site_url('index.php/dashboard'); ?>"
                        }, 2000);
                        // window.location.href="<?php echo site_url('dashboard'); ?>";                    
                    }else if(response.res == "Operations Head"){
                        $("#message").html("Login successfully!").css("color", "green");
                        setTimeout(function(){
                            window.location.href="<?php echo site_url('index.php/dashboard'); ?>"
                        }, 2000);
                    }else if(response.res == "Team Leader"){
                        $("#message").html("Login successfully!").css("color", "green");
                        setTimeout(function(){
                            window.location.href="<?php echo site_url('index.php/dashboard'); ?>"
                        }, 2000);
                    }else if(response.res == "Team Member"){
                        $("#message").html("Login successfully!").css("color", "green");
                        setTimeout(function(){
                            window.location.href="<?php echo site_url('index.php/dashboard'); ?>"
                        }, 2000);
                    }else if(response.res == "Client"){
                        $("#message").html("Login successfully!").css("color", "green");
                        setTimeout(function(){
                            window.location.href="<?php echo site_url('index.php/dashboard'); ?>"
                        }, 2000);
                    }else if(response.error == "no"){
                        $("#message").html("Your Login Information Was Invaid!").css("color", "red");                    
                        // $("#message").html("Invaid Id & Password!");                    
                    }else{
                        $('#message').html("Your Login Information Was Invaid!").css("color", "red");
                    }
            }
            })

            
        })


        // $('#login_form').submit(function() {
        //     $.ajax({
        //         url: "<?php echo site_url('Welcome/check_login'); ?>",
        //         type: "POST",
        //         data: $("form").serialize(),
        //         dataType: "json",
        //         success: function(response){
        //             if(response.res == "success"){
        //                 $("#message").html("login successfully!");
        //                 setTimeout(funtion({
        //                     window.location.href = "<?php echo site_url('Dashboard'); ?>";
        //                 }, 2000);
        //             }else if(response.res == "teamleader"){
        //                 $("#message").html("login successfully!");
        //                 setTimeout(funtion({
        //                     window.location.href = "<?php echo site_url('project'); ?>";
        //                 }, 2000);
        //             }else if(response.res == "teammember"){
        //                 $("#message").html("login successfully!");
        //                 setTimeout(funtion({
        //                     window.location.href = "<?php echo site_url('client'); ?>";
        //                 }, 2000);
        //             }else{
        //                 $('#message').html("Invaid Id & Password!");
        //             }					
                    
        //         }
        //     });		
        // });
    </script>

</body>

</html>
   


