
<div class="latest-heading"><span class="red-text">Department</span></div>
<P></P>
<div class="row">
  
  <div class="col-md-3">
     <div class="list-group">   
    <?php 
   //cat 2 for administrator
        
    $sqlsubcat="SELECT * FROM `subcategory` WHERE `cat_id` =5 order by orderby "; 
	$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
  	foreach ($subcategorylist as $subcat){?>
	
	  <a href="<?php echo BASE_URL?>cmscontaint/dmc/department/<?php echo $subcat->id;?>" 
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
	$picpath=BASE_PATH_ADMIN.'uploads/products/';
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
	$sql="SELECT * FROM `depertment` WHERE `Designation` =".$subcatid; 
	$datalist = $this->projectmodel->get_records_from_sql($sql);
	if(count($datalist)>0){
	foreach($datalist as $row){
	?>
  
		<div class="thumbnail">
		<?php if($row->Image<>''){?>
			<img src="<?php echo $picpath.$row->Image;?>" 
			class="img-rounded" alt="Cinque Terre" width="50%"  />
		<?php }?>  
			  <div class="caption">
					<ul class="list-group">
					  <li class="list-group-item list-group-item-success">
					  <h4 class="media-heading"><?php echo 'Name : '.$row->Name;?></h4>
					  </li>
						
						<li class="list-group-item list-group-item-warning">
					    <?php 
						if($row->desig<>'')
						{ echo 'Designation :'.$row->desig.'<br />';}
						
						if($row->current_working_role<>'')
						{ echo 'Current Working Role :'.$row->current_working_role.'<br />';}
						?>
					  </li>
						
						
						<?php if($row->PhoneNumber<>'')	{ ?>
						<li class="list-group-item list-group-item-info">
						<?php echo 'Phone Number :'.$row->PhoneNumber.'<br />';	?>
						<?php 
						if($row->Email<>''){echo 'Email :'.$row->Email.'<br />';}
						?>
						</li>
						<?php } ?>
					 
					
					 
					  
					</ul> 
				  </div>
			</div>
		
  	<?php  }}  else { echo 'No Record Found!';  } ?>
  </div>
  	
</div>

