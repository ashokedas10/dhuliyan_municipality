<div id="header">
<div id="headerContainer">
<div id="headerTopBar">
<div class="help">
<a href="#">Help</a></div><div class="login">

<a href="<?php echo BASE_URL?>cmscontaint/user_register_login">
<div class="regis">
Login | Register
</div>
</a>

<div class="regisArrow">
<a href="<?php echo BASE_URL?>cmscontaint/user_register_login">
<img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/down_arrow.jpg" align="image" />
</a>
</div>

</div>

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
    <td width="44"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/logo2.png" alt="image" /></td>
	
  </tr>
</table>

</div>
</a>

<div class="searchArea">
<form action=""  method="get"><table><tr><td>
<input type="submit" value="" class="searchButon" name="">
<input type="text" value="Search" onfocus="if(this.value=='Search'){ this.value='';}" onblur="if(this.value==''){ this.value='Search';}" class="search">
</td></tr>
<tr><td width="605" align="right"><strong>Call us : 9038009504 / 033-22268463  </strong></td></tr>
	</table>
</form>
</div>



</div>
<div class="navarea">
<ul id="menu">
<!-- End Home Item -->
<!-- End 5 columns Item -->

   
<li><a href="#" class="drop">ELECTRONICS</a>

  <div class="dropdown_4columns"><!-- Begin 4 columns container -->
        
            <div class="col_4">
                <h2>All Electronics Product Category</h2>
            </div>
			
		<?php 		
		$sql="select * from  category where main_category='ELECTRONICS' ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row1){ 
		$catid=$row1->id;
		?>
		    <div class="col_1">
            
                <a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/0/brand/0">
				<h3><?php echo $row1->cat_name;  ?></h3></a>
                <ul>
				<!--for sub category -->
			<?php 		
				$sql1="SELECT *
						FROM subcategory
						WHERE category_id
						IN ( 
						SELECT id
						FROM category
						WHERE category_id='$catid' and  main_category ='ELECTRONICS'
						) ORDER BY  subcat_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) > 1){
				echo 'Select Category'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/<?php echo $row2->id;?>/brand/0">
				<?php echo $row2->subcat_name;  ?></a></li>
             <?php }} ?>
			 	   <!--for brand -->
								   
			<?php 		
				 $sql1="SELECT *
						FROM brands
						WHERE id
						IN 
						(SELECT brand_id
						FROM  product
						WHERE subcat_id 
						in 
						(select id from subcategory where category_id='$catid' )) 
						ORDER BY  brand_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) >= 1){
				echo 'Select Brands'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/0/brand/<?php echo $row2->id;?>"><?php echo $row2->brand_name;  ?></a></li>
             <?php }} ?>
			 
				        					
                </ul>   
                
            </div>
		<?php } ?>	
	
        </div>
</li>
<li><a href="#" class="drop">HOME APPLIANCES</a>
  <div class="dropdown_4columns"><!-- Begin 4 columns container -->
        
            <div class="col_4">
                <h2>ALL HOME APPLIANCES</h2>
            </div>
          <?php 		
		$sql="select * from  category where main_category='HOME_APPLIANCES' ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row1){ 
		$catid=$row1->id;
		?>
		    <div class="col_1">
            
                <a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>">
				<h3><?php echo $row1->cat_name;  ?></h3></a>
                <ul>
				<!--for sub category -->
			<?php 		
				$sql1="SELECT *
						FROM subcategory
						WHERE category_id
						IN ( 
						SELECT id
						FROM category
						WHERE category_id='$catid' and  main_category ='HOME_APPLIANCES'
						) ORDER BY  subcat_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) > 1){
				echo 'Select Category'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/<?php echo $row2->id;?>">
				<?php echo $row2->subcat_name;  ?></a></li>
             <?php }} ?>
			 	   <!--for brand -->
								   
			<?php 		
				 $sql1="SELECT *
						FROM brands
						WHERE id
						IN 
						(SELECT brand_id
						FROM  product
						WHERE subcat_id 
						in 
						(select id from subcategory where category_id='$catid' )) 
						ORDER BY  brand_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) >= 1){
				echo 'Select Brands'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/0/brand/<?php echo $row2->id;?>"><?php echo $row2->brand_name;  ?></a></li>
             <?php }} ?>
			 
				        					
                </ul>   
                
            </div>
		<?php } ?>	
        </div>
</li>

