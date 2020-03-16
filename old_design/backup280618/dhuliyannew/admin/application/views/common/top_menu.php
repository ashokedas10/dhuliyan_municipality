
<div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                  <?php /*?><img src="<?php echo BASE_PATH_ADMIN;?>theme_files/img/logo.png" 
		width="156" height="40" alt="" /><?php */?>
					
					</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="<?php echo BASE_PATH_ADMIN;?>theme_files/img/img-profile.jpg" alt="Profile Pic" />
						
						
						</div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello 
							<?php echo $this->session->userdata('user_name'); ?>
							</li>
							
                            <li>
			<a href="<?php echo ADMIN_BASE_URL?>auth/changepassword">Change Password</a>
							</li>
					
      					 
						 <li>
			<a href="<?php echo ADMIN_BASE_URL?>auth/logout">Logout</a>
						</li>
                        </ul>
                        <br />
                        <span class="small grey"></span>

                    </div>
                </div>

                <div class="clear">
                </div>
            </div>
        </div>
 <div class="clear"></div>
 
 
 <!--HEAD DASHBOARD LOGOS-->
 
<?php /*?> <div class="grid_12 header-repeat">
            <div id="branding" >
			
                    <div class="floatleft">
                 <a href="<?php echo ADMIN_BASE_URL?>project_controller/destination_listing/" title="Destination"> <img src="<?php echo BASE_PATH_ADMIN;?>theme_files/ICON/destination.png" width="50" height="50" alt="Destination" />	</a>	
					</div>
               
				
			   <div class="floatleft">
                 <a href="<?php echo ADMIN_BASE_URL?>project_controller/destination_listing/" title="Customer"> <img src="<?php echo BASE_PATH_ADMIN;?>theme_files/ICON/customer.jpg" width="50" height="50" alt="Destination" />	</a>	
					</div>
					
					
					   <div class="floatleft">
                  <img src="<?php echo BASE_PATH_ADMIN;?>theme_files/ICON/destination.png" 
		width="50" height="50" alt="" />		
					</div>
					   <div class="floatleft">
                  <img src="<?php echo BASE_PATH_ADMIN;?>theme_files/ICON/destination.png" 
		width="50" height="50" alt="" />		
					</div>
					   <div class="floatleft">
                  <img src="<?php echo BASE_PATH_ADMIN;?>theme_files/ICON/destination.png" 
		width="50" height="50" alt="" />		
					</div>
					   <div class="floatleft">
                  <img src="<?php echo BASE_PATH_ADMIN;?>theme_files/ICON/destination.png" 
		width="50" height="50" alt="" />		
					</div>
					
               
				 <div class="clear"></div>
				 
				 
				 
            </div>
        </div><?php */?>
		
	<!--HEAD DASHBOARD LOGOS END -->
 
 	<!--Top Navigation-->
      <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard">
				<a href="#"><span>Dashboard</span></a> </li>
                
				<li class="ic-form-style"><a href="#"><span>Content Section</span></a>
                    <ul>		
							
<?php /*?><li><a href="<?php echo ADMIN_BASE_URL?>project_controller/category_section/categoryview/category/list/0">Category</a></li>
<?php */?>
							
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/sub_cat_section/subcat_view/subcategory/list/0">Sub Category</a></li>
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/gallery_section/banner_view/banner/list/0">Gallery</a></li>
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/content_section/content_view/content/list/0">Content Section</a></li>
					</ul>
				</li>
				<li class="ic-form-style"><a href="#"><span>Operation Section</span></a>	
					<ul>
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/project_section/project_view/project/list/0">Projects</a></li>					
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/service_section/service_view/service/list/0">Services</a></li>					
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/tender_section/tender_view/tender/list/0">Tender</a></li>					
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/product_section/product_view/depertment/list/0">Depertment</a></li>	
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/administration_section/administration_view/administration/list/0">Administration</a></li>				
					</ul>
                </li>
				<li class="ic-form-style"><a href="#"><span>Communication</span></a>	
					<ul>
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/enquiry_section/enquiry_view/contact_us/list/0">Enquiry</a></li>
					</ul>
				</li>
				<?php /*?><li class="ic-typography"><a href="#"><span>User Management</span></a>
				   <ul>
                       <li><a target ="_self" href="<?php echo ADMIN_BASE_URL?>
								project_controller/destination_listing/">User Setting</a>
								</li>
								
								<li><a target ="_self" href="<?php echo ADMIN_BASE_URL?>
								project_controller/destination_listing/">Privilege  Setting</a>
								</li>
								
								<li><a target ="_self" href="<?php echo ADMIN_BASE_URL?>
								project_controller/destination_listing/">Change Password </a>
						</li>
												
                    </ul>
				</li><?php */?>
				

            </ul>
        </div>
		
 <div class="clear"></div>		
	<!--Top Navigation End-->		

	