
<div class="latest-heading"><span class="red-text">Projects</span></div>
<P></P>
<div class="row">
  
  <div class="col-md-3">
     <div class="list-group">   
    <?php 
   //cat 2 for administrator
        
    $sqlsubcat="SELECT * FROM `subcategory` WHERE `cat_id` =8 order by orderby "; 
	$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
  	foreach ($subcategorylist as $subcat){?>
	
	  <a href="<?php echo BASE_URL?>cmscontaint/dmc/projects/<?php echo $subcat->id;?>" 
	  class="list-group-item 
	  <?php 
	  if($this->uri->segment(4)==$subcat->id) 
	  { echo 'active';}
	  else { echo ''; }
	  ?>">
	  <?php echo strtoupper($subcat->subcat_name);?>
	  </a>
	  </li>
  <?php } ?>   
   <!-- <a href="#" class="list-group-item active">First item</a>
    <a href="#" class="list-group-item">Second item</a>
    <a href="#" class="list-group-item">Third item</a>-->
  </div>  
  </div>
    
  <div class="col-md-9">
		
	<?php 
	$picpath=BASE_PATH_ADMIN.'uploads/project/';
	$picpathsubcat=BASE_PATH_ADMIN.'uploads/subcat/'; 
	$subcatimage='';
	$subcat_name='';
	
	$sqlsubcat="SELECT * FROM `subcategory` WHERE id=".$subcatid; 
	$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
	foreach ($subcategorylist as $subcat)
	{$subcat_name=$subcat->subcat_name;
	$subcatimage=$subcat->Image;
	}
	?>
	
	<div class="well" style="background-color:#FF6666" align="center">
		<h4 class="media-heading">
		<?php if($subcatimage<>''){ ?>
		<img src="<?php echo $picpathsubcat.$subcat->Image;?>" 
		alt="" width="50" height="50" />
		<?php } ?>&nbsp;&nbsp;
		<?php echo $subcat_name; ?></h4>
		</div>
	
	<?php		
	$sql="SELECT * FROM `project` WHERE `SubCatId` =".$subcatid; 
	$datalist = $this->projectmodel->get_records_from_sql($sql);
	if(count($datalist)>0){
	foreach($datalist as $row){
	?>
  
		<div class="thumbnail">
		
			  <div class="caption">
					
					<ul class="list-group">
					
					  <li class="list-group-item list-group-item-success">
					  <h4 class="media-heading"><?php echo 'Title : '.$row->title;?></h4>
					  </li>										
					 
					  <li class="list-group-item list-group-item-warning">
					 	
						<div class="row" >
						 <div class="col-md-4">
						 <?php if($row->images<>''){?>
						<img src="<?php echo $picpath.$row->images;?>" 
						class="img-rounded" alt="<?php echo $row->title;?>" width="100%"   />
						<?php }?>  
						 </div>
						 <div class="col-md-8">
						 <?php 
			if($row->title_description<>''){echo 'Details :'.$row->title_description.'<br />';}?><?php if($row->price<>''){echo 'Price :'.$row->price.'<br />';}?><?php if($row->startingdate<>''){echo 'Start Date :'.$row->startingdate.'<br />';}?><?php if($row->closingdate<>''){echo 'Close Date :'.$row->closingdate.'<br />';}?><?php if($row->details<>''){echo 'Details :'.$row->details.'<br />';}?><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?>
						 </div>
						</div>
							
						
					  </li>
					 
					  
					</ul> 
				  </div>
			</div>
		
  	<?php  }}  else { echo 'No Record Found!';  } ?>
  </div>
  	
</div>

