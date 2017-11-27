<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_Model {

	public function getAllCountries(){
		$this->db->select('countries.*');
		$this->db->from('countries');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function getStateByCountryId($country_id){
		$this->db->select('states.*');
		$this->db->from('states');
		$this->db->where('states.country_id',$country_id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function getCityByStateId($state_id){
		$this->db->select('cities.*');
		$this->db->from('cities');
		$this->db->where('cities.state_id',$state_id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function getCountryById($id){
		$this->db->select('countries.*');
		$this->db->from('countries');
		$this->db->where('countries.id',$id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function getStateById($id){
		$this->db->select('states.*');
		$this->db->from('states');
		$this->db->where('states.id',$id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function getCityById($id){
		$this->db->select('cities.*');
		$this->db->from('cities');
		$this->db->where('cities.id',$id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function getCountryBySortName($sortname){
		$this->db->select('countries.*');
		$this->db->from('countries');
		$this->db->where('countries.sortname',$sortname);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

}
