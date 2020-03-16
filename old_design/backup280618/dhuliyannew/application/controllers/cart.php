<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('authmod');
		$this->authmod->is_admin_login();
		
		$this->load->model('cart/cart_model', 'cart');
    }
	 
	public function index($msg='')
	{
		$layout_data = array();
		$data = array();
		if($msg==''){ $data['msg'] = 'There is no order'; }
		elseif($msg=='r'){ $data['msg'] = 'Order Canceled '; }	
		elseif($msg=='s'){ $data['msg'] = 'Order Submit Success '; }
		
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', $this->authmod->category_list(), true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		
		$data['projectlist'] = $this->cart->mycart_order($data['order_item']);
		$data['submit_order'] = RETAILER_BASE_URL."cart/submit_order/";
		$data['close_order'] = RETAILER_BASE_URL."cart/remove_order/";
		$data['project_del'] = RETAILER_BASE_URL."cart/remove_item/";
		
		$layout_data['data_info'] = $this->load->view('cart/mycart', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
	}
	
	public function remove_item($ids){
		$this->cart->remove_item($ids);
		redirect('cart/index/');
	}
	
	public function remove_order($ids){
		$this->cart->remove_order($ids);
		redirect('cart/index/r');
	}
	
	public function submit_order($ids){
		$this->cart->submit_order($ids);
		redirect('cart/index/s');
	}
	
	public function listing($page='', $msg='')
	{
		$layout_data = array();
		$data = array();
		if($msg=='smsgd'){ $msg = "One user Remove Successfully"; }
		else { $msg==''; }
		$data['msg'] = $msg;
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		
		$data['projectlist'] = $this->user->listing();
		$data['project_addedit'] = RETAILER_BASE_URL."user/addedit_user/";
		$data['project_del'] = RETAILER_BASE_URL."user/delete_user/";
		
		
		$layout_data['data_info'] = $this->load->view('user/user', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
	}
	
	public function addedit_user($id=0, $msg='')
	{

		if(isset($_POST)){
			$value = $this->input->post();
			if(isset($value['id']) ){
				$id = $value['id'];
				$this->form_validation->set_rules('user_name', 'Username ', 'required');
				if($id==0){ $this->form_validation->set_rules('user_pass', 'Password ', 'required'); }
				$this->form_validation->set_rules('email', 'Email ', 'valid_email');
				
				if ($this->form_validation->run())
				{
					$id = $this->user->addedit_act($value, $m);
					redirect('user/addedit_user/'.$id.'/'.$m);
					exit();
				}else{
					//$this->session->set_userdata('alert_msg', validation_errors());
				}
			}
		}

		$layout_data = array();
		$data = array();
		
		if($msg=='sav'){ $msg = "One user Insert Successfully"; }
		if($msg=='upd'){ $msg = "One user Update Successfully"; }
		else { $msg==''; }
		if($this->session->userdata('alert_msg')!=''){
			$msg.=$this->session->userdata('alert_msg');
			$this->session->set_userdata('alert_msg','');
		}
		$data['msg'] = $msg;
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		if($msg=='seccupd'){ $msg="Successfully Update"; }
		$data['msg'] = $msg;
		$data['id'] = $id;
		
		$data['row'] = $this->user->get_user_byid($id);
						
		$layout_data['data_info'] = $this->load->view('user/user_addedit', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
		
	}
	
	public function addedit_user_act(){
		if(!$_POST){
			redirect('user/user/');
			exit();
		}
		
		$value = $this->input->post();
		
		if(isset($value['id']) ){
			$id = $value['id'];
			$this->form_validation->set_rules('user_name', 'Username ', 'required');
			$this->form_validation->set_rules('user_pass', 'Password ', 'required');
			$this->form_validation->set_rules('email', 'Email ', 'email');
			
			if ($this->form_validation->run())
			{
				$id = $this->user->addedit_act($value);
				redirect('user/addedit_user/'.$id.'/sav');
				exit();
			}else{
				$this->session->set_userdata('alert_msg', validation_errors());
				$this->session->set_userdata('submet_values', $value);
				redirect('user/addedit_user/'.$id.'');
				//$this->addedit_user($id);
				die();
			}
			
		}else{
			redirect('user/addedit_user/');
			exit();
		}

	}
	
	
	
	public function delete_user($id=0){
		if($id){
			$this->user->delete($id);
			redirect('user/listing/smsgd/');
		}else{
			redirect('user/listing/');
			exit();
		}
	}
	
	
}

?>