<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class States_model extends CI_Model {

	public function getStates(){
		$result = array();
		$this->db->group_by('state','DESC');
		$query = $this->db->get('tbl_state');

		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getCityByState($state){
		$result=array();
		if($state){
			$this->db->where('state',$state);
			$this->db->order_by('city_name','ASC');
			$query = $this->db->get('tbl_state');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		//print_r($this->db->last_query());die;
		return $result;
	}

}