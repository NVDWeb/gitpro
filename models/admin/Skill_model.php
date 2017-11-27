<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill_model extends CI_Model { 

	public function addSkill($postData){
		if($postData){
			$this->db->insert('tbl_skills',$postData);
		}
		return 1;
	}
	
	public function updateSkill($postData,$skillid){
		if($skillid){
			$this->db->where('id',$skillid);
			$this->db->update('tbl_skills',$postData);			
		}
		return 1;
	}
	
	  public function deleteSkill($id) {
		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_skills');
			return TRUE;
		}
		return FALSE;
  }

}
