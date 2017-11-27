<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_model extends CI_Model {

	public function getPlans(){
		$result = array();
		$this->db->order_by('id','ASC');
		$query = $this->db->get('tbl_plan');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getPlanById($id){
		$result = array();
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_plan');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	

	

}