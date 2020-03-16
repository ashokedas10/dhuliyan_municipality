<div class="enquiryMain">
<h2>New User Sign Up</h2>
<form action="<?php echo BASE_URL?>cmscontaint/user_registration/" method="POST"><div class="enquiryRow"><div><b>Enter First Name</b></div>
<input type="text" name="first_name" id="first_name" value="First Name" onfocus="if(this.value=='First Name'){ this.value='';}" onblur="if(this.value==''){ this.value='First Name';}" class="email"></div>
<div class="enquiryRow"><div><b>Enter Last Name</b></div>
<input type="text" name="last_name" id="last_name" value="Last Name" onfocus="if(this.value=='Last Name'){ this.value='';}" onblur="if(this.value==''){ this.value='Last Name';}" class="email"></div>
<div class="enquiryRow"><div><b>Enter Email Id:</b></div>
<input type="text" name="emailid" id="emailid" value="Email Address" onfocus="if(this.value=='Email Address'){ this.value='';}" onblur="if(this.value==''){ this.value='Email Address';}" class="email">
</div>
<div class="enquiryRow"><div><b>Enter Mobile Or Phone No.</b></div>
<input type="text" name="mobno" id="mobno" value="Phone No." onfocus="if(this.value=='Phone No.'){ this.value='';}" onblur="if(this.value==''){ this.value='Phone No.';}" class="email">
</div>
<div class="enquiryRow"> <div><b>Enter Password</b></div>
<input type="password" name="password" id="password" value="Enter Password" onfocus="if(this.value=='Enter Password'){ this.value='';}" onblur="if(this.value==''){ this.value='Enter Password';}" class="email"></div>
<div class="enquiryRow"> <div><b>Confirm Password</b></div>
<input type="password"  name="passconf" id="passconf"  value="Confirm Password" onfocus="if(this.value=='Confirm Password'){ this.value='';}" onblur="if(this.value==''){ this.value='Confirm Password';}" class="email"></div>
<div class="enquiryRow"><div><b>Enter Date of Birth</b></div>
<input type="text"  name="dob" id="dob"  value="Date of Birth" onfocus="if(this.value=='Date of Birth'){ this.value='';}" onblur="if(this.value==''){ this.value='Date of Birth';}" class="email"></div>
<div class="enquiryRow"><div class="gen">Gender:</div>
<div class="che">
<input type="radio" name="gender" id="gender" value="male" /></div><div class="genText">Male
</div>
<div class="che">
<input type="radio" name="gender" id="gender" value="female" /></div><div class="genText">Female</div>
</div>
<div class="enquiryRow">
<div class="send">
<span>
<input name="conform_aggr" id="conform_aggr" type="checkbox" value="1" />I agree to the <a href="<?php echo BASE_URL.'cmscontaint/footerpages/web_term/'; ?>">terms & conditions</a> of Pocketbazar</span></div>
</div>
<div class="enquiryRow">
<input type="submit" value="Signup " class="button" name="">
</div>
</form>

</div>