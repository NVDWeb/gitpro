<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individual_model extends CI_Model {

	public function getIndividual(){
		$result = array();
		$query = $this->db->get('tbl_individual');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getIndividualById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_individual');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function insertIndividual($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_individual',$postData);
		}
		return $result;

	}



	public function updateIndividual($postData,$id) {
		$result=array();
		if($postData){
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_individual',$postData);
		}
		return $result;
    }

    public function deleteIndividual($id) {
		
		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_individual');
			return TRUE;
		}
		return FALSE;
    }

    

}