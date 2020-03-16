<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_controller  extends CI_Controller {

// auto complete
//http://codeigniterlover.blogspot.in/2013/01/jquery-autocomplete-in-codeigniter-php.html
//http://www.php-guru.in/2013/html-to-pdf-conversion-in-codeigniter/

// DB BACKUP AND MAIL  ...
//http://snipt.org/wponh

//file:///E:/ALL_WEBSITE_NEW/xampp/htdocs/money_market/psrgroupnew/jquery_jqwidgets
//demos/jqxtree/checkboxes.htm

	public function __construct()
		{
			parent::__construct();
			
			$this->load->helper(array('form', 'url'));
			 $this->load->library(array('form_validation', 	'trackback', 'pagination'));
			$this->load->model('Project_model', 'projectmodel');
			//$this->load->model('company_structure_model');
			//$this->load->model('accounts_model');
			$this->load->library('numbertowords');
			$this->load->library('pdf');
			$this->load->helper('file'); 
			$this->load->library('Highcharts');	
			$this->load->library('general_library');
			$this->load->library('excel');
			$this->load->library('Excel_reader');
			
			ini_set('max_execution_time', 0); 
			ini_set('memory_limit','2048M');

		

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
	
	
	public function load_page()
	{
		//$this->login_validate();	
		$data_list['pageId'] = $this->input->post('pageId');		
		$this->load->view('ActiveReport/TemplateForm', $data_list);
		print_r($data_list);
		//redirect('Project_controller/TempleteForm/24/list/');
	}
	


public function TemplateReports($frmrpttemplatehdrID=0)
{
	if($frmrpttemplatehdrID==29) //STOCK REPORT
	{	
	  $data['GridHeader']= array("SysId#-left", "product_id-left","product_name-left","totqnty-left",
	  "batchno-left","exp_monyr-left","mfg_monyr-left","sale rate-left","MRP-left");
	}
	   
   $data['frmrpttemplatehdrID']=$frmrpttemplatehdrID;
   
   $records="select * from frmrpttemplatehdr where id=".$frmrpttemplatehdrID;
   $records = $this->projectmodel->get_records_from_sql($records);	
   foreach ($records as $record)
   {	
		$data['DisplayGrid']=$record->DisplayGrid;
		$data['NEWENTRYBUTTON']=$record->NEWENTRYBUTTON;
		
		$data['FormRptName']=$record->FormRptName;
		$data['DataFields']=$record->DataFields;
		$data['TableName']=$record->TableName;
		$data['WhereCondition']=$record->WhereCondition;
		$data['OrderBy']=$record->OrderBy;	
		$ControllerFunctionLink=$record->ControllerFunctionLink.$frmrpttemplatehdrID.'/';	 
		$data['tran_link'] = ADMIN_BASE_URL.$ControllerFunctionLink; 
		$view_path_name=$record->ViewPath; 
		$data['body']=$this->projectmodel->Activequery($data,'LIST');
   }
		   
   $view_path_name=$view_path_name;
   $this->page_layout_display($view_path_name,$data);
}

public function Master_upload()
{
	
	$this->login_validate();
	$data=array();
	

	//DETAIL SETIONS
	
	$data['DisplayGrid']='NO';
	$data['msgdelete']="";
	if(isset($_POST['Upload']))
	{	
		
	
	if($_FILES['image1']['tmp_name']!='')
	{
			$setname='upload';	
			$uploads_dir='./uploads/';
			$tmp_name = $_FILES["image1"]["tmp_name"];
			$fileextension = substr(strrchr($_FILES["image1"]["name"], '.'), 1);
			$file_name=$setname.'.'.$fileextension;
			move_uploaded_file($tmp_name, "$uploads_dir/$file_name");	
			
				
			$frmrpttemplatehdrID=$this->input->post('SettingName');
			$temp_original=$this->input->post('temp_original');
			//$file_name='DOCTOR_FORMAT_FINALNEW.xls';
			//$file=HEARD_PATH.'uploads/'.$file_name;
			
			$this->excel_reader->read('./uploads/upload.xls');
			// Get the contents of the first worksheet
			$worksheet = $this->excel_reader->sheets[0];
			$highestRow = $worksheet['numRows']; // ex: 14
			$numCols = $worksheet['numCols']; // ex: 4
			$cells = $worksheet['cells']; // the 1st row are usually the field's name

			//PRODUCT_MASTER GROUP WISE -SECTION
			if($frmrpttemplatehdrID=='PRODUCT_MASTER')
			{	
				//temporary UPLOAD
				if($temp_original=='FINAL')
				{
					$COLUMNS=4;
									
					//$this->db->query("delete from blood_test WHERE test_type='GROUP_TEST'");		
					//$this->db->query("delete from blood_test_group_map");		
					
					for ($row = 2; $row <= $highestRow; ++$row) 
					{			
						$srl_order=$GROUPID=0;

						$save_hdr['test_type']='GROUP_TEST';
						for ($ColNo = 1; $ColNo <= $COLUMNS;  $ColNo++)
						{						
							if( isset($cells[$row][$ColNo]) )
							{
								$header_name =$cells[1][$ColNo];								
								$save_hdr[$header_name]=$cells[$row][$ColNo];

								if($ColNo==3)
								{$GROUPID=$cells[$row][$ColNo];}

								if($ColNo==4)
								{$srl_order=$cells[$row][$ColNo];}
							}
							else
							{								
								$header_name =$cells[1][$ColNo];								
								$save_hdr[$header_name]='0';							
							}

							if($cells[$row][1]<>'')
							{
								$test_id='';
								$sql2="select * from blood_test where 	UCASE(test_name)='".strtoupper($cells[$row][1])."'";				
								$rowrecord2 = $this->projectmodel->get_records_from_sql($sql2);	
								foreach ($rowrecord2 as $row2)
								{$test_id=$row2->id;}	

								if($test_id=='')
								{
									$this->projectmodel->save_records_model($test_id,'blood_test',$save_hdr);
									$test_id=$this->db->insert_id();
								}
								else
								{$this->projectmodel->save_records_model($test_id,'blood_test',$save_hdr);}
								
								$this->UPDATE_MASTER($test_id,$GROUPID,$srl_order);

							}
							

						}
						
					
						

					}

						
				}

			}//PRODUCT_MASTER GROUP WISE -SECTION

			//PRODUCT_MASTER GROUP WISE -SECTION
			if($frmrpttemplatehdrID=='PRODUCT_MASTER_INDIVIDUAL')
			{	
				//temporary UPLOAD
				if($temp_original=='FINAL')
				{
					$COLUMNS=6;
									
					$this->db->query("delete from blood_test WHERE test_type='INDIVIDUAL_TEST' ");		
					//$this->db->query("delete from blood_test_group_map");		
					
					for ($row = 2; $row <= $highestRow; ++$row) 
					{			
						$srl_order=$GROUPID=0;
						$save_hdr['test_type']='INDIVIDUAL_TEST';

						for ($ColNo = 1; $ColNo <= $COLUMNS;  $ColNo++)
						{						
							if( isset($cells[$row][$ColNo]) )
							{
								$header_name =$cells[1][$ColNo];								
								$save_hdr[$header_name]=$cells[$row][$ColNo];

								if($ColNo==3)
								{$GROUPID=$cells[$row][$ColNo];}

								if($ColNo==4)
								{$srl_order=$cells[$row][$ColNo];}
							}
							else
							{								
								$header_name =$cells[1][$ColNo];								
								$save_hdr[$header_name]='0';							
							}

							if($cells[$row][1]<>'')
							{
								$test_id='';
								$sql2="select * from blood_test where 	UCASE(test_name)='".strtoupper($cells[$row][1])."'";				
								$rowrecord2 = $this->projectmodel->get_records_from_sql($sql2);	
								foreach ($rowrecord2 as $row2)
								{$test_id=$row2->id;}	

								if($test_id=='')
								{
									$this->projectmodel->save_records_model($test_id,'blood_test',$save_hdr);
									$test_id=$this->db->insert_id();
								}
								else
								{$this->projectmodel->save_records_model($test_id,'blood_test',$save_hdr);}
								
								//$this->UPDATE_MASTER($test_id,$GROUPID,$srl_order);

							}
							

						}
						
					
						

					}

						
				}

			}//PRODUCT_MASTER GROUP WISE -SECTION
		
			
		}
		
	}			
		
		$view_path_name='ActiveReport/UploadExcell';
	  	$this->page_layout_display($view_path_name,$data);
		
}



function UPDATE_MASTER($test_id,$GROUPID,$srl_order)
{

		//echo $test_id.'---'.$GROUPID.'<br>';
		$save_grp['blood_test_group_id']=$GROUPID;
		$save_grp['blood_test_id']=$test_id;
		$save_grp['srl_order']=$srl_order;		
		$this->projectmodel->save_records_model('','blood_test_group_map',$save_grp);

		$this->db->query("delete from blood_test_group_map where blood_test_group_id=0");	
		$this->db->query("delete from blood_test_group_map where srl_order=0");

}


public function blood_test_group_map($operation_type='listing',$id=0)
	{
		$this->login_validate();
		$layout_data=array();
		$data=array();
		$data['blood_test_group_id']=0;

		$data['tran_link'] =ADMIN_BASE_URL.'Project_controller/blood_test_group_map/';
		
		$sqlinv="select * from blood_test_group where  status='ACTIVE' order by  group_name";			
		$data['doctor_list'] =$this->projectmodel->get_records_from_sql($sqlinv); 
					
		if(isset($_POST['submit']))
		{	
			if($operation_type=='listing')
			{$data['blood_test_group_id']=$this->input->post('blood_test_group_id');}
			
			if($operation_type=='save')
			{
				//echo $operation_type;
				 $data['blood_test_group_id']=$this->input->post('blood_test_group_id');	
				$this->form_validation->set_rules('blood_test_group_id','Group','required');
				if($this->form_validation->run()==FALSE )
				{
					$this->session->set_userdata('alert_msg', validation_errors());
					redirect('Project_controller/blood_test_group_map/listing/');
				}
				else  //validation pass
				{
				
					$blood_test_group_id=$save_data['blood_test_group_id']=$this->input->post('blood_test_group_id');					
					$this->db->query("delete from blood_test_group_map where blood_test_group_id=".$blood_test_group_id);

						$maxkey=5000;				
						for($i=0;$i<=$maxkey;$i++)
						{					
							if(isset($_POST['map'.$i]))
							{		
								$save_data['blood_test_id']=$this->input->post('blood_test_id'.$i);
								$save_data['blood_test_group_id']=$blood_test_group_id;	
								$insert_id='';
								$this->projectmodel->save_records_model($insert_id,'blood_test_group_map',$save_data);							
							}
						}
						
				}	//end else
				$this->session->set_userdata('alert_msg','Record Updated Successfully');
			}	// end save 	
			
		}	// end post
		
	   $view_path_name='/ActiveReport/blood_test_group_map';
	   $this->page_layout_display($view_path_name,$data);
		   
	}	

public function TempleteFormReport($displaytype='',$id_header='',$id_detail='')
{
		        		
		$data['tran_link'] = ADMIN_BASE_URL.'Project_controller/TempleteFormReport/'; 
		$view_path_name='ActiveReport/TemplateFormRptMaster';	
		$sqlinv="select * from  frmrpttemplatehdr  order by  FormRptName ";		
		$data['projectlist'] =$this->projectmodel->get_records_from_sql($sqlinv);
		$data['MainTable'] =$data['tran_table_name']='';

		// $data['FieldOrder'] =1;
		// $sqlinv="select max(FieldOrder) max_FieldOrder from   	frmrpttemplatedetails where  	frmrpttemplatehdrID=".$id_header;
		// $rows =$this->projectmodel->get_records_from_sql($sqlinv);	
		// foreach ($rows as $row)
		// { $data['FieldOrder'] =$row->max_FieldOrder;	}
		
		
		if($displaytype=="list")
		{
			//HEADER TABLE
			$data['id_header']=0;
			$data['id_detail']=0;
			
			$data['NEWENTRYBUTTON']=$data['DisplayGrid']='';
			$data['FormRptName']=$data['Type']='';
			$data['GridHeader']=$data['DataFields']='';
			$data['TableName']=$data['WhereCondition']='';
			$data['OrderBy']=$data['ControllerFunctionLink']='';
			$data['ViewPath']='';
			
			
			//DETAIL TABLE
			$data['frmrpttemplatehdrID']=0;
			$data['InputName']=$data['InputType']=$data['Inputvalue']='';
			$data['LogoType']=$data['RecordSet']=$data['LabelName']='';
			$data['DIVClass']=$data['Section']='';
		}
		
		
		if($displaytype=='addeditview')
		{
			//HEADER TABLE
			$data['id_header']=0;
			$data['id_detail']=0;
			$data['NEWENTRYBUTTON']=$data['DisplayGrid']='';
			$data['FormRptName']=$data['Type']='';
			$data['GridHeader']=$data['DataFields']='';
			$data['TableName']=$data['WhereCondition']='';
			$data['OrderBy']=$data['ControllerFunctionLink']='';
			$data['ViewPath']='';
			
			//DETAIL TABLE
			$data['frmrpttemplatehdrID']=0;
			$data['InputName']=$data['InputType']=$data['Inputvalue']='';
			$data['LogoType']=$data['RecordSet']=$data['LabelName']='';
			$data['DIVClass']=$data['Section']='';
			$data['tran_table_name']='';
			  
					$maxhdrid=0;
					$sqlinv="select max(id) maxhdrid from  frmrpttemplatedetails 
					where  	frmrpttemplatehdrID=".$id_header;
					$rows =$this->projectmodel->get_records_from_sql($sqlinv);	
					foreach ($rows as $row)
					{ $maxhdrid=$row->maxhdrid;}
				
				 if($maxhdrid>0)
			   	{	
				   $sqlinv="select * from  frmrpttemplatedetails 
					where  	id=".$maxhdrid;
					$rows =$this->projectmodel->get_records_from_sql($sqlinv);	
					foreach ($rows as $row)
					{ 
					$data['tran_table_name']=$row->tran_table_name;
					$data['MainTable']=$row->MainTable;
					}
				}
				
				//tran header
				$sqlinv="select * from  frmrpttemplatehdr where id=".$id_header;
				$rows =$this->projectmodel->get_records_from_sql($sqlinv);	
				foreach ($rows as $row)
				{ 	
					$data['id_header']=$id_header;
					$data['Type']=$row->Type;
					$data['FormRptName']=$row->FormRptName;
					$data['GridHeader']=$row->GridHeader;
					$data['DataFields']=$row->DataFields;
					$data['TableName']=$row->TableName;
					$data['WhereCondition']=$row->WhereCondition;
					$data['OrderBy']=$row->OrderBy;
					$data['ControllerFunctionLink']=$row->ControllerFunctionLink;
					$data['ViewPath']=$row->ViewPath;
					$data['NEWENTRYBUTTON']=$row->NEWENTRYBUTTON;
					$data['DisplayGrid']=$row->DisplayGrid;
				}
		}	
		
		
		if(isset($_POST) and $displaytype=='save')
		{
			
			//HEADER ENTRY part
			
			$save_hdr['FormRptName']=$this->input->post('FormRptName');;
			$save_hdr['Type']=$this->input->post('Type');
			
			$save_hdr['GridHeader']=$this->input->post('GridHeader');
			$save_hdr['DataFields']=$this->input->post('DataFields');
			$save_hdr['TableName']=$this->input->post('TableName');
			$save_hdr['WhereCondition']=$this->input->post('WhereCondition');
			$save_hdr['OrderBy']=$this->input->post('OrderBy');
			$save_hdr['ControllerFunctionLink']=
			$this->input->post('ControllerFunctionLink');
			$save_hdr['ViewPath']=$this->input->post('ViewPath');
			$save_hdr['NEWENTRYBUTTON']=$this->input->post('NEWENTRYBUTTON');
			$save_hdr['DisplayGrid']=$this->input->post('DisplayGrid');
					
			
			if($id_header==0) 
			{					
				$this->projectmodel->save_records_model($id_header,
				'frmrpttemplatehdr',$save_hdr);
				$id_header=$this->db->insert_id();
				$this->session->set_userdata('alert_msg',
				'One Record Inserted Successfully');
			}	
			
			if($id_header>0)// update data....
			{
				$this->projectmodel->save_records_model($id_header,
				'frmrpttemplatehdr',$save_hdr);
				$this->session->set_userdata('alert_msg', 
				'One Record Updated Successfully');						
			}
				
			//DETAIL SECTIONS 
				//ADD SECTION
				$save_dtl['frmrpttemplatehdrID']=$id_header;
				$save_dtl['InputName']=$this->input->post('InputName');
				$save_dtl['InputType']=$this->input->post('InputType');
				$save_dtl['Inputvalue']=$this->input->post('Inputvalue');
				$save_dtl['LabelName']=$this->input->post('LabelName');
				$save_dtl['LogoType']=$this->input->post('LogoType');
				$save_dtl['DIVClass']=$this->input->post('DIVClass');
				$save_dtl['Section']=$this->input->post('Section');
				$save_dtl['tran_table_name']=$this->input->post('tran_table_name');
				
				$save_dtl['FieldOrder']=$this->input->post('FieldOrder');
				$save_dtl['datafields']=$this->input->post('datafields');
				//$save_dtl['table_name']=$this->input->post('table_name');
				//$save_dtl['where_condition']=$this->input->post('where_condition');
				//$save_dtl['orderby']=$this->input->post('orderby');
				$save_dtl['SectionType']=$this->input->post('SectionType');
				$save_dtl['MainTable']=$this->input->post('MainTable');
				$save_dtl['LinkField']=$this->input->post('LinkField');
				
				/*$save_dtl['RecordSet']=$this->input->post('RecordSet');*/
												
				if($save_dtl['InputName']<>'')
				{
					$this->projectmodel->save_records_model('',
					'frmrpttemplatedetails',$save_dtl);
				}
				
			//EDIT SECTION	
			$sql="select *  from frmrpttemplatedetails 
			where frmrpttemplatehdrID=".$id_header."  ";
			$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
			foreach ($rowrecord as $row1)
			{ 
				$dtl_id=$row1->id;
				$save_dtl['frmrpttemplatehdrID']=$id_header;
				$save_dtl['InputName']=$this->input->post('InputName'.$dtl_id);
				$save_dtl['InputType']=$this->input->post('InputType'.$dtl_id);
				$save_dtl['Inputvalue']=$this->input->post('Inputvalue'.$dtl_id);
				$save_dtl['LogoType']=$this->input->post('LogoType'.$dtl_id);
				$save_dtl['LabelName']=$this->input->post('LabelName'.$dtl_id);
				$save_dtl['DIVClass']=$this->input->post('DIVClass'.$dtl_id);
				$save_dtl['Section']=$this->input->post('Section'.$dtl_id);
				$save_dtl['tran_table_name']=$this->input->post('tran_table_name'.$dtl_id);
				
				$save_dtl['FieldOrder']=$this->input->post('FieldOrder'.$dtl_id);
				$save_dtl['datafields']=$this->input->post('datafields'.$dtl_id);
				$save_dtl['table_name']=$this->input->post('table_name'.$dtl_id);
				$save_dtl['where_condition']=$this->input->post('where_condition'.$dtl_id);
				$save_dtl['orderby']=$this->input->post('orderby'.$dtl_id);
				$save_dtl['SectionType']=$this->input->post('SectionType'.$dtl_id);
				$save_dtl['MainTable']=$this->input->post('MainTable'.$dtl_id);
				 $save_dtl['LinkField']=$this->input->post('LinkField'.$dtl_id);
				
			   $data['MainTable'] =$save_dtl['MainTable'];
			   $data['tran_table_name']=$save_dtl['tran_table_name'];
										
				if($save_dtl['InputName']<>'')
				{
				$this->projectmodel->save_records_model($dtl_id,
					'frmrpttemplatedetails',$save_dtl);
				}
			
			}		
				
				redirect('Project_controller/TempleteFormReport/addeditview/'.
				$id_header.'/0/');
		}
		
			
		if($displaytype=='delete')
		{
		$sql="delete from frmrpttemplatedetails  where id=".$id_detail;
		$this->db->query($sql);
		redirect('Project_controller/TempleteFormReport/addeditview/'.
				$id_header.'/0/');
		}
		
		if($displaytype=='deleteAll')
		{
			$sql="delete from  frmrpttemplatedetails 
			 where frmrpttemplatehdrID=".$id_header;
			$this->db->query($sql);	
			$this->session->set_userdata('alert_msg','Deleted!');
					
			$sql="delete from  frmrpttemplatehdr  where id=".$id_header;
			$this->db->query($sql);	
		    redirect('Project_controller/TempleteFormReport/list/0/0/');
		}
		
		$this->page_layout_display($view_path_name,$data);
		
		
}


public function TempleteForm($frmrpttemplatehdrID=2,$operation='',$id_header='',$id_detail='')
{
		
		//DATA GRID SECTION
		  $data['id']=$id_header;	
		 if($frmrpttemplatehdrID==7)//PRODUCT MASTER
		 {$data['GridHeader']=array("SysId#-left", "FieldID-left", "FieldVal-left", "Status-left");}		
		 		
		 if($frmrpttemplatehdrID==8) //Retailer  Mastet
		 {$data['GridHeader']= array("SysId#-left", "NAME-left","ADDRESS-left");}

		 if($frmrpttemplatehdrID==10) //Employee  Mastet
		 {$data['GridHeader']= array("SysId#-left", "Name-left","UserID-left","Status-left");}
		 
		 if($frmrpttemplatehdrID==30) //QUERY BUILDER
		 {$data['GridHeader']=array("SysId#-left","FormRptName-left","Query_name-left"); }
						 
		 if($frmrpttemplatehdrID==31) //CARRER
		 { $data['GridHeader']=array("SysId#-left", "Name-left", "phone-left", "Email-left", "Upload-left"); }
		
		 if($frmrpttemplatehdrID==32) //feedback
		 { $data['GridHeader']=array("SysId#-left", "Name-left", "phone-left", "Email-left", "Comment-left", "Status-left"); }
	
		 if($frmrpttemplatehdrID==33) //service category
		 { $data['GridHeader']=array("SysId#-left", "category name-left", "Order index-left"); }

		 if($frmrpttemplatehdrID==34) //service category
		 { $data['GridHeader']=array("SysId#-left", "Service name-left", "category-left", "Order index-left"); }

		 if($frmrpttemplatehdrID==35) //news
		 { $data['GridHeader']=array("SysId#-left", "Title-left", "Details-left", "Date-left"); }

		 if($frmrpttemplatehdrID==36) //BLOOD TEST
		 { $data['GridHeader']=array("SysId#-left", "Test Name-left"); }

		 if($frmrpttemplatehdrID==37) //BLOOD TEST PROFILE
		 { $data['GridHeader']=array("SysId#-left", "Profile Name-left"); }

		 
		$data['frmrpttemplatehdrID']=$frmrpttemplatehdrID;
		$view_path_name='';
		
		$records="select * from frmrpttemplatehdr where id=".$frmrpttemplatehdrID;
		$records = $this->projectmodel->get_records_from_sql($records);	
		foreach ($records as $record)
		{	
			 $data['DisplayGrid']=$record->DisplayGrid;
			 $data['NEWENTRYBUTTON']=$record->NEWENTRYBUTTON;
			 
			 $data['FormRptName']=$record->FormRptName;
			 $data['DataFields']=$record->DataFields;
			 $data['TableName']=$record->TableName;
			 $data['WhereCondition']=$record->WhereCondition;
			 $data['OrderBy']=$record->OrderBy;	
			 $ControllerFunctionLink=$record->ControllerFunctionLink.$frmrpttemplatehdrID.'/';	 
			 $data['tran_link'] = ADMIN_BASE_URL.$ControllerFunctionLink; 
			 $view_path_name=$record->ViewPath; 
			 $data['body']=$this->projectmodel->Activequery($data,'LIST');
		}
		
		$Party_Type='';		
		if($operation=="save" )
		{
			//HEADER SECTION
			$records="select * from frmrpttemplatedetails 
			where frmrpttemplatehdrID=".$frmrpttemplatehdrID."
			 and SectionType='HEADER' order by Section ";
			$records = $this->projectmodel->get_records_from_sql($records);	
			foreach ($records as $record)
			{		
				 $id_header=$this->input->post('id');			
				 if($record->InputType<>'FILE_UPLOAD')
				{
					$save_hdr[$record->InputName]=$this->input->post(trim($record->InputName));
					$tran_table_name=$record->tran_table_name;
				}
			 
			}
								
			if($id_header==0) 
			{					
				if($data['NEWENTRYBUTTON']=='YES'){
				
					$this->projectmodel->save_records_model($id_header,$tran_table_name,$save_hdr);
					$id_header=$this->db->insert_id();
				}				
			}				
			if($id_header>0)// update data....
			{
				$this->projectmodel->save_records_model($id_header,$tran_table_name,$save_hdr);
			}
			

			
			//FILE UPLOAD SECTIONS
			$records="select * from frmrpttemplatedetails 	where frmrpttemplatehdrID=".$frmrpttemplatehdrID."  
			and SectionType='HEADER' order by Section ";
			$records = $this->projectmodel->get_records_from_sql($records);	
			foreach ($records as $record)
			{	
				if($record->InputType=='FILE_UPLOAD')
				{
					if($_FILES[trim($record->InputName)]["tmp_name"]!='')
					{						
						$table_fld=trim($record->InputName);
						$uploads_dir='./uploads/';
						$tmp_name = $_FILES[trim($record->InputName)]["tmp_name"];
						//$name = $_FILES["image1"]["name"];
						$fileextension = substr(strrchr($_FILES[trim($record->InputName)]["name"], '.'), 1);
						$name=trim($record->tran_table_name).'_'.trim($record->InputName).$id_header.'.'.$fileextension;
						move_uploaded_file($tmp_name, "$uploads_dir/$name");
						
						$sql="update ".$tran_table_name." set ".$table_fld."='".$name."' where id=".$id_header ;
						$this->db->query($sql);
					}

				}
				
			}
			//FILE UPLOAD SECTIONS
			
			
			//HEADER SECTION END 
			redirect($ControllerFunctionLink.'addeditview/0/0/');
		}
				
		   
	  
	   $this->page_layout_display($view_path_name,$data);

}

	
	public function index($msg='')
	{	
	$layout_data = array();
	$data = array();
	//$this->load->view('ckeditor', $this->data);
	$layout_date['body'] = $this->load->view('login',$data,true);
	$this->load->view('login', $layout_date);
	}
	
	private function home()
	{
		$layout_data = array();
		$data = array();
		$view_path_name='dashboard';
		$this->page_layout_display($view_path_name,$data);
	}
	
	public function logout()
	{
		$this->projectmodel->logout(); 
	}
	
	public function login_process(){
        // Validate the user can login
        $result = $this->projectmodel->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $this->index();
        }else{
           
		   $this->home();
        }    
		
				
    }
	private function login_validate()
	{
       if($this->session->userdata('login_userid')=='')
		{ $this->logout();}
			else
	   {
	         $COMP_ID='';
			 $sqlemp="select * from company_details where id=1";
			 $rowrecordemp = $this->projectmodel->get_records_from_sql($sqlemp);	
			 foreach ($rowrecordemp as $rowemp)
			 {$this->session->set_userdata('COMP_ID', $rowemp->COMP_ID);}	
	   }	
	   
    }
	

	/*PASSWORD CHANGE*/

	function changepassword($msg=''){
	
		$layout_data = array();
		$data = array();
		$data['msg'] = $msg;
		//$this->authmod->is_admin_login();
		$view_path_name='changepass';
		$this->page_layout_display($view_path_name,$data);	
	}
	
	function changepassword_act()
	{
			$this->form_validation->set_rules('pass1', 'Old Password', 'required');
			$this->form_validation->set_rules('pass2', 'New Password', 'required');
			$this->form_validation->set_rules('pass3', 
			'For Confermation Same New Password is', 'required|matches[pass2]');
			if ($this->form_validation->run())
			{
				$value = $this->input->post();
				if(!$this->projectmodel->update_password($value))
				{
					$this->changepassword("Invalid old password");
				}
			}
			else
			{
				$value = $this->input->post();
				$this->changepassword();
			}		
	}
	/*LOGIN PROCESS END*/	
	
	
	
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
