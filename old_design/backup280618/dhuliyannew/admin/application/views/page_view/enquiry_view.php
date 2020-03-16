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
<h2><span class="tcat">Enquiry Section  </span></h2>
<p align="center"><span class="style1">
<?php echo $this->session->userdata('alert_msg'); ?></span></p>
  <div class="block">
                    <table width="469" class="data display datatable" id="example">
					<thead>
						<tr> 
							<th>Sl No</th>
							<th>Name  </th>
							<th>Mobile</th>
							<th> Email </th>
							<th>Area</th>
							<th> Comment </th>
						</tr>
					</thead>					
					<tbody>
						<?php
						if(count($projectlist) > 0){
						$i = 1;
						$picpath=BASE_PATH_ADMIN.'uploads/project/';
						foreach ($projectlist as $row){
							$alt = ($i%2==0)?'alt1':'alt2';
						?><? // `contact_us`(`id`, `Name`, `Mobile`, `Email`, `Area`, `Comment`)?>
						<tr class="<?php if($i%2==0) { echo ' even gradeX'; } 
						else {  echo ' odd gradeC'; } ?> ">					
							<td><?php echo $i; ?></td>
							<td><?php echo strtoupper($row->Name); ?></td>					
							<td><?php echo strtoupper($row->Mobile); ?></td>
							<td><?php echo strtoupper($row->Email); ?></td>
							<td><?php echo strtoupper($row->Area); ?></td>							
	<td><a href="<?php echo ADMIN_BASE_URL?>project_controller/enquiry_section/enquiry_view/contact_us/addeditview/<?php echo $row->id; ?>">click here</a></td>																				
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
$msg='';
if($productid>0){
		if(count($records) > 0)		{
			foreach ($records as $fld) 		{ 
			$msg=$fld->Comment;
			}		
		}
	}		
?>  
<?php echo $msg;?>