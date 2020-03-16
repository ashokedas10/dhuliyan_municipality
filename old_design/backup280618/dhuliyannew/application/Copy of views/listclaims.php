<?php 
	$pagename=$this->uri->segment(3);
	$id=$this->session->userdata('id');
	$name=$this->session->userdata('name');
?>  

<div id="bodyWrapper">
<div id="bodyContainer">
<div class="proTop">

<!--LEFT CATEGORY/ATTRIBUTE-->

<div class="leftArea">
<div class="categoryTable">

		<div class="categoryBody">
			
				<a href="<?php echo BASE_URL.'cmscontaint/footerpages/aboutus/'?>"><h2>About Us</h2></a>
				<a href="<?php echo BASE_URL.'cmscontaint/footerpages/contactus/'?>"><h2>Contact Us</h2></a>				
				<a href="<?php echo BASE_URL.'cmscontaint/footerpages/delevery/'?>">
				<h2>Delivery and Shipping</h2>
				</a>
				<a href="<?php echo BASE_URL.'cmscontaint/footerpages/privacy/'?>"><h2>Privacy Policy</h2></a>
				<a href="<?php echo BASE_URL.'cmscontaint/footerpages/refund/'?>"><h2>Refund and Cancel</h2></a>
				<a href="<?php echo BASE_URL.'cmscontaint/footerpages/return/'?>"><h2>Return Policy</h2></a>
				<a href="<?php echo BASE_URL.'cmscontaint/footerpages/terms/'?>"><h2>Terms_of_Sales</h2></a>
				<a href="<?php echo BASE_URL.'cmscontaint/footerpages/web_term/'?>"><h2>Website_Terms</h2></a>
					
				
			
		</div>
</div>
</div>

<!--LEFT CATEGORY/ATTRIBUTE-->

<div class="rightArea">

<div class="scrollBottom">
<div class="proList">

<table width="200"  cellpadding="0" cellspacing="0">

<div class="proListInner" align="center" >
<?


if($pagename=='aboutus'){echo $this->load->view('claims/aboutus');}
if($pagename=='contactus'){echo $this->load->view('claims/contactus');}
if($pagename=='delevery'){echo $this->load->view('claims/shipping');}
if($pagename=='privacy'){echo $this->load->view('claims/privacy_policy');}
if($pagename=='refund'){echo $this->load->view('claims/refund');}
if($pagename=='return'){echo $this->load->view('claims/return');}
if($pagename=='terms'){echo $this->load->view('claims/terms');}
if($pagename=='web_term'){echo $this->load->view('claims/web_terms');}
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