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
 <h2><span class="tcat">SUB CATAGORY</span></h2>
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
							<th width="160">Subcatagory  </th>
							<th width="60">Pic</th>
							<th width="80">catagory</th>
							<th width="40">title Descryption</th>
							<th width="40">Status</th>
							<th width="67">Action</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						if(count($subcatlist) > 0){
						$picpath=BASE_PATH_ADMIN.'uploads/subcat/';
						$i = 1;
						foreach ($subcatlist as $row){
							$alt = ($i%2==0)?'alt1':'alt2';
						?>					
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">					
							<td><?php echo $i; ?></td>
							<td><?php echo strtoupper($row->subcat_name); ?></td>		
		<td><?php if($row->Image!=''){?><img src="<?php echo $picpath.$row->Image; ?>" width="50" height="50"/><?php } ?></td>					
		<td><?php foreach ($category as $r){if($row->cat_id==$r->id){echo strtoupper($r->cat_name); }} ?></td>
							<td><?php echo strtoupper($row->titledesc); ?></td>
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
</div>
<?php
	$cat_id='';
	$subcat_name='';
	$catdesc='';
	$titletag='';
	$titledesc='';
	$titlekey='';
	$status='';	
				
	if($productid>0)	{
		if(count($records) > 0)		{
			foreach ($records as $fld) 		{ 
				$cat_id=$fld->cat_id;
				$subcat_name=$fld->subcat_name;
				$catdesc=$fld->catdesc;
				$titletag=$fld->titletag;
				$titledesc=$fld->titledesc;
				$titlekey=$fld->titlekey;
				$status=$fld->status;
			}		
		}
	}		
?>  

<form id="frm" name="frm" method="post" 
action="<?php echo ADMIN_BASE_URL?>project_controller/sub_cat_section/subcat_view/subcategory/addedit/"   enctype="multipart/form-data">
		  <input type="hidden" value="<?php echo $this->uri->segment(6); ?>" name="id" id="id">
<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >
<tr><td class="srscell-head-divider" colspan="4">SUB CATAGORY</td></tr> 
<tr>              
	<td width="17%" class="srscell-head-lft">Sub Catagoty Title</td>
    <td width="24%" class="srscell-body"><input type="text" name="subcat_name" id="subcat_name" class="srs-txt" value="<?php echo $subcat_name; ?>" /></td>
	<td class="srscell-head-divider" >Catagory</td>
	<td class="srscell-head-divider" colspan="2">			
			<select id="cat_id" data-rel="chosen" name="cat_id"  >
			        <option value="">Select</option>
		<?php if(count($category) > 0){foreach ($category as $row){ ?>
<option value="<?php echo $row->id; ?>" <?php if($row->id==$cat_id) { echo 'selected="selected"'; } ?>><?php echo strtoupper ($row->cat_name); ?></option>			  
			  	 <?php }} ?>
		  	</select></td>
</tr>
<tr>			  
   <td width="17%" class="srscell-head-lft">Title Key</td>
   <td width="24%" class="srscell-body"><input type="text" id="titlekey" class="srs-txt" value="<?php echo $titlekey; ?>" name="titlekey" /></td>
</tr>
<tr>						
	<td class="srscell-head-lft">Field Description</td>
    <td class="srscell-body"><input type="text" id="catdesc" name="catdesc" value="<?php echo $catdesc; ?>"></td>			  
	<td class="srscell-head-lft">Title Tag</td>
    <td class="srscell-body"><input type="text" id="titletag" name="titletag" value="<?php echo $titletag; ?>"></td>       
</tr>
<tr>              
	<td width="17%" class="srscell-head-lft">Image</td>
    <td width="24%" class="srscell-body"><input type="file" id="Image" name="Image" value=""></td>
    <td class="srscell-body" colspan="2"></td>
</tr>
<tr> 			  
	<td class="srscell-head-lft">Status</td>
    <td class="srscell-body" colspan="3">
	<select id="status" name="status">
		<option value="Active"  selected="selected">Active</option>
		<option value="Active" <?php if($status=='Active') { echo 'selected="selected"'; } ?>>Active</option>
		<option value="InActive" <?php if($status=='InActive') { echo 'selected="selected"'; } ?>>InActive</option>
	</select>			  
	</td>
</tr>
		
			<tr class="alt1">
              <td valign="top" align="center" colspan="4" class="leftBarText"> 
			  <input type="submit" class="btn btn-green" 
			  value="Save" id="Save" name="Save" 
			  onClick="return confirm('Do you want to save this Record ?');"/> 
			  </td>
            </tr>
  </table>
</form>

 
