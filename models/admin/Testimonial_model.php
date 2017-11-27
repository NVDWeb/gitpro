<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model {

	public function getTestimonial(){
		$result = array();
		$this->db->where('url','');
		$query = $this->db->get(' tbl_testimonial');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}

	public function getVideoTestimonial(){
		$result=array();
		$this->db->where('url!=','');
		$query = $this->db->get(' tbl_testimonial');
		if($query->num_rows()>0){
			$result = $query->result();
		}
		return $result;
	}
	public function getTestimonialById($id){
		$result=array();
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get(' tbl_testimonial');
			if($query->num_rows() > 0 ){
				$result = $query->result();
			}

		}
		return $result;
	}

	public function insertTestimonial($postData){
		$result=array();
		if($postData){
			$this->db->set('created_date', 'NOW()', FALSE);
			$result = $this->db->insert(' tbl_testimonial',$postData);
		}
		return $result;

	}

	public function updateTestimonial($postData,$id) {
		$result=array();
		if($postData){
			//print_r($postData);echo $id; die;
		 	$this->db->set('modified_date', 'NOW()', FALSE);
			$this->db->where('id',$id);
			$result = $this->db->update(' tbl_testimonial',$postData);
		}
		return $result;
    }

    public function deleteTestimonial($id) {
		
		if($id){
			$this->db->where('id',$id);
			$this->db->delete(' tbl_testimonial');
			return TRUE;
		}
		return FALSE;
    }

    

}