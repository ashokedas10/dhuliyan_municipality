<?php
class Project_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function productlisting($pid=0){
		
		$query = $this->db->query("SELECT * FROM `p_product` order by id ");
   		$config['per_page'] =3;
		$config['uri_segment'] = 3;
		$config['total_rows'] = $query->num_rows();
		$config['base_url'] = ADMIN_BASE_URL.'product/productlisting/';
		$offset = $this->uri->segment($config['uri_segment']);
		if(!$offset){ $offset = 0; }
		$this->pagination->initialize($config); 
		
		//$sql = "SELECT * FROM `p_product` order by id desc  LIMIT ".$offset.", ".$config['per_page'];
		
		$sql = "SELECT * FROM `p_product` order by id ";
		$query = $this->db->query($sql);
		return $query->result();
			
	}
	
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
		
	public function delete_record_with_condition($table_name,$where_array)
	{
	$this->db->delete($table_name,$where_array);
	}
		
	
	
	
	
}
?>