<li><a href="#" class="drop">Food </a>
  <div class="dropdown_4columns"><!-- Begin 4 columns container -->
        
            <div class="col_4">
                <h2>ALL Food and FMCG</h2>
            </div>
            
             <?php 		
		$sql="select * from  category where main_category='FMCG' ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row1){ 
		$catid=$row1->id;
		?>
		    <div class="col_1">
            
                <a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>">
				<h3><?php echo $row1->cat_name;  ?></h3></a>
                <ul>
				<!--for sub category -->
			<?php 		
				$sql1="SELECT *
						FROM subcategory
						WHERE category_id
						IN ( 
						SELECT id
						FROM category
						WHERE category_id='$catid' and  main_category ='FMCG'
						) ORDER BY  subcat_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) > 1){
				echo 'Select Category'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/<?php echo $row2->id;?>">
				<?php echo $row2->subcat_name;  ?></a></li>
             <?php }} ?>
			 	   <!--for brand -->
								   
			<?php 		
				 $sql1="SELECT *
						FROM brands
						WHERE id
						IN 
						(SELECT brand_id
						FROM  product
						WHERE subcat_id 
						in 
						(select id from subcategory where category_id='$catid' )) 
						ORDER BY  brand_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) >= 1){
				echo 'Select Brands'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/0/brand/<?php echo $row2->id;?>"><?php echo $row2->brand_name;  ?></a></li>
             <?php }} ?>
			 
				        					
                </ul>   
                
            </div>
		<?php } ?>	
            
        </div>
</li>
<li><a href="#" class="drop">PROPERTY</a>
	 <div class="dropdown_4columns align_right"><!-- Begin 4 columns container -->
        
            <div class="col_4">
                <h2>ALL PROPERTY</h2>
            </div>
            <?php 		
		$sql="select * from  category where main_category='PROPERTY' ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row1){ 
		$catid=$row1->id;
		?>
		    <div class="col_1">
            
                <a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>">
				<h3><?php echo $row1->cat_name;  ?></h3></a>
                <ul>
				<!--for sub category -->
			<?php 		
				$sql1="SELECT *
						FROM subcategory
						WHERE category_id
						IN ( 
						SELECT id
						FROM category
						WHERE category_id='$catid' and  main_category ='PROPERTY'
						) ORDER BY  subcat_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) > 1){
				echo 'Select Category'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/<?php echo $row2->id;?>">
				<?php echo $row2->subcat_name;  ?></a></li>
             <?php }} ?>
			 	   <!--for brand -->
								   
			<?php 		
				 $sql1="SELECT *
						FROM brands
						WHERE id
						IN 
						(SELECT brand_id
						FROM  product
						WHERE subcat_id 
						in 
						(select id from subcategory where category_id='$catid' )) 
						ORDER BY  brand_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) >= 1){
				echo 'Select Brands'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/0/brand/<?php echo $row2->id;?>"><?php echo $row2->brand_name;  ?></a></li>
             <?php }} ?>
			 
				        					
                </ul>   
                
            </div>
		<?php } ?>	
		
        </div>	
	
</li>
<li><a href="#" class="drop">CAR</a>
	 <div class="dropdown_4columns align_right"><!-- Begin 4 columns container -->
        
            <div class="col_4">
                <h2>ALL CAR</h2>
            </div>
            <?php 		
		$sql="select * from  category where main_category='CAR' ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row1){ 
		$catid=$row1->id;
		?>
		    <div class="col_1">
            
                <a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>">
				<h3><?php echo $row1->cat_name;  ?></h3></a>
                <ul>
				<!--for sub category -->
			<?php 		
				$sql1="SELECT *
						FROM subcategory
						WHERE category_id
						IN ( 
						SELECT id
						FROM category
						WHERE category_id='$catid' and  main_category ='CAR'
						) ORDER BY  subcat_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) > 1){
				echo 'Select Category'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/<?php echo $row2->id;?>">
				<?php echo $row2->subcat_name;  ?></a></li>
             <?php }} ?>
			 	   <!--for brand -->
								   
			<?php 		
				 $sql1="SELECT *
						FROM brands
						WHERE id
						IN 
						(SELECT brand_id
						FROM  product
						WHERE subcat_id 
						in 
						(select id from subcategory where category_id='$catid' )) 
						ORDER BY  brand_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) >= 1){
				echo 'Select Brands'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/0/brand/<?php echo $row2->id;?>"><?php echo $row2->brand_name;  ?></a></li>
             <?php }} ?>
			 
				        					
                </ul>   
                
            </div>
		<?php } ?>	
            
        </div>	
