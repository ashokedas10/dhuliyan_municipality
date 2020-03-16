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
.style1 {color: #CC3300;font-weight: bold;font-size: 14px;}
-->
</style>
 <h2><span class="tcat">Banner Section  </span></h2>
  <div class="block">
                    <table width="469" class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="55">Sl No</th>
							<th width="160">Subcat Type </th>
							<th width="81">Pic</th>
							<th width="81">Status</th>
							<th width="67">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(count($bannerlist) > 0){
						$i = 1;
						$picpath=BASE_PATH_ADMIN.'uploads/banner/';
						foreach ($bannerlist as $row){
							$alt = ($i%2==0)?'alt1':'alt2';
						?>
					
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">
						
							<td><?php echo $i; ?></td>
							<?php 
							foreach ($subcategorylist as $subcat){
								if($subcat->id==$row->subcat_id){
							?>
							<td><?php echo strtoupper($subcat->subcat_name); ?></td>
							<?php }} ?>
							<td><img src="<?php echo $picpath.$row->images; ?>" width="100" height="50"/></td>
							<td><?php echo $row->status; ?></td>				
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
	/*CHANGE HERE*/
	$images='';
	$status='';
	$subcat_id='';
	$bannertext='';	
	
	if($productid>0){
		if(count($records) > 0){
			foreach ($records as $fld){ 			
			/*CHANGE HERE*/
			$images=$fld->images;
			$status=$fld->status;
			$subcat_id=$fld->subcat_id;
			$bannertext=$fld->bannertext;			
			}		
		}
	}		
?>

<form id="frm" name="frm" method="post" 
action="<?php echo ADMIN_BASE_URL?>project_controller/gallery_section/banner_view/banner/addedit/" enctype="multipart/form-data">
		  <input type="hidden" value="<?php echo $this->uri->segment(6); ?>" name="id" id="id">
<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >
<tr><td class="srscell-head-divider" colspan="5">Banner Details</td></tr> 
<tr>              
	<td width="17%" class="srscell-head-lft">Image</td>
    <td width="24%" class="srscell-body"><input type="file" id="images" name="images" value=""></td> 
	<td width="17%" class="srscell-head-divider" >Type</td>
	<td width="24%" class="srscell-head-divider" colspan="2">			
			<select id="subcat_id" data-rel="chosen" name="subcat_id"  >
			        <option value="">Select</option>
		<?php if(count($subcategorylist) > 0){foreach ($subcategorylist as $row){ ?>
<option value="<?php echo $row->id; ?>" <?php if($row->id==$subcat_id) { echo 'selected="selected"'; } ?>><?php echo strtoupper ($row->subcat_name); ?></option>			  
			  	 <?php }} ?>
		  	</select></td>
</tr>
<tr>						  
   <td width="17%" class="srscell-head-lft">Details</td>
   <td width="24%" class="srscell-body"><input type="text" id="bannertext" class="srs-txt" value="<?php echo $bannertext; ?>" name="bannertext" /></td>
</tr>
			 <tr> 			  
			  <td class="srscell-head-lft">Status</td>
              <td class="srscell-body" colspan="5">
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
