<div >
	<b>Change Password  </b>
<?php 
	$id=$this->session->userdata('id');
	$name=$this->session->userdata('name');
?>
	<form action="<?php echo BASE_URL?>cmscontaint/customer_pass_change/" method="POST">
	<input type="hidden"  name="id" id="id" value="<? echo $id;?>"/>
	<table border="0">
	<tr><td>Old Password</td><td><input type="password"  name="oldpass" id="oldpass" value=""/></td></tr>
	<tr><td>New Password</td><td><input type="password"  name="new_pass" id="new_pass" value="" /></td></tr>
	<tr><td>Conform Password</td><td><input type="password"  name="conf_pass" id="conf_pass" value="" /></td></tr>
	
	<tr><td colspan="2" align="right"><input type="submit" value="Submit" name="passsubmit" id="passsubmit" /></td></tr>
	</table>
	</form>
	
	<br class="clear">
</div>