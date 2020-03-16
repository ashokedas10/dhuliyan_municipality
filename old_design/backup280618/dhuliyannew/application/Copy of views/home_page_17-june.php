
<div id="bodyWrapper">
<div id="bodyContainer">

<div class="bannerArea">
<div class="banner">
<div style="width:100%;" id="s5_imageouter">
<div id="s5_imageinner" style="height:335px;">
<div class="module"><div>
<div>
<div>
	
<div style="height:335px; width:100%; overflow:hidden; background:#">
<div id="slider">
<ul>	
<?php 
$picpath=BASE_PATH_ADMIN.'uploads/banner/';
$sql="select * from banner where brand_name='TOP_LEFT' ";
$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
foreach ($rowrecord as $row1)
{ 			
$scatid='';
$catid='';
$rlink='';
$prdid='';

if($row1->link_type=='SUBCATEGORY')
{
$scatid=$row1->subcat_id;
$catid=0;
$rlink='cmscontaint/product_listing/product_listing/ct/'.$catid.'/scat/'.$scatid.'0/brand/0';
}

if($row1->link_type=='PRODUCT')
{
$prdid=$row1->product_id;
$rlink='cmscontaint/product_details/home_page/'.$prdid;
}		

?>
<li>
<div class="pic">
<a href="<?php //echo BASE_URL.$rlink?>">
<img src="<?php echo $picpath.$row1->images; ?>" />
</a>

</div>
</li>
<?php } ?>		
</ul>

</div>

</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

<div class="bannerRight">
<?php 
$picpath=BASE_PATH_ADMIN.'uploads/banner/';
$sql="select * from banner where brand_name='TOP_RIGHT_TOP' LIMIT 0 ,1 ";
$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
foreach ($rowrecord as $row1)
{ 
$scatid='';
$catid='';
$rlink='';
$prdid='';

if($row1->link_type=='SUBCATEGORY')
{
$scatid=$row1->subcat_id;
$catid=0;
$rlink='cmscontaint/product_listing/product_listing/ct/'.$catid.'/scat/'.$scatid.'0/brand/0';
}

if($row1->link_type=='PRODUCT')
{
$prdid=$row1->product_id;
$rlink='cmscontaint/product_details/home_page/'.$prdid;
}		
			
?>
<a href="<?php echo BASE_URL.$rlink?>">
<img src="<?php echo $picpath.$row1->images; ?>" alt="image" />
</a>
<?php } ?>	

<?php 
$picpath=BASE_PATH_ADMIN.'uploads/banner/';
$sql="select * from banner where brand_name='TOP_RIGHT_BOTTOM' LIMIT 0 ,1 ";
$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
foreach ($rowrecord as $row1)
{ 
$scatid='';
$catid='';
$rlink='';
$prdid='';

if($row1->link_type=='SUBCATEGORY')
{
$scatid=$row1->subcat_id;
$catid=0;
$rlink='cmscontaint/product_listing/product_listing/ct/'.$catid.'/scat/'.$scatid.'0/brand/0';
}

if($row1->link_type=='PRODUCT')
{
$prdid=$row1->product_id;
$rlink='cmscontaint/product_details/home_page/'.$prdid;
}		
			
?>
<a href="<?php echo BASE_URL.$rlink?>">
<img src="<?php echo $picpath.$row1->images; ?>" alt="image" />
</a>
<?php } ?>	
</div>

<br class="clear" /></div>

<!--top find area -->

