<?php
class Project_model extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		//$this->load->model('thumb_model', 'thumb');
    }
	
    /*LOGIN LOGOUT*/
			
	public function validate()
	{
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
		
		 $COMP_ID='';
		 $sqlemp="select * from company_details where id=1";
		 $rowrecordemp = $this->projectmodel->get_records_from_sql($sqlemp);	
		 foreach ($rowrecordemp as $rowemp)
		 {$this->session->set_userdata('COMP_ID', $rowemp->COMP_ID);}	
		
        // Prep the query
      /*  $this->db->where('userid', $username);
        $this->db->where('password', $password);
		$this->db->where('status <>', 'INACTIVE');
        $this->db->where('tbl_designation_id <>',6);
        // Run the query
        $query = $this->db->get('tbl_employee_mstr');*/
        // Let's check if there are any results
			$cnt=0;
		   $records="select count(*) cnt from tbl_employee_mstr where userid='$username' and password='$password' and status='ACTIVE'";
		   $records = $this->projectmodel->get_records_from_sql($records);	
		   foreach ($records as $record)
		   {$cnt=$record->cnt;}
		   
		
        if($cnt == 1)
        {
			
		   $records="select * from tbl_employee_mstr where userid='$username' and password='$password' and status='ACTIVE'";
		   $records = $this->projectmodel->get_records_from_sql($records);	
		   foreach ($records as $row)
		   {	
				$this->session->set_userdata('billing_emp_desig', 13);
				$this->session->set_userdata('billing_emp_id',141);
				 
				if($row->login_status=='MANAGEMENT' or 
				$row->login_status=='SUPER_STOCKIST' or 
				$row->login_status=='ADMIN')
				{
					$this->session->set_userdata('HIERARCHY_STATUS','SUPERUSER');
				}
				else
				{
					$this->session->set_userdata('HIERARCHY_STATUS','NORMAL_USER');
				}
												   
				$data = array(
						'login_userid' => $row->userid,
						'login_name' => $row->name,
						'login_emp_id' => $row->id,
						'login_tbl_designation_id'=> $row->tbl_designation_id,
						'login_status'=> $row->login_status,
						'activity_status'=> $row->status,
						'validated' => true
						);
			}
			
            $this->session->set_userdata($data);
            return true;
			
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
	function logout(){
		
		$this->session->unset_userdata('login_userid');
		$this->session->unset_userdata('login_name');
		$this->session->unset_userdata('login_emp_id');
		$this->session->unset_userdata('login_tbl_designation_id');
		$this->session->unset_userdata('login_status');
		$this->session->unset_userdata('validated');
		
		//redirect('project_controller/', 'refresh');
		redirect('/', 'refresh');
		exit();
	}
	public function employee_insert($data)
	{
	  $this->db->insert('employees', $data);
	}
	
	public function priviledge_value($menu_details_id='')
	{
		$tbl_employee_mstr_id=$this->session->userdata('login_emp_id');
		$OPERATION='';
		$whr=" tbl_employee_mstr_id=".$tbl_employee_mstr_id." and menu_details_id=".$menu_details_id;
		$OPERATION=$this->GetSingleVal('OPERATION','menu_user_priviledge',$whr);
		return $OPERATION;
	}
		
	function update_password($data)
	{
		//$pass = $this->encoded($data['pass1']);
		$pass = $data['pass1'];
		$a_id = $this->session->userdata('login_emp_id');
		$query = $this->db->query("SELECT count(*) FROM tbl_employee_mstr WHERE id = '$a_id' AND password = '$pass' AND   login_status = 'USER'");
		if ($query->num_rows() > 0){
			//$pass = $this->encoded($data['pass2']);
			$pass =$data['pass2'];
			$query = $this->db->query("UPDATE 
			`tbl_employee_mstr` SET password = '$pass' WHERE `id` = '$a_id' ");
			$this->logout();
		}
	}
	/*LOGIN LOGOUT END*/

	
/*SECONDARY SALE SECTION END*/	
function find_by_id($id)
{
		//return $this->db->where->('id',$id)->limit(1)->get('p_product')->row();
		
		$sql = "SELECT * FROM p_product WHERE id=$id";
		$query = $this->db->query($sql);
		return $query->result();
		
}
public function get_all_record($table_name,$where_array)
{
	
		$res=$this->db->get_where($table_name,$where_array);
		//$res1=$res->result_array();
		return $res->result();
		//return $res1;
		
		/*$sql = "SELECT * FROM ".$table_name." WHERE id=".$id;
		$query = $this->db->query($sql);
		return $query->result();*/
		
}	
public function get_records_from_sql($sql)
{
		//$sql = "SELECT * FROM ".$table_name." WHERE id=".$id;
		$query = $this->db->query($sql);
		return $query->result();
}
	
public function get_single_record($table_name,$id)
{
		/*$res=$this->db->get_where($table_name,array('id'=>$id));
		$res1=$res->result_array();
		return $res1;*/
		
		$sql = "SELECT * FROM ".$table_name." WHERE id=".$id;
		$query = $this->db->query($sql);
		return $query->result();
		
}
	
public function save_records_model($id,$table_name,$tabale_data)
{
		if($id>0)
		{
			$this->db->update($table_name, $tabale_data, array('id' => $id));
		}
		else
		{
			$this->db->insert($table_name,$tabale_data);
		}	
}
	
public function delete_record($id=0,$table_name)
{
	//$this->db->delete('user',array('id'=>$id));
	$this->db->delete($table_name,array('id'=>$id));
}
	
public function Activequery($ActiveRecords,$QueryType='')
{
	if($QueryType=='LIST')
	{		
		if($ActiveRecords['DataFields']<>''){
		$this->db->select($ActiveRecords['DataFields']);}
		
		if($ActiveRecords['TableName']<>''){
		$this->db->from($ActiveRecords['TableName']);	}
		
		if($ActiveRecords['WhereCondition']<>''){
		$this->db->where($ActiveRecords['WhereCondition']);}	
		
		if($ActiveRecords['OrderBy']<>''){
		$this->db->order_by($ActiveRecords['OrderBy']);}
		
		$query = $this->db->get(); 
		$query =json_encode($query->result());
		$query =json_decode($query);
		
		return $query;
		
		
	}
	
	if($QueryType=='SingleVal')
	{		
		if($ActiveRecords['DataFields']<>''){
		$this->db->select($ActiveRecords['DataFields']);}
		
		if($ActiveRecords['TableName']<>''){
		$this->db->from($ActiveRecords['TableName']);	}
		
		if($ActiveRecords['WhereCondition']<>''){
		$this->db->where($ActiveRecords['WhereCondition']);}	
		
		if($ActiveRecords['OrderBy']<>''){
		$this->db->order_by($ActiveRecords['OrderBy']);}
		
		$query = $this->db->get(); 
		$query =json_encode($query->result());
		$query =json_decode($query);
		$rtnval='';
		 foreach($query as $key=>$bd){
		 foreach($bd as $key1=>$bdr){	
		 $rtnval=$bdr;
		 }}	
		 return $rtnval;
		
		
	}
	
	if($QueryType=='SUM')
	{	
	    $this->db->select_sum($ActiveRecords['DataFields']);
		$this->db->from($ActiveRecords['TableName']);	
		$this->db->where($ActiveRecords['WhereCondition']);	
		$query = $this->db->get();
		return $query->result();
			
	}
	
	
}	


public function create_field($InputType,$LogoType,$LabelName,$InputName,
$Inputvalue,$RecordSet)
{
		
	$inputval='';
		
	if($InputType=='SingleSelect') 
	{	
		$options='<option value="0">Select All</option>';
		foreach ($RecordSet as $row){
		$id=$fieldval=$slcted='';
		if($row->FieldID==$Inputvalue) 
		{$slcted='selected="selected"'; }
		$options=$options.
		'<option value="'.$row->FieldID.'"'.$slcted.' >'.$row->FieldVal.'</option>';
		}
		
		$frmcontrol='form-control select2';		
		$multiple='multiple';
		$placeholder='Select';
		$styletype='width: 100%;';
							 
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="'.$InputName.'">
                     '.$options.'</select>';
		
					 
	}
	
	if($InputType=='MultiSelect')
	{	
		$options='';
		$retail_field = explode(",",$Inputvalue);
		 
		$sql="select * from tbl_hierarchy_org where tbl_designation_id='6'
		order by  under_tbl_hierarchy_org desc,hierarchy_name ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row)
		{ 				
			$id=$fieldval=$slcted='';
			if (in_array($row->id, $retail_field)) 
			{ $slcted='selected="selected"'; }
			
			$sql_parent="select * from tbl_hierarchy_org 
			where id=".$row->under_tbl_hierarchy_org;
			$rowrecord_parents = 
			$this->projectmodel->get_records_from_sql($sql_parent);	
			foreach ($rowrecord_parents as $rowrecord_parent)
			{
			$options=$options.'<option value="'.$row->id.'"'.$slcted.' >'
			.$row->hierarchy_name.'('.$rowrecord_parent->hierarchy_name.')'.'</option>';
			}
		
		}
		
		$frmcontrol='form-control select2';
		$multiple='multiple';
		$placeholder='---Select---';
		$styletype='width: 100%;';
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="retail_field[]"
					multiple="'.$multiple.'" data-placeholder="'.$placeholder.'" 
					style="'.$styletype.'">'.$options.'</select>';
					 
				 
	}
	
	
	if($InputType=='DEBIT_LEDGER' or $InputType=='CREDIT_LEDGER' 
	or $InputType=='DEBIT_GROUP' or $InputType=='CREDIT_GROUP') 
	{	
		
		$options='';
		$retail_field = explode(",",$Inputvalue);
		 if($InputType=='DEBIT_LEDGER' or $InputType=='CREDIT_LEDGER' )
		 {
		 $sql="select * from acc_group_ledgers where  acc_type='LEDGER'
		 order by  acc_name ";
		 }
		 if( $InputType=='DEBIT_GROUP' or $InputType=='CREDIT_GROUP' )
		 {
		 $sql="select * from acc_group_ledgers where  acc_type='GROUP'
		 order by  acc_name ";
		 }
		 
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row)
		{ 				
			$id=$fieldval=$slcted='';
			if (in_array($row->id, $retail_field)) 
			{ $slcted='selected="selected"'; }
			
			$options=$options.'<option value="'.$row->id.'"'.$slcted.' >'
			.$row->acc_name.'</option>';
		
		}
		
		$frmcontrol='form-control select2';
		$multiple='multiple';
		$placeholder='---Select---';
		$styletype='width: 100%;';
		if($InputType=='DEBIT_LEDGER')
		 {
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="DEBIT_LEDGER[]"
					multiple="'.$multiple.'" data-placeholder="'.$placeholder.'" 
					>'.$options.'</select>';
		}
		if($InputType=='CREDIT_LEDGER' )
		 {		 
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="CREDIT_LEDGER[]"
					multiple="'.$multiple.'" data-placeholder="'.$placeholder.'" 
					>'.$options.'</select>';
		}
		
		if($InputType=='DEBIT_GROUP')
		 {
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="DEBIT_GROUP[]"
					multiple="'.$multiple.'" data-placeholder="'.$placeholder.'" 
					>'.$options.'</select>';
		}
		if($InputType=='CREDIT_GROUP' )
		 {		 
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="CREDIT_GROUP[]"
					multiple="'.$multiple.'" data-placeholder="'.$placeholder.'" 
					>'.$options.'</select>';
		}
		
					 				 
	}
	
	
	if($InputType=='password')
	{				  
			$inputval='<label>'.$LabelName.'</label>
						   <input type="password" id="'.$InputName.'" class="form-control"
				  value="'.$Inputvalue.'" name="'.$InputName.'" />';	 
				  
	}			
	
	//$inputval='';
	if($InputType=='hidden')
	{
			$inputval='<input type="hidden" id="'.$InputName.'" class="form-control"
				  value="'.$Inputvalue.'" name="'.$InputName.'" />';
	}			
	
	if($InputType=='text')
	{
			$inputval='<label>'.$LabelName.'</label>
			<input type="text" id="'.$InputName.'" class="form-control"
			  value="'.$Inputvalue.'" name="'.$InputName.'" />';
	}	
	
	if($InputType=='text_area')
	{					
			$inputval='<label>'.$LabelName.'</label>
			<textarea id="'.$InputName.'" class="form-control"   name="'.$InputName.'" />'.$Inputvalue.'</textarea>	';
	}	
	
	//echo $InputType;
	if($InputType=='FILE_UPLOAD')
	{
		
			$inputval='<label>'.$LabelName.'</label>
			<input type="file" id="'.$InputName.'"   value="'.$Inputvalue.'" name="'.$InputName.'" />';
	}		

	if($InputType=='datefield')
	{
			$inputval='<label>'.$LabelName.'</label>
			<input type="text" id="'.$InputName.'" class="form-control"
				value="'.$Inputvalue.'" name="'.$InputName.'" />';
	}			

	if($InputType=='LABEL')
	{
			$inputval='<label>'.$LabelName.'</label><br>
			<label>'.$Inputvalue.'</label>
			<input type="hidden" id="'.$InputName.'" class="form-control"
			value="'.$Inputvalue.'" name="'.$InputName.'" />';
	}				   	
	
	return $inputval;
	
}

public function create_field_300818($InputType,$LogoType,$LabelName,$InputName,
$Inputvalue,$RecordSet)
{
		
	$inputval='';
		
	if($InputType=='SingleSelect') 
	{	
		$options='';
		foreach ($RecordSet as $row){
		$id=$fieldval=$slcted='';
		if($row->FieldID==$Inputvalue) 
		{$slcted='selected="selected"'; }
		$options=$options.
		'<option value="'.$row->FieldID.'"'.$slcted.' >'.$row->FieldVal.'</option>';
		}
		
		$frmcontrol='form-control select2';		
		$multiple='multiple';
		$placeholder='Select';
		$styletype='width: 100%;';
							 
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="'.$InputName.'">
                     '.$options.'</select>';
		
					 
	}
	
	if($InputType=='MultiSelect')
	{	
		$options='';
		foreach ($RecordSet as $row)
		{
		$slcted='';
		if($Inputvalue==$row->id)
		{
		$slcted='selected="selected"';
		}
		
		$options=$options.'<option value="'.$row->id.'" '.$slcted.' 
		>'.$row->fieldval.'</option>';
		}
		
		$frmcontrol='form-control select2';
		$multiple='multiple';
		$placeholder='---Select---';
		$styletype='width: 100%;';
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="'.$InputName.'"
					multiple="'.$multiple.'" data-placeholder="'.$placeholder.'" 
					style="'.$styletype.'">'.$options.'</select>';
				 
	}
	
	if($InputType=='FieldHQSingleSelect') 
	{	
		$options='';
		$sql="select * from tbl_hierarchy_org where tbl_designation_id='6'
		 order by  under_tbl_hierarchy_org,hierarchy_name ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row)
		{ 	
			$hq='';
			$sql_parent="select * from tbl_hierarchy_org 
			where id=".$row->under_tbl_hierarchy_org;
			$rowrecord_parents = 
			$this->projectmodel->get_records_from_sql($sql_parent);	
			foreach ($rowrecord_parents as $rowrecord_parent)
			{ $hq=$rowrecord_parent->hierarchy_name; }
		
			$id=$fieldval=$slcted='';
			if($row->id==$Inputvalue) 
			{$slcted='selected="selected"'; }
			$options=$options.'<option value="'.$row->id.'"'.$slcted.' >'
			.$row->hierarchy_name.'('.$hq.')'.'</option>';
		
		}
		
		$frmcontrol='form-control select2';
		//$frmcontrol='select2';
		$multiple='multiple';
		$placeholder='Select';
		$styletype='width: 100%;';
							 
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="'.$InputName.'">
                     '.$options.'</select>';					 
	}
	
	
	if($InputType=='FieldHQMultiSelect') 
	{	
		$options='';
		$retail_field = explode(",",$Inputvalue);
		 
		$sql="select * from tbl_hierarchy_org where tbl_designation_id='6'
		order by  under_tbl_hierarchy_org desc,hierarchy_name ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row)
		{ 				
			$id=$fieldval=$slcted='';
			if (in_array($row->id, $retail_field)) 
			{ $slcted='selected="selected"'; }
			
			$sql_parent="select * from tbl_hierarchy_org 
			where id=".$row->under_tbl_hierarchy_org;
			$rowrecord_parents = 
			$this->projectmodel->get_records_from_sql($sql_parent);	
			foreach ($rowrecord_parents as $rowrecord_parent)
			{
			$options=$options.'<option value="'.$row->id.'"'.$slcted.' >'
			.$row->hierarchy_name.'('.$rowrecord_parent->hierarchy_name.')'.'</option>';
			}
		
		}
		
		$frmcontrol='form-control select2';
		$multiple='multiple';
		$placeholder='---Select---';
		$styletype='width: 100%;';
		$inputval='<label>'.$LabelName.'</label>
                    <select class="'.$frmcontrol.'" name="retail_field[]"
					multiple="'.$multiple.'" data-placeholder="'.$placeholder.'" 
					style="'.$styletype.'">'.$options.'</select>';
					 
	}
	
	
	if($InputType=='password')
	{				  
			$inputval='<label>'.$LabelName.'</label>
						   <input type="password" id="'.$InputName.'" class="form-control"
				  value="'.$Inputvalue.'" name="'.$InputName.'" />';	 
				  
	}			
	
	//$inputval='';
	if($InputType=='hidden')
	{
			$inputval='<input type="hidden" id="'.$InputName.'" class="form-control"
				  value="'.$Inputvalue.'" name="'.$InputName.'" />';
	}			
	
	if($InputType=='text')
	{
			$inputval='<label>'.$LabelName.'</label>
			<input type="text" id="'.$InputName.'" class="form-control"
			  value="'.$Inputvalue.'" name="'.$InputName.'" />';
	}				   
		
	
	return $inputval;
	
}

