<?php
class User_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
	function listing($pid=0){
		
		$query = $this->db->query("SELECT * FROM `p_webmaster` WHERE usertype = 3 AND status <> 'D'");
   		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$config['total_rows'] = $query->num_rows();
		$config['base_url'] = RETAILER_BASE_URL.'user/listing/';
		$offset = $this->uri->segment($config['uri_segment']);
		if(!$offset){ $offset = 0; }
		$this->pagination->initialize($config); 
		
		$sql = "SELECT * FROM `p_webmaster` WHERE usertype = 3 AND status <> 'D' LIMIT ".$offset.", ".$config['per_page'];
		$query = $this->db->query($sql);
		
		return $query->result();
			
	}
	
	function parent_list($pid=0){
		$sql = "SELECT * FROM p_category WHERE pid = $pid AND status = 'A' AND id <> $pid ";
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	function get_user_name_byid($id){
		$sql = "SELECT * FROM p_category WHERE id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			return $ro->category;
		}
			return '';
	}
	
	function get_user_byid($id){
		
		$row->a_id = $id;
		$row->user_name = $this->input->post('user_name', '');
		$row->user_pass = $this->input->post('user_pass', '');
		$row->usertype = $this->input->post('usertype', '');
		$row->name = $this->input->post('name', '');
		$row->email = $this->input->post('email', '');
		$row->contact = $this->input->post('contact', '');
		$row->status = $this->input->post('status', 'I');
		
		$sql = "SELECT * FROM p_webmaster WHERE a_id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			$row->user_name = $ro->user_name;
			$row->user_pass = $ro->user_pass;
			$row->usertype = $ro->usertype;
			$row->name = $ro->name;
			$row->email = $ro->email;
			$row->contact = $ro->contact;
			$row->status = $ro->status;
		}
		
		return $row; 
		
	}
	
	function addedit_act($value=array(), & $m=''){
		if($value['id'] > 0){
			$sql = "UPDATE p_webmaster SET name = '".$value['name']."', email = '".$value['email']."', contact = '".$value['contact']."', status = '".$value['status']."' WHERE a_id = ".$value['id'];
			$query = $this->db->query($sql);
			if($value['user_pass']!=''){
				$sql = "UPDATE p_webmaster SET user_pass = '".$this->mylib->encoded($value['user_pass'])."' WHERE a_id = ".$value['id'];
				$query = $this->db->query($sql);
			}
			$m = 'upd';
			return $value['id'];
		}else{
			$sql = "INSERT INTO p_webmaster SET user_name = '".$value['user_name']."', name = '".$value['name']."', email = '".$value['email']."', contact = '".$value['contact']."', user_pass = '".$this->mylib->encoded($value['user_pass'])."', usertype = 3, status = '".$value['status']."' ";
			$query = $this->db->query($sql);
			$m = 'sav';
			return $this->db->insert_id();
		}
	}
	
	
	
	function delete($id){
		$query = $this->db->query("UPDATE p_webmaster SET status = 'D' WHERE a_id = $id");
		return $query;
	}
	
	
	
	
	
}




?>