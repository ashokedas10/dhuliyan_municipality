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

 
<?php

	/*CHANGE HERE*/
	
	        $name='';
			$fathername='';
			$dob='';
			$res_add='';
			$district='';
			$city='';
			$pincode='';
			$state='';
			$mobno='';
			$emailid='';
			$nom_name='';
			$nom_dob='';
			$password='';
			$DOJ='';
			$parentid='';
			$rank='';
			$nominee_relation='';
			$JOINTYPE='';
			$branch_id='';
			$bnkaccountno='';
			$ifsccode='';
			$bank_name='';
			$bank_branch='';
			$proof_type='';
			$proof_id='';
			$remarks='';
			$userid='';
			
	
	
	if($productid>0)
	{
		if(count($records) > 0)
		{
			foreach ($records as $fld) 
			{ 
			/*CHANGE HERE*/
			$name=$fld->name;
			$fathername=$fld->fathername;
			$dob=$fld->dob;
			$res_add=$fld->res_add;
			$district=$fld->district;
			$city=$fld->city;
			$pincode=$fld->pincode;
			$state=$fld->state;
			$mobno=$fld->mobno;
			$emailid=$fld->emailid;
			$nom_name=$fld->nom_name;
			$nom_dob=$fld->nom_dob;
			$password=$fld->password;
			$DOJ=$fld->DOJ;
			$parentid=$fld->parentid;
			$rank=$fld->rank;
			$nominee_relation=$fld->nominee_relation;
			$JOINTYPE=$fld->JOINTYPE;
			$branch_id=$fld->branch_id;
			$bnkaccountno=$fld->bnkaccountno;
			$ifsccode=$fld->ifsccode;
			$bank_name=$fld->bank_name;
			$bank_branch=$fld->bank_branch;
			$proof_type=$fld->proof_type;
			$proof_id=$fld->proof_id;
			$remarks=$fld->remarks;
			$userid=$fld->userid;
			
			
					
			}		
		}
	}
		
?>
 
 
  
<form id="frm" name="frm" method="post" 
action="<?php echo BASE_URL?>cmscontaint/edit_profile_func/<?php echo $this->session->userdata('custid')?>/addedit/" >
      
		  <p>
		    <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" 
		  name="id" id="id">
		    <input type="hidden" value="<?php 
					$sql="select max(id) id from tblm_agent ";
					$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
					foreach ($rowrecord as $row1) { echo $row1->id; }		
					?>" name="maxid" id="maxid">
