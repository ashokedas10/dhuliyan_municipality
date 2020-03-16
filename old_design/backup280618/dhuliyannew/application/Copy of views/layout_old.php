<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome ::</title>
<link href="<?php echo BASE_PATH_FRONT;?>theme_files/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_PATH_FRONT;?>theme_files/css/menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/js/easySlider1.5.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({
				controlsBefore:	'<p id="controls">',
				controlsAfter:	'</p>',
				auto: true, 
				continuous: true
			});
			$("#slider2").easySlider({
				controlsBefore:	'<p id="controls2">',
				controlsAfter:	'</p>',		
				prevId: 'prevBtn2',
				nextId: 'nextBtn2'	
			});			
		});	
	</script>
    <!--[if IE 7]>
    <style type="text/css">
        #vtab > ul > li.selected{
            border-right: 1px solid #fff !important;
        }
        #vtab > ul > li {
            border-right: 1px solid #ddd !important;
        }
        #vtab > div { 
            z-index: -1 !important;
            left:1px;
        }
    </style>
    <![endif]-->
    <script type="text/javascript">
        $(function() {
            var $items = $('#vtab>ul>li');
            $items.mouseover(function() {
                $items.removeClass('selected');
                $(this).addClass('selected');

                var index = $items.index($(this));
                $('#vtab>div').hide().eq(index).show();
            }).eq(1).mouseover();
        });
    </script>
	
	


<!--date js-->
<script language="javascript" src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/cal2.js"></script>
<script language="javascript" src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/cal_conf2.js"></script>
<!--date js end -->







<!-- Product Deatails Scroll -->

<script src="<?php echo BASE_PATH_FRONT;?>theme_files/jqzoom_ev-2.3/js/jquery-1.6.js" type="text/javascript"></script>
<script src="<?php echo BASE_PATH_FRONT;?>theme_files/jqzoom_ev-2.3/js/jquery.jqzoom-core.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo BASE_PATH_FRONT;?>theme_files/jqzoom_ev-2.3/css/jquery.jqzoom.css" type="text/css">
<style type"text/css">

body{margin:0px;padding:0px;font-family:Arial;}
a img,:link img,:visited img { border: none; }
table { border-collapse: collapse; border-spacing: 0; }
:focus { outline: none; }
*{margin:0;padding:0;}
p, blockquote, dd, dt{margin:0 0 8px 0;line-height:1.5em;}
fieldset {padding:0px;padding-left:7px;padding-right:7px;padding-bottom:7px;}
fieldset legend{margin-left:15px;padding-left:3px;padding-right:3px;color:#333;}
dl dd{margin:0px;}
dl dt{}

.clearfix:after{clear:both;content:".";display:block;font-size:0;height:0;line-height:0;visibility:hidden;}
.clearfix{display:block;zoom:1}


ul#thumblist{display:block;}
ul#thumblist li{float:left;margin-right:2px;list-style:none;}
ul#thumblist li a{display:block;border:1px solid #CCC;}
ul#thumblist li a.zoomThumbActive{
    border:1px solid red;
}

.jqzoom{

	text-decoration:none;
	float:left;
}





</style>
<script type="text/javascript">

$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
			//preloadText'Loading zoom',
			zoomWidth: 600,  
            zoomHeight: 550,  
            lens:true,
            preloadImages: false,
            alwaysOn:false
        });
	
});


</script>

<!--Product details Scroll Ends-->
	
</head>

<body>
<div id="wrapper">
<!--top menu section-->
<?php echo $top_menu; ?>

<!--Body section-->
<?php 

if($pagename=='home_page') { echo $home_page; }
if($pagename=='product_listing') { echo $product_listing; }
if($pagename=='product_details') { echo $product_details; }
if($pagename=='user_register_login') { echo $user_register_login; }
if($pagename=='cartview') { echo $cartview; }
if($pagename=='login_user') { echo $loginwelcome; }
if($pagename=='check_out') { echo $check_out; }
if($pagename=='edit_profile') { echo $edit_profile; }
//if($pagename=='customer_list') { echo $customer_list; }
if($pagename=='customer_join') { echo $customer_join; }
if($pagename=='purchase_welcome') { echo $purchase_welcome; }
if($pagename=='aboutus') { echo $aboutus; }
if($pagename=='contactus') { echo $contactus; }
if($pagename=='delevery') { echo $delevery; }
if($pagename=='privacy') { echo $privacy; }
if($pagename=='refund') { echo $refund; }
if($pagename=='terms') { echo $terms; }
if($pagename=='return') { echo $return; }
if($pagename=='web_term') { echo $web_term; }
if($pagename=='customer_listing') { echo $customer_listing; }
if($pagename=='mycart') { echo $mycart; }
if($pagename=='myorder') { echo $myorder; }
if($pagename=='myself') { echo $myself; }
if($pagename=='mypassword') { echo $mypassword; }
if($pagename=='customer_add') { echo $customer_add; }
if($pagename=='saler_login_register') { echo $saler_login_register; }
if($pagename=='product_add') { echo $product_add; }
if($pagename=='commision') { echo $commision; }

?>

<!--Footer section-->
<div id="footer">
<div id="footerContainer">
<div id="footerTopBar">
<div class="store">
<h1 align="center">Store</h1>
<p align="center">
<?php 
	$id=$this->session->userdata('id');
	$name=$this->session->userdata('name');
?>  

<a href="<?php echo BASE_URL.'cmscontaint/footerpages/aboutus/'; ?> ">About Us </a> | 
<a href="<?php echo BASE_URL.'cmscontaint/footerpages/contactus/'; ?>">Contact Us</a> | 
<a href="<?php echo BASE_URL.'cmscontaint/footerpages/delevery/'; ?>">Delivery and Shipping</a> | 
<a href="<?php echo BASE_URL.'cmscontaint/footerpages/privacy/'; ?>">Privacy Policy</a> | 
<a href="<?php echo BASE_URL.'cmscontaint/footerpages/refund/'; ?>">Refund and Cancel</a> | 
<a href="<?php echo BASE_URL.'cmscontaint/footerpages/return/'; ?>">Return Policy</a> | 
<a href="<?php echo BASE_URL.'cmscontaint/footerpages/terms/'; ?>">Terms_of_Sales</a> | 
<a href="<?php echo BASE_URL.'cmscontaint/footerpages/web_term/'; ?>">Website_Terms</a>
</p>
</div>
<div class="connect">
<h1 align="center">Connect With Us</h1>
<div class="connectLink"><center>
<a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/face.png" alt="image" /></a><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/tweet.png" alt="image" /></a><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/w.png" alt="image" /></a><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/youtube.png" alt="image" /></a><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/google.png" alt="image" /></a><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/p.png" alt="image" /></a><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/blue.png" alt="image" /></a><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/love.png" alt="image" /></a> </center></div>
<!--<div class="play"><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/play.png" alt="image"  /></a><a href="#"><img src="<?php echo BASE_PATH_FRONT;?>theme_files/images/app.png" width="90" height="31" /></a></div>-->
</div>
</div>
</div>
<div id="footerBottom">
  <div align="center">&copy; 2014 Online Store. All rights reserved.</div>
</div>
</div>
</div>
</body>
</html>
