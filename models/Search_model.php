<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {


 	function getData($term){ 
		$sql = $this->db->query('SELECT first_name FROM tbl_doctor WHERE first_name LIKE "%'.$term.'%" 
			UNION SELECT service_name as first_name FROM tbl_service WHERE service_name LIKE "%'.$term.'%"
			UNION SELECT category_name as first_name FROM tbl_category WHERE category_name LIKE "%'.$term.'%"
			UNION SELECT clinic_name as first_name FROM tbl_clinic WHERE clinic_name LIKE "%'.$term.'%" 
		');
        //$sql = $this->db->query('select * from tbl_doctor where first_name like "'.$term.'%"');

  		return $sql ->result();
    }

    public function getStates(){
		$result = array();
		$this->db->order_by('city_name','ASC');
		$query = $this->db->get('tbl_state');

		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getServices(){
		$result = array();
		$this->db->order_by('service_name','ASC');
		$query = $this->db->get('tbl_service');

		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getSearchData($location,$service,$term){
		$result = array();
		$sl ='';
		$where = '';
		
		
		if($term){

			/*'select id, first_name as doctorName,NULL as serviceName ,address,NULL as clinicName from tbl_doctor where first_name LIKE "%Rohit%" union all select id, NULL, service_name as serviceName,NULL,NULL from tbl_service where service_name LIKE "%Rohit%" union all select id, NULL, NULL,address,clinic_name from tbl_clinic where clinic_name LIKE "%Rohit%"';*/
			
			if($location){
				$this->db->where('tbl_doctor.city',$location);
			}
			$sql = $this->db->query('SELECT id,first_name as doctor_name,NULL as serviceName,address,NULL as clinicName  FROM tbl_doctor WHERE first_name LIKE "%'.$term.'%" AND city="'.$location.'" union all select id, NULL, service_name as serviceName,NULL,NULL from tbl_service where service_name LIKE "%'.$term.'%" union all select id, NULL, NULL,address,clinic_name from tbl_clinic where clinic_name LIKE "%'.$term.'%"');
		}
		$result = $sql ->result();
		echo $this->db->last_query();
		return $result;
		/*if($location){
			$sl .= 'UNION SELECT first_name FROM tbl_doctor WHERE address LIKE "%'.$location.'%"';
		}*/
		
	}
}