<?php //echo $p_name; ?>
<?php //foreach($list_search_product as $row){ echo $row->id.' '.$row->product_name.' '.$row->product_code.'  <img src="'.$row->image1.'" height="100" width="100" /><br />'; } ?>
<style>
div.scroll
{
width:auto;
height:600px;
overflow:scroll;
}
$(document).ready(function(){ $("button").click(function(){ alert($("div").scrollLeft()+" px"); }); });
</style>
<?php 
$brandid=$this->uri->segment(4); 
/*$scat='';
$sql_cat="SELECT * FROM `subcategory` WHERE `category_id` IN(SELECT  distinct(`subcat_id`) FROM `product` WHERE `brand_id`='$brandid')";
$list_cat = $this->projectmodel->get_records_from_sql($sql_cat);	
*/?>
<div id="bodyWrapper">
<div id="bodyContainer">
<div class="featured">
<div>
<?	/*	foreach($list_cat as $row_cat){ 	$scat=$row_cat->category_id;	*/	?>
<?  //echo "<b>".$row_cat->subcat_name."  SUBCATAGORY-ID:".$scat."  ID:".$row_cat->id."</b><br>"; ?>
<!--<div  class="scroll">-->
<!--<div style="border:1px solid black;width:100px;height:130px;overflow:auto">-->
<? //if($list_pro==0){echo "empty";} else{echo "non empty ".$scat;}
$i = 1;
$picpath=BASE_PATH_ADMIN.'uploads/products/';
foreach($list_search_product  as $row_pro){ //if($row_pro->subcat_id==$scat){ 
$alt = ($i%2==0)?'alt1':'alt2';
if($i>0) {
?>
<div class="featuredBox">
   
   <a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row_pro->id; ?>">
	<div class="featuredBoxImage"><img src="<?php echo $picpath.$row_pro->image1; ?>"  width="200" height="150" /></div>
	<div class="featuredBoxText"><div class="featuredBoxTextTop"><?php echo $row_pro->product_name." ".$row_pro->product_code; ?></div>
	<div class="featuredBoxTextTop"><?php echo $row_pro->amount; ?></div>
	</div>
   </a>
   <div class="featuredCart" style="margin-top:-25px;">
	<a href="<?php echo BASE_URL?>cmscontaint/add_item_cart/home_page/<?php echo $row_pro->id; ?>">
	<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
	</a>
	</div>
</div>

<? //echo $row_pro->id." ".$row_pro->product_name." ".$row_pro->product_code." ".$row_pro->brand_id."  ".$row_pro->subcat_id."<br>"; ?>
<? $i++;}} //}?>




<!--</div>-->
<?php //} ?>	
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
<br class="clear" />
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>

</div>
</div>
</div>

<br class="clear" />
<br class="clear" />