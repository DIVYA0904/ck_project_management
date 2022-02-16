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
    <title>Task View</title>
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
                    <div class="col-6 align-self-center">
                        <!-- <h4 class="page-title">Comments</h4> -->
                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-dark" onClick="myFunction()" value="submit">
                                Go Back 
                            </button>
                        </div> -->
                    </div>
                    <div class="col-6 align-self-right text-left">
                        <div class="d-flex align-items-center">
                        <input type="hidden" value="<?php echo $this->session->userdata('project_code'); ?>" id="project_code_input_tag">
                          
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
                                    <h4 class="card-title"><?php echo $this->session->userdata('prt_name'); ?></h4><br>
                                </div>
                                <p><?php echo $this->session->userdata('prt_des'); ?></p>

                                <?php if($this->session->flashdata('msg')): ?>
                                    <div id="flashdata" class="alert alert-success alert-dismissible" style="width:500px">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <?php echo $this->session->flashdata('msg'); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="table-responsive">
                                    <?php if($this->session->userdata('role') == "Operations Head" || $this->session->userdata('role') == 'Team Leader') { ?>
                                    <table id="file_export"class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Assigned To</th>
                                                <th>Task Details</th>
                                                <th>Created On</th>
                                                <th>Task File</th>
                                                <th>Task Status</th>
                                                <th>Completed On</th>
                                                <th>Action</th>
                                                <th>Assigned By</th>
                                            </tr>
                                        </thead>
                                        <tbody id="report_table">
                                            
                                        </tbody>
                                    </table>
                                    <?php } else if($this->session->userdata('role') == 'Team Member'){ ?>
                                    <table id="file_export"class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Task Details</th>
                                                <th>Created On</th>
                                                <th>Task File</th>
                                                <th>Task Status</th>
                                                <th>Completed On</th>
                                                <th>Action</th>
                                                <th>Assigned By</th>
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
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                    <select id="tm_task_status" name="tm_task_status" placeholder="Task Status" aria-label="no" class="form-control">                                        
                                        <option value="Pending">Pending</option>
                                        <option value="To Do">To Do</option>
                                        <option value="Doing">Doing</option>
                                        <option value="Completed">Completed</option>
                                    </select>                                 
                                </div>
                                <span id="tm_task_status_error" class="text-danger"></span>
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

            <!-- Task View -->
            <div class="modal fade" id="viewtaskmodel" tabindex="-1" role="dialog" aria-labelledby="viewtaskmodelLabel" aria-hidden="true">
                <div class="modal-dialog modal-viewtaskmodel" role="document">
                    <div class="modal-content">
                        <!-- <form class="large-model"  enctype="multipart/form-data" id="edit_project_form"  data-parsley-validate method="post" autocomplete="off"> -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewtaskmodelLabel"><i class="ti-marker-alt m-r-10"></i>Task Remark</h5>
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
                                            <th>Comment</th>
                                            <th>Task Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="report_task_table">
                                        
                                    </tbody>
                                </table>                                    
                                <!-- </table>                                                                                                              -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="project_task_view_id" id="project_task_view_id" class="form-control">
                            <input type="hidden" name="project_task_view_code" id="project_task_view_code" class="form-control">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- File View -->
            <div class="modal fade" id="viewmodel" tabindex="-1" role="dialog" aria-labelledby="viewmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- <form class="large-model"  enctype="multipart/form-data" id="edit_project_form"  data-parsley-validate method="post" autocomplete="off"> -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewmodelLabel"><i class="ti-marker-alt m-r-10"></i> Task View</h5>
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

            <!-- Form Edit -->
            <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editmodelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="javascript:void(0)" id="edit_task_form" enctype="multipart/form-data">                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignbtnModalLabel"><i class="ti-marker-alt m-r-10"></i> Task Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">  
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-notepad text-white"></i></button>
                                    <input type="date" name="task_date" id="mytest2" class="form-control">                 
                                </div>
                                <span id="task_date_error" class="text-danger"></span>                                                                  
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                                    <textarea class="form-control" name="task_detail" id="mytest1" placeholder="Task Details" style="height: 100px"></textarea>                                    
                                </div>
                                <span id="task_detail_error" class="text-danger"></span>  
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class=" ti-user text-white"></i></button>
                                    <select id="mytest3" name="prt_tm_list_task_add" class="form-control">
                                       
                                    </select>
                                </div>
                                <span id="prt_tm_list_task_add_error" class="text-danger"></span>                                 
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
                                <input type="hidden" name="task_code" id="task_code" class="form-control">
                                <button type="button"  onclick="setTimeout(function(){ window.location.href='<?php echo base_url();?>users'; }, 1000);" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="edit" name="edit" value="submit"  class="btn btn-success"><i class="ti-save"></i> Save</button>
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
                                <input type="hidden" name="task_code" id="delete_task_code" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-success" id="delete" name="delete" value="submit"><i class="ti-save"></i> Yes</button>
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
    
    function rowedit(rowindex, row_id){

        $('.tb_edit').attr("disabled", 'disabled');
        
        var cell1 = ($("#file_export_task_view tbody tr:eq(" + (rowindex) + ") td:eq(1)").text());
        var cell2 = ($("#file_export_task_view tbody tr:eq(" + (rowindex) + ") td:eq(2)").text());
        var newdate = ($("#file_export_task_view tbody tr:eq(" + (rowindex) + ") td:eq(3)").text());
        // date="21-01-2015";
        var cell3 = newdate.split("-").reverse().join("-");
        // console.log(newdate)
        // var cell3 = ($("#file_export_task_view tbody tr:eq(" + (rowindex) + ") td:eq(3)").text());
        
        var put_cell1 = '<input type="text" class="form-control" name="task_comment_edit" id="task_comment_edit" value="' + cell1 + '">';
	    $("#file_export_task_view tbody tr:eq(" + (rowindex) + ") td:eq(1)").html(put_cell1);
      
        if(cell2 == "Pending"){
            var cell2_pending_selected = "Selected";
        }else{
            var cell2_pending_selected = "";
        }

        if(cell2 == "To Do"){
            var cell2_todo_selected = "Selected";
        }else{
            var cell2_todo_selected = "";
        }
        if(cell2 == "Doing"){
            var cell2_doing_selected = "Selected";
        }else{
            var cell2_doing_selected = "";
        }

        if(cell2 == "Completed"){
            var cell2_completed_selected = "Selected";
        }else{
            var cell2_completed_selected = "";
        }
        var put_cell2 = '';
        put_cell2 += '<select name="task_status_edit" id="task_status_edit" class="form-control">';
        put_cell2 += '<option value="Pending" '+cell2_pending_selected+'>Pending</option>';
        put_cell2 += '<option value="To Do" '+cell2_todo_selected+'>To Do</option>';
        put_cell2 += '<option value="Doing" '+cell2_doing_selected+'>Doing</option>';
        put_cell2 += '<option value="Completed" '+cell2_completed_selected+'>Completed</option>';
        put_cell2 += '</select>';
        
        // var put_cell2 = '<input type="text" class="form-control" name="task_status_edit" id="task_comment_edit" value="' + cell2 + '">';
	    $("#file_export_task_view tbody tr:eq(" + (rowindex) + ") td:eq(2)").html(put_cell2);

        var put_cell3 = '<input type="date" class="form-control" name="task_date_edit" id="task_date_edit" value="' + cell3 + '">';
	    $("#file_export_task_view tbody tr:eq(" + (rowindex) + ") td:eq(3)").html(put_cell3);
	
        var put_cell4 = '<span id="emptyErr" style="color:red;display:none;">* Fields Required..!<br></span><button id="updaterowEditbtn" type="button" class="btn btn-sm btn-success"  onclick="updaterowEdit(' + row_id + ')"><i class="fa fa-save"></i></button></td>';
	    $("#file_export_task_view tbody tr:eq(" + (rowindex) + ") td:eq(4)").html(put_cell4);

    }

    
    function rowCancel(row_id) {
	    var row_id = row_id;
        var formData = new FormData();
        formData.append('row_id', row_id);
        if (row_id == '') {

            $("#emptyErr").css({
                "display": "block"
            });

            setTimeout(
                function () {
                    $("#emptyErr").css({
                        "display": "none"
                    });
                }, 2000);
            } else {

            // alert(task_comment_edit)

            $.ajax({
                url:"<?php echo base_url();?>/index.php/daily_task_delete",
                method: "POST",
                data: formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) { 
                    // alert(data)                 
                    $('#viewtaskmodel').modal('hide');                
                    view_task_report_data();
                }

            });
            }

    }

    function updaterowEdit(row_id) {

        // alert(row_id)
        
        var formData = new FormData();

        var task_comment_edit = $("#task_comment_edit").val();
        var task_status_edit = $("#task_status_edit").val();
        var task_date_edit = $("#task_date_edit").val();
	    var row_id = row_id;

        formData.append('task_comment_edit', task_comment_edit);
        formData.append('task_status_edit', task_status_edit);
        formData.append('task_date_edit', task_date_edit);
        formData.append('row_id', row_id);

        if (task_comment_edit == '' || task_status_edit == '' || task_date_edit == '') {

            $("#emptyErr").css({
                "display": "block"
            });

            setTimeout(
                function () {
                    $("#emptyErr").css({
                        "display": "none"
                    });
                }, 2000);
        } else {

            // alert(task_comment_edit)

            $.ajax({
                url:"<?php echo base_url();?>/index.php/daily_task_update",
                method: "POST",
                data: formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) { 
                    // alert(data)                 
                    $('#viewtaskmodel').modal('hide');                
                    view_task_report_data();
                }

            });
        }
    }
    
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
        view_task_report_data();   

        //alert msg
        var timeout = 3000; // in miliseconds (3*1000)
        $('#flashdata').delay(timeout).fadeOut(300);   

        $('#report_table').on('click','.viewRecord',function(){
            var project_view_id = $(this).data('id'); 
            // var project_view_id = $(this).data('id'); 
            $('#viewmodel').modal('show');
            $('#project_view_id').val(project_view_id);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/get_uploaded_file_task",
            type:"POST",
            data:{
                "id": project_view_id,            
            },
            dataType : "JSON",
            success:function(data)
            {     
                $('#project_file_tm').empty();     
            
                var sample="";
                var  sampleArr = data.file_upload.split(/[ ,]+/);    
                // alert(sampleArr)      
                for (var i = sampleArr.length - 1; i >= 0; i--) {         
                var ext = sampleArr[i].split('.')[1];    
                // alert(ext);
                    if(ext=="jpg" || ext=="png" || ext=="jpeg" || ext=="gif") {
                        // alert("one");
                        var tr='<tr>';
                        // sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/upload/'+sampleArr[i]+'" style="cursor:pointer;"></td><td><form method="post" action="javascript:void(0)" id="img_delete_form"><input type="hidden" name="'+sampleArr[i]+'" id="'+sampleArr[i]+'" class="form-control"><button type="submit" class="btn btn-success" id="img_delete" name="img_delete" value="submit"><i class="ti-trash"></i></button></form></td></tr>';            
                        sample = '<td><img onclick=sample_popup_viewer("'+sampleArr[i]+'") class="img-sm rounded-circle image-layer-item image-size" src="<?php echo base_url(); ?>/assets/taskfile/'+sampleArr[i]+'" style="cursor:pointer;"></td></tr>';            
                    }else if (ext=="pdf"|| ext=="doc" || ext=="docx" || ext=="xlsx" || ext=="csv"){
                        var tr='<tr>';
                        // alert("two");               
                        sample ='<td><a href="<?php echo base_url(); ?>/assets/taskfile/'+sampleArr[i]+'"  style="color:white;"  download><div class="badge bg-danger">'+sampleArr[i]+'</div></a></td></tr>';             
                    }else{
                        var tr='<tr>';
                        // alert("two");               
                        sample ='<td> No File</td></tr>';             
                    }    
                            $('#project_file_tm').append(tr+sample);                

                }
               
                                                            
            }
            });


	    });   

        // function test(){
        //     alert("testing")
        // }               

        $('#file_export_task_view').on('click','.dd',function(){
            // alert("jj")           dailytaskeditRecord
            var task_id = $(this).data('id'); 
            var index = $(this).data('index'); 
            var task_update_date = $(this).data('task_update_date'); 
            var comment = $(this).data('comment'); 
            var tm_task_status = $(this).data('tm_task_status');     
            // alert(task_id)           
            // alert(comment)           
            // alert(tm_task_status)           
	        
            $('.tb_edit').attr("disabled", 'disabled');
	        
            var cell1 = ($("#file_export_task_view tbody tr:eq(" + (index) + ") td:eq(1)").text());
            var cell2 = ($("#file_export_task_view tbody tr:eq(" + (index) + ") td:eq(2)").text());
            var cell3 = ($("#file_export_task_view tbody tr:eq(" + (index) + ") td:eq(3)").text());

            $("#makeEditable tbody tr:eq(" + (rowindex) + ") td:eq(2)").html(comment);
            $("#makeEditable tbody tr:eq(" + (rowindex) + ") td:eq(2)").html(tm_task_status);
            $("#makeEditable tbody tr:eq(" + (rowindex) + ") td:eq(2)").html(task_update_date);

            var put_cell4 = '<input type="file" name="e_proof_file" id="e_proof_file" class="form-control">';
	        $("#makeEditable tbody tr:eq(" + (rowindex) + ") td:eq(4)").html(put_cell4);

            // $('#mytest1').val(task_detail);
            // $('#mytest2').val(task_date);
            // // $('#mytest3').val(tm_task);
            // // $('#mytest4').val(task_name);
            // $('#task_id').val(task_id);
            // $('#task_code').val(task_code);

	    });


        $('#report_table').on('click','.editRecord',function(){
            var task_id = $(this).data('id'); 
            var task_code = $(this).data('task_code'); 
            var tm_task = $(this).data('tm_task'); 
            var task_detail = $(this).data('task_detail');   
            var task_date = $(this).data('task_date');          
            var task_name = $(this).data('task_name');          
            // alert(task_id)           
            // alert(task_date)           
            // alert(task_code)           
            // alert(task_detail)           
            $('#editmodel').modal('show');
            // alert("deptId");
            // $('#mytest1').val(tl_task);
            $('#mytest1').val(task_detail);
            $('#mytest2').val(task_date);
            // $('#mytest3').val(tm_task);
            // $('#mytest4').val(task_name);
            $('#task_id').val(task_id);
            $('#task_code').val(task_code);

            $.ajax({
                url:"<?php echo base_url();?>/index.php/prtpg_team_member_option_edit",
                type:"POST",
                data:{
                    prt_name : task_name,
                    task_code : task_code,
                    },
                dataType : "JSON",
                success:function(data)
                {
                    if(data == '')
                    {
                        // $("#mytest3").hide();
                    }
                    else{
                        $('#mytest3').html(data);
                    }
                            
                }
            });

            $.ajax({
            url:"<?php echo base_url();?>/index.php/get_uploaded_file_task",
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
                    } else{
                        var tr='<tr>';
                        // alert("two");               
                        sample ='<td> </td></tr>';             
                    }    
                            $('#task_file').append(tr+sample);                

                }
               
                                                            
            }
            });

	    });

        $("#edit_task_form").on('submit', function(e){
            // alert("edit")
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url();?>/index.php/edit_task_form",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    if(data.error)
                    {
                        if(data.task_date_error != '')
                        {
                        $('#task_date_error').html(data.task_date_error);
                        }
                        else
                        {
                        $('#task_date_error').html('');
                        }
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
                    }
                    else
                    {       
                        $('#editmodel').modal('hide');
                        window.location.reload();
                        view_task_report_data();                    
                        //    alert("test") 
                    }  
                }
            });
        });

        $('#report_table').on('click','.deleteRecord',function(){
            var task_id = $(this).data('id'); 
            var task_code = $(this).data('task_code'); 
            // alert(client_id)           
            $('#deletemodel').modal('show');
            // alert(deptId);
            $('#delete_id').val(task_id);
            $('#delete_task_code').val(task_code);
	    });

    
        $("#delete").on('click',()=>{
            var id=$("#delete_id").val();
            // alert(id);

            $.ajax({
            url:"<?php echo base_url();?>/index.php/task_delete",
            type:"POST",
            data:$("#delete_form").serialize(),
            dataType : "JSON",
            success:function(data)
            {            
                $('#deletemodel').modal('hide');
                window.location.reload();
                view_task_report_data();
            }
            });
            return false;        
        });


    });
    </script>
  
    <?php if($this->session->userdata('role') == "Operations Head" || $this->session->userdata('role') == 'Client'){ ?>     
        <script type="text/javascript">     
            function view_task_report_data(){   
                
                // var project_code = <?php //echo $this->session->userdata('project_code'); ?>;
                // alert(project_code)           

                var ct = $('#file_export').DataTable({ 
                    // 'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    'lengthChange': true,      
                    'pageLength': 10,          
                    'processing': true,        
                    'serverSide': true,
                    'serverMethod': 'post',
                    "bDestroy": true,
                    "aoColumnDefs": [
                        
                    ],
                    'ajax': {                        
                        'url': "<?= base_url(); ?>/index.php/view_task_report_data_prtpg",                       
                        'data': function(data) {                           
                        }
                    },
                    createdRow: function( row, data, dataIndex ) {
                        $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                        $( row ).find('td:eq(1)').attr('data-label', 'Assigned To');
                        $( row ).find('td:eq(2)').attr('data-label', 'Task Details');
                        $( row ).find('td:eq(3)').attr('data-label', 'Created On');
                        $( row ).find('td:eq(4)').attr('data-label', 'Task File');
                        $( row ).find('td:eq(5)').attr('data-label', 'Task Status');
                        $( row ).find('td:eq(6)').attr('data-label', 'Completed On');
                        $( row ).find('td:eq(7)').attr('data-label', 'Action');
                        $( row ).find('td:eq(8)').attr('data-label', 'Assigned By');
                    
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
                        { "data": "tm_task" },           
                        { "data": "task_detail" },           
                        { "data": "created_on" },           
                        { "data": "task_file" },           
                        { "data": "tm_task_status" },           
                        { "data": "task_completed_on" },           
                        { "data": "action" },           
                        { "data": "assigned_by" },           

                    ],
                    "order": [
                        [1, 'asc']
                    ]
                });

            
            }
        
        </script>  
    <?php } else if($this->session->userdata('role') == 'Team Leader'){ ?>
        <script type="text/javascript">     
            function view_task_report_data(){   
                
                // var project_code = <?php //echo $this->session->userdata('project_code'); ?>;
                // alert(project_code)           

                var ct = $('#file_export').DataTable({ 
                    // 'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    'lengthChange': true,      
                    'pageLength': 10,          
                    'processing': true,        
                    'serverSide': true,
                    'serverMethod': 'post',
                    "bDestroy": true,
                    "aoColumnDefs": [
                        
                    ],
                    'ajax': {                        
                        'url': "<?= base_url(); ?>/index.php/view_task_report_data_prtpg",                       
                        'data': function(data) {                           
                        }
                    },
                    createdRow: function( row, data, dataIndex ) {
                        $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                        $( row ).find('td:eq(1)').attr('data-label', 'Assigned To');
                        $( row ).find('td:eq(2)').attr('data-label', 'Task Details');
                        $( row ).find('td:eq(3)').attr('data-label', 'Created On');
                        $( row ).find('td:eq(4)').attr('data-label', 'Task File');
                        $( row ).find('td:eq(5)').attr('data-label', 'Task Status');
                        $( row ).find('td:eq(6)').attr('data-label', 'Completed On');
                        $( row ).find('td:eq(7)').attr('data-label', 'Action');
                        $( row ).find('td:eq(8)').attr('data-label', 'Assigned By');
                    
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
                        { "data": "tm_task" },           
                        { "data": "task_detail" },           
                        { "data": "created_on" },           
                        { "data": "task_file" },           
                        { "data": "tm_task_status" },           
                        { "data": "task_completed_on" },           
                        { "data": "action" },           
                        { "data": "assigned_by" },           

                    ],
                    "order": [
                        [1, 'asc']
                    ]
                });

            
            }
        
        </script>  
    <?php } else if($this->session->userdata('role') == 'Team Member'){ ?>
        <script type="text/javascript">     
            function view_task_report_data(){   
               
                var ct = $('#file_export').DataTable({ 
                    // 'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    'lengthChange': true,      
                    'pageLength': 10,          
                    'processing': true,        
                    'serverSide': true,
                    'serverMethod': 'post',
                    "bDestroy": true,
                    "aoColumnDefs": [
                        
                    ],
                    'ajax': {
                        // type: 'POST',
                        'url': "<?= base_url(); ?>/index.php/view_task_report_data_prtpg",
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
                        $( row ).find('td:eq(1)').attr('data-label', 'Task Details');
                        $( row ).find('td:eq(2)').attr('data-label', 'Created On');
                        $( row ).find('td:eq(3)').attr('data-label', 'Task File');
                        $( row ).find('td:eq(4)').attr('data-label', 'Task Status');
                        $( row ).find('td:eq(5)').attr('data-label', 'Completed On');
                        $( row ).find('td:eq(6)').attr('data-label', 'Action');
                        $( row ).find('td:eq(7)').attr('data-label', 'Assigned By');
                    
                    },
                    "columns": [
                    
                        {
                            title: 'S.No',
                            render: function(data, type, row, meta) {
                                
                                return meta.row + meta.settings._iDisplayStart + 1;

                            }
                        },
                        { "data": "task_detail" },           
                        { "data": "created_on" },           
                        { "data": "task_file" },           
                        { "data": "tm_task_status" },           
                        { "data": "task_completed_on" },           
                        { "data": "action" },             
                        { "data": "assigned_by" },           

                    ],
                    "order": [
                        [1, 'asc']
                    ]
                });

            
            }
        
        </script>  
    <?php } ?>    

    <script>
        // Add User button function
        function myFunction() {
            window.location.href="<?php echo base_url();?>task";
        }      

        $('#report_table').on('click','.update_status_btn',function(){
            var dailytask_id = $(this).data('id'); 
            var task_code = $(this).data('task_code'); 
            $('#dailyTaskmodel').modal('show');
            $('#dailytask_id').val(dailytask_id);          
            $('#daily_task_code').val(task_code);  
	    });
      
        $('#report_table').on('click','.followup_view_btn',function(){
            var project_task_view_id = $(this).data('id'); 
            var task_code = $(this).data('task_code'); 
            // alert(task_code)
            $('#viewtaskmodel').modal('show');
            $('#project_task_view_id').val(project_task_view_id);
            $('#project_task_view_code').val(task_code);

            var ct = $('#file_export_task_view').DataTable({ 
                // 'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                'lengthChange': true,      
                'pageLength': 10,          
                'processing': true,        
                'serverSide': true,
                'serverMethod': 'post',
                "bDestroy": true, 
               
                // 'dom': 'Blfrtip', 
                "aoColumnDefs": [
                    
                ],
                'ajax': {
                    'type': 'POST',      
                    'url': "<?= base_url(); ?>/index.php/get_task_remark/"+task_code,          
                    'data': function(data) {
                    }
                },
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(0)').attr('data-label', 'S.No');
                    $( row ).find('td:eq(1)').attr('data-label', 'Comment');
                    $( row ).find('td:eq(2)').attr('data-label', 'Task Status');
                    // $( row ).find('td:eq(3)').attr('data-label', 'Completed On');
                    $( row ).find('td:eq(3)').attr('data-label', 'Date');
                    $( row ).find('td:eq(4)').attr('data-label', 'Action');
                
                },
                "columns": [
                
                    {
                        title: 'S.No',
                        render: function(data, type, row, meta) {                           
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { "data": "comment" },           
                    { "data": "tm_task_status" },           
                    { "data": "task_update_date" },           
                    { "data": "action" },           
                    
                ],
                "order": [
                    [1, 'asc']
                ]
            });


	    });

        //Team Member adding task report 
        $("#dailytask").on('click',()=>{         
            $.ajax({
                url:"<?php echo base_url();?>/index.php/daily_task_insert",
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
                            if(data.tm_task_status_error != '')
                            {
                            $('#tm_task_status_error').html(data.tm_task_status_error);
                            }
                            else
                            {
                            $('#tm_task_status_error').html('');
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
</body>

</html>
   