<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Education_model extends CI_Model {



	public function getEducationDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get('education_history');
			$result = $query->result();
		}
		return $result;
	}

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

	public function addSchool($postData){
		if($postData){
			$this->db->insert('education_history',$postData);
		}
		return 1;
	}

	public function updateSchool($postData,$eduId){
		if($eduId){
			$this->db->where('id',$eduId);
			$this->db->update('education_history',$postData);
		}
		return 1;
	}
	/*School add and update process ends here*/
	
	  public function deleteSchool($eduid) {
		if($eduid){
			$this->db->where('id',$eduid);
			$this->db->delete('education_history');
			return TRUE;
		}
		return FALSE;
  }
}