</p>
		  <p>&nbsp;          </p>
		  <table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >

          
				  
          <tr align="center">
            <td class="srscell-head-divider" colspan="4">
			<span class="tcat">Agent</span> Details</td>
          </tr>
		  
		  <tr align="center">
            <td colspan="4">
			<span class="style1"><?php echo $this->session->userdata('alert_msg'); ?>
			</span>
			</td>
          </tr>
            			
			
			<tr>
			  <td class="srscell-head-lft">User Id  (Auto generate ) </td>
              <td class="srscell-body"><?php echo $userid; ?></td>
            </tr>
			
			
			
			<tr>
              
			  <td class="srscell-head-lft">Associate Id * </td>
              <td class="srscell-body">
				 	<?php 
					$sql="select * from tblm_agent where id=".$parentid;
					$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
					foreach ($rowrecord as $row1)
					{ echo  $row1->name; }					
					?>
			  </td>
			  
			   <td width="20%" class="srscell-head-lft">Joining Date * </td>
               <td width="29%" class="srscell-body">
			   <?php echo $DOJ; ?>
			 
			  </td>
            </tr>
			
					
			<tr>
              
			  <td class="srscell-head-lft">Associate Name * </td>
              <td class="srscell-body">
			  <?php echo $name; ?></td>
			  
			  <td width="20%" class="srscell-head-lft">Rank * </td>
              <td width="29%" class="srscell-body">
			  		<?php echo 'Rank '.$rank; ?>
			  </td>
            </tr>
			<tr>
              
			  <td class="srscell-head-lft">Father Name*</td>
              <td class="srscell-body"><?php echo $fathername; ?></td>
			  
			  <td width="20%" class="srscell-head-lft">DOB </td>
              <td width="29%" class="srscell-body">
			  <?php echo $dob; ?></td>
            </tr>
			<tr>
              
			  <td class="srscell-head-lft">Mobile No *</td>
              <td class="srscell-body">
			  	 <input type="text" id="mobno" class="srs-txt"
			  value="<?php echo $mobno; ?>" name="mobno" />			  </td>
			  
			  <td width="20%" class="srscell-head-lft">E-mail id * </td>
              <td width="29%" class="srscell-body">
			 <input type="text" id="emailid" class="srs-txt"
			  value="<?php echo $emailid; ?>" name="emailid" />			  </td>
            </tr>			
						
			<tr>
			  <td class="srscell-head-lft">Address </td>
              <td class="srscell-body">
			  	 <input type="text" id="res_add" class="srs-txt"
			  value="<?php echo $res_add; ?>" name="res_add" />
			  </td>
			  
			  
			  <td class="srscell-head-lft">District</td>
              <td class="srscell-body">
			  <input type="text" id="district" class="srs-txt"
			  value="<?php echo $district; ?>" name="district" />	
			    
			  </td>
            </tr>
			
			<tr>
			  <td class="srscell-head-lft">State</td>
              <td class="srscell-body">
			  	 <input type="text" id="state" class="srs-txt"
			  value="<?php echo $state; ?>" name="state" />
			  </td>
			  
			  
			  <td class="srscell-head-lft">Pin</td>
              <td class="srscell-body">
			   <input type="text" id="pincode" class="srs-txt"
			  value="<?php echo $pincode; ?>" name="pincode" />
			  </td>
            </tr>
			
			
			
			<tr align="center"><td colspan="4" class="srscell-head-divider">Nominee Details</td></tr>
			
			<tr>
			  <td class="srscell-head-lft">Nominee Name</td>
              <td class="srscell-body">
			  	 <input type="text" id="nom_name" class="srs-txt"
			  value="<?php echo $nom_name; ?>" name="nom_name" />
			  </td>
			  
			  
			  <td class="srscell-head-lft">Nominee's Age</td>
              <td class="srscell-body">
			   <input type="text" id="nom_dob" class="srs-txt"
			  value="<?php echo $nom_dob; ?>" name="nom_dob" />
			  </td>
            </tr>
			
			<tr>
			  <td class="srscell-head-lft">Nominee's Relation</td>
              <td class="srscell-body">
			  	 <input type="text" id="nominee_relation" class="srs-txt"
			  value="<?php echo $nominee_relation; ?>" name="nominee_relation" />
			  </td>
			  			  
            </tr>
			
			<tr align="center">
			  <td colspan="4" class="srscell-head-divider">Other Details</td>
			</tr>
			
			<tr>
			  <td class="srscell-head-lft">Bank Name</td>
              <td class="srscell-body">
			  	 <input type="text" id="bank_name" class="srs-txt"
			  value="<?php echo $bank_name; ?>" name="bank_name" />
			  </td>
			  
			  
			  <td class="srscell-head-lft">Branch</td>
              <td class="srscell-body">
			   <input type="text" id="bank_branch" class="srs-txt"
			  value="<?php echo $bank_branch; ?>" name="bank_branch" />
			  </td>
            </tr>
			
			<tr>
			  <td class="srscell-head-lft">Account No</td>
              <td class="srscell-body">
			  	 <input type="text" id="bnkaccountno" class="srs-txt"
			  value="<?php echo $bnkaccountno; ?>" name="bnkaccountno" />
			  </td>
			  
			  
			  <td class="srscell-head-lft">IFSC Code</td>
              <td class="srscell-body">
			   <input type="text" id="ifsccode" class="srs-txt"
			  value="<?php echo $ifsccode; ?>" name="ifsccode" />
			  </td>
            </tr>
			
			<tr>
			  <td class="srscell-head-lft">Proof Type</td>
              <td class="srscell-body">
			  	 <input type="text" id="proof_type" class="srs-txt"
			  value="<?php echo $proof_type; ?>" name="proof_type" />
			  </td>
			  
			  
			  <td class="srscell-head-lft">Proof ID</td>
              <td class="srscell-body">
			   <input type="text" id="proof_id" class="srs-txt"
			  value="<?php echo $proof_id; ?>" name="proof_id" />
			  </td>
            </tr>
			
			<tr>
			  <td class="srscell-head-lft">Remarks</td>
              <td class="srscell-body">
			  	 <input type="text" id="remarks" class="srs-txt"
			  value="<?php echo $remarks; ?>" name="remarks" />
			  </td>
			  
			  
			  <td class="srscell-head-lft">Status</td>
              <td class="srscell-body">
			   <input type="text" id="JOINTYPE" class="srs-txt"
			  value="<?php echo $JOINTYPE; ?>" name="JOINTYPE" />
			  </td>
            </tr>
						
			<tr class="alt1">
              <td valign="top" align="center" colspan="4" class="leftBarText"> 
			  <input type="submit" class="btn btn-green" 
			  value="Save" id="Save" name="Save" 
			  onClick="return confirm('Do you want to save this Record ?');"/> 
			  			  
			  <?php /*?>
			  <input name="Print" type="button" value="Print" class="btn btn-green" 
			  onclick="popup('<?php 
			  $url='../../../../../../project_controller/builtyprint_function/builty_print/tbl_builty/list/'.$this->uri->segment(6).'/';
			  echo $url; ?>')"
			  />		
			  <?php */?>	  </td>
            </tr>
			
          </tbody>
  </table>
</form>


</div>

