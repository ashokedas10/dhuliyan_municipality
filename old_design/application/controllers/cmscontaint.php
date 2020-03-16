<?php if  ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cmscontaint  extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('cart');
		$this->load->model('cmscontaintmod', 'cms');
		$this->load->model('project_model', 'projectmodel');
		$this->load->library('pagination');
    }	
	
	
	public function index($msg='')
	{
		$layout_data = array();
		$data = array();
		
		/*$where_array = array('id >' => 0);
		$data['brandlist'] = $this->projectmodel->get_all_record('brands',$where_array);
		
		$where_array = array('id >' => 0);
		$data['productlist'] = $this->projectmodel->get_all_record('product',$where_array);
		$data['loginuser']='';*/

		$layout_data['header'] = $this->load->view('common/header', $data, true);
		$layout_data['banner'] = $this->load->view('common/banner', $data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		
		$layout_data['body'] = $this->load->view('home_page', $data, true);
		$this->load->view('layout', $layout_data);	
			
	}
	
	public function dmc($page='',$subcatid=0)
	{
		$layout_data = array();
		$data = array();
		
		$where_array = array('id >' => 0);
		$data['contentlist'] = 
		$this->projectmodel->get_all_record('content',$where_array);
		
		$where_array = array('id >' => 0);
		$data['tenderlist'] = 
		$this->projectmodel->get_all_record('tender',$where_array);
		
		
		/*$where_array = array('id >' => 0,'status ='=> 'Active');
		$data['categorylist'] = $this->projectmodel->get_all_record('category',$where_array);
		$where_array = array('id >' => 0);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);*/
		
		$data['subcatid'] =0;		
		$layout_data['header'] = $this->load->view('common/header', $data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		
		if($page=='administrator')
		{	
		$data['subcatid']=$subcatid;	
		$layout_data['banner'] = '';
		$layout_data['body'] = $this->load->view('pages/administrator', $data, true);
		}
		
		else if($page=='department')
		{
		$data['subcatid']=$subcatid;	
		$layout_data['banner'] = '';
		$layout_data['body'] = $this->load->view('pages/department', $data, true);
		}
				
		else if($page=='service')
		{
		$data['subcatid']=$subcatid;	
		$layout_data['banner'] = '';
		$layout_data['body'] = $this->load->view('pages/service', $data, true);
		}
		
		else if($page=='projects')
		{
		$data['subcatid']=$subcatid;
		$layout_data['banner'] = '';
		$layout_data['body'] = $this->load->view('pages/projects', $data, true);}
		
		else if($page=='contact')
		{$layout_data['banner'] = '';
		$layout_data['body'] = $this->load->view('pages/contact', $data, true);}
		
		
		
		else if($page=='publicwork')
		{$layout_data['banner'] = '';
		$layout_data['body'] = $this->load->view('pages/publicwork', $data, true);}
		
		else if($page=='tender')
		{
		$layout_data['banner'] = '';
		$layout_data['body'] = $this->load->view('pages/tender', $data, true);}
	
		else
		{		
		{$layout_data['banner'] = '';
		$layout_data['body'] = $this->load->view('pages/pagenofound', $data, true);}
		
		}
				
		$this->load->view('layout', $layout_data);	
			
	}
	
public function tender_navigation_old()
	{
		$layout_data = array();
		$data = array();
			
		########################################################
		$where_array = array('id >' => 0);
		$data['contentlist'] = $this->projectmodel->get_all_record('content',$where_array);
		
		$stdt=$this->input->post('startingdate');
		$endt=$this->input->post('closingdate');
		if($stdt=='' && $endt==''){$where_array = array('id >' => 0);
		$data['tenderlist'] = $this->projectmodel->get_all_record('tender',$where_array);}
		else{$sql="SELECT * FROM `tender` where `startingdate`
		 between '".$stdt."' AND '".$endt."' and `status`='Active'";
		$data['tenderlist'] =$this->projectmodel->get_records_from_sql($sql);}
		
				
		
		$layout_data['banner'] = '';
		$layout_data['header'] = $this->load->view('common/header', $data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		$layout_data['body'] = $this->load->view('pages/tender', $data, true);
		$this->load->view('layout', $layout_data);
}

	
public function tender_navigation()
{
			$layout_data=array();
			$data=array();
			$data['startingdate']=date('Y-m-d');
			$data['closingdate']=date('Y-m-d');
			
					
		if(isset($_POST))
		{	
										
				$startingdate=$data['startingdate']=$this->input->post('startingdate');
				$closingdate=$data['closingdate']=$this->input->post('closingdate');								
				$this->form_validation->set_rules('startingdate',
				'Enter Starting Date','required');
				$this->form_validation->set_rules('closingdate',
				'Enter Closing Date','required');
			
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', 
					validation_errors());
					redirect('cmscontaint/tender_navigation/');
				}	
				else
				{
					$sql="select * from tender  WHERE 	startingdate between 
					'$startingdate' and '$closingdate'  " ;
					$data['tenderlist'] =$this->projectmodel->get_records_from_sql($sql);	
									
				}
							

						
		}	// end post
		
	    $layout_data['banner'] = '';
		$layout_data['header'] = $this->load->view('common/header', $data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		$layout_data['body'] = $this->load->view('pages/tender', $data, true);
		$this->load->view('layout', $layout_data);
		   
}	







	
	public function gallery_navigation()
	{
		$layout_data = array();
		$data = array();
		$sql="SELECT * FROM `category` WHERE `status` != 'InActive' ORDER BY `category`.`titletag` ASC LIMIT 0 , 4";
		$data['categorylist1'] = $this->projectmodel->get_records_from_sql($sql);
		$sql="SELECT * FROM `category` WHERE `status` != 'InActive' ORDER BY `category`.`titletag` ASC LIMIT 4 , 8";
		$data['categorylist2'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0,'status ='=> 'Active');
		$data['categorylist'] = $this->projectmodel->get_all_record('category',$where_array);
		$where_array = array('id >' => 0);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		$where_array = array('id >' => 0);
		$data['bannerlist'] = $this->projectmodel->get_all_record('banner',$where_array);
		$where_array = array('id >' => 0);
		$data['contentlist'] = $this->projectmodel->get_all_record('content',$where_array);
		$where_array = array('id >' => 0);
		$data['Adminlist'] = $this->projectmodel->get_all_record('administration',$where_array);
		$where_array = array('id >' => 0);
		$data['deptlist'] = $this->projectmodel->get_all_record('depertment',$where_array);
		$sql="SELECT * FROM `service` WHERE `SubCatId` IN(SELECT `id` FROM `subcategory` WHERE `cat_id` =6)";
		$data['servicelist'] = $this->projectmodel->get_records_from_sql($sql);
		$sql="SELECT * FROM `service` WHERE `SubCatId` IN(SELECT `id` FROM `subcategory` WHERE `cat_id` =3)";
		$data['publicworklist'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0);
		$data['projectlist'] = $this->projectmodel->get_all_record('project',$where_array);
		$sql="SELECT * FROM `content` WHERE `SubCatId` =50 ORDER BY `content`.`order` ASC";
		$data['contentlist'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0);
		$data['tenderlist'] = $this->projectmodel->get_all_record('tender',$where_array);
		
		$layout_data['pagename'] ='gallery';
		$layout_data['gallery'] = $this->load->view('gallery',$data, true);
		$layout_data['scrolling_banner'] = $this->load->view('common/scrolling_banner', $data, true);
		$layout_data['topmenu'] = $this->load->view('common/topmenu', $data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		$this->load->view('layout', $layout_data);	
	}
	
	public function navigation($catagory='')
	{
		if($catagory==1){redirect('cmscontaint/');}else if($catagory==10){redirect('cmscontaint/tender_navigation/');}else if($catagory==7){redirect('cmscontaint/gallery_navigation/');}else{
		$layout_data = array();
		$data = array();
		//$data_pg = array();
		$sql="SELECT * FROM `category` WHERE `status` != 'InActive' ORDER BY `category`.`titletag` ASC LIMIT 0 , 4";
		$data['categorylist1'] = $this->projectmodel->get_records_from_sql($sql);
		$sql="SELECT * FROM `category` WHERE `status` != 'InActive' ORDER BY `category`.`titletag` ASC LIMIT 4 , 8";
		$data['categorylist2'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0,'status ='=> 'Active');
		$data['categorylist'] = $this->projectmodel->get_all_record('category',$where_array);
		$where_array = array('id >' => 0);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		$where_array = array('id >' => 0);
		$data['bannerlist'] = $this->projectmodel->get_all_record('banner',$where_array);
		$where_array = array('id >' => 0);
		$data['contentlist'] = $this->projectmodel->get_all_record('content',$where_array);
		$where_array = array('id >' => 0);
		$data['Adminlist'] = $this->projectmodel->get_all_record('administration',$where_array);
		$where_array = array('id >' => 0);
		
		$data['deptlist'] = $this->projectmodel->get_all_record('depertment',$where_array);
		$sql="SELECT * FROM `service` WHERE `SubCatId` 
		IN(SELECT `id` FROM `subcategory` WHERE `cat_id` =6)";
		
		$data['servicelist'] = $this->projectmodel->get_records_from_sql($sql);
		$sql="SELECT * FROM `service` WHERE `SubCatId` 
		IN(SELECT `id` FROM `subcategory` WHERE `cat_id` =3)";
		
		$data['publicworklist'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0);
		
		$data['projectlist'] = $this->projectmodel->get_all_record('project',$where_array);
		$sql="SELECT * FROM `content` WHERE `SubCatId` =50 ORDER BY `content`.`order` ASC";
		
		$data['contentlist'] = $this->projectmodel->get_records_from_sql($sql);
		$data['pageid'] = $catagory;	
		$where_array = array('id >' => 0);
		$data['tenderlist'] = $this->projectmodel->get_all_record('tender',$where_array);
		$layout_data['pagename'] ='navigationBody';
		$layout_data['navigationBody'] = $this->load->view('navigationBody',$data, true);
		$layout_data['scrolling_banner'] = $this->load->view('common/scrolling_banner', $data, true);
		$layout_data['topmenu'] = $this->load->view('common/topmenu', $data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		$this->load->view('layout', $layout_data);	
		}	
	}
	public function mailfunction()
	{
		$this->form_validation->set_rules('Name','Name','required');
		$this->form_validation->set_rules('Mobile','Mobile','required');
		$this->form_validation->set_rules('Email','Email','required');
		$this->form_validation->set_rules('Area','Area','required');
		$this->form_validation->set_rules('Comment','Comment','required');	
		if($this->form_validation->run()==FALSE )
		{
			$this->session->set_userdata('alert_msg', validation_errors());
			redirect('cmscontaint/navigation/9');
		}
		else{			
			$save_data['Name']=$this->input->post('Name');
			$save_data['Mobile']=$this->input->post('Mobile');
			$save_data['Email']=$this->input->post('Email');
			$save_data['Area']=$this->input->post('Area');
			$save_data['Comment']=$this->input->post('Comment');	
			//echo $Name.' '.$Mobile.' '.$Email.' '.$Area.' '.$Comment;	
			$this->projectmodel->save_records_model(0,'contact_us',$save_data);			
			redirect('cmscontaint/navigation/1');				
		}
	}
	public function dept_spec($id='')
	{
		$layout_data = array();
		$data = array();
		//$data_pg = array();
		$sql="SELECT * FROM `category` WHERE `status` != 'InActive' ORDER BY `category`.`titletag` ASC LIMIT 0 , 4";
		$data['categorylist1'] = $this->projectmodel->get_records_from_sql($sql);
		$sql="SELECT * FROM `category` WHERE `status` != 'InActive' ORDER BY `category`.`titletag` ASC LIMIT 4 , 8";
		$data['categorylist2'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0,'status ='=> 'Active');
		$data['categorylist'] = $this->projectmodel->get_all_record('category',$where_array);
		$where_array = array('id >' => 0);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		$where_array = array('id >' => 0);
		$data['bannerlist'] = $this->projectmodel->get_all_record('banner',$where_array);
		$where_array = array('id >' => 0);
		$data['contentlist'] = $this->projectmodel->get_all_record('content',$where_array);
		$where_array = array('id >' => 0);
		$data['Adminlist'] = $this->projectmodel->get_all_record('administration',$where_array);
		$where_array = array('id >' => 0,'Designation =' => $id);
		$data['deptlist'] = $this->projectmodel->get_all_record('depertment',$where_array);
		$sql="SELECT * FROM `service` WHERE `SubCatId` IN(SELECT `id` FROM `subcategory` WHERE `cat_id` =6)";
		$data['servicelist'] = $this->projectmodel->get_records_from_sql($sql);
		$sql="SELECT * FROM `service` WHERE `SubCatId` IN(SELECT `id` FROM `subcategory` WHERE `cat_id` =3)";
		$data['publicworklist'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0);
		$data['projectlist'] = $this->projectmodel->get_all_record('project',$where_array);
		$sql="SELECT * FROM `content` WHERE `SubCatId` =50 ORDER BY `content`.`order` ASC";
		$data['contentlist'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0);
		$data['tenderlist'] = $this->projectmodel->get_all_record('tender',$where_array);
		$data['dept'] =$id;
		$layout_data['pagename'] ='spec_dept';
		$layout_data['spec_dept'] = $this->load->view('spec_dept',$data, true);
		$layout_data['scrolling_banner'] = $this->load->view('common/scrolling_banner', $data, true);
		$layout_data['topmenu'] = $this->load->view('common/topmenu', $data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		$this->load->view('layout', $layout_data);	
	}
	public function admin_spec($id='')
	{
		$layout_data = array();
		$data = array();
		//$data_pg = array();
		$sql="SELECT * FROM `category` WHERE `status` != 'InActive' ORDER BY `category`.`titletag` ASC LIMIT 0 , 4";
		$data['categorylist1'] = $this->projectmodel->get_records_from_sql($sql);
		$sql="SELECT * FROM `category` WHERE `status` != 'InActive' ORDER BY `category`.`titletag` ASC LIMIT 4 , 8";
		$data['categorylist2'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0,'status ='=> 'Active');
		$data['categorylist'] = $this->projectmodel->get_all_record('category',$where_array);
		$where_array = array('id >' => 0);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		$where_array = array('id >' => 0);
		$data['bannerlist'] = $this->projectmodel->get_all_record('banner',$where_array);
		$where_array = array('id >' => 0);
		$data['contentlist'] = $this->projectmodel->get_all_record('content',$where_array);
		$where_array = array('id >' => 0,'Designation =' => $id);
		$data['AdminlistV'] = $this->projectmodel->get_all_record('administration',$where_array);
		$where_array = array('id >' => 0);
		$data['Adminlist'] = $this->projectmodel->get_all_record('administration',$where_array);
		$sql="SELECT * FROM `service` WHERE `SubCatId` IN(SELECT `id` FROM `subcategory` WHERE `cat_id` =6)";
		$data['servicelist'] = $this->projectmodel->get_records_from_sql($sql);
		$sql="SELECT * FROM `service` WHERE `SubCatId` IN(SELECT `id` FROM `subcategory` WHERE `cat_id` =3)";
		$data['publicworklist'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0);
		$data['projectlist'] = $this->projectmodel->get_all_record('project',$where_array);
		$sql="SELECT * FROM `content` WHERE `SubCatId` =50 ORDER BY `content`.`order` ASC";
		$data['contentlist'] = $this->projectmodel->get_records_from_sql($sql);
		$where_array = array('id >' => 0);
		$data['tenderlist'] = $this->projectmodel->get_all_record('tender',$where_array);
		$data['dept'] =$id;
		$layout_data['pagename'] ='spec_adm';
		$layout_data['spec_adm'] = $this->load->view('spec_adm',$data, true);
		$layout_data['scrolling_banner'] = 
		$this->load->view('common/scrolling_banner', $data, true);
		
		$layout_data['topmenu'] = $this->load->view('common/topmenu', $data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		$this->load->view('layout', $layout_data);	
	}
	
	

	/*
	////////////////////////////////////////////////////////////////////////////////////////
	public function left_listing($catagory=''){
		if($catagory=='2'){redirect('cmscontaint/subcat_listing/'.$catagory);}else{
		$layout_data = array();
		$data = array();
		$where_array = array('id >' => 0);
		$data['categorylist'] = $this->projectmodel->get_all_record('category',$where_array);
		$where_array = array('id >' => 0,'cat_id =' =>$catagory);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		$layout_data['pagename'] ='';
		$layout_data['topmenu'] = $this->load->view('common/topmenu', $data, true);
		$layout_data['leftmenu'] = $this->load->view('common/leftmenu', $data, true);
		$this->load->view('layout', $layout_data);	
	}}
	public function depertment($scat=0){
		$layout_data = array();
		$data = array();
		$where_array = array('id >' => 0);
		$data['categorylist'] = $this->projectmodel->get_all_record('category',$where_array);
		$where_array = array('id >' => 0,'cat_id =' =>2);
		$data['subcategorylist'] = $this->projectmodel->get_all_record('subcategory',$where_array);
		if($scat!=0){
			$where_array = array('id >' => 0,'Designation =' =>$scat);
		}else{
			$where_array = array('id >' => 0);
		}
		$data['depertmentlist'] = $this->projectmodel->get_all_record('depertment',$where_array);
		$layout_data['depertment_view'] = $this->load->view('depertment_view', $data, true);
		$layout_data['pagename'] ='depertment_view';
		$layout_data['topmenu'] = $this->load->view('common/topmenu', $data, true);
		$layout_data['leftmenu'] = $this->load->view('common/leftmenu', $data, true);
		$this->load->view('layout', $layout_data);	
	}
	public function subcat_listing($cat='',$scat=''){
		if($cat=='2'){
			redirect('cmscontaint/depertment/'.$scat);
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////
*/
}
?>