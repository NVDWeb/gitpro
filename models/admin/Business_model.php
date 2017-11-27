<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_model extends CI_Model {

	public function getBusiness(){
		$result = array();
		$query = $this->db->get('tbl_business');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getBusinessById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_business');
			if($query->num_rows() > 0 ){
				foreach($result = $query->result() as $row){
					$this->db->select('education_history.school_name,education_history.school_Type,education_history.school_City,education_history.school_State,education_history.school_Country,education_history.DegreeName,education_history.startdate,education_history.endDate');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('education_history');
					$get = $query->result();
					foreach($get as $value){
						$result['education'][]=$value;
					}

					$this->db->select('employment_history.EmployerOrgName,employment_history.CurrentEmplyor,employment_history.Title,employment_history.Description,employment_history.JobPeriod,employment_history.EmployerCity,employment_history.EmployerState,employment_history.EmployerCountry,employment_history.startDate,employment_history.endDate');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('employment_history');
					$get = $query->result();
					foreach($get as $value){
						$result['workexp'][]=$value;
					}

					$this->db->select('tbl_achievement.achivement');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_achievement');
					$get = $query->result();
					foreach($get as $value){
						$result['achivement'][]=$value;
					}

					$this->db->select('tbl_executivesummary.executiveSummary');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_executivesummary');
					$get = $query->result();
					foreach($get as $value){
						$result['executiveSummary'][]=$value;
					}
					
					$this->db->select('tbl_managementsummary.managementSummary');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_managementsummary');
					$get = $query->result();
					foreach($get as $value){
						$result['managementSummary'][]=$value;
					}

					$this->db->select('tbl_languageknown.languageKnown');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_languageknown');
					$get = $query->result();
					foreach($get as $value){
						$result['languageKnown'][]=$value;
					}

					$this->db->select('tbl_license.license');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_license');
					$get = $query->result();
					foreach($get as $value){
						$result['license'][]=$value;
					}

					$this->db->select('tbl_objectivesummary.objectiveSummary');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_objectivesummary');
					$get = $query->result();
					foreach($get as $value){
						$result['objectiveSummary'][]=$value;
					}

					$this->db->select('tbl_skills.skills,tbl_skills.ExperienceInMonths');
					$this->db->where('b_id',$row->id);
					$query = $this->db->get('tbl_skills');
					$get = $query->result();
					foreach($get as $value){
						$result['skills'][]=$value;
					}
					//echo '<pre>';	print_r($result);

					$this->db->select('countries.name as countryName');
					$this->db->where('id',$row->country);
					$query = $this->db->get('countries');
					$get = $query->result();
					foreach($get as $value){
						$result['country'][]=$value;
					}

					$this->db->select('states.name as stateName');
					$this->db->where('id',$row->state);
					$query = $this->db->get('states');
					$get = $query->result();
					foreach($get as $value){
						$result['state'][]=$value;
					}

					$this->db->select('cities.name as cityName');
					$this->db->where('id',$row->city);
					$query = $this->db->get('cities');
					$get = $query->result();
					foreach($get as $value){
						$result['city'][]=$value;
					}

					$this->db->select_max('tbl_ratings.rating');
					$this->db->select('COUNT(tbl_ratings.b_id) as totalReviews');
					$this->db->from('tbl_ratings');
					$this->db->where('tbl_ratings.b_id',$row->id);
					$query = $this->db->get();
					$result['rating'] = $query->result();


					$this->db->select('tbl_business.category,tbl_category.category_name');
					$this->db->join('tbl_category','tbl_category.id=tbl_business.category');
					$this->db->where('tbl_business.id',$row->id);
					//$this->db->group_by('tbl_business.business_id');
					$query = $this->db->get('tbl_business');
					$get = $query->result();
					foreach($get as $value){
						$result['category'][]=$value;
					}

					$this->db->select('COUNT(tbl_quotation.assignedbusiness_id) as totalHiring');
					$this->db->where('assignedbusiness_id',$row->id);
					$query = $this->db->get('tbl_quotation');
					$get = $query->result();
					foreach($get as $value){
						$result['totalHiring'][]=$value;
					}
				}
			}
		}
		//echo '<pre>';print_r($result);die;
		return $result;
	}

	public function insertBusiness($postData,$catData){
		$result=array();
		if($postData){
			foreach ($catData as $key => $value) {
	            foreach ($value  as  $val ){
	                $array[] = array($key , $val);
	            }
        	}
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_business',$postData);
			$business_id = $this->db->insert_id();
			foreach($array as $row){
				$insertData = array('business_id'=>$business_id,'category'=>$row[0],'sub_category'=>$row[1],'created_by'=>$business_id);
				$this->db->set('created_date','NOW()',FALSE);
				$result = $this->db->insert('tbl_business_category_relation',$insertData);
			}
		}
		return $result;

	}

	public function updateBusiness($postData,$catData,$id) {
		$result=array();
		if($postData){
			foreach ($catData as $key => $value) {
	            foreach ($value  as  $val ){
	                $array[] = array($key , $val);
	            }
        	}
			$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$this->db->update('tbl_business',$postData);


			$this->db->where('business_id',$id);
			$this->db->delete('tbl_business_category_relation');
			foreach($array as $row){
				$insertData = array('business_id'=>$id,'category'=>$row[0],'sub_category'=>$row[1],'created_by'=>$id);
				$this->db->set('created_date','NOW()',FALSE);
				$result = $this->db->insert('tbl_business_category_relation',$insertData);
			}

		}
		return $result;
    }

    public function deleteBusiness($id) {

		if($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_business');
			return TRUE;
		}
		return FALSE;
    }

    public function getBusinessByIndividual($id){
    	$result = array();
    	if($id){
    		$this->db->select('tbl_business.*,tbl_quotation.id as quotationId,tbl_quotation.individual_id,tbl_bid.quotation_id as bidQuotationId,tbl_bid.business_id');
    		$this->db->from('tbl_bid');
    		$this->db->join('tbl_quotation','tbl_quotation.id=tbl_bid.quotation_id','LEFT');
    		$this->db->join('tbl_business','tbl_business.id=tbl_bid.business_id','LEFT');
    		$this->db->where('tbl_bid.business_id',$id);
    		$query = $this->db->get();
    		$result = $query->result();
		}
    	return $result;

    }

    public function getCategoriesForBusiness($id){
    	$result = array();
    	if($id){
    		$this->db->where('business_id',$id);
    		$query = $this->db->get('tbl_business_category_relation');
    		$result = $query->result();
    	}
    	return $result;
    }

	public function getBusinessAsTeamAdmin($id){
		$result = array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get('tbl_business');
			$result = $query->result();
		}
		return $result;
	}

	public function getProfessionalById($professional_id){
		$result = array();
		if($professional_id){
			$this->db->where('id',$professional_id);
			$query = $this->db->get('tbl_business');
			$result = $query->result();
		}
		return $result;
	}

	public function updateBusinessEmailNotification($postData,$id) {
		$result=array();
		if($postData){
			$this->db->where('id',$id);
			$this->db->update('tbl_business',$postData);
		}
		return $result;
    }

    public function insertbusinessCategory($postData){  
  		$this->db->set('created_date','NOW()',FALSE);
  		$result = $this->db->insert('tbl_business_category_relation',$postData);
 	}
	public function getBusinessCategoryById($business_id){
		$result2 = array();
		$result = array();
		if($business_id){
			$this->db->where('business_id',$business_id);
			$query = $this->db->get('tbl_business_category_relation');
			$result2 = $query->result();
			foreach($result2 as $row){    
				$this->db->where('id',$row->sub_category);
				$query = $this->db->get('tbl_category');
				$result[] = $query->result(); 
			}
		}
		return $result;
	}
 
	public function deletebusinessCategory($business_id,$catId,$subCatId) {
		if($business_id && $catId && $subCatId){
			$this->db->where('business_id',$business_id);
			$this->db->where('category',$catId);
			$this->db->where('sub_category',$subCatId);
			$this->db->delete('tbl_business_category_relation');
			return TRUE;
		}
		return FALSE;
	}

	public function getProjectOverview($assignedbusiness_id){
		$result = array();
		if($assignedbusiness_id){
			$this->db->where('assignedbusiness_id',$assignedbusiness_id);
			//$this->db->get('tbl_quotation');
			$query= $this->db->get('tbl_quotation');
			$result = $query->result();
		}
		return $result;
	}

	public function insertBusinessIndustry($postData){  
		$this->db->set('created_date','NOW()',FALSE);
		$result = $this->db->insert('tbl_business_industry_relation',$postData);
	}
 
	public function getBusinessIndustryById($business_id){
		$result2 = array();
		$result = array();
		if($business_id){
			$this->db->where('business_id',$business_id);
			$query = $this->db->get('tbl_business_industry_relation');
			$result2 = $query->result();
			//echo '<pre>';print_r($result2);die;
			foreach($result2 as $row){    
				$this->db->where('id',$row->industry);
				$query = $this->db->get('tbl_industry');
				$result[] = $query->result(); 
			}
		}
		return $result;
	}
 
	public function deleteBusinessIndustry($business_id,$industryId) {
		if($business_id && $industryId){
			$this->db->where('business_id',$business_id);
			$this->db->where('industry',$industryId);  
			$this->db->delete('tbl_business_industry_relation');
			return TRUE;
		}
		return FALSE;
	}

}
