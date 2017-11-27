<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExecutiveSummary_model extends CI_Model { 

	public function addExecutiveSummary($postData){
		if($postData){
			$this->db->insert('tbl_executivesummary',$postData);
		}
		return 1;
	}
	
	public function updateExecutiveSummary($postData,$executiveId){
		if($executiveId){
			$this->db->where('id',$executiveId);
			$this->db->update('tbl_executivesummary',$postData);
			
		}
		return 1;
	}

}
