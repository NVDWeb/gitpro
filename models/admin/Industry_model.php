<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Industry_model extends CI_Model {

	public function getIndustries($businessId=0){
		$where='';
		$result = array();
		$this->db->where('business_id',$businessId);
		$query = $this->db->get('tbl_business_category_relation');
		$res = $query->result();
		foreach($res as $r){
			$this->db->or_where('tbl_industry.id',$r->category);
			$this->db->group_by('tbl_industry.id');
		}		
		$this->db->where('parent_id',0);
		$query = $this->db->get('tbl_industry');		
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getIndustryById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_industry');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function insertIndustry($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_industry',$postData);
		}
		return $result;

	}


	public function updateIndustry($postData,$id) {
		$result=array();
		if($postData){
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_industry',$postData);
		}
		return $result;
  }

  public function deleteIndustry($id) {
		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_industry');
			return TRUE;
		}
		return FALSE;
  }

    public function getSubIndustries(){
		$result = array();
		$parent = array();
		$this->db->where('parent_id!=','');
		$query = $this->db->get('tbl_industry');
		if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				$this->db->select('tbl_industry.industry_name');
				$this->db->where('id',$row->parent_id);
				$query = $this->db->get('tbl_industry');
				$get = $query->result();
				if(!empty($get[0])){
				foreach($get[0] as $key=>$value){
					$row->parent_cat=$value;
				}
				}
			}
		}		
		return $result;
	}

	public function insertSubIndustry($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_industry',$postData);
		}
		return $result;
	}

	public function updateSubIndustry($postData,$id) {
		$result=array();
		if($postData){
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_industry',$postData);
		}
		return $result;
    }

	 public function getParentIndustry(){
		 $result = array();
		 $this->db->where('parent_id',0);
		 $query = $this->db->get('tbl_industry');
		 if($query->num_rows()>0){
			 $result = $query->result();
		 }
		 return $result;
	 }

	 public function getSubIndustriesByParentId($parent_id){
		 $result = array();
	 if($parent_id){
		 $this->db->where('parent_id',$parent_id);
		 $query = $this->db->get('tbl_industry');		
		 if($query->num_rows()>0){
			 $result = $query->result();
		 }
	 }
	 return $result;
	 }
	
	public function getIndustryByParentIdAndId($id,$parentId){
		$result=array();
		if($id){
			$this->db->where('id',$id)->where('parent_id',$parentId);			
			$query = $this->db->get('tbl_industry');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}
		}
		return $result;
	}	
	
}