<!--<div class="topFindArea">
<div class="topFind">
<div class="findHeader">&nbsp;</div>
<div id="vtab">
        <ul>
            <li class=" selected"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/lap.png"/><span>Laptop Sale</span></li>
            <li class=""><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/camera.png"/><span>Camera</span></li>
            <li class=""><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/electronics.png"/><span>Electronics</span></li>
            <li class=""><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/cloth.png"/><span>Clothing</span></li>
            <li class=""><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/book.png"/><span>Books - Flat 40% Off</span></li>
            <li class=""><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/mob.png"/><span>Mobiles</span></li>
        </ul>
        <div>
        <div id="slider">
			<ul>				
				<li>
       <div class="LapBox">
       <div class="LapBoxImage"><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/l1.jpg" alt="image" /></a></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <div class="LapBox">
       <div class="LapBoxImage"><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/l2.jpg" alt="image" /></a></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <div class="LapBox">
       <div class="LapBoxImage"><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/l3.jpg" alt="image" /></a></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <br style="clear:both" />
       </li>
       <li>
       <div class="LapBox">
       <div class="LapBoxImage"><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/l2.jpg" alt="image" /></a></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <div class="LapBox">
       <div class="LapBoxImage"><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/l1.jpg" alt="image" /></a></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <div class="LapBox">
       <div class="LapBoxImage"><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/l3.jpg" alt="image" /></a></div>
       <div class="LapBoxText">
       <div class="LapBoxTextTop">Dell Vostro 2420 Laptop (3rd Gen Intel Cor...)</div>
       <div class="LapBoxTextBottom">Rs. 50785</div>
       </div>
       </div>
       <br style="clear:both" />
       </li>
       </ul>
       </div>
      </div>
	  
        <div>
            <h4>
                Camera</h4>
            Maecenas in varius nulla. Morbi leo elit, volutpat ac faucibus in; aliquam eget
            massa. Nullam a neque ac turpis luctus venenatis et placerat risus. Quisque pretium
            scelerisque sapien, et accumsan nunc venenatis non. Donec ullamcorper, leo gravida
            hendrerit interdum, tellus nisi vestibulum justo; quis dignissim enim risus quis
            ipsum.<br />
            <br />
            Mauris fringilla, urna vitae posuere commodo, neque tellus tincidunt nisi, aliquam
            scelerisque purus nulla ac enim. Cras urna urna, vestibulum ut aliquam sed, laoreet
            et justo! Vestibulum eleifend porta mollis. Donec molestie, turpis sed commodo consequat,
            erat purus sollicitudin arcu, non vestibulum risus lacus ac ipsum. Curabitur vitae
            pellentesque purus.
        </div>
        <div>
            <h4>
                Electronics</h4>
            Maecenas in varius nulla. Morbi leo elit, volutpat ac faucibus in; aliquam eget
            massa. Nullam a neque ac turpis luctus venenatis et placerat risus. Quisque pretium
            scelerisque sapien, et accumsan nunc venenatis non. Donec ullamcorper, leo gravida
            hendrerit interdum, tellus nisi vestibulum justo; quis dignissim enim risus quis
            ipsum.<br />
            <br />
            Mauris fringilla, urna vitae posuere commodo, neque tellus tincidunt nisi, aliquam
            scelerisque purus nulla ac enim. Cras urna urna, vestibulum ut aliquam sed, laoreet
            et justo! Vestibulum eleifend porta mollis. Donec molestie, turpis sed commodo consequat,
            erat purus sollicitudin arcu, non vestibulum risus lacus ac ipsum. Curabitur vitae
            pellentesque purus.
        </div>
        <div>
            <h4>
                Clothing</h4>
            Maecenas in varius nulla. Morbi leo elit, volutpat ac faucibus in; aliquam eget
            massa. Nullam a neque ac turpis luctus venenatis et placerat risus. Quisque pretium
            scelerisque sapien, et accumsan nunc venenatis non. Donec ullamcorper, leo gravida
            hendrerit interdum, tellus nisi vestibulum justo; quis dignissim enim risus quis
            ipsum.<br />
            <br />
            Mauris fringilla, urna vitae posuere commodo, neque tellus tincidunt nisi, aliquam
            scelerisque purus nulla ac enim. Cras urna urna, vestibulum ut aliquam sed, laoreet
            et justo! Vestibulum eleifend porta mollis. Donec molestie, turpis sed commodo consequat,
            erat purus sollicitudin arcu, non vestibulum risus lacus ac ipsum. Curabitur vitae
            pellentesque purus.
        </div>
        <div>
            <h4>
                Book</h4>
            Maecenas in varius nulla. Morbi leo elit, volutpat ac faucibus in; aliquam eget
            massa. Nullam a neque ac turpis luctus venenatis et placerat risus. Quisque pretium
            scelerisque sapien, et accumsan nunc venenatis non. Donec ullamcorper, leo gravida
            hendrerit interdum, tellus nisi vestibulum justo; quis dignissim enim risus quis
            ipsum.<br />
            <br />
            Mauris fringilla, urna vitae posuere commodo, neque tellus tincidunt nisi, aliquam
            scelerisque purus nulla ac enim. Cras urna urna, vestibulum ut aliquam sed, laoreet
            et justo! Vestibulum eleifend porta mollis. Donec molestie, turpis sed commodo consequat,
            erat purus sollicitudin arcu, non vestibulum risus lacus ac ipsum. Curabitur vitae
            pellentesque purus.
        </div>
        <div>
            <h4>
                Mobiles</h4>
            Maecenas in varius nulla. Morbi leo elit, volutpat ac faucibus in; aliquam eget
            massa. Nullam a neque ac turpis luctus venenatis et placerat risus. Quisque pretium
            scelerisque sapien, et accumsan nunc venenatis non. Donec ullamcorper, leo gravida
            hendrerit interdum, tellus nisi vestibulum justo; quis dignissim enim risus quis
            ipsum.<br />
            <br />
            Mauris fringilla, urna vitae posuere commodo, neque tellus tincidunt nisi, aliquam
            scelerisque purus nulla ac enim. Cras urna urna, vestibulum ut aliquam sed, laoreet
            et justo! Vestibulum eleifend porta mollis. Donec molestie, turpis sed commodo consequat,
            erat purus sollicitudin arcu, non vestibulum risus lacus ac ipsum. Curabitur vitae
            pellentesque purus.
        </div>
