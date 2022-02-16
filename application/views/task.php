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
    <title>Task</title>
    <!-- This page plugin CSS -->
    <!-- <link href="<?= base_url(); ?>assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet"> -->
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
                        <h4 class="page-title">Task List</h4>
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
                                    <h4 class="card-title">All Task</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <!-- Head $ TL -->
                                            <?php if($this->session->userdata('role') == "Head" || $this->session->userdata('role') == "Team Leader"){ ?>     
                                            <button type="button" class="btn btn-dark" onClick="myFunction()" value="submit">
                                                Add Task
                                            </button>
                                            <!-- TM -->
                                            <?php } else if($this->session->userdata('role') == 'Team Member'){ ?>                                            
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

                                <div class="table-responsive">
                                    <?php if($this->session->userdata('role') == "Head" || $this->session->userdata('role') == "Team Leader"){ ?>     
                                    <table id="file_export" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Task</th>
                                                <th>Team Leader</th>
                                                <th>Task Details</th>
                                                <th>Assigned TM List</th>
                                                <th>Task Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>   
                                        <tbody id="report_table">
                                            
                                        </tbody>
                                    </table> 
                                    <?php } else if($this->session->userdata('role') == 'Team Member'){ ?>
                                        <table id="file_export"class="table table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Task</th>
                                                <th>Team Leader</th>
                                                <th>Task Details</th>
                                                <th>Assigned TM List</th>
                                                <th>Task Status</th>
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
                                    <select id="task_tm_list" name="task_tm_list[]" placeholder="Team Member" aria-label="no" class="form-control" multiple>
                                        <option>Team Member</option>
                                        <?php
                                            foreach($emp_name as $row)
                                            {
                                            echo '<option>'.$row->emp_name.'</option>';
                                            }
                                        ?>
                                    </select>                               
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="task_tm_id" id="task_tm_id" class="form-control">
                                <input type="hidden" name="task_code" id="task_code" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit"  id="task_tm" name="task_tm"  class="btn btn-success"><i class="ti-save"></i> Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
            <div class="modal fade" id="projectst" tabindex="-1" role="dialog" aria-labelledby="projectstModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="post" action="javascript:void(0)" id="task_status_tl">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignbtnModalLabel"><i class="ti-marker-alt m-r-10"></i> Task Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                                
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-bar-chart text-white"></i></button>
                                    <select id="task_status" name="task_status" placeholder="Task Status" aria-label="no" class="form-control">
                                        <option>Task Status</option>
                                        <option value="Incomplete">Incomplete</option>
                                        <option value="To Do">To Do</option>
                                        <option value="Doing">Doing</option>
                                        <option value="Completed">Completed</option>
                                    </select>                               
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="task_st_id" id="task_st_id" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="task_st_tl" name="task_st_tl"  class="btn btn-success"><i class="ti-save"></i> Task Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

            <!-- Form Edit -->
            <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="javascript:void(0)" id="edit_task_form" enctype="multipart/form-data">                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignbtnModalLabel"><i class="ti-marker-alt m-r-10"></i> Task Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 
                                <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class=" ti-id-badge text-white"></i></button>
                                <select id="mytest" name="task_name" class="form-control">
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
                                    <select id="mytest1" name="tl_task" class="form-control">
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
                                    <textarea class="form-control" name="task_detail" id="mytest2" placeholder="Task Details" style="height: 100px"></textarea>                                    
                                </div>
                                <span id="task_detail_error" class="text-danger"></span>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-file text-white"></i></button>
                                    <input type="file" id="fileupload" multiple="multiple" name="file_name_update[]" class="form-control" placeholder="File Upload" aria-label="name">
                                </div>
                                <table>              
                                    <tbody id="task_file">
                                                    
                                    </tbody>  
                                </table> 

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="task_id" id="task_id" class="form-control">
                                <button type="button"  onclick="setTimeout(function(){ window.location.href='<?php echo base_url();?>users'; }, 1000);" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="edit" name="edit" value="submit"  class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>

            <!-- File View -->
            <div class="modal fade" id="viewmodel" tabindex="-1" role="dialog" aria-labelledby="viewmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- <form class="large-model"  enctype="multipart/form-data" id="edit_project_form"  data-parsley-validate method="post" autocomplete="off"> -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewmodelLabel"><i class="ti-marker-alt m-r-10"></i> File View</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                   
                        <div class="modal-body">                                                                       
                            <table>              
                                <tbody id="task_file_tm">
                                                
                                </tbody>  
                            </table>                                                                                     
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="task_view_id" id="task_view_id" class="form-control">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daily Task Update -->
            <div class="modal fade" id="dailyTaskmodel" tabindex="-1" role="dialog" aria-labelledby="dailyTaskmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="javascript:void(0)" id="daily_task_form" enctype="multipart/form-data">                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="dailyTaskmodelLabel"><i class="ti-marker-alt m-r-10"></i> Daily Task Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>                   
                            <div class="modal-body"> 
                                <span id="emp_id_error" class="text-danger"></span>     
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class=" ti-id-badge text-white"></i></button>
                                    <input type="date" class="form-control" name="task_date"  id="task_date" placeholder="Date" aria-label="name" required> 
                                </div>
                                <span id="date_error" class="text-danger"></span>                                                                                    
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                    <textarea class="form-control" name="comment" id="comment" placeholder="Comment" style="height: 100px"></textarea>                                    
                                </div>
                                <span id="comment_error" class="text-danger"></span>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control" name="daily_task_code"  id="daily_task_code" placeholder="Employee ID" aria-label="name" required> 
                                <input type="hidden" class="form-control" name="emp_id"  id="emp_id" placeholder="Employee ID" value="<?php echo $this->session->userdata('emp_id'); ?>" aria-label="name" required> 
                                <input type="hidden" class="form-control" name="emp_name"  id="emp_name" placeholder="Employee Name" value="<?php echo $this->session->userdata('emp_name'); ?>" aria-label="name" required> 
                                <input type="hidden" name="dailytask_id" id="dailytask_id" class="form-control">
                                <button type="button"  onclick="setTimeout(function(){ window.location.href='<?php echo base_url();?>users'; }, 1000);" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="dailytask" name="dailytask" value="submit"  class="btn btn-success"><i class="ti-save"></i> Save</button>
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
  
    //alert box
    var timeout = 3000; // in miliseconds (3*1000)
    $('#flashdata').delay(timeout).fadeOut(300);


    $('#report_table').on('click','.editRecord',function(){
            var task_id = $(this).data('id'); 
            var task_name = $(this).data('task_name'); 
            var tl_task = $(this).data('tl_task'); 
            var task_detail = $(this).data('task_detail');            
            // alert(task_id)           
            // alert(task_name)           
            // alert(tl_task)           
            // alert(task_detail)           
            $('#editmodel').modal('show');
            // alert(deptId);
            $('#mytest').val(task_name);
            $('#mytest1').val(tl_task);
            $('#mytest2').val(task_detail);
            $('#task_id').val(task_id);

            $.ajax({
            url:"<?php echo base_url();?>get_uploaded_file_task",
            type:"POST",
            data:{
                "id": task_id,            
            },
            dataType : "JSON",
            success:function(data)
            {     
                // alert(data)      
                $('#task_file').empty();     
            
                var sample="";
                var  sampleArr = data.file_upload.split(/[ ,]+/);    
                for (var i = sampleArr.length - 1; i >= 0; i--) {         
                var ext = sampleArr[i].split('.')[1];    
                // alert(ext);
                    if(ext=="jpg" || ext=="png" || ext=="jpeg" || ext=="gif") {
                        // alert("one");
                        var tr='<tr>';
                        // sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/upload/'+sampleArr[i]+'" style="cursor:pointer;"></td><td><form method="post" action="javascript:void(0)" id="img_delete_form"><input type="hidden" name="'+sampleArr[i]+'" id="'+sampleArr[i]+'" class="form-control"><button type="submit" class="btn btn-success" id="img_delete" name="img_delete" value="submit"><i class="ti-trash"></i></button></form></td></tr>';            
                        sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/taskfile/'+sampleArr[i]+'" style="cursor:pointer;"></td></tr>';            
                    }else if (ext=="pdf"|| ext=="doc" || ext=="docx" || ext=="xlxs" || ext=="csv"){
                        var tr='<tr>';
                        // alert("two");               
                        sample ='<td><a href="<?php echo base_url(); ?>/assets/taskfile/'+sampleArr[i]+'"  style="color:white;"  download><div class="badge bg-danger">'+sampleArr[i]+'</div></a></td></tr>';             
                    }     
                            $('#task_file').append(tr+sample);                

                }
               
                                                            
            }
            });

	    });

        // $("#edit").on('click',()=>{
        //     var mytest=$("#mytest").val();
        //     var mytest1=$("#mytest1").val();
        //     var mytest2=$("#mytest2").val();           
        //     var task_id=$("#task_id").val();
        //     var task_id=$("#task_id").val();
        //     alert(mytest);
        //     alert(mytest1);
        //     alert(mytest2);
        //     alert(task_id);
        //     alert(task_id);
        //     $.ajax({
        //     url:"<?php echo base_url();?>task_update",
        //     type:"POST",
        //     data:$("#edit_form").serialize(),
        //     dataType : "JSON",
        //     success:function(data)
        //     {            
                    
        //         if(data.error)
        //         {
        //             if(data.task_name__edit_error != '')
        //             {
        //             $('#task_name__edit_error').html(data.task_name__edit_error);
        //             }
        //             else
        //             {
        //             $('#task_name__edit_error').html('');
        //             }
        //             if(data.tl_task_edit_error != '')
        //             {
        //             $('#tl_task_edit_error').html(data.tl_task_edit_error);
        //             }
        //             else
        //             {
        //             $('#tl_task_edit_error').html('');
        //             }
        //             if(data.task_detail_edit_error != '')
        //             {
        //             $('#task_detail_edit_error').html(data.task_detail_edit_error);
        //             }
        //             else
        //             {
        //             $('#task_detail_edit_error').html('');
        //             }
        //         }
        //         else
        //         {
        //             $('#mytest').val("");
        //             $('#mytest1').val("");
        //             $('#mytest2').val("");
        //             $('#editmodel').modal('hide');
        //             window.location.reload();
        //             task_report_data();
        //         }
                                                            
        //     }
        //     });
        //     return false;        
        // });
        
        function sample_popup_viewer(sample)
        {
            // alert(cor);
            $("#sample_view").attr("src", "<?php echo base_url(); ?>/assets/upload/"+sample);
            $(".sample-preview").modal('show');
        }  

        $('#report_table').on('click','.deleteRecord',function(){
            var task_id = $(this).data('id'); 
            // alert(client_id)           
            $('#deletemodel').modal('show');
            // alert(deptId);
            $('#delete_id').val(task_id);
	    });

    
        $("#delete").on('click',()=>{
            var id=$("#delete_id").val();
            // alert(id);

            $.ajax({
            url:"<?php echo base_url();?>task_delete",
            type:"POST",
            data:$("#delete_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                $('#deletemodel').modal('hide');
                window.location.reload();
                task_report_data();
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
            url:"<?php echo base_url();?>task_active",
            type:"POST",
            data:$("#active_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#activemodel').modal('hide');
                    window.location.reload();
                    task_report_data();
            }
            });
            return false;        
        });

        $("#deactive").on('click',()=>{
            var id=$("#deactiveid").val();
            // alert(id);

            $.ajax({
            url:"<?php echo base_url();?>task_deactive",
            type:"POST",
            data:$("#deactive_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                    $('#deactivemodel').modal('hide');
                    window.location.reload();
                    task_report_data();
            }
            });
            return false;        
        });

        $('#report_table').on('click','.dailyTask',function(){
            var dailytask_id = $(this).data('id'); 
            var task_code = $(this).data('task_code'); 
            // alert(task_code)
            $('#dailyTaskmodel').modal('show');
            $('#dailytask_id').val(dailytask_id);          
            $('#daily_task_code').val(task_code);          
	    });

        $('#report_table').on('click','.dailyTaskView',function(){
            var dailytaskview_id = $(this).data('id'); 
            $('#dailyTaskViewmodel').modal('show');
            $('#dailytaskview_id').val(dailytaskview_id);          
	    });

        $('#report_table').on('click','.viewRecord',function(){
            var task_view_id = $(this).data('id'); 
            $('#viewmodel').modal('show');
            $('#task_view_id').val(task_view_id);

            $.ajax({
            url:"<?php echo base_url();?>get_uploaded_file_task",
            type:"POST",
            data:{
                "id": task_view_id,            
            },
            dataType : "JSON",
            success:function(data)
            {     
                // alert(data)      
                $('#task_file_tm').empty();     
            
                var sample="";
                var  sampleArr = data.file_upload.split(/[ ,]+/);    
                for (var i = sampleArr.length - 1; i >= 0; i--) {         
                var ext = sampleArr[i].split('.')[1];    
                // alert(ext);
                    if(ext=="jpg" || ext=="png" || ext=="jpeg" || ext=="gif") {
                        // alert("one");
                        var tr='<tr>';
                        // sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/upload/'+sampleArr[i]+'" style="cursor:pointer;"></td><td><form method="post" action="javascript:void(0)" id="img_delete_form"><input type="hidden" name="'+sampleArr[i]+'" id="'+sampleArr[i]+'" class="form-control"><button type="submit" class="btn btn-success" id="img_delete" name="img_delete" value="submit"><i class="ti-trash"></i></button></form></td></tr>';            
                        sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/taskfile/'+sampleArr[i]+'" style="cursor:pointer;"></td></tr>';            
                    }else if (ext=="pdf"|| ext=="doc" || ext=="docx" || ext=="xlxs" || ext=="csv"){
                        var tr='<tr>';
                        // alert("two");               
                        sample ='<td><a href="<?php echo base_url(); ?>/assets/taskfile/'+sampleArr[i]+'" style="color:white;" download><div class="badge bg-danger">'+sampleArr[i]+'</div></a></td></tr>';             
                    }     
                            $('#task_file_tm').append(tr+sample);                

                }
               
                                                            
            }
            });


	    });

        $('#report_table').on('click','.assignbtn',function(){
            var task_id = $(this).data('id'); 
            var task_code = $(this).data('task_code'); 
            // alert(client_id)           
            $('#assignbtn').modal('show');
            // alert(deptId);
            $('#task_tm_id').val(task_id);
            $('#task_code').val(task_code);
	    });

        $('#report_table').on('click','.projectst',function(){
            var task_id = $(this).data('id'); 
            // alert(client_id)           
            $('#projectst').modal('show');
            // alert(deptId);
            $('#task_st_id').val(task_id);
	    });

    </script>

    <script>
        // save new employee record
        $("#task_st_tl").on('click',()=>{
            var task_st_id=$("#task_st_id").val();
            var task_status=$("#task_status").val();
            // alert(task_st_id);
            // alert(task_status);

            $.ajax({
                url:"<?php echo base_url();?>task_st_tl",
                type:"POST",
                data:$("#task_status_tl").serialize(),
                dataType : "JSON",
                success:function(data)
                {  
                
                    $('#task_status').val("");
                    window.location.reload();
                    task_report_data();
                }
            });
            return false;        
        });

        $("#task_tm").on('click',()=>{
            // var task_tm_id=$("#task_tm_id").val();
            // var task_tm_list=$("#task_tm_list").val();
            // alert(task_tm_id);
            // alert(task_tm_list);

            $.ajax({
                url:"<?php echo base_url();?>task_tm_list",
                type:"POST",
                data:$("#assigned_tm_list").serialize(),
                dataType : "JSON",
                success:function(data)
                {  
                
                    $('#task_tm_list').val("");
                    window.location.reload();
                    task_report_data();
                }
            });
            return false;        
        });
        
        // save new employee record
        $("#dailytask").on('click',()=>{
            // var emp_id=$("#emp_id").val();
            // var comment=$("#comment").val();
            // var dailytask_id=$("#dailytask_id").val();
            // var task_code=$("#task_code").val();
            // alert(task_code);
            // alert(comment);
            // alert(dailytask_id);
            // alert(task_date);

            $.ajax({
                url:"<?php echo base_url();?>daily_task_update",
                type:"POST",
                data:$("#daily_task_form").serialize(),
                dataType : "JSON",
                success:function(data)
                {  
                    if(data.error)
                        {
                            if(data.comment_error != '')
                            {
                            $('#comment_error').html(data.comment_error);
                            }
                            else
                            {
                            $('#comment_error').html('');
                            }
                            if(data.date_error != '')
                            {
                            $('#date_error').html(data.date_error);
                            }
                            else
                            {
                            $('#date_error').html('');
                            }
                        }
                        else
                        {       
                            $('#dailyTaskmodel').modal('hide');
                            $('#task_tm_list').val("");
                            $('#task_tm_list').val("");

                            window.location.reload();
                            task_report_data();                    
                            //    alert("test") 
                        }                  
                }
            });
            return false;        
        });
    </script>

    <script>
        $(document).ready(function(){
            // Submit form data via Ajax
            $("#edit_task_form").on('submit', function(e){
                // alert("edit")
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url();?>edit_task_form",
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        if(data.error)
                        {
                            if(data.task_name__edit_error != '')
                            {
                            $('#task_name__edit_error').html(data.task_name__edit_error);
                            }
                            else
                            {
                            $('#task_name__edit_error').html('');
                            }
                            if(data.tl_task_edit_error != '')
                            {
                            $('#tl_task_edit_error').html(data.tl_task_edit_error);
                            }
                            else
                            {
                            $('#tl_task_edit_error').html('');
                            }
                            if(data.task_detail_edit_error != '')
                            {
                            $('#task_detail_edit_error').html(data.task_detail_edit_error);
                            }
                            else
                            {
                            $('#task_detail_edit_error').html('');
                            }
                        }
                        else
                        {       
                            $('#editmodel').modal('hide');
                            window.location.reload();
                            task_report_data();                    
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
            window.location.href="<?php echo base_url();?>addtask";
        }      

    </script>

    <?php if($this->session->userdata('role') == "Head" || $this->session->userdata('role') == "Team Leader"){ ?>     

    <script>
        $(document).ready(function() {
            radioswitch.init(); 
            task_report_data();      
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

        function task_report_data(){   
            
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
                    // {
                    //     // "extend": 'colvis',
                    //     // "text": 'Column visibility',
                    //     // "titleAttr": 'Column visibility',
                    //     // "className": 'dt-button buttons-print btn btn-primary mr-1',
                    //     // "exportOptions": {
                    //     //     'columns': ':visible'
                    //     // },
                    //     // "action": newexportaction
                    // },
                    // 'colvis',
                    
                    
                ],  
                'dom': 'Blfrtip', 
                "aoColumnDefs": [
                    
                ],
                'ajax': {
                    // type: 'POST',
                    'url': "<?= base_url('task_report_data'); ?>",
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
                    $( row ).find('td:eq(1)').attr('data-label', 'Task');
                    $( row ).find('td:eq(2)').attr('data-label', 'Team Leader');
                    $( row ).find('td:eq(3)').attr('data-label', 'Task Details');
                    $( row ).find('td:eq(4)').attr('data-label', 'Assigned TM List');
                    $( row ).find('td:eq(5)').attr('data-label', 'Task Status');
                    $( row ).find('td:eq(6)').attr('data-label', 'Action');
                
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
                    { "data": "task_name" },           
                    { "data": "tl_task" },           
                    { "data": "task_detail" },           
                    { "data": "tm_task" },       
                    { "data": "tl_task_status" },               
                    { "data": "action" },           
                    
                ],
                "order": [
                    [1, 'asc']
                ]
            });

        
        }
    </script>
    <?php } else if($this->session->userdata('role') == 'Team Member'){ ?>
        
    <script>
        $(document).ready(function() {
            radioswitch.init(); 
            task_report_data();      
        

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

        function task_report_data(){   
            
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
                    // {
                    //     // "extend": 'colvis',
                    //     // "text": 'Column visibility',
                    //     // "titleAttr": 'Column visibility',
                    //     // "className": 'dt-button buttons-print btn btn-primary mr-1',
                    //     // "exportOptions": {
                    //     //     'columns': ':visible'
                    //     // },
                    //     // "action": newexportaction
                    // },
                    // 'colvis',
                    
                    
                ],  
                'dom': 'Blfrtip', 
                "aoColumnDefs": [
                    
                ],
                'ajax': {
                    // type: 'POST',
                    'url': "<?= base_url('task_report_data'); ?>",
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
                    { "data": "task_name" },           
                    { "data": "tl_task" },           
                    { "data": "task_detail" },           
                    { "data": "tm_task" },       
                    { "data": "tl_task_status" },               
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
   