</li>
<li><a href="#" class="drop">MEN</a>
	 <div class="dropdown_4columns align_right"><!-- Begin 4 columns container -->
        
            <div class="col_4">
                <h2>ALL MEN'S CLOTHING</h2>
            </div>
            
        <?php 		
		$sql="select * from  category where main_category='MEN' ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row1){ 
		$catid=$row1->id;
		?>
		    <div class="col_1">
            
                <a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>">
				<h3><?php echo $row1->cat_name;  ?></h3></a>
                <ul>
				<!--for sub category -->
			<?php 		
				$sql1="SELECT *
						FROM subcategory
						WHERE category_id
						IN ( 
						SELECT id
						FROM category
						WHERE category_id='$catid' and  main_category ='MEN'
						) ORDER BY  subcat_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) > 1){
				echo 'Select Category'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/<?php echo $row2->id;?>">
				<?php echo $row2->subcat_name;  ?></a></li>
             <?php }} ?>
			 	   <!--for brand -->
								   
			<?php 		
				 $sql1="SELECT *
						FROM brands
						WHERE id
						IN 
						(SELECT brand_id
						FROM  product
						WHERE subcat_id 
						in 
						(select id from subcategory where category_id='$catid' )) 
						ORDER BY  brand_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) >= 1){
				echo 'Select Brands'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/0/brand/<?php echo $row2->id;?>"><?php echo $row2->brand_name;  ?></a></li>
             <?php }} ?>
			 
				        					
                </ul>   
                
            </div>
		<?php } ?>	
            
        </div>	
</li>
<li><a href="#" class="drop">WOMEN</a>
	 <div class="dropdown_4columns align_right"><!-- Begin 4 columns container -->
        
            <div class="col_4">
                <h2>ALL WOMEN'S CLOTHING</h2>
            </div>
            
            <?php 		
		$sql="select * from  category where main_category='WOMEN' ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row1){ 
		$catid=$row1->id;
		?>
		    <div class="col_1">
            
                <a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>">
				<h3><?php echo $row1->cat_name;  ?></h3></a>
                <ul>
				<!--for sub category -->
			<?php 		
				$sql1="SELECT *
						FROM subcategory
						WHERE category_id
						IN ( 
						SELECT id
						FROM category
						WHERE category_id='$catid' and  main_category ='WOMEN'
						) ORDER BY  subcat_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) > 1){
				echo 'Select Category'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/<?php echo $row2->id;?>">
				<?php echo $row2->subcat_name;  ?></a></li>
             <?php }} ?>
			 	   <!--for brand -->
								   
			<?php 		
				 $sql1="SELECT *
						FROM brands
						WHERE id
						IN 
						(SELECT brand_id
						FROM  product
						WHERE subcat_id 
						in 
						(select id from subcategory where category_id='$catid' )) 
						ORDER BY  brand_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) >= 1){
				echo 'Select Brands'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/0/brand/<?php echo $row2->id;?>"><?php echo $row2->brand_name;  ?></a></li>
             <?php }} ?>
			 
				        					
                </ul>   
                
            </div>
		<?php } ?>	
		
        </div>	
</li>

<li class="menu_right"><a href="<?php echo BASE_URL?>cmscontaint/product_listing" class="drop">OTHERS</a><!-- Begin 3 columns Item -->
      <div class="dropdown_4columns align_right"><!-- Begin 4 columns container -->
        
            <div class="col_4">
                <h2>ALL OTHER ITEMS</h2>
            </div>
            
             <?php 		
		$sql="select * from  category where main_category='OTHERS' ";
		$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
		foreach ($rowrecord as $row1){ 
		$catid=$row1->id;
		?>
		    <div class="col_1">
            
                <a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>">
				<h3><?php echo $row1->cat_name;  ?></h3></a>
                <ul>
				<!--for sub category -->
			<?php 		
				$sql1="SELECT *
						FROM subcategory
						WHERE category_id
						IN ( 
						SELECT id
						FROM category
						WHERE category_id='$catid' and  main_category ='OTHERS'
						) ORDER BY  subcat_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) > 1){
				echo 'Select Category'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/<?php echo $row2->id;?>">
				<?php echo $row2->subcat_name;  ?></a></li>
             <?php }} ?>
			 	   <!--for brand -->
								   
			<?php 		
				 $sql1="SELECT *
						FROM brands
						WHERE id
						IN 
						(SELECT brand_id
						FROM  product
						WHERE subcat_id 
						in 
						(select id from subcategory where category_id='$catid' )) 
						ORDER BY  brand_name ASC LIMIT 0 , 5 ";
				
				$rowrecord1 = $this->projectmodel->get_records_from_sql($sql1);	
				if(count($rowrecord1) >= 1){
				echo 'Select Brands'.'<br>';
				foreach ($rowrecord1 as $row2){ 
		  	?>
                    <li><a href="<?php echo BASE_URL?>
				cmscontaint/product_listing/product_listing/ct/<?php echo $catid;?>/scat/0/brand/<?php echo $row2->id;?>"><?php echo $row2->brand_name;  ?></a></li>
             <?php }} ?>
			 
				        					
                </ul>   
                
            </div>
		<?php } ?>	
            
        </div>
</li><!-- End 3 columns Item -->


	
	

</ul>
</div>
</div>
</div>