<div id="bodyBottomRighty" style="float:left;">
<div class="notice">
<!----------------------------------->
<?php if($pageid==2){ ?>
	<div class="notice"><div class="hot">Administration</div>
	<div class="hhotArea"><ul><?php foreach ($subcategorylist as $subcat){if($subcat->cat_id=='2'){?><li><a href="<?php echo BASE_URL?>cmscontaint/admin_spec/<?php echo $subcat->id;?>"><?php echo strtoupper($subcat->subcat_name);?></a></li><?php }} ?>
</ul></div>
<?php }?>
<!---------------------------------------------------------------------------------------------------->
<?php if($pageid==5){ ?>
	<div class="notice"><div class="hot">Depertment</div>
	<div class="hhotArea"><ul>
	<?php foreach ($subcategorylist as $row){ if($row->cat_id=='5'){?>
	<li><a href="<?php echo BASE_URL?>cmscontaint/dept_spec/<?php echo $row->id;?>"><?php echo strtoupper($row->subcat_name); ?></a></li><?php } } ?></ul></div>
<?php }?>
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
<marquee height="130" onmouseout="scrollDelay=1" onmouseover=" scrollDelay=1000000" scrollamount="2" direction="up">
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
<?php if($pageid==2){ ?>
<div id="bodyBottom" style="margin-top:-765px;margin-left:345px; float:left;">
<div id="bodyBottomLefty" style="float:left;">
<h2>Administration</h2>
<div style="">
<?php foreach ($Adminlist as $row){ if($row->status=='Active'){?>
<?php // `administration`(`id`, `DesignationDetails`, `Designation`, `Ward_NO`, `Elected_From`, `Contact`, `image`, `status`, `name`) ?>
<?php $picpath=BASE_PATH_ADMIN.'uploads/administration/'; ?>
 <div class="whiteBox" style="float:right; margin-right:10px; margin-top:0px;">
	<img src="<?php echo $picpath.$row->image; ?>"  width="100" height="140"  style="border-radius: 30px;margin-top:-5px;"/>
	<div style="margin-top:25px;">
		<div>
		<?php foreach ($subcategorylist as $subcat){if($subcat->id==$row->Designation){echo strtoupper($subcat->subcat_name); }} ?></div>
		<div>Name : <?php echo $row->name; ?></div>
		<div><?php echo $row->DesignationDetails; ?></div>
		<div>Word No : <?php echo $row->Ward_NO; ?></div>
		<div>Elected From : <?php echo $row->Elected_From; ?></div>
		<div>Contact No: <?php echo $row->Contact; ?></div>
	</div>
</div>
<?php }} ?>
</div></div></div>
<?php } ?>
<?php //////////////////////////////////////////////////////////////// ?>
<?php if($pageid==10){ include 'tender_details.php'; } ?>
<?php //////////////////////////////////////////////////////////////// ?>
<?php if($pageid==5){ ?>
<div id="bodyBottom" style="margin-top:-685px;margin-left:345px; float:left;">
<div id="bodyBottomLefty" style="float:left;">
<h2>Depertment</h2>
<div style="">
	<?php include 'depertment_view.php'; ?>
</div></div></div>
<?php } ?>
<? ///////////////////////////////////////////////////////////////////////////// ?>
<?php if($pageid==6){ ?>
<div id="bodyBottom" style="margin-top:-448px;margin-left:345px; float:left;">
<div id="bodyBottomLefty" style="float:left;">
<h2>Services</h2>
<div style="">
<?php foreach ($servicelist as $row){ if($row->status=='Active'){?>
<?php // `service`(`id`, `SubCatId`, `title`, `images`, `doocument`, `details`, `status`)  ?>
<?php $picpath=BASE_PATH_ADMIN.'uploads/service/'; ?>
<div class="whiteBox" style="float:right; margin-right:10px; margin-top:0px;">
<!--<div style="width:100%;margin-top:5px;margin-bottom:5px;">-->
	<div style="width:80%;height:120px;margin-top:10px;float:left;">
		<div>Title : <?php echo $row->title; foreach ($subcategorylist as $subcat){if($subcat->id==$row->SubCatId){echo ' [ '.strtoupper($subcat->subcat_name).' ] '; }} ?></div>
		<div><?php echo $row->details; ?></div>
		<div><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?></div>
	</div>	
	<?php if($row->images!=''){?><div style="float:right;margin-top:0px;"><img style="float:right;margin:0px 0px 0px 0px !important;border-radius: 5px;" src="<?php echo $picpath.$row->images; ?>"  width="100" height="100"/></div><?php } ?>	
</div>
<?php }} ?>
</div></div></div>
<?php } ?>
<? /////////////////////////////////////////////////////////////////////////////// ?>
<?php if($pageid==3){ ?>
<div id="bodyBottom" style="margin-top:-448px;margin-left:345px; float:left;">
<div id="bodyBottomLefty" style="float:left;">
<h2>Public Work</h2>
<div style="">
<?php foreach ($publicworklist as $row){ if($row->status=='Active'){?>
<?php // `service`(`id`, `SubCatId`, `title`, `images`, `doocument`, `details`, `status`)  ?>
<?php $picpath=BASE_PATH_ADMIN.'uploads/service/'; ?>
<!--<div style="width:100%;margin-top:5px;margin-bottom:5px;">-->
<div class="whiteBox" style="float:right; margin-right:10px; margin-top:0px;">
	<div style="width:80%;height:120px;margin-top:10px;float:left;">
		<div>Title : <?php echo $row->title; foreach ($subcategorylist as $subcat){if($subcat->id==$row->SubCatId){echo ' [ '.strtoupper($subcat->subcat_name).' ] '; }} ?></div>
		<div><?php echo $row->details; ?></div>
		<div><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?></div>
	</div>	
	<?php if($row->images!=''){?><div style="float:right;margin-top:0px;"><img style="float:right;margin:0px 0px 0px 0px !important;border-radius: 5px;" src="<?php echo $picpath.$row->images; ?>"  width="100" height="100" /></div><?php } ?>	
</div>
<?php }} ?>
</div></div></div>
<?php } ?>
<?php ////////////////////////////////////////////////////////////////////////////// ?>
<?php if($pageid==8){ ?>
<div id="bodyBottom" style="margin-top:-448px;margin-left:345px; float:left;">
<div id="bodyBottomLefty" style="float:left;">
<h2>Projects</h2> 
<div style="">
<?php foreach ($projectlist as $row){ if($row->status=='Active'){?>
<?php $picpath=BASE_PATH_ADMIN.'uploads/project/'; ?>
<!--<div style="width:100%;margin-top:5px;margin-bottom:15px;">-->
<div class="whiteBox" style="float:right; margin-right:10px; margin-top:0px;">
	<div style="width:80%;height:120px;margin-top:10px;float:left;">
	<div style="margin-left:30px; font-family:Verdana, Arial, Helvetica, sans-serif; font-stretch:extra-expanded; margin-bottom:5px; font-size:28px; font-weight:bold;"><?php foreach ($subcategorylist as $r1){if($r1->id==$row->SubCatId){ echo $r1->subcat_name; }}?></div>
		<div>Title : <?php echo $row->title." [ ".$row->title_description." ] "; ?></div>
		<div><?php echo $row->details; ?></div>
		<div><?php echo "<strong>Starting Date : </strong>".$row->startingdate."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Closing Date : </strong>".$row->closingdate; ?></div>
		<div><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?></div>
	</div>	
	<?php if($row->images!=''){ ?><div style="float:right;margin-top:0px;"><img style="float:right;margin:0px 0px 0px 0px !important;border-radius: 5px;" src="<?php echo $picpath.$row->images; ?>"  width="100" height="100" /></div><?php } ?>	
</div>
<?php }}  ?>
</div></div></div>
<?php } ?>
<?php /////////////////////////////////////////////////////////////////////////////////?>
<?php if($pageid==9){ ?>
<div id="bodyBottom" style="margin-top:-448px;margin-left:345px; float:left;">
<div id="bodyBottomLefty" style="float:left;">
<h2>Contact Us</h2>
<!-------------------------------------------------------------------->
<div style="margin-left:10px;">
<?php foreach ($contentlist as $row){ if($row->status=='Active'){?>
<?php include('contactus_form.php');?>
<div class="con"><h2><?php echo $row->content_initials; ?></h2>
<div class="conRow"><?php if($row->details!=''){echo $row->details;} ?></div>
<div class="conRow" style="float:left; margin:0px 0px 0px 0px !important; width:90% !important;"><?php if($row->images!=''){ $picpath=BASE_PATH_ADMIN.'uploads/contents/';?><img style="float:left !important;magin:0px 0px 0px 0px !important;" src="<?php echo $picpath.$row->images;?>" width="110%" height="80%" /><?php } ?></div>
</div>
<?php }}  ?>
</div>
</div></div>
<?php } ?>