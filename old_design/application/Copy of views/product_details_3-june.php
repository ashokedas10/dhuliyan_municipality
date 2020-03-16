<?php /*?>
<script src="<?php echo BASE_PATH_FRONT;?>theme_files/jqzoom_ev-2.3/js/jquery-1.6.js" type="text/javascript"></script><?php */?>
<script src="<?php echo BASE_PATH_FRONT;?>theme_files/jqzoom_ev-2.3/js/jquery.jqzoom-core.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo BASE_PATH_FRONT;?>theme_files/jqzoom_ev-2.3/css/jquery.jqzoom.css" type="text/css">

<style type"text/css">

body{margin:0px;padding:0px;font-family:Arial;}

a img,:link img,:visited img { border: none; }
table { border-collapse: collapse; border-spacing: 0; }
:focus { outline: none; }
*{margin:0;padding:0;}
p, blockquote, dd, dt{margin:0 0 8px 0;line-height:1.5em;}
fieldset {padding:0px;padding-left:7px;padding-right:7px;padding-bottom:7px;}
fieldset legend{margin-left:15px;padding-left:3px;padding-right:3px;color:#333;}
dl dd{margin:0px;}
dl dt{}
.clearfix:after{clear:both;content:".";display:block;font-size:0;height:0;line-height:0;visibility:hidden;}
.clearfix{display:block;zoom:1}
ul#thumblist{display:block;}
ul#thumblist li{float:left;margin-right:2px;list-style:none;}
ul#thumblist li a{display:block;border:1px solid #CCC;}
ul#thumblist li a.zoomThumbActive{
    border:1px solid red;
}
.jqzoom{
	text-decoration:none;
	float:left;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
			//preloadText'Loading zoom',
			zoomWidth: 600,  
            zoomHeight: 550,  
            lens:true,
            preloadImages: false,
            alwaysOn:false
        });
	
});


</script>

