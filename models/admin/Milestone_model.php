<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Milestone_model extends CI_Model {

  public function getMilestone($b_id,$q_id){
	$result = array();
	if($b_id && $q_id){
		$this->db->select('tbl_milestone.*,tbl_business.first_name as business_name,tbl_quotation.project_name,tbl_quotation.hireda');
		$this->db->from('tbl_milestone');
		$this->db->join('tbl_business','tbl_business.id=tbl_milestone.b_id','LEFT');
		$this->db->join('tbl_quotation','tbl_quotation.id=tbl_milestone.q_id','LEFT');
		if($this->session->userdata('admin_user_type')==2){
			$this->db->where('tbl_milestone.b_id',$this->session->userdata('adminId'));
		}else{
			$this->db->where('tbl_milestone.b_id',$b_id);
		}
        $this->db->where('tbl_milestone.q_id',$q_id);
        $query = $this->db->get();
        $result = $query->result();
	}
	return $result;
  }



	public function insertMilestone($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_milestone',$postData);
		}
		return $result;
	}

  public function getMilestoneCount($b_id,$q_id){
    $this->db->where('tbl_milestone.b_id',$b_id);
    $this->db->where('tbl_milestone.q_id',$q_id);
    $this->db->where('tbl_milestone.milestone_accepted',1);
    $query = $this->db->get('tbl_milestone');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;
		}
	}

	public function updateMilestone($postData,$id) {
		$result=array();
		if($postData){
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_milestone',$postData);
		}
		return $result;
	}

  	public function getSplitAmountByMilestoneId($milestoneId){
  		$result = array();
  		if($milestoneId){
  			$this->db->select('tbl_split_amount.*,tbl_business.first_name');
  			$this->db->from('tbl_split_amount');
  			$this->db->join('tbl_business','tbl_business.id=tbl_split_amount.member_id');
  			$this->db->where('tbl_split_amount.milestone_id',$milestoneId);
        $this->db->where('tbl_split_amount.team_admin_id',0);
  			$query = $this->db->get();
  			$result = $query->result();
  		}
  		return $result;

  // 		$this->db->where('tbl_split_amount.milestone_id',$milestoneId);
  //   	$query = $this->db->get('tbl_split_amount');
		// if($query->num_rows()>0){
		// 	return $query->result();
		// }else{
		// 	return 0;
		// }
	}

	public function checkIfAlreadySplitted($member_id,$milestoneId){
		$this->db->where('tbl_split_amount.member_id',$member_id);
		$this->db->where('tbl_split_amount.milestone_id',$milestoneId);
    	$query = $this->db->get('tbl_split_amount');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;
		}
	}

	public function insertSplitAmount($postData){
		$result=array();
		if($postData){
			$result = $this->db->insert('tbl_split_amount',$postData);
		}
		return $result;
	}


	public function getAllMilestone($b_id,$ind_id){
		$result = array();
		$this->db->select('tbl_quotation.id as q_id, tbl_quotation.project_name,tbl_quotation.assignedbusiness_id');
		$this->db->from('tbl_quotation');
		if($b_id){
			$this->db->where('tbl_quotation.assignedbusiness_id',$b_id);
		}else{
			$this->db->where('tbl_quotation.created_by',$ind_id);
		}
		$query = $this->db->get();
		$result = $query->result();
		foreach ($result as $key => $row) {
			$this->db->select('count(tbl_milestone.id) as totalMilestone');
			$this->db->where('q_id',$row->q_id);
			$query = $this->db->get('tbl_milestone');
			$get = $query->result();
			foreach($get[0] as $key=>$value){
				$row->totalMilestone=$value;
			}

			$this->db->select('tbl_business.first_name');
			$this->db->where('id',$row->assignedbusiness_id);
			$query = $this->db->get('tbl_business');
			$get = $query->result();
			if($get){
				foreach($get[0] as $key=>$value){
					$row->business_name=$value;
				}
			}

		}
		
		
		return $result;
	}

  public function getMilestoneById($milestoneId){
		$result = array();
		if($milestoneId){
			$this->db->select('tbl_milestone.*');
			$this->db->from('tbl_milestone');
			$this->db->join('tbl_quotation','tbl_quotation.id=tbl_milestone.q_id','LEFT');
			//$this->db->where('tbl_milestone.created_by',$this->session->userdata('adminId'));
			$this->db->where('tbl_milestone.id',$milestoneId);
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
  }


	public function payment($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_milestone_payment',$postData);
		}
		return $result;
	}

	public function updatePayment($updateData,$order_id){
		$result = array();
		if($updateData && $order_id){
			$this->db->where('order_id',$order_id);
			if($this->db->update('tbl_milestone_payment',$updateData)){
				$this->db->where('order_id',$order_id);
				$query = $this->db->get('tbl_milestone_payment');
				$result = $query->result();
			}
		}
		return $result;
	}

	public function getSplitAmountData($split_id){
		$result = array();
		if($split_id){
			$b_id = $this->session->userdata('adminId');
			$this->db->select('tbl_split_amount.*,tbl_quotation.project_name,tbl_milestone.milestone_name,tbl_milestone.created_by,tbl_business.first_name,tbl_business.contact_person_name,tbl_individual.name as clientName');
			$this->db->from('tbl_split_amount');
			$this->db->join('tbl_milestone','tbl_milestone.id=tbl_split_amount.milestone_id', 'LEFT');
			$this->db->join('tbl_business','tbl_business.id=tbl_milestone.created_by', 'LEFT');
			$this->db->join('tbl_individual','tbl_individual.id=tbl_milestone.created_by_client', 'LEFT');
			$this->db->join('tbl_quotation','tbl_quotation.id=tbl_milestone.q_id', 'LEFT');
			$this->db->where('tbl_split_amount.is_seen',0);
			$this->db->where('tbl_split_amount.member_id',$b_id);
			$this->db->where('tbl_split_amount.id',$split_id);
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result ;
	}

	public function updateSplitAmount($postData,$id) {
		$result=array();
		if($postData){
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_split_amount',$postData);
		}
		return $result;
	}

	public function getTeamAdminDataBySplitId($split_id){
		$result = array();
		if($split_id){
			$this->db->select('tbl_split_amount.*,tbl_business.first_name,tbl_business.email,tbl_milestone.created_by');
			$this->db->from('tbl_split_amount');
			$this->db->join('tbl_milestone','tbl_milestone.id=tbl_split_amount.milestone_id', 'LEFT');
			$this->db->join('tbl_business','tbl_business.id=tbl_milestone.created_by', 'LEFT');
			$this->db->join('tbl_quotation','tbl_quotation.id=tbl_milestone.q_id', 'LEFT');
			$this->db->where('tbl_split_amount.id',$split_id);
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}

	public function getAllApprovedSplitAmount($milestoneId){
		$result =array();
		if($milestoneId){
			$this->db->select('tbl_split_amount.*,tbl_business.first_name,tbl_business.email,tbl_milestone.created_by');
			$this->db->from('tbl_split_amount');
			$this->db->join('tbl_business','tbl_business.id=tbl_split_amount.member_id', 'LEFT');
			$this->db->join('tbl_quotation','tbl_quotation.id=tbl_milestone.q_id', 'LEFT');
			$this->db->where('tbl_split_amount.milestone_id',$milestoneId);
			$this->db->where('tbl_split_amount.status',1);
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}

  public function checkMilestoneNotClosed($milestoneId){
    $result =array();
		if($milestoneId){
			$this->db->where('id',$milestoneId);
			$this->db->where('status',1);
			$query = $this->db->get('tbl_milestone');
			$result = $query->result();
		}
		return $result;
  }

  public function updateReleasedStatus($postData,$id) {
		$result=array();
		if($postData){
			$this->db->where('milestone_id',$id);
      $this->db->where('status',1);
      $query = $this->db->get('tbl_split_amount');
      $result = $query->result();
      $sumOfAcceptedAmount = 0;
      $sumOfRealAmount = 0;
      foreach ($result as $value) {
        $sumOfAcceptedAmount = $sumOfAcceptedAmount+$value->accepted_amount;
        $sumOfRealAmount = $sumOfRealAmount+$value->amount;
      }
      $this->db->where('id',$id);
      $query1 = $this->db->get('tbl_milestone');
      $result1 = $query1->result();
      $milestoneAmount = $result1[0]->amount;
      // if($sumOfRealAmount!=$milestoneAmount){
      //   $amountToTeamAdmin = $milestoneAmount - $sumOfAcceptedAmount ;
      //   $t= $amountToTeamAdmin*10;
      //   $accepted_amount = $t/100 ;
      //   $insertData = array(
      //       'milestone_id'=>$id,
      //       'member_id'=>0,
      //       'team_admin_id'=>$result1[0]->b_id,
      //       'amount'=>$amountToTeamAdmin,
      //       'accepted_amount'=>$accepted_amount,'status'=>1,'realeased_status'=>1,'is_seen'=>0);
      //
      //   $this->db->insert('tbl_split_amount',$insertData);
      // }
		$this->db->where('milestone_id',$id);
      if($this->db->update('tbl_split_amount',$postData)){
        $this->db->where('id',$id);
  			$result = $this->db->update('tbl_milestone',$postData);
      }
	   }
		return $result;
	}

  public function getWithdrawDetails($m_id){
    $result = array();
    if($m_id){
      /*first check for member*/
      $this->db->select('tbl_split_amount.*');
			$this->db->from('tbl_split_amount');
      $this->db->where('tbl_split_amount.realeased_status',1);
      $this->db->where('tbl_split_amount.is_withdraw',0);
			$this->db->where('tbl_split_amount.member_id',$m_id);
			$query = $this->db->get();
			$result1 = $query->result();
      if($result1){
        $result1['team_admin']='no';
        $result = $result1;
      }else{
        $this->db->select('tbl_split_amount.*');
        $this->db->from('tbl_split_amount');
        $this->db->where('tbl_split_amount.realeased_status',1);
        $this->db->where('tbl_split_amount.is_withdraw',0);
        $this->db->where('tbl_split_amount.team_admin_id',$m_id);
        $query = $this->db->get();
        $result2 = $query->result();
        $result2['team_admin']='yes';
        $result = $result2;
      }
    }
    return $result;
  }

  public function getPaymentDetails($payment_type){
    $result = array();
    if($payment_type){
      $this->db->select('tbl_accounts.*');
      $this->db->from('tbl_accounts');
      $this->db->where('tbl_accounts.created_by',$this->session->userdata('adminId'));
      $this->db->where('tbl_accounts.account_type',$payment_type);
      $query = $this->db->get();
      $result = $query->result();
    }
    return $result;
  }

  public function updateWithDrawStatus($postData,$user_id){
    if($postData){
      $this->db->where('team_admin_id',$user_id);
      $this->db->update('tbl_split_amount',$postData);
    }
    return 1;
  }

  public function updateWithDrawStatusMember($postData,$user_id){
    if($postData){
      $this->db->where('member_id',$user_id);
      $this->db->update('tbl_split_amount',$postData);
    }
    return 1;
  }

  public function insertMilestoneReg($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_milestone_reg',$postData);
		}
		return $result;
	}

	public function getDataByOrderId($order_id){
		$result = array();
		if($order_id){
			$this->db->select('tbl_milestone_reg.*');
		      $this->db->from('tbl_milestone_reg');
		      $this->db->where('tbl_milestone_reg.order_id',$order_id);
		      $query = $this->db->get();
		      $result = $query->result();
		}
		return $result;
	}

	public function updateMilestoneRegPayment($postData,$order_id){
		if($postData){
	      $this->db->where('order_id',$order_id);
	      $this->db->update('tbl_milestone_reg',$postData);
	    }
    	return 1;
	}

  public function getMemberData($member_id,$milestone_id){
    $result = array();
    if($member_id){
        $this->db->select('tbl_split_amount.*');
        $this->db->from('tbl_split_amount');
        $this->db->where('tbl_split_amount.member_id',$member_id);
        $this->db->where('tbl_split_amount.milestone_id',$milestone_id);
        $query = $this->db->get();
        $result = $query->result();
    }
    return $result;
  }

  public function updateSplitAmountToAssign($postData,$milestone_id,$team_admin_id) {
		$result=array();
		if($postData){
			$this->db->where('milestone_id',$milestone_id);
      $this->db->where('member_id',$team_admin_id);
			$result = $this->db->update('tbl_split_amount',$postData);
		}
		return $result;
	}

  public function deleteMemeberData($milestone_id,$member_id){
    $this->db->where('milestone_id',$milestone_id);
    $this->db->where('member_id',$member_id);
    $this->db->delete('tbl_split_amount');
    return 1;
  }

  public function getSplitData($milestoneId){
    $result = array();
    if($milestoneId){
      $this->db->select('tbl_split_amount.*');
      $this->db->from('tbl_split_amount');
      $this->db->where('tbl_split_amount.milestone_id',$milestoneId);
      $query = $this->db->get();
      $result = $query->result();
    }
    return $result;
  }

  public function updateSplitAdminAmount($postData,$id,$milestone_id,$member_id) {
  $result=array();
  if($postData){
   $this->db->where('id',$id)->where('milestone_id',$milestone_id)->where('member_id',$member_id);
   $result = $this->db->update('tbl_split_amount',$postData);
   //echo $this->db->last_query();
  }
  return $result;
 }
 
  public function getSplitAmountByAdminMilestoneId($milestoneId){
   $result = array();
   //echo '<pre>';print_r($this->session->userdata());
   if($milestoneId){
    $this->db->select('tbl_split_amount.*,tbl_business.first_name');
    $this->db->from('tbl_split_amount');
    $this->db->join('tbl_business','tbl_business.id=tbl_split_amount.member_id');
    $this->db->where('tbl_split_amount.milestone_id',$milestoneId);
    $this->db->where('tbl_split_amount.member_id !=',$this->session->userdata('adminId'));
    //$this->db->where('tbl_split_amount.status',1);
    $this->db->where('tbl_split_amount.team_admin_id',0);
    $query = $this->db->get();
    //echo $this->db->last_query();
    $result = $query->result();
   }
   return $result;
 }

}
