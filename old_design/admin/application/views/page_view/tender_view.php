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
 <h2><span class="tcat">Tender Information</span></h2>
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
							<th width="160">Tender  </th>
							<th width="60">Pic</th>
							<th width="80">Document</th>
							<th width="40">startingdate</th>
							<th width="40">closingdate</th>
							<th width="81"> Status </th>
							<th width="67">Action</th>
							
						</tr>
					</thead>
					
					<tbody>
						<?php
						if(count($tenderlist) > 0){
						$picpath=BASE_PATH_ADMIN.'uploads/tender/';
						$i = 1;
						foreach ($tenderlist as $row){
							$alt = ($i%2==0)?'alt1':'alt2';
						?>
					
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">					
							<td><?php echo $i; ?></td>
							<td><?php echo strtoupper($row->tender_title); ?></td>
		<td><?php if($row->images!=''){?><img src="<?php echo $picpath.$row->images; ?>" width="50" height="50"/><?php } ?></td>
		<td><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?></td>
							<td><?php echo strtoupper($row->startingdate); ?></td>
							<td><?php echo strtoupper($row->closingdate); ?></td>
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
<?php /*`tender`(`id`, `tender_title`, `tender_key`, `depertment`, `details`, `startingdate`, `closingdate`, `status`) */?>
</div>

<?php
	$tender_title='';
	$depertment='';
	$tender_key='';
	$details='';
	$startingdate='';
	$closingdate='';
	$status='';	
				
	if($productid>0)	{
		if(count($records) > 0)		{
			foreach ($records as $fld) 		{ 
				$tender_title=$fld->tender_title;
				$depertment=$fld->depertment;
				$tender_key=$fld->tender_key;
				$details=$fld->details;
				$startingdate=$fld->startingdate;
				$closingdate=$fld->closingdate;
				$status=$fld->status;
			}		
		}
	}		
?>  

<form id="frm" name="frm" method="post" 
action="<?php echo ADMIN_BASE_URL?>project_controller/tender_section/tender_view/tender/addedit/"   enctype="multipart/form-data">
		  <input type="hidden" value="<?php echo $this->uri->segment(6); ?>" name="id" id="id">
<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >
<tr><td class="srscell-head-divider" colspan="4">Testimonial Details</td></tr> 
<tr>              
	<td width="17%" class="srscell-head-lft">Tender Title</td>
    <td width="24%" class="srscell-body"><input type="text" name="tender_title" id="tender_title" class="srs-txt" value="<?php echo $tender_title; ?>" /></td>
	<td class="srscell-head-divider" >Depertment</td>
	<td class="srscell-head-divider" colspan="2">			
			<select id="depertment" data-rel="chosen" name="depertment"  >
			        <option value="">Select</option>
		<?php if(count($subcategorylist) > 0){foreach ($subcategorylist as $row){ ?>
<option value="<?php echo $row->id; ?>" <?php if($row->id==$depertment) { echo 'selected="selected"'; } ?>><?php echo strtoupper ($row->subcat_name); ?></option>			  
			  	 <?php }} ?>
		  	</select></td>
</tr>
<tr>						  
   <td width="17%" class="srscell-head-lft">Tender Key</td>
   <td width="24%" class="srscell-body"><input type="text" id="tender_key" class="srs-txt" value="<?php echo $tender_key; ?>" name="tender_key" /></td>
</tr>
<tr>						
	<td class="srscell-head-lft">Date of starting</td>
    <td class="srscell-body"><input type="text" id="datepicker1" name="startingdate" value="<?php echo $startingdate; ?>">
    (2016-01-02)</td>			  
	<td class="srscell-head-lft">Date of closing</td>
    <td class="srscell-body"><input type="text" id="datepicker2" name="closingdate" value="<?php echo $closingdate; ?>">
      (2016-01-02)</td>       
</tr>
</table>

<table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >
  <tr>              
    <td width="17%" class="srscell-head-lft">Image</td>
      <td width="24%" class="srscell-body"><input type="file" id="images" name="images" value=""></td>
      <td width="17%" class="srscell-head-lft">Doocument</td>
      <td width="24%" class="srscell-body"><input type="file" id="doocument" name="doocument" value=""></td>
  </tr>
  <tr>
    <td width="12%" class="srscell-head-lft">Description</td>
              <td  class="srscell-body" colspan="3">			  
                <textarea name="details" id="details" ><?php echo $details; ?></textarea>
                <?php echo display_ckeditor($ckeditor); ?>			  </td>
		    </tr>
  
  <tr> 			  
    <td class="srscell-head-lft">Status</td>
      <td class="srscell-body" colspan="3">
            <select id="status" name="status">
              <option value="Active"  selected="selected">Active</option>
              <option value="Active" <?php if($status=='Active') { echo 'selected="selected"'; } ?>>Active</option>
              <option value="InActive" <?php if($status=='InActive') { echo 'selected="selected"'; } ?>>InActive</option>
            </select>      </td>
               </tr>
  
   <tr class="alt1">
     <td valign="top" align="center" colspan="4" class="leftBarText"> 
       <input type="submit" class="btn btn-green" 
			  value="Save" id="Save" name="Save" 
			  onClick="return confirm('Do you want to save this Record ?');"/>      </td>
               </tr>
</table>
</form>

 
