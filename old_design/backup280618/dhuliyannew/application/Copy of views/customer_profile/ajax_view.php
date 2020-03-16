<?php foreach($subcatagory_id as $row1) { 
	$subcatid= $row1->id;
	$sql="SELECT * FROM attribute_table WHERE subcategory_id=".$subcatid;
	 $rowrecord = $this->projectmodel->get_records_from_sql($sql);			
	 ?>
	 
	 
	 <?php 
	 foreach ($rowrecord as $row2)
	 {
	 
		/* $attribute_id=$row2->id;
		$sql2="SELECT * FROM product_attribute_value WHERE subcategory_id=".$attribute_id;
	 	$rowrecord2 = $this->projectmodel->get_records_from_sql($sql2);	
		
	 		foreach ($rowrecord2 as $row2)
	 		{ */
	 ?>
	<tr>
		<td  class="srscell-head-lft"><? echo $row2->field_name."<br>"; ?></td>
		<td  class="srscell-body">
		<input type="text" id="<? echo $row2->id; ?>" class="srs-txt" value="" name="<? echo $row2->id; ?>" />
		
   	</tr>
	 			
	 	<? echo $row2->field_name."<br>"; ?> 
  
<?php } ?>
	 <?
	}?>
	