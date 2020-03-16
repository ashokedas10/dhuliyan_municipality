<?php
class Product_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('catalog/thumb_model', 'thumb');
    }
    
	function listing($pid=0){
		
		$param = '';
		if($pid > 0){
			$param = 'AND c.`cat_id` = '.$pid;
		}
		$query = $this->db->query("SELECT c . * , p.`category` FROM `p_product` c LEFT JOIN `p_category` p ON c.`cat_id` = p.`id` WHERE c.pstatus = 'A' $param");
   		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		$config['total_rows'] = $query->num_rows();
		$config['base_url'] = RETAILER_BASE_URL.'catalog/projectlist/'.$pid.'/';
		$offset = $this->uri->segment($config['uri_segment']);
		if(!$offset){ $offset = 0; }
		$this->pagination->initialize($config); 
		
		$sql = "SELECT c . * , p.`category` AS cat_name FROM `p_product` c LEFT JOIN `p_category` p ON c.`cat_id` = p.`id` WHERE c.pstatus = 'A' $param LIMIT ".$offset.", ".$config['per_page'];
		$query = $this->db->query($sql);
		
		return $query->result();
			
	}
	
	function category_list($pid=0){
		$sql = "SELECT * FROM p_category WHERE pid = $pid AND status = 'A' AND id <> $pid ";
		$query = $this->db->query($sql);
		$arr = array();
		foreach($query->result() as $rs){
			$rs->sub = $this->category_list($rs->id);
			$arr[] = $rs;
		}
		return $arr;
	}
	
	function get_category_name_byid($id){
		$sql = "SELECT * FROM p_category WHERE id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			return $ro->category;
		}
			return '';
	}
	
	function get_product_byid($id, $value=array()){
		
		$row->id = $id;
		$row->cat_id = '0';
		$row->title = '';
		$row->meta_key = '';
		$row->short_desc = '';
		$row->long_desc = '';
		$row->discount = '';
		$row->dis_val_type = '';
		$row->pstatus = 'I';
		
		if(count($value) > 0){
			$row->cat_id = $value['cat_id'];
			$row->title = $value['title'];
			$row->meta_key = $value['meta_key'];
			$row->short_desc = $value['short_desc'];
			$row->long_desc = $value['long_desc'];
		}
		$row->parent_category_list = $this->category_list();
		$sql = "SELECT * FROM p_product WHERE id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			$row->cat_id = $ro->cat_id;
			$row->title = $ro->title;
			$row->meta_key = $ro->meta_key;
			$row->short_desc = $ro->short_desc;
			$row->long_desc = $ro->long_desc;
			$row->discount = $ro->discount;
			$row->dis_val_type = $ro->dis_val_type;
			$row->stock_status = $this->product_stock_status($id, $row->stock_total);
			$row->pstatus = $ro->pstatus;
		}
		return $row; 
	}
	
	public function addedit_product_act($value, & $msg){
		$step = $value['step'];
		if($step==1){
			if($value['id'] > 0){
				$sql = "UPDATE p_product SET cat_id = '".$value['cat_id']."', title = '".$value['title']."', meta_key = '".$value['meta_key']."', short_desc = '".$value['short_desc']."', long_desc = '".$value['long_desc']."', configrable = '1' WHERE id = ".$value['id'];
				$query = $this->db->query($sql);
				$msg = "seccupd";
				return $value['id'];
			}else{
				$sql = "INSERT INTO p_product SET cat_id = '".$value['cat_id']."', title = '".$value['title']."', meta_key = '".$value['meta_key']."', short_desc = '".$value['short_desc']."', long_desc = '".$value['long_desc']."', configrable = '1' ";
				$query = $this->db->query($sql);
				$msg = "sav";
				return $this->db->insert_id();
			}
			
		}
		
	}
	
	function product_stock_status($id, & $total=0){
		$sql = "SELECT sum(qty) as qty FROM `p_product_price_qty` WHERE pro_id = ".$id;
		$query = $this->db->query($sql);
		foreach($query->result() as $ro){
			$qty = $ro->qty;
		}
		if($qty=='' || $qty==0){
			$total = 0;
			return 'Out of Stock';
		}else{
			$total = $qty;
			return 'In Stock';
		}
	}
	
	function product_imagelist_byid($id){
		
		$sql = "SELECT * FROM `p_product_img` WHERE pistatus = 'A' AND pro_id = ".$id;
		$query = $this->db->query($sql);
		
		return $query->result(); 
		
	}
	
	function product_image_upload_id($id){
		
		$img = $this->product_imagelist_byid($id);
		$default = 0;
		$flg = 0;
		if(count($img)==0){ $default = 1; }
		if(isset($_FILES['image']['tmp_name']) AND ($_FILES['image']['tmp_name']!="")) 
		{
			if (is_uploaded_file($_FILES['image']['tmp_name'])) 
			{
				
				$file_ext=explode(".",$_FILES['image']['name']);
				$file_type = strtolower($file_ext[count($file_ext)-1]);
				if (in_array($file_type ,array('jpg', 'jpeg', 'gif', 'png'))){
					$sql = "INSERT INTO `p_product_img` SET pro_id = '$id', `default` = '$default', `pistatus` = 'I'";
					$query = $this->db->query($sql);
					$img_id = $this->db->insert_id();
					$img_filename=strtolower("".$img_id."_product_img.".$file_type);
					$file_path = HEARD_PATH."product_img/".$img_filename;
					@move_uploaded_file($_FILES['image']['tmp_name'], $file_path);
					@unlink($_FILES['image']['tmp_name']);
					$sql = "UPDATE `p_product_img` SET `image` = '$img_filename' WHERE img_id = ".$img_id;
					$query = $this->db->query($sql);
					
					$thumb_file_path = HEARD_PATH."product_img/thumb/".$img_filename;
					
					$this->thumb->load($file_path);
				    $this->thumb->resizeToWidth(144);
					$this->thumb->save($thumb_file_path);
				    
					$flg = 1;
				}
				
			}
		}
		
		if($flg == 1){
			return true;
		}else{
			return false;
		}
		
	}
	
	function product_image_byid($id){
		
		$row->id = $id;
		$row->img_id = '0';
		$row->title = '';
		$row->meta_key = '';
		$row->short_desc = '';
		$row->long_desc = '';
		
		$row->parent_category_list = $this->category_list();
		
		$sql = "SELECT * FROM p_product WHERE id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			$row->cat_id = $ro->cat_id;
			$row->title = $ro->title;
			$row->meta_key = $ro->meta_key;
			$row->short_desc = $ro->short_desc;
			$row->long_desc = $ro->long_desc;;
		}
		
		return $row; 
		
	}
	
	function project_img_delete($img_id){
		$sql = "SELECT * FROM p_product_img WHERE img_id = $img_id";
		$query = $this->db->query($sql);
		$img = '';
		foreach($query->result() as $ro){
			$img = $ro->image;
		}
		$sql = "DELETE FROM p_product_img WHERE img_id = $img_id";
		$this->db->query($sql);
		if($img!=''){
			@unlink(HEARD_PATH."product_img/".$img);
			@unlink(HEARD_PATH."product_img/thumb/".$img);
		}
		
	}
	
	function project_img_activation($img_id){
		$sql = "UPDATE p_product_img SET pistatus = IF(pistatus='A','I','A') WHERE img_id = $img_id";
		$query = $this->db->query($sql);
	}	
	
	function project_img_gallery($img_id){
		$sql = "UPDATE p_product_img SET gallery = IF(gallery='0','1','0') WHERE img_id = $img_id";
		$query = $this->db->query($sql);
	}
	
	function project_img_default($id, $img_id){
		$sql = "UPDATE p_product_img SET `default` = '0' WHERE pro_id = $id";
		$query = $this->db->query($sql);
		$sql = "UPDATE p_product_img SET `default` = '1' WHERE img_id = $img_id";
		$query = $this->db->query($sql);
		/*$sql = "SELECT * FORM p_product_price_qty  WHERE image_id = $img_id";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			$sql = "UPDATE p_product_price_qty SET `set_default` = '0' WHERE pro_id = $id";
			$query = $this->db->query($sql);	
			$sql = "UPDATE p_product_price_qty SET `set_default` = '1' WHERE image_id = $img_id";
			$query = $this->db->query($sql);	
		}*/
			
	}
	
	function project_combination_default($id, $com_id){
		$sql = "UPDATE p_product_price_qty SET `set_default` = '0' WHERE pro_id = $id";
		$query = $this->db->query($sql);
		$sql = "UPDATE p_product_price_qty SET `set_default` = '1' WHERE id = $com_id";
		$query = $this->db->query($sql);
		/*$sql = "SELECT * FORM p_product_price_qty  WHERE id = $com_id";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			foreach($query->result() as $ro){
				$img_id = $ro->image_id
			}
			if($img_id > 0){
				$this->project_img_default($id, $img_id);
			}else{
				$sql = "UPDATE p_product_price_qty SET `set_default` = '0' WHERE pro_id = $id";
				$query = $this->db->query($sql);
				$sql = "UPDATE p_product_price_qty SET `set_default` = '1' WHERE id = $com_id";
				$query = $this->db->query($sql);
			}
		}*/
	}
	
	function project_combination_delete($com_id){
		$sql = "DELETE FROM p_product_price_qty WHERE id = $com_id";
		$query = $this->db->query($sql);
		$sql = "DELETE FROM p_product_atribute WHERE fid = $com_id";
		$query = $this->db->query($sql);
		
	}
	
	function product_priceqty_list_byid($id){
		$sql = "SELECT * FROM `p_product_price_qty` WHERE pro_id = ".$id;
		$query = $this->db->query($sql);
		$arr = array();
		$arr1 = array();
		foreach($query->result() as $ro){
			$arr1 = $ro;
		}
	}
	
	function product_sattings($value){
		$id = $value['id'];
		$discount = $value['num'];
		$dis_val_type = $value['att_val_type'];
		/*$sql = "UPDATE p_product SET `discount` = '$discount', `dis_val_type` = '$dis_val_type', `pstatus` = '$pstatus' WHERE id = $id";
		$query = $this->db->query($sql);*/
	}
	
	function get_product_v_attri_price_byid($id, $attr_id, & $oldprice=''){
		$pro = $this->get_product_byid($id);
		$discount = $pro->discount;
		$dis_val_type = $pro->dis_val_type;
		$sql = "SELECT * FROM `p_product_price_qty` WHERE pro_id = $id AND id = ".$attr_id;
		$query = $this->db->query($sql);
		foreach($query->result() as $ro){
			$oldprice = $ro->price;
		}
		if($discount=='' || $discount=='0'){
			return $oldprice;
		}else{
			if($dis_val_type=='P')
				return ($oldprice - ($oldprice * $discount)/100);
			else
				return ($oldprice - $discount);
		}
	}
	
	function get_product_w_attri_title_byids($id, $attr_id){
		$title = '';
		$pro = $this->get_product_byid($id);
		$title = $pro->title.' (Code-'.$pro->meta_key.') ';
		$sql = "SELECT ma.matr_name as attri_name, a.atribute as attri FROM 
				`p_product_atribute` pa, p_main_atribute ma, p_atribute a WHERE 
				pa.attr_mn_id = ma.id AND pa.attr_id = a.id AND pa.`prod_id` = $id AND pa.`fid` = $attr_id";
		$query = $this->db->query($sql);
		foreach($query->result() as $ro){
			$title.= $ro->attri_name.': '.$ro->attri.', ';
		}
		return $title;
	}
	
	function product_to_cart($value){
		$id = $value['id'];
		$num = $value['num'];
		$att_val_type = $value['att_val_type'];
		$value['a_id'] = $this->session->userdata('a_id');
		$a_id = $this->session->userdata('a_id');
		
		$sql = "UPDATE `p_product_price_qty` SET `qty` = if(`qty` >= $num, (`qty` - $num), `qty`)  WHERE `id` = $att_val_type";
		$this->db->query($sql);
		if($this->db->affected_rows() > 0){
			$sql = "SELECT * FROM `p_order_master` WHERE status = 'C' AND retailer_id = ".$a_id;
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0){
				foreach($query->result() as $row){
					$orderid = $row->id;
				}
			}else{
				$sql = "INSERT INTO `p_order_master` SET retailer_id = $a_id , o_date = NOW() ";
				$this->db->query($sql);
				$orderid = $this->db->insert_id();
			}
			
			
			$sql = "SELECT * FROM `p_order_item` WHERE status = 'C' AND order_id = $orderid AND pro_id = $id AND pro_attr_id = $att_val_type";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0){
				$this->db->query("UPDATE `p_order_item` SET `qty` = (`qty` + $num) WHERE order_id = $orderid AND pro_id = $id AND pro_attr_id = $att_val_type");
			}else{
				$this->db->query("INSERT INTO `p_order_item` SET `qty` = $num, order_id = $orderid, pro_id = $id, pro_attr_id = $att_val_type, ret_id = $a_id, uni_price = '".$this->get_product_v_attri_price_byid($id, $att_val_type)."', oi_date = NOW(), attr_title = '".$this->get_product_w_attri_title_byids($id, $att_val_type)."'");
			}
			$sql = "SELECT sum(uni_price * qty) as totPrice FROM `p_order_item` WHERE status = 'C' AND order_id = $orderid ";
			$query = $this->db->query($sql);
			foreach($query->result() as $row){
				$totPrice = $row->totPrice;
			}
			$sql = "UPDATE `p_order_master` SET total_price = $totPrice, o_date = NOW() WHERE id = $orderid ";
			$this->db->query($sql);
			return true;
		}else{
			return false;
		}
	}
	
	function product_qty_price_id($value, & $m=''){
		$id = $value['id'];
		$atri = $value['attr_mn_id'];
		$attr_id = $value['attr_id'];
		$flg = 1;
		$v = 1;
		$fid = '';
		for($i=0; $i<count($atri); $i++){
			$sql = "SELECT * FROM `p_product_atribute` WHERE prod_id = $id AND attr_mn_id = ".$atri[$i]." AND attr_id = ".$attr_id[$i];
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0){
				$flg = 0;
				foreach($query->result() as $ro){
					$fid = $ro->fid;
				}
			}
			if($attr_id[$i]=='0'){ $v = 0; }
		}
		if($v == 1){
			if($flg == 1){
				$sql = "INSERT INTO `p_product_price_qty` SET pro_id = $id, price = ".$value['price'].", qty = ".$value['qty']." ";
				$query = $this->db->query($sql);
				$config_id = $this->db->insert_id();
				for($i=0; $i<count($atri); $i++){
					$sql = "INSERT INTO `p_product_atribute` SET prod_id = $id, attr_mn_id = ".$atri[$i].", attr_id = ".$attr_id[$i].", fid = ".$config_id;
					$query = $this->db->query($sql);
				}
				$m = "";
			}else{
				$sql = "UPDATE `p_product_price_qty` SET price = ".$value['price'].", qty = (qty + ".$value['qty'].") WHERE id = $fid ";
				$query = $this->db->query($sql);
				$m = $value['qty']." Quantity Added, Record Updated";
			}
			return true;
		}else{
			return false;
		}
	}
	
	function product_qty_price_list($id){
		$sql = "SELECT * FROM `p_product_price_qty` WHERE qty > 0 AND pro_id = $id ";
		$query = $this->db->query($sql);
		$arr = array();
		$product_info = $this->get_product_byid($id);
		$arr1['combo_id'] = '';
		$arr1['product_id'] = '';
		$arr1['combo_price'] = '';
		$arr1['combo_stock'] = '';
		$arr1['image_id'] = '';
		$arr1['combination'] = '';
		$arr1['set_default'] = 0;
		foreach($query->result() as $ro){
			$arr1['combo_id'] = $ro->id;
			$arr1['product_id'] = $ro->pro_id;
			$arr1['combo_price_old'] = '';
			$arr1['combo_price'] = $ro->price;
			if($product_info->discount > 0){
				$arr1['combo_price_old'] = '<span style="text-decoration:line-through;">'.$arr1['combo_price'].'</span><br>';
				$dis_type = $product_info->dis_val_type;
				$dff = 0;
				if($dis_type=='V'){
					$arr1['combo_price'] = $arr1['combo_price'] - $product_info->discount;
				}else{
					$pr = $product_info->discount;
					$arr1['combo_price'] = $arr1['combo_price'] - (($product_info->discount * $arr1['combo_price'])/100);
				}
			}
			$arr1['combo_stock'] = $ro->qty;
			$arr1['image_id'] = $ro->image_id;
			$arr1['combination'] = '';
			$arr1['set_default'] = $ro->set_default;
			$sql = "SELECT * FROM `p_product_atribute` WHERE prod_id = $id AND fid = ".$ro->id." ";
			$query1 = $this->db->query($sql);
			foreach($query1->result() as $row){
				$attr_mn_id = $row->attr_mn_id;
				$attr_id = $row->attr_id;
				$que = $this->db->query("SELECT * FROM p_main_atribute WHERE id = ".$attr_mn_id);
				foreach($que->result() as $r){
					$arr1['combination'].= $r->matr_name.': ';
				}
				$que = $this->db->query("SELECT * FROM p_atribute WHERE id = ".$attr_id);
				foreach($que->result() as $r){
					$arr1['combination'].= $r->atribute.', ';
				}
			}
			//array_push($arr,$arr1);
			$arr[] = $arr1;
		}
		return $arr;
	}
	
} ?>