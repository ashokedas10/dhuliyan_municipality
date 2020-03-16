<!--body-section starts-->
<!-- <div class="body-section">-->
<!--<div class="main">
  
</div>-->
<div class="latest-heading"><span class="red-text">Tender</span></div>


<div class="body-bottom">
<div class="container">
<div class="row">

	<?php /*?><div class="span3 bs-docs-sidebar">
	
		<div id="bodyBottomRighty" style="float:left;">
		<div class="notice">
		<!----------------------------------->
			<div class="notice">
		<div class="hot">Hot Navigation</div>
		<div class="hhotArea">
		<ul><?php foreach ($contentlist as $row){ 
		if($row->SubCatId!=41 && $row->SubCatId!=50 && $row->SubCatId!=66 && $row->status=='Active')
		{?>
		<li><a href="#"><?php echo $row->content_initials; ?></a></li>
		<?php } } ?></ul></div>
		</div>
		<!----------------------------------->
			<div class="notice">
		<div class="hot">Important Announcement</div>
		<div class="hhotArea">
		<marquee height="130" onmouseout="scrollDelay=1" onmouseover="scrollDelay=1000000" scrollamount="2" direction="up">
		<?php foreach ($contentlist as $row){ 
		if($row->SubCatId==66 && $row->status=='Active')
		{?>
		<p><a href="#"><?php echo $row->content_initials; ?></a></p>
		<?php }} ?>
		
		</marquee>
		<a href="#" class="seeall_link1">View All </a>
		</div>		
		</div>
		<!-------------------------------->
			<div class="notice">
		<div class="hot">Visitors Counter</div>
		<div class="hhotArea">Total Site Visitor : 
		<a href="#" target="_blank">
		<img src="http://hitwebcounter.com/counter/counter.php?page=5117272&style=0001&nbdigits=5&type=ip&initCount=0" 
		title="blog web counter" Alt="blog web counter" border="0" ></a></div>
		</div>
			<br class="clear" />
		</div>
		</div>
	
	</div><?php */?>




	<div class="span9">
	
	<div id="bodyBottomLeft">
	 <form name="formID2" id="formID2" method="post" action="<?php echo BASE_URL?>cmscontaint/tender_navigation/">		
				<table  border="0" cellpadding="0" cellspacing="0" class="srstable">
					
				
				<tr>
				<td  class="srscell-head-lft">Enter Starting Date</td>
				<td class="srscell-head-lft">
				<input  width="150"   name="startingdate" id="startingdate" value="" />
				<small><a href="javascript:showCal('calender42')" class="style1">Select Date</a></small></td>
				<td  class="srscell-head-lft"></td>
				</tr>
				
				<tr>
				<td  class="srscell-head-lft">Enter Closing Date</td>
				<td class="srscell-head-lft">
				<input  width="150"   name="closingdate" id="closingdate" value="" />
				<small><a href="javascript:showCal('calender43')" class="style1">Select Date</a></small></td>			
				<td  class="srscell-head-lft"><input class="submit" type="submit" name="proceed" value="Proceed" /></td>
				</tr>			
			</table>
		</form></p>
	  <div class="whiteBox">
	  <table width="100%" border="1">
	  <tr bgcolor="#993300">
		<td align="center" width="76" height="25"><span class="style4" style="color:#FFFFFF !important; font-weight:bold;">Tender Date</span></td>
		<td align="center" width="91"><span class="style4" style="color:#FFFFFF !important; font-weight:bold;">Last Date</span></td>
		<td align="center" width="97"><span class="style4" style="color:#FFFFFF !important; font-weight:bold;">Tender title/no</span></td>
		<td align="center" width="97"><span class="style4" style="color:#FFFFFF !important; font-weight:bold;">Tender Image</span></td>
		<td align="center" width="40"><span class="style4" style="color:#FFFFFF !important; font-weight:bold;">Document</span></td>
		<td align="center" width="274"><span class="style4" style="color:#FFFFFF !important; font-weight:bold;">Details</span></td>
	  </tr>
	  <?php foreach($tenderlist as $row){$picpath=BASE_PATH_ADMIN.'uploads/tender/';?>
		<tr>
	<? #`tender`(`id`, `tender_title`, `tender_key`, `depertment`, `details`, `images`, `doocument`, `startingdate`, `closingdate`, `status`)?>
		<td><?php echo strtoupper($row->startingdate); ?></td>
		<td><?php echo strtoupper($row->closingdate); ?></td>
		<td><?php echo strtoupper($row->tender_title); ?></td>
		<td><?php if($row->images!=''){?><img src="<?php echo $picpath.$row->images; ?>" width="50" height="50"/><?php } ?></td>
		<td><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?></td>
		<td><?php  echo strtoupper($row->details); ?></td>
		</tr>
	  <?php } ?>	
	  </table>
	</div>
	</div>
	
	</div>

</div>
</div>
</div>
  
<!-- </div>-->
<!--body-section ends-->
