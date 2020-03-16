<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('authmod');
    }
	 
	public function index()
	{
		$layout_data = array();
		$data = array();
		$this->authmod->is_admin_login();
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', $this->authmod->category_list(), true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		
		
		
		$layout_data['data_info'] = $this->load->view('adminindex', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
	}
	
	public function wel(){
		$query = $this->db->query("SELECT a_id, user_name FROM p_webmaster");
		$fields = $query->list_fields(); 
		print_r($fields);
	}
	
	
	
	
}

