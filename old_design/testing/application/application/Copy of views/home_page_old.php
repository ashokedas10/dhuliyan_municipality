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

<div class="featuredInner">

<?php
	if(count($productlist) > 0){
	$i = 1;
	$picpath=BASE_PATH_ADMIN.'uploads/products/';
	foreach ($productlist as $row){
		$alt = ($i%2==0)?'alt1':'alt2';
		if($i<=7) {
	?>
	
	<?php //echo $picpath.$row->image1.'<br>'; ?>
   <div class="featuredBox">
   
   <a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row->id; ?>">
	<div class="featuredBoxImage">
	<img src="<?php echo $picpath.$row->image1; ?>"  width="200" height="200" />
	</div>
	<div class="featuredBoxText">
	<div class="featuredBoxTextTop"><?php echo $row->product_name; ?></div>
	<div class="featuredBoxTextBottom"><?php echo $row->product_code; ?></div>
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
<div class="bottomAd">

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
</div>
<div class="bottomLogo">
<table width="1001" cellspacing="0" cellpadding="0">
  <tr>
	<?php
	if(count($brandlist) > 0){
	$i = 1;
	$picpath=BASE_PATH_ADMIN.'uploads/brand/';
	foreach ($brandlist as $row){
		$alt = ($i%2==0)?'alt1':'alt2';
		if($i<=7) {
	?>
    <td height="70" align="center" valign="middle" class="dot">
	<a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/0/scat/0/brand/<?php echo $row->id;?>"><img src="<?php echo $picpath.$row->images; ?>" 
	alt="<?php echo $row->brand_name; ?>"  width="93" height="56" /></a>
	</td>
		
	<?php $i++;}}} ?>	
	
  </tr>
</table>

</div>
</div>
</div>