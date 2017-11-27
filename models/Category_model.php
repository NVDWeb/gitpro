<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function insertCategory($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_category',$postData);
			$result  = $this->db->insert_id();
		}
		return $result;

	}

	public function getCategories(){
		$result = array();
		$this->db->where('parent_id',0);
		$query = $this->db->get('tbl_category');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getCategoryById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_category');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function getSubCategories(){
		$result = array();
		$parent = array();
		$this->db->where('parent_id!=','');
		$query = $this->db->get('tbl_category');
		if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				$this->db->select('tbl_category.category_name');
				$this->db->where('id',$row->parent_id);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				foreach($get[0] as $key=>$value){
					//echo $key;
					$row->parent_cat=$value;
				}
			}

		}
		//echo '<pre>';print_r($result);
		return $result;
	}


    public function getCategoryByParentId($parent_id){
    	$result = array();
		if($parent_id){
			$this->db->where('parent_id',$parent_id);
			$query = $this->db->get('tbl_category');
			if($query->num_rows()>0){
				$result = $query->result();
			}
		}
		return $result;
    }



}
