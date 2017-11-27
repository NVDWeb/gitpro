<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {


 	function getPageData($pageSlug){ 
		$result = array();
		$this->db->where('slug',$pageSlug);
		$query = $this->db->get('tbl_pages');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;

    }

    function insertLandingData($postData){ 
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_landing',$postData);
		}
		return $result;
    }
	
	 public function getParentAndSubCategory(){
		$result = array();
		$parent = array();
		$this->db->where('parent_id',0);
		$query = $this->db->get('tbl_category');
		if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				$this->db->select('tbl_category.id,tbl_category.category_name,tbl_category.slug');
				$this->db->where('parent_id',$row->id);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				$row->parent_cat=$get;				
			}		
		}		
		//echo '<pre>';print_r($result);
		return $result;
	 }
	 
	public function getCategoryBySlug($slug){
	$result=array();
	if($slug){
		$this->db->where('slug',$slug);
		$query = $this->db->get('tbl_category');
		if($query->num_rows() > 0 ){
			$result = $query->result();
		}
	}
	return $result;
}

    
}