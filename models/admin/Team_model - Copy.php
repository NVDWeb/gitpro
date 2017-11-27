<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

	public function getTeam(){
		$result = array();
		$this->db->where('created_by',$this->session->userdata('adminId'));
		$query = $this->db->get('tbl_team_request');

		foreach($result = $query->result() as $row){
  		$this->db->select('tbl_team_category.category_name');
    	$this->db->where('id',$row->team_category);
    	$query = $this->db->get('tbl_team_category');
    	$get = $query->result();
    	foreach($get[0] as $key=>$value){
     		$row->team_cateogry=$value;
    	}
		}
		return $result;
	}

	public function getTeamById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_team_request');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function insertTeamMember($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_team_request',$postData);
		}
		return $result;

	}

	public function updateTeam($postData,$id) {
		$result=array();
		if($postData){
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_team_request',$postData);
		}
		return $result;
  }

	public function deleteTeam($id) {
		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_team_request');
			return TRUE;
		}
		return FALSE;
  }

	public function getJoinMembers($team_id) {
		$result = array();
		if($team_id){
			$this->db->select('tbl_team.*,tbl_business.contact_person_name,tbl_business.email');
			$this->db->from('tbl_team');
			$this->db->join('tbl_business','tbl_business.id=tbl_team.member_id','LEFT');
			$this->db->where('tbl_team.team_id',$team_id);
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$result = $query->result();
		}
		return $result;
  }

	public function updateShareForMember($updateData,$team_id,$member_id){
		if($updateData){
			$this->db->where('team_id',$team_id);
			$this->db->where('member_id',$member_id);
			$result = $this->db->update('tbl_team',$updateData);
			if($result){
				return true;
			}else {
				return false;
			}
		}
	}

	public function getJoinedTeam($member_id){
		$result = array();
		$this->db->select('tbl_team.*,tbl_team_request.team_name,tbl_team_request.created_by as teamAdmin,tbl_team_request.member_email');
		$this->db->from('tbl_team');
		$this->db->join('tbl_team_request','tbl_team_request.id=tbl_team.team_id','LEFT');
		$this->db->where('tbl_team.member_id',$member_id);
		$query = $this->db->get();
		foreach($result = $query->result() as $row){
  		$this->db->select('tbl_business.contact_person_name');
    	$this->db->where('id',$row->teamAdmin);
    	$query = $this->db->get('tbl_business');
    	$get = $query->result();
    	foreach($get[0] as $key=>$value){
     		$row->teamAdminName=$value;
    	}
		}
		//echo '<pre>';print_r($result);die;
		return $result;
	}

	public function getJoinMembersAcceptMine($team_id) {
		$result = array();
		if($team_id){
			$this->db->select('tbl_team.*,tbl_business.contact_person_name,tbl_business.email');
			$this->db->from('tbl_team');
			$this->db->join('tbl_business','tbl_business.id=tbl_team.member_id','LEFT');
			$this->db->where('tbl_team.team_id',$team_id);
			$this->db->where('tbl_team.member_id!=',$this->session->userdata('adminId'));
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$result = $query->result();
		}
		return $result;
  }

	public function getTeamByCategoryAndSubcategory($category,$sub_category){
		$result= array();

		$this->db->select('tbl_business_category_relation.*,tbl_team_request.team_name,tbl_team_request.created_by,tbl_team_request.id as teamId,tbl_request_join_team.team_id as requestedAlready');
		$this->db->from('tbl_business_category_relation');
		$this->db->join('tbl_team_request','tbl_team_request.created_by=tbl_business_category_relation.business_id','LEFT');
		$this->db->join('tbl_request_join_team','tbl_request_join_team.team_id=tbl_team_request.id','LEFT');
		$this->db->where('tbl_team_request.created_by!=',$this->session->userdata('adminId'));
		$this->db->where('tbl_business_category_relation.category',$category);
		$this->db->where('tbl_business_category_relation.sub_category',$sub_category);
		$query = $this->db->get();
		$result = $query->result();

		// if($category && $sub_category){
		// 	$this->db->where('category',$category);
		// 	$this->db->where('sub_category',$sub_category);
		// 	$query = $this->db->get('tbl_business_category_relation');
		// 	foreach($result = $query->result() as $row){
		// 		$this->db->where('created_by',$row->business_id);
		// 		$query = $this->db->get('tbl_team_request');
		// 		$get = $query->result();
		// 		foreach($get as $key=>$value){
	  //    		$row->teams=$value;
	  //   	}
		// 	}
		// }
		//echo '<pre>';print_r($result);
		return $result;
	}

	public function checkAlreadyRequestedToJoinTeam($teamId,$member_id){
		if($teamId && $member_id){
			$this->db->where('team_id',$teamId);
			$this->db->where('member_id',$member_id);
			$query = $this->db->get('tbl_request_join_team');
			if($query->num_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}

	public function requestToJoinTeam($postData){
		$result=array();
		if($postData){
			$this->db->set('requested_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_request_join_team',$postData);
		}
		return $result;
	}

	public function getTeamJoinRequest($reqId){
		$result = array();
		if($reqId){
			$this->db->select('tbl_request_join_team.*,tbl_team_request.created_by,tbl_business.contact_person_name,tbl_business_category_relation.category,tbl_business_category_relation.sub_category,tbl_category.category_name');
			$this->db->from('tbl_request_join_team');
			$this->db->join('tbl_team_request','tbl_team_request.id=tbl_request_join_team.team_id','LEFT');
			$this->db->join('tbl_business','tbl_business.id=tbl_team_request.created_by','LEFT');
			$this->db->join('tbl_business_category_relation','tbl_business_category_relation.business_id=tbl_business.id','LEFT');
			$this->db->join('tbl_category','tbl_category.id=tbl_business_category_relation.category','LEFT');
			$this->db->where('tbl_request_join_team.id',$reqId);
			$this->db->where('tbl_request_join_team.is_seen',0);
			$query = $this->db->get();
			$result = $query->result();
			if($result){
				$this->db->select('tbl_category.category_name as subCategoryName');
				$this->db->from('tbl_category');
				$this->db->where('id',$result[0]->sub_category);
				$q = $this->db->get();
				$res = $q->result();
				$result['sub_cateogry'] = $res;
			}

		}
		return $result ;
	}

	public function insertConfirmedTeamMember($postData){
    $result=array();
		if($postData){
      $this->db->set('joined_date', 'NOW()', FALSE);
		    $result = $this->db->insert('tbl_team',$postData);
		}
    return $result;
  }

	public function updateTeamJoinRequest($postData,$id) {
		$result=array();
		if($postData){
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_request_join_team',$postData);
		}
		return $result;
  }

	public function getTeamBySearchParam($category=0, $subcategory=0,$searchParam=0){
		$result = array();
		//die('here');
		if($searchParam){
			$this->db->like('contact_person_name',$searchParam);
			$this->db->or_like('first_name',$searchParam);
			$this->db->or_like('last_name',$searchParam);
			$this->db->or_like('email',$searchParam);
			$this->db->where('id!=',$this->session->userdata('adminId'));
			$query = $this->db->get('tbl_business');
			//echo $this->db->last_query();die;
			$result = $query->result();
		}else{
			$this->db->select('tbl_business.*,tbl_business_category_relation.category,tbl_business_category_relation.sub_category,tbl_business_category_relation.business_id');
			$this->db->from('tbl_business');
			$this->db->join('tbl_business_category_relation','tbl_business_category_relation.business_id=tbl_business.id','LEFT');
			$this->db->where('tbl_business_category_relation.category',$category);
			$this->db->where('tbl_business_category_relation.sub_category',$subcategory);
			$this->db->where('tbl_business.id!=',$this->session->userdata('adminId'));
			$query = $this->db->get();
			//echo $this->db->last_query();
			$result = $query->result();
		}
		return $result;
	}

	public function checkIfAllProjectClosed($team_id){
		if($team_id){
			$this->db->where('assignTeam',$team_id);
			$this->db->where('project_status',0);
			$query = $this->db->get('tbl_quotation');
			if($query->num_rows() > 0){
				return $query->num_rows();
			}else{
				return 0 ;
			}
		}
	}
	public function deleteTeamMember($member_ids) {
		if($member_ids){
			$this->db->where_in('member_id',$member_ids);
			$this->db->delete('tbl_team');
			return TRUE;
		}
		return FALSE;
  }

	public function getProfessionalRatingsById($p_id){
		$result = array();
		if($p_id){
			$this->db->select_max('tbl_ratings.rating');
			$this->db->select('COUNT(tbl_ratings.b_id) as totalReviews');
			$this->db->from('tbl_ratings');
			$this->db->where('tbl_ratings.b_id',$p_id);
			$query = $this->db->get();
			$result = $query->result();
		}
		//echo '<pre>';print_r($result);die;
		return $result;
	}
}
