<?php 
	$id=$this->session->userdata('id');
	$name=$this->session->userdata('name');
	$where_array = array('id' => $id); 
	$records= $this->projectmodel->get_all_record('tblm_agent',$where_array);
	?>

<div id="bodyWrapper">
<div id="bodyContainer">
<div class="proTop">

<!--LEFT CATEGORY/ATTRIBUTE-->

<div class="leftArea">
<div class="categoryTable">

		<div class="categoryBody">		
<a href="<?php echo BASE_URL.'cmscontaint/customer_profile/myorder/'?>"><h2>Order History</h2></a>		
<a href="<?php echo BASE_URL.'cmscontaint/customer_profile/mypassword/' ?>"><h2>Change Password</h2></a>
<a href="<?php echo BASE_URL.'cmscontaint/customer_profile/myself/' ?>"><h2>Update Profile </h2></a>
<? if(count($records) > 0)	{ foreach ($records as $fld) {	if(($fld->JOINTYPE<>'CLIENT')&&($fld->JOINTYPE<>'SELLER')) { ?>
<a href="<?php echo BASE_URL.'cmscontaint/customer_profile/customer_listing' ?>"><h2>Customer Listing</h2></a>
<a href="<?php echo BASE_URL.'cmscontaint/customer_profile/customer_add' ?>"><h2>Customer Registration</h2></a>
<a href="<?php echo BASE_URL.'cmscontaint/customer_profile/commision' ?>"><h2>Product Commision list </h2></a>
<a href="<?php echo BASE_URL.'cmscontaint/customer_profile/commision_order/'?>"><h2>Commision on Order</h2></a>		
<?php } } }?>	
<? if(count($records) > 0)	{ foreach ($records as $fld) {	if($fld->JOINTYPE=='SELLER') { ?>
<a href="<?php echo BASE_URL.'cmscontaint/customer_profile/product_add' ?>"><h2>Products Add </h2></a>
<?php } } }?>	
<a href="<?php echo BASE_URL?>cmscontaint/logout"><h2>Logout</h2></a>
				
		</div>
</div>
</div>

<!--LEFT CATEGORY/ATTRIBUTE-->

<div class="rightArea">

<div class="scrollBottom">
<div class="proList">

<table width="200"  cellpadding="0" cellspacing="0">

<div class="proListInner" align="center" >
<div><center>Welcome to PocketBazar Hi <? echo $name; ?></center></div>
<?

if($pagename=='mypassword'){echo $this->load->view('customer_profile/mypassword');}
if($pagename=='myself'){echo $this->load->view('customer_profile/myself');}
if($pagename=='myorder'){echo $this->load->view('customer_profile/myorder');}
if($pagename=='customer_listing'){echo $this->load->view('customer_profile/customer_listing');}
if($pagename=='customer_add'){echo $this->load->view('customer_profile/customer_add');}
if($pagename=='product_add'){echo $this->load->view('customer_profile/product_add');}
if($pagename=='commision'){echo $this->load->view('customer_profile/commision');}

?>
</div>

</table>
</div>

<br class="clear" />
</div>
</div>
</div>
<br class="clear" />
</div>
<div class="bottomLogo"></div>
</div>
</div>