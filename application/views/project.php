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
    <title>Project</title>
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
        #select_dept_div{
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
                        <h4 class="page-title">Project List</h4>
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
                                    <h4 class="card-title">All Projects</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <!-- Head -->
                                            <?php if($this->session->userdata('role') == "Operations Head"){ ?>     
                                                <!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createmodel"> -->
                                                <button type="button" class="btn btn-dark" onClick="myFunction()" value="submit">
                                                    Add Project 
                                                </button>
                                            <!-- Team Leader & Team Member -->
                                            <?php } else if($this->session->userdata('role') == 'Team Leader' || $this->session->userdata('role') == 'Team Member'){ ?>
                                            
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php if($this->session->flashdata('msg')): ?>
                                    <div id="flashdata" class="alert alert-success alert-dismissible" style="width:500px">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <?php echo $this->session->flashdata('msg'); ?>
                                    </div>
                                <?php endif; ?>                              

                                <div class="col-sm-12 col-md-offset-12" id="uploaded_image">  
			                    </div>
                                <div class="table-responsive">                                    
                                    <?php if($this->session->userdata('role') == "Operations Head" || $this->session->userdata('role') == 'Team Leader' ||$this->session->userdata('role') == 'Team Member'){ ?>     
                                        <div class="row m-b-5">                                            
                                            <div class="col-lg-3  m-b-5">
                                                <select name="project_dept_filter" id="project_dept_filter"
                                                    class="form-control">    
                                                    <option value="">Select Department</option>
                                                    <?php
                                                        foreach($dept as $row)
                                                        {
                                                        echo '<option  value="'.$row->dept.'">'.$row->dept.'</option>';
                                                        }
                                                    ?>                                                
                                                </select>
                                            </div>
                                            <div class="col-lg-3  m-b-5">
                                                <select name="project_client_filter" id="project_client_filter"
                                                    class="form-control">
                                                    <option value="">Select Client</option>
                                                    <?php
                                                        foreach($client_name as $row)
                                                        {
                                                        echo '<option  value="'.$row->client_name.'">'.$row->client_name.'</option>';
                                                        }
                                                    ?>    
                                                </select>
                                            </div>    
                                            <div class="col-lg-3  m-b-5">
                                                <!-- <span>* Select Priority</span> -->
                                                <select name="project_priority_filter" id="project_priority_filter"
                                                    class="form-control">
                                                    <option value="">Select Priority</option>
                                                    <!-- <option value="" disabled='disabled' selected>Priority</option> -->
                                                    <option value="Normal">Normal</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="Low">Low</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3 m-b-5">
                                                <select name="project_status_filter" id="project_status_filter"
                                                    class="form-control">
                                                    <option value="">Select Project Status</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Demo Pending">Demo Pending</option>
                                                    <option value="Input Pending">Input Pending</option>
                                                    <option value="Feedback Pending">Feedback Pending</option>
                                                    <option value="Under Testing">Under Testing</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="row m-b-15">                                            
                                            <div class="col-lg-3">
                                                <input type="date" class="form-control" name="project_date_filter" id="project_date_filter">   
                                            </div>
                                            <div class="col-lg-9 prt_tl_clear_btn">
                                                <button type="button" class="btn mt-3" style="background-color:#ffbc34;color: white;"  onClick="clearFunction()" value="submit">
                                                    Clear 
                                                </button>
                                            </div>
                                        </div>
                                        <table id="file_export"class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Project Name</th>
                                                    <th>Project Description</th>
                                                    <th>Project Date</th>
                                                    <th>Priority</th>
                                                    <th>Client</th>
                                                    <th>Department</th>
                                                    <th>Team Leader</th>
                                                    <th>Assigned Team Member</th>
                                                    <!-- <th>File Preview</th> -->
                                                    <th>Project Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>   
                                            <tbody id="report_table">
                                                
                                            </tbody>
                                        </table>
                                    <?php }  else if($this->session->userdata('role') == 'Client'){  ?>

                                        <div class="row m-b-5">
                                            <div class="col-lg-3 m-b-5">
                                                <select name="project_ops_filter" id="project_ops_filter"
                                                    class="form-control">
                                                    <option value="">Select Operations</option>
                                                    <?php
                                                        foreach($ops_name as $row)
                                                        {
                                                        echo '<option value="'.$row->ops_name.'">'.$row->ops_name.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-3 m-b-5" id="select_dept_div">
                                                <select name="project_dept_filter" id="project_dept_filter"
                                                    class="form-control">
                                                    <!-- <option value="">Select Department</option> -->                                                   
                                                </select>
                                            </div>    
                                            <div class="col-lg-3 m-b-5">
                                                <select name="project_priority_filter" id="project_priority_filter"
                                                    class="form-control">
                                                    <option value="">Select Priority</option>
                                                    <!-- <option value="" disabled='disabled' selected>Priority</option> -->
                                                    <option value="Normal">Normal</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="Low">Low</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3 m-b-5">
                                                <select name="project_status_filter" id="project_status_filter"
                                                    class="form-control">
                                                    <option value="">Select Project Status</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Demo Pending">Demo Pending</option>
                                                    <option value="Input Pending">Input Pending</option>
                                                    <option value="Feedback Pending">Feedback Pending</option>
                                                    <option value="Under Testing">Under Testing</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </div>                                      
                                        </div>                                        
                                        <div class="row m-b-15">                                            
                                            <div class="col-lg-3">
                                                <input type="date" class="form-control" name="project_date_filter" id="project_date_filter">   
                                            </div>
                                            <div class="col-lg-9 prt_tl_clear_btn">
                                                <button type="button" class="btn mt-3" style="background-color:#ffbc34;color: white;"  onClick="clearFunctionclient()" value="submit">
                                                    Clear 
                                                </button>
                                            </div>
                                        </div>
                                        <table id="file_export"class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Project Name</th>
                                                <th>Project Description</th>
                                                <th>Project Date</th>
                                                <th>Operations</th>
                                                <th>Priority</th>
                                                <th>Client</th>
                                                <th>Department</th>
                                                <!-- <th>Team Leader</th> -->
                                                <!-- <th>Assigned Team Member</th> -->
                                                <!-- <th>File Preview</th> -->
                                                <th>Project Status</th>
                                                <th>Action</th>
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
            
            <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-horizontal" id="submit" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Add Project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-notepad text-white"></i></button>
                                    <input type="text" class="form-control" name="prt_name" id="prt_name" placeholder="Project Name" aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                    <textarea class="form-control" name="prt_des" id="prt_des" placeholder="Project Description" style="height: 100px"></textarea>                                    
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-bar-chart text-white"></i></button>
                                    <select name="prt_priority" id="prt_priority" placeholder="Priority" aria-label="no" class="form-control">
                                        <option value="" disabled='disabled'>Priority</option>
                                        <option>Normal</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>                            
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-hand-point-right text-white"></i></button>
                                    <select name="prt_client" id="prt_client" class="form-control">
                                        <option value="" disabled='disabled'>Client</option>
                                        <?php
                                            // foreach($client_name as $row)
                                            // {
                                            // echo '<option>'.$row->client_name.'</option>';
                                            // }
                                        ?>
                                    </select>                                
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-file text-white"></i></button>
                                    <input type="text" class="form-control" name="prt_dept" id="prt_dept" placeholder="Department" aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <select  name="prt_tl" id="prt_tl" class="form-control">
                                        <option value="" disabled='disabled'>Team Leader</option>
                                        <?php
                                            foreach($emp_name as $row)
                                            {
                                            echo '<option>'.$row->emp_name.'</option>';
                                            }
                                        ?>
                                    </select>                                
                                </div>                              
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-file text-white"></i></button>
                                    <input type="file" name="file[]" multiple id="files" placeholder="File Upload" aria-label="name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
                                </div>
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
                                <input type="hidden" name="project_code" id="delete_project_code" class="form-control">
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

            <!-- Team Leader -->

            <div class="modal fade" id="assignbtn" tabindex="-1" role="dialog" aria-labelledby="assignbtnModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="javascript:void(0)" id="assigned_tm_list" method="post" enctype="multipart/form-data">                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignbtnModalLabel"><i class="ti-marker-alt m-r-10"></i> Team Member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-bar-chart text-white"></i></button>
                                    <select id="prt_tm_list" name="prt_tm_list[]" multiple placeholder="Team Member" aria-label="no" class="form-control" multiple>
                                        <?php
                                            // foreach($emp_name as $row)
                                            // {
                                            // echo '<option>'.$row->emp_name.'</option>';
                                            // }
                                        ?>		
                                        <!-- <option><?php //echo $this->session->userdata('emp_name'); ?></option> -->
                                    </select>                               
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="project_code" id="project_code" class="form-control">
                                <input type="hidden" name="project_tm_id" id="project_tm_id" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit"  id="project_tm_selection" name="project_tm_selection"  class="btn btn-success"><i class="ti-save"></i> Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
            <div class="modal fade" id="projectst" tabindex="-1" role="dialog" aria-labelledby="projectstModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="post" action="javascript:void(0)" id="prt_status_tl">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignbtnModalLabel"><i class="ti-marker-alt m-r-10"></i> Project Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-bar-chart text-white"></i></button>
                                    <select id="prt_status" name="prt_status" placeholder="Project Status" aria-label="no" class="form-control">
                                        <option value="Pending">Pending</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Demo Pending">Demo Pending</option>
                                        <option value="Input Pending">Input Pending</option>
                                        <option value="Feedback Pending">Feedback Pending</option>
                                        <option value="Under Testing">Under Testing</option>
                                        <option value="Completed">Completed</option>
                                    </select>                               
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="project_st_id" id="project_st_id" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="project_st_tl" name="project_st_tl"  class="btn btn-success"><i class="ti-save"></i> Project Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

            <!-- /.Sample upload pop up image -->
            <div class="modal fade sample-preview" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">     
                        <div class="modal-header" style="border-bottom: 0;">                      
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <img id="sample_view" style="width: 65%; margin-left: 124px;">
                        </div>                                            
                </div>
            </div>
            <!-- /.End sample upload pop up image -->
            
               
            <div class="modal fade" id="projectst" tabindex="-1" role="dialog" aria-labelledby="projectstModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form>
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignbtnModalLabel"><i class="ti-marker-alt m-r-10"></i> Project Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-bar-chart text-white"></i></button>
                                    <select id="sortingField" placeholder="Project Status" aria-label="no" class="form-control">
                                        <option>Project Status</option>
                                        <option>Pending</option>
                                        <option>In Development</option>
                                        <option>In Testing</option>
                                        <option>In Live</option>
                                        <option>In Live With Updates</option>
                                    </select>                               
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Project Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
           
            <!-- Form Edit -->
            <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- <form class="large-model"  enctype="multipart/form-data" id="edit_project_form"  data-parsley-validate method="post" autocomplete="off"> -->
                        <!-- <form class="large-model" action="<?php //echo base_url('welcome/edit_project_form'); ?>" enctype="multipart/form-data" id="edit_project_form"  data-parsley-validate method="post" autocomplete="off"> -->
                        <form action="javascript:void(0)" id="edit_project_form" enctype="multipart/form-data">                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Edit Project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>                   
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-notepad text-white"></i></button>
                                    <input type="text" class="form-control" name="prt_name" id="prt_name_edit" placeholder="Project Name" aria-label="name">
                                </div>
                                <span id="prt_name_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-pencil text-white"></i></button>
                                    <textarea class="form-control" name="prt_des" id="prt_des_edit" placeholder="Project Description" style="height: 100px"></textarea>                                    
                                </div>
                                <span id="prt_des_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-calendar text-white"></i></button>
                                    <input type="date" name="prt_date" id="prt_date_edit" class="form-control">                 
                                </div>
                                <span id="prt_date_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-bar-chart text-white"></i></button>
                                    <select name="prt_priority" id="prt_priority_edit" placeholder="Priority" aria-label="no" class="form-control">
                                        <option value="" disabled='disabled'>Priority</option>
                                        <option>Normal</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>                            
                                </div>
                                <span id="prt_priority_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-hand-point-right text-white"></i></button>
                                    <select name="prt_client" id="prt_client_edit" class="form-control">
                                        <option value="" disabled='disabled'>Client</option>
                                        <?php
                                            foreach($client_name as $row)
                                            {
                                            echo '<option>'.$row->client_name.'</option>';
                                            }
                                        ?>
                                    </select>                                
                                </div>
                                <span id="prt_client_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-file text-white"></i></button>
                                    <select name="prt_dept" id="prt_dept_edit" class="form-control">
                                        <option value="" disabled='disabled'>Department</option>
                                        <?php
                                            foreach($dept as $row)
                                            {
                                            echo '<option>'.$row->dept.'</option>';
                                            }
                                        ?>
                                    </select>   
                                </div>
                                <span id="prt_dept_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <select  name="prt_tl" id="prt_tl_edit" class="form-control">

                                    </select>                                
                                </div> 
                                <span id="prt_tl_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3" id="tm">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <select id="prt_tm_list_edit" name="prt_tm_list_edit[]" multiple placeholder="Team Member" aria-label="no" class="form-control" multiple>                                        
                                    </select>                                   
                                </div>         
                                <span id="prt_tm_list_edit_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-file text-white"></i></button>
                                    <input type="file" id="fileupload" multiple="multiple" name="file_name_update[]" class="form-control" placeholder="File Upload" aria-label="name">
                                </div>
                                <table>              
                                    <tbody id="project_file">
                                                    
                                    </tbody>  
                                </table>                                
                                                     
                            </div>
                            <span id="task_name_error" class="text-danger"></span>
                            <div class="modal-footer">
                                <!-- <input type="text" name="project_file_edit_id" id="project_file_edit_id" class="form-control"> -->
                                <input type="hidden" name="project_edit_id" id="project_edit_id" class="form-control">
                                <input type="hidden" name="project_edit_code" id="project_edit_code" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <!-- <button class="btn btn-success" id="btn_upload" type="submit">Upload</button> -->
                                <button type="submit" id="edit" name="edit" value="submit"  class="btn btn-success submitBtn">Edit</button>
                                <!-- <button type="submit" onclick="testing()" class="btn btn-primary w-md">Edit</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Form Edit -->
            <div class="modal fade" id="addtaskmodel" tabindex="-1" role="dialog" aria-labelledby="addtaskmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="javascript:void(0)" id="task_form" enctype="multipart/form-data">                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="addtaskmodelLabel"><i class="ti-marker-alt m-r-10"></i> Add Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>    
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-notepad text-white"></i></button>
                                    <input type="date" class="form-control" name="task_date" id="task_date" placeholder="Task Date">                                    
                                </div>
                                <span id="task_date_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                    <textarea class="form-control" name="task_detail" id="task_detail" placeholder="Task Details" style="height: 100px"></textarea>                                    
                                </div>
                                <span id="task_detail_error" class="text-danger"></span>
                                <!-- <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class=" ti-user text-white"></i></button>
                                    <select id="prt_tm_list_task_add" name="prt_tm_list_task_add[]" class="form-control" multiple>
                                        
                                    </select>
                                </div> -->
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class=" ti-user text-white"></i></button>
                                    <select id="prt_tm_list_task_add" name="prt_tm_list_task_add" class="form-control">
                                        
                                    </select>
                                </div>
                                <span id="prt_tm_list_task_add_error" class="text-danger"></span>                                                                    
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-file text-white"></i></button>
                                    <input type="file" id="file_name" multiple="multiple" name="file_name[]" class="form-control" placeholder="File Upload" aria-label="name">
                                </div>
                            </div>
                            <span id="file_name_error" class="text-danger"></span>
                            <div class="modal-footer">
                                <input type="hidden" name="prt_code_addtask" id="prt_code_addtask" class="form-control">
                                <input type="hidden" name="prt_name_addtask" id="prt_name_addtask" class="form-control">
                                <input type="hidden" name="prt_tl_addtask" id="prt_tl_addtask" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="submit_task" name="submit_task" value="submit"  class="btn btn-success submitBtn">Save</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <!-- Team Member File view -->
       
            <!-- File View -->
            <div class="modal fade" id="viewmodel" tabindex="-1" role="dialog" aria-labelledby="viewmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- <form class="large-model"  enctype="multipart/form-data" id="edit_project_form"  data-parsley-validate method="post" autocomplete="off"> -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewmodelLabel"><i class="ti-marker-alt m-r-10"></i> Project View</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                   
                        <div class="modal-body">                                                                       
                            <table>              
                                <tbody id="project_file_tm">
                                                
                                </tbody>  
                            </table>                                                                                     
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="project_view_id" id="project_view_id" class="form-control">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Task View -->
            <div class="modal fade" id="viewtaskmodel" tabindex="-1" role="dialog" aria-labelledby="viewtaskmodelLabel" aria-hidden="true">
                <div class="modal-dialog modal-viewtaskmodel" role="document">
                    <div class="modal-content">
                        <!-- <form class="large-model"  enctype="multipart/form-data" id="edit_project_form"  data-parsley-validate method="post" autocomplete="off"> -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewtaskmodelLabel"><i class="ti-marker-alt m-r-10"></i> Project Task View</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                   
                        <div class="modal-body"> 
                            <div class="table-responsive">
                                <table id="file_export_task_view"class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Created On</th>
                                            <th>Task Details</th>
                                            <th>Task Status</th>
                                            <th>Completed On</th>
                                        </tr>
                                    </thead>
                                    <tbody id="report_task_table">
                                        
                                    </tbody>
                                </table>                                    
                                </table>                                                                                                             
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="project_task_view_id" id="project_task_view_id" class="form-control">
                            <input type="hidden" name="project_task_view_name" id="project_task_view_name" class="form-control">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
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
            project_datatable_value();           

            //alert msg
            var timeout = 3000; // in miliseconds (3*1000)
            $('#flashdata').delay(timeout).fadeOut(300);          
        
            $("#prt_tl_edit").change(function(){
                var prt_tl=$("#prt_tl_edit").val();
                // alert(prt_tl)
                // var x = document.getElementById('tm');

                var x = document.getElementById('tm');              
                x.style.display = "flex";
                
                if(prt_tl != "Team Leader"){
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
                                $('#prt_tm_list_edit').html(data);
                            }
                                    
                        }
                    });

                }else{
                    $("#tm").hide();
                }
            })

        });       

        $('#report_table').on('click','.editRecord',function(){
            var project_file_edit_id = $(this).data('file_id'); 
            var project_edit_id = $(this).data('id'); 
            var project_edit_code = $(this).data('project_code'); 
            var prt_name_edit = $(this).data('prt_name'); 
            var prt_date_edit = $(this).data('prt_date'); 
            var prt_des_edit = $(this).data('prt_des'); 
            var prt_priority_edit = $(this).data('prt_priority'); 
            var prt_client_edit = $(this).data('prt_client'); 
            var prt_dept_edit = $(this).data('prt_dept'); 
            var prt_tl_edit = $(this).data('prt_tl'); 

            $.ajax({
                url:"<?php echo base_url();?>/index.php/project_tl_list_edit_option",
                type:"POST",
                data:{
                    project_code : project_edit_code,
                },
                dataType : "JSON",
                success:function(data)
                {
                    
                    $('#prt_tl_edit').html(data);
                                                
                }
            });
                        
            if(prt_tl_edit == "Team Leader"){
                $("#tm").hide();
            }else{
                var x = document.getElementById('tm');              
                x.style.display = "flex";

                 //team member list get from db to show edit
                $.ajax({
                    url:"<?php echo base_url();?>/index.php/project_team_member_option",
                    type:"POST",
                    data:{
                        prt_tl : prt_tl_edit,
                        project_code : project_edit_code,
                        },
                    dataType : "JSON",
                    success:function(data)
                    {
                        if(data == '')
                        {
                            $("#tm").hide();
                        }
                        else{
                            $('#prt_tm_list_edit').html(data);
                        }
                                
                    }
                });
                
            }           

            //show edit modal fade
            $('#editmodel').modal('show');
         
            // alert(deptId);
            $('#project_file_edit_id').val(project_file_edit_id);

            $('#project_edit_id').val(project_edit_id);
            $('#project_edit_code').val(project_edit_code);
            $('#prt_name_edit').val(prt_name_edit);
            $('#prt_date_edit').val(prt_date_edit);
            $('#prt_des_edit').val(prt_des_edit);
            $('#prt_priority_edit').val(prt_priority_edit);
            $('#prt_client_edit').val(prt_client_edit);
            $('#prt_dept_edit').val(prt_dept_edit);
            $('#prt_tl_edit').val(prt_tl_edit);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/get_uploaded_file_project",
            type:"POST",
            data:{
                "project_code": project_edit_code,            
            },
            dataType : "JSON",
            success:function(data)
            {     
                // alert(data)      
                $('#project_file').empty();     
            
                var sample="";
                var  sampleArr = data.file_upload.split(/[ ,]+/);    
                for (var i = sampleArr.length - 1; i >= 0; i--) {         
                var ext = sampleArr[i].split('.')[1];    
                // alert(ext);
                    if(ext=="jpg" || ext=="png" || ext=="jpeg" || ext=="gif") {
                        // alert("one");
                        var tr='<tr>';
                        // sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/upload/'+sampleArr[i]+'" style="cursor:pointer;"></td><td><form method="post" action="javascript:void(0)" id="img_delete_form"><input type="hidden" name="'+sampleArr[i]+'" id="'+sampleArr[i]+'" class="form-control"><button type="submit" class="btn btn-success" id="img_delete" name="img_delete" value="submit"><i class="ti-trash"></i></button></form></td></tr>';            
                        sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/upload/'+sampleArr[i]+'" style="cursor:pointer;"></td></tr>';            
                    }else if (ext=="pdf"|| ext=="doc" || ext=="docx" || ext=="xlsx" || ext=="csv"){
                        var tr='<tr>';
                        // alert("two");               
                        sample ='<td><a href="<?php echo base_url(); ?>/assets/upload/'+sampleArr[i]+'"  style="color:white;"  download><div class="badge bg-danger">'+sampleArr[i]+'</div></a></td></tr>';             
                    } else{
                        var tr='<tr>';
                        // alert("two");               
                        sample ='<td> </td></tr>';             
                    }
                        $('#project_file').append(tr+sample);                

                }
               
                                                            
            }
            });


	    });

        $('#report_table').on('click','.addtaskRecord',function(){
            var prt_id_addtask = $(this).data('id'); 
            var prt_tl_addtask = $(this).data('prt_tl'); 
            var prt_name_addtask = $(this).data('prt_name'); 
            var prt_code_addtask = $(this).data('project_code'); 
            // alert(prt_name_addtask)
            // alert(prt_tl_addtask)
            $('#addtaskmodel').modal('show');
            $('#prt_id_addtask').val(prt_id_addtask);
            $('#prt_tl_addtask').val(prt_tl_addtask);
            $('#prt_name_addtask').val(prt_name_addtask);
            $('#prt_code_addtask').val(prt_code_addtask);

            $.ajax({
                url:"<?php echo base_url();?>/index.php/prtpg_team_member_option",
                type:"POST",
                data:{
                    prt_name : prt_name_addtask,
                    },
                dataType : "JSON",
                success:function(data)
                {
                    if(data == '')
                    {
                        $("#tm").hide();
                    }
                    else{
                        $('#prt_tm_list_task_add').html(data);
                    }
                            
                }
            });

	    });

        $('#report_table').on('click','.viewRecord',function(){
            var project_view_id = $(this).data('project_code'); 
            // var project_view_code = $(this).data('project_code'); 
            $('#viewmodel').modal('show');
            $('#project_view_id').val(project_view_id);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/get_uploaded_file_project",
            type:"POST",
            data:{
                "project_code": project_view_id,            
            },
            dataType : "JSON",
            success:function(data)
            {     
                // alert(data)      
                $('#project_file_tm').empty();     
            
                var sample="";
                var  sampleArr = data.file_upload.split(/[ ,]+/);    
                for (var i = sampleArr.length - 1; i >= 0; i--) {         
                var ext = sampleArr[i].split('.')[1];    
                // alert(ext);
                    if(ext=="jpg" || ext=="png" || ext=="jpeg" || ext=="gif") {
                        // alert("one");
                        var tr='<tr>';
                        // sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/upload/'+sampleArr[i]+'" style="cursor:pointer;"></td><td><form method="post" action="javascript:void(0)" id="img_delete_form"><input type="hidden" name="'+sampleArr[i]+'" id="'+sampleArr[i]+'" class="form-control"><button type="submit" class="btn btn-success" id="img_delete" name="img_delete" value="submit"><i class="ti-trash"></i></button></form></td></tr>';            
                        sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/upload/'+sampleArr[i]+'" style="cursor:pointer;"></td></tr>';            
                    }else if (ext=="pdf"|| ext=="doc" || ext=="docx" || ext=="xlxs" || ext=="csv"){
                        var tr='<tr>';
                        // alert("two");               
                        sample ='<td><a href="<?php echo base_url(); ?>/assets/upload/'+sampleArr[i]+'"  style="color:white;"  download><div class="badge bg-danger">'+sampleArr[i]+'</div></a></td></tr>';             
                    }  else{
                        var tr='<tr>';
                        // alert("two");               
                        sample ='<td> </td></tr>';             
                    }    
                            $('#project_file_tm').append(tr+sample);                

                }
               
                                                            
            }
            });


	    });

        $('#report_table').on('click','.viewtaskRecord',function(){
            var project_task_view_id = $(this).data('id'); 
            var project_task_view_name = $(this).data('project_code'); 
            $('#viewtaskmodel').modal('show');
            $('#project_task_view_id').val(project_task_view_id);
            $('#project_task_view_name').val(project_task_view_name);

            var ct = $('#file_export_task_view').DataTable({ 
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
                   
                ],  
                'dom': 'Blfrtip', 
                "aoColumnDefs": [
                    
                ],
                'ajax': {
                    // 'type': 'POST',
                    'url': "<?= base_url(); ?>/index.php/get_task_datas_project/"+project_task_view_name,          
                    'data': function(data) {
                    }
                },
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                        $( row ).find('td:eq(1)').attr('data-label', 'Date');
                        $( row ).find('td:eq(2)').attr('data-label', 'Task Details');
                        $( row ).find('td:eq(3)').attr('data-label', 'Task Status');
                        $( row ).find('td:eq(4)').attr('data-label', 'Completed On');
                
                },
                "columns": [
                
                    {
                        title: 'S.No',
                        render: function(data, type, row, meta) {
                           
                            return meta.row + meta.settings._iDisplayStart + 1;

                        }
                    },
                    { "data": "created_on" },           
                    { "data": "task_detail" },           
                    { "data": "task_status" },           
                    { "data": "task_completed_on" },           
                    
                ],
                "order": [
                    [1, 'asc']
                ]
            });


	    });

        function sample_popup_viewer(sample)

        {
            // alert(cor);
            $("#sample_view").attr("src", "<?php echo base_url(); ?>/assets/upload/"+sample);
            $(".sample-preview").modal('show');
        }  
      
        $("#img_delete").on('click',()=>{
            var id=$("#img_delete_id").val();
            alert(id);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/file_uploaded_img_delete",
            type:"POST",
            data:$("#img_delete_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    window.location.reload();
                    report_data();
            }
            });
            return false;        
        });
   
        $('#report_table').on('click','.deleteRecord',function(){
            var project_id = $(this).data('id'); 
            var project_code = $(this).data('project_code'); 
            // alert(client_id)           
            $('#deletemodel').modal('show');
            // alert(deptId);
            $('#delete_id').val(project_id);
            $('#delete_project_code').val(project_code);
	    });

    
        $("#delete").on('click',()=>{
            var id=$("#delete_id").val();
            var project_code=$("#delete_project_code").val();
            // alert(id);
            // alert(project_code);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/project_delete",
            type:"POST",
            data:$("#delete_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                $('#deletemodel').modal('hide');
                window.location.reload();
                project_datatable_value();
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
            url:"<?php echo base_url();?>/index.php/project_active",
            type:"POST",
            data:$("#active_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#activemodel').modal('hide');
                    window.location.reload();
                    project_datatable_value();
            }
            });
            return false;        
        });

        $("#deactive").on('click',()=>{
            var id=$("#deactiveid").val();
            // alert(id);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/project_deactive",
            type:"POST",
            data:$("#deactive_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#deactivemodel').modal('hide');
                    window.location.reload();
                    project_datatable_value();
            }
            });
            return false;        
        });

        $('#report_table').on('click','.assignbtn',function(){
            var project_id = $(this).data('id'); 
            var project_code = $(this).data('project_code'); 
            var prt_tl = $(this).data('prt_tl'); 

            $.ajax({
                    url:"<?php echo base_url();?>/index.php/project_team_member_option",
                    type:"POST",
                    data:{
                        prt_tl : prt_tl,
                        project_code : project_code,
                        },
                    dataType : "JSON",
                    success:function(data)
                    {                        
                        $('#prt_tm_list').html(data);
                                
                    }
                });

            $('#assignbtn').modal('show');            
            $('#project_tm_id').val(project_id);
            $('#project_code').val(project_code);
	    });

        $('#report_table').on('click','.projectst',function(){
            var project_id = $(this).data('id'); 
            // alert(client_id)           
            $('#projectst').modal('show');
            // alert(deptId);
            $('#project_st_id').val(project_id);
	    });

    </script>


    <script>
    $(document).ready(function(){
        // Submit form data via Ajax
        $("#edit_project_form").on('submit', function(e){
            // alert("edit")
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url();?>/index.php/edit_project_form",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    if(data.error)
                    {
                        if(data.prt_name_edit_error != '')
                        {
                        $('#prt_name_edit_error').html(data.prt_name_edit_error);
                        }
                        else
                        {
                        $('#prt_name_edit_error').html('');
                        }
                        if(data.prt_des_edit_error != '')
                        {
                        $('#prt_des_edit_error').html(data.prt_des_edit_error);
                        }
                        else
                        {
                        $('#prt_des_edit_error').html('');
                        }
                        if(data.prt_priority_edit_error != '')
                        {
                        $('#prt_priority_edit_error').html(data.prt_priority_edit_error);
                        }
                        else
                        {
                        $('#prt_priority_edit_error').html('');
                        }
                        if(data.prt_client_edit_error != '')
                        {
                        $('#prt_client_edit_error').html(data.prt_client_edit_error);
                        }
                        else
                        {
                        $('#prt_client_edit_error').html('');
                        }
                        if(data.prt_dept_edit_error != '')
                        {
                        $('#prt_dept_edit_error').html(data.prt_dept_edit_error);
                        }
                        else
                        {
                        $('#prt_dept_edit_error').html('');
                        }
                        if(data.prt_tm_list_edit_error != '')
                        {
                        $('#prt_tm_list_edit_error').html(data.prt_tm_list_edit_error);
                        }
                        else
                        {
                        $('#prt_tm_list_edit_error').html('');
                        }
                        if(data.prt_tl_edit_error != '')
                        {
                        $('#prt_tl_edit_error').html(data.prt_tl_edit_error);
                        }
                        else
                        {
                        $('#prt_tl_edit_error').html('');
                        }
                    }
                    else
                    {       
                        $('#editmodel').modal('hide');
                        window.location.reload();
                        project_datatable_value();                    
                        //    alert("test") 
                   }  
                }
            });
        });        
        
    });
    </script>

    <script>
        // Add User button function
        function myFunction() {
            window.location.href="<?php echo base_url();?>index.php/addproject";
        }

        function clearFunction() {
            $('#project_dept_filter').val('');
            $('#project_client_filter').val('');
            $('#project_priority_filter').val('');
            $('#project_date_filter').val('');
            $('#project_status_filter').val('');
            $('#file_export tbody').remove();
            location.reload();
        }

        function clearFunctionclient() {
            $('#project_dept_filter').val('');
            $('#project_ops_filter').val('');
            $('#project_date_filter').val('');
            $('#project_priority_filter').val('');
            $('#project_status_filter').val('');
            $('#file_export tbody').remove();
            location.reload();
        }

    </script>

    <script>
        $(document).ready(function(){
            // Submit form data via Ajax
            $("#task_form").on('submit', function(e){                
                // var prt_tm_list_task_add=$("#prt_tm_list_task_add").val();
                // alert(prt_tm_list_task_add);
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url();?>/index.php/project_pg_task_insert",
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        // alert("testing")
                        if(data.error)
                        {                            
                            if(data.prt_tm_list_task_add_error != '')
                            {
                            $('#prt_tm_list_task_add_error').html(data.prt_tm_list_task_add_error);
                            }
                            else
                            {
                            $('#prt_tm_list_task_add_error').html('');
                            }
                            if(data.task_detail_error != '')
                            {
                            $('#task_detail_error').html(data.task_detail_error);
                            }
                            else
                            {
                            $('#task_detail_error').html('');
                            }
                            if(data.task_date_error != '')
                            {
                            $('#task_date_error').html(data.task_date_error);
                            }
                            else
                            {
                            $('#task_date_error').html('');
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
                            $('#addtaskmodel').modal('hide'); 
                            window.location.href="<?php echo site_url('project'); ?>"                            
                        }  
                    }
                });
            });
            
            
        });
    </script>

    <script>
        // save new employee record
        $("#project_st_tl").on('click',()=>{
            $.ajax({
                url:"<?php echo base_url();?>/index.php/project_st_tl",
                type:"POST",
                data:$("#prt_status_tl").serialize(),
                dataType : "JSON",
                success:function(data)
                {  
                
                    $('#prt_status').val("");
                    window.location.reload();
                    project_datatable_value();
                }
            });
            return false;        
        });

        $("#project_tm_selection").on('click',()=>{

            $.ajax({    
                url:"<?php echo base_url();?>/index.php/assigned_tm_list",
                type:"POST",
                data:$("#assigned_tm_list").serialize(),
                dataType : "JSON",
                success:function(data)
                {  
                    // console.log(data);
                    $('#prt_tm_list').val("");
                    window.location.reload();
                    project_datatable_value();
                }
            });
            return false;        
        });
    </script>

    <?php if($this->session->userdata('role') == "Operations Head" || $this->session->userdata('role') == 'Team Leader' ||$this->session->userdata('role') == 'Team Member'){ ?>     
        <script>
            
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

            $('#project_dept_filter').change(function() {
                var project_dept_filter = $('#project_dept_filter').val();
                if(project_dept_filter !=''){
                    // alert(project_ops_filter)
                    project_datatable_value();
                }else{
                    // $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            $('#project_client_filter').change(function() {
                var project_client_filter = $('#project_client_filter').val();
                if(project_client_filter !=''){
                    // alert(project_ops_filter)select_dept_div
                    project_datatable_value();
                }else{
                    // $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            $('#project_priority_filter').change(function() {
                var project_priority_filter = $('#project_priority_filter').val();
                if(project_priority_filter !=''){
                    // alert(project_ops_filter)select_dept_div
                    project_datatable_value();
                }else{
                    // $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            $('#project_status_filter').change(function() {
                var project_status_filter = $('#project_status_filter').val();
                if(project_status_filter !=''){
                    // alert(project_ops_filter)select_dept_div
                    project_datatable_value();
                }else{
                    // $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            $('#project_date_filter').change(function() {
                var project_date_filter = $('#project_date_filter').val();
                if(project_date_filter !=''){
                    // alert(project_date_filter)
                    project_datatable_value();
                }else{
                    // $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            function project_datatable_value(){   
                
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
                        
                        
                    ],  
                    'dom': 'Blfrtip', 
                    "aoColumnDefs": [
                        
                    ],
                    'ajax': {
                        // type: 'POST',
                        'url': "<?= base_url(); ?>/index.php/project_report_data",                        
                        'data': function(data) {
                            // data.project_ops_filter = $('#project_ops_filter').val();
                            // alert(data.project_ops_filter)
                            data.project_dept_filter = $('#project_dept_filter').val();
                            data.project_client_filter = $('#project_client_filter').val();
                            data.project_priority_filter = $('#project_priority_filter').val();
                            data.project_status_filter = $('#project_status_filter').val();
                            data.project_date_filter = $('#project_date_filter').val();
                        }
                    },
                    createdRow: function( row, data, dataIndex ) {
                        $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                        $( row ).find('td:eq(1)').attr('data-label', 'Project Name');
                        $( row ).find('td:eq(2)').attr('data-label', 'Project Description');
                        $( row ).find('td:eq(3)').attr('data-label', 'Project Date');
                        $( row ).find('td:eq(4)').attr('data-label', 'Priority');
                        $( row ).find('td:eq(5)').attr('data-label', 'Client');
                        $( row ).find('td:eq(6)').attr('data-label', 'Department');
                        $( row ).find('td:eq(7)').attr('data-label', 'Team Leader');
                        $( row ).find('td:eq(8)').attr('data-label', 'Assigned Team Member');
                        $( row ).find('td:eq(9)').attr('data-label', 'Project Status');
                        $( row ).find('td:eq(10)').attr('data-label', 'Action');
                    
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
                        { "data": "prt_name" },           
                        { "data": "prt_des" },           
                        { "data": "prt_date" },           
                        { "data": "prt_priority" },           
                        { "data": "prt_client" },           
                        { "data": "prt_dept" },           
                        { "data": "prt_tl" },  
                        { "data": "prt_tm" },  
                        // { "data": "view_report" },  
                        { "data": "tl_prt_status" },           
                        { "data": "action" },          
                        
                    ],
                    "order": [
                        [1, 'asc']
                    ]
                });

            
            }
        </script>
    <?php }  else if($this->session->userdata('role') == 'Client'){  ?>
        
        <script>
            
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

        //     $("#role").change(function(){
        //     var role=$("#role").val();
        //     var x = document.getElementById('tm');
        //     if(role == "Team Leader"){
        //         // $(".input-group").show();
        //         x.style.display = "flex";
        //     }else{
        //         $("#tm").hide();
        //     }
        //      })

            $('#project_ops_filter').change(function() {
                var project_ops_filter = $('#project_ops_filter').val();
                if(project_ops_filter !=''){
                    // alert(project_ops_filter)
                    $("#select_dept_div").show();

                    //dept option list based on operations
                    $.ajax({
                        url:"<?php echo base_url();?>/index.php/select_dept_div_opt",
                        type:"POST",
                        data:{
                            project_ops_filter : project_ops_filter,
                            },
                        dataType : "JSON",
                        success:function(data)
                        {
                            // alert(data)
                            if(data == '')
                            {
                                $("#project_dept_filter").hide();
                            }
                            else{
                                $('#project_dept_filter').html(data);
                            }
                                    
                        }
                    });

                    project_datatable_value();
                }else{
                    $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            $('#project_dept_filter').change(function() {
                var project_dept_filter = $('#project_dept_filter').val();
                if(project_dept_filter !=''){
                    // alert(project_ops_filter)select_dept_div
                    project_datatable_value();
                }else{
                    // $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            $('#project_date_filter').change(function() {
                var project_date_filter = $('#project_date_filter').val();
                if(project_date_filter !=''){
                    // alert(project_date_filter)
                    project_datatable_value();
                }else{
                    // $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            $('#project_priority_filter').change(function() {
                var project_priority_filter = $('#project_priority_filter').val();
                if(project_priority_filter !=''){
                    // alert(project_ops_filter)select_dept_div
                    project_datatable_value();
                }else{
                    // $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            $('#project_status_filter').change(function() {
                var project_status_filter = $('#project_status_filter').val();
                if(project_status_filter !=''){
                    // alert(project_ops_filter)select_dept_div
                    project_datatable_value();
                }else{
                    // $("#select_dept_div").hide();
                    project_datatable_value();

                }
                
            });

            function project_datatable_value(){   
                
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
                        
                        
                    ],  
                    'dom': 'Blfrtip', 
                    "aoColumnDefs": [
                        
                    ],
                    'ajax': {
                        // type: 'POST',
                        'url': "<?= base_url(); ?>/index.php/project_report_data",
                        'data': function(data) {
                            data.project_ops_filter = $('#project_ops_filter').val();
                            // alert(data.project_ops_filter)
                            data.project_dept_filter = $('#project_dept_filter').val();
                            data.project_priority_filter = $('#project_priority_filter').val();
                            data.project_status_filter = $('#project_status_filter').val();
                            data.project_date_filter = $('#project_date_filter').val();
                        }
                    },
                    createdRow: function( row, data, dataIndex ) {
                        $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                        $( row ).find('td:eq(1)').attr('data-label', 'Project Name');
                        $( row ).find('td:eq(2)').attr('data-label', 'Project Description');
                        $( row ).find('td:eq(3)').attr('data-label', 'Project Date');
                        $( row ).find('td:eq(4)').attr('data-label', 'Operations');
                        $( row ).find('td:eq(5)').attr('data-label', 'Priority');
                        $( row ).find('td:eq(6)').attr('data-label', 'Client');
                        $( row ).find('td:eq(7)').attr('data-label', 'Department');
                        $( row ).find('td:eq(8)').attr('data-label', 'Project Status');
                        $( row ).find('td:eq(9)').attr('data-label', 'Action');
                    
                    },
                    "columns": [
                    
                        {
                            title: 'S.No',
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;

                            }
                        },
                        { "data": "prt_name" },           
                        { "data": "prt_des" },           
                        { "data": "prt_date" },           
                        { "data": "ops_name" },  
                        { "data": "prt_priority" },                    
                        { "data": "prt_client" },           
                        { "data": "prt_dept" },       
                        { "data": "tl_prt_status" },           
                        { "data": "action" },          
                        
                    ],
                    "order": [
                        [1, 'asc']
                    ]
                });

            
            }
        </script>
    <?php } ?>                                                               
      
</body>
</html>