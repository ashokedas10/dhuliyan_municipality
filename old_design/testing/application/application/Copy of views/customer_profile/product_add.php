<!--Product Add/Edit-->
<script type="text/javascript">

var controller = 'cmscontaint';
var base_url = '<?php echo BASE_URL; //you have to load the "url_helper" to use this function ?>';	
function load_data_ajax(type)
{
//alert(type);
$.ajax({
	'url' : base_url + '/' + controller + '/load_data_ajax',
	'type' : 'POST', //the way you want to send data to your URL
	'data' : {'type' : type},
	'success' : function(data){ 
//probably this request will return anything, it'll be put in var "data"
var container = $('#container'); 
//jquery selector (get element by id)
//alert(data);
if(data){

container.html(data);
}
}
});
}

</script>
 <? $id=$this->session->userdata('id');	$name=$this->session->userdata('name');
	$sql1="SELECT * FROM `product` WHERE `seller_id`=$id"; 
	$list=$this->projectmodel->get_records_from_sql($sql1);	
?>
<?
		
		
		$product_del = BASE_URL."cmscontaint/delete_record_controller/";
		$product_addedit = BASE_URL.'cmscontaint/product_section/product/'; 
					
		$where_array = array('id >' => 0);
		$projectlist= $this->projectmodel->get_all_record('product',$where_array);
		
		$where_array = array('id >' => 0);
		$subcategorylist= $this->projectmodel->get_all_record('subcategory',$where_array);
		
		$where_array = array('id >' => 0);
		$category= $this->projectmodel->get_all_record('category',$where_array);
		
		$where_array = array('id >' => 0);
		$product_attribute_value= $this->projectmodel->get_all_record('product_attribute_value',$where_array);
		
		$where_array = array('id >' => 0);
		$brandlist= $this->projectmodel->get_all_record('brands',$where_array);
		
		$where_array = array('id >' => 0);
		$manufacturerlist= $this->projectmodel->get_all_record('manufacturer',$where_array);
?>
<?php

	/*CHANGE HERE*/
	
	$subcat_id='';
	$brand_id='';
	$product_name='';
	$details='';
	$image1='';
	$image2='';
	$image3='';
	$image4='';
	$qty='';
	$amount='';
	$discount='';
	$weight='';
	$status='';
	$product_code='';
	$manufacturer_id='';
	
	if(isset($productid))
	{
		if(count($records) > 0)
		{
			foreach ($records as $fld) 
			{ 
			
			/*CHANGE HERE*/
			$subcat_id=$fld->subcat_id;
			$brand_id=$fld->brand_id;
			$manufacturer_id=$fld->manufacturer_id;
			$product_name=$fld->product_name;
			$details=$fld->details;
			$image1=$fld->image1;
			$image2=$fld->image2;
			$image3=$fld->image3;
			$image4=$fld->image4;
			$qty=$fld->qty;
			$amount=$fld->amount;
			$discount=$fld->discount;
			$weight=$fld->weight;
			$status=$fld->status;
			$product_code=$fld->product_code;		
			
			}		
		}
	}
		
?>
<? $id=$this->session->userdata('id');	$name=$this->session->userdata('name'); ?>
<div>
<form id="frm" name="frm" method="post" 
action="<?php echo BASE_URL?>cmscontaint/product_section/product/addedit/"   enctype="multipart/form-data">
      
		  <input type="hidden" value="<?php echo $id; ?>" name="seller_id" id="seller_id">
		  <input type="hidden" value="<?php echo $this->uri->segment(5);  ?>" name="id" id="id">
		<!--  <input type="hidden" value="Receive" name="status" id="status">-->
		 		  
