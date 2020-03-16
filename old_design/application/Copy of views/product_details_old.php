<?php
	if(count($product_details) > 0){
	$i = 1;
	$picpath=BASE_PATH_ADMIN.'uploads/products/';
	foreach ($product_details as $row){
		$alt = ($i%2==0)?'alt1':'alt2';
		if($i<=7) {
?>
<div id="bodyWrapper">
<div id="bodyContainer">
<div class="productTop">
<div class="productTopLeft">
<img src="<?php echo $picpath.$row->image1; ?>" alt="image" width="405"  height="490"/>
</div>
<div class="productTopRight">

<div class="brandTop1">
<?php /*?><div class="brand"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/brand.jpg" alt="image" /></div><?php */?>
<div class="brandRight">
<h2><?php echo $row->product_name; ?></h2>
<h3>White and Black,16GB....Sub details</h3>
<h4>
<a href="#">Review</a> | 
<a href="#">Add To My Wishlist</a> | 
<a href="#">Add To Compare</a>
</h4>
</div>
</div>

<div class="brandBottom">
<div class="productBox">
<div class="productBoxTop">
<div class="rupee">Rs. <?php echo $row->amount; ?></div>
<div class="select">
<?php /*?><h2>Select size</h2>
<div class="selectBottom">
<a href="#">S</a>
<a href="#">M</a>
<a href="#">L</a>
<a href="#">XL</a>
</div><?php */?>
<div class="carrt"><a href="<?php echo BASE_URL?>cmscontaint/add_item_cart/product_details/<?php echo $row->id; ?>"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/addtocart.jpg" alt="image" /></a></div>
<div class="save"><a href="#">SAVE FOR LATER</a></div>
</div>
</div>
<div class="productBoxBottom">
<span><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/flike.jpg" alt="image" /></span><span><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/glike.jpg" alt="image" /></span><span><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/tweet.jpg" alt="image" /></span><span><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/print.jpg" alt="image" /></span></div>

</div>
<div class="productBoxRight">
<div class="productBoxInner">
<table width="326" cellspacing="0" cellpadding="0">
  <tr>
    <td width="38" align="center" valign="middle" class="doty"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/ship.jpg" alt="image" /></td>
    <td width="286" align="left" valign="middle" class="dotyy">Shipped in<br />
1 business day </td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="doty"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/clock.jpg" alt="image" /></td>
    <td align="left" valign="middle" class="dotyy">Check delivery time &amp;<br /> COD availability</td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="doty">30</td>
    <td align="left" valign="middle" class="dotyy">DAYS FREE<br /> RETURN/EXCHANGE</td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="doty"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/gift.jpg" alt="image" /></td>
    <td align="left" valign="middle" class="dotyy">GIFT WRAP AVAILABLE</td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="doty">Free</td>
    <td align="left" valign="middle" class="dotyy">HOME DELIVERY</td>
  </tr>
 <tr>
    <td align="center" valign="middle" class="doty">100%</td>
    <td align="left" valign="middle" class="dotyy">authentic brands<br />
and products</td>
  </tr>
  </table>
</div>
</div>
</div>
</div>
<br class="clear" /></div>

<div class="productBottom">
<div class="productBottomLeft">
<h2>Product Info &amp; Care</h2>
<div align="justify"><?php echo $row->details; ?></div>
</div>
<br class="clear" />
</div>
</div>
</div>

<?php $i++;}}} ?>