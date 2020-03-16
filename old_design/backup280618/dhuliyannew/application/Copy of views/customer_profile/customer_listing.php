<? 
$id=$this->session->userdata('id');
$name=$this->session->userdata('name');
//$where_array = array('id' => $id);
//$records= $this->projectmodel->get_all_record('tblm_agent',$where_array);
$where_array = array('parentid' => $id,'JOINTYPE'=>'CLIENT');
$records = $this->projectmodel->get_all_record('tblm_agent',$where_array);	
?> 

<div class="rightArea">
	
	<p align="center">&nbsp;</p>
	<p align="center"><strong>Customer List</strong></p>
	<p align="center">&nbsp;</p>
	<table border="1" align="center">
					<thead>
						<tr>
							
							<th width="247">Customer Name  </th>
							<th width="63">Mob No</th>
							<th width="63">Date of birth</th>
							<th width="59">Email  </th>
							<th width="167">Address </th>
							
						</tr>
					</thead>
					
					<tbody>
					<?php if(count($records) > 0){ $i = 1; foreach ($records as $row) {  $alt = ($i%2==0)?'alt1':'alt2';  ?>
					
						<tr class="<?php    if($i%2==0) { echo ' even gradeX'; } 
				   							else {  echo ' odd gradeC'; } ?> ">
							
							<td><?php echo $row->name.' ( '.$row->userid.' )'; ?></td>
							<td><?php echo $row->mobno; ?></td>
							<td><?php echo $row->dob; ?></td>
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