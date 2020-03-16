<div id="bodyBottomRighty" style="float:left;">
<div class="notice">
<!----------------------------------->
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
