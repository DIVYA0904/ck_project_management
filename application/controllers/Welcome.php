<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
		$this->load->library('form_validation');
		//Load CK_modelmodel
		// $this->load->model('Ck_model');
    }

	public function index()
	{				
		$this->load->view('login');
	}			

	public function check_login()
	{		
		//Get input data form login form
		$emp_id = $this->input->post('emp_id', TRUE);
		$role_type = $this->input->post('role_type', TRUE);
		$emp_pass = md5($this->input->post('emp_pass', TRUE));
	
		if($role_type == "Team Leader"){
			//Send the login id and password to ck_model
			$this->load->model('Testing_model');
			$check_login = $this->Testing_model->checkLoginTeamLeader($emp_id, $emp_pass, $role_type);

			if($check_login){
				foreach($check_login as $data)
				{
					$emp_id = $data['emp_id'];
					$emp_name = $data['emp_name'];
					$emp_mobile = $data['emp_mob'];
					$status = $data['status'];
					$role = "Team Leader";
					$emp_email = $data['emp_email'];
					$emp_des = $data['emp_des'];
					$emp_teammb = $data['emp_teammb'];
					$emp_keyskill = $data['emp_keyskill'];
					$created_on = $data['created_on'];
					$ops_id = $data['ops_id'];
					$ops_name = $data['ops_name'];
		
				}
		
				$sesdata1 = array(
					'emp_id' => $emp_id,
					'emp_name' => $emp_name,
					'emp_mobile' => $emp_mobile,
					'status' => $status,
					'role' => $role,
					'emp_email' => $emp_email,
					'emp_des' => $emp_des,
					'emp_teammb' => $emp_teammb,
					'emp_keyskill' => $emp_keyskill,
					'created_on' => $created_on,
					'ops_name' => $ops_name,
					'ops_id' => $ops_id,
				);
		
				$this->session->set_userdata($sesdata1);
				// $this->session->set_flashdata('msg', 'Please Enter A Valid Data!');

				if($role == 'Admin'){
					$data = array('res' => "Admin");
				}elseif($role == "Operations Head"){
					$data = array('res' => "Operations Head");
				}elseif($role == "Team Leader"){
					$data = array('res' => "Team Leader");
				}elseif($role == "Team Member"){
					$data = array('res' => "Team Member");
				}elseif($role == "Client"){
					$data = array('res' => "Client");
				}
			}
			else{
				$data['error'] = true;
				// $output['message'] = 'Login Invalid. User not found';
				$data = array('error' => "no");

			}
		}elseif($role_type == "Team Member"){
			//Send the login id and password to ck_model
			$this->load->model('Testing_model');
			$check_login = $this->Testing_model->checkLoginTeamMember($emp_id, $emp_pass, $role_type);

			if($check_login){
				foreach($check_login as $data)
				{
					$emp_id = $data['emp_id'];
					$emp_name = $data['emp_name'];
					$emp_mobile = $data['emp_mob'];
					$status = $data['status'];
					$role = "Team Member";
					$emp_email = $data['emp_email'];
					$emp_des = $data['emp_des'];
					$emp_teammb = $data['emp_teammb'];
					$emp_keyskill = $data['emp_keyskill'];
					$created_on = $data['created_on'];
					$ops_id = $data['ops_id'];
					$ops_name = $data['ops_name'];
		
				}
		
				$sesdata1 = array(
					'emp_id' => $emp_id,
					'emp_name' => $emp_name,
					'emp_mobile' => $emp_mobile,
					'status' => $status,
					'role' => $role,
					'emp_email' => $emp_email,
					'emp_des' => $emp_des,
					'emp_teammb' => $emp_teammb,
					'emp_keyskill' => $emp_keyskill,
					'created_on' => $created_on,
					'ops_name' => $ops_name,
					'ops_id' => $ops_id,
				);
		
				$this->session->set_userdata($sesdata1);
				// $this->session->set_flashdata('msg', 'Please Enter A Valid Data!');

				if($role == 'Admin'){
					$data = array('res' => "Admin");
				}elseif($role == "Operations Head"){
					$data = array('res' => "Operations Head");
				}elseif($role == "Team Leader"){
					$data = array('res' => "Team Leader");
				}elseif($role == "Team Member"){
					$data = array('res' => "Team Member");
				}elseif($role == "Client"){
					$data = array('res' => "Client");
				}
			}
			else{
				$data['error'] = true;
				// $output['message'] = 'Login Invalid. User not found';
				$data = array('error' => "no");

			}
		}elseif($role_type == "Client"){
			//Send the login id and password to ck_model
			$this->load->model('Testing_model');
			$check_login = $this->Testing_model->checkLoginClient($emp_id, $emp_pass, $role_type);

			if($check_login){
				foreach($check_login as $data)
				{
					$emp_id = $data['emp_id'];
					$emp_name = $data['emp_name'];
					$emp_mobile = $data['emp_mob'];
					$status = $data['status'];
					$role = "Client";
					$emp_email = $data['emp_email'];
					$emp_des = $data['emp_des'];
					$emp_teammb = $data['emp_teammb'];
					$emp_keyskill = $data['emp_keyskill'];
					$created_on = $data['created_on'];
					$ops_id = $data['ops_id'];
					$ops_name = $data['ops_name'];
		
				}
		
				$sesdata1 = array(
					'emp_id' => $emp_id,
					'emp_name' => $emp_name,
					'emp_mobile' => $emp_mobile,
					'status' => $status,
					'role' => $role,
					'emp_email' => $emp_email,
					'emp_des' => $emp_des,
					'emp_teammb' => $emp_teammb,
					'emp_keyskill' => $emp_keyskill,
					'created_on' => $created_on,
					'ops_name' => $ops_name,
					'ops_id' => $ops_id,
				);
		
				$this->session->set_userdata($sesdata1);
				// $this->session->set_flashdata('msg', 'Please Enter A Valid Data!');

				if($role == 'Admin'){
					$data = array('res' => "Admin");
				}elseif($role == "Operations Head"){
					$data = array('res' => "Operations Head");
				}elseif($role == "Team Leader"){
					$data = array('res' => "Team Leader");
				}elseif($role == "Team Member"){
					$data = array('res' => "Team Member");
				}elseif($role == "Client"){
					$data = array('res' => "Client");
				}
			}
			else{
				$data['error'] = true;
				// $output['message'] = 'Login Invalid. User not found';
				$data = array('error' => "no");

			}
		}else{
			//Send the login id and password to ck_model
			$this->load->model('Testing_model');
			$check_login = $this->Testing_model->checkLogin($emp_id, $emp_pass, $role_type);

			if($check_login){
				foreach($check_login as $data)
				{
					$emp_id = $data['emp_id'];
					$emp_name = $data['emp_name'];
					$emp_mobile = $data['emp_mob'];
					$status = $data['status'];
					$role = $data['emp_role'];
					$emp_email = $data['emp_email'];
					$emp_des = $data['emp_des'];
					$emp_teammb = $data['emp_teammb'];
					$emp_keyskill = $data['emp_keyskill'];
					$created_on = $data['created_on'];
					$ops_id = $data['ops_id'];
					$ops_name = $data['ops_name'];
		
				}
		
				$sesdata1 = array(
					'emp_id' => $emp_id,
					'emp_name' => $emp_name,
					'emp_mobile' => $emp_mobile,
					'status' => $status,
					'role' => $role,
					'emp_email' => $emp_email,
					'emp_des' => $emp_des,
					'emp_teammb' => $emp_teammb,
					'emp_keyskill' => $emp_keyskill,
					'created_on' => $created_on,
					'ops_name' => $ops_name,
					'ops_id' => $ops_id,
				);
		
				$this->session->set_userdata($sesdata1);
				// $this->session->set_flashdata('msg', 'Please Enter A Valid Data!');

				if($role == 'Admin'){
					$data = array('res' => "Admin");
				}elseif($role == "Operations Head"){
					$data = array('res' => "Operations Head");
				}elseif($role == "Team Leader"){
					$data = array('res' => "Team Leader");
				}elseif($role == "Team Member"){
					$data = array('res' => "Team Member");
				}elseif($role == "Client"){
					$data = array('res' => "Client");
				}
			}
			else{
				$data['error'] = true;
				// $output['message'] = 'Login Invalid. User not found';
				$data = array('error' => "no");

			}
		}
					
        echo json_encode($data);
		
	}
	
	public function logout()
	{	

		//unset the logged_in session and redirect to login page
		$this->session->unset_userdata('emp_id');
		$this->session->unset_userdata('emp_name');
		$this->session->unset_userdata('emp_mobile');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('emp_email');
		$this->session->unset_userdata('emp_des');
		$this->session->unset_userdata('emp_teammb');
		$this->session->unset_userdata('emp_keyskill');
		$this->session->unset_userdata('created_on');
		$this->session->unset_userdata('ops_id');
		$this->session->unset_userdata('ops_name');

		redirect('index.php/welcome/index');	
	}

	public function password()
	{
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			$this->load->view('password');
		} else {
            redirect("index.php/welcome/index");
        }

	}	

	public function password_change()
	{			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		if($this->form_validation->run())
		{
			$emp_id = $this->input->post('emp_id');
			$password = $this->input->post('password');
			$emp_pass = md5($password);			

			$this->load->model('Testing_model');
			$data = $this->Testing_model->updatePass($emp_id, $emp_pass);	
			// $this->session->set_flashdata('msg', 'Successfully data deleted value!');

		}
		else
		{
			$data = array(
				'error'   => true,
				'password_error_edit' => form_error('password'),
				'confirm_password_error_edit' => form_error('confirm_password'),				
			);
		}

		echo json_encode($data);

	}

	public function myprofile()
	{				
		$this->load->view('myprofile');
	}		

	
	/********************************************************
	 DASHBOARD PAGE
	********************************************************/

	public function dashboard()
	{			
		$role_type = $this->session->userdata('role');
		// print_r($role_type);die();
		if(!empty($role_type)){
			if ($role_type == "Admin") {            						
				$this->load->model('Testing_model');
				//dashboard
				$data['admin_dept_count'] = $this->Testing_model->fetch_admin_dept_count();			
				//Dept 
				$data['dept'] = $this->Testing_model->fetch_dept_name();
				
				$this->load->view('dashboard', $data);

			}elseif($role_type == "Operations Head"){
				$this->load->model('Testing_model');
				//dashboard
				$data['user_count'] = $this->Testing_model->fetch_user_count();
				$data['project_count'] = $this->Testing_model->fetch_project_count();
				$data['task_count'] = $this->Testing_model->fetch_task_count();
				//project status
				$data['pending_count'] = $this->Testing_model->fetch_pending_count();
				$data['in_progress_count'] = $this->Testing_model->fetch_in_progress_count();
				$data['demo_pending_count'] = $this->Testing_model->fetch_demo_pending_count();
				$data['input_pending_count'] = $this->Testing_model->fetch_input_pending_count();
				$data['feedback_pending__count'] = $this->Testing_model->fetch_feedback_pending_count();
				$data['under_testing_count'] = $this->Testing_model->fetch_under_testing_count();
				$data['completed_count'] = $this->Testing_model->fetch_completed_count();
				//Dept 
				$data['dept'] = $this->Testing_model->fetch_dept_name();
				
				$this->load->view('dashboard', $data); 

			}elseif($role_type == "Team Leader"){
				$this->load->model('Testing_model');
				//dashboard
				$data['team_member_count'] = $this->Testing_model->fetch_team_member_count();
				$data['tl_project_count'] = $this->Testing_model->fetch_tl_project_count();
				$data['tl_task_count'] = $this->Testing_model->fetch_tl_task_count();
				//project status
				$data['pending_count'] = $this->Testing_model->fetch_tl_pending_count();
				$data['in_progress_count'] = $this->Testing_model->fetch_tl_in_progress_count();
				$data['demo_pending_count'] = $this->Testing_model->fetch_tl_demo_pending_count();
				$data['input_pending_count'] = $this->Testing_model->fetch_tl_input_pending_count();
				$data['feedback_pending__count'] = $this->Testing_model->fetch_tl_feedback_pending_count();
				$data['under_testing_count'] = $this->Testing_model->fetch_tl_under_testing_count();
				$data['completed_count'] = $this->Testing_model->fetch_tl_completed_count();
				//Dept 
				$data['dept'] = $this->Testing_model->fetch_dept_name();
		
				$this->load->view('dashboard', $data); 
			
	
			}elseif($role_type == "Team Member"){
				$this->load->model('Testing_model');
				//dashboard
				$data['tm_project_count'] = $this->Testing_model->fetch_tm_project_count();
				$data['tm_task_count'] = $this->Testing_model->fetch_tm_task_count();
				//project status
				$data['pending_count'] = $this->Testing_model->fetch_tm_pending_count();
				$data['in_progress_count'] = $this->Testing_model->fetch_tm_in_progress_count();
				$data['demo_pending_count'] = $this->Testing_model->fetch_tm_demo_pending_count();
				$data['input_pending_count'] = $this->Testing_model->fetch_tm_input_pending_count();
				$data['feedback_pending__count'] = $this->Testing_model->fetch_tm_feedback_pending_count();
				$data['under_testing_count'] = $this->Testing_model->fetch_tm_under_testing_count();
				$data['completed_count'] = $this->Testing_model->fetch_tm_completed_count();
				//Dept 
				$data['dept'] = $this->Testing_model->fetch_dept_name();
		
				$this->load->view('dashboard', $data); 
			
			}elseif($role_type == "Client"){
				$this->load->model('Testing_model');
				//dashboard
				$data['client_project_count'] = $this->Testing_model->fetch_client_project_count();
				// $data['client_task_count'] = $this->Testing_model->fetch_client_task_count();
				//project status
				$data['pending_count'] = $this->Testing_model->fetch_client_pending_count();
				$data['in_progress_count'] = $this->Testing_model->fetch_client_in_progress_count();
				$data['demo_pending_count'] = $this->Testing_model->fetch_client_demo_pending_count();
				$data['input_pending_count'] = $this->Testing_model->fetch_client_input_pending_count();
				$data['feedback_pending__count'] = $this->Testing_model->fetch_client_feedback_pending_count();
				$data['under_testing_count'] = $this->Testing_model->fetch_client_under_testing_count();
				$data['completed_count'] = $this->Testing_model->fetch_client_completed_count();
				//Dept 
				$data['dept'] = $this->Testing_model->fetch_client_login_dept_name();
				// print_r($data['dept']);die();
				$this->load->view('dashboard', $data); 
			
			}
		}		
		else{        
			redirect("index.php/welcome/index");        
		}		  			
	}	
	public function test()
	{
		// $this->load->model('Testing_model');	
		// $month ="2022-01";
		// $datadep = $this->Testing_model->fetch_client_chart_dept_list_overall_count($month);		
		// print_r($datadep);die();
		$this->load->view('chart'); 

	}

	public function add_operation_login()
	{
		$this->load->model('Testing_model');		
		$data['ops_name'] = $this->Testing_model->fetch_admin_ops_name();
		$this->load->view('add_operation_login', $data); 	

	}

	public function get_all_dept_bar_chart()
	{
		$role_type = $this->session->userdata('role');

		if($role_type == "Operations Head"){

			$month = $this->input->post('month', TRUE);
			$dept = $this->input->post('dept_list', TRUE);        			
	
			$this->load->model('Testing_model');
			// $data['user_count'] = $this->Testing_model->fetch_all_dept_bar_chart($month);
			
			if($dept == "Department"){
				$barchart = $this->Testing_model->fetch_head_chart_dept_list_overall_count($month);
				// print_r("all dept");die();     
			}else{
				$barchart = $this->Testing_model->fetch_head_chart_dept_filter_list_count($month, $dept);
				// print_r(" filter");die();
			}
						
		}elseif($role_type == "Team Leader"){

			$month = $this->input->post('month', TRUE);
			$dept = $this->input->post('dept_list', TRUE);        			
	
			$this->load->model('Testing_model');
			// $data['user_count'] = $this->Testing_model->fetch_all_dept_bar_chart($month);
			
			if($dept == "Department"){
				$barchart = $this->Testing_model->fetch_tl_chart_dept_list_overall_count($month);
				// print_r("all dept");die();     
			}else{
				$barchart = $this->Testing_model->fetch_tl_chart_dept_filter_list_count($month, $dept);
				// print_r(" filter");die();
			}
						
		}elseif($role_type == "Team Member"){

			$month = $this->input->post('month', TRUE);
			$dept = $this->input->post('dept_list', TRUE);        			
	
			$this->load->model('Testing_model');
			// $data['user_count'] = $this->Testing_model->fetch_all_dept_bar_chart($month);
			
			if($dept == "Department"){
				$barchart = $this->Testing_model->fetch_tm_chart_dept_list_overall_count($month);
				// print_r("all dept");die();     
			}else{
				$barchart = $this->Testing_model->fetch_tm_chart_dept_filter_list_count($month, $dept);
				// print_r(" filter");die();
			}
						
		}elseif($role_type == "Client"){

			$month = $this->input->post('month', TRUE);
			$dept = $this->input->post('dept_list', TRUE);        			
	
			$this->load->model('Testing_model');
			// $data['user_count'] = $this->Testing_model->fetch_all_dept_bar_chart($month);
			
			if($dept == "Department"){
				$barchart = $this->Testing_model->fetch_client_chart_dept_list_overall_count($month);
				// print_r("all dept");die();     
			}else{
				$barchart = $this->Testing_model->fetch_client_chart_dept_filter_list_count($month, $dept);
				// print_r(" filter");die();
			}
						
		}
		
		// print_r($barchart);
		// die();

		echo json_encode($barchart);
	}

	/********************************************************
	 USER PAGE
	********************************************************/

	public function users()
	{	
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->model('Testing_model');
			$data['emp_name'] = $this->Testing_model->fetch_tm_usertb();							
			$this->load->view('users', $data);

		} else {
            redirect("index.php/welcome/index");
        }
		
	}
	
	public function adduser()
    {
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->model('Testing_model');
			$data['emp_name'] = $this->Testing_model->fetch_tm_usertb();
			// echo json_encode($data);
			$this->load->view('adduser', $data);

		} else {
            redirect("index.php/welcome/index");
        }
		         
    }    
	
	public function check_empid_user_tb(){

		$emp_id = $this->input->post('emp_id');
		$this->load->model('Testing_model');
		$num_results = $this->Testing_model->checkAdminEmpid($emp_id);
		
		if(0 < $num_results){	
			
			//Already entered		
			$num_results = $this->Testing_model->check_user_empid_role_type($emp_id);
			// print_r($num_results);die();
			
			if(0 < $num_results){	
				//Not Client
				$data = array('res_error' => "Already Entered");			
			}else{
				//Client 
				$data = array('success' => "Success");
			}

		}else{	
			//Not entered				
			$data = array('success' => "Success");
		}
		echo json_encode($data);
	}

	public function un_selected_user_tm_opt()
    {		
		$emp_role = $this->input->post('role', TRUE);
		if($emp_role == "Team Leader"){
			$this->load->model('Testing_model');
			$data = $this->Testing_model->fetch_un_selected_tm_usertb();
			// print_r($data);die();

		}
		
		echo json_encode($data);				         
    }    

	public function delete_old_tl_list_user()
    {		
		$emp_id = $this->input->post('emp_id', TRUE);
		if($emp_id){
			$this->load->model('Testing_model');
			$data = $this->Testing_model->delete_old_tm_list($emp_id);
		}
		
		echo json_encode($data);				         
    }    

	public function user_insert()
	{				
		
		//Get input data form login form
		
		$emp_role = $this->input->post('emp_role', TRUE);
		
		// if($emp_role == "Operations Head"){

		// 	$this->load->library('form_validation');
		// 	$this->form_validation->set_rules('emp_id', 'ID', 'required|integer|is_unique[users.emp_id]');
		// 	$this->form_validation->set_rules('emp_name', 'Name', 'required');
		// 	// $this->form_validation->set_rules('client_mob', 'No', 'required|numeric|trim|is_unique[users.client_mob]|max_length[10]');
		// 	$this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email|trim|is_unique[users.emp_email]');
		// 	$this->form_validation->set_rules('emp_mob', 'Mobile No', 'required|numeric|trim|is_unique[users.emp_mob]|regex_match[/^[0-9]{10}$/]');
		// 	$this->form_validation->set_rules('emp_des', 'Description', 'required');
		// 	$this->form_validation->set_rules('emp_keyskill', 'Key Skill', 'required');

		// 	if($this->form_validation->run())
		// 	{				
		// 		$emp_id = $this->input->post('emp_id', TRUE);
		// 		$emp_name = $this->input->post('emp_name', TRUE);
		// 		$emp_email = $this->input->post('emp_email', TRUE);
		// 		$emp_mob = $this->input->post('emp_mob', TRUE);
		// 		$emp_des = $this->input->post('emp_des', TRUE);
		// 		$emp_keyskill = $this->input->post('emp_keyskill', TRUE);
				
		// 		$password = "123456";
		// 		$emp_pass = md5($password);

		// 		$login_id = $this->session->userdata('emp_id'); //login user name

		// 		//Get Ops name and id


		// 		$data = array(
		// 			'emp_id' => $emp_id,
		// 			'emp_name' => $emp_name,
		// 			'emp_email' => $emp_email,
		// 			'emp_mob' => $emp_mob,
		// 			'emp_des' => $emp_des,
		// 			'emp_role' => $emp_role,
		// 			'emp_keyskill' => $emp_keyskill,
		// 			'emp_pass' => $emp_pass,
		// 			'emp_teammb' => "",
		// 			'status' => "1",
		// 			"tm_status" => "",
		// 			"created_by" => $login_id
		// 		);

		// 		$this->load->model('Testing_model');
		// 		$data = $this->Testing_model->insertUser($data);
		// 		$this->session->set_flashdata('msg', 'Data Inserted Successfully!');

		// 	}
		// 	else
		// 	{
		// 		$data = array(
		// 			'error'   => true,
		// 			'emp_id_error' => form_error('emp_id'),
		// 			'emp_name_error' => form_error('emp_name'),
		// 			'emp_email_error' => form_error('emp_email'),
		// 			'emp_mob_error' => form_error('emp_mob'),
		// 			'emp_des_error' => form_error('emp_des'),
		// 			'emp_keyskill_error' => form_error('emp_keyskill'),
		// 		);
		// 	}
			

		// }else
		if($emp_role == "Team Leader"){

			$this->load->library('form_validation');
			// $this->form_validation->set_rules('emp_id', 'ID', 'required|integer|is_unique[users.emp_id]');
			$this->form_validation->set_rules('emp_name', 'Name', 'required');
			// $this->form_validation->set_rules('client_mob', 'No', 'required|numeric|trim|is_unique[users.client_mob]|max_length[10]');
			$this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email|trim');
			// $this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email|trim|is_unique[users.emp_email]');
			$this->form_validation->set_rules('emp_mob', 'Mobile No', 'required|numeric|trim|max_length[10]|min_length[10]');
			// $this->form_validation->set_rules('emp_mob', 'Mobile No', 'required|numeric|trim|max_length[10]|min_length[10]|is_unique[users.emp_mob]');
			$this->form_validation->set_rules('emp_des', 'Description', 'required');
			$this->form_validation->set_rules('emp_keyskill', 'Key Skill', 'required');

			if($this->form_validation->run())
			{
				$emp_id = $this->input->post('emp_id', TRUE);
				$this->load->model('Testing_model');
				$num_results = $this->Testing_model->checkAdminEmpid($emp_id);
				
				if(0 < $num_results){	
					//Already Entered (Update Query using) (Avoid password beacuse already entered  and created by) 

					$emp_name = $this->input->post('emp_name', TRUE);
					$emp_email = $this->input->post('emp_email', TRUE);
					$emp_mob = $this->input->post('emp_mob', TRUE);
					$emp_des = $this->input->post('emp_des', TRUE);			
					$emp_keyskill = $this->input->post('emp_keyskill', TRUE);	

					if($this->input->post('emp_teammb')){
						$emp_teammb = implode(',',$this->input->post('emp_teammb'));				
						$size_arr = $this->input->post('emp_teammb');
		
						foreach($size_arr as $teammb_arr){
							$this->load->model('Testing_model');
							$data = $this->Testing_model->userteammbStatus($teammb_arr,$emp_id);	
						}
					}else{
						$emp_teammb = "";
					}
					
					//get ops head details
					// $login_id = $this->session->userdata('emp_id'); //login user name
					$ops_id = $this->session->userdata('ops_id'); //OPs id
					// print_r($ops_id);die();
					$ops_name = $this->session->userdata('ops_name'); //ops name

					$data = array(
						'emp_id' => $emp_id,
						'emp_name' => $emp_name,
						'emp_email' => $emp_email,
						'emp_mob' => $emp_mob,
						'emp_des' => $emp_des,
						'emp_role' => $emp_role,
						'tl_role_type' => "1",
						'emp_teammb' => $emp_teammb,
						'emp_keyskill' => $emp_keyskill,
						// 'emp_pass' => $emp_pass,
						'ops_id' => $ops_id,
						'ops_name' => $ops_name,
						'status' => "1",
						"tm_status" => "0",
						// "created_by" => $login_id
					);

					$this->load->model('Testing_model');
					$data = $this->Testing_model->update_user_tb_to_tl($data);
					$this->session->set_flashdata('msg', 'Data Inserted Successfully!');
				}
				else{
					//New Entry (Insert query)
	
					$this->load->library('form_validation');
					$this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email|trim|is_unique[users.emp_email]');
					$this->form_validation->set_rules('emp_mob', 'Mobile No', 'required|numeric|trim|max_length[10]|min_length[10]|is_unique[users.emp_mob]');
					
					if($this->form_validation->run())
					{
						$emp_name = $this->input->post('emp_name', TRUE);
						$emp_email = $this->input->post('emp_email', TRUE);
						$emp_mob = $this->input->post('emp_mob', TRUE);
						$emp_des = $this->input->post('emp_des', TRUE);			
						$emp_keyskill = $this->input->post('emp_keyskill', TRUE);	

						if($this->input->post('emp_teammb')){
							$emp_teammb = implode(',',$this->input->post('emp_teammb'));				
							$size_arr = $this->input->post('emp_teammb');
			
							// if(!empty($size_arr) && isset($size_arr) && $data['emp_role'] == "teamleader"){
							foreach($size_arr as $teammb_arr){
								$this->load->model('Testing_model');
								$data = $this->Testing_model->userteammbStatus($teammb_arr,$emp_id);	
							}
						}else{
							$emp_teammb = "";
						}
						
						// }
						
						$password = "123456";
						$emp_pass = md5($password);

						//get ops head details
						$login_id = $this->session->userdata('emp_id'); //login user name
						$ops_id = $this->session->userdata('ops_id'); //OPs id
						// print_r($ops_id);die();
						$ops_name = $this->session->userdata('ops_name'); //ops name

						$data = array(
							'emp_id' => $emp_id,
							'emp_name' => $emp_name,
							'emp_email' => $emp_email,
							'emp_mob' => $emp_mob,
							'emp_des' => $emp_des,
							'emp_role' => $emp_role,
							'tl_role_type' => "1",
							'emp_teammb' => $emp_teammb,
							'emp_keyskill' => $emp_keyskill,
							'emp_pass' => $emp_pass,
							'ops_id' => $ops_id,
							'ops_name' => $ops_name,
							'status' => "1",
							"tm_status" => "0",
							"created_by" => $login_id
						);

						$this->load->model('Testing_model');
						$data = $this->Testing_model->insertUser($data);
						$this->session->set_flashdata('msg', 'Data Inserted Successfully!');
					}
					else
					{
						$data = array(
							'error'   => true,
							'emp_email_error' => form_error('emp_email'),
							'emp_mob_error' => form_error('emp_mob'),
						);
					}
				}

			}
			else
			{
				$data = array(
					'error'   => true,
					'emp_id_error' => form_error('emp_id'),
					'emp_name_error' => form_error('emp_name'),
					'emp_email_error' => form_error('emp_email'),
					'emp_mob_error' => form_error('emp_mob'),
					'emp_des_error' => form_error('emp_des'),
					'emp_keyskill_error' => form_error('emp_keyskill'),
				);
			}			

		}elseif($emp_role == "Team Member"){

			$this->load->library('form_validation');
			// $this->form_validation->set_rules('emp_id', 'ID', 'required|integer|is_unique[users.emp_id]');
			$this->form_validation->set_rules('emp_name', 'Name', 'required');
			// $this->form_validation->set_rules('client_mob', 'No', 'required|numeric|trim|is_unique[users.client_mob]|max_length[10]');
			$this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email|trim');
			$this->form_validation->set_rules('emp_mob', 'Mobile No', 'required|numeric|trim|max_length[10]|min_length[10]');
			$this->form_validation->set_rules('emp_des', 'Description', 'required');
			$this->form_validation->set_rules('emp_keyskill', 'Key Skill', 'required');

			if($this->form_validation->run())
			{				
				$emp_id = $this->input->post('emp_id', TRUE);
				$this->load->model('Testing_model');
				$num_results = $this->Testing_model->checkAdminEmpid($emp_id);
				
				if(0 < $num_results){	
					//Already Entered (Update Query using) (Avoid password beacuse already entered and created by) 
					$emp_name = $this->input->post('emp_name', TRUE);
					$emp_email = $this->input->post('emp_email', TRUE);
					$emp_mob = $this->input->post('emp_mob', TRUE);
					$emp_des = $this->input->post('emp_des', TRUE);
					$emp_keyskill = $this->input->post('emp_keyskill', TRUE);
					// $login_id = $this->session->userdata('emp_id'); //login user name
					$ops_id = $this->session->userdata('ops_id'); //OPs id
					// print_r($ops_id);die();
					$ops_name = $this->session->userdata('ops_name'); //ops name

					$data = array(
						'emp_id' => $emp_id,
						'emp_name' => $emp_name,
						'emp_email' => $emp_email,
						'emp_mob' => $emp_mob,
						'emp_des' => $emp_des,
						'emp_role' => $emp_role,
						'tm_role_type' => "1",
						'emp_keyskill' => $emp_keyskill,
						// 'emp_pass' => $emp_pass,
						'ops_id' => $ops_id,
						'ops_name' => $ops_name,
						'emp_teammb' => "",
						'status' => "1",
						// "created_by" => $login_id,
						"tm_status" => "0"
					);

					$this->load->model('Testing_model');
					$data = $this->Testing_model->update_user_tb_to_tm($data);
					$this->session->set_flashdata('msg', 'Data Inserted Successfully!');
				}
				else{
					//New Entry (Insert query)	
					
					$this->load->library('form_validation');
					$this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email|trim|is_unique[users.emp_email]');
					$this->form_validation->set_rules('emp_mob', 'Mobile No', 'required|numeric|trim|max_length[10]|min_length[10]|is_unique[users.emp_mob]');
					
					if($this->form_validation->run())
					{
						$emp_name = $this->input->post('emp_name', TRUE);
						$emp_email = $this->input->post('emp_email', TRUE);
						$emp_mob = $this->input->post('emp_mob', TRUE);
						$emp_des = $this->input->post('emp_des', TRUE);
						$emp_keyskill = $this->input->post('emp_keyskill', TRUE);

						$password = "123456";
						$emp_pass = md5($password);
						
						$login_id = $this->session->userdata('emp_id'); //login user name
						$ops_id = $this->session->userdata('ops_id'); //OPs id
						// print_r($ops_id);die();
						$ops_name = $this->session->userdata('ops_name'); //ops name

						$data = array(
							'emp_id' => $emp_id,
							'emp_name' => $emp_name,
							'emp_email' => $emp_email,
							'emp_mob' => $emp_mob,
							'emp_des' => $emp_des,
							'emp_role' => $emp_role,
							'tm_role_type' => "1",
							'emp_keyskill' => $emp_keyskill,
							'emp_pass' => $emp_pass,
							'ops_id' => $ops_id,
							'ops_name' => $ops_name,
							'emp_teammb' => "",
							'status' => "1",
							"created_by" => $login_id,
							"tm_status" => "0"
						);

						$this->load->model('Testing_model');
						$data = $this->Testing_model->insertUser($data);
						$this->session->set_flashdata('msg', 'Data Inserted Successfully!');
					}
					else
					{
						$data = array(
							'error'   => true,
							'emp_email_error' => form_error('emp_email'),
							'emp_mob_error' => form_error('emp_mob'),
						);
					}
				}

			}
			else
			{
				$data = array(
					'error'   => true,
					'emp_id_error' => form_error('emp_id'),
					'emp_name_error' => form_error('emp_name'),
					'emp_email_error' => form_error('emp_email'),
					'emp_mob_error' => form_error('emp_mob'),
					'emp_des_error' => form_error('emp_des'),
					'emp_keyskill_error' => form_error('emp_keyskill'),
				);
			}		
			
		}					

		echo json_encode($data);

	}

	public function user_update()
	{			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('emp_id', 'ID', 'required|numeric');
		$this->form_validation->set_rules('emp_name', 'Name', 'required');
		// $this->form_validation->set_rules('client_mob', 'No', 'required|numeric|trim|is_unique[users.client_mob]|max_length[10]');
		$this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('emp_mob', 'Mobile No', 'required|numeric|trim|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('emp_des', 'Description', 'required');
		$this->form_validation->set_rules('emp_keyskill', 'Key Skill', 'required');

		if($this->form_validation->run())
		{
			$emp_id = $this->input->post('emp_id');  //tl
			$emp_name = $this->input->post('emp_name');
			$emp_email = $this->input->post('emp_email');
			$emp_mob = $this->input->post('emp_mob');
			$emp_des = $this->input->post('emp_des');
			$emp_keyskill = $this->input->post('emp_keyskill');
			$id = $this->input->post('id');

			$emp_role = $this->input->post('emp_role');

			if($emp_role == "Operations Head"){
								
				if($this->input->post('emp_teammb')){
					// print_r($this->input->post('emp_teammb'));die();
				
					//Add to assigned tm list
					$emp_teammb = implode(',',$this->input->post('emp_teammb', TRUE));
					
					//tm status changes
					$size_arr = $this->input->post('emp_teammb');

					if($size_arr){
						//Delete old tm list to tl
						$this->load->model('Testing_model');
						$data = $this->Testing_model->userteammbStatusUpdate($emp_id);	

						//Add new tm list to tl for tm status
						foreach($size_arr as $teammb_arr){						
							$data = $this->Testing_model->userteammbStatus($teammb_arr,$emp_id);	
						}
					}					
					
				}else{
					$emp_teammb = "";

				}

			}elseif($emp_role == "Team Member"){

				$emp_teammb = "";
				//Remove tl_role_type = "0"
				$this->load->model('Testing_model');
				$this->Testing_model->user_tl_role_type_inactive($emp_id);	
				// $this->Testing_model->userteammbStatusUpdateLogin($emp_id);	

			}elseif($emp_role == "Team Leader"){

				//Remove tl_role_type = "0"
				$this->load->model('Testing_model');
				$this->Testing_model->user_tm_role_type_inactive($emp_id);

				if($this->input->post('emp_teammb')){
					// print_r($this->input->post('emp_teammb'));die();
				
					//Add to assigned tm list
					$emp_teammb = implode(',',$this->input->post('emp_teammb', TRUE));
					
					//tm status changes
					$size_arr = $this->input->post('emp_teammb');

					if($size_arr){
						//Delete old tm list to tl (or) update tm_status = "0"
						$this->load->model('Testing_model');
						$data = $this->Testing_model->userteammbStatusUpdate($emp_id);	

						//Add new tm list to tl for tm status
						foreach($size_arr as $teammb_arr){						
							$data = $this->Testing_model->userteammbStatus($teammb_arr,$emp_id);	
						}
					}					
					
				}else{
					$emp_teammb = "";

				}

			}

			$this->load->model('Testing_model');
			$data = $this->Testing_model->updateUser($id, $emp_id, $emp_name, $emp_email, $emp_mob, $emp_des, $emp_role, $emp_keyskill, $emp_teammb);	
			$this->session->set_flashdata('msg', 'Data Updated Successfully!');

		}
		else
		{
			$data = array(
				'error'   => true,
				'emp_id_error_edit' => form_error('emp_id'),
				'emp_name_error_edit' => form_error('emp_name'),
				'emp_email_error_edit' => form_error('emp_email'),
				'emp_mob_error_edit' => form_error('emp_mob'),
				'emp_des_error_edit' => form_error('emp_des'),
				'emp_keyskill_error_edit' => form_error('emp_keyskill'),
			);
		}		
		
		echo json_encode($data);

	}

	public function myprofile_user_form()
	{			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('emp_name', 'Name', 'required');
		// $this->form_validation->set_rules('client_mob', 'No', 'required|numeric|trim|is_unique[users.client_mob]|max_length[10]');
		$this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('emp_mob', 'Mobile No', 'required|numeric|trim|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('emp_des', 'Description', 'required');
		$this->form_validation->set_rules('emp_keyskill', 'Key Skill', 'required');

		if($this->form_validation->run())
		{
			$emp_id = $this->input->post('emp_id');
			$emp_name = $this->input->post('emp_name');
			$emp_email = $this->input->post('emp_email');
			$emp_mob = $this->input->post('emp_mob');
			$emp_des = $this->input->post('emp_des');
			$emp_keyskill = $this->input->post('emp_keyskill');

			$this->load->model('Testing_model');
			$data = $this->Testing_model->myprofileupdateUser($emp_id, $emp_name, $emp_email, $emp_mob, $emp_des, $emp_keyskill);	
			$this->session->set_flashdata('msg', 'Data Updated Successfully!');

		}
		else
		{
			$data = array(
				'error'   => true,
				'emp_id_error_edit' => form_error('emp_id'),
				'emp_name_error_edit' => form_error('emp_name'),
				'emp_email_error_edit' => form_error('emp_email'),
				'emp_mob_error_edit' => form_error('emp_mob'),
				'emp_des_error_edit' => form_error('emp_des'),
				'emp_keyskill_error_edit' => form_error('emp_keyskill'),
			);
		}

		echo json_encode($data);

	}
	
	public function user_delete()
	{	
		$id = $this->input->post('id');
		// print_r($id);die();
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deleteUser($id);
        $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
        echo json_encode($data);
	}

	public function user_active()
	{	
		$id = $this->input->post('id');				
		$this->load->model('Testing_model');
		$data = $this->Testing_model->activeUser($id);
        $this->session->set_flashdata('msg', 'Data Activated Successfully!');
        echo json_encode($data);
	}

	public function user_deactive()
	{	
		$id = $this->input->post('id');		
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deactiveUser($id);
        $this->session->set_flashdata('msg', 'Data Deactivated Successfully!');
        echo json_encode($data);
	}

	public function user_report_data(){
        $postData = $this->input->post();
		$this->load->model('Testing_model');		
        $user_result = $this->Testing_model->user_verify_report_data($postData);        
        echo json_encode($user_result);
        
    }
	
	public function user_tm_sel_opt()
	{	
		         
		if ($this->input->post('emp_id')) 
        {			
			if($this->input->post('user_tl') == "Team Leader"){
				$team_leader_id = $this->input->post('emp_id');
				// $project_code = $this->input->post('project_code');
				$this->load->model('Testing_model');
				$data = $this->Testing_model->fetch_tm_userpg_li($team_leader_id);
				// echo '<pre>';print_r($data);die();
				echo json_encode($data);
			}else{
				$data = "";
				echo json_encode($data);
				
			}			

        }		
		
	}

	public function user_tl_sel_opt()
	{	
		         
		if ($this->input->post('emp_id')) 
        {			
			if($this->input->post('user_ops_head') == "Operations Head"){
				// $project_code = $this->input->post('project_code');
				$emp_id = $this->input->post('emp_id');
				$this->load->model('Testing_model');
				$data = $this->Testing_model->fetch_tl_userpg_li($emp_id);
				echo json_encode($data);
			}else{
				$data = "";
				echo json_encode($data);
				
			}			

        }		
		
	}

	/********************************************************
	 DEPARTMENT PAGE
	 ********************************************************/

	public function dept()
	{	
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->view('dept');

		} else {
            redirect("index.php/welcome/index");
        }

	}
	
	public function dept_insert()
	{								
		$this->load->library('form_validation');
		$this->form_validation->set_rules('dept', 'Dept', 'required');
		// $this->form_validation->set_rules('dept', 'Dept', 'required|is_unique[dept.dept]');
						
		if($this->form_validation->run())
		{
			//Get input data form dept form
			$dept = $this->input->post('dept');
            $login_id = $this->session->userdata('emp_id'); //login user name
            $ops_id = $this->session->userdata('ops_id'); //login user name

			if($dept){
				$this->load->model('Testing_model');
				$num_results = $this->Testing_model->checkDept($dept, $ops_id);
         		// print_r($num_results);die();

				if($num_results == "0"){
					
					$insert_dept = array(
						"dept" => $dept,
						"created_by" => $login_id,
						"ops_id" => $ops_id,
						"status" => "1"
					);

					$this->load->model('Testing_model');
					$data = $this->Testing_model->insertDept($insert_dept);

					$this->session->set_flashdata('msg', 'Data Inserted Successfully!');
				}else{
					$data = array('res_error' => "Already Entered");
				}
			}		

		}
		else
		{
			$data = array(
				'error'   => true,
				'dept_error' => form_error('dept'),
			);
		}
		
        echo json_encode($data);
	}	
	
	public function dept_update()
	{				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('dept', 'Dept', 'required|is_unique[dept.dept]');
		
		if($this->form_validation->run())
		{
			//Get input data form dept form
			$dept = $this->input->post('dept');
			$id = $this->input->post('id');

			$this->load->model('Testing_model');
			$data = $this->Testing_model->updateDept($dept, $id);
			$this->session->set_flashdata('msg', 'Data Updated Successfully!');
			
		}
		else
		{
			$data = array(
				'error'   => true,
				'dept_error' => form_error('dept'),
			);
		}
		
		echo json_encode($data);
	}

	public function dept_delete()
	{	
		$id = $this->input->post('id');
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deleteDept($id);
        $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
        echo json_encode($data);
	}

	public function dept_active()
	{	
		$id = $this->input->post('id');				
		$this->load->model('Testing_model');
		$data = $this->Testing_model->activeDept($id);
        $this->session->set_flashdata('msg', 'Data Activated Successfully!');
        echo json_encode($data);
	}

	public function dept_report_data(){
        $postData = $this->input->post();
		$this->load->model('Testing_model');		
        $client_result = $this->Testing_model->dept_verify_report_data($postData);        
        echo json_encode($client_result);
        
    }
	
	public function dept_deactive()
	{	
		$id = $this->input->post('id');		
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deactiveDept($id);
        $this->session->set_flashdata('msg', 'Data Deactivated Successfully!');
        echo json_encode($data);
	}

	public function dept_table_show()
	{								
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deptList();
		echo json_encode($data);
	}		

	
	/********************************************************
	 CLIENT PAGE
	 ********************************************************/

	public function client()
	{			
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->view('client');

		} else {
            redirect("index.php/welcome/index");
        }

	}

	public function clientList(){
     
		// POST data
		$postData = $this->input->post();
   
		// Get data
		$data = $this->Employee_model->getClients($postData);
   
		echo json_encode($data);
	}

	public function check_client_id_user_tb(){
		$client_id = $this->input->post('client_id');
		$this->load->model('Testing_model');
		$num_results = $this->Testing_model->checkClientEmpid($client_id);
		if($num_results > 0){					
			$data = array('res_error' => "Already Entered");
		}else{					
			$data = array('success' => "Success");
		}
		echo json_encode($data);
	}

	public function check_client_name_user_tb(){
		$client_name = $this->input->post('client_name');
		$this->load->model('Testing_model');
		$num_results = $this->Testing_model->checkClientEmpname($client_name);
		if($num_results > 0){					
			$data = array('res_error' => "Already Entered");
		}else{					
			$data = array('success' => "Success");
		}
		echo json_encode($data);
	}
	
	public function check_client_email_user_tb(){
		$client_email = $this->input->post('client_email');
		$this->load->model('Testing_model');
		$num_results = $this->Testing_model->checkClientEmpemail($client_email);
		if($num_results > 0){					
			$data = array('res_error' => "Already Entered");
		}else{					
			$data = array('success' => "Success");
		}
		echo json_encode($data);
	}

	public function check_client_mob_user_tb(){
		$client_mob = $this->input->post('client_mob');
		$this->load->model('Testing_model');
		$num_results = $this->Testing_model->checkClientEmpmob($client_mob);
		if($num_results > 0){					
			$data = array('res_error' => "Already Entered");
		}else{					
			$data = array('success' => "Success");
		}
		echo json_encode($data);
	}

	public function client_insert()
	{							
		$this->load->library('form_validation');

		$this->form_validation->set_rules('client_emp_id', 'Client ID', 'required');
		$this->form_validation->set_rules('client_name', 'Client Name', 'required');
		$this->form_validation->set_rules('client_email', 'Client Email', 'required');
		$this->form_validation->set_rules('client_mob', 'No', 'required|numeric|trim|max_length[10]|min_length[10]');
		// $this->form_validation->set_rules('client_mob', 'Client Mobile No', 'required|integer|trim|max_length[10]|min_length[10]');
		
		// $this->form_validation->set_rules('client_emp_id', 'Client ID', 'required|is_unique[client.client_emp_id]');
		// $this->form_validation->set_rules('client_name', 'Client Name', 'required|is_unique[client.client_name]');
		// $this->form_validation->set_rules('client_email', 'Client Email', 'required|valid_email|trim|is_unique[client.client_email]');
		// // $this->form_validation->set_rules('client_mob', 'No', 'required|numeric|trim|is_unique[users.client_mob]|max_length[10]');
		// $this->form_validation->set_rules('client_mob', 'Client Mobile No', 'required|integer|trim|max_length[10]|min_length[10]|is_unique[client.client_mob]');		

		if($this->form_validation->run())
		{
			// 	//Get input data form dept form
			$client_emp_id = $this->input->post('client_emp_id');
			$client_name = $this->input->post('client_name');
			$client_email = $this->input->post('client_email');
			$client_mob = $this->input->post('client_mob');
            $login_id = $this->session->userdata('emp_id'); //login user name
            $ops_id = $this->session->userdata('ops_id'); //login user name	
            $ops_name = $this->session->userdata('ops_name'); //login user name	
			
			$data = array(
				"client_emp_id" => $client_emp_id,
				"client_name" => $client_name,
				"client_email" => $client_email,
				"client_mob" => $client_mob,
				"created_by" => $login_id,
				"ops_id" => $ops_id,
				"ops_name" => $ops_name,
				// "client_id" => $get_last_client_id,
				"status" => "1"
			);

			$this->load->model('Testing_model');
			$data = $this->Testing_model->insertClient($data);
			// echo json_encode($data);		
			if(!empty($data)){
								
				$this->load->model('Testing_model');
				$num_results = $this->Testing_model->checkUserEmpID($client_emp_id);
				
				if($num_results == "0"){
					$password = "123456";
					$emp_pass = md5($password);

					$login_id = $this->session->userdata('emp_id'); //login user name
					$ops_id = $this->session->userdata('ops_id'); //login user name
					$ops_name = $this->session->userdata('ops_name'); //login user name
					
					$data = array(
						'emp_id' => $client_emp_id,
						'emp_name' => $client_name,
						'emp_email' => $client_email,
						'emp_mob' => $client_mob,
						'emp_des' => "",
						'emp_role' => "Client",
						// 'emp_role' => "",
						'client_role_type' => "1",
						'emp_keyskill' => "",
						'emp_pass' => $emp_pass,
						'emp_teammb' => "",
						'status' => "1",
						"tm_status" => "",
						"created_by" => $login_id,
						"ops_id" => $ops_id,
						"ops_name" => $ops_name
					);
		
					$this->load->model('Testing_model');
					$data = $this->Testing_model->insertUser($data);
				}else{
					// Set Client Role Type "1"
					$this->load->model('Testing_model');
					$data = $this->Testing_model->UpdateUserClientRoleType($client_emp_id);					
				}
				
			}
			$this->session->set_flashdata('msg', 'Data Inserted Successfully!');

		}
		else
		{
			$data = array(
				'error'   => true,
				'client_emp_id_error' => form_error('client_emp_id'),
				'name_error' => form_error('client_name'),
				'email_error' => form_error('client_email'),
				'mob_error' => form_error('client_mob'),
			);
		}

		echo json_encode($data);
					
	}
	
	public function client_report_data(){
        $postData = $this->input->post();
		$this->load->model('Testing_model');		
        $client_result = $this->Testing_model->client_verify_report_data($postData);        
        echo json_encode($client_result);
        
    }

	public function client_update()
	{			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('client_name', 'Name', 'required');
		$this->form_validation->set_rules('client_email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('client_mob', 'No', 'required|numeric|trim|max_length[10]|min_length[10]');
		
		if($this->form_validation->run())
		{
			$client_name = $this->input->post('client_name');
			$client_email = $this->input->post('client_email');
			$client_mob = $this->input->post('client_mob');
			$client_emp_id = $this->input->post('client_emp_id');
			$id = $this->input->post('id');

			$this->load->model('Testing_model');
			$data = $this->Testing_model->updateClient($id, $client_name, $client_email, $client_mob);
			if($data){
				
				$num_results = $this->Testing_model->check_user_empid_role_type($client_emp_id, $client_name, $client_email, $client_mob);	

				if($num_results == "0"){
					$data = $this->Testing_model->updateUserTableClient($client_emp_id, $client_name, $client_email, $client_mob);	
				}
			}	
			$this->session->set_flashdata('msg', 'Data Updated Successfully!');

		}
		else
		{
			$data = array(
				'error'   => true,
				'name_error' => form_error('client_name'),
				'email_error' => form_error('client_email'),
				'mob_error' => form_error('client_mob'),
			);
		}

		echo json_encode($data);

	}

	public function client_delete()
	{	
		$id = $this->input->post('id');
		$client_emp_id = $this->input->post('client_emp_id');
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deleteClient($id);
		if($data){

			$num_results = $this->Testing_model->check_user_empid_role_type($client_emp_id);

			if($num_results == "0"){
				$data = $this->Testing_model->deleteUserTableClient($client_emp_id);
			}

		}
		$this->session->set_flashdata('msg', 'Data Deleted Successfully!');
        echo json_encode($data);
	}

	public function client_active()
	{	
		$id = $this->input->post('id');				
		$this->load->model('Testing_model');
		$data = $this->Testing_model->activeClient($id);
		$this->session->set_flashdata('msg', 'Data Activated Successfully!');
        echo json_encode($data);
	}

	public function client_deactive()
	{	
		$id = $this->input->post('id');		
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deactiveClient($id);
		$this->session->set_flashdata('msg', 'Data Deactivated Successfully!');
        echo json_encode($data);
	}	

	
	/********************************************************
	 PROJECT PAGE
	 ********************************************************/	 
	
	public function project()
	{	
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->model('Testing_model');
			if($this->session->userdata('role') == "Operations Head"){  				
				$data['client_name'] = $this->Testing_model->fetch_client(); //head to get form details from db
				$data['emp_name'] = $this->Testing_model->fetch_user_tl_and_head();
				$data['dept'] = $this->Testing_model->fetch_dept_name();
				// $data['ops_name'] = $this->Testing_model->fetch_ops_list($);
				$this->load->view('project', $data);  
			
			}else if($this->session->userdata('role') == 'Team Leader'){ 
				$data['client_name'] = $this->Testing_model->fetch_client(); //head to get form details from db
				$data['dept'] = $this->Testing_model->fetch_dept_name();
				$data['emp_name'] = $this->Testing_model->fetch_user_tm();	
				$this->load->view('project', $data);  
			}else if($this->session->userdata('role') == 'Team Member'){ 
				$data['client_name'] = $this->Testing_model->fetch_client(); //head to get form details from db
				$data['dept'] = $this->Testing_model->fetch_dept_name();
				$this->load->view('project', $data);  
			}else if($this->session->userdata('role') == 'Client'){ 
				$this->load->model('Testing_model');
				$data['ops_name'] = $this->Testing_model->fetch_cleint_ops_list();
				// $data['ops_name'] = $this->Testing_model->fetch_cleint_ops_list();
				// print_r($data['ops_name']);die();
				$this->load->view('project', $data);  
			}
				 
		} else {
            redirect("index.php/welcome/index");
        }
								
	}

	public function addproject()
	{				
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->model('Testing_model');
			$data['client_name'] = $this->Testing_model->fetch_client();
			$data['emp_name'] = $this->Testing_model->fetch_user_tl_and_head();
			$data['dept'] = $this->Testing_model->fetch_dept_name();
			$this->load->view('addproject', $data);  

		} else {
            redirect("index.php/welcome/index");
        }

	}
	
	public function project_tl_list_edit_option()
    {		
		$project_code = $this->input->post('project_code');
		$this->load->model('Testing_model');
		$data = $this->Testing_model->fetch_project_tl_list_edit_option($project_code);
		// print_r($data);die();				
		echo json_encode($data);				         
    }   

	// function project_name_check($key)
	// {
	// 	$this->load->model('Testing_model');
	// 	$num_results = $this->Testing_model->project_name_check($key);
	// 	print_r($num_results);die();
	// }

	public function check_prt_name_project_tb(){
		$prt_name = $this->input->post('prt_name');
		$this->load->model('Testing_model');
		$num_results = $this->Testing_model->project_name_check($prt_name);
		if($num_results > 0){					
			$data = array('res_error' => "Already Entered");
		}else{					
			$data = array('success' => "Success");
		}
		echo json_encode($data);
	}

	public function project_form_insert() {                      			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('prt_name', 'Project Name', 'required');
		// $this->form_validation->set_rules('prt_des', 'Project Description', 'required');
		$this->form_validation->set_rules('prt_priority', 'Project Priority', 'required');
		// $this->form_validation->set_rules('prt_client', 'Project Client', 'required');
		// $this->form_validation->set_rules('prt_dept', 'Project Dept', 'required');
		$this->form_validation->set_rules('prt_tl', 'Project Team Leader', 'required');
		// $this->form_validation->set_rules('prt_date', 'Project Team Leader', 'required');
		$this->form_validation->set_rules('prt_tm_list[]', 'Project Team Member', 'required');
		// $this->form_validation->set_rules($_FILES['file_name']['name'], 'Project File', 'required');
		
		if($this->form_validation->run())
		{
			$prt_name = $this->input->post('prt_name');
			$prt_des = $this->input->post('prt_des');
			$prt_priority = $this->input->post('prt_priority');
			$prt_tl = $this->input->post('prt_tl');				
            $login_id = $this->session->userdata('emp_id'); //login user name						
            $ops_id = $this->session->userdata('ops_id'); //ops id						
            $ops_name = $this->session->userdata('ops_name'); //ops id						
			// print_r($ops_name);die();

			//Set User table to tl_role_type = "1" 
			$this->load->model('Testing_model');
			$data = $this->Testing_model->UpdateUserTeamLeaderRoleType($prt_tl);					
		

			if($this->input->post('prt_client')){
				$prt_client = $this->input->post('prt_client');
			}else{
				$prt_client = "";
			}			

			if($this->input->post('prt_dept')){
				$prt_dept = $this->input->post('prt_dept');
			}else{
				$prt_dept = "";
			}

			if($this->input->post('prt_date')){
				$prt_date = $this->input->post('prt_date');		
				
				$data = array(
					"prt_name" => $prt_name,
					"prt_des" => $prt_des,
					"prt_priority" => $prt_priority,
					"prt_client" => $prt_client,
					"prt_dept" => $prt_dept,
					"prt_tl" => $prt_tl,
					"created_by" => $login_id,
					"ops_id" => $ops_id,
					"ops_name" => $ops_name,
					"prt_date" => $prt_date,
					"status" => "1",
					"prt_tm" => "",
					"tl_prt_status" => "Pending"
				);
		
			}else{
				$data = array(
					"prt_name" => $prt_name,
					"prt_des" => $prt_des,
					"prt_priority" => $prt_priority,
					"prt_client" => $prt_client,
					"prt_dept" => $prt_dept,
					"prt_tl" => $prt_tl,
					"created_by" => $login_id,
					"ops_id" => $ops_id,
					"ops_name" => $ops_name,
					// "prt_date" => $prt_date,
					"status" => "1",
					"prt_tm" => "",
					"tl_prt_status" => "Pending"
				);
			}
			
			$this->load->model('Testing_model');
			$project_last_inserted_id = $this->Testing_model->project_insert($data);
			// // echo json_encode($project_last_inserted_id);
			
			//create project code
			if(!empty($project_last_inserted_id)){
				$project_code="P00";				
				$project_code = $project_code."".$project_last_inserted_id; //T00.13 =T0013
				$project_last_inserted_id_code = $this->Testing_model->insertProjectCode($project_code, $project_last_inserted_id);
				// $project_code = $this->Testing_model->fetchProjectCode($project_last_inserted_id);
				// print_r($project_last_inserted_id_code);
				// die();

				//Team Member

				if($this->input->post('prt_tm_list')){
					$countsize = count($this->input->post('prt_tm_list'));
					$created_by = $this->session->userdata('emp_id'); 									

					for ($i=0; $i<$countsize ; $i++) 
					{
						$prt_tm_list_sep = $this->input->post('prt_tm_list')[$i];
						$this->load->model('Testing_model');
						$this->Testing_model->prt_team_member_insert("project_team_member", $project_code, $prt_tm_list_sep, $created_by, $ops_id);
						$this->Testing_model->UpdateUserTeamMemberRoleType($prt_tm_list_sep);
					}

					$prt_table = implode(',',$this->input->post('prt_tm_list'));

					if(!empty($prt_table)){
						$this->load->model('Testing_model');
						$data = $this->Testing_model->updateProjectTeamMember($project_last_inserted_id, $prt_table);
					}
					// print_r($data);die();
	
				}
				
				//send files to databse			
				if($_FILES['file_name']['name'] != '') {
					// print_r("kk");die();
					$this->load->library('upload');
					$image = array();
					$ImageCount = count($_FILES['file_name']['name']);
					// echo json_encode($ImageCount);

					for ($i = 0; $i < $ImageCount; $i++) {
						$_FILES['file']['name'] = $_FILES['file_name']['name'][$i];
						$_FILES['file']['type'] = $_FILES['file_name']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['file_name']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['file_name']['error'][$i];
						$_FILES['file']['size'] = $_FILES['file_name']['size'][$i];

						// File upload configuration
						$config['upload_path'] = './assets/upload';  
						$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|xlsx|csv';  
						
						// Load and initialize upload library
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						// Upload file to server
						if ($this->upload->do_upload('file')) {
							// Uploaded file data
							$imageData = $this->upload->data();
							$uploadImgData[$i]['file_upload'] = $imageData['file_name'];
							$uploadImgData[$i]['prt_id'] = $project_code;
							$uploadImgData[$i]['ops_id'] = $ops_id;
							// $uploadImgData[$i]['status'] = 1;
						}
					}
					if (!empty($uploadImgData)) {
						// Insert files data into the database
						$this->load->model('Testing_model');
						$data = $this->Testing_model->importData('project_file_upload', $uploadImgData);
					}
				}

			}	
			
			$this->session->set_flashdata('msg', 'Data Inserted Successfully!');
				
		}
		else
		{
			$data = array(
				'error'   => true,
				'prt_name_error' => form_error('prt_name'),
				'prt_des_error' => form_error('prt_des'),
				'prt_priority_error' => form_error('prt_priority'),
				// 'prt_client_error' => form_error('prt_client'),
				// 'prt_dept_error' => form_error('prt_dept'),
				'prt_tl_error' => form_error('prt_tl'),
				'prt_tm_list_error' => form_error('prt_tm_list[]'),
				// 'prt_date_error' => form_error('prt_date'),
				// 'file_name_error' => form_error('file_name'),
			);
		}
		
		echo json_encode($data);

        
    }

	public function project_report_data(){
        $postData = $this->input->post();
		$this->load->model('Testing_model');		
        $project_result = $this->Testing_model->project_verify_report_data($postData);        
        echo json_encode($project_result);
        
    }

	public function get_uploaded_file_project(){
        // $where_cond_c['id'] = $this->input->post('id');                
        $project_code = $this->input->post('project_code');                                            
        //   echo '<pre>';print_r($where_cond_c);die();
		$this->load->model('Testing_model');		
        $get_edit_large_model_details_result = $this->Testing_model->large_verify_data($project_code);        
        echo json_encode($get_edit_large_model_details_result);
    } 
	
	public function edit_project_form() {
            
		$this->load->library('form_validation');

		$this->form_validation->set_rules('prt_name', 'Project Name', 'required');
		// $this->form_validation->set_rules('prt_des', 'Project Description', 'required');
		// $this->form_validation->set_rules('client_mob', 'No', 'required|numeric|trim|is_unique[users.client_mob]|max_length[10]');
		$this->form_validation->set_rules('prt_priority', 'Project Priority', 'required');
		// $this->form_validation->set_rules('prt_client', 'Project Client', 'required');
		// $this->form_validation->set_rules('prt_dept', 'Project Dept', 'required');
		$this->form_validation->set_rules('prt_tm_list_edit[]', 'Project Team Member', 'required');
		$this->form_validation->set_rules('prt_tl', 'Project Team Leader', 'required');
		
		if($this->form_validation->run())
		{
			
			$id = $this->input->post('project_edit_id');
			$project_code = $this->input->post('project_edit_code');
			$prt_name = $this->input->post('prt_name');
			$prt_des = $this->input->post('prt_des');
			$prt_priority = $this->input->post('prt_priority');
			// $prt_client = $this->input->post('prt_client');
			// $prt_dept = $this->input->post('prt_dept');
			$prt_tl = $this->input->post('prt_tl');				
			
			$this->load->model('Testing_model');			
			$this->Testing_model->UpdateUserTeamLeaderRoleType($prt_tl);					

			if($this->input->post('prt_client')){
				$prt_client = $this->input->post('prt_client');
			}else{
				$prt_client = "";
			}

			if($this->input->post('prt_dept')){
				$prt_dept = $this->input->post('prt_dept');
			}else{
				$prt_dept = "";
			}

			//Edit function
			if($this->input->post('prt_date')){
				$prt_date = $this->input->post('prt_date');
				$this->load->model('Testing_model');

				$update_data = array(
					"prt_name" => $prt_name,
					"prt_des" => $prt_des,
					"prt_date" => $prt_date,
					"prt_priority" => $prt_priority,
					"prt_client" => $prt_client,
					"prt_dept" => $prt_dept,
					"prt_tl" => $prt_tl,
				);

				// $data = $this->Testing_model->project_update($id, $prt_name, $prt_date, $prt_des, $prt_priority, $prt_client, $prt_dept, $prt_tl);
				$data = $this->Testing_model->project_update($id, $update_data);
			
			}else{
				
				$update_data = array(
					"prt_name" => $prt_name,
					"prt_des" => $prt_des,
					// "prt_date" => $prt_date,
					"prt_priority" => $prt_priority,
					"prt_client" => $prt_client,
					"prt_dept" => $prt_dept,
					"prt_tl" => $prt_tl,
				);

				$this->load->model('Testing_model');
				$data = $this->Testing_model->project_update($id, $update_data);
			
			}
			 
			//Project Team Member Update

			if($this->input->post('prt_tm_list_edit')){
				$countsize = count($this->input->post('prt_tm_list_edit'));
				// print_r($this->input->post('prt_tm_list_edit'));die();
				$created_by = $this->session->userdata('emp_id'); 	
				$ops_id = $this->session->userdata('ops_id'); //OPs id

				if($countsize){
					$this->load->model('Testing_model');
					$res = $this->Testing_model->prt_tm_old_delete($project_code);
				}
								
				for ($i=0; $i<$countsize ; $i++) 
				{
					$prt_tm_list_sep = $this->input->post('prt_tm_list_edit')[$i];		
					$this->load->model('Testing_model');			
					$this->Testing_model->prt_team_member_update("project_team_member", $project_code, $prt_tm_list_sep, $created_by, $ops_id);
					$this->Testing_model->UpdateUserTeamMemberRoleType($prt_tm_list_sep);				
				}

				$prt_table = implode(',',$this->input->post('prt_tm_list_edit'));

				if(!empty($prt_table)){
					$this->load->model('Testing_model');
					$data = $this->Testing_model->updateProjectTeamMember($id, $prt_table);
				}
						

			}			
			
			if ($_FILES['file_name_update']['name'] != '') {
	
				$this->load->library('upload');
				$image = array();
				$ImageCount = count($_FILES['file_name_update']['name']);
	
				for ($i = 0; $i < $ImageCount; $i++) {
					$_FILES['file']['name'] = $_FILES['file_name_update']['name'][$i];
					$_FILES['file']['type'] = $_FILES['file_name_update']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['file_name_update']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['file_name_update']['error'][$i];
					$_FILES['file']['size'] = $_FILES['file_name_update']['size'][$i];
	
					// File upload configuration
					$config['upload_path'] = './assets/upload';  
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|xlsx|csv';  
									
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
	
					// Upload file to server
					if ($this->upload->do_upload('file')) {
						// Uploaded file data
						$imageData = $this->upload->data();
						$ops_id = $this->session->userdata('ops_id'); //OPs id
						// echo '<pre>';print_r($imageData);die();
						$uploadImgData[$i]['file_upload'] = $imageData['orig_name'];
						$uploadImgData[$i]['prt_id'] = $project_code;  //  prt_id= 23
						$uploadImgData[$i]['ops_id'] = $ops_id;  //  prt_id= 23
					}
				}
				if (!empty($uploadImgData)) {
					// Insert files data into the database
					$this->load->model('Testing_model');
					$data = $this->Testing_model->project_file_update('project_file_upload', $uploadImgData);
					// echo '<pre>';print_r($dd);die();
	
				}
			}
			$this->session->set_flashdata('msg', 'Data Updated Successfully!');

		}
		else
		{
			$data = array(
				'error'   => true,
				'prt_name_edit_error' => form_error('prt_name'),
				// 'prt_des_edit_error' => form_error('prt_des'),
				'prt_priority_edit_error' => form_error('prt_priority'),
				// 'prt_client_edit_error' => form_error('prt_client'),
				// 'prt_dept_edit_error' => form_error('prt_dept'),
				'prt_tm_list_edit_error' => form_error('prt_tm_list_edit[]'),
				'prt_tl_edit_error' => form_error('prt_tl'),
			);
		}
        echo json_encode($data);
		              
    }

	public function file_uploaded_img_delete()
	{	
		$sample_file_name = $this->input->post('sample');
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deleteImg($sample_file_name);
        echo json_encode($data);
	}

	public function project_delete()
	{	
		$id = $this->input->post('id');
		$project_code = $this->input->post('project_code');

		$this->load->model('Testing_model');
		$project_deleted = $this->Testing_model->deleteProject($project_code);

		if($project_deleted){

			$data = $this->Testing_model->deleteProjectfile($project_code);	
			$data = $this->Testing_model->deleteProjecttm($project_code);
			$data = $this->Testing_model->selectTask($project_code);
			// $data = $this->Testing_model->deleteTasktm($project_code);
			// $data = $this->Testing_model->deleteTaskfile($id);	
		
		}
		
		$this->session->set_flashdata('msg', 'Data Deleted Successfully!');
        echo json_encode($data);
	}

	public function project_active()
	{	
		$id = $this->input->post('id');				
		$this->load->model('Testing_model');
		$data = $this->Testing_model->activeProject($id);
		$this->session->set_flashdata('msg', 'Data Activated Successfully!');
        echo json_encode($data);
	}

	public function project_deactive()
	{	
		$id = $this->input->post('id');		
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deactiveProject($id);
		$this->session->set_flashdata('msg', 'Data Deactivated Successfully!');
        echo json_encode($data);
	}	

	public function project_st_tl()
	{							
		$id = $this->input->post('project_st_id');
		$prt_status = $this->input->post('prt_status');		
		$this->load->model('Testing_model');
		$data = $this->Testing_model->updateProjectstatus($id, $prt_status);
        $this->session->set_flashdata('msg', 'Project Status Updated Successfully!');
		echo json_encode($data);		
	}

	public function select_dept_div_opt()
    {		
		$project_ops_filter = $this->input->post('project_ops_filter', TRUE);
		$this->load->model('Testing_model');
		$data = $this->Testing_model->select_dept_div_opt($project_ops_filter);		
		echo json_encode($data);				         
    } 

	public function assigned_tm_list()
	{			
		$id = $this->input->post('project_tm_id');		
		$project_code = $this->input->post('project_code');		

		if($this->input->post('prt_tm_list')){
			$prt_tm_array = $this->input->post('prt_tm_list');
			$countsize = count($this->input->post('prt_tm_list'));
			// print_r($this->input->post('prt_tm_list_edit'));die();
			$created_by = $this->session->userdata('emp_id'); 									
			$ops_id = $this->session->userdata('ops_id'); 									
			if($countsize){
				$this->load->model('Testing_model');
				$res = $this->Testing_model->prt_tm_old_delete($project_code);
			}
							
			for ($i=0; $i<$countsize; $i++) 
			{
				$prt_tm_list_sep = $this->input->post('prt_tm_list')[$i];		
				$this->load->model('Testing_model');			
				$this->Testing_model->prt_team_member_update("project_team_member", $project_code, $prt_tm_list_sep, $created_by, $ops_id);
			}

			$prt_table = implode(',',$this->input->post('prt_tm_list'));

			if(!empty($prt_table)){
				$this->load->model('Testing_model');
				$data = $this->Testing_model->updateProjectteammem($id, $prt_table);
			}
				
			$this->session->set_flashdata('msg', 'Team Member Updated Successfully!');

		}
		
		echo json_encode($data);		
	}

	public function project_task($project_name)
	{		
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->model('Testing_model');
			$task_details = $this->Testing_model->fetch_task_table($task_code);		
	
			foreach($task_details as $data)
			{
				$task_name = $data->task_name;
				$task_detail = $data->task_detail;
			}
	
			$task_code_session = array(
				'task_code' => $task_code,
				'task_name' => $task_name,
				'task_detail' => $task_detail,
			);
	
			$this->session->set_userdata($task_code_session);
			
			$this->load->view('project_task_view');

		} else {
            redirect("index.php/welcome/index");
        }
				
	}

	public function get_task_datas_project($project_code){                                        
        //   echo '<pre>';print_r($project_code);die();
		// $project_code= "P008";
        $postData = $this->input->post();		
		$this->load->model('Testing_model');		
        $get_edit_large_model_details_result = $this->Testing_model->view_task_data_prt($project_code, $postData);        
        echo json_encode($get_edit_large_model_details_result);
    } 

	public function get_task_remark($task_code){                                        
        //   echo '<pre>';print_r($task_code);die();
		// $task_code= "T0023";
        $postData = $this->input->post();		
		$this->load->model('Testing_model');		
        $get_edit_large_model_details_result = $this->Testing_model->view_task_remark_prt($task_code, $postData);        
        echo json_encode($get_edit_large_model_details_result);
    } 

	public function project_team_member_option()
	{	
		         
		if ($this->input->post('prt_tl')) 
        {			
			// echo '<pre>';print_r($this->input->post('prt_tl'));die();
			// if($this->input->post('prt_tl') == "Team Leader"){
			// 	$data = "";
			// 	echo json_encode($data);
			// }else{
				$team_leader = $this->input->post('prt_tl'); 
				$project_code = $this->input->post('project_code');
				$this->load->model('Testing_model');
				$data = $this->Testing_model->fetch_team_member_li($team_leader, $project_code);
				// echo '<pre>';print_r($data);die();
				echo json_encode($data);
			// }			

        }		
		
	}

	public function prtpg_team_member_option()
	{	
		         
		if ($this->input->post('prt_name')) 
        {						
			$prt_name = $this->input->post('prt_name');
			$this->load->model('Testing_model');
			$data = $this->Testing_model->fetch_addtask_prt_team_member_li($prt_name);
			echo json_encode($data);
        }		
		
	}

	public function prtpg_team_member_option_edit()
	{	
		         
		if ($this->input->post('prt_name')) 
        {						
			$prt_name = $this->input->post('prt_name');
			$task_code = $this->input->post('task_code');
			$this->load->model('Testing_model');
			$data = $this->Testing_model->fetch_addtask_prt_team_member_li_edit($prt_name, $task_code);
			echo json_encode($data);
        }		
		
	}

	public function project_pg_task_insert() {  
		$this->load->library('form_validation');
		$this->form_validation->set_rules('task_date', 'Task Date', 'required');
		$this->form_validation->set_rules('task_detail', 'Task Details', 'required');
		// $this->form_validation->set_rules('prt_tm_list_task_add[]', 'Task Team Member', 'required');
		$this->form_validation->set_rules('prt_tm_list_task_add', 'Task Team Member', 'required');
		// $this->form_validation->set_rules($_FILES['file_name']['name'] , 'Task File', 'required');			

		//task insert 
		if($this->form_validation->run())
		{
			$project_code = $this->input->post('prt_code_addtask');
			$task_name = $this->input->post('prt_name_addtask');
			$tl_task = $this->input->post('prt_tl_addtask');
			$task_date = $this->input->post('task_date');
			$task_detail = $this->input->post('task_detail');
			$login_id = $this->session->userdata('emp_id'); //login user name
			$ops_id = $this->session->userdata('ops_id'); //login user name
						
			$data = array(
				'task_name' => $task_name,
				'tl_task' => $tl_task,
				'task_detail' => $task_detail,
				'created_by' => $login_id,
				'project_code' => $project_code,
				'task_date' => $task_date,
				'ops_id' => $ops_id,
				'status' => "1",
				"tl_task_status" => "Pending",
				"tm_task_status" => "Pending",
				'tm_task' => ""
			);//task_code missing

			$this->load->model('Testing_model');
			$task_last_inserted_id = $this->Testing_model->insertTask($data);

			//Task code
			if(!empty($task_last_inserted_id)){
				
				$task_code="T00";				
				$task_code = $task_code."".$task_last_inserted_id; //T00.13 =T0013
				$task_last_inserted_id_code = $this->Testing_model->insertTaskCode($task_code, $task_last_inserted_id);

				// $task_code = $this->Testing_model->fetchTaskCode($task_last_inserted_id);

				//FIle Upload
				if ($_FILES['file_name']['name'] != '') {
					// print_r("kk");die();

					$this->load->library('upload');
					$image = array();
					$ImageCount = count($_FILES['file_name']['name']);
					// echo json_encode($ImageCount);
	
					for ($i = 0; $i < $ImageCount; $i++) {
						$_FILES['file']['name'] = $_FILES['file_name']['name'][$i];
						$_FILES['file']['type'] = $_FILES['file_name']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['file_name']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['file_name']['error'][$i];
						$_FILES['file']['size'] = $_FILES['file_name']['size'][$i];
	
						// File upload configuration
						$config['upload_path'] = './assets/taskfile';  
						$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|xlsx|csv';  
						
						// Load and initialize upload library
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
	
						// Upload file to server
						if ($this->upload->do_upload('file')) {
							// Uploaded file data
							$imageData = $this->upload->data();
							$uploadImgData[$i]['file_upload'] = $imageData['file_name'];
							$uploadImgData[$i]['task_id'] = $task_last_inserted_id;
							$uploadImgData[$i]['ops_id'] = $ops_id;
							// $uploadImgData[$i]['status'] = 1;
						}
					}
					if (!empty($uploadImgData)) {
						// Insert files data into the database
						$this->load->model('Testing_model');
						$data = $this->Testing_model->importTaskData('task_file_upload', $uploadImgData);
						// print_r($data);die();
					}
				}

				//Adding project team member to team_member_table
				if($task_code){
					$id = $task_last_inserted_id;
					// $task_tm_list = implode(',',$this->input->post('prt_tm_list_task_add'));
					$task_tm_list = $this->input->post('prt_tm_list_task_add');
					$created_by = $this->session->userdata('emp_id'); 
					// $countsize = count($this->input->post('prt_tm_list_task_add'));

					//team meber add to task_table
					$tm_task_table = $this->Testing_model->updateTaskteammem($id, $task_tm_list);								

					//tm add to team_mem_table
					if(!empty($tm_task_table)){
						// for ($i=0; $i<$countsize ; $i++) 
						// {
						// 	$task_tm_list_sep = $this->input->post('prt_tm_list_task_add')[$i];
						// 	$tm_added = $this->Testing_model->task_team_member_insert("task_team_member", $task_code, $task_tm_list_sep, $created_by);
						// }

						$data = $this->Testing_model->task_team_member_insert("task_team_member", $task_code, $task_tm_list, $created_by, $ops_id);

					}				
								
				}
				
			}	
				
			$this->session->set_flashdata('msg', 'Data Inserted Successfully!');
				
		}
		else
		{
			$data = array(
				'error'   => true,
				'prt_tm_list_task_add_error' => form_error('prt_tm_list_task_add'),
				'task_detail_error' => form_error('task_detail'),
				'task_date_error' => form_error('task_date'),
				// 'file_name_error' => form_error('file_name'),
			);
		}
				
		echo json_encode($data);
        
    }

	public function viewTask($project_code)
	{		
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
		
			$this->load->model('Testing_model');
			$task_details = $this->Testing_model->fetch_prt_table($project_code);							

			foreach($task_details as $data)
			{
				$prt_name = $data->prt_name;
				$prt_des = $data->prt_des;
			}
	
			$project_code = array(
				'project_code' => $project_code,
				'prt_name' => $prt_name,
				'prt_des' => $prt_des,
			);
	
			$this->session->set_userdata($project_code);
			
			$this->load->view('viewTask');

		} else {
            redirect("index.php/welcome/index");
        }
				
	}

	public function view_task_report_data_prtpg(){
        $postData = $this->input->post();
		$this->load->model('Testing_model');		
        $view_com_result = $this->Testing_model->view_task_report_data_prtpg($postData);        
        echo json_encode($view_com_result);        
    }

	/********************************************************
	 TASK PAGE
	 ********************************************************/
	public function task()
	{	
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			$this->load->model('Testing_model');
			if($this->session->userdata('role') == "Head"){      
				$data['prt_name'] = $this->Testing_model->fetch_prt_name();
				$data['emp_name'] = $this->Testing_model->fetch_tl_list();
				$this->load->view('task', $data);
			}else if($this->session->userdata('role') == 'Team Leader'){ 
				$data['emp_name'] = $this->Testing_model->fetch_user_tm_task();	//tl to get tm datas
				$this->load->view('task', $data);
			}else if($this->session->userdata('role') == 'Team Member'){ 
				$this->load->view('task');  
			}
		} else {
            redirect("index.php/welcome/index");
        }
		
	}

	public function addtask()
	{					
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
					
			$this->load->model('Testing_model');
			$data['prt_name'] = $this->Testing_model->fetch_prt_name();
			$data['emp_name'] = $this->Testing_model->fetch_tl_list();
			// echo json_encode($data);
			$this->load->view('addtask', $data); 

		} else {
            redirect("index.php/welcome/index");
        }
		        	
	}
	
	public function task_insert() {                      			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('task_name', 'Task Name', 'required');
		$this->form_validation->set_rules('tl_task', 'Team Leader', 'required');
		$this->form_validation->set_rules('task_detail', 'Task Details', 'required');
		$this->form_validation->set_rules($_FILES['file_name']['name'] , 'Task File', 'required');

		if($this->form_validation->run())
		{
			$task_name = $this->input->post('task_name', TRUE);
			$tl_task = $this->input->post('tl_task', TRUE);
			$task_detail = $this->input->post('task_detail', TRUE);
            $login_id = $this->session->userdata('emp_id'); //login user name
						
			$data = array(
				'task_name' => $task_name,
				'tl_task' => $tl_task,
				'task_detail' => $task_detail,
				'created_by' => $login_id,
				'status' => "1",
				"tl_task_status" => "Incomplete",
				'tm_task' => ""
			);

			$this->load->model('Testing_model');
			$task_last_inserted_id = $this->Testing_model->insertTask($data);

			// echo json_encode($project_last_inserted_id);

			if(!empty($task_last_inserted_id)){
				$task_code="T00";				
				$task_code = $task_code."".$task_last_inserted_id; //T00.13 =T0013
				$task_last_inserted_id_code = $this->Testing_model->insertTaskCode($task_code, $task_last_inserted_id);
			}			
				
			if(!empty($task_name)){
				$prt_task_code_inserted_id = $this->Testing_model->insertProjectCodetoTask($task_name);
			}

			if ($_FILES['file_name']['name'] != '') {

				$this->load->library('upload');
				$image = array();
				$ImageCount = count($_FILES['file_name']['name']);
				echo json_encode($ImageCount);

				for ($i = 0; $i < $ImageCount; $i++) {
					$_FILES['file']['name'] = $_FILES['file_name']['name'][$i];
					$_FILES['file']['type'] = $_FILES['file_name']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['file_name']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['file_name']['error'][$i];
					$_FILES['file']['size'] = $_FILES['file_name']['size'][$i];

					// File upload configuration
					$config['upload_path'] = './assets/taskfile';  
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|xlsx|csv';  
					
					// Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					// Upload file to server
					if ($this->upload->do_upload('file')) {
						// Uploaded file data
						$imageData = $this->upload->data();
						$uploadImgData[$i]['file_upload'] = $imageData['file_name'];
						$uploadImgData[$i]['task_id'] = $task_last_inserted_id;
						// $uploadImgData[$i]['status'] = 1;
					}
				}
				if (!empty($uploadImgData)) {
					// Insert files data into the database
					$this->load->model('Testing_model');
					$data = $this->Testing_model->importTaskData('task_file_upload', $uploadImgData);
				}
			}	
			$this->session->set_flashdata('msg', 'Data Inserted Successfully!');
		}
		else
		{
			$data = array(
				'error'   => true,
				'task_name_error' => form_error('task_name'),
				'tl_task_error' => form_error('tl_task'),
				'task_detail_error' => form_error('task_detail'),
				'file_name_error' => form_error('file_name'),
			);
		}

		echo json_encode($data);

        
    }	

	public function get_uploaded_file_task(){

        // $where_cond_c['id'] = $this->input->post('id');                
        $id = $this->input->post('id');                                            
        // print_r($this->input->post('id'));die();
		$this->load->model('Testing_model');		

        $get_edit_large_model_details_result = $this->Testing_model->large_verify_data_task($id);        
		// echo '<pre>';print_r($get_edit_large_model_details_result);die();

        echo json_encode($get_edit_large_model_details_result);
    } 

	public function edit_task_form() {
            
		$this->load->library('form_validation');
		// $this->form_validation->set_rules('task_name', 'Task Name', 'required');
		$this->form_validation->set_rules('prt_tm_list_task_add', 'Team Member', 'required');
		$this->form_validation->set_rules('task_detail', 'Task Details', 'required');
		$this->form_validation->set_rules('task_date', 'Task Details', 'required');
	
		if($this->form_validation->run())
		{
			
			$tm_task = $this->input->post('prt_tm_list_task_add', TRUE);
			$task_date = $this->input->post('task_date', TRUE);
			$task_detail = $this->input->post('task_detail', TRUE);
			$id = $this->input->post('task_id');
			$task_code = $this->input->post('task_code');

			$this->load->model('Testing_model');
			$data = $this->Testing_model->updateTask($id, $tm_task, $task_date, $task_detail);		
								
			// echo '<pre>';print_r($project_insert);die();
			
			if ($_FILES['file_name_update']['name'] != '') {
	
				$this->load->library('upload');
				$image = array();
				$ImageCount = count($_FILES['file_name_update']['name']);
	
				for ($i = 0; $i < $ImageCount; $i++) {
					$_FILES['file']['name'] = $_FILES['file_name_update']['name'][$i];
					$_FILES['file']['type'] = $_FILES['file_name_update']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['file_name_update']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['file_name_update']['error'][$i];
					$_FILES['file']['size'] = $_FILES['file_name_update']['size'][$i];
	
					// File upload configuration
					$config['upload_path'] = './assets/taskfile';  
					$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|xlsx|csv';  
									
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
	
					// Upload file to server
					if ($this->upload->do_upload('file')) {
						// Uploaded file data
						$imageData = $this->upload->data();
						$ops_id = $this->session->userdata('ops_id'); //login user name						
						// echo '<pre>';print_r($imageData);die();
						$uploadImgData[$i]['file_upload'] = $imageData['orig_name'];
						$uploadImgData[$i]['task_id'] = $id;  //  prt_id= 23
						$uploadImgData[$i]['ops_id'] = $ops_id;  //  prt_id= 23
					}
				}
				if (!empty($uploadImgData)) {
					// Insert files data into the database
					$this->load->model('Testing_model');
					$data = $this->Testing_model->task_file_update('task_file_upload', $uploadImgData);
					// echo '<pre>';print_r($dd);die();
	
				}

				$this->session->set_flashdata('msg', 'Data Updated Successfully!');
			}
		}
		else
		{
			$data = array(
				'error'   => true,
				'prt_tm_list_task_add_error' => form_error('prt_tm_list_task_add'),
				'task_detail_error' => form_error('task_detail'),
				'task_date_error' => form_error('task_date'),
			);
			$this->session->set_flashdata('msg', 'Please Enter A Valid Data!');
		}
		
        echo json_encode($data);
		              
    }

	// public function task_report_data(){
    //     $postData = $this->input->post();
	// 	$this->load->model('Testing_model');		
    //     $project_result = $this->Testing_model->task_verify_report_data($postData);        
    //     echo json_encode($project_result);        
    // }

	public function task_delete()
	{	
		$id = $this->input->post('id');
		$task_code = $this->input->post('task_code');

		$this->load->model('Testing_model');
		$task_deleted = $this->Testing_model->deleteTask($task_code);

		if($task_deleted){

			$data = $this->Testing_model->deleteTaskfile($id);	
			$data = $this->Testing_model->deleteTasktm($task_code);		
			$data = $this->Testing_model->deleteDailyTask($task_code);		
		}

		$this->session->set_flashdata('msg', 'Data deleted Successfully!');
        echo json_encode($data);
	}

	public function task_active()
	{	
		$id = $this->input->post('id');		
		$this->load->model('Testing_model');
		$data = $this->Testing_model->activeTask($id);
		$this->session->set_flashdata('msg', 'Data Activated Successfully!');
        echo json_encode($data);
	}

	public function task_deactive()
	{	
		$id = $this->input->post('id');		
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deactiveTask($id);
		$this->session->set_flashdata('msg', 'Data Deactivated Successfully!');
        echo json_encode($data);
	}

	public function task_st_tl()
	{							
		$id = $this->input->post('task_st_id');
		$tl_task_status = $this->input->post('task_status');		
		$this->load->model('Testing_model');
		$data = $this->Testing_model->updateTaskstatus($id, $tl_task_status);
        $this->session->set_flashdata('msg', 'Task Status Updated Successfully!');
		echo json_encode($data);		
	}

	public function task_tm_list()
	{							
		$id = $this->input->post('task_tm_id');
		$task_code = $this->input->post('task_code');
		$task_tm_list = implode(',',$this->input->post('task_tm_list'));
		$created_by = $this->session->userdata('emp_id'); 

		$countsize = count($this->input->post('task_tm_list'));

		for ($i=0; $i<$countsize ; $i++) 
		{
			$task_tm_list_sep = $this->input->post('task_tm_list')[$i];
			$this->load->model('Testing_model');
			$this->Testing_model->task_team_member_insert("task_team_member", $task_code, $task_tm_list_sep, $created_by);
		}
	
		if(!empty($task_tm_list)){
			$this->load->model('Testing_model');
			$data = $this->Testing_model->updateTaskteammem($id, $task_tm_list);
		}

        $this->session->set_flashdata('msg', 'Team Member Updated Successfully!');
		echo json_encode($data);		
	}

	public function dailytask($task_code)
	{		
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->model('Testing_model');
			$task_details = $this->Testing_model->fetch_task_table($task_code);		
	
			foreach($task_details as $data)
			{
				$task_name = $data->task_name;
				$task_detail = $data->task_detail;
			}
	
			$task_code_session = array(
				'task_code' => $task_code,
				'task_name' => $task_name,
				'task_detail' => $task_detail,
			);
	
			$this->session->set_userdata($task_code_session);
			
			$this->load->view('dailytask');

		} else {
            redirect("index.php/welcome/index");
        }
				
	}

	public function daily_task_insert()
	{							
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comment', 'Comment', 'required');
		$this->form_validation->set_rules('tm_task_status', 'Task Status', 'required');
		$this->form_validation->set_rules('task_date', 'Date', 'required');
		
		if($this->form_validation->run())
		{
			$task_code = $this->input->post('daily_task_code');
			$emp_id = $this->input->post('emp_id');
			$emp_name = $this->input->post('emp_name');
			$date = $this->input->post('task_date');
			$comment = $this->input->post('comment');
			$tm_task_status = $this->input->post('tm_task_status');
			$id = $this->input->post('dailytask_id');  //task id ex: T001
            $ops_id = $this->session->userdata('ops_id'); 

			$data = array(
				'task_id' => $task_code,
				'emp_id' => $emp_id,
				'emp_name' => $emp_name,
				'task_update_date' => $date,
				'comment' => $comment,
				'tm_task_status' => $tm_task_status,
				'ops_id' => $ops_id,
			);
			
			$this->load->model('Testing_model');
			$data = $this->Testing_model->insertDailyTask($data);

			if(!empty($data)){
				$data = $this->Testing_model->updateTmTaskStatus($tm_task_status, $task_code);	
			}

			if($tm_task_status == "Completed"){
				$data = $this->Testing_model->updateCompletedonTask($date, $task_code);	
			}

			// print_r($data);
			// die();
			$this->session->set_flashdata('msg', 'Comments Inserted Successfully!');

		}
		else
		{
			$data = array(
				'error'   => true,
				'comment_error' => form_error('comment'),
				'tm_task_status_error' => form_error('tm_task_status'),
				'date_error' => form_error('task_date'),
			);
		}

		echo json_encode($data);		
	}


	public function daily_task_update()
	{									
		$date = $this->input->post('task_date_edit');
		$comment = $this->input->post('task_comment_edit');
		$tm_task_status = $this->input->post('task_status_edit');
		$id = $this->input->post('row_id');  //task id ex: T001
		$ops_id = $this->session->userdata('ops_id'); 

		$data = array(
			'id' => $id,
			'task_update_date' => $date,
			'comment' => $comment,
			'tm_task_status' => $tm_task_status,
			'ops_id' => $ops_id,
		);

		// print_r($data);die();
			
		$this->load->model('Testing_model');
		$updated_daily_task = $this->Testing_model->updateDailyTask($data);
		if($updated_daily_task){
			$task_code = $this->Testing_model->fetch_daily_task_code($id);
		}

		// print_r($task_code);die();

		if(!empty($data)){
			$data = $this->Testing_model->updateTmTaskStatus($tm_task_status, $task_code);	
		}

		if($tm_task_status == "Completed"){
			$data = $this->Testing_model->updateCompletedonTask($date, $task_code);	
		}

		// print_r($data);
		// die();
		$this->session->set_flashdata('msg', 'Comments Updated Successfully!');

		echo json_encode($data);		
	}

	public function daily_task_delete()
	{									
		$id = $this->input->post('row_id');  //task id ex: T001
		$ops_id = $this->session->userdata('ops_id'); 

		$data = array(
			'id' => $id,
			'ops_id' => $ops_id,
		);

		// print_r($data);die();
			
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deleteDailyTaskTm($data);		

		// print_r($data);
		// die();
		$this->session->set_flashdata('msg', 'Comments Deleted Successfully!');

		echo json_encode($data);		
	}

	public function view_comment_report_data(){
        $postData = $this->input->post();
		$this->load->model('Testing_model');		
        $view_com_result = $this->Testing_model->view_com_verify_report_data($postData);        
        echo json_encode($view_com_result);
        
    }


	/********************************************************
	 PROJECT REPORT PAGE
	 ********************************************************/

	public function project_report()
	{			
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->view('project-report');

		} else {
            redirect("index.php/welcome/index");
        }

	}


	public function project_report_data_menulist(){

		// $date1 = "2021-12-29";		
		// $date2 =  "2021-12-28";
		// $date3 =  "2021-12-27";
		// $date4 =  "2021-12-26"; // sunday
		// $date5 =  "2021-12-25";
		// $date6 =  "2021-12-24";
		// $date7 =  "2021-12-23";
		// $date8 =  "2021-12-22";

		$date=date_create();
		$date1 = date_format($date,"Y-m-d");				

		$date=date_create();
		date_add($date,date_interval_create_from_date_string("-1 days"));
        $date2 = date_format($date,"Y-m-d");
        $date_2 = date_format($date,"Y-m-d");

		$date=date_create();
		date_add($date,date_interval_create_from_date_string("-2 days"));
        $date3 = date_format($date,"Y-m-d");
		
		$date=date_create();
		date_add($date,date_interval_create_from_date_string("-3 days"));
        $date4 = date_format($date,"Y-m-d");
		
		$date=date_create();
		date_add($date,date_interval_create_from_date_string("-4 days"));
        $date5 = date_format($date,"Y-m-d");
		
		$date=date_create();
		date_add($date,date_interval_create_from_date_string("-5 days"));
        $date6 = date_format($date,"Y-m-d");
		
		$date=date_create();
		date_add($date,date_interval_create_from_date_string("-6 days"));
        $date7 = date_format($date,"Y-m-d");
		
		$date=date_create();		
		date_add($date,date_interval_create_from_date_string("-7 days"));
        $date8 = date_format($date,"Y-m-d");

		$arrayName = array();

		$created_on = array($date1,$date2,$date3,$date4,$date5,$date6,$date7,$date8);
		// print_r($created_on);die();
        foreach($created_on as $te)
		{
			 $timestamp=strtotime($te);
			 $day=date('D',$timestamp);
             if($day=="Sun")
			 {
				  
			 }
			 else{
				 array_push($arrayName,$te);
			 }
		}


		$dt_1 = $arrayName[0];
		$myDateTime = DateTime::createFromFormat('Y-m-d', $dt_1);
		$date_view_1 = $myDateTime->format('d-m-Y');
		// print_r($date_view_1);die();

		$dt_2 = $arrayName[1];
		$myDateTime = DateTime::createFromFormat('Y-m-d', $dt_2);
		$date_view_2 = $myDateTime->format('d-m-Y');
		// print_r($formattedweddingdate);die();

		$dt_3 = $arrayName[2];
		$myDateTime = DateTime::createFromFormat('Y-m-d', $dt_3);
		$date_view_3 = $myDateTime->format('d-m-Y');
		// print_r($formattedweddingdate);die();

		$dt_4 = $arrayName[3];
		$myDateTime = DateTime::createFromFormat('Y-m-d', $dt_4);
		$date_view_4 = $myDateTime->format('d-m-Y');
		// print_r($formattedweddingdate);die();

		$dt_5 = $arrayName[4];
		$myDateTime = DateTime::createFromFormat('Y-m-d', $dt_5);
		$date_view_5 = $myDateTime->format('d-m-Y');
		// print_r($formattedweddingdate);die();

		$dt_6 = $arrayName[5];
		$myDateTime = DateTime::createFromFormat('Y-m-d', $dt_6);
		$date_view_6 = $myDateTime->format('d-m-Y');
		// print_r($formattedweddingdate);die();

		$dt_7 = $arrayName[6];
		$myDateTime = DateTime::createFromFormat('Y-m-d', $dt_7);
		$date_view_7 = $myDateTime->format('d-m-Y');
		// print_r($formattedweddingdate);die();

		// $dt_1=
		$dates = array(
			"dt_1" => $date_view_1, 
			"dt_2" => $date_view_2, 
			"dt_3" => $date_view_3, 
			"dt_4" => $date_view_4, 
			"dt_5" => $date_view_5, 
			"dt_6" => $date_view_6, 
			"dt_7" => $date_view_7
		);
		
		$this->session->set_userdata($dates);
		
        $postData = $this->input->post();
		// print_r($postData['draw']);
		// die();
		$this->load->model('Testing_model');		
        $view_com_result = $this->Testing_model->project_report_data_menulist($postData, $dt_1, $dt_2, $dt_3, $dt_4, $dt_5, $dt_6, $dt_7);        
        echo json_encode($view_com_result);
        
    }

	public function v_test()
	{
		$date1 = "2021-12-29";		
		$date2 =  "2021-12-28";
		$date3 =  "2021-12-27";
		$date4 =  "2021-12-26"; // sunday
		$date5 =  "2021-12-25";
		$date6 =  "2021-12-24";
		$date7 =  "2021-12-23";
		$date8 =  "2021-12-22";

		// $sun = "2021-12-26"; // sunday

		// if($date1 == $sun){

		// }
		$arrayName = array();

		$created_on = array($date1,$date2,$date3,$date4,$date5,$date6,$date7,$date8);
        foreach($created_on as $te)
		{
			 $timestamp=strtotime($te);
			 $day=date('D',$timestamp);
             if($day=="Sun")
			 {
				  
			 }
			 else{
				 array_push($arrayName,$te);
			 }
		}


		$dt_1 = $arrayName[0];
		$dt_2 = $arrayName[1];
		$dt_3 = $arrayName[2];
		$dt_4 = $arrayName[3];
		$dt_5 = $arrayName[4];
		$dt_6 = $arrayName[5];
		$dt_7 = $arrayName[6];
		// print_r($arrayName);die();
		// print_r($dt_3);die();


		$this->load->model('Testing_model');		
        $view_com_result = $this->Testing_model->test($created_on);
		echo json_encode($view_com_result);
	}

	/********************************************************
	 Admin Ops PAGE
	 ********************************************************/

	public function admin_ops()
	{	
		$role_type = $this->session->userdata('role');
		if (!empty($role_type)) {            
			
			$this->load->view('admin-ops');

		} else {
            redirect("index.php/welcome/index");
        }

	}
	
	public function admin_ops_insert()
	{								
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ops_name', 'Ops Name', 'required|is_unique[admin_ops.ops_name]');
						
		if($this->form_validation->run())
		{
			//Get input data form dept form
			$ops_name = $this->input->post('ops_name');
            $login_id = $this->session->userdata('emp_id'); //login user name

			$insert_dept = array(
				"ops_name" => $ops_name,
				"created_by" => $login_id,
				"status" => "1"
			);

			$this->load->model('Testing_model');
			$insert_id = $this->Testing_model->insertAdminOps($insert_dept);

			if(!empty($insert_id)){
				
				$admin_ops_code="U00";				
				$admin_ops_code = $admin_ops_code."".$insert_id; //T00.13 =T0013
				$data = $this->Testing_model->insertAdminCode($admin_ops_code, $insert_id);

			}

			$this->session->set_flashdata('msg', 'Data Inserted Successfully!');

		}
		else
		{
			$data = array(
				'error'   => true,
				'ops_error' => form_error('ops_name'),
			);
		}
		
        echo json_encode($data);
	}	
	
	public function admin_ops_update()
	{				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ops_name', 'Ops Name', 'required|is_unique[admin_ops.ops_name]');
		
		if($this->form_validation->run())
		{
			//Get input data form dept form
			$ops_name = $this->input->post('ops_name');
			$id = $this->input->post('id');

			$this->load->model('Testing_model');
			$data = $this->Testing_model->updateAdminOps($ops_name, $id);
			$this->session->set_flashdata('msg', 'Data Updated Successfully!');
			
		}
		else
		{
			$data = array(
				'error'   => true,
				'ops_name_error' => form_error('ops_name'),
			);
		}
		
		echo json_encode($data);
	}

	public function admin_ops_delete()
	{	
		$id = $this->input->post('id');
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deleteAdminOps($id);
        $this->session->set_flashdata('msg', 'Data Deleted Successfully!');
        echo json_encode($data);
	}

	public function admin_ops_active()
	{	
		$id = $this->input->post('id');				
		$this->load->model('Testing_model');
		$data = $this->Testing_model->activeAdminOps($id);
        $this->session->set_flashdata('msg', 'Data Activated Successfully!');
        echo json_encode($data);
	}

	public function admin_ops_login_report_data(){
        $postData = $this->input->post();
		$this->load->model('Testing_model');		
        $client_result = $this->Testing_model->admin_ops_login_user_report_data($postData);        
        echo json_encode($client_result);
        
    }

	public function admin_ops_report_data(){
        $postData = $this->input->post();
		$this->load->model('Testing_model');		
        $client_result = $this->Testing_model->admin_ops_verify_report_data($postData);        
        echo json_encode($client_result);
        
    }
	
	public function admin_ops_deactive()
	{	
		$id = $this->input->post('id');		
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deactiveAdminOps($id);
        $this->session->set_flashdata('msg', 'Data Deactivated Successfully!');
        echo json_encode($data);
	}

	public function admin_ops_table_show()
	{								
		$this->load->model('Testing_model');
		$data = $this->Testing_model->deptList();
		echo json_encode($data);
	}

	/********************************************************
	 Admin Ops Login PAGE
	 ********************************************************/


	public function add_operation_login_form_insert(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('ops_name', 'Operations Name', 'required');
		// $this->form_validation->set_rules('ops_head_empid', 'Operations Head Emp ID', 'required|is_unique[users.emp_id]|trim');
		$this->form_validation->set_rules('ops_head_empid', 'Operations Head Emp ID', 'required|trim');
		$this->form_validation->set_rules('ops_head_name', 'Operations Head Name', 'required');
		// $this->form_validation->set_rules('ops_head_mobileno', 'Operations Head Mobile Number', 'required|numeric|trim|is_unique[users.emp_mob]|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('ops_head_mobileno', 'Operations Head Mobile Number', 'required|numeric|trim|regex_match[/^[0-9]{10}$/]');
		// $this->form_validation->set_rules('ops_head_email', 'Operations Head Email', 'required|valid_email|trim|is_unique[users.emp_email]');
		$this->form_validation->set_rules('ops_head_email', 'Operations Head Email', 'required|valid_email|trim');
		
		if($this->form_validation->run())
		{
			
			$ops_head_empid = $this->input->post('ops_head_empid');
			$this->load->model('Testing_model');
			$num_results = $this->Testing_model->checkAdminEmpid($ops_head_empid);
			
			if(0 < $num_results){	
				//Already Entered

				// print_r($ops_code);die();
				$ops_name = $this->input->post('ops_name');

				if(!empty($ops_name)){
					$this->load->model('Testing_model');
					$ops_id = $this->Testing_model->fetch_ops_id($ops_name);
					// print_r($ops_id);die();
				}

				$ops_head_name = $this->input->post('ops_head_name');
				$ops_head_mobileno = $this->input->post('ops_head_mobileno');
				$ops_head_email = $this->input->post('ops_head_email');

				$data = array(
					'emp_id' => $ops_head_empid,
					'emp_name' => $ops_head_name,
					'emp_mob' => $ops_head_mobileno,
					'emp_email' => $ops_head_email,
					'ops_name' => $ops_name,
					'ops_id' => $ops_id,
					'emp_role' => "Operations Head",
					'status' => "1",
				);								
				
				$this->load->model('Testing_model');
				$data = $this->Testing_model->updateAdminUpdateUserTable($data);
				$this->session->set_flashdata('msg', 'Data Inserted Successfully!');

			}else{
				//New Entry

				$this->load->library('form_validation');
				$this->form_validation->set_rules('ops_head_mobileno', 'Operations Head Mobile Number', 'required|numeric|trim|is_unique[users.emp_mob]|regex_match[/^[0-9]{10}$/]');
				$this->form_validation->set_rules('ops_head_email', 'Operations Head Email', 'required|valid_email|trim|is_unique[users.emp_email]');
				
				if($this->form_validation->run())
				{
					
					// print_r($ops_code);die();
					$ops_name = $this->input->post('ops_name');

					if(!empty($ops_name)){
						$this->load->model('Testing_model');
						$ops_id = $this->Testing_model->fetch_ops_id($ops_name);
						// print_r($ops_id);die();
					}

					$ops_head_name = $this->input->post('ops_head_name');
					$ops_head_mobileno = $this->input->post('ops_head_mobileno');
					$ops_head_email = $this->input->post('ops_head_email');

					$password = "123456";
					$emp_pass = md5($password);

					$login_id = $this->session->userdata('emp_id'); //login user name

					$data = array(
						'emp_id' => $ops_head_empid,
						'emp_name' => $ops_head_name,
						'emp_mob' => $ops_head_mobileno,
						'emp_email' => $ops_head_email,
						'emp_pass' => $emp_pass,
						'ops_name' => $ops_name,
						'ops_id' => $ops_id,
						'emp_role' => "Operations Head",
						"created_by" => $login_id,
						'status' => "1",
					);								
					
					$this->load->model('Testing_model');
					$data = $this->Testing_model->insertUserHead($data);

					// //Task code
					// if(!empty($insert_id)){
						
					// 	$ops_unique_id="U00";				
					// 	$ops_unique_id = $ops_unique_id."".$insert_id; //T00.13 =T0013
					// 	$data = $this->Testing_model->updateUsersTable($ops_unique_id, $insert_id);
					// }
					
					$this->session->set_flashdata('msg', 'Data Inserted Successfully!');


				}
				else
				{
					$data = array(
						'error'   => true,
						'ops_head_mobileno_error' => form_error('ops_head_mobileno'),
						'ops_head_email_error' => form_error('ops_head_email'),
					);
				}

			}
									
		}
		else
		{
			$data = array(
				'error'   => true,
				'ops_name_error' => form_error('ops_name'),
				'ops_head_empid_error' => form_error('ops_head_empid'),
				'ops_head_name_error' => form_error('ops_head_name'),
				'ops_head_mobileno_error' => form_error('ops_head_mobileno'),
				'ops_head_email_error' => form_error('ops_head_email'),
			);
		}

		echo json_encode($data);
        
    }

	public function head_ops_login_update()
	{				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ops_name', 'Operations Name', 'required');
		$this->form_validation->set_rules('ops_head_empid_edit', 'Operations Head Emp ID', 'required|trim');
		$this->form_validation->set_rules('ops_head_name_edit', 'Operations Head Name', 'required');
		$this->form_validation->set_rules('ops_head_mobileno_edit', 'Operations Head Mobile Number', 'required|numeric|trim|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('ops_head_email_edit', 'Operations Head Email', 'required|valid_email|trim');
		
		if($this->form_validation->run())
		{
			
			// print_r($ops_code);die();
			$ops_name = $this->input->post('ops_name');

			if(!empty($ops_name)){
				$this->load->model('Testing_model');
				$ops_id = $this->Testing_model->fetch_ops_id($ops_name);
				// print_r($ops_id);die();
			}

			$ops_head_empid = $this->input->post('ops_head_empid_edit');
			$ops_head_name = $this->input->post('ops_head_name_edit');
			$ops_head_mobileno = $this->input->post('ops_head_mobileno_edit');
			$ops_head_email = $this->input->post('ops_head_email_edit');			
			$id = $this->input->post('id_users_table');			

			$data = array(
				'emp_id' => $ops_head_empid,
				'emp_name' => $ops_head_name,
				'emp_mob' => $ops_head_mobileno,
				'emp_email' => $ops_head_email,
				'ops_name' => $ops_name,
				'ops_id' => $ops_id,
			);								
			
			$this->load->model('Testing_model');
			$data = $this->Testing_model->updateUserHead($data, $id);

			$this->session->set_flashdata('msg', 'Data Updated Successfully!');

		}
		else
		{
			$data = array(
				'error'   => true,
				'ops_name_edit_error' => form_error('ops_name'),
				'ops_head_empid_edit_error' => form_error('ops_head_empid_edit'),
				'ops_head_name_edit_error' => form_error('ops_head_name_edit'),
				'ops_head_mobileno_edit_error' => form_error('ops_head_mobileno_edit'),
				'ops_head_email_edit_error' => form_error('ops_head_email_edit'),
			);
		}

		echo json_encode($data);
				
	}	

	public function check_ops_head_empid_user_tb(){

		$ops_head_empid = $this->input->post('ops_head_empid');
		$this->load->model('Testing_model');
		$num_results = $this->Testing_model->checkAdminEmpid($ops_head_empid);
		
		if(0 < $num_results){	
			
			//Already entered		
			$num_results = $this->Testing_model->check_user_empid_role_type($ops_head_empid);
			
			if(0 < $num_results){	
				//Not Client
				$data = array('res_error' => "Already Entered");			
			}else{
				//Client 
				$data = array('success' => "Success");
			}

		}else{	
			//Not entered				
			$data = array('success' => "Success");
		}
		echo json_encode($data);
	}

}
