<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_model extends CI_Model {

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

    return $result;
  }

  public function getPendingCronDataForProfessionalForTeamLead(){
    $result = array();
    $this->db->select('cron_table_professional.business_id,tbl_business.email as professionalEmail,tbl_business.first_name as businessName');
    $this->db->from('cron_table_professional');
    $this->db->join('tbl_business','tbl_business.id=cron_table_professional.business_id','LEFT');
    $this->db->where('cron_table_professional.lead_type',2);
    $this->db->where('cron_table_professional.email_notification_type',2);
    $this->db->where('cron_table_professional.mail_sent',0);
    $this->db->group_by('cron_table_professional.business_id');
    $query = $this->db->get();
    if($query->num_rows()>0){
      foreach($result = $query->result() as $row){
        $this->db->select('cron_table_professional.quotation_id,tbl_individual.name as quotationAdminName,tbl_quotation.project_name');
        $this->db->from('cron_table_professional');
        $this->db->join('tbl_quotation','tbl_quotation.id=cron_table_professional.quotation_id','LEFT');
        $this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.created_by','LEFT');
        $this->db->where('cron_table_professional.business_id',$row->business_id);
        $this->db->where('cron_table_professional.lead_type',2);
        $this->db->where('cron_table_professional.mail_sent',0);
        $this->db->where('cron_table_professional.email_notification_type',2);
        //$this->db->group_by('tbl_business.id');
        $query = $this->db->get();
        $getc = $query->result();
        foreach($getc as $value){
          $row->projectList[]=$value;
        }
      }
    }
    //echo '<pre>';print_r($result);
    return $result;
  }
  
  public function getPendingCronDataForProfessionalForTeamLeadOneByOne(){
    $result = array();
    $this->db->select('cron_table_professional.quotation_id,cron_table_professional.business_id,tbl_quotation.project_name,tbl_quotation.created_by,tbl_individual.name as projectPostedBy');
    $this->db->from('cron_table_professional');
    $this->db->join('tbl_quotation','tbl_quotation.id=cron_table_professional.quotation_id','LEFT');
    $this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.created_by','LEFT');
    $this->db->where('cron_table_professional.lead_type',2);
    $this->db->where('cron_table_professional.email_notification_type',1);
    $this->db->where('cron_table_professional.mail_sent',0);
    //$this->db->group_by('cron_table_professional.business_id');
    $query = $this->db->get();
    if($query->num_rows()>0){
      foreach($result = $query->result() as $row){
        $this->db->select('tbl_business.email, tbl_business.first_name');
        $this->db->from('tbl_business');
        $this->db->where('tbl_business.id',$row->business_id);
        $query = $this->db->get();
        $getc = $query->result();
        foreach($getc as $value){
          $row->businessList[]=$value;
        }
      }
    }
    //echo '<pre>';print_r($result);
    return $result;
  }

  public function getPendingCronDataForProfessionalForLeadOneByOne(){
    $result = array();
    $this->db->select('cron_table_professional.quotation_id,cron_table_professional.business_id,tbl_quotation.project_name,tbl_quotation.created_by,tbl_individual.name as projectPostedBy');
    $this->db->from('cron_table_professional');
    $this->db->join('tbl_quotation','tbl_quotation.id=cron_table_professional.quotation_id','LEFT');
    $this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.created_by','LEFT');
    $this->db->where('cron_table_professional.lead_type',1);
    $this->db->where('cron_table_professional.email_notification_type',1);
    $this->db->where('cron_table_professional.mail_sent',0);
    //$this->db->group_by('cron_table_professional.business_id');
    $query = $this->db->get();
    if($query->num_rows()>0){
      foreach($result = $query->result() as $row){
        $this->db->select('tbl_business.email, tbl_business.first_name');
        $this->db->from('tbl_business');
        $this->db->where('tbl_business.id',$row->business_id);
        $query = $this->db->get();
        $getc = $query->result();
        foreach($getc as $value){
          $row->businessList[]=$value;
        }
      }
    }
    //echo '<pre>';print_r($result);
    return $result;
  }

  public function getPendingCronDataForProfessionalForLeadBunch(){
    $result = array();
    $this->db->select('cron_table_professional.business_id,tbl_business.email as professionalEmail,tbl_business.first_name as businessName');
    $this->db->from('cron_table_professional');
    $this->db->join('tbl_business','tbl_business.id=cron_table_professional.business_id','LEFT');
    $this->db->where('cron_table_professional.lead_type',1);
    $this->db->where('cron_table_professional.email_notification_type',2);
    $this->db->where('cron_table_professional.mail_sent',0);
    $this->db->group_by('cron_table_professional.business_id');
    $query = $this->db->get();
    if($query->num_rows()>0){
      foreach($result = $query->result() as $row){
        $this->db->select('cron_table_professional.quotation_id,tbl_individual.name as quotationAdminName,tbl_quotation.project_name');
        $this->db->from('cron_table_professional');
        $this->db->join('tbl_quotation','tbl_quotation.id=cron_table_professional.quotation_id','LEFT');
        $this->db->join('tbl_individual','tbl_individual.id=tbl_quotation.created_by','LEFT');
        $this->db->where('cron_table_professional.business_id',$row->business_id);
        $this->db->where('cron_table_professional.lead_type',1);
        $this->db->where('cron_table_professional.mail_sent',0);
        $this->db->where('cron_table_professional.email_notification_type',2);
        //$this->db->group_by('tbl_business.id');
        $query = $this->db->get();
        $getc = $query->result();
        foreach($getc as $value){
          $row->projectList[]=$value;
        }
      }
    }
    //echo '<pre>';print_r($result);
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

  public function updateCronProfessionalLeadBunch($updateData,$bId){
    $this->db->where('business_id',$bId);
    $this->db->where('lead_type',1);
    $this->db->where('email_notification_type',2);
    $this->db->update('cron_table_professional',$updateData);
  }

  public function updateCronProfessionalLeadOneByOne($updateData,$bId){
    $this->db->where('business_id',$bId);
    $this->db->where('lead_type',2);
    $this->db->where('email_notification_type',1);
    $this->db->update('cron_table_professional',$updateData);
  }

  public function updateCronProfessionalOneByOne($updateData,$bId){
    $this->db->where('business_id',$bId);
    $this->db->where('lead_type',1);
    $this->db->where('email_notification_type',1);
    $this->db->update('cron_table_professional',$updateData);
  }

}
?>