public function product_update($id=0,$operation_type='invoice_details')
{
			
		if($operation_type=='invoice_details')	//PRODUCT update batch wise
		{
					 $PURCHASEID=$id;
					$tot_purchase=$tot_sale=$tot_sample=$SELL_RTN=$PRUCHAR_RTN=0;
					$products = "select sum(qnty) totqnty from invoice_details where id=".$PURCHASEID." and  (status='PURCHASE' or status='OPEN_BALANCE') " ;
					$products = $this->get_records_from_sql($products);
					if(count($products)>0){foreach ($products as $product){$tot_purchase=$product->totqnty;}}

					$products = "select sum(qnty) totqnty from invoice_details where PURCHASEID=".$PURCHASEID." and  status='SALE' " ;
					$products = $this->get_records_from_sql($products);
					if(count($products)>0){foreach ($products as $product){$tot_sale=$product->totqnty;}}

					$products = "select sum(qnty) totqnty from invoice_details where PURCHASEID=".$PURCHASEID." and  status='SALE_RTN' " ;
					$products = $this->get_records_from_sql($products);
					if(count($products)>0){foreach ($products as $product){$SELL_RTN=$product->totqnty;}}

					$products = "select sum(qnty) totqnty from invoice_details where PURCHASEID=".$PURCHASEID." and  status='PRUCHAR_RTN' " ;
					$products = $this->get_records_from_sql($products);
					if(count($products)>0){foreach ($products as $product){$PRUCHAR_RTN=$product->totqnty;}}
							
					$inv_details['qty_available']=$tot_purchase-$tot_sale+$SELL_RTN-$PRUCHAR_RTN-$tot_sample;
					
					$this->save_records_model($PURCHASEID,'invoice_details',$inv_details);

					$sql = "update  invoice_details set qty_available=0 where  status<>'PURCHASE' and status<>'OPEN_BALANCE' " ;
					$this->db->query($sql);
			
		}
		
		if($operation_type=='productmstr')	//PRODUCT MASTER UPDATE END
		{
					$product_id=$id;
					$tot_purchase=$tot_sale=$tot_sample=$SELL_RTN=$PRUCHAR_RTN=0;
					//select sum(qnty) totqnty from invoice_details where product_id=743 and  (status='PURCHASE' or status='OPEN_BALANCE')
					$products = "select sum(qnty) totqnty from invoice_details where product_id=".$product_id." and  (status='PURCHASE' or status='OPEN_BALANCE') " ;
					$products = $this->get_records_from_sql($products);
					if(count($products)>0){foreach ($products as $product){$tot_purchase=$product->totqnty;}}

					$products = "select sum(qnty) totqnty from invoice_details where product_id=".$product_id." and  status='SALE' " ;
					$products = $this->get_records_from_sql($products);
					if(count($products)>0){foreach ($products as $product){$tot_sale=$product->totqnty;}}

					$products = "select sum(qnty) totqnty from invoice_details where product_id=".$product_id." and  status='SALE_RTN' " ;
					$products = $this->get_records_from_sql($products);
					if(count($products)>0){foreach ($products as $product){$SELL_RTN=$product->totqnty;}}

					$products = "select sum(qnty) totqnty from invoice_details where product_id=".$product_id." and  status='PRUCHAR_RTN' " ;
					$products = $this->get_records_from_sql($products);
					if(count($products)>0){foreach ($products as $product){$PRUCHAR_RTN=$product->totqnty;}}
							
					$product_save['available_qnty']=$tot_purchase-$tot_sale+$SELL_RTN-$PRUCHAR_RTN-$tot_sample;

					$this->save_records_model($product_id,'productmstr',$product_save);
		}
		
			
}

