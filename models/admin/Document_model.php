<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_model extends CI_Model {

	
	public function insertDocument($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_document',$postData);
		}
		return $result;

	}

	public function getDocument(){
		$result=array();
		if($this->session->userdata('admin_user_type')==3){
			$this->db->where('ind_id',$this->session->userdata('adminId'));
		}else{
			$this->db->where('b_id',$this->session->userdata('adminId'));
		}
		$this->db->select('tbl_document.*,tbl_quotation.project_name,tbl_business.first_name as professionalName,tbl_individual.name as clientName');
		$this->db->from('tbl_document');
		$this->db->join('tbl_quotation','tbl_quotation.id=tbl_document.q_id','LEFT');
		$this->db->join('tbl_business','tbl_business.id=tbl_document.b_id','LEFT');
		$this->db->join('tbl_individual','tbl_individual.id=tbl_document.ind_id','LEFT');
		$query = $this->db->get();
		$result = $query->result();
		//echo '<pre>';print_r($result);
		return $result;
	}

	public function checkDocumentAlreadyCreated($q_id){
		$result = array();
		$this->db->select('tbl_document.*');
		$this->db->from('tbl_document');
		$this->db->where('tbl_document.q_id',$q_id); 
		$query = $this->db->get();
		$result = $query->result();  
		return $result;
	}

	public function getDocumentById($id){
		$result = array();
		$this->db->select('tbl_document.*');
		$this->db->from('tbl_document');
		$this->db->where('tbl_document.id',$id); 
		$query = $this->db->get();
		$result = $query->result();  
		return $result;
	}

	public function acceptDocument($postData,$id){
		if($postData){
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_document',$postData);
		}
		return $result;
		
	}

	
}
