<!--body-section starts-->
<!-- <div class="body-section">-->
<!--<div class="main">
  
</div>-->
<div class="latest-heading"><span class="red-text">Projects</span></div>


<div class="body-bottom">
	
 <div class="container">

		<div class="row">
<div class="span3 bs-docs-sidebar">
<ul class="nav nav-list bs-docs-sidenav">

  <?php 
   //cat 2 for administrator
    $sqlsubcat="SELECT * FROM `subcategory` WHERE `cat_id` =8 order by orderby "; 
	$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
  	foreach ($subcategorylist as $subcat){?>
	  <li>
	  <a href="#<?php echo $subcat->id;?>"><i class="icon-chevron-right"></i>
	  <?php echo strtoupper($subcat->subcat_name);?>
	  </a>
	  </li>
  <?php } ?>
	
 <!-- <li><a href="#2"><i class="icon-chevron-right"></i>VICE-CHAIRMAN</a></li>
  <li><a href="#3"><i class="icon-chevron-right"></i>HEAD-CLARK</a></li>
  <li><a href="#4"><i class="icon-chevron-right"></i>URBAN PLANNER</a></li>
  <li><a href="#5"><i class="icon-chevron-right"></i>SUB ASST. ENGINEER</a></li>-->
  
</ul>
</div>
<div class="span9">
<?php 
$sqlsubcat="SELECT * FROM `subcategory` WHERE `cat_id` =8 order by orderby "; 
$subcategorylist = $this->projectmodel->get_records_from_sql($sqlsubcat);
foreach ($subcategorylist as $subcat){

$sql="SELECT * FROM `project` WHERE `SubCatId` =".$subcat->id; 
$datalist = $this->projectmodel->get_records_from_sql($sql);
if(count($datalist)>0){

?>

<section id="<?php echo $subcat->id;?>">
<div class="page-header"><h3><?php echo strtoupper($subcat->subcat_name);?></h3></div>		
<?php 
$picpath=BASE_PATH_ADMIN.'uploads/project/';
$sql="SELECT * FROM `project` WHERE `SubCatId` =".$subcat->id; 
$datalist = $this->projectmodel->get_records_from_sql($sql);
foreach($datalist as $row){

?> 
		 <table  border="0">
		  <tr>
			<td width="146"><img src="<?php echo $picpath.$row->images;?>" 
			alt="" width="146" height="99" /></td>
			<td width="519">
			<pre class="prettyprint linenums"><?php echo 'Title : '.$row->title;?><br /><?php 
			if($row->title_description<>''){echo 'Details :'.$row->title_description.'<br />';}?><?php if($row->price<>''){echo 'Price :'.$row->price.'<br />';}?><?php if($row->startingdate<>''){echo 'Start Date :'.$row->startingdate.'<br />';}?><?php if($row->closingdate<>''){echo 'Close Date :'.$row->closingdate.'<br />';}?><?php if($row->details<>''){echo 'Details :'.$row->details.'<br />';}?><?php if($row->doocument!=''){?><a href="<?php echo $picpath.$row->doocument; ?>">click here</a><?php } ?></pre>
			</td>
		  </tr>
		</table>
		<p>&nbsp;</p>		
		
</section>

<?php }}} ?>

</div>
</div>

</div>

	
 
</div>
  
<!-- </div>-->
<!--body-section ends-->
