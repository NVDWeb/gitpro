<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forums_model extends CI_Model {
	
	public function getTeamRequest(){
		$where='';
		$result = array();
		$query = $this->db->get('tbl_team_request');		
		//echo $this->db->last_query();
			if($query->num_rows()>0){
				$result = $query->result();				
			}
		return $result;
	}
	public function getForums($team_id) {
		$result = array();
		if($team_id){
			$this->db->select('tbl_forum.*,tbl_business.contact_person_name,tbl_business.email');
			$this->db->from('tbl_forum');
			$this->db->join('tbl_business','tbl_business.id=tbl_forum.member_id','LEFT');
			$this->db->where('tbl_forum.team_id',$team_id);
			$query = $this->db->get();
			$result = $query->result();			
			//echo '<pre>';print_r($result);die;					
		}		
		return $result;
	}
	public function insertforums($postData){
		$result=array();
			if($postData){
				$this->db->set('sent_on', 'NOW()', FALSE);		
				$result = $this->db->insert('tbl_forum',$postData);
			}
		return $result;
	}		
}
