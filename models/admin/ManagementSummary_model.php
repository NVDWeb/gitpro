<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementSummary_model extends CI_Model { 

	public function addManagementSummary($postData){
		if($postData){
			$this->db->insert('tbl_managementsummary',$postData);
		}
		return 1;
	}
	
	public function updateManagementSummary($postData,$managementId){
		if($managementId){
			$this->db->where('id',$managementId);
			$this->db->update('tbl_managementsummary',$postData);
			
		}
	return 1;
	}

}
