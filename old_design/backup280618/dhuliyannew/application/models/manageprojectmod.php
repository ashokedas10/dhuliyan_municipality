<?php
class Manageprojectmod extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
	function projectlist(){
		
		$query = $this->db->query("SELECT * FROM p_projects WHERE 1 ");
        return $query->result();
			
	}
	
	function get_project_byid($id){
		
		$row->id = $id;
		$row->category = '';
		$row->category_list ='';
		$row->title = '';
		$row->area = '';
		$row->img = '';
		$row->status = '';
		$sql = "SELECT * FROM p_projects WHERE id = $id";
		$query = $this->db->query($sql);
        foreach($query->result() as $ro){
			$row->category = $ro->category;
			$row->category_list = $this->get_project_categories($ro->category, false);
			$row->title = $ro->title;
			$row->area = $ro->area;
			$row->img = $ro->img;
			$row->status = $ro->status;
		}
		
		return $row; 
		
	}
	
	function get_project_categories($id='', $arr=true){
		if($id=='' || $id=='0'){
			$sql = "SELECT * FROM p_cms WHERE cmsId > 3";
		}else{
			$sql = "SELECT * FROM p_cms WHERE cmsId IN ($ids)";
		}
		$query = $this->db->query($sql);
        $row = array();
		foreach($query->result() as $ro){
			$row[] = $ro->cmsName;
		}
		if($arr){
			return $row;
		}else{
			return implode(',', $row);
		}
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