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
				project_controller/dashboard/"><i class="fa fa-book"></i> 
			<span>Dash Board</span></a>
			</li> 
		
<?php 

//if($this->session->userdata('login_status')=='SUPER_STOCKIST') {

if($this->session->userdata('login_status')=='ADMIN') {

?>	   
<?php /*?>		
	<li class="header">DYNAMIC FORM-RPT TEMPLATE</li>
	
	<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
 				  <ul class="treeview-menu">
		 
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteFormReport/list/">
		<i class="fa fa-circle-o"></i>TEMPLATE FORM SET</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/2/list/">
		<i class="fa fa-circle-o"></i>TEMPLATE FORM TESTING</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		Project_controller/TemplateReports/Products/">
		<i class="fa fa-circle-o"></i>TEMPLATE REPORT</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		Project_controller/Master_upload/">
		<i class="fa fa-circle-o"></i>Master Data Upload</a>
		</li> 
				
				
				
				
				 
        </ul>
	  </li>
<?php */?>
				
				
				
	<li class="header">MASTER SECTION</li>
	
	<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
 				  <ul class="treeview-menu">
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/7/list/">
		<i class="fa fa-circle-o"></i>General Master</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/8/list/">
		<i class="fa fa-circle-o"></i>Company Setting</a>
		</li> 
		
		 
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/2/list/">
		<i class="fa fa-circle-o"></i>Product Master</a>
		</li> 
		
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/4/list/">
		<i class="fa fa-circle-o"></i>Speciality Master</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/5/list/">
		<i class="fa fa-circle-o"></i>Gift Master</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/6/list/">
		<i class="fa fa-circle-o"></i>Designation Master</a>
		</li> 
				
		<li><a href="<?php echo ADMIN_BASE_URL?>
						project_controller/holiday_listing/">
		<i class="fa fa-circle-o"></i>Office Calender</a>
		</li>
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/9/list/">
		<i class="fa fa-circle-o"></i>Vendor Master</a>
		</li> 	
				 
        </ul>
	  </li>
		
	<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Organisation Structure</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
 		<ul class="treeview-menu">
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/10/list/">
		<i class="fa fa-circle-o"></i>Employee Master</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/TempleteForm/12/list/">
		<i class="fa fa-circle-o"></i>Retailer Master</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		Project_controller/StockistMaster/13/list/">
		<i class="fa fa-circle-o"></i>Stockist Master</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/OrganisationStructure/14/list/">
		<i class="fa fa-circle-o"></i>Organisation Structure</a>
		</li> 
		
		<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/doctor_master/add/list/">
		<i class="fa fa-circle-o"></i>Doctor Master</a>
		</li> 
						
								 
        </ul>
	  </li>
	  
	<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tour-Exp Related</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
 		<ul class="treeview-menu">
				
		<li><a href="<?php echo ADMIN_BASE_URL?>
		tour_plan_expense_controller/tour_mapping_control/nolist/">
		<i class="fa fa-circle-o"></i>MR Tour Expense Master</a>
		</li>	
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		tour_plan_expense_controller/tour_plan_control/nolist/">
		<i class="fa fa-circle-o"></i>MR Standard Tour Plan</a>
		</li>	
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		tour_plan_expense_controller/expense_aproval_admin/listing/">
		<i class="fa fa-circle-o"></i>Expense Approval</a>
		</li>					
						
								 
        </ul>
	  </li>  
	  
<?php } ?>	
			
