<?php if  ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cmscontaint  extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		// ajax auto complete
		//https://github.com/EllisLab/CodeIgniter/wiki/Ajax-Autocomplete
		
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('cart');
		//$this->load->model('authmod');
		$this->load->model('cmscontaintmod', 'cms');
		$this->load->model('project_model', 'projectmodel');
		$this->load->library('pagination');
		
		//$this->authmod->is_admin_login();
    }
	
	public function index($msg='')
	{
		$layout_data = array();
		$data = array();
		$where_array = array('id >' => 0);
		$data['brandlist'] = $this->projectmodel->get_all_record('brands',$where_array);
		
		$where_array = array('id >' => 0);
		$data['productlist'] = $this->projectmodel->get_all_record('product',$where_array);
		$data['loginuser']='';

		$layout_data['pagename'] ='home_page';
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['home_page'] = $this->load->view('home_page', $data, true);
		$this->load->view('layout', $layout_data);		
	}

///////////////////////////////////////////// search section ///////////////////////////////////////////////////////
	
	public function autocomplete_search() {
	
        $search_data = $this->input->post('search_data');
        $query = $this->projectmodel->get_autocomplete($search_data);
		
		foreach ($query as $value) {		
        	foreach ($value as $row) {	
            echo "<li><a href='" .BASE_URL . "cmscontaint/search_view/?url=" .$row. "'>" .$row. "</a></li>";
			}
        }
		
    }
	
	public function search_view()
	{
		$layout_data = array();
        $data = array();
		$search_data=$this->input->get('url');
		$layout_data['pagename'] ='product_list_search';
        $layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);		
		$data['p_name']=$search_data;
		$sql_search_product="SELECT * FROM `product` WHERE product_name like '".$search_data."%' or details like '%".$search_data."%' ";
		$data['list_search_product']= $this->projectmodel->get_records_from_sql($sql_search_product);	
        $layout_data['product_list_search'] = $this->load->view('product_list_search', $data, true);
        $this->load->view('layout', $layout_data);
	}
///////////////////////////////////////////////////search section end////////////////////////////////////////////////

	public function feedback_section()
	{
		$save_data=array();
		$save_data['product_id']=$this->input->post('product_id');
		$save_data['user_name']=$this->input->post('user_name');
		$save_data['feedback']=$this->input->post('feedback');
		$this->projectmodel->save_records_model('','feedback',$save_data);
		redirect('cmscontaint/product_details/home_page/'.$save_data['product_id']);
	}

	/*  old 
	 public function product_listing_ajax()
		{
				$ids = $this->input->post('type');
				$pieces_ids = explode("|", $ids);
				$attrbute_val_ids='';	
				
				foreach($pieces_ids as $attr_val_id)
				{
					 $attrbute_val_ids=$attr_val_id.','. $attrbute_val_ids;
				}
				//print_r($attrbute_val_ids);
				
				$attrbute_val_ids=substr_replace($attrbute_val_ids ,"",-2);
				$data_list['attrbute_val_ids']=$attrbute_val_ids;
				$data_list['ajaxname']='product_listing';
				$data_list['att_id']='ATTRIBUTE ID='.$pieces_ids[0];
				$this->load->view('ajax_view', $data_list);
				
		}
*/

 public function product_listing_ajax()
		{
				$ids = $this->input->post('type');
				$pieces_ids = explode(",", $ids);
				//$attrbute_val_ids='';	
				//print_r($pieces_ids);
				$product_id='';
				$attr_table_id='';
				$attr_table_val='';
				foreach($pieces_ids as $attr_val_id)
				{
					if($attr_val_id<>0&&$attr_val_id<>''){
					 $sql_attr="SELECT * FROM `product_attribute_value` WHERE `id`=".$attr_val_id;
					 $list_attr= $this->projectmodel->get_records_from_sql($sql_attr);						 
					foreach ($list_attr as $row_attr){   $attr_table_id=$row_attr->attribute_table_id; $attr_table_val=$row_attr->attribute_value; }
						
					$sql_attr="SELECT * FROM `product_attribute_value` WHERE `attribute_table_id`=".$attr_table_id." and attribute_value='".$attr_table_val."'";
					
					$list_attr= $this->projectmodel->get_records_from_sql($sql_attr);	
					 foreach ($list_attr as $row_attr){ 
							$product_id=$product_id.','.$row_attr->product_id;
					 }
				}
				}
				
				$product_id='0'.$product_id;
				
				//print_r($attrbute_val_ids);
				if($product_id<>'') {
				$sql_product="SELECT * FROM `product` WHERE id in(".$product_id.")";
				$data_list['product_list12']= $this->projectmodel->get_records_from_sql($sql_product);	
				}
				else
				{
					$sql_product="SELECT * FROM `product` ";
					$data_list['product_list12']= $this->projectmodel->get_records_from_sql($sql_product);	
				}
					 
				//$attrbute_val_ids=substr_replace($attrbute_val_ids ,"",-2);
				$data_list['attrbute_val_ids']=$pieces_ids;
				$data_list['ajaxname']='product_listing';
				$data_list['ajax_value']='AJAXYES';
				$this->load->view('ajax_view', $data_list);
				
		}
		
		
		
	public function product_listing($pagename='',$cat='',$scat='')
	{
		$layout_data = array();
		$data = array();
		$sql1="SELECT * FROM product WHERE subcat_id='$scat' ";
		$data_list['product_list12']= $this->projectmodel->get_records_from_sql($sql1);
		$layout_data['pagename'] =$pagename;
		
		$data_list['ajax_value']='AJAXNO';
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		//$data_list['product_list_without_ajax'] = $this->load->view('ajax_view', $data_list);
		
		$layout_data['product_listing'] = $this->load->view('product_listing', $data_list, true);
		$this->load->view('layout', $layout_data);
		
	}
	
