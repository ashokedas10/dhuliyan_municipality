<?php /*?>
<script src="<?php echo BASE_PATH_FRONT;?>theme_files/jqzoom_ev-2.3/js/jquery-1.6.js" type="text/javascript"></script><?php */?>
<script src="<?php echo BASE_PATH_FRONT;?>theme_files/jqzoom_ev-2.3/js/jquery.jqzoom-core.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo BASE_PATH_FRONT;?>theme_files/jqzoom_ev-2.3/css/jquery.jqzoom.css" type="text/css">

<style type"text/css">

body{margin:0px;padding:0px;font-family:Arial; position:relative;}
a img,:link img,:visited img { border: none; }
table { border-collapse: collapse; border-spacing: 0; }
:focus { outline: none; }
*{ margin:0; padding:0; }
p, blockquote, dd, dt{ margin:0 0 8px 0; line-height:1.5em;}
fieldset { padding:0px; padding-left:7px; padding-right:7px; padding-bottom:7px; }
fieldset legend{ margin-left:15px; padding-left:3px; padding-right:3px; color:#333; }
dl dd{ margin:0px; }
dl dt{}
.clearfix:after{ clear:both; content:"."; display:block; font-size:0; height:0; line-height:0; visibility:hidden;}
.clearfix{display:block;zoom:1}
ul#thumblist{display:block;}
ul#thumblist li{float:left;margin-right:2px;list-style:none;}
ul#thumblist li a{display:block;border:1px solid #CCC;}
ul#thumblist li a.zoomThumbActive{  border:1px solid red; }
.jqzoom{ text-decoration:none; float:left; }
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
	$product_id='';
	if(count($product_details) > 0){
	$i = 1;
	$pic_path=BASE_PATH_ADMIN.'uploads/products/';
	foreach ($product_details as $row){
		$product_id=$row->id;
		$alt = ($i%2==0)?'alt1':'alt2';
		if($i<=7) {
?>
<?php //$picpath=BASE_PATH_FRONT.'theme_files/jqzoom_ev-2.3/demos/'; ?>
<div id="bodyWrapper">
<div id="bodyContainer">
<div class="productTop">



<div class="clearfix" id="content" style="margin-top:0px;margin-left:0px; height:0px;width:500px; position:relative;" >

<?php /*?><img src="<?php echo $pic_path.$row->image1; ?>"  width="300" height="300"/><?php */?>
<?php /*?><?php $pic_path=BASE_PATH_ADMIN.'uploads/pic/';?>
<img src="<?php echo $pic_path.'prd1_id_836.PNG'; ?>"  width="300" height="300"/><?php */?>
<?php /*?><div class="clearfix">
        <a href="<?php echo $picpath; ?>imgProd/triumph_big1.jpg" class="jqzoom" rel='gal1'  title="triumph" >
            <img src="<?php echo $picpath; ?>imgProd/triumph_small1.jpg"  title="triumph"  >
        </a>	
    </div>
	<br/>	
 <div class="clearfix" ><ul id="thumblist" class="clearfix" >
	
	<li><a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<?php echo $picpath; ?>./imgProd/triumph_small1.jpg',
		largeimage: '<?php echo $picpath; ?>./imgProd/triumph_big1.jpg'}">
		<img height="70" width="100" src='<?php echo $picpath; ?>imgProd/thumbs/triumph_thumb1.jpg'></a></li>
		
	<li><a href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<?php echo $picpath; ?>./imgProd/triumph_small2.jpg',
		largeimage: '<?php echo $picpath; ?>./imgProd/triumph_big2.jpg'}">
		<img height="70" width="100" src='<?php echo $picpath; ?>imgProd/thumbs/triumph_thumb2.jpg'></a></li>
		
	<li><a  href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<?php echo $picpath; ?>./imgProd/triumph_small3.jpg',
		largeimage: '<?php echo $picpath; ?>./imgProd/triumph_big3.jpg'}">
		<img height="70" width="100" src='<?php echo $picpath; ?>imgProd/thumbs/triumph_thumb3.jpg'></a></li>	
			
	<li><a  href='javascript:void(0);' rel="{gallery: 'gal1', 
		smallimage: '<?php echo $picpath; ?>./imgProd/triumph_small3.jpg',
		largeimage: '<?php echo $picpath; ?>./imgProd/triumph_big3.jpg'}">
		<img height="70" width="100" src='<?php echo $picpath; ?>imgProd/thumbs/triumph_thumb3.jpg'></a></li>
		
</ul></div><?php */?>

<?php $picpath=BASE_PATH_ADMIN.'uploads/pic/';?>
<div class="clearfix">
        <a href="<?php echo $picpath.'bigs/prd1_id_836.PNG'; ?>" class="jqzoom" rel='gal1'>
            <img src="<?php echo $picpath.'prd1_id_836.PNG'; ?>" />
        </a>	
    </div>
	<br/>	
 <div class="clearfix" ><ul id="thumblist" class="clearfix" >
	
	<li><a class="zoomThumbActive" href='javascript:void(0);' 
	rel="{gallery: 'gal1', smallimage: '<?php echo $picpath.'prd1_id_836.PNG'; ?>', largeimage: '<?php echo $picpath.'bigs/prd1_id_836.PNG'; ?>'}">
		<img height="70" width="100" src='<?php echo $picpath.'prd1_id_836.PNG'; ?>'></a></li>
		
	<li><a href='javascript:void(0);' 
	rel="{gallery: 'gal1', smallimage: '<?php echo $picpath.'prd2_id_836.PNG'; ?>', largeimage: '<?php echo $picpath.'bigs/prd2_id_836.PNG'; ?>'}">
	<img height="70" width="100" src='<?php echo $picpath.'prd2_id_836.PNG'; ?>'></a></li>
		
	<li><a  href='javascript:void(0);' 
	rel="{gallery: 'gal1', smallimage: '<?php echo $picpath.'prd3_id_836.PNG'; ?>', largeimage: '<?php echo $picpath.'bigs/prd3_id_836.PNG';?>'}">
		<img height="70" width="100" src='<?php echo $picpath.'prd3_id_836.PNG'; ?>'></a></li>	
			
	<li><a  href='javascript:void(0);' 
	rel="{gallery: 'gal1', smallimage: '<?php echo $picpath.'prd4_id_836.PNG'; ?>', largeimage: '<?php echo $picpath.'bigs/prd4_id_836.PNG'; ?>'}">
		<img height="70" width="100" src='<?php echo $picpath.'prd4_id_836.PNG'; ?>'></a></li>
		
</ul></div>
<?php /*?><div class="clearfix" id="content" style="margin-top:0px;margin-left:0px; height:0px;width:500px;" >
    <div class="clearfix">
        <a href="<?php echo $pic_path.$row->image1; ?>" class="jqzoom" rel="gal1"  title="triumph" />
            <img src="<?php echo $pic_path.$row->image1; ?>" height="230" height="250" title="triumph" />
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

</div><?php */?>


</div>
<?php $picpath=BASE_PATH_ADMIN.'uploads/brand/';
$sql_brand="SELECT * FROM `brands` WHERE `id` IN (SELECT `brand_id` FROM `product` WHERE `id`=".$row->id.")";
$list_brand = $this->projectmodel->get_records_from_sql($sql_brand);
?>

<div class="productTopRight">

<div class="brandTop1">
<?php foreach ($list_brand as $row_brand){  ?>
	<div class="brand"><img src="<?php echo $picpath.$row_brand->images; ?>" width="80" height="50" alt="image" /></div>
<?php } ?>
<div class="brandRight" style="margin-top:5px;">
<h2 style=" font:Verdana, Arial, Helvetica, sans-serif; font-size:16px;"><?php echo $row->product_name." ".$row->product_code; ?></h2>
<!--<h3>White and Black,16GB....Sub details</h3>
<h4>
<a href="#">Review</a> | 
<a href="#">Add To My Wishlist</a> | 
<a href="#">Add To Compare</a>
</h4>-->
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
<h2>Product Specification</h2>

<?php /*?><br class="clear" />
<br class="clear" /><?php */?>
<div class="details"><?php echo $row->details; ?></div>
</div>
<br class="clear" />
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<?php foreach($feedback as $row_feedback){  if($row_feedback->product_id==$product_id){?>
<?php //echo "hello ";?>
	<div style="margin-top:5px; margin-bottom:3px;">
	<div style="background-color:#CCFFCC; border:#999999 thin solid; padding-left:5px; padding-top:5px; padding-bottom:5px; padding-right:5px; margin-right:45px; margin-left:10px; border-radius:14px;">
	<div style=" background-color:#FFFFFF; border:#999999 thin dotted; padding-left:25px; padding-top:10px; border-radius:11px; ">
	<p style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><?php echo $row_feedback->user_name;?><br />
	<?php echo $row_feedback->feedback;?>
	</p>
	</div>
	</div>
	</div>
<?php } } ?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<div style="padding:10px; padding-left:25px; padding-top:25px; padding-bottom:25px; padding-right:25px; background-color:#FFCCFF; margin-right:45px; margin-left:10px; border-radius:14px; margin-bottom:10px;">
<div style="background-color:#FFFFCC; border:#CCCCCC thin dotted; border-radius:11px; padding-left:25px; padding-top:10px; ">
	<form action="<?php echo BASE_URL?>cmscontaint/feedback_section/" method="POST">
	<input type="hidden" id="product_id" name="product_id" value=<?php  echo $product_id; ?> />
	<table>
	<tr><td><p style="font-family:'Bookman Old Style'; font-size:18px;">Name or Email Id: &nbsp; &nbsp;</p></td><td><input type="text" name="user_name" id="user_name" size="60" /></td></tr>
	<tr><td><p style="font-family:'Bookman Old Style'; font-size:18px;">Feedback:</td><td><textarea name="feedback" id="feedback" cols="70" rows="4"></textarea></td></tr>
	<tr><td colspan="2"><center><br /><input type="submit" value="submit" id="feedback_btm" name="feedback_btm" style="background-color:#999999; color:#000000; height:25px; width:70px; border-radius:4px; box-shadow: 5px 5px 5px #888888; " /></center></td></tr>
	</table>
	</form>
</div>
</div>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<br class="clear" />
<div style="margin-bottom:-50px;">
<?php 
$sqlbrand="SELECT * FROM `brands` WHERE `images`!=''"; 
$brandlist = $this->projectmodel->get_records_from_sql($sqlbrand);
$picpath=BASE_PATH_ADMIN.'uploads/brand/';
?>
	
<script type="text/javascript">

/***********************************************
* Conveyor belt slideshow script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/


//Specify the slider's width (in pixels)
var sliderwidth="985px"
//Specify the slider's height
var sliderheight="90px"
//Specify the slider's slide speed (larger is faster 1-10)
var slidespeed=3
//configure background color:
slidebgcolor="#EAEAEA"

//Specify the slider's images
var leftrightslide=new Array()
var finalslide=''
<?php $i=0;	foreach ($brandlist as $row_brand){	?>

leftrightslide[<?php echo $i;?>]='<a href="<?php echo BASE_URL?>cmscontaint/product_list_brand/brand/<?php echo $row_brand->id;?>"><img width="110" height="90" src="<?php echo $picpath.$row_brand->images; ?>" border=1></a>'

<?php $i++; } ?>
//Specify gap between each image (use HTML):
var imagegap=" "

//Specify pixels gap between each slideshow rotation (use integer):
var slideshowgap=5


////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=slidespeed
leftrightslide='<nobr>'+leftrightslide.join(imagegap)+'</nobr>'
var iedom=document.all||document.getElementById
if (iedom)
document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">'+leftrightslide+'</span>')
var actualwidth=''
var cross_slide, ns_slide

function fillup(){
if (iedom){
cross_slide=document.getElementById? document.getElementById("test2") : document.all.test2
cross_slide2=document.getElementById? document.getElementById("test3") : document.all.test3
cross_slide.innerHTML=cross_slide2.innerHTML=leftrightslide
actualwidth=document.all? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth
cross_slide2.style.left=actualwidth+slideshowgap+"px"
}
else if (document.layers){
ns_slide=document.ns_slidemenu.document.ns_slidemenu2
ns_slide2=document.ns_slidemenu.document.ns_slidemenu3
ns_slide.document.write(leftrightslide)
ns_slide.document.close()
actualwidth=ns_slide.document.width
ns_slide2.left=actualwidth+slideshowgap
ns_slide2.document.write(leftrightslide)
ns_slide2.document.close()
}
lefttime=setInterval("slideleft()",30)
}
window.onload=fillup

function slideleft(){
if (iedom){
if (parseInt(cross_slide.style.left)>(actualwidth*(-1)+8))
cross_slide.style.left=parseInt(cross_slide.style.left)-copyspeed+"px"
else
cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth+slideshowgap+"px"

if (parseInt(cross_slide2.style.left)>(actualwidth*(-1)+8))
cross_slide2.style.left=parseInt(cross_slide2.style.left)-copyspeed+"px"
else
cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth+slideshowgap+"px"

}
else if (document.layers){
if (ns_slide.left>(actualwidth*(-1)+8))
ns_slide.left-=copyspeed
else
ns_slide.left=ns_slide2.left+actualwidth+slideshowgap

if (ns_slide2.left>(actualwidth*(-1)+8))
ns_slide2.left-=copyspeed
else
ns_slide2.left=ns_slide.left+actualwidth+slideshowgap
}
}


if (iedom||document.layers){
with (document){
document.write('<table border="0" cellspacing="0" cellpadding="0"><td>')
if (iedom){
write('<div style="position:relative;width:'+sliderwidth+';height:'+sliderheight+';overflow:hidden">')
write('<div style="position:absolute;width:'+sliderwidth+';height:'+sliderheight+';background-color:'+slidebgcolor+'" onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed">')
write('<div id="test2" style="position:absolute;left:0px;top:0px"></div>')
write('<div id="test3" style="position:absolute;left:-1000px;top:0px"></div>')
write('</div></div>')
}
else if (document.layers){
write('<ilayer width='+sliderwidth+' height='+sliderheight+' name="ns_slidemenu" bgColor='+slidebgcolor+'>')
write('<layer name="ns_slidemenu2" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')
write('<layer name="ns_slidemenu3" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')
write('</ilayer>')
}
document.write('</td></table>')
}
}
</script>
</div>
<!--<p align="center"><font face="Arial" size="-2">Free DHTML scripts provided by<br>
<a href="http://dynamicdrive.com">Dynamic Drive</a></font></p>-->
<!--<br class="clear" />-->
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
</div>
</div>
</div>
<!--<br class="clear" />-->
</div>
</div>
</div>
<?php $i++;}}} ?>
