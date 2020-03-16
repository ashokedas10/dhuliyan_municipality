<?php
class Cmscontaintmod extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
	function cmslist(){
		
		$query = $this->db->query("SELECT * FROM p_cms WHERE cmsStatus <> 'D'");
        return $query->result();
			
	}
	
	function get_cms_byid($id){
		
		$query = $this->db->query("SELECT * FROM p_cms WHERE cmsId = $id");
        foreach($query->result() as $ro){
			$row[] = $ro;
		}
		return $row[0]; 
		
	}
	
	function update_act1($data){
		
		$id = $data['id'];
		$cmsName = $data['cmsName'];
		$mnuorder = $data['mnuorder'];
		$pagetitle = $data['pagetitle'];
		$metakeywords = $data['metakeywords'];
		$metadesc = $data['metadesc'];
		$cmsStatus = $data['status'];
		
		$query = $this->db->query("UPDATE p_cms SET `cmsName` = '$cmsName', `mnuorder` = '$mnuorder', `pagetitle` = '$pagetitle', `metakeywords` = '$metakeywords', `metadesc` = '$metadesc', `cmsStatus` = '$cmsStatus' WHERE cmsId = $id");
		return $query;
	}
	
	function update_act2($data){
		
		$id = $data['id'];
		$content = $this->mylib->content_html_encode($data['content']);
		
		$query = $this->db->query("UPDATE p_cms SET `content` = '$content' WHERE cmsId = $id");
		return $query;
	}
	
	function delete($id){
		$query = $this->db->query("DELETE FROM p_cms WHERE cmsId = $id");
		return $query;
	}
	
	function insert_act($data){
		$urlkey = $data['urlkey'];
		$query = $this->db->query("INSERT INTO p_cms SET urlkey = '$urlkey' ");
		return $this->db->insert_id();
		
	}
	
	
	
}




?>