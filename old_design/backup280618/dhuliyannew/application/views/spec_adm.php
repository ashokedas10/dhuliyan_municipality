<div id="bodyBottomRighty" style="float:left;">
<div class="notice">
<!---------------------------------------------------------------------------------------------------->
<div class="notice"><div class="hot">Administration</div>
	<div class="hhotArea"><ul><?php foreach ($subcategorylist as $subcat){if($subcat->cat_id=='2'){?><li><a href="<?php echo BASE_URL?>cmscontaint/admin_spec/<?php echo $subcat->id;?>"><?php echo strtoupper($subcat->subcat_name);?></a></li><?php }} ?>
</ul></div>
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

<div id="bodyBottom" style="margin-top:-761px;margin-left:345px; float:left;">
<div id="bodyBottomLefty" style="float:left;">
<h2><?php foreach ($subcategorylist as $subcat){if($subcat->id==$dept){echo strtoupper($subcat->subcat_name); }} ?></h2>
<div style="">
<?php foreach ($AdminlistV as $row){ if($row->status=='Active'){?>
<?php // `administration`(`id`, `DesignationDetails`, `Designation`, `Ward_NO`, `Elected_From`, `Contact`, `image`, `status`, `name`) ?>
<?php $picpath=BASE_PATH_ADMIN.'uploads/administration/'; ?>
 <div class="whiteBox" style="float:right; margin-right:10px; margin-top:0px;">
	<img src="<?php echo $picpath.$row->image; ?>"  width="100" height="140"  style="border-radius: 30px;margin-top:-5px;"/>
	<div style="margin-top:25px;">
		<div>Name : <?php echo $row->name; ?></div>
		<div><?php echo $row->DesignationDetails; ?></div>
		<div>Word No : <?php echo $row->Ward_NO; ?></div>
		<div>Elected From : <?php echo $row->Elected_From; ?></div>
		<div>Contact No: <?php echo $row->Contact; ?></div>
	</div>
</div>
<?php }} ?></div></div></div>

<?php //////////////////////////////////////////////////////////////// ?>
