<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png">
    <title>Dashboard</title>
    <link href="<?= base_url(); ?>assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.min.css" rel="stylesheet">    
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">        
</head>

<body>
    <div id="main-wrapper">
        <header class="topbar">
            <?php include('includes/header.php'); ?>
        </header>       
        <?php include('includes/left-sidebar.php'); ?>
        <div class="page-wrapper">           
            <div class="container-fluid">                
                <div class="row">
                    <div class="col-lg-12">                               
                        <h3 class="m-b-20">Dashboard</h3>
                    </div>
                </div>

                <?php if($this->session->userdata('role') == "Admin"){ ?> 
                    <div class="row">
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-info no-card-border">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <span>No Of Departments</span>
                                            <h4><?php echo $admin_dept_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="" id="ravenue">
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                    </div>
                    
                <?php } else if($this->session->userdata('role') == 'Operations Head'){ ?>                                            
                        <div class="row">
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-info no-card-border">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <span>No Of Users</span>
                                            <h4><?php echo $user_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="" id="ravenue">
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-warning no-card-border">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-r-10">
                                            <span>No Of Projects</span>
                                            <h4><?php echo $project_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div style="max-width:130px; height:15px;" class="m-b-40">
                                                <!-- <canvas id="balance"></canvas> -->
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-success no-card-border">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <span>No Of Tasks</span>
                                            <h4><?php echo $task_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="gaugejs-box">
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                                <!-- <canvas id="foo" class="gaugejs" height="50" width="100">guage</canvas> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                  
                <?php }  else if($this->session->userdata('role') == 'Team Leader'){  ?>
                    <div class="row">
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-info no-card-border">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <span>No Of Users</span>
                                            <h4><?php echo $team_member_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="" id="ravenue">
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-warning no-card-border">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-r-10">
                                            <span>No Of Projects</span>
                                            <h4><?php echo $tl_project_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div style="max-width:130px; height:15px;" class="m-b-40">
                                                <!-- <canvas id="balance"></canvas> -->
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-success no-card-border">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <span>No Of Tasks</span>
                                            <h4><?php echo $tl_task_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="gaugejs-box">
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                                <!-- <canvas id="foo" class="gaugejs" height="50" width="100">guage</canvas> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php }  else if($this->session->userdata('role') == 'Team Member'){  ?>
                    <div class="row">
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-warning no-card-border">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-r-10">
                                            <span>No Of Projects</span>
                                            <h4><?php echo $tm_project_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div style="max-width:130px; height:15px;" class="m-b-40">
                                                <!-- <canvas id="balance"></canvas> -->
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-success no-card-border">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <span>No Of Tasks</span>
                                            <h4><?php echo $tm_task_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="gaugejs-box">
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                                <!-- <canvas id="foo" class="gaugejs" height="50" width="100">guage</canvas> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">                           
                        </div>
                    </div> 
                <?php }elseif($this->session->userdata('role') == 'Client'){  ?>
                    <div class="row">
                        <!-- column -->
                        <div class="col-sm-12 col-lg-4">
                            <div class="card bg-light-info no-card-border">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="m-r-10">
                                            <span>No Of Projects</span>
                                            <h4><?php echo $client_project_count;?></h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div style="max-width:130px; height:15px;" class="m-b-40">
                                                <!-- <canvas id="balance"></canvas> -->
                                                <img src="<?= base_url(); ?>assets/svg/download.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">                           
                        </div>
                        <div class="col-sm-12 col-lg-4">                           
                        </div>
                    </div>                     
                <?php } ?>
               
                <?php if($this->session->userdata('role') == "Admin"){ ?>  
                <?php } else if($this->session->userdata('role') == 'Operations Head' || $this->session->userdata('role') == 'Team Leader' || $this->session->userdata('role') == 'Team Member'){ ?>
                    <!-- PROJECT STATUS -->               
                    <div class="row">
                        <div class="col-lg-12">                               
                            <h3 class="m-b-20">Project Status</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $pending_count;?></h3>
                                                    <h6 class="card-subtitle">Pending</h6>
                                                </div>
                                                <div class="ml-auto align-items-center">
                                                    <span style="margin-top:-10px" class="btn btn-circle btn-lg bg-danger project-div-circle">
                                                        <i class="ti-notepad text-white"></i>
                                                    </span>                                            
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $pending_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $in_progress_count;?></h3>
                                                    <h6 class="card-subtitle">In Progress</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span  style="margin-top:-10px" class="btn btn-circle btn-lg bg-warning project-div-circle">
                                                        <i class="ti-bar-chart text-white"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $in_progress_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $demo_pending_count;?></h3>
                                                    <h6 class="card-subtitle">Demo Pending</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span  style="margin-top:-10px" class="btn btn-circle btn-lg bg-info project-div-circle">
                                                        <i class="ti-reload text-white"></i>
                                                    </span>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $demo_pending_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $input_pending_count;?></h3>
                                                    <h6 class="card-subtitle">Input Pending</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span style="background-color: #50c622 !important;margin-top:-10px" class="btn btn-circle btn-lg bg-dark project-div-circle">
                                                        <i class="ti-import text-white"></i>
                                                    </span>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo $input_pending_count;?>%; height: 6px;background-color: #50c622;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $feedback_pending__count;?></h3>
                                                    <h6 class="card-subtitle">Feedback Pending</h6>
                                                </div>
                                                <div class="ml-auto align-items-center">
                                                    <span style="margin-top:-10px" class="btn btn-circle btn-lg bg-primary">
                                                        <i class="ti-eye text-white"></i>
                                                    </span>                                            
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $feedback_pending__count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $under_testing_count;?></h3>
                                                    <h6 class="card-subtitle">Under Testing</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span  style="margin-top:-10px;background-color:#c622c6;" class="btn btn-circle btn-lg">
                                                        <i class="ti-settings text-white"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="background-color:#c622c6; width: <?php echo $under_testing_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $completed_count;?></h3>
                                                    <h6 class="card-subtitle">Demo Pending</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span  style="margin-top:-10px" class="btn btn-circle btn-lg bg-success project-div-circle">
                                                        <i class="ti-reload text-white"></i>
                                                    </span>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $completed_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <!-- Department                               -->
                    <div class="row">
                        <div class="col-lg-12">                               
                            <h3 class="m-b-20">Department</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">  
                            <div class="card">
                                <div class="card-body">
                                    <h4>Department Status</h4>
                                    <div class="row m-t-30">
                                        <?php 
                                            $today = date("Y-m"); // $today = "2021-12"; 
                                        ?>
                                        <div class="col-lg-4 col-md-4 col-12 m-b-10"> 
                                            <!-- <label class="form-label"><b>Select Month</b></label> -->
                                            <!-- <input class="form-control" name="month" id="month"  type="month" value="<?php  //echo $today; ?>" id="month-input">    -->
                                            <input class="form-control" name="month" id="month"  type="month" value="<?php  echo $today; ?>">   
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12 m-b-10"> 
                                            <select id="dept_list" name="dept_list" placeholder="Department" aria-label="no" class="form-control">
                                                <option vlaue="">Department</option>
                                                <?php
                                                    foreach($dept as $row)
                                                    {
                                                    echo '<option>'.$row->dept.'</option>';
                                                    }
                                                ?>
                                            </select>  
                                        </div>
                                    </div>     
                                    <div class="row m-t-30">
                                        <div id="barchart_dept" class="m-t-30"></div>                                
                                    </div>     
                                    <!-- <div id="chartbox">
                                         <canvas id="barchart_dept" class="m-t-30"></canvas>                                 -->
                                        <!-- <div id="barchart_dept" class="m-t-30"></div>                                 -->
                                    <!-- </div>                                                                                --> 
                                </div>
                            </div>                           
                        </div>
                    </div>  
                    <style>div.google-visualization-tooltip { transform: rotate(30deg); }</style>

                <?php } else if($this->session->userdata('role') == 'Client'){ ?>
                    <!-- PROJECT STATUS -->               
                    <div class="row">
                        <div class="col-lg-12">                               
                            <h3 class="m-b-20">Project Status</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $pending_count;?></h3>
                                                    <h6 class="card-subtitle">Pending</h6>
                                                </div>
                                                <div class="ml-auto align-items-center">
                                                    <span style="margin-top:-10px" class="btn btn-circle btn-lg bg-danger project-div-circle">
                                                        <i class="ti-notepad text-white"></i>
                                                    </span>                                            
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $pending_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $in_progress_count;?></h3>
                                                    <h6 class="card-subtitle">In Progress</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span  style="margin-top:-10px" class="btn btn-circle btn-lg bg-warning project-div-circle">
                                                        <i class="ti-bar-chart text-white"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $in_progress_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $demo_pending_count;?></h3>
                                                    <h6 class="card-subtitle">Demo Pending</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span  style="margin-top:-10px" class="btn btn-circle btn-lg bg-info project-div-circle">
                                                        <i class="ti-reload text-white"></i>
                                                    </span>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $demo_pending_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $input_pending_count;?></h3>
                                                    <h6 class="card-subtitle">Input Pending</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span style="background-color: #50c622 !important;margin-top:-10px" class="btn btn-circle btn-lg bg-dark project-div-circle">
                                                        <i class="ti-import text-white"></i>
                                                    </span>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo $input_pending_count;?>%; height: 6px;background-color: #50c622;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $feedback_pending__count;?></h3>
                                                    <h6 class="card-subtitle">Feedback Pending</h6>
                                                </div>
                                                <div class="ml-auto align-items-center">
                                                    <span style="margin-top:-10px" class="btn btn-circle btn-lg bg-primary">
                                                        <i class="ti-eye text-white"></i>
                                                    </span>                                            
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $feedback_pending__count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $under_testing_count;?></h3>
                                                    <h6 class="card-subtitle">Under Testing</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span  style="margin-top:-10px;background-color:#c622c6;" class="btn btn-circle btn-lg">
                                                        <i class="ti-settings text-white"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="background-color:#c622c6; width: <?php echo $under_testing_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><?php echo $completed_count;?></h3>
                                                    <h6 class="card-subtitle">Demo Pending</h6>
                                                </div>
                                                <div class="ml-auto">
                                                    <span  style="margin-top:-10px" class="btn btn-circle btn-lg bg-success project-div-circle">
                                                        <i class="ti-reload text-white"></i>
                                                    </span>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $completed_count;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <!-- Department -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">  
                            <div class="card">
                                <div class="card-body">
                                    <h4>Department Status</h4>
                                    <div class="row m-t-30">
                                        <?php 
                                            $today = date("Y-m"); // $today = "2021-12"; 
                                        ?>
                                        <div class="col-lg-4 col-md-4 col-6"> 
                                            <!-- <label class="form-label"><b>Select Month</b></label> -->
                                            <!-- <input class="form-control" name="month" id="month"  type="month" value="<?php  //echo $today; ?>" id="month-input">    -->
                                            <input class="form-control" name="month" id="month"  type="month" value="<?php  echo $today; ?>">   
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-6"> 
                                            <select id="dept_list" name="dept_list" placeholder="Department" aria-label="no" class="form-control">
                                                <option vlaue="">Department</option>
                                                <?php
                                                    foreach($dept as $row)
                                                    {
                                                    echo '<option>'.$row->prt_dept.'</option>';
                                                    }
                                                ?>
                                            </select>  
                                        </div>
                                    </div>                                                                                        
                                    <div class="row m-t-30">
                                        <div id="barchart_dept" class="m-t-30"></div>                                
                                    </div>                                   
                                </div>
                            </div>                           
                        </div>
                    </div>  
                <?php } ?>                           
            </div>
            <?php include('includes/footer.php'); ?>
        </div>        
    </div> 
   
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->    
    <!--This page JavaScript -->
    <script src="<?= base_url(); ?>assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?= base_url(); ?>assets/extra-libs/c3/c3.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>    
    <script src="<?= base_url(); ?>assets/libs/chart.js/dist/chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/gaugeJS/dist/gauge.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/flot/excanvas.min.js"></script>
    <script src="<?= base_url(); ?>assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url(); ?>assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?= base_url(); ?>assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url(); ?>assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
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
    <!--This page JavaScript -->
    <!--c3 JavaScript -->
    <script src="<?= base_url(); ?>assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?= base_url(); ?>assets/extra-libs/c3/c3.min.js"></script>
    <!-- barchart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            get_all_dept_bar_chart();    
            // $('#month,#dept_list').change(function(){
            //     var month = $("#month").val();
            //     var dept_list = $("#dept_list").val();
            //     // if(month != '')
            //     // {
            //         get_all_dept_bar_chart(year, dept_list);
            //     //}
            // });
            // $("#month,#dept_list").on("change", function (e) {
                // get_all_dept_bar_chart();                
            // }); 
             $("#month,#dept_list").on("change", function (e) {
                get_all_dept_bar_chart();                
             });  
        });
        
        function get_all_dept_bar_chart(){ 
             var month = $("#month").val();
             var dept_list = $("#dept_list").val();
            //  alert(month);
            //  alert(dept_list);
            $.ajax({
            url:"<?php echo base_url();?>/index.php/get_all_dept_bar_chart",
            type:"POST",
           data: {month: month,dept_list: dept_list},
            dataType : "JSON",
            success:function(response)
            {          
                // alert(response);                                     
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    //  var data = google.visualization.arrayToDataTable([
                    //     ['Dept', 'Pending', 'Development', 'Testing', 'Live', 'Live With Updates'],//dept,pending,dev,test,live,update
                    //     //below start to connect db
                    //     ['IT', 1000, 400, 200, 200, 400],
                    //     ['Finance', 1170, 460, 250, 200, 400],
                    //     ['HR', 660, 1120, 300, 200, 400],
                    //     ['Operations', 1030, 540, 350, 200, 400],
                    //     ['Research & Development', 1030, 540, 350, 200, 400],
                    //     ['IT - Sales', 1030, 540, 350, 200, 400],
                    //     ['Others', 1030, 540, 350, 200, 400]

                            
                    //     ]);

                     //  var data = google.visualization.arrayToDataTable([
                    //     ['Dept', 'All Dept'],
                    //     //below start to connect db
                    //     ['IT', 1000],
                    //     ['Finance', 1170],
                    //     ['HR', 660],
                    //     ['Operations', 1030],
                    //     ['Research & Development', 1030],
                    //     ['IT - Sales', 1030],
                    //     ['Others', 1030]

                            
                    //     ]);


                   
                    var data = google.visualization.arrayToDataTable(eval(response));

                   

                    var options = {
                        chart: {
                            title: 'Department',
                            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('barchart_dept'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }                                                          
            }
            });
            return false;  
        }
    </script>   
  <?php //if($this->session->userdata('role') == "Admin"){ ?>     
    <script>
        //  $(document).ready(function() {
        //     alert("admin");

        // });
    </script>
    <?php //} ?>    

</body>

</html>
   