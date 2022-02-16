<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//login
// $route['master_admin_login'] = 'Welcome/admin';
$route['admin'] = 'Welcome/index';
$route['index.php/check_login'] = 'Welcome/check_login';
$route['logout'] = 'Welcome/logout';
$route['myprofile'] = 'Welcome/myprofile';
$route['password'] = 'Welcome/password';
$route['index.php/password_change'] = 'Welcome/password_change';
$route['chart'] = 'Welcome/chart';
$route['index.php/get_all_dept_bar_chart'] = 'Welcome/get_all_dept_bar_chart';

//pages
$route['dashboard'] = 'Welcome/dashboard';
$route['users'] = 'Welcome/users';
$route['dept'] = 'Welcome/dept';
$route['admin-ops'] = 'Welcome/admin_ops';
$route['project'] = 'Welcome/project';
$route['task'] = 'Welcome/task';
$route['addtask'] = 'Welcome/addtask';
$route['addproject'] = 'Welcome/addproject';
$route['client'] = 'Welcome/client';
$route['project-report'] = 'Welcome/project_report';
$route['add-operation-login'] = 'Welcome/add_operation_login';

//user page
$route['adduser'] = 'Welcome/adduser';
$route['index.php/user_insert'] = 'Welcome/user_insert';
$route['index.php/user_report_data'] = 'Welcome/user_report_data';
$route['index.php/user_update'] = 'Welcome/user_update';
$route['index.php/user_delete'] = 'Welcome/user_delete';
$route['index.php/user_active'] = 'Welcome/user_active';
$route['index.php/user_deactive'] = 'Welcome/user_deactive';
$route['index.php/myprofile_user_form'] = 'Welcome/myprofile_user_form';
$route['index.php/user_tm_sel_opt'] = 'Welcome/user_tm_sel_opt';
$route['index.php/user_tl_sel_opt'] = 'Welcome/user_tl_sel_opt';
$route['index.php/un_selected_user_tm_opt'] = 'Welcome/un_selected_user_tm_opt';
$route['index.php/delete_old_tl_list_user'] = 'Welcome/delete_old_tl_list_user';
$route['index.php/check_empid_user_tb'] = 'Welcome/check_empid_user_tb';

//dept page
$route['index.php/dept_insert'] = 'Welcome/dept_insert';
$route['dept_table_show'] = 'Welcome/dept_table_show';
$route['index.php/dept_update'] = 'Welcome/dept_update';
$route['index.php/dept_delete'] = 'Welcome/dept_delete';
$route['index.php/dept_active'] = 'Welcome/dept_active';
$route['index.php/dept_deactive'] = 'Welcome/dept_deactive';
$route['index.php/dept_report_data'] = 'Welcome/dept_report_data';

//Admin dept page
$route['index.php/admin_ops_insert'] = 'Welcome/admin_ops_insert';
$route['admin_ops_table_show'] = 'Welcome/admin_ops_table_show';
$route['index.php/admin_ops_update'] = 'Welcome/admin_ops_update';
$route['index.php/admin_ops_delete'] = 'Welcome/admin_ops_delete';
$route['index.php/admin_ops_active'] = 'Welcome/admin_ops_active';
$route['index.php/admin_ops_deactive'] = 'Welcome/admin_ops_deactive';
$route['index.php/admin_ops_login_report_data'] = 'Welcome/admin_ops_login_report_data';
$route['index.php/admin_ops_report_data'] = 'Welcome/admin_ops_report_data';
$route['index.php/check_ops_head_empid_user_tb'] = 'Welcome/check_ops_head_empid_user_tb';

//client page
$route['index.php/client_insert'] = 'Welcome/client_insert';
$route['index.php/client_report_data'] = 'Welcome/client_report_data';
$route['index.php/client_update'] = 'Welcome/client_update';
$route['index.php/client_delete'] = 'Welcome/client_delete';
$route['index.php/client_active'] = 'Welcome/client_active';
$route['index.php/client_deactive'] = 'Welcome/client_deactive';
$route['index.php/check_client_id_user_tb'] = 'Welcome/check_client_id_user_tb';
$route['index.php/check_client_name_user_tb'] = 'Welcome/check_client_name_user_tb';
$route['index.php/check_client_email_user_tb'] = 'Welcome/check_client_email_user_tb';
$route['index.php/check_client_mob_user_tb'] = 'Welcome/check_client_mob_user_tb';

