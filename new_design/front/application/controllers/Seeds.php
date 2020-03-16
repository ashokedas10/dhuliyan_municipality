<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seeds  extends CI_Controller {

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
		$layout_data = array();
		$data = array();	
		
		$layout_data['page_title'] = 'Home';	
		
		$records="select * 	from services where	product_type='BEST' and status='ACTIVE' order by name LIMIT 0 , 4";			
		$data['products'] = $this->projectmodel->get_records_from_sql($records);	
		
		$records="select * 	from news where status='ACTIVE' order by date LIMIT 0 , 3";			
		$data['latest_news'] = $this->projectmodel->get_records_from_sql($records);	
		
		$layout_data['body'] = $this->load->view('home_page', $data, true);	
		$layout_data['header'] = $this->load->view('common/header', $layout_data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);
		$this->load->view('layout', $layout_data);
	}
	
	public function Products()
	{
		$layout_data = array();
		$data = array();	

		$records="select * 	from service_cate where	status='ACTIVE' order by cate_name";			
		$data['records'] = $this->projectmodel->get_records_from_sql($records);	

		$layout_data['page_title'] = 'Products';	
		$layout_data['body'] = $this->load->view('products_cat', $data, true);
		$this->page_layout_display($layout_data,$data);
	}

	public function Products_detail($cate_id=0)
	{
		$layout_data = array();
		$data = array();	

		$records="select * 	from services where	cate_id=".$cate_id." and  status='ACTIVE' order by name";			
		$data['records'] = $this->projectmodel->get_records_from_sql($records);	

		$data['product_category']= 'Products ';	

		$layout_data['page_title'] = 'Products ';	
		$layout_data['body'] = $this->load->view('product_details', $data, true);
		$this->page_layout_display($layout_data,$data);
	}

	public function NewsEvents()
	{
		$layout_data = array();
		$data = array();	

	   $records="SELECT * FROM news "; 	
	   $data['records'] = $this->projectmodel->get_records_from_sql($records);	
	//    foreach ($records as $record)
	//    {


		$layout_data['page_title'] = 'News and Events';	
		$layout_data['body'] = $this->load->view('news-events', $data, true);
		$this->page_layout_display($layout_data,$data);
	}
	public function contact()
	{
		$layout_data = array();
		$data = array();	
		$layout_data['page_title'] = 'Contact';	
		$layout_data['body'] = $this->load->view('contact', $data, true);
		$this->page_layout_display($layout_data,$data);
	}
	public function about()
	{
		$layout_data = array();
		$data = array();	
		$layout_data['page_title'] = 'About';	
		$layout_data['body'] = $this->load->view('about', $data, true);
		$this->page_layout_display($layout_data,$data);
	}
	public function ResearchAndDevelopment()
	{
		$layout_data = array();
		$data = array();	
		$layout_data['page_title'] = 'Research And Development';	
		$layout_data['body'] = $this->load->view('ResearchAndDevelopment', $data, true);
		$this->page_layout_display($layout_data,$data);
	}
	public function ContractSeedProduction()
	{
		$layout_data = array();
		$data = array();	
		$layout_data['page_title'] = 'Contract Seed Production';	
		$layout_data['body'] = $this->load->view('ContractSeedProduction', $data, true);
		$this->page_layout_display($layout_data,$data);
	}

			
	private function page_layout_display($layout_data,$data)
	{
			
		$layout_data['header'] = $this->load->view('common/header', $layout_data, true);
		$layout_data['footer'] = $this->load->view('common/footer', $data, true);	
		$this->load->view('layout', $layout_data);
		
	}

			

	/*LOGIN PROCESS  AND OTHERS...*/	
	
}

?>
