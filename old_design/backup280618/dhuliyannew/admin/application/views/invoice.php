<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Title goes here</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <!--<link href="css/style.css" rel="stylesheet" type="text/css">-->
<style>  
  body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #4d5051;
	background-color: #d6d6d6;
	background-image: url(images/top-rept.jpg);
	background-repeat: repeat-x;
	background-position: left top;
	margin: 0px;
}
h1, h2, h3, h4, h5, h6, p, ul, ol, li, form, input, textarea {
	padding: 0px;
	margin: 0px;
}
a {
	color: #072FCF;
	text-decoration: underline;
}
a:hover {
	color: #072FCF;
	text-decoration: none;
}
.page-in {
	background-image: url(images/bottom-rept.jpg);
	background-repeat: repeat-x;
	background-position: left bottom;
	width: 100%;
	float: left;
}
.page {
	width: 1000px;
	margin: 0px auto;
}
.main, .header {
	width: 1000px;
	float: left;
}
.header-top {
	background-image: url(http://pocketbazar.net/theme_files/images/logo.png);
	background-repeat: no-repeat;
	background-position: left top;
	width: 1000px;
	height: 81px;
	float: left;
}

.header-top h1 {
	font-family: "Times New Roman", Times, serif;
	font-size: 55px;
	font-weight: normal;
	line-height: 81px;
	color: #FFFFFF;
	margin-left: 115px;
}
.header-top h1 span {
	color: #000000;
}
.header-bottom {
	//background-image: url(images/header.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	width: 1000px;
	height: 257px;
	float: left;
}
.header-bottom h2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	font-weight: normal;
	color: #000000;
	margin-top: 92px;
	margin-left: 27px;
}
.topmenu {
	background-image: url(images/menu-bg.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	width: 1000px;
	height: 74px;
	float: left;
}
.topmenu ul {
	height: 74px;
	margin-left: 64px;
	list-style-type: none;
}
.topmenu ul li {
	background-image: url(images/devider.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	height: 74px;
	float: left;
	padding-right: 13px;
	padding-left: 13px;
}
.topmenu ul li a {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height: 74px;
	color: #FFFFFF;
	text-decoration: none;
	display: block;
	height: 74px;
	float: left;
	padding-left: 15px;
}
.topmenu ul li a span {
	display: block;
	height: 74px;
	float: left;
	padding-right: 35px;
	cursor: pointer;
}
.topmenu ul li a:hover {
	background-image: url(images/menu-left.jpg);
	background-repeat: no-repeat;
	background-position: left top;
}
.topmenu ul li a:hover span {
	background-image: url(images/menu-right.jpg);
	background-repeat: no-repeat;
	background-position: right top;
}
.content {
	background-color: #FFFFFF;
	background-image: url(images/body-top.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	width: 952px;
	float: left;
	padding: 30px 24px 0px 24px;
}
.content-left {
	background-image: url(images/vline.jpg);
	background-repeat: repeat-y;
	background-position: right top;
	width: 621px;
	float: left;
	padding-right: 21px;
}
.row1 {
	width: 621px;
	float: left;
}
.title {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	font-weight: normal;
	color: #000000;
	margin-bottom: 30px;
}
.title span {
	color: #82ab01;
}
.copyright {
	border: 0px;
	height: 1px;
	width: 1px;
}
ul.list1 {
	margin-top: 5px;
	margin-left: 25px;
	list-style-image: url(images/bullet.jpg);
}
ul.list1 li {
	padding-top: 3px;
	padding-bottom: 3px;
}
.row2 {
	background-image: url(images/section-bg.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	width: 591px;
	height: 233px;
	float: left;
	padding: 15px 15px 0px 15px;
}
.subtitle {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight: normal;
	color: #171817;
	margin-bottom: 10px;
}
.subtitle span {
	color: #607e00;
}
a.more {
	font-size: 12px;
	line-height: 30px;
	color: #282828;
	text-decoration: none;
	background-image: url(images/more-btn.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	text-align: center;
	display: block;
	width: 83px;
	height: 38px;
	margin-top: 10px;
}
a.more:hover {
	color: #607e00;
}
.content-right {
	width: 310px;
	float: right;
	padding-top: 7px;
}
.mainmenu, .contact {
	width: 310px;
	float: right;
}
.sidebar1 {
	font-size: 18px;
	line-height: 50px;
	color: #FFFFFF;
	background-image: url(images/sidebar1.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	height: 50px;
	padding-left: 60px;
	margin-bottom: 15px;
}
.mainmenu ul {
	margin-bottom: 15px;
	list-style-type: none;
}
.mainmenu ul li {
	background-image: url(images/bullet.jpg);
	background-repeat: no-repeat;
	background-position: left center;
	padding-top: 3px;
	padding-bottom: 3px;
	padding-left: 20px;
}
.mainmenu ul li a {
	font-size: 12px;
	font-weight: bold;
	color: #000000;
	text-decoration: underline;
}
.mainmenu ul li a:hover {
	text-decoration: none;
}
.sidebar2 {
	font-size: 18px;
	line-height: 50px;
	color: #FFFFFF;
	background-image: url(images/sidebar2.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	height: 50px;
	padding-left: 60px;
	margin-bottom: 10px;
}
.contact-detail {
	background-color: #dcdcdc;
	width: 280px;
	float: right;
	padding: 15px;
}
.contact-detail p {
	margin-bottom: 10px;
}
.green {
	color: #003300;
}
.footer {
	line-height: 69px;
	background-image: url(images/footer.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	width: 952px;
	height: 69px;
	float: left;
	padding: 23px 24px 0px 24px;
}
.footer p {
	font-size: 11px;
	color: #FFFFFF;
	float: left;
}
.footer a {
	font-size: 11px;
	color: #FFFFFF;
	text-decoration: none;
}
.footer a:hover {
	text-decoration: none;
}
.footer ul {
	float: right;
}
.footer ul li {
	display: inline;
	padding-right: 10px;
	padding-left: 10px;
	border-left-width: 1px;
	border-left-style: solid;
	border-left-color: #FFFFFF;
}
.footer ul li a {
	font-size: 14px;
	color: #FFFFFF;
	text-decoration: none;
}
.footer ul li a:hover {
	text-decoration: underline;
}
</style>
  
  
  
  
</head>
<body>
<div class="page-in">
<div class="page">
<div class="main">
<div class="header">
<div class="header-top">
<h1>Pocket <span>Bazar</span></h1>
</div>
<?
$sqlinv="SELECT * FROM  purchase_summary  WHERE  purchase_id='28621'  and  custid='286'";
$sqlcust="SELECT * FROM `tblm_agent` WHERE id='286'";
$listcust = $this->projectmodel->get_records_from_sql($sqlcust);	
foreach ($listcust as $rowcust){	
$listinv = $this->projectmodel->get_records_from_sql($sqlinv);	
foreach ($listinv as $rowinv){

?>
	<table>
	<tr>
	<td><p>Billing Address</p><p>
	<? echo $rowcust->name.", ".$rowcust->res_add.", ".$rowcust->district.", ".$rowcust->city.", ".$rowcust->pincode.", ".$rowcust->state;?></p>
	<p><? echo $rowcust->mobno;?>	</p>
	</td>
	</tr>
	</table>
<? } }?>
</div>
<div class="content">

</div>
<div class="footer">
<p>&copy; Copyright 2014. Designed by <a target="_blank" href="http://www.htmltemplates.net">htmltemplates.net</a>
</p>
<ul>
 
</ul>
</div>
<!--DO NOT Remove The Footer Links-->
<!--Designed by--><a href="http://www.htmltemplates.net">
<img src="images/footnote.gif" class="copyright" alt="html templates"></a>
<!--DO NOT Remove The Footer Links-->
</div>
</div>
</div>

</body></html>