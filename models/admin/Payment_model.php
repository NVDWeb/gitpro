<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

	public function getPaymentDetailForProfessional($user_id){
    $result = array();
    $this->db->select('tbl_split_amount.is_withdraw,tbl_split_amount.amount,tbl_split_amount.released_date,tbl_split_amount.id,tbl_split_amount.accepted_amount,tbl_quotation.project_name,tbl_milestone.milestone_name');
    $this->db->from('tbl_split_amount');
    $this->db->join('tbl_milestone','tbl_milestone.id=tbl_split_amount.milestone_id','LEFT');
    $this->db->join('tbl_quotation','tbl_quotation.id=tbl_milestone.q_id','LEFT');
    $this->db->where('tbl_split_amount.member_id',$user_id);
    $this->db->where('tbl_split_amount.status',1);
    //$this->db->group_by('tbl_milestone.q_id');
    $query = $this->db->get();
    if($query->num_rows()>0){
      $result = $query->result();
    }
    return $result;
	}

	public function getPaymentDetailForClient($client_id){
    	$result = array();
    	$this->db->select('tbl_quotation.id,tbl_quotation.project_name,tbl_milestone.amount,tbl_milestone.created_date as paidDate,tbl_milestone.q_id,tbl_milestone.id as milestone_id,tbl_milestone.milestone_name,tbl_business.first_name');
		$this->db->from('tbl_quotation');
		$this->db->join('tbl_milestone','tbl_milestone.q_id=tbl_quotation.id','LEFT');
		$this->db->join('tbl_business','tbl_business.id=tbl_milestone.b_id','LEFT');
  	$this->db->where('tbl_quotation.created_by',$client_id);
		//$this->db->group_by('tbl_quotation.id');
	    $query = $this->db->get();
	    if($query->num_rows()>0){
	      //$result = $query->result();
				foreach($result = $query->result() as $row){
					$this->db->select('sum(tbl_split_amount.amount)');
					$this->db->where('milestone_id',$row->milestone_id);
					$this->db->where('realeased_status',1);
					$query = $this->db->get('tbl_split_amount');
					$get = $query->result();
					foreach($get[0] as $key=>$value){
						$row->paidAmountToTeamAdmin=$value;
					}
				}
	    }
	    return $result;
	}

	public function getPaymentDetailForAdmin(){
		$result = array();
		$this->db->select('tbl_milestone.id,tbl_milestone.amount as totalAmount,tbl_milestone.milestone_name,tbl_milestone.q_id,tbl_milestone.created_date as paidDate,tbl_quotation.project_name,tbl_quotation.created_by,tbl_individual.name');
		$this->db->from('tbl_milestone');
		$this->db->join('tbl_quotation','tbl_quotation.id=tbl_milestone.q_id','LEFT');
		$this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.created_by','LEFT');
		$this->db->where('tbl_milestone.realeased_status',1);
		//$this->db->group_by('tbl_quotation.id');
		$query = $this->db->get();
		if($query->num_rows()>0){
			$totalAmountMilestone = 0 ;
			foreach($result = $query->result() as $row){
				$totalAmountMilestone = $totalAmountMilestone+$row->totalAmount;
				$this->db->select('tbl_split_amount.amount,tbl_split_amount.released_date,tbl_business.first_name');
				$this->db->from('tbl_split_amount');
				$this->db->join('tbl_business','tbl_business.id=tbl_split_amount.member_id','LEFT');
				$this->db->where('tbl_split_amount.milestone_id',$row->id);
				$this->db->where('tbl_split_amount.realeased_status',1);
				$this->db->where('tbl_split_amount.is_withdraw',1);
				$query = $this->db->get();
				$get = $query->result();
			 	//$withdraw = $get;
				 //array_push($result,$withdraw);
				if($get){
					foreach($get as $key=>$value){
						$row->withdraw[]=$value;
					}
				}
				
			}

		}
		//echo '<pre>';print_r($result);die;
		return $result;
	}
}