//project page
$route['project_upload'] = 'Welcome/project_upload';
$route['index.php/project_report_data'] = 'Welcome/project_report_data';
$route['index.php/project_form_insert'] = 'Welcome/project_form_insert';
$route['index.php/get_uploaded_file_project'] = 'Welcome/get_uploaded_file_project';
$route['index.php/edit_project_form'] = 'Welcome/edit_project_form';
$route['index.php/file_uploaded_img_delete'] = 'Welcome/file_uploaded_img_delete';
$route['index.php/project_delete'] = 'Welcome/project_delete';
$route['index.php/check_prt_name_project_tb'] = 'Welcome/check_prt_name_project_tb';
$route['index.php/project_active'] = 'Welcome/project_active';
$route['index.php/project_deactive'] = 'Welcome/project_deactive';
$route['index.php/project_st_tl'] = 'Welcome/project_st_tl';
$route['index.php/assigned_tm_list'] = 'Welcome/assigned_tm_list';
$route['index.php/select_dept_div_opt'] = 'Welcome/select_dept_div_opt';
$route['project_task/(:any)'] = 'Welcome/project_task/$1';
$route['index.php/project_team_member_option'] = 'Welcome/project_team_member_option';
$route['index.php/prtpg_team_member_option'] = 'Welcome/prtpg_team_member_option';
$route['index.php/prtpg_team_member_option_edit'] = 'Welcome/prtpg_team_member_option_edit';
$route['index.php/project_pg_task_insert'] = 'Welcome/project_pg_task_insert';
$route['index.php/view_task_report_data_prtpg'] = 'Welcome/view_task_report_data_prtpg';
$route['index.php/get_task_datas_project/(:any)'] = 'Welcome/get_task_datas_project/$1';
$route['index.php/get_task_remark/(:any)'] = 'Welcome/get_task_remark/$1';
// $route['get_task_remark'] = 'Welcome/get_task_remark';
$route['viewTask/(:any)'] = 'Welcome/viewTask/$1';
$route['index.php/get_uploaded_file_task'] = 'Welcome/get_uploaded_file_task';
$route['index.php/edit_task_form'] = 'Welcome/edit_task_form';
$route['index.php/task_delete'] = 'Welcome/task_delete';
$route['index.php/daily_task_update'] = 'Welcome/daily_task_update';
$route['index.php/daily_task_delete'] = 'Welcome/daily_task_delete';
$route['index.php/project_tl_list_edit_option'] = 'Welcome/project_tl_list_edit_option';


//Project report
$route['index.php/project_report_data_menulist'] = 'Welcome/project_report_data_menulist';


//Add ops login
$route['index.php/add_operation_login_form_insert'] = 'Welcome/add_operation_login_form_insert';
$route['index.php/head_ops_login_update'] = 'Welcome/head_ops_login_update';

// Task page
$route['test'] = 'Welcome/test';
$route['task_insert'] = 'Welcome/task_insert';
$route['task_report_data'] = 'Welcome/task_report_data';
$route['task_active'] = 'Welcome/task_active';
$route['task_deactive'] = 'Welcome/task_deactive';
$route['task_st_tl'] = 'Welcome/task_st_tl';
$route['task_tm_list'] = 'Welcome/task_tm_list';
$route['task_update'] = 'Welcome/task_update';
// $route['get_uploaded_file_task'] = 'Welcome/get_uploaded_file_task';
$route['edit_task_form'] = 'Welcome/edit_task_form';
$route['index.php/daily_task_insert'] = 'Welcome/daily_task_insert';
$route['dailytask/(:any)'] = 'Welcome/dailytask/$1';
// $route['dailytask/(:any)'] = 'Welcome/dailytask/$1';
// $route['dailytask'] = 'Welcome/dailytask';
$route['index.php/view_comment_report_data'] = 'Welcome/view_comment_report_data';
