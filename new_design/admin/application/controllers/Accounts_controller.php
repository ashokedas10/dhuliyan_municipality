<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts_controller  extends CI_Controller {

//http://learntallyerp9.blogspot.in/2009/11/list-of-ledgers.html

	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('email');
			$this->load->model('project_model', 'projectmodel');
			//$this->load->model('modeltree');
			$this->load->model('accounts_model');			
			$this->load->library(array('form_validation', 'trackback','pagination'));
			$this->load->library('numbertowords');
			$this->load->library('general_library');
			$this->load->library('pdf'); 
			$this->load->helper('file'); 			
			//$this->login_validate();
			$this->load->library('excel');
			
			ini_set("allow_url_fopen", 1);
			
			 /* Open the file
			Click CTRL + F
			Select "Current document" in "Find in" 
			(You can also select the folder if you have multiple files)
			Search in "Source code"
			Tick "Use regular expression"
			Type "[\r\n]{2,}" (without quotes) in "Find"
			Type "\n" (without quotes) in "Replace"
			Press "Replace All"*/
			
		}	

	//ACCOUNTS TRANSACTIONS
	
	public function load_form_report($TranPageName='')
	{
		$output =$data= array();
		$view_path_name='accounts_management/transaction/'.$TranPageName;
		$this->page_layout_display($view_path_name,$data);
	}
	
	
		public function query_result($frmrpt_simple_query_builder_ID=0,$param1='',$param2='',$param3='',$param4='',$param5='')
		{
		
			//QUERY BUILDER TABLE
			$whr=" id=".$frmrpt_simple_query_builder_ID;
			$rs=$this->projectmodel->GetMultipleVal('*','frmrpt_simple_query_builder',$whr);
		
		
			if($rs[0]['type']=='RESULT')
			{
				$whr=$rs[0]['where_cond'];
				$rs_result=$this->projectmodel->GetMultipleVal('*',$rs[0]['table_name'],$whr);
				$json_array_count=sizeof($rs_result);	 
				for($fieldIndex=0;$fieldIndex<$json_array_count;$fieldIndex++)
				{$rs_result[$fieldIndex]['name']=$rs_result[$fieldIndex][$rs[0]['field_name']].'(#'.$rs_result[$fieldIndex]['id'].')';}
			}
			if($rs[0]['type']=='RESULT_WITH_CONDITION')
			{
				$whr=$rs[0]['where_cond'].$param1;
				$rs_result=$this->projectmodel->GetMultipleVal('*',$rs[0]['table_name'],$whr);
				$json_array_count=sizeof($rs_result);	 
				for($fieldIndex=0;$fieldIndex<$json_array_count;$fieldIndex++)
				{$rs_result[$fieldIndex]['name']=$rs_result[$fieldIndex][$rs[0]['field_name']];}
			}
		
			//$rs[$fieldIndex]['name']=
			$this->projectmodel->send_json_output($rs_result);		
		
		}


	public function create_json_product_file()
	{
		$whr="id>0";
		$json_filename='product_master.json';
		if(file_put_contents($json_filename,$this->projectmodel->get_product_master('id,productname,available_qnty','productmstr',$whr)))
		{}
			echo 'Done';
	}

	
	
public function AccountsTransactions($TranPageName='',$datatype='',$cond='',
$id_header='',$id_detail='',$fromdate='',$todate='')
{
	$output =$data= array();

	//PurchaseEntry
	if($TranPageName=='Product_master')
	{
			
		if($datatype=='compare')
		{
			// $ids='0';
			// $promotevalues =explode("_", trim($cond));
			// foreach($promotevalues as $promotevalue)
			// {$ids=$ids.','.$promotevalue;}


			//$whr=' id>0';
			// $rs=$this->projectmodel->GetMultipleVal('*','blood_test',$whr);
			// $json_array_count=sizeof($rs);	 
			// for($fieldIndex=0;$fieldIndex<$json_array_count;$fieldIndex++)
			// {$rs[$fieldIndex]['test_name']=$rs[$fieldIndex]['test_name'];}				

				$records_test="select a.* from blood_test a,blood_test_group_map b 
				where a.id=b.blood_test_id and   blood_test_group_id =".$cond." order by b.srl_order";
				$records_test = $this->projectmodel->get_records_from_sql($records_test);	
				foreach ($records_test as $testindex=>$record_test)
				{	
				
				$rs[$testindex]['test_name']=$record_test->test_name;
				$rs[$testindex]['Pre_test_Information']=$record_test->Pre_test_Information;
				$rs[$testindex]['test_type']=$record_test->test_type;
				$rs[$testindex]['test_price']=$record_test->test_price;
				
				}

		

			$this->projectmodel->send_json_output($rs);					
		}




	
	}
	//PRODUCT ENTRY END

}



	// ACCOUNTS REPORTS SECTIONS
	
	// public function load_ajax()
	// {
	// 	 $data_list['viewname'] = $this->input->post('viewname');
	// 	 $data_list['tran_table_name'] = $this->input->post('tran_table_name');
	// 	 $data_list['fldname'] = $this->input->post('fldname');
	// 	$this->load->view('accounts_management/transaction/main_ajax_view', $data_list);
		
	// }
	
	
	
	// private function login_validate(){
    //    if($this->session->userdata('login_userid')=='')
	// 	{ $this->projectmodel->logout();}
	// }	
	
	
	private function report_page_layout_display($view_path_name,$data)
	{
		   $layout_data['data_info'] = 
		   $this->load->view($view_path_name,$data, true);			
		   $layout_data['body'] = $this->load->view('common/body', $layout_data, true);		 
		   $this->load->view('report_layout', $layout_data);
		   $this->session->set_userdata('alert_msg', '');	
	}	

	private function page_layout_display($view_path_name,$data)
	{
		   $data['user_name'] = $this->session->userdata('user_name');
		   $layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
		   $layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
		   $layout_data['data_info'] = 
		   $this->load->view($view_path_name,$data, true);			
		   $layout_data['body'] = $this->load->view('common/body', $layout_data, true);
		   $this->load->view('layout', $layout_data);
		   $this->session->set_userdata('alert_msg', '');
	}


}

?>