</div>
</div>
</div>-->

<!--top find area end -->

<div class="mob">

<?php 
$picpath=BASE_PATH_ADMIN.'uploads/banner/';
$sql="select * from banner where brand_name='UNDER_TOPFIND' LIMIT 0 ,1 ";
$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
foreach ($rowrecord as $row1)
{ 			
$scatid='';
$catid='';
$rlink='';
$prdid='';

if($row1->link_type=='SUBCATEGORY')
{
$scatid=$row1->subcat_id;
$catid=0;
$rlink='cmscontaint/product_listing/product_listing/ct/'.$catid.'/scat/'.$scatid.'0/brand/0';
}

if($row1->link_type=='PRODUCT')
{
$prdid=$row1->product_id;
$rlink='cmscontaint/product_details/home_page/'.$prdid;
}		
?>
<a href="<?php echo BASE_URL.$rlink?>">
<img src="<?php echo $picpath.$row1->images; ?>" alt="image" />
</a>
<?php } ?>	

<?php /*?><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/mobb.jpg" alt="image" /><?php */?>

</div>

<div class="featured">
<h2>Featured Products</h2>
<!--LENOVO-->
<div class="featuredInner">
<? $sqlproduct="SELECT * FROM  `product` WHERE  `brand_id` ='35' AND `amount`>0"; 
$productlist = $this->projectmodel->get_records_from_sql($sqlproduct);?>
<?php
	
	if(count($productlist) > 0){
	$i = 1;
	$picpath=BASE_PATH_ADMIN.'uploads/products/';
	foreach ($productlist as $row){
		$alt = ($i%2==0)?'alt1':'alt2';
		if($i<=4) {
	?>
	
	<?php //echo $picpath.$row->image1.'<br>'; ?>
   <div class="featuredBox">
   
   <a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
	<div class="featuredBoxImage">
	<img src="<?php echo $picpath.$row->image1; ?>"  width="150" height="150" />
	</div>
	<div class="featuredBoxText">
	<?php $sql_brand="SELECT `brand_name` FROM `brands` WHERE `id`=".$row->brand_id; 
	$list_brand = $this->projectmodel->get_records_from_sql($sql_brand);
	foreach ($list_brand as $row_brand){ 
	?>
	<div class="featuredBoxTextTop"><?php echo $row_brand->brand_name;?></div>
	<?php } ?>
	<div class="featuredBoxTextTop"><?php echo $row->product_name." ".$row->product_code; ?></div>
	<div class="featuredBoxTextTop"><?php echo $row->amount; ?></div>
	</div>
	</a>
	
	<div class="featuredCart">
	<a href="<?php echo BASE_URL?>cmscontaint/add_item_cart/home_page/<?php echo $row->id; ?>">
	<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
	</a>
	</div>
	
	</div>
		
	<?php $i++;}}} ?>	
	


