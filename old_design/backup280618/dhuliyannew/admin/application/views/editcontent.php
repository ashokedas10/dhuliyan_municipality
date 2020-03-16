	
	
<form id="frm" name="frm" method="post" action="<?php echo ADMIN_BASE_URL?>cmscontaint/editcontent_act">
        <p>
          <input type="hidden" value="update" name="act">
		  <input type="hidden" value="<?php echo $id; ?>" name="id">
      
      </p>
	    <table width="100%" cellspacing="1" cellpadding="6" class="tborder">
          <thead>
            <tr>
              <td align="left" colspan="5" class="tcat">Edit Page Section </td>
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
              <td width="18%" align="left" class="leftBarText">Page Url</td>
              <td width="82%" align="left"><?php echo BASE_URL.$row->urlkey; ?></td>
            </tr>
            <tr class="alt2">
              <td width="30%" align="left" class="leftBarText">Page Heading</td>
              <td align="left" colspan="4"><?php echo $row->pagetitle; ?></td>
            </tr>
            <tr class="alt2">
              <td valign="top" align="left" class="leftBarText"> Content English <font color="#FF0000">*</font></td>
              
              <td valign="top" align="left" class="leftBarText" colspan="4">&nbsp;</td>
            </tr>
			 <tr class="alt2">
                 <td align="left" colspan="5">
<?php
$oFCKeditor = new FCKeditor('content') ;
$oFCKeditor->Height		= '350';
$oFCKeditor->BasePath	= FCKEDITOR_BASEPATH;
$oFCKeditor->Value		= $this->mylib->content_html_decode($row->content);
$oFCKeditor->Create() ;
?>			     
				</td>
            </tr>
                       
             
            <tr class="alt1">
              <td align="right"><a href="<?php echo ADMIN_BASE_URL?>cmscontaint/addedit/<?php echo $id; ?>">&lt;&lt;back</a></td>
              <td align="left" colspan="4"><input type="submit" class="greenbuttonelements" value="Save" id="Save" name="Save">
                &nbsp;</td>
            </tr>
          </tbody>
        </table>
	    </form>