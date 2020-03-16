<?php
class Atribute_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
    
	function listing(){
		
		$query = $this->db->query("SELECT c . *, p.matr_name AS main_atribute FROM `p_atribute` c LEFT JOIN `p_main_atribute` p ON c.`atrib_id` = p.`id` WHERE c.status <> 'D'");
   		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$config['total_rows'] = $query->num_rows();
		$config['base_url'] = RETAILER_BASE_URL.$this->uri->segment(1).'/'.$this->uri->segment(2);
		$offset = $this->uri->segment($config['uri_segment']);
		if(!$offset){ $offset = 0; }
		$this->pagination->initialize($config); 
		
		$sql = "SELECT c . *, p.matr_name AS main_atribute FROM `p_atribute` c LEFT JOIN `p_main_atribute` p ON c.`atrib_id` = p.`id` WHERE c.status <> 'D' LIMIT ".$offset.", ".$config['per_page'];
		$query = $this->db->query($sql);
		
		return $query->result();
			
	}
	
	function parent_list(){
		$sql = "SELECT * FROM p_main_atribute WHERE 1 ";
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	function sub_atribute_list($maid){
		$sql = "SELECT * FROM p_atribute WHERE atrib_id = ".$maid;
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	function atribute_set(){
		$mn_artibute = $this->parent_list();
		$arr = array();
		$arr1 = array();
		foreach($mn_artibute as $row){
			$arr1['id'] = $row->id;
			$arr1['mn_artibute'] = $row->matr_name;
			$arr1['artibute'] = $this->sub_atribute_list($row->id);
			$arr[] = $arr1;
		}
		return $arr;
	}
	
	function get_main_atribute_name_byid($id){
		$sql = "SELECT * FROM p_main_atribute WHERE id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			return $ro->matr_name;
		}
			return '';
	}
	
	function get_atricolor_byid($id){
		
		$row->id = $id;
		$row->atrib_id = '0';
		$row->parent_atribute = '';
		$row->atribute = '';
		$row->at_desc = '';
		$row->parent_atribute_list = $this->parent_list();
		$row->status = 'A';
		$sql = "SELECT * FROM `p_atribute` WHERE id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			$row->atrib_id = $ro->atrib_id;
			$row->atribute = $ro->atribute;
			$row->at_desc = $ro->at_desc;
			$row->status = $ro->status;
		}
		
		return $row; 
		
	}
	
	function addedit_act($value=array()){
		if($value['id'] > 0){
			$sql = "UPDATE p_atribute SET atribute = '".$value['atribute']."', at_desc = '".$value['at_desc']."', atrib_id = '1', status = '".$value['status']."' WHERE id = ".$value['id'];
			$query = $this->db->query($sql);
			return $value['id'];
		}else{
			$sql = "INSERT INTO p_atribute SET atribute = '".$value['atribute']."', at_desc = '".$value['at_desc']."', atrib_id = '1', status = '".$value['status']."' ";
			$query = $this->db->query($sql);
			return $this->db->insert_id();
		}
	}
	
	
	
	function delete($id){
		$query = $this->db->query("UPDATE p_atribute status = 'D' WHERE id = $id");
		return $query;
	}
	
	
	
	
	
}




?>