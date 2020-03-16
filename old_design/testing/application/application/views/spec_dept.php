<div id="bodyBottomRighty" style="float:left;">
<div class="notice">
<!---------------------------------------------------------------------------------------------------->
<div class="notice"><div class="hot">Depertment</div>
	<div class="hhotArea"><ul>
	<?php foreach ($subcategorylist as $row){ if($row->cat_id=='5'){?>
	<li><a href="<?php echo BASE_URL?>cmscontaint/dept_spec/<?php echo $row->id;?>"><?php echo strtoupper($row->subcat_name); ?></a></li><?php } } ?></ul></div>
<!---------------------------------------------------------------------------------------------------->
<div class="notice">
<div class="hot">Hot Navigation</div>
<div class="hhotArea">
<ul><?php foreach ($contentlist as $row){ if($row->SubCatId!=41 && $row->SubCatId!=50 && $row->SubCatId!=66 && $row->status=='Active'){?>
<li><a href="#"><?php echo $row->content_initials; ?></a></li>
<?php } } ?></ul></div>
</div>
<!----------------------------------->
<div class="notice">
<div class="hot">Important Announcement</div>
<div class="hhotArea">
<marquee height="130" onmouseout="scrollDelay=1" onmouseover="scrollDelay=1000000" scrollamount="2" direction="up">
<?php foreach ($contentlist as $row){ if($row->SubCatId==66 && $row->status=='Active'){?>
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
<img src="http://hitwebcounter.com/counter/counter.php?page=5117272&style=0001&nbdigits=5&type=ip&initCount=0" title="blog web counter" Alt="blog web counter" border="0" ></a></div>
</div>
<br class="clear" />
</div>
</div>

<? ############################################################################################################### ?>

<div id="bodyBottom" style="margin-top:-686px;margin-left:345px; float:left;">
<div id="bodyBottomLefty" style="float:left;">
<h2>Depertment&nbsp;&nbsp; <?php foreach ($subcategorylist as $subcat){if($subcat->id==$dept){echo " ' ".strtoupper($subcat->subcat_name)." ' "; }} ?></h2>
<div style="">
<?php foreach ($deptlist as $row){ if($row->status=='Active'){?>
<?php //`depertment`(`id`, `Name`, `Designation`, `PhoneNumber`, `Email`, `Details`, `Image`, `File_Upload`, `RecordStatus`, `SortingOrder`, `dob`, `doj`, `status`) ?>
<?php $picpath=BASE_PATH_ADMIN.'uploads/products/'; ?>
 <div class="whiteBox" style="float:right; margin-right:10px; margin-top:0px;">
	<div style="margin-top:5px;width:510px;">
	<div style="margin-left:30px; font-family:Verdana, Arial, Helvetica, sans-serif; font-stretch:extra-expanded; margin-bottom:5px; font-size:18px; font-weight:bold;"></div>
			<div><strong>Name : </strong><?php echo strtoupper($row->Name); ?></div>
			<div><strong>PhoneNumber : </strong><?php echo strtoupper($row->PhoneNumber); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<strong>Email : </strong><?php echo strtoupper($row->Email); ?></div>
			<div><strong>Date of Birth : </strong><?php echo strtoupper($row->dob); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<strong>Date of Job : </strong><?php echo strtoupper($row->doj); ?></div>
			<div><strong>Details: </strong><?php echo strtoupper($row->Details); ?></div>
			<div><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?></div>
	</div>
	<?php if($row->Image!=''){?><div style="float:right;margin-top:-100px;"><img style="float:right;margin:0px 0px 0px 0px !important;border-radius: 5px;" src="<?php echo $picpath.$row->Image; ?>" width="90" height="100"/></div><?php } ?>
</div>
	<?php }}?></div></div></div>

<?php //////////////////////////////////////////////////////////////// ?>
