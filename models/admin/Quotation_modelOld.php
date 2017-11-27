<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation_model extends CI_Model {

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

	public function insertQuotation($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_quotation',$postData);
		}
		return $result;
	}

	public function updateQuotation($postData,$id) {
		$result=array();
		if($postData){
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_quotation',$postData);
		}
		return $result;
  }

    public function deleteQuotation($id) {
		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_quotation');
			return TRUE;
		}
		return FALSE;
    }

    public function getLeads($businessId,$iii){
		$result = array();
		$data = array();
		$select = '';
		if($businessId){
		/*getAll category and subcategory of business and then select leads based on these param*/
			$this->db->where('business_id',$businessId);
			$query = $this->db->get('tbl_business_category_relation');
			$res = $query->result();
			foreach($res as $r){
				$this->db->or_where('tbl_quotation.sub_category',$r->sub_category);
			}
			$select = 'tbl_business.business_name,tbl_individual.name';
			$this->db->where('tbl_quotation.assignedbusiness_id',0);
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.business_id','LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
		}else{
			$select = 'tbl_business.business_name,tbl_individual.name';
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.business_id','LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
		}
		$this->db->select('tbl_quotation.*,'.$select.',tbl_category.category_name');
		$this->db->join('tbl_category','tbl_category.id=tbl_quotation.category','LEFT');

		$this->db->from('tbl_quotation');
		$query = $this->db->get();
		if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				$this->db->select('tbl_category.category_name');
				$this->db->where('id',$row->sub_category);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				foreach($get[0] as $key=>$value){
					$row->sub_category=$value;
				}
			}
		}
		return $result;
	}

	public function getLeadById($id){

		$result = array();
		if($id){
			if($this->session->userdata('admin_user_type')==1){
				$this->db->select('tbl_quotation.*,tbl_individual.name,tbl_team_category.category_name');
			}else{
				$this->db->select('tbl_quotation.*,tbl_individual.name,tbl_team_category.category_name');
				/*,tbl_bid.quotation_id,tbl_bid.business_id,tbl_bid.bidamount,tbl_bid.updatebidamount,tbl_bid.updatebidamountsecond,tbl_bid.bidamountindividual,tbl_bid.message,tbl_bid.bidcount');*/
			}

			$this->db->from('tbl_quotation');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id');
			$this->db->join('tbl_team_category','tbl_team_category.id=tbl_quotation.team_category');
			if($this->session->userdata('admin_user_type')==1){
				//$this->db->join('tbl_business','tbl_business.id=tbl_quotation.assignedbusiness_id');
			}
			/*else{
				$this->db->join('tbl_bid','tbl_bid.quotation_id=tbl_quotation.id');
			}*/


			$this->db->where('tbl_quotation.id',$id);
			$this->db->where('tbl_quotation.business_id',0);
			$query = $this->db->get();
			$result = $query->result();
			$this->db->select('tbl_team_category.category_name');
			$this->db->where('id',@$result[0]->team_category);
			$query = $this->db->get('tbl_team_category');
			$get = $query->result();
			$result[] = @$get[0]->category_name;
		}
		//print_r($result);
		return $result;
	}

	public function checkBid($business_id,$quotation_id){
		$this->db->where('tbl_bid.business_id',$business_id);
		$this->db->where('tbl_bid.quotation_id',$quotation_id);
		$query = $this->db->get('tbl_bid');
		if($query->num_rows()>0){
			return $query->num_rows();
		}else{
			return 0;
		}
	}


	public function postBid($postData){
		$result=array();
		$this->db->where('id',$postData['quotation_id']);
		$query = $this->db->get('tbl_quotation');
		$get = $query->result();
		$bidamounthire = $get[0]->bidamounthire;

		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_bid',$postData);
			$insert_id = $this->db->insert_id();

			$updateData = array('bidamountindividual'=>$bidamounthire);
			$this->db->where('id',$insert_id);
			$res = $this->db->update('tbl_bid',$updateData);

		}
		return $res;

	}

	public function updateBid($updateData,$quotation_id){
		$result=array();
		if($updateData){
			$this->db->where('id',$quotation_id);
			$result = $this->db->update('tbl_bid',$updateData);
			//echo $this->db->last_query();die;
		}
		return $result;

	}

	public function getTotalBidsByQuotationId($quotation_id){
		$result = array();
		if($quotation_id){
			$this->db->select('tbl_bid.*,tbl_ratings.rating,tbl_ratings.id as ratingId,tbl_business.business_name,tbl_quotation.status,tbl_quotation.assignedbusiness_id,tbl_quotation.paidamount,tbl_quotation.paymenttype,tbl_quotation.nda,tbl_quotation.ndap');
			$this->db->from('tbl_bid');
			$this->db->join('tbl_business','tbl_business.id=tbl_bid.business_id','LEFT');
			$this->db->join('tbl_quotation','tbl_quotation.id=tbl_bid.quotation_id','LEFT');
			$this->db->join('tbl_ratings','tbl_ratings.b_id=tbl_business.id','LEFT');
			$this->db->where('tbl_bid.quotation_id',$quotation_id);
			//$this->db->group_by('tbl_business.id');
			$query = $this->db->get();
			$result = $query->result();
		}
		//echo '<pre>';print_r($result);die;
		return $result;
	}

	public function getBidDetailsByQuotationAndBusinessId($quotation_id,$businessId){
		$result = array();
		if($quotation_id){
			$this->db->select('tbl_bid.*,tbl_individual.name as business_name,tbl_quotation.status,tbl_quotation.assignedbusiness_id,tbl_quotation.assignTeam,tbl_quotation.paidamount,tbl_quotation.paymenttype,tbl_quotation.bidclosingamount,tbl_team_request.team_name');
			$this->db->from('tbl_bid');
			$this->db->join('tbl_quotation','tbl_quotation.id=tbl_bid.quotation_id','LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
			$this->db->join('tbl_team_request','tbl_team_request.id=tbl_quotation.assignTeam','LEFT');
			$this->db->where('tbl_bid.quotation_id',$quotation_id);
			$this->db->where('tbl_bid.business_id',$businessId);
			$query = $this->db->get();
			$result = $query->result();
		}
		//echo '<pre>';print_r($result);
		return $result;
	}

	public function postMessageOnBid($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_message',$postData);

		}
		return $result;
	}

	public function messageThread($id,$business_id){
		$result = array();
		if($id){
			$this->db->select('tbl_individual.name,tbl_business.first_name as business_name,tbl_business.businessLogo ,tbl_message.individual_id,tbl_message.business_id,tbl_quotation.id,tbl_message.message,tbl_message.created_date,tbl_message.created_by');
			$this->db->from('tbl_quotation');
			$this->db->join('tbl_message','tbl_message.quotation_id=tbl_quotation.id');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id');
			$this->db->join('tbl_business','tbl_business.id=tbl_message.business_id');
			$this->db->where('tbl_message.quotation_id',$id);
			$this->db->where('tbl_message.business_id',$business_id);
			$query = $this->db->get();
			$result = $query->result();
			//echo $this->db->last_query();
			/*$this->db->select('tbl_category.category_name');
				$this->db->where('id',@$result[0]->sub_category);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				$result[] = @$get[0]->category_name;*/
		}
		//print_r($result);
		return $result;
	}

	public function getLastPaymentId(){
		$this->db->select('id');
		$this->db->from('tbl_payment');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function payment($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_payment',$postData);
		}
		return $result;
	}

	public function updatePayment($updateData,$orderId){
		$result = array();
		if($orderId){
			$this->db->where('order_id',$orderId);
			if($this->db->update('tbl_payment',$updateData)){
				$this->db->select('tbl_payment.*,tbl_category.category_name,tbl_business.business_name,tbl_quotation.category,tbl_quotation.sub_category,tbl_quotation.work_detail,tbl_quotation.paymenttype,tbl_quotation.paidamount');
				$this->db->from('tbl_payment');
				$this->db->join('tbl_business','tbl_business.id=tbl_payment.business_id','LEFT');
				$this->db->join('tbl_quotation','tbl_quotation.id=tbl_payment.quotation_id','LEFT');
				$this->db->join('tbl_category','tbl_category.id=tbl_quotation.category','LEFT');
				$this->db->where('tbl_payment.order_id',$orderId);
				$query = $this->db->get();
				$result = $query->result();

				$this->db->select('tbl_category.category_name as sub_category_name');
				$this->db->where('id',$result[0]->sub_category);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				$result[] = @$get[0]->sub_category_name;

				if($result){
					if($result[0]->paymenttype=='partially'){
						$paidAmount = $result[0]->paidamount+$result[0]->amount;
					}else{
						$paidAmount = $result[0]->amount;
					}
					$updateQuotation = array('assignedbusiness_id'=>$result[0]->business_id,'status'=>1,'paidamount'=>$paidAmount,'paymenttype'=>$result[0]->payment_type);
					$this->db->where('id',$result[0]->quotation_id);
					$this->db->update('tbl_quotation',$updateQuotation);
				}


			}
		}

		return $result;
	}

	public function getBusinessPlanCount($business_id){
		$result = array();
		if($business_id){
			$this->db->select('tbl_business.plan,tbl_plan.no_of_free_quotes');
			$this->db->from('tbl_business');
			$this->db->join('tbl_plan','tbl_plan.id=tbl_business.plan','LEFT');
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}

	public function getBusinessQuotationCount($business_id){
		$result = array();
		if($business_id){
			$this->db->select('count(tbl_quotation.id) as totalCount');
			$this->db->where('business_id',$business_id);
			$this->db->from('tbl_quotation');
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}

	public function getTotalBidings($quotation_id){
		if($quotation_id){
			$this->db->where('tbl_bid.quotation_id',$quotation_id);
			$query = $this->db->get('tbl_bid');
			if($query->num_rows()>0){
				return $query->num_rows();
			}else{
				return 0;
			}
		}

	}

	public function getStatusOfBid($quotation_id){
		$result = array();
		if($quotation_id){
			$this->db->select('tbl_quotation.bid_status');
			$this->db->where('tbl_quotation.id',$quotation_id);
			$query = $this->db->get('tbl_quotation');
			$result = $query->result();

		}
		return $result;
		//print_r($result);die;

	}

	public function saveNda($postData,$qid){
		$result=array();
		if($postData){
			$this->db->where('id',$qid);
			$result = $this->db->update('tbl_quotation',$postData);
		}
		return $result;
	}

	public function getLeadsByBusinessId($businessId){
		$result = array();
		$data = array();
		$select = '';
		if($businessId){
			$this->db->where('business_id',$businessId);
			$query = $this->db->get('tbl_business_category_relation');
			$res = $query->result();
			foreach($res as $r){
		 		$this->db->or_where('tbl_quotation.sub_category',$r->sub_category);
			}

			$select = 'tbl_business.business_name,tbl_individual.name';
			//$this->db->where('tbl_quotation.assignedbusiness_id',$businessId);
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.business_id','LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');

		}
			$this->db->select('tbl_quotation.*,'.$select.',tbl_category.category_name');
			$this->db->join('tbl_category','tbl_category.id=tbl_quotation.category','LEFT');

			$this->db->from('tbl_quotation');
			$query = $this->db->get();
			if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				$this->db->select('tbl_category.category_name');
				$this->db->where('id',$row->sub_category);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				foreach($get[0] as $key=>$value){
					$row->sub_category=$value;
				}
			}
		}
		return $result;
	}
	public function getLeadByIdAndBusinessId($id,$businessId){

		$result = array();
		if($id){
			$this->db->select('tbl_quotation.*,tbl_individual.name,tbl_category.category_name');
			$this->db->from('tbl_quotation');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id');
			$this->db->join('tbl_category','tbl_category.id=tbl_quotation.category');
			$this->db->where('tbl_quotation.id',$id);
			//$this->db->where('tbl_quotation.assignedbusiness_id',$businessId);
			$query = $this->db->get();
			$result = $query->result();

			$this->db->select('tbl_proposal.b_id as proposalBusinessId,tbl_proposal.proposal_accepted');
			$this->db->where('q_id',$result[0]->id);
			$query = $this->db->get('tbl_proposal');
			$get = $query->result();
			$result['proposal']=$get;

			$this->db->select('tbl_category.category_name');
			$this->db->where('id',@$result[0]->sub_category);
			$query = $this->db->get('tbl_category');
			$get = $query->result();
			$result[] = @$get[0]->category_name;


			$this->db->select('tbl_interview.id as interviewId,tbl_interview.schedule_date_time,tbl_interview.b_id as interviewBusinessId,tbl_interview.interview_accepted');
			$this->db->where('q_id',$result[0]->id);
			$query = $this->db->get('tbl_interview');
			$getinterview = $query->result();
			$result['interview']=$getinterview;


		}
		return $result;
	}

	public function getRatingsByClient($b_id,$ind_id){
		$result = array();
		if($b_id && $ind_id){
			$this->db->select('tbl_ratings.*');
			$this->db->where('tbl_ratings.b_id',$b_id);
			$this->db->where('tbl_ratings.ind_id',$ind_id);
			$query = $this->db->get('tbl_ratings');
			$result = $query->result();
		}
		return $result;
	}

	public function getRatings($b_id){
		$result = array();
		if($b_id){
			$this->db->select('COUNT(tbl_ratings.b_id) as totalReviews , max(tbl_ratings.rating) as rating');
			$this->db->from('tbl_ratings');
			$this->db->where('tbl_ratings.b_id',$b_id);
			$query = $this->db->get();
			$result = $query->result();

			$this->db->select('tbl_ratings.ind_id,tbl_ratings.admin_id');
			$this->db->where('tbl_ratings.b_id',$b_id);
			$query = $this->db->get('tbl_ratings');
			$get = $query->result();
			$result[]=$get;
		}
		//echo '<pre>';print_r($result);
		return $result;

	}



	public function checkAlreadyRated($b_id,$ind_id){

	}

	public function addRatings($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_ratings',$postData);
		}
		return $result;
	}

	public function updateRatings($postData,$b_id,$ind_id){
		$result=array();
		if($postData){
			$this->db->where('ind_id',$ind_id);
			$this->db->where('b_id',$b_id);
			$result = $this->db->update('tbl_ratings',$postData);
		}
		return $result;
	}

	public function getRecommendation($category,$sub_category){
		$result = array();
		if($category && $sub_category){
			$this->db->select('tbl_business_category_relation.*,tbl_business.id as bId,tbl_business.first_name as businessName,tbl_business.email,tbl_ratings.rating');
			$this->db->from('tbl_business_category_relation');
			$this->db->join('tbl_business','tbl_business.id=tbl_business_category_relation.business_id','LEFT');
			$this->db->join('tbl_ratings','tbl_ratings.b_id=tbl_business.id','LEFT');
			$this->db->where('tbl_business_category_relation.category',$category);
			$this->db->where('tbl_business_category_relation.sub_category',$sub_category);
			//$this->db->group_by('tbl_business.id');
			$query = $this->db->get();
			$getRecommendation = $query->result();
			$i=0;
			foreach ($getRecommendation as $key=>$row) {
				if($row->rating!=''){
					$this->db->select('COUNT(tbl_ratings.b_id) as totalReviews');
					$this->db->from('tbl_ratings');
					$this->db->where('tbl_ratings.b_id',$row->bId);
					$query = $this->db->get();
					$res = $query->result();
					$getRecommendation['reviews'][$row->bId] = $res[0]->totalReviews;

					// $this->db->select('tbl_education.education_level,tbl_education.education_from');
					// $this->db->from('tbl_education');
					// $this->db->where('tbl_education.business_id',$row->bId);
					// $query2 = $this->db->get();
					// $res2 = $query2->result();
					// $getRecommendation['education'][$row->bId] = $res2;

					// $this->db->select('tbl_workplace.workplace');
					// $this->db->from('tbl_workplace');
					// $this->db->where('tbl_workplace.business_id',$row->bId);
					// $query2 = $this->db->get();
					// $res2 = $query2->result();
					// $getRecommendation['work'][$row->bId] = $res2;
				}

				$i++;
			}
		}
		return $getRecommendation ;
	}

	public function getTeamRecommendation($category){
		$result = array();
		if($category){
			$this->db->select('tbl_team_request.*,tbl_business.id as bId,tbl_business.first_name as businessName,tbl_business.email');
			$this->db->from('tbl_team_request');
			$this->db->join('tbl_business','tbl_business.id=tbl_team_request.created_by','LEFT');
			//$this->db->join('tbl_ratings','tbl_ratings.b_id=tbl_business.id','LEFT');
			$this->db->where('tbl_team_request.team_category',$category);
			//$this->db->group_by('tbl_business.id');
			$query = $this->db->get();
			$getTeamRecommendation = $query->result();
			$i=0;
			// foreach ($getTeamRecommendation as $key=>$row) {
			// 	if($row->rating!=''){
			// 		$this->db->select('COUNT(tbl_ratings.b_id) as totalReviews');
			// 		$this->db->from('tbl_ratings');
			// 		$this->db->where('tbl_ratings.b_id',$row->bId);
			// 		$query = $this->db->get();
			// 		$res = $query->result();
			// 		$getTeamRecommendation['reviews'][$row->bId] = $res[0]->totalReviews;
			//
			// 		$this->db->select('tbl_education.education_level,tbl_education.education_from');
			// 		$this->db->from('tbl_education');
			// 		$this->db->where('tbl_education.business_id',$row->bId);
			// 		$query2 = $this->db->get();
			// 		$res2 = $query2->result();
			// 		$getTeamRecommendation['education'][$row->bId] = $res2;
			//
			// 		$this->db->select('tbl_workplace.workplace');
			// 		$this->db->from('tbl_workplace');
			// 		$this->db->where('tbl_workplace.business_id',$row->bId);
			// 		$query2 = $this->db->get();
			// 		$res2 = $query2->result();
			// 		$getTeamRecommendation['work'][$row->bId] = $res2;
			// 	}
			//
			// 	$i++;
			// }
		}
		return $getTeamRecommendation ;
	}

	public function getTeamQuotation($businessId,$individualId){
		$result = array();
		$data = array();
		$select = '';
		if($businessId){
			$select = 'tbl_business.business_name';
			$this->db->where('tbl_quotation.business_id',$businessId);
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.business_id','LEFT');
		}elseif($individualId){
			$select = 'tbl_individual.name';
			$this->db->where('tbl_quotation.individual_id',$individualId);
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
		}else{
			$select = 'tbl_business.business_name,tbl_individual.name';
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.assignedbusiness_id','LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
		}
		$this->db->select('tbl_quotation.*,'.$select.',tbl_team_category.category_name');
		$this->db->join('tbl_team_category','tbl_team_category.id=tbl_quotation.team_category','LEFT');
		$this->db->where('tbl_quotation.category',0);
		$this->db->from('tbl_quotation');
		$query = $this->db->get();
		if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				// $this->db->select('tbl_team_category.category_name');
				// $this->db->where('id',$row->sub_category);
				// $query = $this->db->get('tbl_team_category');
				// $get = $query->result();
				// foreach($get[0] as $key=>$value){
				// 	$row->sub_category=$value;
				// }

				// $this->db->select('count(*) as totalBid');
				// $this->db->where('quotation_id',$row->id);
				// $query = $this->db->get('tbl_bid');
				// $getc = $query->result();
				// foreach($getc[0] as $key=>$value){
				// 	$row->totalBid=$value;
				// }

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

	public function getTeamLeadsByBusinessId($businessId){
		$result = array();
		$data = array();
		$select = '';
		if($businessId){
			$this->db->where('created_by',$businessId);
			$query = $this->db->get('tbl_team_request');
			$res = $query->result();
			foreach($res as $r){
				$this->db->or_where('tbl_quotation.team_category',$r->team_category);
			}
			$select = 'tbl_individual.name';
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
		}
		$this->db->select('tbl_quotation.*,'.$select.',tbl_team_category.category_name');
		$this->db->join('tbl_team_category','tbl_team_category.id=tbl_quotation.team_category','LEFT');
		$this->db->where('tbl_quotation.category',0);
		$this->db->from('tbl_quotation');
		$query = $this->db->get();
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getTeamLeadByIdAndBusinessId($id,$businessId){

		$result = array();
		if($id){
			$this->db->select('tbl_quotation.*,tbl_individual.name,tbl_team_category.category_name');
			$this->db->from('tbl_quotation');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id');
			$this->db->join('tbl_team_category','tbl_team_category.id=tbl_quotation.team_category');
			$this->db->where('tbl_quotation.id',$id);
			$this->db->group_by('tbl_quotation.id');
			$query = $this->db->get();
			$result = $query->result();

			$this->db->select('tbl_proposal.b_id as proposalBusinessId,tbl_proposal.proposal_accepted');
			$this->db->where('q_id',$result[0]->id);
			$query = $this->db->get('tbl_proposal');
			$get = $query->result();
			$result['proposal']=$get;

			$this->db->select('tbl_interview.id as interviewId,tbl_interview.schedule_date_time,tbl_interview.b_id as interviewBusinessId,tbl_interview.interview_accepted');
			$this->db->where('q_id',$result[0]->id);
			$query = $this->db->get('tbl_interview');
			$getinterview = $query->result();
			$result['interview']=$getinterview;

		}
		return $result;
	}

	public function checkProposal($business_id,$quotation_id){
		$this->db->where('tbl_proposal.b_id',$business_id);
		$this->db->where('tbl_proposal.q_id',$quotation_id);
		$query = $this->db->get('tbl_proposal');
		if($query->num_rows()>0){
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	public function getTotalProposals($quotation_id){
		if($quotation_id){
			$this->db->where('tbl_proposal.q_id',$quotation_id);
			$query = $this->db->get('tbl_proposal');
			if($query->num_rows()>0){
				return $query->num_rows();
			}else{
				return 0;
			}
		}
	}

	public function postProposal($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_proposal',$postData);
			$insert_id = $this->db->insert_id();
			$result=$insert_id;
		}
		return $result;
	}

	public function getAllProposalsByQid($q_id){
		$result = array();
		if($q_id){
			$this->db->select('tbl_proposal.*,tbl_quotation.id as quotationId,tbl_quotation.project_name,tbl_business.id as businessId,tbl_business.first_name');
  		$this->db->from('tbl_proposal');
  		$this->db->join('tbl_quotation','tbl_quotation.id=tbl_proposal.q_id', 'LEFT');
      $this->db->join('tbl_business','tbl_business.id=tbl_proposal.b_id', 'LEFT');
  		$this->db->where('tbl_proposal.q_id',$q_id);
  		$query = $this->db->get();
  		$result = $query->result();
		}
		return $result;
	}

	public function getProposalById($p_id){
		$result = array();
		if($p_id){
			$this->db->select('tbl_proposal.*,tbl_quotation.team_category,tbl_quotation.assignedbusiness_id,tbl_quotation.assignTeam,tbl_quotation.id as quotationId,tbl_quotation.project_name,tbl_quotation.bidclosingamount,tbl_business.id as businessId,tbl_business.first_name,tbl_team_request.team_name,tbl_team_request.team_category,tbl_team_request.created_by,tbl_team_request.id as teamId');
  			$this->db->from('tbl_proposal');
  			$this->db->join('tbl_quotation','tbl_quotation.id=tbl_proposal.q_id', 'LEFT');
      		$this->db->join('tbl_business','tbl_business.id=tbl_proposal.b_id', 'LEFT');
			$this->db->join('tbl_team_request','tbl_team_request.team_category=tbl_quotation.team_category','LEFT');
  			$this->db->where('tbl_proposal.id',$p_id);
  			$query = $this->db->get();
			$result = $query->result();

			$this->db->select('tbl_team.member_id');
			$this->db->where('team_id',$result[0]->teamId);
			$query = $this->db->get('tbl_team');
			$get = $query->result();
			$result['team']=$get;

			$this->db->select('tbl_bid.business_id,tbl_bid.bidamount,tbl_bid.updatebidamount,tbl_bid.updatebidamountsecond');
			$this->db->where('quotation_id',$result[0]->q_id);
			$query = $this->db->get('tbl_bid');
			$get = $query->result();
			$result['bid']=$get;

		}

		return $result;
	}

	public function updateProposal($postData,$id) {
		$result=array();
		if($postData){
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_proposal',$postData);
		}
		return $result;
  }


	public function insertCron($postData){
		$result=array();
		if($postData){
			$result = $this->db->insert('cron_table',$postData);
		}
		return $result;
	}

	public function insertScheduleInterView($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_interview',$postData);
		}
		return $result;
	}

	public function getInterviewScheduledByQuotationId($q_id){
		$result = array();
		if($q_id){
			$this->db->select('tbl_interview.*');
  		$this->db->from('tbl_interview');
  		$this->db->where('tbl_interview.q_id',$q_id);
			$this->db->where('tbl_interview.created_by',$this->session->userdata('adminId'));
  		$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}

	public function acceptInterview($postData,$id) {
		$result=array();
		if($postData){
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_interview',$postData);
		}
		return $result;
  }

  public function getAssignedProject($businessId){
		$result = array();
		$data = array();
		$select = '';
		if($businessId){
			$this->db->where('business_id',$businessId);
			$query = $this->db->get('tbl_business_category_relation');
			$res = $query->result();
			foreach($res as $r){
		 		$this->db->or_where('tbl_quotation.sub_category',$r->sub_category);
			}

			$select = 'tbl_business.business_name,tbl_individual.name';
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.business_id','LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
		}
		$this->db->select('tbl_quotation.*,'.$select.',tbl_category.category_name');
		$this->db->join('tbl_category','tbl_category.id=tbl_quotation.category','LEFT');
		$this->db->where('tbl_quotation.assignedbusiness_id',$businessId);
		$this->db->from('tbl_quotation');
		$query = $this->db->get();
		if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				$this->db->select('tbl_category.category_name');
				$this->db->where('id',$row->sub_category);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				foreach($get[0] as $key=>$value){
					$row->sub_category=$value;
				}
			}
		}
		return $result;
	}

	public function getAssignedTeamProject($businessId){
		$result = array();
		$data = array();
		$select = '';
		if($businessId){
			$this->db->where('created_by',$businessId);
			$query = $this->db->get('tbl_team_request');
			$res = $query->result();
			if($res){
				foreach($res as $r){
					$this->db->where('tbl_quotation.assignTeam',$r->id);
				}
				$select = 'tbl_individual.name';
				$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
				$this->db->select('tbl_quotation.*,'.$select.',tbl_team_category.category_name');
				$this->db->join('tbl_team_category','tbl_team_category.id=tbl_quotation.team_category','LEFT');
				$this->db->where('tbl_quotation.category',0);
				$this->db->from('tbl_quotation');
				$query = $this->db->get();
				if($query->num_rows()>0){
					$result = $query->result();
				}
			}

		}

		return $result;
	}

	public function getTeamLeads($businessId,$iii){

		$result = array();
		$data = array();
		$select = '';
		if($businessId){
		/*getAll category and subcategory of business and then select leads based on these param*/
			$this->db->where('created_by',$businessId);
			$query = $this->db->get('tbl_team_request');
			$res = $query->result();
			foreach($res as $r){
				$this->db->or_where('tbl_quotation.team_category',$r->team_category);
			}
			$select = 'tbl_individual.name';
			$this->db->where('tbl_quotation.assignedbusiness_id',0);
			$this->db->where('tbl_quotation.assignTeam',0);
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
		}else{
			$select = 'tbl_business.business_name,tbl_individual.name';
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.business_id','LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
		}
		$this->db->select('tbl_quotation.*,'.$select.',tbl_team_category.category_name');
		$this->db->join('tbl_team_category','tbl_team_category.id=tbl_quotation.team_category','LEFT');
		$this->db->where('tbl_quotation.hireda',1);
		$this->db->from('tbl_quotation');
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();die;
		// if($query->num_rows()>0){
		// 	foreach($result = $query->result() as $row){
		// 		$this->db->select('tbl_category.category_name');
		// 		$this->db->where('id',$row->sub_category);
		// 		$query = $this->db->get('tbl_category');
		// 		$get = $query->result();
		// 		foreach($get[0] as $key=>$value){
		// 			$row->sub_category=$value;
		// 		}
		// 	}



		// }
		//echo '<pre>';print_r($result);
		return $result;
	}


	public function getRatingsByAdmin($b_id,$ind_id){
		$result = array();
		if($b_id && $ind_id){
			$this->db->select('tbl_ratings.*');
			$this->db->where('tbl_ratings.b_id',$b_id);
			$this->db->where('tbl_ratings.admin_id',$ind_id);
			$query = $this->db->get('tbl_ratings');
			$result = $query->result();
		}
		//echo '<pre>';print_r($result);
		return $result;
	}

	public function updateRatingsByAdmin($postData,$b_id,$ind_id){
		$result=array();
		if($postData){
			$this->db->where('admin_id',$ind_id);
			$this->db->where('b_id',$b_id);
			$result = $this->db->update('tbl_ratings',$postData);
		}
		return $result;
	}

	public function totalReviews($b_id){
		$result = array();
		if($b_id){
			$this->db->select('tbl_ratings.*,tbl_individual.name');
			$this->db->from('tbl_ratings');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_ratings.ind_id','LEFT');
			$this->db->where('tbl_ratings.b_id',$b_id);
			$query = $this->db->get();
			$result = $query->result();
		}

		return $result;
	}

	public function getAdminListQuotation(){
    	$result = array();
			$select = 'tbl_business.business_name,tbl_individual.name';
			$this->db->join('tbl_business','tbl_business.id=tbl_quotation.assignedbusiness_id','LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.individual_id','LEFT');
			$this->db->select('tbl_quotation.*,'.$select.',tbl_category.category_name');
			$this->db->join('tbl_category','tbl_category.id=tbl_quotation.category','LEFT');
			//$this->db->where('tbl_quotation.team_category',0);
			$this->db->from('tbl_quotation');
			$query = $this->db->get();
			$result = $query->result();
			//echo '<pre>';print_r($result );die;
			//echo $this->db->last_query();
			if($query->num_rows()>0){
				foreach($result = $query->result() as $row){
					//echo '<pre>';print_r($row);

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
}
