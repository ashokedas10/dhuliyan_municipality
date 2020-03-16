
<div class="latest-heading"><span class="red-text">Administrator</span></div>
<P></P>
<div class="row">
  
  <div class="col-md-3">
  
   <div class="list-group">   
    <?php 
   //cat 2 for administrator
        
    $sqlsubcat="SELECT * FROM `subcategory` WHERE `cat_id` =2 order by orderby "; 
	$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
  	foreach ($subcategorylist as $subcat){?>
	
	  <a href="<?php echo BASE_URL?>cmscontaint/dmc/administrator/<?php echo $subcat->id;?>" 
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
   
	$picpath=BASE_PATH_ADMIN.'uploads/administration/';
	$subcat_name='';
	$sqlsubcat="SELECT * FROM `subcategory` WHERE id=".$subcatid; 
	$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
	foreach ($subcategorylist as $subcat)
	{$subcat_name=$subcat->subcat_name; }
	
	?>
	<div class="well" style="background-color:#FF6666" align="center">
		<h4 class="media-heading"><?php echo $subcat_name ?></h4>
	</div>
	
	<?php	
	$sql="SELECT * FROM `administration` WHERE `Designation` =".$subcatid; 
	$datalist = $this->projectmodel->get_records_from_sql($sql);
	if(count($datalist)>0){
	foreach($datalist as $row){
	?>
  		
			<div class="thumbnail">
			<?php if($row->image<>''){?>  
				   <img src="<?php echo $picpath.$row->image;?>" class="img-rounded" 	
					alt="Cinque Terre" width="50%" > 
			<?php }?>  
				  <div class="caption">
					<ul class="list-group">
					  <li class="list-group-item list-group-item-success">
					  <h4 class="media-heading"><?php   echo 'Name : '.$row->name;?></h4>
					  </li>
								  
					  <?php if($row->Ward_NO<>''){ ?>
					  <li class="list-group-item list-group-item-info">
					  <?php echo 'Word No :'.$row->Ward_NO.'<br />';?>
					  </li>
					  <?php } ?>
					  
					 <?php if($row->Elected_From<>''){ ?>
					  <li class="list-group-item list-group-item-warning">
					  <?php echo 'Elected From :'.$row->Elected_From.'<br />';?>
					  </li>
					  <?php } ?>
								 
					  <li class="list-group-item list-group-item-danger">
					  <?php echo 'Contact No: '.$row->Contact.'<br />';?>
					  </li>  			  
					  
					</ul> 
				  </div>
			</div>
		
		
  <?php  }}  else { echo 'No Record Found!';  } ?>	
  </div>
  	
  
  


</div>

