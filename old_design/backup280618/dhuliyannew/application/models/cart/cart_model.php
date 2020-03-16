<?php
class Cart_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
	function mycart_order(& $item = array()){
		$a_id = $this->session->userdata('a_id');
		$query = $this->db->query("SELECT * FROM  `p_order_master`  WHERE status = 'C' AND retailer_id = $a_id");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$id = $row->id;
				$query_item = $this->db->query("SELECT * FROM  `p_order_item`  WHERE status = 'C' AND order_id = $id");
				$item = $query_item->result();
			}
		}
		return $query->result();
	}
	
	public function remove_item($ids){
		$arr = explode('-',$ids);
		$order_id = $arr[0];
		$prod_id = $arr[1];
		$pro_attr_id = $arr[2];
		
		$query = $this->db->query("SELECT * FROM  `p_order_item`  WHERE status = 'C' AND pro_attr_id = $pro_attr_id AND order_id = $order_id");
		foreach ($query->result() as $row){ $num = $row->qty; $data = $row; }
		
		$sql = "UPDATE `p_product_price_qty` SET `qty` = (`qty` + $num)  WHERE `id` = $pro_attr_id";
		$this->db->query($sql);
		
		$this->db->query("DELETE FROM `p_order_item`  WHERE status = 'C' AND pro_attr_id = $pro_attr_id AND order_id = $order_id");
		
		$totPrice = 0.00;
		$sql = "SELECT IFNULL(SUM(uni_price * qty), 0.00) as totPrice FROM `p_order_item` WHERE status = 'C' AND order_id = $order_id ";
		$query = $this->db->query($sql);
		foreach($query->result() as $row){
			$totPrice = $row->totPrice;
		}
		$sql = "UPDATE `p_order_master` SET total_price = $totPrice, o_date = NOW() WHERE id = $order_id ";
		$this->db->query($sql);
	}
	
	public function remove_order($id){
		$query = $this->db->query("SELECT * FROM `p_order_item`  WHERE  order_id = $id");
		foreach ($query->result() as $row){
			$this->remove_item($id.'-'.$row->pro_id.'-'.$row->pro_attr_id);
		}
		$this->db->query("DELETE FROM `p_order_master` WHERE id = $id");
	}
	
	public function submit_order($id){
		$this->db->query("UPDATE `p_order_master` SET status = 'O' WHERE id = $id");
		$this->db->query("UPDATE `p_order_item` SET status = 'O' WHERE order_id = $id");
	}
	
	
	
}




?>