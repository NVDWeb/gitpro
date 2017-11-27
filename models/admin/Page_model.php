<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {

	public function getPages(){
		$result = array();
		$query = $this->db->get('tbl_pages');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getPageById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_pages');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function insertPage($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_pages',$postData);
		}
		return $result;

	}

	public function updatePage($postData,$id) {
		$result=array();
		if($postData){
		 	$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_pages',$postData);
		}
		return $result;
    }

    public function deleteService($id) {
		
		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_pages');
			return TRUE;
		}
		return FALSE;
    }

    

}