<script type="text/javascript">

var controller = 'cmscontaint';
var base_url = '<?php echo BASE_URL; //you have to load the "url_helper" to use this function ?>';	

			function load_data_ajax(type)
			{
			
			var attr_val_id='0';
			<?php 
			
			$subcatid=$this->uri->segment(7);
			$sql_attribute="select * from attribute_table where subcategory_id='$subcatid'";
			$product_attribute = $this->projectmodel->get_records_from_sql($sql_attribute);	
			
			foreach ($product_attribute as $row){ 
			$attributeId=$row->id;
			$sqlAttributeValue="select * from product_attribute_value 
			where attribute_table_id IN (SELECT id FROM attribute_table WHERE id= '$attributeId')";
			$attribute_value = $this->projectmodel->get_records_from_sql($sqlAttributeValue);	
			
			foreach ($attribute_value as $rowval){
			$attr_val_id=$rowval->id;
			?>
			 if (document.getElementById(<?php echo $attr_val_id ?>).checked) {
			attr_val_id=attr_val_id+','+<?php echo $attr_val_id; ?>;
			}
			
			<?php } } ?>
			
			//alert(attr_val_id);
			
						
                $.ajax({
                    'url' : base_url + '/' + controller + '/product_listing_ajax',
                    'type' : 'POST', //the way you want to send data to your URL
                    'data' : {'type' : attr_val_id},
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






<?php 
$subcatid=$this->uri->segment(7);
$sql_attribute="select * from attribute_table where subcategory_id='$subcatid'";
$product_attribute = $this->projectmodel->get_records_from_sql($sql_attribute);	


	
?>


<div id="bodyWrapper">
<div id="bodyContainer">
<div class="proTop">

<!--LEFT CATEGORY/ATTRIBUTE-->

<div class="leftArea">
<div class="categoryTable">
<div class="categoryHead">Filter List</div>
<? foreach ($product_attribute as $row){ ?>

		<div class="categoryBody">
			<h2><? echo " ".$row->field_name."  "; ?></h2>
			<ul>
			<? 
				$field_type=$row->field_type;
				$attributeId=$row->id;
				$sqlAttributeValue="select * from product_attribute_value 
				where attribute_table_id IN (SELECT id FROM attribute_table WHERE id= '$attributeId')";
				$attribute_value = $this->projectmodel->get_records_from_sql($sqlAttributeValue);	
				foreach ($attribute_value as $rowval){
				
				$attr_val_id=$rowval->id;
				$attribute_value=$rowval->attribute_value;
				
			?> 
			
			<input name="<?php echo $attr_val_id; ?>" id="<?php echo $attr_val_id; ?>" 
			type="<?php echo $field_type; ?>" value="<?php echo $attr_val_id; ?>" 
			onchange="load_data_ajax(this.value)"/><?php echo $attribute_value; ?>
			<br />
			
			<? } ?>	
				<br class="clear" /> 
			</ul>
		</div>
<?  }  ?>
</div>
</div>

<!--LEFT CATEGORY/ATTRIBUTE-->

<div class="rightArea">
<div class="scrolArea">

<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/picture2.jpg" style="border: 0px none; opacity: 1;" id="blendimage" alt="" class="reflect">	

	   
</div>
<div class="scrollBottom">
<div class="proList">
<h2> Products</h2>

<p>&nbsp;</p>
<div id="container"></div>

<?php /*?><table width="200"  cellpadding="0" cellspacing="0">
<?php
		
		
		$sql1="SELECT * FROM product";
		$product_list12 = $this->projectmodel->get_records_from_sql($sql1);	
		
		// category
		if($this->uri->segment(5)<>0)
		{
		$catid=$this->uri->segment(5);
		$sql1="SELECT * FROM product
						WHERE subcat_id
						IN ( 
						SELECT id
						FROM subcategory
						WHERE category_id='$catid' 
						)  ";
		$product_list12 = $this->projectmodel->get_records_from_sql($sql1);	
		}
		
		if($this->uri->segment(7)<>0)
		{
		$catid=$this->uri->segment(5);
		$subcatid=$this->uri->segment(7);
		$sql1="SELECT * FROM product WHERE subcat_id='$subcatid' ";
		$product_list12= $this->projectmodel->get_records_from_sql($sql1);	
		}
		
		if($this->uri->segment(9)<>0)
		{
		$catid=$this->uri->segment(5);
		$subcatid=$this->uri->segment(7);
		$brandid=$this->uri->segment(9);
		
		$sql1="SELECT * FROM product
						WHERE subcat_id
						IN ( 
						SELECT id
						FROM subcategory
						WHERE category_id='$catid' 
						) and brand_id='$brandid'  ";
		$product_list12=$this->projectmodel->get_records_from_sql($sql1);	
		}
		
	if(count($product_list12) > 0){
	$picpath=BASE_PATH_ADMIN.'uploads/products/';
	$i=1;
	foreach ($product_list12 as $row){
	
?>
<div class="proListInner">

<?php if($i==1) { echo '<tr><td>';  ?>
    <div class="proListBox">
<a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
<div class="proListBoxImage">
<img src="<?php echo  $picpath.$row->image1; ?>" alt="image" width="200" height="200"/>
</div>
<div class="proListBoxText">

<div class="proListBoxTextTop"><?php echo $row->product_name; ?></div>
<div class="proListBoxTextBottom"><?php echo 'Code:'.$row->product_code; ?></div>
<div class="proListBoxTextBottom">Rs.<?php echo $row->amount; ?></div>
</div>
</a>
<a href="<?php echo BASE_URL?>
cmscontaint/add_item_cart/product_listing/<?php echo $row->id; ?>/
<?php echo $this->uri->segment(5); ?>/
<?php echo $this->uri->segment(7); ?>/<?php echo $this->uri->segment(9); ?>">
<div class="proListCart">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
</div>
</a>
</div>
<?php echo '</td>';  } ?>

<?php if($i==2) { echo '<td>';  ?>
<div class="proListBox">
<a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
<div class="proListBoxImage">
<img src="<?php echo  $picpath.$row->image1; ?>" alt="image" width="200" height="200"/>
</div>
<div class="proListBoxText">
<div class="proListBoxTextTop"><?php echo $row->product_name; ?></div>
<div class="proListBoxTextBottom"><?php echo 'Code:'.$row->product_code; ?></div>
<div class="proListBoxTextBottom">Rs.<?php echo $row->amount; ?></div>
</div>
</a>
<a href="<?php echo BASE_URL?>
cmscontaint/add_item_cart/product_listing/<?php echo $row->id; ?>/
<?php echo $this->uri->segment(5); ?>/
<?php echo $this->uri->segment(7); ?>/<?php echo $this->uri->segment(9); ?>">
<div class="proListCart">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
</div>
</a>
</div>
<?php echo '</td>'; } ?>

<?php if($i==3) { echo '<td>';   ?>
<div class="proListBox last">
<a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
<div class="proListBoxImage">
<img src="<?php echo  $picpath.$row->image1; ?>" alt="image" width="200" height="200"/>
</div>
<div class="proListBoxText">
<div class="proListBoxTextTop"><?php echo $row->product_name; ?></div>
<div class="proListBoxTextBottom"><?php echo 'Code:'.$row->product_code; ?></div>
<div class="proListBoxTextBottom">Rs.<?php echo $row->amount; ?></div>
</div>
</a>
<a href="#">
<div class="proListCart">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
</div>
</a>

</div>
<?php echo '</td></tr>'; $i=0; }  ?>

</div>


<?php $i=$i+1; }} ?>
</table>
<?php */?>

<div id="container"></div>

<?php //echo $this->pagination->create_links();?>
</div>

<br class="clear" />
</div>
</div>
</div>
<br class="clear" />
</div>
<div class="bottomLogo"></div>
</div>
</div>