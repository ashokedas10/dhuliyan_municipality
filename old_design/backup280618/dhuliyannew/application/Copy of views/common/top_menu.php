<style>
	<style type="text/css">
    #autoSuggestionsList > li {
         background: none repeat scroll 0 0 #F3F3F3;
         border-bottom: 1px solid #E3E3E3;
         list-style: none outside none;
         padding: 3px 15px 3px 15px;
         text-align: left;
    }
    #autoSuggestionsList > li a { color: #800000; }
    .auto_list {
         border: 1px solid #E3E3E3;
         border-radius: 5px 5px 5px 5px;
         position: absolute;
    }
</style>
<script type="text/javascript">
        function ajaxSearch() {
            var input_data = $('#search_data').val();
			
			//alert(input_data);
			
            if (input_data.length === 0) {
                $('#suggestions').hide();
            } else {

                var post_data = {
                    'search_data': input_data,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo BASE_URL?>cmscontaint/autocomplete_search/",
                    data: post_data,
                    success: function(data) {
                        // return success
                        if (data.length > 0) {
                            $('#suggestions').show();
                            $('#autoSuggestionsList').addClass('auto_list');
                            $('#autoSuggestionsList').html(data);
                        }
                    }
                });

            }
        }
</script>
<div id="header">
<div id="headerContainer">
<div id="headerTopBar">
<div class="help"><a href="#">Help</a></div><!--help-->
<div class="login">
<a href="<?php echo BASE_URL?>cmscontaint/saler_login_register">
<div class="regis">Sellers</div><!--regis--></a>
<div class="regisArrow"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/down_arrow.jpg" align="image" />
</div><!--regisArrow-->
</div><!--login-->
<div class="login">
<a href="<?php echo BASE_URL?>cmscontaint/user_register_login"><div class="regis">Login | Register</div><!--regis--></a>
<div class="regisArrow">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/down_arrow.jpg" align="image" />
</div><!--regisArrow-->
</div><!--login-->

<a href="<?php echo BASE_URL?>cmscontaint/cartview">
<div class="cart">
<div class="cartAmount"><?php echo $this->session->userdata('total_cart_items'); ?></div><div class="cartText">My Cart</div>
</div>
</a>

</div>
<div id="headerMid">
<a href="<?php echo BASE_URL?>cmscontaint/">
<div class="logo">
<table width="695"  cellpadding="0" cellspacing="0">
  <tr>
    <td width="44"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/logo.png" alt="image" /></td>
    <td width="44"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/POCKETBAZAR-LOGO.PNG" width="500" height="60" alt="image" /></td>
	
  </tr>
</table>

</div>
</a>

<div class="searchArea" style="margin-top: -33px; position:absolute; margin-left:427px;">
<!--<form action=""  method="get">--><table><tr><td>
<!--<input type="submit" value="" class="searchButon" name="">-->
<div class="something">
<input type="text" placeholder="Search"  class="search" onkeyup="ajaxSearch();" name="search_data" id="search_data">
<div id="suggestions">
            <div id="autoSuggestionsList" style="background-color: whitesmoke; margin-top: 40px; margin-left: 292px; width: 263px;position:relative;">  
            </div>
        </div>
</div>
</td></tr>
<tr>
  <td width="605" align="right"><strong>Call us : 8981024580 / 033-22268463  </strong></td>
</tr>
	</table>
<!--</form>-->
</div>



</div>
<div class="navarea">
<ul id="menu">
<!-- End Home Item -->
<!-- End 5 columns Item -->

   <?  
   			$sqlMainCat="SELECT * FROM  `main_catagory` ORDER BY  `main_catagory`.`id` ASC" ;
			$rowMainCat = $this->projectmodel->get_records_from_sql($sqlMainCat);
			foreach ($rowMainCat as $catname)	{
			$catagory=$catname->main_catagory_name;
		
   			
   ?>

<? if($catagory=='ELECTRONICS') { ?>
<li><a  class="drop"><hmenu><? echo $catagory; ?></hmenu></a>
<div class='dropdown_4columns'> <div class='col_4'><h2>All Electronics Product Category</h2></div> <? } ?>

<? if($catagory=='HOME_APPLIANCES') { ?>
<li><a  class="drop"><hmenu>HOME APPLIANCES</hmenu></a>
<div class="dropdown_5columns"> <div class='col_5'><h2>All Home Appliances Product Category</h2></div> <? } ?>

<? if($catagory=='MEN') { ?>
<li><a  class="drop"><hmenu><? echo $catagory; ?></hmenu></a>
<div class="dropdown_4columns"> <div class='col_4'><h2>All Men Product Category</h2></div> <? } ?>

<? if($catagory=='WOMEN') { ?>
<li><a  class="drop"><hmenu><? echo $catagory; ?></hmenu></a>
<div class="dropdown_4columns"> <div class='col_4'><h2>All Women Product Category</h2></div> <? } ?>

<? if($catagory=='KID_ZONE') { ?>
<li><a  class="drop"><hmenu>KID&acute;S ZONE</hmenu></a>
<div class="dropdown_4columns align_right"> <div class='col_4'><h2>All Kid Zone Product Category</h2></div> <? } ?>

<? if($catagory=='FMCG') { ?>
<li><a  class="drop"><hmenu>FOOD AND FMCG</hmenu></a>
<div class="dropdown_4columns align_right"> <div class='col_4'><h2>All Food and FMCG Product Category</h2></div> <? } ?>

<? if($catagory=='FURNITURE') { ?>
<li><a  class="drop"><hmenu>FURNITURE</hmenu></a>
<div class="dropdown_4columns align_right"> <div class='col_4'><h2>All Furniture Product Category</h2></div> <? } ?>

<? if($catagory=='OTHERS') { ?>
<li class="menu_right"><a  class="drop"><hmenu>OTHERS</hmenu></a>
<div class="dropdown_4columns align_right"> <div class='col_4'><h2>All Others Product Category</h2></div> <? } ?>

	<?php 	
		$sql="SELECT * FROM subcategory WHERE category_id IN (SELECT id FROM category WHERE main_category = '$catagory')";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row1)
		{ 		
			$catid=$row1->category_id;
		?>
			<div class="col_1">
			
			<a href="<?php echo BASE_URL?>
					cmscontaint/product_listing/product_listing/<?php echo $catid;?>/<?php echo $row1->id;?>">
			<h4><?php echo $row1->subcat_name;  ?></h4></a>
				
				<ul>
				<?
				
				/*	$sqlBrand="SELECT * FROM brands WHERE id IN( SELECT brand_id FROM product WHERE subcat_id IN ( SELECT id FROM subcategory WHERE category_id='$catid' ))ORDER BY  brand_name ASC LIMIT 0 , 3";
					$rowBrand = $this->projectmodel->get_records_from_sql($sqlBrand);	
					if(count($rowBrand) >= 1){
						echo 'Select Brands'.'<br>';
						foreach ($rowBrand as $row2){ 
				
				
				
						<li><a href="<?php echo BASE_URL?>cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/<?php echo $row1->id;?>/brand/<?php echo $row2->id;?>"><?php echo $row2->brand_name;  ?></a></li>
				
					} }*/
				?>
				</ul>
			</div>
	<? 
		} ?>	
        </div>
</li>
<? } ?>	
	

</ul>
</div>
</div>
</div>