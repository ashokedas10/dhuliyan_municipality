<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>invoice </title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <!--<link href="css/style.css" rel="stylesheet" type="text/css">-->
<style>  
  body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #4d5051;
	background-image: url(http://localhost/ecommerce/theme_files/images/top-rept.jpg);
	background-repeat: repeat-x;
	background-position: left top;
	margin: 0px;
	background-color: #CCCCCC;
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
	background-image: url(http://localhost/ecommerce/theme_files/images/bottom-rept.jpg);
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
	background-image: url(http://localhost/ecommerce/theme_files/images/logo.png);
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
	//color: //#FFFFFF;
	margin-left: 115px;
}
.header-top h1 span {
	color: #000000;
}
.header-bottom {
	background-image: url(http://localhost/ecommerce/theme_files/images/header.jpg);
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
	background-image: url(http://localhost/ecommerce/theme_files/images/menu-bg.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	width: 1000px;
	height: 69px;
	float: left;
}
.topmenu ul {
	height: 74px;
	margin-left: 64px;
	list-style-type: none;
}
.topmenu ul li {
	background-image: url(http://localhost/ecommerce/theme_files/images/devider.jpg);
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
	background-image: url(http://localhost/ecommerce/theme_files/images/menu-left.jpg);
	background-repeat: no-repeat;
	background-position: left top;
}
.topmenu ul li a:hover span {
	background-image: url(http://localhost/ecommerce/theme_files/images/menu-right.jpg);
	background-repeat: no-repeat;
	background-position: right top;
}
.content {
	background-color: #FFFFFF;
	background-image: url(http://localhost/ecommerce/theme_files/images/body-top.jpg);
	background-repeat: no-repeat;
	background-position: left top;
	width: 952px;
	float: left;
	padding: 30px 24px 0px 24px;
}
.content-left {
	
	background-repeat: repeat-y;
	background-position: right top;
	width: 952px; 
	float: left;
	//padding-right: 21px;
}
.row1 {
	width: 952px; 
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
	list-style-image: url(http://localhost/ecommerce/theme_files/images/bullet.jpg);
}
ul.list1 li {
	padding-top: 3px;
	padding-bottom: 3px;
}
.row2 {
	background-image: url(http://localhost/ecommerce/theme_files/images/section-bg.jpg);
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
	background-image: url(http://localhost/ecommerce/theme_files/images/more-btn.jpg);
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
	background-image: url(http://localhost/ecommerce/theme_files/images/sidebar1.jpg);
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
	background-image: url(http://localhost/ecommerce/theme_files/images/bullet.jpg);
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
	background-image: url(http://localhost/ecommerce/theme_files/images/sidebar2.jpg);
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
	background-image: url(http://localhost/ecommerce/theme_files/images/footer.jpg);
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
  
  
<?php
$sqlinv="SELECT * FROM  purchase_summary  WHERE  purchase_id='28621'  and  custid='286'";
$sqlcust="SELECT * FROM `tblm_agent` WHERE id='286'";
$listcust = $this->projectmodel->get_records_from_sql($sqlcust);
$listinv = $this->projectmodel->get_records_from_sql($sqlinv);	
?>
 
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div class="page-in">
<div class="page">
<div class="main">
<div class="header">
<div class="header-top">
<h1>Pocket <span>Bazar</span></h1>
</div>
<!--<div class="header-bottom">
<h2>Thank You For Your Order. </h2>
</div>-->
<div class="topmenu">

</div>

</div>
<div class="content">
<div class="content-left">
<div class="row1">
<h1 class="title"></h1>
<table width="953" border="1">

  <tr><td width="25%"></td><td width="25%"></td><td width="25%"></td><td width="25%"></td></tr>
    <td colspan="3"><img width="130" height="50" src="http://localhost/ecommerce/theme_files/images/logo.png" ><img src="http://localhost/ecommerce/theme_files/images/POCKETBAZAR-LOGO.jpg" width="430" height="43"></td>
    <td>
	<? foreach ($listinv as $rowinv){  ?>
	<table>
		<tr><td width="69">invoice No. </td>
		<td width="146"><? echo $rowinv->purchase_id; ?></td>
		</tr>
		<tr><td>Invoice Date.</td><td><? echo $rowinv->pur_date; ?></td></tr>
		<tr><td>Payment Mode.</td><td><? echo $rowinv->; ?></td></tr>
	</table>
	<? } ?>
	</td>
  </tr>
  <tr>
    <td>
<?	foreach ($listcust as $rowcust){ ?>
	<table><tr><td colspan="2">Billing Details:</td></tr>
		<tr><td width="69">Name. </td>
		<td width="146"><? echo $rowcust->name; ?></td>
		</tr>
		<tr><td>Address.</td><td><? echo $rowcust->res_add.", ".$rowcust->district.",<br /> ".$rowcust->city.",<br /> ".$rowcust->pincode.",<br /> ".$rowcust->state; ?></td></tr>
		<tr><td>Phone.</td><td><? echo $rowcust->mobno; ?></td></tr>
		<tr><td>email.</td><td><? echo $rowcust->emailid; ?></td></tr>
	</table>
	<? } ?>
	
	</td>
    <td colspan="2">&nbsp;</td>
    <td>
	<?  foreach ($listinv as $rowinv){ ?>
	<table><tr><td colspan="2">Shipping Details:</td></tr>
		<tr><td width="69">Name. </td>
		<td width="146"><? echo $rowinv->name; ?></td>
		</tr>
		<tr><td>Address.</td><td><? echo $rowinv->address.", ".$rowinv->landmark.",<br /> ".$rowinv->pincode.",<br /> ".$rowinv->country; ?></td></tr>
		<tr><td>Phone.</td><td><? echo $rowinv->phone; ?></td></tr>
	</table>
	<? } ?>
	</td>
  </tr>
  <tr>
    <td colspan="4">
	<table>
	<tr><th width="48">sl no.</th>
	<th width="518">Product</th>
	<th width="116">qty</th>
	<th width="117">Price</th>
	<th width="120">Sub Total</th>
	</tr>
	<? $sql_inv_d="SELECT a.product_name, a.product_code, b.quantity,b.mrp, b.sub_total from product a,purchase_details b,purchase_summary c where a.id=b.product_id, b.purchase_id=c.id and c.custid='286'"; 
		$list_inv_d = $this->projectmodel->get_records_from_sql($sql_inv_d);
		$i=0;	$total_price=0;
		foreach ($list_inv_d as $row_inv_d){ $i=$i+1; $total_price=$total_price+$row_inv_d->mrp; 
	?>
	<tr>
	<td><? echo $i; ?></td>
	<td><? echo $row_inv_d->product_name." ".$row_inv_d->product_code; ?></td>
	<td><? echo $row_inv_d->quantity; ?></td>
	<td><? echo $row_inv_d->mrp; ?></td>
	<td><? echo $row_inv_d->sub_total; ?></td>
	</tr>
	<? } ?>
	</table>
	</td>
  </tr>
  <tr>
    <td colspan="3"><p align="right">Total </p></td>
    <td><? echo $total_price; ?></td>
  </tr>
  
  <tr>
  	<td colspan="4"><p align="left">Ammount Chargeabal  (in words) <br>Rs. <? echo ; ?></p>
  	  <p align="left">&nbsp;</p>
  	  <p align="left">&nbsp;</p>
  	  <p align="left">&nbsp;</p></td>
  </tr>
</table>
<p><br>
    <br>
</p>
</div>
</div>
</div>
<div class="footer">
<p>&copy; Copyright 2014. Designed by <a href="http://www.pocketbazar.net">pocketbazar.net</a>
</p>
<ul>
 
</ul>
</div>
<!--DO NOT Remove The Footer Links-->
<!--Designed by-->
<img src="http://localhost/ecommerce/theme_files/images/footnote.gif" ></a>
<!--DO NOT Remove The Footer Links-->
</div>
</div>
</div>

</body></html>