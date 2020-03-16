<div class="departmentBox">
<ul>
<?php $sql="SELECT * FROM `subcategory` WHERE `cat_id` =5"; $datalist = $this->projectmodel->get_records_from_sql($sql);?>
<?php foreach($datalist as $row){$picpath=BASE_PATH_ADMIN.'uploads/subcat/';?>
<li><a href="<?php echo BASE_URL?>cmscontaint/dept_spec/<?php echo $row->id;?>"><img src="<?php echo $picpath.$row->Image;?>" width="64" height="64" /> <br /><?php echo strtoupper($row->subcat_name); ?></a></li>
<?php } ?>
  <br class="clear" />
</ul>
</div>