</div>
<!--SAMSUNG PRODUCTS-->
<div class="featuredInner">
<? $sqlproduct="SELECT * FROM `product` WHERE `subcat_id`='70' AND `amount`>0"; 
$productlist = $this->projectmodel->get_records_from_sql($sqlproduct);?>
<?php
	
	if(count($productlist) > 0){
	$i = 1;
	$picpath=BASE_PATH_ADMIN.'uploads/products/';
	foreach ($productlist as $row){
		$alt = ($i%2==0)?'alt1':'alt2';
		if($i<=8) {
	?>
	
	<?php //echo $picpath.$row->image1.'<br>'; ?>
   <div class="featuredBox">
   
   <a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
	<div class="featuredBoxImage">
	<img src="<?php echo $picpath.$row->image1; ?>"  width="150" height="150" />
	</div>
	<div class="featuredBoxText">
	<?php $sql_brand="SELECT `brand_name` FROM `brands` WHERE `id`=".$row->brand_id; 
	$list_brand = $this->projectmodel->get_records_from_sql($sql_brand);
	foreach ($list_brand as $row_brand){ 
	?>
	<div class="featuredBoxTextTop"><?php echo $row_brand->brand_name;?></div>
	<?php } ?>
	<div class="featuredBoxTextTop"><?php echo $row->product_name." ".$row->product_code; ?></div>
	<div class="featuredBoxTextTop"><?php echo $row->amount; ?></div>
	</div>
	</a>
	
	<div class="featuredCart">
	<a href="<?php echo BASE_URL?>cmscontaint/add_item_cart/home_page/<?php echo $row->id; ?>">
	<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
	</a>
	</div>
	
	</div>
		
	<?php $i++;}}} ?>	
	


</div>
<br class="clear" />

<!--Laptops-->
<div class="featuredInner">
<? $sqlproduct="SELECT * FROM  `product` WHERE  `subcat_id` =122 AND `amount`>0"; 
$productlist = $this->projectmodel->get_records_from_sql($sqlproduct);?>
<?php
	
	if(count($productlist) > 0){
	$i = 1;
	$picpath=BASE_PATH_ADMIN.'uploads/products/';
	foreach ($productlist as $row){
		$alt = ($i%2==0)?'alt1':'alt2';
		if($i<=4) {
	?>
	
	<?php //echo $picpath.$row->image1.'<br>'; ?>
   <div class="featuredBox">
   
   <a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
	<div class="featuredBoxImage">
	<img src="<?php echo $picpath.$row->image1; ?>"  width="150" height="150" />
	</div>
	<div class="featuredBoxText">
	<?php $sql_brand="SELECT `brand_name` FROM `brands` WHERE `id`=".$row->brand_id; 
	$list_brand = $this->projectmodel->get_records_from_sql($sql_brand);
	foreach ($list_brand as $row_brand){ 
	?>
	<div class="featuredBoxTextTop"><?php echo $row_brand->brand_name;?></div>
	<?php } ?>
	<div class="featuredBoxTextTop"><?php echo $row->product_name." ".$row->product_code; ?></div>
	<div class="featuredBoxTextTop"><?php echo $row->amount; ?></div>
	</div>
	</a>
	
	<div class="featuredCart">
	<a href="<?php echo BASE_URL?>cmscontaint/add_item_cart/home_page/<?php echo $row->id; ?>">
	<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
	</a>
	</div>
	
	</div>
		
	<?php $i++;}}} ?>	
	