public function GetSingleVal($DataFields='',$TableName='',$WhereCondition='')
	{
		$rtnval=0;
			
		if($DataFields<>'' and $TableName<>'' and $WhereCondition<>'' )
		{
			$this->db->select($DataFields);
			$this->db->from($TableName);
			$this->db->where($WhereCondition);
			
			$query = $this->db->get(); 
			$query =json_encode($query->result());
			$query =json_decode($query);
			$rtnval='';
			 foreach($query as $key=>$bd){
			 foreach($bd as $key1=>$bdr){	
			 $rtnval=$bdr;
			 }}	
		 
		}
		 return $rtnval;
	}
	
	public function GetMultipleVal($DataFields='',$TableName='',
	$WhereCondition='',$OrderBy='')
	{
			$this->db->select($DataFields);		
			$this->db->from($TableName);		
			$this->db->where($WhereCondition);
			if($OrderBy<>''){$this->db->order_by($OrderBy);}
			
			$query = $this->db->get(); 
			$query =json_encode($query->result());
			$query =json_decode($query, true);
			//json_decode($jsonData, true);
			return $query;
		
	}

	public function get_product_master($DataFields='',$TableName='',
	$WhereCondition='',$OrderBy='')
	{
			$this->db->select($DataFields);		
			$this->db->from($TableName);		
			$this->db->where($WhereCondition);
			if($OrderBy<>''){$this->db->order_by($OrderBy);}
			
			$query = $this->db->get(); 
			$query =json_encode($query->result());
			return $query;
		
	}
	
	public function send_json_output($rs)
	{
			header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($rs);
		
	}
	
	
}
?>