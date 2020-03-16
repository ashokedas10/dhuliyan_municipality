<?php 
   $sql="select * from company_details where id=1 ";
	$rowrecord = $this->projectmodel->get_records_from_sql($sql);	
	foreach ($rowrecord as $fld)
	{$NAME =$fld->NAME ;}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html><head>
<title><?php echo $NAME ; ?></title>
<!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->

<!--PREVIOUS PARTS-->
<link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH_ADMIN;?>theme_files/style_main.css" media="screen" />
<script type="text/javascript">

function popup(url) {
				//url="forms_reports/forms/client_certificate.php?client_id="+id;
			newwindow=window.open(url,'name','height=600,width=800');
			if (window.focus) {newwindow.focus()}
			return false;
}

function callpage(url)
{
	document.frm.action=url;
	document.frm.submit();
}


function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>	

<script src="<?php echo BASE_PATH_ADMIN;?>theme_files/calender_final/datetimepicker_css.js"></script>
<script>
function myExportToExcel(){
window.open('data:application/vnd.ms-excel,' + encodeURIComponent( $('div[id$=printablediv]').html()));
}
</script>


</head>
	
	<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">

	
      <div class="content-wrapper">       
        <section class="content">        
		  <?php echo $body; ?>
        </section>
      </div>
     
	  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>
		Copyright &copy; 2016 <a href="#"><?php echo $NAME ?></a>.</strong> 
		All rights reserved.
      </footer>




</body></html>