<?php

   class Testing_model extends CI_Model{

      public function checkLogin($emp_id, $emp_pass, $role_type){
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where('emp_id', $emp_id);
         $this->db->where('emp_pass', $emp_pass);
         $this->db->where('emp_role', $role_type);
         $this->db->where('status', "1");
         $query = $this->db->get();
         return $query->result_array();    
      }

      public function checkLoginTeamLeader($emp_id, $emp_pass, $role_type){
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where('emp_id', $emp_id);
         $this->db->where('emp_pass', $emp_pass);
         $this->db->where('tl_role_type', "1");
         $this->db->where('status', "1");
         $query = $this->db->get();
         return $query->result_array();        
      }

      public function checkLoginTeamMember($emp_id, $emp_pass, $role_type){
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where('emp_id', $emp_id);
         $this->db->where('emp_pass', $emp_pass);
         $this->db->where('tm_role_type', "1");
         $this->db->where('status', "1");
         $query = $this->db->get();
         return $query->result_array();        
      }

      public function checkLoginClient($emp_id, $emp_pass, $role_type){
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where('emp_id', $emp_id);
         $this->db->where('emp_pass', $emp_pass);
         $this->db->where('client_role_type', "1");
         $this->db->where('status', "1");
         $query = $this->db->get();
         return $query->result_array();        
      }

      function updatePass($emp_id, $emp_pass)
      {
         $this->db->set('emp_pass', $emp_pass);
         $this->db->where('emp_id', $emp_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function UpdateUserClientRoleType($client_emp_id){
         $this->db->set('client_role_type', "1");
         $this->db->where('emp_id', $client_emp_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function UpdateUserTeamLeaderRoleType($prt_tl){
         $this->db->set('tl_role_type', "1");
         $this->db->where('emp_name', $prt_tl);
         $result=$this->db->update('users');
         return $result;	
      }

      function UpdateUserTeamMemberRoleType($prt_tm_list_sep){
         $this->db->set('tm_role_type', "1");
         $this->db->where('emp_name', $prt_tm_list_sep);
         $result=$this->db->update('users');
         return $result;	
      }

      function userteammbStatus($teammb_arr, $emp_id){
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->set('tm_status', $emp_id);
         $this->db->set('tm_role_type', "1");
         $this->db->where('emp_name', $teammb_arr);
         $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function userteammbStatusUpdate($emp_id){
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->set('tm_status', "0");
         $this->db->where('tm_status', $emp_id);
         $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function user_tl_role_type_inactive($emp_id){
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->set('tl_role_type', "0");
         $this->db->set('tm_role_type', "1");
         $this->db->where('emp_id', $emp_id);
         $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function user_tm_role_type_inactive($emp_id){
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->set('tm_role_type', "0");
         $this->db->set('tl_role_type', "1");
         $this->db->where('emp_id', $emp_id);
         $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      //Head Overall Dept list count
      function fetch_it_count($month)
      {        
         $this->db->where('prt_dept', 'IT');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_finance_count($month)
      {        
         $this->db->where('prt_dept', 'Finance');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_hr_count($month)
      {        
         $this->db->where('prt_dept', 'HR');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_operations_count($month)
      {        
         $this->db->where('prt_dept', 'Operations');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_rnd_count($month)
      {        
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_itsale_count($month)
      {        
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_other_count($month)
      {        
         $this->db->where('prt_dept', 'Others');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
          
      //Team Leader Overall Dept list count
      function fetch_tl_it_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'IT');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_finance_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'Finance');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_hr_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'HR');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_operations_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'Operations');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_rnd_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_itsale_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_other_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'Others');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Member Overall Dept list count
     
      function fetch_tm_it_count($month)
      {                     
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'IT');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results();
         
         // $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' AND p.prt_dept='IT' and p.`prt_date` like '$month-%'");
         // $num_results = $query->num_rows();
         return $query;

      }
      function fetch_tm_finance_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');         
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'Finance');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results();         
         return $query;

      }
      function fetch_tm_hr_count($month)
      {                 
         $login_id = $this->session->userdata('emp_id');  
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'HR');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results();
         
         // $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' AND p.prt_dept='HR' and p.`prt_date` like '$month-%'");
         // $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $query;
      }
      function fetch_tm_operations_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'Operations');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results();       
         return $query;

      }
      function fetch_tm_rnd_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'Research & Development');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results();       
         return $query;
                  
      }
      function fetch_tm_itsale_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'IT - Sales');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results();       
         return $query;
         
      }
      function fetch_tm_other_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'Others');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results();       
         return $query;
         
      }

      //Client Overall Dept list count
      function fetch_client_it_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'IT');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_finance_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Finance');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_hr_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'HR');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_operations_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Operations');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_rnd_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_itsale_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_other_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Others');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Head it dept
      function fetch_it_pending_count($month)
      {
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();

      }

      function fetch_it_in_progess_count($month)
      {        
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      function fetch_it_demo_pending_count($month)
      {        
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      function fetch_it_input_pending_count($month)
      {        
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      function fetch_it_feedback_pending_count($month)
      {        
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      
      function fetch_it_under_testing_count($month)
      {        
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      function fetch_it_completed_count($month)
      {        
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Leader = it dept
      function fetch_tl_it_pending_count($month)
      {
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();

      }
      function fetch_tl_it_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_it_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_it_input_pending_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);     
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_it_feedback_pending_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);     
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_it_under_testing_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);     
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_it_completed_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);     
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Member = it dept
      function fetch_tm_it_pending_count($month)
      {
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'IT');   
         $this->db->where('p.tl_prt_status', 'Pending');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results(); 
         return $query;
         // $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='IT' and p.tl_prt_status='Pending' and p.`prt_date` like '$month-%'");
         // $num_results = $query->num_rows();
         // print_r($num_results);die();
         // return $num_results;
      }
      function fetch_tm_it_in_progess_count($month)
      {
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'IT');   
         $this->db->where('p.tl_prt_status', 'In Progress');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results(); 
         return $query;         
      }
      function fetch_tm_it_demo_pending_count($month)
      {
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'IT');   
         $this->db->where('p.tl_prt_status', 'Demo Pending');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results(); 
         return $query;
      }
      function fetch_tm_it_input_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'IT');   
         $this->db->where('p.tl_prt_status', 'Input Pending');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results(); 
         return $query;         
      }
      function fetch_tm_it_feedback_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'IT');   
         $this->db->where('p.tl_prt_status', 'Feedback Pending');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results(); 
         return $query;         
      }
      function fetch_tm_it_under_testing_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'IT');   
         $this->db->where('p.tl_prt_status', 'Under Testing');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results(); 
         return $query;         
      }
      function fetch_tm_it_completed_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', 'IT');   
         $this->db->where('p.tl_prt_status', 'Completed');   
         $this->db->like('p.prt_date', $month);   
         $query = $this->db->count_all_results(); 
         return $query;         
      }

      //Client =  it dept
      function fetch_client_it_pending_count($month)
      {
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name); 
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();

      }
      function fetch_client_it_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name); 
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_it_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name); 
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_it_input_pending_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);    
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_it_feedback_pending_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);    
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_it_under_testing_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);    
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_it_completed_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);    
         $this->db->where('prt_dept', 'IT');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      
      //Head = finance
      function fetch_finance_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_finance_in_progess_count($month)
      {        
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_finance_demo_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_finance_input_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_finance_feedback_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_finance_under_testing_count($month)
      {        
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_finance_completed_count($month)
      {        
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team leader = finance
      function fetch_tl_finance_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_finance_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_finance_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_finance_input_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_finance_feedback_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_finance_under_testing_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_finance_completed_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Member = finance dept
      function fetch_tm_finance_pending_count($month)
      {
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Finance' and p.tl_prt_status='Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_finance_in_progess_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Finance' and p.tl_prt_status='In Progress' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_finance_demo_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Finance' and p.tl_prt_status='Demo Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_finance_input_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Finance' and p.tl_prt_status='Input Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_finance_feedback_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Finance' and p.tl_prt_status='Feedback Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_finance_under_testing_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Finance' and p.tl_prt_status='Under Testing' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_finance_completed_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Finance' and p.tl_prt_status='Completed' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

       //Client =  finance
       function fetch_client_finance_pending_count($month)
       {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name); 
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
       }
       function fetch_client_finance_in_progess_count($month)
       {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name); 
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
       }
       function fetch_client_finance_demo_pending_count($month)
       {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name); 
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
       }
       function fetch_client_finance_input_pending_count($month)
       {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name); 
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
       }
       function fetch_client_finance_feedback_pending_count($month)
       {      
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
       }
       function fetch_client_finance_under_testing_count($month)
       {      
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
       }
       function fetch_client_finance_completed_count($month)
       {      
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Finance');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
       }

		//Head = HR Dept Count List
      function fetch_hr_pending_count($month)
      {        
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_hr_in_progess_count($month)
      {          
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_hr_demo_pending_count($month)
      {           
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_hr_input_pending_count($month)
      {           
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_hr_feedback_pending_count($month)
      {    
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_hr_under_testing_count($month)
      {    
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_hr_completed_count($month)
      {    
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Leader = HR Dept Count List
      function fetch_tl_hr_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_hr_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_hr_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_hr_input_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_hr_feedback_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_hr_under_testing_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_hr_completed_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
   
      //Team Member = HR Dept Count List
      function fetch_tm_hr_pending_count($month)
      {
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='HR' and p.tl_prt_status='Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_hr_in_progess_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='HR' and p.tl_prt_status='In Progress' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_hr_demo_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='HR' and p.tl_prt_status='Demo Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_hr_input_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='HR' and p.tl_prt_status='Input Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_hr_feedback_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='HR' and p.tl_prt_status='Feedback Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_hr_under_testing_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='HR' and p.tl_prt_status='Under Testing' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_hr_completed_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='HR' and p.tl_prt_status='Completed' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      //Client = HR Dept Count List
      function fetch_client_hr_pending_count($month)
      {
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);         
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_hr_in_progess_count($month)
      { 
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);          
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_hr_demo_pending_count($month)
      {     
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);       
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_hr_input_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);    
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_hr_feedback_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_hr_under_testing_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_hr_completed_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'HR');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

		//Head = Operations Dept Count List
      function fetch_operations_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_operations_in_progess_count($month)
      {        
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_operations_demo_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_operations_input_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_operations_feedback_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_operations_under_testing_count($month)
      {        
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_operations_completed_count($month)
      {        
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Leader = Operations Dept Count List
      function fetch_tl_operations_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_operations_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_operations_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_operations_input_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_operations_feedback_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_operations_under_testing_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_operations_completed_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Member = Operations Dept Count List
      function fetch_tm_operations_pending_count($month)
      {
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Operations' and p.tl_prt_status='Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_operations_in_progess_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Operations' and p.tl_prt_status='In Progress' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_operations_demo_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Operations' and p.tl_prt_status='Demo Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_operations_input_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Operations' and p.tl_prt_status='Input Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_operations_feedback_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Operations' and p.tl_prt_status='Feedback Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_operations_under_testing_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Operations' and p.tl_prt_status='Under Testing' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_operations_completed_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Operations' and p.tl_prt_status='Completed' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      //Client = Operations Dept Count List
      function fetch_client_operations_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_operations_in_progess_count($month)
      {       
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name); 
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_operations_demo_pending_count($month)
      {    
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);    
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_operations_input_pending_count($month)
      { 
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);       
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_operations_feedback_pending_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);     
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_operations_under_testing_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);     
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_operations_completed_count($month)
      {   
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);     
         $this->db->where('prt_dept', 'Operations');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

		//Head = Reasearch n Development Dept Count List
      function fetch_rnd_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_rnd_in_progess_count($month)
      {        
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_rnd_demo_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_rnd_input_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_rnd_feedback_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_rnd_under_testing_count($month)
      {        
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_rnd_completed_count($month)
      {        
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Leader = Reasearch n Development Dept Count List
      function fetch_tl_rnd_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_rnd_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_rnd_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_rnd_input_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_rnd_feedback_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_rnd_under_testing_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_rnd_completed_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);   
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Member = Reasearch n Development Dept Count List
      function fetch_tm_rnd_pending_count($month)
      {
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Research & Development' and p.tl_prt_status='Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_rnd_in_progess_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Research & Development' and p.tl_prt_status='In Progress' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_rnd_demo_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Research & Development' and p.tl_prt_status='Demo Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_rnd_input_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Research & Development' and p.tl_prt_status='Input Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_rnd_feedback_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Research & Development' and p.tl_prt_status='Feedback Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_rnd_under_testing_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Research & Development' and p.tl_prt_status='Under Testing' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_rnd_completed_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Research & Development' and p.tl_prt_status='Completed' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      //Client = Reasearch n Development Dept Count List
      function fetch_client_rnd_pending_count($month)
      {       
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name); 
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_rnd_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_rnd_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_rnd_input_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_rnd_feedback_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_rnd_under_testing_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_rnd_completed_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'Research & Development');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }


		//Head = It sales Dept Count List
      function fetch_itsale_pending_count($month)
      {        
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_itsale_in_progess_count($month)
      {        
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_itsale_demo_pending_count($month)
      {        
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_itsale_input_pending_count($month)
      {        
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_itsale_feedback_pending_count($month)
      {        
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_itsale_under_testing_count($month)
      {        
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_itsale_completed_count($month)
      {        
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Leader = It sales Dept Count List
      function fetch_tl_itsale_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_itsale_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_itsale_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_itsale_input_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_itsale_feedback_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      function fetch_tl_itsale_under_testing_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_itsale_completed_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Member = It sales Dept Count List
      function fetch_tm_itsale_pending_count($month)
      {
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='IT - Sales' and p.tl_prt_status='In Progress' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_itsale_in_progess_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='IT - Sales' and p.tl_prt_status='Development' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_itsale_demo_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='IT - Sales' and p.tl_prt_status='Demo Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_itsale_input_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='IT - Sales' and p.tl_prt_status='Input Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_itsale_feedback_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='IT - Sales' and p.tl_prt_status='Feedback Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_itsale_under_testing_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='IT - Sales' and p.tl_prt_status='Under Testing' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }
      function fetch_tm_itsale_completed_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='IT - Sales' and p.tl_prt_status='Completed' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      //Client = It sales Dept Count List
      function fetch_client_itsale_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_itsale_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_itsale_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_itsale_input_pending_count($month)
      {     
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_itsale_feedback_pending_count($month)
      {    
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);    
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_itsale_under_testing_count($month)
      {    
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);    
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_itsale_completed_count($month)
      {    
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);    
         $this->db->where('prt_dept', 'IT - Sales');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

		//Head = Others Dept Count List
      function fetch_other_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_other_in_progess_count($month)
      {        
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_other_demo_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_other_input_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_other_feedback_pending_count($month)
      {        
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_other_under_testing_count($month)
      {        
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_other_completed_count($month)
      {        
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team leader = Others Dept Count List
      function fetch_tl_other_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_other_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_other_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_other_input_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_other_feedback_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_other_under_testing_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_tl_other_completed_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_tl', $login_name);  
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Team Member = Others Dept Count List
      function fetch_tm_other_pending_count($month)
      {
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Others' and p.tl_prt_status='Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_other_in_progess_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Others' and p.tl_prt_status='In Progress' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_other_demo_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Others' and p.tl_prt_status='Demo Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_other_input_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Others' and p.tl_prt_status='Input Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_other_feedback_pending_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Others' and p.tl_prt_status='Feedback Pending' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_other_under_testing_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Others' and p.tl_prt_status='Under Testing' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      function fetch_tm_other_completed_count($month)
      {        
         $login_id = $this->session->userdata('emp_id');
         $query = $this->db->query("SELECT distinct p.* FROM project_team_member as ptm JOIN project as p ON p.project_code = ptm.project_code where ptm.project_teammem_id='$login_id' and p.prt_dept='Others' and p.tl_prt_status='Completed' and p.`prt_date` like '$month-%'");
         $num_results = $query->num_rows();
         // print_r($num_results);die();
         return $num_results;
      }

      //Client = Others Dept Count List
      function fetch_client_other_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_other_in_progess_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_other_demo_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_other_input_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_other_feedback_pending_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_other_under_testing_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }
      function fetch_client_other_completed_count($month)
      {        
         $login_name = $this->session->userdata('emp_name');
         $this->db->where('prt_client', $login_name);   
         $this->db->where('prt_dept', 'Others');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');
         return $this->db->count_all_results();
      }

      //Admin  = Dept count
      function fetch_admin_dept_count()
      {
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('admin_ops');
         $num_results = $this->db->count_all_results();
         return $num_results;  
      }

      //Head = user count
      function fetch_user_count()
      {
			$ops_id = $this->session->userdata('ops_id'); //OPs id
         $emp_role_type = array('Operations Head', 'Team Leader', 'Team Member');    
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where('ops_id', $ops_id);   
         $this->db->where_in('emp_role', $emp_role_type);   
         $num_results = $this->db->count_all_results();
         return $num_results;  
      }

      function fetch_project_count()
      {        
			$ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;  
      }

      function fetch_task_count()
      {       
			$ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('task');
         $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;  
      }
      
      //Team Leader user count
      function fetch_team_member_count()
      {
			$ops_id = $this->session->userdata('ops_id'); //OPs id
		   $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where('tm_status', $login_id);
         $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results+1;  
      }

      function fetch_tl_project_count()
      {        
         // $ops_id = $this->session->userdata('ops_id'); //OPs id
		   // $login_name = $this->session->userdata('emp_name');
         // $this->db->distinct();
         // $this->db->select('*');
         // $this->db->from('project');
         // $this->db->where('prt_tl', $login_name);
         // $this->db->where('ops_id', $ops_id);   
         // $num_results = $this->db->count_all_results();
         // return $num_results;  

         $login_emp_name = $this->session->userdata('emp_name'); 
         $login_emp_id = $this->session->userdata('emp_id'); 
         $ops_id = $this->session->userdata('ops_id'); 
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');
         $this->db->where('p.prt_tl', $login_emp_name);
         $this->db->where('p.ops_id', $ops_id);
         $this->db->or_where('ptm.project_teammem_id', $login_emp_id);
         $records = $this->db->get()->result();
         $num_results = count($records);         
         return $num_results;  
      }

      function fetch_tl_task_count()
      {       
			$ops_id = $this->session->userdata('ops_id'); //OPs id
		   $login_name = $this->session->userdata('emp_name');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('task');
         $this->db->where('tm_task', $login_name);
         $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;  
      }

      //Team Leader user count
      function fetch_tm_project_count()
      {        
			$ops_id = $this->session->userdata('ops_id'); //OPs id
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('project_code');
         $this->db->from('project_team_member');
         $this->db->where('project_teammem_id', $login_id);
         $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;  
      }      

      function fetch_tm_task_count()
      {       
         // SELECT DISTINCT project_code FROM `project_team_member` WHERE project_teammem_id="900386";
			$ops_id = $this->session->userdata('ops_id'); //OPs id
		   $login_name = $this->session->userdata('emp_name');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('task');
         $this->db->where('tm_task', $login_name);
         $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;              
      }

      //Client Project count
      function fetch_client_project_count()
      {        
			// $ops_id = $this->session->userdata('ops_id'); //OPs id
         $login_name = $this->session->userdata('emp_name');

         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('prt_client', $login_name);
         // $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
		   // print_r($this->db->last_query());die();

         return $num_results;             
      }      

      // function fetch_client_task_count()
      // {       
      //    // SELECT DISTINCT project_code FROM `project_team_member` WHERE project_teammem_id="900386";
		//    $login_name = $this->session->userdata('emp_name');
      //    $query = $this->db->query('SELECT DISTINCT * FROM task WHERE tm_task="'.$login_name.'"');
      //    return $query->num_rows();
      // }
      
      //Head Project Status
      function fetch_pending_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('tl_prt_status', 'Pending');
         $this->db->where('ops_id', $ops_id);
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_in_progress_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('tl_prt_status', 'In Progress');
         $this->db->where('ops_id', $ops_id);
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_demo_pending_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('tl_prt_status', 'Demo Pending');
         $this->db->where('ops_id', $ops_id);
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_input_pending_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('tl_prt_status', 'Input Pending');
         $this->db->where('ops_id', $ops_id);
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }
      
      function fetch_feedback_pending_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $this->db->where('ops_id', $ops_id);
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }
      
      function fetch_under_testing_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('tl_prt_status', 'Under Testing');
         $this->db->where('ops_id', $ops_id);
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }
      
      function fetch_completed_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('tl_prt_status', 'Completed');
         $this->db->where('ops_id', $ops_id);
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      //Team Leader Project Status
      function fetch_tl_pending_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $login_id = $this->session->userdata('emp_id');

         $searchQuery = "p.tl_prt_status='Pending' and p.ops_id='$ops_id' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name')";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $num_results = count($records);         
         return $num_results;  
      }
      
      function fetch_tl_in_progress_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $login_id = $this->session->userdata('emp_id');

         $searchQuery = "p.tl_prt_status='In Progress' and p.ops_id='$ops_id' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name')";   
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $num_results = count($records);         
         return $num_results;  
      }

      function fetch_tl_demo_pending_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $login_id = $this->session->userdata('emp_id');

         $searchQuery = "p.tl_prt_status='Demo Pending' and p.ops_id='$ops_id' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name')";       
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $num_results = count($records);         
         return $num_results; 
      }

      function fetch_tl_input_pending_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $login_id = $this->session->userdata('emp_id');

         $searchQuery = "p.tl_prt_status='Input Pending' and p.ops_id='$ops_id' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name')";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $num_results = count($records);         
         return $num_results; 
      }

      function fetch_tl_feedback_pending_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $login_id = $this->session->userdata('emp_id');

         $searchQuery = "p.tl_prt_status='Feedback Pending' and p.ops_id='$ops_id' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name')";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $num_results = count($records);         
         return $num_results;   
      }

      function fetch_tl_under_testing_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $login_id = $this->session->userdata('emp_id');

         $searchQuery = "p.tl_prt_status='Under Testing' and p.ops_id='$ops_id' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name')";         
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $num_results = count($records);         
         return $num_results;            
      }

      function fetch_tl_completed_count()
      {
         $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $login_id = $this->session->userdata('emp_id');

         $searchQuery = "p.tl_prt_status='Completed' and p.ops_id='$ops_id' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name')";         
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $num_results = count($records);         
         return $num_results;  

         // $ops_id = $this->session->userdata('ops_id');
         // $login_name = $this->session->userdata('emp_name');
         // $this->db->select('*');
         // $this->db->from('project');
         // $this->db->where('prt_tl', $login_name);
         // $this->db->where('tl_prt_status', 'Completed');
         // $this->db->where('ops_id', $ops_id);
         // $num_results = $this->db->count_all_results();
         // return $num_results;    
      }

      //Team Member Project Status
      function fetch_tm_pending_count()
      {
         $login_id = $this->session->userdata('emp_id');
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.ops_id', $ops_id);   
         $this->db->where('p.tl_prt_status', "Pending");   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }
      
      function fetch_tm_in_progress_count()
      {
         $login_id = $this->session->userdata('emp_id');
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.tl_prt_status', "In Progress"); 
         $this->db->where('p.ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_tm_demo_pending_count()
      {
         $login_id = $this->session->userdata('emp_id');
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.tl_prt_status', "Demo Pending"); 
         $this->db->where('p.ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_tm_input_pending_count()
      {
         $login_id = $this->session->userdata('emp_id');
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.tl_prt_status', "Input Pending"); 
         $this->db->where('p.ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_tm_feedback_pending_count()
      {
         $login_id = $this->session->userdata('emp_id');
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.tl_prt_status', "Feedback Pending"); 
         $this->db->where('p.ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_tm_under_testing_count()
      {
         $login_id = $this->session->userdata('emp_id');
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.tl_prt_status', "Under Testing"); 
         $this->db->where('p.ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_tm_completed_count()
      {
         $login_id = $this->session->userdata('emp_id');
         $ops_id = $this->session->userdata('ops_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.tl_prt_status', "Completed"); 
         $this->db->where('p.ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      //Client Project Status
      function fetch_client_pending_count()
      {
         // $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('prt_client', $login_name);
         $this->db->where('tl_prt_status', 'Pending');
         // $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }
      
      function fetch_client_in_progress_count()
      {
         // $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('prt_client', $login_name);
         $this->db->where('tl_prt_status', 'In Progress');
         // $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_client_demo_pending_count()
      {
         // $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('prt_client', $login_name);
         $this->db->where('tl_prt_status', 'Demo Pending');
         // $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_client_input_pending_count()
      {
         // $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('prt_client', $login_name);
         $this->db->where('tl_prt_status', 'Input Pending');
         // $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_client_feedback_pending_count()
      {
         // $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('prt_client', $login_name);
         $this->db->where('tl_prt_status', 'Feedback Pending');
         // $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_client_under_testing_count()
      {
         // $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('prt_client', $login_name);
         $this->db->where('tl_prt_status', 'Under Testing');
         // $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      function fetch_client_completed_count()
      {
         // $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('prt_client', $login_name);
         $this->db->where('tl_prt_status', 'Completed');
         // $this->db->where('ops_id', $ops_id);   
         $num_results = $this->db->count_all_results();
         return $num_results;    
      }

      //User Page
      public function insertUser($data){          
         $result = $this->db->insert('users', $data);         
         return $result;       
      }      

      function updateUser($id, $emp_id, $emp_name, $emp_email, $emp_mob, $emp_des, $emp_role, $emp_keyskill, $emp_teammb)
      {
			$ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->set('id', $id); //db name = form name
         $this->db->set('emp_id', $emp_id);
         $this->db->set('emp_name', $emp_name);
         $this->db->set('emp_email', $emp_email);
         $this->db->set('emp_mob', $emp_mob);
         $this->db->set('emp_des', $emp_des);
         $this->db->set('emp_role', $emp_role);
         $this->db->set('emp_keyskill', $emp_keyskill);
         $this->db->set('emp_teammb', $emp_teammb);
         $this->db->where('id', $id);
         $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function myprofileupdateUser($emp_id, $emp_name, $emp_email, $emp_mob, $emp_des, $emp_keyskill)
      {
         $this->db->set('emp_id', $emp_id); //db name = form name
         $this->db->set('emp_name', $emp_name);
         $this->db->set('emp_email', $emp_email);
         $this->db->set('emp_mob', $emp_mob);
         $this->db->set('emp_des', $emp_des);
         $this->db->set('emp_keyskill', $emp_keyskill);
         $this->db->where('emp_id', $emp_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function deleteUser($id){
         // $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('id', $id);
         // $this->db->where('ops_id', $ops_id);
         $result=$this->db->delete('users');
         return $result;	
      }

      function activeUser($id){
         // $ops_id = $this->session->userdata('ops_id'); //OPs id
         $status = "1";
         $this->db->set('status', $status);
         // $this->db->where('ops_id', $ops_id);
         $this->db->where('id', $id);
         $result=$this->db->update('users');
         return $result;	
      }
      
      function deactiveUser($id){
         $status = "0";
         // $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         // $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      public function user_verify_report_data($postData)
      {
         if($this->session->userdata('role') == "Operations Head")
         {
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
               
            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = " (emp_id like '%" . $searchValue . "%' or 
                     emp_name like '%" . $searchValue . "%' or 
                     emp_email like '%" . $searchValue . "%' or 
                     emp_mob like '%" . $searchValue . "%' or 
                     emp_role like '%" . $searchValue . "%' or 
                     emp_des like '%" . $searchValue . "%' or 
                     emp_teammb like '%" . $searchValue . "%' or 
                     emp_keyskill like '%" . $searchValue . "%' ) ";
            }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }
           
            // (emp_role in ('Head','Team Member','Team Leader')
            
            //# Total number of records without filtering
            // $login_emp_name = $this->session->userdata('emp_name'); 
            // $login_emp_id = $this->session->userdata('emp_id'); 
            // $this->db->select('count(*) as allcount');           
            // $this->db->where('emp_name',$login_emp_name);
            // $this->db->or_where('tm_status',$login_emp_id);
            // $this->db->from('users');
                        
            $emp_role_type = array('Operations Head','Team Member','Team Leader');    
            $ops_id = $this->session->userdata('ops_id'); 

            $this->db->select('count(*) as allcount');
            if ($searchQuery != '') $this->db->where($searchQuery);
            $this->db->where('ops_id', $ops_id);
            $this->db->where_in('emp_role', $emp_role_type);
            $this->db->from('users');  
            $records = $this->db->get()->result();
            $totalRecords = $records[0]->allcount;
            // print_r($records);die();
            
            //# Total number of record with filtering
            $this->db->select('count(*) as allcount');
            if ($searchQuery != '') $this->db->where($searchQuery); 
            $this->db->where('ops_id', $ops_id);
            $this->db->where_in('emp_role', $emp_role_type);
            $this->db->from('users');            
            $records = $this->db->get()->result();
            $totalRecordwithFilter = $records[0]->allcount;
            // print_r($totalRecordwithFilter);die();

            # Fetch records  
            $this->db->select('*');
            // $this->db->where('emp_role',"Head");
            if ($searchQuery != '') $this->db->where($searchQuery);
            $this->db->where('ops_id', $ops_id);
            $this->db->where_in('emp_role', $emp_role_type);
            // $this->db->or_where('emp_role',"Team Member");
            // $this->db->or_where('emp_role',"Team Leader");
            $this->db->from('users');
            $this->db->order_by('id', 'desc');  // or desc         
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get()->result();           
            $data = array();

            foreach ($records as $record) {
               
               if($record->status=="1")
               {
                     $reminder="checked";
               }
               else{
                  $reminder="";
               }

               $emp_des_part = '<center><span class="label label-danger" style="text">'.$record->emp_des.'</span></center>'; 

               //onclick=test("'.$record->id.'","'.$record->emp_id.'","'.$record->emp_name.'","'.$record->emp_email.'","'.$record->emp_mob.'","'.$record->emp_des.'","'.$record->emp_role.'","'.$record->emp_teammb.'","'.$record->emp_keyskill.'")

               $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord datable-act-btn" data-id="'.$record->id.'" data-emp_id="'.$record->emp_id.'" data-emp_name="'.$record->emp_name.'" data-emp_email="'.$record->emp_email.'" data-emp_mob="'.$record->emp_mob.'" data-emp_des="'.$record->emp_des.'" data-emp_role="'.$record->emp_role.'" data-emp_teammb="'.$record->emp_teammb.'" data-emp_keyskill="'.$record->emp_keyskill.'"><i class="ti-pencil"></i></a>
               <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm deleteRecord datable-act-btn" data-id="'.$record->id.'"><i class="ti-trash"></i></a>
               <label class="switch_active" data-toggle="tooltip" title="Active"><input type="checkbox"  '.$reminder.' id="activeRecord" class="activeRecord" data-id="'.$record->id.'"  data-status="'.$record->status.'" ><span class="slider round"></span></label>';
               
               if(!empty($record->emp_teammb)){
                  $strArray = explode(',', $record->emp_teammb);

                  $tm_user_ul_li = "<ul class='list-style-none'>";

                  foreach($strArray as $strArrays){
                     $tm_user_ul_li .= '<li style="width: max-content;"><i class="fa fa-check text-info"></i> '.$strArrays.'</li>';                  
                  }

                  $tm_user_ul_li .= "</ul>";

               } else{
                  $tm_user_ul_li = $record->emp_teammb;
               }             

               if(!empty($record->emp_keyskill)){
                  $strArray = explode(',', $record->emp_keyskill);

                  $emp_keyskill_user_ul_li = "";

                  foreach($strArray as $strArrays){
                     $emp_keyskill_user_ul_li .= '<span class="badge" style="background-color:#69727b;color: white;">'.$strArrays.'</span>';                  
                  }
               } else{
                  $emp_keyskill_user_ul_li = $record->emp_keyskill;
               }        

               $data[] = array(
               // "id" => $record->id,
               "emp_id" => $record->emp_id,
               "emp_name" => $record->emp_name,
               "emp_email" => $record->emp_email,
               "emp_mob" => $record->emp_mob,
               "emp_des" => $emp_des_part,
               "emp_role" =>$record->emp_role,
               "emp_teammb" => $tm_user_ul_li,
               "emp_keyskill" => $emp_keyskill_user_ul_li,
               "action" => $action            
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;      
         }else if($this->session->userdata('role') == 'Team Leader'){
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
               
            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = " (emp_id like '%" . $searchValue . "%' or 
                     emp_name like '%" . $searchValue . "%' or 
                     emp_email like '%" . $searchValue . "%' or 
                     emp_mob like '%" . $searchValue . "%' or 
                     emp_des like '%" . $searchValue . "%' or 
                     emp_role like '%" . $searchValue . "%' or 
                     emp_teammb like '%" . $searchValue . "%' or 
                     emp_keyskill like '%" . $searchValue . "%' ) ";
               }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            //# Total number of records without filtering          
            $login_emp_name = $this->session->userdata('emp_name'); 
            $login_emp_id = $this->session->userdata('emp_id'); 
				$ops_id = $this->session->userdata('ops_id'); //OPs id
            $this->db->select('count(*) as allcount');
            $this->db->where('ops_id',$ops_id);           
            $this->db->where('emp_name',$login_emp_name);
            $this->db->or_where('tm_status',$login_emp_id);
            $this->db->from('users');
            
            if ($searchQuery != '') $this->db->where($searchQuery);

            // $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecords = $records[0]->allcount;

            
            //# Total number of record with filtering
            $login_emp_name = $this->session->userdata('emp_name'); 
            $login_emp_id = $this->session->userdata('emp_id'); 

            $this->db->select('count(*) as allcount');
            $this->db->where('ops_id',$ops_id);           
            $this->db->where('emp_name',$login_emp_name);
            $this->db->or_where('tm_status',$login_emp_id);
            $this->db->from('users');
            
            if ($searchQuery != '') $this->db->where($searchQuery);

            //   $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecordwithFilter = $records[0]->allcount;

            # Fetch records  
            $login_emp_name = $this->session->userdata('emp_name'); 
            $login_emp_id = $this->session->userdata('emp_id'); 

            $this->db->select('*');
            $this->db->where('emp_name',$login_emp_name);
            $this->db->where('ops_id',$ops_id);           
            $this->db->or_where('tm_status',$login_emp_id);
            $this->db->from('users');
            
            if ($searchQuery != '') $this->db->where($searchQuery);
            
            $this->db->order_by('id', 'desc');  // or desc
            
            $this->db->limit($rowperpage, $start);

            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();

            foreach ($records as $record) {
              
               if($record->status=="1")
               {
                     $reminder="checked";
               }
               else{
                  $reminder="";
               }

               $emp_des_part = '<center><span class="label label-danger" style="text">'.$record->emp_des.'</span></center>'; 

               $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord datable-act-btn" data-id="'.$record->id.'" data-emp_id="'.$record->emp_id.'" data-emp_name="'.$record->emp_name.'" data-emp_email="'.$record->emp_email.'" data-emp_mob="'.$record->emp_mob.'" data-emp_des="'.$record->emp_des.'" data-emp_role="'.$record->emp_role.'" data-emp_teammb="'.$record->emp_teammb.'" data-emp_keyskill="'.$record->emp_keyskill.'"><i class="ti-pencil"></i></a>
               <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm deleteRecord datable-act-btn" data-id="'.$record->id.'"><i class="ti-trash"></i></a>
               <label class="switch_active" data-toggle="tooltip" title="Active"><input type="checkbox"  '.$reminder.'   id="activeRecord" class="activeRecord"   data-id="'.$record->id.'"  data-status="'.$record->status.'" ><span class="slider round"></span></label>';
               
               if(!empty($record->emp_teammb)){
                  $strArray = explode(',', $record->emp_teammb);

                  $tm_user_ul_li = "<ul class='list-style-none'>";

                  foreach($strArray as $strArrays){
                     $tm_user_ul_li .= '<li style="width: max-content;"><i class="fa fa-check text-info"></i> '.$strArrays.'</li>';                  
                  }

                  $tm_user_ul_li .= "</ul>";

               } else{
                  $tm_user_ul_li = $record->emp_teammb;
               }             

               if(!empty($record->emp_keyskill)){
                  $strArray = explode(',', $record->emp_keyskill);

                  $emp_keyskill_user_ul_li = "";

                  foreach($strArray as $strArrays){
                     $emp_keyskill_user_ul_li .= '<span class="badge" style="background-color:#69727b;color: white;">'.$strArrays.'</span>';                  
                  }
               } else{
                  $emp_keyskill_user_ul_li = $record->emp_keyskill;
               } 

               $data[] = array(
               // "id" => $record->id,
               "emp_id" => $record->emp_id,
               "emp_name" => $record->emp_name,
               "emp_email" => $record->emp_email,
               "emp_mob" => $record->emp_mob,
               "emp_des" => $emp_des_part,
               "emp_role" =>$record->emp_role,
               "emp_teammb" => $tm_user_ul_li,
               "emp_keyskill" => $emp_keyskill_user_ul_li,
               "action" => $action            
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;
         }    

      }

      public function insertAdminOps($data){
         $this->db->insert('admin_ops', $data);
         $query =  $this->db->insert_id();
         return $query;
      }

      function insertAdminCode($admin_ops_code, $insert_id)
      {
         $this->db->set('ops_id', $admin_ops_code); //db name = form name
         $this->db->where('id', $insert_id);
         $result=$this->db->update('admin_ops');
         return $result;	
      }

      public function insertClient($data){
         $result = $this->db->insert('client', $data);         
         return $result;
      }

      function checkClientEmpid($client_id)
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->select('*');
         $this->db->from('client');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('client_emp_id', $client_id);
         $num_results = $this->db->count_all_results();
         // print_r($num_results);die();
         return $num_results;  
      }

      function checkAdminEmpid($ops_head_empid)
      {
         // $ops_id = $this->session->userdata('ops_id');
         $this->db->select('*');
         $this->db->from('users');
         // $this->db->where('ops_id', $ops_id);
         $this->db->where('emp_id', $ops_head_empid);
         $num_results = $this->db->count_all_results();
         // print_r($num_results);die();
         return $num_results;  
      }

      function check_user_empid_role_type($ops_head_empid)
      {
         // $ops_id = $this->session->userdata('ops_id');

         $emp_role_type = array('Operations Head', 'Team Leader', 'Team Member');    
         $this->db->distinct();
         $this->db->select('*');
         $this->db->from('users');
         // $this->db->where('ops_id', $ops_id);
         $this->db->where('emp_id', $ops_head_empid);
         $this->db->where_in('emp_role', $emp_role_type);   
         $num_results = $this->db->count_all_results();
         // print_r($this->db->last_query());die();
         return $num_results;  
      }

      function checkUserEmpID($client_emp_id)
      {
         // $ops_id = $this->session->userdata('ops_id');
         $this->db->select('*');
         $this->db->from('users');
         // $this->db->where('ops_id', $ops_id);
         $this->db->where('emp_id', $client_emp_id);
         $num_results = $this->db->count_all_results();
         // print_r($num_results);die();
         return $num_results;  
      }

      function checkClientEmpname($client_name)
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->select('*');
         $this->db->from('client');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('client_name', $client_name);
         $num_results = $this->db->count_all_results();
         // print_r($num_results);die();
         return $num_results;  
      }

      function checkClientEmpemail($client_email)
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->select('*');
         $this->db->from('client');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('client_email', $client_email);
         $num_results = $this->db->count_all_results();
         // print_r($num_results);die();
         return $num_results;  
      }

      function checkClientEmpmob($client_mob)
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->select('*');
         $this->db->from('client');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('client_mob', $client_mob);
         $num_results = $this->db->count_all_results();
         // print_r($num_results);die();
         return $num_results;  
      }

      public function get_last_client_id($id)
      {
         // $id = 'C0001';
         $this->db->select_max("client_id");
         $q=$this->db->get("client");
         $res=$q->result_array();
         if($this->db->affected_rows()>0)
         {
               foreach($res as $unique_key)
               {
                  $key_id=$unique_key['client_id'];
               }

               $key_id++;

         }
         else{
               $key_id="OOO1";
         }
         return $key_id;
         
      }
      
      function deptList(){
         $query=$this->db->get('dept');
         return $query->result();
      }

      function project_name_check($prt_name)
      { 
		   $ops_id = $this->session->userdata('ops_id');       
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('prt_name', $prt_name);
         $num_results = $this->db->count_all_results();
         // print_r($num_results);die();
         return $num_results;  

      }

      function checkDept($dept, $ops_id)
      {
         $this->db->select('*');
         $this->db->from('dept');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('dept', $dept);
         $num_results = $this->db->count_all_results();
         // print_r($num_results);die();
         return $num_results;  
      }

      function updateDept($dept, $id){
         $this->db->set('id', $id); //db name = form name
         $this->db->set('dept', $dept);
         $this->db->where('id', $id);
         $result=$this->db->update('dept');
         return $result;	
      }

      function updateAdminOps($ops_name, $id){
         $this->db->set('id', $id); //db name = form name
         $this->db->set('ops_name', $ops_name);
         $this->db->where('id', $id);
         $result=$this->db->update('admin_ops');
         return $result;	
      }

      function deleteDept($id){
         $this->db->where('id', $id);
         $result=$this->db->delete('dept');
         return $result;	
      }
      
      function deleteAdminOps($id){
         $this->db->where('id', $id);
         $result=$this->db->delete('admin_ops');
         return $result;	
      }

      function activeDept($id){
         $status = "1";
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('dept');
         return $result;	
      }
      
      function deactiveDept($id){
         $status = "0";
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('dept');
         return $result;	
      }

      function activeAdminOps($id){
         $status = "1";
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('admin_ops');
         return $result;	
      }
      
      function deactiveAdminOps($id){
         $status = "0";
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('admin_ops');
         return $result;	
      }              

      public function admin_ops_verify_report_data($postData)
      {
         $response = array();

         //$show = $postData['status'];
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value
            
         //# Search
         $search_arr = array();
         $searchQuery = "";

         if ($searchValue != '') {
            $search_arr[] = " (ops_name like '%" . $searchValue . "%') ";
            }

         if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);  
         }

            //# Total number of records without filtering  
         $this->db->select('count(*) as allcount');
         $this->db->from('admin_ops');
         
         if ($searchQuery != '') $this->db->where($searchQuery);

            // $this->db->where($postData_where);

         $records = $this->db->get()->result();

         $totalRecords = $records[0]->allcount;

         
            //# Total number of record with filtering
         $this->db->select('count(*) as allcount');
         $this->db->from('admin_ops');
         
         if ($searchQuery != '') $this->db->where($searchQuery);

         //   $this->db->where($postData_where);

         $records = $this->db->get()->result();

         $totalRecordwithFilter = $records[0]->allcount;

            # Fetch records  
         $this->db->select('*');
         $this->db->from('admin_ops');
         
         if ($searchQuery != '') $this->db->where($searchQuery);
         
         $this->db->order_by('id', 'desc');  // or desc
         
         $this->db->limit($rowperpage, $start);

         $records = $this->db->get()->result();
         // print_r($records);
         $data = array();

         foreach ($records as $record) {
            
            if($record->status=="1")
            {
                  $reminder="checked";
            }
            else{
               $reminder="";
            }
            
            //onclick=test("'.$record->id.'","'.$record->dept.'")

            $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord datable-act-btn" data-id="'.$record->id.'" data-ops_name="'.$record->ops_name.'"><i class="ti-pencil"></i></a>
            <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm deleteRecord datable-act-btn" data-id="'.$record->id.'"><i class="ti-trash"></i></a>
            <label class="switch_active" data-toggle="tooltip" title="Active"><input type="checkbox" '.$reminder.' id="activeRecord" class="activeRecord"   data-id="'.$record->id.'"  data-status="'.$record->status.'" ><span class="slider round"></span></label>';
            
            $data[] = array(
            // "id" => $record->id,
            "ops_name" => $record->ops_name,
            "action" => $action            
            );
         }
            //# Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
         );

         return $response;

      }

      public function client_verify_report_data($postData)
      {
         $response = array();
         //$show = $postData['status'];
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value
            
         //# Search
         $search_arr = array();
         $searchQuery = "";

         if ($searchValue != '') {
            $search_arr[] = " (client_name like '%" . $searchValue . "%' or 
                  client_emp_id like '%" . $searchValue . "%' or 
                  client_email like '%" . $searchValue . "%' or 
                  client_mob like '%" . $searchValue . "%' ) ";
            }

         if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);  
         }

         //# Total number of records without filtering  
			$ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->select('count(*) as allcount');
         $this->db->from('client');
         $this->db->where('ops_id', $ops_id);         
         if ($searchQuery != '') $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;
         
         //# Total number of record with filtering
         $this->db->select('count(*) as allcount');
         $this->db->from('client');
         $this->db->where('ops_id', $ops_id);               
         if ($searchQuery != '') $this->db->where($searchQuery);
         //   $this->db->where($postData_where);
         $records = $this->db->get()->result();

         $totalRecordwithFilter = $records[0]->allcount;

         # Fetch records  
         $this->db->select('*');
         $this->db->from('client');
         $this->db->where('ops_id', $ops_id);                        
         if ($searchQuery != '') $this->db->where($searchQuery);         
         $this->db->order_by('id', 'desc');  // or desc         
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         // print_r($records);
         $data = array();

         foreach ($records as $record) {

               if($record->status=="1")
               {
                   $reminder="checked";
               }
               else{
                  $reminder="";
               }

               //onclick=test("'.$record->id.'", "'.$record->client_name.'", "'.$record->client_email.'", "'.$record->client_mob.'")

            $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord datable-act-btn" data-id="'.$record->id.'" data-client_name="'.$record->client_name.'" data-client_email="'.$record->client_email.'" data-client_mob="'.$record->client_mob.'" data-client_emp_id="'.$record->client_emp_id.'"><i class="ti-pencil"></i></a>
            <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm deleteRecord datable-act-btn" data-id="'.$record->id.'" data-client_emp_id="'.$record->client_emp_id.'"><i class="ti-trash"></i></a>
            <label class="switch_active" data-toggle="tooltip" title="Active" ><input type="checkbox"  '.$reminder.'   id="activeRecord" class="activeRecord"   data-id="'.$record->id.'"  data-status="'.$record->status.'" ><span class="slider round"></span></label>';
            
            if($record->client_mob == "0")
            {
               $client_mob = "";
            }
            else{
               $client_mob = $record->client_mob;               
            }
            
            $data[] = array(
            // "id" => $record->id,
            "client_emp_id" => $record->client_emp_id,
            "client_name" => $record->client_name,
            "client_email" =>$record->client_email,
            "client_mob" => $client_mob,
            "action" => $action            
            );
         }
            //# Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
         );

         return $response;

      }

      function updateClient($id, $client_name, $client_email, $client_mob){
         $this->db->set('id', $id); //db name = form name
         $this->db->set('client_name', $client_name); //db name = form name
         $this->db->set('client_email', $client_email); //db name = form name
         $this->db->set('client_mob', $client_mob);
         $this->db->where('id', $id);
         $result=$this->db->update('client');
         return $result;	
      }

      function updateUserTableClient($client_emp_id, $client_name, $client_email, $client_mob){
         // $ops_id = $this->session->userdata('ops_id');
         $this->db->set('emp_name', $client_name); //db name = form name
         $this->db->set('emp_email', $client_email); //db name = form name
         $this->db->set('emp_mob', $client_mob);
         $this->db->where('emp_id', $client_emp_id);
         // $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function updateAdminUpdateUserTable($data){
         $this->db->set('emp_name', $data['emp_name']); //db name = form name
         $this->db->set('emp_email', $data['emp_email']); //db name = form name
         $this->db->set('emp_mob', $data['emp_mob']);
         $this->db->set('emp_role', $data['emp_role']); //db name = form name
         $this->db->set('ops_name', $data['ops_name']); //db name = form name
         $this->db->set('status', $data['status']); //db name = form name
         $this->db->set('ops_id', $data['ops_id']); //db name = form name
         $this->db->where('emp_id', $data['emp_id']);
         // $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function update_user_tb_to_tl($data){
         $this->db->set('emp_name', $data['emp_name']); //db name = form name
         $this->db->set('emp_email', $data['emp_email']); //db name = form name
         $this->db->set('emp_mob', $data['emp_mob']);
         $this->db->set('emp_des', $data['emp_des']);
         $this->db->set('tl_role_type', $data['tl_role_type']);
         $this->db->set('emp_teammb', $data['emp_teammb']); //db name = form name
         $this->db->set('emp_keyskill', $data['emp_keyskill']); //db name = form name
         $this->db->set('emp_role', $data['emp_role']); //db name = form name
         $this->db->set('ops_name', $data['ops_name']); //db name = form name
         $this->db->set('ops_id', $data['ops_id']); //db name = form name
         $this->db->set('status', $data['status']); //db name = form name
         $this->db->set('tm_status', $data['ops_id']); //db name = form name
         $this->db->where('emp_id', $data['emp_id']);
         // $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function update_user_tb_to_tm($data){
         $this->db->set('emp_name', $data['emp_name']); //db name = form name
         $this->db->set('emp_email', $data['emp_email']); //db name = form name
         $this->db->set('emp_mob', $data['emp_mob']);
         $this->db->set('emp_des', $data['emp_des']);
         $this->db->set('tm_role_type', $data['tm_role_type']);
         $this->db->set('emp_teammb', $data['emp_teammb']); //db name = form name
         $this->db->set('emp_keyskill', $data['emp_keyskill']); //db name = form name
         $this->db->set('emp_role', $data['emp_role']); //db name = form name
         $this->db->set('ops_name', $data['ops_name']); //db name = form name
         $this->db->set('ops_id', $data['ops_id']); //db name = form name
         $this->db->set('status', $data['status']); //db name = form name
         $this->db->set('tm_status', $data['ops_id']); //db name = form name
         $this->db->where('emp_id', $data['emp_id']);
         // $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('users');
         return $result;	
      }

      function deleteClient($id){
         $this->db->where('id', $id);
         $result=$this->db->delete('client');
         return $result;	
      }

      function deleteUserTableClient($client_emp_id){
         $this->db->where('emp_id', $client_emp_id);
         $result=$this->db->delete('users');
         return $result;	
      }

      function activeClient($id){
         $status = "1";
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('client');
         return $result;	
      }
      
      function deactiveClient($id){
         $status = "0";
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('client');
         return $result;	
      }

      function fetch_tm_usertb()
      {
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->select('emp_name');
         $this->db->from('users');
         $this->db->where('emp_role', 'Team Member');
         $this->db->where('tm_status', '0');
         $this->db->where('ops_id', $ops_id);
         $query = $this->db->get();
         return $query->result();
      }      

      function fetch_un_selected_tm_usertb()
      {
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->select('emp_name');
         $this->db->from('users');
         $this->db->where('emp_role', 'Team Member');
         $this->db->where('status', '1');
         $this->db->where('tm_status', '0');
         $this->db->where('ops_id', $ops_id);
         $query = $this->db->get();
         $optionsResult = $query->result();
         // print_r($optionsResult);die();

         $output = '<option value="">Team Member</option>';                       

         if($optionsResult){

            foreach ($optionsResult as $record) {  
            
               $output .= '<option value="'.$record->emp_name.'">'.$record->emp_name.'</option>';                                                                                                      
                           
            }               

         }else{
               $output="<option>No Team Member Available</option>";
         }             

         return $output;   
         // return $query->result();
      }

      function select_dept_div_opt($project_ops_filter)
      {
         //Get ops id
         $this->db->select('ops_id');
         $this->db->from('admin_ops');
         $this->db->where('ops_name', $project_ops_filter);
         $ops_id = $this->db->get()->row()->ops_id;
         // print_r($optionsResult);die();

         //Get dept option list
         $this->db->select('dept');
         $this->db->from('dept');
         $this->db->where('ops_id', $ops_id);
         $query = $this->db->get();
         $optionsResult = $query->result();

         $output = '<option value="">Select Department</option>';                       

         if($optionsResult){

            foreach ($optionsResult as $record) {  
            
               $output .= '<option value="'.$record->dept.'">'.$record->dept.'</option>';                                                                                                      
                           
            }               

         }else{
               $output='<option value="">No Department Available</option>';
         }             

         return $output;   
         // return $query->result();
      }

      function fetch_user_tm()
      {
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $login_id = $this->session->userdata('emp_id'); 
         $this->db->select('emp_name');
         $this->db->from('users');
         $this->db->where('emp_role', 'Team Member');
         $this->db->where('tm_status', $login_id);
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $query = $this->db->get();
         return $query->result();
      }

      function fetch_user_tm_task()
      {
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $login_id = $this->session->userdata('emp_id'); 
         $this->db->select('emp_name');
         $this->db->from('users');
         $this->db->where('emp_role', 'Team Member');
         $this->db->where('tm_status', $login_id);
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $query = $this->db->get();
         return $query->result();
      }

      function fetch_admin_ops_name()
      {
         $this->db->select('ops_name');
         $this->db->from('admin_ops');
         $this->db->where('status', '1');
         $query = $this->db->get();
         return $query->result();
      }

      function fetch_prt_name()
      {
         $this->db->select('prt_name');
         $this->db->from('project');
         $this->db->where('status', '1');
         $query = $this->db->get();
         return $query->result();
      }

      function fetch_tl_list()
      {
         $this->db->select('emp_name');
         $this->db->from('users');
         $this->db->where('emp_role', 'Team Leader');        
         $this->db->where('status', '1');
         $query = $this->db->get();
         return $query->result();
      }

      function fetch_addtask_prt_team_member_li($prt_name)
      {
         $ops_id = $this->session->userdata('ops_id'); //login user name						
         $this->db->select('prt_tm');
         $this->db->from('project');
         $this->db->where('prt_name', $prt_name);        
         $this->db->where('ops_id', $ops_id);        
         $query = $this->db->get();
         $optionsResult = $query->result();

         foreach ($optionsResult as $record) {
            if(!empty($record->prt_tm)){
               $strArray = explode(',', $record->prt_tm);

               $output = '<option value="">Team Member</option>';
         
               foreach($strArray as $strArrays)
               {
                  $output .= '<option value="'.$strArrays.'">'.$strArrays.'</option>';              
               }
                           
            }else{
               $output="<option>No Team Member Available</option>";
            }
            
            return $output;              
                          
         }                   

         // return $query->result();
      }

      function fetch_addtask_prt_team_member_li_edit($prt_name, $task_code)
      {
         $ops_id = $this->session->userdata('ops_id'); //login user name						
         $this->db->select('prt_tm');
         $this->db->from('project');
         $this->db->where('prt_name', $prt_name);        
         $this->db->where('ops_id', $ops_id);        
         $query = $this->db->get();
         $optionsResult = $query->result();

         foreach ($optionsResult as $record) {
            if(!empty($record->prt_tm)){
               $strArray = explode(',', $record->prt_tm);

               $output = '<option value="">Team Member</option>';
         
               foreach($strArray as $strArrays)
               {
                  $this->db->where('tm_task', $strArrays);        
                  $this->db->where('task_code', $task_code);        
                  $query = $this->db->get('task');
                  // print_r($query->result());die();

                  if($query->result()){
                     $reminder="selected";
                  }else
                  {
                     $reminder="";
                  }  

                  $output .= '<option value="'.$strArrays.'"  '.$reminder.'>'.$strArrays.'</option>';              
               }
                           
            }else{
               $output="<option>No Team Member Available</option>";
            }
            
            return $output;              
                          
         }                   

         // return $query->result();
      }

      function fetch_team_member_li($team_leader, $project_code)
      {
         $this->db->select('emp_id');
         $this->db->from('users');
         $this->db->where('emp_name', $team_leader);        
         $this->db->where('status', '1');
         $emp_id = $this->db->get()->row()->emp_id;
         //  echo '<pre>';print_r($emp_id);die();

         $this->db->select('emp_name, emp_id');
         $this->db->from('users');
         $this->db->where('tm_status', $emp_id);        
         $this->db->where('status', '1');
         $query = $this->db->get();
         $optionsResult = $query->result();
         //  echo '<pre>';print_r($optionsResult);die();

         if(count($optionsResult)>0){
            $output = '<option value="">Team Member</option>';
        
              foreach($optionsResult as $row)
              {
                  $this->db->where('project_teammem_id', $row->emp_id);        
                  $this->db->where('project_code', $project_code);        
                  $query = $this->db->get('project_team_member');
                  // print_r($query->result());die();

                  if($query->result()){
                     $reminder="selected";
                  }else
                  {
                     $reminder="";
                  }  
                  $output .= '<option value="'.$row->emp_name.'" '.$reminder.'>'.$row->emp_name.'</option>';              
               }
            
               $this->db->where('project_teammem_id', $emp_id);        
               $this->db->where('project_code', $project_code);        
               $query = $this->db->get('project_team_member');
               // print_r($query->result());die();

               if($query->result()){
                  $reminder="selected";
               }else
               {
                  $reminder="";
               }  
               
            $output .= '<option value="'.$team_leader.'" '.$reminder.'>'.$team_leader.'</option>';              
            
         }elseif($emp_id){
               $this->db->where('project_teammem_id', $emp_id);        
               $this->db->where('project_code', $project_code);        
               $query = $this->db->get('project_team_member');
               // print_r($query->result());die();

               if($query->result()){
                  $reminder="selected";
               }else
               {
                  $reminder="";
               }  

               $output = '<option value="" >Team Member</option>';

               $output .= '<option value="'.$team_leader.'" '.$reminder.'>'.$team_leader.'</option>';              
            
         }else{
             $output="<option>No Team Member Available</option>";
         }
            
            return $output;
              
      }
      
      function fetch_tm_userpg_li($team_leader_id)
      {
        
         //Team leader teams
			$ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->select('emp_name,emp_id');
         $this->db->from('users');
         $this->db->where('tm_status', $team_leader_id);        
         $this->db->where('status', '1');
         $this->db->where('ops_id', $ops_id);
         $query = $this->db->get();
         $optionsResult = $query->result();
         // print_r($optionsResult);die();

         $output = '<option value="">Team Member</option>';

         if($optionsResult){

            foreach($optionsResult as $row){
               $output .= '<option value="'.$row->emp_name.'" selected>'.$row->emp_name.'</option>';  
            }
         // print_r("dd");die();

         }      
         
         $this->db->select('emp_name');
         $this->db->from('users');
         $this->db->where('emp_role', 'Team Member');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('tm_status', '0');
         $query = $this->db->get()->result();
         // print_r($query);die();
         // return $query->result();

         if($query){

            foreach($query as $row){
               $output .= '<option value="'.$row->emp_name.'">'.$row->emp_name.'</option>';  
            }
         // print_r("dd");die();

         }  

         // print_r($output);die();
         return $output;

      }
      
      function fetch_tl_userpg_li($emp_id)
      {

         //Team leader teams
			$ops_id = $this->session->userdata('ops_id'); //OPs id
			// $emp_id = $this->session->userdata('emp_id'); //OPs id
         $this->db->select('emp_name,emp_id');
         $this->db->from('users');
         $this->db->where('emp_role', "Team Leader");        
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $this->db->where('tm_status', $emp_id);
         $query = $this->db->get();
         $optionsResult = $query->result();
         // print_r($optionsResult);die();

         $output = '<option value="">Team Leader</option>';

         if($optionsResult){

            foreach($optionsResult as $row){
               $output .= '<option value="'.$row->emp_name.'" selected>'.$row->emp_name.'</option>';  
            }
         // print_r("dd");die();

         }      
         
         $this->db->select('emp_name');
         $this->db->from('users');
         $this->db->where('emp_role', "Team Leader");       
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');       
         $this->db->where('tm_status', '0');
         $query = $this->db->get()->result();
         // print_r($query);die();
         // return $query->result();

         if($query){

            foreach($query as $row){
               $output .= '<option value="'.$row->emp_name.'">'.$row->emp_name.'</option>';  
            }
         // print_r("dd");die();

         }  

         // print_r($output);die();
         return $output;
      }
      
      function project_upload($data){
         
         $result= $this->db->insert('project',$data);
         return $result;
      }   

      function project_form_id_select($id)
      {
         $this->db->select('id');
         $this->db->from('users');
         $this->db->where('emp_role', 'teamleader');
         $this->db->where('status', '1');
         $query = $this->db->get();
         return $query->result();
      }

      function project_insert($data){
         
         // $this->db->insert('project',$data);
         // $query = $this->db->get();
         // return $query->result_array();
         $this->db->insert('project', $data);
         $query =  $this->db->insert_id();
         return $query;

         // $result= $this->db->insert('project',$data);
         // return $result;
      }   

      public function auto()
	  {
         $this->db->select('*');
         $this->db->from('project');
         $query = $this->db->get();
         return $query->result_array();
	    
	  }

     public function prt_tm_old_delete($project_code)
	  {
       //delete old team meamber
       $this->db->where('project_code', $project_code);
       $result=$this->db->delete('project_team_member');
       return $result;
     }

     public function delete_old_tm_list($emp_id)
	  {
       //delete old team meamber
      //  print_r($emp_id);die();
       $this->db->set('tm_status', "0");
       $this->db->where('tm_status', $emp_id);
       $result=$this->db->update('users');
       return $result;
      }

     function prt_team_member_update($table, $project_code, $prt_tm_list_sep, $created_by, $ops_id)
     {       
        //Update tm
         $this->db->select('emp_id')->from('users')->where('emp_name', $prt_tm_list_sep)->where('ops_id', $ops_id);

         $project_teammem_id = $this->db->get()->row()->emp_id;

         $data = array(
            "ops_id" => $ops_id,
            "project_code" => $project_code,
            "project_teammem_id" => $project_teammem_id,
            "created_by" => $created_by,
         );

         $result = $this->db->insert($table, $data);
         return $result;
             
      
     }            

      public function insertProjectCodetoTask($task_name) {
             
         $this->db->select('project_code')->from('project')->where('prt_name', $task_name);

         $project_teammem_code = $this->db->get()->row()->project_code;       

         $this->db->set('project_code', $project_teammem_code);
         $this->db->where('task_name', $task_name);
         $result=$this->db->update('task');
         return $result;
      }
      
      public function importTaskData($table, $data) {
         $result = $this->db->insert_batch($table, $data);
         return $result;
      }

      function large_verify_data($project_code){
   
         $response = array();
         
         $this->db->select('file_upload');
         $this->db->where('prt_id',$project_code);						
         // print_r($this->db->last_query());die;
         $result = $this->db->get('project_file_upload');
         $qf = $result->result_array();
         
         // echo '<pre>';print_r($qf);die();	
            
         $ids = array_map(function($item) { return $item['file_upload']; }, $qf);
         $file_upload = implode(', ', $ids);

         $response = array(			
         "file_upload" => $file_upload,
         );

         return $response;
      }

      function view_task_data_prt($project_code, $postData){
         
         // $this->db->select('task_code')->from('task')->where('project_code', $project_code);
         // $task_code = $this->db->get()->row()->task_code;

         // if($task_code_output){
         //    $task_code = $task_code_output;
         // }else{
         //    $task_code =""
         // }

         $response = array();

         //$show = $postData['status'];
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value
         
         //# Search
         $search_arr = array();
         $searchQuery = "";

         if ($searchValue != '') {
            $search_arr[] = " (task_update_date like '%" . $searchValue . "%' or 
               emp_name like '%" . $searchValue . "%' or 
               comment like '%" . $searchValue . "%' ) ";
            }

         if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);  
         }

         //# Total number of records without filtering          

         // $task_code = $this->session->userdata('task_code'); 
         // SELECT t.* FROM task t INNER JOIN project p ON t.project_code = p.project_code WHERE p.project_code="P0013";

         $this->db->select('t.*');
         $this->db->from('task as t');
         $this->db->join('project as p', 't.project_code = p.project_code', 'INNER');
         $this->db->where('p.project_code', $project_code);   
         
         if ($searchQuery != '') $this->db->where($searchQuery);

         // $this->db->where($postData_where);

         $records = $this->db->get()->result();

         $totalRecords = count($records);

      
         //# Total number of record with filtering
         // $task_code = $this->session->userdata('task_code'); 
         $this->db->select('t.*');
         $this->db->from('task as t');
         $this->db->join('project as p', 't.project_code = p.project_code', 'INNER');
         $this->db->where('p.project_code', $project_code); 
         
         if ($searchQuery != '') $this->db->where($searchQuery);

         //   $this->db->where($postData_where);

         $records = $this->db->get()->result();

         $totalRecordwithFilter = count($records);

            # Fetch records              
         // $task_code = $this->session->userdata('task_code'); 
         $this->db->select('t.*');
         $this->db->from('task as t');
         $this->db->join('project as p', 't.project_code = p.project_code', 'INNER');
         $this->db->where('p.project_code', $project_code); 
         
         if ($searchQuery != '') $this->db->where($searchQuery);
         
         $this->db->order_by('id', 'desc');  // or desc
         
         $this->db->limit($rowperpage, $start);

         $records = $this->db->get()->result();
         // print_r($records);
         $data = array();

         // $this->db->select('tl_task_status')->from('task')->where('task_code', $task_code);
         // $tl_task_status = $this->db->get()->row()->tl_task_status;
     
         foreach ($records as $record) { 
                           
            $sampleDate = $record->created_on;
            $convertDate = date("d-m-Y", strtotime($sampleDate));

            if($record->tm_task_status == "Pending"){
               $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
            }elseif($record->tm_task_status == "To Do"){
               $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
            }elseif($record->tm_task_status == "Doing"){
               $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
            }elseif($record->tm_task_status == "Completed"){
               $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
            }

            if($record->tm_task_status == "Completed"){
               $task_completed_on = $record->task_completed_on;
               $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
               
               // $task_completed_on = $record->tm_task_status; 
            }else{
               $task_completed_on = "";
            }

            // $date = $record->task_update_date->format('d/m/Y');
            
            $data[] = array(
            // "id" => $record->id,
            "created_on" => $convertDate,
            "task_detail" =>$record->task_detail,
            "task_status" =>$tm_task_status_btn,
            "task_completed_on" =>$task_completed_on,
            );
         }
            //# Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
         );

         return $response;
         
      }

      function view_task_remark_prt($task_code, $postData)
      {        
        
         if($this->session->userdata('role') == "Operations Head" || $this->session->userdata('role') == "Team Leader" || $this->session->userdata('role') == "Client")
         {       
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
            
            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = " (task_update_date like '%" . $searchValue . "%' or 
                  tm_task_status like '%" . $searchValue . "%' or 
                  comment like '%" . $searchValue . "%' ) ";
               }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            //# Total number of records without filtering          

            // $task_code = $this->session->userdata('task_code'); 

            // $task_code = $this->session->userdata('task_code'); 
            $login_emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('count(*) as allcount');
            // $this->db->where('emp_name',$login_emp_name);
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update');          
            
            if ($searchQuery != '') $this->db->where($searchQuery);

            // $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecords = $records[0]->allcount;
         
            //# Total number of record with filtering
            // $task_code = $this->session->userdata('task_code'); 
            $login_emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('count(*) as allcount');
            // $this->db->where('emp_name',$login_emp_name);
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update'); 
            
            if ($searchQuery != '') $this->db->where($searchQuery);

            //   $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecordwithFilter = $records[0]->allcount;

               # Fetch records              
            // $task_code = $this->session->userdata('task_code'); 
            $login_emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('*');
            // $this->db->where('emp_name',$login_emp_name);
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update'); 

            if ($searchQuery != '') $this->db->where($searchQuery);
            
            $this->db->order_by('id', 'desc');  // or desc
            
            $this->db->limit($rowperpage, $start);

            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();

            $index= 0;

            foreach ($records as $record) { 
                              
               $sampleDate = $record->task_update_date;
               $convertDate = date("d-m-Y", strtotime($sampleDate));

               // $date = $record->task_update_date->format('d/m/Y');
               
               $date=date_create();
		         $today_date = date_format($date,"Y-m-d");
               // print_r($today_date);die();

               $today_date_created_on = $record->created_on;
               $today_date_created_on = date("Y-m-d", strtotime($today_date_created_on));
               // print_r($today_date_created_on);die();

               if($today_date_created_on == $today_date){
                  if($record->emp_name == $login_emp_name){
                     $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm tb_edit dailytaskeditRecord" onclick="rowedit('.$index.','.$record->id.')" data-id="'.$record->id.'" data-index="'.$index.'" data-comment="'.$record->comment.'" data-task_update_date="'.$record->task_update_date.'"  data-tm_task_status="'.$record->tm_task_status.'"><i class="ti-pencil"></i></a>';
                  }else{
                     $action = "";
                  }
               }else{
                  $action = "";
               }
               
               if($record->tm_task_status == "Pending"){
                  $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "To Do"){
                  $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "Doing"){
                  $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "Completed"){
                  $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == ""){
                  $tm_task_status_btn ="";
               }

               $data[] = array(
               // "id" => $record->id,
               "task_update_date" => $convertDate,
               "comment" =>$record->comment,
               "tm_task_status" =>$tm_task_status_btn,
               "action" =>$action,
               );

               $index++;
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;
            
         }else if($this->session->userdata('role') == 'Team Member'){
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
            
            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = " (task_update_date like '%" . $searchValue . "%' or 
                  tm_task_status like '%" . $searchValue . "%' or 
                  comment like '%" . $searchValue . "%' ) ";
               }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            //# Total number of records without filtering          

            // $task_code = $this->session->userdata('task_code'); 

            // $task_code = $this->session->userdata('task_code'); 
            $login_emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('count(*) as allcount');
            $this->db->where('emp_name',$login_emp_name);
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update');          
            
            if ($searchQuery != '') $this->db->where($searchQuery);

            // $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecords = $records[0]->allcount;

         
            //# Total number of record with filtering
            // $task_code = $this->session->userdata('task_code'); 
            $login_emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('count(*) as allcount');
            $this->db->where('emp_name',$login_emp_name);
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update');             
            if ($searchQuery != '') $this->db->where($searchQuery);
            $records = $this->db->get()->result();
            $totalRecordwithFilter = $records[0]->allcount;

               # Fetch records              
            // $task_code = $this->session->userdata('task_code'); 
            $login_emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('*');
            $this->db->where('emp_name',$login_emp_name);
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update'); 

            if ($searchQuery != '') $this->db->where($searchQuery);
            
            $this->db->order_by('id', 'desc');  // or desc
            
            $this->db->limit($rowperpage, $start);

            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();

            $index= 0;

            foreach ($records as $record) { 
                              
               $sampleDate = $record->task_update_date;
               $convertDate = date("d-m-Y", strtotime($sampleDate));

               $date=date_create();
		         $today_date = date_format($date,"Y-m-d");
               // print_r($today_date);die();

               $today_date_created_on = $record->created_on;
               $today_date_created_on = date("Y-m-d", strtotime($today_date_created_on));
               // print_r($today_date_created_on);die();

               if($today_date_created_on == $today_date){
                  $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm tb_edit dailytaskeditRecord" onclick="rowedit('.$index.','.$record->id.')" data-id="'.$record->id.'" data-index="'.$index.'" data-comment="'.$record->comment.'" data-task_update_date="'.$record->task_update_date.'"  data-tm_task_status="'.$record->tm_task_status.'"><i class="ti-pencil"></i></a>';

               }else{
                  $action = "";
               }
               // $date = $record->task_update_date->format('d/m/Y');

               if($record->tm_task_status == "Pending"){
                  $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "To Do"){
                  $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "Doing"){
                  $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "Completed"){
                  $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == ""){
                  $tm_task_status_btn ="";
               }

               $data[] = array(
               // "id" => $record->id,
               // "action" => $action,
               "action" => $action,
               "task_update_date" => $convertDate,
               "comment" =>$record->comment,
               "tm_task_status" =>$tm_task_status_btn,
               );

               $index++;
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;
            
         }
         
      }

      
      // function project_update($id, $prt_name, $prt_des, $prt_priority, $prt_client, $prt_dept, $prt_tl)
      // {
      //    $this->db->set('id', $id); //db name = form name
      //    $this->db->set('prt_name', $prt_name); //db name = form name
      //    $this->db->set('prt_des', $prt_des);
      //    $this->db->set('prt_priority', $prt_priority);
      //    $this->db->set('prt_client', $prt_client);
      //    $this->db->set('prt_dept', $prt_dept);
      //    $this->db->set('prt_tl', $prt_tl);
      //    $this->db->where('id', $id);
      //    $result=$this->db->update('project');
      //    return $result;	
      // }

      function project_update($id, $update_data)
      {         
         $this->db->where('id', $id);
         $result=$this->db->update('project', $update_data);
         return $result;	
      }

      function updateProjectstatus($id, $prt_status)
      {
         $this->db->set('id', $id); //db name = form name
         $this->db->set('tl_prt_status', $prt_status); //db name = form name
         $this->db->where('id', $id);
         $result=$this->db->update('project');
         return $result;	
      }

      function updateProjectTeamMember($id, $prt_tm_list)
      {
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->set('prt_tm', $prt_tm_list); //db name = form name
         $this->db->where('id', $id);
         $this->db->where('ops_id', $ops_id);
         $result=$this->db->update('project');
         return $result;	
      }

      function project_file_update($table, $data)
      {
         // $this->db->set('prt_id', $id); //db name = form name
         // $this->db->set('file_upload', $file_upload);
         // $this->db->where('prt_id', $id);
         // $result=$this->db->update('project_file_upload');
         // return $result;	

         $res = $this->db->insert_batch($table, $data);
         //echo $this->db->last_query();exit;
         if ($res) {
               return TRUE;
         } else {
               return FALSE;
         }
         
      }
      
      function deleteImg($sample_file_name){
         $this->db->where('file_upload', $sample_file_name);
         $result=$this->db->delete('project_file_upload');
         return $result;	
      }

      public function insertTask($data){      
         $this->db->insert('task', $data);
         $query =  $this->db->insert_id();
         return $query;
      }

      function task_file_update($table, $data)
      {
         // $this->db->set('prt_id', $id); //db name = form name
         // $this->db->set('file_upload', $file_upload);
         // $this->db->where('prt_id', $id);
         // $result=$this->db->update('project_file_upload');
         // return $result;	

         $res = $this->db->insert_batch($table, $data);
         //echo $this->db->last_query();exit;
         if ($res) {
               return TRUE;
         } else {
               return FALSE;
         }
         
      }

      // public function task_verify_report_data($postData)
      // {
      //    if($this->session->userdata('role') == "Head")
      //    {
      //       $response = array();

      //       //$show = $postData['status'];
      //       $draw = $postData['draw'];
      //       $start = $postData['start'];
      //       $rowperpage = $postData['length']; // Rows display per page
      //       $columnIndex = $postData['order'][0]['column']; // Column index
      //       $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      //       $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      //       $searchValue = $postData['search']['value']; // Search value
               
      //       //# Search
      //       $search_arr = array();
      //       $searchQuery = "";

      //       if ($searchValue != '') {
      //          $search_arr[] = " (task_name like '%" . $searchValue . "%' or 
      //                tl_task like '%" . $searchValue . "%' or 
      //                task_detail like '%" . $searchValue . "%' or 
      //                tl_task_status like '%" . $searchValue . "%' or 
      //                tm_task like '%" . $searchValue . "%' ) ";
      //          }

      //       if (count($search_arr) > 0) {
      //          $searchQuery = implode(" and ", $search_arr);  
      //       }

      //       //# Total number of records without filtering          

      //       $this->db->select('count(*) as allcount');
      //       $this->db->from('task');
            
      //       if ($searchQuery != '') $this->db->where($searchQuery);

      //          // $this->db->where($postData_where);

      //       $records = $this->db->get()->result();

      //       $totalRecords = $records[0]->allcount;

            
      //          //# Total number of record with filtering
      //       $this->db->select('count(*) as allcount');
      //       $this->db->from('task');
            
      //       if ($searchQuery != '') $this->db->where($searchQuery);

      //       //   $this->db->where($postData_where);

      //       $records = $this->db->get()->result();

      //       $totalRecordwithFilter = $records[0]->allcount;

      //          # Fetch records  
      //       $this->db->select('*');
      //       $this->db->from('task');
            
      //       if ($searchQuery != '') $this->db->where($searchQuery);
            
      //       $this->db->order_by('id', 'desc');  // or desc
            
      //       $this->db->limit($rowperpage, $start);

      //       $records = $this->db->get()->result();
      //       // print_r($records);

      //       $data = array();
		//       $file_upload = "";


      //       foreach ($records as $record) {               

      //          if($record->status=="1")
      //          {
      //                $reminder="checked";
      //          }
      //          else{
      //             $reminder="";
      //          }

      //          $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'.$record->id.'"  data-task_name="'.$record->task_name.'" data-tl_task="'.$record->tl_task.'"  data-task_detail="'.$record->task_detail.'"><i class="ti-pencil"></i></a>
      //          <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-1 deleteRecord" data-id="'.$record->id.'"><i class="ti-trash"></i></a>
      //          <label class="switch_active"><input type="checkbox"  '.$reminder.'   id="activeRecord" class="activeRecord"   data-id="'.$record->id.'"  data-status="'.$record->status.'" ><span class="slider round"></span></label>
      //          <a href="dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 viewTaskRecord" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
              
      //          if($record->tl_task_status == "Incomplete"){
      //             $tl_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }elseif($record->tl_task_status == "To Do"){
      //             $tl_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }elseif($record->tl_task_status == "Doing"){
      //             $tl_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }elseif($record->tl_task_status == "Completed"){
      //             $tl_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }
               
      //          if(!empty($record->tm_task)){
      //             $strArray = explode(',', $record->tm_task);

      //             $tm_task_clr = "<ul class='list-style-none'>";

      //             foreach($strArray as $strArrays){
      //                $tm_task_clr .= '<li style="width: max-content;"><i class="fa fa-check text-info"></i> '.$strArrays.'</li>';                  
      //             }

      //             $tm_task_clr .= "</ul>";
                  
      //          } else{
      //             $tm_task_clr = $record->tm_task;
      //          }    

      //          $data[] = array(
      //          // "id" => $record->id,
      //          "task_name" => $record->task_name,
      //          "tl_task" => $record->tl_task,
      //          "task_detail" => $record->task_detail,
      //          "tl_task_status" => $tl_task_status_btn,
      //          "tm_task" =>$tm_task_clr,
      //          // "view_report" => $file_upload,
      //          "action" => $action            
      //          );
      //       }
      //          //# Response
      //       $response = array(
      //          "draw" => intval($draw),
      //          "iTotalRecords" => $totalRecords,
      //          "iTotalDisplayRecords" => $totalRecordwithFilter,
      //          "aaData" => $data
      //       );

      //       return $response;      
      //    }
      //    else if($this->session->userdata('role') == 'Team Leader'){
      //       $response = array();

      //       //$show = $postData['status'];
      //       $draw = $postData['draw'];
      //       $start = $postData['start'];
      //       $rowperpage = $postData['length']; // Rows display per page
      //       $columnIndex = $postData['order'][0]['column']; // Column index
      //       $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      //       $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      //       $searchValue = $postData['search']['value']; // Search value
               
      //       //# Search
      //       $search_arr = array();
      //       $searchQuery = "";

      //       if ($searchValue != '') {
      //          $search_arr[] = " (task_name like '%" . $searchValue . "%' or 
      //                tl_task like '%" . $searchValue . "%' or 
      //                task_detail like '%" . $searchValue . "%' or 
      //                tl_task_status like '%" . $searchValue . "%' or 
      //                tm_task like '%" . $searchValue . "%' ) ";
      //          }

      //       if (count($search_arr) > 0) {
      //          $searchQuery = implode(" and ", $search_arr);  
      //       }

      //       //# Total number of records without filtering          
      //       $login_emp_name = $this->session->userdata('emp_name'); 
      //       $this->db->select('count(*) as allcount');
      //       $this->db->where('tl_task',$login_emp_name);
      //       // $this->db->or_where('status',$login_emp_name);
      //       $this->db->from('task');
            
      //       if ($searchQuery != '') $this->db->where($searchQuery);

      //       // $this->db->where($postData_where);

      //       $records = $this->db->get()->result();

      //       $totalRecords = $records[0]->allcount;

            
      //       //# Total number of record with filtering
      //       $login_emp_name = $this->session->userdata('emp_name'); 
      //       $this->db->select('count(*) as allcount');
      //       $this->db->where('tl_task',$login_emp_name);
      //       // $this->db->or_where('status',$login_emp_name);
      //       $this->db->from('task');
            
      //       if ($searchQuery != '') $this->db->where($searchQuery);

      //       //   $this->db->where($postData_where);

      //       $records = $this->db->get()->result();

      //       $totalRecordwithFilter = $records[0]->allcount;

      //       # Fetch records  
      //       $login_emp_name = $this->session->userdata('emp_name'); 
      //       $this->db->select('*');
      //       $this->db->where('tl_task',$login_emp_name);
      //       // $this->db->or_where('status',$login_emp_name);
      //       $this->db->from('task');
            
      //       if ($searchQuery != '') $this->db->where($searchQuery);
            
      //       $this->db->order_by('id', 'desc');  // or desc
            
      //       $this->db->limit($rowperpage, $start);

      //       $records = $this->db->get()->result();
      //       // print_r($records);
      //       $data = array();

      //       foreach ($records as $record) {              
             
      //          // $view_report = '<center><span class="label label-success"  data-toggle="modal" data-target="#viewmodel">View</span></center> onclick=test("'.$record->id.'", "'.$record->prt_tl.'"'; 

      //          $action = '<a href="javascript:void(0);" class="btn btn-success btn-sm viewRecord"  data-id="'.$record->id.'"><i class="ti-file"></i></a>
      //          <a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 assignbtn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'")><i class="ti-user"></i></a>
      //          <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-1 projectst" data-id="'.$record->id.'"><i class="ti-stats-up"></i></a>
      //          <a href="dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 viewTaskRecord" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
              
      //          if($record->tl_task_status == "Incomplete"){
      //             $tl_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }elseif($record->tl_task_status == "To Do"){
      //             $tl_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }elseif($record->tl_task_status == "Doing"){
      //             $tl_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }elseif($record->tl_task_status == "Completed"){
      //             $tl_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }

      //          if(!empty($record->tm_task)){
      //             $strArray = explode(',', $record->tm_task);

      //             $tm_task_clr = "<ul class='list-style-none'>";

      //             foreach($strArray as $strArrays){
      //                $tm_task_clr .= '<li style="width: max-content;"><i class="fa fa-check text-info"></i> '.$strArrays.'</li>';                  
      //             }

      //             $tm_task_clr .= "</ul>";

      //          } else{
      //             $tm_task_clr = $record->tm_task;
      //          }    
              
      //          $data[] = array(
      //             // "id" => $record->id,
      //             "task_name" => $record->task_name,
      //             "tl_task" => $record->tl_task,
      //             "task_detail" => $record->task_detail,
      //             "tl_task_status" => $tl_task_status_btn,
      //             "tm_task" =>$tm_task_clr,
      //             // "tm_task" =>$record->tm_task,
      //             // "view_report" => $file_upload,
      //             "action" => $action                            
      //          );

      //          // print_r($data);
      //          // die();
      //       }
      //          //# Response
      //       $response = array(
      //          "draw" => intval($draw),
      //          "iTotalRecords" => $totalRecords,
      //          "iTotalDisplayRecords" => $totalRecordwithFilter,
      //          "aaData" => $data
      //       );

      //       return $response;
      //    }
      //    else if($this->session->userdata('role') == 'Team Member'){
      //       $response = array();

      //       //$show = $postData['status'];
      //       $draw = $postData['draw'];
      //       $start = $postData['start'];
      //       $rowperpage = $postData['length']; // Rows display per page
      //       $columnIndex = $postData['order'][0]['column']; // Column index
      //       $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      //       $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      //       $searchValue = $postData['search']['value']; // Search value
               
      //       //# Search
      //       $search_arr = array();
      //       $searchQuery = "";

      //       if ($searchValue != '') {
      //          $search_arr[] = " (task_name like '%" . $searchValue . "%' or 
      //                tl_task like '%" . $searchValue . "%' or 
      //                task_detail like '%" . $searchValue . "%' or 
      //                tl_task_status like '%" . $searchValue . "%' or 
      //                tm_task like '%" . $searchValue . "%' ) ";
      //       }

      //       if (count($search_arr) > 0) {
      //          $searchQuery = implode(" and ", $search_arr);  
      //       }

      //       //# Total number of records without filtering          
      //       $login_id = $this->session->userdata('emp_id'); 
            
      //       $this->db->select('tk.*');
      //       $this->db->from('task_team_member as tktm');
      //       $this->db->join('task as tk', 'tktm.task_code = tk.task_code', 'INNER');
      //       $this->db->where('tktm.task_teammem_id', $login_id);

      //       if ($searchQuery != '') $this->db->where($searchQuery);

      //       // $this->db->where($postData_where);

      //       $records = $this->db->get()->result();

      //       $totalRecords = count($records);

            
      //       //# Total number of record with filtering
      //       $login_id = $this->session->userdata('emp_id'); 
            
      //       $this->db->select('tk.*');
      //       $this->db->from('task_team_member as tktm');
      //       $this->db->join('task as tk', 'tktm.task_code = tk.task_code', 'INNER');
      //       $this->db->where('tktm.task_teammem_id', $login_id);
            
      //       if ($searchQuery != '') $this->db->where($searchQuery);

      //       //   $this->db->where($postData_where);

      //       $records = $this->db->get()->result();

      //       $totalRecordwithFilter = count($records);

      //       # Fetch records  
      //       $login_id = $this->session->userdata('emp_id'); 
            
      //       $this->db->select('tk.*');
      //       $this->db->from('task_team_member as tktm');
      //       $this->db->join('task as tk', 'tktm.task_code = tk.task_code', 'INNER');
      //       $this->db->where('tktm.task_teammem_id', $login_id);
            
      //       if ($searchQuery != '') $this->db->where($searchQuery);
            
      //       $this->db->order_by('id', 'desc');  // or desc
            
      //       $this->db->limit($rowperpage, $start);

      //       $records = $this->db->get()->result();
      //       // print_r($records);
      //       $data = array();
      //       $file_upload = "";

      //       foreach ($records as $record) {                            

      //          // $view_report = '<center><span class="label label-success"  data-toggle="modal" data-target="#viewmodel">View</span></center>';                
               
      //          $action = '<a href="javascript:void(0);" class="btn btn-success btn-sm viewRecord"  data-id="'.$record->id.'"><i class="ti-file"></i></a>
      //          <a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 dailyTask" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'")><i class="ti-pencil"></i></a>
      //          <a href="dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 viewTaskRecord" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';

      //          if($record->tl_task_status == "Incomplete"){
      //             $tl_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }elseif($record->tl_task_status == "To Do"){
      //             $tl_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }elseif($record->tl_task_status == "Doing"){
      //             $tl_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }elseif($record->tl_task_status == "Completed"){
      //             $tl_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_task_status.'</span></center>'; 
      //          }

      //          if(!empty($record->tm_task)){
      //             $strArray = explode(',', $record->tm_task);

      //             $tm_task_clr = "<ul class='list-style-none'>";

      //             foreach($strArray as $strArrays){
      //                $tm_task_clr .= '<li style="width: max-content;"><i class="fa fa-check text-info"></i> '.$strArrays.'</li>';                  
      //             }

      //             $tm_task_clr .= "</ul>";

      //          } else{
      //             $tm_task_clr = $record->tm_task;
      //          }    


      //          $data[] = array(
      //          // "id" => $record->id,
      //             "task_name" => $record->task_name,
      //             "tl_task" => $record->tl_task,
      //             "task_detail" => $record->task_detail,
      //             "tl_task_status" => $tl_task_status_btn,
      //             "tm_task" =>$tm_task_clr,
      //             "action" =>$action,
      //          );
      //       }
      //          //# Response
      //       $response = array(
      //          "draw" => intval($draw),
      //          "iTotalRecords" => $totalRecords,
      //          "iTotalDisplayRecords" => $totalRecordwithFilter,
      //          "aaData" => $data
      //       );

      //       return $response;
      //    }     

      // }

      function large_verify_data_task($id){
         // $prt_name=$where["id"];

         // echo '<pre>';print_r($id);die();
         $response = array();
         
         $this->db->select('file_upload');
         $this->db->where('task_id',$id);						
         // print_r($this->db->last_query());die;
         $result = $this->db->get('task_file_upload');
         $qf = $result->result_array();               
         // echo '<pre>';print_r($qf);die();	
            
         $ids = array_map(function($item) { return $item['file_upload']; }, $qf);
         $file_upload = implode(', ', $ids);
         // echo '<pre>';print_r($file_upload);die();	

         $response = array(			
         "file_upload" => $file_upload,
         );
         // echo '<pre>';print_r($response);die();	

         return $response;
      }

      function deleteTask($task_code){
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('ops_id', $ops_id);
         $this->db->where('task_code', $task_code);
         $result=$this->db->delete('task');
         return $result;
      }

      function deleteTaskfile($id){         
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('ops_id', $ops_id);
         $this->db->where('task_id', $id);
         $result=$this->db->delete('task_file_upload');
         return $result;	
      }

      function deleteTasktm($task_code){         
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('ops_id', $ops_id);
         $this->db->where('task_code', $task_code);
         $result=$this->db->delete('task_team_member');
         return $result;	
      }

      function deleteDailyTask($task_code){         
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('ops_id', $ops_id);
         $this->db->where('task_id', $task_code);
         $result=$this->db->delete('daily_task_update');
         return $result;	
      }

      function activeTask($id){
         $status = "1";
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('task');
         return $result;	
      }
      
      function deactiveTask($id){
         $status = "0";
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('task');
         return $result;	
      }

      function updateTaskstatus($id, $tl_task_status)
      {
         $this->db->set('id', $id); //db name = form name
         $this->db->set('tl_task_status', $tl_task_status); //db name = form name
         $this->db->where('id', $id);
         $result=$this->db->update('task');
         return $result;	
      }

      function updateTaskteammem($id, $task_tm_list)
      {
         $this->db->set('id', $id); //db name = form name
         $this->db->set('tm_task', $task_tm_list); //db name = form name
         $this->db->where('id', $id);
         $result=$this->db->update('task');        
         return $result;	
      }

      public function insertPrttmdata($table, $data) {

         // $res = $this->db->insert_batch($table, $data);
         $res = $this->db->insert($table, $data);
         
         echo $this->db->last_query();exit;
         if ($res) {
             return TRUE;
         } else {
             return FALSE;
         }
      }

      function updateTask($id, $tm_task, $task_date, $task_detail){
         $ops_id = $this->session->userdata('ops_id'); //login user name						
         $this->db->set('tm_task', $tm_task); //db name = form name
         $this->db->set('task_date', $task_date); //db name = form name
         $this->db->set('task_detail', $task_detail);
         $this->db->set('ops_id', $ops_id);
         $this->db->where('id', $id);
         $result=$this->db->update('task');
         return $result;	
      }

      function updateTmTaskStatus($tm_task_status, $task_code){
         $this->db->set('tm_task_status', $tm_task_status);
         $this->db->where('task_code', $task_code);
         $result=$this->db->update('task');
         return $result;	
      }

      function updateCompletedonTask($date, $task_code){
         $this->db->set('task_completed_on', $date);
         $this->db->where('task_code', $task_code);
         $result=$this->db->update('task');
         return $result;	
      }

      public function updateDailyTask($data)
      {  		   
         $this->db->set('task_update_date', $data['task_update_date']);
         $this->db->set('comment', $data['comment']);
         $this->db->set('tm_task_status', $data['tm_task_status']);
         $this->db->where('id', $data['id']);
         $this->db->where('ops_id', $data['ops_id']);
         $result=$this->db->update('daily_task_update');
         // print_r($this->db->last_query());die();
         return $result;	      
      }

      public function insertDailyTask($data){          
         $result = $this->db->insert('daily_task_update', $data);         
         return $result;       
      }

      function deleteDailyTaskTm($data){
         $this->db->where('id', $data['id']);
         $this->db->where('ops_id', $data['ops_id']);
         $result=$this->db->delete('daily_task_update');
         return $result;	
      }

      public function view_com_verify_report_data($postData)
      {
         if($this->session->userdata('role') == "Head" || $this->session->userdata('role') == "Team Leader" || $this->session->userdata('role') == "Client")
         {            
            $response = array();

            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
            
            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = " (task_update_date like '%" . $searchValue . "%' or 
                  emp_name like '%" . $searchValue . "%' or 
                  comment like '%" . $searchValue . "%' ) ";
               }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            //# Total number of records without filtering          

            $task_code = $this->session->userdata('task_code'); 
            $this->db->select('count(*) as allcount');
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update');
            
            if ($searchQuery != '') $this->db->where($searchQuery);

            // $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecords = $records[0]->allcount;

         
            //# Total number of record with filtering
            $task_code = $this->session->userdata('task_code'); 
            $this->db->select('count(*) as allcount');
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update');
            
            if ($searchQuery != '') $this->db->where($searchQuery);

            //   $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecordwithFilter = $records[0]->allcount;

               # Fetch records              
            $task_code = $this->session->userdata('task_code'); 
            $this->db->select('*');
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update');
            
            if ($searchQuery != '') $this->db->where($searchQuery);
            
            $this->db->order_by('id', 'desc');  // or desc
            
            $this->db->limit($rowperpage, $start);

            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();

            foreach ($records as $record) { 
                              
               $sampleDate = $record->task_update_date;
               $convertDate = date("d-m-Y", strtotime($sampleDate));
  
               // $date = $record->task_update_date->format('d/m/Y');
               
               $data[] = array(
               // "id" => $record->id,
               "task_update_date" => $convertDate,
               "comment" =>$record->comment,
               "emp_name" =>$record->emp_name,
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;

         }else if($this->session->userdata('role') == 'Team Member'){
            $response = array();

            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
            
            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = " (task_update_date like '%" . $searchValue . "%' or 
                  task_update_date like '%" . $searchValue . "%' or 
                  comment like '%" . $searchValue . "%' ) ";
               }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            //# Total number of records without filtering  
            $task_code = $this->session->userdata('task_code'); 
            $login_emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('count(*) as allcount');
            $this->db->where('emp_name',$login_emp_name);
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update');            

            if ($searchQuery != '') $this->db->where($searchQuery);

            // $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecords = $records[0]->allcount;

         
            //# Total number of record with filtering
            $task_code = $this->session->userdata('task_code'); 
            $login_emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('count(*) as allcount');
            $this->db->where('emp_name',$login_emp_name);
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update');
         
            if ($searchQuery != '') $this->db->where($searchQuery);

            //   $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecordwithFilter = $records[0]->allcount;

               # Fetch records 
            $task_code = $this->session->userdata('task_code'); 
            $login_emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('*');
            $this->db->where('emp_name',$login_emp_name);
            $this->db->where('task_id',$task_code);
            $this->db->from('daily_task_update');

            if ($searchQuery != '') $this->db->where($searchQuery);
            
            $this->db->order_by('id', 'desc');  // or desc
            
            $this->db->limit($rowperpage, $start);

            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();

            foreach ($records as $record) { 
                                  
               $sampleDate = $record->task_update_date;
               $convertDate = date("d-m-Y", strtotime($sampleDate));
               
               $data[] = array(
               // "id" => $record->id,
               "task_update_date" => $convertDate,
               "comment" =>$record->comment,
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;

         }

      }

     
      function insertTaskCode($task_code, $task_last_inserted_id)
      {
         $this->db->set('task_code', $task_code); //db name = form name
         $this->db->where('id', $task_last_inserted_id);
         $result=$this->db->update('task');
         return $result;	
      }

      function insertProjectCode($project_code, $project_last_inserted_id)
      {
         $this->db->set('project_code', $project_code); //db name = form name
         $this->db->where('id', $project_last_inserted_id);
         $result=$this->db->update('project');
         return $result;	
      }

      function fetch_task_table($task_code)
      {
         $this->db->select('*');
         $this->db->from('task');
         $this->db->where('task_code', $task_code);
         $query = $this->db->get();
         return $query->result();
      }

      function selectTask($project_code)
      {
         $this->db->select('*');
         $this->db->from('task');
         $this->db->where('project_code', $project_code);
         $query = $this->db->get()->result();

         foreach($query as $record){
            $task_code = $record->task_code;
            $task_id = $record->id;

            if($task_code){
               $this->db->where('task_code', $task_code);
               $query = $this->db->delete('task_team_member');
            }

            if($task_id){
               $this->db->where('task_id', $task_id);
               $query = $this->db->delete('task_file_upload');
            }            
            
         }

         $this->db->where('project_code', $project_code);
         $query = $this->db->delete('task');

         return $query;

      }      

      function fetch_daily_task_code($id)
      {
         $this->db->select('task_id');
         $this->db->from('daily_task_update');
         $this->db->where('id', $id);
         $query = $this->db->get()->row()->task_id;
         return $query;
      }

      function fetch_task_code($task_code)
      {
         $this->db->select('task_code');
         $this->db->from('task');
         $this->db->where('task_code', $task_code);
         $query = $this->db->get();
         return $query->result();
      }

      // function fetchTaskCode($task_last_inserted_id)
      // {
      //    $this->db->select('task_code');
      //    $this->db->from('task');
      //    $this->db->where('id', $task_last_inserted_id);
      //    $query = $this->db->get()->row()->task_code;
      //    return $query;
      // }

      /***********************************************************************************
       Project Report 
      *************************************************************************************/
      
      public function project_report_data_menulist($postData, $dt_1, $dt_2, $dt_3, $dt_4, $dt_5, $dt_6, $dt_7)
      {
			// print_r($dates);die();

         if($this->session->userdata('role') == "Operations Head")
         {           
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];            
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
          
            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = " (p.prt_name like '%" . $searchValue . "%' or 
                     p.prt_date like '%" . $searchValue . "%' or 
                     p.tl_prt_status like '%" . $searchValue . "%' or 
                     p.prt_tm like '%" . $searchValue . "%' ) ";
               }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            //# Total number of records without filtering          
				$ops_id = $this->session->userdata('ops_id'); //OPs id

            // $this->db->distinct();
            $this->db->select('*');
            $this->db->from('project_team_member as ptm');
            $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
            $this->db->where('p.ops_id', $ops_id);
            if ($searchQuery != '') $this->db->where($searchQuery);
            $totalRecords = $this->db->count_all_results();
            // print_r($totalRecords);die();


            //# Total number of record with filtering           
            $this->db->select('p.*');
            $this->db->from('project_team_member as ptm');
            $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
            $this->db->where('p.ops_id', $ops_id);
            if ($searchQuery != '') $this->db->where($searchQuery);
            $totalRecordwithFilter = $this->db->count_all_results();
            // print_r($totalRecordwithFilter);die();


            # Fetch records             
            $this->db->select('*');
            $this->db->from('project_team_member as ptm');
            $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
            if ($searchQuery != '') $this->db->where($searchQuery);
            $this->db->where('p.ops_id', $ops_id);
            $this->db->order_by('p.prt_date', 'desc');  // or desc            
            $this->db->limit($rowperpage, $start);  
            $records = $this->db->get()->result();           

            $data = array();

            foreach ($records as $record) {                   
               
               if($record->tl_prt_status == "Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "In Progress"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Demo Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block; background-color: black; border-color: black;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Input Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Feedback Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Under Testing"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Completed"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }                                                     
           
               //Date convertor
               if($record->prt_date){
                  $sampleDate = $record->prt_date;
                  $convertDate = date("d-m-Y", strtotime($sampleDate));         

               }else{
                  $convertDate="";
               }
               
               $this->db->select('emp_name');
               $this->db->from('users');
               $this->db->where('emp_id', $record->project_teammem_id);        
               $this->db->where('ops_id', $ops_id);        
               $project_tm_name = $this->db->get()->row()->emp_name;

               $this->db->distinct();
               $this->db->select('t.*');
               $this->db->from('task as t');
               $this->db->join('project as p', 'p.project_code = t.project_code', 'INNER');
               $this->db->where('t.tm_task', $project_tm_name);   
               $this->db->where('t.ops_id', $ops_id);   
               $this->db->where('p.prt_name', $record->prt_name);   
               $this->db->like('t.task_date', $dt_1);   
               $query = $this->db->get()->result();
               // print_r($query);die();

               // $query = $this->db->query("SELECT t.* FROM task t INNER JOIN project p ON p.project_code=t.project_code WHERE t.tm_task='$project_tm_name' and  t.created_on LIKE '%$dt_1%'  and p.prt_name ='$record->prt_name'");                    
               // $query = $query->result();

               $date_1="";
               // print_r($query);die();
               if($query!=""){
                  foreach($query as $querys){
                     if($querys->task_detail){
                           $date_1 = $querys->task_detail;
                        }
                  } 
               }else{
                  $date_1 = "null";
               }  

               $this->db->distinct();
               $this->db->select('t.*');
               $this->db->from('task as t');
               $this->db->join('project as p', 'p.project_code = t.project_code', 'INNER');
               $this->db->where('t.ops_id', $ops_id);   
               $this->db->where('t.tm_task', $project_tm_name);   
               $this->db->where('p.prt_name', $record->prt_name);   
               $this->db->like('t.task_date', $dt_2);   
               // $this->db->like('t.created_on', $dt_2);   
               $query = $this->db->get()->result();

               $date_2="";
               // print_r($query);die();
               if($query!=""){
                  foreach($query as $querys){
                     if($querys->task_detail){
                           $date_2 = $querys->task_detail;
                        }
                  } 
               }else{
                        $date_2 = "null";
                  }
               // print_r($date_2);die();

               $this->db->distinct();
               $this->db->select('t.*');
               $this->db->from('task as t');
               $this->db->join('project as p', 'p.project_code = t.project_code', 'INNER');
               $this->db->where('t.tm_task', $project_tm_name);   
               $this->db->where('t.ops_id', $ops_id);   
               $this->db->where('p.prt_name', $record->prt_name);   
               $this->db->like('t.task_date', $dt_3);   
               $query = $this->db->get()->result();

               $date_3="";
               // print_r($query);die();
               if($query!=""){
                  foreach($query as $querys){
                     if($querys->task_detail){
                           $date_3 = $querys->task_detail;
                        }
                  } 
               }else{
                        $date_3 = "null";
               }
               // print_r($date_3);die();

               $this->db->distinct();
               $this->db->select('t.*');
               $this->db->from('task as t');
               $this->db->join('project as p', 'p.project_code = t.project_code', 'INNER');
               $this->db->where('t.tm_task', $project_tm_name);   
               $this->db->where('t.ops_id', $ops_id);   
               $this->db->where('p.prt_name', $record->prt_name);   
               $this->db->like('t.task_date', $dt_4);   
               $query = $this->db->get()->result();

               $date_4="";
               // print_r($query);die();
               if($query!=""){
                  foreach($query as $querys){
                     if($querys->task_detail){
                           $date_4 = $querys->task_detail;
                        }
                  } 
               }else{
                        $date_4 = "null";
               }
               // print_r($date_4);die();

               $this->db->distinct();
               $this->db->select('t.*');
               $this->db->from('task as t');
               $this->db->join('project as p', 'p.project_code = t.project_code', 'INNER');
               $this->db->where('t.tm_task', $project_tm_name);   
               $this->db->where('t.ops_id', $ops_id);   
               $this->db->where('p.prt_name', $record->prt_name);   
               $this->db->like('t.task_date', $dt_5);   
               $query = $this->db->get()->result();

               $date_5="";
               // print_r($query);die();
               if($query!=""){
                  foreach($query as $querys){
                     if($querys->task_detail){
                           $date_5 = $querys->task_detail;
                        }
                  } 
               }else{
                        $date_5 = "null";
               }
               // print_r($date_5);die();

               $this->db->distinct();
               $this->db->select('t.*');
               $this->db->from('task as t');
               $this->db->join('project as p', 'p.project_code = t.project_code', 'INNER');
               $this->db->where('t.tm_task', $project_tm_name);   
               $this->db->where('t.ops_id', $ops_id);   
               $this->db->where('p.prt_name', $record->prt_name);   
               $this->db->like('t.task_date', $dt_6);   
               $query = $this->db->get()->result();

               $date_6="";
               // print_r($query);die();
               if($query!=""){
                  foreach($query as $querys){
                     if($querys->task_detail){
                           $date_6 = $querys->task_detail;
                        }
                  } 
               }else{
                        $date_6 = "null";
               }
               // print_r($date_6);die();

               $this->db->distinct();
               $this->db->select('t.*');
               $this->db->from('task as t');
               $this->db->join('project as p', 'p.project_code = t.project_code', 'INNER');
               $this->db->where('t.ops_id', $ops_id);   
               $this->db->where('t.tm_task', $project_tm_name);   
               $this->db->where('p.prt_name', $record->prt_name);   
               $this->db->like('t.task_date', $dt_7);   
               $query = $this->db->get()->result();

               $date_7="";
               // print_r($query);die();
               if($query!=""){
                  foreach($query as $querys){
                     if($querys->task_detail){
                           $date_7 = $querys->task_detail;
                        }
                  } 
               }else{
                        $date_7 = "null";
               }    

               $data[] = array(
                  // "id" => $record->id,
                  "prt_name" => $record->prt_name,
                  "created_on" => $convertDate,
                  "prt_tm" => $project_tm_name,
                  "tl_prt_status" =>$tl_prt_status_btn,
                  "dt_1" =>$date_1,
                  "dt_2" =>$date_2,
                  "dt_3" =>$date_3,
                  "dt_4" =>$date_4,
                  "dt_5" =>$date_5,
                  "dt_6" =>$date_6,
                  "dt_7" =>$date_7,
               );
              
            }
               //# Response
               // $totalRecords_dm ="10";
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            //  print_r($postData['draw']);
            //  die();
            return $response;      
         }
          

      }
      public function test($created_on)
      {
            $this->db->select('*');
            // $this->db->from('task');
            $this->db->where('tm_task','Divya K');
            $this->db->where_in('created_on', $created_on);
            $task_detail = $this->db->get('task')->result_array();
            // print_r($task_detail['created_on']);die();
            // $task_details->created_on
            foreach($task_detail as $task_details){
               $data[] = $task_details['created_on'];
               print_r($data);

            }
            die();

            return $task_detail;
      }

      function insertDeptCode($dept_code, $insert_id)
      {
         $this->db->set('dept_code', $dept_code); //db name = form name
         $this->db->where('id', $insert_id);
         $result=$this->db->update('dept');
         return $result;	
      }

      function fetch_task_dept_code($dept_name)
      {
         $this->db->select('dept_code');
         $this->db->from('dept');
         $this->db->where('dept', $dept_name);
         $query = $this->db->get();
         return $query->result();
      }

      function insertUserHead($data){
           
         $query =  $this->db->insert('users', $data);
         return $query;

      }   

      function updateUsersTable($dept_unique_id, $insert_id){
         $this->db->set('dept_id', $dept_unique_id);
         $this->db->where('id', $insert_id);
         $result=$this->db->update('users');
         return $result;	
      }

      public function fetch_ops_id($ops_name){
         $this->db->select('ops_id');
         $this->db->from('admin_ops');
         $this->db->where('ops_name', $ops_name);
         $query = $this->db->get()->row()->ops_id;
         return $query;
             
      }

      public function admin_ops_login_user_report_data($postData)
      {
         $response = array();
         //$show = $postData['status'];
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value
            
         //# Search
         $search_arr = array();
         $searchQuery = "";

         if ($searchValue != '') {
            $search_arr[] = " (emp_id like '%" . $searchValue . "%' or 
                  emp_name like '%" . $searchValue . "%' or 
                  emp_email like '%" . $searchValue . "%' or 
                  emp_mob like '%" . $searchValue . "%' or 
                  emp_role like '%" . $searchValue . "%' or 
                  emp_des like '%" . $searchValue . "%' or 
                  emp_teammb like '%" . $searchValue . "%' or 
                  emp_keyskill like '%" . $searchValue . "%' ) ";
         }

         if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);  
         }

         // (emp_role in ('Head','Team Member','Team Leader')

         //# Total number of records without filtering    
         // $emp_role_type = array('Admin', 'Deaprtment Head');      
         // $emp_role_type = array();      
         // $query = $this->db->query("SELECT * FROM `users` WHERE emp_role='Department Head'");
         // $num_results = $query->num_rows();

         $this->db->select('count(*) as allcount');
         $this->db->from('users');
         $this->db->where('emp_role', "Operations Head");
         if ($searchQuery != '') $this->db->where($searchQuery);            
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         //# Total number of record with filtering
         $this->db->select('count(*) as allcount');
         $this->db->from('users');
         $this->db->where('emp_role', "Operations Head");
         if ($searchQuery != '') $this->db->where($searchQuery);            
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;
         // print_r($totalRecordwithFilter);die();

         # Fetch records  
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where('emp_role', "Operations Head");
         if ($searchQuery != '') $this->db->where($searchQuery);
         $this->db->order_by('id', 'desc');  // or desc         
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result(); 
         // print_r(count($records));die();

         $data = array();

         foreach ($records as $record) {
         // print_r($record);die();
            
            if($record->status=="1")
            {
                  $reminder="checked";
            }
            else{
               $reminder="";
            }

            $ops_name_part = '<center><span class="label label-success" style="text">'.$record->ops_name.'</span></center>'; 

            //onclick=test("'.$record->id.'","'.$record->emp_id.'","'.$record->emp_name.'","'.$record->emp_email.'","'.$record->emp_mob.'","'.$record->emp_des.'","'.$record->emp_role.'","'.$record->emp_teammb.'","'.$record->emp_keyskill.'")

            $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord" data-id="'.$record->id.'" data-emp_id="'.$record->emp_id.'" data-emp_name="'.$record->emp_name.'" data-emp_email="'.$record->emp_email.'" data-emp_mob="'.$record->emp_mob.'" data-emp_des="'.$record->emp_des.'" data-emp_role="'.$record->emp_role.'" data-ops_id="'.$record->ops_id.'" data-ops_name="'.$record->ops_name.'"><i class="ti-pencil"></i></a>
            <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm mt-1 deleteRecord" data-id="'.$record->id.'"><i class="ti-trash"></i></a>
            <label class="switch_active" data-toggle="tooltip" title="Active"><input type="checkbox"  '.$reminder.' id="activeRecord" class="activeRecord" data-id="'.$record->id.'"  data-status="'.$record->status.'" ><span class="slider round"></span></label>';                                
                 
            $data[] = array(
            // "id" => $record->id,
            "emp_id" => $record->emp_id,
            "emp_name" => $record->emp_name,
            "emp_email" => $record->emp_email,
            "emp_mob" => $record->emp_mob,
            "ops_name_part" =>$ops_name_part,
            "action" => $action            
            );
            
         }
            //# Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
         );

         return $response;  

      }

      function updateUserHead($data, $id)
      {
         // $this->db->set('emp_pass', $emp_pass);
         $this->db->where('id', $id);
         $result=$this->db->update('users', $data);
         return $result;	
      }

      /*****************************************************************
       Dept Page
      ******************************************************************/
      
      public function insertDept($data){
         $result = $this->db->insert('dept', $data);
         return $result;
      }

      public function dept_verify_report_data($postData)
      {
         $response = array();

         //$show = $postData['status'];
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value
            
         //# Search
         $search_arr = array();
         $searchQuery = "";

         if ($searchValue != '') {
            $search_arr[] = " (dept like '%" . $searchValue . "%') ";
            }

         if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);  
         }

         //# Total number of records without filtering  
         $ops_id = $this->session->userdata('ops_id'); //login user name

         $this->db->select('count(*) as allcount');
         $this->db->from('dept');
         $this->db->where('ops_id', $ops_id);         
         if ($searchQuery != '') $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;
         
         //# Total number of record with filtering
         $this->db->select('count(*) as allcount');
         $this->db->from('dept');
         $this->db->where('ops_id', $ops_id);         
         if ($searchQuery != '') $this->db->where($searchQuery);         
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         # Fetch records  
         $this->db->select('*');
         $this->db->from('dept');
         $this->db->where('ops_id', $ops_id);                  
         if ($searchQuery != '') $this->db->where($searchQuery);      
         $this->db->order_by('id', 'desc');  // or desc         
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         // print_r($records);
         $data = array();

         foreach ($records as $record) {
            
            if($record->status=="1")
            {
                  $reminder="checked";
            }
            else{
               $reminder="";
            }
            
            //onclick=test("'.$record->id.'","'.$record->dept.'")

            $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord" data-id="'.$record->id.'" data-dept="'.$record->dept.'"><i class="ti-pencil"></i></a>
            <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm deleteRecord" data-id="'.$record->id.'"><i class="ti-trash"></i></a>
            <label class="switch_active" data-toggle="tooltip" title="Active"><input type="checkbox" '.$reminder.' id="activeRecord" class="activeRecord"   data-id="'.$record->id.'"  data-status="'.$record->status.'" ><span class="slider round"></span></label>';
            
            $data[] = array(
            // "id" => $record->id,
            "dept" => $record->dept,
            "action" => $action            
            );
         }
            //# Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
         );

         return $response;

      }
      /***************************************************************************
       Project Page
       ****************************************************************************/

      function fetch_client()
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->select('client_name');
         $this->db->from('client');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $query = $this->db->get();
         return $query->result();
      }
      
      function fetch_user_tl_and_head()
      {
         $ops_id = $this->session->userdata('ops_id');
         $emp_role_type = array('Operations Head', 'Team Leader');    

         $this->db->select('emp_name');
         $this->db->from('users');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $this->db->where_in('emp_role', $emp_role_type);
         // $this->db->where('emp_role', 'Team Leader');
         $query = $this->db->get();
         return $query->result();
      }
      
      function fetch_project_tl_list_edit_option($project_code)
      {
         $ops_id = $this->session->userdata('ops_id');
         $emp_role_type = array('Operations Head', 'Team Leader');    

         $this->db->select('emp_name');
         $this->db->from('users');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $this->db->where_in('emp_role', $emp_role_type);
         // $this->db->where('emp_role', 'Team Leader');
         $query = $this->db->get();
         $optionsResult = $query->result();

         // print_r($optionsResult);die();

         $output = '<option value="">Team Leader</option>';                       

         if($optionsResult){

            foreach ($optionsResult as $record) {  
            
               $this->db->where('project_code', $project_code);        
               $this->db->where('prt_tl', $record->emp_name);        
               $query = $this->db->get('project');
               // print_r($query->result());die();

               if($query->result()){
                  $reminder="selected";
               }else
               {
                  $reminder="";
               }  

               $output .= '<option value="'.$record->emp_name.'" '.$reminder.'>'.$record->emp_name.'</option>';                                                                                                      
                           
            }               

         }else{
               $output="<option>No Team Leader Available</option>";
         }             

         return $output;   
         // return $query->result();
      }

      function fetch_dept_name()
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->select('dept');
         $this->db->from('dept');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $query = $this->db->get();
         return $query->result();
      }

      function fetch_cleint_ops_list()
      {
         $emp_name = $this->session->userdata('emp_name');
         $this->db->select('ops_name');
         $this->db->from('client');
         $this->db->where('client_name', $emp_name);
         $query = $this->db->get();
         return $query->result();
      }
      
      function fetch_client_login_dept_name()
      {
         $login_id = $this->session->userdata('emp_id'); 
         $ops_id = $this->session->userdata('ops_id');          
         $emp_name = $this->session->userdata('emp_name'); 
         $this->db->select('prt_dept');
         $this->db->where('prt_client',$emp_name);
         $this->db->from('project');
         $query = $this->db->get();
         return $query->result();
      }

      //Operations Head
      function fetch_head_chart_dept_list_overall_count($month)
      {
         $ops_id = $this->session->userdata('ops_id');
         $this->db->select('dept');
         $this->db->from('dept');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $query = $this->db->get();         
         $dept_lists = $query->result();

         $barchart = "[['Department', 'Department'],";

			foreach($dept_lists as $dept_list){
				// print_r($dept_list->dept);die();
				
            //particular dept count
            $this->db->select('*');
            $this->db->from('project');
            $this->db->where('ops_id', $ops_id);
            $this->db->where('prt_dept', $dept_list->dept);
            $this->db->like('prt_date', $month);
            $project_count = $this->db->count_all_results();         
            // print_r($project_count);die();
            
            $barchart .= "['" . $dept_list->dept . "', " . $project_count . "],";
				
            // print_r($barchart);die();

			}

         $barchart .= "['Department', 'Department']]";

         // print_r($barchart);die();

         return $barchart;

      }

      function fetch_head_chart_dept_filter_list_count($month, $dept)
      {
         $ops_id = $this->session->userdata('ops_id');
         
         //Pending count
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('prt_dept', $dept);
         $this->db->like('prt_date', $month);
         $this->db->where('tl_prt_status', 'Pending');
         $pending_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         //In Progress count
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('prt_dept', $dept);
         $this->db->like('prt_date', $month);
         $this->db->where('tl_prt_status', 'In Progress');
         $in_progress_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         //Demo Pending count
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('prt_dept', $dept);
         $this->db->like('prt_date', $month);
         $this->db->where('tl_prt_status', 'Demo Pending');
         $demo_pending_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         //Input Pending count
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('prt_dept', $dept);
         $this->db->like('prt_date', $month);
         $this->db->where('tl_prt_status', 'Input Pending');
         $input_pending_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         //Feedback Pending count
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('prt_dept', $dept);
         $this->db->like('prt_date', $month);
         $this->db->where('tl_prt_status', 'Feedback Pending');
         $fb_pending_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         //Under Testing count
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('prt_dept', $dept);
         $this->db->like('prt_date', $month);
         $this->db->where('tl_prt_status', 'Under Testing');
         $un_test_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         //Completed count
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('prt_dept', $dept);
         $this->db->like('prt_date', $month);
         $this->db->where('tl_prt_status', 'Completed');
         $com_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         
         $barchart = "[['Department', 'Pending = " . $pending_project_count . " ', 'In Progress  = " . $in_progress_project_count . "', 'Demo Pending  = " . $demo_pending_project_count . "', 'Input Pending  = " . $input_pending_project_count . "', 'Feedback Pending  = " . $fb_pending_project_count . "', 'Under Testing  = " . $un_test_project_count . "', 'Completed  = " . $com_project_count . "'],";
			
         $barchart .= "['" . $dept . "', " . $pending_project_count . ", " . $in_progress_project_count . ", " . $demo_pending_project_count . ", " . $input_pending_project_count . ", " . $fb_pending_project_count . ", " . $un_test_project_count . ", " . $com_project_count . "],";
				
         $barchart .= "['Department', 'Pending', 'In Progress', 'Demo Pending', 'Input Pending', 'Feedback Pending', 'Under Testing', 'Completed']]";

         // print_r($barchart);die();

         return $barchart;

      }

      //team leader 
      function fetch_tl_chart_dept_list_overall_count($month)
      {
         $ops_id = $this->session->userdata('ops_id');
         $emp_name = $this->session->userdata('emp_name');

         $this->db->select('dept');
         $this->db->from('dept');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $query = $this->db->get();         
         $dept_lists = $query->result();

         $barchart = "[['Department', 'Department'],";

			foreach($dept_lists as $dept_list){
				// print_r($dept_list->dept);die();
				
            //particular dept count
            $ops_id = $this->session->userdata('ops_id');
            $login_name = $this->session->userdata('emp_name');
            $login_id = $this->session->userdata('emp_id');

            $searchQuery = "p.ops_id='$ops_id' and p.prt_dept='$dept_list->dept' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name') and `prt_date` LIKE '%$month%'";        
            $this->db->distinct();
            $this->db->select('p.*');
            $this->db->from('project as p');
            $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
            $this->db->where($searchQuery);
            $records = $this->db->get()->result();
            $project_count = count($records);         
				// print_r($dept_list->dept);die();
         
            // $this->db->select('*');
            // $this->db->from('project');
            // $this->db->where('ops_id', $ops_id);
            // $this->db->where('prt_dept', $dept_list->dept);
            // $this->db->like('prt_date', $month);
            // $project_count = $this->db->count_all_results();         
            // print_r($project_count);die();
            
            $barchart .= "['" . $dept_list->dept . "', " . $project_count . "],";
				
            // print_r($barchart);die();

			}

         $barchart .= "['Department', 'Department']]";

         // print_r($barchart);die();

         return $barchart;

      }

      function fetch_tl_chart_dept_filter_list_count($month, $dept)
      {
         $ops_id = $this->session->userdata('ops_id');
         
         //Pending count
         $ops_id = $this->session->userdata('ops_id');
         $login_name = $this->session->userdata('emp_name');
         $login_id = $this->session->userdata('emp_id');

         $searchQuery = "p.tl_prt_status='Pending' and p.ops_id='$ops_id' and p.prt_dept='$dept' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name') and `prt_date` LIKE '%$month%'";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $pending_project_count = count($records);  
         
         // $this->db->select('*');
         // $this->db->from('project');
         // $this->db->where('ops_id', $ops_id);
         // $this->db->where('prt_dept', $dept);
         // $this->db->like('prt_date', $month);
         // $this->db->where('tl_prt_status', 'Pending');
         // $pending_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         //In Progress count
         $searchQuery = "p.tl_prt_status='In Progress' and p.ops_id='$ops_id' and p.prt_dept='$dept' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name') and `prt_date` LIKE '%$month%'";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $in_progress_project_count = count($records);       
         // print_r($project_count);die();
         
         //Demo Pending count
         $searchQuery = "p.tl_prt_status='Demo Pending' and p.ops_id='$ops_id' and p.prt_dept='$dept' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name') and `prt_date` LIKE '%$month%'";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $demo_pending_project_count = count($records);       
         // print_r($project_count);die();
         
         //Input Pending count
         $searchQuery = "p.tl_prt_status='Input Pending' and p.ops_id='$ops_id' and p.prt_dept='$dept' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name') and `prt_date` LIKE '%$month%'";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $input_pending_project_count = count($records);       
         // print_r($project_count);die();
         
         //Feedback Pending count
         $searchQuery = "p.tl_prt_status='Feedback Pending' and p.ops_id='$ops_id' and p.prt_dept='$dept' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name') and `prt_date` LIKE '%$month%'";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $fb_pending_project_count = count($records);         
         // print_r($project_count);die();
         
         //Under Testing count
         $searchQuery = "p.tl_prt_status='Under Testing' and p.ops_id='$ops_id' and p.prt_dept='$dept' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name') and `prt_date` LIKE '%$month%'";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $un_test_project_count = count($records);          
         // print_r($project_count);die();
         
         //Completed count
         $searchQuery = "p.tl_prt_status='Completed' and p.ops_id='$ops_id' and p.prt_dept='$dept' and (ptm.project_teammem_id='$login_id' or p.prt_tl='$login_name') and `prt_date` LIKE '%$month%'";        
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project as p');
         $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');        
         $this->db->where($searchQuery);         
         $com_project_count = $this->db->count_all_results();  
         // print_r($project_count);die();
                  
         $barchart = "[['Department', 'Pending = " . $pending_project_count . " ', 'In Progress  = " . $in_progress_project_count . "', 'Demo Pending  = " . $demo_pending_project_count . "', 'Input Pending  = " . $input_pending_project_count . "', 'Feedback Pending  = " . $fb_pending_project_count . "', 'Under Testing  = " . $un_test_project_count . "', 'Completed  = " . $com_project_count . "'],";
			
         $barchart .= "['" . $dept . "', " . $pending_project_count . ", " . $in_progress_project_count . ", " . $demo_pending_project_count . ", " . $input_pending_project_count . ", " . $fb_pending_project_count . ", " . $un_test_project_count . ", " . $com_project_count . "],";
				
         $barchart .= "['Department', 'Pending', 'In Progress', 'Demo Pending', 'Input Pending', 'Feedback Pending', 'Under Testing', 'Completed']]";

         // print_r($barchart);die();

         return $barchart;

      }

      //team member 
      function fetch_tm_chart_dept_list_overall_count($month)
      {
         $ops_id = $this->session->userdata('ops_id');
         $emp_name = $this->session->userdata('emp_name');

         $this->db->select('dept');
         $this->db->from('dept');
         $this->db->where('ops_id', $ops_id);
         $this->db->where('status', '1');
         $query = $this->db->get();         
         $dept_lists = $query->result();

         $barchart = "[['Department', 'Department'],";

			foreach($dept_lists as $dept_list){
				// print_r($dept_list->dept);die();
				
            //particular dept count
            $ops_id = $this->session->userdata('ops_id');
            $login_id = $this->session->userdata('emp_id');
            $this->db->distinct();
            $this->db->select('p.*');
            $this->db->from('project_team_member as ptm');
            $this->db->join('project as p', 'p.project_code = ptm.project_code', 'INNER');
            $this->db->where('ptm.project_teammem_id', $login_id);   
            $this->db->where('p.prt_dept', $dept_list->dept);   
            $this->db->where('p.ops_id', $ops_id);   
            $this->db->like('p.prt_date', $month);   
            $project_count = $this->db->count_all_results();     			    
            // print_r($project_count);die();
            
            $barchart .= "['" . $dept_list->dept . "', " . $project_count . "],";
				
            // print_r($barchart);die();

			}

         $barchart .= "['Department', 'Department']]";

         // print_r($barchart);die();

         return $barchart;

      }

      function fetch_tm_chart_dept_filter_list_count($month, $dept)
      {
         $ops_id = $this->session->userdata('ops_id');
         
         //Pending count
         $ops_id = $this->session->userdata('ops_id');
         $login_id = $this->session->userdata('emp_id');
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', $dept);   
         $this->db->where('p.tl_prt_status', 'Pending');   
         $this->db->like('p.prt_date', $month);   
         $pending_project_count = $this->db->count_all_results();
         
         // $this->db->select('*');
         // $this->db->from('project');
         // $this->db->where('ops_id', $ops_id);
         // $this->db->where('prt_dept', $dept);
         // $this->db->like('prt_date', $month);
         // $this->db->where('tl_prt_status', 'Pending');
         // $pending_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         //In Progress count
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', $dept);   
         $this->db->where('p.tl_prt_status', 'In Progress');   
         $this->db->like('p.prt_date', $month);   
         $in_progress_project_count = $this->db->count_all_results();     
         // print_r($project_count);die();
         
         //Demo Pending count
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', $dept);   
         $this->db->where('p.tl_prt_status', 'Demo Pending');   
         $this->db->like('p.prt_date', $month);   
         $demo_pending_project_count = $this->db->count_all_results();   
         // print_r($project_count);die();
         
         //Input Pending count
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', $dept);   
         $this->db->where('p.tl_prt_status', 'Input Pending');   
         $this->db->like('p.prt_date', $month);   
         $input_pending_project_count = $this->db->count_all_results();  
         // print_r($project_count);die();
         
         //Feedback Pending count
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', $dept);   
         $this->db->where('p.tl_prt_status', 'Feedback Pending');   
         $this->db->like('p.prt_date', $month);   
         $fb_pending_project_count = $this->db->count_all_results();     
         // print_r($project_count);die();
         
         //Under Testing count
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', $dept);   
         $this->db->where('p.tl_prt_status', 'Under Testing');   
         $this->db->like('p.prt_date', $month);   
         $un_test_project_count = $this->db->count_all_results();
         // print_r($project_count);die();
         
         //Completed count
         $this->db->distinct();
         $this->db->select('p.*');
         $this->db->from('project_team_member as ptm');
         $this->db->join('project as p', 'p.project_code = ptm.project_code');
         $this->db->where('ptm.project_teammem_id', $login_id);   
         $this->db->where('p.prt_dept', $dept);   
         $this->db->where('p.tl_prt_status', 'Completed');   
         $this->db->like('p.prt_date', $month);   
         $com_project_count = $this->db->count_all_results();
         // print_r($project_count);die();
                  
         $barchart = "[['Department', 'Pending = " . $pending_project_count . " ', 'In Progress  = " . $in_progress_project_count . "', 'Demo Pending  = " . $demo_pending_project_count . "', 'Input Pending  = " . $input_pending_project_count . "', 'Feedback Pending  = " . $fb_pending_project_count . "', 'Under Testing  = " . $un_test_project_count . "', 'Completed  = " . $com_project_count . "'],";
			
         $barchart .= "['" . $dept . "', " . $pending_project_count . ", " . $in_progress_project_count . ", " . $demo_pending_project_count . ", " . $input_pending_project_count . ", " . $fb_pending_project_count . ", " . $un_test_project_count . ", " . $com_project_count . "],";
				
         $barchart .= "['Department', 'Pending', 'In Progress', 'Demo Pending', 'Input Pending', 'Feedback Pending', 'Under Testing', 'Completed']]";

         // print_r($barchart);die();

         return $barchart;

      }

      //Client 
      function fetch_client_chart_dept_list_overall_count($month)
      {
         $login_id = $this->session->userdata('emp_id'); 
         $ops_id = $this->session->userdata('ops_id');          
         $emp_name = $this->session->userdata('emp_name'); 
         $this->db->select('prt_dept');
         $this->db->where('prt_client',$emp_name);
         $this->db->from('project');
         $query = $this->db->get();
         $dept_lists = $query->result();

         // $this->db->select('dept');
         // $this->db->from('dept');
         // // $this->db->where('ops_id', $ops_id);
         // $this->db->where('status', '1');
         // $query = $this->db->get();         
         // $dept_lists = $query->result();

         $barchart = "[['Department', 'Department'],";

			foreach($dept_lists as $dept_list){
				// print_r($dept_list->dept);die();
				
            //particular dept count            
            $this->db->where('prt_client', $emp_name);
            $this->db->where('prt_dept', $dept_list->prt_dept);
            $this->db->like('prt_date', $month); //2021-12
            $this->db->from('project'); 
            $project_count = $this->db->count_all_results();     			    
            // print_r($project_count);die();
            
            $barchart .= "['" . $dept_list->prt_dept . "', " . $project_count . "],";
				
            // print_r($barchart);die();

			}

         $barchart .= "['Department', 'Department']]";

         // print_r($barchart);die();

         return $barchart;

      }

      function fetch_client_chart_dept_filter_list_count($month, $dept)
      {
         // $ops_id = $this->session->userdata('ops_id');
         
         //Pending count
         $ops_id = $this->session->userdata('ops_id');
         $emp_name = $this->session->userdata('emp_name');
         $this->db->distinct();
         $this->db->where('prt_client', $emp_name);
         $this->db->where('prt_dept', $dept);
         $this->db->where('tl_prt_status', 'Pending');   
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project'); 
         $pending_project_count = $this->db->count_all_results(); 

         // $this->db->select('*');
         // $this->db->from('project');
         // $this->db->where('ops_id', $ops_id);
         // $this->db->where('prt_dept', $dept);
         // $this->db->like('prt_date', $month);
         // $this->db->where('tl_prt_status', 'Pending');
         // $pending_project_count = $this->db->count_all_results();         
         // print_r($project_count);die();
         
         //In Progress count
         $this->db->distinct();
         $this->db->where('prt_client', $emp_name);
         $this->db->where('prt_dept', $dept);
         $this->db->where('tl_prt_status', 'In Progress');   
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');   
         $in_progress_project_count = $this->db->count_all_results();     
         // print_r($project_count);die();
         
         //Demo Pending count
         $this->db->distinct();
         $this->db->where('prt_client', $emp_name);
         $this->db->where('prt_dept', $dept);
         $this->db->where('tl_prt_status', 'Demo Pending');   
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');   
         $demo_pending_project_count = $this->db->count_all_results();   
         // print_r($project_count);die();
         
         //Input Pending count
         $this->db->distinct();
         $this->db->where('prt_client', $emp_name);
         $this->db->where('prt_dept', $dept);
         $this->db->where('tl_prt_status', 'Input Pending');   
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');    
         $input_pending_project_count = $this->db->count_all_results();  
         // print_r($project_count);die();
         
         //Feedback Pending count
         $this->db->distinct();
         $this->db->where('prt_client', $emp_name);
         $this->db->where('prt_dept', $dept);
         $this->db->where('tl_prt_status', 'Feedback Pending');   
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');     
         $fb_pending_project_count = $this->db->count_all_results();     
         // print_r($project_count);die();
         
         //Under Testing count
         $this->db->distinct();
         $this->db->where('prt_client', $emp_name);
         $this->db->where('prt_dept', $dept);
         $this->db->where('tl_prt_status', 'Under Testing');   
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');        
         $un_test_project_count = $this->db->count_all_results();
         // print_r($project_count);die();
         
         //Completed count
         $this->db->distinct();
         $this->db->where('prt_client', $emp_name);
         $this->db->where('prt_dept', $dept);
         $this->db->where('tl_prt_status', 'Completed');   
         $this->db->like('prt_date', $month); //2021-12
         $this->db->from('project');      
         $com_project_count = $this->db->count_all_results();
         // print_r($project_count);die();
                  
         $barchart = "[['Department', 'Pending = " . $pending_project_count . " ', 'In Progress  = " . $in_progress_project_count . "', 'Demo Pending  = " . $demo_pending_project_count . "', 'Input Pending  = " . $input_pending_project_count . "', 'Feedback Pending  = " . $fb_pending_project_count . "', 'Under Testing  = " . $un_test_project_count . "', 'Completed  = " . $com_project_count . "'],";
			
         $barchart .= "['" . $dept . "', " . $pending_project_count . ", " . $in_progress_project_count . ", " . $demo_pending_project_count . ", " . $input_pending_project_count . ", " . $fb_pending_project_count . ", " . $un_test_project_count . ", " . $com_project_count . "],";
				
         $barchart .= "['Department', 'Pending', 'In Progress', 'Demo Pending', 'Input Pending', 'Feedback Pending', 'Under Testing', 'Completed']]";

         // print_r($barchart);die();

         return $barchart;

      }

      public function prt_team_member_insert($table, $project_code, $prt_tm_list_sep, $created_by, $ops_id) {
             
         $this->db->select('emp_id')->from('users')->where('emp_name', $prt_tm_list_sep);

         $project_teammem_id = $this->db->get()->row()->emp_id;

         $data = array(
				"project_code" => $project_code,
				"project_teammem_id" => $project_teammem_id,
				"created_by" => $created_by,
				"ops_id" => $ops_id,
			);

         $result = $this->db->insert($table, $data);
         return $result;
      }    
      
      public function importData($table, $data) {

         $result = $this->db->insert_batch($table, $data);
         return $result;

      }

      public function project_verify_report_data($postData)
      {
         if($this->session->userdata('role') == "Operations Head")
         {
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
               
            //Project filter
            $project_client_filter = $postData['project_client_filter'];           
            $project_dept_filter = $postData['project_dept_filter'];
            $project_priority_filter = $postData['project_priority_filter'];
            $project_status_filter = $postData['project_status_filter'];
            $project_date_filter = $postData['project_date_filter'];

            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = '(prt_name like "%' . $searchValue . '%" or
               prt_des like "%' . $searchValue . '%" or 
               prt_date like "%' . $searchValue . '%" or 
               prt_priority like "%' . $searchValue . '%" or 
               prt_client like "%' . $searchValue . '%" or 
               prt_dept like "%' . $searchValue . '%" or 
               prt_tl like "%' . $searchValue . '%" or 
               tl_prt_status like "%' . $searchValue . '%" or 
               prt_tm like "%' . $searchValue . '%")';
            }

            if ($project_client_filter != '')
            {
                  $search_arr[] = "prt_client='" . $project_client_filter . "' ";
            }
            if ($project_dept_filter != '')
            {
                  $search_arr[] = "prt_dept='" . $project_dept_filter . "' ";
            }
            if ($project_priority_filter != '')
            {
                  $search_arr[] = "prt_priority='" . $project_priority_filter . "' ";
            }
            if ($project_status_filter != '')
            {
                  $search_arr[] = "tl_prt_status='" . $project_status_filter . "' ";
            }
            if ($project_date_filter != '')
            {
               $timedate1 = strtotime(date("d-m-Y", strtotime($project_date_filter)));
               $prt_date = date("Y-m-d", $timedate1);

               $search_arr[] = "prt_date like '%" . $prt_date . "%' ";
            }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            //# Total number of records without filtering          
            $ops_id = $this->session->userdata('ops_id'); //ops id						
            $this->db->select('count(*) as allcount');
            $this->db->from('project');
            $this->db->where('ops_id', $ops_id);            
            if ($searchQuery != '') $this->db->where($searchQuery);
            $records = $this->db->get()->result();
            $totalRecords = $records[0]->allcount;
            
            //# Total number of record with filtering
            $this->db->select('count(*) as allcount');
            $this->db->from('project');
            $this->db->where('ops_id', $ops_id);                        
            if ($searchQuery != '') $this->db->where($searchQuery);
            $records = $this->db->get()->result();
            $totalRecordwithFilter = $records[0]->allcount;

            # Fetch records  
            $this->db->select('*');
            $this->db->from('project');
            $this->db->where('ops_id', $ops_id);                                    
            if ($searchQuery != '') $this->db->where($searchQuery);            
            $this->db->order_by('prt_date', 'desc');  // or desc            
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get()->result();
            // print_r($records);
            
            $data = array();
		      $file_upload = "";

            foreach ($records as $record) {     

               $this->db->select('file_upload');
               $this->db->where('ops_id', $ops_id);                                    
               $this->db->where('prt_id', $record->id);						
               $result = $this->db->get('project_file_upload');
               $q = $result->result_array();
               
               $ids = array_map(function($item) { return $item['file_upload']; }, $q);
               $file_upload = implode(', ', $ids);               

               if($record->status=="1")
               {
                     $reminder="checked";
               }
               else{
                  $reminder="";
               }

               $action = '<a href="javascript:void(0);"  data-toggle="tooltip" title="Add Task"  class="btn btn-primary btn-sm mt-1 datable-act-btn addtaskRecord" data-id="'.$record->id.'" data-project_code="'.$record->project_code.'" data-prt_name="'.$record->prt_name.'" data-prt_tl="'.$record->prt_tl.'"><i class="ti-pencil-alt"></i></a>
               <a href="javascript:void(0);"  data-toggle="tooltip" title="Edit"  class="btn btn-info btn-sm mt-1 datable-act-btn editRecord" data-id="'.$record->id.'"  data-prt_name="'.$record->prt_name.'"  data-prt_date="'.$record->prt_date.'"  data-prt_des="'.$record->prt_des.'"  data-prt_priority="'.$record->prt_priority.'"  data-prt_client="'.$record->prt_client.'"  data-project_code="'.$record->project_code.'"   data-prt_dept="'.$record->prt_dept.'"  data-prt_tl="'.$record->prt_tl.'"><i class="ti-pencil"></i></a>
               <a href="javascript:void(0);"  data-toggle="tooltip" title="Delete"  class="btn btn-danger btn-sm mt-1 datable-act-btn deleteRecord" data-id="'.$record->id.'" data-project_code="'.$record->project_code.'"><i class="ti-trash"></i></a>               
               <a href="javascript:void(0);" data-toggle="tooltip" title="Project Status" class="btn btn-success btn-sm mt-1 datable-act-btn projectst" data-id="'.$record->id.'"><i class="ti-stats-up"></i></a>
               <a href="viewTask/'.$record->project_code.'"  data-toggle="tooltip" title="Task View"  class="btn btn-secondary btn-sm mt-1 datable-act-btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>
               <label class="switch_active"  data-toggle="tooltip" title="Active" ><input type="checkbox"  '.$reminder.'   id="activeRecord" class="activeRecord" data-id="'.$record->id.'" data-status="'.$record->status.'" ><span class="slider round project_action"></span></label>';
               
               if($record->tl_prt_status == "Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "In Progress"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Demo Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block; background-color: black; border-color: black;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Input Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Feedback Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Under Testing"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Completed"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }                        
               
               if(!empty($record->prt_tm)){
                  $strArray = explode(',', $record->prt_tm);

                  $tm_project_ul_li = "<ul class='list-style-none'>";

                  foreach($strArray as $strArrays){
                     $tm_project_ul_li .= '<li style="width: max-content;"><i class="fa fa-check text-info"></i> '.$strArrays.'</li>';                  
                  }

                  $tm_project_ul_li .= "</ul>";
                  
               } else{
                  $tm_project_ul_li = $record->prt_tm;
               }    

               //project date
               if($record->prt_date !=''){
                  $timedate1 = strtotime(date("Y-m-d", strtotime($record->prt_date)));
                  $prt_date = date("d-m-Y", $timedate1);
               }else{
                  $prt_date = '';

               }

               $data[] = array(
               // "id" => $record->id,
               "prt_name" => $record->prt_name,
               "prt_date" => $prt_date,
               "prt_des" => $record->prt_des,
               "prt_priority" => $record->prt_priority,
               "prt_client" => $record->prt_client,
               "prt_dept" => $record->prt_dept,
               "prt_tl" =>$record->prt_tl,
               "prt_tm" =>$tm_project_ul_li,
               // "view_report" => $file_upload,
               "tl_prt_status" =>$tl_prt_status_btn,
               "action" => $action            
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;      
         }
         else if($this->session->userdata('role') == 'Team Leader'){
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
               
            //Project filter
            $project_client_filter = $postData['project_client_filter'];           
            $project_dept_filter = $postData['project_dept_filter'];
            $project_priority_filter = $postData['project_priority_filter'];
            $project_status_filter = $postData['project_status_filter'];
            $project_date_filter = $postData['project_date_filter'];
            
            // if($project_dept_filter != ''){
            //    print_r($project_dept_filter);exit();
            // }else{
            //    print_r("no");exit();
            // }

            //# Search
            $search_arr = array();
            $where_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = '(p.prt_name like "%' . $searchValue . '%" or
               p.prt_des like "%' . $searchValue . '%" or 
               p.prt_date like "%' . $searchValue . '%" or 
               p.prt_priority like "%' . $searchValue . '%" or 
               p.prt_client like "%' . $searchValue . '%" or 
               p.prt_dept like "%' . $searchValue . '%" or 
               p.prt_tl like "%' . $searchValue . '%" or 
               p.tl_prt_status like "%' . $searchValue . '%" or 
               p.prt_tm like "%' . $searchValue . '%")';
              
            }
            
            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }            

            //# Total number of records without filtering          
            $login_emp_name = $this->session->userdata('emp_name'); 
            $login_emp_id = $this->session->userdata('emp_id'); 
            $ops_id = $this->session->userdata('ops_id'); 

            $whereQuery = "";           
            $where_arr[] = "(p.prt_tl='" . $login_emp_name . "' and p.ops_id='" . $ops_id . "' or ptm.project_teammem_id='" . $login_emp_id . "' )";
            
            if ($project_dept_filter != '')
            {
                  $where_arr[] = "p.prt_dept='" . $project_dept_filter . "' ";
            }
            if ($project_client_filter != '')
            {
                  $where_arr[] = "p.prt_client='" . $project_client_filter . "' ";
            }           
            if ($project_priority_filter != '')
            {
                  $where_arr[] = "p.prt_priority='" . $project_priority_filter . "' ";
            }
            if ($project_status_filter != '')
            {
                  $where_arr[] = "p.tl_prt_status='" . $project_status_filter . "' ";
            }
            if ($project_date_filter != '')
            {
               $timedate1 = strtotime(date("d-m-Y", strtotime($project_date_filter)));
               $prt_date = date("Y-m-d", $timedate1);

               $where_arr[] = "p.prt_date like '%" . $prt_date . "%' ";
            }

            if (count($where_arr) > 0) {
               $whereQuery = implode(" and ", $where_arr);  
            }
            
            // $this->db->select('count(*) as allcount');
            // $this->db->where('prt_tl',$login_emp_name);
            // // $this->db->or_where('status',$login_emp_name);
            // $this->db->from('project');
          
            $this->db->distinct();
            $this->db->select('p.*');
            $this->db->from('project as p');
            $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');
            // $this->db->where('p.prt_tl', $login_emp_name);
            // $this->db->where('p.ops_id', $ops_id);
            // $this->db->or_where('ptm.project_teammem_id', $login_emp_id);
            $this->db->where($whereQuery);
            if ($searchQuery != '') $this->db->or_where($searchQuery);
            $records = $this->db->get()->result();
            // print_r($this->db->last_query());exit();            

            $totalRecords = count($records);
            
            //# Total number of record with filtering
            // $login_emp_name = $this->session->userdata('emp_name'); 
            // $this->db->select('count(*) as allcount');
            // $this->db->where('prt_tl',$login_emp_name);
            // // $this->db->or_where('status',$login_emp_name);
            // $this->db->from('project');

            $this->db->distinct();
            $this->db->select('p.*');
            $this->db->from('project as p');
            $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');
            // $this->db->where('p.prt_tl', $login_emp_name);
            // $this->db->where('p.ops_id', $ops_id);
            $this->db->where($whereQuery);
            if ($searchQuery != '') $this->db->where($searchQuery);
            // $this->db->or_where('ptm.project_teammem_id', $login_emp_id);  
            $records = $this->db->get()->result();
            $totalRecordwithFilter = count($records);

            # Fetch records  
            $login_emp_name = $this->session->userdata('emp_name'); 
            // $this->db->select('*');
            // $this->db->where('prt_tl',$login_emp_name);
            // // $this->db->or_where('status',$login_emp_name);
            // $this->db->from('project');

            $this->db->distinct();
            $this->db->select('p.*');
            $this->db->from('project as p');
            $this->db->join('project_team_member as ptm', 'ptm.project_code = p.project_code');
            // $this->db->where('p.prt_tl', $login_emp_name);
            // $this->db->where('p.ops_id', $ops_id);
            // $this->db->or_where('ptm.project_teammem_id', $login_emp_id);
            $this->db->where($whereQuery);
            if ($searchQuery != '') $this->db->where($searchQuery);
            $this->db->order_by('prt_date', 'desc');  // or desc            
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();

            foreach ($records as $record) {              
             
               // $view_report = '<center><span class="label label-success"  data-toggle="modal" data-target="#viewmodel">View</span></center> onclick=test("'.$record->id.'", "'.$record->prt_tl.'"'; 

               $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Add Task" class="btn btn-primary btn-sm mt-1 addtaskRecord datable-act-btn" data-id="'.$record->id.'" data-project_code="'.$record->project_code.'" data-prt_name="'.$record->prt_name.'" data-prt_tl="'.$record->prt_tl.'"><i class="ti-pencil-alt"></i></a>
               <a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-success btn-sm viewRecord datable-act-btn"  data-id="'.$record->id.'" data-project_code="'.$record->project_code.'"><i class="ti-file"></i></a>
               <a href="javascript:void(0);" data-toggle="tooltip" title="Team Member List" class="btn btn-info btn-sm mt-1 assignbtn datable-act-btn" data-id="'.$record->id.'" data-prt_tl="'.$record->prt_tl.'" data-project_code="'.$record->project_code.'")><i class="ti-user"></i></a>
               <a href="javascript:void(0);" data-toggle="tooltip" title="Project Status" class="btn btn-danger btn-sm mt-1 projectst datable-act-btn" data-id="'.$record->id.'"><i class="ti-stats-up"></i></a>
               <a href="viewTask/'.$record->project_code.'" data-toggle="tooltip" title="Task View" class="btn btn-secondary btn-sm mt-1 datable-act-btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
              
               //tl project status
               if($record->tl_prt_status == "Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "In Progress"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Demo Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block; background-color: black; border-color: black;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Input Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Feedback Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Under Testing"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Completed"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }                     

               //project tm
               if(!empty($record->prt_tm)){
                  $strArray = explode(',', $record->prt_tm);

                  $tm_project_ul_li = "<ul class='list-style-none'>";

                  foreach($strArray as $strArrays){
                     $tm_project_ul_li .= '<li style="width: max-content;"><i class="fa fa-check text-info"></i> '.$strArrays.'</li>';                  
                  }

                  $tm_project_ul_li .= "</ul>";

               } else{
                  $tm_project_ul_li = $record->prt_tm;
               }    

               //project date
               if($record->prt_date !=''){
                  $timedate1 = strtotime(date("Y-m-d", strtotime($record->prt_date)));
                  $prt_date = date("d-m-Y", $timedate1);
               }else{
                  $prt_date = '';

               }

               $data[] = array(
               // "id" => $record->id,
               "prt_name" => $record->prt_name,
               "prt_des" => $record->prt_des,
               "prt_date" => $prt_date,
               "prt_priority" => $record->prt_priority,
               "prt_client" => $record->prt_client,
               "prt_dept" => $record->prt_dept,
               "prt_tl" =>$record->prt_tl,
               "prt_tm" =>$tm_project_ul_li,
               // "view_report" => $view_report,
               "tl_prt_status" =>$tl_prt_status_btn,
               "action" => $action          
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;
         }
         else if($this->session->userdata('role') == 'Team Member'){
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
               
            //Project filter
            $project_client_filter = $postData['project_client_filter'];           
            $project_dept_filter = $postData['project_dept_filter'];
            $project_priority_filter = $postData['project_priority_filter'];
            $project_status_filter = $postData['project_status_filter'];
            $project_date_filter = $postData['project_date_filter'];

            //# Search
            $search_arr = array();
            $where_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = '(p.prt_name like "%' . $searchValue . '%" or
               p.prt_des like "%' . $searchValue . '%" or 
               p.prt_date like "%' . $searchValue . '%" or 
               p.prt_priority like "%' . $searchValue . '%" or 
               p.prt_client like "%' . $searchValue . '%" or 
               p.prt_dept like "%' . $searchValue . '%" or 
               p.prt_tl like "%' . $searchValue . '%" or 
               p.tl_prt_status like "%' . $searchValue . '%" or 
               p.prt_tm like "%' . $searchValue . '%")';
            }
            
            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            //# Total number of records without filtering          
            $login_id = $this->session->userdata('emp_id'); 

            
            $whereQuery = "";           
            $where_arr[] = "(pt.project_teammem_id='" . $login_id . "')";
            
            if ($project_dept_filter != '')
            {
                  $where_arr[] = "p.prt_dept='" . $project_dept_filter . "' ";
            }
            if ($project_client_filter != '')
            {
                  $where_arr[] = "p.prt_client='" . $project_client_filter . "' ";
            }           
            if ($project_priority_filter != '')
            {
                  $where_arr[] = "p.prt_priority='" . $project_priority_filter . "' ";
            }
            if ($project_status_filter != '')
            {
                  $where_arr[] = "p.tl_prt_status='" . $project_status_filter . "' ";
            }
            if ($project_date_filter != '')
            {
               $timedate1 = strtotime(date("d-m-Y", strtotime($project_date_filter)));
               $prt_date = date("Y-m-d", $timedate1);

               $where_arr[] = "p.prt_date like '%" . $prt_date . "%' ";
            }

            if (count($where_arr) > 0) {
               $whereQuery = implode(" and ", $where_arr);  
            }

            $this->db->distinct();
            $this->db->select('p.*');
            $this->db->from('project_team_member as pt');
            $this->db->join('project as p', 'pt.project_code = p.project_code', 'INNER');
            // $this->db->where('pt.project_teammem_id', $login_id);
            $this->db->where($whereQuery);
            if ($searchQuery != '') $this->db->where($searchQuery);
            $records = $this->db->get()->result();
            $totalRecords = count($records);

            //# Total number of record with filtering
            $login_id = $this->session->userdata('emp_id'); 
            $this->db->distinct();
            $this->db->select('p.*');
            $this->db->from('project_team_member as pt');
            $this->db->join('project as p', 'pt.project_code = p.project_code', 'INNER');
            // $this->db->where('pt.project_teammem_id', $login_id);
            $this->db->where($whereQuery);
            if ($searchQuery != '') $this->db->where($searchQuery);
            $records = $this->db->get()->result();
            $totalRecordwithFilter = count($records);

            # Fetch records  
            $login_id = $this->session->userdata('emp_id');        
            $this->db->distinct();
            $this->db->select('p.*');
            $this->db->from('project_team_member as pt');
            $this->db->join('project as p', 'pt.project_code = p.project_code', 'INNER');
            // $this->db->where('pt.project_teammem_id', $login_id);
            $this->db->where($whereQuery);
            if ($searchQuery != '') $this->db->where($searchQuery);            
            $this->db->order_by('prt_date', 'desc');  // or desc            
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();
            $file_upload = "";

            foreach ($records as $record) {              

               $this->db->select('file_upload');
               $this->db->where('prt_id', $record->id);						
               $result = $this->db->get('project_file_upload');
               $q = $result->result_array();
               
               $ids = array_map(function($item) { return $item['file_upload']; }, $q);
               $file_upload = implode(', ', $ids);               

               // $view_report = '<center><span class="label label-success"  data-toggle="modal" data-target="#viewmodel">View</span></center>'; 

               $action = '<a href="javascript:void(0);" class="btn btn-success btn-sm viewRecord datable-act-btn"  data-toggle="tooltip" title="Project File" data-id="'.$record->id.'" data-project_code="'.$record->project_code.'"><i class="ti-file"></i></a>
               <a href="viewTask/'.$record->project_code.'" data-toggle="tooltip" title="Task View" class="btn btn-secondary btn-sm datable-act-btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
               
               //tl prt status
               if($record->tl_prt_status == "Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "In Progress"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Demo Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block; background-color: black; border-color: black;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Input Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Feedback Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Under Testing"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Completed"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }                     

               //prt tm
               if(!empty($record->prt_tm)){
                  $strArray = explode(',', $record->prt_tm);

                  $tm_project_ul_li = "<ul class='list-style-none'>";

                  foreach($strArray as $strArrays){
                     $tm_project_ul_li .= '<li style="width: max-content;"><i class="fa fa-check text-info"></i> '.$strArrays.'</li>';                  
                  }

                  $tm_project_ul_li .= "</ul>";

               } else{
                  $tm_project_ul_li = $record->prt_tm;
               }   
               
               //project date
               if($record->prt_date !=''){
                  $timedate1 = strtotime(date("Y-m-d", strtotime($record->prt_date)));
                  $prt_date = date("d-m-Y", $timedate1);
               }else{
                  $prt_date = '';

               }

               $data[] = array(
               // "id" => $record->id,
               "prt_name" => $record->prt_name,
               "prt_des" => $record->prt_des,
               "prt_date" => $prt_date,
               "prt_priority" => $record->prt_priority,
               "prt_client" => $record->prt_client,
               "prt_dept" => $record->prt_dept,
               "prt_tl" =>$record->prt_tl,
               "prt_tm" =>$tm_project_ul_li,
               // "view_report" => $view_report,
               "tl_prt_status" =>$tl_prt_status_btn,
               "action" => $action          
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;
         }    
         else if($this->session->userdata('role') == 'Client'){
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
               
            //Project filter
            $project_ops_filter = $postData['project_ops_filter'];           
            $project_dept_filter = $postData['project_dept_filter'];
            $project_priority_filter = $postData['project_priority_filter'];
            $project_status_filter = $postData['project_status_filter'];
            $project_date_filter = $postData['project_date_filter'];
            
            // if($project_ops_filter != ''){
            // // print_r("value");exit();

            // }else{
            // // print_r("no");ex?it();

            // }

            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = '(prt_name like "%' . $searchValue . '%" or
               prt_des like "%' . $searchValue . '%" or 
               prt_date like "%' . $searchValue . '%" or 
               prt_priority like "%' . $searchValue . '%" or 
               prt_client like "%' . $searchValue . '%" or 
               prt_dept like "%' . $searchValue . '%" or 
               prt_tl like "%' . $searchValue . '%" or 
               tl_prt_status like "%' . $searchValue . '%" or 
               prt_tm like "%' . $searchValue . '%")';
            }

            if ($project_ops_filter != '')
            {
                  $search_arr[] = "ops_name='" . $project_ops_filter . "' ";
            }
            if ($project_dept_filter != '')
            {
                  $search_arr[] = "prt_dept='" . $project_dept_filter . "' ";
            }
            if ($project_priority_filter != '')
            {
                  $search_arr[] = "prt_priority='" . $project_priority_filter . "' ";
            }
            if ($project_status_filter != '')
            {
                  $search_arr[] = "tl_prt_status='" . $project_status_filter . "' ";
            }
            if ($project_date_filter != '')
            {
               $timedate1 = strtotime(date("d-m-Y", strtotime($project_date_filter)));
               $prt_date = date("Y-m-d", $timedate1);

               $search_arr[] = "prt_date like '%" . $prt_date . "%' ";
            }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            //# Total number of records without filtering          
            $login_id = $this->session->userdata('emp_id'); 
            $ops_id = $this->session->userdata('ops_id');
            $emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('count(*) as allcount');
            $this->db->where('prt_client',$emp_name);
            $this->db->from('project');

            if ($searchQuery != '') $this->db->where($searchQuery);

            // $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecords = count($records);

            //# Total number of record with filtering
            $emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('count(*) as allcount');
            $this->db->where('prt_client',$emp_name);
            $this->db->from('project');

            if ($searchQuery != '') $this->db->where($searchQuery);

            //   $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecordwithFilter = count($records);

            # Fetch records  
            $login_id = $this->session->userdata('emp_id');        
            
            $emp_name = $this->session->userdata('emp_name'); 
            $this->db->select('*');
            $this->db->where('prt_client',$emp_name);
            $this->db->from('project');

            if ($searchQuery != '') $this->db->where($searchQuery);
            
            $this->db->order_by('prt_date', 'desc');  // or desc
            
            $this->db->limit($rowperpage, $start);

            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();
            $file_upload = "";

            foreach ($records as $record) {              
      
               $action = '<a href="javascript:void(0);" class="btn btn-success btn-sm viewtaskRecord" data-toggle="tooltip" title="Task View"  data-id="'.$record->id.'" data-project_code="'.$record->project_code.'"><i class="ti-file"></i></a>';
               
               if($record->tl_prt_status == "Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "In Progress"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Demo Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-warning" style="display:inline-block; background-color: black; border-color: black;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Input Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Feedback Pending"){
                  $tl_prt_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Under Testing"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }elseif($record->tl_prt_status == "Completed"){
                  $tl_prt_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tl_prt_status.'</span></center>'; 
               }     

               //project date
               if($record->prt_date !=''){
                  $timedate1 = strtotime(date("Y-m-d", strtotime($record->prt_date)));
                  $prt_date = date("d-m-Y", $timedate1);
               }else{
                  $prt_date = '';

               }

               $data[] = array(
               // "id" => $record->id,
               "prt_name" => $record->prt_name,
               "prt_des" => $record->prt_des,
               "prt_priority" => $record->prt_priority,
               "prt_client" => $record->prt_client,
               "prt_dept" => $record->prt_dept,
               // "prt_tl" =>$record->prt_tl,
               // "prt_tm" =>$tm_project_ul_li,
               // "view_report" => $view_report,
               "tl_prt_status" =>$tl_prt_status_btn,
               "prt_date" =>$prt_date,
               "ops_name" =>$record->ops_name,
               "action" => $action          
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;
         }  

      }

      
      function deleteProject($project_code){
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('ops_id', $ops_id);
         $this->db->where('project_code', $project_code);
         $result=$this->db->delete('project');
         return $result;	
      }

      function deleteProjectfile($project_code){         
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('ops_id', $ops_id);
         $this->db->where('prt_id', $project_code);
         $result=$this->db->delete('project_file_upload');
         return $result;	
      }

      function deleteProjecttm($project_code){         
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('ops_id', $ops_id);
         $this->db->where('project_code', $project_code);
         $result=$this->db->delete('project_team_member');
         return $result;	
      }

      function activeProject($id){
         $status = "1";
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('ops_id', $ops_id);
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('project');
         return $result;	
      }
      
      function deactiveProject($id){
         $ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->where('ops_id', $ops_id);
         $status = "0";
         $this->db->set('status', $status);
         $this->db->where('id', $id);
         $result=$this->db->update('project');
         return $result;	
      }

      public function task_team_member_insert($table, $task_code, $task_tm_list_sep, $created_by, $ops_id) {
    
         $this->db->select('emp_id')->from('users')->where('emp_name', $task_tm_list_sep)->where('ops_id', $ops_id);

         $task_teammem_id = $this->db->get()->row()->emp_id;

         $data = array(
				"ops_id" => $ops_id,
				"task_code" => $task_code,
				"task_teammem_id" => $task_teammem_id,
				"created_by" => $created_by
			);

         $result = $this->db->insert($table, $data);
         return $result;
      }

      function fetch_prt_table($project_code)
      {
			$ops_id = $this->session->userdata('ops_id'); //OPs id
         $this->db->select('*');
         $this->db->from('project');
         $this->db->where('project_code', $project_code);
         $this->db->where('ops_id', $ops_id);
         $query = $this->db->get();
         return $query->result();
      }

      public function view_task_report_data_prtpg($postData)
      {
         if($this->session->userdata('role') == "Client")
         {   
            
            // $login_id = $this->session->userdata('emp_id'); 
            // $login_name = $this->session->userdata('emp_name'); 
            // $ops_id = $this->session->userdata('ops_id'); 
            // $project_code = $this->session->userdata('project_code'); 
                        
            // $this->db->select('*');
            // $this->db->from('project as p');
            // $this->db->join('project_team_member as ptm', 'p.project_code = ptm.project_code', 'INNER');
            // $this->db->where('p.project_code', $project_code);
            // $this->db->where('p.ops_id', $ops_id);
            // $project = $this->db->get()->result();
            // // print_r($project[0]['prt_tl']);die();

            // if($project){
               
            //    foreach($project as $projects){
            //       if($projects->project_teammem_id == $login_id){
            //          // print_r("tm");die();
            //       }else{
            //          print_r("tl");die();

            //       }
            //    }
            // }

            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
            
            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = " (tk.task_detail like '%" . $searchValue . "%' or 
                  tk.tm_task like '%" . $searchValue . "%' or 
                  tk.tm_task_status like '%" . $searchValue . "%' or 
                  tk.task_completed_on like '%" . $searchValue . "%' or 
                  tk.created_on like '%" . $searchValue . "%' ) ";
               }

            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            // $login_id = $this->session->userdata('emp_id'); 
            $project_code = $this->session->userdata('project_code'); 
            $ops_id = $this->session->userdata('ops_id'); 
            $this->db->distinct();         
            $this->db->select('tk.*');
            $this->db->from('task as tk');
            $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
            // $this->db->where('tktm.task_teammem_id', $login_id);
            $this->db->where('tk.project_code', $project_code);
            $this->db->where('tk.ops_id', $ops_id);
            if ($searchQuery != '') $this->db->where($searchQuery);
            $records = $this->db->get()->result();
            $totalRecords = count($records);

            // SELECT tk.*
            // FROM task tk
            // INNER JOIN task_team_member tktm
            // ON tktm.task_code = tk.task_code
            // WHERE tktm.task_teammem_id="900386"
            // AND tk.project_code="P0013";

            //# Total number of record with filtering
            $this->db->distinct();
            $this->db->select('tk.*');
            $this->db->from('task as tk');
            $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
            // $this->db->where('tktm.task_teammem_id', $login_id);
            $this->db->where('tk.project_code', $project_code);    
            $this->db->where('tk.ops_id', $ops_id);      
            if ($searchQuery != '') $this->db->where($searchQuery);            
            $records = $this->db->get()->result();
            $totalRecordwithFilter = count($records);

            # Fetch records 
            $this->db->distinct();
            $this->db->select('tk.*');
            $this->db->from('task as tk');
            $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
            // $this->db->where('tktm.task_teammem_id', $login_id);
            $this->db->where('tk.project_code', $project_code);
            $this->db->where('tk.ops_id', $ops_id);
            if ($searchQuery != '') $this->db->where($searchQuery);            
            $this->db->order_by('task_date', 'desc');  // or desc            
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();

            foreach ($records as $record) { 
                              
               if($record->task_date){
                  $sampleDate = $record->task_date;
                  $convertDate = date("d-m-Y", strtotime($sampleDate));
                  
               }else{
                  $convertDate = "";
               }
               
               // $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
               // <a href="'.base_url().'dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
              
               $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Task Remarks" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-eye"></i></a>';
              
               //SELECT tm_task_status FROM `daily_task_update` WHERE emp_id ="900348" AND task_id="T0023" ORDER BY tm_task_status ASC LIMIT 1;           
               
               // print_r($record->tm_task);die();
               
               if($record->tm_task_status == "Pending"){
                  $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "To Do"){
                  $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "Doing"){
                  $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "Completed"){
                  $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == ""){
                  $tm_task_status_btn ="";
               }
               
               if($record->tm_task_status == "Completed"){
                  $task_completed_on = $record->task_completed_on;
                  $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
                  
                  // $task_completed_on = $record->tm_task_status; 
               }else{
                  $task_completed_on = "";
               }      
               
               if($record->created_by){
                  $assigned_by = $this->db->select('emp_name')
                                          ->from('users')
                                          ->where('emp_id', $record->created_by)
                                          ->where('ops_id', $record->ops_id)
                                          ->get()
                                          ->row()->emp_name;                  
               }   

               
               $task_file='<a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-success btn-sm mt-1 viewRecord" style="background-color:#f54281;color:white;" data-id="'.$record->id.'"><i class="ti-file"></i></a>';

               $data[] = array(
               // "id" => $record->id,
               "created_on" => $convertDate,
               "tm_task" =>$record->tm_task,
               "task_detail" =>$record->task_detail,
               "task_file" =>$task_file,
               "tm_task_status" =>$tm_task_status_btn,
               "task_completed_on" =>$task_completed_on,
               "action" =>$action,
               "assigned_by" =>$assigned_by,
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;

         }else if($this->session->userdata('role') == "Operations Head"){

            $login_id = $this->session->userdata('emp_id'); 
            $login_name = $this->session->userdata('emp_name'); 
            $ops_id = $this->session->userdata('ops_id'); 
            $project_code = $this->session->userdata('project_code'); 
                        
            $this->db->select('*');
            $this->db->from('project as p');
            $this->db->join('project_team_member as ptm', 'p.project_code = ptm.project_code', 'INNER');
            $this->db->where('p.project_code', $project_code);
            $this->db->where('p.ops_id', $ops_id);
            $project = $this->db->get()->result();
            // print_r($project[0]['prt_tl']);die();

            if($project){
               
               foreach($project as $projects){
                  if($projects->project_teammem_id == $login_id){
                     // print_r("tm");die();

                     $response = array();

                     //$show = $postData['status'];
                     $draw = $postData['draw'];
                     $start = $postData['start'];
                     $rowperpage = $postData['length']; // Rows display per page
                     $columnIndex = $postData['order'][0]['column']; // Column index
                     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
                     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
                     $searchValue = $postData['search']['value']; // Search value
                     
                     //# Search
                     $search_arr = array();
                     $searchQuery = "";

                     if ($searchValue != '') {
                        $search_arr[] = " (tk.task_detail like '%" . $searchValue . "%' or 
                        tk.tm_task like '%" . $searchValue . "%' or 
                        tk.tm_task_status like '%" . $searchValue . "%' or 
                        tk.task_completed_on like '%" . $searchValue . "%' or 
                        tk.created_on like '%" . $searchValue . "%' ) ";
                     }
                  
                     if (count($search_arr) > 0) {
                        $searchQuery = implode(" and ", $search_arr);  
                     }

                     $login_id = $this->session->userdata('emp_id'); 
                     $project_code = $this->session->userdata('project_code'); 
                     $ops_id = $this->session->userdata('ops_id'); 
                     
                     $this->db->distinct();
                     $this->db->select('tk.*');
                     $this->db->from('task as tk');
                     $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                     $this->db->where('tktm.task_teammem_id', $login_id);
                     $this->db->where('tktm.ops_id', $ops_id);
                     $this->db->where('tk.project_code', $project_code);
                     $this->db->where('tk.ops_id', $ops_id);

                     if ($searchQuery != '') $this->db->where($searchQuery);

                     // $this->db->where($postData_where);

                     $records = $this->db->get()->result();

                     $totalRecords = count($records);

                     // SELECT tk.*
                     // FROM task tk
                     // INNER JOIN task_team_member tktm
                     // ON tktm.task_code = tk.task_code
                     // WHERE tktm.task_teammem_id="900386"
                     // AND tk.project_code="P0013";

                     //# Total number of record with filtering
                     $this->db->distinct();
                     $this->db->select('tk.*');
                     $this->db->from('task as tk');
                     $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                     $this->db->where('tktm.task_teammem_id', $login_id);
                     $this->db->where('tktm.ops_id', $ops_id);
                     $this->db->where('tk.project_code', $project_code);    
                     $this->db->where('tk.ops_id', $ops_id);
                  
                     if ($searchQuery != '') $this->db->where($searchQuery);

                     //   $this->db->where($postData_where);

                     $records = $this->db->get()->result();

                     $totalRecordwithFilter = count($records);

                     # Fetch records 
                     $this->db->distinct();
                     $this->db->select('tk.*');
                     $this->db->from('task as tk');
                     $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                     $this->db->where('tktm.task_teammem_id', $login_id);
                     $this->db->where('tktm.ops_id', $ops_id);
                     $this->db->where('tk.project_code', $project_code);
                     $this->db->where('tk.ops_id', $ops_id);

                     if ($searchQuery != '') $this->db->where($searchQuery);
                     
                     $this->db->order_by('task_date', 'desc');  // or desc
                     
                     $this->db->limit($rowperpage, $start);

                     $records = $this->db->get()->result();
                     // print_r($this->db->last_query());
                     $data = array();

                     foreach ($records as $record) { 
                                       
                        if($record->task_date){
                           $sampleDate = $record->task_date;
                           $convertDate = date("d-m-Y", strtotime($sampleDate));                        
                        }else{
                           $convertDate = "";
                        }
                        
                        // $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                        // <a href="'.base_url().'dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
                     
                        $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord datable-act-btn" data-id="'.$record->id.'" data-task_name="'.$record->task_name.'"  data-tm_task="'.$record->tm_task.'" data-task_detail="'.$record->task_detail.'" data-task_date="'.$record->task_date.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                        <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm deleteRecord datable-act-btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'" ><i class="ti-trash"></i></a>
                        <a href="javascript:void(0);" data-toggle="tooltip" title="Task Report" class="btn btn-success btn-sm mt-1 update_status_btn datable-act-btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0);" data-toggle="tooltip" title="Task Remarks" class="btn btn-secondary btn-sm mt-1 followup_view_btn datable-act-btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-eye"></i></a>';
                     
                        //SELECT tm_task_status FROM `daily_task_update` WHERE emp_id ="900348" AND task_id="T0023" ORDER BY tm_task_status ASC LIMIT 1;           
                        
                        //Task Status
                        if($record->tm_task_status == "Pending"){
                           $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == "To Do"){
                           $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == "Doing"){
                           $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == "Completed"){
                           $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }
                        
                        //Task Completed
                        if($record->tm_task_status == "Completed"){
                           $task_completed_on = $record->task_completed_on;
                           $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
                           
                           // $task_completed_on = $record->tm_task_status; 
                        }else{
                           $task_completed_on = "";
                        }

                        //Task assigned by
                        if($record->created_by){
                           $assigned_by = $this->db->select('emp_name')
                                                   ->from('users')
                                                   ->where('emp_id', $record->created_by)
                                                   ->where('ops_id', $record->ops_id)
                                                   ->get()
                                                   ->row()->emp_name;                  
                        } 
                        
                        $task_file='<a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-sm mt-1 viewRecord" style="background-color:#f54281;color:white;" data-id="'.$record->id.'"><i class="ti-file"></i></a>';               

                        $data[] = array(
                           // "id" => $record->id,
                           "created_on" => $convertDate,
                           "tm_task" =>$record->tm_task,
                           "task_detail" =>$record->task_detail,
                           "task_file" =>$task_file,
                           "tm_task_status" =>$tm_task_status_btn,
                           "task_completed_on" =>$task_completed_on,
                           "action" =>$action,
                           "assigned_by" =>$assigned_by,
                        );
                     }
                        //# Response
                     $response = array(
                        "draw" => intval($draw),
                        "iTotalRecords" => $totalRecords,
                        "iTotalDisplayRecords" => $totalRecordwithFilter,
                        "aaData" => $data
                     );

                     return $response;

                  }else{
                     
                     // print_r("tl");die();

                     $response = array();
                     //$show = $postData['status'];
                     $draw = $postData['draw'];
                     $start = $postData['start'];
                     $rowperpage = $postData['length']; // Rows display per page
                     $columnIndex = $postData['order'][0]['column']; // Column index
                     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
                     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
                     $searchValue = $postData['search']['value']; // Search value
                     
                     //# Search
                     $search_arr = array();
                     $searchQuery = "";

                     if ($searchValue != '') {
                        $search_arr[] = " (tk.task_detail like '%" . $searchValue . "%' or 
                           tk.tm_task like '%" . $searchValue . "%' or 
                           tk.tm_task_status like '%" . $searchValue . "%' or 
                           tk.task_completed_on like '%" . $searchValue . "%' or 
                           tk.task_date like '%" . $searchValue . "%' ) ";
                        }

                     if (count($search_arr) > 0) {
                        $searchQuery = implode(" and ", $search_arr);  
                     }

                     // $login_id = $this->session->userdata('emp_id'); 
                     $project_code = $this->session->userdata('project_code'); 
                     $ops_id = $this->session->userdata('ops_id'); 
                     $this->db->distinct();         
                     $this->db->select('tk.*');
                     $this->db->from('task as tk');
                     $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                     // $this->db->where('tktm.task_teammem_id', $login_id);
                     $this->db->where('tk.project_code', $project_code);
                     $this->db->where('tk.ops_id', $ops_id);

                     if ($searchQuery != '') $this->db->where($searchQuery);

                     // $this->db->where($postData_where);

                     $records = $this->db->get()->result();

                     $totalRecords = count($records);

                     // SELECT tk.*
                     // FROM task tk
                     // INNER JOIN task_team_member tktm
                     // ON tktm.task_code = tk.task_code
                     // WHERE tktm.task_teammem_id="900386"
                     // AND tk.project_code="P0013";

                     //# Total number of record with filtering
                     $this->db->distinct();
                     $this->db->select('tk.*');
                     $this->db->from('task as tk');
                     $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                     // $this->db->where('tktm.task_teammem_id', $login_id);
                     $this->db->where('tk.project_code', $project_code);    
                     $this->db->where('tk.ops_id', $ops_id);
                  
                     if ($searchQuery != '') $this->db->where($searchQuery);

                     //   $this->db->where($postData_where);

                     $records = $this->db->get()->result();

                     $totalRecordwithFilter = count($records);

                     # Fetch records 
                     $this->db->distinct();
                     $this->db->select('tk.*');
                     $this->db->from('task as tk');
                     $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                     // $this->db->where('tktm.task_teammem_id', $login_id);
                     $this->db->where('tk.project_code', $project_code);
                     $this->db->where('tk.ops_id', $ops_id);

                     if ($searchQuery != '') $this->db->where($searchQuery);
                     
                     $this->db->order_by('task_date', 'desc');  // or desc
                     
                     $this->db->limit($rowperpage, $start);

                     $records = $this->db->get()->result();
                     // print_r($records);
                     $data = array();

                     foreach ($records as $record) { 
                        
                        if($record->task_date){
                           $sampleDate = $record->task_date;
                           $convertDate = date("d-m-Y", strtotime($sampleDate));                           
                        }else{
                           $convertDate="";
                        }
                        
                        // $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                        // <a href="'.base_url().'dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
                     
                        $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord datable-act-btn" data-id="'.$record->id.'" data-task_name="'.$record->task_name.'"  data-tm_task="'.$record->tm_task.'" data-task_detail="'.$record->task_detail.'" data-task_date="'.$record->task_date.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                        <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm deleteRecord datable-act-btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'" ><i class="ti-trash"></i></a>
                        <a href="javascript:void(0);" data-toggle="tooltip" title="Task Remarks" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-eye"></i></a>';
                     
                        //SELECT tm_task_status FROM `daily_task_update` WHERE emp_id ="900348" AND task_id="T0023" ORDER BY tm_task_status ASC LIMIT 1;           
                        
                        // print_r($record->tm_task);die();
                        
                        if($record->tm_task_status == "Pending"){
                           $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == "To Do"){
                           $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == "Doing"){
                           $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == "Completed"){
                           $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == ""){
                           $tm_task_status_btn ="";
                        }
                        
                        if($record->tm_task_status == "Completed"){
                           $task_completed_on = $record->task_completed_on;
                           $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
                           
                           // $task_completed_on = $record->tm_task_status; 
                        }else{
                           $task_completed_on = "";
                        }      
                        
                        if($record->created_by){
                           $assigned_by = $this->db->select('emp_name')
                                                   ->from('users')
                                                   ->where('emp_id', $record->created_by)
                                                   ->where('ops_id', $record->ops_id)
                                                   ->get()
                                                   ->row()->emp_name;                  
                        }   

                        
                        $task_file='<a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-success btn-sm mt-1 viewRecord" style="background-color:#f54281;color:white;" data-id="'.$record->id.'"><i class="ti-file"></i></a>';

                        $data[] = array(
                        // "id" => $record->id,
                        "created_on" => $convertDate,
                        "tm_task" =>$record->tm_task,
                        "task_detail" =>$record->task_detail,
                        "task_file" =>$task_file,
                        "tm_task_status" =>$tm_task_status_btn,
                        "task_completed_on" =>$task_completed_on,
                        "action" =>$action,
                        "assigned_by" =>$assigned_by,
                        );
                     }
                        //# Response
                     $response = array(
                        "draw" => intval($draw),
                        "iTotalRecords" => $totalRecords,
                        "iTotalDisplayRecords" => $totalRecordwithFilter,
                        "aaData" => $data
                     );

                     return $response;

                  }

                  // if($projects->prt_tl == $login_name){
                  //    //TL login check to prt_tl
                  //    // print_r("tl");die();

                  //    $response = array();
                  //    //$show = $postData['status'];
                  //    $draw = $postData['draw'];
                  //    $start = $postData['start'];
                  //    $rowperpage = $postData['length']; // Rows display per page
                  //    $columnIndex = $postData['order'][0]['column']; // Column index
                  //    $columnName = $postData['columns'][$columnIndex]['data']; // Column name
                  //    $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
                  //    $searchValue = $postData['search']['value']; // Search value
                     
                  //    //# Search
                  //    $search_arr = array();
                  //    $searchQuery = "";
                  //    if ($searchValue != '') {
                  //       $search_arr[] = " (tk.task_detail like '%" . $searchValue . "%' or 
                  //          tk.tm_task like '%" . $searchValue . "%' or 
                  //          tk.tm_task_status like '%" . $searchValue . "%' or 
                  //          tk.task_completed_on like '%" . $searchValue . "%' or 
                  //          tk.created_on like '%" . $searchValue . "%' ) ";
                  //       }

                  //    if (count($search_arr) > 0) {
                  //       $searchQuery = implode(" and ", $search_arr);  
                  //    }

                  //    // $login_id = $this->session->userdata('emp_id'); 
                  //    $project_code = $this->session->userdata('project_code'); 
                  //    $ops_id = $this->session->userdata('ops_id'); 
                  //    $this->db->distinct();         
                  //    $this->db->select('tk.*');
                  //    $this->db->from('task as tk');
                  //    $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                  //    // $this->db->where('tktm.task_teammem_id', $login_id);
                  //    $this->db->where('tk.project_code', $project_code);
                  //    $this->db->where('tk.ops_id', $ops_id);

                  //    if ($searchQuery != '') $this->db->where($searchQuery);

                  //    // $this->db->where($postData_where);

                  //    $records = $this->db->get()->result();

                  //    $totalRecords = count($records);

                  //    // SELECT tk.*
                  //    // FROM task tk
                  //    // INNER JOIN task_team_member tktm
                  //    // ON tktm.task_code = tk.task_code
                  //    // WHERE tktm.task_teammem_id="900386"
                  //    // AND tk.project_code="P0013";

                  //    //# Total number of record with filtering
                  //    $this->db->distinct();
                  //    $this->db->select('tk.*');
                  //    $this->db->from('task as tk');
                  //    $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                  //    // $this->db->where('tktm.task_teammem_id', $login_id);
                  //    $this->db->where('tk.project_code', $project_code);    
                  //    $this->db->where('tk.ops_id', $ops_id);
                  
                  //    if ($searchQuery != '') $this->db->where($searchQuery);

                  //    //   $this->db->where($postData_where);

                  //    $records = $this->db->get()->result();

                  //    $totalRecordwithFilter = count($records);

                  //    # Fetch records 
                  //    $this->db->distinct();
                  //    $this->db->select('tk.*');
                  //    $this->db->from('task as tk');
                  //    $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                  //    // $this->db->where('tktm.task_teammem_id', $login_id);
                  //    $this->db->where('tk.project_code', $project_code);
                  //    $this->db->where('tk.ops_id', $ops_id);

                  //    if ($searchQuery != '') $this->db->where($searchQuery);
                     
                  //    $this->db->order_by('id', 'desc');  // or desc
                     
                  //    $this->db->limit($rowperpage, $start);

                  //    $records = $this->db->get()->result();
                  //    // print_r($records);
                  //    $data = array();

                  //    foreach ($records as $record) { 
                                          
                  //       $sampleDate = $record->created_on;
                  //       $convertDate = date("d-m-Y", strtotime($sampleDate));
                        
                  //       // $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                  //       // <a href="'.base_url().'dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
                     
                  //       $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Task Remarks" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-eye"></i></a>';
                     
                  //       //SELECT tm_task_status FROM `daily_task_update` WHERE emp_id ="900348" AND task_id="T0023" ORDER BY tm_task_status ASC LIMIT 1;           
                        
                  //       // print_r($record->tm_task);die();
                        
                  //       if($record->tm_task_status == "Pending"){
                  //          $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                  //       }elseif($record->tm_task_status == "To Do"){
                  //          $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                  //       }elseif($record->tm_task_status == "Doing"){
                  //          $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                  //       }elseif($record->tm_task_status == "Completed"){
                  //          $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                  //       }elseif($record->tm_task_status == ""){
                  //          $tm_task_status_btn ="";
                  //       }
                        
                  //       if($record->tm_task_status == "Completed"){
                  //          $task_completed_on = $record->task_completed_on;
                  //          $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
                           
                  //          // $task_completed_on = $record->tm_task_status; 
                  //       }else{
                  //          $task_completed_on = "";
                  //       }      
                        
                  //       if($record->created_by){
                  //          $assigned_by = $this->db->select('emp_name')
                  //                                  ->from('users')
                  //                                  ->where('emp_id', $record->created_by)
                  //                                  ->where('ops_id', $record->ops_id)
                  //                                  ->get()
                  //                                  ->row()->emp_name;                  
                  //       }   

                        
                  //       $task_file='<a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-success btn-sm mt-1 viewRecord" style="background-color:#f54281;color:white;" data-id="'.$record->id.'"><i class="ti-file"></i></a>';

                  //       $data[] = array(
                  //       // "id" => $record->id,
                  //       "created_on" => $convertDate,
                  //       "tm_task" =>$record->tm_task,
                  //       "task_detail" =>$record->task_detail,
                  //       "task_file" =>$task_file,
                  //       "tm_task_status" =>$tm_task_status_btn,
                  //       "task_completed_on" =>$task_completed_on,
                  //       "action" =>$action,
                  //       "assigned_by" =>$assigned_by,
                  //       );
                  //    }
                  //       //# Response
                  //    $response = array(
                  //       "draw" => intval($draw),
                  //       "iTotalRecords" => $totalRecords,
                  //       "iTotalDisplayRecords" => $totalRecordwithFilter,
                  //       "aaData" => $data
                  //    );

                  //    return $response;

                  // }else{
                  //    // print_r("tm");die();
                  //    $response = array();

                  //    //$show = $postData['status'];
                  //    $draw = $postData['draw'];
                  //    $start = $postData['start'];
                  //    $rowperpage = $postData['length']; // Rows display per page
                  //    $columnIndex = $postData['order'][0]['column']; // Column index
                  //    $columnName = $postData['columns'][$columnIndex]['data']; // Column name
                  //    $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
                  //    $searchValue = $postData['search']['value']; // Search value
                     
                  //    //# Search
                  //    $search_arr = array();
                  //    $searchQuery = "";

                  //    if ($searchValue != '') {
                  //       $search_arr[] = " (tk.task_detail like '%" . $searchValue . "%' or 
                  //       tk.tm_task like '%" . $searchValue . "%' or 
                  //       tk.tm_task_status like '%" . $searchValue . "%' or 
                  //       tk.task_completed_on like '%" . $searchValue . "%' or 
                  //       tk.created_on like '%" . $searchValue . "%' ) ";
                  //    }
                  
                  //    if (count($search_arr) > 0) {
                  //       $searchQuery = implode(" and ", $search_arr);  
                  //    }

                  //    $login_id = $this->session->userdata('emp_id'); 
                  //    $project_code = $this->session->userdata('project_code'); 
                  //    $ops_id = $this->session->userdata('ops_id'); 
                     
                  //    $this->db->distinct();
                  //    $this->db->select('tk.*');
                  //    $this->db->from('task as tk');
                  //    $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                  //    $this->db->where('tktm.task_teammem_id', $login_id);
                  //    $this->db->where('tktm.ops_id', $ops_id);
                  //    $this->db->where('tk.project_code', $project_code);
                  //    $this->db->where('tk.ops_id', $ops_id);

                  //    if ($searchQuery != '') $this->db->where($searchQuery);

                  //    // $this->db->where($postData_where);

                  //    $records = $this->db->get()->result();

                  //    $totalRecords = count($records);

                  //    // SELECT tk.*
                  //    // FROM task tk
                  //    // INNER JOIN task_team_member tktm
                  //    // ON tktm.task_code = tk.task_code
                  //    // WHERE tktm.task_teammem_id="900386"
                  //    // AND tk.project_code="P0013";

                  //    //# Total number of record with filtering
                  //    $this->db->distinct();
                  //    $this->db->select('tk.*');
                  //    $this->db->from('task as tk');
                  //    $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                  //    $this->db->where('tktm.task_teammem_id', $login_id);
                  //    $this->db->where('tktm.ops_id', $ops_id);
                  //    $this->db->where('tk.project_code', $project_code);    
                  //    $this->db->where('tk.ops_id', $ops_id);
                  
                  //    if ($searchQuery != '') $this->db->where($searchQuery);

                  //    //   $this->db->where($postData_where);

                  //    $records = $this->db->get()->result();

                  //    $totalRecordwithFilter = count($records);

                  //    # Fetch records 
                  //    $this->db->distinct();
                  //    $this->db->select('tk.*');
                  //    $this->db->from('task as tk');
                  //    $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                  //    $this->db->where('tktm.task_teammem_id', $login_id);
                  //    $this->db->where('tktm.ops_id', $ops_id);
                  //    $this->db->where('tk.project_code', $project_code);
                  //    $this->db->where('tk.ops_id', $ops_id);

                  //    if ($searchQuery != '') $this->db->where($searchQuery);
                     
                  //    $this->db->order_by('id', 'desc');  // or desc
                     
                  //    $this->db->limit($rowperpage, $start);

                  //    $records = $this->db->get()->result();
                  //    // print_r($records);
                  //    $data = array();

                  //    foreach ($records as $record) { 
                                          
                  //       $sampleDate = $record->created_on;
                  //       $convertDate = date("d-m-Y", strtotime($sampleDate));
                        
                  //       // $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                  //       // <a href="'.base_url().'dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
                     
                  //       $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Task Report" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                  //       <a href="javascript:void(0);" data-toggle="tooltip" title="Task Remarks" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-eye"></i></a>';
                     
                  //       //SELECT tm_task_status FROM `daily_task_update` WHERE emp_id ="900348" AND task_id="T0023" ORDER BY tm_task_status ASC LIMIT 1;           
                        
                  //       //Task Status
                  //       if($record->tm_task_status == "Pending"){
                  //          $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                  //       }elseif($record->tm_task_status == "To Do"){
                  //          $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                  //       }elseif($record->tm_task_status == "Doing"){
                  //          $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                  //       }elseif($record->tm_task_status == "Completed"){
                  //          $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                  //       }
                        
                  //       //Task Completed
                  //       if($record->tm_task_status == "Completed"){
                  //          $task_completed_on = $record->task_completed_on;
                  //          $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
                           
                  //          // $task_completed_on = $record->tm_task_status; 
                  //       }else{
                  //          $task_completed_on = "";
                  //       }

                  //       //Task assigned by
                  //       if($record->created_by){
                  //          $assigned_by = $this->db->select('emp_name')
                  //                                  ->from('users')
                  //                                  ->where('emp_id', $record->created_by)
                  //                                  ->where('ops_id', $record->ops_id)
                  //                                  ->get()
                  //                                  ->row()->emp_name;                  
                  //       } 
                        
                  //       $task_file='<a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-sm mt-1 viewRecord" style="background-color:#f54281;color:white;" data-id="'.$record->id.'"><i class="ti-file"></i></a>';               

                  //       $data[] = array(
                  //          // "id" => $record->id,
                  //          "created_on" => $convertDate,
                  //          "tm_task" =>$record->tm_task,
                  //          "task_detail" =>$record->task_detail,
                  //          "task_file" =>$task_file,
                  //          "tm_task_status" =>$tm_task_status_btn,
                  //          "task_completed_on" =>$task_completed_on,
                  //          "action" =>$action,
                  //          "assigned_by" =>$assigned_by,
                  //       );
                  //    }
                  //       //# Response
                  //    $response = array(
                  //       "draw" => intval($draw),
                  //       "iTotalRecords" => $totalRecords,
                  //       "iTotalDisplayRecords" => $totalRecordwithFilter,
                  //       "aaData" => $data
                  //    );

                  //    return $response;
                  // }

               }
              

            }

           

         }else if($this->session->userdata('role') == 'Team Leader'){

            $login_id = $this->session->userdata('emp_id'); 
            $login_name = $this->session->userdata('emp_name'); 
            $ops_id = $this->session->userdata('ops_id'); 
            $project_code = $this->session->userdata('project_code'); 
                        
            $this->db->select('*');
            $this->db->from('project as p');
            $this->db->join('project_team_member as ptm', 'p.project_code = ptm.project_code', 'INNER');
            $this->db->where('p.project_code', $project_code);
            $this->db->where('p.ops_id', $ops_id);
            $project = $this->db->get()->result();
            // print_r($this->db->last_query());die();

            if($project){
               
               foreach($project as $projects){
                  if($projects->project_teammem_id == $login_id){
                     // print_r("tm");die();
                     if($projects->project_teammem_id == $login_id && $projects->prt_tl == $login_name){
                        // print_r("Tl+tm");die(); //t.e, t.d, d.t, d.v,d.e, d.d

                        $response = array();
                        //$show = $postData['status'];
                        $draw = $postData['draw'];
                        $start = $postData['start'];
                        $rowperpage = $postData['length']; // Rows display per page
                        $columnIndex = $postData['order'][0]['column']; // Column index
                        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
                        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
                        $searchValue = $postData['search']['value']; // Search value
                        
                        //# Search
                        $search_arr = array();
                        $searchQuery = "";

                        if ($searchValue != '') {
                           $search_arr[] = " (tk.task_detail like '%" . $searchValue . "%' or 
                           tk.tm_task like '%" . $searchValue . "%' or 
                           tk.tm_task_status like '%" . $searchValue . "%' or 
                           tk.task_completed_on like '%" . $searchValue . "%' or 
                           tk.created_on like '%" . $searchValue . "%' ) ";
                        }
                     
                        if (count($search_arr) > 0) {
                           $searchQuery = implode(" and ", $search_arr);  
                        }

                        $login_id = $this->session->userdata('emp_id'); 
                        $project_code = $this->session->userdata('project_code'); 
                        $ops_id = $this->session->userdata('ops_id'); 
                        
                        $this->db->distinct();
                        $this->db->select('tk.*');
                        $this->db->from('task as tk');
                        $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                        $this->db->where('tktm.task_teammem_id', $login_id);
                        $this->db->where('tktm.ops_id', $ops_id);
                        $this->db->where('tk.project_code', $project_code);
                        $this->db->where('tk.ops_id', $ops_id);

                        if ($searchQuery != '') $this->db->where($searchQuery);

                        // $this->db->where($postData_where);

                        $records = $this->db->get()->result();

                        $totalRecords = count($records);

                        // SELECT tk.*
                        // FROM task tk
                        // INNER JOIN task_team_member tktm
                        // ON tktm.task_code = tk.task_code
                        // WHERE tktm.task_teammem_id="900386"
                        // AND tk.project_code="P0013";

                        //# Total number of record with filtering
                        $this->db->distinct();
                        $this->db->select('tk.*');
                        $this->db->from('task as tk');
                        $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                        $this->db->where('tktm.task_teammem_id', $login_id);
                        $this->db->where('tktm.ops_id', $ops_id);
                        $this->db->where('tk.project_code', $project_code);    
                        $this->db->where('tk.ops_id', $ops_id);
                     
                        if ($searchQuery != '') $this->db->where($searchQuery);

                        //   $this->db->where($postData_where);

                        $records = $this->db->get()->result();

                        $totalRecordwithFilter = count($records);

                        # Fetch records 
                        $this->db->distinct();
                        $this->db->select('tk.*');
                        $this->db->from('task as tk');
                        $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                        $this->db->where('tktm.task_teammem_id', $login_id);
                        $this->db->where('tktm.ops_id', $ops_id);
                        $this->db->where('tk.project_code', $project_code);
                        $this->db->where('tk.ops_id', $ops_id);

                        if ($searchQuery != '') $this->db->where($searchQuery);
                        
                        $this->db->order_by('task_date', 'desc');  // or desc
                        
                        $this->db->limit($rowperpage, $start);

                        $records = $this->db->get()->result();
                        // print_r($records);
                        $data = array();

                        foreach ($records as $record) { 
                                          
                           if($record->task_date){
                              $sampleDate = $record->task_date;
                              $convertDate = date("d-m-Y", strtotime($sampleDate));                              
                           }else{
                              $convertDate = "";
                           }
                          
                           // $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                           // <a href="'.base_url().'dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
                        
                           $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord datable-act-btn" data-id="'.$record->id.'" data-task_name="'.$record->task_name.'"  data-tm_task="'.$record->tm_task.'" data-task_detail="'.$record->task_detail.'" data-task_date="'.$record->task_date.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                           <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm deleteRecord datable-act-btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'" ><i class="ti-trash"></i></a>
                           <a href="javascript:void(0);" data-toggle="tooltip" title="Task Report" class="btn btn-success btn-sm mt-1 update_status_btn datable-act-btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="fas fa-edit"></i></a>
                           <a href="javascript:void(0);" data-toggle="tooltip" title="Task Remarks" class="btn btn-secondary btn-sm mt-1 followup_view_btn datable-act-btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-eye"></i></a>';

                           //SELECT tm_task_status FROM `daily_task_update` WHERE emp_id ="900348" AND task_id="T0023" ORDER BY tm_task_status ASC LIMIT 1;           
                           
                           //Task Status
                           if($record->tm_task_status == "Pending"){
                              $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                           }elseif($record->tm_task_status == "To Do"){
                              $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                           }elseif($record->tm_task_status == "Doing"){
                              $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                           }elseif($record->tm_task_status == "Completed"){
                              $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                           }
                           
                           //Task Completed
                           if($record->tm_task_status == "Completed"){
                              $task_completed_on = $record->task_completed_on;
                              $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
                              
                              // $task_completed_on = $record->tm_task_status; 
                           }else{
                              $task_completed_on = "";
                           }

                           //Task assigned by
                           if($record->created_by){
                              $assigned_by = $this->db->select('emp_name')
                                                      ->from('users')
                                                      ->where('emp_id', $record->created_by)
                                                      ->where('ops_id', $record->ops_id)
                                                      ->get()
                                                      ->row()->emp_name;                  
                           } 
                           
                           $task_file='<a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-sm mt-1 viewRecord" style="background-color:#f54281;color:white;" data-id="'.$record->id.'"><i class="ti-file"></i></a>';               

                           $data[] = array(
                              // "id" => $record->id,
                              "created_on" => $convertDate,
                              "tm_task" =>$record->tm_task,
                              "task_detail" =>$record->task_detail,
                              "task_file" =>$task_file,
                              "tm_task_status" =>$tm_task_status_btn,
                              "task_completed_on" =>$task_completed_on,
                              "action" =>$action,
                              "assigned_by" =>$assigned_by,
                           );
                        }
                           //# Response
                        $response = array(
                           "draw" => intval($draw),
                           "iTotalRecords" => $totalRecords,
                           "iTotalDisplayRecords" => $totalRecordwithFilter,
                           "aaData" => $data
                        );

                        return $response;


                     }else{
                        // print_r("tm");die(); //d.t, d.v,d.e, d.d

                        $response = array();

                        //$show = $postData['status'];
                        $draw = $postData['draw'];
                        $start = $postData['start'];
                        $rowperpage = $postData['length']; // Rows display per page
                        $columnIndex = $postData['order'][0]['column']; // Column index
                        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
                        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
                        $searchValue = $postData['search']['value']; // Search value
                        
                        //# Search
                        $search_arr = array();
                        $searchQuery = "";

                        if ($searchValue != '') {
                           $search_arr[] = " (tk.task_detail like '%" . $searchValue . "%' or 
                           tk.tm_task like '%" . $searchValue . "%' or 
                           tk.tm_task_status like '%" . $searchValue . "%' or 
                           tk.task_completed_on like '%" . $searchValue . "%' or 
                           tk.created_on like '%" . $searchValue . "%' ) ";
                        }
                     
                        if (count($search_arr) > 0) {
                           $searchQuery = implode(" and ", $search_arr);  
                        }

                        $login_id = $this->session->userdata('emp_id'); 
                        $project_code = $this->session->userdata('project_code'); 
                        $ops_id = $this->session->userdata('ops_id'); 
                        
                        $this->db->distinct();
                        $this->db->select('tk.*');
                        $this->db->from('task as tk');
                        $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                        $this->db->where('tktm.task_teammem_id', $login_id);
                        $this->db->where('tktm.ops_id', $ops_id);
                        $this->db->where('tk.project_code', $project_code);
                        $this->db->where('tk.ops_id', $ops_id);

                        if ($searchQuery != '') $this->db->where($searchQuery);

                        // $this->db->where($postData_where);

                        $records = $this->db->get()->result();

                        $totalRecords = count($records);

                        // SELECT tk.*
                        // FROM task tk
                        // INNER JOIN task_team_member tktm
                        // ON tktm.task_code = tk.task_code
                        // WHERE tktm.task_teammem_id="900386"
                        // AND tk.project_code="P0013";

                        //# Total number of record with filtering
                        $this->db->distinct();
                        $this->db->select('tk.*');
                        $this->db->from('task as tk');
                        $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                        $this->db->where('tktm.task_teammem_id', $login_id);
                        $this->db->where('tktm.ops_id', $ops_id);
                        $this->db->where('tk.project_code', $project_code);    
                        $this->db->where('tk.ops_id', $ops_id);
                     
                        if ($searchQuery != '') $this->db->where($searchQuery);

                        //   $this->db->where($postData_where);

                        $records = $this->db->get()->result();

                        $totalRecordwithFilter = count($records);

                        # Fetch records 
                        $this->db->distinct();
                        $this->db->select('tk.*');
                        $this->db->from('task as tk');
                        $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                        $this->db->where('tktm.task_teammem_id', $login_id);
                        $this->db->where('tktm.ops_id', $ops_id);
                        $this->db->where('tk.project_code', $project_code);
                        $this->db->where('tk.ops_id', $ops_id);

                        if ($searchQuery != '') $this->db->where($searchQuery);
                        
                        $this->db->order_by('task_date', 'desc');  // or desc
                        
                        $this->db->limit($rowperpage, $start);

                        $records = $this->db->get()->result();
                        // print_r($records);
                        $data = array();

                        foreach ($records as $record) { 
                                             
                           if($record->task_date){
                              $sampleDate = $record->task_date;
                              $convertDate = date("d-m-Y", strtotime($sampleDate));                              
                           }else{
                              $convertDate = "";
                           }

                           // $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                           // <a href="'.base_url().'dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
                        
                           $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Task Report" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                           <a href="javascript:void(0);" data-toggle="tooltip" title="Task Remarks" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-eye"></i></a>';
                        
                           //SELECT tm_task_status FROM `daily_task_update` WHERE emp_id ="900348" AND task_id="T0023" ORDER BY tm_task_status ASC LIMIT 1;           
                           
                           //Task Status
                           if($record->tm_task_status == "Pending"){
                              $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                           }elseif($record->tm_task_status == "To Do"){
                              $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                           }elseif($record->tm_task_status == "Doing"){
                              $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                           }elseif($record->tm_task_status == "Completed"){
                              $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                           }
                           
                           //Task Completed
                           if($record->tm_task_status == "Completed"){
                              $task_completed_on = $record->task_completed_on;
                              $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
                              
                              // $task_completed_on = $record->tm_task_status; 
                           }else{
                              $task_completed_on = "";
                           }

                           //Task assigned by
                           if($record->created_by){
                              $assigned_by = $this->db->select('emp_name')
                                                      ->from('users')
                                                      ->where('emp_id', $record->created_by)
                                                      ->where('ops_id', $record->ops_id)
                                                      ->get()
                                                      ->row()->emp_name;                  
                           } 
                           
                           $task_file='<a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-sm mt-1 viewRecord" style="background-color:#f54281;color:white;" data-id="'.$record->id.'"><i class="ti-file"></i></a>';               

                           $data[] = array(
                              // "id" => $record->id,
                              "created_on" => $convertDate,
                              "tm_task" =>$record->tm_task,
                              "task_detail" =>$record->task_detail,
                              "task_file" =>$task_file,
                              "tm_task_status" =>$tm_task_status_btn,
                              "task_completed_on" =>$task_completed_on,
                              "action" =>$action,
                              "assigned_by" =>$assigned_by,
                           );
                        }
                           //# Response
                        $response = array(
                           "draw" => intval($draw),
                           "iTotalRecords" => $totalRecords,
                           "iTotalDisplayRecords" => $totalRecordwithFilter,
                           "aaData" => $data
                        );

                        return $response;

                        
                     }
                     
                  }else{
                     
                     // print_r("tl");die();  //t.e, t.d, d.v

                     $response = array();
                     //$show = $postData['status'];
                     $draw = $postData['draw'];
                     $start = $postData['start'];
                     $rowperpage = $postData['length']; // Rows display per page
                     $columnIndex = $postData['order'][0]['column']; // Column index
                     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
                     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
                     $searchValue = $postData['search']['value']; // Search value
                     
                     //# Search
                     $search_arr = array();
                     $searchQuery = "";

                     if ($searchValue != '') {
                        $search_arr[] = " (tk.task_detail like '%" . $searchValue . "%' or 
                           tk.tm_task like '%" . $searchValue . "%' or 
                           tk.tm_task_status like '%" . $searchValue . "%' or 
                           tk.task_completed_on like '%" . $searchValue . "%' or 
                           tk.task_date like '%" . $searchValue . "%' ) ";
                        }

                     if (count($search_arr) > 0) {
                        $searchQuery = implode(" and ", $search_arr);  
                     }

                     // $login_id = $this->session->userdata('emp_id'); 
                     $project_code = $this->session->userdata('project_code'); 
                     $ops_id = $this->session->userdata('ops_id'); 
                     $this->db->distinct();         
                     $this->db->select('tk.*');
                     $this->db->from('task as tk');
                     $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                     // $this->db->where('tktm.task_teammem_id', $login_id);
                     $this->db->where('tk.project_code', $project_code);
                     $this->db->where('tk.ops_id', $ops_id);

                     if ($searchQuery != '') $this->db->where($searchQuery);

                     // $this->db->where($postData_where);

                     $records = $this->db->get()->result();

                     $totalRecords = count($records);

                     // SELECT tk.*
                     // FROM task tk
                     // INNER JOIN task_team_member tktm
                     // ON tktm.task_code = tk.task_code
                     // WHERE tktm.task_teammem_id="900386"
                     // AND tk.project_code="P0013";

                     //# Total number of record with filtering
                     $this->db->distinct();
                     $this->db->select('tk.*');
                     $this->db->from('task as tk');
                     $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                     // $this->db->where('tktm.task_teammem_id', $login_id);
                     $this->db->where('tk.project_code', $project_code);    
                     $this->db->where('tk.ops_id', $ops_id);
                  
                     if ($searchQuery != '') $this->db->where($searchQuery);

                     //   $this->db->where($postData_where);

                     $records = $this->db->get()->result();

                     $totalRecordwithFilter = count($records);

                     # Fetch records 
                     $this->db->distinct();
                     $this->db->select('tk.*');
                     $this->db->from('task as tk');
                     $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
                     // $this->db->where('tktm.task_teammem_id', $login_id);
                     $this->db->where('tk.project_code', $project_code);
                     $this->db->where('tk.ops_id', $ops_id);

                     if ($searchQuery != '') $this->db->where($searchQuery);
                     
                     $this->db->order_by('task_date', 'desc');  // or desc
                     
                     $this->db->limit($rowperpage, $start);

                     $records = $this->db->get()->result();
                     // print_r($records);
                     $data = array();

                     foreach ($records as $record) { 
                        
                        if($record->task_date){
                           $sampleDate = $record->task_date;
                           $convertDate = date("d-m-Y", strtotime($sampleDate));                           
                        }else{
                           $convertDate="";
                        }
                        
                        // $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                        // <a href="'.base_url().'dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
                     
                        $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm editRecord datable-act-btn" data-id="'.$record->id.'" data-task_name="'.$record->task_name.'"  data-tm_task="'.$record->tm_task.'" data-task_detail="'.$record->task_detail.'" data-task_date="'.$record->task_date.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
                        <a href="javascript:void(0);" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm deleteRecord datable-act-btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'" ><i class="ti-trash"></i></a>
                        <a href="javascript:void(0);" data-toggle="tooltip" title="Task Remarks" class="btn btn-secondary btn-sm mt-1 followup_view_btn datable-act-btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-eye"></i></a>';
                     
                        //SELECT tm_task_status FROM `daily_task_update` WHERE emp_id ="900348" AND task_id="T0023" ORDER BY tm_task_status ASC LIMIT 1;           
                        
                        // print_r($record->tm_task);die();
                        
                        if($record->tm_task_status == "Pending"){
                           $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == "To Do"){
                           $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == "Doing"){
                           $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == "Completed"){
                           $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
                        }elseif($record->tm_task_status == ""){
                           $tm_task_status_btn ="";
                        }
                        
                        if($record->tm_task_status == "Completed"){
                           $task_completed_on = $record->task_completed_on;
                           $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
                           
                           // $task_completed_on = $record->tm_task_status; 
                        }else{
                           $task_completed_on = "";
                        }      
                        
                        if($record->created_by){
                           $assigned_by = $this->db->select('emp_name')
                                                   ->from('users')
                                                   ->where('emp_id', $record->created_by)
                                                   ->where('ops_id', $record->ops_id)
                                                   ->get()
                                                   ->row()->emp_name;                  
                        }   

                        
                        $task_file='<a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-success btn-sm mt-1 viewRecord" style="background-color:#f54281;color:white;" data-id="'.$record->id.'"><i class="ti-file"></i></a>';

                        $data[] = array(
                        // "id" => $record->id,
                        "created_on" => $convertDate,
                        "tm_task" =>$record->tm_task,
                        "task_detail" =>$record->task_detail,
                        "task_file" =>$task_file,
                        "tm_task_status" =>$tm_task_status_btn,
                        "task_completed_on" =>$task_completed_on,
                        "action" =>$action,
                        "assigned_by" =>$assigned_by,
                        );
                     }
                        //# Response
                     $response = array(
                        "draw" => intval($draw),
                        "iTotalRecords" => $totalRecords,
                        "iTotalDisplayRecords" => $totalRecordwithFilter,
                        "aaData" => $data
                     );

                     return $response;

                  }
                 
               }
              

            }

           

         }else if($this->session->userdata('role') == 'Team Member'){
            $response = array();
            //$show = $postData['status'];
            $draw = $postData['draw'];
            $start = $postData['start'];
            $rowperpage = $postData['length']; // Rows display per page
            $columnIndex = $postData['order'][0]['column']; // Column index
            $columnName = $postData['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
            $searchValue = $postData['search']['value']; // Search value
            
            //# Search
            $search_arr = array();
            $searchQuery = "";

            if ($searchValue != '') {
               $search_arr[] = " (tk.task_detail like '%" . $searchValue . "%' or 
               tk.tm_task like '%" . $searchValue . "%' or 
               tk.tm_task_status like '%" . $searchValue . "%' or 
               tk.task_completed_on like '%" . $searchValue . "%' or 
               tk.created_on like '%" . $searchValue . "%' ) ";
            }
           
            if (count($search_arr) > 0) {
               $searchQuery = implode(" and ", $search_arr);  
            }

            $login_id = $this->session->userdata('emp_id'); 
            $project_code = $this->session->userdata('project_code'); 
            
            $this->db->distinct();
            $this->db->select('tk.*');
            $this->db->from('task as tk');
            $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
            $this->db->where('tktm.task_teammem_id', $login_id);
            $this->db->where('tk.project_code', $project_code);

            if ($searchQuery != '') $this->db->where($searchQuery);

            // $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecords = count($records);

            // SELECT tk.*
            // FROM task tk
            // INNER JOIN task_team_member tktm
            // ON tktm.task_code = tk.task_code
            // WHERE tktm.task_teammem_id="900386"
            // AND tk.project_code="P0013";

            //# Total number of record with filtering
            $this->db->distinct();
            $this->db->select('tk.*');
            $this->db->from('task as tk');
            $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
            $this->db->where('tktm.task_teammem_id', $login_id);
            $this->db->where('tk.project_code', $project_code);    
         
            if ($searchQuery != '') $this->db->where($searchQuery);

            //   $this->db->where($postData_where);

            $records = $this->db->get()->result();

            $totalRecordwithFilter = count($records);

            # Fetch records 
            $this->db->distinct();
            $this->db->select('tk.*');
            $this->db->from('task as tk');
            $this->db->join('task_team_member as tktm', 'tktm.task_code = tk.task_code', 'INNER');
            $this->db->where('tktm.task_teammem_id', $login_id);
            $this->db->where('tk.project_code', $project_code);


            if ($searchQuery != '') $this->db->where($searchQuery);
            
            $this->db->order_by('task_date', 'desc');  // or desc
            
            $this->db->limit($rowperpage, $start);

            $records = $this->db->get()->result();
            // print_r($records);
            $data = array();

            foreach ($records as $record) { 
                                  
               if($record->task_date){
                  $sampleDate = $record->task_date;
                  $convertDate = date("d-m-Y", strtotime($sampleDate));                              
               }else{
                  $convertDate = "";
               }

               // $action = '<a href="javascript:void(0);" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
               // <a href="'.base_url().'dailytask/'.$record->task_code.'" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'"><i class="ti-eye"></i></a>';
              
               $action = '<a href="javascript:void(0);" data-toggle="tooltip" title="Task Report" class="btn btn-info btn-sm mt-1 update_status_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-pencil"></i></a>
               <a href="javascript:void(0);" data-toggle="tooltip" title="Task Remarks" class="btn btn-secondary btn-sm mt-1 followup_view_btn" data-id="'.$record->id.'" data-task_code="'.$record->task_code.'"><i class="ti-eye"></i></a>';
              
               //SELECT tm_task_status FROM `daily_task_update` WHERE emp_id ="900348" AND task_id="T0023" ORDER BY tm_task_status ASC LIMIT 1;           
               
               //Task Status
               if($record->tm_task_status == "Pending"){
                  $tm_task_status_btn = '<center><span class="label label-danger" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "To Do"){
                  $tm_task_status_btn = '<center><span class="label label-info" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "Doing"){
                  $tm_task_status_btn = '<center><span class="label label-warning" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }elseif($record->tm_task_status == "Completed"){
                  $tm_task_status_btn = '<center><span class="label label-success" style="display:inline-block;">'.$record->tm_task_status.'</span></center>'; 
               }
               
               //Task Completed
               if($record->tm_task_status == "Completed"){
                  $task_completed_on = $record->task_completed_on;
                  $task_completed_on = date("d-m-Y", strtotime($task_completed_on));
                  
                  // $task_completed_on = $record->tm_task_status; 
               }else{
                  $task_completed_on = "";
               }

               //Task assigned by
               if($record->created_by){
                  $assigned_by = $this->db->select('emp_name')
                                          ->from('users')
                                          ->where('emp_id', $record->created_by)
                                          ->get()
                                          ->row()->emp_name;                  
               } 
               
               $task_file='<a href="javascript:void(0);" data-toggle="tooltip" title="Project File" class="btn btn-sm mt-1 viewRecord" style="background-color:#f54281;color:white;" data-id="'.$record->id.'"><i class="ti-file"></i></a>';               

               $data[] = array(
                  // "id" => $record->id,
                  "created_on" => $convertDate,
                  "task_detail" =>$record->task_detail,
                  "task_file" =>$task_file,
                  "tm_task_status" =>$tm_task_status_btn,
                  "task_completed_on" =>$task_completed_on,
                  "action" =>$action,
                  "assigned_by" =>$assigned_by,
               );
            }
               //# Response
            $response = array(
               "draw" => intval($draw),
               "iTotalRecords" => $totalRecords,
               "iTotalDisplayRecords" => $totalRecordwithFilter,
               "aaData" => $data
            );

            return $response;

         }

      }
      
     

   }


?>