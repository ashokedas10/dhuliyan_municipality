<script type="text/javascript">
$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});

</script>

<style type="text/css">
<!--
.style2 {
	color: #990000;
	font-weight: bold;
	font-size:18px;
}
-->
</style>

<div class="panel panel-primary" >	
    <div class="panel-body" align="center" style="background-color:#99CC00">  	
	  <span class="blink_me style2">Blood Group Map</span></div>
</div>

  
<form action="<?php echo ADMIN_BASE_URL?>project_controller/blood_test_group_map/listing/" 
	name="frmreport" id="frmreport" method="post">
  
  <table width="714" class="srstable">
	<tr>
	<td>Select Group</td>
	<td>
	 <select id="blood_test_group_id" class="form-control select2"  name="blood_test_group_id" >
          <option value="0">SELECT ALL</option>
                  <?php 
								
				$sql="select * from blood_test_group order by group_name ";					
				$rowrecord = $this->projectmodel->get_records_from_sql($sql);
				foreach ($rowrecord as $row1){ 						
					?>
				<option value="<?php echo $row1->id; ?>">
				<?php echo $row1->group_name; ?>
				</option>
				
			  	 <?php } ?>
        </select>
	</td>
	<td><button type="submit" class="btn btn-primary" name="submit">Submit</button></td>
	</tr>
	</table>
	
</form>




<form id="frm" name="frm" method="post" action="<?php echo ADMIN_BASE_URL?>project_controller/blood_test_group_map/save/" >

<input type="hidden" id="blood_test_group_id" name="blood_test_group_id" value="<?php echo $blood_test_group_id; ?>"  />

  <table width="714" class="srstable">
	<tr>
	<td   colspan="3"  align="center"><span class="style1">
	<?php echo $this->session->userdata('alert_msg'); ?>
	<?php $Whr='id='.$blood_test_group_id;	
	echo 'Mapping of '.$this->projectmodel->GetSingleVal('group_name','blood_test_group',$Whr); ?>
	
	</td>
	</tr>
	
		
	<tr>
		<td class="srscell-body">Srl</td>
		<td class="srscell-body"> Test Name</td>		
	  <td width="160" class="srscell-body"><input type="checkbox" id="selecctall"/>Select</td>
	</tr>
	
	 <?php 

		$sql="select * from blood_test  where status='ACTIVE'";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $key=>$row1)
		{
		    $id=$row1->id;
		    $test_name=$row1->test_name;
		  	$blood_test_id=0;   
			$records="select * from blood_test_group_map where 	blood_test_id=".$id." and blood_test_group_id=".$blood_test_group_id;
			$records = $this->projectmodel->get_records_from_sql($records);	
			foreach ($records as $record)
			{$blood_test_id=$record->blood_test_id;}		
		?>
	
	<tr>
		<td class="srscell-body" ><?php echo $key+1; ?></td>
		<td class="srscell-body" ><?php echo $test_name; ?></td>
		<td class="srscell-body">
		
		<input type="hidden" name="blood_test_id<?PHP echo $key;?>"  id="blood_test_id<?PHP echo $key;?>"  value="<?php echo $id; ?>" >
		 
		<input name="map<?PHP echo $key;?>" 
		<?php 	if($blood_test_id>0){echo 'checked="checked"';}else {echo '';} ?> id="map<?PHP echo $key;?>"  class="checkbox1" type="checkbox">
		</td>
	</tr>
	
	<?php } ?>
	
	
	
<tr class="alt1">

<td valign="top" align="center" colspan="3" class="srscell-body"> 
<input type="submit" class="btn srs-btn-reset" value="Save" id="submit" name="submit"></td>
</tr>
  </table>

</form>


