<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product  extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('authmod');
			$this->authmod->is_admin_login();
			$this->load->model('product/product_model', 'productmodel');
			
		}
		
	public function index($msg='')
	{
	
	
	}
	
	public function datatable_demo($page='',$msg='')	
	 {
	 
	 	$layout_data=array();
		$data=array();
		
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		//$data['productlist'] = $this->productmodel->productlisting();
		$data['productlist'] = $this->productmodel->get_all_record('p_product');
		
	 
	 $layout_data['data_info'] = $this->load->view('productview/datatabletest', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
		$this->session->set_userdata('alert_msg', '');	
	 
	 }
	 
	
	public function productlisting($page='',$msg='')	
	 {
	 	$layout_data=array();
		$data=array();
		
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		//$data['productlist'] = $this->productmodel->productlisting();
		$data['productlist'] = $this->productmodel->get_all_record('p_product');
		
		if($this->uri->segment(3)<>'')
		{
		$data['records'] = $this->productmodel->get_single_record('p_product',$this->uri->segment(3));
		//$data['records'] = $this->productmodel->productlisting($this->uri->segment(3));
		
			$data['productid'] =$this->uri->segment(3);
			$data['datalistdisplay'] ='N';
		}
		else
		{
			$data['records']="";
			$data['productid'] ="0";
			$data['datalistdisplay'] ='Y';
		}
				
		$data['product_addedit'] = ADMIN_BASE_URL."product/productlisting/"; 
		// product class->addedit_product function
		$data['product_del'] = ADMIN_BASE_URL."product/delete_record_controller/";
		// product class->delete_product function
		
		$layout_data['data_info'] = $this->load->view('productview/productlist', $data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
		$this->session->set_userdata('alert_msg', '');	
		
	 }
	 
	 
	 
	 public function save_records_controller()
		{	
			
			if(isset($_POST))
			{	
				
				$layout_data=array();
				$data=array();
				$save_data=array();
				$data['user_name'] = $this->session->userdata('user_name');
				$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
				$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
				$data['productid'] =$this->uri->segment(3);
				$data['datalistdisplay'] ='N';
				
				//print_r($this->input->post());
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('title','Title','required');
				$this->form_validation->set_rules('meta_key','Meta key','required');
				$this->form_validation->set_rules('short_desc','Short Desc ','required');
				$this->form_validation->set_rules('long_desc','Long Desc','required');
				
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('product/productlisting/'.$values['id']);
				}
				else  //validation pass
				{
				
					$save_data['id']=$this->input->post('id');
					$save_data['title']=$this->input->post('title');
					$save_data['meta_key']=$this->input->post('meta_key');
					$save_data['short_desc']=$this->input->post('short_desc');
					$save_data['long_desc']=$this->input->post('long_desc');
									
					if($values['id']==0) // insert data....
					{
						$this->productmodel->save_records_model($values['id'],'p_product',$save_data);
						$this->session->set_userdata('alert_msg', 'One Record Inserted Successfully');
						redirect('product/productlisting/');
					}
					if($values['id']>0)// update data....
					{
						$this->productmodel->save_records_model($values['id'],'p_product',$save_data);
						$this->session->set_userdata('alert_msg', 'One Record Updated Successfully');
						redirect('product/productlisting/');		
					}
					
					$this->productlisting();
			  }		
		}
		
		
	 }
	 
	public function delete_record_controller($id,$table_name)
		{
		//$id=$this->input->post('delhdn');//echo 1;
		$this->productmodel->delete_record($id,$table_name)	;
		$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
		redirect('product/productlisting/');	
		}
	 
	 
	 
         
	/*public function addedit_product($id=0, $msg='')
	{

		if(isset($_POST))
		{
			$value = $this->input->post();
			
			if(isset($value['id']) )
			{
					$id = $value['id'];
					//	$this->form_validation->set_rules('user_name', 'Username ', 
					//'required|is_unique[p_webmaster.user_name]');
					$this->form_validation->set_rules('title', 'Title ', 'required');
					
					if($id==0)
					{ 
					$this->form_validation->set_rules('meta_key', 'meta_key ', 'required'); 
					}
					$this->form_validation->set_rules('short_desc', 'short_desc ', 'required');
					
					if ($this->form_validation->run())
					{
						//$id = $this->addeditdata->addedit_act($value, $m);
						redirect('product/productlisting/'.$id);
						exit();
					}
					else
					{
						//$this->session->set_userdata('alert_msg', validation_errors());
					}
			}
		}  // end post if.
		

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
		*/
		
		
}

?>
