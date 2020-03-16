<form onsubmit="return changepassword_validation()" method="post" action="<?php echo ADMIN_BASE_URL?>auth/changepassword_act" name="frm_changpass"> 
		  <p>
		   <input type="hidden" value="changepass" name="act">
            <input type="hidden" value="1" name="id">
          </p>
         <span class="validation_style">
		 <?php echo validation_errors(); ?>
		 <?php echo $msg; ?>
		 </span>
          <table width="70%" cellspacing="1" cellpadding="6" class="tborder" style=""> 
            <thead> 
              <tr> 
                <td align="left" colspan="2" class="tcat">Change Password </td> 
              </tr> 
            </thead> 
            <tbody> 
              <tr class="alt1"> 
                <td align="left" class="commonhelp" colspan="2"></td> 
              </tr> 
              <tr class="alt1"> 
                <td width="42%" align="left" class="leftBarText">User Name</td> 
                <td width="58%" align="left"><?php echo $user_name; ?></td> 
              </tr> 
              <tr class="alt2"> 
                <td align="left" class="leftBarText"> Old Password <font color="#FF0000">*</font></td> 
                <td align="left"><input type="password" id="pass1" class="forminputelement" name="pass1"></td> 
              </tr> 
              <tr class="alt1"> 
                <td align="left" class="leftBarText">New Password <font color="#FF0000">*</font></td> 
                <td align="left"><input type="password" id="pass2" class="forminputelement" name="pass2"></td> 
              </tr> 
              <tr class="alt1">
                <td align="left" class="leftBarText">Confirm Password <font color="#FF0000">*</font></td>
                <td align="left"><input type="password" id="pass3" class="forminputelement" name="pass3"></td>
              </tr>
              <tr class="alt2"> 
                <td>&nbsp;</td> 
                <td><input type="submit" value="Submit" class="greenbuttonelements" name="Submit">
                  &nbsp; 
                <input type="reset" class="redbuttonelements" id="Reset" name="Reset"></td></tr> 
				<!--<tr class="alt2"> 
                <td colspan="2">
				<?php
				
				/*$oFCKeditor = new FCKeditor('description') ;
				$oFCKeditor->Height		= '350';
				$oFCKeditor->BasePath	= FCKEDITOR_BASEPATH;
				$oFCKeditor->Value		= '' ;
				$oFCKeditor->Create() ;*/
				?>
				</td> 
                </tr> -->
            </tbody> 
          </table> 
      </form>