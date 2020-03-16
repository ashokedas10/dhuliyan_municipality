<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('authmod');
		$this->authmod->is_admin_login();
		
		$this->load->model('catalog/category_model', 'category');
		$this->load->model('catalog/atribute_model', 'atribute');
		$this->load->model('catalog/product_model', 'product');
    }
	 
	public function index($msg='')
	{
		
	}
	
	public function category($page='', $msg='')
	{
		$layout_data = array();
		$data = array();
		if($msg=='smsgd'){ $msg = "One Category Remove Successfully"; }
		else { $msg==''; }
		$data['msg'] = $msg;
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', $this->authmod->category_list(), true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		
		$data['projectlist'] = $this->category->listing();
		$data['project_addedit'] = RETAILER_BASE_URL."catalog/addedit_category/";
		$data['project_del'] = RETAILER_BASE_URL."catalog/delete_category/";
		
		
		$layout_data['data_info'] = $this->load->view('catalog/category', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
	}
	
	public function addedit_category($id=0, $msg='')
	{
		$layout_data = array();
		$data = array();
		if($msg=='sav'){ $msg = "One Category Update Successfully"; }
		else { $msg==''; }
		if($this->session->userdata('alert_msg')!=''){
			$msg.=$this->session->userdata('alert_msg');
			$this->session->set_userdata('alert_msg','');
		}
		$data['msg'] = $msg;
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', $this->authmod->category_list(), true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		if($msg=='seccupd'){ $msg="Successfully Update"; }
		$data['msg'] = $msg;
		$data['id'] = $id;
		
		$data['row'] = $this->category->get_category_byid($id);
		
				
		$layout_data['data_info'] = $this->load->view('catalog/category_addedit', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
	}
	
	public function addedit_category_act(){
		if(!$_POST){
			redirect('catalog/category/');
			exit();
		}
		
		$value = $this->input->post();
		
		if(isset($value['id']) ){
			$id = $value['id'];
			$this->form_validation->set_rules('category', 'Category', 'required');
			if ($this->form_validation->run())
			{
				$id = $this->category->addedit_act($value);
				redirect('catalog/addedit_category/'.$id.'/sav');
				exit();
			}else{
				$this->session->set_userdata('alert_msg', validation_errors());
				redirect('catalog/addedit_category/'.$id.'');
				exit();
			}
			
		}else{
			redirect('catalog/addedit_category/');
			exit();
		}

	}
	
	
	
	public function delete_category($id=0){
		if($id){
			$this->category->delete($id);
			redirect('catalog/category/smsgd/');
		}else{
			redirect('catalog/category/');
			exit();
		}
	}
	
	/**************       Atribute Color Section      ***********************/
	
	public function atricolor($pid=0, $page='', $msg='')
	{
		$layout_data = array();
		$data = array();
		if($msg=='smsgd'){ $msg = "One Size Remove Successfully"; }
		else { $msg==''; }
		$data['msg'] = $msg;
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', $this->authmod->category_list(), true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		
		$data['projectlist'] = $this->atribute->listing($pid);
		$data['project_addedit'] = RETAILER_BASE_URL."catalog/addedit_atricolor/";
		$data['project_del'] = RETAILER_BASE_URL."catalog/delete_atricolor/";
		
		
		$layout_data['data_info'] = $this->load->view('catalog/atribute', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
	}
	
	public function addedit_atricolor($id=0, $msg='')
	{
		$layout_data = array();
		$data = array();
		
		if($msg=='sav'){ $msg = "One Size Insert Successfully"; }
		elseif($msg=='seccupd'){ $msg="Successfully Update"; }
		else { $msg==''; }
		if($this->session->userdata('alert_msg')!=''){
			$msg.=$this->session->userdata('alert_msg');
			$this->session->set_userdata('alert_msg','');
		}
		$data['msg'] = $msg;
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', $this->authmod->category_list(), true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		
		$data['form_submit_1'] = RETAILER_BASE_URL."catalog/addedit_atricolor_act/";
		$data['id'] = $id;
		$data['row'] = $this->atribute->get_atricolor_byid($id);
				
		$layout_data['data_info'] = $this->load->view('catalog/atribute_addedit', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
	}
	
	public function addedit_atricolor_act(){
		if(!$_POST){
			redirect('catalog/atricolor/');
			exit();
		}
		
		$value = $this->input->post();
		if(isset($value['id']) ){
			$id = $value['id'];
			$this->form_validation->set_rules('atribute', 'atribute', 'required');
			if ($this->form_validation->run())
			{
				$id = $this->atribute->addedit_act($value);
				redirect('catalog/addedit_atricolor/'.$id.'/sav');
				exit();
			}else{
				$this->session->set_userdata('alert_msg', validation_errors());
				redirect('catalog/addedit_atricolor/'.$id);
				exit();
			}
		}else{
			redirect('catalog/addedit_atricolor/');
			exit();
		}
	}
	
	public function delete_atricolor($id=0){
		if($id){
			$this->atribute->delete($id);
			redirect('catalog/atricolor/0/0/smsgd/');
		}else{
			redirect('catalog/atricolor/');
			exit();
		}
	}
	
	
	/**************       Product Section      ***********************/
	
	public function projectlist($pid=0, $page='', $msg='')
	{
		$layout_data = array();
		$data = array();
		$layout_sub = array();
		if($msg=='smsgd'){ $msg = "One Product Remove Successfully"; }
		else { $msg==''; }
		if($this->session->userdata('alert_msg')!=''){
			$msg.=$this->session->userdata('alert_msg');
			$this->session->set_userdata('alert_msg','');
		}
		$data['msg'] = $msg;
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', $this->authmod->category_list(), true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		
		$data['projectlist'] = $this->product->listing($pid);
		$data['project_addedit'] = RETAILER_BASE_URL."catalog/addedit_product/";
		$data['project_del'] = RETAILER_BASE_URL."catalog/delete_product/";
		$layout_sub['data_info1'] = $this->load->view('product/productlist', $data, true);
		
		$layout_data['data_info'] = $this->load->view('product/product', $layout_sub, true);
		
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
	}
	
	function project_img_del($id, $img_id){
		$this->product->project_img_delete($img_id);
		redirect('catalog/addedit_product/'.$id);
		exit();
	}
	
	function project_img_status($id, $img_id){
		$this->product->project_img_activation($img_id);
		redirect('catalog/addedit_product/'.$id);
		exit();
	}
	
	function project_img_gallery($id, $img_id){
		$this->product->project_img_gallery($img_id);
		redirect('catalog/addedit_product/'.$id);
		exit();
	}
	
	function project_combination_del($id, $com_id){
		$this->product->project_combination_delete($com_id);
		redirect('catalog/addedit_product/'.$id);
		exit();
	}
	
	function addedit_product($id=0, $msg='', $value=array()){
		
		$layout_data = array();
		$data = array();
		$layout_sub = array();
		$data['num'] = '';
		$data['att_val_type'] = '';
		$value = array();
		$value2 = array();
		$value3 = array();
		
		if($_POST){
			if($_POST['step']==1){
				$value = $this->input->post();
				$this->form_validation->set_rules('cat_id', 'Category Selection ', 'required');
				$this->form_validation->set_rules('title', 'Product Title ', 'required');
				$this->form_validation->set_rules('meta_key', 'Product Code ', 'required');
				if ($this->form_validation->run())
				{
					$id = $this->product->addedit_product_act($value, $msg);
					redirect('catalog/addedit_product/'.$id.'/'.$msg);
					exit();
				}else{
					$this->session->set_userdata('alert_msg', validation_errors());
				}
			}
			if($_POST['step']==2){
				$value = $this->input->post();
				$id = $value['id'];
				if($this->product->product_image_upload_id($id)){
					$this->session->set_userdata('alert_msg', "Product Image Uploaded");
					redirect('catalog/addedit_product/'.$id.'/');
				}else{
					$this->session->set_userdata('alert_msg', "Product Image Can'nt Uploaded");
					redirect('catalog/addedit_product/'.$id.'/');
				}
			}
			if($_POST['step']==3){
				$value3 = $this->input->post();
				$id = $value3['id'];
				$data['project_qty_val'] = $value3['qty'];
				$data['project_price_val'] = $value3['price'];
				$this->form_validation->set_rules('price', 'Price par Product ', 'required|decimal');
				$this->form_validation->set_rules('qty', 'Quantity is ', 'required|is_natural');
				if ($this->form_validation->run())
				{
					if($this->product->product_qty_price_id($value3, $m)){
						$this->session->set_userdata('alert_msg', $m);
						redirect('catalog/addedit_product/'.$id.'');
						exit();
					}else{
						$this->session->set_userdata('alert_msg', "Select Product Size");
						redirect('catalog/addedit_product/'.$id.'');
						exit();
					}
				}else{
					$this->session->set_userdata('alert_msg', validation_errors());
				}
			}
			
			if($_POST['step']==4){
				$po_data = $this->input->post();
				$id = $po_data['id'];
				$img_id = $po_data['default'];
				$this->product->project_img_default($id, $img_id);
				redirect('catalog/addedit_product/'.$id.'');
				exit();
			}
			
			if($_POST['step']==5){
				$po_data = $this->input->post();
				$id = $po_data['id'];
				$com_id = $po_data['default'];
				$this->product->project_combination_default($id, $com_id);
				redirect('catalog/addedit_product/'.$id.'');
				exit();
			}
			
			if($_POST['step']==6){
				$value6 = $this->input->post();
				$id = $value6['id'];
				$this->form_validation->set_rules('discount', 'Discount Value ', 'numeric');
				if ($this->form_validation->run())
				{
					$this->product->product_sattings($value6);
					redirect('catalog/addedit_product/'.$id.'');
					exit();
				}else{
					$this->session->set_userdata('alert_msg', validation_errors());
				}
			}
			
			if($_POST['step']==7){
				$value7 = $this->input->post();
				$id = $value7['id'];
				$data = $value7;
				$this->form_validation->set_rules('num', 'Number of product ', 'required|is_natural_no_zero');
				$this->form_validation->set_rules('att_val_type', 'Selection of Size ', 'required|is_natural'); 
				if ($this->form_validation->run())
				{
					if($this->product->product_to_cart($value7)){
						$this->session->set_userdata('alert_msg', $data['num']." product has been added in your cart ");
					}else{
						$this->session->set_userdata('alert_msg', "There are some problem <br> So, the item has not added in cart " );
					}
					redirect('catalog/addedit_product/'.$id.'');
					exit();
				}else{
					$this->session->set_userdata('alert_msg', validation_errors());
					//die(validation_errors());
					
				}
			}
			
		}
		
		if($msg=='sav'){ $msg = "One Product Insert Successfully"; }
		elseif($msg=='seccupd'){ $msg="Successfully Update"; }
		else { $msg==''; }
		if($this->session->userdata('alert_msg')!=''){
			$msg.=$this->session->userdata('alert_msg');
			$this->session->set_userdata('alert_msg','');
		}
		$data['msg'] = $msg;
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', $this->authmod->category_list(), true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		
		$data['form_submit_1'] = RETAILER_BASE_URL."catalog/addedit_product/".$id;
		$data['id'] = $id;
		$data['row'] = $this->product->get_product_byid($id, $value);
		$layout_sub['data_info1'] = $this->load->view('product/product_addedit', $data, true);	
		
		if($id > 0){
			$data['project_img_status'] = RETAILER_BASE_URL."catalog/project_img_status/$id/";
			$data['img_gallery'] = RETAILER_BASE_URL."catalog/project_img_gallery/$id/";
			$data['project_img_del'] = RETAILER_BASE_URL."catalog/project_img_del/$id/";
			$data['projectlist'] = $this->product->product_imagelist_byid($id);
			$layout_sub['data_info2'] = $this->load->view('product/product_imagelist', $data, true);
			
			$data['project_com_del'] = RETAILER_BASE_URL."catalog/project_combination_del/$id/";
			$data['main_atribute_list'] = $this->atribute->atribute_set();
			$data['image_list'] = $data['projectlist'];
			$data['projectlist'] = $this->product->product_qty_price_list($id);
			$layout_sub['data_info3'] = $this->load->view('product/product_price_qty', $data, true);
			
			$data['row'] = $this->product->get_product_byid($id, $value);
			$layout_sub['data_info4'] = $this->load->view('product/product_sattings', $data, true);
		}
		$layout_data['data_info'] = $this->load->view('product/product', $layout_sub, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
		
	}
	
}

?>