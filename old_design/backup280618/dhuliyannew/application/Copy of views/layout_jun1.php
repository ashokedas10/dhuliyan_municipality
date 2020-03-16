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
	
	

<!--multi step registration-->

<link href="<?php echo BASE_PATH_FRONT;?>theme_files/multistep_registration/styles/smart_wizard.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/multistep_registration/js/jquery-1.4.2.min.js"></script>

<script type="text/javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/multistep_registration/js/jquery.smartWizard-2.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
    	// Smart Wizard     	
  		$('#wizard').smartWizard({transitionEffect:'slideleft',onLeaveStep:leaveAStepCallback,onFinish:onFinishCallback,enableFinishButton:true});

      function leaveAStepCallback(obj){
        var step_num= obj.attr('rel');
        return validateSteps(step_num);
      }
      
      function onFinishCallback(){
       if(validateAllSteps()){
        $('form').submit();
       }
      }
		});
	   
    function validateAllSteps(){
       var isStepValid = true;
       
       if(validateStep1() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:false});
       }
       
       if(validateStep3() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:true});         
       }else{
         $('#wizard').smartWizard('setError',{stepnum:3,iserror:false});
       }
       
       if(!isStepValid){
          $('#wizard').smartWizard('showMessage','Please correct the errors in the steps and continue');
       }
              
       return isStepValid;
    } 	
	
		function validateSteps(step){
		  var isStepValid = true;
      // validate step 1
      if(step == 1){
        if(validateStep1() == false ){
          isStepValid = false; 
          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }
      
      // validate step3
      if(step == 3){
        if(validateStep3() == false ){
          isStepValid = false; 
          $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
        }else{
          $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
        }
      }
      
      return isStepValid;
    }
		
		function validateStep1(){
       var isValid = true; 
       // Validate Username
       var un = $('#email').val();
       if(!un && un.length <= 0){
         isValid = false;
         $('#msg_username').html('Please fill username').show();
       }else{
         $('#msg_username').html('').hide();
       }
       
       // validate password
       var pw = $('#password').val();
	   var cpw = $('#cpassword').val();
       if(!pw && pw.length <= 0){
         isValid = false;
         $('#msg_password').html('Please fill password').show();         
       }else{
         $('#msg_password').html('').hide();
       }
       
       // validate confirm password
       //var cpw = $('#cpassword').val();
       if(!cpw && cpw.length <= 0){
         isValid = false;
         $('#msg_cpassword').html('Please fill confirm password').show();         
       }else{
         $('#msg_cpassword').html('').hide();
       }  
       
       // validate password match
       if(pw && pw.length > 0 && cpw && cpw.length > 0){
         if(pw != cpw){
           isValid = false;
           $('#msg_cpassword').html('Password mismatch').show();            
         }else{
           $('#msg_cpassword').html('').hide();
         }
       }
       return isValid;
    }
    
    function validateStep3(){
      var isValid = true;    
      //validate email  email
      var email = $('#email').val();
       if(email && email.length > 0){
         if(!isValidEmailAddress(email)){
           isValid = false;
           $('#msg_email').html('Email is invalid').show();           
         }else{
          $('#msg_email').html('').hide();
         }
       }else{
         isValid = false;
         $('#msg_email').html('Please enter email').show();
       }       
      return isValid;
    }
    
    // Email Validation
    function isValidEmailAddress(emailAddress) {
      var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
      return pattern.test(emailAddress);
    } 
		
		
</script>


<!--multi step registration-->

<!--date js-->
<script language="javascript" src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/cal2.js"></script>
<script language="javascript" src="<?php echo BASE_PATH_ADMIN;?>theme_files/js/cal_conf2.js"></script>
<!--date js end -->



	
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
if($pagename=='customer_list') { echo $customer_list; }
if($pagename=='customer_join') { echo $customer_join; }
if($pagename=='purchase_welcome') { echo $purchase_welcome; }
if($pagename=='aboutus') { echo $aboutus; }
if($pagename=='contactus') { echo $contactus; }


?>

<!--Footer section-->
<div id="footer">
<div id="footerContainer">
<div id="footerTopBar">
<div class="store">
<h1 align="center">Store</h1>
<p align="center">
<a href="<?php echo BASE_URL.'cmscontaint/footerpages/aboutus/'?> ">About Us </a> | 
<a href="<?php echo BASE_URL.'cmscontaint/footerpages/contactus/'?>">Contact Us</a> | 
<a href="#">Fashion Accessories</a> | <a href="#">Jewellery</a> | <a href="#">Watches</a> | <a href="#">Mobiles</a> | <a href="#">Computer &amp; Spare Parts</a> | <a href="#">Camera &amp; Accessories</a> | <a href="#">Electronics</a> | <a href="#">Gifts</a> | <a href="#">FMCG</a> | <a href="#">Car &amp; Byke</a> | <a href="#">Television</a></p>
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
