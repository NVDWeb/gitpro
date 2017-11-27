<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achivement_model extends CI_Model { 

	public function addAchivement($postData){
		if($postData){
			$this->db->insert('tbl_achievement',$postData);
		}
		return 1;
	}
	
	public function updateAchivment($postData,$achivmentId){
		if($achivmentId){
			$this->db->where('id',$achivmentId);
			$this->db->update('tbl_achievement',$postData);
			
		}
	return 1;
	}

}