<?php
	if(count($product_details) > 0){
	$i = 1;
	$pic_path=BASE_PATH_ADMIN.'uploads/products/';
	foreach ($product_details as $row){
		$alt = ($i%2==0)?'alt1':'alt2';
		if($i<=7) {
?>
<? $picpath=BASE_PATH_FRONT.'theme_files/jqzoom_ev-2.3/demos/'; ?>
<div id="bodyWrapper">
<div id="bodyContainer">
<div class="productTop">



<div class="clearfix" id="content" style="margin-top:0px;margin-left:0px; height:0px;width:500px;" >

<img src="<?php echo $pic_path.$row->image1; ?>"  width="300" height="300"/>

    <?php /*?><div class="clearfix">
        <a href="<? echo $picpath; ?>imgProd/triumph_big1.jpg" class="jqzoom" rel='gal1'  title="triumph" >
            <img src="<? echo $picpath; ?>imgProd/triumph_small1.jpg"  title="triumph"  >
        </a>	
    </div>
	<br/>	
 <div class="clearfix" ><ul id="thumblist" class="clearfix" >
	
	<li><a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<? echo $picpath; ?>./imgProd/triumph_small1.jpg',
		largeimage: '<? echo $picpath; ?>./imgProd/triumph_big1.jpg'}">
		<img height="70" width="100" src='<? echo $picpath; ?>imgProd/thumbs/triumph_thumb1.jpg'></a></li>
		
	<li><a href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<? echo $picpath; ?>./imgProd/triumph_small2.jpg',
		largeimage: '<? echo $picpath; ?>./imgProd/triumph_big2.jpg'}">
		<img height="70" width="100" src='<? echo $picpath; ?>imgProd/thumbs/triumph_thumb2.jpg'></a></li>
		
	<li><a  href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<? echo $picpath; ?>./imgProd/triumph_small3.jpg',
		largeimage: '<? echo $picpath; ?>./imgProd/triumph_big3.jpg'}">
		<img height="70" width="100" src='<? echo $picpath; ?>imgProd/thumbs/triumph_thumb3.jpg'></a></li>	
			
	<li><a  href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<? echo $picpath; ?>./imgProd/triumph_small3.jpg',
		largeimage: '<? echo $picpath; ?>./imgProd/triumph_big3.jpg'}">
		<img height="70" width="100" src='<? echo $picpath; ?>imgProd/thumbs/triumph_thumb3.jpg'></a></li>
		
</ul></div><?php */?>



<?php /*?>
<div class="clearfix" id="content" style="margin-top:0px;margin-left:0px; height:0px;width:500px;" >
    <div class="clearfix">
        <a href="<?php echo $pic_path.$row->image1; ?>" class="jqzoom" rel='gal1'  title="triumph" >
            <img src="<?php echo $pic_path.$row->image1; ?>" height="230" height="250" title="triumph"  >
        </a>	
    </div>
	<br/>	
<div class="clearfix" ><ul id="thumblist" class="clearfix" >
	<li><a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', 
	    smallimage: '<?php echo $pic_path.$row->image1; ?>',
		largeimage: '<?php echo $pic_path.$row->image1; ?>'}">
		<img height="70" width="100" src='<?php echo $pic_path.$row->image1; ?>'></a></li>
	<li><a href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<?php echo $pic_path.$row->image1; ?>',
		largeimage: '<?php echo $pic_path.$row->image1; ?>'}">
		<img height="70" width="100" src='<?php echo $pic_path.$row->image1; ?>'></a></li>
	<li><a  href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<?php echo $pic_path.$row->image3; ?>',
		largeimage: '<?php echo $pic_path.$row->image3; ?>'}">
		<img height="70" width="100" src='<?php echo $pic_path.$row->image3; ?>'></a></li>		
	<li><a  href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<?php echo $pic_path.$row->image4; ?>',
		largeimage: '<?php echo $pic_path.$row->image4; ?>'}">
		<img height="70" width="100" src='<?php echo $pic_path.$row->image4; ?>'></a></li>
</ul></div>
<?php */?>
</div>


<div class="productTopRight">

<div class="brandTop1">
<?php ?><div class="brand"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/brand.jpg" alt="image" /></div><?php ?>
<div class="brandRight">
<h2><?php echo $row->product_name." ".$row->product_code; ?></h2>
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
<div class="carrt"><a href="<?php echo BASE_URL?>cmscontaint/add_item_cart/product_details/<?php echo $row->id; ?>"><img height="43" width="224" src="<?php echo BASE_PATH_FRONT;?>theme_files/images/addtocart.jpg" alt="image" /></a><br /><br />
<a href="<?php echo BASE_URL?>cmscontaint/add_item_cart/product_details_buy_now/<?php echo $row->id; ?>"><img height="43" width="224" src="<?php echo BASE_PATH_FRONT;?>theme_files/images/buynow.jpg" alt="image" /></a>
</div>

<!--<div class="save"><a href="#">SAVE FOR LATER</a></div>-->
</div>
</div>
<!--<div class="productBoxBottom">
<span><img src="<?php //echo BASE_PATH_FRONT;?>theme_files/images/flike.jpg" alt="image" /></span><span><img src="<?php //echo BASE_PATH_FRONT;?>theme_files/images/glike.jpg" alt="image" /></span><span><img src="<?php //echo BASE_PATH_FRONT;?>theme_files/images/tweet.jpg" alt="image" /></span><span><img src="<?php //echo BASE_PATH_FRONT;?>theme_files/images/print.jpg" alt="image" /></span></div>-->

</div>
<div class="productBoxRight">
<div class="productBoxInner">
<table width="187" cellspacing="0" cellpadding="0">
  <tr>
    <td width="38" align="center" valign="middle" class="doty"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/ship.jpg" alt="image" /></td>
    <td width="181" align="left" valign="middle" class="dotyy">Shipped in<br />
1 to 3 business days * </td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="doty"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/clock.jpg" alt="image" /></td>
    <td align="left" valign="middle" class="dotyy">    Cash on Delevery Availability * </td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="doty"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/gift.jpg" alt="image" /></td>
    <td align="left" valign="middle" class="dotyy">GIFT WRAP AVAILABLE * </td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="doty">Free</td>
    <td align="left" valign="middle" class="dotyy">HOME DELIVERY * </td>
  </tr>
 <tr>
    <td align="center" valign="middle" class="doty2">100%</td>
    <td align="left" valign="middle" class="dotyy2">Authentic Brands<br />
And Products * </td>
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
<? 
$sqlattr="select id,field_name from attribute_table where subcategory_id in(select subcat_id from product where id=".$row->id.")"; 
$listattr=$this->projectmodel->get_records_from_sql($sqlattr);
?>
<br class="clear" />
<br class="clear" />
<div align="justify"><tabledata>
<table>
<? 
foreach ($listattr as $rowattr){  
$sqlattrval="select attribute_value from product_attribute_value where attribute_table_id = ".$rowattr->id." and product_id = ".$row->id; 
$listattrval=$this->projectmodel->get_records_from_sql($sqlattrval);
foreach ($listattrval as $rowattrval){  
?>
<tr>
<td><b><? echo $rowattr->field_name;?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b></td>
<td><? echo $rowattrval->attribute_value;?> </td>
</tr>
<? }  } ?>
</table></tabledata>
</div>
<br class="clear" />
<br class="clear" />
</div>
<div class="productBottomLeft">
<h2>Product Specification</h2>

<br class="clear" />
<br class="clear" />
<div class="details"><?php echo $row->details; ?></div>
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
<?php $i++;}}} ?>


<!--
<br class="clear" />
<br class="clear" />
<div class="bottomLogo"></div>
</div>
</div>
<? //} } }?>-->