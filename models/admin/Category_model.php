<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function getCategories($businessId=0){
		$where='';
		$result = array();
		$this->db->where('business_id',$businessId);
		$query = $this->db->get('tbl_business_category_relation');
		$res = $query->result();
		foreach($res as $r){
			$this->db->or_where('tbl_category.id',$r->category);
			$this->db->group_by('tbl_category.id');
		}


		//$this->db->where($where);
		$this->db->where('parent_id',0);
		$query = $this->db->get('tbl_category');
		//echo $this->db->last_query();
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getCategoryById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_category');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function insertCategory($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_category',$postData);
		}
		return $result;

	}


	public function updateCategory($postData,$id) {
		$result=array();
		if($postData){
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_category',$postData);
		}
		return $result;
  }

  public function deleteCategory($id) {
		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_category');
			return TRUE;
		}
		return FALSE;
  }

    public function getSubCategories(){
		$result = array();
		$parent = array();
		$this->db->where('parent_id!=','');
		$query = $this->db->get('tbl_category');
		if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				$this->db->select('tbl_category.category_name');
				$this->db->where('id',$row->parent_id);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				if(!empty($get[0])){
				foreach($get[0] as $key=>$value){
					$row->parent_cat=$value;
				}
				}
			}

		}
		//echo '<pre>';print_r($result);
		return $result;
	}

	public function insertSubCategory($postData){
		$result=array();
		if($postData){

			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_category',$postData);
		}
		return $result;

	}

	public function updateSubCategory($postData,$id) {
		$result=array();
		if($postData){
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_category',$postData);
		}
		return $result;
    }

    public function getCategoryByParentId($parent_id){
    	$result = array();
		if($parent_id){
			if($this->session->userdata('admin_user_type')==2){
				$businessId = $this->session->userdata('adminId');
				$this->db->where('business_id',$businessId);
				$this->db->where('category',$parent_id);
				$query = $this->db->get('tbl_business_category_relation');
				$res = $query->result();
				foreach($res as $r){
					$this->db->or_where('tbl_category.id',$r->sub_category);
					$this->db->group_by('tbl_category.id');
				}
			}
			$this->db->where('parent_id',$parent_id);
			$query = $this->db->get('tbl_category');
			//echo $this->db->last_query();die;
			if($query->num_rows()>0){
				$result = $query->result();
			}
		}
		return $result;
    }

	 public function getParentCategory(){
		 $result = array();
		 $this->db->where('parent_id',0);
		 $query = $this->db->get('tbl_category');
		 if($query->num_rows()>0){
			 $result = $query->result();
		 }
		 return $result;
	 }

	public function getParentCategoryAndSUbcategoty(){
		$result = array();
		$this->db->where('parent_id',0);
		$query = $this->db->get('tbl_category');
		if($query->num_rows()>0){
			foreach($result = $query->result() as $row){
				$this->db->select('tbl_category.id,tbl_category.category_name');
				$this->db->where('parent_id',$row->id);
				$query = $this->db->get('tbl_category');
				$get = $query->result();
				if(!empty($get)){
					foreach($get as $key=>$value){
						$row->sub_cat=$get;
					}
				}
			}
		} 

		return $result;
	}

	 public function getSubCategoriesByParentId($parent_id){
		 $result = array();
	 if($parent_id){
		 $this->db->where('parent_id',$parent_id);
		 $query = $this->db->get('tbl_category');
		 //echo $this->db->last_query();die;
		 if($query->num_rows()>0){
			 $result = $query->result();
		 }
	 }
	 return $result;
	 }

	 public function getTeamCategories(){
 		$result = array();
		$query = $this->db->get('tbl_team_category');
 		$res = $query->result();
 		return $result = $res;
	}
	
	public function getTeamCategoriesBusiness($team_cat_id){		
		$result = array();	
		if($team_cat_id){ 
			$this->db->where('id',$team_cat_id);
			$query = $this->db->get('tbl_team_category');
			$result = $query->result();		 
			if($result){
				$myStr	= $result[0]->category_name;			
				$this->db->like('category_name',substr($myStr, 0, 5));			
				$query_cat = $this->db->get('tbl_category');
				$res_cat_list = $query_cat->result();			
					foreach($res_cat_list as $res_cat){								 
						$this->db->where('category',$res_cat->id);
						$this->db->limit(10);
						$query_category_relation = $this->db->get('tbl_business_category_relation');
						$business_category_relation = $query_category_relation->result();	
						foreach($business_category_relation as $bsr){
							$this->db->where('id!=',$this->session->userdata('adminId'));
							$this->db->where('id',$bsr->business_id);
							$business_list = $this->db->get('tbl_business');
							$business_lists = $business_list->result();								
							foreach($business_lists as $key=>$business){
								$businessarray[] = $business;
								$this->db->select('COUNT(tbl_ratings.b_id) as totalReviews');
								$this->db->from('tbl_ratings');
								$this->db->where('tbl_ratings.b_id',$business->id);
								$query = $this->db->get();
								$res = $query->result();
								foreach($res[0] as $key=>$value){
									$business->rating=$value;
								}					
							}						
						}			 
					}			
				}
			}
			//echo '<pre>';print_r($businessarray);
			if(!empty($businessarray)){			 
		return $businessarray;	
			}
	}

	public function getTeamCategoryById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_team_category');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function insertTeamCategory($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_team_category',$postData);
		}
		return $result;

	}



	public function updateTeamCategory($postData,$id) {
		$result=array();
		if($postData){
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_team_category',$postData);
		}
		return $result;
  }

  public function deleteTeamCategory($id) {
		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_team_category');
			return TRUE;
		}
		return FALSE;
  }
  
  	public function getTeamCat(){
		$where='';
		$result = array();
		$query = $this->db->get('tbl_team_category');		
		//echo $this->db->last_query();
		if($query->num_rows()>0){
			$result = $query->result();
			
		}
		return $result;
	}
  	
  	public function getRecommendationByCategory($category){
  		$businessarray = array();
  		if($category){
  			$this->db->where('category',$category);
  			$this->db->where('id!=',$this->session->userdata('adminId'));
			$this->db->limit(2);
			$this->db->order_by('id','DESC'); 
			$this->db->group_by('id','DESC');
			$query_category_relation = $this->db->get('tbl_business');
			$business_category_relation = $query_category_relation->result();
			//echo '<pre>';print_r($business_category_relation);
			foreach($business_category_relation as $bsr){
				$this->db->where('id',$bsr->id);
				$business_list = $this->db->get('tbl_business');
				$business_lists = $business_list->result();								
				foreach($business_lists as $key=>$business){
					$this->db->select('COUNT(tbl_ratings.b_id) as totalReviews');
					$this->db->from('tbl_ratings');
					$this->db->where('tbl_ratings.b_id',$business->id);
					$query = $this->db->get();
					$res = $query->result();
					foreach($res[0] as $key=>$value){
						$business->rating=$value;
					}

					$this->db->select('employment_history.Title');
					$this->db->from('employment_history');
					$this->db->where('employment_history.b_id',$business->id);
					$query = $this->db->get();
					$resa = $query->result();
					if($resa){
						foreach($res[0] as $key=>$value){
							$business->title=$value;
						}
					}
				}
				$businessarray[] = $business;					
			}
  		}
  		//echo '<pre>';print_r($businessarray);
  		return $businessarray;
  	}

  	public function getRecommendationByCategoryAjax($category){
  		$result = array();
  		if($category){
  			$this->db->where('category',$category);
			$this->db->limit(2);
			$this->db->order_by('business_id','DESC');
			$query_category_relation = $this->db->get('tbl_business_category_relation');
			$business_category_relation = $query_category_relation->result();
			foreach($business_category_relation as $bsr){
				$this->db->where('id!=',$this->session->userdata('adminId'));
				$this->db->where('id',$bsr->business_id);
				$business_list = $this->db->get('tbl_business');
				$business_lists = $business_list->result();								
				foreach($business_lists as $key=>$business){
					$businessarray[] = $business;
					$this->db->select('COUNT(tbl_ratings.b_id) as totalReviews');
					$this->db->from('tbl_ratings');
					$this->db->where('tbl_ratings.b_id',$business->id);
					$query = $this->db->get();
					$res = $query->result();
					foreach($res[0] as $key=>$value){
						$business->rating=$value;
					}

					$this->db->select('employment_history.Title');
					$this->db->from('employment_history');
					$this->db->where('employment_history.b_id',$business->id);
					$query = $this->db->get();
					$res = $query->result();
					foreach($res[0] as $key=>$value){
						$business->title=$value;
					}
									
				}						
			}
  		}
  		//echo '<pre>';print_r($businessarray);
  		return $businessarray;
  	}

  	public function countTotal($cat){
  		$this->db->select('tbl_business.id');
		$this->db->from('tbl_business');
		$this->db->where('category',$cat);
		$query_category_relation = $this->db->get();
		return $business_category_relation[] = $query_category_relation->result();
  	}
	
	public function getTeamRecommendationByTeamCategory($team_category){
  		$result = array();
  		if($team_category){
			$this->db->select('tbl_team_request.*');
			$this->db->from('tbl_team_request');							
			$this->db->where('team_category',$team_category);
			//$this->db->limit(1);		
			$query = $this->db->get();	
			//echo $this->db->last_query();		
			$query_category_relation = $query->result();
		}
  		//echo '<pre>';print_r($businessarray);
  		return $query_category_relation;
  	}
	
	public function getCategoryByParentIdAndId($id,$parentId){
		$result=array();
		if($id){
			$this->db->where('id',$id)->where('parent_id',$parentId);
			//$this->db->where('parent_id',$parentId);
			$query = $this->db->get('tbl_category');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function getSubCategory(){
		 $result = array();
		 $this->db->where('parent_id!=',0);
		 $query = $this->db->get('tbl_category');
		 if($query->num_rows()>0){
			 $result = $query->result();
		 }
		 return $result;
	 }

	public function getRecomodationbucayId($catId,$subcatId){
		$result = array();
		$getRecommendation =array();
		if($catId && $subcatId){
			$this->db->select('tbl_business_category_relation.*,tbl_business.id as bId,tbl_business.first_name as businessName,tbl_business.email,tbl_business.email_notification,tbl_business.businessLogo,tbl_business.profile_name,tbl_business.country_name,tbl_business.state_name,tbl_business.city_name,tbl_ratings.rating');
			$this->db->from('tbl_business_category_relation');
			$this->db->join('tbl_business','tbl_business.id=tbl_business_category_relation.business_id','LEFT');
			$this->db->join('tbl_ratings','tbl_ratings.b_id=tbl_business.id','LEFT');
			$this->db->where('tbl_business_category_relation.category',$catId);
			$this->db->where('tbl_business_category_relation.sub_category',$subcatId);
			$this->db->where('tbl_ratings.rating >',3);
			$this->db->limit(10);
			$query = $this->db->get();
			$getRecommendation = $query->result();   
		}
		return $getRecommendation;
	}
	
	
}
