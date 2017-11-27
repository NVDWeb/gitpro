<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_model extends CI_Model {

	public function getPlan(){
		$result = array();
		$this->db->select('tbl_plan.id,tbl_plan.plan_name,tbl_transaction_fee.id as hasTxnId,
			tbl_transaction_fee.txnFeeFree,tbl_transaction_fee.txnFeePremium,
			tbl_transaction_fee.txnFeeAmount,tbl_transaction_fee.txnFeePremiumSecond,
			tbl_transaction_fee.txnFeeAmountSecond,tbl_transaction_fee.txnFeePremiumThird,
			tbl_transaction_fee.txnFeeAmountThird');
		$this->db->from('tbl_plan');
		$this->db->join('tbl_transaction_fee','tbl_transaction_fee.plan_id=tbl_plan.id','LEFT');

		$query = $this->db->get();
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getPlanById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_plan');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function insertPlan($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_plan',$postData);
		}
		return $result;

	}



	public function updatePlan($postData,$id) {
		$result=array();
		if($postData){
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_plan',$postData);
		}
		return $result;
    }

    

    
    public function deletePlan($id) {
		
		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_plan');
			return TRUE;
		}
		return FALSE;
    }

    public function insertTransactionFee($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_transaction_fee',$postData);
		}
		return $result;
    }

    public function updateTransactionFee($postData,$id) {
		$result=array();
		if($postData){
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('plan_id',$id);
			$result = $this->db->update('tbl_transaction_fee',$postData);
		}
		return $result;
    }
    

    

}