<?php if($this->session->userdata('login_status')=='USER') {?>	   		
			
		<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tour Plan &amp; Expense</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
 		<ul class="treeview-menu">
		
		<?php if($this->session->userdata('login_tbl_designation_id')<5){ ?>						
		
				
			<li><a href="<?php echo ADMIN_BASE_URL?>
			tour_plan_expense_controller/manager_tour_plan_new/nolist/">
			<i class="fa fa-circle-o"></i>Manager Tour Plan</a>
			</li>	
			
			<li><a href="<?php echo ADMIN_BASE_URL?>
			tour_plan_expense_controller/manager_tour_expense_auto/nolist/">
			<i class="fa fa-circle-o"></i>Manager Tour Expense Create-Auto</a>
			</li>	
			
			<li><a href="<?php echo ADMIN_BASE_URL?>
			tour_plan_expense_controller/expense_aproval_manager/listing/">
			<i class="fa fa-circle-o"></i>MR Expense Approval</a>
			</li>	
		
		
		<?php } ?>	
		
		<?php if($this->session->userdata('login_tbl_designation_id')==5){ ?>		
				
		<li><a href="<?php echo ADMIN_BASE_URL?>
		tour_plan_expense_controller/mr_tour_plan/listing/">
		<i class="fa fa-circle-o"></i>MR Tour Plan</a>
		</li>	
				
		<li><a href="<?php echo ADMIN_BASE_URL?>
		tour_plan_expense_controller/mr_tour_expense/listing/">
		<i class="fa fa-circle-o"></i>MR Tour Expense-Auto</a>
		</li>	
									
         <?php } ?>	
		
		
								 
        </ul>
	  </li>
		
		
		
		<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Activity Entry and Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
 		<ul class="treeview-menu">
		
		<li><a href="<?php echo ADMIN_BASE_URL?>
		project_controller/ActivityEntry/">
		<i class="fa fa-circle-o"></i>Activity Entry</a>
		</li> 
			
		<li><a href="<?php echo ADMIN_BASE_URL?>
		Project_controller/EmployeeOtherActivity/15/list/">
		<i class="fa fa-circle-o"></i>Other Activity</a>
		</li>
		
		<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/daily_call_reports/">
		<i class="fa fa-circle-o"></i>Daily Call Reports</a>
		</li> 	
		
		<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/doctor_visit_summary/list/0">
		<i class="fa fa-circle-o"></i>Doctor visit report</a>
		</li> 
	
				<li><a  href="<?php echo ADMIN_BASE_URL?>project_controller/missed_doctor_summary/list/0">
				<i class="fa fa-circle-o"></i>Missed visit Doctor</a></li>
								
				<li><a  href="
				<?php echo ADMIN_BASE_URL?>
				project_controller/doc_vis_comparison_report">
				<i class="fa fa-circle-o"></i>Doctor visit Comparison</a></li>
								
				<li><a  href="
				<?php echo ADMIN_BASE_URL?>
				project_controller/report_view_summary/list/0">
				<i class="fa fa-circle-o"></i>Last Visit Summary</a></li>
				
				<?php /*?><li><a  href="
				<?php echo ADMIN_BASE_URL?>project_controller/dr_visit_summary/0">
				<i class="fa fa-circle-o"></i>DR.Visit Summary</a></li><?php */?>
		 		
		<li><a  href="<?php echo ADMIN_BASE_URL?>project_controller/doctor_database_view/list/0">
<i class="fa fa-circle-o"></i>Doctor List</a></li>  
								
<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/retailer_databse/"><i class="fa fa-circle-o"></i>Retailer List</a></li>  
					
								 
        </ul>
	  </li>
	  
	  <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Secondary Sales</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
 		<ul class="treeview-menu">
							
		<li> <a target ="_self" href="<?php echo ADMIN_BASE_URL?>
		project_controller/stock_sales_statement/">
		<i class="fa fa-circle-o"></i>Secondary Sales Entry</a>
		</li>	
		
		<li><a target ="_self" href="<?php echo ADMIN_BASE_URL?>
		project_controller/sec_sale_report/0">
		<i class="fa fa-circle-o"></i>Secondary Sales Report</a></li>  
		
		<li><a target ="_self" href="<?php echo ADMIN_BASE_URL?>
		project_controller/sec_sale_ytd_analysis/0">
		<i class="fa fa-circle-o"></i>Sec Sales YTD Analysis</a></li>  
		
		<li><a target ="_self" href="<?php echo ADMIN_BASE_URL?>
		project_controller/sec_sale_trnd_analysis/0">
		<i class="fa fa-circle-o"></i>Sec Sales Trend Analysis</a></li>
		
		<li><a target ="_self" href="<?php echo ADMIN_BASE_URL?>
		project_controller/sec_sale_situation_analysis/0">
		<i class="fa fa-circle-o"></i>Situational Analysis (Team wise)</a></li>  

					
								 
        </ul>
	  </li>
	  
	  
			
<?php } ?>			
			
	
	<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/logout">
	<i class="fa fa-circle-o text-red"></i> <span>Log Out</span></a></li>
		
	<li><a href="<?php echo ADMIN_BASE_URL?>project_controller/changepassword">
	<i class="fa fa-circle-o text-yellow"></i> <span>
		Change Password</span></a></li>
		
		<?php /*?><li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>
		Lock Screen</span></a></li><?php */?>
			
			
			  </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>