	
	
<?php
if($id > 0){
?>	
	<form id="frm" name="frm" method="post" action="<?php echo ADMIN_BASE_URL?>cmscontaint/addedit_act">
        <p>
          <input type="hidden" value="update1" name="act">
		  <input type="hidden" value="<?php echo $id; ?>" name="id">
      </p>
	    <table width="95%" cellspacing="1" cellpadding="6" class="tborder">
          <thead>
            <tr>
              <td align="left" colspan="2" class="tcat">View Page Details Section </td>
            </tr>
          </thead>
          <tbody>
            <tr class="alt1">
              <td align="left" class="alt1" colspan="2">			  </td>
            </tr>
            <tr class="alt2">
              <td align="left" class="redbuttonelements" colspan="2" onclick="window.location = '<?php echo ADMIN_BASE_URL?>cmscontaint/addedit/<?php echo $id; ?>/'">
			  	<?php echo validation_errors(); ?>
		 		<?php echo $msg; ?>				</td>
            </tr>
			
            <tr class="alt2">
              <td width="18%" align="left" class="leftBarText">Page Url</td>
              <td width="82%" align="left"><?php echo BASE_URL.$row->urlkey; ?></td>
            </tr>
						<tr class="alt2">
              <td width="18%" align="left" class="leftBarText">Page Name</td>
              <td width="82%" align="left"><?php echo $row->cmsName; ?>
			  <input type="hidden" id="cmsName" class="forminputelement" name="cmsName" value="<?php echo $row->cmsName; ?>">
			  <input type="hidden" id="mnuorder" class="forminputelement" name="mnuorder" value="<?php echo $row->mnuorder; ?>">
			  <input type="hidden" id="status" class="forminputelement" name="status" value="<?php echo $row->cmsStatus; ?>">			  </td>
            </tr>
			
			<tr class="alt2">
              <td width="18%" align="left" class="leftBarText">Page Title</td>
              <td width="82%" align="left"><input type="text" id="pagetitle" class="forminputelement" value="<?php echo $row->pagetitle; ?>" name="pagetitle"></td>
            </tr>
			<tr class="alt2">
              <td width="18%" valign="top" align="left" class="leftBarText">Page Meta Keywords</td>
              <td width="82%" align="left">
			  <textarea id="metakeywords" rows="5" cols="60" class="forminputelement" name="metakeywords"><?php echo $row->metakeywords; ?></textarea>			  </td>
            </tr>
			<tr class="alt2">
              <td width="18%" valign="top" align="left" class="leftBarText">Page Meta Description</td>
              <td width="82%" align="left">
			  <textarea id="metadesc" rows="5" cols="60" class="forminputelement" name="metadesc"><?php echo $row->metadesc; ?></textarea>			  </td>
            </tr>
			<!--<tr class="alt2">
              <td width="18%" valign="top" align="left" class="leftBarText">Status<font color="#FF0000">*</font></td>
			  <td width="82%" align="left">
			  Active <input type="radio" <?php //echo ($row->cmsStatus=='A')?'checked="checked"':''; ?> value="A" name="status">&nbsp;&nbsp; 
			  Inactive <input type="radio" <?php //echo ($row->cmsStatus=='I')?'checked="checked"':''; ?> value="I" name="status">			  
			  
            -->
						<tr class="alt1">
              <td valign="top" align="center" colspan="2" class="leftBarText"> <a href="<?php echo ADMIN_BASE_URL?>cmscontaint/">&lt;&lt;back</a>&nbsp;&nbsp;&nbsp; 
			  <input type="submit" class="greenbuttonelements" value="Save" id="Save" name="Save"> </td>
            </tr>
			
			<tr class="alt2">
              <td valign="top" align="left" colspan="2" class="leftBarText"> Content: [<a href="<?php echo ADMIN_BASE_URL?>cmscontaint/editcontent/<?php echo $id;?>">Edit</a>] </td>
            </tr>
            
            <tr class="alt2">
              <td align="left" colspan="2"><?php echo $this->mylib->content_html_decode($row->content); //content_html_encode() ?></td>
            </tr>
            <tr class="alt2">
              <td align="center" class="alt1" colspan="2"><a href="<?php echo ADMIN_BASE_URL?>cmscontaint/">&lt;&lt;back</a></td>
            </tr>
          </tbody>
        </table>
</form>
<?php
}else{
?>
<form onsubmit="" id="frmadd" action="<?php echo ADMIN_BASE_URL?>cmscontaint/addedit_act" method="post" name="frmadd">
          <p>
            <input type="hidden" value="insert" name="act">
          </p>
          <table width="100%" cellspacing="1" cellpadding="6" class="tborder"> 
            <thead> 
              <tr> 
                <td align="left" colspan="5" class="tcat">Add Page Section </td> 
              </tr> 
            </thead> 
            <tbody> 
              <tr class="alt1"> 
                <td align="left" class="alt1" colspan="5"></td> 
              </tr> 
              <tr class="alt2">
                <td align="left" class="redbuttonelements" colspan="5"></td>
              </tr>
              <tr class="alt2"> 
                <td width="30%" align="left" class="leftBarText">Page URL Key <font color="#FF0000">*</font></td> 
                <td width="70%" align="left" colspan="4"><?php echo BASE_PATH_FRONT; ?><input type="text" id="urlkey" class="forminputelement" name="urlkey"></td>
              </tr> 
              <tr class="alt1"> 
                <td align="right"><a href="<?php echo ADMIN_BASE_URL?>cmscontaint/">&lt;&lt;back</a></td> 
                <td align="left" colspan="4"><input type="submit" class="greenbuttonelements" value="Save" id="Save" name="Save"> 
&nbsp;</td> 
              </tr> 
            </tbody> 
          </table> 
      </form>
<?php } ?>