</div>
<br class="clear" />
</div>
<?php /*?><div class="bottomAd">

<?php 
$picpath=BASE_PATH_ADMIN.'uploads/banner/';
$sql="select * from banner where brand_name='FOOTER_LEFT' LIMIT 0 ,1 ";
$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
foreach ($rowrecord as $row1)
{ 			
$scatid='';
$catid='';
$rlink='';
$prdid='';

if($row1->link_type=='SUBCATEGORY')
{
$scatid=$row1->subcat_id;
$catid=0;
$rlink='cmscontaint/product_listing/product_listing/ct/'.$catid.'/scat/'.$scatid.'0/brand/0';
}

if($row1->link_type=='PRODUCT')
{
$prdid=$row1->product_id;
$rlink='cmscontaint/product_details/home_page/'.$prdid;
}		

?>
<div class="bottomAdLeft">
<div class="bottomAdLeftTop">
<a href="<?php echo BASE_URL.$rlink?>">
<img src="<?php echo $picpath.$row1->images; ?>" alt="image"  width="322" height="159" />
</a>
</div>
<div class="bottomAdLeftBottom"><?php echo $row1->bannertext; ?>&raquo;</div>
</div>
<?php } ?>	

<?php 
$picpath=BASE_PATH_ADMIN.'uploads/banner/';
$sql="select * from banner where brand_name='FOOTER_CENTER' LIMIT 0 ,1 ";
$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
foreach ($rowrecord as $row1)
{ 	
$scatid='';
$catid='';
$rlink='';
$prdid='';

if($row1->link_type=='SUBCATEGORY')
{
$scatid=$row1->subcat_id;
$catid=0;
$rlink='cmscontaint/product_listing/product_listing/ct/'.$catid.'/scat/'.$scatid.'0/brand/0';
}

if($row1->link_type=='PRODUCT')
{
$prdid=$row1->product_id;
$rlink='cmscontaint/product_details/home_page/'.$prdid;
}				
?>
<div class="bottomAdLeft">
<div class="bottomAdLeftTop">
<a href="<?php echo BASE_URL.$rlink?>">
<img src="<?php echo $picpath.$row1->images; ?>" alt="image"  width="322" height="159" />
</a>
</div>
<div class="bottomAdLeftBottom"><?php echo $row1->bannertext; ?>&raquo;</div>
</div>
<?php } ?>

<?php 
$picpath=BASE_PATH_ADMIN.'uploads/banner/';
$sql="select * from banner where brand_name='FOOTER_RIGHT' LIMIT 0 ,1 ";
$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
foreach ($rowrecord as $row1)
{ 	
$scatid='';
$catid='';
$rlink='';
$prdid='';

if($row1->link_type=='SUBCATEGORY')
{
$scatid=$row1->subcat_id;
$catid=0;
$rlink='cmscontaint/product_listing/product_listing/ct/'.$catid.'/scat/'.$scatid.'0/brand/0';
}

if($row1->link_type=='PRODUCT')
{
$prdid=$row1->product_id;
$rlink='cmscontaint/product_details/home_page/'.$prdid;
}		
?>
<div class="bottomAdRight">
<div class="bottomAdLeftTop">
<a href="<?php echo BASE_URL.$rlink?>">
<img src="<?php echo $picpath.$row1->images; ?>" alt="image"  width="322" height="159" />
</a></div>
<div class="bottomAdLeftBottom"><?php echo $row1->bannertext; ?> &raquo;</div>
</div>
<?php } ?>



<br class="clear" />
</div><?php */?>

<? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
<br class="clear" />
<? 
$sqlbrand="SELECT * FROM  `brands`"; 
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

leftrightslide[<? echo $i;?>]='<a href="<?php echo BASE_URL?>cmscontaint/product_list_brand/brand/<? echo $row_brand->id;?>"><img width="110" height="90" src="<?php echo $picpath.$row_brand->images; ?>" border=1></a>'

<? $i++; } ?>
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

<!--<p align="center"><font face="Arial" size="-2">Free DHTML scripts provided by<br>
<a href="http://dynamicdrive.com">Dynamic Drive</a></font></p>-->
<br class="clear" />
<? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>

<?php /*?><div class="als-container" id="demo2">
    <div class="als-viewport">
    <ul class="als-wrapper">
<? $sqlbrand="SELECT * FROM  `brands`"; 
$brandlist = $this->projectmodel->get_records_from_sql($sqlbrand);?>
	<?php
	$picpath=BASE_PATH_ADMIN.'uploads/brand/';
	foreach ($brandlist as $row_brand){
	?>
<a href="<?php echo BASE_URL?>cmscontaint/product_list_brand/brand/<? echo $row_brand->id;?>"><img src="<?php echo $picpath.$row_brand->images; ?>" alt="<?php echo $row_brand->brand_name; ?>"  width="73" height="56" /></a> 
	<?php } ?>
	</ul>
  </div><?php */?>
</div>
	</div>
	</div>
	