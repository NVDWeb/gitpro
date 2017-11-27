<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_model extends CI_Model {

	public function insertBusiness($postData){


		$category =  $this->session->userdata('category');
		$subCategory = $this->session->userdata('subCategory');


		$result=array();
		if($postData){
			/*foreach ($catData as $key => $value) {
	            foreach ($value  as  $val ){
	                $array[] = array($key , $val);
	            }
        	}*/
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_business',$postData);
			$business_id = $this->db->insert_id();



			foreach($subCategory as $row){
				$insertData = array('business_id'=>$business_id,'category'=>$category,'sub_category'=>$row,'created_by'=>$business_id);
				$this->db->set('created_date','NOW()',FALSE);
				$result = $this->db->insert('tbl_business_category_relation',$insertData);
			}
		}
		return $result=$business_id;

	}

	public function payment($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert('tbl_payment_reg',$postData);
		}
		return $result;
	}

	public function checkBusinessUser($email,$oauth_provider){
		$result=array();
		if($email){
			$this->db->where('email',$email);
			//$this->db->where('oauth_provider',$oauth_provider);
			$query = $this->db->get('tbl_business');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}
		}
		return $result;

	}


	public function insertBusinessByOauthLogin($postData){
		$result=array();
		if($postData ){
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_business',$postData);
			$business_id = $this->db->insert_id();
		}
		return $business_id;

	}


	public function insertBusinessLandingPage($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$this->db->insert('tbl_business',$postData);
			$business_id = $this->db->insert_id();
			/*foreach($subCategory as $row){
				$insertData = array('business_id'=>$business_id,'category'=>$postData,'sub_category'=>$row,'created_by'=>$business_id);
				$this->db->set('created_date','NOW()',FALSE);
				$result = $this->db->insert('tbl_business_category_relation',$insertData);
			}*/
		}
		return $result=$business_id;

	}

	public function chatRegister($postData){
		$result=array();
		if($postData){
			$this->db->insert('chat_vpb_users',$postData);
			
		}
		return 1;
	}

	public function insertEducationDetails($postData){
		//echo '<pre>'; print_r($postData);die;
		$result = $this->db->insert('education_history',$postData);
		// foreach($postData['c'] as $key=>$row){
		// 		$insertData2 = array('business_id'=>$postData['business_id'],'education_level'=>$key,'education_from'=>$row);
		// 		$this->db->set('created_date','NOW()',FALSE);
		// 		$result = $this->db->insert('tbl_education',$insertData2);
		// 	}

	}

	public function insertWorkExp($postData){
		$result = $this->db->insert('employment_history',$postData);

		/*foreach($postData['more_education'] as $row){
				$insertData2 = array('business_id'=>$postData['business_id'],'education_level'=>$row);
				$this->db->set('created_date','NOW()',FALSE);
				$result = $this->db->insert('tbl_workexp',$insertData2);
		}*/

	}

	public function insertWorkPlace($postData){
		//print_r($postData);die;
		foreach($postData['workplace'] as $row){
				$insertData2 = array('business_id'=>$postData['business_id'],'workplace'=>$row);
				$this->db->set('created_date','NOW()',FALSE);
				$result = $this->db->insert('tbl_workplace',$insertData2);
		}

	}

	public function insertbusinessCategory($postData){

		//$insertData2 = array('business_id'=>$postData['business_id'],'category'=>$postData['category'],'sub_category'=>$postData['sub_category']);
		$this->db->set('created_date','NOW()',FALSE);
		$result = $this->db->insert('tbl_business_category_relation',$postData);
	}

	public function insertExecutiveSummary($postData){
		$result = $this->db->insert('tbl_executivesummary',$postData);
	}
	
	public function insertManagementSummary($postData){
		$result = $this->db->insert('tbl_managementsummary',$postData);
	}
	
	public function insertObjectiveSummary($postData){
		$result = $this->db->insert('tbl_objectivesummary',$postData);
	}

	public function insertLanguageKnown($postData){
		$result = $this->db->insert('tbl_languageknown',$postData);
	}

	public function insertSkills($postData){
		$result = $this->db->insert('tbl_skills',$postData);
	}

	public function insertAchievement($postData){
		$result = $this->db->insert('tbl_achievement',$postData);
	}

	public function insertLicence($postData){
		$result = $this->db->insert('tbl_license',$postData);
	}

}
