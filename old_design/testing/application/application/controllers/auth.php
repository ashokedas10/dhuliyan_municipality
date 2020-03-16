<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('authmod');
    }
	 
	public function index()
	{
		$this->authmod->is_admin_login();
		redirect('/administrator/', 'refresh'); 
	}
	
	public function login($post=array()){
		$layout_date = array();
		$data = array();
		
		$admin_login = $this->session->userdata('admin_login');
		if($admin_login == true){
			redirect('/auth/', 'refresh');
			exit();
		}
		
		if(count($post) > 0){
			$data = $post;
		}else{
			$data['username'] = '';
			$data['password'] = '';
		}
		
		$layout_date['body'] = $this->load->view('login',$data,true);
		$this->load->view('layout', $layout_date);
	}
	
	public function loginaction(){
	
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run())
		{
			$value = $this->input->post();
			$this->authmod->admin_get_login($value); 
			//echo "ok";
		}
		else
		{
			$value = $this->input->post();
			
			$this->login($value);
		}
	}
	
	public function logout(){
		$this->authmod->logout(); 
	}
	
	function changepassword($msg=''){
	
		$layout_data = array();
		$data = array();
		$data['msg'] = $msg;
		$this->authmod->is_admin_login();
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', $this->authmod->category_list(), true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		
		
		
		$layout_data['data_info'] = $this->load->view('changepass', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
	
	}
	
	function changepassword_act(){
		
		$this->form_validation->set_rules('pass1', 'Old Password', 'required');
		$this->form_validation->set_rules('pass2', 'New Password', 'required');
		$this->form_validation->set_rules('pass3', 'For Confermation Same New Password is', 'required|matches[pass2]');
		if ($this->form_validation->run())
		{
			$value = $this->input->post();
			if(!$this->authmod->update_password($value)){
				$this->changepassword("Invalid old password");
			}
			//echo "ok";
		}
		else
		{
			$value = $this->input->post();
			
			$this->changepassword();
		}
		
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */