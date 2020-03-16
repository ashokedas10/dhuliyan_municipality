<?php 

$sql="SELECT `name`, `emailid`, `password` FROM `tblm_agent` WHERE  `id` = ".$custid;
$list = $this->projectmodel->get_records_from_sql($sql);	
foreach ($list as $row){
$password=$row->password;
$emailid=$row->emailid;
$name=$row->name;
}


echo $emailpassdetails='<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>invoice </title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div>
<table width="953" border="1">
<tr><td >Dear '.$name.' your default Password against Mail ID: '.$emailid.' is: '.$password.'</td></tr> 
</table>
<div class="footer">
<p>&copy; Copyright 2014. Designed by <a href="http://www.pocketbazar.net">pocketbazar.net</a></p>
</div>
<img src="http://www.pocketbazar.net/theme_files/images/footnote.gif" ></a>
</div>

</body></html>';
?>

