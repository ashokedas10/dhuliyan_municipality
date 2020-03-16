<table width="200"  cellpadding="0" cellspacing="0">

<?php				
	if(count($product_list12) > 0){
	$picpath=BASE_PATH_ADMIN.'uploads/products/';
	$i=1;
	foreach ($product_list12 as $row){
	
?>

<div class="proListInner">

<?php if($i==1) { echo '<tr><td>';  ?>
    <div class="proListBox">
<a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
<div class="proListBoxImage">
<img src="<?php echo  $picpath.$row->image1; ?>" alt="image" width="200" height="200"/>
</div>
<div class="proListBoxText">

<div class="proListBoxTextTop"><?php echo $row->product_name; ?></div>
<div class="proListBoxTextBottom"><?php echo 'Code:'.$row->product_code; ?></div>
<div class="proListBoxTextBottom">Rs.<?php echo $row->amount; ?></div>
</div>
</a>
<a href="<?php echo BASE_URL?>
cmscontaint/add_item_cart/product_listing/<?php echo $row->id; ?>/
<?php echo $this->uri->segment(5); ?>/
<?php echo $this->uri->segment(7); ?>/<?php echo $this->uri->segment(9); ?>">
<div class="proListCart">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
</div>
</a>
</div>
<?php echo '</td>';  } ?>

<?php if($i==2) { echo '<td>';  ?>
<div class="proListBox">
<a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
<div class="proListBoxImage">
<img src="<?php echo  $picpath.$row->image1; ?>" alt="image" width="200" height="200"/>
</div>
<div class="proListBoxText">
<div class="proListBoxTextTop"><?php echo $row->product_name; ?></div>
<div class="proListBoxTextBottom"><?php echo 'Code:'.$row->product_code; ?></div>
<div class="proListBoxTextBottom">Rs.<?php echo $row->amount; ?></div>
</div>
</a>
<a href="<?php echo BASE_URL?>
cmscontaint/add_item_cart/product_listing/<?php echo $row->id; ?>/
<?php echo $this->uri->segment(5); ?>/
<?php echo $this->uri->segment(7); ?>/<?php echo $this->uri->segment(9); ?>">
<div class="proListCart">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
</div>
</a>
</div>
<?php echo '</td>'; } ?>

<?php if($i==3) { echo '<td>';   ?>
<div class="proListBox last">
<a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
<div class="proListBoxImage">
<img src="<?php echo  $picpath.$row->image1; ?>" alt="image" width="200" height="200"/>
</div>
<div class="proListBoxText">
<div class="proListBoxTextTop"><?php echo $row->product_name; ?></div>
<div class="proListBoxTextBottom"><?php echo 'Code:'.$row->product_code; ?></div>
<div class="proListBoxTextBottom">Rs.<?php echo $row->amount; ?></div>
</div>
</a>


<a href="<?php echo BASE_URL?>
cmscontaint/add_item_cart/product_listing/<?php echo $row->id; ?>/
<?php echo $this->uri->segment(5); ?>/
<?php echo $this->uri->segment(7); ?>/<?php echo $this->uri->segment(9); ?>">
<div class="proListCart">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
</div>
</a>

</div>
<?php echo '</td></tr>'; $i=0; }  ?>

</div>

<?php $i=$i+1; }} ?>

</table>








