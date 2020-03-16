
<style type="text/css">
<!--
.style1 {
	color: #CC3300;
	font-weight: bold;
	font-size: 14px;
}
-->
</style>
<h2><span class="tcat">Upload Data
</span></h2>
<div class="box-header with-border">
	<?php if($this->session->userdata('alert_msg')<>''){ ?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" 
		aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-check"></i>
		<?php echo $this->session->userdata('alert_msg'); ?></h4>
		</div>
	<?php } ?>
</div>

<form action="<?php echo ADMIN_BASE_URL?>Project_controller/Master_upload/" 
	name="frmreport" id="frmreport" method="post" enctype="multipart/form-data">
	<table  border="0" cellpadding="0" cellspacing="0" class="srstable" style="width:100%"> 		
		
<tr>
	
	
	<td width="127" class="srscell-head-lft">Temp/Original</td>
		<td class="srscell-body">
		
		 <select id="temp_original" class="form-control select2"  
		 name="temp_original" >
                 
				 <option value="FINAL">FINAL UPLOAD</option>
       </select>
	</td>
	
	
	<td width="127" class="srscell-head-lft">Select</td>
		<td class="srscell-body">
		
		 <select id="SettingName" class="form-control select2"   name="SettingName" >
             <option value="PRODUCT_MASTER" selected="selected">PRODUCT_UPLOAD GROUP WISE</option>	
			 <option value="PRODUCT_MASTER_INDIVIDUAL" selected="selected">PRODUCT_UPLOAD INDIVIDUAL</option>			 	
       </select>
	</td>
		
		 <td class="srscell-head-lft">File: </td>
              <td class="srscell-body">			  
			  <input type="file" name="image1" id="image1" value="">
			  </td>
		
		</td>
		
		
		<td width="172" class="srscell-body">
	   <input name="Upload" type="submit" value="Upload" class="btn srs-btn-reset"/>
		</td>
</tr>
          
  </table>
</form>

