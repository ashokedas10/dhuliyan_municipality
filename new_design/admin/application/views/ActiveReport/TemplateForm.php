<div class="panel panel-primary"  style="background-color:#E67753">
	  <div class="panel-body" align="center">
		<h3><span class="label label-default">
		<?php echo $FormRptName; ?>
	   <?php if($NEWENTRYBUTTON=='YES'){ ?>
  <a href="<?php echo $tran_link;?>list/"><button type="button" class="btn btn-success">New Entry</button></a>
   <?php } ?></span></h3>
	  </div>

</div>

		
<form id="frm" name="frm" method="post" action="<?php echo $tran_link;?>save/" enctype="multipart/form-data">

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>"  />

<div class="panel panel-primary"  style="background-color:#E67753">
 <div class="panel-footer">
 <div class="form-row"> 

<?php    
	
		$SectionPRE='';
		$rownoPRE=1;
			
		$records="select * from frmrpttemplatedetails 
		where frmrpttemplatehdrID=".$frmrpttemplatehdrID." 
		and SectionType='HEADER' order by Section,FieldOrder ";
		$records = $this->projectmodel->get_records_from_sql($records);	
		foreach ($records as $record)
		{
			//RELATED TO ROW DIV CLASS
			$SectionType=$record->SectionType; //HEADER,...
			$Section=$record->Section;
			$FieldOrder=$record->FieldOrder;
			$DIVClass=$record->DIVClass; // col size
			$LabelName=$record->LabelName;
			
			//RELATED TO FIELD
			$InputName=$record->InputName;
			$InputType=$record->InputType;
			$Inputvalue=$record->Inputvalue;
			$tran_table_name=$record->tran_table_name;
			$RecordSet=$record->RecordSet;
			$MainTable=$record->MainTable;
			$LinkField=$record->LinkField;
			$LogoType=$record->LogoType;
			
			//RELATED TO LINK TABLE OF THE FIELD
			//DYNAMIK RECORD SET ...USEFL FOR DROPDOWN LIST 
			$datafields=$record->datafields;
			$table_name=$record->table_name;
			$where_condition=$record->where_condition;
			$orderby=$record->orderby;
						
			if($datafields<>'')
			{ 
			
			$RecordSet=$this->projectmodel->get_records_from_sql($datafields);}
			
				if($id>0)
				{
				 $data['DataFields']=$InputName;
				 $data['TableName']=$tran_table_name;
				 $data['WhereCondition']=" id=".$id;
				 $data['OrderBy']='';
				 $datavalue=$this->projectmodel->Activequery($data,'LIST');
				 foreach($datavalue as $key=>$bd){
				 foreach($bd as $key1=>$bdr){
				 $Inputvalue=$bdr;
				 }}
			}
									
			$InputName=
			$this->projectmodel->create_field($InputType,$LogoType,
			$LabelName,$InputName,$Inputvalue,$RecordSet);
	  ?>

<?php   if($SectionType=='HEADER'){ ?>	
			
<div class="form-group col-md-<?php echo $DIVClass; ?>">
<?php echo $InputName; ?>
</div>


   <?php  
		$records="select * from frmrpttemplatedetails	where frmrpttemplatehdrID=".$frmrpttemplatehdrID." 	and SectionType='HEADER' order by Section,FieldOrder ";
		$records = $this->projectmodel->get_records_from_sql($records);	
		foreach ($records as $record)
		{
			$InputName=$record->InputName;
			$InputType=$record->InputType;
			if($InputType=='text_area') 
			{ 
	?>
	<script> CKEDITOR.replace('<?php echo $InputName; ?>');</script>	
	<?php }} ?>	


<!--<script> CKEDITOR.replace('service_details');</script>-->

<?php } ?>

<?php }?>
			
            


<div class="panel-body" align="center">
		
  </div>  
  <div class="panel panel-primary"  style="background-color:#4caf50">
  
   <div class="panel-body" align="center">
		<button type="submit" class="btn btn-primary" id="Save" name="Save">Save</button>
  </div>
  </div>
	
</div></div></div>
</form>


<!--LIST VIEW-->
<?php if($DisplayGrid=='YES'){ ?>
<div  style="overflow:scroll">
<table  id="example1" class="table table-bordered table-striped">
	    <thead>
	        <tr>
			<?php 
			//print_r($header);
			//echo $header[1];
			foreach($GridHeader as $key=>$hdr){
			 $cn_values =explode("-", trim($hdr));			
			 ?>
	            <td  align="<?php echo $cn_values[1]; ?>"><?php echo $cn_values[0]; ?></td>
	        <?php } ?>  
			<td  align="left">Action</td> 
            </tr>
        </thead>
       
	   <tbody>
			<?php foreach($body as $key=>$bd){$column=0;?>
			<tr>
				<?php foreach($bd as $key1=>$bdr)
				{ 
					$align=$GridHeader[$column];
					$align =explode("-", trim($align));	
					$column=$column+1;
					if($key1=='id'){$id=$bdr;}
					
					
					if(($frmrpttemplatehdrID==34) && $key1=='cate_id')
					{
						if($bdr>0)
						{
							$Whr=' id='.$bdr;
							$bdr=$this->projectmodel->GetSingleVal('cate_name','service_cate',$Whr);
						}
					}
					
				?>
				<td align="<?php echo $align[1]; ?>"><?php echo $bdr; ?></td>
				<?php } ?>
				
				<td  align="left">
				<a href="<?php 	echo $tran_link.'addeditview/'.$id; ?>">
				<button class="btn-block btn-info">Edit</button></a>
				</td> 
			</tr>
			<?php } ?>	
	 </tbody>
</table>   
</div>
<?php } ?>  


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js" async defer></script>

<script>
  
  <?php   
		$records="select * from frmrpttemplatedetails 	where frmrpttemplatehdrID=".$frmrpttemplatehdrID." 
		and SectionType='HEADER' order by Section,FieldOrder ";
		$records = $this->projectmodel->get_records_from_sql($records);	
		foreach ($records as $record)
		{
		if($record->InputType=='datefield')
		{
	?>
		
     $("#<?php echo $record->InputName;?>").datepicker({
      changeMonth: true,
      changeYear: true
    });
 	
	$("#<?php echo $record->InputName;?>").change(function() {
	 var  trandate = $('#<?php echo $record->InputName;?>').val();
	 trandate=
	 trandate.substring(6, 10)+'-'+
	 trandate.substring(0, 2)+'-'+
	 trandate.substring(3, 5);
	 $("#<?php echo $record->InputName;?>").val(trandate);
	});
	
	 <?php  }} ?>
	
  </script>
