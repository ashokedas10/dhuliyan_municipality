

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--new-->
<title>Dhuliyan::Municipality</title>

<script language="javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/js/cal2.js"></script>
<script language="javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/js/cal_conf2.js"></script>

<link href="<?php echo BASE_PATH_FRONT;?>theme_files/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo BASE_PATH_FRONT;?>theme_files/fonts/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />

<style type="text/css">
<!--
.style1 {color: #990033}
-->
</style>
<!--date time-->	
<script type="text/javascript">
//var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date
var currenttime = '<?php 

date_default_timezone_set('Asia/Kolkata');
print date("F d, Y H:i:s", time())?>' //PHP method of getting server date

///////////Stop editting here/////////////////////////////////

var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)

function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
setInterval("displaytime()", 1000)
}

</script>

<?php /*?><link href="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/css/docs.css" rel="stylesheet">
<link href="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/bootstrap-2.3.2/docs/assets/js/google-code-prettify/prettify.css" rel="stylesheet"><?php */?>


<link rel="stylesheet" href="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/css/bootstrap.min.css" type="text/css"/>

<script type="text/javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/bootstrap/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!--New End-->
</head>


<body>

<div id="wrapper"> 
<!--top menu section-->
<?php echo $header; ?>
<?php echo $banner; ?>
<?php echo $body; ?>


<!--Body section-->
<?php /*?><?php 

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

?><?php */?>

<?php echo $footer; ?>

</body>
</head>

<script type="text/javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/js/wowslider.js"></script>
<script type="text/javascript" src="<?php echo BASE_PATH_FRONT;?>theme_files/js/script.js"></script>