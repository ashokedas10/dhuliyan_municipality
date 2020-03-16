<div class="leftArea">
<div class="categoryTable">
<div class="categoryBody">
<h2>My Account</h2>

<ul>
<li><a href="<?php echo BASE_URL?>cmscontaint/edit_profile_func/<?php echo $this->session->userdata('custid')?>/view">Edit Profile</a></li>
<li><a href="<?php echo BASE_URL?>cmscontaint/customer_join_func/<?php echo $this->session->userdata('custid')?>/add">Customer Registration</a></li>
<li><a href="<?php echo BASE_URL?>cmscontaint/customer_join_func/<?php echo $this->session->userdata('custid')?>/view">Customer Listing</a></li>
<li><a href="<?php echo BASE_URL?>cmscontaint/logout">Log Out</a></li>
<br class="clear" /> 
</ul>
</div>
</div>

<!--<div class="categoryTable">
<div class="categoryHead">My Account</div>
</div>-->

</div>

<div class="rightArea">
	
	<p align="center">&nbsp;</p>
	<p align="center"><strong>Customer List</strong></p>
	<p align="center">&nbsp;</p>
	<table border="1" align="center">
					<thead>
						<tr>
							
							<th width="247">Customer Name  </th>
							<th width="63">Mob No</th>
							<th width="59">Email  </th>
							<th width="167">Address </th>
							
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
							
							<td><?php echo $row->name.' ( '.$row->userid.' )'; ?></td>
							<td><?php echo $row->mobno; ?></td>
							<td><?php echo $row->emailid; ?></td>
							<td>
							<?php 
							echo $row->res_add.','.$row->district.','.$row->city
							.','.$row->state.','.$row->pincode;
							?></td>
																				
							
						</tr>
				
				
				<?php 
				$i++;	
				}
				}
				?>		
				
					</tbody>
  </table>


</div>


</body>
</html>