<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >

          
				  
          <tr>
            <td class="srscell-head-divider" colspan="4">Product  Details</td>
          </tr>
           
		   
		   <tr>
		   
            <td class="srscell-head-divider" >Category</td>
			
			<td class="srscell-head-divider" >
			
			<select id="subcat_id" data-rel="chosen" name="subcat_id" onchange="load_data_ajax(this.value)" >
			        <option value="">Select</option>
			   		<?php
					if(count($subcategorylist) > 0)
					{
						foreach ($subcategorylist as $row){ 						
					?>
					<option value="<?php echo $row->id; ?>" <?php if($row->id==$subcat_id) { echo 'selected="selected"'; } ?>><?php echo $row->subcat_name; ?></option>
			  
			  	 <?php }} ?>
		  	    </select>			</td>
			
			 <td class="srscell-head-divider" >Brand</td>
			
			 <td class="srscell-head-divider" >
			
			<select id="brand_id" data-rel="chosen" name="brand_id">
			        <option value="">Select</option>
			   		<?php
					if(count($brandlist) > 0)
					{
						foreach ($brandlist as $row){ 						
					?>
					<option value="<?php echo $row->id; ?>" <?php if($row->id==$brand_id) { echo 'selected="selected"'; } ?>>
					<?php echo $row->brand_name; ?>					</option>
			  
			  	 <?php }} ?>
		  	    </select>			</td>
          </tr> 
			
			
			<tr>
				  
				  <td class="srscell-body" colspan="4">
				<div id="container"></div>				  </td>
   			 </tr>
	
			
			
			
			
		   <tr>
		   
            <td class="srscell-head-divider" >Manufacturer</td>
			
			<td class="srscell-head-divider"  >
			
			<select id="manufacturer_id" data-rel="chosen" name="manufacturer_id">
			        <option value="">Select</option>
			   		<?php
					if(count($manufacturerlist) > 0)
					{
						foreach ($manufacturerlist as $row){ 						
					?>
					<option value="<?php echo $row->id; ?>" <?php if($row->id==$manufacturer_id) { echo 'selected="selected"'; } ?>><?php echo $row->manufac_name; ?></option>
			  
			  	 <?php }} ?>
		  	    </select>			</td>
			<td class="srscell-head-divider" ></td>
			<td class="srscell-head-divider" ></td>
          </tr> 

					
			<tr>
              
			  <td width="17%" class="srscell-head-lft">Product_Name</td>
              <td width="24%" class="srscell-body">
		  	  <input type="text" id="product_name" class="srs-txt"
			  value="<?php echo $product_name; ?>" name="product_name" />			  </td>
			  
			   <td width="17%" class="srscell-head-lft">Product_Code</td>
              <td width="24%" class="srscell-body"><input type="text" id="product_code" class="srs-txt"
			  value="<?php echo $product_code; ?>" name="product_code" /></td>
            </tr>
			<tr>
              
			  <td class="srscell-head-lft">image 1</td>
              <td class="srscell-body"><input type="file" name="image1" value=""></td>
			  
			  <td width="12%" class="srscell-head-lft">image 2</td>
              <td width="47%" class="srscell-body">
			 <input type="file" name="image2" value=""></td>
            </tr>
			<tr>
              
			  <td class="srscell-head-lft">image 3</td>
              <td class="srscell-body">
			  <input type="file" name="image3" value=""></td>
			  
			  <td width="12%" class="srscell-head-lft">image 4</td>
              <td width="47%" class="srscell-body">
			  <input type="file" name="image4" value="">			  </td>
            </tr>			
						
			<tr>
				  <td class="srscell-head-lft">qty</td>
				  <td class="srscell-body">
					 <input type="text" id="qty" class="srs-txt"
					 value="<?php echo $qty; ?>" name="qty" />				  </td>
				  
				  <td class="srscell-head-lft">amount</td>
				  <td class="srscell-body">
					 <input type="text" id="amount" class="srs-txt"
					 value="<?php echo $amount; ?>" name="amount" />				  </td>
   			 </tr>
			 
			 <tr>
				  <td class="srscell-head-lft">discount</td>
				  <td class="srscell-body">
					 <input type="text" id="discount" class="srs-txt"
					 value="<?php echo $discount; ?>" name="discount" />				  </td>
				  
				  <td class="srscell-head-lft">weight</td>
				  <td class="srscell-body">
					 <input type="text" id="weight" class="srs-txt"
					 value="<?php echo $weight; ?>" name="weight" />				  </td>
   			 </tr>
			 			
			<tr>
			 <td width="12%" class="srscell-head-lft">Description</td>
              <td  class="srscell-body" colspan="3">
			  <?php /*?>	 <input type="text" id="details" class="srs-txt"
			  value="<?php echo $details	; ?>" name="details" />
			  <?php echo display_ckeditor($ckeditor); ?><?php */?>
			  
			  <textarea name="details" id="details" rows="15" cols="65" ><?php echo $details; ?></textarea>
				<?php //echo display_ckeditor($ckeditor); ?>			  </td>
			</tr>
			
			 
			 <?php /*?><tr> 			  
			  <td class="srscell-head-lft">Status</td>
              <td class="srscell-body" colspan="3">
			  	<select id="status" name="status">
				 <option value="Active"  selected="selected">Active</option>
				 <option value="Active" 
				 <?php if($status=='Active') { echo 'selected="selected"'; } ?>>
				 Active</option>
				 <option value="InActive" <?php if($status=='InActive') { echo 'selected="selected"'; } ?>>
				 InActive</option>
			 	</select>			  </td>
            </tr><?php */?>
						
			<tr class="alt1">
              <td valign="top" align="center" colspan="4" class="leftBarText"> 
			  <input type="submit" class="btn btn-green" 
			  value="Save" id="Save" name="Save" 
			  onClick="return confirm('Do you want to save this Record ?');"/> 
			  			  
			  <?php /*?>
			  <input name="Print" type="button" value="Print" class="btn btn-green" 
			  onclick="popup('<?php 
			  $url='../../../../../../project_controller/builtyprint_function/builty_print/tbl_builty/list/'.$this->uri->segment(6).'/';
			  echo $url; ?>')"
			  />		
			  <?php */?>			  </td>
            </tr>
			
          </tbody>
  </table>
