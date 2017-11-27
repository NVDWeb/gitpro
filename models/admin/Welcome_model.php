<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	public function getUsersOnline($team_id){
		$result =array();
		$loggedInUser = $this->session->userdata('fname');
		if($team_id){
			$this->db->select('tbl_team.*,tbl_business.id, tbl_business.first_name');
			$this->db->from('tbl_team');
			$this->db->join('tbl_business','tbl_business.id=tbl_team.member_id','LEFT');
			$this->db->where('tbl_team.team_id',$team_id);
			$query = $this->db->get();
			$results = $query->result();
			foreach ($results as $value) {
				$this->db->select('chat_vpb_online_users.*');
				// if($loggedInUser != strtolower($value->first_name)){
				// 	$this->db->where('username',strtolower($value->first_name));
				// }
				$this->db->where('username!=',strtolower($loggedInUser));
				$this->db->from('chat_vpb_online_users');
				$query = $this->db->get();
				$result = $query->result();
			}
		}
		return $result;
	}

	public function checkUserBothDetails($username,$password){
		$result =array();
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->select('chat_vpb_users.*');
		$this->db->from('chat_vpb_users');
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}

	public function check_users_online($username){
		$result =array();
		$this->db->where('username',$username);
		$this->db->select('chat_vpb_online_users.*');
		$this->db->from('chat_vpb_online_users');
		$query = $this->db->get();
		$result = $query->result();
		return $result;

	}

	public function chat_vpb_online_users($postData){
		if($postData){
			$this->db->insert('chat_vpb_online_users',$postData);
		}
	}

	public function checkFullName($username){
		$result =array();
		$this->db->where('username',$username);
		$this->db->select('chat_vpb_users.*');
		$this->db->from('chat_vpb_users');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function vpb_new_chat_notification($user_to){
		$result =array();
		$this->db->where('to',$user_to);
		$this->db->where('receiver_read','no');
		$this->db->select('chat.*');
		$this->db->from('chat');
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result();
		return $result;

	}

	public function check_info_brought($user_from,$user_to){
		$result =array();
		$this->db->where('to',$user_from);
		$this->db->where('from',$user_to);
		$this->db->where('receiver_read','no');
		$this->db->select('chat.*');
		$this->db->from('chat');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function updateChat($updateData,$user_from,$user_to,$receiver_read){
		$this->db->where('to',$user_from);
		$this->db->where('from',$user_to);
		$this->db->where('receiver_read','yes');
		$this->db->update('chat',$updateData);
	}

	public function insertChat($postData){
		if($postData){
			$this->db->insert('chat',$postData);
		}
	}

	public function check_newly_sent_chat($user_to,$user_from){
		$result=array();
		$this->db->where('to',$user_to);
		$this->db->where('from',$user_from);
		$this->db->where('sender_deleted','no');

		$this->db->or_where('to',$user_from);
		$this->db->where('from',$user_to);
		$this->db->where('receiver_deleted','no');
		$this->db->select('chat.*');
		$this->db->from('chat');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();
		return $result;
	}

	public function check_usersDetails($user_from){
		$result =array();
		$this->db->where('username',$user_from);
		$this->db->select('chat_vpb_users.*');
		$this->db->from('chat_vpb_users');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function check_usersPic(){
		$result =array();
		$this->db->where('username',$user_from);
		$this->db->select('chat_vpb_users.*');
		$this->db->from('chat_vpb_users');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function getNotReadMessage($to,$from){
		$result = array();
		if($to && $from){
			$this->db->where('to',$to);
			$this->db->where('from',$from);
			$this->db->where('receiver_read','no');
			$this->db->select('chat.*');
			$this->db->from('chat');
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			$result = $query->result();	
		}
		return $result;
	}
}
