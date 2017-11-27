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
			$this->db->insert('tbl_team_request',$postData);
			$insert_id = $this->db->insert_id();
		}
		return $insert_id;

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
			$this->db->select('tbl_team.*,tbl_business.first_name,tbl_business.contact_person_name,tbl_business.email');
			$this->db->from('tbl_team');
			$this->db->join('tbl_business','tbl_business.id=tbl_team.member_id','LEFT');
			$this->db->where('tbl_team.team_id',$team_id);
			$this->db->where('tbl_team.status',1);
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
		$this->db->select('tbl_team.*,tbl_team_request.team_name,tbl_team_request.created_by as teamAdmin,tbl_team_request.member_email,tbl_team_request.id as team_id');
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

	public function getTeamByCategoryAndSubcategory($category){
		$result= array();

		$this->db->select('tbl_team_category.*,tbl_team_request.team_name,tbl_team_request.created_by,tbl_team_request.id as teamId,tbl_team.team_id as requestedAlready');
		$this->db->from('tbl_team_category');
		$this->db->join('tbl_team_request','tbl_team_request.team_category=tbl_team_category.id','LEFT');
		$this->db->join('tbl_team','tbl_team.team_id=tbl_team_request.id','LEFT');
		$this->db->where('tbl_team_request.created_by!=',$this->session->userdata('adminId'));
		$this->db->where('tbl_team_category.id',$category);
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
			//$this->db->where('id!=',$this->session->userdata('adminId'));
			$this->db->where('resume_status',1);
			$this->db->like('contact_person_name',$searchParam);
			$this->db->or_like('first_name',$searchParam);
			$this->db->like('last_name',$searchParam);
			$this->db->like('contact_person_name',$searchParam);
			$this->db->or_like('first_name',$searchParam);
			$this->db->or_like('last_name',$searchParam);
			$this->db->or_like('email',$searchParam);
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
			$this->db->where('tbl_business.resume_status',1);
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
	
	public function checkAlreadyJoinTeam($teamId,$member_id){
		if($teamId && $member_id){
			$this->db->where('team_id',$teamId);
			$this->db->where('member_id',$member_id);
			$query = $this->db->get('tbl_team');
			if($query->num_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
	}
	
	public function getTeamViewById($t_id){
		$result = array();
		if($t_id){
			//$this->db->select('tbl_team_request.*,tbl_quotation.team_category,tbl_quotation.id as assignTeam,tbl_quotation.id as quotationId,tbl_quotation.project_name,tbl_business.id as businessId,tbl_business.first_name,tbl_team_request.team_name,tbl_team_request.team_category,tbl_team_request.created_by,tbl_team_request.id as teamId');
			
		$this->db->select('tbl_team_request.*,tbl_business.id as businessId,tbl_business.first_name,tbl_team_request.id as teamId,tbl_business.country','countries.id','countries.name as countryName');
  		$this->db->from('tbl_team_request');
		$this->db->join('tbl_business','tbl_business.id = tbl_team_request.created_by', 'LEFT');
		$this->db->join('countries','countries.id = tbl_business.country', 'LEFT');
  		//$this->db->join('tbl_quotation','tbl_quotation.id=tbl_proposal.q_id', 'LEFT');
      	//$this->db->join('tbl_business','tbl_business.id=tbl_proposal.b_id', 'LEFT');
		//$this->db->join('tbl_team_request','tbl_team_request.team_category=tbl_quotation.team_category', 'LEFT');
  		$this->db->where('tbl_team_request.id',$t_id);
  		$query = $this->db->get();
			$result = $query->result();
			
			/*foreach($result as $key=>$res){
				$this->db->select('countries.name');
				$this->db->where('id',$res->country);
				$query = $this->db->get('countries');
				$get = $query->result();
				foreach($get[0] as $key=>$value){
					$res->country=$value;
				}
					
					
			}*/
			$this->db->select('tbl_team.member_id');
			$this->db->where('team_id',$t_id);
			$query = $this->db->get('tbl_team');
			$get = $query->result();
			$result['team']=$get;
	
	
			/*$this->db->select('tbl_bid.business_id,tbl_bid.bidamount');
			$this->db->where('quotation_id',$result[0]->q_id);
			$query = $this->db->get('tbl_bid');
			$get = $query->result();
			$result['bid']=$get;*/

		}

		return $result;
	}

	public function getMembers($team_id){
		$result = array();
		if($team_id ){
			$this->db->where('id',$team_id);
			$query =  $this->db->get('tbl_team_request');
			$result = $query->result();
		}
		return $result;
	}
	
	public function getExploreTeamByCategoryAndSubcategory($category){
		$result= array();

		$this->db->select('tbl_team_category.*,tbl_team_request.team_name,tbl_team_request.created_by,tbl_team_request.id as teamId');
		$this->db->from('tbl_team_category');
		$this->db->join('tbl_team_request','tbl_team_request.team_category= tbl_team_category.id','LEFT');
		//$this->db->join('tbl_team','tbl_team.team_id=tbl_team_request.id','LEFT');
		//$this->db->where('tbl_team_request.created_by!=',$this->session->userdata('adminId'));
		$this->db->where('tbl_team_category.id',$category);
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
	
	public function getMemberByEmail($email){
		$result=array();
		if($email){
			$this->db->where('email',$email);
			$query = $this->db->get('tbl_business');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}	

	public function insertTeamNotification($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_team_notification',$postData);
			//$insert_id = $this->db->insert_id();
		}
		//return $insert_id;
	}
	
	public function updateTeamNotification($postData,$id) {
		$result=array();
		if($postData){
			$this->db->where('id',$id);
			$this->db->update('tbl_team_notification',$postData);
		}
		return true;
  }
  
  function getRecomendationTeam($id){	  
		$result=array();
		if($id){		
			$this->db->select('tbl_business_category_relation.*,tbl_business.id,tbl_business.first_name,tbl_category.id,tbl_category.category_name');
			$this->db->from('tbl_business_category_relation');
			$this->db->join('tbl_business','tbl_business.id = tbl_business_category_relation.business_id', 'LEFT');
			$this->db->join('tbl_category','tbl_category.id = tbl_business_category_relation.category', 'LEFT');		
			$this->db->where('tbl_business.id',$id);
			$query = $this->db->get();
			$result = $query->result();			
			//echo $result[0]->category_name;
			//$cat_name = substr($result[0]->category_name,0,4);
			$cat_name = $result[0]->category_name;			
			$this->db->select('tbl_team_category.id,tbl_team_category.category_name');
			$this->db->like('category_name',$cat_name);						
			$query = $this->db->get('tbl_team_category');
			$get_team_cat_ids = $query->result();						
				foreach($get_team_cat_ids as $team_cat_id){				
					$this->db->select('tbl_team_request.*');
					$this->db->where('team_category',$team_cat_id->id);
					$this->db->limit(2);
					$query = $this->db->get('tbl_team_request');
					$get_team_request = $query->result();	
					$result['team_request']=$get_team_request;	
				}
				//echo '<pre>';print_r($result);
		}
		return $result;
	}
  
  	public function countTotal($cat){		
  		$this->db->select('tbl_team_request.id');
		$this->db->from('tbl_team_request');				
		$this->db->where('team_category',$cat);
		$query = $this->db->get();
		$team_category_relation = $query->result();
		return $business_category_relation[] = $team_category_relation;
  	}
	
	public function getTeamRequestById($cat_id){
	$result=array();
	if($cat_id){
		$this->db->where('id',$cat_id);
		$query = $this->db->get('tbl_team_category');
		if($query->num_rows() > 0 ){
			$result = $query->result();
		}
	}
	return $result;
	}
	
	public function getRecomendationByCategory($cat_name){
	$result=array();
	if($cat_name){
		$this->db->where('category_name',$cat_name);
		$query = $this->db->get('tbl_category');
		if($query->num_rows() > 0 ){
			$result = $query->result();
		}
	}
	return $result;
	}
	
	public function getMembersByAdminId($created_by){
		$result =array();
		if($created_by){
			$this->db->select('tbl_team.*,tbl_business.id,tbl_business.first_name');
			$this->db->from('tbl_team');
			$this->db->join('tbl_business','tbl_business.id = tbl_team.member_id', 'LEFT');
			$this->db->where('tbl_team.created_by',$created_by);
			$query = $this->db->get();
			$result = $query->result();
			//echo $this->db->last_query();		
		}
		return $result;

	}

	public function getTeamRequestDetailsByTeamId($id){
		$result = array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_team_request');
			$result = $query->result();

			$this->db->where('id',$result[0]->created_by);
			$query = $this->db->get('tbl_business');

			if($query->num_rows() > 0 ){

				foreach($result1 = $query->result() as $row){
					$result['team_admin_details'] = $result1;
					$this->db->select('education_history.school_name,education_history.school_Type,education_history.school_City,education_history.school_State,education_history.school_Country,education_history.DegreeName,');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('education_history');
					$get = $query->result();
					foreach($get as $value){
						$result['education'][]=$value;
					}

					$this->db->select('employment_history.EmployerOrgName,employment_history.CurrentEmplyor,employment_history.Title,employment_history.Description,employment_history.JobPeriod,employment_history.EmployerCity,employment_history.EmployerState,employment_history.EmployerCountry,employment_history.startDate,employment_history.endDate');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('employment_history');
					$get = $query->result();
					foreach($get as $value){
						$result['workexp'][]=$value;
					}

					$this->db->select('tbl_achievement.achivement');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_achievement');
					$get = $query->result();
					foreach($get as $value){
						$result['achivement'][]=$value;
					}

					$this->db->select('tbl_executivesummary.executiveSummary');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_executivesummary');
					$get = $query->result();
					foreach($get as $value){
						$result['executiveSummary']=$value;
					}
					
					$this->db->select('tbl_managementsummary.managementSummary');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_managementsummary');
					$get = $query->result();
					foreach($get as $value){
						$result['managementSummary'][]=$value;
					}

					$this->db->select('tbl_languageknown.languageKnown');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_languageknown');
					$get = $query->result();
					foreach($get as $value){
						$result['languageKnown'][]=$value;
					}

					$this->db->select('tbl_license.license');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_license');
					$get = $query->result();
					foreach($get as $value){
						$result['license'][]=$value;
					}

					$this->db->select('tbl_objectivesummary.objectiveSummary');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_objectivesummary');
					$get = $query->result();
					foreach($get as $value){
						$result['objectiveSummary']=$value;
					}

					$this->db->select('tbl_skills.skills,tbl_skills.ExperienceInMonths');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_skills');
					$get = $query->result();
					foreach($get as $value){
						$result['skills'][]=$value;
					}
					//echo '<pre>';	print_r($result);

					$this->db->select('countries.name as countryName');
					$this->db->where('id',$row->country);
					$query = $this->db->get('countries');
					$get = $query->result();
					foreach($get as $value){
						$result['country'][]=$value;
					}

					$this->db->select('states.name as stateName');
					$this->db->where('id',$row->state);
					$query = $this->db->get('states');
					$get = $query->result();
					foreach($get as $value){
						$result['state'][]=$value;
					}

					$this->db->select('cities.name as cityName');
					$this->db->where('id',$row->city);
					$query = $this->db->get('cities');
					$get = $query->result();
					foreach($get as $value){
						$result['city'][]=$value;
					}

					$this->db->select_max('tbl_ratings.rating');
					$this->db->select('COUNT(tbl_ratings.b_id) as totalReviews');
					$this->db->from('tbl_ratings');
					$this->db->where('tbl_ratings.b_id',$row->id);
					$query = $this->db->get();
					$result['rating'] = $query->result();


				}
			}
		}
		
		//echo '<pre>';print_r($result);
		return $result;
	}
	//11-11-2017
	public function getTeamMemberBeforeAccept($id){		
	$result = array();
	if($id){
		$this->db->select('tbl_team_request.id as teamId,tbl_team_request.team_name,tbl_team_request.team_category,tbl_team_request.created_by, tbl_team_notification.admin_id as teamadminId,tbl_team_notification.professional_id,tbl_business.contact_person_name, tbl_business.businessLogo,tbl_business.profile_name');
		$this->db->from('tbl_team_request');
		$this->db->join('tbl_team_notification','tbl_team_notification.team_id = tbl_team_request.id');
		$this->db->join('tbl_business','tbl_business.id = tbl_team_notification.professional_id');		
		$this->db->where('tbl_team_request.created_by',$this->session->userdata('adminId'));
		$this->db->where('tbl_team_notification.is_seen',0);	
		$this->db->where('tbl_team_request.id',$id);			
		$query = $this->db->get();
		$result = $query->result();
	}	
	return $result;
	}
	
	public function insertTeamMessageThread($postData){		
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_team_message_thread',$postData);			
		}
		return true;
	}
	
	public function getTeamMessageThread($id,$member_id=0){
		$result = array();
		if($id){
			$this->db->select('tbl_team_message_thread.*,tbl_business.id as businessId,tbl_business.first_name as business_name');
			$this->db->from('tbl_team_message_thread');					
			$this->db->join('tbl_business','tbl_business.id=tbl_team_message_thread.send_to');			
			if($this->session->userdata('admin_user_type')==2){
				$this->db->where('tbl_team_message_thread.send_from',$this->session->userdata('adminId'));	
				$this->db->or_where('tbl_team_message_thread.send_to',$this->session->userdata('adminId'));	
			}
			$this->db->where('tbl_team_message_thread.team_id',$id);						
			$query = $this->db->get();				
			$result = $query->result();					
		}		
		return $result;
	}

	public function updateStatusForMember($updateData,$team_id,$member_id){
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

	public function checkIfProfessionalHasTeamAndActiveMembers($b_id){
		$result = array();
		if($b_id){
			$this->db->where('created_by',$b_id);
			$query = $this->db->get('tbl_team_request');
			$result1 = $query->result();
			if($result1){
				foreach ($result1 as $key => $value) {
					//echo $value->id;die;
					$this->db->where('team_id',$value->id);
					$this->db->where('status',1);
					$query = $this->db->get('tbl_team');
					$result1 = $query->result();
					return $result1;
				}
				
			}else{
				return $result ;
			}
		}
	}
}
