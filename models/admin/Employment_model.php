<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employment_model extends CI_Model {

	public function getEmploymentDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get('employment_history');
			$result = $query->result();
		}
		return $result;
	}

  /*School add and update process*/

	public function addEmployment($postData){
		if($postData){
			$this->db->insert('employment_history',$postData);
		}
		return 1;
	}

	public function updateEmployment($postData,$eduId){
		if($eduId){
			$this->db->where('id',$eduId);
			$this->db->update('employment_history',$postData);
		}
		return 1;
	}
	/*School add and update process ends here*/
	
	  public function deleteEmployment($empid) {
		if($empid){
			$this->db->where('id',$empid);
			$this->db->delete('employment_history');
			return TRUE;
		}
		return FALSE;
  }
}