</form></div>


<!--Product listing-->


<div>
                    <table >
				<thead>
						<tr>
							<th width="55">Sl No</th>
							<th width="160">P.Name</th>
							<th width="160">P.Code</th>
							<th width="160">amount</th>
							<th width="81">Category</th>
							<th width="160">Picture</th>
							<th width="81"> Order </th>
							<th width="67">Action</th>
							
						</tr>
					</thead>	
				<tbody>
						<?php
						if(count($list) > 0){
						$i = 1;
						$picpath=BASE_PATH_ADMIN.'uploads/products/';
						foreach ($list as $row){
							$alt = ($i%2==0)?'alt1':'alt2';
						?>
					
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">
						
							<td><?php echo $i; ?></td>
							<td><?php echo $row->product_name; ?></td>
							<td><?php echo $row->product_code; ?></td>
							<td><?php echo $row->amount; ?></td>
							
							<td>
							<?php 
							$sql="select subcat_name from subcategory where id=".$row->subcat_id." ";
							$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
							foreach ($rowrecord as $row1){ echo $row1->subcat_name; }
							 ?>
							 </td>
							<td>
							<img src="<?php echo $picpath.$row->image1; ?>" 
							width="100" height="100"/>
							</td>
							<td><?php //echo $row->subcat_sort_order; ?></td>
									
							<td class="center"> 
					 
					 <a href="<?php echo $product_addedit.'addeditview/'.$row->id.'/'; ?>">
					 <img width="16" height="16" border="0" alt="View" src="<?php echo base_url()?>
					 theme_files/images/edit.gif">
					 </a>
					 
					  <a onClick="return confirm('Would You Like To Delete This Page ?');" 
					  href="<?php echo $product_addedit.'del/'.$row->id.'/'; ?>">
					  <img width="16" height="16" border="0" alt="Delete" 
					  src="<?php echo base_url()?>theme_files/images/drop.gif">
					  </a>
			  
			  				</td>											
							</tr>
				
				
				<?php 
				$i++;	
				}
				}
				?>		
				
					</tbody>
					</table>

</div>