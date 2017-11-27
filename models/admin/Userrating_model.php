<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userrating_model extends CI_Model {

	public function getQuotation($businessId,$individualId){

		$result = array();
		$data = array();
		$select = '';
		if($businessId){
			$select = 'tbl_business.business_name';
			$this->db->where('tbl_quotation.business_id',$businessId);
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.business_id','LEFT');
		}elseif($individualId){
			$select = 'tbl_business.business_name,tbl_individual.name';
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.assignedbusiness_id','LEFT');
			$this->db->where('tbl_quotation.individual_id',$individualId);
			//$this->db->join('tbl_bid','tbl_bid.quotation_id=tbl_quotation.id','LEFT');
		}else{
			$select = 'tbl_business.business_name,tbl_individual.name';
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.assignedbusiness_id','LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
		}
		$this->db->select('tbl_quotation.*,'.$select.',tbl_category.category_name');
		$this->db->join('tbl_category','tbl_category.id=tbl_quotation.category','LEFT');
		$this->db->where('tbl_quotation.team_category',0);
		$this->db->where('tbl_quotation.project_status',0);
		$this->db->or_where('tbl_quotation.project_status',2);
		$this->db->from('tbl_quotation');
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				$this->db->select('tbl_category.category_name');
				$this->db->where('id',$row->sub_category);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				foreach($get[0] as $key=>$value){
					$row->sub_category=$value;
				}

				$this->db->select('count(*) as totalBid');
				$this->db->where('quotation_id',$row->id);
				$query = $this->db->get('tbl_bid');
				$getc = $query->result();
				foreach($getc[0] as $key=>$value){
					$row->totalBid=$value;
				}

				$this->db->select('count(*) as totalProposal');
				$this->db->where('q_id',$row->id);
				$query = $this->db->get('tbl_proposal');
				$getc = $query->result();
				foreach($getc[0] as $key=>$value){
					$row->totalProposal=$value;
				}
			}
		}
		return $result;
	}

	public function getQuotationById($id){
		$result=array();
		if($id){
			if($this->session->userdata('admin_user_type')==2){
				$this->db->where('assignedbusiness_id',$this->session->userdata('adminId'));
			}elseif($this->session->userdata('admin_user_type')==3){
				$this->db->where('individual_id',$this->session->userdata('adminId'));
			}

			$this->db->where('id',$id);

			$query = $this->db->get('tbl_quotation');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}
	
	public function addRatings($postData){
		$result=array();
			if($postData){
				$this->db->set('created_date', 'NOW()', FALSE);
				$result = $this->db->insert('tbl_user_experience',$postData);
			}
		return $result;
	}
	public function updateRatings($postData,$b_id,$ind_id){
		$result=array();
			if($postData){
				$this->db->where('ind_id',$ind_id);
				$this->db->where('b_id',$b_id);
				$result = $this->db->update('tbl_user_experience',$postData);
			}
		return $result;
	}
	
	public function getAllRatings(){
		$result = array();		
		$this->db->select('*,');
		$this->db->from('tbl_user_experience');				
		$query = $this->db->get();
		$result = $query->result();				
		$result = $query->result();
		//$result[]=$get;				
		return $result;
	}	
	public function getRatings($b_id){
		$result = array();
			if($b_id){
				$this->db->select('COUNT(tbl_user_experience.b_id) as totalReviews , max(tbl_user_experience.rating) as rating');
				$this->db->from('tbl_user_experience');
				$this->db->where('tbl_user_experience.b_id',$b_id);
				$query = $this->db->get();
				$result = $query->result();
				$this->db->select('tbl_user_experience.ind_id');
				$this->db->where('tbl_user_experience.b_id',$b_id);
				$query = $this->db->get('tbl_user_experience');
				$get = $query->result();
				$result[]=$get;
			}
		//echo '<pre>';print_r($result);
		return $result;
	}
	
	
	public function getRatingsByClient($b_id,$ind_id){
		$result = array();			
		$this->db->select('tbl_user_experience.*');
		$this->db->where('tbl_user_experience.b_id',$b_id);
		$this->db->where('tbl_user_experience.ind_id',$ind_id);
		$query = $this->db->get('tbl_user_experience');
		$result = $query->result();
		return $result;
	}
	
	public function totalReviews($b_id){
		$result = array();
			if($b_id){
				$this->db->select('tbl_user_experience.*,tbl_individual.name');
				$this->db->from('tbl_user_experience');
				$this->db->join('tbl_individual','tbl_individual.id=tbl_user_experience.ind_id','LEFT');
				$this->db->where('tbl_user_experience.b_id',$b_id);
				$query = $this->db->get();
				$result = $query->result();
			}
		return $result;
	}
	
	public function checkAlreadyRated($b_id,$ind_id){

	}
	
	//public function getRatingsByAdmin($b_id,$ind_id){
//		$result = array();
//		if($b_id && $ind_id){
//			$this->db->select('tbl_ratings.*');
//			$this->db->where('tbl_ratings.b_id',$b_id);
//			$this->db->where('tbl_ratings.admin_id',$ind_id);
//			$query = $this->db->get('tbl_ratings');
//			$result = $query->result();
//		}		
//		return $result;
//	}

	//public function updateRatingsByAdmin($postData,$b_id,$ind_id){
//		$result=array();
//		if($postData){
//			$this->db->where('admin_id',$ind_id);
//			$this->db->where('b_id',$b_id);
//			$result = $this->db->update('tbl_ratings',$postData);
//		}
//		return $result;
//	}


	
	public function insertQuotation($postData){}
	public function updateQuotation($postData,$id) {}
    public function deleteQuotation($id) {}
    public function getLeads($businessId,$iii){}
	public function getLeadById($id){}
	public function checkBid($business_id,$quotation_id){}
	public function postBid($postData){}
	public function updateBid($updateData,$quotation_id){}
	public function getTotalBidsByQuotationId($quotation_id){}
	public function getTotalBidsByQuotationIdAndBid($quotation_id,$businessId){}
	public function getBidDetailsByQuotationAndBusinessId($quotation_id,$businessId){}
	public function postMessageOnBid($postData){}
	public function messageThread($id,$business_id){}
	public function getLastPaymentId(){}
	public function payment($postData){}
	public function updatePayment($updateData,$orderId){}
	public function getBusinessPlanCount($business_id){}
	public function getBusinessQuotationCount($business_id){}
	public function getTotalBidings($quotation_id){}
	public function getStatusOfBid($quotation_id){}
	public function saveNda($postData,$qid){}
	public function getLeadsByBusinessId($businessId){}
	public function getLeadByIdAndBusinessId($id,$businessId){}
	public function getRecommendation($category,$sub_category){}
	public function getTeamRecommendation($category){}
	public function getTeamQuotation($businessId,$individualId){}
	public function getTeamLeadsByBusinessId($businessId){}
	public function getTeamLeadByIdAndBusinessId($id,$businessId){}
	public function checkProposal($business_id,$quotation_id){}
	public function getTotalProposals($quotation_id){}
	public function postProposal($postData){}
	public function getAllProposalsByQid($q_id){}
	public function getProposalById($p_id){}
	public function updateProposal($postData,$id) {}
	public function insertCron($postData){}
	public function insertScheduleInterView($postData){}
	public function getInterviewScheduledByQuotationId($q_id,$b_id){}
	public function acceptInterview($postData,$id) {}
  	public function getAssignedProject($businessId){}
	public function getAssignedTeamProject($businessId){}
	public function getTeamLeads($businessId,$iii){}
	public function getAdminListQuotation(){}	
	public function getProposal($uId,$qId){}	
	public function getInterview($uId,$qId){}	
	public function getCompletedProject($businessId){}	
	public function getAllCompletedProject(){}
	public function addTeamRatings($postData){}
	public function updateTeamRatings($postData,$team_id,$ind_id){}	
	public function getTeamRatingsByClient($team_id,$ind_id){}	
	public function getTeamRatings($team_id){}	
	public function getTeamRatingsByAdmin($team_id,$ind_id){}	
	public function updateTeamRatingsByAdmin($postData,$team_id,$ind_id){}
	public function totalTeamReviews($team_id){}
	
}
