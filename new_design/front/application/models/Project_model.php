<?php
class Project_model extends CI_Model {
   

function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
    }
	



    /*LOGIN LOGOUT*/
			
	public function validate()
	{
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
		
		/* $COMP_ID='';
		 $sqlemp="select * from company_details where id=1";
		 $rowrecordemp = $this->projectmodel->get_records_from_sql($sqlemp);	
		 foreach ($rowrecordemp as $rowemp)
		 {$this->session->set_userdata('COMP_ID', $rowemp->COMP_ID);}	*/
		
        // Prep the query
        $this->db->where('userid', $username);
        $this->db->where('password', $password);
		$this->db->where('status <>', 'INACTIVE');
        $this->db->where('tbl_designation_id <>',6);
        // Run the query
        $query = $this->db->get('tbl_employee_mstr');
        // Let's check if there are any results
		
		//echo 'ttttt'.$query->num_rows;
        if($query->num_rows == 1)
        {
		$row = $query->row();			
		
		$billing_emp_id=$billing_emp_desig=0;
		
		$Whr=' id=1';
		$billing_emp_id=$this->GetSingleVal('billing_emp_id','company_details',$Whr);	
		$billing_emp_desig=$this->GetSingleVal('billing_emp_desig','company_details',$Whr);	
		
		$this->session->set_userdata('billing_emp_desig', $billing_emp_desig);
		$this->session->set_userdata('billing_emp_id',$billing_emp_id);
			 
			if($row->login_status=='MANAGEMENT' or 
			$row->login_status=='SUPER_STOCKIST' or 
			$row->login_status=='SUPER' or 
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
	
	function update_password($data){
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

			if($this->session->userdata('HIERARCHY_STATUS')=='NORMAL_USER')
			{$empid=$this->session->userdata('login_emp_id');}
			
			if($this->session->userdata('HIERARCHY_STATUS')=='SUPERUSER')
			{$empid=$this->session->userdata('billing_emp_id');}
			
			$Whr=' employee_id='.$empid;
			$parentid=$this->GetSingleVal('id','tbl_hierarchy_org',$Whr);
		
		if($InputType=='FieldHQSingleSelect') 
		{	
			$options='';		
			$fieldlist=$this->gethierarchy_list($parentid,'FIELD');
			
			$sql="select * from tbl_hierarchy_org where tbl_designation_id='6' 	and id in (".$fieldlist.") 
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

			$fieldlist=$this->gethierarchy_list($parentid,'FIELD');
			
			$sql="select * from tbl_hierarchy_org where tbl_designation_id='6' and id in (".$fieldlist.") 
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
			
		if($InputType=='SingleSelect') 
		{	
			$options='<option value="0">Select None</option>';
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
			
		
		return $inputval;
		
	}


	public function GetMultipleVal($DataFields='',$TableName='',$WhereCondition='',$OrderBy='')
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
		
	public function send_json_output($rs)
		{
				header('Access-Control-Allow-Origin: *');
				header("Content-Type: application/json");
				echo json_encode($rs);
			
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
	
	
}
?>