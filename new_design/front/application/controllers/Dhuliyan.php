<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dhuliyan  extends CI_Controller {

// auto complete
//http://codeigniterlover.blogspot.in/2013/01/jquery-autocomplete-in-codeigniter-php.html
//http://www.php-guru.in/2013/html-to-pdf-conversion-in-codeigniter/

// DB BACKUP AND MAIL  ...
//http://snipt.org/wponh

//file:///E:/ALL_WEBSITE_NEW/xampp/htdocs/money_market/psrgroupnew/jquery_jqwidgets
//demos/jqxtree/checkboxes.htm

	public function __construct()
		{
			parent::__construct();
			
			$this->load->helper(array('form', 'url'));		
		    $this->load->library(array('form_validation','trackback', 'pagination'));
			$this->load->model('Project_model', 'projectmodel');
			$this->load->library('numbertowords');
			$this->load->library('pdf');
			$this->load->helper('file'); 
			$this->load->library('Highcharts');	
			$this->load->library('general_library');
			$this->load->library('excel');
			$this->load->library('Excel_reader');
			
			//$this->load->library('treeview');
			// https://github.com/chrisnharvey/CodeIgniter-PDF-Generator-Library
			//$this->load->library('To_excel');
}

	/*LOGIN PROCESS  AND OTHERS...*/	

	public function index($pageid='')
	{	
		$this->Municipality('Home');
	}
	
	public function municipality($pagename='')
	{
		$layout_data = array();
		$data = array();	
		if($pagename=='Home')
		{ 
			$layout_data['page_title'] = 'Home';	
			$layout_data['body'] = $this->load->view('home_page', $data, true);
		}		
		else if($pagename=='about')
		{ 
			$layout_data['page_title'] = 'Home';	
			$layout_data['body'] = $this->load->view('about', $data, true);
		}
		else if($pagename=='administrator')
		{ 
			$layout_data['page_title'] = 'Home';	
			$layout_data['body'] = $this->load->view('administrator', $data, true);
		}	
		else if($pagename=='tender')
		{ 
			$layout_data['page_title'] = 'Home';	
			$layout_data['body'] = $this->load->view('tender', $data, true);
		}
		else if($pagename=='department')
		{ 
			$layout_data['page_title'] = 'Home';	
			$layout_data['body'] = $this->load->view('department', $data, true);
		}	
		else if($pagename=='service')
		{ 
			$layout_data['page_title'] = 'Home';	
			$layout_data['body'] = $this->load->view('service', $data, true);
		}
		else if($pagename=='projects')
		{ 
			$layout_data['page_title'] = 'Home';	
			$layout_data['body'] = $this->load->view('projects', $data, true);
		}	
		else if($pagename=='contact')
		{ 
			$layout_data['page_title'] = 'Home';	
			$layout_data['body'] = $this->load->view('contact', $data, true);
		}
		else
		{
			$layout_data['page_title'] = 'Home';	
			$layout_data['body'] = $this->load->view('home_page', $data, true);
		}
		
		
		$layout_data['header'] = $this->load->view('common/header', $layout_data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		$this->load->view('layout', $layout_data);
	}
	
	public function page_missing($pagename='')
	{
		$this->Municipality('Home');	
	}
	
	
	
			
		private function page_layout_display($view_path_name,$data)
		{
				
			$data['user_name'] = $this->session->userdata('user_name');
			$layout_data['left_bar'] = $this->load->view('common/left_bar', '', true);
			$layout_data['top_menu'] = $this->load->view('common/top_menu', $data, true);
			$layout_data['data_info'] = 
			$this->load->view($view_path_name,$data, true);			
			$layout_data['body'] = $this->load->view('common/body', $layout_data, true);
			$this->load->view('layout', $layout_data);
			$this->session->set_userdata('alert_msg', '');	
			
		}

			

	/*LOGIN PROCESS  AND OTHERS...*/	
	
}

?>
