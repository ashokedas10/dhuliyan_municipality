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
<h2><span class="tcat">Administration Section  </span></h2>
<p align="center"><span class="style1">
<?php echo $this->session->userdata('alert_msg'); ?></span></p>
  <div class="block">
                    <table width="469" class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Sl No</th>
							<th>Name  </th>
							<th>Designation</th>
							<th>Ward_NO</th>
							<th> Elected_From </th>
							<th> image </th>
							<th> Contact </th>
							<th>status</th>
							<th>Action</th>
							
						</tr>
					</thead>					
					<tbody>
						<?php
						if(count($administrationlist) > 0){
						$i = 1;
						$picpath=BASE_PATH_ADMIN.'uploads/administration/';
						foreach ($administrationlist as $row){
							$alt = ($i%2==0)?'alt1':'alt2';
						?>
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">					
							<td><?php echo $i; ?></td>
							<td><?php echo strtoupper($row->name); ?></td>
							<?php 
							foreach ($subcategorylist as $subcat){
								if($subcat->id==$row->Designation){
							?>
							<td><?php echo strtoupper($subcat->subcat_name); ?></td>
							<?php }} ?>
							<td><?php echo strtoupper($row->Ward_NO); ?></td>
							<td><?php echo strtoupper($row->Elected_From); ?></td>
							<td><img src="<?php echo $picpath.$row->image; ?>" width="50" height="50"/></td>
							<td><?php echo strtoupper($row->Contact); ?></td>
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
	$name='';
	$DesignationDetails='';
	$Designation='';
	$Ward_NO='';
	$Elected_From='';
	$Contact='';
	$image='';	
	$status='';
				
	if($productid>0)	{
		if(count($records) > 0)		{
			foreach ($records as $fld) 		{ 
				$name=$fld->name;
				$DesignationDetails=$fld->DesignationDetails;
				$Designation=$fld->Designation;
				$Ward_NO=$fld->Ward_NO;
				$Elected_From=$fld->Elected_From;
				$Contact=$fld->Contact;
				$image=$fld->image;
				$status=$fld->status;
			}		
		}
	}		
?>  

<form id="frm" name="frm" method="post" 
action="<?php echo ADMIN_BASE_URL?>project_controller/administration_section/administration_view/administration/addedit/" enctype="multipart/form-data">
		  <input type="hidden" value="<?php echo $this->uri->segment(6); ?>" name="id" id="id">
<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >
<tr><td class="srscell-head-divider" colspan="4">Administration Details</td></tr> 
<?  // `administration`(`id`, `DesignationDetails`, `Designation`, `Ward_NO`, `Elected_From`, `Contact`, `image`, `status`, `name`)?>	
<tr>              
	<td width="17%" class="srscell-head-lft">Name</td>
    <td width="24%" class="srscell-body"><input type="text" name="name" id="name" class="srs-txt" value="<?php echo $name; ?>" /></td>
	<td class="srscell-head-divider" >Depertment</td>
	<td class="srscell-head-divider" colspan="2">			
			<select id="Designation" data-rel="chosen" name="Designation"  >
			        <option value="">Select</option>
		<?php if(count($subcategorylist) > 0){foreach ($subcategorylist as $row){ ?>
<option value="<?php echo $row->id; ?>" <?php if($row->id==$Designation) { echo 'selected="selected"'; } ?>><?php echo strtoupper ($row->subcat_name); ?></option>			  
			  	 <?php }} ?>
		  	</select></td>
</tr>
<tr>						  
   <td width="17%" class="srscell-head-lft">Designation in Details</td>
   <td width="24%" class="srscell-body"><input type="text" id="DesignationDetails" class="srs-txt" value="<?php echo $DesignationDetails; ?>" name="DesignationDetails" /></td>
</tr>
<tr>						
	<td class="srscell-head-lft">Ward NO</td>
    <td class="srscell-body"><input type="text" id="Ward_NO" name="Ward_NO" value="<?php echo $Ward_NO; ?>"></td>			  
	<td class="srscell-head-lft">Elected From</td>
    <td class="srscell-body"><input type="text" id="Elected_From" name="Elected_From" value="<?php echo $Elected_From; ?>"></td>       
</tr>
<tr>						
	<td class="srscell-head-lft">Contact</td>
    <td class="srscell-body"><input type="text" id="Contact" name="Contact" value="<?php echo $Contact; ?>"></td>			  
	<td class="srscell-head-lft">Profile Picture</td>
    <td class="srscell-body"><input type="file" id="image" name="image" value=""></td>       
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
