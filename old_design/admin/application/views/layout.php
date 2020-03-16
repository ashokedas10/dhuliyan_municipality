<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html><head>
<title>Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo BASE_PATH_ADMIN;?>../favicon.ico" rel="shortcut icon">

<link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH_ADMIN;?>theme_files/css/style_main.css" media="screen" />

<link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH_ADMIN;?>theme_files/css/reset.css" media="screen" />
   <?php /*?> <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH_ADMIN;?>theme_files/css/text.css" media="screen" /><?php */?>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH_ADMIN;?>theme_files/css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH_ADMIN;?>theme_files/css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH_ADMIN;?>theme_files/css/nav.css" media="screen" />
	<?php /*?><link href="<?php echo BASE_PATH_ADMIN;?>theme_files/css/table/demo_page.css" rel="stylesheet" type="text/css" /><?php */?>
	
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    
	
    <!-- BEGIN: load jquery -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
      <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/table/jquery.dataTables.min.js" type="text/javascript"></script>
	  <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/calender_final/datetimepicker_css.js"></script>
    <!-- END: load jquery -->
	
	
    <script type="text/javascript" src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/table/table.js"></script>
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>

<!--date js-->
<script language="javascript" src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/cal2.js"></script>
<script language="javascript" src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/cal_conf2.js"></script>
<!--date js end -->


<script type="text/javascript">


function totalise()
{
 	var freight_charge = parseFloat(document.getElementById('freight_charge').value);
	var ess_charge = parseFloat(document.getElementById('ess_charge').value);
	var fuel_surcharge = parseFloat(document.getElementById('fuel_surcharge').value);
	var doc_charge = parseFloat(document.getElementById('doc_charge').value);
	var to_pay_charge = parseFloat(document.getElementById('to_pay_charge').value);
	var cod_dod_charge = parseFloat(document.getElementById('cod_dod_charge').value);
	var dacc_charge = parseFloat(document.getElementById('dacc_charge').value);
	var fov_charge = parseFloat(document.getElementById('fov_charge').value);
	var other_charge = parseFloat(document.getElementById('other_charge').value);
	var service_tax = parseFloat(document.getElementById('service_tax').value);
	
	var sub_total = document.getElementById('sub_total');
	var grand_total = document.getElementById('grand_total');
	
    sub_total.value = freight_charge + ess_charge + fuel_surcharge + doc_charge +to_pay_charge + cod_dod_charge + dacc_charge + fov_charge + other_charge;
	
	var sub_total1 = parseFloat(document.getElementById('sub_total').value);
	
	grand_total.value=sub_total1+service_tax;
}


function popup(url) {
	
	//url="forms_reports/forms/client_certificate.php?client_id="+id;
	newwindow=window.open(url,'name','height=600,width=800');
	if (window.focus) {newwindow.focus()}
	return false;
}


</script>


<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
</script>


<!--multi select option-->

<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>-->
<script language="javascript" type="text/javascript">
	//this will move selected items from source list to destination list			
	function move_list_items(sourceid, destinationid)
	{
		$("#"+sourceid+"  option:selected").appendTo("#"+destinationid);
	}

	//this will move all selected items from source list to destination list
	function move_list_items_all(sourceid, destinationid)
	{
		$("#"+sourceid+" option").appendTo("#"+destinationid);
	}
    
</script>

<style type="text/css">
selectmultibox {
	width:200px;
	height:100px;
}
</style>

<!--multi select option end-->



</head>
<body>
 <div class="container_12">
		<!--Header Section-->
		<?php echo $top_menu; ?>
		<!--Header Section-->
				
		<!--Left Navigation -->
		<?php //echo $left_bar; ?>
		<!--Left Navigation End-->
		
		<!--Body Section-->
		<?php echo $body; ?>
		<!--Body Section End-->
		
  </div>
  
    
	
	
    <div class="clear"></div>
    <div id="site_info">
	<p>Copyright <a href="#"> Admin</a>. All Rights Reserved.</p>
	</div>

<br>
</body></html>