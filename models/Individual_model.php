<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individual_model extends CI_Model {

	public function insertIndividual($postData){
		$result=array();
		if($postData){

			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_individual',$postData);
		}
		return $result;

	}

	public function insertCompany($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_individual',$postData);
			$business_id = $this->db->insert_id();
		}
		return $result=$business_id;
	}

	public function insertQuotation($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_quotation',$postData);
			$result = $this->db->insert_id();
		}
		return $result;
	}

	public function check_email($email){  
	  $result=array();
	  $result2=array();
  		if($email){
	   		$this->db->where('email',$email);
	   		$query = $this->db->get('tbl_individual');
		    if($query->num_rows() > 0 ){
	     		$result = $query->result();
		    }
	   		$this->db->where('email',$email);
		   	$query2 = $this->db->get('tbl_business');
		    if($query2->num_rows() > 0 ){
	     		$result2 = $query2->result();
		    }   
		    if($result){
	     		return  0;
		    }else if($result2){
	     		return 0;
		    }else{
	     		return 1;;
		    }   
  		}
    }
}
