      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="#"><b>Phar</b>ma <?php  echo CI_VERSION; ?></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Pharma</b>Soft</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
       
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">
				  <?php echo $this->session->userdata('login_name'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                   <!-- 
				   <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				   -->
                    <p>
                      Hello	<?php echo $this->session->userdata('login_name'); ?>
                      <small><?php echo date('d/m/Y');?></small>
                    </p>
                  </li>
               
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
           			  
            </ul>
          </div>
        </nav>
      </header>
	  
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel"></div>
        
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
          <!--<li class="header">SELL SECTION</li>-->
           
		    <li><a href="<?php echo ADMIN_BASE_URL?>
				Project_controller/dashboard/"><i class="fa fa-book"></i> 
			<span>Dash Board</span></a>
			</li> 

<?php $user_status=$this->session->userdata('login_status'); ?>	  
		
<?php if( $user_status=='SUPER') { ?>	   
		
 	<li class="header">DYNAMIC FORM-RPT TEMPLATE</li>
	
	<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Master Create</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
 		 <ul class="treeview-menu">		

		  		 
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/Master_upload/"><i class="fa fa-circle-o"></i>Master Data Upload</a></li> 		
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteFormReport/list/"><i class="fa fa-circle-o"></i>TEMPLATE FORM SET</a></li> 
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/7/list/"><i class="fa fa-circle-o"></i>General Master</a></li> 
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/31/list/"><i class="fa fa-circle-o"></i>Menu Header</a> </li>
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/32/list/"><i class="fa fa-circle-o"></i>Menu Detail</a> </li>	
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/30/list/"><i class="fa fa-circle-o"></i>Query Builder</a> </li>			
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/8/list/"><i class="fa fa-circle-o"></i>Company Setting</a></li> 
		
        </ul>
	  </li> 
	
<?php } ?>

<?php  if($user_status=='ADMIN' or $user_status=='SUPER') { ?>	
				
	<li class="header">MANAGE ADMIN</li>
	
	<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
 	 <ul class="treeview-menu">		
	 	<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/10/list/"><i class="fa fa-circle-o"></i>User Manage</a></li>
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/33/list/"><i class="fa fa-circle-o"></i>Product Category</a></li> 
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/34/list/"><i class="fa fa-circle-o"></i>Product Details</a></li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/35/list/"><i class="fa fa-circle-o"></i>News</a></li> 
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/31/list/"><i class="fa fa-circle-o"></i>Career</a></li> 
		<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/TempleteForm/32/list/"><i class="fa fa-circle-o"></i>Feedback</a></li> 	 
		
			
				 
        </ul>
	  </li>
	

	  
<?php } ?>	
			
	
	<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/logout"><i class="fa fa-circle-o text-red"></i> <span>Log Out</span></a></li>		
	<li><a href="<?php echo ADMIN_BASE_URL?>Project_controller/changepassword"><i class="fa fa-circle-o text-yellow"></i><span>Change Password</span></a></li>
	
			
			
			  </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>