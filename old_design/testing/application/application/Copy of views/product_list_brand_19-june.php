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
$scat='';
$sql_cat="SELECT * FROM `subcategory` WHERE `category_id` IN(SELECT  distinct(`subcat_id`) FROM `product` WHERE `brand_id`='$brandid')";
$list_cat = $this->projectmodel->get_records_from_sql($sql_cat);	
?>
<div id="bodyWrapper">
<div id="bodyContainer">
<div class="featured">
<div>
<? 
foreach($list_cat as $row_cat){ 
$scat=$row_cat->category_id; 
$sql_pro="SELECT * FROM `product` WHERE `brand_id`=".$brandid;
$list_pro = $this->projectmodel->get_records_from_sql($sql_pro);
?>
<?  //echo "<b>".$row_cat->subcat_name."  SUBCATAGORY-ID:".$scat."  ID:".$row_cat->id."</b><br>"; ?>
<div  class="scroll">
<!--<div style="border:1px solid black;width:100px;height:130px;overflow:auto">-->
<? //if($list_pro==0){echo "empty";} else{echo "non empty ".$scat;}
$i = 1;
$picpath=BASE_PATH_ADMIN.'uploads/products/';
foreach($list_pro  as $row_pro){ if($row_pro->subcat_id==$scat){ 
$alt = ($i%2==0)?'alt1':'alt2';
if($i>0) {
?>
<div class="featuredBox">
   
   <a href="<?php echo BASE_URL?>cmscontaint/product_details/home_page/<?php echo $row_pro->id; ?>">
	<div class="featuredBoxImage"><img src="<?php echo $picpath.$row_pro->image1; ?>"  width="200" height="200" /></div>
	<div class="featuredBoxText"><div class="featuredBoxTextTop"><?php echo $row_pro->product_name." ".$row_pro->product_code; ?></div></div>
   </a>
   <div class="featuredCart">
	<a href="<?php echo BASE_URL?>cmscontaint/add_item_cart/home_page/<?php echo $row_pro->id; ?>">
	<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/add.jpg" alt="image" />
	</a>
	</div>
</div>

<? //echo $row_pro->id." ".$row_pro->product_name." ".$row_pro->product_code." ".$row_pro->brand_id."  ".$row_pro->subcat_id."<br>"; ?>
<? $i++;}} }?>




</div>
<?php } ?>	
</div>

</div>
</div>
</div>

<br class="clear" />
<br class="clear" />