<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_model extends CI_Model {

  public function getPendingQuotation(){
    $result = array();
    $this->db->select('id,category,sub_category,work_detail,location');
    $this->db->where('mail_sent',0);
    $query = $this->db->get('tbl_quotation');
    $result = $query->result();
    return $result;

  }

  public function getBusinessByCatnSubCate($category,$subcategory,$quotationId){
    $result = array();
    if($category && $subcategory){
      $this->db->select('tbl_business.*,tbl_category.category_name');
      $this->db->from('tbl_business');
      $this->db->join('tbl_business_category_relation','tbl_business_category_relation.business_id=tbl_business.id','LEFT');
      $this->db->join('tbl_category','tbl_category.id=tbl_business_category_relation.category','LEFT');
      $this->db->where('tbl_business_category_relation.category',$category);
      $this->db->where('tbl_business_category_relation.sub_category',$subcategory);
      $this->db->where('tbl_business_category_relation.business_id!=','');
      $query = $this->db->get();
      $result = $query->result();
      $result['quotationID']=$quotationId;
    }
    return $result;
  }

  public function totalPendingTeamEmail(){
    $result = array();

    $this->db->select('cron_table.client_id,tbl_individual.email as clientEmail,tbl_individual.name as clientName');
    $this->db->from('cron_table');
    $this->db->join('tbl_individual','tbl_individual.id=cron_table.client_id','LEFT');
    $this->db->where('cron_table.professional_id',0);
    $this->db->where('cron_table.mail_sent',0);
    $this->db->group_by('tbl_individual.id');
    $query = $this->db->get();
    $result = $query->result();
    
    if($query->num_rows()>0){
      foreach($result = $query->result() as $row){
        $this->db->select('cron_table.b_id,tbl_business.first_name as teamAdminName,tbl_team_request.team_name,tbl_team_ratings.rating as maxRating');
        $this->db->from('cron_table');
        $this->db->join('tbl_business','tbl_business.id=cron_table.b_id','LEFT');
        $this->db->join('tbl_team_request','tbl_team_request.id=cron_table.team_id','LEFT');
        $this->db->join('tbl_team_ratings','tbl_team_ratings.team_id=cron_table.team_id','LEFT');
        $this->db->where('cron_table.client_id',$row->client_id);
        $this->db->where('cron_table.professional_id',0);
        $this->db->where('cron_table.mail_sent',0);
        $this->db->group_by('cron_table.id');
        $query = $this->db->get();
        $get = $query->result();
        foreach($get as $key=>$value){
          $row->teamList[]=$value;
        }
      }
    }
    //echo '<pre>';print_r($result);



    // $this->db->select('cron_table.id as cronId,cron_table.client_id,cron_table.team_id,cron_table.b_id,tbl_business.first_name as teamAdminName,tbl_team_request.team_name,tbl_team_ratings.rating as maxRating,tbl_individual.email as clientEmail');
    // $this->db->from('cron_table');
    // $this->db->join('tbl_business','tbl_business.id=cron_table.b_id','LEFT');
    // $this->db->join('tbl_team_request','tbl_team_request.id=cron_table.team_id','LEFT');
    // $this->db->join('tbl_team_ratings','tbl_team_ratings.team_id=cron_table.team_id','LEFT');
    // $this->db->join('tbl_individual','tbl_individual.id=cron_table.client_id','LEFT');
    // $this->db->where('cron_table.professional_id',0);
    // $this->db->where('cron_table.mail_sent',0);
    // $this->db->group_by('tbl_team_ratings.team_id');
    // $query = $this->db->get();
    // $result = $query->result();
    return $result;
  }

  public function totalPendingProfessionalEmail(){
    $result = array();
    $this->db->select('cron_table.id as cronId,cron_table.client_id,cron_table.team_id,cron_table.b_id,tbl_individual.name,tbl_individual.email as clientEmail');
    $this->db->from('cron_table');
    $this->db->join('tbl_individual','tbl_individual.id=cron_table.client_id','LEFT');
    $this->db->where('cron_table.team_id',0);
    $this->db->where('cron_table.mail_sent',0);
    $this->db->group_by('cron_table.client_id');
    $query = $this->db->get();
    if($query->num_rows()>0){
      foreach($result = $query->result() as $row){
        $this->db->select('tbl_business.first_name,tbl_business.id as businessId,MAX(tbl_ratings.rating) as MaxRating');
        $this->db->from('cron_table');
        $this->db->join('tbl_business','tbl_business.id=cron_table.professional_id','LEFT');
        $this->db->join('tbl_ratings','tbl_ratings.b_id=tbl_business.id','LEFT');
        $this->db->where('cron_table.client_id',$row->client_id);
        $this->db->group_by('tbl_business.id');
        $query = $this->db->get();
        $getc = $query->result();
        foreach($getc as $value){
          $row->professionalList[]=$value;
        }
      }
    }

    // $this->db->select('cron_table.id as cronId,cron_table.team_id,cron_table.b_id,tbl_individual.name,tbl_individual.email as clientEmail,tbl_business.email,tbl_business.id as businessId');
    // $this->db->from('cron_table');
    // $this->db->join('tbl_business','tbl_business.id=cron_table.professional_id','LEFT');
    // $this->db->join('tbl_individual','tbl_individual.id=cron_table.client_id','LEFT');
    // $this->db->where('cron_table.team_id',0);
    // $this->db->where('cron_table.mail_sent',0);
    // $this->db->group_by('cron_table.client_id');
    // $query = $this->db->get();
    // $result = $query->result();
    
    return $result;
  }

  public function updateCronClientProfessional($updateData,$cronId){
    $this->db->where('client_id',$cronId);
    $this->db->where('team_id',0);
    $this->db->update('cron_table',$updateData);
  }

  public function updateCronClientTeam($updateData,$cronId){
    $this->db->where('client_id',$cronId);
    $this->db->where('professional_id',0);
    $this->db->update('cron_table',$updateData);
  }

}
?>
