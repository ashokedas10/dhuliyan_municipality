<div class="leftArea">
<div class="categoryTable">
<div class="categoryBody">
<h2>My Account</h2>
<?php 
	if(count($logindata) > 0){
	foreach ($logindata as $row){
	$this->session->set_userdata('custid',$row->id);
	}}		
?>
	   
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
<table width="100%" border="0">
  <tr>
    <td  align="center">
      <p>&nbsp;</p>
      <p>Hellow 
        <?php 
	  if(count($logindata) > 0){
	  foreach ($logindata as $row){
	  echo $row->name.' ('.$this->session->userdata('userid').')';
	  $this->session->set_userdata('custid',$row->id);
	  }}		
	   ?>
      </p>
      <p><strong>Welcome To Pocket bazar </strong></p>
    </td>
  </tr>
</table>

</div>


</body>
</html>
