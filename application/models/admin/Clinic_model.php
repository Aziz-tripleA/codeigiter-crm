<?php defined('BASEPATH') or exit('No direct script access allowed');


class Clinic_model extends CI_Model
{
    public function clinics_list()
    {
        $data = $this->db->select('*')
        ->from('clinics')
        ->get()
        ->result();

        return $data;
    }


    /**
     * 
     * store new clinic 
     */
    public function clinic_create($data)
    {
        $this->db->insert('clinics',$data);
    }


    /**
     * get clinic for edit from clinics tbl
     */

    public function get_clinic($id)
    {
        return $this->db->select('*')
        ->from('clinics')
        ->where('id',$id)
        ->get()
        ->row();

    }

    public function clinic_update($data , $id)
    {
        $this->db->where('id',$id)->update('clinics',$data);
    }
}
