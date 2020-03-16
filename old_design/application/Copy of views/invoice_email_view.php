<?php 

$sqlinv="SELECT * FROM  purchase_summary  WHERE  id=".$id."  and  custid=".$custid;
$listinv = $this->projectmodel->get_records_from_sql($sqlinv);	
foreach ($listinv as $rowinv){
$purchase_id=$rowinv->purchase_id;
$pur_date=$rowinv->pur_date;
$Payment_mode='Cash on Delivery';
$ship_name=$rowinv->name;
$ship_address=$rowinv->address.",<br />".$rowinv->landmark.",<br />PIN-".$rowinv->pincode.", ".$rowinv->country;
$ship_mob=$rowinv->phone;
}
$sqlcust="SELECT * FROM `tblm_agent` WHERE id=".$custid;
$listcust = $this->projectmodel->get_records_from_sql($sqlcust);
foreach ($listcust as $rowcust){
$bill_name=$rowcust->name;
$bill_address=$rowcust->res_add.", ".$rowcust->district.",<br /> ".$rowcust->city.",<br /> ".$rowcust->pincode.",<br /> ".$rowcust->state;
$bill_mob=$rowcust->mobno;
$bill_emailid=$rowcust->emailid;
}

$invoicedetails='';
$total_amt=0;
$sql_inv_d="SELECT a.product_name, a.product_code, b.quantity,b.mrp, b.sub_total from 
product a,purchase_details b,purchase_summary c 
where a.id=b.product_id and b.purchase_id=c.id and c.custid=".$custid." and c.id=".$id;

/*$sql_inv_d="SELECT b.product_id, b.quantity,b.mrp, b.sub_total from 
purchase_details b,purchase_summary c 
where  b.purchase_id=c.id and c.custid=".$custid." and c.id=".$id;*/

		$list_inv_d = $this->projectmodel->get_records_from_sql($sql_inv_d);
		$i=0;	$total_price=0;
		foreach ($list_inv_d as $row_inv_d){ $i=$i+1; $total_price=$total_price+$row_inv_d->mrp; 
		
$invoicedetails=$invoicedetails.'<tr>
	<td>'.$i.'</td>
	<td>'.$row_inv_d->product_name.'('.$row_inv_d->product_code.')</td>
	<td>'.$row_inv_d->quantity.'</td>
	<td>'.$row_inv_d->mrp.'</td>
	<td>'.$row_inv_d->sub_total.'</td>
	</tr>';
	$total_amt=$total_amt+$row_inv_d->sub_total;
	} 		
	
	
$total_amt_in_word='';



$emailcustdetails='<table>
		<tr><td width="69">Invoice No. </td>
		<td width="146">'.$purchase_id.'</td>
		</tr>
		<tr><td>Invoice Date.</td><td>'.$pur_date.'</td></tr>
		<tr><td>Payment Mode.</td><td>'.$Payment_mode.'</td></tr>
	</table>';

$email_billing='<table><tr><td colspan="2">Billing Details:</td></tr>
		<tr><td width="69">Name. </td>
		<td width="146">'.$bill_name.'</td>
		</tr>
		<tr><td>Address.</td><td>'.$bill_address.'</td></tr>
		<tr><td>Phone.</td><td>'.$bill_mob.'</td></tr>
		<tr><td>email.</td><td>'.$bill_emailid.'</td></tr>
	</table>';
	
$email_shipping='<table><tr><td colspan="2">Shipping Details:</td></tr>
		<tr><td width="69">Name. </td>
		<td width="146">'.$ship_name.'</td>
		</tr>
		<tr><td>Address.</td><td>'.$ship_address.'</td></tr>
		<tr><td>Phone.</td><td>'.$ship_mob.'</td></tr>
	</table>';
	
echo $emailmsg='<!DOCTYPE html>
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
	background-image: url(http://www.pocketbazar.net/theme_files/images/top-rept.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/images/bottom-rept.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/images/logo.png);
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
	background-image: url(http://www.pocketbazar.net/theme_files/header.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/menu-bg.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/devider.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/menu-left.jpg);
	background-repeat: no-repeat;
	background-position: left top;
}
.topmenu ul li a:hover span {
	background-image: url(http://www.pocketbazar.net/theme_files/menu-right.jpg);
	background-repeat: no-repeat;
	background-position: right top;
}
.content {
	background-color: #FFFFFF;
	background-image: url(http://www.pocketbazar.net/theme_files/images/body-top.jpg);
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
	list-style-image: url(http://www.pocketbazar.net/theme_files/images/bullet.jpg);
}
ul.list1 li {
	padding-top: 3px;
	padding-bottom: 3px;
}
.row2 {
	background-image: url(http://www.pocketbazar.net/theme_files/images/section-bg.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/images/more-btn.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/images/sidebar1.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/images/bullet.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/images/sidebar2.jpg);
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
	background-image: url(http://www.pocketbazar.net/theme_files/images/footer.jpg);
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
<p>&nbsp;</p>
</div>
<div class="content">
<div class="content-left">
<div class="row1">

<table width="953" border="1">

	<tr>
    <td colspan="3"><img width="130" height="50" src="http://www.pocketbazar.net/theme_files/images/logo.png" >
	<img src="http://pocketbazar.net/theme_files/images/POCKETBAZAR-LOGO.PNG" width="430" height="43"></td>
  </tr>
  
  <tr>
    <td colspan="2">'.$emailcustdetails.'</td>
    <td>'.$email_billing.'<br />'.$email_shipping.'</td>
  </tr>
  
  <tr>
    <td colspan="4">
	<table>
	<tr><th width="48">sl no.</th>
	<th width="518">Product</th>
	<th width="116">qty</th>
	<th width="117">Price</th>
	<th width="120">Sub Total</th>
	</tr>'.$invoicedetails.'	
	</table>
	</td>
  </tr>
  <tr>
    <td colspan="3"><p align="left">VAT NO: 19404052079</p></td>	
  </tr>
  <tr>
    <td colspan="2"><p align="right">Total </p></td>
	<td >'.$total_amt.'</td>
  </tr>
  
  <tr>
   <td colspan="2">Ammount Chargeable(in words) <br>Rs.</td>
  	<td>'.$total_amt_in_word.'</td>
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
<img src="http://www.pocketbazar.net/theme_files/images/footnote.gif" ></a>
<!--DO NOT Remove The Footer Links-->
</div>
</div>
</div>

</body></html>';


?>