/////////////////////////////////////////by Som Nath dated-3-june starts///////////////////////////////////////
       public function product_list_brand()
       {
               $layout_data = array();
               $data = array();
               $layout_data['pagename'] ='product_list_brand';
               $layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
               $layout_data['product_list_brand'] = $this->load->view('product_list_brand', $data, true);
               $this->load->view('layout', $layout_data);
       }
/////////////////////////////////////////////////by Som Nath dated-3-june ///////////////////////////////////////
	
	
	public function purchase_welcome($msg='')
	{
		$layout_data = array();
		$data = array();
		$layout_data['pagename'] ='purchase_welcome';			
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['purchase_welcome'] = $this->load->view('purchase_welcome', $data, true);
		$this->load->view('layout', $layout_data);		
		
	}
	
	
	/*Purchase Entry */
	public function customer_purchase($msg='')	
	 {
		$layout_data = array();
		$data = array();				
		if(isset($_POST))
					{	
				$values=$this->input->post();
				
				$issubmit=$values['issubmit'];
				if($issubmit=='1' && $msg=='shop') {
				
				$this->form_validation->set_rules('name','Customer Name','required');
				$this->form_validation->set_rules('email','Email','required');
									
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
				}
				else  //validation pass
				{
										   
					//for existing customer
					$emailid=$this->input->post('email');		
					$sql1="SELECT * FROM tblm_agent WHERE  emailid='$emailid'  ";
					$product_list12=$this->projectmodel->get_records_from_sql($sql1);
					if(count($product_list12) > 0)
					{ 
						foreach ($product_list12 as $row)
						{ $custid=$row->id; }
					}
					else //for NEW CUSTOMER
					{
						
						$saveusr['name']=$this->input->post('name');
						$saveusr['emailid']=$this->input->post('email');
						$saveusr['mobno']=$this->input->post('mobile');		
						$saveusr['JOINTYPE']='CLIENT';
						$saveusr['password']=md5($this->input->post('name').date('Y-m-d H:m:s'));
						$saveusr['parentid']='283';
						date_default_timezone_set("Asia/Kolkata");
						$saveusr['DOJ']=date("Y/m/d H:i:s");
						$this->projectmodel->save_records_model('','tblm_agent',$saveusr);
						$custid=$this->db->insert_id();
					}
					
					
					
					$save_data['id']=$this->input->post('id');
					$save_data['name']=$this->input->post('name');
					$save_data['address']=$this->input->post('address');
					$save_data['landmark']=$this->input->post('landmark');
					$save_data['pincode']=$this->input->post('pincode');
					$save_data['phone']=$this->input->post('phone');
					$save_data['country']=$this->input->post('country');
					$save_data['purchase_status']="ORDERED";
					date_default_timezone_set("Asia/Kolkata");
					$save_data['pur_date']=date("Y/m/d H:i:s");	
					$save_data['custid']=$custid;
					
					//PURCHASE SUMMARY SECTION..
					if($values['id']==0) // insert data....
					{	
						$this->projectmodel->save_records_model($values['id'],'purchase_summary',$save_data);
						 $lastid=$this->db->insert_id();
						
						$save_data['purchase_id']=$custid.$lastid;
						$save_data['id']=$lastid;
						
						$this->projectmodel->save_records_model($lastid,'purchase_summary',$save_data);
						//enter purchase details.....
						
						$total = $this->cart->total_items();
						for($ii=1;$ii<=$total;$ii++)
						{
							$productid = $this->input->post('product'.$ii);
							$qty = $this->input->post('qty'.$ii);
							
							$product_data['id']='';
							$product_data['purchase_id']=$lastid;
							$product_data['product_id']=$productid;	
							$product_data['quantity']=$qty;	
							
							if($productid>0) 
							{
							
								$sql1="SELECT * FROM product WHERE  id=".$productid;
								$product_list12=$this->projectmodel->get_records_from_sql($sql1);	
							
								if(count($product_list12) > 0){
								foreach ($product_list12 as $row){ 
								$product_data['mrp']=$row->amount; 
								$product_data['agent_comm_amt']=$row->agent_comm_amt*$qty; 
								$product_data['shipping_amt']=$row->shipping_amt*$qty; 
								$product_data['sub_total']=$row->amount*$qty;
								$product_data['grand_total']=$row->amount*$qty+$row->shipping_amt*$qty;
								$product_data['status']='ORDERED';
								}}
								$this->projectmodel->save_records_model($values['id'],'purchase_details',$product_data);
								
								}											  
						    }
						
						// email send for invoice...
						$this->email->initialize(array('mailtype' => 'html')); 
						$emailmsg='Your Invoice has been Prepared..';				 
					    $this->email->from('info@pocketbazar.net', 'Pocket Bazar Invoice');
						$this->email->to($emailid); 
						//$this->email->cc('another@another-example.com'); 
						//$this->email->bcc('them@their-example.com'); 
						$this->email->subject('Your Invoice');
						$email = $this->load->view('invoice_email_view',$save_data, TRUE);
						$this->email->message($email);	
						$this->email->send();
						// email send password...
						$this->email->initialize(array('mailtype' => 'html')); 
						$emailmsg='Your default password has been Prepared..';				 
					    $this->email->from('info@pocketbazar.net', 'Default Password');
						$this->email->to($emailid); 
						//$this->email->cc('another@another-example.com'); 
						//$this->email->bcc('them@their-example.com'); 
						$this->email->subject('Your Default Password to access your account');
						$email = $this->load->view('default_password_email',$save_data, TRUE);
						$this->email->message($email);	
						$this->email->send();
						
						redirect('cmscontaint/purchase_welcome/');
						
					 }
				}	
				}
				
				else  // not post 
					{
					redirect('cmscontaint/party_login');
					}
					
				}
				
					
	 }

	
	/*Purchase Entry End*/
	
	
	
	/*Customer join */
	 
	 public function customer_join_func($parentid='',$displaytype)	
	 {
		$layout_data = array();
		$data = array();
		if($displaytype=='view')
		{
		$layout_data['pagename'] ='customer_list';
		$where_array = array('parentid' => $parentid,'JOINTYPE'=>'CLIENT');
		$data['projectlist'] = $this->projectmodel->get_all_record('tblm_agent',$where_array);	
		
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['customer_list'] = $this->load->view('customer_list', $data, true);
		$this->load->view('layout', $layout_data);		
		}
		
		
		
		if($displaytype=='add')
		{
		$layout_data['pagename'] ='customer_join';
		
		
		if(isset($_POST))
					{	
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				
				$this->form_validation->set_rules('name','Customer Name','required');
				$this->form_validation->set_rules('parentid','Parent ID','required');
				//$this->form_validation->set_rules('mobno','mobno','required');
				//$this->form_validation->set_rules('emailid','emailid','required|valid_email|is_unique[tblm_agent.emailid]');
				
					
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('cmscontaint/customer_join_func/'.
						$this->session->userdata('custid').'/add');
				}
				else  //validation pass
				{
				
					$save_data['id']=$this->input->post('id');
					$save_data['name']=$this->input->post('name');
					$save_data['fathername']=$this->input->post('fathername');
					$save_data['dob']=$this->input->post('dob');
					$save_data['res_add']=$this->input->post('res_add');
					$save_data['district']=$this->input->post('district');
					$save_data['city']=$this->input->post('city');
					$save_data['pincode']=$this->input->post('pincode');
					$save_data['state']=$this->input->post('state');
					$save_data['mobno']=$this->input->post('mobno');
					
					$save_data['emailid']=$this->input->post('emailid');
					$save_data['nom_name']=$this->input->post('nom_name');
					$save_data['nom_dob']=$this->input->post('nom_dob');
					$save_data['password']=123;
					$save_data['DOJ']=$this->input->post('DOJ');
					$save_data['parentid']=$this->input->post('parentid');
					$save_data['rank']=$this->input->post('rank');
					$save_data['nominee_relation']=$this->input->post('nominee_relation');
					$save_data['JOINTYPE']=$this->input->post('JOINTYPE');
					$save_data['branch_id']=123;
					$save_data['bnkaccountno']=$this->input->post('bnkaccountno');
					
					$save_data['ifsccode']=$this->input->post('ifsccode');
					$save_data['bank_name']=$this->input->post('bank_name');
					$save_data['bank_branch']=$this->input->post('bank_branch');
					$save_data['proof_type']=$this->input->post('proof_type');
					
					$save_data['proof_id']=$this->input->post('proof_id');
					$save_data['remarks']=$this->input->post('remarks');
					$maxid=$this->input->post('maxid');
										
					
									
					if($values['id']==0) // insert data....
					{
						
						$save_data['userid']=substr($save_data['name'],0,3).$maxid.strtoupper(substr(md5($save_data['id']),0,4));
						
						$this->projectmodel->save_records_model($values['id'],'tblm_agent',$save_data);
						$this->session->set_userdata('alert_msg', 'One Record Inserted Successfully');
						redirect('cmscontaint/customer_join_func/'.
						$this->session->userdata('custid').'/view');
					}
					
					}}
					
		
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['customer_join'] = $this->load->view('customer_join', $data, true);
		$this->load->view('layout', $layout_data);		
		
		}
		
					
		
	 }
		 
	 /*customer join End*/

	 
	 /*edit profile */
	 
	 public function edit_profile_func($id,$displaytype)	
	 {
		$layout_data = array();
		$data = array();
		$layout_data['pagename'] ='edit_profile';
		$data['productid'] =$id;
		if($displaytype=='view')
		{
		$where_array = array('id' => $id);
		$data['records'] = $this->projectmodel->get_all_record('tblm_agent',$where_array);	
		}
		
		if($displaytype=='addedit')
		{
				if(isset($_POST))
				{	
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				
					$save_data['id']=$this->input->post('id');
					/*$save_data['name']=$this->input->post('name');
					$save_data['fathername']=$this->input->post('fathername');
					$save_data['dob']=$this->input->post('dob');*/
					
					$save_data['res_add']=$this->input->post('res_add');
					$save_data['district']=$this->input->post('district');
					$save_data['city']=$this->input->post('city');
					$save_data['pincode']=$this->input->post('pincode');
					$save_data['state']=$this->input->post('state');
					$save_data['mobno']=$this->input->post('mobno');
					
					$save_data['emailid']=$this->input->post('emailid');
					$save_data['nom_name']=$this->input->post('nom_name');
					$save_data['nom_dob']=$this->input->post('nom_dob');
					$save_data['password']=123;
					$save_data['nominee_relation']=$this->input->post('nominee_relation');
					$save_data['branch_id']=123;
					$save_data['bnkaccountno']=$this->input->post('bnkaccountno');
					$save_data['ifsccode']=$this->input->post('ifsccode');
					$save_data['bank_name']=$this->input->post('bank_name');
					$save_data['bank_branch']=$this->input->post('bank_branch');
					$save_data['proof_type']=$this->input->post('proof_type');
					
					$save_data['proof_id']=$this->input->post('proof_id');
					$save_data['remarks']=$this->input->post('remarks');
					
					if($values['id']>0)// update data....
					{
						$this->projectmodel->save_records_model($values['id'],'tblm_agent',$save_data);
						$this->session->set_userdata('alert_msg', 'One Record Updated Successfully');
						redirect('cmscontaint/edit_profile_func/'.
						$this->session->userdata('custid').'/view');		
						
					}
				
				}
			}
		
		
		
		
					
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['edit_profile'] = $this->load->view('edit_profile', $data, true);
		$this->load->view('layout', $layout_data);		
	 }
		 
	 /*edit profile End*/
	
	
		
	
	
	public function product_details($frompage,$id)
	{
		$layout_data = array();
		$data = array();
		$where_array = array('id' =>$id);
		$data['product_details'] = $this->projectmodel->get_all_record('product',$where_array);
		$where_array = array('id >' => 0);
		$data['feedback'] = $this->projectmodel->get_all_record('feedback',$where_array);

		$layout_data['pagename'] ='product_details';
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['product_details'] = $this->load->view('product_details', $data, true);
		$this->load->view('layout', $layout_data);
	}
	
	
	public function check_out($msg='')
	{
		$layout_data = array();
		$data = array();
		$layout_data['pagename'] ='check_out';
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['check_out'] = $this->load->view('check_out', $data, true);
		$this->load->view('layout', $layout_data);
	}
		
		
	public function cartview($msg='')
	{
		$layout_data = array();
		$data = array();
		$layout_data['pagename'] ='cartview';
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['cartview'] = $this->load->view('cartview', $data, true);
		$this->load->view('layout', $layout_data);
		//$this->load->view('cartviewtemp', $layout_data);
	}
	
	public function tempcartview($msg='')
	{
		$layout_data = array();
		$data = array();
		//$layout_data['pagename'] ='cartview';
		//$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		//$layout_data['cartview'] = $this->load->view('cartview', $data, true);
		//$this->load->view('layout', $layout_data);
		$this->load->view('cartviewtemp', $layout_data);
	}
	
		
	public function updatecart()
	{	
		
		//$this->cart->destroy();
		$data = array();
		$total = $this->cart->total_items();
		for($ii=1;$ii<=$total;$ii++)
    	{
			$rowid = $this->input->post('rid'.$ii);
    		$qty = $this->input->post('qty'.$ii);
			
			
			   $data = array(
			   'rowid' => $rowid,
			   'qty'   => $qty
			);
			$this->cart->update($data);
		}
		$this->session->set_userdata('total_cart_items', $this->cart->total_items());
		$this->cartview();
	}
	
	public function removecart($rowid)
	{
		$data = array();
		$total = $this->cart->total_items();
		for($ii=1;$ii<=$total;$ii++)
    	{
			   $data = array(
			   'rowid' => $rowid,
			   'qty'   => 0
			);
			
			$this->cart->update($data);
		}
		$this->session->set_userdata('total_cart_items', $this->cart->total_items());
		$this->cartview();
	}
	
	
	public function welcome_registration($msg='')
	{
		$layout_data = array();
		$data = array();
		$layout_data['data_info'] = $this->load->view('welcomeview', $data, true);
		$this->load->view('layout', $layout_data);
		
	}
	
	public function logout($pagename='')
	{
	  
	  $this->session->set_userdata(array('id' => '', 'name'=> '','rank'=> '','registration_error_msg'=>'','login_error_msg'=>'')); 
	  $this->session->sess_destroy();  
	  redirect('cmscontaint/'); 
	}
	public function customer_add()
	{
			if(isset($_POST))
			{	
								
				$save_data['name']=$this->input->post('name');
				$save_data['fathername']=$this->input->post('fathername');
				$save_data['mobno']=$this->input->post('mobno');
				$save_data['res_add']=$this->input->post('res_add');
				$save_data['state']=$this->input->post('state');
				$save_data['pincode']=$this->input->post('pincode');
				$save_data['district']=$this->input->post('district');
				$save_data['emailid']=$this->input->post('emailid');
				$save_data['dob']=$this->input->post('dob');
				$save_data['nom_dob']=$this->input->post('nom_dob');
				$save_data['nom_name']=$this->input->post('nom_name');
				$save_data['nominee_relation']=$this->input->post('nominee_relation');
				$save_data['remarks']=$this->input->post('remarks');
				$save_data['JOINTYPE']=$this->input->post('JOINTYPE');
				$save_data['parentid']=$this->input->post('parentid');
				$maxid='';
				$sql="select max(id) id from tblm_agent ";
				$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
				foreach ($rowrecord as $row1) { $maxid= $row1->id; }	
				$save_data['userid']=substr($save_data['name'],0,3).$maxid.strtoupper(substr(md5($save_data['mobno']),0,4));	
					$this->projectmodel->save_records_model('0','tblm_agent',$save_data);					
					$this->session->set_userdata('alert_msg', 'One Record Updated Successfully');
					redirect('cmscontaint/customer_profile/customer_listing');						
			}
	} 
	public function saler_registration()
	{	
		$layout_data=array();
		$data=array();
		$save_data=array();		
			if($this->session->userdata('login_error_msg')<>''){$this->session->set_userdata(array('login_error_msg'=>'')); }
			if(isset($_POST)){					
				$this->form_validation->set_rules('first_name','First Name','required');
				$this->form_validation->set_rules('last_name','Last Name','required');
				$this->form_validation->set_rules('emailid','emailid','required|valid_email|is_unique[tblm_agent.emailid]');			
				$this->form_validation->set_rules('mobno','Phone / Mobile No.','required');
				$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');						
				$this->form_validation->set_rules('dob','Date of Birth','required');
				$this->form_validation->set_rules('gender','radio','required');
				$this->form_validation->set_rules('conform_aggr','TOS','trim|required|xss_clean');			
			if ( $this->form_validation->run() === TRUE ) {
					$table_name='tblm_agent';									
					$save_data['name']=$this->input->post('first_name')." ".$this->input->post('last_name');
					$save_data['password']=$this->input->post('password');					
					$save_data['dob']=$this->input->post('dob');
					$save_data['emailid']=$this->input->post('emailid');
					$save_data['mobno']=$this->input->post('mobno');				
					$save_data['gender']=$this->input->post('gender');
					$save_data['JOINTYPE']='SELLER';
					date_default_timezone_set("Asia/Kolkata");
					$save_data['DOJ']=date("Y/m/d H:i:s");
					$this->projectmodel->save_records_model('0',$table_name,$save_data);
				$email=$save_data['emailid']; $id=''; $name='';				
				$sql_query="SELECT * FROM tblm_agent WHERE emailid='$email'";
				$list_query=$this->projectmodel->get_records_from_sql($sql_query);	
				foreach ($list_query as $row_query){ $id=$row_query->id;  $name=$row_query->name;  $email=$row_query->emailid; }
						/////////////////////////////////////////////////////////
						$this->session->set_userdata('email',$email);
						$this->session->set_userdata('id',$id);						
						$this->session->set_userdata('name',$name);
						$data['pagename']='';
						$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
						$layout_data['loginwelcome'] = $this->load->view('loginwelcomenew', $data, true);
						$layout_data['pagename'] ='login_user';
						$this->load->view('layout', $layout_data);
				}else{
				$this->session->set_userdata('registration_error_msg','Fill all entries as per requirement'.'<br>'.'Try Again..');
				$layout_data['pagename'] ='saler_login_register';
				$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
				$layout_data['saler_login_register'] = $this->load->view('saler_login_register', $data, true);
				$this->load->view('layout', $layout_data);
			}
		}		
	 }
	public function user_registration()	{	
			$layout_data=array();
			$data=array();
			$save_data=array();
			if($this->session->userdata('login_error_msg')<>''){$this->session->set_userdata(array('login_error_msg'=>'')); }
			
			//$this->session->set_userdata(array('registration_error_msg'=>'','login_error_msg'=>'')); 
			if(isset($_POST))
			{	
			$this->form_validation->set_rules('first_name','First Name','required');
			$this->form_validation->set_rules('last_name','Last Name','required');
			$this->form_validation->set_rules('emailid','emailid','required|valid_email|is_unique[tblm_agent.emailid]');			
			$this->form_validation->set_rules('mobno','Phone / Mobile No.','required');
			$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');						
			$this->form_validation->set_rules('dob','Date of Birth','required');
			$this->form_validation->set_rules('gender','radio','required');
			$this->form_validation->set_rules('conform_aggr','TOS','trim|required|xss_clean');
			
			if ( $this->form_validation->run() === TRUE ) {

					$table_name='tblm_agent';				
					
					$save_data['name']=$this->input->post('first_name')." ".$this->input->post('last_name');
					$save_data['password']=$this->input->post('password');					
					$save_data['dob']=$this->input->post('dob');
					$save_data['emailid']=$this->input->post('emailid');
					$save_data['mobno']=$this->input->post('mobno');				
					$save_data['gender']=$this->input->post('gender');
					$save_data['JOINTYPE']='CLIENT';
					$save_data['parentid']='283';
					date_default_timezone_set("Asia/Kolkata");
					$save_data['DOJ']=date("Y/m/d H:i:s");	
			
					/*
					$message='Dear '.$save_data['First_Name'];
					$message.="\n";
					$message.='Welcome to Adore India';
					$message.="\n";
					$message.='Your user Id :'.$save_data['Email_Id'];
					$message.="\n";
					$message.='Your Password :'.$save_data['password'];
					*/
						$email=$save_data['emailid'];
						$id=''; 
						$name='';
						$this->projectmodel->save_records_model('0',$table_name,$save_data);
						$sql_query="SELECT * FROM tblm_agent WHERE emailid='$email'";
						$list_query=$this->projectmodel->get_records_from_sql($sql_query);	
						foreach ($list_query as $row_query){ $id=$row_query->id; $name=$row_query->name; $email=$row_query->emailid; }
						/////////////////////////////////////////////////////////
			$this->session->set_userdata('email',$email);
			$this->session->set_userdata('id',$id);						
			$this->session->set_userdata('name',$name);
						//$data['loginuser'] = $save_data['name'];
						//$data['id']=$uid;
						//$data['loginuser']=$uname;
						$data['pagename']='';
						$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
						$layout_data['loginwelcome'] = $this->load->view('loginwelcomenew', $data, true);
						$layout_data['pagename'] ='login_user';
						$this->load->view('layout', $layout_data);
						
						//$data['messages']='One Record Inserted Successfully';
						//$this->session->set_userdata('alert_msg', 'One Record Inserted Successfully');
					
					/*email section */
					
					/*
					$this->email->from('contact@adoreindia.net', 'Adore India');
					$this->email->to($this->input->post('Email_Id')); 
					//$this->email->cc('another@another-example.com'); 
					//$this->email->bcc('them@their-example.com'); 
					$this->email->subject('Your registration Confirmation.Pocket bazar');
					$this->email->message($message);	
					$this->email->send();
					*/	
				}else{
				$this->session->set_userdata('registration_error_msg','Fill all entries as per requirement'.'<br>'.'Try Again..');
				$layout_data['pagename'] ='user_register_login';
				$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
				$layout_data['user_register_login'] = $this->load->view('user_register_login', $data, true);
				$this->load->view('layout', $layout_data);	
				}
		}		
		
	 }
	public function customer_profile($pagename='')
	{
			$layout_data = array();
			$data= array();
			$data['pagename'] =$pagename;		
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['pagename'] =$pagename;	
		$this->load->view('loginwelcomenew', $data, true);
				
		if($pagename=='') { $layout_data['login_user'] = $this->load->view('loginwelcomenew', $layout_data, true); }
		if($pagename=='mypassword') { $layout_data['mypassword'] = $this->load->view('loginwelcomenew', $layout_data, true); }
		if($pagename=='myself') { $layout_data['myself'] = $this->load->view('loginwelcomenew', $layout_data, true); }			
		if($pagename=='myorder') { $layout_data['myorder'] = $this->load->view('loginwelcomenew', $layout_data, true); }			
		if($pagename=='mycart') { $layout_data['mycart'] = $this->load->view('loginwelcomenew', $layout_data, true); }	
		if($pagename=='customer_profile') { $layout_data['customer_profile'] = $this->load->view('loginwelcomenew', $layout_data, true); }			
		if($pagename=='customer_listing') { $layout_data['customer_listing'] = $this->load->view('loginwelcomenew', $layout_data, true); }				
		if($pagename=='customer_add') { $layout_data['customer_add'] = $this->load->view('loginwelcomenew', $layout_data, true); }	
		if($pagename=='product_add') { $layout_data['product_add'] = $this->load->view('loginwelcomenew', $layout_data, true); }		
		if($pagename=='commision') { $layout_data['commision'] = $this->load->view('loginwelcomenew', $layout_data, true); }
		
		$this->load->view('layout', $layout_data);		
	}
	/*Profile  Section ends*/
	
	public function customer_pass_change(){
		$tabale_data=array();			
		$id=$this->input->post('id');
		$pass=$this->input->post('new_pass');		
		if($this->input->post('new_pass')==$this->input->post('conf_pass')){						
			$sql="SELECT * FROM `tblm_agent` WHERE `id`='$id'";
			$list=$this->projectmodel->get_records_from_sql($sql);	
			foreach ($list as $row){  
				if( $row->password==$this->input->post('oldpass')){
					$tabale_data['password'] =$pass;
					$table_name='tblm_agent';
					$name=$row->name;
					$this->db->update($table_name, $tabale_data, array('id' => $id));		
							
				}
			}
		}
		redirect('cmscontaint/user_register_login/');
	}
	public function saler_login($msg='')
	{	
		if($this->session->userdata('registration_error_msg')<>''){$this->session->set_userdata(array('registration_error_msg'=>'')); }
		if(isset($_POST))
			{	
				$layout_data = array();
	  			$data = array();	
				$this->form_validation->set_rules('username','username','required|email');
				$this->form_validation->set_rules('user_password','user_password','required');		
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('login_error_msg', validation_errors());
					$layout_data['pagename'] ='saler_login_register';
					$data['page_error'] =validation_errors();
					$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
					$layout_data['saler_login_register'] = $this->load->view('saler_login_register', $data, true);
					$this->load->view('layout', $layout_data);					
				}
				if($this->form_validation->run()==TRUE )
				{
						$save_data['username']=$this->input->post('username');
						$save_data['user_password']=$this->input->post('user_password');
						$table_name='tblm_agent';
						$where_array = array('emailid' => $save_data['username'], 'password'=>$save_data['user_password'] );
						$data['logindata']=$this->projectmodel->get_all_record($table_name,$where_array);
										
						if(count($data['logindata']) >= 1)
						{
							$email=$save_data['username'];
							$id='';
							$name='';
							$sql="SELECT * FROM tblm_agent WHERE emailid='$email'";
							$rowcheck = $this->projectmodel->get_records_from_sql($sql);	
							foreach ($rowcheck as $row1) {  $id=$row1->id;  $name=$row1->name; }
							$this->session->set_userdata('email',$email);
							$this->session->set_userdata('id',$id);						
							$this->session->set_userdata('name',$name);
							$data['pagename']='';
							$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
							$layout_data['loginwelcome'] = $this->load->view('loginwelcomenew', $data, true);
							$layout_data['pagename'] ='login_user';
							//$layout_data['loginuser'] =$uname;
							$this->load->view('layout', $layout_data);
							///////////////////////////////////////////////////////////////////////////////////////////
						}
						else
						{							
							$this->session->set_userdata('login_error_msg','Invalid user Id or Password'.'<br>'.'Try Again..');
							$layout_data['pagename'] ='saler_login_register';
							$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
							$layout_data['saler_login_register'] = $this->load->view('saler_login_register', $data, true);
							$this->load->view('layout', $layout_data);							
						}				
				}			
			}	
	}	
	public function user_register_login($msg='')
	{
		$layout_data = array();
		$data = array();		
		$this->session->set_userdata(array('registration_error_msg'=>'','login_error_msg'=>''));
		$layout_data['pagename'] ='user_register_login';
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['user_register_login'] = $this->load->view('user_register_login', $data, true);
		$this->load->view('layout', $layout_data);
	}
	public function saler_login_register()
	{
		$layout_data = array();
		$data = array();
		$this->session->set_userdata(array('registration_error_msg'=>'','login_error_msg'=>''));
		$layout_data['pagename'] ='saler_login_register';
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		$layout_data['saler_login_register'] = $this->load->view('saler_login_register', $data, true);
		$this->load->view('layout', $layout_data);
	}
	public function party_login($msg='')
	{	if($this->session->userdata('registration_error_msg')<>''){$this->session->set_userdata(array('registration_error_msg'=>'')); }	
		if(isset($_POST))
			{	
				$layout_data = array();
				$data = array();
				$this->form_validation->set_rules('username','username','required|email');
				$this->form_validation->set_rules('user_password','user_password','required');		
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('login_error_msg', validation_errors());
					$layout_data['pagename'] ='saler_login_register';
					$data['page_error'] =validation_errors();
					$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
					$layout_data['user_register_login'] = $this->load->view('user_register_login', $data, true);
					$this->load->view('layout', $layout_data);	
				}	
				if($this->form_validation->run()==TRUE )
				{
					$save_data['username']=$this->input->post('username');
					$save_data['user_password']=$this->input->post('user_password');
					$table_name='tblm_agent';
					$where_array = array('emailid' => $save_data['username'], 'password'=>$save_data['user_password']);
					$data['logindata']=$this->projectmodel->get_all_record($table_name,$where_array);
					if(count($data['logindata']) >= 1)
					{
						$email=$save_data['username'];
						$id='';
						$name='';
						$rank='';
						$sql="SELECT * FROM tblm_agent WHERE emailid='$email'";
						$rowcheck = $this->projectmodel->get_records_from_sql($sql);	
						foreach ($rowcheck as $row1) {  $id=$row1->id;$rank=$row1->rank;  $name=$row1->name; }
						$this->session->set_userdata('email',$email);
						$this->session->set_userdata('id',$id);						
						$this->session->set_userdata('name',$name);									
						$this->session->set_userdata('rank',$rank);
						$data['pagename']='';
						$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
						$layout_data['loginwelcome'] = $this->load->view('loginwelcomenew', $data, true);
						$layout_data['pagename'] ='login_user';
						$this->load->view('layout', $layout_data);
						///////////////////////////////////////////////////////////////////////////////////////////
					}
					else
					{
							$this->session->set_userdata('login_error_msg','Invalid user Id or Password'.'<br>'.'Try Again..');
							$layout_data['pagename'] ='user_register_login';
							$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
							$layout_data['user_register_login'] = $this->load->view('user_register_login', $data, true);
							$this->load->view('layout', $layout_data);			
					}				
				}				
			}		
	}	
	public function footerpages($pagename='')
	{
		$layout_data = array();
		$data = array();
		//$data['loginuser']=$loginuser;
		$layout_data['pagename'] =$pagename;			
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		//$layout_data['loginuser']=$loginuser;
		if($pagename=='aboutus') { $layout_data['aboutus'] = $this->load->view('listclaims', $layout_data, true); }
		if($pagename=='contactus') { $layout_data['contactus'] = $this->load->view('listclaims', $layout_data, true); }
		if($pagename=='delevery') {  $layout_data['delevery'] =$this->load->view('listclaims', $layout_data, true); }
		if($pagename=='privacy') { $layout_data['privacy'] =$this->load->view('listclaims', $layout_data, true); }
		if($pagename=='refund') { $layout_data['refund'] =$this->load->view('listclaims', $layout_data, true); }
		if($pagename=='return') { $layout_data['return'] =$this->load->view('listclaims', $layout_data, true); }
		if($pagename=='terms') { $layout_data['terms'] =$this->load->view('listclaims', $layout_data, true); }
		if($pagename=='web_term') {  $layout_data['web_term'] =$this->load->view('listclaims', $layout_data, true); }
		
		$this->load->view('layout', $layout_data);				
	}
	public function profile_edit()	
	{	 	
	 		$where_array = array('id' => $id);
			$data['records'] = $this->projectmodel->get_all_record('tblm_agent',$where_array);	
			if(isset($_POST))
			{	
				//$values=$this->input->post();
				//$data['productid'] =$values['id'];
				$id=$this->input->post('id');
				$save_data['id']=$this->input->post('id');
					/*$save_data['name']=$this->input->post('name');
					$save_data['fathername']=$this->input->post('fathername');
					$save_data['dob']=$this->input->post('dob');*/
					
				$save_data['res_add']=$this->input->post('res_add');
				$save_data['district']=$this->input->post('district');
				$save_data['city']=$this->input->post('city');
				$save_data['pincode']=$this->input->post('pincode');
				$save_data['state']=$this->input->post('state');
				$save_data['mobno']=$this->input->post('mobno');
					
				$save_data['emailid']=$this->input->post('emailid');
				$save_data['nom_name']=$this->input->post('nom_name');
				$save_data['nom_dob']=$this->input->post('nom_dob');
				$save_data['password']=123;
				$save_data['nominee_relation']=$this->input->post('nominee_relation');
				$save_data['branch_id']=123;
				$save_data['bnkaccountno']=$this->input->post('bnkaccountno');
				$save_data['ifsccode']=$this->input->post('ifsccode');
				$save_data['bank_name']=$this->input->post('bank_name');
				$save_data['bank_branch']=$this->input->post('bank_branch');
				$save_data['proof_type']=$this->input->post('proof_type');
					
				$save_data['proof_id']=$this->input->post('proof_id');
				$save_data['remarks']=$this->input->post('remarks');
					
				if($id>0)// update data....
				{
					$this->projectmodel->save_records_model($id,'tblm_agent',$save_data);
					$this->session->set_userdata('alert_msg', 'One Record Updated Successfully');
					redirect('cmscontaint/customer_profile/myself');						
				}				
			}			
	}
	/*product section*/
	public function load_data_ajax()
	{
	    $id = $this->input->post('type');
		$where_array = array('id' => $id);
		$data_list['subcatagory_id'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		$this->load->view('customer_profile/ajax_view', $data_list);
	}
	public function delete_record_controller($id,$table_name,$redirectlist)
	{
		$this->projectmodel->delete_record($id,$table_name)	;
		$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
		//redirect('product/productlisting/');
		//redirect('project_controller/'.$redirectlist.'/');	
	}
	public function product_section($table_name='',$displaytype='list',$id=0)	
	{
	 			$layout_data = array();
				$data = array();
				if($displaytype=='list')
				{
					$data['records']="";
					$data['productid'] ="0";
				}
				if($displaytype=='addeditview')
				{
					$where_array = array('id' => $id);
					$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
					$data['productid'] =$id;
				}
				if($displaytype=='del') //add --update
				{
				$this->projectmodel->delete_record($id,$table_name)	;
				$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
				//redirect('project_controller/product_section/product_view/product/list/0');	
				}
				if($displaytype=='addedit') //add --update
				{
					$where_array = array('id' => $id);
					$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
					//$data['records'] = $this->projectmodel->get_single_record($table_name,$id);
					$data['productid'] =$id;
					
	 		if(isset($_POST)){	
				
				$values=$this->input->post();
				//$data['productid'] =$values['id'];
			/*
				$this->form_validation->set_rules('subcat_id','Sub category','required');
				$this->form_validation->set_rules('product_name','Product_name','required');
				$this->form_validation->set_rules('brand_id','Brand_id','required');
				$this->form_validation->set_rules('amount','Amount','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('cmscontaint/customer_profile/product_view');
				}
				else  //validation pass
				{*/
						$save_data['id']=$this->input->post('id');
						$save_data['seller_id']=$this->input->post('seller_id');
						$save_data['subcat_id']=$this->input->post('subcat_id');
						$save_data['brand_id']=$this->input->post('brand_id');
						$save_data['product_name']=$this->input->post('product_name');
						$save_data['details']=$this->input->post('details');
						$save_data['product_code']=$this->input->post('product_code');
						$save_data['qty']=$this->input->post('qty');
						$save_data['amount']=$this->input->post('amount');
						$save_data['discount']=$this->input->post('discount');
						$save_data['weight']=$this->input->post('weight');
						$save_data['manufacturer_id']=$this->input->post('manufacturer_id');
						$save_data['status']='InActive';
						$table_name='product';
							if($values['id']==0) // insert data....
							{
								$this->projectmodel->save_records_model($values['id'],$table_name,$save_data);
								$lastid=$this->db->insert_id();
								$this->session->set_userdata('alert_msg', 'One Record Inserted Successfully');
							}
							
							if($values['id']>0)// update data....
							{
								$this->projectmodel->save_records_model($values['id'],$table_name,$save_data);
								$lastid=$values['id'];
								$this->session->set_userdata('alert_msg', 'One Record Updated Successfully');	
							}
							// picture upload  
			
			   
							//image 1				
							$image_path='admin/uploads/products/';
							$form_fld='image1';
							$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
							$image_name='prd1_id_'.$lastid.'.'.$fileextension;
							$table_fld='image1';
							$this->upload_images($image_path,$image_name,$form_fld,$table_name,$lastid,$table_fld);
							
							//image 2				
							$image_path='admin/uploads/products/';
							$form_fld='image2';
							$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
							$image_name='prd2_id_'.$lastid.'.'.$fileextension;
							$table_fld='image2';
							$this->upload_images($image_path,$image_name,$form_fld,$table_name,$lastid,$table_fld);
				
							//image 3				
							$image_path='admin/uploads/products/';
							$form_fld='image3';
							$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
							$image_name='prd3_id_'.$lastid.'.'.$fileextension;
							$table_fld='image3';
							$this->upload_images($image_path,$image_name,$form_fld,$table_name,$lastid,$table_fld);
							
							//image 4				
							$image_path='admin/uploads/products/';
							$form_fld='image4';
							$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
							$image_name='prd4_id_'.$lastid.'.'.$fileextension;
							$table_fld='image4';
							$this->upload_images($image_path,$image_name,$form_fld,$table_name,$lastid,$table_fld);
							
							
							
							////////////////////ATTRIBUTE SECTION ADD/////////////////////////////			
							$where_array = array('product_id' => $lastid);
							$this->projectmodel->delete_record_with_condition('product_attribute_value',$where_array);
							
							$subcatid=$this->input->post('subcat_id');
							$sql="SELECT * FROM attribute_table WHERE subcategory_id=".$subcatid;
							$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
							foreach ($rowrecord as $row2){ 							
								 $attribute_data['product_id']=$lastid;  
								 $attribute_data['attribute_table_id']=$row2->id;
								 $attribute_data['attribute_value']=$this->input->post($row2->id);											 
								 $this->projectmodel->save_records_model('','product_attribute_value',$attribute_data);			
							 }		
							//////////////////////////////////////////////////////////////////////
						//}   //else-validation  ends
					}
							
				}
				//}
				//echo "done";	
				$data['pagename'] ='product_add';		
				$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
				$layout_data['pagename'] ='product_add';	
				$this->load->view('loginwelcomenew', $data, true);
				$layout_data['product_add'] = $this->load->view('loginwelcomenew', $layout_data, true); 		
				$this->load->view('layout', $layout_data);	
				//redirect('cmscontaint/customer_profile/product_add/'.$data);		
		 }
	 
		/*product section End */
	function upload_images($image_path,$image_name,$form_fld,$table_name,$id,$table_fld) 
	{
       $config = array(
            'upload_path'   => $image_path,
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,                       
        );
        
		$this->load->library('upload', $config);
		$fileName = $image_name;
		$config['file_name'] = $fileName;
		$this->upload->initialize($config);
	
		if ($this->upload->do_upload($form_fld)) 
		{
			$image_data=$this->upload->data();
			$sql="update ".$table_name." set ".$table_fld."='".$fileName."' where id=".$id ;
			$this->db->query($sql);
			
			//THUMB IMAGE
			$config1 = array(
            'source_image'   => $image_data['full_path'],
            'new_image' => $image_path.'thumbs',
            'maintain_ration'     => true, 
			'width'     => 170,
			'height'     => 121                      
        	);
			
			$this->load->library('image_lib',$config1);
			$this->image_lib->resize();
			
			//print_r($config1);
			
			//THUMB IMAGE 
			
		} 
		else 
		{
			return false;
		}
		
  	}
	/*  product cart*/
	public function add_item_cart($frompage,$id,$catid='',$subcatid='',$brandid='')
	{
		$data = array();
		$where_array = array('id' =>$id);
		$data['product_cartlist'] = $this->projectmodel->get_all_record('product',$where_array);
		//echo count($data['product_cartlist']);
		
		if(count($data['product_cartlist']) > 0){
		$i = 1;
		$picpath=BASE_PATH_ADMIN.'uploads/products/thumbs/';
		foreach ($data['product_cartlist'] as $row){
		$data = array(
               'id'      => $row->id,
               'qty'     => 1,
               'price'   => $row->amount,
               'name'    => $row->product_name,
			   'imagename'    => $row->image1,
               'options' => array('Size' => 'L', 'Color' => 'Red')
            );
		$this->cart->insert($data);
		//print_r($data);
		
		}
		}
		$this->session->set_userdata('total_cart_items', $this->cart->total_items());
		
		if($frompage=='home_page') { 
			//$this->index(); 
			redirect('cmscontaint/cartview');
		} 
		if($frompage=='product_details_buy_now') { 
			//$this->product_details($frompage,$id); 
			redirect('cmscontaint/cartview');
		} 
		if($frompage=='product_details') { 
			$this->product_details($frompage,$id); 
			//redirect('cmscontaint/cartview');
		} 
		
		if($frompage=='product_listing') { 
			//redirect('cmscontaint/product_listing/product_listing/ct/'.$catid.'/scat/'.$subcatid.'/brand/'.$brandid);			
			redirect('cmscontaint/cartview');	
		 } 		
	}
	
}

