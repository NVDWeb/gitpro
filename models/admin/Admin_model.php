<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getAdmin($username,$password){
		if($username && $password){
			/*check the email and password matches from any of the table*/
			/*check it for professional */
			$this->db->where('email',$username);
			$this->db->where('password',md5($password));
			$query = $this->db->get('tbl_business');
			$result = $query->result();

			/*check it for client/business */
			$this->db->where('email',$username);
			$this->db->where('password',md5($password));
			$query = $this->db->get('tbl_individual');
			$result2 = $query->result();


			/*check it for business/professional */
			$this->db->where('email',$username);
			$this->db->where('password',md5($password));
			$query = $this->db->get('tbl_admin');
			$result3 = $query->result();

			//print_r($result2);
			if($result){
        		return 2;
        	}else if($result2){
        		return 3;
        	}else if($result3){
        		return 1;
        	}else{
        		return false;
        	}
        }
		return false;

	}
	
	public function getAdminByEmail($email,$password){
		if($email && $password){
			/*check the email and password matches from any of the table*/
			
			/*check it for professional */
			$this->db->where('email',$email);						
			$query = $this->db->get('tbl_business');
			$result = $query->result();

			/*check it for client/business */
			$this->db->where('email',$email);			
			$query = $this->db->get('tbl_individual');
			$result2 = $query->result();
			

			/*check it for admin */
			$this->db->where('email',$email);						
			$query = $this->db->get('tbl_admin');
			$result3 = $query->result();

			/*check it for professional */
			if($result){				
				$email1 = $result[0]->email;
				$salt =$result[0]->salt;				
				$combine = $email1.$salt.$password;				
				$accesspass = hash('sha256',$combine);				
				$this->db->where('email',$email1);
				$this->db->where('password',md5($accesspass));			
				$query = $this->db->get('tbl_business');
				$result_bussiness = $query->result();				
				if($result_bussiness){
					return 2;
				}else{
					return false;
				}        		
        	}/*check it for client/business */
			else if($result2){
				$email1 = $result2[0]->email;
				$salt =$result2[0]->salt;				
				$combine = $email1.$salt.$password;				
				$accesspass = hash('sha256',$combine);				
				$this->db->where('email',$email1);
				$this->db->where('password',md5($accesspass));			
				$query = $this->db->get('tbl_individual');
				$result4 = $query->result();				
				if($result4){
					return 3;
				}else{
					return false;
				}
        	}/*check it for admin */
			else if($result3){								
				$email1 = $result3[0]->email;
				$salt =$result3[0]->salt;				
				$combine = $email1.$salt.$password;				
				$accesspass = hash('sha256',$combine);				
				$this->db->where('email',$email1);
				$this->db->where('password',md5($accesspass));			
				$query = $this->db->get('tbl_admin');
				$result_admin = $query->result();				
				if($result_admin){
					return 1;
				}else{
					return false;
				}
        	}else{
        		return false;
        	}
        }
		return false;
	}

	public function getAdminValue($username,$password){
		$result=array();
		if($username && $password){

			/*check it for professional */
			$this->db->where('email',$username);			
			$query = $this->db->get('tbl_business');
			$result = $query->result();

			/*check it for client/business */
			$this->db->where('email',$username);		
			$query = $this->db->get('tbl_individual');
			$result2 = $query->result();


			/*check it for admin */
			$this->db->where('email',$username);			
			$query = $this->db->get('tbl_admin');
			$result3 = $query->result();
			
			/*check it for admin */
			if($result3){			
	        	$email1 = $result3[0]->email;
				$salt =$result3[0]->salt;								
				$combine = $email1.$salt.$password;				
				$accesspass = hash('sha256',$combine);							
				$this->db->where('email',$email1);
				$this->db->where('password',md5($accesspass));			
				$query = $this->db->get('tbl_admin');
				$result_admin = $query->result();				
				if($result_admin){
					$table = 'tbl_admin';
        			$updateOnlineStatus = array('is_online'=>1);
					$this->db->where('email',$username);
					$this->db->update($table,$updateOnlineStatus);
					$result_admin['role']=1;
					return $result_admin;
				}				
        	}
			/*check it for client/business */
	        if($result2){				
	        	$email1 = $result2[0]->email;
				$salt =$result2[0]->salt;								
				$combine = $email1.$salt.$password;				
				$accesspass = hash('sha256',$combine);							
				$this->db->where('email',$email1);
				$this->db->where('password',md5($accesspass));			
				$query = $this->db->get('tbl_individual');
				$result_client = $query->result();				
				if($result_client){
					$table = 'tbl_individual';
					$updateOnlineStatus = array('is_online'=>1);
					$this->db->where('email',$username);
					$this->db->update($table,$updateOnlineStatus);
					$result_client['role']=3;
					return $result_client;
				}
	       	}
			/*check it for professional */
			if($result){							
	        	$email1 = $result[0]->email;
				$salt =$result[0]->salt;								
				$combine = $email1.$salt.$password;				
				$accesspass = hash('sha256',$combine);							
				$this->db->where('email',$email1);
				$this->db->where('password',md5($accesspass));			
				$query = $this->db->get('tbl_business');
				$result_business = $query->result();				
				if($result_business){
					$table = 'tbl_business';
        			$updateOnlineStatus = array('is_online'=>1);
					$this->db->where('email',$username);
					$this->db->update($table,$updateOnlineStatus);
					$result_business['role']=2;
					return $result_business;
				}        	
	        }						
		}
	}

	public function getAdminData($username,$role){
		//print_r($role);die;
		$result=array();
		if($username && $role){
			if($role==1){
				$this->db->select('tbl_admin.*');
        		$table = 'tbl_admin';
        	}
	        if($role==2){
	        	$table = 'tbl_business';
	        	$this->db->select('tbl_business.*,COUNT(tbl_quotation.assignedbusiness_id) as totalHiring');
	        	$this->db->join('tbl_quotation','tbl_quotation.assignedbusiness_id=tbl_business.id','LEFT');

	        	$this->db->where('tbl_business.status',1);
	        	$this->db->where('tbl_business.id',$this->session->userdata('adminId'));
	        }
	        if($role==3){
	        	$this->db->select('tbl_individual.*');
	        	$table = 'tbl_individual';
	        	$this->db->where('status',1);
	        }
	        $this->db->from($table);
			$this->db->where('email',$username);
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			if($query->num_rows()>0){
				$result = $query->result();
			}
		}
		//echo $this->db->last_query();die;
		return $result;

	}

	public function email_exists($postData) {
		$email = $postData['email'];
        /*check it for professional */
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_business');
		$result = $query->result();

		/*check it for client/business */
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_individual');
		$result2 = $query->result();


		/*check it for business/professional */
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_admin');
		$result3 = $query->result();

		if($result3){
			$table = 'tbl_admin';        		
    	}

		if($result){				
        	$table = 'tbl_business';	        	
        }
        if($result2){
           	$table = 'tbl_individual';	        	
       	}	
        $query = $this->db->query("SELECT email, password FROM ".$table." WHERE email='$email'");
        if ($row = $query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function temp_reset_password($email,$temp_pass) {
        $data = array(
            'reset_code' => md5($temp_pass)
        );
        /*check it for professional */
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_business');
		$result = $query->result();

		/*check it for client/business */
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_individual');
		$result2 = $query->result();


		/*check it for business/professional */
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_admin');
		$result3 = $query->result();

		if($result3){
			$tbl = 'tbl_admin';        		
    	}else if($result){				
        	$tbl = 'tbl_business';	        	
        }else{
           	$tbl = 'tbl_individual';	        	
       	}	
		$this->db->where('email', $email);
		if($this->db->update($tbl, $data)){
			return TRUE;

		}else{
			return FALSE;
		}


    }

     public function is_temp_pass_valid($temp_pass) {
     	
     	/*check it for professional */
		$this->db->where('reset_code',$temp_pass);
		$query = $this->db->get('tbl_business');
		$result = $query->result();

		/*check it for client/business */
		$this->db->where('reset_code',$temp_pass);
		$query = $this->db->get('tbl_individual');
		$result2 = $query->result();


		/*check it for business/professional */
		$this->db->where('reset_code',$temp_pass);
		$query = $this->db->get('tbl_admin');
		$result3 = $query->result();

		//print_r($result2)
        if ($result) {
            return $result;
        }else if($result2){
        	return $result2;
        }else if($result3){
        	return $result3;
        }else {
            return FALSE;
        }
    }

    public function updatePassword($updateData,$email){
		
    	/*check it for professional */
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_business');
		$result = $query->result();

		/*check it for client/business */
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_individual');
		$result2 = $query->result();


		/*check it for business/professional */
		$this->db->where('email',$email);
		$query = $this->db->get('tbl_admin');
		$result3 = $query->result();



		if($result3){
			//$updateData = array('password'=>md5($password),'reset_code'=>'');
			$this->db->where('email',$email);
			$this->db->update('tbl_admin',$updateData);
		}

		if($result){
			//$updateData = array('password'=>md5($password),'reset_code'=>'');
			$this->db->where('email',$email);
			$this->db->update('tbl_business',$updateData);
			}

		if($result2){
			//$updateData = array('password'=>md5($password),'reset_code'=>'');
			$this->db->where('email',$email);
			$this->db->update('tbl_individual',$updateData);
			}
			return true;
    }

    public function updateAdmin($updateData,$username,$role){
		$result=array();

		if($username && $role){
			if($role==1){
				$table = 'tbl_admin';
        	}
	        if($role==2){
	        	$table = 'tbl_business';
	        	$this->db->where('id',$this->session->userdata('adminId'));

	        }
	        if($role==3){
	        	$table = 'tbl_individual';

	        }
	       // echo $table;
			$this->db->where('email',$username);
			$this->db->update($table,$updateData);
			//echo $this->db->last_query();die;
		}
		return true;

	}

	public function getRatingById($b_id){
		$result = array();
		if($b_id){
			$this->db->select_max('rating');
			$this->db->where('b_id',$b_id);
			$result = $this->db->get('tbl_ratings')->row();
		}
		return $result;
	}

	public function checkBusinessUser($email){
		$result = array();
		if($email){
			$this->db->select('tbl_business.*');
			$this->db->where('email',$email);
			$query = $this->db->get('tbl_business');
			if ($query->num_rows() > 0 ) {
					$result = $query->result();
			} else {
					return FALSE;
			}
		}
		return $result;
	}

	public function checkIndividualUser($email){
		$result = array();
		if($email){
			$this->db->select('tbl_individual.id,tbl_individual.email, tbl_individual.name as first_name,tbl_individual.mobile');
			$this->db->where('email',$email);
			$query = $this->db->get('tbl_individual');
			if ($query->num_rows() > 0 ) {
					$result = $query->result();
			} else {
					return FALSE;
			}
		}
		return $result;
	}
	
	public function getEducationDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get('education_history');
			$result = $query->result();
		}
		return $result;
	}

	public function getEmploymentDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get('employment_history');
			$result = $query->result();
		}
		return $result;
	}

	public function getAchivmentDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get('tbl_achievement');
			$result = $query->result();
		}
		return $result;
	}
	public function getExecutiveSummaryDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get('tbl_executivesummary');
			$result = $query->result();
		}
		return $result;
	}
	
	public function getLanguageKnownDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get(' tbl_languageknown');
			$result = $query->result();
		}
		return $result;
	}
	
	public function getLicenseDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get(' tbl_license');
			$result = $query->result();
		}
		return $result;
	}
	public function getObjectiveSummaryDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get(' tbl_objectivesummary');
			$result = $query->result();
		}
		return $result;
	}
	
	public function getSkillsByBusinessId($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$this->db->order_by('ExperienceInMonths','DESC');
			$query = $this->db->get(' tbl_skills');
			$result = $query->result();
		}
		return $result;
	}

	public function getManagementSummaryDetails($b_id){
		$result=array();
		if($b_id){
			$this->db->where('b_id',$b_id);
			$query = $this->db->get(' tbl_managementsummary');
			$result = $query->result();
		}
		return $result;
	}
	
	public function updateProfilepic($postData,$bussinessid){
		if($bussinessid){
			$this->db->where('id',$bussinessid);
			$this->db->update('tbl_business',$postData);
			
		}
		return 1;
	}

}
