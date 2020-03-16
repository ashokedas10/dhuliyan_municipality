<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_controller  extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('authmod');
			$this->authmod->is_admin_login();
			$this->load->model('project_model', 'projectmodel');
			$this->load->dbutil();
			
			//$this->load->helper(array('dompdf', 'file'));
			
		$this->load->helper('url'); //You should autoload this one ;)
		$this->load->helper('ckeditor');
 
 
		//Ckeditor's configuration
		$this->data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'content',
			'path'	=>	'theme_files/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
 
		$this->data['ckeditor_2'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'content_2',
			'path'	=>	'js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
				'toolbar' 	=> 	array(	//Setting a custom toolbar
					array('Bold', 'Italic'),
					array('Underline', 'Strike', 'FontSize'),
					array('Smiley'),
					'/'
				)
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 3' => array (
					'name' 		=> 	'Green Title',
					'element' 	=> 	'h3',
					'styles' => array(
						'color' 	=> 	'Green',
						'font-weight' 	=> 	'bold'
					)
				)
 
			)
		);					
						
			
		}
	public function index($msg=''){	}
	
	public function delete_record_controller($id,$table_name,$redirectlist)
		{
		$this->projectmodel->delete_record($id,$table_name)	;
		$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
		//redirect('product/productlisting/');
		redirect('project_controller/'.$redirectlist.'/');	
		}
//////////////////////////////////////catagory starts//////////////////////////////////////////////////////////////
	 public function category_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 {
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['projectlist'] = $this->projectmodel->get_all_record($table_name,$where_array);
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
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
				if($displaytype=='addedit') //add --update
				{
					$where_array = array('id' => $id);
					$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
					$data['productid'] =$id;
					if(isset($_POST))
					{	
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('cat_name','Cat Name','required');
					
				
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('project_controller/category_section/categoryview/category/list/0');
				}
				else  //validation pass
				{
					$save_data['id']=$this->input->post('id');
					$save_data['cat_name']=$this->input->post('cat_name');//
					$save_data['catdesc']=$this->input->post('catdesc');//
					$save_data['titletag']=$this->input->post('titletag');//
					$save_data['titledesc']=$this->input->post('titledesc');//
					$save_data['titlekey']=$this->input->post('titlekey');//
					$save_data['status']=$this->input->post('status');
					if($values['id']==0) // insert data....
					{
						$this->projectmodel->save_records_model($values['id'],$table_name,$save_data);
						$table_id=$this->db->insert_id(); 
						$this->session->set_userdata('alert_msg', 'One Record Inserted Successfully');
						redirect('project_controller/category_section/categoryview/category/list/0');
					}
					if($values['id']>0)// update data....
					{
						$this->projectmodel->save_records_model($values['id'],$table_name,$save_data);
						$table_id=$values['id'];  
						$this->session->set_userdata('alert_msg', 'One Record Updated Successfully');
						redirect('project_controller/category_section/categoryview/category/list/0');		
						
					}
				  }		
					}
				}
				if($displaytype=='del') //add --update
				{
				$this->projectmodel->delete_record($id,$table_name)	;
				$table_id=$id;
				$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
				redirect('project_controller/category_section/categoryview/category/list/0');	
				}
		$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
		$this->session->set_userdata('alert_msg', '');	
	 }	
