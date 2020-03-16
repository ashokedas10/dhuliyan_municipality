<?php //print_r($bannerlist);?>
<div id="slider">
			<ul>	
	<?php foreach ($bannerlist as $row){ $picpath=BASE_PATH_ADMIN.'uploads/banner/';?>						
<li><div class="pic"><img src="<?php echo $picpath.$row->images;?>" width="100%" height="100%" /></div></li>
	<?php } ?>
			</ul>
	  </div>
