<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class License_model extends CI_Model { 

	public function addLicense($postData){
		if($postData){
			$this->db->insert('tbl_license',$postData);
		}
		return 1;
	}
	
	public function updateLicenseAndCertificate($postData,$LicenseId){
		if($LicenseId){
			$this->db->where('id',$LicenseId);
			$this->db->update('tbl_license',$postData);
			
		}
		return 1;
	}

}
