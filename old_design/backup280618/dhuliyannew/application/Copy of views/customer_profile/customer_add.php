<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-family: "Times New Roman", Times, serif}
-->
</style>
<? 
$id=$this->session->userdata('id');
$name=$this->session->userdata('name');

$where_array = array('id' => $id);
$records= $this->projectmodel->get_all_record('tblm_agent',$where_array);

?> 

<div>

<form id="frm" name="frm" method="post" action="<?php echo BASE_URL?>cmscontaint/customer_add/" >
      
	  <p>
	    <input type="hidden"  name="JOINTYPE" id="JOINTYPE" value="CLIENT">
	    <input type="hidden"  name="parentid" id="parentid"  value="<?php echo $id ?>">
</p>
	  <p>&nbsp;      </p>
	  <table width="99%"  border="0" cellpadding="0" cellspacing="0" class="srstable" >

          <tr align="center">
            <td class="srscell-head-divider" colspan="4">
			<span class="tcat">Customer</span> Details</td>
          </tr>
		  
		  <tr align="center">
            <td colspan="4">
			<span class="style1"><?php echo $this->session->userdata('alert_msg'); ?>			</span>			</td>
          </tr>
            			
			
			
			
			<tr>
              
			  <td class="srscell-head-lft">Associate Id * </td>
              <td class="srscell-body">
			  
			  
				
				<?php 
					echo  $name;
											
					?>
				
			  </td>
			  
			   <td width="20%" class="srscell-head-lft">Joining Date * </td>
              <td width="29%" class="srscell-body">
			  	 <input type="text" id="DOJ" class="srs-txt"
			  value="" name="DOJ" />
			  <a href="javascript:showCal('DOJ')" class="style1">
			 <img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/dateicon.png" width="24" height="26" >			  </a></td>
            </tr>
			
					
			<tr>
              
			  <td class="srscell-head-lft">Customer Name * </td>
              <td class="srscell-body">
			  	 <input type="text" id="name" class="srs-txt"
			  value="" name="name" />			  </td>
			  
			 
            </tr>
			<tr>
              
			  <td class="srscell-head-lft">Father Name*</td>
              <td class="srscell-body"><input type="text" id="fathername" class="srs-txt"
			  value="" name="fathername" /></td>
			  
			  <td width="20%" class="srscell-head-lft">DOB </td>
              <td width="29%" class="srscell-body">
			  <input type="text" id="dob" class="srs-txt"
			  value="" name="dob" />			  </td>
            </tr>
			<tr>
              
			  <td class="srscell-head-lft">Mobile No *</td>
              <td class="srscell-body">
			  	 <input type="text" id="mobno" class="srs-txt"
			  value="" name="mobno" />			  </td>
			  
			  <td width="20%" class="srscell-head-lft">E-mail id * </td>
              <td width="29%" class="srscell-body">
			 <input type="text" id="emailid" class="srs-txt"
			  value="" name="emailid" />			  </td>
            </tr>			
						
			<tr>
			  <td class="srscell-head-lft">Address </td>
              <td class="srscell-body">
			  	 <input type="text" id="res_add" class="srs-txt"
			  value="" name="res_add" />			  </td>
			  
			  
			  <td class="srscell-head-lft">District</td>
              <td class="srscell-body">
			  <input type="text" id="district" class="srs-txt"
			  value="" name="district" />			  </td>
            </tr>
			
			<tr>
			  <td class="srscell-head-lft">State</td>
              <td class="srscell-body">
			  	 <input type="text" id="state" class="srs-txt"
			  value="" name="state" />			  </td>
			  
			  
			  <td class="srscell-head-lft">Pin</td>
              <td class="srscell-body">
			   <input type="text" id="pincode" class="srs-txt"
			  value="" name="pincode" />			  </td>
            </tr>
			
			
			
			<tr align="center"><td colspan="4" class="srscell-head-divider">Nominee Details</td></tr>
			
			<tr>
			  <td class="srscell-head-lft">Nominee Name</td>
              <td class="srscell-body">
			  	 <input type="text" id="nom_name" class="srs-txt"
			  value="" name="nom_name" />			  </td>
			  
			  
			  <td class="srscell-head-lft">Nominee's Age</td>
              <td class="srscell-body">
			   <input type="text" id="nom_dob" class="srs-txt"
			  value="" name="nom_dob" />			  </td>
            </tr>
			
			<tr>
			  <td class="srscell-head-lft">Nominee's Relation</td>
              <td class="srscell-body">
			  	 <input type="text" id="nominee_relation" class="srs-txt"
			  value="" name="nominee_relation" />			  </td>
            </tr>
			
			<tr align="center">
			  <td colspan="4" class="srscell-head-divider">Other Details</td>
			</tr>
			
			<tr>
			  <td class="srscell-head-lft">Remarks</td>
              <td class="srscell-body">
			  	 <input type="text" id="remarks" class="srs-txt"
			  value="" name="remarks" />			  </td>
			              
            </tr>
						
			<tr class="alt1">
              <td valign="top" align="center" colspan="4" class="leftBarText"> 
			  <input type="submit" class="btn btn-green" 
			  value="Save" id="Save" name="Save" 
			  onClick="return confirm('Do you want to save this Record ?');"/>			  </td>
            </tr>
			
          </tbody>
  </table>
</form>

</div>