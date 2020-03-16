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
<h2><span class="tcat">Service Section  </span></h2>
<p align="center"><span class="style1">
<?php echo $this->session->userdata('alert_msg'); ?></span></p>
  <div class="block">
                    <table width="469" class="data display datatable" id="example">
					<thead>
						<tr> 
							<th>Sl No</th>
							<th>Title  </th>
							<th>Depertment</th>
							<th> images </th>
							<th> document </th>
							<th>status</th>
							<th>Action</th>
							
						</tr>
					</thead>					
					<tbody>
						<?php
						if(count($servicelist) > 0){
						$i = 1;
						$picpath=BASE_PATH_ADMIN.'uploads/service/';
						foreach ($servicelist as $row){
							$alt = ($i%2==0)?'alt1':'alt2';
						?>
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">					
							<td><?php echo $i; ?></td>
							<td><?php echo strtoupper($row->title); ?></td>
			<td><?php foreach ($subcategorylist as $subcat){if($subcat->id==$row->SubCatId){echo strtoupper($subcat->subcat_name); }} ?></td>
			<td><?php if($row->images!=''){ ?><img src="<?php echo $picpath.$row->images; ?>" width="50" height="50"/><?php } ?></td>
			<td><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?></td>
							<td><?php  echo strtoupper($row->status); ?></td>																				
							<td class="center"> 					 
					 <a href="<?php echo $product_addedit.'addeditview/'.$row->id.'/'; ?>">
					 <img width="16" height="16" border="0" alt="View" src="<?php echo base_url()?>
					 theme_files/img/edit.gif"></a>
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
	$title='';
	$details='';
	$SubCatId='';
	$images='';
	$status='';
				
	if($productid>0)	{
		if(count($records) > 0)		{
			foreach ($records as $fld) 		{ 
				$title=$fld->title;
				$details=$fld->details;
				$SubCatId=$fld->SubCatId;
				$images=$fld->images;
				$status=$fld->status;
			}		
		}
	}		
?>  

<form id="frm" name="frm" method="post" 
action="<?php echo ADMIN_BASE_URL?>project_controller/service_section/service_view/service/addedit/" enctype="multipart/form-data">
		  <input type="hidden" value="<?php echo $this->uri->segment(6); ?>" name="id" id="id">
<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >
<tr><td class="srscell-head-divider" colspan="4">Service Section</td></tr> 
<tr>              
	<td width="17%" class="srscell-head-lft">Title</td>
    <td width="24%" class="srscell-body"><input type="text" name="title" id="title" class="srs-txt" value="<?php echo $title; ?>" /></td>
	<td class="srscell-head-divider" >Depertment</td>
	<td class="srscell-head-divider">			
			<select id="SubCatId" data-rel="chosen" name="SubCatId"  >
			        <option value="">Select</option>
		<?php if(count($subcategorylist) > 0){foreach ($subcategorylist as $row){ ?>
<option value="<?php echo $row->id; ?>" <?php if($row->id==$SubCatId) { echo 'selected="selected"'; } ?>><?php echo strtoupper ($row->subcat_name); ?></option>			  
			  	 <?php }} ?>
		  	</select></td>
</tr>
<tr>              
	<td width="17%" class="srscell-head-lft">Image</td>
    <td width="24%" class="srscell-body"><input type="file" id="images" name="images" value=""></td> 
	<td width="17%" class="srscell-head-lft">Doocument</td>
    <td width="24%" class="srscell-body"><input type="file" id="doocument" name="doocument" value=""></td>
</tr>
<tr><td width="12%" class="srscell-head-lft" colspan="4">Description</td></tr>
<tr><td  class="srscell-body" colspan="4">			  
<textarea name="details" id="details" ><?php echo $details; ?></textarea><?php echo display_ckeditor($ckeditor); ?></td></tr>
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
