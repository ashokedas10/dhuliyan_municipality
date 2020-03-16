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

 <h2><span class="tcat">Depertment Section  </span></h2>
   			
<p align="center"><span class="style1">
<?php echo $this->session->userdata('alert_msg'); ?></span></p>

  <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Sl No</th>
							<th>Name</th>
							<th>Designation</th>
							<th>PhoneNumber</th>	
							<th>Email</th>	
							<th>Image</th>			
							<th>Document</th>
							<th>status</th>
							<th>Action</th>				
						</tr>
					</thead>
					
					<tbody>
						<?php
						if(count($depertment) > 0){
						$i = 1;
						$picpath=BASE_PATH_ADMIN.'uploads/products/';
						foreach ($depertment as $row){
							$alt = ($i%2==0)?'alt1':'alt2';
						?>
					
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">
						
							<td><?php echo $i; ?></td>
							<td><?php echo $row->Name; ?></td>
							<?php foreach ($subcategorylist as $subcat){if($subcat->id==$row->Designation){	?>
							<td><?php echo strtoupper($subcat->subcat_name); ?></td>
							<?php }} ?>
							<td><?php echo $row->PhoneNumber; ?></td>
							<td><?php echo $row->Email; ?></td>
				<td><?php if($row->Image!=''){?><img src="<?php echo $picpath.$row->Image; ?>" width="50" height="50"/><?php } ?></td>
				<td><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?></td>
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
<? /*`depertment`(`id`, `Name`, `Designation`, `PhoneNumber`, `Email`, `Details`, `Image`, `File_Upload`, `RecordStatus`, `SortingOrder`, `status`)*/ ?> 
<?php
	$Name='';
	$Designation='';
	$PhoneNumber='';
	$Details='';
	$Email='';
	$File_Upload='';
	$RecordStatus='';
	$status='';
	$SortingOrder='';	
	$dob='';
	$doj='';
	$current_working_role='';
	$desig='';
							
	if($productid>0)	{
		if(count($records) > 0)		{
			foreach ($records as $fld)
			{ 
				$Name=$fld->Name;
				$Designation=$fld->Designation;
				$PhoneNumber=$fld->PhoneNumber;
				$Details=$fld->Details;
				$Image=$fld->Image;
				$Email=$fld->Email;
				$RecordStatus=$fld->RecordStatus;
				$status=$fld->status;
				$doj=$fld->doj;
				$dob=$fld->dob;
				$SortingOrder=$fld->SortingOrder;
				$current_working_role=$fld->current_working_role;
				$desig=$fld->desig;
			}		
		}
	}		
?>  

<form id="frm" name="frm" method="post" 
action="<?php echo ADMIN_BASE_URL?>project_controller/product_section/product_view/depertment/addedit/"   enctype="multipart/form-data">
		  <input type="hidden" value="<?php echo $this->uri->segment(6); ?>" name="id" id="id">
<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >
<tr><td class="srscell-head-divider" colspan="4">Depertment Details</td></tr> 
<tr>              
	<td width="17%" class="srscell-head-lft">Name</td>
    <td width="24%" class="srscell-body"><input type="text" name="Name" id="Name" class="srs-txt" value="<?php echo $Name; ?>" /></td>
	<td class="srscell-head-divider" >Designation</td>
	<td class="srscell-head-divider" colspan="2">			
			<select id="Designation" data-rel="chosen" name="Designation"  >
			        <option value="">Select</option>
		<?php if(count($subcategorylist) > 0){foreach ($subcategorylist as $row){ ?>
<option value="<?php echo $row->id; ?>" <?php if($row->id==$Designation) { echo 'selected="selected"'; } ?>><?php echo strtoupper ($row->subcat_name); ?></option>			  
			  	 <?php }} ?>
		  	</select></td>
</tr>
<tr>						  
   <td width="17%" class="srscell-head-lft">PhoneNumber</td>
   <td width="24%" class="srscell-body"><input type="text" id="PhoneNumber" class="srs-txt" value="<?php echo $PhoneNumber; ?>" name="PhoneNumber" /></td>
   <td width="17%" class="srscell-head-lft">Email</td>
   <td width="24%" class="srscell-body"><input type="text" id="Email" class="srs-txt" value="<?php echo $Email; ?>" name="Email" /></td>
</tr>
<tr>              
	<td class="srscell-head-lft">Profile Picture</td>
    <td class="srscell-body"><input type="file" id="image" name="image" value=""></td>			  
	<td width="17%" class="srscell-head-lft">Doocument</td>
    <td width="24%" class="srscell-body"><input type="file" id="doocument" name="doocument" value=""></td>       
</tr>
<tr>						
	<td class="srscell-head-lft">RecordStatus</td>
    <td class="srscell-body"><input type="text" id="RecordStatus" name="RecordStatus" value="<?php echo $RecordStatus; ?>"></td>		  
	<td class="srscell-head-lft">SortingOrder</td>
    <td class="srscell-body"><input type="text" id="SortingOrder" name="SortingOrder" value="<?php echo $SortingOrder; ?>"></td>        
</tr>
<tr>						
	<td class="srscell-head-lft">Date of Birth</td>
    <td class="srscell-body"><input type="text" id="dob" name="dob" value="<?php echo $dob; ?>"></td>			  
	<td class="srscell-head-lft">Date of Joining</td>
    <td class="srscell-body"><input type="text" id="doj" name="doj" value="<?php echo $doj; ?>"></td>        
</tr>


<tr>						
	<td class="srscell-head-lft">Designation</td>
    <td class="srscell-body"><input type="text" id="desig" name="desig" 
	value="<?php echo $desig; ?>"></td>		  
	<td class="srscell-head-lft">Current Working Role</td>
    <td class="srscell-body"><input type="text" id="current_working_role" name="current_working_role" value="<?php echo $current_working_role; ?>"></td>        
</tr>




<tr>
			 <td width="12%" class="srscell-head-lft">Description</td>
              <td  class="srscell-body" colspan="3">			  
			  <textarea name="details" id="details" ><?php echo $Details; ?></textarea>
				<?php echo display_ckeditor($ckeditor); ?>			  </td>
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

 
