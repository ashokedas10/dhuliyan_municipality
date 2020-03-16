<?php
class Project_model extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'trackback', 'pagination', 'mylib'));
		$this->load->database();
    }
/* search  */
    public function get_autocomplete($search_data){
		$rslt_array=array();
		$sql_prod_name = "SELECT distinct(product_name) rslt FROM `product` WHERE product_name 
		like '".$search_data."%' or details like '%".$search_data."%' ";
		$query_prod_name = $this->db->query($sql_prod_name);
		$rslt_array=$query_prod_name->result_array();
		return $rslt_array;	
    }
/* search  ends  */
	function productlisting($pid=0){
		$query = $this->db->query("SELECT * FROM `p_product` order by id ");
   		$config['per_page'] =3;
		$config['uri_segment'] = 3;
		$config['total_rows'] = $query->num_rows();
		$config['base_url'] = ADMIN_BASE_URL.'product/productlisting/';
		$offset = $this->uri->segment($config['uri_segment']);
		if(!$offset){ $offset = 0; }
		$this->pagination->initialize($config); 
		$sql = "SELECT * FROM `p_product` order by id ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function find_by_id($id){
		$sql = "SELECT * FROM p_product WHERE id=$id";
		$query = $this->db->query($sql);
		return $query->result();
	}	
	
	public function get_all_record($table_name,$where_array){
		$res=$this->db->get_where($table_name,$where_array);
		return $res->result();
	}
	
	public function get_records_from_sql($sql){
		$query = $this->db->query($sql);
		return $query->result();
	}	
	
	public function get_single_record($table_name,$id){
		$sql = "SELECT * FROM ".$table_name." WHERE id=".$id;
		$query = $this->db->query($sql);
		return $query->result();		
	}
	
	public function save_records_model($id,$table_name,$tabale_data){
		if($id>0){
			$this->db->update($table_name, $tabale_data, array('id' => $id));
		}else{
			$this->db->insert($table_name,$tabale_data);
		}	
	}
	public function delete_record($id=0,$table_name){
		$this->db->delete($table_name,array('id'=>$id));
	}	
	
}
?>