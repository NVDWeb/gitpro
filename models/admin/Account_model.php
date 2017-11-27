<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

  public function addAccount($postData){
    $this->db->set('created_date', 'NOW()', FALSE);
    $this->db->insert('tbl_accounts',$postData);
  }

  public function updateAccount($postData,$id){
    $this->db->where('id',$id);
    $this->db->set('modified_date', 'NOW()', FALSE);
    $this->db->update('tbl_accounts',$postData);
  }

  public function deleteAccount($id) {
    if($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_accounts');
      return TRUE;
    }
    return FALSE;
  }

  public function getPaypalAccounts($professional_id){
		$result=array();
		if($professional_id){
      $this->db->where('account_type',1);
      $this->db->where('created_by',$professional_id);
			$query = $this->db->get('tbl_accounts');
	    if($query->num_rows() > 0 ){
        $result = $query->result();
	    }
		}
    return $result;
	}



  public function getPaypalDetails($id){
		$result=array();
		if($id){
      $this->db->where('id',$id);
			$query = $this->db->get('tbl_accounts');
	    if($query->num_rows() > 0 ){
        $result = $query->result();
	    }
		}
		return $result;
	}



  public function getBankAccounts($professional_id){
		$result=array();
		if($professional_id){
      $this->db->where('account_type',2);
      $this->db->where('created_by',$professional_id);
			$query = $this->db->get('tbl_accounts');
	    if($query->num_rows() > 0 ){
        $result = $query->result();
	    }
		}
    return $result;
	}

  public function getBankDetails($id){
		$result=array();
		if($id){
      $this->db->where('id',$id);
			$query = $this->db->get('tbl_accounts');
	    if($query->num_rows() > 0 ){
        $result = $query->result();
	    }
		}
		return $result;
	}



  public function getCards($professional_id){
		$result=array();
		if($professional_id){
      $this->db->where('account_type',3);
      $this->db->where('created_by',$professional_id);
			$query = $this->db->get('tbl_accounts');
	    if($query->num_rows() > 0 ){
        $result = $query->result();
	    }
		}
    return $result;
	}

	public function getCardDetails($id){
		$result=array();
		if($id){
      $this->db->where('id',$id);
			$query = $this->db->get('tbl_accounts');
	    if($query->num_rows() > 0 ){
        $result = $query->result();
	    }
		}
		return $result;
	}

	public function changePass($updateData, $id){
		$result=false;

		if($id){
			if($this->session->userdata('admin_user_type')==1){
				$table = 'tbl_admin';
			}else if($this->session->userdata('admin_user_type')==2){
				$table = 'tbl_business';
			}else{
				$table = 'tbl_individual';
			}

			$this->db->where('id',$id);
			$this->db->update($table,$updateData);
			//echo $this->db->last_query();die;
			$result = true;	
		}
		return $result;
	}

}
