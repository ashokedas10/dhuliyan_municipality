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
 <h2><span class="tcat">Category Section  </span></h2>   			
<p align="center"><span class="style1">
<?php echo $this->session->userdata('alert_msg'); ?></span></p>

  <div class="block">
                    <table width="469" class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="55">Sl No</th>
							<th width="160">Category Name  </th>
							<th width="81">Cat Tag/Order </th>				
							<th width="81">Status </th>							
							<th width="67">Action</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
					if(count($projectlist) > 0){
					$i = 1;
					foreach ($projectlist as $row){
						$alt = ($i%2==0)?'alt1':'alt2';
					?>
					
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">
							<td><?php echo $i; ?></td>
							<td><?php echo strtoupper($row->cat_name); ?></td>
							<td><?php echo strtoupper($row->titletag); ?></td>
							<td><?php echo strtoupper($row->status); ?></td>
																				
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


<!--data table end-->


 
<?php

	/*CHANGE HERE*/
	$cat_name='';
	$catdesc='';
	/*$cat_sort_order='';
	$cat_image='';*/
	$titletag='';
	$titledesc='';
	$titlekey='';
	$status='';
	/*$main_category='';*/
	
	if($productid>0)
	{
		if(count($records) > 0)
		{
			foreach ($records as $fld) 
			{ 
			/*CHANGE HERE*/
			$cat_name=$fld->cat_name;
			$catdesc=$fld->catdesc;
			/*$cat_sort_order=$fld->cat_sort_order;
			$cat_image=$fld->cat_image;*/
			$titletag=$fld->titletag;
			$titledesc=$fld->titledesc;
			$titlekey=$fld->titlekey;
			$status=$fld->status;
			/*$main_category=$fld->main_category;*/
			
			}		
		}
	}
		
?>

<form id="frm" name="frm" method="post" 
action="<?php echo ADMIN_BASE_URL?>project_controller/category_section/categoryview/category/addedit/" >
      
		  <input type="hidden" value="<?php echo $this->uri->segment(6); ?>" 
		  name="id" id="id">
		<!--  <input type="hidden" value="Receive" name="status" id="status">-->
		 		  
<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >
<tr><td class="srscell-head-divider" colspan="4">Category Details</td></tr>	
<tr>
	<td class="srscell-head-lft"><span class="srscell-head-divider">Category</span> Name </td>
    <td class="srscell-body"><input type="text" id="cat_name" class="srs-txt" value="<?php echo $cat_name; ?>" name="cat_name" /></td>
	<td width="20%" class="srscell-head-lft">Description</td>
    <td width="29%" class="srscell-body"><input type="text" id="catdesc" class="srs-txt" value="<?php echo $catdesc; ?>" name="catdesc" /></td>
</tr>
<tr>
	<td class="srscell-head-lft">Title Tag</td>
    <td class="srscell-body"><input type="text" id="titletag" class="srs-txt" value="<?php echo $titletag; ?>" name="titletag" /></td>
	<td width="20%" class="srscell-head-lft">Title Description</td>
	<td width="29%" class="srscell-body"><input type="text" id="titledesc" class="srs-txt" value="<?php echo $titledesc; ?>" name="titledesc" /></td>
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
	</td>
</tr>
<tr class="alt1">
	<td valign="top" align="center" colspan="2" class="leftBarText"><input type="submit" class="btn btn-green" value="Save" id="Save" name="Save" onClick="return confirm('Do you want to save this Record ?');"/></td>
</tr>
</table>
</form>

