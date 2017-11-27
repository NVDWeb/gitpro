<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professional_model extends CI_Model {

  public function getProfessionalByCatNSubCat($category,$sub_category,$country_id){
    $result = array();
    $this->db->select('tbl_business.*,tbl_category.category_name');
    $this->db->from('tbl_business');
    $this->db->join('tbl_business_category_relation','tbl_business_category_relation.business_id=tbl_business.id','LEFT');
    $this->db->join('tbl_category','tbl_category.id=tbl_business_category_relation.category','LEFT');
    $this->db->where('tbl_business_category_relation.category',$category);
    $this->db->where('tbl_business_category_relation.sub_category',$sub_category);
	$this->db->where('tbl_business.country',$country_id);
    $query  = $this->db->get();
	
    //echo $this->db->last_query();die;
    $result = $query->result();
	
	//
//	foreach($result as $res){		
//	$this->db->select('countries.name');
//	$this->db->where('id',$res->country);
//	$query = $this->db->get('countries');
//	$get = $query->result();
//	$result['country']=$get;
//	}
	//echo '<pre>';print_r($result);
    return $result;
  }
  
  public function getListFavouritebyIndId($ind_id){			
		$result = array();
		$this->db->where('ind_id',$ind_id);		
		$query = $this->db->get('tbl_favourites');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}
  
  public function getFavourite($ind_id,$b_id){			
		$result = array();
		$this->db->where('ind_id',$ind_id);
		$this->db->where('buss_id',$b_id);
		$query = $this->db->get('tbl_favourites');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}
  
  	public function insertFavourite($postData){
		$result=array();
		if($postData){
			//$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_favourites',$postData);
		}
		return $result;
	}

	public function getExploreProfessional(){
		$result = array();
		$this->db->select('tbl_business.id,tbl_business.first_name,tbl_business.profile_name,tbl_business.businesslogo,tbl_business.picture,tbl_business.country_name,tbl_executivesummary.executiveSummary,tbl_business_category_relation.category,tbl_category.category_name');
		$this->db->from('tbl_business');
		$this->db->join('tbl_executivesummary','tbl_executivesummary.b_id=tbl_business.id','LEFT');
		$this->db->join('tbl_business_category_relation','tbl_business_category_relation.business_id=tbl_business.id','LEFT');
		$this->db->join('tbl_category','tbl_category.id=tbl_business_category_relation.category','LEFT');
		//$this->db->join('tbl_quotation','tbl_quotation.assignedbusiness_id=tbl_business.id','LEFT');
		$this->db->group_by('tbl_business.id');
		$query = $this->db->get();
		//$result = $query->result();
		if($query->num_rows() > 0 ){
			foreach ($result = $query->result() as $row) {
				$this->db->select('COUNT(tbl_quotation.assignedbusiness_id) as totalHiring');
				$this->db->from('tbl_quotation');
				$this->db->where('tbl_quotation.assignedbusiness_id',$row->id);
				$query = $this->db->get();
				$res = $query->result();
				foreach($res as $key=>$value){
					$row->totalHiring=$value;
				}

				$this->db->select('COUNT(tbl_ratings.b_id) as totalRatings, MAX(tbl_ratings.rating) as MaxRating');
				$this->db->from('tbl_ratings');
				$this->db->where('tbl_ratings.b_id',$row->id);
				$query = $this->db->get();
				$res = $query->result();
				foreach($res as $key=>$value){
					$row->totalRatings=$value;
				}

			}
		}
		//echo '<pre>';print_r($result);
		return $result;
	}

	public function getSearchProfessional($category,$sub_category,$rating,$industry){
		//echo '<pre>';print_r(implode(",",$rating));die;
		$empHistory = array();
		$result = array();
		if($category || $sub_category || $rating || $industry){
			$query = "select * from tbl_business_category_relation";
	        if($category && $sub_category==''){
				if(sizeof($category) > 0){
	            	$ipchk_query =   implode(",",$category);
	            	$query .= " where (category IN ($ipchk_query))";
	        	}
			}else if($sub_category && $category==''){
				if(sizeof($sub_category) > 0){
	            	$ipchk_query2 =   implode(",",$sub_category);
	            	$query .= " where (sub_category IN ($ipchk_query2))";
	        	}
			}else{
				if(sizeof($category) > 0){
	            	$ipchk_query =   implode(",",$category);
	            	$query .= " where (category IN ($ipchk_query))";
	        	}

	        	if(sizeof($sub_category) > 0){
	            	$ipchk_query2 =   implode(",",$sub_category);
	            	$query .= " OR (sub_category IN ($ipchk_query2))";
	        	}
			}
			
			
			//$query = "select * from tbl_business_industry_relation";
	        if($industry){
				$query .= "select * from tbl_business_industry_relation";
				if(sizeof($industry) > 0){
	            	$ipchk_query =   implode(",",$industry);
	            	$query .= " where (industry IN ($ipchk_query))";
	        	}
			}
			
			
			
			$query .= ' GROUP BY business_id';
	     	$query = $this->db->query($query);
	        $result1= $query->result();
	       	foreach($result1 as $row){ 
				$this->db->select('tbl_business.id,tbl_business.first_name,tbl_business.profile_name,tbl_business.businesslogo,tbl_business.picture,tbl_business.country_name,tbl_executivesummary.executiveSummary,tbl_business_category_relation.category,tbl_category.category_name, MAX(tbl_ratings.rating) as MaxRating');
				$this->db->from('tbl_business');
				$this->db->join('tbl_executivesummary','tbl_executivesummary.b_id=tbl_business.id','LEFT');
				$this->db->join('tbl_business_category_relation','tbl_business_category_relation.business_id=tbl_business.id','LEFT');
				$this->db->join('tbl_category','tbl_category.id=tbl_business_category_relation.category','LEFT');
				$this->db->join('tbl_ratings','tbl_ratings.b_id=tbl_business.id','LEFT');
				
				$this->db->where('tbl_business.id',$row->business_id);
				if($rating){
					$this->db->where_in('tbl_ratings.rating',implode(",",$rating));
				}
				$query1 = $this->db->get();
				//echo $this->db->last_query();
				$result[] = $query1->result();
				

			}
			$i=0;
			foreach ($result as $rows){
				//echo '<pre>';print_r($rows);die;
				// $employerPost = array(
				// 	'first_name'=>$rows[0]->first_name,
				// 	'profile_name'=>$rows[0]->profile_name,
				// 	'picture'=>$rows[0]->picture,
				// 	'businesslogo'=>$rows[0]->businesslogo,
				// 	'executiveSummary'=>$rows[0]->executiveSummary,
				// 	'category_name'=>$rows[0]->category_name,
				// 	'country_name'=>$rows[0]->country_name,
				// 	'totalHiring'=>$rows[0]->totalHiring,
				// 	'totalRatings'=>$rows[0]->totalRatings,
				// 	'MaxRating'=>$rows[0]->MaxRating
					
				// );

				$this->db->select('COUNT(tbl_quotation.assignedbusiness_id) as totalHiring');
				$this->db->from('tbl_quotation');
				$this->db->where('tbl_quotation.assignedbusiness_id',$rows[0]->id);
				$query = $this->db->get();
				$res = $query->result();
				foreach($res[0] as $key=>$value){
					//echo $value;
					$rows['totalHiring']=$value;
				}

				$this->db->select('COUNT(tbl_ratings.b_id) as totalRatings');
				$this->db->from('tbl_ratings');
				$this->db->where('tbl_ratings.b_id',$rows[0]->id);
				$query = $this->db->get();
				$res = $query->result();
				foreach($res[0] as $key=>$value){
					//echo $value;
					$rows['totalRatings']=$value;
				}
				
				array_push($empHistory,$rows);
				
				
			$i++;
			}
		}
		//echo '<pre>';print_r($empHistory);
		return $empHistory;
	}
	
	public function getProfessionalByCategorySubcat($category=0,$sub_category=0){
			$result= array();			
			$query = "select * from tbl_business_category_relation";			
	        if($category && $sub_category==''){
				if(sizeof($category) > 0){
	            	$ipchk_query =   implode(",",$category);
	            	$query .= " Where (category IN ($ipchk_query))";
	        	}
			}
			if($category =='' && $sub_category){					
					$ipchk_queryc =   implode(",",$sub_category);					
	            	$query .= " Where (sub_category IN ($ipchk_queryc))";
					
			}
			if($category && $sub_category){
					$ipchk_queryc1 =   implode(",",$category);
					$ipchk_queryc2 =   implode(",",$sub_category);					
	            	$query .= " Where (sub_category IN ($ipchk_queryc2) AND category IN($ipchk_queryc1))";
					
			}	
			$query .= ' GROUP BY business_id';		
			$query = $this->db->query($query);	
			//echo $this->db->last_query(); die;			
	         $result1= $query->result();
			 foreach($result1 as $row){
				 //echo '<pre>';print_r($row);die;
				 $this->db->select('tbl_business.id,tbl_business.first_name,tbl_business.profile_name,tbl_business.contact_person_name,tbl_business.businesslogo,tbl_business.picture,tbl_business.country_name,tbl_executivesummary.executiveSummary,tbl_business_category_relation.category,tbl_category.category_name');
				$this->db->from('tbl_business');
				$this->db->join('tbl_executivesummary','tbl_executivesummary.b_id=tbl_business.id','LEFT');
				$this->db->join('tbl_business_category_relation','tbl_business_category_relation.business_id=tbl_business.id','LEFT');
				$this->db->join('tbl_category','tbl_category.id=tbl_business_category_relation.category','LEFT');
				$this->db->where('tbl_business.id',$row->business_id);
				$this->db->group_by('tbl_business.id');
				$query1 = $this->db->get();
				//echo $this->db->last_query();die;
				$result[] = $query1->result();			
			 }
			 //echo '<pre>';print_r($result);die;
		return $result;
	}
	
	public function getProfessional(){
		$result = array();
		$this->db->select('tbl_business.*,tbl_executivesummary.executiveSummary');
		$this->db->from('tbl_business');
		$this->db->join('tbl_executivesummary','tbl_executivesummary.b_id=tbl_business.id','LEFT');
		$query1 = $this->db->get();				
		$result = $query1->result();
		return $result;
	}
	
	public function getprofessinalBySearchParam($searchParam){
		$result = array();		
		if($searchParam){
			$this->db->select('tbl_business.*,tbl_executivesummary.executiveSummary');
			$this->db->from('tbl_business');
			$this->db->join('tbl_executivesummary','tbl_executivesummary.b_id=tbl_business.id','LEFT');
			$this->db->where('resume_status',1);
			$this->db->like('contact_person_name',$searchParam);
			$this->db->or_like('first_name',$searchParam);
			$this->db->like('last_name',$searchParam);
			$this->db->like('contact_person_name',$searchParam);
			$this->db->or_like('first_name',$searchParam);
			$this->db->or_like('last_name',$searchParam);
			$this->db->or_like('email',$searchParam);
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$result = $query->result();
		}
		return $result;
	}
}

?>
