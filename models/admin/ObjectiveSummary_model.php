<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ObjectiveSummary_model extends CI_Model { 

	public function addObjectiveSummary($postData){
		if($postData){
			$this->db->insert('tbl_objectivesummary',$postData);
		}
		return 1;
	}
	
	public function updateObjectiveSummary($postData,$objectiveId){
		if($objectiveId){
			$this->db->where('id',$objectiveId);
			$this->db->update('tbl_objectivesummary',$postData);
			
		}
	return 1;
	}

}
