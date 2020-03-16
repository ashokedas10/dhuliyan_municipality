<div id="sidebar">
	
	<!--<h3>Feugiat sem praesent</h3>
	<p>Aliquam sed vulputate curabitur convallis dignissim. Phasellus sed convallis condimentum et amet hendrerit neque sit euismod.</p>-->
	<?php foreach ($categorylist as $row){?><h3><a href="<?php echo BASE_URL?>cmscontaint/left_listing/<?php echo $row->id;?>"><?php echo strtoupper($row->cat_name); ?></a></h3>
	<ul class="linkedList">
		<?php foreach ($subcategorylist as $row1){ if($row1->cat_id==$row->id){?>
				<li id="leftpanel"><a href="<?php echo BASE_URL?>cmscontaint/subcat_listing/<?php echo $row->id;?>/<?php echo $row1->id;?>"><?php echo strtoupper($row1->subcat_name); ?></a></li>
		<?php } }?>		
	</ul>
	<?php } ?>
</div>