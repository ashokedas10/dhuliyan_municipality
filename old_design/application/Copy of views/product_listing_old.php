<div id="bodyWrapper">
<div id="bodyContainer">
<div class="proTop">

<!--LEFT CATEGORY/ATTRIBUTE-->

<div class="leftArea">
<div class="categoryTable">
<div class="categoryHead">Category</div>
<div class="categoryBody">
<h2>Clothing</h2>
<ul>
<li><a href="#">T-Shirts (6747)</a></li>
<li><a href="#">Shirts (5695)</a></li>
<li><a href="#">Winter Wear (1832)</a></li>
<li><a href="#">Jeans (1385)</a></li>
<li><a href="#">Trousers (1304)</a></li>
<li><a href="#">Inner Wear (1242)</a></li>
<li><a href="#">Shorts &nbsp; 3/4ths (753)</a></li>
<li><a href="#">Sports Wear (627)</a></li>
<li><a href="#">Ethnic Wear (582)</a></li>
<li><a href="#">Trackwear (345)</a></li>
<li><a href="#">Ties &nbsp; Cufflinks (342)</a></li>
<li><a href="#">Socks (311)</a></li>
<li><a href="#">Caps &nbsp; Scarves (194)</a></li>
<li><a href="#">Blazers (127)</a></li>
<li><a href="#">Suits (125)</a></li>
<li><a href="#">Night Wear (85)</a></li>
<li><a href="#">Clothing Accessories (77)</a></li>
<li><a href="#">Rain Wear (4)</a></li>
<br class="clear" /> 
</ul>
</div>
</div>
<div class="categoryTable">
<div class="categoryHead">Brand</div>
<div class="categoryBody">
<ul>
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>2GO ACTIVE GEAR USA(27)</span></a></li> 
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>98 Degree North(19</span></a></li> 
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>Abhiyuthan(45)</span></a></li> 
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>Adidas(371)</span></a></li> 
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>Adidas Originals(92)</span></a></li> 
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>Aditi Wasan(10)</span></a></li> 
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>Alano(13)</span></a></li> 
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>Alessio69(46)</span></a></li> 
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>Allen Solly(152)</span></a></li> 
<li><a href="#"><span><input name="" type="checkbox" value="" /></span><span>Alluxe(3)</span></a></li> 
<br class="clear" /> 
</ul>
</div>
</div>
<div class="categoryTable">
<div class="categoryHead">Price</div>
<div class="categoryBody">
<ul>
<li><a href="#"><span><input name="" type="radio" value="" /></span><span>below Rs. 900 (9080)</span></a></li> 
<li><a href="#"><span><input name="" type="radio" value="" /></span><span>Rs. 900 - Rs. 1500 (6239)</span></a></li> 
<li><a href="#"><span><input name="" type="radio" value="" /></span><span>Rs. 1501 - Rs. 2500 (4499)</span></a></li> 
<li><a href="#"><span><input name="" type="radio" value="" /></span><span>Rs. 2501 - Rs. 3500 (811)</span></a></li> 
<li><a href="#"><span><input name="" type="radio" value="" /></span><span>above Rs. 3500 (524)</span></a></li>  
<br class="clear" /> 
</ul>
<h3>Enter a price range in Rs.</h3>
<p>
<input name="" type="text" class="inbox" /> - <input name="" type="text" class="inbox" /> <input name="" type="button" value="Go" class="buton" />
</p>
</div>
</div>
</div>

<!--LEFT CATEGORY/ATTRIBUTE-->

<div class="rightArea">
<div class="scrolArea">

<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/picture2.jpg" style="border: 0px none; opacity: 1;" id="blendimage" alt="" class="reflect">	

	   
</div>
<div class="scrollBottom">
<div class="proList">
<h2> Products</h2>

<p>&nbsp;</p>
<table width="200"  cellpadding="0" cellspacing="0">
<?php
		
		
		$sql1="SELECT * FROM product";
		$product_list12 = $this->projectmodel->get_records_from_sql($sql1);	
		
		// category
		if($this->uri->segment(5)<>0)
		{
		$catid=$this->uri->segment(5);
		$sql1="SELECT * FROM product
						WHERE subcat_id
						IN ( 
						SELECT id
						FROM subcategory
						WHERE category_id='$catid' 
						)  ";
		$product_list12 = $this->projectmodel->get_records_from_sql($sql1);	
		}
		
		if($this->uri->segment(7)<>0)
		{
		$catid=$this->uri->segment(5);
		$subcatid=$this->uri->segment(7);
		$sql1="SELECT * FROM product WHERE subcat_id='$subcatid' ";
		$product_list12= $this->projectmodel->get_records_from_sql($sql1);	
		}
		
		if($this->uri->segment(9)<>0)
		{
		$catid=$this->uri->segment(5);
		$subcatid=$this->uri->segment(7);
		$brandid=$this->uri->segment(9);
		
		$sql1="SELECT * FROM product
						WHERE subcat_id
						IN ( 
						SELECT id
						FROM subcategory
						WHERE category_id='$catid' 
						) and brand_id='$brandid'  ";
		$product_list12=$this->projectmodel->get_records_from_sql($sql1);	
		}
		
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
<a href="#">
<div class="proListCart">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
</div>
</a>

</div>
<?php echo '</td></tr>'; $i=0; }  ?>

</div>


<?php $i=$i+1; }} ?>
</table>
<?php //echo $this->pagination->create_links();?>
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