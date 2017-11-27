<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model{

  public function getTeamMemberByEmail($email,$token_value){
    $result = array();
    if($email && $token_value){
      $this->db->where('token_value',$token_value);
      $query = $this->db->get('tbl_team_request');
      $result = $query->result_array();
    }
    return $result;
  }

  public function checkAlreadyRegistered($email){
    if($email){
      $this->db->where('email',$email);
      $query = $this->db->get('tbl_business');
      $res = $query->result();
      if($res){
        return $res;
      }else{
        return FALSE;
      }
    }
  }

  public function checkIfUserAlreadyInTeam($team_id,$member_id){
    if($team_id && $member_id){
      $this->db->where('team_id',$team_id);
      $this->db->where('member_id',$member_id);
      $query = $this->db->get('tbl_team');
      $res = $query->result();
      if($res){
        return $res;
      }else{
        return false;
      }
    }
  }

  public function insertTeamMember($postData){
    $result=array();
		if($postData){
      $this->db->set('joined_date', 'NOW()', FALSE);
		    $result = $this->db->insert('tbl_team',$postData);
		}
    return $result;
  }

}
?>
