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
<!--PREVIOUS PARTS END-->
<!--CURRENT TEMPLATE PARTS-->
 <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href=<?php echo BASE_PATH_ADMIN;?>theme_files/"plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/datatables/dataTables.bootstrap.css">
 <link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/select2/select2.css">
 
 
<!--CURRENT TEMPLATE PARTS-->


<!--ANGULAR JS-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<style type="text/css">
.style2 {	
	font-weight: bold;
	font-size:18px;
}
</style>
<style>
.activeTR {  
	background-color: yellow;
    color:black;	
    font-weight:bold;
}
</style>
<!--ANGULAR JS END -->

<link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/angular_autocomplete/css/spiner_style.css">

<script src="<?php echo BASE_PATH_ADMIN;?>theme_files/angular_autocomplete/controllers/angular.min.js"></script>
<script src="https://code.angularjs.org/1.6.9/angular-route.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-cookies.js"></script>

<script src="<?php echo BASE_PATH_ADMIN;?>theme_files/angular_autocomplete/controllers/general_services.js"></script>
<script src="<?php echo BASE_PATH_ADMIN;?>theme_files/angular_autocomplete/controllers/ProjectController.js"></script>
<script src="<?php echo BASE_PATH_ADMIN;?>theme_files/angular_autocomplete/controllers/spinnerLoader.js"></script>
<link rel="stylesheet" href="<?php echo BASE_PATH_ADMIN;?>theme_files/angular_autocomplete/css/css.css">

<script>
$(document).ready(function(){ //executed after the page has loaded

    checkURL(); //check if the URL has a reference to a page and load it

    $('ul li a').click(function (e){    //traverse through all our navigation links..
            checkURL(this.hash);    //.. and assign them a new onclick event, using their own hash as a parameter (#page1 for example)
    });

    setInterval("checkURL()",250);  //check for a change in the URL every 250 ms to detect if the history buttons have been used

});

var lasturl=""; //here we store the current URL hash

function checkURL(hash)
{
  
    if(!hash) hash=window.location.hash;    //if no parameter is provided, use the hash value from the current address

    if(hash != lasturl) // if the hash value has changed
    {
        lasturl=hash;   //update the current hash
        loadPage(hash); // and load the new page
    }
}

function loadPage(url)  //the function that loads pages via AJAX
{
    url=url.replace('#','');    //strip the #page part of the hash and leave only the page number
	//alert(url);
   // $('#loading').css('visibility','visible');  //show the rotating gif animation

	 var controller = 'project_controller';
     var base_url = '<?php echo ADMIN_BASE_URL;  ?>';
	 var pageurl=base_url + controller + '/load_page/';						
	
  <?php /*?>  $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        url:pageurl,
        data: url,  //with the page number as a parameter
     	 'success' : function(pagehtml){
		 alert(pagehtml);
		 if(pagehtml){ pageContent.html(pagehtml);}}

    });<?php */?>
	 alert(pageurl);
	$.ajax({
	'url' : pageurl,
	'type' : 'POST', //the way you want to send data to your URL
	'data' : {'pageId' : url },
	'success' : function(data){ 
	if(data){ pageContent.html(data);	}
	}
	});

}
</script>

<script type="text/javascript" src="<?php echo BASE_PATH_ADMIN;?>theme_files/ckeditor/ckeditor.js"></script>



</head>
	
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
 
	
	<div class="wrapper" >
		<?php echo $top_menu; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <?php echo $body; ?>
		  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
	  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>
		Copyright &copy; 2016 <a href="#"><?php echo $NAME ?></a>.</strong> 
		All rights reserved.
      </footer>
 	  
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/fastclick/fastclick.min.js"></script>
	
	
    <!-- AdminLTE App -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/dist/js/demo.js"></script>
	
	<!-- DataTables -->
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_PATH_ADMIN;?>theme_files/plugins/datatables/dataTables.bootstrap.min.js"></script>
	
	
	
    <!-- Page script -->
 <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();
        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	 <!-- page script -->
	 
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
</body></html>