<?php 
class Search_eng extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'trackback', 'pagination', 'mylib'));
		$this->load->database();
    }

	public function get_autocomplete($search_data) {
        $this->db->select('product');
        $this->db->select('id');
        $this->db->like('product', $search_data);
        return $this->db->get('domain_hosting_info', 10);
    }
}
?>