///////////////////////////////////////////////catagory ends////////////////////////////////////////////////////////
/////////////////////////////////////////////sub-catagory-starts//////////////////////////////////////////////////
public function sub_cat_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 { 	
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['subcatlist'] = $this->projectmodel->get_all_record($table_name,$where_array);
		$where_array = array('id >' => 0);
		$data['category'] = $this->projectmodel->get_all_record('category',$where_array);
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
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
				if($displaytype=='addedit') //add --update
				{
					$where_array = array('id' => $id);
					$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
					$data['productid'] =$id;
					if(isset($_POST))
					{	
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('cat_id','Catagory','required');
				$this->form_validation->set_rules('subcat_name','Sub Catagory','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('project_controller/sub_cat_section/subcat_view/subcategory/list/0');
				}
				else  //validation pass
				{// `subcategory`(`id`, `cat_id`, `subcat_name`, `Image`, `catdesc`, `status`, `titletag`, `titledesc`, `titlekey`)  
					$save_data['id']=$this->input->post('id');
					$save_data['cat_id']=$this->input->post('cat_id');
					$save_data['subcat_name']=$this->input->post('subcat_name');
					$save_data['catdesc']=$this->input->post('catdesc');
					$save_data['titletag']=$this->input->post('titletag');
					$save_data['titledesc']=$this->input->post('titledesc');
					$save_data['titlekey']=$this->input->post('titlekey');
					$save_data['status']=$this->input->post('status');
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
							
							
				/*	$image_path='./uploads/subcat/';
					$form_fld='Image';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='pic_id_'.$lastid.'.'.$fileextension;
					$table_fld='Image';
					$this->upload_images($image_path,$image_name,$form_fld,$table_name,
					$lastid,$table_fld);*/
					
					
					
					// IMAGE UPLOAD
					if($_FILES['Image']['tmp_name']!='')
					{	
									
					$form_fld='Image';
					$table_fld='Image';
					$image_name_prefix='subcat_image';
					
					$uploads_dir='./uploads/subcat/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}					
					
					redirect('project_controller/sub_cat_section/subcat_view/subcategory/list/0');
				  		}		
					}
				}
      			if($displaytype=='del') //add --update
				{
				$this->projectmodel->delete_record($id,$table_name)	;
				$table_id=$id;
				$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
				redirect('project_controller/sub_cat_section/subcat_view/subcategory/list/0');	
				}
		$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
		$this->session->set_userdata('alert_msg', '');	
	 }	
////////////////////////////////////////////sub-catagory-ends/////////////////////////////////////////////////////
/////////////////////////////////////////////depertment starts/////////////////////////////////////////////////////
 public function product_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 {	 	
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['depertment'] = $this->projectmodel->get_all_record('depertment',$where_array);
		$where_array = array('id >' => 0,'cat_id =' => 5);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);	
		$data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'details',
			'path'	=>	'theme_files/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
				$data['user_name'] = $this->session->userdata('user_name');
				$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
				$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
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
				if($displaytype=='addedit') //add --update
				{
					$where_array = array('id' => $id);
					$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
					$data['productid'] =$id;
					// add edit section start
					if(isset($_POST))
					{	
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('Name','Name','required');
				$this->form_validation->set_rules('Designation','Designation','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('project_controller/product_section/product_view/depertment/list/0');
				}
				else  //validation pass
				{
						$save_data['id']=$this->input->post('id');
						$save_data['Designation']=$this->input->post('Designation');
						$save_data['Name']=$this->input->post('Name');
						$save_data['PhoneNumber']=$this->input->post('PhoneNumber');
						$save_data['Email']=$this->input->post('Email');
						$save_data['details']=$this->input->post('details');
						$save_data['RecordStatus']=$this->input->post('RecordStatus');
						$save_data['SortingOrder']=$this->input->post('SortingOrder');
						$save_data['dob']=$this->input->post('dob');
						$save_data['doj']=$this->input->post('doj');
						$save_data['status']=$this->input->post('status');
						
						$save_data['desig']=$this->input->post('desig');
						$save_data['current_working_role']=
						$this->input->post('current_working_role');
						
						
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
			
			
			
			
				/*	// picture upload  
					//image 1				
					$image_path='./uploads/products/';
					$form_fld='image';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='prd1_id_'.$lastid.'.'.$fileextension;
					$table_fld='image';
					$this->upload_images($image_path,$image_name,$form_fld,
					$table_name,$lastid,$table_fld);
					////////////////////////////////////////////
					
					$image_path='./uploads/products/';
					$form_fld='doocument';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='doc_id_'.$lastid.'.'.$fileextension;
					$table_fld='doocument';
					$this->upload_doocument($image_path,$image_name,$form_fld,
					$table_name,$lastid,$table_fld);		*/
		
		
		
					// IMAGE UPLOAD
					if($_FILES['image']['tmp_name']!='')
					{	
									
					$form_fld='image';
					$table_fld='image';
					$image_name_prefix='dept_image';
					
					$uploads_dir='./uploads/products/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}
					
					
					// DOC UPLOAD
					if($_FILES['doocument']['tmp_name']!='')
					{	
									
					$form_fld='doocument';
					$table_fld='doocument';
					$image_name_prefix='dept_doc';
					
					$uploads_dir='./uploads/products/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}
			
		
			
		// picture upload section  
		redirect('project_controller/product_section/product_view/depertment/list/0');
						}	
					}// add edit section end
					
				}
      							
				if($displaytype=='del') //add --update
				{
				$this->projectmodel->delete_record($id,$table_name)	;
				$table_id=$id;
				$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
				redirect('project_controller/product_section/product_view/depertment/list/0');	
				}
				// product class->addedit_product function
				$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
				//$layout_data['data_info'] = $this->load->view('productview/productlist', $data, true);
				$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
				$this->load->view('layout', $layout_data);
				$this->session->set_userdata('alert_msg', '');	
		 }
//////////////////////////////////////////////depertment ends////////////////////////////////////////////////////
///////////////////////////////////////////////tender starts////////////////////////////////////////////////////
public function tender_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 { 	
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['tenderlist'] = $this->projectmodel->get_all_record($table_name,$where_array);
		$where_array = array('id >' => 0,'cat_id =' => 10);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		$data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'details',
			'path'	=>	'theme_files/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);	
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
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
				if($displaytype=='addedit') //add --update
				{
					$where_array = array('id' => $id);
					$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
					$data['productid'] =$id;
					if(isset($_POST))
					{	
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('tender_title','Tender Title','required');
				$this->form_validation->set_rules('details','Tender Details','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('project_controller/tender_section/tender_view/tender/list/0');
				}
				else  //validation pass
				{
					$save_data['id']=$this->input->post('id');
					$save_data['tender_title']=$this->input->post('tender_title');
					$save_data['tender_key']=$this->input->post('tender_key');
					$save_data['depertment']=$this->input->post('depertment');
					$save_data['details']=$this->input->post('details');
					$save_data['startingdate']=$this->input->post('startingdate');
					$save_data['closingdate']=$this->input->post('closingdate');
					$save_data['status']=$this->input->post('status');
					/*if($values['id']==0) // insert data....
					{
						$this->projectmodel->save_records_model($values['id'],$table_name,$save_data);
						$table_id=$this->db->insert_id();
						$this->session->set_userdata('alert_msg', 'One Record Inserted Successfully');
						redirect('project_controller/tender_section/tender_view/tender/list/0');
					}
					if($values['id']>0)// update data....
					{
						$this->projectmodel->save_records_model($values['id'],$table_name,$save_data);
						$table_id=$values['id'];
						$this->session->set_userdata('alert_msg', 'One Record Updated Successfully');
						redirect('project_controller/tender_section/tender_view/tender/list/0');		
						
					}*/
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
					
					
					
					/*$image_path='./uploads/tender/';
					$form_fld='images';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='pic_id_'.$lastid.'.'.$fileextension;
					$table_fld='images';
					$this->upload_images($image_path,$image_name,$form_fld,$table_name,
					$lastid,$table_fld);
                          ////////////////////////////////////////////
					$image_path='./uploads/tender/';
					$form_fld='doocument';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='doc_id_'.$lastid.'.'.$fileextension;
					$table_fld='doocument';
					$this->upload_doocument($image_path,$image_name,$form_fld,$table_name,
					$lastid,$table_fld);*/
							
						
						
					// IMAGE UPLOAD
					if($_FILES['images']['tmp_name']!='')
					{	
									
					$form_fld='images';
					$table_fld='images';
					$image_name_prefix='tender_image';
					
					$uploads_dir='./uploads/tender/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}
					
					
					// DOC UPLOAD
					if($_FILES['doocument']['tmp_name']!='')
					{	
									
					$form_fld='doocument';
					$table_fld='doocument';
					$image_name_prefix='tender_doc';
					
					$uploads_dir='./uploads/tender/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}	
						
						
						
						
							
							
							
			redirect('project_controller/tender_section/tender_view/tender/list/0');
				  		}		
					}
				}
      			if($displaytype=='del') //add --update
				{
				$this->projectmodel->delete_record($id,$table_name)	;
				$table_id=$id;
				$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
				redirect('project_controller/tender_section/tender_view/tender/list/0');	
				}
		$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
		$this->session->set_userdata('alert_msg', '');	
	 }			 
//////////////////////////////////////////////tender ends//////////////////////////////////////////////////////
////////////////////////////////////////administration starts/////////////////////////////////////////////////
public function administration_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 { 	
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['administrationlist'] = $this->projectmodel->get_all_record($table_name,$where_array);
		$where_array = array('id >' => 0,'cat_id =' => 2);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
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
				if($displaytype=='addedit') //add --update
				{
					$where_array = array('id' => $id);
					$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
					$data['productid'] =$id;
					if(isset($_POST))
					{	
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('name','Name','required');
				$this->form_validation->set_rules('Designation','Designation Details','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('project_controller/tender_section/tender_view/tender/list/0');
				}
				else  //validation pass
				{
					$save_data['id']=$this->input->post('id');
					$save_data['name']=$this->input->post('name');
					$save_data['DesignationDetails']=$this->input->post('DesignationDetails');
					$save_data['Designation']=$this->input->post('Designation');
					$save_data['Ward_NO']=$this->input->post('Ward_NO');
					$save_data['Elected_From']=$this->input->post('Elected_From');
					$save_data['Contact']=$this->input->post('Contact');
					$save_data['status']=$this->input->post('status');
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
			/*$image_path='./uploads/administration/';
			$form_fld='image';
			$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
			$image_name='admin_id_'.$lastid.'.'.$fileextension;
			$table_fld='image';*/
			//$this->upload_images($image_path,$image_name,$form_fld,$table_name,$lastid,$table_fld);
			
			
			
				// IMAGE UPLOAD
				if($_FILES['image']['tmp_name']!='')
				{	
								
				$form_fld='image';
				$table_fld='image';
				
				$uploads_dir='./uploads/administration/';
				$tmp_name = $_FILES[$form_fld]["tmp_name"];
				//$name = $_FILES["image1"]["name"];
				$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
			    $image_name='administration'.$lastid.'.'.$fileextension;
				move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
				
				$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
				where id=".$lastid ;
				$this->db->query($sql);
			
				}
			
			
			
			
			// picture upload section  
			redirect('project_controller/administration_section/administration_view/administration/list/0');
				  		}		
					}
				}
      			if($displaytype=='del') //add --update
				{
				$this->projectmodel->delete_record($id,$table_name)	;
				$table_id=$id;
				$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
				redirect('project_controller/administration_section/administration_view/administration/list/0');	
				}
		$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
		$this->session->set_userdata('alert_msg', '');	
	 }
////////////////////////////////////////administration ends/////////////////////////////////////////////////
///////////////////////////////////////////gallery starts////////////////////////////////////////////////////
 public function gallery_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 {	 	
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['bannerlist'] = $this->projectmodel->get_all_record($table_name,$where_array);
		$sql="SELECT * FROM `subcategory` WHERE `cat_id`='13' or `cat_id`='7'";
		$data['subcategorylist'] = $this->projectmodel->get_records_from_sql($sql);
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
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
		if($displaytype=='addedit') //add --update
		{
			$where_array = array('id' => $id);
			$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
			$data['productid'] =$id;
			if(isset($_POST))
			{	//`banner`(`id`, `images`, `subcat_id`, `bannertext`, `status`) 
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('subcat_id','Banner Type','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('project_controller/gallery_section/banner_view/banner/list/0');
				}
				else  //validation pass
				{
						$save_data['id']=$this->input->post('id');
						$save_data['subcat_id']=$this->input->post('subcat_id');
						$save_data['status']=$this->input->post('status');
						$save_data['bannertext']=$this->input->post('bannertext');
						
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
							
							
							
					/*$image_path='./uploads/banner/';
					$form_fld='images';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='banner_id_'.$lastid.'.'.$fileextension;
					$table_fld='images';
					$this->upload_images($image_path,$image_name,$form_fld,$table_name,
					$lastid,$table_fld);*/


					// IMAGE UPLOAD
					if($_FILES['images']['tmp_name']!='')
					{	
									
					$form_fld='images';
					$table_fld='images';
					$image_name_prefix='banner_image';
					
					$uploads_dir='./uploads/banner/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}
					
					
					



					redirect('project_controller/gallery_section/banner_view/banner/list/0');
				  }		
			}
				}
				if($displaytype=='del') //add --update
				{
					$this->projectmodel->delete_record($id,$table_name)	;
					$table_id=$id;
					$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
					redirect('project_controller/gallery_section/banner_view/banner/list/0');	
				}
				$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
				$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
				$this->load->view('layout', $layout_data);
				$this->session->set_userdata('alert_msg', '');			
	 }
/////////////////////////////////////////////gallery ends/////////////////////////////////////////////////////
///////////////////////////////////////////enquiry starts////////////////////////////////////////////////////
public function enquiry_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 {
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['projectlist'] = $this->projectmodel->get_all_record($table_name,$where_array);
		$data['user_name'] = $this->session->userdata('user_name');
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
				if($displaytype=='list')
				{
					$data['records']="";
					$data['productid'] ="0";
				}
				if($displaytype=='addeditview'){
			$where_array = array('id' => $id);
			$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
			$data['productid'] =$id;
				}
		$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
		$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		$this->load->view('layout', $layout_data);
		$this->session->set_userdata('alert_msg', '');	
	 }
/////////////////////////////////////////////enquiry ends////////////////////////////////////////////////////
////////////////////////////////////////////Content starts///////////////////////////////////////////////////////////
 public function content_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 {	 	
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['contentlist'] = $this->projectmodel->get_all_record($table_name,$where_array);
		$sql="SELECT * FROM `subcategory` WHERE `cat_id`='1' or `cat_id`='9' or `cat_id`='11' or `cat_id`='12'";
		$data['subcategorylist'] = $this->projectmodel->get_records_from_sql($sql);
		$data['user_name'] = $this->session->userdata('user_name');
		$data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'details',
			'path'	=>	'theme_files/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
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
		if($displaytype=='addedit') //add --update
		{
			$where_array = array('id' => $id);
			$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
			$data['productid'] =$id;
			if(isset($_POST))
			{	//`banner`(`id`, `images`, `subcat_id`, `bannertext`, `status`) 
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('SubCatId','Banner Type','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('project_controller/content_section/content_view/content/list/0');
				}
				else  //validation pass
				{		// `content`(`id`, `SubCatId`, `details`, `status`, `content_initials`) 
						$save_data['id']=$this->input->post('id');
						$save_data['SubCatId']=$this->input->post('SubCatId');	
						$save_data['order']=$this->input->post('order');					
						$save_data['content_initials']=$this->input->post('content_initials');
						$save_data['status']=$this->input->post('status');
						$save_data['details']=$this->input->post('details');
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
					
					/*$image_path='./uploads/contents/';
					$form_fld='images';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='banner_id_'.$lastid.'.'.$fileextension;
					$table_fld='images';
					$this->upload_images($image_path,$image_name,$form_fld,$table_name,
					$lastid,$table_fld);
                          ////////////////////////////////////////////
					$image_path='./uploads/contents/';
					$form_fld='doocument';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='doc_id_'.$lastid.'.'.$fileextension;
					$table_fld='doocument';
					$this->upload_doocument($image_path,$image_name,$form_fld,$table_name,
					$lastid,$table_fld);*/


					// IMAGE UPLOAD
					if($_FILES['images']['tmp_name']!='')
					{	
									
					$form_fld='images';
					$table_fld='images';
					$image_name_prefix='contents_image';
					
					$uploads_dir='./uploads/contents/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}
					
					
					// DOC UPLOAD
					if($_FILES['doocument']['tmp_name']!='')
					{	
									
					$form_fld='doocument';
					$table_fld='doocument';
					$image_name_prefix='contents_doc';
					
					$uploads_dir='./uploads/contents/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}	






				redirect('project_controller/content_section/content_view/content/list/0');
				  }		
			}
				}
				if($displaytype=='del') //add --update
				{
					$this->projectmodel->delete_record($id,$table_name)	;
					$table_id=$id;
					$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
					redirect('project_controller/content_section/content_view/content/list/0');	
				}
				$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
				$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
				$this->load->view('layout', $layout_data);
				$this->session->set_userdata('alert_msg', '');			
	 }
/////////////////////////////////////////////Contents ends///////////////////////////////////////////////////////////
////////////////////////////////////////////Services starts///////////////////////////////////////////////////////////
 public function service_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 {	 	
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['servicelist'] = $this->projectmodel->get_all_record($table_name,$where_array);
		$sql="SELECT * FROM `subcategory` WHERE `cat_id`='6' or `cat_id`='3'";
		$data['subcategorylist'] = $this->projectmodel->get_records_from_sql($sql);
		$data['user_name'] = $this->session->userdata('user_name');
		$data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'details',
			'path'	=>	'theme_files/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
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
		if($displaytype=='addedit') //add --update
		{
			$where_array = array('id' => $id);
			$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
			$data['productid'] =$id;
			if(isset($_POST))
			{	
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('SubCatId','Service Type','required');
				$this->form_validation->set_rules('title','Title Type','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('project_controller/service_section/service_view/service/list/0');
				}
				else  //validation pass
				{		 // `service`(`id`, `SubCatId`, `title`, `images`, `details`, `status`)
						$save_data['id']=$this->input->post('id');
						$save_data['SubCatId']=$this->input->post('SubCatId');						
						$save_data['details']=$this->input->post('details');
						$save_data['title']=$this->input->post('title');
						$save_data['status']=$this->input->post('status');
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
					
					
					/*$image_path='./uploads/service/';
					$form_fld='images';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='banner_id_'.$lastid.'.'.$fileextension;
					$table_fld='images';
					$this->upload_images($image_path,$image_name,$form_fld,$table_name,
					$lastid,$table_fld);
					      ////////////////////////////////////////////
					$image_path='./uploads/service/';
					$form_fld='doocument';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='doc_id_'.$lastid.'.'.$fileextension;
					$table_fld='doocument';
					$this->upload_doocument($image_path,$image_name,$form_fld,$table_name,
					$lastid,$table_fld);*/
					
					
					
					// IMAGE UPLOAD
					if($_FILES['images']['tmp_name']!='')
					{	
									
					$form_fld='images';
					$table_fld='images';
					$image_name_prefix='service_image';
					
					$uploads_dir='./uploads/service/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}
					
					// DOC UPLOAD
					if($_FILES['doocument']['tmp_name']!='')
					{	
									
					$form_fld='doocument';
					$table_fld='doocument';
					$image_name_prefix='service_doc';
					
					$uploads_dir='./uploads/service/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}
					
					
					
					
					
					
					
							redirect('project_controller/service_section/service_view/service/list/0');
				  }		
			}
				}
				if($displaytype=='del') //add --update
				{
					$this->projectmodel->delete_record($id,$table_name)	;
					$table_id=$id;
					$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
					redirect('project_controller/service_section/service_view/service/list/0');	
				}
				$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
				$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
				$this->load->view('layout', $layout_data);
				$this->session->set_userdata('alert_msg', '');			
	 }
/////////////////////////////////////////////Services ends///////////////////////////////////////////////////////////
////////////////////////////////////////////Projects starts///////////////////////////////////////////////////////////
 public function project_section($viewname='',$table_name='',$displaytype='list',$id=0)	
	 {	 	 
		$layout_data=array();
		$data=array();
		$redirectlist='project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'.$displaytype.'/'.$id.'/';
		$viewnamepath='page_view/'.$viewname;
		$data['product_del'] = ADMIN_BASE_URL."project_controller/delete_record_controller/";
		$data['product_addedit'] = ADMIN_BASE_URL.'project_controller/'.$this->uri->segment(2).'/'.$viewname.'/'.$table_name.'/'; 
		$where_array = array('id >' => 0);
		$data['projectlist'] = $this->projectmodel->get_all_record($table_name,$where_array);
		$where_array = array('id >' => 0,'cat_id =' => 8);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		$data['user_name'] = $this->session->userdata('user_name');
		$data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'details',
			'path'	=>	'theme_files/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
		$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
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
		if($displaytype=='addedit') //add --update
		{
			$where_array = array('id' => $id);
			$data['records'] = $this->projectmodel->get_all_record($table_name,$where_array);
			$data['productid'] =$id;
			if(isset($_POST))
			{	
				$values=$this->input->post();
				$data['productid'] =$values['id'];
				$this->form_validation->set_rules('SubCatId','Service Type','required');
				$this->form_validation->set_rules('title','Title Type','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('project_controller/project_section/project_view/project/list/0');
				}
//`project`(`id`, `SubCatId`, `title`, `title_description`, `images`, `details`, `price`, `startingdate`, `closingdate`, `status`)				
				else  //validation pass
				{		 
						$save_data['id']=$this->input->post('id');
						$save_data['SubCatId']=$this->input->post('SubCatId');						
						$save_data['title_description']=$this->input->post('title_description');						
						$save_data['details']=$this->input->post('details');						
						$save_data['price']=$this->input->post('price');						
						$save_data['startingdate']=$this->input->post('startingdate');		
						$save_data['closingdate']=$this->input->post('closingdate');
						$save_data['title']=$this->input->post('title');
						$save_data['status']=$this->input->post('status');
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
					
					
					/*$image_path='./uploads/project/';
					$form_fld='images';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='banner_id_'.$lastid.'.'.$fileextension;
					$table_fld='images';
					$this->upload_images($image_path,$image_name,
					$form_fld,$table_name,
					$lastid,$table_fld);
					////////////////////////////////////////////
					$image_path='./uploads/project/';
					$form_fld='doocument';
					$fileextension = substr(strrchr($_FILES[$form_fld]['name'], '.'), 1);
					$image_name='doc_id_'.$lastid.'.'.$fileextension;
					$table_fld='doocument';
					$this->upload_doocument($image_path,$image_name,
					$form_fld,$table_name,$lastid,$table_fld);*/
					
					
					
					// IMAGE UPLOAD
					if($_FILES['images']['tmp_name']!='')
					{	
									
					$form_fld='images';
					$table_fld='images';
					$image_name_prefix='project_image';
					
					$uploads_dir='./uploads/project/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}
					
					// DOC UPLOAD
					if($_FILES['doocument']['tmp_name']!='')
					{	
									
					$form_fld='doocument';
					$table_fld='doocument';
					$image_name_prefix='project_doc';
					
					$uploads_dir='./uploads/project/';
					$tmp_name = $_FILES[$form_fld]["tmp_name"];
					//$name = $_FILES["image1"]["name"];
					$fileextension = substr(strrchr($_FILES[$form_fld]["name"], '.'), 1);
					$image_name=$image_name_prefix.$lastid.'.'.$fileextension;
					move_uploaded_file($tmp_name, "$uploads_dir/$image_name");
					
					$sql="update ".$table_name." set ".$table_fld."='".$image_name."' 
					where id=".$lastid ;
					$this->db->query($sql);
				
					}
					
					
					
					
				redirect('project_controller/project_section/project_view/project/list/0');
				  }		
			}
				}
				if($displaytype=='del') //add --update
				{
					$this->projectmodel->delete_record($id,$table_name)	;
					$table_id=$id;
					$this->session->set_userdata('alert_msg', 'One Record Deleted Successfully');
					redirect('project_controller/project_section/project_view/project/list/0');	
				}
				$layout_data['data_info'] = $this->load->view($viewnamepath,$data, true);
				$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
				$this->load->view('layout', $layout_data);
				$this->session->set_userdata('alert_msg', '');			
	 }
/////////////////////////////////////////////Projects ends///////////////////////////////////////////////////////////
///////////////////////////////////////////////image upload starts//////////////////////////////////////////////////////	
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
		} 
		else 
		{
			return false;
		}
		
  }
 ///////////////////////////////////////////////image upload ends//////////////////////////////////////////////////////
  ////////////////////////////////////////////document upload//////////////////////////////////////////////////////
  function upload_doocument($image_path,$image_name,$form_fld,$table_name,$id,$table_fld) 
	{
       $config = array(
            'upload_path'   => $image_path,
            'allowed_types' => 'doc|docx|pdf',
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
		} 
		else 
		{
			return false;
		}
		
  }
  /////////////////////////////////////////////doocument upload//////////////////////////////////////////////
///////////////////////////////////////////////file upload starts//////////////////////////////////////////////////////
	private function upload_files($path, $title, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);
        $images = array();
		$flcnt=1;
        foreach ($files['name'] as $key => $image) 
		{
				$_FILES['images[]']['name']= $files['name'][$key];
				$_FILES['images[]']['type']= $files['type'][$key];
				$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
				$_FILES['images[]']['error']= $files['error'][$key];
				$_FILES['images[]']['size']= $files['size'][$key];
	
				$fileName = $title.'_'.$flcnt.'_'. $image;
				$images[] = $fileName;
				$config['file_name'] = $fileName;
	
				$this->upload->initialize($config);
	
				if ($this->upload->do_upload('images[]')) 
				{
					$this->upload->data();
				} 
				else 
				{
					return false;
				}
		$flcnt=$flcnt+1;		
        }
        return $images;
    }	 
		///////////////////////////////////////////////file upload ends//////////////////////////////////////////////////////
}
?>
