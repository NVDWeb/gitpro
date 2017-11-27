<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends CI_Model { 

	public function addLanguage($postData){
		if($postData){
			$this->db->insert('tbl_languageknown',$postData);
		}
		return 1;
	}
	
	public function updateLanguage($postData,$languageId){
		if($languageId){
			$this->db->where('id',$languageId);
			$this->db->update('tbl_languageknown',$postData);
			
		}
		return 1;
	}

}
