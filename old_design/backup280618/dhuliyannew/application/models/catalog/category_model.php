<?php
class Category_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
	function listing($pid=0){
		
		$query = $this->db->query("SELECT c . * , p.`category` FROM `p_category` c LEFT JOIN `p_category` p ON c.`pid` = p.`id` WHERE c.status <> 'D'");
   		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		$config['total_rows'] = $query->num_rows();
		$config['base_url'] = RETAILER_BASE_URL.'catalog/category/'.$pid.'/';
		$offset = $this->uri->segment($config['uri_segment']);
		if(!$offset){ $offset = 0; }
		$this->pagination->initialize($config); 
		
		$sql = "SELECT c . * , p.`category` AS parent_cat FROM `p_category` c LEFT JOIN `p_category` p ON c.`pid` = p.`id` WHERE c.status <> 'D' LIMIT ".$offset.", ".$config['per_page'];
		$query = $this->db->query($sql);
		
		return $query->result();
			
	}
	
	function parent_list($pid=0){
		$sql = "SELECT * FROM p_category WHERE pid = $pid AND status = 'A' AND id <> $pid ";
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	function get_category_name_byid($id){
		$sql = "SELECT * FROM p_category WHERE id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			return $ro->category;
		}
			return '';
	}
	
	function get_category_byid($id){
		
		$row->id = $id;
		$row->pid = '0';
		$row->parent_cat = '';
		$row->category = '';
		$row->parent_category_list = $this->parent_list();
		$row->status = 'A';
		$sql = "SELECT * FROM p_category WHERE id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			$row->category = $ro->category;
			$row->parent_cat = '';
			$row->pid = $ro->pid;
			$row->status = $ro->status;
		}
		
		return $row; 
		
	}
	
	function addedit_act($value=array()){
		if($value['id'] > 0){
			$sql = "UPDATE p_category SET category = '".$value['category']."', pid = '".$value['pid']."', status = '".$value['status']."' WHERE id = ".$value['id'];
			$query = $this->db->query($sql);
			return $value['id'];
		}else{
			$sql = "INSERT INTO p_category SET category = '".$value['category']."', pid = '".$value['pid']."', status = '".$value['status']."' ";
			$query = $this->db->query($sql);
			return $this->db->insert_id();
		}
	}
	
	
	
	function delete($id){
		$query = $this->db->query("UPDATE p_category SET status = 'D' WHERE id = $id");
		$query = $this->db->query("UPDATE p_category SET status = 'D' WHERE pid = $id");
		return $query;
	}
	
	
	
	
	
}




?>