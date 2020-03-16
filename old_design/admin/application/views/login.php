<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login Panel</title>

<link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH_ADMIN;?>theme_files/login/css/screen.css"  type="text/css" media="screen" />

</head>
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<?php /*?><div id="logo">
	<img src="<?php echo BASE_PATH_ADMIN;?>theme_files/img/logo.png" 
	width="156" height="40" alt="" />
	</div><?php */?>
	<!-- end logo -->
	
	<!--  start top-search -->
	<div id="top-search">
	<div>
		<font color='#CCFF33' size="+1" face="Georgia, Times New Roman, Times, serif"> <b>Login Panel</b> </font>
		
		<div style="padding-top:20px;">
		
</div>
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>
</div>
<!-- End: page-top -->
</div>
<!-- End: page-top-outer -->

<body id="login-bg"> 
 
<!-- Start: login-holder -->

<div id="login-holder">

		
	<div class="clear">
	 
	  <p class="validation_style"><?php echo validation_errors(); ?></p>
	</div>
			
	<FORM id='frm_login' name='frm_login' action='<?php echo ADMIN_BASE_URL;?>auth/loginaction' method='post'>
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td>
			<input class="login-inp" id="username" size="30" name="username" type="text" value="<?php echo $username; ?>" >
			</td>
		</tr>
		
	<tr>
		<th>Password</th>
		<td><input class="login-inp" id="password" size="30" name="password" type="password"></td>
	</tr>
		
		<tr>
			<th></th>
			<td>
			<input class="submit-login" value="Login" name="submit" type="submit">
			</td>
		</tr>
		</table>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<!--<a href="" class="forgot-pwd">Forgot Password?</a>-->
 </div>
 <!--  end loginbox -->
 </FORM>
 
</div>
<!-- End: login-holder -->
</body>
</html>