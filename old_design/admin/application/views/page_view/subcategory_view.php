<!--jquery all -->

<script>
  
  $(function() {
    var availableTags = [<?php
	if(count($vendorlist) > 0)
	{
		foreach ($vendorlist as $row){ 
		echo '"'.$row->party_name.'",'; }
	}	
	?>
    ];
    $( "#tbl_party_id" ).autocomplete({
      source: availableTags
    });
  });
    
  
  </script>
    
<!--jquery all -->

<!--data table start-->
<style type="text/css">
<!--
.style1 {
	color: #CC3300;
	font-weight: bold;
	font-size: 14px;
}
-->
</style>
 <h2><span class="tcat">Sub Category Section  </span></h2>
 <?php /*?><a href="<?php echo $product_addedit.'0'; ?>">
 <button class="btn btn-green">Add New Purchase </button>
 </a><?php */?>
   			
<p align="center"><span class="style1">
<?php echo $this->session->userdata('alert_msg'); ?></span></p>

  <div class="block">
                    <table width="469" class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="55">Sl No</th>
							<th width="160">Sub-Category Name  </th>
							<th width="81">Category</th>
							<th width="81"> Status </th>
							<th width="67">Action</th>
							
						</tr>
					</thead>
					
					<tbody>
						<?php
						if(count($subcatlist) > 0){
						$i = 1;
						foreach ($subcatlist as $row){
							$alt = ($i%2==0)?'alt1':'alt2';
						?>
					
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">
						
							<td><?php echo $i; ?></td>
							<td><?php echo strtoupper($row->subcat_name); ?></td>
							
							
							<?php 
							foreach ($catlist as $subcat){
								if($subcat->id==$row->cat_id){
							?>
							<td><?php echo strtoupper($subcat->cat_name); ?></td>
							<?php }} ?>
							<td><?php  echo strtoupper($row->status); ?></td>																				
							<td class="center"> 
					 
					 <a href="<?php echo $product_addedit.'addeditview/'.$row->id.'/'; ?>">
					 <img width="16" height="16" border="0" alt="View" src="<?php echo base_url()?>
					 theme_files/img/edit.gif">
					 </a>
	
					  <a onClick="return confirm('Would You Like To Delete This Page ?');" 
					  href="<?php echo $product_addedit.'del/'.$row->id.'/'; ?>">
					  <img width="16" height="16" border="0" alt="Delete" 
					  src="<?php echo base_url()?>theme_files/img/drop.gif">
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
<?php /*?>Pagination : <?php echo $this->pagination->create_links();?><?php */?>
</div>



 
<?php

	/*CHANGE HERE*/
	$category_id='';
	$subcat_name='';
	$catdesc='';
	$subcat_sort_order='';
	$subcat_image='';
	$titletag='';
	$titledesc='';
	$titlekey='';
	$status='';
	
	if($productid>0)
	{
		if(count($records) > 0)
		{
			foreach ($records as $fld) 
			{ 
			
			/*CHANGE HERE*/
			$category_id=$fld->cat_id;
			$subcat_name=$fld->subcat_name;
			$catdesc=$fld->catdesc;
			//$subcat_sort_order=$fld->subcat_sort_order;
			//$subcat_image=$fld->subcat_image;
			$titletag=$fld->titletag;
			$titledesc=$fld->titledesc;
			$titlekey=$fld->titlekey;
			$status=$fld->status;
			
			}		
		}
	}
		
?>
 
<form id="frm" name="frm" method="post" action="<?php echo ADMIN_BASE_URL?>project_controller/sub_category_section/subcategory_view/subcategory/addedit/" >
<input type="hidden" value="<?php echo $this->uri->segment(6); ?>" name="id" id="id">
<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >
<tr><td class="srscell-head-divider" colspan="4">Sub Category  Details</td></tr>
<tr>
<td class="srscell-head-divider" colspan="2">Category</td>
<td class="srscell-head-divider" colspan="2">			
			<select id="category_id" data-rel="chosen" name="category_id">
			        <option value="">Select</option>
			   		<?php
					if(count($catlist) > 0){foreach ($catlist as $row){ 						
					?>
<option value="<?php echo $row->id; ?>"<?php if($row->id==$category_id) { echo 'selected="selected"'; } ?>><?php echo strtoupper ($row->cat_name); ?></option>
			  	 <?php }} ?>
		  	    </select>
</td></tr> 
<tr>
<td width="17%" class="srscell-head-lft"><span class="srscell-head-divider">Sub Category Name</span></td>
<td width="24%" class="srscell-body"><input type="text" id="subcat_name" class="srs-txt" value="<?php echo $subcat_name; ?>" name="subcat_name" /></td>
<td width="12%" class="srscell-head-lft">Description</td>
<td width="47%" class="srscell-body"><input type="text" id="catdesc" class="srs-txt" value="<?php echo $catdesc; ?>" name="catdesc" /></td>
</tr>
<tr>
<td class="srscell-head-lft">Title Tag</td>
<td class="srscell-body"><input type="text" id="titletag" class="srs-txt" value="<?php echo $titletag; ?>" name="titletag" /></td>
<td width="12%" class="srscell-head-lft">Title Description</td>
<td width="47%" class="srscell-body"><input type="text" id="titledesc" class="srs-txt"value="<?php echo $titledesc; ?>" name="titledesc" /></td>
</tr>							
<tr>
<td class="srscell-head-lft">Title Key </td>
<td class="srscell-body"><input type="text" id="titlekey" class="srs-txt" value="<?php echo $titlekey; ?>" name="titlekey" /></td>
<td class="srscell-head-lft">Status</td>
<td class="srscell-body">
			  	<select id="status" name="status">
				 <option value="Active"  selected="selected">Active</option>
				 <option value="Active" <?php if($status=='Active') { echo 'selected="selected"'; } ?>>
				 Active</option>
				 <option value="InActive" <?php if($status=='InActive') { echo 'selected="selected"'; } ?>>
				 InActive</option>
			 	</select>
</td></tr>
<tr class="alt1"><td valign="top" align="center" colspan="2" class="leftBarText"><input type="submit" class="btn btn-green" value="Save" id="Save" name="Save" onClick="return confirm('Do you want to save this Record ?');"/></td></tr>
  </table>
</form>


